-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: binarybsc
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.10-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `feedbacks_tbl`
--

DROP TABLE IF EXISTS `feedbacks_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedbacks_tbl` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(100) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `ip_address` varchar(100) DEFAULT NULL,
  `feedback` text,
  `email_status` int(11) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT NULL,
  `is_read` int(11) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lk_allowed_posts`
--

DROP TABLE IF EXISTS `lk_allowed_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lk_allowed_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section_id` int(11) DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL,
  `allowed_posts` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lk_feed_position`
--

DROP TABLE IF EXISTS `lk_feed_position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lk_feed_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lk_feed_section`
--

DROP TABLE IF EXISTS `lk_feed_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lk_feed_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lk_user_roles`
--

DROP TABLE IF EXISTS `lk_user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lk_user_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `newsfeeds_tbl`
--

DROP TABLE IF EXISTS `newsfeeds_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `newsfeeds_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `n_title` text,
  `n_content` text,
  `n_section` int(11) DEFAULT NULL,
  `n_position` int(11) DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL,
  `n_image_url` varchar(100) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `photo_tbl`
--

DROP TABLE IF EXISTS `photo_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photo_tbl` (
  `photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` int(11) DEFAULT NULL,
  `img_title` varchar(100) DEFAULT NULL,
  `img_desc` text,
  `img_url` text,
  `img_status` int(11) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tree`
--

