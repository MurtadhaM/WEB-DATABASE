<html>
<head>
	<title> Find Book </title>
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

<h1 style="text-align:center;"> Find Book </h1>

<h2 style="text-align:center;"> Search Results: Find a Book </h2>

<?php error_reporting (E_ALL ^ E_NOTICE); 
$server='127.0.0.1';
$username='admin';
$password='toor';
$dbname='team02';

// Create connection to a database server.
$conn = mysqli_connect($server, $username, $password, $dbname);

// Always check your connection before you try to do anything else!
if (!$conn) {die( "Connection failed: " . mysqli_connect_error());}

// All strings that come from user input need to be
// "escaped" first - they need to be prepared to be input into 
// the database to guard the database against any attacks.

$ESCpetname = mysqli_real_escape_string($conn, $_POST['bookname']);



// Base search string includes join statement and pet name search criteria
$selectpart = "SELECT * from BOOK where Title LIKE '%$ESCpetname%' ";

$query = "SELECT * from BOOK where Title LIKE '%$ESCpetname%' ";

// Run the query
$result = mysqli_query($conn,$query);

if (mysqli_error($conn)) 
	{die("MySQL error: ".mysqli_error($conn));}

// IF the query returned any results...
if (mysqli_num_rows($result) > 0) {
    
    // First create a table, with column headings
    echo "<table >";
    echo "<div class='tableName*9**99/s'>";
    echo "<tr><th>Book Name</th> &emsp;<th>Book ISBN</th> &emsp;<th>Author Name</th> &emsp;<th>Publisher </th> &emsp;<th>Genre </th</tr>";
    echo "</div>";

    // Then loop through the output of the query, creating a row
    // in the HTML table for each row in $result
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><th>".$row["Title"]."</th>";
        echo   "<th>".$row["ISBN"]."</th>";
        echo   "<th>". $row["Author"]."</th>";
        echo    "<th>". $row["Publisher"]."</th>";
        echo     "<th>". $row["Genre"]."</th</tr>";
    }
    echo "</table>";
} // end of what we do IF the query returned results
// OTHERWISE tell the user there were no results
else {    echo "No books with $ESCpetname found!.";   }

// Always remember to close the connection to the database when you're done!
mysqli_close($conn);

?>


</body>
</html>


