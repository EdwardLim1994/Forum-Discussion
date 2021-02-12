CREATE TABLE IF NOT EXISTS Answer (
    id INT NOT NULL AUTO_INCREMENT,
    answer VARCHAR(10000) NOT NULL,
    postdate DATETIME NOT NULL,
    user_id INT NOT NULL,
    question_id INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES User (id),
    FOREIGN KEY (question_id) REFERENCES Question(id) ON DELETE CASCADE
);