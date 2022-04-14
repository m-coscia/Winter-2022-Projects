// -----------------------------------------------------
// Assignment 1
// Question: Question 1 Part 1
// Written by: Megan Coscia (40214186)
// -----------------------------------------------------
/*
 *  Program description: 
 *  The following class will contain all the methods used to run the game. 
 *  It contains methods to roll dice, choose player order, allow a player to play one turn, playing the game and more
 */

/**
 * Name and ID: Megan Coscia 40214186
 * COMP249
 * Assignment #1
 * Due Date: February 10, 2022 (Extension date)
 */

package comp249_a1;

/**
 * The LadderAndSnake class contains all the methods to enable the functionality of the snakes and ladders game
 * @author Megan Coscia
 * @version 2.1
 */

public class LadderAndSnake {
	/*
	 * Description of attributes:
	 * 1) board: used to place players on the board of the game (2D String array)
	 * 2) tile: keep track of the tile numbers of the board - mostly reference (2D int array)
	 * 3) num_players: used to keep track of the number of players  (int)
	 * 4) play_position: used to keep track of the player's position relative to the tile numbers (1D int array)
	 * 
	 * SNAKE_HEADS, SNAKE_TAILS, LADDER_BASE, LADDER_TOP: keeps track of snake and ladder locations
	 */
    private String [][] board;
    private int [][] tiles;
    private int num_players;
    private int [] play_position;
    private final int [] SNAKE_HEADS = {16, 48, 64, 79, 93, 95, 97, 98};
    private final int [] SNAKE_TAILS = {6, 30, 60, 19, 68, 24, 76, 78};
    private final int [] LADDER_BASE = {1, 4, 9, 21, 28, 36, 51, 71, 80};
    private final int [] LADDER_TOP = {38, 14, 31, 42, 84, 44, 67, 91, 100};

    /**
     * Default constructor initializes the game by setting the board to null, 
     * numbering the tiles array from 1 to 100, setting num_players to zero, and
     * setting sets every index of play_position to 0
     */
    public LadderAndSnake(){
        board = new String [10][10];
        board = null;
        tiles = new int [10][10];
        for(int i = 0; i < 10; i++){
            for(int j = 0; j < 10; j++){
                tiles[i][j] = (i*10)+(j+1); //formula for setting tiles from 1 to 100

            }
        }
        num_players = 0;
        play_position = new int [num_players];
        for(int i = 0; i < num_players; i++){
            play_position[i] = 0;
        }
    }

    /**
     * Parametrized constructor initializes game. Some key differences between the default and
     * the parametrized constructors include setting the positions of the board as empty strings
     * rather than null and printing the number of players playing the game
     * @param num_players an integer value that is the number of users (players) playing the game
     */
    public LadderAndSnake(int num_players){
        this.num_players = num_players;
        board = new String [10][10];
        for(int i = 0; i < 10; i++){
            for(int j = 0; j < 10; j++){
                board[i][j] = "";
            }
        }
        tiles = new int [10][10];
        for(int i = 0; i < 10; i++){
            for(int j = 0; j < 10; j++){
                tiles[i][j] = (i*10)+(j+1);
            }
        }
        System.out.println("Game is played by "+ num_players+" players");
        play_position = new int [num_players];
        for(int i = 0; i < num_players; i++){
            play_position[i] = 0;
        }
    }

    /**
     * accessor for the number of players playing
     * @return an integer that is the number of players
     */
    public int getNumPlayers(){
        return num_players;
    }
    /**
     * mutator for the number of players playing the game
     * @param num_players an integer value that is the number of users (players) playing the game
     */
    public void setNumPlayers(int num_players){
        this.num_players = num_players;
    }
    /**
     * accessor for the board array
     * @return a 2D String array that will hold players
     */
    public String [][] getBoard(){
        return board;
    }
    /**
     * accessor for the player's positions
     * @return an integer array that holds every player's position
     */
    public int [] getPlayerPosition(){
        return play_position;
    }
    /**
     * mutator for the player's positions
     * @param play_position an integer array that stores every player's position in the game 
     */
    public void setPlayerPosition(int [] play_position){
        this.play_position = play_position;
    }
    /**
     * accessor for the tile number
     * @param x integer that goes through the first dimension of the array
     * @param y integer that foes through the second dimension of the array
     * @return an integer stored in the tile array
     */
    public int getTile(int x, int y){
        return tiles[x][y];
    }

