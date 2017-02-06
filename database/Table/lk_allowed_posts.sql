DROP TABLE IF EXISTS `lk_allowed_posts`;
CREATE TABLE IF NOT EXISTS `lk_allowed_posts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `section_id` INT NULL,
  `position_id` INT NULL,
  `allowed_posts` INT NULL,
  PRIMARY KEY (`id`));
