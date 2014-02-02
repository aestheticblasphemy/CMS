CREATE TABLE ab_admin_apps (
	admin_app_id	INT(2)			NOT NULL auto_increment,
	admin_app_name	VARCHAR(50)		NOT NULL default '',
	admin_app_path	VARCHAR(100) 	NOT NULL default '',
					PRIMARY KEY (admin_app_id)	
) ENGINE=MyISAM;