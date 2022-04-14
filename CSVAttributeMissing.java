// -----------------------------------------------------
// Assignment 3
// Question: Requirement 1
// Written by: Inas Fawzi 40208675 and Megan Coscia 40214186
// -----------------------------------------------------

/**
 * Names and IDs: Inas Fawzi (40208675) and Megan Coscia (40214186)
 * COMP249
 * Assignment 3
 * Due Date: March 25, 2022
 */

/**
 * The CSVAttributeMissing class is the exception class that provides the error message in the
 * event that an attribute is missing from the CSV file
 * @author Inas Fawzi and Megan Coscia
 */
public class CSVAttributeMissing extends Exception{
	/**
	 * The default constructor
	 */
	public CSVAttributeMissing() {
		super("Error: Input row cannot be parsed due to missing information");
	}
	/**
	 * The parametrised constructor
	 * @param filename String that holds the name of the file
	 */
	public CSVAttributeMissing(String filename) {
		super("ERROR: In file "+filename+". Missing attribute. File is not converted to HTML.");
		
	}
}
