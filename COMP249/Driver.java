// -----------------------------------------------------
// Assignment 3
// Question: Requirement 3, 4, 5
// Written by: Inas Fawzi 40208675 and Megan Coscia 40214186
// -----------------------------------------------------

/**
 * Names and IDs: Inas Fawzi (40208675) and Megan Coscia (40214186)
 * COMP249
 * Assignment 3
 * Due Date: March 25, 2022
 */

/*import java.io.PrintWriter;
import java.io.FileOutputStream;
import java.io.FileNotFoundException;
import java.io.BufferedReader;
import java.io.FileReader;
import java.io.FileNotFoundException;
import java.io.IOException;*/

//importing relevant packages
import java.io.*;
import java.util.Scanner;
import java.util.StringTokenizer;
/**
 * The Driver class implements Requirements 3, 4, 5 of this assignment. It will open the the input and ouput streams in the the main
 * method, it will convert the user's files from csv to html, and it will display the html at the very end. The program utilizes principles
 * from file I/O to allow the code to compile.
 * @author Inas Fawzi and Megan Coscia
 */
public class Driver {
	
	/**
	 * The ConvertCSVToHTML method takes in 5 parameters: a scanner object, two PrintWriter object, and a String that holds the file name.
	 * It will initialize an HTML file with all the required tags for formatting and create the structure of the HTML file.
	 * @param sc Scanner object that allows file to be read
	 * @param readfilename String that holds the file's name
	 * @param pw PrintWriter object that writes to the HTML file
	 * @param exc PrintWriter object that write to the Exception.log 
	 * @throws CSVAttributeMissing Exception class in the event that an attribute is missing from the input file
	 */
	public static void ConvertCSVtoHTML(Scanner sc, String readfilename, PrintWriter pw, PrintWriter exc) throws CSVAttributeMissing{
		int lines = 0;
		int num_attr = 0;
		String[] attribute = new String[4];
		String caption = "";
		String note = "";
		System.out.println("Converting "+readfilename+" to html");
		
		while (sc.hasNextLine()) {
			lines += 1;
			//getting the caption
			if (lines == 1) {
				StringTokenizer token1 = new StringTokenizer(sc.nextLine(), ",");
				caption = token1.nextToken();
				pw.println("<!DOCTYPE html>");
				pw.println("<html>");
				pw.println("<style>");
				pw.println("table {font-family: arial, sans-serif; border-collapse: collapse;}");
				pw.println("td, th {border: 1px solid #000000;text-align: left;padding: 8px;}");
				pw.println("tr: nth-child(even) {background-color: #dddddd;}");
				pw.println("span{font-size: small}");
				pw.println("</style>");
				pw.println("<body>\n\n<table>\n");
				pw.println("<caption>"+caption+"</caption>");
			}//end of if
			
			//checking validity and getting attributes
			else if (lines == 2) {
				//finding number of attributes, and storing the attributes in an array
				StringTokenizer token2 = new StringTokenizer(sc.nextLine(), ",");
				while (token2.hasMoreTokens()) {
					num_attr += 1;
					attribute[num_attr - 1] = token2.nextToken();
				}
				//throw exception if there is not 4 attributes
				if (num_attr != 4) {
					throw new CSVAttributeMissing(readfilename);
				}
				//if there is the correct number of attributes, then print them to the html file in a proper fashion
				else {
					pw.println("\t<tr>");
					for (int i = 0; i<attribute.length; i++) {
						pw.println("\t\t<td>"+attribute[i]+"</td>");
					}
					pw.println("\t</tr>");
				}
			}//end of else if
			
					
			//this is for all the normal rows in the table
			else {
				boolean missing_data = false;
				String row = sc.nextLine();
				//checking if it is the last line
				if(row.indexOf("Note")!=-1){
					StringTokenizer token3 = new StringTokenizer(row, ",");
					note = token3.nextToken();
					pw.println("</table>");
					pw.println("<span>"+note+"</span>");
					pw.println("</body>");
					pw.println("</html>");
				}
				else {
					String[] rowarr = row.split(",");
					//String[] rowarr = r.split(",");
					//checking for missing data
					for (int i = 0; i<rowarr.length; i++) {
						//if there is data missing then an error message will be printed to the exception log and also shown to the user.
						if (rowarr[i].equals("")) {
							CSVDataMissing e = new CSVDataMissing(readfilename, lines, attribute[i]);
							exc.println(e);
							System.out.println(e);
							missing_data = true;
						}
					}//end of for loop
					//if there is no missing data then the whole row will get printed to html file
					if (missing_data == false) {
						pw.println("\t<tr>");
						for (int i = 0; i<rowarr.length; i++) {
							pw.println("\t\t<td>"+rowarr[i]+"</td>");
						}
						pw.println("\t</tr>");
					}
				}
				
			}//end of else
			
		}//end of while loop
		System.out.println("Finished converting "+readfilename);
	}//end of ConvertCSVtoHTML method
	
	
	/**
	 * The main method performs several tasks. It will first open files for reading; uses throw statements and some catches to
	 * handle any exceptions that may occur. It will open the files to be written. It will call the convertCSVtoHTML method to 
	 * produce the output files. The last action the code will make is to read the files we just created. 
	 * @param args
	 */
	public static void main(String[] args) {
		//welcome message
		String bar = " --------------------------------------------------";
		System.out.println(bar+"\n Welcome to the CSV to HTML Conversion Program!"
						   +"\n written by Inas Fawzi and Megan Coscia\n"+ bar+"\n");
		

		//opening the files for reading
		Scanner covidStats = null;
		Scanner docList = null;
		try {
			File f1 = new File("covidStatistics.csv");
			File f2 = new File("doctorList.csv");
			if (!f1.exists() || !f1.canRead())
				throw new FileNotFoundException("Could not open file covidStatistics.CSV for reading\r\n"
						+ "Please check that the file exists and is readable. This program will terminate after closing any opened files");
			else if(!f2.exists() || !f2.canRead()) {
				throw new FileNotFoundException("Could not open file doctorList.CSV for reading\r\n"
						+ "Please check that the file exists and is readable. This program will terminate after closing any opened files");
			}
			else {
				covidStats = new Scanner(new FileInputStream("covidStatistics.csv"));
				docList = new Scanner(new FileInputStream("doctorList.csv"));
			}
			
		}
		catch (FileNotFoundException e) {
			System.out.println(e);
			System.out.println("We couldn't find a file");
			System.exit(0);
		}

		//opening the files for writing
		PrintWriter covidhtml = null;
		PrintWriter doctorhtml = null;
		PrintWriter exceptionlog = null;
		File c = null;
        File d = null;
        File e = null;
		try {
			c = new File("covidStatistics.html");
			d = new File("doctorList.html");
			e = new File("Exceptions.log");
			if (!c.createNewFile()) {
				throw new IOException("The file covidStatistics.html could not be created for writing. The program will close all files and then terminate");
			}
			else if (!d.createNewFile()) {
				throw new IOException("The file doctorList.html could not be created for writing. The program will close all files and then terminate");
			}
			else {
				covidhtml = new PrintWriter (c);
				doctorhtml = new PrintWriter (d);
				exceptionlog = new PrintWriter (new FileOutputStream("Exceptions.log", true));
			}
			
		}
		catch (IOException exc){
			System.out.println(exc);
			System.out.println("We couldn't create a file");
			covidStats.close();
			docList.close();
			c.delete();
			d.delete();
			System.exit(0);
		}
		
		//trying to convert covidStatistics to html
		try {
			ConvertCSVtoHTML(covidStats, "covidStatistics.CSV", covidhtml, exceptionlog);
		}
		catch (CSVAttributeMissing e1) {
			exceptionlog.println(e1);
			System.out.println(e1);
			System.out.println("All files will now be closed and the program will terminate");
			covidStats.close();
			docList.close();
			covidhtml.close();
			doctorhtml.close();
			exceptionlog.close();
			System.exit(0);
		}
		
		//trying to convert doctorList to html
		try {
			ConvertCSVtoHTML(docList, "doctorList.CSV", doctorhtml, exceptionlog);
		}
		catch (CSVAttributeMissing e2) {
			exceptionlog.println(e2);
			System.out.println(e2);
			System.out.println("All files will now be closed and the program will terminate");
			covidStats.close();
			docList.close();
			covidhtml.close();
			doctorhtml.close();
			exceptionlog.close();
			System.exit(0);
		}
		
		covidStats.close();
		docList.close();
		covidhtml.close();
		doctorhtml.close();
		exceptionlog.close();
		System.out.println("Everything should have gone as planned, please verify your files.\n");
		
		//reads the outputs files that were just created and displays them to the user
		Scanner s = new Scanner(System.in);
        System.out.println("Please type the name of the file you wish to read:");
        String name = s.next();
        System.out.println();
        BufferedReader bf = null;
        try {
            bf = new BufferedReader(new FileReader(name));
        }
        catch (FileNotFoundException nf) {
            System.out.println("You entered an invalid file name, you have one more chance to enter a valid name.");
            name = s.next();
            try {
                bf = new BufferedReader(new FileReader (name));
            }
            catch (FileNotFoundException nf2) {
                System.out.println("You failed to enter a valid name once again. The program will now terminate.");
                System.exit(0);
            }
        }

        try {
            String read = bf.readLine();
            while(read != null) {
                System.out.println(read);
                read = bf.readLine();
            }
        }
        catch (IOException io) {
            System.out.println(io);
        }

        try {
            bf.close();
        }
        catch(IOException io2) {
            System.out.println(io2);
        }

        s.close();
        System.out.println("\nThe program has finished reading the html file.");
        
        //closing message
        System.out.println("\nThank you for using this program! Program has now terminated.");
		
	}
	
	

}
