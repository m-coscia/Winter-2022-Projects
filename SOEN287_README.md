# SOEN 287 (Web Programming) Project: Online Grocery Store

### Project Partners:
<a href="https://github.com/RyanGuzelian">Ryan Guzelian</a><br/>
<a href="https://github.com/suha-ab">Suha Abubakr</a><br/>
<a href="https://github.com/inas-fawzi">Inas Fawzi</a><br/>
<a href="https://github.com/m-coscia">Megan Coscia</a><br/>
<a href="https://github.com/Denis-Oh">Denis Oh</a><br/>

## Project Overview

For a web programming course, create a website that would simulate the experience on a grocer's online store. The website comprised of 2 parts:
1. **A Front Store:**
    - This side of the website can be accessed by any user. The client could browse the aisles of the grocery store, broswse through the products offered by the website, add said-products to their cart, and create an account to place their order.
2. **A Back Store:**
    - This side of the website could only be accessed by the admin's login. The entire list of products, orders and users could be modified by either edtiing, adding or deleting to them.

Our team used a series of languages to perform different actions:
- HTML to structure our pages
- CSS / Bootstrap to design the style of the pages
- Javascript to perform functions and make pages dynamic
- PHP to store and access data as well as create pages dynamically

Snce we have not learned about databases at the time, we stored data onto XML files - one for the list of products, one for list of orders, and one for the list of users. We used PHP and Javascript to access the contents of these files as well as modify them.

