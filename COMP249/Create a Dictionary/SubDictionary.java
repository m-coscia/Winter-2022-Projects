//-----------------------------------------------------
//Assignment 4
//Question: 1
//Written by: Inas Fawzi 40208675 and Megan Coscia 40214186
//-----------------------------------------------------

/**
 * Names and IDs: Inas Fawzi (40208675) and Megan Coscia (40214186)
 * COMP 249
 * Assignment 4
 * Due Date: April 15, 2022
 */

package Assignment4Ques1;
//importing relevant packages
import java.util.ArrayList;
import java.util.Scanner;
import java.io.PrintWriter;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
/**
 * The SubDictionary class implements Part I of the assignment. This class asks the user to enter a text file to be read. If the file can be read,
 * each word will be stored in an ArrayList object. Once every word has been stored, an additional loop is used to weed out the words, characters or 
 * numbers that cannot be entered. Another loop removes duplicate words, then another sorts the word alphabetically. Another stores the output of the
 * document into another ArrayList which is then written to the output file - SubDictionary.txt
 * @author Inas Fawzi and Megan Coscia
 */
public class SubDictionary {
	/**
	 * The main method performs all specified actions
	 * @param args
	 */
	public static void main(String[] args) {
		//initializing scanner objects
		Scanner century = null;
		Scanner kb = new Scanner(System.in);
		//displaying welcome message to the user
		String bar = " --------------------------------------------------";
		System.out.println(bar+"\n Welcome to the SubDictionary Program!"
						   +"\n written by Inas Fawzi and Megan Coscia\n"+ bar+"\n\n");
		//prompting user to enter file name
		System.out.print("Please enter a file you would like to read: ");
		String fileName = kb.nextLine();
		kb.close();
		
		//try catch to open the user's file for reading
		try {
			File f = new File(fileName);
			if (!f.exists() || !f.canRead()) {
				throw new FileNotFoundException("Could not open file "+ fileName +" for reading\r\n"
						+ "Please check that the file exists and is readable. This program will terminate after closing any opened files");
			}
			else {
				century = new Scanner(new FileInputStream(fileName));
			}
			
		}
		catch (FileNotFoundException e) {
			System.out.println(e);
			System.out.println("We couldn't find a file");
			System.exit(0);
		}
		
		ArrayList<String> textarr = new ArrayList<String>();
		//while loop stores each word into ArrayList object
		while (century.hasNext()) {
			textarr.add(century.next());
		}
		//closing scanner object
		century.close();
		
		//for loop to remove punctuation
		for (int i = 0; i<textarr.size(); i++) {
			String word = textarr.get(i);
			char[] chararr = word.toCharArray();
			//removing punctuation from words			
			if(word.indexOf("?") != -1) {
				word = word.substring(0, word.indexOf("?"));
			}
			if(word.indexOf(":") != -1) {
				word = word.substring(0, word.indexOf(":"));
			}
			if(word.indexOf(",") != -1) {
				word = word.substring(0, word.indexOf(","));
			}
			if(word.indexOf(";") != -1) {
				word = word.substring(0, word.indexOf(";"));
			}
			if(word.indexOf("!") != -1) {
				word = word.substring(0, word.indexOf("!"));
			}
			if(word.indexOf(".") != -1) {
				word = word.substring(0, word.indexOf("."));
			}
			if(word.indexOf("’") != -1) {
				word = word.substring(0, word.indexOf("’"));
			}
			if(word.indexOf("\'") != -1) {
				word = word.substring(0, word.indexOf("\'"));
			}
						
			word = word.toUpperCase();
			textarr.set(i, word);
			
			//removing single characters
			if (chararr.length == 1 && chararr[0] != 'a' && chararr[0] != 'A' && chararr[0] != 'i' && chararr[0] != 'I') {
				textarr.remove(i);
			}
			
			//removes words with digits
			for (char c : chararr) {
				if (Character.isDigit(c)) {
					textarr.remove(i);
				}
			}//end of inner for loop
		}//end of outer for loop
		
		//removing duplicate words
		for (int i = 0; i < textarr.size(); i++) {
			for (int j = 0; j < textarr.size(); j++) {
				if (textarr.get(i).equals(textarr.get(j)) && i!=j) {
					textarr.remove(j);
				}
			}
		}
		
		//sorting alphabetically
		for (int i = 0; i < textarr.size(); i++) {
			for (int j = 0; j<textarr.size(); j++) {
				if (textarr.get(i).compareTo(textarr.get(j))<0) {
					String temp = textarr.get(i);
					textarr.set(i, textarr.get(j));
					textarr.set(j, temp);
				}//end of if statement	
			}//end of inner for loop
		}//end of outer for loop

		//formatting the output for the output file using String ArrayList
		ArrayList<String> subdict = new ArrayList<String>();
		for (int i = 65; i <= 90; i++) {
			subdict.add("\n\n"+(char)i+"\n==");
			for (int j = 0; j< textarr.size(); j++) {
				if (textarr.get(j).charAt(0) == i) {
					subdict.add("\n"+textarr.get(j));
				}//end of if statement
			}//end of inner for loop
		}//end of outer for loop
		
		//initializing PrintWriter and File object 
		PrintWriter subdictionary = null;
		File f1 = null;
		//try catch to check if the file can be written to
		try {
			f1 = new File("SubDictionary.txt");
			if (!f1.createNewFile()) {
				throw new IOException("The file SubDictionary.txt could not be created for writing. The program will close all files and then terminate");
			}
			else {
				subdictionary = new PrintWriter(new FileOutputStream("SubDictionary.txt"));
			}
		}
		catch (IOException e2){
			System.out.println(e2);
			System.out.println("We couldn't open a file");
			f1.delete();
			System.exit(0);
		}
		
		String entries = "This sub-dictionary includes "+textarr.size()+" entries.";
		subdictionary.print(entries);
		
		//writes dictionary to the output file
		for (int i = 0; i<subdict.size(); i++) {
			subdictionary.print(subdict.get(i));
		}
		//closing PrintWriter object
		subdictionary.close();
		//display to the user that the output file has been successfully written to
		System.out.println("We have successfully created your subdictionary!\n");
		//display closing message
		System.out.println("Thank you for using the SubDictionary Program!");
	}

}
