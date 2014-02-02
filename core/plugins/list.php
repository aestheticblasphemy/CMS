<?php

echo '<table id="plugins-table">';
echo '<thead><tr><th>Plugin Name</th><th>Description</th>
        <th>Active</th><th>Settings</th></tr></thead><tbody>';
// { list enabled plugins first
foreach($PLUGINS as $name=>$plugin)
    {
        echo '<tr><th>',htmlspecialchars(@$plugin['name']),'</th>',
        '<td>',htmlspecialchars(@$plugin['description']),'</td>',
        '<td><a href="/core/plugins/disable.php?n=',
        htmlspecialchars($name),'">disable</a></td>';
        if(isset($plugin['admin']['settings']['file']))
        {
            echo '<td><a href="/core/plugins/plugin.php?_plugin='.  
                    strtolower(htmlspecialchars($plugin['name']))
                    .'&_page='
                    .$plugin['admin']['settings']['file']
                    .'">Settings</a>'.'</td>'; 
        }
        else 
        {
            echo '<td>&nbsp</td>';
        }
        '</tr>';
}
// }
// { then list disabled plugins
$dir=new DirectoryIterator(SCRIPTBASE . 'plugins');
foreach($dir as $plugin)
    {
        if($plugin->isDot())
            continue;
        $name=$plugin->getFilename();
        if(isset($PLUGINS[$name]))
            continue;
        require_once(SCRIPTBASE.'plugins/'.$name.'/plugin.php');
        echo '<tr id="ab-plugin-',htmlspecialchars($name),
        '" class="disabled">',
        '<th>',htmlspecialchars($plugin['name']),'</th>',
        '<td>',htmlspecialchars($plugin['description']),'</td>',
        '<td><a href="/core/plugins/enable.php?n=',
        htmlspecialchars($name),'">enable</a></td>';
        if(isset($plugin['admin']['settings']['file']))
        {
            echo '<td><a href="/plugins/'.  strtolower(htmlspecialchars($plugin['name'])).'/admin/'
                    .$plugin['admin']['settings']['file']
                    .'.php">Settings</a>'.'</td>'; 
        }
        else 
        {
            echo '<td>&nbsp</td>';
        }
        echo '</tr>';
}
// }
echo '</tbody></table>';