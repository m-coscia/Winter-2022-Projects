<?php
session_start();
$username = $_SESSION["username"];

if(isset($username))
header("Location:index.php");

if(isset($_POST['signupbtn']))
{
  $usersxml = 'addoredituser.xml';
  $users = simplexml_load_file($usersxml) or die("XML File Load Error");
  $userslist = "";

  $email = $_POST['email'];

  // check if user exists
  $exists = FALSE;
  foreach ($users as $userinfo)
  {
      if($userinfo->email == $email) $exists = TRUE;
  }
  if(!$exists)
  {
  // xml doc
  $xml = new DomDocument("1.0", "UTF-8");
  $xml->load('addoredituser.xml');

  // form info
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];

  $usersTag = $xml->getElementsByTagName("users")->item(0);
  $infoTag = $xml->createElement("info");
  $fnameTag = $xml->createElement("firstname", $firstName);
  $lnameTag = $xml->createElement("lastname", $lastName);
  $emailTag = $xml->createElement("email", $email);
  $passwordTag = $xml->createElement("password", $password);

  $infoTag->appendChild($fnameTag);
  $infoTag->appendChild($lnameTag);
  $infoTag->appendChild($emailTag);
  $infoTag->appendChild($passwordTag);
  $usersTag->appendChild($infoTag);

  $xml->save('addoredituser.xml');
  header("Location: signin.php");
  exit();
  }
else
{
  if(isset($email_echo))
  $email_echo = "";
  else
  $email_echo = "An account with this email already exists.";
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sign Up | Organik</title>
    <meta charset="utf-8" />
    <meta name="Title" content="SOEN 287 Assignment 1" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- font awesome link -->
    <script
      src="https://kit.fontawesome.com/5dd9030673.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="signup.css?v=<?php echo time(); ?>">
    <!-- css file link -->
     <!-- <link rel="stylesheet" href="product_general_plus_nav.css" /> -->
  </head>

  <body>
    <!-- NAV BAR -->
    <nav class = "navbar"></nav>
    <script defer>
                
            var navbar = document.getElementsByClassName("navbar")[0];
            var logo = document.createElement("a");
            var logoImg = document.createElement("img");
            logo.href = "index.php";
            logoImg.src="logo.png";
            logo.appendChild(logoImg);
            navbar.appendChild(logo);

            var drops = document.createElement("div");
            var fas = document.createElement("i");
            drops.className = "drop_main"
            fas.className = "fas fa-caret-square-down fa-2x";
            drops.appendChild(fas);
            


            var xmlhttp, xmlDoc;

            xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "product_list.xml", false);
            xmlhttp.send();
            xmlDoc = xmlhttp.responseXML;

            let itemIDs = [];
            let itemPrices = [];
            let itemNames = [];
            let itemAisles = [];
            let itemWeights = [];
            let itemImages = [];

            let allItemIDs=xmlDoc.getElementsByTagName("itemID");
            let allItemPrices = xmlDoc.getElementsByTagName("itemPrice");
            let allItemNames = xmlDoc.getElementsByTagName("itemName");
            let allItemAisles = xmlDoc.getElementsByTagName("aisle");
            let allItemWeights = xmlDoc.getElementsByTagName("weight");
            let allItemImages = xmlDoc.getElementsByTagName("image");


            for (let i = 0; i < allItemIDs.length;i++){
                
                itemIDs.push(allItemIDs[i].childNodes[0].nodeValue);
                itemPrices.push(allItemPrices[i].childNodes[0].nodeValue);
                itemNames.push(allItemNames[i].childNodes[0].nodeValue);
                itemAisles.push(allItemAisles[i].childNodes[0].nodeValue);
                itemWeights.push(allItemWeights[i].childNodes[0].nodeValue);
                itemImages.push(allItemImages[i].childNodes[0].nodeValue);

            }
            var fruitDrops = document.createElement("div");
            fruitDrops.className = "drop_cat";
            var fruitHolder = document.createElement("div");
            fruitHolder.className = "drop_sub1";
            var fruitLink = document.createElement("a");
            fruitLink.href = "aisle.html?aisleID=fruits";
            fruitLink.innerHTML = "Fruits";

            fruitDrops.appendChild(fruitLink);
            fruitDrops.appendChild(fruitHolder);


            var vegeDrops = document.createElement("div");
            vegeDrops.className = "drop_cat";
            var vegeHolder = document.createElement("div");
            vegeHolder.className = "drop_sub1";
            var vegeLink = document.createElement("a");
            vegeLink.href = "aisle.html?aisleID=vegetables";
            vegeLink.innerHTML = "Vegetables";

            vegeDrops.appendChild(vegeLink);
            vegeDrops.appendChild(vegeHolder);

            var meatDrops = document.createElement("div");
            meatDrops.className = "drop_cat";
            var meatHolder = document.createElement("div");
            meatHolder.className = "drop_sub1";
            var meatLink = document.createElement("a");
            meatLink.href = "aisle.html?aisleID=meat";
            meatLink.innerHTML = "Meat";

            meatDrops.appendChild(meatLink);
            meatDrops.appendChild(meatHolder);
        

            var dairyDrops = document.createElement("div");
            dairyDrops.className = "drop_cat";
            var dairyHolder = document.createElement("div");
            dairyHolder.className = "drop_sub1";
            var dairyLink = document.createElement("a");
            dairyLink.href = "aisle.html?aisleID=dairy";
            dairyLink.innerHTML = "Dairy";

            dairyDrops.appendChild(dairyLink);
            dairyDrops.appendChild(dairyHolder);

            
            var bakeryDrops = document.createElement("div");
            bakeryDrops.className = "drop_cat";
            var bakeryHolder = document.createElement("div");
            bakeryHolder.className = "drop_sub1";
            var bakeryLink = document.createElement("a");
            bakeryLink.href = "aisle.html?aisleID=bakery";
            bakeryLink.innerHTML = "Bakery";

            bakeryDrops.appendChild(bakeryLink);
            bakeryDrops.appendChild(bakeryHolder);

            for(let i = 0; i < itemIDs.length; i++){
                var currentItem = document.createElement("a");
                currentItem.className = "drop_sub_item";
                currentItem.href = "itemTemplate.html?itemID="+itemIDs[i]+"&itemName="+itemNames[i]+"&itemPrice="+itemPrices[i]+"&aisle="+itemAisles[i]+"&measureUnit="+itemWeights[i];
                currentItem.innerHTML = itemNames[i];
                if (itemAisles[i] == "fruits"){
                    fruitHolder.appendChild(currentItem);
                } else if (itemAisles[i] == "vegetables"){
                    vegeHolder.appendChild(currentItem);
                } else if (itemAisles[i] == "meat"){
                    meatHolder.appendChild(currentItem);
                } else if (itemAisles[i] == "dairy"){
                    dairyHolder.appendChild(currentItem);
                } else if (itemAisles[i] == "bakery"){
                    bakeryHolder.appendChild(currentItem);
                }
            }

            drops.appendChild(fruitDrops);
            drops.appendChild(vegeDrops);
            drops.appendChild(meatDrops);
            drops.appendChild(dairyDrops);
            drops.appendChild(bakeryDrops);

            

            var otherHolder = document.createElement("div");
            otherHolder.className = "other_items";
            var cartHolder = document.createElement("a");
            cartHolder.href = "addtocart.php";
            var cart = document.createElement("i");
            cart.className = "fas fa-shopping-cart";
            cartHolder.appendChild(cart);
            cart.innerHTML = "Cart";
            otherHolder.appendChild(cartHolder);

            navbar.appendChild(drops);
            </script>

            <?php if (isset($_SESSION["username"])): ?>
            <script>
            var logoutHolder = document.createElement("a");
            logoutHolder.href = "logout.php";
            var logout = document.createElement("i");
            logout.className = "far fa-user-circle";
            logoutHolder.appendChild(logout);
            logout.innerHTML = "Log Out";
            otherHolder.appendChild(logoutHolder);

            navbar.appendChild(otherHolder);
            </script>
           <?php endif ?>
           <?php if (!(isset($_SESSION["username"]))): ?>
            <script>
            var signupHolder = document.createElement("a");
            signupHolder.href = "signup.php";
            var signup = document.createElement("i");
            signup.className = "far fa-user-circle";
            signupHolder.appendChild(signup);
            signup.innerHTML = "Sign Up";
            otherHolder.appendChild(signupHolder);

            var signinHolder = document.createElement("a");
            signinHolder.href = "signin.php";
            var signin = document.createElement("i");
            signin.className = "far fa-user-circle";
            signinHolder.appendChild(signin);
            signin.innerHTML = "Sign In";
            otherHolder.appendChild(signinHolder);

            

            //navbar.appendChild(drops);
            navbar.appendChild(otherHolder);
            </script>
            <?php endif ?>


    <!-- showing products -->
    <h1 class="heading">Sign-Up</h1>
    <section class="products" id="bakery">
      
