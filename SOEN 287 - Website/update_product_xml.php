<!DOCTYPE html>
<html lang="en">
    <body>
        <?php
            //add new product
            if(isset($_POST['submit'])){
                //create new dom document object
                $xml = new DOMDocument("1.0", "UTF-8");
                $xml->preserveWhiteSpace = false;
                $xml->formatOutput = true;
                //load the xml file 
                $xml -> load('product_list.xml');
                //getting the values from the form (setting variable)
                $name = $_POST['name'];
                $id = str_replace(' ', '', strtolower($name));

                //uploading images
                $temp = $_FILES["image"]["tmp_name"];
                $target_file = basename($_FILES["image"]["name"]);
                move_uploaded_file($temp, $target_file); 

                $image = $_FILES["image"]["name"];

                $desc = $_POST['description'];
                $price = $_POST['price'];
                $weight = $_POST['weight'];
                $aisle = $_POST['aisle'];
                
                //creating new elements in xml file
                $rootTag = $xml -> documentElement;
                $newItem = $xml -> createElement("item");
                $aisleTag = $xml -> createElement("aisle", $aisle);
                $nameTag = $xml -> createElement("itemName", $name);
                $idTag = $xml -> createElement("itemID", $id);
                $imageTag = $xml -> createElement("image", $image);
                $descTag = $xml -> createElement("description", $desc);
                $priceTag = $xml -> createElement("itemPrice", $price);
                $weightTag = $xml -> createElement("weight", $weight);

                //append created elements to xml file
                $newItem -> appendChild($aisleTag);
                $newItem -> appendChild($nameTag);
                $newItem -> appendChild($idTag);
                $newItem -> appendChild($imageTag);
                $newItem -> appendChild($descTag);
                $newItem -> appendChild($priceTag);
                $newItem -> appendChild($weightTag);
                $rootTag -> appendChild($newItem);

                //save contents to xml file
                $xml -> save('product_list.xml');
                //send user back to another page
                header("Location: https://soen287finalproject.online/p7.php");
                exit();
            }

            //edit existing product info
            if(isset($_POST['edit-button'])){
                
                //getting the values from the form (setting variable)
                $name = $_POST['name'];
                $id = str_replace(' ', '', strtolower($name));
                $desc = $_POST['description'];
                $price = $_POST['price'];
                $weight = $_POST['weight'];
                $aisle = $_POST['aisle'];
                
                //create new dom document object
                $xml = new DOMDocument("1.0", "UTF-8");
                $xml->preserveWhiteSpace = false;
                $xml->formatOutput = true;

                //load the xml file 
                $xml -> load('product_list.xml');

                $items = $xml -> getElementsByTagName('item');

                foreach($items as $item){
                    $itemName = $item->getElementsByTagName('itemName')->item(0)->nodeValue;
                    if($itemName == $name){
                        if(empty($_FILES['image']['name'])){
                            $image = $item->getElementsByTagName('image')->item(0)->nodeValue;
                            
                            $item->parentNode->removeChild($item);
                        }
                        else{
                            //uploading images
                            $temp = $_FILES["image"]["tmp_name"];
                            $target_file = basename($_FILES["image"]["name"]);
                            move_uploaded_file($temp, $target_file); 
                            
                            $image = $_FILES["image"]["name"];

                            $item->parentNode->removeChild($item);
                        }
                        break;
                    }
                }

                //creating new elements in xml file
                $rootTag = $xml -> documentElement;
                $newItem = $xml -> createElement("item");
                $aisleTag = $xml -> createElement("aisle", $aisle);
                $nameTag = $xml -> createElement("itemName", $name);
                $idTag = $xml -> createElement("itemID", $id);
                $imageTag = $xml -> createElement("image", $image);
                $descTag = $xml -> createElement("description", $desc);
                $priceTag = $xml -> createElement("itemPrice", $price);
                $weightTag = $xml -> createElement("weight", $weight);

                //append created elements to xml file
                $newItem -> appendChild($aisleTag);
                $newItem -> appendChild($nameTag);
                $newItem -> appendChild($idTag);
                $newItem -> appendChild($imageTag);
                $newItem -> appendChild($descTag);
                $newItem -> appendChild($priceTag);
                $newItem -> appendChild($weightTag);
                $rootTag -> appendChild($newItem); 

                //save contents to xml file
                $xml -> save('product_list.xml');
                //send user back to another page
                header("Location: https://soen287finalproject.online/p7.php");
                exit();               
            }
            else{
                header("Location: https://soen287finalproject.online/p7.php");
                exit(); 
            }
        ?>
    </body>
</html>