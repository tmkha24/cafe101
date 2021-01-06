

CREATE TABLE IF NOT EXISTS `web_configs` (
	 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	 `path` varchar(100)  NOT NULL,
	 `value` varchar(255) NOT NULL,
	 `created` datetime DEFAULT NULL,
	 `modified` datetime DEFAULT NULL,
	 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `text_translates` (
	 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	 `msgid` varchar(255) NOT NULL,
	 `msgstr` varchar(255) DEFAULT NULL,
	 `created` datetime DEFAULT NULL,
	 `modified` datetime DEFAULT NULL,
	 PRIMARY KEY (`id`)
)ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `login_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `token` char(32) NOT NULL,
  `duration` varchar(32) NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(11) unsigned DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `active` varchar(3) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`username`),
  KEY `mail` (`email`),
  KEY `users_FKIndex1` (`user_group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;


INSERT INTO `users` (`id`, `user_group_id`, `username`, `password`, `email`, `name`, `active`, `created`, `modified`) VALUES
(1, 1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@admin.com', 'Admin', '1', now(), now());


CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `alias_name` varchar(100) DEFAULT NULL,
  `allowRegistration` int(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO `user_groups` (`id`, `name`, `alias_name`, `allowRegistration`, `created`, `modified`) VALUES
(1, 'Admin', 'Admin', 0, now(), now()),
(2, 'User', 'User', 1, now(), now()),
(3, 'Guest', 'Guest', 0, now(), now());


CREATE TABLE IF NOT EXISTS `user_group_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_group_id` int(10) unsigned NOT NULL,
  `controller` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `allowed` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;



INSERT INTO `user_group_permissions` (`id`, `user_group_id`, `controller`, `action`, `allowed`) VALUES
(1, 1, 'Pages', 'display', 1),
(2, 2, 'Pages', 'display', 1),
(3, 3, 'Pages', 'display', 1),
(4, 1, 'UserGroupPermissions', 'index', 1),
(5, 2, 'UserGroupPermissions', 'index', 0),
(6, 3, 'UserGroupPermissions', 'index', 0),
(7, 1, 'UserGroupPermissions', 'update', 1),
(8, 2, 'UserGroupPermissions', 'update', 0),
(9, 3, 'UserGroupPermissions', 'update', 0),
(10, 1, 'UserGroups', 'index', 1),
(11, 2, 'UserGroups', 'index', 0),
(12, 3, 'UserGroups', 'index', 0),
(13, 1, 'UserGroups', 'addGroup', 1),
(14, 2, 'UserGroups', 'addGroup', 0),
(15, 3, 'UserGroups', 'addGroup', 0),
(16, 1, 'UserGroups', 'editGroup', 1),
(17, 2, 'UserGroups', 'editGroup', 0),
(18, 3, 'UserGroups', 'editGroup', 0),
(19, 1, 'UserGroups', 'deleteGroup', 1),
(20, 2, 'UserGroups', 'deleteGroup', 0),
(21, 3, 'UserGroups', 'deleteGroup', 0),
(22, 1, 'Users', 'index', 1),
(23, 2, 'Users', 'index', 0),
(24, 3, 'Users', 'index', 0),
(25, 1, 'Users', 'viewUser', 1),
(26, 2, 'Users', 'viewUser', 0),
(27, 3, 'Users', 'viewUser', 0),
(28, 1, 'Users', 'myprofile', 1),
(29, 2, 'Users', 'myprofile', 1),
(30, 3, 'Users', 'myprofile', 0),
(31, 1, 'Users', 'login', 1),
(32, 2, 'Users', 'login', 1),
(33, 3, 'Users', 'login', 1),
(34, 1, 'Users', 'logout', 1),
(35, 2, 'Users', 'logout', 1),
(36, 3, 'Users', 'logout', 1),
(37, 1, 'Users', 'register', 1),
(38, 2, 'Users', 'register', 1),
(39, 3, 'Users', 'register', 1),
(40, 1, 'Users', 'changePassword', 1),
(41, 2, 'Users', 'changePassword', 1),
(42, 3, 'Users', 'changePassword', 0),
(43, 1, 'Users', 'changeUserPassword', 1),
(44, 2, 'Users', 'changeUserPassword', 0),
(45, 3, 'Users', 'changeUserPassword', 0),
(46, 1, 'Users', 'addUser', 1),
(47, 2, 'Users', 'addUser', 0),
(48, 3, 'Users', 'addUser', 0),
(49, 1, 'Users', 'editUser', 1),
(50, 2, 'Users', 'editUser', 0),
(51, 3, 'Users', 'editUser', 0),
(52, 1, 'Users', 'dashboard', 1),
(53, 2, 'Users', 'dashboard', 1),
(54, 3, 'Users', 'dashboard', 0),
(55, 1, 'Users', 'deleteUser', 1),
(56, 2, 'Users', 'deleteUser', 0),
(57, 3, 'Users', 'deleteUser', 0),
(58, 1, 'Users', 'makeActive', 1),
(59, 2, 'Users', 'makeActive', 0),
(60, 3, 'Users', 'makeActive', 0),
(61, 1, 'Users', 'accessDenied', 1),
(62, 2, 'Users', 'accessDenied', 1),
(63, 3, 'Users', 'accessDenied', 1),
(64, 1, 'Users', 'userVerification', 1),
(65, 2, 'Users', 'userVerification', 1),
(66, 3, 'Users', 'userVerification', 1),
(67, 1, 'Users', 'forgotPassword', 1),
(68, 2, 'Users', 'forgotPassword', 1),
(69, 3, 'Users', 'forgotPassword', 1),
(70, 1, 'Suppliers', 'index', 1),
(71, 2, 'Suppliers', 'index', 1),
(72, 3, 'Suppliers', 'index', 0),
(73, 1, 'Suppliers', 'view', 1),
(74, 2, 'Suppliers', 'view', 1),
(75, 3, 'Suppliers', 'view', 0),
(76, 1, 'Suppliers', 'add', 1),
(77, 2, 'Suppliers', 'add', 1),
(78, 3, 'Suppliers', 'add', 0),
(79, 1, 'Suppliers', 'edit', 1),
(80, 2, 'Suppliers', 'edit', 1),
(81, 3, 'Suppliers', 'edit', 0),
(82, 1, 'Suppliers', 'delete', 1),
(83, 2, 'Suppliers', 'delete', 1),
(84, 3, 'Suppliers', 'delete', 0),
(85, 1, 'Members', 'index', 1),
(86, 2, 'Members', 'index', 1),
(87, 3, 'Members', 'index', 0),
(88, 1, 'Members', 'view', 1),
(89, 2, 'Members', 'view', 1),
(90, 3, 'Members', 'view', 0),
(91, 1, 'Members', 'add', 1),
(92, 2, 'Members', 'add', 1),
(93, 3, 'Members', 'add', 0),
(94, 1, 'Members', 'edit', 1),
(95, 2, 'Members', 'edit', 1),
(96, 3, 'Members', 'edit', 0),
(97, 1, 'Members', 'delete', 1),
(98, 2, 'Members', 'delete', 1),
(99, 3, 'Members', 'delete', 0),
(100, 1, 'Staffs', 'index', 1),
(101, 2, 'Staffs', 'index', 1),
(102, 3, 'Staffs', 'index', 0),
(103, 1, 'Staffs', 'view', 1),
(104, 2, 'Staffs', 'view', 1),
(105, 3, 'Staffs', 'view', 0),
(106, 1, 'Staffs', 'add', 1),
(107, 2, 'Staffs', 'add', 1),
(108, 3, 'Staffs', 'add', 0),
(109, 1, 'Staffs', 'edit', 1),
(110, 2, 'Staffs', 'edit', 1),
(111, 3, 'Staffs', 'edit', 0),
(112, 1, 'Staffs', 'delete', 1),
(113, 2, 'Staffs', 'delete', 1),
(114, 3, 'Staffs', 'delete', 0),
(115, 1, 'StaffsNotifications', 'index', 1),
(116, 2, 'StaffsNotifications', 'index', 1),
(117, 3, 'StaffsNotifications', 'index', 0),
(118, 1, 'StaffsNotifications', 'view', 1),
(119, 2, 'StaffsNotifications', 'view', 1),
(120, 3, 'StaffsNotifications', 'view', 0),
(121, 1, 'StaffsNotifications', 'add', 1),
(122, 2, 'StaffsNotifications', 'add', 1),
(123, 3, 'StaffsNotifications', 'add', 0),
(124, 1, 'StaffsNotifications', 'edit', 1),
(125, 2, 'StaffsNotifications', 'edit', 1),
(126, 3, 'StaffsNotifications', 'edit', 0),
(127, 1, 'StaffsNotifications', 'delete', 1),
(128, 2, 'StaffsNotifications', 'delete', 1),
(129, 3, 'StaffsNotifications', 'delete', 0),
(130, 1, 'MembersNotifications', 'index', 1),
(131, 2, 'MembersNotifications', 'index', 1),
(132, 3, 'MembersNotifications', 'index', 0),
(133, 1, 'MembersNotifications', 'view', 1),
(134, 2, 'MembersNotifications', 'view', 1),
(135, 3, 'MembersNotifications', 'view', 0),
(136, 1, 'MembersNotifications', 'edit', 1),
(137, 2, 'MembersNotifications', 'edit', 1),
(138, 3, 'MembersNotifications', 'edit', 0),
(139, 1, 'MembersNotifications', 'add', 1),
(140, 2, 'MembersNotifications', 'add', 1),
(141, 3, 'MembersNotifications', 'add', 0),
(142, 1, 'MembersNotifications', 'delete', 1),
(143, 2, 'MembersNotifications', 'delete', 1),
(144, 3, 'MembersNotifications', 'delete', 0),
(145, 1, 'Notifications', 'index', 1),
(146, 2, 'Notifications', 'index', 1),
(147, 3, 'Notifications', 'index', 0),
(148, 1, 'Notifications', 'view', 1),
(149, 2, 'Notifications', 'view', 1),
(150, 3, 'Notifications', 'view', 0),
(151, 1, 'Notifications', 'add', 1),
(152, 2, 'Notifications', 'add', 1),
(153, 3, 'Notifications', 'add', 0),
(154, 1, 'Notifications', 'edit', 1),
(155, 2, 'Notifications', 'edit', 1),
(156, 3, 'Notifications', 'edit', 0),
(157, 1, 'Notifications', 'delete', 1),
(158, 2, 'Notifications', 'delete', 1),
(159, 3, 'Notifications', 'delete', 0)





CREATE TABLE IF NOT EXISTS `contacts` (
																			 `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
																			 `name` varchar(100) NOT NULL,
																			 `gender` tinyint(1) NOT NULL DEFAULT '1',
																			 `phone` varchar(50)  NULL,
																			 `email` varchar(100)  NULL,
																			 `address1` varchar(255)  NULL,
																			 `address2` varchar(255)  NULL,
																			 `country` varchar(100)  NULL,
																			 `region` varchar(100)  NULL,
																			 `city` varchar(100)  NULL,
																			 `ward` varchar(100)  NULL,
																			 `description` text  NULL,
																			 `active` tinyint(1) NOT NULL DEFAULT '1',
																			 `created` DATETIME NOT NULL,
																			 `updated` DATETIME NOT NULL,
																			 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `products` (
																				`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
																				`name` varchar(100)  NOT NULL,
																				`brand` varchar(50)  NULL,
																				`model`  varchar(50)  NULL,
																				`list_price` decimal  NULL,
																				`unit_price` decimal  NULL,
																				`tax_rate` decimal  NULL,
																				`description` text COLLATE utf8_unicode_ci NULL,
																				`currency`  varchar(100)  NULL,
																				`image1` varchar(100)  NULL,
																				`image2` varchar(100)  NULL,
																				`image3` varchar(100)  NULL,
																				`image4` varchar(100)  NULL,
																				`image5` varchar(100)  NULL,
																				`active` tinyint(1) NOT NULL DEFAULT '1',
																				`created` DATETIME NOT NULL,
																				`updated` DATETIME NOT NULL,
																				PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `categories` (
																					`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
																					`name` varchar(100) NOT NULL,
																					`description` text  NULL,
																					`parent_id` int(11)  NULL,
																					`active` tinyint(1) NOT NULL DEFAULT '1',
																					`created` DATETIME NOT NULL,
																					`updated` DATETIME NOT NULL,
																					`lft` int(11) NOT NULL,
																					`rght` int(11) NOT NULL,
																					PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `product_categories` (
																									`id` int(11) unsigned NOT NULL auto_increment,
																									`product_id` INT  NULL,
																									`category_id` INT  NULL,
																									`created` DATETIME DEFAULT NULL,
																									`updated` DATETIME DEFAULT NULL,
																									PRIMARY KEY  (`id`)
)ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;




CREATE TABLE IF NOT EXISTS `vendors` (
																			 `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
																			 `name` varchar(100)  NOT NULL,
																			 `phone` varchar(50)  NULL,
																			 `email` varchar(100)  NULL,
																			 `address1` varchar(255)  NULL,
																			 `address2` varchar(255)  NULL,
																			 `country` varchar(100)  NULL,
																			 `region` varchar(100)  NULL,
																			 `city` varchar(100)  NULL,
																			 `ward` varchar(100)  NULL,
																			 `description` text COLLATE utf8_unicode_ci NULL,
																			 `active` tinyint(1) NOT NULL DEFAULT '1',
																			 `created` DATETIME NOT NULL,
																			 `updated` DATETIME NOT NULL,
																			 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;





CREATE TABLE IF NOT EXISTS `quotes` (
																				`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
																				`name` varchar(100)  NOT NULL,
																				`number` varchar(50)  NULL,
																				`status` tinyint(1) NOT NULL DEFAULT '0',
																				`date_expired`varchar(100)  NULL,
																				`term_condition` text COLLATE utf8_unicode_ci NULL,
																				`description` text COLLATE utf8_unicode_ci NULL,
																				`currency`  varchar(100)  NULL,

																				`from_company_name` varchar(50)  NULL,
																				`from_contact_name` varchar(255)  NOT NULL,
																				`from_contact_phone` varchar(255)   NOT NULL,
																				`from_contact_email` varchar(255)   NOT NULL,
																				`from_address1` varchar(255)  NULL,
																				`from_address2` varchar(255)  NULL,

																				`to_company_name` varchar(50)  NULL,
																				`to_contact_name` varchar(255)  NOT NULL,
																				`to_contact_phone` varchar(255)   NOT NULL,
																				`to_contact_email` varchar(255)   NOT NULL,
																				`to_address1` varchar(255)  NULL,
																				`to_address2` varchar(255)  NULL,


																				`amount`  decimal  NULL,
																				`discount_amount`  decimal  NULL,
																				`shipping_cost`  decimal  NULL,
																				`tax_amount`  decimal  NULL,
																				`grant_total`  decimal  NULL,

																				`active` tinyint(1) NOT NULL DEFAULT '1',
																				`created` DATETIME NOT NULL,
																				`updated` DATETIME NOT NULL,
																				PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `quote_items` (
																			`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
																			`quote_id` int(11) unsigned  NOT NULL,
																			`product_id` int(11) unsigned  NOT NULL,

																			`name` varchar(255)  NULL,
																			`qty` int(11)  NULL,
																			`tax_rate` decimal  NULL,
																			`list_price` decimal  NULL,
																			`unit_price` decimal  NULL,
																			`amount` decimal  NULL,
																			`created` DATETIME NOT NULL,
																			`updated` DATETIME NOT NULL,
																			PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;






CREATE TABLE IF NOT EXISTS `orders` (
																			`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
																			`number` varchar(50)  NULL,
																			`quote_id` int(11) unsigned  NULL,

																			`status` tinyint(10) NOT NULL DEFAULT '0',

																			`billing_contact_id` int(11)   NOT NULL,
																			`billing_company_name` varchar(255)  NOT NULL,
																			`billing_contact_name` varchar(255)  NOT NULL,
																			`billing_contact_phone` varchar(255)   NOT NULL,
																			`billing_contact_email` varchar(255)   NOT NULL,

																			`billing_address1` varchar(255)  NULL,
																			`billing_address2` varchar(255)  NULL,

																			`shipping_contact_id` int(11) unsigned   NULL,
																			`shipping_company_name` varchar(255)  NOT NULL,
																			`shipping_contact_name` varchar(255)  NOT NULL,
																			`shipping_contact_phone` varchar(255)   NOT NULL,
																			`shipping_contact_email` varchar(255)   NOT NULL,

																			`shipping_address1` varchar(255)  NULL,
																			`shipping_address2` varchar(255)  NULL,
																			`same_as_billing_address` tinyint(1) NOT NULL DEFAULT '1',

																			`payment_method` varchar(255)  NULL,
																			`payment_information`text COLLATE utf8_unicode_ci NULL,
																			`shipping_information` text COLLATE utf8_unicode_ci NULL,


																			`description` text COLLATE utf8_unicode_ci NULL,
																			`currency`  varchar(100)  NULL,
																			`amount`  decimal  NULL,
																			`discount_amount`  decimal  NULL,
																			`shipping_cost`  decimal  NULL,
																			`tax_amount`  decimal  NULL,
																			`grant_total`  decimal  NULL,

																			`active` tinyint(1) NOT NULL DEFAULT '1',
																			`created` DATETIME NOT NULL,
																			`updated` DATETIME NOT NULL,
																			PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `order_items` (
																					 `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
																					 `order_id` int(11) unsigned  NOT NULL,
																					 `product_id` int(11) unsigned  NOT NULL,

																					 `name` varchar(255)  NULL,
																					 `qty` int(11)  NULL,
																					 `tax_rate` decimal  NULL,
																					 `list_price` decimal  NULL,
																					 `unit_price` decimal  NULL,
																					 `amount` decimal  NULL,
																					 `created` DATETIME NOT NULL,
																					 `updated` DATETIME NOT NULL,
																					 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;







CREATE TABLE IF NOT EXISTS `invoices` (
																			`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
																			`number` varchar(50)  NULL,
																			`order_id` varchar(50)   NULL,

																			`status` tinyint(10) NOT NULL DEFAULT '0',

																			`billing_contact_id` int(11) unsigned  NOT NULL,
																			`billing_company_name` varchar(255)  NOT NULL,
																			`billing_contact_name` varchar(255)  NOT NULL,
																			`billing_contact_phone` varchar(255)   NOT NULL,
																			`billing_contact_email` varchar(255)   NOT NULL,

																			`billing_address1` varchar(255)  NULL,
																			`billing_address2` varchar(255)  NULL,

																			`shipping_contact_id` int(11) unsigned   NULL,
																			`shipping_company_name` varchar(255)  NOT NULL,
																			`shipping_contact_name` varchar(255)  NOT NULL,
																			`shipping_contact_phone` varchar(255)   NOT NULL,
																			`shipping_contact_email` varchar(255)   NOT NULL,

																			`shipping_address1` varchar(255)  NULL,
																			`shipping_address2` varchar(255)  NULL,
																			`same_as_billing_address` tinyint(1) NOT NULL DEFAULT '1',

																			`payment_method` varchar(255)  NULL,
																			`payment_information` text COLLATE utf8_unicode_ci NULL,
																			`shipping_information` text COLLATE utf8_unicode_ci NULL,


																			`description` text COLLATE utf8_unicode_ci NULL,
																			`currency`  varchar(100)  NULL,
																			`amount`  decimal  NULL,
																			`discount_amount`  decimal  NULL,
																			`shipping_cost`  decimal  NULL,
																			`tax_amount`  decimal  NULL,
																			`grant_total`  decimal  NULL,

																			`active` tinyint(1) NOT NULL DEFAULT '1',
																			`created` DATETIME NOT NULL,
																			`updated` DATETIME NOT NULL,
																			PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `invoice_items` (
																					 `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
																					 `invoice_id` int(11) unsigned  NOT NULL,
																					 `product_id` int(11) unsigned  NOT NULL,

																					 `name` varchar(255)  NULL,
																					 `qty` int(11)  NULL,
																					 `tax_rate` decimal  NULL,
																					 `list_price` decimal  NULL,
																					 `unit_price` decimal  NULL,
																					 `amount` decimal  NULL,
																					 `created` DATETIME NOT NULL,
																					 `updated` DATETIME NOT NULL,
																					 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

