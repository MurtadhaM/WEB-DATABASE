
<html>
<head>
	<title> Manage Book </title>
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

<h1 style="text-align:center;"> Manage Book </h1>

<h2 style="text-align:center;"> Remove Results: Remove a Book </h2>
<?php error_reporting (E_ALL ^ E_NOTICE); 
$cookie_name = "CustomerNumber";
$cookie_value = rand(5, 1000);
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>
<?php error_reporting (E_ALL ^ E_NOTICE); 
$server='127.0.0.1';
$username='admin';
$password='toor';
$dbname='team02';

$conn = mysqli_connect($server, $username, $password, $dbname);


if (!$conn) {die( "Connection failed: " . mysqli_connect_error());}

//get the data

$NewBookISBN = mysqli_real_escape_string($conn, $_POST['NewBookISBN']);
$Title = mysqli_real_escape_string($conn, $_POST['Title']);
$Genre = mysqli_real_escape_string($conn, $_POST['Genre']);
$Filled = mysqli_real_escape_string($conn, $_POST['Filled']);
$DateRequested = mysqli_real_escape_string($conn, $_POST['DateRequested']);
$CardNumber = mysqli_real_escape_string($conn, $_POST['CardNumber']);




$query = "INSERT INTO team02.NEWBOOKREQUEST   VALUES (null,'$NewBookISBN', '$Title', '$Genre',$Filled,'$DateRequested' , '$CardNumber');";

$result = mysqli_query($conn,$query);
if (mysqli_error($conn)) 
	{die("MySQL error: ".mysqli_error($conn));}
    if ($conn )
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            echo "Removed the book Successfully!";

        
        } else {
            echo "Added the book Successfully!";

        }
        
    // First create a table, with column headings

    echo "</table>";
} 
else {    echo "Adding failed, check your data!.";   }

// Always remember to close the connection to the database when you're done!
mysqli_close($conn);

?>


</body>
</html>


