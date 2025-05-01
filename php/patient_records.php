<?php
    require_once "db_connect.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HIS</title>
    <link rel="stylesheet" href="../css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
 <!--Site header-->
    <header id="siteHeader">
        <img src="../images/image.png" alt="logo" id="logo" >
        <div id="siteTitle">
            <h1 id="title" >Brighter Days Hospital</h1>
        </div>
    </header>

    <nav>
        <ul>
            <li><a href="/HIS/html/home.html">Home</a></li>
            <li class="nav-link dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Register
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/HIS/html/register_patient.html">Patient</a></li>
                    <li><a class="dropdown-item" href="/HIS/html/register_kin.html">Next of Kin</a></li>
                    <li><a class="dropdown-item" href="/HIS/html/register_doctor.html">Doctor</a></li>
                    <li><a class="dropdown-item" href="/HIS/html/wards.html">New ward</a></li>
                  </ul>
            </li>
            <li class="nav-link dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Records
      </a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="/HIS/php/patient_records.php">Patient record</a></li>
        <li><a class="dropdown-item" href="/HIS/php/kin_records.php">Next of Kin records</a></li>
        <li><a class="dropdown-item" href="/HIS/php/doctor_records.php">Doctor records</a></li>
        <li><a class="dropdown-item" href="/HIS/php/ward_records.php">Ward records</a></li>
      </ul>
</li>
            <li><a href="/HIS/html/about.html">About Us</a></li>
            <li><a href="/HIS/html/contacts.html">Contact Us</a></li>
        </ul>
    </nav>
    <!--End of site header -->
    <div class="container mt-3">
		<h1>Patient Records</h1><hr>
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th></th>
					<th>Name</th>
					<th>Date of Birth</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Ward</th>
					<th>Admitted on</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$select_sql = "SELECT patient_id, CONCAT(first_name, ' ', last_name, ' ', surname) AS name,dob,email,phone,admitted_at,ward_name FROM patients inner join wards on patients.ward_id = wards.ward_id";
					$select_stmt = $pdo->prepare($select_sql);

					$select_stmt->execute();

					$patients = $select_stmt->fetchAll(PDO::FETCH_ASSOC);

					foreach($patients as $index => $patient){
						$admission_date = date("d/m/Y",strtotime($patient['admitted_at']));
						$dob = date("d/m/Y",strtotime($patient['dob']));

						echo "<tr>";
						echo "<td>".($index + 1)."</td>";
						echo "<td>".$patient['name']."</td>";
						echo "<td>".$dob."</td>";
						echo "<td>".$patient['email']."</td>";
						echo "<td>".$patient['phone']."</td>";
						echo "<td>".$patient['ward_name']."</td>";
						echo "<td>".$admission_date."</td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
	</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>