<?php
session_start();
$username = $_SESSION["username"];

if(!($username == "admin@email.com"))
header("Location:index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/5dd9030673.js" crossorigin="anonymous"></script>
</head>
<style>
    body{
        overflow-x: hidden;
    }
    .container-fluid{
        padding: 0% 1%;
    }
    img{
        height: 100px;
    }
    .header{
        color: white;
        background: #709176;
        margin-bottom: 2%;        
    }
    .header a{
        color: white;
        text-decoration: none;
    }
    .container-fluid a{
        text-decoration: none;
    }
    *{
        font-family: 'Lato', sans-serif;
    }
    .aisleName{
        text-transform: capitalize;
    }
</style>
<body>
    <header class = "header">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="#"><b>Organik Backstore</b></a>
              </div>
              <ul class="nav navbar-nav">
                <li><a href="https://soen287finalproject.online">Client Page</a></li>
              </ul>
            </div>
          </nav>
    </header>
   
    <button style = "margin: 10px;" class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
        Backstore Menu
    </button>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Backstore Pages</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                <div class="list-group list-group-flush">
                    <a href="p9.php" class="list-group-item list-group-item-action">
                        Users
                    </a>
                    <a href="P11.php" class="list-group-item list-group-item-action">
                        Orders
                    </a>
                    <a href="p7.php" class="list-group-item list-group-item-action active">
                        Products   
                    </a>
                </div>
            </div>
        </div>
    </div>
    <h2></h2>
        <br/>
        <h2 style = "padding-left: 10px;">All Products</h2>
    <div class="container-fluid">   
        <div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Aisle</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Weight</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                            //load xml file
                            $list = simplexml_load_file('product_list.xml') or die("Error: Cannot create xml object");
                            $item_info = "";
                            foreach($list as $item):
                                $item_info .= '<tr>
                                <td>'.$item->itemName.'</td>
                                <td class = "aisleName">'.$item->aisle.'</td>
                                <td><img src = "'.$item->image.'" alt = "'.strtolower($item->itemName).'"></td>
                                <td>'.$item->description.'</td>
                                <td>'.$item->itemPrice.'</td>
                                <td>'.$item->weight.'</td>
                                <td>
                                    <form action = "p8.php" method = "POST" enctype="multipart/form-data">
                                        <input type = "hidden" name="name" value="'.$item->itemName.'">
                                        <input type = "hidden" name="aisle" value="'.$item->aisle.'">
                                        <input type = "hidden" name="image" value ="'.$item->image.'">
                                        <input type = "hidden" name="description" value="'.$item->description.'">
                                        <input type = "hidden" name="price" value="'.$item->itemPrice.'">
                                        <input type = "hidden" name="weight" value="'.$item->weight.'">
                                        <button type="submit" class="btn btn-info" name = "edit-btn" value = "POST">•••</button>
                                    </form>
                                </td>
                                <td>
                                    <form action = "delete_product.php" method = "POST">
                                        <input type="hidden" name = "name" value="'.$item->itemName.'">
                                        <button type="submit" class="btn btn-danger" name = "delete-btn" value="POST">X</button>
                                    </form>
                                </td>';
                            endforeach;
                            echo $item_info;                    
                        ?>
                        
                    </tbody>
                </table>
            </div>
    </div>
    <div class = "row py-3 text-center" style = "float: left; padding: 1vw;" >
    <button style = "margin: 2px 10px;"type="button" class="btn btn-success" onclick="window.location.href='p8.php'">Add Product</button>
    </div>
</body>
</html>