    /**
     * accessor for the snake heads
     * @return an integer array containing every snake head positions
     */
    public int [] getSnakeHeads(){
        return SNAKE_HEADS;
    }
    /**
     * accessor for the snake tails 
     * @return an integer array containing every snake tail positions
     */
    public int [] getSnakeTails(){
        return SNAKE_TAILS;
    }
    /**
     * accessor for the ladder bases
     * @return an integer array containing every ladder base position
     */
    public int [] getLadderBase(){
        return LADDER_BASE;
    }
    /**
     * accessor for the top of the ladders
     * @return an integer array containing every ladder's top position
     */
    public int [] getLadderTop(){
        return LADDER_TOP;
    }

    /**
     * The isSnakeHead is a boolean method that checks whether the player is on a snake head tile
     * @param spot an integer of the player's position in the game
     * @return a boolean of whether the player is on a snake tile
     */
    public boolean isSnakeHead(int spot){
        for(int i = 0; i < SNAKE_HEADS.length; i++){
            if(spot == SNAKE_HEADS[i])
            	return true;
        }
        return false;
    }
    /**
     * The isLadderBase is a boolean method that checks whether the player has landed on a ladder's base
     * @param spot an integer of the player's position in the game
     * @return a boolean of whether the player is on a ladder tile
     */
    public boolean isLadderBase(int spot){
        for(int i = 0; i < LADDER_BASE.length; i++){
            if(spot == LADDER_BASE[i])
            	return true;
        }
        return false;
    }

    /**
     * The flipDice method rolls a "die" for the player's to retrieve a value from a die
     * @param p an integer which is the player's identifying number
     * @return a random value between 1 and 6 inclusively which is a die value
     */
    public int flipDice(int p){
        int die_num = (int) (Math.random()*6 + 1);
        System.out.println("Player "+p+" got a dice value of "+die_num);
        return die_num;
    }

    /**
     * The playing_order method decides the order in which players will play the game in
     * @param n an integer corresponding to the number of players
     * @return an integer array that holds the player's id number in playing order
     */
    public int [] playing_order(int n){
        System.out.println("Now deciding which player will start playing");
        this.num_players = n;
        //stores the dice value of each player
        int [] player_dice = new int [n];
        //stores the order of players
        int [] player_order = new int [n];
        //store player's dice roll value and their original order
        for(int i = 0; i < n; i++){
            player_dice[i] = flipDice(i+1);
            player_order[i] = i + 1;
        }
        //tie breaker loops - rolls die again for players with same dice values and stores their new dice values
        for (int i = 0; i < n; i++){
            for(int j = 0; j < n; j++){
                if(player_dice[i] == player_dice[j] && player_order[i] != player_order[j]){
                    System.out.println("A tie was achieved between Player "+player_order[i]+
                                       " and Player"+player_order[j]+". Attempting to break the tie");
                    player_dice[i] = flipDice(player_order[i]);
                    player_dice[j] = flipDice(player_order[j]);
                }
            }
        }
        //reorders player_order array from highest to lowest dice rolls
        int temp_a;
        int temp_b;
        for(int i = 0; i < n; i++){
            for(int j = 0; j < n; j++){
                if(player_dice[i] > player_dice[j]){
                    temp_a = player_dice[i];
                    player_dice[i] = player_dice[j];
                    player_dice[j] = temp_a;

                    temp_b = player_order[i];
                    player_order[i] = player_order[j];
                    player_order[j] = temp_b;
                }
            }
        }
        //printing the final playing order 
        System.out.print("Reached final decision on order of playing: ");
        for(int i = 0; i < player_order.length; i++){
            System.out.print("Player "+player_order[i]);
            if(i != player_order.length - 1)
            System.out.print(", ");
        }
        System.out.print("\n\n");
        return player_order;
    }
    
