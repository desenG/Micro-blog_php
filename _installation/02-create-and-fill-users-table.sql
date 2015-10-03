CREATE TABLE `microBlog`.`users` ( 
`user_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,  
`user_name` TEXT NOT NULL ,  
`user_hash` CHAR(32) NOT NULL ,    
PRIMARY KEY  (`user_id`) 
) ENGINE = InnoDB

INSERT INTO `microBlog`.`users` (`user_id`, `user_name`, `user_hash`) 
						 VALUES (NULL, 'helen', 'pass123');
