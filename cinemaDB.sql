DROP DATABASE IF EXISTS cinemaDB;
CREATE DATABASE cinemaDB;
USE `cinemaDB`;
CREATE TABLE OverSeer(
    userName VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    passwd VARCHAR(255) NOT NULL,
    phoneNumber VARCHAR(10) NOT NULL,
    adminFlag BIT,
    manFlag BIT,
    PRIMARY KEY(username)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE Customer(
    userName VARCHAR(50) NOT NULL,
    passwd VARCHAR(255) NOT NULL,
    CCInfo VARCHAR(255) DEFAULT NULL,
    age TINYINT,
    name VARCHAR(255),
    phoneNumber VARCHAR(10),
    PRIMARY KEY(username)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE Actor(
    IMDBID INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    gender VARCHAR(50),
    yearsActive VARCHAR(255),
    PRIMARY KEY(IMDBID)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE Cinema(
    address VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    phoneNumber VARCHAR(10) NOT NULL,
    policy VARCHAR(255),
    PRIMARY KEY(address)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE Food(
    foodID SMALLINT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    type VARCHAR(255) NOT NULL,
    price DOUBLE(4, 2) NOT NULL,
    size VARCHAR(255) NOT NULL,
    description VARCHAR(255),
    PRIMARY KEY(foodID)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE Movie(
    IMDBID INT NOT NULL,
    addedBy VARCHAR(255),
    name VARCHAR(255) NOT NULL,
    runTime TIME NOT NULL,
    producer VARCHAR(255),
    synopsis TEXT,
    director VARCHAR(255),
    format VARCHAR(255),
    releaseDate DATE NOT NULL,
    writer VARCHAR(255),
    PRIMARY KEY(IMDBID),
    FOREIGN KEY fk(addedBy) REFERENCES OverSeer(userName) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE Genre(
    genre VARCHAR(255) NOT NULL,
    movieIMDB INT,
    PRIMARY KEY(genre, movieIMDB),
    FOREIGN KEY(movieIMDB) REFERENCES Movie(IMDBID) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE ActIn(
    movieIMDB INT,
    actorIMDB INT,
    PRIMARY KEY(movieIMDB, actorIMDB),
    FOREIGN KEY(movieIMDB) REFERENCES Movie(IMDBID) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(actorIMDB) REFERENCES Actor(IMDBID) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE Offer(
    foodID SMALLINT,
    cinemaAddr VARCHAR(255),
    PRIMARY KEY(foodID, cinemaAddr),
    FOREIGN KEY(foodID) REFERENCES Food(foodID) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(cinemaAddr) REFERENCES Cinema(address) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE Purchase(
    foodID SMALLINT,
    customer VARCHAR(50),
    PRIMARY KEY(foodID, customer),
    FOREIGN KEY(foodID) REFERENCES Food(foodID) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY(customer) REFERENCES Customer(userName) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE PlayIn(
    movieIMDB INT,
    cinemaAddr VARCHAR(255),
    PRIMARY KEY(movieIMDB, cinemaAddr),
    FOREIGN KEY(movieIMDB) REFERENCES Movie(IMDBID) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(cinemaAddr) REFERENCES Cinema(address) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE Theater(
    roomNum TINYINT NOT NULL,
    cinemaAddr VARCHAR(255),
    numSeats SMALLINT NOT NULL,
    TYPE VARCHAR(255),
    PRIMARY KEY(roomNum, cinemaAddr),
    FOREIGN KEY(cinemaAddr) REFERENCES Cinema(address) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE ShowTime(
    DTime DATETIME NOT NULL,
    price DOUBLE(4, 2) NOT NULL,
    cinemaAddr VARCHAR(255),
    roomNum TINYINT,
    IMDB INT,
    manUsr VARCHAR(255),
    PRIMARY KEY(
        DTime,
        cinemaAddr,
        roomNum,
        IMDB
    ),
    FOREIGN KEY(cinemaAddr, roomNum) REFERENCES Theater(cinemaAddr, roomNum) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY(IMDB) REFERENCES Movie(IMDBID) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(manUsr) REFERENCES OverSeer(userName) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE Ticket(
    DTime DATETIME,
    cinemaAddr VARCHAR(255),
    roomNum TINYINT,
    IMDB INT,
    customer VARCHAR(50),
    PRIMARY KEY(
        DTime,
        cinemaAddr,
        roomNum,
        IMDB,
        customer
    ),
    FOREIGN KEY(
        DTime,
        cinemaAddr,
        roomNum,
        IMDB
    ) REFERENCES ShowTime(
        DTime,
        cinemaAddr,
        roomNum,
        IMDB
    ) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY(customer) REFERENCES Customer(username) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DELIMITER $

CREATE TRIGGER chkCust BEFORE INSERT ON Customer FOR EACH ROW
BEGIN
  IF NEW.userName = '' OR NEW.passwd = '' THEN
    SIGNAL SQLSTATE '45000' ;
  ELSEIF CHAR_LENGTH(NEW.phoneNumber) <> 10 AND NEW.phoneNumber IS NOT NULL THEN
    SIGNAL SQLSTATE '45000' ;
    END IF ;
  END ;$

CREATE TRIGGER upCust BEFORE UPDATE ON Customer FOR EACH ROW
BEGIN
  IF NEW.passwd = '' THEN
    SIGNAL SQLSTATE '45000' ;
  ELSEIF CHAR_LENGTH(NEW.phoneNumber) <> 10 AND NEW.phoneNumber IS NOT NULL THEN
    SIGNAL SQLSTATE '45000' ;
    END IF ;
  END ;$

CREATE TRIGGER chkOver BEFORE INSERT ON OverSeer FOR EACH ROW
  BEGIN
    IF NEW.userName = '' OR NEW.passwd = '' OR CHAR_LENGTH(NEW.phoneNumber) <> 10 OR NEW.name = '' OR NEW.adminFlag = NEW.manFlag THEN
      SIGNAL SQLSTATE '45000' ;
      END IF ;
    END ;$

CREATE TRIGGER chkActo BEFORE INSERT ON Actor FOR EACH ROW
BEGIN
  IF NEW.name = '' OR NEW.gender = '' OR NEW.yearsActive = '' THEN
    SIGNAL SQLSTATE '45000' ;
    END IF ;
  END ;$

CREATE TRIGGER upActo BEFORE UPDATE ON Actor FOR EACH ROW
BEGIN
  IF NEW.name = '' OR NEW.gender = '' OR NEW.yearsActive = '' THEN
    SIGNAL SQLSTATE '45000' ;
    END IF ;
  END ;$

CREATE TRIGGER chkCin BEFORE INSERT ON Cinema FOR EACH ROW
BEGIN
  IF NEW.address = '' OR NEW.name = '' OR CHAR_LENGTH(NEW.phoneNumber) <> 10 THEN
    SIGNAL SQLSTATE '45000' ;
    END IF ;
  END ;$

CREATE TRIGGER upCin BEFORE UPDATE ON Cinema FOR EACH ROW
BEGIN
  IF NEW.address = '' OR NEW.name = '' OR CHAR_LENGTH(NEW.phoneNumber) <> 10 THEN
    SIGNAL SQLSTATE '45000' ;
    END IF ;
  END ;$


DELIMITER ;

/*/// ////////////START HERE/////////*/
SET GLOBAL innodb_file_per_table=1;
ALTER TABLE OverSeer ENGINE=InnoDB;
ALTER TABLE Customer ENGINE=InnoDB;
ALTER TABLE Actor ENGINE=InnoDB;
ALTER TABLE Cinema ENGINE=InnoDB;
ALTER TABLE Food ENGINE=InnoDB;
ALTER TABLE Movie ENGINE=InnoDB;
ALTER TABLE Genre ENGINE=InnoDB;
ALTER TABLE ActIn ENGINE=InnoDB;
ALTER TABLE Movie ENGINE=InnoDB;
ALTER TABLE PlayIn ENGINE=InnoDB;
ALTER TABLE Offer ENGINE=InnoDB;
ALTER TABLE Purchase ENGINE=InnoDB;
ALTER TABLE Theater ENGINE=InnoDB;
ALTER TABLE ShowTime ENGINE=InnoDB;
ALTER TABLE Ticket ENGINE=InnoDB;



ALTER TABLE Movie
    ADD FOREIGN KEY fk(addedBy) REFERENCES OverSeer(userName) ON DELETE RESTRICT ON UPDATE CASCADE
    ;

ALTER TABLE Genre(
    ADD FOREIGN KEY(movieIMDB) REFERENCES Movie(IMDBID) ON DELETE CASCADE ON UPDATE CASCADE
    ;

ALTER TABLE ActIn(
    ADD FOREIGN KEY(movieIMDB) REFERENCES Movie(IMDBID) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD FOREIGN KEY(actorIMDB) REFERENCES Actor(IMDBID) ON DELETE RESTRICT ON UPDATE CASCADE
;

ALTER TABLE Offer(
    ADD FOREIGN KEY(foodID) REFERENCES Food(foodID) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD FOREIGN KEY(cinemaAddr) REFERENCES Cinema(address) ON DELETE CASCADE ON UPDATE CASCADE
;

ALTER TABLE Purchase(
    ADD FOREIGN KEY(foodID) REFERENCES Food(foodID) ON DELETE RESTRICT ON UPDATE CASCADE,
    ADD FOREIGN KEY(customer) REFERENCES Customer(userName) ON DELETE CASCADE ON UPDATE CASCADE
    ;

ALTER TABLE PlayIn
    ADD FOREIGN KEY(movieIMDB) REFERENCES Movie(IMDBID) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD FOREIGN KEY(cinemaAddr) REFERENCES Cinema(address) ON DELETE CASCADE ON UPDATE CASCADE
;

ALTER TABLE Theater
    ADD FOREIGN KEY(cinemaAddr) REFERENCES Cinema(address) ON DELETE CASCADE ON UPDATE CASCADE
;

ALTER TABLE ShowTime
    ADD FOREIGN KEY(cinemaAddr, roomNum) REFERENCES Theater(cinemaAddr, roomNum) ON DELETE RESTRICT ON UPDATE CASCADE,
    ADD FOREIGN KEY(IMDB) REFERENCES Movie(IMDBID) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD FOREIGN KEY(manUsr) REFERENCES OverSeer(userName) ON DELETE RESTRICT ON UPDATE CASCADE
;

ALTER TABLE Ticket
    ADD FOREIGN KEY(
        DTime,
        cinemaAddr,
        roomNum,
        IMDB
    ) REFERENCES ShowTime(
        DTime,
        cinemaAddr,
        roomNum,
        IMDB
    ) ON DELETE RESTRICT ON UPDATE CASCADE,
    ADD FOREIGN KEY(customer) REFERENCES Customer(username) ON DELETE CASCADE ON UPDATE CASCADE
;