    /**
     * The clearBoard method removes all player positions stored in the board array and replaces them with empty strings
     * @return 2D String array which is the board array (attribute)
     */
    public String[][] clearBoard(){
        for(int i = 0; i < 10; i++){
            for(int j = 0; j < 10; j++){
                board[i][j] = "";
            }
        }
        return board;
    }

    /**
     * The updateBoard method places players onto the board array
     * @param spot an integer which is the player's position in the game
     * @param player an integer that defines players from one another
     * @return 2D String array which is the board array with user's placed in it
     */
    public String[][] updateBoard(int spot, int player){
    	//inner and outer for loop used to go through the indexes of the board array
        for(int i = 0; i < 10; i++){
            for(int j = 0; j < 10; j++){
            	//checks player's position and adds them to the spot
                if(play_position[spot] == tiles[i][j]){
                	//more than 1 player on same tile
                    if(board[i][j] != "")
                        board[i][j] = board[i][j].concat(" P"+Integer.toString(player));
                    //1 player on tile
                    else
                        board[i][j] = "P"+Integer.toString(player);
                }
            }
        }
        return board;
    }

    /**
     * The playerTurn method goes through 1 player's turn. After rolling dice, temporarily adds 
     * die value to player's position. It will check whether the player is on a snake or ladder tile 
     * or if the player has surpassed; the method will adjusts player position accordingly.
     * @param player an integer which is the index of the player relative to the playing_order
     * @param player_num an integer which is the player's identifying number
     * @return an integer of the player's position after rolling the dice
     */
    public int playerTurn(int player, int player_num){
        int die = 0;
        //roll dice 
        die = flipDice(player_num);
        play_position[player] = play_position[player] + die;
        //checking if player landed on a snake
        if(isSnakeHead(play_position[player])){
        	//for loop to identify which snake head player landed on
            for(int i = 0; i < SNAKE_HEADS.length; i++){
                if(SNAKE_HEADS[i] == play_position[player]){
                	//updates player position to the base of a snake
                    play_position[player] = SNAKE_TAILS[i];
                    System.out.println("Player "+player_num+" gone to square "+SNAKE_HEADS[i]+
                    " then down to square "+SNAKE_TAILS[i]);
                }
            }
        }
        //checking if player landed on a ladder
        else if (isLadderBase(play_position[player])){
        	//for loop to identify which ladder they are located on
            for(int i = 0; i < LADDER_BASE.length; i++){
                if(LADDER_BASE[i] == play_position[player]){
                	//updates player's position to the top fo a ladder
                    play_position[player] = LADDER_TOP[i];
                    System.out.println("Player "+player_num+" gone to square "+LADDER_BASE[i]+
                    " then up to square "+LADDER_TOP[i]);
                }
            }
        }
        //check if the player's position exceeds max tile
        else if(isOverRolled(play_position[player])){
        	//adjusts player's position if over rolled
            overRoll(player, player_num);
        }
        else {
        	System.out.println("Player "+player_num+" now in square "+play_position[player]);
        }
        return play_position[player];
    }

    //playGame - loops the round method until someone wins
    /**
     * The playGame method cycles through through each peron's turn in the game and allows users 
     * to play the game until someone wins
     * @param player_order an integer array that store's the player's playing order
     */
    public void playGame(int [] player_order){
        String [][] temp_s = new String [10][10];
        //for loop cycles through the player's turns 
        for(int i = 0; i < player_order.length;){
        	//recording player position after their turn
        	play_position[i] = playerTurn(i, player_order[i]);
        	//updating the board array with player's position
               temp_s = updateBoard(i, player_order[i]);
        	//if last in rotation
        	if(i == player_order.length - 1) {
        		//checking if player won
        		if(isWin(i)){
        			printBoard(temp_s);
	                System.out.println("Player "+player_order[i]+" is the WINNER!");
	                break;
	            }
                System.out.println("Game not over; flipping again\n");
                printBoard(temp_s);
                //reset loop
                i = 0;
                clearBoard();
                }
        	else {
        		//checking if player won
	            if(isWin(i)){
                printBoard(temp_s);
	            System.out.println("Player "+player_order[i]+" is the WINNER!");
	            break;
	            }
	            i++;
        	}
        }
    	System.out.println("\nGame Over!");
    }

