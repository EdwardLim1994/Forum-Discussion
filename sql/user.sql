CREATE TABLE IF NOT EXISTS User (
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    passcode VARCHAR(20) NOT NULL,
    UNIQUE(id, username),
    PRIMARY KEY(id)
);