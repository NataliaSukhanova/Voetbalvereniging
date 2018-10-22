<?php
// --------------------------------------- CONNECT TO DATBASE ----------------------------------------------------------
// Setup connection variables
$servername = "127.0.0.1";
$username = "root";
$password = "123";

// Uploaded photo destination
$UPLOADED_PHOTO_DIR = "./img/uploads/";

// Make connection
try {
// Creates PDO connection with given variables
$conn = new PDO("mysql:host=$servername;dbname=s1135727_voetbal_app", $username, $password);

// Set error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
echo "Connectie mislukt: " . $e->getMessage();
}

?>