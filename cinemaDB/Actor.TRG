TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`localhost` TRIGGER chkActo BEFORE INSERT ON Actor FOR EACH ROW\nBEGIN\n  IF NEW.name = \'\' OR NEW.gender = \'\' OR NEW.yearsActive = \'\' THEN\n    SIGNAL SQLSTATE \'45000\' ;\n    END IF ;\n  END' 'CREATE DEFINER=`root`@`localhost` TRIGGER upActo BEFORE UPDATE ON Actor FOR EACH ROW\nBEGIN\n  IF NEW.name = \'\' OR NEW.gender = \'\' OR NEW.yearsActive = \'\' THEN\n    SIGNAL SQLSTATE \'45000\' ;\n    END IF ;\n  END'
sql_modes=1342177280 1342177280
definers='root@localhost' 'root@localhost'
client_cs_names='utf8mb4' 'utf8mb4'
connection_cl_names='utf8mb4_unicode_ci' 'utf8mb4_unicode_ci'
db_cl_names='latin1_swedish_ci' 'latin1_swedish_ci'
