<?php
	require_once "db_connect.php";
	include "functions.php";

		try {
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				$patient_id = clean_data($_POST["patientID"]); 
				$firstname = clean_data($_POST["firstname"]);
				$lastname = clean_data($_POST["lastname"]); 
				$relationship = clean_data($_POST["relationship"]);
				$email = clean_data($_POST["email"]);
				$phone = clean_data($_POST["phone"]);

				$sql = "INSERT INTO next_of_kin (patient_id, first_name, last_name, relationship, phone, email)
                VALUES (:patient_id, :first_name, :last_name, :relationship, :phone, :email)";
	
				$stmt = $pdo->prepare($sql);
	
				$stmt->execute([
					'patient_id' => $patient_id,
					'first_name' => $firstname,
					'last_name' => $lastname,
					'relationship' => $relationship,
					'phone' => $phone,
					'email' => $email,
				]);
			}
		} catch (\Throwable $error) {
			echo $error->getMessage();
		}

		header("Location: http://localhost/HIS/php/records.php"); 
		exit;
?>
   