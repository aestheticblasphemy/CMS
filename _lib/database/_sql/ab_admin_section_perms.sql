CREATE TABLE ab_admin_section_perms
(
	admin_section_perm_id	INT(10) 	NOT NULL auto_increment,
	admin_section_id	INT(10)		NOT NULL default '0',
	admin_user_id	INT(10)		NOT NULL default '0',
	admin_section_perm		INT(3)		NOT NULL default '1',
					PRIMARY KEY (admin_section_perm_id)
) ENGINE=InnoDb, DEFAULT CHARSET=utf8;