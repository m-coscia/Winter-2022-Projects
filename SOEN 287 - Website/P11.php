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
    <?php
    session_start();
    ob_start();
    ?>
    
        <header class = "header">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="P11.php"><b>Organik Backstore</b></a>
              </div>
              <ul class="nav navbar-nav">
                <li><a href="https://soen287finalproject.online">Client Page</a></li>
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
            <div class="col-sm-9">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Order Number</th>
                            <th>Order details</th>
                            <th class = "text-center">Edit</th>
                            <th class = "text-center">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $orderNumTracker = 0;
                        $numOfOrders = 0;
                        $orderxml = 'orders.xml';
                        $orders = simplexml_load_file($orderxml) or die("Error: Cannot create xml object");

                        foreach($orders->order as $currentOrder){
                            foreach($currentOrder->item as $items){
                                $orderNumTracker++;
                            }
                            $numOfOrders++;
                        }
                        if(array_key_exists('addOrderPage', $_POST)){
                            $_SESSION["orderNumber"] = $numOfOrders;
                            $xmltwo=new SimpleXMLElement('orders.xml', null, true);
                            $xmltwo->addChild("order");
                            echo $xmltwo->asXML('orders.xml');
                            unset($xmltwo);
                            header("Location: P12.php");
                            exit;
                        }
                        for ($i=0; $i < $orderNumTracker; $i++){
                            $newOrderID=$i;
                            if(array_key_exists('editBtn'.$i, $_POST)) { 
                                $_SESSION["orderNumber"] = $i;
                                header("Location: P12.php");
                                exit;
                            } 
                            if(array_key_exists('deleteBtn'.$i, $_POST)) { 
                                $_SESSION["deleteOrderNumber"] = $i;
                                $doc = new DOMDocument;
                                $doc->load('orders.xml');
                                $thedocument = $doc->documentElement;

                                $currentOrder = $thedocument->getElementsByTagName('order')->item($_SESSION["deleteOrderNumber"]);
                                $thedocument->removeChild($currentOrder);
                                $doc->save('orders.xml');
                                header("Location: p9.php");
                                exit;
                            } 
                        }
                        
                        $orderNumTracker = 0;
                        foreach($orders->order as $currentOrder){
                            echo '<tr>';
                            //echo '<td>'.$currentOrder->username.'</td>';
                            echo '<td>'.$orderNumTracker.'</td>';
                            
                            $itemStr = "";
                            foreach($currentOrder->item as $items){
                                if (strlen($itemStr)<20){
                                    $itemStr .= $items->itemID.' ['.$items->quantity.'], ';
                                } else {
                                    $itemStr .= '...';
                                }
                            }
                            echo '<td>'.$itemStr.'</td>';
                            echo '<form method="post">';
                            echo '<input type="hidden" name="orderNumTracking" value="'.$orderNumTracker.'">';
                            echo '<td class="text-center"><button type="submit" class="btn btn-info" name="editBtn'.$orderNumTracker.'">•••</button></td>';
                            echo '</form>';
                            echo '<form method="post">';
                            echo'<td class = "text-center"><button type="submit" class="btn btn-danger" name="deleteBtn'.$orderNumTracker.'">X</button></td>';
                            echo '</form>';
                            echo '</tr>';

                            $orderNumTracker++;
                        }

                        
                        

                        ?>
                    </tbody>
                    </table>
                    <form method="post">
                    <div class = "row py-3 text-center" style = "float: right; padding-right: 1vw;">
            <button type="submit" class="btn btn-success" name="addOrderPage">Add Order</button>
        </div></form>
            </div>
        </div>

</body>

</html>