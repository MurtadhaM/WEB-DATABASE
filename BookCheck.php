<html>
<head>
	<title> Book Transaction </title>
</head>

<body>
<style>

/**  table  {
    border: 1px solid black;
    margin-left: auto;
    margin-right: auto;

};

th ,table,table{ 
    border-spacing: 15px;

};
table, td, th {
    border-spacing: 15px;
}; 
*/
table{
    border: 1px solid black;

}
table ,td, th { 

  border-spacing: 15px;
    font-family:'Times New Roman', Times, serif;
    margin-left: auto;
    margin-right: auto;
  background-color: lemonchiffon;
  
  };
  .tableNames{
      color:red;
  }

</style>

<a style="  margin-left:44%; 
    
" href="Patron.html">
    
<button style="background-color: #4CAF50; 
border: none;
color: white;
padding: 15px 32px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 16px;
" > Return to main menu </button> 

</a>

<h1 style="text-align:center;"> Book Transaction </h1>

<h2 style="text-align:center;"> Book Inquery </h2>

<?php error_reporting (E_ALL ^ E_NOTICE); 
$server='127.0.0.1';
$username='admin';
$password='toor';
$dbname='team02';
$CustomerID=$_COOKIE['CustomerID'];


// Create connection to a database server.
$conn = mysqli_connect($server, $username, $password, $dbname);

// Always check your connection before you try to do anything else!
if (!$conn) {die( "Connection failed: " . mysqli_connect_error());}

// All strings that come from user input need to be
// "escaped" first - they need to be prepared to be input into 
// the database to guard the database against any attacks.


$ESCpetname = mysqli_real_escape_string($conn, $_GET['ISBN']);
$bookname = mysqli_real_escape_string($conn, $_GET['ISBN']);
$ISBN = mysqli_real_escape_string($conn, $_GET['ISBN']);
$Method = mysqli_real_escape_string($conn, $_GET['Method']);

//FOR SEARCH AND SELECT
$ESCbook = mysqli_real_escape_string($conn, $_POST['bookname']);


if($Method==="ADD"){
    //TO LIST THE BOOKS
        $num = rand(1,10055600);
       $CustomerID=$_COOKIE['CustomerID'];

       $query="SET FOREIGN_KEY_CHECKS=0;";
    mysqli_query($conn,$query);
    $query = "INSERT INTO ORDER_TBL VALUES ($num, CURRENT_DATE, '$CustomerID', DATE_ADD(CURRENT_DATE, INTERVAL  1 MONTH ), 0, '$ISBN'); ";
    mysqli_query($conn,$query);

    $query="SET FOREIGN_KEY_CHECKS=1;";
    mysqli_query($conn,$query);

    echo "Book Added!";
$result = mysqli_query($conn,$query);

if (mysqli_error($conn)) 
	{die("MySQL error: ".mysqli_error($conn));}
    echo "ADDED A BOOK";
    exit();


    } 
    
 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $selectpart = "SELECT * from BOOK where Title LIKE '%$ESCbook%' ";

    $query = "SELECT * from BOOK where Title LIKE '%$ESCbook%' ";
    $parameter="bookname";
    $ISBN = mysqli_real_escape_string($conn, $_GET['ISBN']);
$CustomerNumber = mysqli_real_escape_string($conn, $_GET['CustomerNumber']);

if($Method==="ADD"){
//TO LIST THE BOOKS
    $num = rand(1,10000);
    $selectpart = "INSERT INTO team02.ORDER_TBL
    VALUES ($num, CURRENT_DATE, 1, DATE_ADD(CURRENT_DATE, INTERVAL  1 MONTH ), 0, '$ISBN'); ";
    $query  = "INSERT INTO team02.ORDER_TBL
    VALUES ($num, CURRENT_DATE, 1, DATE_ADD(CURRENT_DATE, INTERVAL  1 MONTH ), 0, '$ISBN'); ";
    
} else {    

    $query  = "SELECT * from BOOK where Title LIKE '%$ESCbook%'";


}
// Run the query
$result = mysqli_query($conn,$query);