DROP TABLE IF EXISTS `tree`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tree` (
  `tree_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) DEFAULT NULL,
  `create_by` varchar(45) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  PRIMARY KEY (`tree_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tree_node`
--

DROP TABLE IF EXISTS `tree_node`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tree_node` (
  `node_id` int(11) NOT NULL AUTO_INCREMENT,
  `tree_id` int(11) DEFAULT NULL,
  `node_desc` text,
  `parent_node` text,
  `node_icon` varchar(45) DEFAULT NULL,
  `node_status` int(11) DEFAULT NULL,
  `directory` text,
  `created_by` varchar(45) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`node_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_login_logs`
--

DROP TABLE IF EXISTS `user_login_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_login_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `action` varchar(45) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users_tbl`
--

DROP TABLE IF EXISTS `users_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_tbl` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `user_lname` varchar(45) DEFAULT NULL,
  `user_fname` varchar(45) DEFAULT NULL,
  `user_password` varchar(45) DEFAULT NULL,
  `user_role` int(11) DEFAULT NULL,
  `user_status` int(11) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping routines for database 'binarybsc'
--
/*!50003 DROP FUNCTION IF EXISTS `is_AllowedFeeds` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `is_AllowedFeeds`(`section` INT(11), `position` INT(11)) RETURNS int(11)
BEGIN
	DECLARE is_allowed INT(11);

	SET is_allowed = (SELECT (a.allowed_posts - COUNT(n.id)) AS is_allowed FROM newsfeeds_tbl n
			LEFT JOIN lk_allowed_posts a ON a.section_id = n.n_section AND a.position_id = n.n_position
		WHERE n.n_status NOT IN (2, 0) AND a.section_id = section AND a.position_id = position);
	
    RETURN is_allowed;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `add_newNewsfeed` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_newNewsfeed`(IN title TEXT, IN content TEXT, IN section INT(11), IN position INT(11), IN stat INT(11), IN img_url VARCHAR(100), IN createdBy VARCHAR(50))
BEGIN
	DECLARE is_existing INT(11);
    DECLARE is_allowed INT(11);
    DECLARE msg TEXT;
    DECLARE growl VARCHAR(10);
    
    SET is_existing = (SELECT COUNT(id) FROM newsfeeds_tbl WHERE n_title = title AND n_status NOT IN (2));
    
    SET is_allowed = (SELECT is_AllowedFeeds(section,position));
	
    IF is_existing = 0 
		THEN
			IF is_allowed <= 0 AND stat = 1
				THEN
					SET msg = 'Allowable items to be posted for selected position and section has exceeded its value.';
					SET growl = 'error';
			ELSE
					INSERT INTO newsfeeds_tbl (n_title, n_content, n_section, n_position, n_status, n_image_url, created_by, date_create, updated_by, date_update)
						VALUES (title, content, section, position, stat, img_url, createdBy, NOW(), createdBy, NOW());
					SET msg = 'Successfully added new newsfeed!';
					SET growl = 'success';
			END IF;
	ELSE
			SET msg = 'Newsfeed subject has already been added.';
            SET growl = 'error';
		END IF;
	
    SELECT msg, growl;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `add_NewUser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_NewUser`(IN uname VARCHAR(50), IN pword VARCHAR(50), IN fname VARCHAR(50), IN lname VARCHAR(50), IN position INT(11), IN createdBy VARCHAR(50))
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
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_ActiveFeeds` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_ActiveFeeds`()
BEGIN
	SELECT n.id, n.n_title, n.n_status, DATE_FORMAT(n.date_create,'%m-%d-%Y') AS date_create,
		s.description AS section,
		(CASE
			WHEN n.n_status = 1 THEN 'Active' ELSE 'Inactive' END) AS status_desc
		FROM newsfeeds_tbl n 
			LEFT JOIN lk_feed_section s ON s.id = n.n_section
		WHERE n.n_status <> 2 ORDER BY n.n_title DESC;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_ActivePhoto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_ActivePhoto`(IN node_id INT)
BEGIN
	SELECT p.photo_id, p.img_title, p.img_desc, CONCAT(tr.directory, t.directory, p.img_url) AS img_url , p.img_status, p.created_by, p.date_create 
		FROM photo_tbl p
        JOIN tree_node t ON t.node_id = p.album_id
        JOIN tree_node tr ON tr.node_id = t.parent_node
	WHERE p.is_deleted <> 1 AND p.album_id = node_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_activeUsers` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_activeUsers`()
BEGIN
	SELECT u.user_id, u.username, u.user_lname, u.user_fname, r.description AS user_role FROM users_tbl u 
		LEFT JOIN lk_user_roles r ON r.id = u.user_role
	WHERE u.user_status <> 2 AND username NOT IN ('superadmin') ORDER BY u.username DESC;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_GalleryAlbums` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_GalleryAlbums`()
BEGIN
	SELECT p.album_id, p.img_title, p.img_desc, CONCAT(tr.directory, t.directory, p.img_url) AS img_url,
		tr.node_desc AS parent , t.node_desc AS child FROM photo_tbl p
		LEFT JOIN tree_node t ON t.node_id = p.album_id
		JOIN tree_node tr ON tr.node_id = t.parent_node
	WHERE ((tr.node_status != 2) AND (t.node_status != 2)) AND is_deleted <> 1 AND img_status = 1 GROUP BY p.album_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_NewsFeeds` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_NewsFeeds`(IN _section TEXT, IN _position TEXT)
BEGIN
	SELECT n.n_title, n.n_content, n.n_image_url, n.created_by, n.date_create FROM newsfeeds_tbl n
		LEFT JOIN lk_feed_position p ON p.id = n.n_position
		LEFT JOIN lk_feed_section s ON s.id= n.n_section
	WHERE n.n_status = 1 AND p.description = _position AND s.description = _section;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_PublishedPhoto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_PublishedPhoto`(IN node_id INT)
BEGIN
	SELECT p.photo_id, p.img_title, p.img_desc, CONCAT(tr.directory, t.directory, p.img_url) AS img_url , p.img_status, p.created_by, p.date_create 
		FROM photo_tbl p
        JOIN tree_node t ON t.node_id = p.album_id
        JOIN tree_node tr ON tr.node_id = t.parent_node
	WHERE p.is_deleted <> 1 AND p.img_status = 1
    AND p.album_id = node_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_TreeNodes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
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

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `report_UserLogs` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
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

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-07  0:24:39
