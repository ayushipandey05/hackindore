<?php
        session_start();
        require_once("dbinit.php");
        if(!isset($_SESSION['tid']))
        {
            header("Location:index.php");
            return;
        }
    $data=$pdo->prepare("SELECT * FROM review WHERE cid=:cid AND tid=:tid");
    $data->execute(array(":cid"=>$_GET['course'],":tid"=>$_SESSION['tid']));
    $q1ba=0;
    $q1a=0;
    $q1aa=0;
    $q1e=0;
    $q2ba=0;
    $q2aa=0;
    $q2a=0;
    $q2e=0;
    $q3ba=0;
    $q3a=0;
    $q3aa=0;
    $q3e=0;
    $cnt=0;
    while($row=$data->fetch(PDO::FETCH_ASSOC))
    {
        if($row['first']=='10')$q1ba++;
        if($row['first']=='25')$q1a++;
        if($row['first']=='75')$q1aa++;
        if($row['first']=='100')$q1e++;

        if($row['second']=='10')$q2ba++;
        if($row['second']=='25')$q2a++;
        if($row['second']=='75')$q2aa++;
        if($row['second']=='100')$q2e++;

        if($row['third']=='10')$q3ba++;
        if($row['third']=='25')$q3a++;
        if($row['third']=='75')$q3aa++;
        if($row['third']=='100')$q3e++;
        if(!is_null($row['first']))
            $cnt++;
    }
 //   var_dump($q1ba);
    $q1ba*=100/$cnt;
    $q1a*=100/$cnt;
    $q1aa*=100/$cnt;
    $q1e*=100/$cnt;
    $q2ba*=100/$cnt;
    $q2a*=100/$cnt;
    $q2aa*=100/$cnt;
    $q2e*=100/$cnt;
    $q3ba*=100/$cnt;
    $q3a*=100/$cnt;
    $q3aa*=100/$cnt;
    $q3e*=100/$cnt;
 ?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta http-equiv='x-ua-compatible' content='ie=edge'>

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
					<li class="nav-item active"><a class="nav-link" href="Teacher_Menu.php"><span class="fa fa-list fa-sm"></span> Teacher Menu </a></li>
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
    <!--
    <h2 style='text-align:center'>Overall Feedback</h2><br />
    <div class="progress" style='height:45px'>
        <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">Below Average 15%</div>
        <div class="progress-bar bg-info" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">Average 30%</div>
        <div class="progress-bar bg-succes" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">Above Average 20%</div>
    </div>
-->
    <br /><br />
    <h2 style='text-align:center'>1. How well the topic was covered?</h2><br />    
    <div class="progress" style='height:45px'>
        <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $q1ba."%";?>" aria-valuenow="<?php echo $q1ba ;?>" aria-valuemin="0" aria-valuemax="100">Below Average <?php echo $q1ba."%";?></div>
        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $q1a."%";?>" aria-valuenow="<?php  echo $q1a;?>" aria-valuemin="0" aria-valuemax="100">Average <?php echo $q1a;?></div>
        <div class="progress-bar bg-succes" role="progressbar" style="width: <?php echo $q1aa."%";?>" aria-valuenow="<?php  echo $q1aa ;?>" aria-valuemin="0" aria-valuemax="100">Above Average <?php echo $q1aa."%";?></div>
        <div class="progress-bar bg-succes" role="progressbar" style="width: <?php echo $q1e."%";?>" aria-valuenow="<?php  echo $q1e ;?>" aria-valuemin="0" aria-valuemax="100">Excellent <?php echo $q1e;?></div>
    </div>

    <h2 style='text-align:center'>2. How interactive was the faculty?</h2><br />    
    <div class="progress" style='height:45px'>
        <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $q2ba."%";?>" aria-valuenow=<?php echo $q2ba;?> aria-valuemin="0" aria-valuemax="100">Below Average <?php echo $q2ba."%";?></div>
        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $q2a."%"?>" aria-valuenow=<?php echo $q2a;?> aria-valuemin="0" aria-valuemax="100">Average <?php echo $q2a;?></div>
        <div class="progress-bar bg-succes" role="progressbar" style="width: <?php echo $q2aa."%";?>" aria-valuenow=<?php echo $q2aa;?> aria-valuemin="0" aria-valuemax="100">Above Average <?php echo $q2aa."%";?></div>
        <div class="progress-bar bg-succes" role="progressbar" style="width: <?php echo $q2e."%";?>" aria-valuenow=<?php echo $q2e;?> aria-valuemin="0" aria-valuemax="100">Excellent <?php echo $q2e;?></div>
    </div>
        <h2 style='text-align:center'>3. Was he/she was able to solve your doubts?</h2><br />    
    <div class="progress" style='height:45px'>
        <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $q3ba."%";?>" aria-valuenow=<?php echo $q3ba;?> aria-valuemin="0" aria-valuemax="100">Below Average <?php echo $q3ba."%";?></div>
        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $q3a."%";?>" aria-valuenow=<?php echo $q3a;?> aria-valuemin="0" aria-valuemax="100">Average <?php echo $q3a;?></div>
        <div class="progress-bar bg-succes" role="progressbar" style="width: <?php echo $q3aa."%";?>" aria-valuenow=<?php echo $q3aa;?> aria-valuemin="0" aria-valuemax="100">Above Average <?php echo $q3aa."%";?></div>
        <div class="progress-bar bg-succes" role="progressbar" style="width: <?php echo $q3e."%";?>" aria-valuenow=<?php echo $q3e;?> aria-valuemin="0" aria-valuemax="100">Excellent <?php echo $q3e;?></div>
    </div> 
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="ml-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            DATE
                        </button>
                    </h5>
                </div>
<!--
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Good</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar  progress-bar-striped bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">Average</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar  progress-bar-striped bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Bad</div>
                        </div><br />
-->
                              <ul class="list-group-sm list-group-flush">
                                  <?php
                                  $data2=$pdo->prepare("SELECT additional,rdate FROM review WHERE cid=:cid");
                                  $data2->execute(array(":cid"=>$_GET['course']));
                                  while($row=$data2->fetch(PDO::FETCH_ASSOC))
                                { 
                                    if(!is_null($row['additional']))
                                echo'
                                  <li class="list-group-item">'.$row['rdate']."/ ".$row['additional'].'</li>
                                    ';
                                }
                                 ?>
                              </ul> 
                   </div>
                </div>
            </div>
        </div>
   












    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html >
