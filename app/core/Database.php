<?php
class Database
{
    private $hostname = DB_HOST;
    private $username = DB_USER;
    private $password = DB_PASS;
    private $database = DB_NAME;
    private $stmt;
    private $pdo;
    public function __construct()
    {
        // buat koneksi database
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {

            $this->pdo = new PDO("mysql:host=$this->hostname;dbname=$this->database", $this->username, $this->password, $option);

            //option


            // set error mode
            // $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // tampilkan kesalahan jika koneksi gagal
            echo "Koneksi Database Gagal! : " . $e->getMessage();
        }
    }
    public function query($query)
    {
        $this->stmt = $this->pdo->prepare($query);
    }
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }
    public function execute()
    {
        $this->stmt->execute();
    }
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}
