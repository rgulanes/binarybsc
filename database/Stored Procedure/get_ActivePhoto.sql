DROP PROCEDURE IF EXISTS get_ActivePhoto;
DELIMITER $$

# CALL get_ActivePhoto(2);
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_ActivePhoto`(IN node_id INT)
BEGIN
	SELECT photo_id, img_title, img_desc, img_url, img_status, created_by, date_create FROM photo_tbl WHERE is_deleted <> 1 AND album_id = node_id;
END$$
DELIMITER ;
