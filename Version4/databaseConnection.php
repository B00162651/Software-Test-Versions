<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>HappyFeet: The next generation of style!</title>

    
    <link href="css/main.css" rel="stylesheet">

   
</head>

<body>
<?php require 'layout/navbar.php';?>
<?php 
$servername ="localhost";
$hostname ="root";
$password ="";
$dbname ="MyDatabase";

$conn = mysqli_connect($servername,$hostname,$password,$dbname);
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}else{
    echo"Successful connection to the database.";
    
}
echo "<br>";

$sql = "SELECT * FROM PRODUCT;";
$qryResult = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($qryResult)) {
    echo "Name: " . $row["Name"] . " - Description: " . $row["Description"] . 
         " - Price € " . $row["Price"] . " - Quantity: " . $row["Quantity"] . " - Tags: " . $row["tags"] ."<br>";
}

mysqli_close($conn);

?>







<?php require 'layout/footer.php';?>
</body>
</html>