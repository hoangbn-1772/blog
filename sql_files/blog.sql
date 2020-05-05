CREATE DATABASE blog;
CREATE TABLE `users`(
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`display_name` text DEFAULT NULL,
	`email` text NOT NULL,
	`birthday` date DEFAULT NULL,
	`phone_number` text DEFAULT NULL,
	`gender` tinyint(1) DEFAULT 0,
	`address` text DEFAULT NULL,
	`avatar` text DEFAULT NULL,
	`created_at` datetime NOT NULL,
	`modified_at` datetime NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=`utf8`;
CREATE TABLE posts(
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`user_id` int(11) NOT NULL,
	`title` text NOT NULL,
	`type` int(4) DEFAULT NULL,
	`content` text NOT NULL,
	`is_publish` tinyint(1) DEFAULT 0,
	`created_at` datetime NOT NULL,
	`modified_at` datetime NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`user_id`) REFERENCES users(`id`)
)ENGINE=InnoDB DEFAULT CHARSET=`utf8`;
