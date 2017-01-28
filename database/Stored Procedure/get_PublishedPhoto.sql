DROP PROCEDURE IF EXISTS get_PublishedPhoto;
DELIMITER $$

# CALL get_PublishedPhoto(2);
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_PublishedPhoto`(IN node_id INT)
BEGIN
	SELECT photo_id, img_title, img_desc, img_url, img_status, created_by, date_create FROM photo_tbl WHERE is_deleted <> 1 AND img_status = 1
    AND album_id = node_id;
END$$
DELIMITER ;