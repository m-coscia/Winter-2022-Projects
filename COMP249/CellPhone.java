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
/**
 * The CellPhone class allows for the creation of CellPhone objects. It has 4 attributes: serialNum,
 * brand, year, price. It has 3 methods: clone(), toString(), and equals().
 * @author Inas Fauzi and Megan Coscia
 */
public class CellPhone {
	//attributes
	private long serialNum;
	private String brand;
	private int year;
	private double price;
	/**
	 * Parametrised constructor
	 * @param serial long value that sets the serialNum attribute
	 * @param br String value that sets the brand attribute
	 * @param yr int value that sets the year attribute
	 * @param pr double value that sets the price attribute
	 */
	public CellPhone(long serial, String br, int yr, double pr) {
		serialNum = serial;
		brand = br;
		year = yr;
		price = pr;
	}
	/**
	 * Copy constructor
	 * @param cell CellPhone object to be copied
	 * @param serial long value to be copied
	 */
	public CellPhone(CellPhone cell, long serial) {
		this.brand = cell.brand;
		this.year = cell.year;
		this.price = cell.price;
		this.serialNum = serial;
	}
	/**
	 * The clone() method copies the object and asks the user for a new serial number for the CellPhone object
	 */
	public CellPhone clone() {
		Scanner sc = new Scanner(System.in);
		System.out.println("Please enter a serial number.");
		long serial = sc.nextLong();
		sc.close();
		return (new CellPhone(this, serial));
	}
	/**
	 * The toString() method prints the CellPhone object information
	 */
	public String toString() {
		return "["+serialNum+": "+brand+" "+price+"$ "+year+"]";
		/*
		return("This cell phone's serial number is "+serialNum+". It is from the brand "+brand+
				", and it costs "+price+". It's year of manufacture is "+year+".");
				*/
	}
	/**
	 * The equals() method checks whether two objects are equal. It will return true if the 
	 * two objects are equal. If not, it returns false.
	 */
	public boolean equals(Object obj) {
		if (obj == null)
			return false;
		else if (getClass() != obj.getClass())
			return false;
		else {
			CellPhone cell = (CellPhone)obj;
			return (this.price == cell.price && this.brand.equals(cell.brand) && this.year == cell.year);
		}
	}
	/**
	 * accessor for the price attribute
	 * @return a double value that returns the price attribute
	 */
	public double getPrice() {
		return price;
	}
	/**
	 * accessor for the year attribute
	 * @return an int value that returns the year attribute
	 */
	public int getYear() {
		return year;
	}
	/**
	 * accessor for the brand attribute
	 * @return a string value that returns the brand attribute
	 */
	public String getBrand() {
		return brand;
	}
	/**
	 * accessor for the serialNum attribute
	 * @return a long value that returns the serialNum attribute
	 */
	public long getSerialNum() {
		return serialNum;
	}
	/**
	 * mutator for the price attribute
	 * @param pr double value that sets the price attribute
	 */
	public void setPrice(double pr) {
		this.price = pr;
	}
	/**
	 * mutator for the year attribute
	 * @param yr int value that sets the year attribute
	 */
	public void setYear(int yr) {
		this.year = yr;
	}
	/**
	 * mutator for the brand attribute
	 * @param br String value that sets the brand attribute
	 */
	public void setBrand(String br) {
		this.brand = br;
	}
	/**
	 * mutator for the serialNum attribute
	 * @param serial long value that sets the serialNum attribute
	 */
	public void setSerialNum(long serial) {
		serialNum = serial;
	}
}