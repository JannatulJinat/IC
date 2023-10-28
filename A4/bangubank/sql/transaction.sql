CREATE TABLE IF NOT EXISTS `Transaction` (
  `transactionID` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `customerID` int NOT NULL,
  `transactionType` varchar(20)NOT NULL,
  `amount` float NOT NULL,
  `receiverID` int DEFAULT NULL
);
INSERT INTO `Transaction` (`transactionID`, `customerID`, `transactionType`, `amount`, `receiverID`) VALUES
(1, 1, 'deposit', 5800, NULL),
(2, 1, 'withdraw', 520, NULL),
(3, 1, 'transfer', 280, 2),
(4, 2, 'deposit', 280, NULL);