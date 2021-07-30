<html>
<head>
	<title> Manage Patron </title>
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

<h1 style="text-align:center;"> Manage Patron </h1>


<?php error_reporting (E_ALL ^ E_NOTICE); 
$server='127.0.0.1';
$username='admin';
$password='toor';
$dbname='team02';

$conn = mysqli_connect($server, $username, $password, $dbname);


if (!$conn) {die( "Connection failed: " . mysqli_connect_error());}

//get the data

$CardNumber = mysqli_real_escape_string($conn, $_POST['CardNumber']);
$Name = mysqli_real_escape_string($conn, $_POST['Name']);
$Active = mysqli_real_escape_string($conn, $_POST['Active']);
$PhoneNumber = mysqli_real_escape_string($conn, $_POST['PhoneNumber']);
$Email = mysqli_real_escape_string($conn, $_POST['Email']);
$HasOverdue = mysqli_real_escape_string($conn, $_POST['HasOverdue']);


if($Active == 'on'){
$Active = 1;
} else {
    $Active = 0;
}




// Base search string includes join statement and pet name search criteria



$query = "INSERT INTO PATRON  VALUES($CardNumber,'$Name', $Active, '$PhoneNumber','$Email',$HasOverdue);";



$result = mysqli_query($conn,$query);
if (mysqli_error($conn)) {
    
    $query = "UPDATE team02.PATRON t SET t.CardNumber = $CardNumber,
     t.Name = '$Name', t.Active = $Active, 
     t.PhoneNumber = '$PhoneNumber', t.Email = '$Email', 
     t.HasOverdue = $HasOverdue WHERE t.CardNumber = $CardNumber";

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


