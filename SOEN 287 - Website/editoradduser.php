<?php 
session_start();
$username = $_SESSION["username"];

if(!($username == "admin@email.com"))
header("Location:index.php");
?>

<!DOCTYPE html>
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
                <a class="navbar-brand" href="p9.php"><b>Organik Backstore</b></a>
              </div>
              <ul class="nav navbar-nav">
                <li><a href="https://soen287finalproject.online/index.php">Client Page</a></li>
              </ul>
            </div>
          </nav>
    </header>

    <div class="container">
        <h2>Edit or Add User</h2>
        <br/>
        <?php
            if (isset($_POST['edit-btn'])){
                $email = $_POST['email'];
                $firstname = $_POST['fname'];
                $lastname = $_POST['lname'];
                $password = $_POST['password'];
                $htmlstring ='<form action="updateadduser.php" method = "POST">
                                <!-- change name, id, and for values-->
                                <div class="form-group">
                                    <label for="firstname" >First Name:</label>
                                    <input type="text" class="form-control" name="firstname" id="f_name" value = "'.$firstname.'">
                                </div>
                                <div class="form-group">
                                    <label for="lastname" >Last Name:</label>
                                    <input type="text" class="form-control" name="lastname" id="l_name" value = "'.$lastname.'">
                                </div>
                                <div class="form-group">
                                    <label for="email" >Email:</label>
                                    <input type="hidden" name="initialemail" value="'.$email.'">
                                    <input type="text" class="form-control" name="email" id="user_email" value = "'.$email.'">
                                </div>
                                <div class="form-group">
                                    <label for="password" >Password:</label>
                                    <input type="text" class="form-control" name="password" id="user_password" value = "'.$password.'">
                                </div>
                            <br/>
                            <button type="submit" class="btn btn-success" name="user-update" value="POST">Add</button>
                            </form>';
            }
            else{
                $htmlstring = ' <form action="updateadduser.php" method = "POST">
                                    <!-- change name, id, and for values-->
                                    <div class="form-group">
                                        <label for="firstname" >First Name:</label>
                                        <input type="text" class="form-control" name="firstname" id="f_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname" >Last Name:</label>
                                        <input type="text" class="form-control" name="lastname" id="l_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email" >Email:</label>
                                        <input type="text" class="form-control" name="email" id="user_email">
                                    </div>
                                    <div class="form-group">
                                        <label for="password" >Password:</label>
                                        <input type="text" class="form-control" name="password" id="user_password">
                                    </div>
                                <br/>
                                <button type="submit" class="btn btn-success" name="user-submit" value="POST">Add</button>
                                </form>';
            }
            echo $htmlstring;
        ?>
        <!--
        <form action="updateadduser.php" method = "POST">
            change name, id, and for values
            <div class="form-group">
                <label for="firstname" >First Name:</label>
                <input type="text" class="form-control" name="firstname" id="f_name">
            </div>
            <div class="form-group">
                <label for="lastname" >Last Name:</label>
                <input type="text" class="form-control" name="lastname" id="l_name">
            </div>
            <div class="form-group">
                <label for="email" >Email:</label>
                <input type="text" class="form-control" name="email" id="user_email">
            </div>
            <div class="form-group">
                <label for="password" >Password:</label>
                <input type="text" class="form-control" name="password" id="user_password">
            </div>
          <br/>
          <button type="submit" class="btn btn-success" name="user-submit" value="POST">Add</button>
        </form>
        -->
      </div>

</body>
</html>