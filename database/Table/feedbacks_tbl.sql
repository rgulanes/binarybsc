DROP TABLE IF EXISTS `feedbacks_tbl`;
CREATE TABLE IF NOT EXISTS `feedbacks_tbl` (
  `feedback_id` INT NOT NULL AUTO_INCREMENT,
  `sender` VARCHAR(100) NULL,
  `email_address` VARCHAR(100) NULL,
  `ip_address` VARCHAR(100) NULL,
  `feedback` TEXT NULL,
  `email_status` INT NULL,
  `is_deleted` INT NULL,
  `is_read` INT NULL,
  `timestamp` DATETIME NULL,
  PRIMARY KEY (`feedback_id`));
