<?php
    require_once "db_connect.php";
    include "functions.php";

    try {
        
    if($_SERVER[REQUEST_METHOD] == "POST") {
        $ward_name = clean_data($_POST['first_name']);
        $capacity = clean_data($_POST['capacity']);
        $department = clean_data($_POST['department']);

        $insert_query = "INSERT INTO wards (ward_name, capacity ,department) VALUES (:ward_name, :capacity, :department)";
        
        $stmt = $pdo->prepare($insert_query);
        
        if ($stmt->execute([
            ':ward_name' => $ward_name,
            ':capacity' => $capacity,
            ':department' => $department,
        ])) {
            echo "Ward added successfully.";
        } else {
            echo "Error adding ward.";
        }
    }
    } catch (\Throwable $th) {
        echo $error->getMessage();
    }

    header("Location:/php/ward_records.php"); 
	exit;
?>