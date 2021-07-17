# randomWinnerPicker
This picks a random according to the submissions they have made.

Discription:- Users have a frontend form to submit entries, anyone with 2 submissions with same details will have a double chance of winning, 3 entries will make them disqualified and for 5 submissions they will have tripple chance of winning. For lottery winner selection, frontend page(result.php) and opening it/calling it  pickups a random winner with the above mentioned chance of winning. 

1. Please enter the details of the Server, Username, password, database in "includes/CRUD.php"(From line number 19).
2. Then import the lottery.sql file in your database. It has the table we need for our application.
3. You can adjust the validations for the form. I've made a function for validations using regex.
4. Now you can test the application.
5. Open result.php to check the winner.
