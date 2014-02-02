<?php

if($version==0)
    { // create tables
    db_query('CREATE TABLE ab_admin_comments (
            admin_comment_id INT(11) NOT NULL auto_increment,
            admin_comment_body TEXT,
            admin_comment_author_name TEXT,
            admin_comment_author_email TEXT,
            admin_comment_author_website TEXT,
            admin_comment_content_id INT,
            admin_comment_status INT,
            admin_content_create_date datetime,
            PRIMARY KEY (admin_comment_id),
            FOREIGN KEY (admin_comment_content_id)
            REFERENCES ab_admin_content_info(admin_content_id) 
            ON DELETE CASCADE
) ENGINE=InnoDb DEFAULT CHARSET=utf8;');
$version++;
}
if($version==1){ // add moderation details
    $SITEGLOBALS[$pname.'|moderation_email']='';
    $SITEGLOBALS[$pname.'|moderation_enabled']='no';
$version++;
}