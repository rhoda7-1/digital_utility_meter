CREATE TABLE User (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `other_names` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`user_id`)
)
