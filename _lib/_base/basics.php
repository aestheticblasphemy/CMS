<?php

//require 'initialize.php';

session_start();

function __autoload($name)
{
    require 'class.'.$name.'.php';
}

/*
 * @function: db_init()
 * 
 * @arguments: ---
 * 
 * @return: descriptor to database connection.
 * 
 * @purpose: Initializes a database connect if one does not already exist, else 
 *             returns the old descriptor.
 * 
 * @operation: The database connection descriptor is kept in the $GLOBALS 
 * variable. The database uses the php PDO to connect to database.
 */
function db_init()
{
    if(isset($GLOBALS['db']))
        return $GLOBALS['db'];
    
    global $SITEGLOBALS;
    $db= new PDO('mysql:host='.$SITEGLOBALS['hostname'].';dbname='
            .$SITEGLOBALS['db_name'],
            $SITEGLOBALS['username'],
            $SITEGLOBALS['password']
            );
    $db->query('SET NAMES utf8');
    $db->num_queries = 0;
    $GLOBALS['db']= $db;
    return $db;    
}

/*
 * @function: db_query($query)
 * 
 * @arguments: $query - A mySql query string.
 * 
 * @return: result of the query
 * 
 * @purpose: Performs a mySQL query on the database.
 * 
 * @operation: ----
 */
function db_query($query)
{
 //   print $query;
    $db=db_init();
    $q = $db->query($query);
    $db->num_queries++;
    return $q;
}

/*
 * @function: db_row
 * 
 * @arguments: $query - Query for which first result is wanted
 * 
 * @return: First row from the array returned from query
 * 
 * @purpose:  to fetch the first row from the query
 * 
 * @operation: ----
 */
function db_row($query) 
{
    $q = db_query($query);
    return $q->fetch(PDO::FETCH_ASSOC);
}

/*
 * @function: db_all
 * 
 * @arguments: $query - MySQL query string
 *           : $key - Return a particular field (column) from all entries
 * 
 * @return: resulting array of DB query
 * 
 * @purpose: This function builds an array of all the results and returns.
 * 
 * @operation: 
 */

function db_all($query,$key='') 
{
    $q = db_query($query);
    $results=array();
    while($r=$q->fetch(PDO::FETCH_ASSOC))
            $results[]=$r;
    if(!$key)
        return $results;

    $arr=array();
    foreach($results as $r)
        $arr[$r[$key]]=$r;
    return $arr;
}

/*
 * @function: db_one
 * 
 * @arguments:$query - Query String
 *           :$field - Key for the returned value
 * @return: Single result from the query
 * 
 * @purpose:
 * 
 * @operation:
 */
function db_one($query, $field='') {
$r = db_row($query);
return $r[$field];
}

/*
 * @function: db_last_insert_id
 * 
 * @arguments:
 * 
 * @return: The ID of the last SQL query.
 * 
 * @purpose:
 * 
 * @operation:
 */
function db_last_insert_id() {
return db_one('select last_insert_id() as id','id');
}

function db_num_rows($result_set)
{
    return mysql_num_rows($result_set);
}

//Check if CMS is installed or not?
if(!defined('SCRIPTBASE'))
    define('SCRIPTBASE', $_SERVER['DOCUMENT_ROOT'].'/');

if(file_exists(SCRIPTBASE . '.private/config.php'))
{
    require SCRIPTBASE . '.private/config.php';
}
else{
    //$path = $_SERVER['HTTP_HOST'].'installer';
    //header('Location: '.$path);
    header('Location: /installer/');
    exit;
}



if(!defined('BASE_URL'))
    define('BASE_URL', $SITEGLOBALS['site_url']);


if(!defined('CONFIG_FILE'))
    define('CONFIG_FILE',SCRIPTBASE.'.private/config.php');


set_include_path(SCRIPTBASE.'_lib/_classes'.PATH_SEPARATOR.get_include_path());

