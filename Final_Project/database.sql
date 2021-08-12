database: 'development_project'

CREATE TABLE `employee` (
  `EmployeeId` int NOT NULL,
  `Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `LoginId` int NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `Role` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`EmployeeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `password_history` (
  `HistoryRecordId` int NOT NULL AUTO_INCREMENT,
  `EmployeeId` int NOT NULL,
  `Password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date DEFAULT NULL,
  `CreatedDate` date NOT NULL,
  `ModifiedDate` date DEFAULT NULL,
  PRIMARY KEY (`HistoryRecordId`),
  KEY `Password_history_FK` (`EmployeeId`),
  CONSTRAINT `Password_history_FK` FOREIGN KEY (`EmployeeId`) REFERENCES `employee` (`EmployeeId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `account_lock` (
  `LockRecordId` double NOT NULL,
  `EmployeeId` int NOT NULL,
  `Attempt` int NOT NULL AUTO_INCREMENT,
  `CreatedDate` date NOT NULL,
  PRIMARY KEY (`LockRecordId`),
  UNIQUE KEY `Account_lock_un` (`Attempt`),
  KEY `Account_lock_FK` (`EmployeeId`),
  CONSTRAINT `Account_lock_FK` FOREIGN KEY (`EmployeeId`) REFERENCES `employee` (`EmployeeId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO employee (EmployeeId,Name,LoginId,Email,IsActive,Role) VALUES
	 (1,'Razat',1,'razatkaur@gmail.com',1,'admin');

INSERT INTO password_history (EmployeeId,Password,StartDate,EndDate,CreatedDate,ModifiedDate) VALUES
	 (1,'password','2021-08-05',NULL,'2021-08-05',NULL);

INSERT INTO account_lock (LockRecordId,EmployeeId,CreatedDate) VALUES
	 (1.0,1,'2021-08-05');     



