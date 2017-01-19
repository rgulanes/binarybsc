DROP TABLE IF EXISTS `binarybsc`.`lk_allowed_posts`;
CREATE TABLE IF NOT EXISTS `binarybsc`.`lk_allowed_posts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `section_id` INT NULL,
  `position_id` INT NULL,
  `allowed_posts` INT NULL,
  PRIMARY KEY (`id`));
