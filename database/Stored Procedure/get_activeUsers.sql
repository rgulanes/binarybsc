DROP PROCEDURE IF EXISTS get_activeUsers;
DELIMITER $$

# CALL get_activeUsers();
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_activeUsers`()
BEGIN
	SELECT u.user_id, u.username, u.user_lname, u.user_fname, r.description AS user_role FROM users_tbl u 
		LEFT JOIN lk_user_roles r ON r.id = u.user_role
	WHERE u.user_status <> 2 AND username NOT IN ('superadmin') ORDER BY u.username DESC;
END$$
DELIMITER ;
