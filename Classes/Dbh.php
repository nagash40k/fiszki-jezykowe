<?php
// abstrakcyjna klasa praktycznie to jest
class Dbh {

    private $host = 'localhost';
    private $user = 'root';
    private $pwd = '';
    private $dbName = 'fiszki-jezykowe';

    protected function connect(){
        try {
            $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbName;     // Data Source Name

            # Utorzenie objektu PDO który obsługuje połączenie
            $pdo = new PDO($dsn, $this->user, $this->pwd);  

            # Ustawienie atrybutu któy odpowiada za sposób w jaki zwracana są dane z bazy
            # W tym przypadku ustawione jest na pobieranie w postaci tablicy asocjacyjnej
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            return $pdo;
        } catch ( PDOException $e ) {
            echo 'Error!: ' . $e->getMessage() . '<br/>';
            die();
        }
    }

}


/*

CREATE TABLE `users`(
	users_id int(11) AUTO_INCREMENT PRIMARY KEY not NULL,
	users_udi TINYTEXT not NULL,
    users_pwd LONGTEXT not NULL,
    users_email TINYTEXT not NULL
)

*/
