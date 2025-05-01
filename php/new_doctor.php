<?php
    require_once "db_connect.php";
    include "functions.php";

    try {
        
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $first_name = clean_data($_POST['fname']);
        $last_name = clean_data($_POST['lname']);
        $specialty = clean_data($_POST['specialty']);
        $email = clean_data($_POST['email']);
        $phone = clean_data($_POST['phone']);

        $insert_query = "INSERT INTO doctors (first_name, last_name, specialty, email, phone) VALUES (:first_name, :last_name, :specialty, :email, :phone)";
        
        $stmt = $pdo->prepare($insert_query);
        
        if ($stmt->execute([
			':first_name' => $first_name,
			':last_name' => $last_name,
			':specialty' => $specialty,
			':email' => $email,
			':phone' => $phone
        ])) {
            echo "Doctor registered successfully.";
        } else {
            echo "Error adding doctor.";
        }
    }
    } catch (\Throwable $error) {
        echo $error->getMessage();
    }

    header("Location: http://localhost/HIS/php/doctor_records.php"); 
	exit;
?>