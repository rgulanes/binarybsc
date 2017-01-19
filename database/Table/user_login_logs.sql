DROP TABLE IF EXISTS `binarybsc`.`user_login_logs`;
CREATE TABLE IF NOT EXISTS `binarybsc`.`user_login_logs` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NULL,
  `ip_address` VARCHAR(45) NULL,
  `action` VARCHAR(45) NULL,
  `datetime` DATETIME NULL,
  PRIMARY KEY (`id`));
