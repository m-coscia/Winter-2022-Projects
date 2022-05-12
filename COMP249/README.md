# COMP 249 - Object Oriented Programming II

The preceding course COMP 248 - Object Oriented Programming I - is a beginnner level course that introduces the basics of Java such as data types, loops, arrays, methods, classes, and object. 

COMP 249 builds on these topics by introducing more advanced topics. These subjects include design
of classes, inheritance, composition, polymorphism, static and dynamic binding, abstract classes,
exception handling, file I/O, recursion, interfaces, inner classes, graphical user interfaces,
generics, collections and iterators.

The projects in this folder are the assignments done in this course that utilize the above topics.

## Projects:

### 1. [Snake and Ladders Game](https://github.com/m-coscia/Winter-2022-Projects/tree/main/COMP249/Snakes%20and%20Ladders%20Game)
We were instructed to create a snake and ladders game with a few base rules:
1. There can only be 2 to 4 players playing the game
    - If the user enters an invalid number of players, they have 2 more opportunities before the program gets terminated.
2. The board played on is a 10 x 10 playing area
    - The following image is what the boarded needed to be like:
    
      ![image](https://user-images.githubusercontent.com/95299392/167700978-cb3c16ab-7147-4ba2-8624-abf82403c3e3.png)
      
    - If a player lands on a snake head, then their board position needs to be adjusted to the tail of the snake
    - If a player lands on a ladder base, then their board position needs to be adjusted to the top of the ladder
3. A player can move a value of 1 - 6 moves based on their dice value
4. The game ends once a player lands on tile 100 of the board
5. If a player rolls a value which results in them going over 100, they must move back with their excess. For instance, if the player's die value sends them to tile 105, they must move back 5 tiles from the 100 tile.

To create this game, the last topics of COMP 248 - methods and classes are used. All the methods to implement the game are defined in the `SnakeAndLadder.java` file while the driver file to play the game is `PlaySnakeAndLadder.java`.

#### Demo of the Snakes and Ladders Game

### 2. [CSV to HTML Converter](https://github.com/m-coscia/Winter-2022-Projects/tree/main/COMP249/CSV%20to%20HTML%20Program)
The objective of this assignment is 