## Table of Contents
- [SOEN 287 (Web Programming) Project - Online Grocery Store](#soen-287-web-programming-project-online-grocery-store)
    + [Project Partners](#project-partners)
  * [Project Overview](#project-overview)
  * [Table of Contents](#table-of-contents)
  * [Demo of the Webpage](#demo-of-the-webpage)
    + [Front Store](#front-store)
    + [Back Store](#back-store)
  * [Front Store Description](#front-store-description)
    + [The Index Page](#the-index-page)
    + [Navigation Bar](#navigation-bar)
    + [Aisle Pages](#aisle-pages)
    + [Product Pages](#product-pages)
    + [Login and Signup Pages](#login-and-signup-pages)
    + [Shopping Cart](#shopping-cart)
  * [Back Store Description](#back-store-description)
    + [Accessing the Back Store](#accessing-the-back-store)
    + [Order Pages](#order-pages)
    + [Order Pages](#order-pages)
    + [User Pages](#user-pages)
    + [Product Pages](#product-pages-1)
  * [Responsiveness](#responsiveness)

## Demo of the Webpage
### Front Store
https://user-images.githubusercontent.com/95299392/166863336-2c1cd11b-b1d2-419e-a489-a8dbc911b455.mp4

### Back Store
https://user-images.githubusercontent.com/95299392/166864565-1d336625-e10b-45ba-9805-17465f48b946.mp4

## Front Store Description
### The Index Page
The index page is the home page of the website. 
It displays all the aisles of the grocery store that can be selected.

![image](https://user-images.githubusercontent.com/95299392/166865622-6c0a4fcf-28a1-4ea5-8430-58a816792404.png)

When you login into the page, the index page displays a welcome message to the user.

![image](https://user-images.githubusercontent.com/95299392/166866509-b44ac427-8e3a-4b7a-b767-9a0483b3eb81.png)

### Navigation Bar
When clicking the logo, the user is redirected to the index page.

To ensure responsive, a nested dropdown menu is used to embed all the products and aisles into the navigation bar. 

![Screenshot (274)](https://user-images.githubusercontent.com/95299392/166868251-e0769f1a-69ad-4678-b4ad-d0b42f660584.png)

Links to the signup, signin and the shopping cart pages can be accessed from the navigation bar. 

![image](https://user-images.githubusercontent.com/95299392/166868094-8521524e-0dd2-4266-b89d-2124229bc638.png)


### Aisle Pages
The aisle pages display all the products within that category. You are able to add products to the cart without having to access the product's page. 

These pages were created dynamically using a template HTML file and Javascript. It loops through the correct XML file and retrieves the products from that specific and displays them. 

To access a product page from this page, you could click on either the product's image or name.

![image](https://user-images.githubusercontent.com/95299392/167008965-9376a19a-bfca-4a15-833b-f74f732aa430.png)


### Product Pages
The product pages displays all the information regarding the product which included its name, weight, price, as well as a description which could be viewed by pressing "...More Description". 

You can choose a quantity to send to the shopping cart by either entering a number manually or clicking the arrows withing the number input. 

All the product pages are created dynamically using a template HTML file and Javascript. The URL stores some of the product info and the rest is retrieved from the product list XML file.

To get redirected to back to the aisle, an embedded link of the aisle is place at the top of the card on the right.

![image](https://user-images.githubusercontent.com/95299392/167013586-09485248-e93b-42c4-8bb2-753273d0ed56.png)

### Login and Signup Pages
To access the signin or signup pages, clicking the links on the navigation bar will suffice. 

To sign up as a new user, you must fill in a complete name, an email as well as enter the same password twice - you will not be able to proceed with mismatching passwords. Once having signup, it redirects you to the signin page to login. Once logging in, it redirects to the index page with a welcome message to the user. 

To create these pages, PHP and Javascript were used to perform functions as well as modify the XML files.

**Signup Page:**

![image](https://user-images.githubusercontent.com/95299392/167018365-986c43ca-9753-427d-ac97-fc6f0d2c462b.png)

**Signin Page:**

![image](https://user-images.githubusercontent.com/95299392/167018489-f5e5fac6-a4c9-4abb-8921-d13ae97ff24f.png)

### Shopping Cart
When pressing the "add to cart" button on either the product or aisle pages, it sends the user to the shopping cart page to view the items in their cart. The number of items is displayed as well as cost-related information: subtotal, the separate taxes (GST and QST), and the final total of the purchase.

The user can change the quantities of the items of items in their cart or completely remove an item from their shopping cart. 

When clicking the "Checkout" button, the order is saved to the orders XML file, an alert thanks the user for their purchase and the cart page is reset. 

https://user-images.githubusercontent.com/95299392/167023441-ce8511be-f120-4561-9474-61a1aef56fd5.mp4

They can decide to checkout or continue browsing the website. If the user clicks the "Continue Shopping" button, an alert tells the user the contents of their basket has been saved and they are sent to the index page. 

https://user-images.githubusercontent.com/95299392/167023491-81e46bc5-1065-4b08-8d67-480ffd93ab55.mp4

To create this page, PHP and Javascript were used to access the contents of XML/webpages, allow the user to manpulate the elements on the page, and writing to XML file.

## Back Store Description
### Accessing the Back Store
The back store has three main pages: users, orders, and products - each of these pages have another page to edit or add products. These main pages have files called p7.php, p9.php, and P11.php. 

These can only be accessed when the admin user signs into the wesbite. 

https://user-images.githubusercontent.com/95299392/167200734-a3802fd5-1f5d-489b-ada4-5d4e95a55fd6.mp4

If a user tries to access the pages without being the admin, then the user is sent to the index page instead.

https://user-images.githubusercontent.com/95299392/167200792-bf24ccb2-4282-4fc4-9119-146c860a35ad.mp4

However, once logged in, if the admin user wants to view the front store, they can press the "Client Site" link in the navigation bar.

https://user-images.githubusercontent.com/95299392/167200842-9acaa97b-e28e-4c80-b92b-a19bc2ea695f.mp4

As long as they are still logged in, to return back to the backstore, the admin will see a link on the navigtion bar of the front store called "Backstore". By clicking this link, they will return back to the backstore.

https://user-images.githubusercontent.com/95299392/167200886-3449c428-dd7c-43ba-af33-1c02ba1d1cb2.mp4

### Order Pages
The orders page displays all the orders that have been placed on the site by clients using the front store. When a user clicks checkout, the items in their cart will be written to an XML file. This XML file is read using PHP and all the orders are displayed on the back store's order page. 

Next to each order, there are two buttons - "Edit" and "Delete". These buttons can be found on the products and users pages as well next to each element.

When clicking the "Edit" button, the admin is redirected to a page where they can modify the contents fo the order. The quantity of the current items can be increased, decreased or removed as well as new products can be added by knowing the item IDs - lowercase and spaces removed of the item's name. Clicking "Save" will rewrite the order to the orders' XML file.

When clicking the "Add" button, it brings the admin to a similar page as the "Edit" button except is blank for the admin to add products at will.

When clicking the "Delete" button, the element is removed from the XML file and will no longer appear on the orders page.

### User Pages
The users page displays all the users - the main page only displays the user's full name and their email. The user's password can only be viewed when the admin clicks on the "Edit" button.

When clicking the "Edit" button, the admin is redirect to a page where they can modify the user's personal information which includes their first and last name, their email, and their password. The contents of the page are shown in the text inputs which the admin can change. Clicking the button at the bottom of the page will rewrite the user's contents to the users XML file with the edited informaton.

When clicking the "Add" button, it brings the admin to a similar page as the "Edit" button except all inputs are blank for the admin to add the user information at will.

When clicking the "Delete" button, the element is removed from the XML file and will no longer appear on the users page.

### Product Pages
The products page displays all the products sold on the website to the clients. All the information required to make a product page in the front store is stored in an product list XML file. This would include, the product's name, aisle, image, weight, description, and price. The product's ID is only in the XML file and only accessed when creating the product pages in the front store through Javascript.

When clicking the "Edit" button, the admin is redirect to a page where they can modify the product's information which includes the name, aisle, image, weight, price, and description. If the admin does not choose a new image, the previous image will be used. Otherwise, the new image will replace the old image on the XML file. Different input types are used to satisfy certain limitation on different information. The button at the bottom of the page will rewrite the product's contents to the product list XML file with the edited informaton.

When clicking the "Add" button, it brings the admin to a similar page as the "Edit" button except all inputs are blank for the admin to add the product information at will.

When clicking the "Delete" button, the element is removed from the XML file and will no longer appear on the products page.

## Responsiveness
One of the requirements of the project was to have the website pages' be responsive. The following are demonstrations of the responsiveness on different pages:

- Index Page:

    https://user-images.githubusercontent.com/95299392/166865897-4813f2ad-3ee3-4e7e-8fab-fa60f801f37d.mp4

- Aisle Page:

    https://user-images.githubusercontent.com/95299392/167694617-229358fa-6c13-4780-9f66-d0c215a6a59e.mp4

- Product Page:

    https://user-images.githubusercontent.com/95299392/167694694-bd05d4ac-a3c4-4471-97de-ea988bf9f994.mp4

- Shopping Cart Page:

    https://user-images.githubusercontent.com/95299392/167694670-e45f65cf-ee2a-4010-8699-044adf7a3280.mp4

- Signup Page:

    https://user-images.githubusercontent.com/95299392/167695424-06fe388d-e74e-4b6e-90d7-83007cd90cb6.mp4

- Signin Page:

    https://user-images.githubusercontent.com/95299392/167695409-24b89e90-48d3-4fb2-b5a2-2bf52db4e001.mp4
