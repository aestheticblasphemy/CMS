<?php
require $_SERVER['DOCUMENT_ROOT']."/_lib/_base/basics.php";

    if(!isset($_REQUEST['type']))
    {
        echo '<option value=" ">NULL</option>';
    }
    else
    {
        $sql = "SELECT admin_section_id, admin_section_name FROM ab_admin_sections WHERE admin_section_entry_type="
                .intval($_REQUEST['type'])." and admin_section_terminal=1;";

        $result = db_all($sql, 'admin_section_id');
        foreach($result as $section_val)
        {
            echo '<option value="'.$section_val['admin_section_id'].'">'.$section_val['admin_section_name'].'</option>';
        }
        if(empty($result))
        {
            echo '<option value=" ">NULL</option>';
        }
    }