<div class="box-signup">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" class="form-signup">
      <span id="message"></span> <br>
      <?php if (isset($email_echo)): ?>
      <span id="email_echo"> <?php echo $email_echo ?> </span>
      <?php endif ?>
        <div class="input-line">
            <div class="input-box">
              <h3>First Name</h2>
              <input
                type="text"
                name="firstName"
                id="firstName"
                class="input-signup"
                placeholder="Enter your first name"
                required
              />

              <br> 
              <br>
                
            
              <h3>Last Name</h2>
              <input
                type="text"
                name="lastName"
                id="lastName"
                class="input-signup"
                placeholder="Enter your last name"
                required
              />
          
              <br> 
              <br>
                

              <h3>Email</h2>
              <input
                type="email"
                name="email"
                id="email"
                class="input-signup"
                placeholder="Enter your email"
                required
              />
           
              <br> 
              <br>


              <h3>Password</h2>
              <input
                type="password"
                name="password"
                id="password"
                class="input-signup"
                placeholder="Enter your password"
                required
                onkeyup="checkPasswords()"
              />
                
              <br>
              <br>

              <h3>Confirm Password</h2>
              <input
                type="password"
                name="confirmPassword"
                id="confirmPassword"
                class="input-signup"
                placeholder="Confirm your password"
                required
                onkeyup="checkPasswords()"
              />
            
              <br> 
              <br>
                <div class="reg">
                <button type="reset" class="resetbtn">Reset</button> 
                <button type="submit" class="signupbtn" name="signupbtn">Sign Up</button> 
                <h4>Already have an Organik account? <a href="signin.php" style = "color: dodgerblue;">Sign-In</a></h4>
                </div>

            </div>
        </div>
    </form>
</div>
<script>
  function checkPasswords() {
  var messageSpan = document.getElementById("message");
  var password = document.getElementById("password");
  console.log(password);
  var confirmPassword = document.getElementById("confirmPassword");
  console.log(confirmPassword);
  if (password.value != confirmPassword.value) {
    messageSpan.style.color = "red";
    messageSpan.innerHTML = "Passwords don't match";
  } else {
    messageSpan.style.color = "green";
    messageSpan.innerHTML = "Passwords match";
  }
}</script>
</section>

</body>
</html>