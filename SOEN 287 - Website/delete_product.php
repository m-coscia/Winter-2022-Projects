<html>
    <body>
        <?php
            if (isset($_POST['delete-btn'])){
                $xml = new DomDocument("1.0", "UTF-8");
                $xml->load('product_list.xml');
                $name = $_POST['name'];
                $xpath = new DOMXPath($xml);
                foreach($xpath -> query("/product_list/item[itemName = '$name']") as $node):
                    $node->parentNode->removeChild($node);
                endforeach;
                $xml -> formatoutput = true;
                $xml -> save('product_list.xml');
                header("Location: p7.php"); 
            }
        ?>
    </body>
</html>