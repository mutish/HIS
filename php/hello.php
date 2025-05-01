<?php
    require_once 'db_connect.php';

    // Check if the connection is successful
    if ($pdo) {
        

        $sql = "INSERT INTO patients (patient_id,first_name, last_name, surname, dob, gender, county, phone, email, ward_id, doctor_id)
        VALUES (:patient_id,:first_name, :last_name, :surname, :dob, :gender, :county, :phone, :email, :ward_id, :doctor_id)";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            'patient_id' => 1,
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'surname' => 'Smith',
            'dob' => '1995-03-10',
            'gender' => 'Female',
            'county' => 'Nairobi',
            'phone' => '0712345678',
            'email' => 'jane.doe@example.com',
            'ward_id' => 1,
            'doctor_id' => 1
        ]);

        $select_sql = "SELECT * FROM patients";
        $select_stmt = $pdo->prepare($select_sql);

        $select_stmt->execute();

        $patients = $select_stmt->fetchAll(PDO::FETCH_ASSOC);

        print_r($patients);

        echo "✅ Patient added successfully!";
    } else {
        echo "Failed to connect to the database.";
    }
?>
