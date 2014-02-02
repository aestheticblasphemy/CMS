CREATE TABLE ab_admin_groups (
id 		INT(11) 	NOT NULL AUTO_INCREMENT,
name 		text,

PRIMARY KEY (id)
) DEFAULT CHARSET=utf8;

insert into ab_admin_groups values(1,"_superadministrators");
insert into ab_admin_groups values(2,"_administrators");