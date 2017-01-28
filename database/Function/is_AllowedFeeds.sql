DROP FUNCTION IF EXISTS is_AllowedFeeds;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` FUNCTION `is_AllowedFeeds`(`section` INT(11), `position` INT(11)) RETURNS INTEGER
BEGIN
	DECLARE is_allowed INT(11);

	SET is_allowed = (SELECT (a.allowed_posts - COUNT(n.id)) AS is_allowed FROM newsfeeds_tbl n
			LEFT JOIN lk_allowed_posts a ON a.section_id = n.n_section AND a.position_id = n.n_position
		WHERE n.n_status NOT IN (2) AND a.section_id = section AND a.position_id = position);
	
    RETURN is_allowed;
END$$
DELIMITER ;
