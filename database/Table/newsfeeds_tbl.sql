DROP TABLE IF EXISTS `newsfeeds_tbl`;
CREATE TABLE IF NOT EXISTS `newsfeeds_tbl` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `n_title` TEXT NULL,
  `n_content` TEXT NULL,
  `n_section` INT NULL,
  `n_position` INT NULL,
  `n_status` INT NULL,
  `n_image_url` VARCHAR(100) NULL,
  `created_by` VARCHAR(50) NULL,
  `date_create` DATETIME NULL,
  `updated_by` VARCHAR(50) NULL,
  `date_update` DATETIME NULL,
  PRIMARY KEY (`id`));
