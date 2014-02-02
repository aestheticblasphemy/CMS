CREATE TABLE ab_admin_content 
(
	admin_content_index 			INT				NOT NULL auto_increment,
	admin_content_create_date		DATETIME		NOT NULL default 0,
	admin_content_modify_date		DATETIME		NOT NULL default 0,
	admin_content_entry_type		INT(4) 			NOT NULL default '1',
	admin_content_author_id			INT(7)			,
	admin_content_modify_user_id	INT(7)			,
	admin_content_title				VARCHAR(100)	,
	admin_content_linked_res_id		INT				,
	admin_content_summary			VARCHAR(1500)	,
	admin_content_published_flag	TINYINT(1)		default '0',
	
		PRIMARY KEY (admin_content_index),
		KEY (admin_content_create_date),
		KEY (admin_content_entry_type),
		KEY (admin_content_author_id),
		KEY (admin_content_published_flag)
)	ENGINE=MyISAM;