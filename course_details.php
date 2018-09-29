<?php
       session_start();
        require_once("dbinit.php");
        if(!isset($_SESSION['tid']))
        {
            header("Location:index.php");
            return;
        }
        if(isset($_POST['cid']))
        {
            $data=$pdo->prepare("INSERT INTO course (`cid`, `name`, `pwd`, `tid`, `startdate`, `enddate`) VALUES(:cid,:name,:pwd,:tid,:st,:en)");
            $data->execute(array(":cid"=>$_POST['cid'],":name"=>$_POST['alias'],":pwd"=>$_POST['pwd'],":tid"=>$_SESSION['tid'],":st"=>$_POST['st'],":en"=>$_POST['en']));
            header("Location:teacher_menu.php");
            return;     
        }
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
					<li class="nav-item "><a class="nav-link" href="Teacher_Menu.php"><span class="fa fa-list fa-sm"></span> Teacher Menu </a></li>
					<li class="nav-item"><a class="nav-link" href="timetable.php"><span class="fa fa-plus fa-sm"></span> Create TimeTable</a></li>
					<li class="nav-item active"><a class="nav-link" href="#"><span class="fa fa-address-card fa-sm"></span> Allot Course</a></li>
				</ul>
				<span class="navbar-text">
					
						<a href="logout.php"><span id="Home" class="fa fa-sign-out fa-sm"></span>Logout</a>
					
				</span>
			</div>
		</div>
	</nav>
    <br />
    <br />
    <h2 style='text-align:center'>Course Details</h2>
    <br /><br />
    <div class="container">
        <form method="POST">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Course ID</label>
                </div>
                <input type="text" name="cid" class="form-control" placeholder="Course ID" aria-label="Alias" aria-describedby="basic-addon1">
            </div><br /><br />

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Course<br />  Start and End</span>
                </div>
                <input type="date" name="st" aria-label="Start Date" placeholeder="Start Date" class="form-control">
                <input type="date" name="en" aria-label="Last name" placeholeder="End Date" class="form-control">
            </div><br /><br />

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect02">Alias</label>
                </div>
                <input type="text" name='alias' class="form-control" placeholder="Alias" aria-label="Alias" aria-describedby="basic-addon1">
            </div><br /><br />
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect03">PassCode</label>
                </div>
                <input type="password" name='pwd' class="form-control" placeholder="Passcode" aria-label="Password" aria-describedby="basic-addon1">
            </div><br />
            <button class="btn btn-primary" type="submit" name="submit">Submit form</button>
        </form>
    </div>



    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>
