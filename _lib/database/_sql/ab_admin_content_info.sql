CREATE TABLE ab_admin_content_info 
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
)	ENGINE=InnoDb, DEFAULT CHARSET=utf8;