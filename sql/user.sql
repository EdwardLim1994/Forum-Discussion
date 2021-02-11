CREATE TABLE IF NOT EXISTS User (
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(20) NOT NULL,
    passcode VARCHAR(500) NOT NULL,
    UNIQUE(id, username, email),
    PRIMARY KEY(id)
);