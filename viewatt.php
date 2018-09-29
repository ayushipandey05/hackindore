<?php
        session_start();
        require_once("dbinit.php");
        if(!isset($_SESSION['id']))
        {
            header("Location:index.php");
            return;
        }
        $data=$pdo->prepare("SELECT COUNT(*) FROM attendance WHERE cid=:cid AND sid=:sid");
        $data->execute(array(":cid"=>$_GET['course'],":sid"=>$_SESSION['id']));
        $tot=$data->fetch(PDO::FETCH_ASSOC);
        $tot=$tot['COUNT(*)'];
        $data2=$pdo->prepare("SELECT COUNT(*) FROM attendance WHERE cid=:cid AND sid=:sid AND status=0");
        $data2->execute(array(":cid"=>$_GET['course'],":sid"=>$_SESSION['id']));
        $totp=$data2->fetch(PDO::FETCH_ASSOC);
        $totp=$totp['COUNT(*)'];
        $data3=$pdo->prepare("SELECT * FROM attendance WHERE cid=:cid AND sid=:sid");
        $data3->execute(array(":cid"=>$_GET['course'],":sid"=>$_SESSION['id']));

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
    <br />
    <br />
    <h2 style='text-align:center'>Attendance Stats</h2>
    <br /><br />

          <div class="container">
              <div class="row row-content">
                  <div class="col-sm-10 col-md-10 offset-sm-1 offset-md-1">
                      <h2>Total Attendance :<?php echo $totp.'/'.$tot;?> &nbsp</h2>
                      </br>
                      <h2>Percentage : <?php echo (($totp/$tot)*100);?>&nbsp</h2>
                      </br></br>

                  </div>
                  <div class="col-sm-12 col-md-12 ">
                      <div class="progress" style='height:50px'>
                          <div class="progress-bar bg-success" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"><?php echo $totp." Presents";?></div>
                          <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"><?php echo $tot-$totp." Absents"?></div>
                      </div>
                  </div>
                  
              </div>
              <div class="row row-content">
                  <div class="col-sm-12 col-md-10 offset-md-1">
                      <table class='table table-bordered'>
                          <thead class="thead-dark">
                              <tr class="align-middle">
                                  <th scope="col-5 col-sm-6 col-md-6">DATE</th>
                                  <th scope="col-5 col-sm-6 col-md-6">STATUS</th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php
                          $i=1;
                            while($row=$data3->fetch(PDO::FETCH_ASSOC))
                            {
                              if($row['status']==0)
                                $stat="<div class=''>PRESENT</div>";
                              else
                                $stat="<div class=''>ABSENT</div>";
                             echo'<tr>
                                  <th scope="row">'.$i.'. '.$row['adate'].'</th>
                                  <td class="align-middle">
                                     <h4>'.$stat.'</h4>
                                  </td>
                              </tr>
                              ';
                              $i++;
                          }
                            ?>
                            <!--
                              <tr>
                                  <th scope='row'>2</th>
                                  <td class="align-middle>
                                      
                                  </td>

                              </tr>
                              <tr>
                                  <th scope='row'>3</th>
                                  <td class="align-middle>
                                      
                                  </td>

                              </tr>
                            -->
                          </tbody>
                      </table> 
                  </div>
              </div>
          </div>










    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>
