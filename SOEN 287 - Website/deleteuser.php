<html>
    <body>
        <?php
        if (isset($_POST['delete-btn'])){
            //echo '<script>alert("inside php")</script>';
            $users = new DomDocument("1.0", "UTF-8");
            $users->load('addoredituser.xml');
            if ($users == null){
                //echo '<script>alert("null xml object")</script>';
            }
            $email = $_POST['mail'];
            //echo '<script>alert("'.$email.'")</script>';

            foreach ($users->childNodes as $userinfo):
                if ($userinfo == null){
                    //echo '<script>alert("null iterator")</script>';
                }
                foreach($userinfo->childNodes as $userattr):
                    //echo '<script>alert("'.$userattr->nodeValue.'")</script>';
                    foreach ($userattr->childNodes as $innernodes):
                        //echo '<script>alert("'.$innernodes->nodeValue.'")</script>';
                        if($innernodes->nodeValue == $email){
                            //echo '<script>alert("getting innernode value")</script>';
                            //echo '<script>alert("'.$innernodes->nodeValue.'")</script>';
                            $userattr->parentNode->removeChild($userattr);
                            echo '<script>alert("after deleting")</script>';
                        }
                    endforeach;
                endforeach;
            endforeach;
            echo '<script>alert("before save")</script>';
            $users->save('addoredituser.xml');
            echo '<script>alert("after save")</script>';
        }
        echo '<script>alert("before header")</script>';
        header("Location: https://soen287finalproject.online/p9.php");
        ?>
    </body>
</html>