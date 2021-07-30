
<?php
$server='127.0.0.1';
$username='admin';
$password='toor';
$dbname='team02';

// Create connection to a database server.
$conn = mysqli_connect($server, $username, $password, $dbname);

// Always check your connection before you try to do anything else!
if (!$conn) {die( "Connection failed: " . mysqli_connect_error());};

// All strings that come from user input need to be
// "escaped" first - they need to be prepared to be input into 
// the database to guard the database against any attacks.





$query = "SELECT * from BOOK where Title LIKE '%WAR%' ";

// Run the query
$result = mysqli_query($conn,$query);

if (mysqli_error($conn)) 
	{die("MySQL error: ".mysqli_error($conn));}

// IF the query returned any results...
if (mysqli_num_rows($result) > 0) {
    
    // First create a table, with column headings
    echo "<table>";
    echo "<tr><th>Book Name</th><th>Book ISBN</th><th>Author Name</th></tr>";
    
    // Then loop through the output of the query, creating a row
    // in the HTML table for each row in $result
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["Title"]."</td><td>".
            $row["ISBN"]."</td><td>".
            $row["Author"]."</td></tr>";
    }
    // After you're done adding the rows, end the table.
    echo "</table>";
} // end of what we do IF the query returned results
// OTHERWISE tell the user there were no results
else {    echo "No pets meeting your search criteria were found.";   }

// Always remember to close the connection to the database when you're done!
mysqli_close($conn);

?>



<?php

echo "helloo";
?>