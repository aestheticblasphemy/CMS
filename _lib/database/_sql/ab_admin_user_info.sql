CREATE TABLE ab_admin_users_info (
	admin_user_id 		INT(10)			NOT NULL ,
	admin_user_fname	VARCHAR(30)		NOT NULL default '',
	admin_user_lname	VARCHAR(30)		NOT NULL default '',
	admin_user_aline1	VARCHAR(150)	NOT NULL default '',
	admin_user_aline2	VARCHAR(150)	NOT NULL default '',
	admin_user_aline3	VARCHAR(150)	NOT NULL default '',
	admin_user_city		VARCHAR(100)	NOT NULL default '',
	admin_user_state	VARCHAR(100)	NOT NULL default '',
	admin_user_country	VARCHAR(50)		NOT NULL default '',
	admin_user_pin		VARCHAR(10)		NOT NULL default '',
	admin_user_phone	INTEGER(11)		NOT NULL default '0',
	admin_user_mobile	INTEGER(11)		NOT NULL default '0',
				PRIMARY KEY (admin_user_id),
				FOREIGN KEY (admin_user_id) REFERENCES ab_admin_users(admin_user_id) ON DELETE CASCADE
	) ENGINE=InnoDb;