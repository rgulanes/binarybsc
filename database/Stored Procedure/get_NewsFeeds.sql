DROP PROCEDURE IF EXISTS get_NewsFeeds;
DELIMITER $$

# CALL get_NewsFeeds('Home', 'Top');
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_NewsFeeds`(IN _section TEXT, IN _position TEXT)
BEGIN
	SELECT n.n_title, n.n_content, n.n_image_url, n.created_by, n.date_create FROM newsfeeds_tbl n
		LEFT JOIN lk_feed_position p ON p.id = n.n_position
		LEFT JOIN lk_feed_section s ON s.id= n.n_section
	WHERE n.n_status = 1 AND p.description = _position AND s.description = _section;
END$$
DELIMITER ;
