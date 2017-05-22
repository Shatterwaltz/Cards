# Cards
Custom Cards Again Humanity/Apples to Apples game thrown together for friend group.
Players visit the play.php page on their phones, and are given cards from a database of user-generated cards. 


First PHP project, as well as first real web development project. 
Lots to expand on, currently very barebones and has a number of makeshift segments. 

I host it locally on a Raspberry Pi running Apache and MySQL. 

# newcards.php
The intent is for people to be able to add their own cards to the database on the newcards.php page.
This page also grabs all cards from the database and displays them, and has a very basic system to flag cards for deletion. 
It only flags them for deletion to prevent people from deleting other people's cards. 
I woud like to eventually set up a login system and allow for direct deletion. 

# play.php
Fetches and displays ten cards from the "Ends" table and one card from the "Starts" table. 
Players take turns reading the Start card they are given, and other players fill in the blanks by reading out their End cards. 
Refreshing the page gives new cards. 
I would like to eventually set up a better system for this using more than just PHP, and enable some interactivity with the webpage.
