// -----------------------------------------------------
// Assignment 4
// Question: 2
// Written by: Inas Fawzi 40208675 and Megan Coscia 40214186
// -----------------------------------------------------

/**
 * Names and IDs: Inas Fawzi (40208675) and Megan Coscia (40214186)
 * COMP 249
 * Assignment 4
 * Due Date: April 15, 2022
 */
package Assignment4Ques2;
//importing relevant packages
import java.util.Scanner;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
/**
 * The CellListUtilization class is the driver class which uses the CellPhone and CellList classes. 
 * @author megco
 *
 */
public class CellListUtilization {

	public static void main(String[] args) {
		//three empty lists from the CellList class
		CellList list1 = new CellList();
		CellList list2 = new CellList();
		CellList list3 = new CellList();

		//initializing scanner objects
		Scanner sc = null;
		Scanner sc2 = null;
		//displaying welcome message to the user
		String bar = " --------------------------------------------------";
		System.out.println(bar+"\n Welcome to the Cell Phones Records Program!"
						   +"\n written by Inas Fawzi and Megan Coscia\n"+ bar);
		System.out.println("\nAttempting to read the Cell_Info.txt text file...\n");
		//try catch to open the file
		try {
			File f = new File("Cell_Info.txt");
			if (!f.exists() || !f.canRead()) {
				throw new FileNotFoundException("Could not open file Cell_Info.txt for reading\r\n"
						+ "Please check that the file exists and is readable. "
						+ "This program will terminate after closing any opened files");
			}
			else {
				sc = new Scanner(new FileInputStream("Cell_Info.txt"));
				sc2 = new Scanner(new FileInputStream("Cell_Info.txt"));
			}
		}
		catch (FileNotFoundException e) {
			System.out.println(e);
			System.out.println("We couldn't find a file");
			System.exit(0);
		}
		
		//initialize variables to store read inputs
		long serialNum = 0;
		String brand = "";
		int year = 0;
		double price = 0;
		CellPhone cellphone = null;
		
		//determine length of the user's file
		int count = 0;
		String lineRead = "";
		while(sc2.hasNextLine()) {
			lineRead = sc2.nextLine();
			count+=1;
		}
		sc2.close();
		
		//array to store all values of the unique CellPhone data
		CellPhone [] data = new CellPhone[count];
		int space = 0;		
		//reading the user's file to store unique data in CellPhone array
		while(sc.hasNextLine()) {
            serialNum = sc.nextLong();
            brand = sc.next();
            price = sc.nextDouble();
            year = sc.nextInt();
            cellphone = new CellPhone(serialNum, brand, year, price);
            data[space] = cellphone;
            space++;
        }
		//close scanner object
		sc.close();
		
        //remove duplicate cells
        int ctr=0;
        for (int i = 0; i < data.length; i++){
            for (int j = 0; j < data.length; j++){
                if (i != j && data[i] != null && data[i].equals(data[j])){
                    data[j] = null;
                }
            }
            if (data[i] != null){
                //count number of valid CellPhone spaces in data array
                ctr = ctr+1;
            }
        }
        //copying all unique CellPhone objects into a new array
        CellPhone[] cellarr = new CellPhone[ctr];
        int x = 0;
        for (int i = 0; i<data.length; i++){
            if (data[i] != null){
                cellarr[x] = new CellPhone(data[i], data[i].getSerialNum());
                x=x+1;
            }
        }
		
        //integers to have the different CellList objects start and end at different indexes
		int ranIndex1 = (int) cellarr.length/2;
		int ranIndex2 = (int) cellarr.length/4;
		
		//copy objects from the CellPhone array into the CellList objects using addToStart()
		for(int i = 0; i < ranIndex1; i++) {
			list1.addToStart(cellarr[i]);
		}
		for(int i = ranIndex2; i < cellarr.length; i++) {
			list2.addToStart(cellarr[i]);
		}
		for(int i = 0; i < cellarr.length; i++) {
			list3.addToStart(cellarr[i]);
		}
		       
		//display contents of each CellList object using showContents()
		System.out.println("Displaying list 3: ");
		list3.showContents();
		System.out.println("\nDisplaying list 2: ");
		list2.showContents();
		System.out.println("\nDisplaying list 1: ");
		list1.showContents();
		
		//initialize the scanner object
		Scanner kb = new Scanner(System.in);

		//prompt user to search a few serial numbers using contains() method
		System.out.println("\n\nEnter 3 serial numbers you would like to search: ");
		long serial1 = kb.nextLong();
		long serial2 = kb.nextLong();
		long serial3 = kb.nextLong();
		
		System.out.println("\nChecking for the first serial number... ");
		System.out.print("List 1 - ");
		if(list1.contains(serial1)) {
			System.out.println("Serial number "+serial1+" was found!");
		}
		else
			System.out.println("No!");
		
		System.out.print("List 2 - ");
		if(list2.contains(serial1)) {
			System.out.println("Serial number "+serial1+" was found!");
		}
		else
			System.out.println("No!");
		
		System.out.print("List 3 - ");
		if(list3.contains(serial1)) {
			System.out.println("Serial number "+serial1+" was found!");
		}
		else
			System.out.println("No!");

		
		System.out.println("\nChecking for the second serial number... ");
		System.out.print("List 1 - ");
		if(list1.contains(serial2)) {
			System.out.println("Serial number "+serial2+" was found!");
		}
		else
			System.out.println("No!");
		
		System.out.print("List 2 - ");
		if(list2.contains(serial2)) {
			System.out.println("Serial number "+serial2+" was found!");
		}
		else
			System.out.println("No!");
		
		System.out.print("List 3 - ");
		if(list3.contains(serial2)) {
			System.out.println("Serial number "+serial2+" was found!");
		}
		else
			System.out.println("No!");
		
		
		System.out.println("\nChecking for the third serial number... ");
		System.out.print("List 1 - ");
		if(list1.contains(serial3)) {
			System.out.println("Serial number "+serial3+" was found!");
		}
		else
			System.out.println("No!");		
		
		System.out.print("List 2 - ");
		if(list2.contains(serial3)) {
			System.out.println("Serial number "+serial3+" was found!");
		}
		else
			System.out.println("No!");
		
		System.out.print("List 3 - ");
		if(list3.contains(serial3)) {
			System.out.println("Serial number "+serial3+" was found!");
		}
		else
			System.out.println("No!");	
		
		
		System.out.println("\n\nTesting the insertAtIndex() method:");
		
		System.out.println("\nInserting a CellPhone object into list1 at index 3:");
		list1.insertAtIndex(cellarr[0], 3);
		list1.showContents();
		
		System.out.println("\nInserting a CellPhone object into list2 at index 1:");
		list2.insertAtIndex(cellarr[1], 1);
		list2.showContents();
		
		
		System.out.println("\n\nTesting the deleteFromIndex() method:");
		
		System.out.println("\nDeleting a CellPhone object of list1 at index 5:");
		list1.deleteFromIndex(5);
		list1.showContents();
		
		System.out.println("\nDeleting a CellPhone object of list2 at index 2:");
		list2.deleteFromIndex(2);
		list2.showContents();
		
		
		System.out.println("\n\nTesting the deleteFromStart() method:");
		
		System.out.println("\nDeleting a CellPhone object of list1 from the start:");
		list1.deleteFromStart();
		list1.showContents();
		
		System.out.println("\nDeleting a CellPhone object of list1 from the start:");
		list2.deleteFromStart();
		list2.showContents();
		
		
		System.out.println("\n\nTesting the replaceAtIndex() method:");
		
		System.out.println("\nReplacing a CellPhone object into list1 at index 1:");
		list1.replaceAtIndex(cellarr[4], 1);
		list1.showContents();
		
		System.out.println("\nReplacing a CellPhone object into list1 at index 3:");
		list1.replaceAtIndex(cellarr[6], 3);
		list1.showContents();
		
		
		System.out.println("\n\nTesting the equals() method:");
		
		System.out.print("Does list1 equal list2? ");
		if(list1.equals(list2))
			System.out.println("Yes!");
		else
			System.out.println("No!");
		
		System.out.print("Does list2 equal list3? ");
		if(list2.equals(list3))
			System.out.println("Yes!");
		else
			System.out.println("No!");

		
		System.out.println("\nDone testing the methods!\n");
		
		//displaying closing message
		System.out.println("Thank you for using this program!");
				
	}
}