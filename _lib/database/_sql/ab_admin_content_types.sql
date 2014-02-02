CREATE TABLE ab_admin_content_types
(
	admin_content_type_id 		INT(4) 		NOT NULL 	auto_increment,
	admin_content_type			INT(4)		NOT NULL	default '1',
	admin_content_table			VARCHAR(50)	NOT NULL	default 'ab_admin_data_blog',
				PRIMARY KEY (admin_content_type_id),
				KEY (admin_content_type)
) ENGINE=MyISAM;