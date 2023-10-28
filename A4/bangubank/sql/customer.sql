CREATE TABLE IF NOT EXISTS `Customer` (
    `customerID` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `customerName` varchar(255) NOT NULL,
    `customerEmail` varchar(255) NOT NULL,
    `customerPassword` varchar(255) NOT NULL
);
INSERT INTO `Customer` (`customerID`, `customerName`, `customerEmail`, `customerPassword`) VALUES
(1, 'customer1', 'customer1@gmail.com', '$2y$10$0mYYCXtsZdk3hB4i3HMNL.2G8WmFfd.qoFCyFc7wtFTnFyvVHbNO6'),
(2, 'customer2', 'customer2@gmail.com', '$2y$10$YPeHO4c6D7MeHQ/AIe1Mx.ym.Y8Q0EbbA0zX.oXh9GoJou1KXquE2');
