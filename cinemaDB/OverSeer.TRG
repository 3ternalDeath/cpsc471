TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`localhost` TRIGGER chkOver BEFORE INSERT ON OverSeer FOR EACH ROW\n  BEGIN\n    IF NEW.userName = \'\' OR NEW.passwd = \'\' OR CHAR_LENGTH(NEW.phoneNumber) <> 10 OR NEW.name = \'\' OR NEW.adminFlag = NEW.manFlag THEN\n      SIGNAL SQLSTATE \'45000\' ;\n      END IF ;\n    END'
sql_modes=1342177280
definers='root@localhost'
client_cs_names='utf8mb4'
connection_cl_names='utf8mb4_unicode_ci'
db_cl_names='latin1_swedish_ci'
