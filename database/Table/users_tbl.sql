CREATE TABLE `binarybsc`.`users_tbl` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NULL,
  `user_lname` VARCHAR(45) NULL,
  `user_fname` VARCHAR(45) NULL,
  `user_password` VARCHAR(45) NULL,
  `user_role` INT NULL,
  `user_status` INT NULL,
  `created_by` VARCHAR(45) NULL,
  `date_create` DATETIME NULL,
  PRIMARY KEY (`user_id`));
