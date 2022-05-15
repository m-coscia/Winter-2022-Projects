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

https://user-images.githubusercontent.com/95299392/167984206-0b485a5e-753b-4428-8ba4-896d38573c7b.mp4

### 2. [CSV to HTML Converter](https://github.com/m-coscia/Winter-2022-Projects/tree/main/COMP249/CSV%20to%20HTML%20Program)
The objective of this assignment is to convert an input CSV-extension file of a known format to an HTML file with all the contents placed in a table. The assignments assumes that we are taking CSV files from a hospital which need to be converted to an HTML table. 

The following are example of the sample input and output files which were read and written by the program:

![image](https://user-images.githubusercontent.com/95299392/168455916-3607c693-4e47-4d1f-9084-eaa3c5e4b543.png)

_Input File: covidStatistics.csv_

![image](https://user-images.githubusercontent.com/95299392/168456034-f4cb29a7-a1f0-4ba0-ac4f-6a8235e42449.png)

_Output File: covidStatistics.html_

![image](https://user-images.githubusercontent.com/95299392/168455956-dad656f5-309d-4515-8753-84d9ad216b07.png)

_Input File: doctorList.csv_

![image](https://user-images.githubusercontent.com/95299392/168456074-5e853cc1-5eb1-4745-ad0c-35524b652ba2.png)

_Output File: doctorList.html_

This assignment utilizes exception handling and file I/O. The input file needs to be opened using a Scanner and the output file needs to be created by the PrintWriter. Opening these files needs to be tried and caught in case the files either already exist or cannot be written to. If there are errors as a result of reading or writing the files, the program throws an exception and terminates the program. All errors are recorded in the Exception.log file. Also, 2 exception classes are created based on missing data or attributes from the CSV file. These exceptions are thrown in the mthod that converts the CSV to an HTML file.

When asked to enter the output file, it will print out the HTML code fo the file to show that the contetns have been written to the outpout file. In your directory, the HTML file can be opened to view the final result.

#### Demo of the CSV to HTML Converter

https://user-images.githubusercontent.com/95299392/168457335-fa4b59d7-501a-4df2-a1e1-9c3b83bcd678.mp4

### 3. [Dictionary Creator](https://github.com/m-coscia/Winter-2022-Projects/tree/main/COMP249/Create%20a%20Dictionary)

This assignment dealt with file I/O, ArrayLists, and exception handling. The objective o the project was to have a input text file with a random text be opened by the program and all the words would be stored in an output file in alphabetical order.

The program asks the user to enter a text file to be read and would open it for reading. If the file is unable to be opnedned, the program terminated; else, it continues. Each word would be stored into the ArrayList. However, there are a few criteria for words that can make it into the dictionary:
1. Words with puntuation must be removed
2. Words with apostrophes and a letter or two must be removed
3. Words with digits must be removed
4. Words with only one letter except a and I must be removed
5. There cannot be a repeated word
Once these criteria are met, the words are sorted in alphabetical order. Then another loop would create a new ArrayList to contain the format of the dictionary. Finally, an output file is written with the PrintWriter using the second ArrayList.

The texts below are examples of input and output files that are read and produced, respectively, by the program:

<details>
<summary>Input File: PersonOfTheCentury.txt </summary>
    <pre>
Albert Einstein is the most influential physicist of the 20th century, and just might be the most famous scientist to have ever lived. He was only 26 when in 1905, he had 
four separate papers published, electrifying the field of physics and rocketing him to global renown. Among them were his ground-breaking special theory of relativity, as 
well as his famous equation, E = mc², which asserted that matter could be turned into energy. Not since Isaac Newton had one man so drastically altered our understanding 
of how the universe works.

Yet while Einstein clearly had a knack for science and mathematics from an early age, he did not excel at everything he put his mind to. He went to elementary school and 
later grammar school in Munich, where he felt alienated and stifled by the school’s rigid pedagogical approach. He was an average pupil, and experienced speech challenges, 
which permanently influenced his view of education and human potential.

It was largely in his private time, in fact, that Einstein’s passion and inquisitiveness for science and mathematics first flourished. And after finishing his studies in 
Zurich in 1900, it was again in his leisure time, while working at the Swiss Patent Office as a young adult, that he developed many of his most influential theories.
Albert Einstein was awarded the Nobel Prize for Physics in 1921, but history would soon intervene. The Nazis were on the rise in his native Germany, and the Jewish born 
Einstein was targeted for assassination. He moved to the United States in 1933, and worked at Princeton University in New Jersey for the rest of his days. There he became 
a central figure in the fight to curtail the use of the atom bomb, and a strong voice against racism and nationalism.

Einstein’s name has become synonymous with genius and creativity. Named Person of the Century by TIME in 1999, Einstein is a rare icon, whose wisdom extended far beyond 
the realm of science to reveal a man with an almost childlike sense of wonder and a profound love of humanity.

Some of the Most Inspiring Albert Einstein Quotes are:
Few are those who see with their own eyes and feel with their own hearts.
Imagination is more important than knowledge. Knowledge is limited. Imagination encircles the world.
Unthinking respect for authority is the greatest enemy of truth.
Try not to become a man of success, but rather try to become a man of value.
I am by heritage a Jew, by citizenship a Swiss, and by makeup a human being, and only a human being, without any special attachment to any state or national entity whatsoever.
Great spirits have always encountered violent opposition from mediocre minds.
Not everything that can be counted counts, and not everything that counts can be counted.
Everybody is a genius. But if you judge a fish by its ability to climb a tree, it will live its whole life believing that it is stupid.
Look deep into nature, and then you will understand everything better.
All religions, arts and sciences are branches of the same tree.
Any intelligent fool can make things bigger and more complex. It takes a touch of genius, and a lot of courage to move in the opposite direction.
A man should look for what is, and not for what he thinks should be.
In the middle of difficulty lies opportunity.
A person who never made a mistake never tried anything new.
Education is what remains after one has forgotten what one has learned in school.
A table, a chair, a bowl of fruit and a violin; what else does a man need to be happy? 
A human being is part of a whole called by us the universe.
The important thing is to not stop questioning. Curiosity has its own reason for existing.
A question that sometimes drives me hazy: am I or are the others crazy?
Anger dwells only in the bosom of fools.
Life is like riding a bicycle. To keep your balance you must keep moving.
Concern for man and his fate must always form the chief interest of all technical endeavors. Never forget this in the midst of your diagrams and equations.
There are only two ways to live your life. One is as though nothing is a miracle. The other is as though everything is a miracle.
All that is valuable in human society depends upon the opportunity for development accorded the individual.
Once you stop learning, you start dying.
It’s not that I’m so smart, it’s just that I stay with problems longer.
It has become appallingly obvious that our technology has exceeded our humanity.
Only one who devotes himself to a cause with his whole strength and soul can be a true master. For this reason mastery demands all of a person.
He who can no longer pause to wonder and stand rapt in awe, is as good as dead; his eyes are closed.
I have no special talent. I am only passionately curious.
Weak people revenge. Strong people forgive. Intelligent people ignore.
A ship is always safe at shore but that is not what it’s built for.
What is right is not always popular, and what is popular is not always right.
Education is not the learning of facts, it’s rather the training of the mind to think.
I speak to everyone in the same way, whether he is the garbage man or the president of the university.
I am thankful for all of those who said NO to me. Its because of them I’m doing it myself.
Never give up on what you really want to do. The person with big dreams is more powerful than the one with all the facts.
Common sense is the collection of prejudices acquired by age eighteen. </pre>
</details>

<details>
    <summary>Output File: SubDictionary.txt</summary>
 <pre>This sub-dictionary includes 444 entries.

A
==
A
ABILITY
ACCORDED
ACQUIRED
ADULT
AFTER
AGAINST
AGE
ALBERT
ALIENATED
ALL
ALMOST
ALTERED
ALWAYS
AM
AMONG
AN
AND
ANGER
ANY
ANYTHING
APPALLINGLY
APPROACH
ARE
ARTS
AS
ASSASSINATION
ASSERTED
AT
ATOM
ATTACHMENT
AUTHORITY
AVERAGE
AWARDED
AWE

B
==
BALANCE
BE
BECAME
BECAUSE
BECOME
BEING
BELIEVING
BETTER
BEYOND
BICYCLE
BIG
BIGGER
BOMB
BORN
BOSOM
BOWL
BRANCHES
BUILT
BUT
BY

C
==
CALLED
CAN
CAUSE
CENTRAL
CENTURY
CHAIR
CHALLENGES
CHIEF
CHILDLIKE
CITIZENSHIP
CLEARLY
CLIMB
CLOSED
COLLECTION
COMMON
COMPLEX
CONCERN
COULD
COUNTED
COUNTS
COURAGE
CRAZY
CREATIVITY
CURIOSITY
CURIOUS
CURTAIL

D
==
DAYS
DEAD
DEEP
DEMANDS
DEPENDS
DEVELOPED
DEVELOPMENT
DEVOTES
DIAGRAMS
DID
DIFFICULTY
DIRECTION
DO
DOES
DOING
DRASTICALLY
DREAMS
DRIVES
DWELLS
DYING

E
==
EARLY
EDUCATION
EIGHTEEN
EINSTEIN
ELECTRIFYING
ELEMENTARY
ELSE
ENCIRCLES
ENCOUNTERED
ENDEAVORS
ENEMY
ENERGY
ENTITY
EQUATION
EQUATIONS
EVER
EVERYBODY
EVERYONE
EVERYTHING
EXCEEDED
EXCEL
EXISTING
EXPERIENCED
EXTENDED
EYES

F
==
FACT
FACTS
FAMOUS
FAR
FATE
FEEL
FELT
FEW
FIELD
FIGHT
FIGURE
FINISHING
FIRST
FISH
FLOURISHED
FOOL
FOOLS
FOR
FORGET
FORGIVE
FORGOTTEN
FORM
FROM
FRUIT

G
==
GARBAGE
GENIUS
GERMANY
GIVE
GLOBAL
GOOD
GRAMMAR
GREAT
GREATEST
GROUND-BREAKING

H
==
HAD
HAPPY
HAS
HAVE
HAZY
HE
HEARTS
HERITAGE
HIM
HIMSELF
HIS
HOW
HUMAN
HUMANITY

I
==
I
ICON
IF
IGNORE
IMAGINATION
IMPORTANT
IN
INDIVIDUAL
INFLUENCED
INFLUENTIAL
INQUISITIVENESS
INSPIRING
INTELLIGENT
INTEREST
INTERVENE
INTO
IS
ISAAC
IT
ITS

J
==
JERSEY
JEW
JEWISH
JUDGE
JUST

K
==
KEEP
KNACK
KNOWLEDGE

L
==
LARGELY
LATER
LEARNED
LEARNING
LEISURE
LIES
LIFE
LIKE
LIMITED
LIVE
LIVED
LONGER
LOOK
LOT
LOVE

M
==
MADE
MAKE
MAKEUP
MAN
MANY
MASTER
MASTERY
MATHEMATICS
MATTER
MC²
ME
MEDIOCRE
MIDDLE
MIDST
MIGHT
MIND
MINDS
MIRACLE
MISTAKE
MORE
MOST
MOVE
MOVED
MOVING
MUNICH
MUST
MYSELF

N
==
NAME
NAMED
NATIONAL
NATIONALISM
NATIVE
NATURE
NAZIS
NEED
NEVER
NEW
NEWTON
NO
NOBEL
NOT
NOTHING

O
==
OBVIOUS
OF
OFFICE
ON
ONCE
ONE
ONLY
OPPORTUNITY
OPPOSITE
OPPOSITION
OR
OTHER
OTHERS
OUR
OWN

P
==
PAPERS
PART
PASSION
PASSIONATELY
PATENT
PAUSE
PEDAGOGICAL
PEOPLE
PERMANENTLY
PERSON
PHYSICIST
PHYSICS
POPULAR
POTENTIAL
POWERFUL
PREJUDICES
PRESIDENT
PRIVATE
PRIZE
PROBLEMS
PROFOUND
PUBLISHED
PUPIL
PUT
Princeton

Q
==
QUESTION
QUESTIONING
QUOTES

R
==
RACISM
RAPT
RATHER
REALLY
REALM
REASON
RELATIVITY
RELIGIONS
REMAINS
RENOWN
RESPECT
REST
REVEAL
REVENGE
RIDING
RIGHT
RIGID
RISE
ROCKETING

S
==
SAFE
SAID
SAME
SCHOOL
SCIENCE
SCIENCES
SCIENTIST
SEE
SENSE
SHIP
SHORE
SHOULD
SINCE
SMART
SO
SOCIETY
SOME
SOMETIMES
SOUL
SPEAK
SPECIAL
SPEECH
SPIRITS
STAND
START
STATE
STATES
STAY
STIFLED
STOP
STRENGTH
STRONG
STUDIES
STUPID
SUCCESS
SWISS
SYNONYMOUS

T
==
TABLE
TAKES
TALENT
TARGETED
TECHNICAL
TECHNOLOGY
THAN
THANKFUL
THAT
THE
THEIR
THEM
THEN
THEORIES
THEORY
THERE
THING
THINGS
THINK
THINKS
THIS
THOSE
THOUGH
TIME
TO
TOUCH
TRAINING
TREE
TRIED
TRUE
TRUTH
TRY
TURNED
TWO

U
==
UNDERSTAND
UNDERSTANDING
UNITED
UNIVERSE
UNIVERSITY
UNTHINKING
UP
UPON
US
USE

V
==
VALUABLE
VALUE
VIEW
VIOLENT
VIOLIN
VOICE

W
==
WANT
WAS
WAY
WAYS
WEAK
WELL
WENT
WERE
WHAT
WHATSOEVER
WHERE
WHETHER
WHICH
WHILE
WHO
WHOLE
WHOSE
WILL
WISDOM
WITH
WITHOUT
WONDER
WORKING
WORKS
WORLD

X
==

Y
==
YET
YOU
YOUNG
YOUR

Z
==
ZURICH</pre>
</details>

#### Demo of the Dictionary Creator

![image](https://user-images.githubusercontent.com/95299392/168457825-c8a42f89-de7c-4ce2-b5ba-345d98ee3d91.png)

_Note_: The program does not display much to the user. The user is urged to check their directory to view the `SubDictionary.txt` file.

### 3. [Cell Phone Records Generator](https://github.com/m-coscia/Winter-2022-Projects/tree/main/COMP249/Phone%20Book%20Creator)
This assignment allowed for the practice of creating a Linked List from scratch. The objective of this assignment is todemonstrate the different methods that can be used to manipulate a linked list.

The CellPhone class is like any other class in Java. It is used to create the objects stored in the Nodes of the Linked List later on. It has four private attributes which store the serial number, the brand, the manufacture year, and the price. There are accessors, mutators, parametrised and copy constructor, clone method, toString method, and equals method within the class.

The CellList class contains an inner class - CellNode class.

The CellNode class is the Node class of the Linked List. It has two private attrbutes which inclde a CellPhone object and a CellNode pointer. It has a default construcotr which sets everything to null, a parametrised constructor, a copy constructor, a clone method, and accessors and mutators.

The CellList class is the List class of the Linked List. It has two private attributes: head (which points to the beginning of the LinkedList) and size of the LinkedList. It has a default and copy constructor. The following methods were implemented to modify the LinkedList: 
1. addToStart() - add a Node to the start of the list
2. insertAtIndex() - add a Node at a specific index
3. deleteFromIndex() - remove a Node from a specific index
4. deleteFromStart() - remove the first Node from the list
5. replaceAtIndex() - replaces the object stored at a specific Node
6. find() - returns a pointer to the object being searched and counts the number of iterations to find it
7. contains() - returns a Boolean whether or not find() returns a value
8. showContents() - prints the toStrings of objects stored at each Node of the Linked List
9. equals() - retund a boolean whether or not two lists contain the exact same Nodes.

The CellListUtlization class is the driver class that demonstrates the functions of each method. It opens the Cell_Info.txt file to be read and creates a couple lists from it. The program will test all the methods made in the CellList class in it.

#### Demo of the Cell Phone Record Generator

https://user-images.githubusercontent.com/95299392/168458478-6d96ed2b-51c3-4a02-b312-dacc6316cea2.mp4

<details>
<summary>Cell_Info.txt</summary>
<pre>3890909 Samsung		987.28 2022 
2787985 Acer	 	572.20 2013
4900088 LG       		232.99 2008
1989000 Nokia    		237.24 2006
0089076 Sharp    		564.22 2009
2887685 Motorola 		569.28 2012
7559090 Pansonic 		290.90 2005
2887460 Siemens  		457.28 2009
2887685 Apple	 	569.28 2015
6699001 Lenovo	 	237.29 2012
9675654 Nokia    		388.00 2009
1119002 Motorola 		457.28 2008
5000882 Apple  		977.27 2020
8888902 Samsung    	810.35 2017
5890779 Motorola 		457.28 2007
7333403 BenQ     		659.00 2009
2999900 Siemens  		457.28 2006
6987612 HTC		 	577.25 2009
8888902 BenQ     		410.35 2009
8006832 Motorola 		423.22 2019
5555902 SonyEricsson 	177.11 2007
9873330 Nokia		677.90 2010
8888902 BenQ     		410.35 2009
5909887 Apple		726.99 2017
2389076 BlackBerry    	564.22 2010
1119000 SonyEricsson 	347.94 2009 </pre>
</details>


