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
    $data=$pdo->prepare("SELECT startdate,enddate FROM course WHERE cid=:cid");
    $data->execute(array(":cid"=>$_GET['id']));
    $row=$data->fetch(pdo::FETCH_ASSOC);   
    $date1=$row['startdate'];
    $date2=$row['enddate'];
    while($date1<$date2)
    {


        $unixTimestamp = strtotime($date1);
        $dayOfWeek = date("l", $unixTimestamp);
        //echo $dayOfWeek;
    echo '
            <div class="col-sm-4 col-xs-12">
                <a href="date.php?date='.$date1.'&course='.$_GET['id'].'"><button type="button" class="btn btn-primary btn-lg btn-block">'.$date1.'</button></a>
                <a href="date.php?date='.$date1.'&course='.$_GET['id'].'"><button type="button" class="btn btn-info btn-lg btn-block">'.$dayOfWeek.'</button></a>
                    <br>
            </div>
            <br>
        ';
        $date1 = date('Y-m-d', strtotime($date1 . ' +1 day'));
    }
    ?>
    <!--
                    <div class="col-sm">
                <a href="#"><button type="button" class="btn btn-primary btn-lg btn-block">Block level button</button></a>
                <a href="#"><button type="button" class="btn btn-secondary btn-lg btn-block">Block level button</button></a>
            </div>
            <div class="col-sm">
                <a href="#"><button type="button" class="btn btn-primary btn-lg btn-block">Block level button</button></a>
                <a href="#"><button type="button" class="btn btn-secondary btn-lg btn-block">Block level button</button></a>
            </div>
    -->
    </div>
    </div>
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>