    /**
     * The isOverRolled is a boolean method that checks whether the player's position is over tile 100
     * @param spot an integer that reflect player position
     * @return a boolean determining whether the player's position is over 100
     */
    public boolean isOverRolled(int spot){
        if(spot > 100)
            return true;
        else
            return false;
    }

    //over roll: adjusts the player's position if they roll over 100
    /**
     * The overRoll method adjusts the player's recorded position so that they arent't
     * moving to tiles greater than 100.
     * @param index an integer that refers to the player's index in the play_position array
     * @param player an integer that identifies players (ie. Player 1)
     * @return an integer that is the updated position of the player
     */
    public int overRoll(int index, int player){
        int spot = play_position[index];
        //switch statements to go through every possible tile over 100 that can be rolled
        switch(spot){
           case 101:
               play_position[index] = 99;
               break;
            case 102:
                play_position[index] = 98;
                break;
            case 103:
                play_position[index] = 97;
                break;
            case 104:
                play_position[index] = 96;
                break;
            case 105:
                play_position[index] = 95;
                break;
        }
        //prints player's number and new position
        System.out.println("Player "+player+"'s dice value exceeds the maximum possible moves, "+
                          "then moves backwards to square "+play_position[index]);
        return play_position[index];
   }

   /**
    * The method isWin checks to see if the player's position is on the last tile of the 
    * board, tile 100. 
    * @param player an integer that is a player of the game (ie. Player 1)
    * @return a boolean that describes whether the player is on tile 100
    */
   public boolean isWin(int player){
       if(play_position[player] == 100){
           return true;
       }
       else
            return false;
   }

   /**
    * The printBoard method prints the board with the players on it for the user to see. 
    * It takes in the board array. Many for loops are used to go through both the board 
    * and tile array to print the format of each tile for the game's board viewable by the use
    * @param board 2D String array that stores players on the board for the game
    */
   
    public void printBoard(String [][] board){
    	//horizontal divider
        String line = "-------------------------------------------------------------------------------------------------------------------------";
        //space formats
        String space1 = "     ";
        String space2 = "    ";
        String blank = "           ";
        //vertical divider
        String bar = "|";
        //show tiles that are the head of a snake or the base of a ladder
        String snake = "Snake~!";
        String ladder = "Ladder!";
        //outer for loop goes through the first dimension of board and tile arrays
        for(int i = 0; i < 10; i++){
            System.out.println(line);
            System.out.print(bar);
            //inner for loops go through the second dimension
            //printing tile number (formatting)
            for(int j = 0; j < 10; j++){
                if(tiles[i][j] < 10)
                    System.out.print(space1+tiles[i][j]+space1+bar);
                else if(tiles[i][j] == 100)
                    System.out.print(space2+tiles[i][j]+space2+bar); 
                else if((tiles[i][j]/10) > 0)
                    System.out.print(space1+tiles[i][j]+space2+bar);
                
            }
            System.out.print("\n"+bar);
            //print player on tiles (formatting)
            for(int k = 0; k < 10; k++){
                //no one on tile
                if(board[i][k].equals(""))
                    System.out.print(blank+bar);
                //1 player on tile
                else if(board[i][k].length() == 2)
                    System.out.print(space1+board[i][k]+space2+bar);
                //2 players on tile
                else if(board[i][k].length() == 5)
                    System.out.print("   "+board[i][k]+"   "+bar);
                //3 players on tile
                else if(board[i][k].length() == 8)
                    System.out.print(" "+board[i][k]+"  "+bar);
                //4 players on tile
                else if(board[i][k].length() == 11)
                    System.out.print(board[i][k]+bar);
            }
            System.out.print("\n"+bar);
            //print if there is a snake or ladder or nothing (formatting)
            for(int m = 0; m < 10; m++){
            	//formula to convert index i and m into an int
                int position_conversion = 10*i + (m+1);
                if(isSnakeHead(position_conversion))
                    System.out.print("  "+snake+"  "+bar);
                else if(isLadderBase(position_conversion))
                    System.out.print("  "+ladder+"  "+bar);
                else
                    System.out.print(blank+bar);
            }
            System.out.println();
       }
        System.out.println(line+"\n");
   }
}
