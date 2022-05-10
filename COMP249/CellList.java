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
import java.util.NoSuchElementException;
/**
 * The CellList class is the Linked list class. It is the outer class which has the attributes:
 * CellNode object and an integer. It has several methods such as addToStart, insertAtIndex, 
 * deleteFromIndex, deleteFromStart, replaceAtIndex, find, contains, showContents, and equals.
 * It uses the inner class CellNode.
 * @author Inas Fawzi and Megan Coscia
 */
public class CellList {
	//attributes
	private CellNode head;
	private int size;
	/**
	 * Default constructor
	 */
	public CellList() {
		head = null;
		size = 0;
	}
	/**
	 * Copy constructor
	 * @param list a CellList to be copied
	 */
	public CellList(CellList list) {
		this.head = list.head;
		this.size = list.size;
	}
	/**
	 * Accessor of the size attribute
	 * @return int value that holds the size of the CellList
	 */
	public int getSize() {
		return this.size;
	}
	/**
	 * The addToStart method allows you to enter a CellPhone object at the beginning of the CellList
	 * @param cell a CellPhone object to be added at the beginning of the CellList
	 */
	public void addToStart(CellPhone cell) {
		head = new CellNode(cell, head);
		size = size+1;
	}
	/**
	 * The insertAtIndex method adds a CellPhone object to the CellList at a specific index 
	 * @param cell a CellPhone object to be inserted
	 * @param index int value that holds the index
	 * @throws NoSuchElementException
	 */
	public void insertAtIndex(CellPhone cell, int index) throws NoSuchElementException {
		if (index < 0 || index > size-1) {
			throw new NoSuchElementException();
		}
		CellNode temp = head;
		int ctr = 0;
		while (ctr != index) {
			temp = temp.next;
			ctr++;
		}
		temp = new CellNode(cell, temp);
		size = size+1;
	}
	/**
	 * The deleteFromIndex() method deletes a node based on the given index
	 * @param index int value that holds the index to delete a node
	 * @throws NoSuchElementException exception thrown when the element does not exist
	 */
	public void deleteFromIndex(int index) throws NoSuchElementException {
		if (index < 0 || index > size-1) {
			throw new NoSuchElementException();
		}
		CellNode temp = head;
		int ctr = 0;
		while (ctr != index) {
			temp = temp.next;
			ctr++;
		}
		temp = temp.next;
		size = size-1;
	}
	/**
	 * The deleteFromStart() method deletes a Node of the CellList from the beginning of the cell
	 */
	public void deleteFromStart() {
		if (size == 0)
			return;
		head = head.next;
		size = size-1;
	}
	/**
	 * The replaceAtIndex method sets a new CellPhone value at a specific index
	 * @param c CellPhone object to replace
	 * @param index int value that holds the index value
	 */
	public void replaceAtIndex(CellPhone c, int index) {
		if (index < 0 || index > size-1) {
			return;
		}
		CellNode temp = head;
		int ctr = 0;
		while (ctr != index) {
			temp = temp.next;
			ctr++;
		}
		temp = new CellNode(c, temp.next);
	}
	/**
	 * The find() method takes in a serial number and returns the number 
	 * of times it will appear in a list
	 * @param serial a long value that holds the serial number to search
	 * @return a CellNode object
	 */
	private CellNode find(long serial) {
		CellNode temp = head;
		int iterations = 0;
		while (temp!=null && temp.cell.getSerialNum()!=serial) {
			temp = temp.next;
			iterations++;
		}
		System.out.println("Iterations from list search: "+iterations);
		return temp;
	}
	/**
	 * The contains() method uses the find method and if the object 
	 * @param serial long value which holds the serial number to be searched for
	 * @return a boolean value indicating whether the serial number appears in the list
	 */
	public boolean contains(long serial) {
		if (this.find(serial)!= null)
			return true;
		else
			return false;
	}
	/**
	 * The showContents() method displays the information of all the CellNodes within the CellList object
	 */
	public void showContents() {
        System.out.println("The current size of the list is "+size+". Here are the contents of the list");
        System.out.println("==========================================================================");
        CellNode temp = head;
        int num = 0;
        if (temp == null)
            System.out.println("\nThere is nothing to display; list is empty." );
        else {
            while (temp != null) {
            	if(num % 3 == 0) {
            		System.out.println();
            	}
                System.out.print(temp.cell.toString()+" --> ");
                temp = temp.next;
                num++;
            }
            System.out.println("X");
        }

    }
	/**
	 * The equals() method compares two CellLists and will return a boolean value. 
	 * If they are equal, "true" will be returned
	 * @param L CellList object to be passed
	 * @return boolean value that determined whether the two objects are equal or not 
	 */
	public boolean equals(CellList L) {
		if (size != L.size) {
			return false;
		}
		boolean compare = true;
		CellNode temp = head;
		CellNode temp2 = L.head;
		while (temp != null && temp2 != null) {
			if (!temp.cell.equals(temp2.cell)) {
				compare = false;
				break;
			}
		}
		return (compare);
	}
	
	/**
	 * The CellNode class is the inner class which acts as the Node class for the LinkedList class.
	 * It has 2 private attributes: CellPhone and CellNode.It has a clone method to create a copy of a CellNode object
	 * @author Inas Fawzi and Megan Coscia
	 */
	public class CellNode {
		//private attributes
		private CellPhone cell;
		private CellNode next;
		/**
		 * Default constructor of the CellNode class
		 */
		public CellNode() {
			cell = null;
			next = null;
		}
		/**
		 * Parametrised constructor of the CellNode class
		 * @param c
		 * @param n
		 */
		public CellNode(CellPhone c, CellNode n) {
			cell = c;
			next = n;
		}
		/**
		 * The clone() method will return a copy of the CellNode object
		 * @return a CellNode object that is a copy of the original CellNode object
		 */
		public CellNode clone() {
			return (new CellNode(this.cell, this.next));
		}
		/**
		 * accessor for the cell attribute 
		 * @return a CellPhone object which holds the value of the cell attribute
		 */
		public CellPhone getCellPhone() {
			return (this.cell);
		}
		/**
		 * accessor of the next attribute
		 * @return a CellNode object which holds the value of the next attribute
		 */
		public CellNode getCellNode() {
			return (this.next);
		}
		/**
		 * mutator for the cell attribute
		 * @param p a CellPhone object that sets the cell attribute
		 */
		public void setCellPhone(CellPhone p) {
			this.cell = p;
		}
		/**
		 * mutator for the next attribute
		 * @param n a CellNode object which sets the next attribute
		 */
		public void setCellNode(CellNode n) {
			this.next = n;
		}
	}//end of CellNode class

}//end of CellList class
