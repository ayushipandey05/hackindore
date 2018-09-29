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
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta http-equiv='x-ua-compatible' content='ie=edge'>

    <link rel='stylesheet' href='node_modules/bootstrap/dist/css/bootstrap.min.css'>
    <link rel='stylesheet' href='./css/style.css'>
    <link rel='stylesheet' href='node_modules/font-awesome/css/font-awesome.min.css'>
    <link rel='stylesheet' href='node_modules/bootstrap-social/bootstrap-social.css'>

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
    <div>
        <form method="POST" action=<?php echo "submitatd.php?course=".$_GET['course']."&date=".$_GET['date'] ?>>
        <h4 class='text-right'>Date: <?php echo $_GET['date']?></h4>
        <table class='table table-bordered'>
            <thead class='thead-dark'>
                <tr>
                    <th scope='col'>Enrollment No.</th>
                    <th scope='col'>Present/Absent</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $data=$pdo->prepare("SELECT * FROM regstu WHERE cid = :cid");
                    $data->execute(array(":cid" => $_GET['course']));
                    $i=1;
                    while($row=$data->fetch(PDO::FETCH_ASSOC))
                    {
                        $checkp="";
                        $checka="";
                        $data2=$pdo->prepare("SELECT * from attendance WHERE cid=:cid AND sid=:sid AND adate=:adate");
                        $data2->execute(array(":cid"=>$_GET['course'],":sid"=>$row['sid'],"adate"=>$_GET['date']));
                        $row2=$data2->fetch(PDO::FETCH_ASSOC);
                        $flag=1;
                        if(!is_null($row2['status']))
                        {
                            $flag=0;
                            if($row2['status']==0)
                                $checkp=" checked ";
                            else if($row2['status']==1)
                                $checka=" checked ";
                        }
                        echo '<input type="text" name="flag" value='.$flag.' hidden>';
                        echo '<tr>
                    <th scope="row">'.$i.' '.$row['sid'].'</th>
                    <td>    
                        <input type="radio" required name='.$row['sid'].' value="0" '.$checkp.' > &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="radio" required name='.$row['sid'].' value="1" '.$checka.'>&nbsp
                        <input type="text" name="enroll'.$i.'" hidden value="'.$row['sid'].'">
                    </td>
             
                </tr>';
                    $i+=1;
                    }
                    echo '<input type="text" hidden name="max" value="'.$i.'">';
                ?>
<!--
                <tr>
                    <th scope='row'>1</th>
                    <td>
                        <input type="radio" name="role" value="0"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="role" value="1">&nbsp
                    </td>
             
                </tr>
                <tr>
                    <th scope='row'>2</th>
                    <td>
                        <input type="radio" name="role" value="0"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="role" value="1">&nbsp
                    </td>
                   
                </tr>
                <tr>
                    <th scope='row'>3</th>
                    <td>
                        <input type="radio" name="role" value="0"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="role" value="1">&nbsp
                    </td>
                    
                </tr>-->
            </tbody>
        </table>
        <center><input type="submit" class="btn btn-primary" value="Submit"></center>
    </form>
    </div>
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
