TRUNCATE users_tbl;
TRUNCATE newsfeeds_tbl;
TRUNCATE user_login_logs;
TRUNCATE tree_node;
TRUNCATE photo_tbl;

INSERT INTO users_tbl VALUES(1, 'superadmin', 'System', 'Administrator', 'temppass', 1, 1, 'SystemCreate', NOW());