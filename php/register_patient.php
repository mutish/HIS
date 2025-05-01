<?php
	require_once "db_connect.php";
	include "functions.php";

		try {
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				$patient_id = clean_data($_POST["patient-id"]); 
				$firstname = clean_data($_POST["firstname"]);
				$lastname = clean_data($_POST["lastname"]); 
				$surname = clean_data($_POST["surname"]);
				$dob = clean_data($_POST["dob"]);
				$age = clean_data($_POST["age"]);
				$gender = clean_data($_POST["gender"]);
				$county = clean_data($_POST["county"]);
				$phone = clean_data($_POST["phone"]);
				$email = clean_data($_POST["email"]);
				$ward_id = clean_data($_POST["ward"]);
				$doctor_id = clean_data($_POST["doctor"]);
	
				$sql = "INSERT INTO patients (first_name, last_name, surname, dob, age, gender, county, phone, email, ward_id, doctor_id)
				VALUES (:first_name, :last_name, :surname, :dob, :age, :gender, :county, :phone, :email, :ward_id, :doctor_id)";
	
				$stmt = $pdo->prepare($sql);
	
				$stmt->execute([
					'first_name' => $firstname,
					'last_name' => $lastname,
					'surname' => $surname,
					'dob' => $dob,
					'age' => $age,
					'gender' => $gender,
					'county' => $county,
					'phone' => $phone,
					'email' => $email,
					'ward_id' => $ward_id,
					'doctor_id' => $doctor_id
				]);
			}
		} catch (\Throwable $error) {
			echo $error->getMessage();
		}

		header("Location: http://localhost/HIS/php/patient_records.php"); 
		exit;
?>
   