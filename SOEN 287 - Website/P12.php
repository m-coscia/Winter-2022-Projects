<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    
</head>

    <style>
    body{
        overflow-x: hidden;
    }
    .container-fluid{
        padding-right: 0% 1%;
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
</style> 
    
<body>
    
    <header class = "header">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="P11.php"><b>Organik Backstore</b></a>
              </div>
              <ul class="nav navbar-nav">
                <li><a href="http://soen287finalproject.online/">Client Page</a></li>
              </ul>
            </div>
          </nav>
    </header>


        <div class="row  py-3">
            <div class="col-sm-3 px-4">
                <div class="list-group list-group-flush">
                    <a href="p9.php" class="list-group-item list-group-item-action">
                        Users
                    </a>
                    <a href="P11.php" class="list-group-item list-group-item-action active">
                        Orders
                    </a>
                    <a href="p7.php" class="list-group-item list-group-item-action"><!---active makes it look blue-->
                        Products
                    </a>
                </div>
            </div>
            <div class="col-sm-8">
            <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th class = "username">
                                <h2>
                                <?php
                                usleep(500000);
                                $ourOrder = $_SESSION["orderNumber"];
                                $itemsOnPage = array();
                                $orderxml = 'orders.xml';
                                $orders = simplexml_load_file($orderxml) or die("Error: Cannot create xml object");
                                $totalPrice = 0;
                                $productsxml = 'product_list.xml';
                                $product_list = simplexml_load_file($productsxml) or die("Error: Cannot create xml object");
                                $orderGroup = $orders->order[$ourOrder];
                                
                                foreach ($orderGroup->item as $singleItem):
                                //foreach ($orders->order[$_SESSION["orderNumber"]]->item as $singleItem):
                                    foreach($product_list as $product):
                                        
                                        if (strcmp($singleItem->itemID, $product->itemID) == 0){
                                            $totalPrice = $totalPrice + (doubleval($product->itemPrice) * doubleval($singleItem->quantity));
                                        }
                                    endforeach;
                                endforeach;
                                /*
                                <form method="post">
        <input type="submit" name="button1"
                class="button" value="Button1" />
          
        <input type="submit" name="button2"
                class="button" value="Button2" />
    </form>
                                */
                                
                                //echo $orders->order[$_SESSION["orderNumber"]]->username;
                                //echo $orders->order[$ourOrder]->username;
                                if(array_key_exists('saveButton', $_POST)) {
                                    /*
                                    $name;
                                    if ( ! empty($_POST['quanttomato'])){
                                        $name = $_POST['quanttomato'];
                                    }
                                    echo $name;
                                    */
                                }

                                //echo $orderGroup->username;


                                
                                ?>
                                <?php
                    if (isset($_POST['saveButton'])){
                        $doc = new DOMDocument;
                                $doc->load('orders.xml');
                                $thedocument = $doc->documentElement;

                                $currentOrder = $thedocument->getElementsByTagName('order')->item($_SESSION["orderNumber"]);
                                $removing = $currentOrder->getElementsByTagName('item');
                                $size = count($removing);
                                for ($i = 0; $i < $size;$i++){
                                    $currentOrder->removeChild($removing[0]);
                                }
                                /*
                                $doc->save('orders.xml');
                                $quantities = array();
                                for($i = 0; $i < count(itemsOnPage); $i++){
                                    array_push(quantities, $_POST["quantity".itemsOnPage[i]]);
                                }

                                for ($i = 0; $i < count(itemsOnPage); $i++){

                                }*/

                                //header("Refresh:0");
                                /*
                                $xml = new DOMDocument("1.0", "UTF-8");
                                $xml->load('orders.xml');
                                */
                                $doc->save('orders.xml');
                        $xml=new SimpleXMLElement('orders.xml', null, true);

                        $itemquant = $_POST['quant'];
                        $itemname = $_POST['prodname'];
                        //$itemprice = $_POST['prodprice'];

                        //$ordersRootTag = $xml->orders[0];
                        //$orderTag = $xml->createElement("order");

                        for ($i = 0; $i < sizeof($itemquant); $i++){/*
                            if ($itemquant[$i] == null){
                                echo '<script>alert("null quantity")</script>';
                            }

                            $itemTag = $xml->createElement("item");
                            $quantityTag = $xml->createElement("quantity", $itemquant[$i]);
                            $itemIDTag = $xml->createElement("itemID", $itemname[$i]);
                            
                            $itemTag->appendChild($itemIDTag);
                            $itemTag->appendChild($quantityTag);
                            $orderTag->appendChild($itemTag);*/
                            debug_to_console($itemname[$i]);
                            $xml->order[$_SESSION["orderNumber"]]->addChild("item");
                            $xml->order[$_SESSION["orderNumber"]]->item[$i]->addChild("quantity", $itemquant[$i]);
                            $xml->order[$_SESSION["orderNumber"]]->item[$i]->addChild("itemID", $itemname[$i]);
                        }
                        echo $xml->asXML('orders.xml');
                        header("Location: P11.php");
                        exit;
                        //$ordersRootTag->appendChild($orderTag);
                        //$xml->formatOutput = true;
                        
                        //header("Location: http://localhost/287project/addtocart.php");
                        
                        exit();

                    }
                    //unset($_SESSION["orderNumber"]);
                    ?>
                    <?php
                    if (isset($_POST['addedProd'])){
                        
                $xmltwo=new SimpleXMLElement('orders.xml', null, true);
                foreach($product_list as $product):
                                        
                    if (strcmp($_POST["addedProd"], $product->itemID) == 0){
                        debug_to_console("THIS");
                        
                        /*
                        $totalPrice = $totalPrice + (doubleval($product->itemPrice));
                        echo "<tr>";
                                        echo '<td>'.$product->itemName.'</td>';
                                        $qt = 1;
                                        echo '<td><input readonly name="quant[]" type="text" inputmode="numeric" class="quant" id="quantity'.$product->itemID.'" value="'.$qt.'"></input></td>';
                                        echo '<td>'.$product->itemPrice.'</td>';
                                        //<input type = "hidden" name = "prodprice[]" value="'.$product->itemPrice.'</td>';
                                        echo '<td style = "width: 10%;"> <button type="button" class="btn btn-success">+</button></td>';
                                    
                                    echo    '<td><button type="button" class="btn btn-warning">-</button></td>';
                                    echo '<td><button type="button" class="btn btn-danger">X</button></td>';
                                        echo '<input type = "hidden" name = "prodname[]" value="'.$product->itemID.'">';
                                        echo '<input type = "hidden" name = "prodprice[]" value="'.$product->itemPrice.'">';
                                        echo "</tr>";
                                        array_push($itemsOnPage, $product->itemID);
                                        */
                                        
                                        $myCurrItem = $xmltwo->order[$_SESSION["orderNumber"]]->addChild("item");
                            $myCurrItem->addChild("quantity", 1);
                            $myCurrItem->addChild("itemID", $_POST["addedProd"]);
                            echo $xmltwo->asXML('orders.xml');
                            unset($xmltwo);header("Refresh:0");break;
                    }
                endforeach;
            }
                ?>
                                </h2>
                            </th>
                            <th colspan = "4"></th>
                            <th>
                            
                            </form>
                                <!--<button type="button" class="btn btn-primary" style = "width: 100%; height: 100%">Save</button>-->
                            </th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th>
                                <h4>
                                    <?php
                                    echo $ourOrder;
                                    ?>
                                <h4>
                            <th>
                            <th colspan = "5">
                                <h4 class="totalPrice">
                                    Total Order's price: $
                                    <?php
                                        echo $totalPrice;
                                    ?>
                                </h4>
                            </th>
                        </tr>
                </thead>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th class ="count-column">Item Count</th>
                        <th class = "price-column">Item Price</th>
                        <th class = "increase-column">Increase</th>
                        <th class = "decrease-column">Decrease</th>
                        <th class = "delete-column">Delete</th>
                    </tr>
                </thead>
                                <tbody>
                    
                <form method="post" action="P12.php">
                    <?php
                    /*
                    echo 
                    '<input type="submit" name="saveButton" class="btn btn-primary" value="POST" style = "width: 100%; height: 100%"/>';
                    */

                    $orders = simplexml_load_file($orderxml) or die("Error: Cannot create xml object");

                    foreach ($orders->order[$ourOrder]->item as $singleItem):
                            //foreach ($orders->order[$_SESSION["orderNumber"]]->item as $singleItem):
                                foreach($product_list as $product):
                                    
                                    if (strcmp($singleItem->itemID, $product->itemID) == 0){
                                        echo "<tr>";
                                        echo '<td>'.$product->itemName.'</td>';
                                        $qt = $singleItem->quantity[0];
                                        echo '<td><input readonly name="quant[]" type="text" inputmode="numeric" class="quant" id="quantity'.$product->itemID.'" value="'.$qt.'"></input></td>';
                                        echo '<td>'.$product->itemPrice.'</td>';
                                        //<input type = "hidden" name = "prodprice[]" value="'.$product->itemPrice.'</td>';
                                        echo '<td style = "width: 10%;"> <button type="button" class="btn btn-success">+</button></td>';
                                    
                                    echo    '<td><button type="button" class="btn btn-warning">-</button></td>';
                                    echo '<td><button type="button" class="btn btn-danger">X</button></td>';
                                        echo '<input type = "hidden" name = "prodname[]" value="'.$product->itemID.'">';
                                        echo '<input type = "hidden" name = "prodprice[]" value="'.$product->itemPrice.'">';
                                        echo "</tr>";
                                        array_push($itemsOnPage, $product->itemID);
                                        
                                        
                                        
                                    }
                                endforeach;

                            endforeach;
                            

                            function debug_to_console($data) {
                                $output = $data;
                                if (is_array($output))
                                    $output = implode(',', $output);
                            
                                echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
                            }
                    ?>
                     <tr>
                        <td colspan="3"></td>
                        <td colspan="3"><input type="submit" name="saveButton" class="btn btn-primary" value="Save" style = "width: 100%; height: 100%"/></td>
                        </tr>
                    </form>

                    
                </tbody>
                <form method="post" action="P12.php">
                <div class = "row py-3 text-center" style = "float: right; padding-right: 1vw;">
                    <input type="text" id="addedProd" name="addedProd" placeholder="Enter item ID: (Autosave)">
                    <input type="submit" value="Add Product">
                </div>
                </form>

                
            </div>
        </div>
<script src="p12.js" defer></script>
</body>

</html>