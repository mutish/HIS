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
    <div class="container">
		<h1>Wards</h1><hr>
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Ward ID</th>
					<th>Ward Name</th>
					<th>Capacity</th>
					<th>Department</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$select_sql = "SELECT ward_id, ward_name, capacity, department FROM wards";
					$select_stmt = $pdo->prepare($select_sql);

					$select_stmt->execute();

					$wards = $select_stmt->fetchAll(PDO::FETCH_ASSOC);

					foreach($wards as $index => $ward){
						echo "<tr>";
						echo "<td>".($index + 1)."</td>";
						echo "<td>".$ward['ward_id']."</td>";
						echo "<td>".$ward['ward_name']."</td>";
						echo "<td>".$ward['capacity']."</td>";
						echo "<td>".$ward['department']."</td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
	</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>