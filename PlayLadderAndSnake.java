// -----------------------------------------------------
// Assignment 1
// Question: Question 1 Part 2
// Written by: Megan Coscia (40214186)
// -----------------------------------------------------
/*
 *  Program description: 
 *  The following class is the driver of the LadderAndSnake class. 
 *  It asks user for the number of player and checks the validity of the input.
 *  It will initialize the game by calling the constructor, retrieve the player 
 *  order and use the playGame method to allow users to play.
 */

/**
 * Name and ID: Megan Coscia 40214186
 * COMP249
 * Assignment #1
 * Due Date: February 10, 2022 (Extension date)
 */

package comp249_a1;

//importing scanner element into java file
import java.util.Scanner;

/**
 * The PlayLadderAndSnake class is the driver of the LadderAndSnake class.
 * It initializes the game and receives user input as well as validates it.
 * @author Megan Coscia
 * @version 1.0
 */
public class PlayLadderAndSnake {
	/**
	 * The Driver method runs the Ladder and Snake class; allowing users to play the agme
	 * @param args the parameter of the main method
	 */
  public static void main(String[] args){
      //create scanner element
      Scanner key = new Scanner(System.in);
      //welcome banner
      String a = "----------------------------------------------------------------------------------------------------------------------";
      String b = "                                  WELCOME TO THE SNAKES~ AND LADDERS GAME PROGRAM!"; 
      String c = "                                             created by Megan Coscia";
      System.out.println(a+"\n"+b+"\n"+c+"\n"+a+"\n");
      System.out.println("Let's start a new game!\n");
      //getting user to enter number of players
      System.out.print("Enter the # of players for your game "+
                       "– Number must be between 2 and 4 inclusively: ");
      int no_players = key.nextInt();
      //cycling through user input for validity
      outer: while(no_players > 4 || no_players < 2) {
	      for(int i = 1; i <= 4; i++){
	    	  if(no_players <= 4 && no_players >= 2)
	    		  break outer;
	    	  else if(i == 4) {
	              System.out.println("Bad Attempt 4! You have exhausted all your chances."+
	                                 " Program will terminate!");
	              System.exit(0);
	          }
	          else if(i == 3) {
	        	  System.out.print("Bad Attempt "+i+" - Invalid # of players. Please enter a # between 2 and 4 inclusively: "+
	                                   "This is your last attempt: ");
              	  no_players = key.nextInt();
	          }
	          else if(i < 3) {
	        	  System.out.print("Bad Attempt "+i+" - Invalid # of players. "+
	                                   "Please enter a # between 2 and 4 inclusively: ");
	              no_players = key.nextInt();
	          }
	      }
      }
      //initialize the game by creating an object of LadderAndSnake
      LadderAndSnake game = new LadderAndSnake(no_players);
      
      //retrieves player order
      int [] player_order = game.playing_order(no_players);
      
      //plays the actual game
      game.playGame(player_order);

      //close scanner 
      key.close();
  }
}
