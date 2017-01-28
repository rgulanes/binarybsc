DROP TABLE IF EXISTS `photo_tbl`;
CREATE TABLE IF NOT EXISTS `photo_tbl` (
  `photo_id` INT NOT NULL AUTO_INCREMENT,
  `album_id` INT NULL,
  `img_title` VARCHAR(100) NULL,
  `img_desc` TEXT NULL,
  `img_url` TEXT NULL,
  `img_status` INT NULL,
  `is_deleted` INT NULL,
  `created_by` VARCHAR(45) NULL,
  `date_create` DATETIME NULL,
  `updated_by` VARCHAR(45) NULL,
  `date_update` DATETIME NULL,
  PRIMARY KEY (`photo_id`));
