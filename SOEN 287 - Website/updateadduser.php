<html>
    <body>
    <?php
    if(isset($_POST['user-submit']))
    {
        $xml = new DomDocument("1.0", "UTF-8");
        $xml->load('addoredituser.xml');

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $usersTag = $xml->getElementsByTagName("users")->item(0);
        $infoTag = $xml->createElement("info");
        $fnameTag = $xml->createElement("firstname", $firstname);
        $lnameTag = $xml->createElement("lastname", $lastname);
        $emailTag = $xml->createElement("email", $email);
        $passwordTag = $xml->createElement("password", $password);

        $infoTag->appendChild($fnameTag);
        $infoTag->appendChild($lnameTag);
        $infoTag->appendChild($emailTag);
        $infoTag->appendChild($passwordTag);
        $usersTag->appendChild($infoTag);

        $xml->save('addoredituser.xml');
        header("Location: https://soen287finalproject.online/p9.php");
        exit();
    }
    if(isset($_POST['user-update']))
    {
        $xml = new DomDocument("1.0", "UTF-8");
        $xml->load('addoredituser.xml');

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $initialemail = $_POST['initialemail'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        foreach ($xml->childNodes as $user):
            /*if ($userinfo == null){
                echo '<script>alert("null iterator")</script>';
            }*/
            foreach($user->childNodes as $userinfo):
                foreach ($userinfo->childNodes as $innernodes):
                    //echo '<script>alert("inner for each")</script>';
                    if($innernodes->nodeValue == $initialemail){
                        //echo '<script>alert("getting innernode value")</script>';
                        $userinfo->parentNode->removeChild($userinfo);
                        $usersTag = $xml->getElementsByTagName("users")->item(0);
                        $infoTag = $xml->createElement("info");
                        $fnameTag = $xml->createElement("firstname", $firstname);
                        $lnameTag = $xml->createElement("lastname", $lastname);
                        $emailTag = $xml->createElement("email", $email);
                        $passwordTag = $xml->createElement("password", $password);

                        $infoTag->appendChild($fnameTag);
                        $infoTag->appendChild($lnameTag);
                        $infoTag->appendChild($emailTag);
                        $infoTag->appendChild($passwordTag);
                        $usersTag->appendChild($infoTag);
                    }
                endforeach;
            endforeach;
        endforeach;

        $xml->save('addoredituser.xml');
        header("Location: https://soen287finalproject.online/p9.php");
        exit();
    }
    ?>
    </body>
</html>
