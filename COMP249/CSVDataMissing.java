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
 * The CSVDataMissing class is the exception class that provides the error message in the event there 
 * is a data entry that is missing from the CSV file
 * @author Inas Fawzi and Megan Coscia
 */
public class CSVDataMissing extends Exception{
	/**
	 * The default constructor 
	 */
	public CSVDataMissing() {
		super("Error: Input row cannot be parsed due to missing information");
	}
	/**
	 * The parametrised constructor
	 * @param filename String that holds the name of the file
	 * @param line int that holds the number of the line of the CSV file
	 * @param attribute String that holds the attribute name
	 */
	public CSVDataMissing(String filename, int line, String attribute) {
		super("WARNING: In file "+filename+" line "+line+" is not converted to HTML: missing data: "+attribute+".");
	}
}
