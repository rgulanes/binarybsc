DROP PROCEDURE IF EXISTS report_UserLogs;
DELIMITER $$

# CALL report_UserLogs('WHERE user_role = 2');
CREATE DEFINER=`root`@`localhost` PROCEDURE `report_UserLogs`(IN querystring TEXT)
BEGIN
	SET @queryString = querystring;
    
	DROP TEMPORARY TABLE IF EXISTS _userLogs;
	CREATE TEMPORARY TABLE IF NOT EXISTS _userLogs AS 
    (SELECT u.user_id, u.username, u.user_role, r.description AS role_desc, l.ip_address, l.action, l.datetime FROM user_login_logs l
		LEFT JOIN users_tbl u ON u.user_id = l.user_id
        LEFT JOIN lk_user_roles r ON r.id = u.user_role
	WHERE u.user_role <> 1 ORDER BY l.datetime ASC);
    
    SET @query = CONCAT('SELECT * FROM _userLogs ', @queryString);
    
    PREPARE stmt FROM @query;
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;

END$$
DELIMITER ;
