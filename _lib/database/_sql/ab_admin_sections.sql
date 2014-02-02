CREATE TABLE ab_admin_sections (
	admin_section_id		INT(4)		NOT NULL auto_increment,
	admin_section_name		VARCHAR(20)	NOT NULL default '',
        admin_section_level             INT(3)          NOT NULL default 0,
        admin_section_terminal          INT(1)          NOT NULL default 1,
        admin_section_url               VARCHAR(100)    NOT NULL,
        admin_section_parent_id         INT(6)          default NULL,
        admin_section_entry_type        INT(4)          default NULL,
	PRIMARY KEY (admin_section_id)
	) ENGINE=InnoDb, DEFAULT CHARSET=utf8;