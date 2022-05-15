<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<style>
    .container-fluid{
        padding-right: 3%;
    }
    .header{
        background: #709176;
        margin-bottom: 3%;
        
    }
    .header a{
        color: white;
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
                <a class="navbar-brand" href="p7.php"><b>Organik Backstore</b></a>
              </div>
              <ul class="nav navbar-nav">
                <li><a href="https://soen287finalproject.online">Client Page</a></li>
              </ul>
            </div>
          </nav>
    </header>
    <div class="container">
        <?php
            //edit product page
            if(isset($_POST['edit-btn'])){
                $name = $_POST['name'];
                //$image = $_POST['image'];
                $desc = $_POST['description'];
                $price = $_POST['price'];
                $weight = $_POST['weight'];
                $temp = $_POST['aisle'];
                $aisle = strtolower($temp);

                function isChecked($m, $n){
                    if($m == $n)
                        return "checked";
                    else 
                        return "";
                }

                $output = '<h2>Edit Product</h2> <br/> 
                <form action="update_product_xml.php" method = "POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Product Name:</label>
                        <input type="text" class="form-control" name = "name" value = "'.$name.'">
                    </div>
                    <br/>
                    <p>Aisle:</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="aisle" value="meat"'.isChecked($aisle, "meat").'>
                        <label class="form-check-label" for="meat">Meat</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="aisle" value="dairy" '.isChecked($aisle, "dairy").'>
                        <label class="form-check-label" for="dairy">Dairy</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="aisle" value="fruits" '.isChecked($aisle, "fruits").' >
                        <label class="form-check-label" for="fruits">Fruits</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="aisle" value="vegetables" '.isChecked($aisle, "vegetables").'>
                        <label class="form-check-label" for="veg">Vegetables</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="aisle" value="bakery" '.isChecked($aisle, "bakery").'>
                        <label class="form-check-label" for="bakery">Bakery</label>
                    </div>
                    <br/>
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload image:</label>
                        <input class="form-control" type="file" name = "image">
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" rows="5" name = "description">'.$desc.'</textarea>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="weight">Weight:</label>
                        <input type="text" name ="weight" class="form-control" value = "'.$weight.'"/>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" step = "0.01" name ="price" class="form-control" value = "'.$price.'"/>
                    </div>
                <br/>
                <button type="submit" class="btn btn-success" name="edit-button" >Edit</button>
            </form>';

            echo $output;
            }
            
            //add product page appears
            else{
                $output = '<h2>Add Product</h2><br/> <form action = "update_product_xml.php" method = "POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Product Name:</label>
                    <input type="text" class="form-control" name = "name">
                </div>
                <br/>
                <p>Aisle:</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="aisle" value="meat">
                    <label class="form-check-label" for="meat">Meat</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="aisle" value="dairy">
                    <label class="form-check-label" for="dairy">Dairy</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="aisle" value="fruits">
                    <label class="form-check-label" for="fruits">Fruits</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="aisle" value="vegetables">
                    <label class="form-check-label" for="veg">Vegetables</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="aisle" value="bakery">
                    <label class="form-check-label" for="bakery">Bakery</label>
                </div>
                <br/>
                <div class="mb-3">
                    <label for="image" class="form-label">Upload image:</label>
                    <input class="form-control" type="file" name = "image">
                </div>
              <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" rows="5" name = "description"></textarea>
              </div>
              <br/>
              <div class="form-group">
                <label for="weight">Weight:</label>
                <input type="text" name ="weight" class="form-control"/>
              </div>
              <br/>
              <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" step = "0.01" name ="price" class="form-control"/>
              </div>
              <br/>
              <button type="submit" class="btn btn-success" name="submit">Add</button>
            </form>';
            
            echo $output;
            }
        ?>
    </div>
        
</body>
</html>       