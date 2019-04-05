TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`localhost` TRIGGER chkCust BEFORE INSERT ON Customer FOR EACH ROW\nBEGIN\n  IF NEW.userName = \'\' OR NEW.passwd = \'\' THEN\n    SIGNAL SQLSTATE \'45000\' ;\n  ELSEIF CHAR_LENGTH(NEW.phoneNumber) <> 10 AND NEW.phoneNumber IS NOT NULL THEN\n    SIGNAL SQLSTATE \'45000\' ;\n    END IF ;\n  END' 'CREATE DEFINER=`root`@`localhost` TRIGGER upCust BEFORE UPDATE ON Customer FOR EACH ROW\nBEGIN\n  IF NEW.passwd = \'\' THEN\n    SIGNAL SQLSTATE \'45000\' ;\n  ELSEIF CHAR_LENGTH(NEW.phoneNumber) <> 10 AND NEW.phoneNumber IS NOT NULL THEN\n    SIGNAL SQLSTATE \'45000\' ;\n    END IF ;\n  END'
sql_modes=1342177280 1342177280
definers='root@localhost' 'root@localhost'
client_cs_names='utf8mb4' 'utf8mb4'
connection_cl_names='utf8mb4_unicode_ci' 'utf8mb4_unicode_ci'
db_cl_names='latin1_swedish_ci' 'latin1_swedish_ci'