if (mysqli_error($conn)) 
	{die("MySQL error: ".mysqli_error($conn));}
    while($row = mysqli_fetch_assoc($result)) {
        $myBook = $row['ISBN'];
        echo   "<ul><li>
        <a href='?ISBN=".$row["ISBN"]."&Method=ADD'>".$row['Title']."</a>
        </li>";

        echo "</ul>";

    } 
    
    exit();
}  






//TO BORROW A
// Base search string includes join statement and pet name search criteria

/* SELECT USER books

select title

from BOOK b , ORDER_TBL o
where o.ISBN = b.ISBN
AND CardNumber = '123151111';

*/


$ISBN = mysqli_real_escape_string($conn, $_GET['ISBN']);
$CustomerNumber = mysqli_real_escape_string($conn, $_GET['CustomerNumber']);

if($ISBN>0 && $Method==="Delete"){
//TO LIST THE BOOKS

    
    //DISABLING THE KEY CONSTRAINTS
    $query="SET FOREIGN_KEY_CHECKS=0;";
    mysqli_query($conn,$query);
    $query = "DELETE FROM ORDER_TBL WHERE ISBN = '$ISBN'; ";
    mysqli_query($conn,$query);

    $query="SET FOREIGN_KEY_CHECKS=1;";
    mysqli_query($conn,$query);

    echo "Book Deleted!";
    exit();

} 
else {    

    $query  = "SELECT * from BOOK where Title LIKE '%$ESCbook%'";


}
// Run the query
$result = mysqli_query($conn,$query);

if (mysqli_error($conn)) 
	{die("MySQL error: ".mysqli_error($conn));}

// IF the query returned any results...
if ($result > 1) {
    
    // First create a table, with column headings
    // echo "<table >";
    // echo "<div class='tableName*9**99/s'>";
    // echo "<tr><th>Book Name</th> &emsp;<th>Book ISBN</th> &emsp;<th>Author Name</th> &emsp;<th>Publisher </th> &emsp;<th>Genre </th</tr>";
    // echo "</div>";

    // Then loop through the output of the query, creating a row
    // in the HTML table for each row in $result
    while($row = mysqli_fetch_assoc($result)) {
        $myBook = $row['ISBN'];
  
        echo   "<ul><li>
        <a href='?ISBN=".$row["ISBN"]."'> ".$row["Title"]."</a>
        </li>";

        echo "</ul>";

    } 
    



    


    







    echo "</table>";
// OTHERWISE tell the user there were no results
}
 else {


        /* !!!: CHECKING IS ISBN REMOVE */


    if($ISBN>2){
        $query="DELETE FROM `ORDER_TBL` WHERE `ORDER_TBL`.`ISBN` = $ISBN";
$result = mysqli_query($conn,$query);
if (mysqli_error($conn)) 
	{die("MySQL error: ".mysqli_error($conn));
    
    echo "You DO not have this book under your account";


    
    } 
    else if($_SERVER['REQUEST_METHOD'] === 'GET' && $Method>0) {   


        while($row = mysqli_fetch_assoc($result)) {
           echo "Deleted the book";
        }
    }

    /* !!!: THIS IS WHERE THE ISBN REMOVE ENDS */


        
    }

    
    //THIS IS FOR THE CUSTOMER LIST 
$query="SELECT Title,b.ISBN From BOOK b join ORDER_TBL OT on b.ISBN = OT.ISBN where CardNumber = $CustomerID;";
$result = mysqli_query($conn,$query);
if (mysqli_error($conn)) 
	{die("MySQL error: ".mysqli_error($conn));} 
    else {   


        while($row = mysqli_fetch_assoc($result)) {
            $myBook = $row['ISBN'];
            
            
            echo   "<ul><li>
            <a href='?ISBN=".$row["ISBN"]."&Method=Delete'>".$row['Title']."</a>
            </li>";
    
            echo "</ul>";
        }
    }
}



// Always remember to close the connection to the database when you're done!
mysqli_close($conn);

?>


</body>
</html>


