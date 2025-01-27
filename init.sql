
CREATE TABLE IF NOT EXISTS Festivals(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    duration varchar(255),
    location VARCHAR(255),
    vertrek VARCHAR(255),
    price VARCHAR(255),
    imagepath VARCHAR(255)
);



CREATE TABLE IF NOT EXISTS reviews(
    id INT AUTO_INCREMENT PRIMARY KEY,
    festival_id INT,
    FOREIGN KEY (festival_id) REFERENCES Festivals(id),
    name VARCHAR(255),
    body TEXT
);

CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR (255) NOT NULL UNIQUE,
    password VARCHAR (255) NOT NULL
);

CREATE TABLE IF NOT EXISTS contact (
    id INT aUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    name VARCHAR(255) NOT NULL,
    body TEXT
);

GRANT ALL PRIVILEGES ON festivalDB.* TO 'ROOT';
FLUSH PRIVILEGES;