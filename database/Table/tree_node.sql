DROP TABLE IF EXISTS `tree_node`;
CREATE TABLE IF NOT EXISTS `tree_node` (
  `node_id` INT NOT NULL AUTO_INCREMENT,
  `tree_id` INT NULL,
  `node_desc` TEXT NULL,
  `parent_node` TEXT NULL,
  `node_icon` VARCHAR(45) NULL,
  `node_status` INT NULL,
  `directory` TEXT NULL,
  `created_by` VARCHAR(45) NULL,
  `datetime` DATETIME NULL,
  PRIMARY KEY (`node_id`));