// { plugins
$PLUGINS=array();
$PLUGIN_TRIGGERS=array();
$SITESTYLES = array();
if (isset($SITEGLOBALS['plugins']) && $SITEGLOBALS['plugins']) 
    {
        $SITEGLOBALS['plugins']=explode(',',$SITEGLOBALS['plugins']);
        foreach($SITEGLOBALS['plugins'] as $pname)
            {
                if (strpos('/',$pname)!==false) 
                        continue;
                require SCRIPTBASE . 'plugins/'.$pname.'/plugin.php';
                if(isset($plugin['version']) && $plugin['version'] && 
                        (!isset($SITEGLOBALS[$pname.'|version'])|| 
                            $SITEGLOBALS[$pname.'|version']!=$plugin['version']))
                {
                    $version=isset($SITEGLOBALS[$pname.'|version'])?
                            (int)$SITEGLOBALS[$pname.'|version']:0;
                    require SCRIPTBASE.'plugins/'.$pname.'/upgrade.php';
                    $SITEGLOBALS[$pname.'|version']=$version;
                    config_rewrite();
                    header('Location: '.$_SERVER['REQUEST_URI']);
                    exit;
                }
                $PLUGINS[$pname]=$plugin;
                if(isset($plugin['triggers']))
                {
                    foreach($plugin['triggers'] as $name=>$fn)
                    {
                        if(!isset($PLUGIN_TRIGGERS[$name]))
                            $PLUGIN_TRIGGERS[$name]=array();
                        
                        $PLUGIN_TRIGGERS[$name][]=$fn;
                    }
                }
                //set stylesheets
                if(isset($plugin['stylesheet']))
                $SITESTYLES[$pname]= $pname."/frontend/".$plugin['stylesheet'];
            }
    }
else $SITEGLOBALS['plugins']=array();
// }

function config_rewrite(){
    global $SITEGLOBALS;
    $tmparr=$SITEGLOBALS;
    $tmparr2=array();
    foreach($tmparr as $name=>$val)
    {
        if(!is_array($val))
        $tmparr2[]='\''.addslashes($name).'\'=>\''.addslashes($val).'\'';
        
        else
        {
            //$str = 'array(\''.implode('\',\'',$val).'\')';
            $str = '\''.implode(',',$val).'\'';
            $tmparr2[]='\''.addslashes($name).'\'=>'.$str.'';
        }

    }
    
    $config="<?php\n\$SITEGLOBALS=array(\n ".join(",\n ",$tmparr2)."\n);";
    file_put_contents(CONFIG_FILE,$config);
}

/*
 * @function: plugin_trigger
 * 
 * @arguments: $event : Event associated with trigger
 *             $element : element which will be modified with it.
 * 
 * @return:
 * 
 * @purpose:
 * 
 * @operation:
 */
function plugin_trigger($sEventName,&$element )
{
    global $PLUGIN_TRIGGERS;
    if(!isset($PLUGIN_TRIGGERS[$sEventName]))
        return;
    foreach($PLUGIN_TRIGGERS[$sEventName] as $fn)
        $fn($element);
}
/*
 * @function: date_m2h
 * 
 * @arguments: $d - Date
 *             $type - Type of date:Format of Date
 * 
 * @return:
 * 
 * @purpose: Converts Date from Machine readable to Human readable format.
 * 
 * @operation:
 */

function date_m2h($d, $type = 'date') 
{
    $date = preg_replace('/[- :]/', ' ', $d);
    $date = explode(' ', $date);
    if ($type == 'date') 
    {
        return date('l jS F, Y', mktime(0, 0, 0, $date[1], $date[2], $date[0]));
    }
    return date(DATE_RFC822, mktime($date[5],$date[4], $date[3], $date[1], $date[2], $date[0]));
}


/*
 * @function : is_admin()
 * @arguments: ----
 * @return : true/false
 * @purpose:  Determines if the user belongs to the staff or not.
 * @operation: Checks if the SESSION variable contains the information about the
 *              user. If not, the user is not logged in. If yes, then logged in.
 *             If the user is logged in, check the credentials. The user must at
 *             least belong to staff group to enter this area.
 */
function is_admin()
{
    /*
     * If the userdata value is not in session data, no need to check any more
     */
    if(!isset($_SESSION['userdata']))
        return false;
    /*
     * If userdata is set, then we need to see what roles are assigned to him. 
     */
    return (isset($_SESSION['userdata']['groups']['_administrators']) ||
            isset($_SESSION['userdata']['groups']['_superadministrators']) ||
            isset($_SESSION['userdata']['groups']['_staff']));
}


/*
 * @function:
 * 
 * @arguments:
 * 
 * @return:
 * 
 * @purpose:
 * 
 * @operation:
 */