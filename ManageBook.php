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
$server='127.0.0.1';
$username='admin';
$password='toor';
$dbname='team02';

$conn = mysqli_connect($server, $username, $password, $dbname);


if (!$conn) {die( "Connection failed: " . mysqli_connect_error());}

//get the data

$ISBN = mysqli_real_escape_string($conn, $_POST['ISBN']);
$Title = mysqli_real_escape_string($conn, $_POST['Title']);
$Genre = mysqli_real_escape_string($conn, $_POST['Genre']);
$Rating = mysqli_real_escape_string($conn, $_POST['Rating']);
$Format = mysqli_real_escape_string($conn, $_POST['Format']);
$NumberOfCopies = mysqli_real_escape_string($conn, $_POST['NumberOfCopies']);
$Publisher = mysqli_real_escape_string($conn, $_POST['Publisher']);
$Author = mysqli_real_escape_string($conn, $_POST['Author']);







// Base search string includes join statement and pet name search criteria
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $ISBN = mysqli_real_escape_string($conn, $_GET['ISBN']);


    $query = "delete  from BOOK where ISBN = '$ISBN' ";

    $result = mysqli_query($conn,$query);

if (mysqli_error($conn))
{
   

    die("MySQL error: ".mysqli_error($conn));
    

}else {
    echo "Removed the book Successfully!";

}
}
else if($_SERVER['REQUEST_METHOD'] === 'POST') {

$query = "INSERT INTO BOOK VALUES('$ISBN','$Title','$Genre',$Rating,'$Format',$NumberOfCopies,'$Publisher','$Author'); ";


 

$result = mysqli_query($conn,$query);




if (mysqli_error($conn))
{
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        echo "Removed the book Successfully!";
    }

    
     

    
    else if($_SERVER['REQUEST_METHOD'] === 'POST' && mysqli_error($conn)){
       
        $query = "UPDATE team02.BOOK t SET t.Title = '$Title',
         t.Genre = '$Genre', t.Rating = $Rating,
          t.Format = '$Format', t.NumberOfCopies = $NumberOfCopies, 
          t.Publisher = '$Publisher', t.Author = '$Author' 
          WHERE ISBN = '$ISBN';";
        //   echo $query;
    $result = mysqli_query($conn,$query);
    if (mysqli_error($conn)){die("MySQL error: ".mysqli_error($conn));
    
    echo "Error editing, check your data";
    }
        else {
            echo "Edited the book Successfully!";
        }
       
    }
        die("MySQL error: ".mysqli_error($conn));
    }


    else 
	{
    
       echo "Added The Book";
       //mysqli_close($conn);
        
    // First create a table, with column headings

    echo "</table>";

    }


   
    

    echo "End of method!.";   }

// Always remember to close the connection to the database when you're done!
mysqli_close($conn);

?>


</body>
</html>


