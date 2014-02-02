<?php

if(file_exists('../.private/config.php'))
    exit;

$errors=array();
$dbname=@$_REQUEST['dbname'];
$dbhost=@$_REQUEST['dbhost'];
$dbuser=@$_REQUEST['dbuser'];
$dbpass=@$_REQUEST['dbpass'];
$admin=@$_REQUEST['admin'];
$adpass=@$_REQUEST['adpass'];
$adpass2=@$_REQUEST['adpass2'];
if($dbname=='' || $dbhost=='' || $dbuser=='')
{
    $errors[]='db requires name, hostname and username';
}
else
{
    $db=mysql_connect($dbhost,$dbuser,$dbpass);
    if(!$db)
        $errors[]='db: could not connect - incorrect '.'details';
    else if(!mysql_select_db($dbname,$db))
    {
        $errors[]='db: could not select database "'.addslashes($dbname).'"';
    }
}
if(!filter_var($admin,FILTER_VALIDATE_EMAIL))
{
    $errors[]='admin account must be an email address';
}
if(!$adpass && !$adpass2)
    $errors[]='admin password must not '.'be empty';
else if($adpass!=$adpass2)
    $errors[]='admin passwords must '.'both be equal';

if(!count($errors))
{
//Create Users Table
    mysql_query(
 "CREATE TABLE ab_admin_users (
	admin_user_id 		INT(10)			NOT NULL auto_increment,
	admin_user_email	VARCHAR(100)		NOT NULL default '',
	admin_user_pass		VARCHAR(50)		NOT NULL default '',
	admin_user_name		VARCHAR(50)		default NULL,
	admin_user_group	TEXT			,
	admin_user_act_key	VARCHAR(32)		default NULL,
	last_login_ip		VARCHAR(15)		default	NULL,
	last_login_host		VARCHAR(100)		default NULL,
	last_login_dt		DATETIME		default NULL,
	status			INT(1)			NOT NULL default '1',
	deleted			INT(1)			default '0',
	deleted_dt		DATETIME		default NULL,
	created_dt		DATETIME		NOT NULL default '0000-00-00 00:00:00',
	modified_dt		DATETIME		NOT NULL default '0000-00-00 00:00:00',
				PRIMARY KEY (admin_user_id)
        ) ENGINE=InnoDb,DEFAULT CHARSET=utf8");
mysql_query('INSERT INTO ab_admin_users (admin_user_id, admin_user_email,
                admin_user_pass,status,admin_user_group,created_dt
        ) values(1,"'
.addslashes($admin).'", "'.md5($adpass).'",1, \'["_superadministrators"]\',now())');

//Create Groups Table
mysql_query(
        'CREATE TABLE ab_admin_groups (
        id 		INT(11) 	NOT NULL AUTO_INCREMENT,
        name 		text,
        PRIMARY KEY (id)
        ) DEFAULT CHARSET=utf8;');

mysql_query('insert into ab_admin_groups values
(1,"_superadministrators"),(2,"_administrators")');

//Create Sections table
mysql_query("CREATE TABLE ab_admin_sections (
	admin_section_id		INT(4)		NOT NULL auto_increment,
	admin_section_name		VARCHAR(20)	NOT NULL default '',
        admin_section_level             INT(3)          NOT NULL default 0,
        admin_section_terminal          INT(1)          NOT NULL default 1,
        admin_section_url               VARCHAR(100)    NOT NULL,
        admin_section_parent_id         INT(6)          default NULL,
        admin_section_entry_type        INT(4)          default NULL,
	PRIMARY KEY (admin_section_id)
	) ENGINE=InnoDb, DEFAULT CHARSET=utf8;");
//Create Section Permissions table
mysql_query("CREATE TABLE ab_admin_section_perms
    (
	admin_section_perm_id	INT(10) 	NOT NULL auto_increment,
	admin_section_id	INT(10)		NOT NULL default '0',
	admin_user_id           INT(10)		NOT NULL default '0',
	admin_section_perm	INT(3)		NOT NULL default '1',
	PRIMARY KEY (admin_section_perm_id)
    ) ENGINE=InnoDb, DEFAULT CHARSET=utf8;");
//Create a contents table
    mysql_query("CREATE TABLE ab_admin_content_info 
(
	admin_content_id 			INT(11)			NOT NULL auto_increment,
	admin_content_create_date		DATETIME		NOT NULL default 0,
	admin_content_modify_date		DATETIME		NOT NULL default now(),
	admin_content_entry_type		INT(4) 			NOT NULL default '1',
        admin_content_section_id                INT(11)                 NOT NULL,
	admin_content_author_id			INT(7)			default NULL,
	admin_content_modify_user_id            INT(7)			,
	admin_content_title			VARCHAR(255)            ,
        admin_content_linked_res                TINYINT(1)              ,
	admin_content_linked_res_id		INT				,
	admin_content_summary			VARCHAR(1500)	,
	admin_content_published_flag            TINYINT(1)		default '0',
	admin_content_data				LONGTEXT		,
        admin_content_special                   TINYINT(1)              ,
        admin_content_rank                      INT(5)                  default NULL,
	
		PRIMARY KEY (admin_content_index),
		KEY (admin_content_create_date),
		KEY (admin_content_entry_type),
		KEY (admin_content_author_id),
		KEY (admin_content_published_flag)
)	ENGINE=InnoDb, DEFAULT CHARSET=utf8;");

//Create Content Types Table
mysql_query("CREATE TABLE ab_admin_content_types 
    (
        admin_content_type_id   INT(5)  NOT NULL auto_increment,
        admin_content_type_name VARCHAR(30)
    )ENGINE=InnoDb, DEFAULT CHARSET=utf8;");
//Create Applications Table
 mysql_query("CREATE TABLE ab_admin_apps 
     (
	admin_app_id	INT(2)			NOT NULL auto_increment,
	admin_app_name	VARCHAR(50)		NOT NULL default '',
	admin_app_path	VARCHAR(100) 	NOT NULL default '',
					PRIMARY KEY (admin_app_id)	
    ) ENGINE=InnoDb, DEFAULT CHARSET=utf8;");
 
 //Create Applications Permissions Table
 mysql_query("CREATE TABLE ab_admin_app_perms
     (
        admin_perm_id   INT(10)     NOT NULL auto_increment,
        admin_app_id    INT(10)     NOT NULL default 0,
        admin_user_id   INT(10)     NOT NULL default 0,
        admin_perm      INT(3)      NOT NULL default 1,
        PRIMARY KEY (admin_perm_id)
     )ENGINE=InnoDb, DEFAULT CHARSET=utf8;");
 //Create Post URL routing table
 mysql_query("CREATE TABLE ab_admin_page_router
     (
        admin_route_id   INT(11)        NOT NULL auto_increment,
        admin_post_id    INT(11)        NOT NULL ,
        admin_post_url   VARCHAR(150)   NOT NULL ,
        PRIMARY KEY (admin_route_id),
        KEY (admin_post_url),
        FOREIGN KEY (admin_post_id) REFERENCES ab_admin_content_info 
                (admin_content_id) ON DELETE CASCADE
     )ENGINE=InnoDb, DEFAULT CHARSET=utf8;"
         );
 
$config='<?php $DBVARS=array('
.'"username"=>"'.addslashes($dbuser).'",'
.'"password"=>"'.addslashes($dbpass).'",'
.'"hostname"=>"'.addslashes($dbhost).'",'
.'"db_name"=>"'.addslashes($dbname).'");';
file_put_contents('../.private/config.php',$config);
}

echo json_encode($errors);