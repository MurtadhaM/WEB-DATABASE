<?php
  
setcookie("CustomerID",  $_POST['CustomerID'], time()+2*24*60*60);
  
?>
<?php

$result = $_POST['CustomerID'];
if($result){
    $num_rows = mysqli_num_rows($result);
    if($result == 1){
        $found_user=mysqli_fetch_array($result);
        redirect_to("Patron.html");
    }
    else{
        redirect_to("Management.html");
    }
}
function redirect_to($location){
    header('Location:'.$location);
}








?>