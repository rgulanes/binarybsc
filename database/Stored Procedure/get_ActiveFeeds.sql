DROP PROCEDURE IF EXISTS get_ActiveFeeds;
DELIMITER $$

# CALL get_ActiveFeeds();
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_ActiveFeeds`()
BEGIN
	SELECT n.id, n.n_title, n.n_status, DATE_FORMAT(n.date_create,'%m-%d-%Y') AS date_create,
		s.description AS section,
		(CASE
			WHEN n.n_status = 1 THEN 'Active' ELSE 'Inactive' END) AS status_desc
		FROM newsfeeds_tbl n 
			LEFT JOIN lk_feed_section s ON s.id = n.n_section
		WHERE n.n_status <> 2 ORDER BY n.n_title DESC;
END$$
DELIMITER ;
