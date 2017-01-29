DROP PROCEDURE IF EXISTS get_PublishedPhoto;
DELIMITER $$

# CALL get_PublishedPhoto(2);
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_PublishedPhoto`(IN node_id INT)
BEGIN
	SELECT p.photo_id, p.img_title, p.img_desc, CONCAT(tr.directory, t.directory, p.img_url) AS img_url , p.img_status, p.created_by, p.date_create 
		FROM photo_tbl p
        JOIN tree_node t ON t.node_id = p.album_id
        JOIN tree_node tr ON tr.node_id = t.parent_node
	WHERE p.is_deleted <> 1 AND p.img_status = 1
    AND p.album_id = node_id;
END$$
DELIMITER ;