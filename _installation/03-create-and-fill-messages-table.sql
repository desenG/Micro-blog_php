CREATE TABLE `microBlog`.`messages` ( 
`message_id` INT(10) NOT NULL AUTO_INCREMENT ,  
`message_text` TEXT NOT NULL ,  
`user_id` INT(10) UNSIGNED NOT NULL ,  
`time_stamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,    
PRIMARY KEY  (`message_id`) ) ENGINE = InnoDB

INSERT INTO `microBlog`.`messages` (`message_id`, `message_text`, `user_id`, `time_stamp`) 
							VALUES (NULL, 'my post message 1', '1', CURRENT_TIMESTAMP), 
								   (NULL, 'my post message 2', '1', CURRENT_TIMESTAMP);