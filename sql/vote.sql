CREATE TABLE IF NOT EXISTS Vote(
    user_id INT NOT NULL,
    answer_id INT NOT NULL,
    isVoted BOOLEAN NOT NULL DEFAULT FALSE,
    FOREIGN KEY (user_id) REFERENCES User(id),
    FOREIGN KEY (answer_id) REFERENCES Answer(id)
);