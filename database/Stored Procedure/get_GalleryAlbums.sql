DROP PROCEDURE IF EXISTS get_GalleryAlbums;
DELIMITER $$

# CALL get_GalleryAlbums();
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_GalleryAlbums`()
BEGIN
	SELECT p.album_id, p.img_title, p.img_desc, CONCAT(tr.directory, t.directory, p.img_url) AS img_url,
		tr.node_desc AS parent , t.node_desc AS child FROM photo_tbl p
		LEFT JOIN tree_node t ON t.node_id = p.album_id
		JOIN tree_node tr ON tr.node_id = t.parent_node
	WHERE ((tr.node_status != 2) AND (t.node_status != 2)) AND is_deleted <> 1 AND img_status = 1 GROUP BY p.album_id;
END$$
DELIMITER ;
