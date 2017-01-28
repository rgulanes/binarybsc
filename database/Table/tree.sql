DROP TABLE IF EXISTS `tree`;
CREATE TABLE IF NOT EXISTS `tree` (
  `tree_id` INT NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(45) NULL,
  `create_by` VARCHAR(45) NULL,
  `date_create` DATETIME NULL,
  PRIMARY KEY (`tree_id`));
