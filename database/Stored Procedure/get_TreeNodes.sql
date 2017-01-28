DROP PROCEDURE IF EXISTS get_TreeNodes;
DELIMITER $$

# CALL get_TreeNodes('Galleries');
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_TreeNodes`(IN _treeDesc VARCHAR(50))
BEGIN
	
    DROP TEMPORARY TABLE IF EXISTS _parentNodes;
	CREATE TEMPORARY TABLE IF NOT EXISTS _parentNodes AS
	(SELECT CONCAT(LOWER(_treeDesc), '_P', n.node_id ) AS id, n.node_desc AS 'text', COALESCE(n.parent_node, '#') AS parent, n.node_icon AS icon, n.node_id, n.created_by, n.datetime, t.tree_id FROM tree_node n 
		LEFT JOIN tree t ON t.tree_id = n.tree_id
	WHERE n.node_status <> 2 AND n.parent_node IS NULL OR n.parent_node = '' AND t.description LIKE '%_treeDesc%');
    
    DROP TEMPORARY TABLE IF EXISTS _childNodes;
	CREATE TEMPORARY TABLE IF NOT EXISTS _childNodes AS
    (SELECT CONCAT(LOWER(_treeDesc), '_C', n.node_id ) AS id, n.node_desc AS 'text', t.id AS parent, n.node_icon AS icon, n.node_id, n.created_by, n.datetime, n.tree_id FROM _parentNodes t 
	LEFT JOIN tree_node n ON n.parent_node = t.node_id AND n.node_status <> 2);
    
    SELECT * FROM _parentNodes
    UNION
    SELECT * FROM _childNodes;

END$$
DELIMITER ;