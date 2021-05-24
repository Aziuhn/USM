<?php
require './__autoload.php';
use sarassoroberto\usm\config\local\AppConfig;
use sarassoroberto\usm\model\DB;

$conn = DB::serverConnectionWithoutDatabase();
$dbname = AppConfig::DB_NAME;

$sql = "DROP DATABASE if exists $dbname;
CREATE database if not exists $dbname; 
use $dbname;

CREATE table if not exists User (
    userId int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    firstName varchar(255) NOT NULL,
    lastName varchar(255)  NOT NULL,
    email varchar(255) NOT NULL UNIQUE,
    birthday DATE,
    interesse varchar(255),
    password varchar(255) NOT NULL
);

CREATE table if not exists Interessi (
    interesseId int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar(255) NOT NULL UNIQUE
);

CREATE table if not exists User_Interesse (
    userInteresseId int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    userId int(10) NOT NULL,
    interesseId int(10) NOT NULL,
    CONSTRAINT FK_userId FOREIGN KEY (userId) REFERENCES User(userId),
    CONSTRAINT FK_interesseId FOREIGN KEY (interesseId) REFERENCES Interessi(interesseId)
)";

$conn->exec($sql);

$sqlToInsertUserQuery = "INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (1, 'Adamo', 'ROSSI', 'adamo.rossi@email.com', '2002-06-12', MD5('Adamo!'));
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (2, 'Mario', 'FERRARI', 'mario.ferrari@email.com', '2001-06-12', 'Mario!');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (3, 'Luigi', 'RUSSO', 'luigi.russo@email.com', '2007-08-06', 'Luigi!');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (4, 'Achille', 'BIANCHI', 'achille.bianchi@email.com', '2006-03-14', 'Achille!');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (5, 'Adriano', 'ROMANO', 'adriano.romano@email.com', '2005-01-16', 'Adriano!');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (6, 'Gianni', 'ROSSI', 'gianni.rossi@email.com', '2005-04-22', 'Gianni!');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (7, 'Giuliano', 'FERRARI', 'giuliano.ferrari@email.com', '2007-07-16', 'Giuliano!');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (8, 'Giusto', 'RUSSO', 'giusto.russo@email.com', '2001-03-28', 'Giusto!');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (9, 'Livio', 'BIANCHI', 'livio.bianchi@email.com', '2003-01-19', 'Livio!');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (10, 'Paolo', 'ROMANO', 'paolo.romano@email.com', '2001-09-28', 'Paolo!');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (11, 'Onorato', 'ROSSI', 'onorato.rossi@email.com', '2005-06-29', 'Onorato!');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (12, 'Silvio', 'FERRARI', 'silvio.ferrari@email.com', '2005-04-11', 'Silvio!');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (13, 'Tancredi', 'RUSSO', 'tancredi.russo@email.com', '2000-07-30', 'Tancredi!');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (14, 'Valter', 'BIANCHI', 'valter.bianchi@email.com', '2000-06-10', 'Valter!');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (15, 'Zeno', 'ROMANO', 'zeno.romano@email.com', '2001-07-21', 'Zeno!');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (16, 'Adamo', 'ROSSI', 'adamo.rossi@email.com', '2007-07-18', 'Adamo!');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (17, 'Mario', 'FERRARI', 'mario.ferrari@email.com', '2000-08-15', 'Mario!');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (18, 'Luigi', 'RUSSO', 'luigi.russo@email.com', '2003-10-15', 'Luigi!');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (19, 'Achille', 'BIANCHI', 'achille.bianchi@email.com', '2000-05-08', 'Achille!');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (20, 'Adriano', 'ROMANO', 'adriano.romano@email.com', '2007-04-23', 'Adriano!');"; 

$sqlToInsertInteresseQuery = "INSERT INTO Interessi (interesseId, name) VALUES (1, 'Fantasy');
                            INSERT INTO Interessi (interesseId, name) VALUES (2, 'Sci-Fi');
                            INSERT INTO Interessi (interesseId, name) VALUES (3, 'Avventura');
                            INSERT INTO Interessi (interesseId, name) VALUES (4, 'Dramma');";  

try {
    $PDO_Statement = $conn->prepare($sqlToInsertUserQuery);
    $PDO_Statement->execute();
    $PDO_Statement = $conn->prepare($sqlToInsertInteresseQuery);
    $PDO_Statement->execute();
} catch (\Throwable $th) {
    echo $th->getMessage();
}

//$conn->exec($sqlToInsertUserQuery);