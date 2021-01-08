<?php
/**
 * Created by PhpStorm.
 * User: emon
 * Date: 11/13/19
 * Time: 11:55 PM
 */

class Database{
    private $host = 'localhost';
    private $dbname = "product-management";
    private $username = 'root';
    private $password = '';

    public $conn;

    //get the database connection

    /**
     * @return mixed
     */
    public function getConn()
    {
         $this->conn = null;

         try{
             $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname,$this->username,$this->password,array(PDO::ATTR_PERSISTENT => true));

         }
         catch (PDOException $exception){
            echo "Connection cannot be established.".$exception.getMessage();
        }
        return $this->conn;
    }
}
