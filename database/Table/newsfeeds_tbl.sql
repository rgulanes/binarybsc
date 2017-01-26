DROP TABLE IF EXISTS `binarybsc`.`newsfeeds_tbl`;
CREATE TABLE IF NOT EXISTS `binarybsc`.`newsfeeds_tbl` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `n_title` TEXT NULL,
  `n_content` TEXT NULL,
  `n_section` INT NULL,
  `n_position` INT NULL,
  `n_status` INT NULL,
  `created_by` VARCHAR(50) NULL,
  `date_create` DATETIME NULL,
  `updated_by` VARCHAR(50) NULL,
  `date_update` DATETIME NULL,
  PRIMARY KEY (`id`));