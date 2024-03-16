CREATE TABLE 'customer' (
    `customer_id`    int(11) PRIMARY KEY     NOT NULL AUTO_INCREMENT,
    `firstname` varchar(100)        NOT NULL,
    `lastname`  varchar(100)        NOT NULL,
    `dob`       DATE                NOT NULL,
    `nationality`   varchar(100)    NOT NULL,
    `email` varchar(100)            NOT NULL,
    `password` varchar(150)         NOT NULL,
)

CREATE TABLE 'booking' (
    `booking_id`    int(11)     PRIMARY KEY     NOT NULL    AUTO_INCREMENT,
    `destination` cvar
    `source`
    `date`  DATE NOT NULL
    `fliht type`
    `flight means`
)