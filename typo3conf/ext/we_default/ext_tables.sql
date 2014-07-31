#
# Table structure for table 'sys_domain'
#
CREATE TABLE `sys_domain` (
	include_typoscript_path varchar(255) DEFAULT '' NOT NULL,
);

#
# Table structure for table 'pages'
#
CREATE TABLE `pages` (
	hide_pagetitle varchar(255) DEFAULT '0',
	hide_pagetitle_subpage varchar(255) DEFAULT '0',
);

CREATE TABLE `cf_extbase_datamapfactory_datamap` (
	id int(11) unsigned NOT NULL auto_increment,
	identifier varchar(250) DEFAULT '' NOT NULL,
	expires int(11) unsigned DEFAULT '0' NOT NULL,
	content mediumblob,
	PRIMARY KEY (id),
	KEY cache_id (identifier,expires)
) ENGINE=InnoDB;

CREATE TABLE `cf_extbase_datamapfactory_datamap_tags` (
	id int(11) unsigned NOT NULL auto_increment,
	identifier varchar(250) DEFAULT '' NOT NULL,
	tag varchar(250) DEFAULT '' NOT NULL,
	PRIMARY KEY (id),
	KEY cache_id (identifier),
	KEY cache_tag (tag)
) ENGINE=InnoDB;