<?php
require_once "db_connect.php";
include "functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
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

        $sql = "INSERT INTO patients (first_name, middle_name, last_name, date_of_birth, age, gender, county, ward, assigned_doctor)
        VALUES (:first_name, :middle_name, :last_name, :date_of_birth, :age, :gender, :county, :ward, :assigned_doctor)";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            'first_name' => $firstname,
            'middle_name' => $lastname, // Assuming "lastname" is the middle name
            'last_name' => $surname,
            'date_of_birth' => $dob,
            'age' => $age,
            'gender' => $gender,
            'county' => $county,
            'ward' => $ward_id, // Assuming "ward_id" is the ward name
            'assigned_doctor' => $doctor_id // Assuming "doctor_id" is the doctor's name
        ]);

        // Redirect only after successful submission
        header("Location: /php/patient_records.php");
        exit;

    } catch (Throwable $error) {
        echo "Error: " . $error->getMessage();
    }
} else {
    // If user visits the file directly (GET), show an error
    http_response_code(405);
    echo "405 Method Not Allowed";
    exit;
}
?>
