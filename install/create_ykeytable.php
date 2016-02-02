<!DOCTYPE html>
<html lang="en">
	<meta http-equiv="Content-Type" content="charset=utf-8">

<?php
try {
	include "../connect_db.php";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE ykeytable (
		i INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		e VARCHAR(10) CHARACTER SET utf8 COLLATE utf8_bin,
		c VARCHAR(10) CHARACTER SET utf8 COLLATE utf8_bin
    	)";

    $conn->exec($sql);
    echo "Table ykeytable created successfully!";

    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?> 
