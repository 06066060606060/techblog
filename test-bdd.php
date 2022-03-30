<!-- TEST CONNEXION BDD-->
<?php $con = mysqli_connect("localhost", "root", "", "mysocial");
// test connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    error_log("Failed to connect to database!", 0);
} else {
    echo " <error style=color:black;>Database found</error> <br>";
    error_log("connected to database!", 0);
}
?>