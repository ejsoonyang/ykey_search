<!DOCTYPE html>
<html lang="en">
	<meta http-equiv="Content-Type" content="charset=utf-8">

<?php
try {
	include "../header.php";
	include "../connect_db.php";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE logtable (
		i INT(14) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		c VARCHAR(10) CHARACTER SET utf8 COLLATE utf8_bin,
		date DATE
    	);";
	$c = test_input("詢"); $the_date =  date("Y-m-d");$sql .= "INSERT INTO logtable (c,date) VALUES ('$c','$the_date');";
	$c = test_input("查"); $the_date =  date("Y-m-d");$sql .= "INSERT INTO logtable (c,date) VALUES ('$c','$the_date');";
	$c = test_input("碼"); $the_date =  date("Y-m-d");$sql .= "INSERT INTO logtable (c,date) VALUES ('$c','$the_date');";
	$c = test_input("編"); $the_date =  date("Y-m-d");$sql .= "INSERT INTO logtable (c,date) VALUES ('$c','$the_date');";
	$c = test_input("頡"); $the_date =  date("Y-m-d");$sql .= "INSERT INTO logtable (c,date) VALUES ('$c','$the_date');";
	$c = test_input("倉"); $the_date =  date("Y-m-d");$sql .= "INSERT INTO logtable (c,date) VALUES ('$c','$the_date');";
	$c = test_input("摩"); $the_date =  date("Y-m-d");$sql .= "INSERT INTO logtable (c,date) VALUES ('$c','$the_date');";
	$c = test_input("奇"); $the_date =  date("Y-m-d");$sql .= "INSERT INTO logtable (c,date) VALUES ('$c','$the_date');";
	$c = test_input("虎"); $the_date =  date("Y-m-d");$sql .= "INSERT INTO logtable (c,date) VALUES ('$c','$the_date');";
	$c = test_input("雅"); $the_date =  date("Y-m-d");$sql .= "INSERT INTO logtable (c,date) VALUES ('$c','$the_date');";

    $conn->exec($sql);
    echo "Table logtable created successfully!";

    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?> 
