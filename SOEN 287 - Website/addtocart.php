<!DOCTYPE html>




<html lang="en">
  <head>
    <title>Shopping Cart | Organik</title>
    <meta charset="utf-8" />
    <meta name="Title" content="SOEN 287 Assignment 1" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- font awesome link -->
    <script
      src="https://kit.fontawesome.com/5dd9030673.js"
      crossorigin="anonymous"
    ></script>

    <!-- css file link -->
    <link rel="stylesheet" href="addtocart.css" />

    <!-- javascript link -->
    <!-- <script src="shoppingcart.js" async></script> -->
  </head>

  <body>
    <nav class="navbar">
      
    </nav>
    <!-- showing products -->
    <h1 class="heading"><i class="fas fa-shopping-cart"></i>Shopping Cart</h1>
    <form method="POST" action="addtocart.php">
    <section class="products" id="shopping-cart">
      <div class="box-shoppingcart">
        <!--  
        <div class="shopping-row">
          <div class="prod-img">
            <img src="tomato.jpg" alt="" />
          </div>
          <div class="prod-info">
            <h2 class="prod-name">Cherry Tomatoes</h2>
            <h4 class="cartPrice">$7.99</h4>
          </div>
          <div class="prod-quantity">
            <button class="btn-plus">+</button>
            <input
              type="text"
              name="prod-quantity"
              class="prod-quantity-input"
              value="1"
            />
            <button class="btn-minus">-</button>
          </div>
          <div class="functions">
            <button class="btn-remove">Remove</button>
          </div>
        </div>
        <div class="shopping-row">
          <div class="prod-img">
            <img src="cakee.jpg" alt="" />
          </div>
          <div class="prod-info">
            <h2 class="prod-name">Chocolate Cake</h2>
            <h4 class="cartPrice">$5.00</h4>
          </div>
          <div class="prod-quantity">
            <button class="btn-plus">+</button>
            <input
              type="text"
              name="prod-quantity"
              class="prod-quantity-input"
              value="1"
            />
            <button class="btn-minus">-</button>
          </div>
          <div class="functions">
            <button class="btn-remove">Remove</button>
          </div>
        </div>
        <div class="shopping-row">
          <div class="prod-img">
            <img src="lettuce.jpg" alt="" />
          </div>
          <div class="prod-info">
            <h2 class="prod-name">Organic Lettuce</h2>
            <h4 class="cartPrice">$5.99</h4>
          </div>
          <div class="prod-quantity">
            <button class="btn-plus">+</button>
            <input
              type="text"
              name="prod-quantity"
              class="prod-quantity-input"
              value="1"
            />
            <button class="btn-minus">-</button>
          </div>
          <div class="functions">
            <button class="btn-remove">Remove</button>
          </div>
        </div> -->
      </div>

      <div class="box-shoppingcheckout">
        <div class="checkout-row">
          <div class="titles">
            <h3>Number of Items:</h3>
          </div>
          <h3 class="numItems">0</h3>
        </div>
        <div class="checkout-row">
          <div class="titles">
            <h3>Subtotal:</h3>
          </div>
          <h3 class="cartSubTotal">$0</h3>
        </div>
        <div class="checkout-row">
          <div class="titles">
            <h3>GST:</h3>
          </div>
          <h3 class="GST">$0</h3>
        </div>
        <div class="checkout-row">
          <div class="titles">
            <h3>QST:</h3>
          </div>
          <h3 class="QST">$0</h3>
        </div>
        <div class="checkout-row">
          <div class="titles">
            <h3>Total:</h3>
          </div>
          <h3 class="cartTotal">$0</h3>
        </div>
        <div class="checkout-row">
          <button type="submit" name="CheckOut" value="CheckOut" class="btn-checkout">CheckOut</button>
          <!-- onclick checkout() -->
          <button type="button" class="btn-continueshopping" onclick="location.href='index.php'">Continue Shopping</button>
          <!-- onlick continueShoppingClicked -->
          <!-- <input type="submit" name="CheckOut" value="CheckOut" />  -->
        </div>
        <!-- <div class="checkout-row"><input type="submit" value="CheckOut"></div> -->
      </div>
    </section>
    </form>
    <script>
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

            navbar.appendChild(drops);
            navbar.appendChild(otherHolder);
        


    </script>
    <script src="retrieveStorageInfo.js"></script>
    <script src="addtocart.js"></script>
  </body>
</html>

<!-- PHP -->
<?php
if(isset($_POST['CheckOut'])){

  $xml = new DOMDocument("1.0", "UTF-8");
  $xml->load('orders.xml');

  if (empty($_POST['prod-name'])){
    echo '<script>alert("There are no items in the cart!")</script>';
  } else {
  $itemID = $_POST['prod-name'];
  $quantity = $_POST['prod-quantity'];

  $ordersRootTag = $xml->getElementsByTagName("orders")->item(0);
  $orderTag = $xml->createElement("order");

  for ($i = 0; $i < sizeof($quantity); $i++){
    echo '<script>alert("Thank you for shopping with us!")</script>';

    $itemTag = $xml->createElement("item");
    $quantityTag = $xml->createElement("quantity", $quantity[$i]);
    $itemIDTag = $xml->createElement("itemID", $itemID[$i]);
    
    $itemTag->appendChild($itemIDTag);
    $itemTag->appendChild($quantityTag);
    $orderTag->appendChild($itemTag);
  }
  
  $ordersRootTag->appendChild($orderTag);
  $xml->formatOutput = true;
  $xml->save('orders.xml');
  header("Location: http://localhost/Final_SOEN287_Github/index.php");
  exit();
  }
}

?>