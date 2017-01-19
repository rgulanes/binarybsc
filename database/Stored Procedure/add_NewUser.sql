DROP PROCEDURE IF EXISTS add_NewUser;
DELIMITER $$

# CALL add_NewUser('username', 'password', 'fname', 'lname', 'position', 'created_by');
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_NewUser`
	(IN uname VARCHAR(50), IN pword VARCHAR(50), IN fname VARCHAR(50), IN lname VARCHAR(50), IN position INT(11), IN createdBy VARCHAR(50))
BEGIN
	DECLARE is_existing INT(11);
    DECLARE msg TEXT;
    DECLARE growl VARCHAR(10);
    
    SET is_existing = (SELECT COUNT(user_id) FROM users_tbl WHERE username = uname AND user_lname = lname AND user_fname = fname);
	
    IF is_existing = 0 
		THEN
			INSERT INTO users_tbl (username, user_password, user_fname, user_lname, user_role, user_status, created_by, date_create)
				VALUES (uname, pword, fname, lname, position, 1, createdBy, NOW());
			SET msg = 'Successfully added new user!';
            SET growl = 'success';
	ELSE
			SET msg = 'User credentials has already been used';
            SET growl = 'error';
		END IF;
	
    SELECT msg, growl;
END$$
DELIMITER ;
