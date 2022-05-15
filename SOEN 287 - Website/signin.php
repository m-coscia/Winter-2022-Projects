<?php
// Brainstorming:
//-> user presses sign in -> check if email exists
//-> exists? check password -> correct? set cookie + redirect to home for normal user or to backstore for admin
//-> doesn't exist? display "incorrect email or password"

if(isset($_POST['signinbtn']))
{
  $usersxml = 'addoredituser.xml';
  $users = simplexml_load_file($usersxml) or die("XML File no work lol");
  $userslist = "";

  $email = $_POST['email'];
  $password = $_POST['password'];

  // check if user exists
  $correct = FALSE;
  foreach ($users as $userinfo)
  {
      if($userinfo->email == $email && $userinfo->password == $password) $correct = TRUE;
  }
  if(!$correct)
  {
    if(isset($email_echo))
    $email_echo = "";
    else
    $email_echo = "Incorrect email or password";
  }
  else
  {
    session_start();
    $_SESSION["username"] = $email;
    if($email == "admin@email.com")
    header("Location: p7.php"); 
    else
    header("Location: index.php");
  }

}
else
{
    session_start();
    if(isset($_SESSION["username"]))
    {
        $email2 = $_SESSION["username"];
        if($email2 == "admin@email.com")
        header("Location:p7.php");
        else
        header("Location:index.php"); 
    }

}
if(isset($_POST["logout"]))
{
    session_destroy();
    header("Location:index.php");
}
// dont forget to close
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=devide-width, initial-scale=1">
        <title>Sign-In</title>
        <link rel="stylesheet" href="signin.css">
        <script src="https://kit.fontawesome.com/5dd9030673.js" crossorigin="anonymous"></script>
    </head>

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

    <body>
        <h1 class="heading">Sign-In</h1>
        <section class="products" id="bakery">
        <div class="box-signup">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-signup" method="post">
                <div class="input-line">
                    <?php if (isset($email_echo)): ?>
                    <span id="email_echo"> <?php echo $email_echo ?> </span>
                    <?php endif ?>
                    <div class="input-box">
                      
        
                      <h3>Email</h2>
                      <input
                        type="email"
                        name="email"
                        id="email"
                        class="input-signup"
                        placeholder="Enter your email"
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
                      />
                        
                      
                        <div class="reg">
                        <button type="button" class="cancelbtn">Cancel</button> 
                        <button type="submit" class="signupbtn" name="signinbtn">Sign In</button> 
                        <h4>Don't have an Organik account? <a href="http://localhost/signin/signup.php" style = "color: dodgerblue;">Sign-Up</a></h4>
                        </div>
    
                    </div>
                </div>
            </form>
        </div>
        
        <script src="signin.js"></script>
        
    

</body>
</html>