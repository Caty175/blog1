<?php

class dbConnection{
    private $connection;
    private $db_type;
    private $host;
    private $dbname;
    private $username;
    private $dbpassword;
    private $dbport;
    private $posted_values;

    public function __construct($DB_TYPE,$DB_HOST,$DB_NAME,$DB_USER,$DB_PASS,$DB_PORT) {
        $this->db_type      = $DB_TYPE;
        $this->db_host      = $DB_HOST;
        $this->db_name      = $DB_NAME;
        $this->db_user      = $DB_USER;
        $this->db_pass      = $DB_PASS;
        $this->db_port      = $DB_PORT;
        $this->connection($DB_TYPE,$DB_HOST,$DB_NAME,$DB_USER,$DB_PASS,$DB_PORT);
    }

    public function connection($DB_TYPE,$DB_HOST,$DB_NAME,$DB_USER,$DB_PASS,$DB_PORT){
        switch ($DB_TYPE) {
            case 'MySQLi':
                if($DB_PORT<>Null){
                    $DB_HOST.=":".$DB_PORT;
                }
                $this->connection = new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);
                if ($this->connection->connect_error) { return "Connection failed: " . $this->connection->connect_error; }else{
                    // echo "Connected successfully";
                }
                break;
            case 'PDO':
                if($DB_PORT<>Null){
                    $DB_HOST.="";
                }
                try {
                    $this->connection = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASS);
                    // set the PDO error mode to exception
                    $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // echo "Connected successfully";
                } catch(PDOException $e) {
                    die("Connection failed: " . $e->getMessage());
                }
                break;
            }
        
    try {
        $dsn = "mysql:host=$DB_HOST;port=3306;dbname=$DB_NAME";

        $this->connection = new PDO($dsn, $DB_USER, $DB_PASS);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

public function escape_values($posted_values): string
{
    switch ($this->db_type) {
        case 'MySQLi':
            $this->posted_values = $this->connection->real_escape_string($posted_values);
            break;
        case 'PDO':
            $this->posted_values = addslashes($posted_values);
            break;
    }
    return $this->posted_values;
}

public function insert($table, $data){
    ksort($data);
    $fieldDetails = NULL;
    $fieldNames = implode('`, `',  array_keys($data));
    $fieldValues = implode("', '",  array_values($data));
    $sth = "INSERT INTO $table (`$fieldNames`) VALUES ('$fieldValues')";
    return $this->extracted($sth);
}
}
?>