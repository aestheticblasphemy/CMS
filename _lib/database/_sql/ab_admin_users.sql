CREATE TABLE ab_admin_users (
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
	) ENGINE=InnoDb,DEFAULT CHARSET=utf8;