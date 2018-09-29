<?php
		session_start();
 		require_once("dbinit.php");
 		if(!isset($_SESSION['tid']))
 		{
 			header("Location:index.php");
 			return;
 		}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	
	<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">

</head>

<body>
	<nav class="navbar navbar-dark navbar-expand-sm fixed-top">
		<div class="container">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="Navbar">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active"><a class="nav-link" href="#"><span class="fa fa-list fa-sm"></span> Teacher Menu </a></li>
					<li class="nav-item"><a class="nav-link" href="timetable.php"><span class="fa fa-plus fa-sm"></span> Create TimeTable</a></li>
					<li class="nav-item"><a class="nav-link" href="course_details.php"><span class="fa fa-address-card fa-sm"></span> Allot Course</a></li>
				</ul>
				<span class="navbar-text">
					
						<a href="logout.php"><span id="Home" class="fa fa-sign-out fa-sm"></span>Logout</a>
					
				</span>
			</div>
		</div>
	</nav>
	
	<br />
	<br />
	<div class="container">
		<div class="row">
		<?php
			$data=$pdo->prepare("SELECT * FROM course WHERE tid = :tid");
			$data->execute(array(":tid"=>$_SESSION['tid']));
			$i=0;
			while($row=$data->fetch(pdo::FETCH_ASSOC))
			{
				echo 
					"<div class='accordion col-xs-12 col-sm-4' id='accordionExample".$i."'>
			<div class='card' style='width:23rem;'>
				<div class='card-header' id='headingOne'>
					<h5 class='mb-0'>
						<button class='btn btn-link' type='button' data-toggle='collapse' data-target='#collapseOne".$i."' aria-expanded='true' aria-controls='collapseOne".$i."'>".
							$row['name'].
							"<br />".$row['cid']."
						</button>
					</h5>
				</div>

				<div id='collapseOne".$i."' class='collapse show' aria-labelledby='headingOne' data-parent='#accordionExample".$i."'>
					<div class='card-body'>
						<a href='attendance.php?id=".$row['cid']."'><button type='button' class='btn btn-dark'>Attendance</button></a>
						<a href='feedback.php?course=".$row['cid']."'><button type='button' class='btn btn-dark'>Feedback</button></a>
					</div>
				</div>
			</div>
			</div>
		";
		$i++;
			}
		?>
	</div>
	</div>
<!--
		<div class="accordion" id="accordionExample">
			<div class="card" style="width:23rem;">
				<div class="card-header" id="headingOne">
					<h5 class="mb-0">
						<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							Course Name<br />Course Code
						</button>
					</h5>
				</div>

				<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
					<div class="card-body">
						<a href="#"><button type="button" class="btn btn-dark">Attendance</button></a>
						<a href="#"><button type="button" class="btn btn-dark">Feedback</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
-->
	<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
	<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
	<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>

