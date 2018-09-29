<?php
        session_start();
        require_once("dbinit.php");
        if(!isset($_SESSION['id']))
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
					<li class="nav-item active"><a class="nav-link" href="regcourse.php"><span class="fa fa-home fa-sm"></span> Register Course</a></li>
					
				</ul>
				<span class="navbar-text">
					<a href="logout.php">
						<span id="logout" class="fa fa-sign-out fa-sm"></span>Logout
					</a>
				</span>
			</div>
		</div>
	</nav>
	<br><br>
	<div class="container">
		<div class="row row-content">
			<div class="col-md-10 col-sm-10 align-self-center">
		<?php
			$data=$pdo->prepare("SELECT * FROM regstu WHERE sid = :sid");
			$data->execute(array(":sid"=>$_SESSION['id']));

			while($row=$data->fetch(PDO::FETCH_ASSOC))
			{
				$data2=$pdo->prepare("SELECT * FROM course WHERE cid=:cid");
				$data2->execute(array(":cid"=>$row['cid']));
				$row2=$data2->fetch(PDO::FETCH_ASSOC);
			echo'	<div class="accordion" id="accordionExample">
					<div class="card">
						<div class="card-header" id="headingOne">
							<h5 class="mb-0">
								<button class="btn" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									Course Name'.$row2['name']. '<br />Course Code'.$row['cid'].'
								</button>
							</h5>
						</div>

						<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
							<div class="col-md-8 col-sm-8">
								<div class="card-body">
									<a href="survey.php?course='.$row['cid'].'"><button type="button" class="btn btn-dark">Due </br>Feedbacks</button></a>
									<a href="viewatt.php?course='.$row['cid'].'"><button type="button" class="btn btn-dark align-right">View </br>Attendance</button></a>
								</div>
							</div>
							
						</div>
					</div>
				</div>';
			}
				?>
			</div>
		</div>
		
	</div>

	<br />
	<br />


	<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
	<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
	<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>