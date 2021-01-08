<?php
/**
 * Created by PhpStorm.
 * User: emon
 * Date: 11/18/19
 * Time: 12:06 AM
 */
//get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('Error : missing ID');

//include database and object files
include_once 'config/database.php';
include_once 'objects/product.php';
include_once 'objects/category.php';

//get the database connection
$database = new Database();
$db = $database->getConn();

//prepare the objects
$product = new Product($db);
$category = new Category($db);

//set ID property of product to be edited
$product->id = $id;

//read details of product to be edited
$product->readOne();


//set page header
$page_title = "Read One Product";
include_once 'layout_header.php';

//read products button
echo "
    <div class='right-button-margin'>
        <a href='index.php' class='btn btn-primary pull-right'>
            <span class='glyphicon glyphicon-list'></span> Read Products
        </a>
    </div>
    
";

?>

    <table class="table table-hover table-responsive table-bordered">
        <tr>
            <td>Name</td>
            <td><?php echo $product->name?></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><?php echo $product->price?></td>
        </tr>

        <tr>
            <td>Description</td>
            <td><?php echo $product->description?></td>
        </tr>

        <tr>
            <td>Category</td>
            <td>
                <!--categories select drop down-->
                <?php
                $category->id = $product->category_id;
                $category->readName();
                echo $category->name;
                ?>

            </td>
        </tr>

    </table>


<?php

//set footer
include_once 'layout_footer.php';