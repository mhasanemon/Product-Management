<?php
/**
 * Created by PhpStorm.
 * User: emon
 * Date: 11/14/19
 * Time: 12:07 AM
 */

class Category{
    //database connection and table name
    private $conn;
    private $table_name = 'categories';

    //object properties
    public $id;
    public $name;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //Used by Select Drop-down list
    function read(){
        //select all data
        $query = "SELECT
                    id, name
                FROM
                    " . $this->table_name . "
                ORDER BY
                    name";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        return $stmt;
    }

    function readName(){

        $query = "SELECT name FROM " . $this->table_name . " WHERE id = ? limit 0,1";

        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['name'];
    }

}
