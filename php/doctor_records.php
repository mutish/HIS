<?php
    require_once "db_connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor records ~ Afya Hospital</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
</head>
<body>
 <!--Site header-->
 <header>
    <h1>Afya Hospital</h1>
    <p>Your health, Our priority</p>
  </header>

  <nav>
    <ul>
      <li><a href="../html/index.html">Home</a></li>
      <li class="dropdown">
        <a href="#">Register</a>
        <ul class="dropdown-menu">
          <li><a href="../html/register_patient.html">Patient</a></li>
          <li><a href="../html/register_kin.html">Next of Kin</a></li>
          <li><a href="../html/register_doctor.html">Doctor</a></li>
          <li><a href="../html/wards.html">New Ward</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#">Records</a>
        <ul class="dropdown-menu">
          <li><a href="../php/patient_records.php">Patient</a></li>
          <li><a href="../php/kin_records.php">Next of Kin</a></li>
          <li><a href="../php/doctor_records.php">Doctor</a></li>
          <li><a href="../php/ward_records.php">Wards</a></li>
        </ul>
      </li>
      <li><a href="../html/about.html">About us</a></li>
      <li><a href="../html/contacts.html">Contact Us</a></li>
    </ul>
  </nav>
    <!--End of site header -->
    <div class="container">
		<h1>Doctors</h1><hr>
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Doctor ID</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Specialization</th>
					<th>Email</th>
					<th>Phone Number</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$select_sql = "SELECT doctor_id, first_name, last_name, specialization, email, phone_number FROM doctors";
					$select_stmt = $pdo->prepare($select_sql);

					$select_stmt->execute();

					$doctors = $select_stmt->fetchAll(PDO::FETCH_ASSOC);

					foreach($doctors as $index => $doctor){
						echo "<tr>";
						echo "<td>".($index + 1)."</td>";
						echo "<td>".$doctor['doctor_id']."</td>";
						echo "<td>".$doctor['first_name']."</td>";
						echo "<td>".$doctor['last_name']."</td>";
						echo "<td>".$doctor['specialization']."</td>";
						echo "<td>".$doctor['email']."</td>";
						echo "<td>".$doctor['phone_number']."</td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
	</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>