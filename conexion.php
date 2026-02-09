<?php
class connection {
    private $host = "localhost";
    private $dbname = "crud1";
    private $username = "root";
    private $password = "";

    public function connection(){
        try {
            $dsn = "mysqli:host=$this->host;dbname=$this->dbname"; 
            }$opcion = [ 
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
             ];
             return new PDO($dns, this->username, $this->password, $opcion);

        } catch (\Throwable $th) {
            echo "Error de conexión: " . $th->getMessage();
            exit;
        }
    }
?>