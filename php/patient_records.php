<?php
    require_once "db_connect.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HIS</title>
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
    <div class="container mt-3">
		<h1>Patient Records</h1><hr>
		<table class="table table-hover table-bordered">
			<thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Date of Birth</th>
        <th>Age</th>
        <th>Gender</th>
        <th>County</th>
    </tr>
			</thead>
			<tbody>
				<?php
					$select_sql = "SELECT patient_id, first_name, middle_name, last_name, date_of_birth, age, gender, county FROM patients";
$select_stmt = $pdo->prepare($select_sql);
$select_stmt->execute();
$patients = $select_stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($patients as $index => $patient){
    $dob = date("d/m/Y",strtotime($patient['date_of_birth']));
    $name = $patient['first_name'] . ' ' . $patient['middle_name'] . ' ' . $patient['last_name'];
    echo "<tr>";
    echo "<td>".($index + 1)."</td>";
    echo "<td>".$name."</td>";
    echo "<td>".$dob."</td>";
    echo "<td>".$patient['age']."</td>";
    echo "<td>".$patient['gender']."</td>";
    echo "<td>".$patient['county']."</td>";
    echo "</tr>";
}
				?>
			</tbody>
		</table>
	</div>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
</html>