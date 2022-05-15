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
    
</style>
    
<body>
    
    <header class = "header">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="p9.php"><b>Organik Backstore</b></a>
              </div>
              
              <ul class="nav navbar-nav">
                <li><a href="https://soen287finalproject.online/">Client Page</a></li>
              </ul>
              
            </div>
          </nav>
    </header>


        <div class="row  py-3">
            <div class="col-sm-3 px-4">
                <div class="list-group list-group-flush">
                    <a href="p9.php" class="list-group-item list-group-item-action active">
                        Users
                    </a>
                    <a href="P11.php" class="list-group-item list-group-item-action">
                        Orders
                    </a>
                    <a href="p7.php" class="list-group-item list-group-item-action"><!---active makes it look blue-->
                        Products
                    </a>
                </div>
            </div>
            <div class="col-sm-9 bg-light">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $usersxml = 'addoredituser.xml';
                        $users = simplexml_load_file($usersxml) or die("Error: Cannot create xml object");
                        $userlist = "";
                        $key=1;
                        foreach ($users as $userinfo):
                            $userlist .= '<tr>
                                            <td>'.$userinfo->firstname.' '.$userinfo->lastname.'</td>
                                            <td>'.$userinfo->email.'</td>
                                            <td>
                                                <form action = "editoradduser.php" method = "POST">
                                                    <input type = "hidden" name="fname" value="'.$userinfo->firstname.'">
                                                    <input type = "hidden" name="lname" value="'.$userinfo->lastname.'">
                                                    <input type = "hidden" name="email" value="'.$userinfo->email.'">
                                                    <input type = "hidden" name="password" value="'.$userinfo->password.'">
                                                    <button type="submit" class="btn btn-info" name = "edit-btn" value = "POST"  >•••</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action = "deleteuser.php" method = "POST">
                                                    <input type="hidden" name = "mail" value="'.$userinfo->email.'">
                                                    <button type="submit" class="btn btn-danger" name = "delete-btn" value="POST" >X</button>
                                                </form>
                                            </td>';
                        endforeach;

                        echo $userlist;

                        ?>
                    </tbody>
                </table>

                <div class = "row py-3 text-center" style = "float: right; padding-right: 1vw;">
                    <button type="button" class="btn btn-success" onclick="window.location.href='editoradduser.php'">Add</button>
                </div>
            </div>
        </div>

</body>

</html>