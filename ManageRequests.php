<html>
<head>
	<title> Manage Requests </title>
</head>

<body>
<style>


</style>

<a style="  margin-left:44%; 
    
" href="Management.html">
    
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

<h1 style="text-align:center;"> Manage Requests </h1>


<?php error_reporting (E_ALL ^ E_NOTICE); 
$server='127.0.0.1';
$username='admin';
$password='toor';
$dbname='team02';

$conn = mysqli_connect($server, $username, $password, $dbname);


if (!$conn) {die( "Connection failed: " . mysqli_connect_error());}

//get the data

$RequestID = mysqli_real_escape_string($conn, $_POST['RequestID']);
$NewBookISBN = mysqli_real_escape_string($conn, $_POST['NewBookISBN']);
$Title = mysqli_real_escape_string($conn, $_POST['Title']);
$Genre = mysqli_real_escape_string($conn, $_POST['Genre']);
$Filled = mysqli_real_escape_string($conn, $_POST['Filled']);
$DateRequested = mysqli_real_escape_string($conn, $_POST['DateRequested']);
$CardNumber = mysqli_real_escape_string($conn, $_POST['CardNumber']);


if($Filled == 'on'){
$Filled = 1;
} else {
    $Filled = 0;
}




// Base search string includes join statement and pet name search criteria



$query = "INSERT INTO team02.NEWBOOKREQUEST (RequestID, NewBookISBN, Title, Genre, Filled, DateRequested, CardNumber) VALUES ($RequestID, '$NewBookISBN', '$Title', '$Genre', $Filled, '$DateRequested', $CardNumber);";


$result = mysqli_query($conn,$query);
if (mysqli_error($conn)) {
    
    $query = "UPDATE team02.NEWBOOKREQUEST t SET t.NewBookISBN = '$NewBookISBN', 
    t.Title = '$Title', t.Genre = '$Genre', t.Filled = $Filled, t.DateRequested = '$DateRequested',
     t.CardNumber = $CardNumber WHERE t.RequestID = $RequestID";

    $result = mysqli_query($conn,$query);

    if (mysqli_error($conn)) {
    

        die("MySQL error: ".mysqli_error($conn));
    
    
    } 


}



    if ($conn )
    {
            echo "Added/Edited the book Successfully!";

        
        
    // First create a table, with column headings

    echo "</table>";
} 
else {    echo "Adding/Editing failed, check your data!.";   }






// Always remember to close the connection to the database when you're done!
mysqli_close($conn);

?>



</body>
</html>


