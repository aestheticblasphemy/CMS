CREATE TABLE ab_admin_perms(
	admin_perm_id	INT(10) 	NOT NULL auto_increment,
	admin_app_id	INT(10)		NOT NULL default '0',
	admin_user_id	INT(10)		NOT NULL default '0',
	admin_perm		INT(3)		NOT NULL default '1',
					PRIMARY KEY (admin_perm_id),
					FOREIGN KEY (admin_user_id) REFERENCES ab_admin_users(admin_user_id) ON DELETE CASCADE,
					FOREIGN KEY (admin_app_id) REFERENCES ab_admin_apps(admin_app_id) ON DELETE CASCADE
) ENGINE=InnoDb;