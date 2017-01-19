DROP PROCEDURE IF EXISTS add_newNewsfeed;
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `add_newNewsfeed`
	(IN title TEXT, IN content TEXT, IN section INT(11), IN position INT(11), IN stat INT(11), IN createdBy VARCHAR(50))
BEGIN
	DECLARE is_existing INT(11);
    DECLARE is_allowed INT(11);
    DECLARE msg TEXT;
    DECLARE growl VARCHAR(10);
    
    SET is_existing = (SELECT COUNT(id) FROM newsfeeds_tbl WHERE n_title = title);
    
    SET is_allowed = (SELECT (a.allowed_posts - COUNT(n.id)) AS is_allowed FROM newsfeeds_tbl n
				LEFT JOIN lk_allowed_posts a ON a.section_id = n.n_section AND a.position_id = n.n_position
			WHERE n.n_status NOT IN (2) AND a.section_id = section AND a.position_id = position);
	
    IF is_existing = 0 
		THEN
			IF is_allowed <= 0
				THEN
					SET msg = 'Allowable items to be posted for selected position and section has exceeded its value.';
					SET growl = 'error';
			ELSE
					INSERT INTO newsfeeds_tbl (n_title, n_content, n_section, n_position, n_status, created_by, date_create, updated_by, date_update)
						VALUES (title, content, section, position, stat, createdBy, NOW(), createdBy, NOW());
					SET msg = 'Successfully added new newsfeed!';
					SET growl = 'success';
			END IF;
	ELSE
			SET msg = 'Newsfeed subject has already been added.';
            SET growl = 'error';
		END IF;
	
    SELECT msg, growl;
END$$
DELIMITER ;
