DROP TABLE IF EXISTS `lk_feed_position`;
CREATE TABLE IF NOT EXISTS `lk_feed_position` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(100) NULL,
  `status_id` INT NULL,
  `created_by` VARCHAR(45) NULL,
  `date_create` DATETIME NULL,
  `updated_by` VARCHAR(45) NULL,
  `date_update` DATETIME NULL,
  PRIMARY KEY (`id`));
