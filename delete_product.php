<?php
/**
 * Created by PhpStorm.
 * User: emon
 * Date: 11/18/19
 * Time: 12:23 AM
 */

//check if the value was posted
if ($_POST){
    //include database and object file
    include_once 'config/database.php';
    include_once 'objects/product.php';

    //get database connection
    $database = new Database();
    $db = $database->getConn();

    //prepare product object
    $product = new Product($db);

    //set product id to be deleted
    $product->id = $_POST['object_id'];
    echo $product->id;

    //delete the product
    if ($product->delete()){
        echo "Object was deleted";
    }
    else
        echo "Unable to delete the object";
}