<?php
       session_start();
        require_once("dbinit.php");
        if(!isset($_SESSION['tid']))
        {
            header("Location:index.php");
            return;
        }
        if(isset($_POST['monday1']))
        //Monday
        {
            $qr="INSERT INTO timetable(`tid`, `day`";
            if(($_POST['monday1'])!="") $qr.=",`slot1`";
            if(($_POST['monday2'])!="") $qr.=",`slot2`";
            if(($_POST['monday3'])!="") $qr.=",`slot3`";
            if(($_POST['monday4'])!="") $qr.=",`slot4`";
            if(($_POST['monday5'])!="") $qr.=",`slot5`";
            if(($_POST['monday6'])!="") $qr.=",`slot6`";
            $qr.=") VALUES ('".$_SESSION['tid']."','MONDAY'";
            if(($_POST['monday1'])!="") $qr.=",'".$_POST['monday1']."'";
            if(($_POST['monday2'])!="") $qr.=",'".$_POST['monday2']."'";
            if(($_POST['monday3'])!="") $qr.=",'".$_POST['monday3']."'";
            if(($_POST['monday4'])!="") $qr.=",'".$_POST['monday4']."'";
            if(($_POST['monday5'])!="") $qr.=",'".$_POST['monday5']."'";
            if(($_POST['monday6'])!="") $qr.=",'".$_POST['monday6']."'";
            $qr.=")";
            
            $data=$pdo->query($qr);
            $_POST['monday1']=array();
            $_POST['monday2']=array();
            $_POST['monday3']=array();
            $_POST['monday4']=array();
            $_POST['monday5']=array();
            $_POST['monday6']=array();
        }
        if(isset($_POST['tuesday1']))
        //Tuesday
        {
            $qr2="INSERT INTO timetable(`tid`, `day`";
            if(($_POST['tuesday1'])!="") $qr2.=",`slot1`";
            if(($_POST['tuesday2'])!="") $qr2.=",`slot2`";
            if(($_POST['tuesday3'])!="") $qr2.=",`slot3`";
            if(($_POST['tuesday4'])!="") $qr2.=",`slot4`";
            if(($_POST['tuesday5'])!="") $qr2.=",`slot5`";
            if(($_POST['tuesday6'])!="") $qr2.=",`slot6`";
            $qr2.=") VALUES ('".$_SESSION['tid']."','TUESDAY'";
            if(($_POST['tuesday1'])!="") $qr2.=",'".$_POST['tuesday1']."'";
            if(($_POST['tuesday2'])!="") $qr2.=",'".$_POST['tuesday2']."'";
            if(($_POST['tuesday3'])!="") $qr2.=",'".$_POST['tuesday3']."'";
            if(($_POST['tuesday4'])!="") $qr2.=",'".$_POST['tuesday4']."'";
            if(($_POST['tuesday5'])!="") $qr2.=",'".$_POST['tuesday5']."'";
            if(($_POST['tuesday6'])!="") $qr2.=",'".$_POST['tuesday6']."'";
            $qr2.=")";
            
            $data=$pdo->query($qr2);
            $_POST['tuesday1']=array();
            $_POST['tuesday2']=array();
            $_POST['tuesday3']=array();
            $_POST['tuesday4']=array();
            $_POST['tuesday5']=array();
            $_POST['tuesday6']=array();
        }
        if(isset($_POST['wednesday1']))
        //Monday
        {
            $qr3="INSERT INTO timetable(`tid`, `day`";
            if(($_POST['wednesday1'])!="") $qr3.=",`slot1`";
            if(($_POST['wednesday2'])!="") $qr3.=",`slot2`";
            if(($_POST['wednesday3'])!="") $qr3.=",`slot3`";
            if(($_POST['wednesday4'])!="") $qr3.=",`slot4`";
            if(($_POST['wednesday5'])!="") $qr3.=",`slot5`";
            if(($_POST['wednesday6'])!="") $qr3.=",`slot6`";
            $qr3.=") VALUES ('".$_SESSION['tid']."','WEDNESDAY'";
            if(($_POST['wednesday1'])!="") $qr3.=",'".$_POST['wednesday1']."'";
            if(($_POST['wednesday2'])!="") $qr3.=",'".$_POST['wednesday2']."'";
            if(($_POST['wednesday3'])!="") $qr3.=",'".$_POST['wednesday3']."'";
            if(($_POST['wednesday4'])!="") $qr3.=",'".$_POST['wednesday4']."'";
            if(($_POST['wednesday5'])!="") $qr3.=",'".$_POST['wednesday5']."'";
            if(($_POST['wednesday6'])!="") $qr3.=",'".$_POST['wednesday6']."'";
            $qr3.=")";
            $data=$pdo->query($qr3);
            $_POST['wednesday1']=array();
            $_POST['wednesday2']=array();
            $_POST['wednesday3']=array();
            $_POST['wednesday4']=array();
            $_POST['wednesday5']=array();
            $_POST['wednesday6']=array();
        }
        if(isset($_POST['thursday1']))
        //Tuesday
        {
            $qr4="INSERT INTO timetable(`tid`, `day`";
            if(($_POST['thursday1'])!="") $qr4.=",`slot1`";
            if(($_POST['thursday2'])!="") $qr4.=",`slot2`";
            if(($_POST['thursday3'])!="") $qr4.=",`slot3`";
            if(($_POST['thursday4'])!="") $qr4.=",`slot4`";
            if(($_POST['thursday5'])!="") $qr4.=",`slot5`";
            if(($_POST['thursday6'])!="") $qr4.=",`slot6`";
            $qr4.=") VALUES ('".$_SESSION['tid']."','THURSDAY'";
            if(($_POST['thursday1'])!="") $qr4.=",'".$_POST['thursday1']."'";
            if(($_POST['thursday2'])!="") $qr4.=",'".$_POST['thursday2']."'";
            if(($_POST['thursday3'])!="") $qr4.=",'".$_POST['thursday3']."'";
            if(($_POST['thursday4'])!="") $qr4.=",'".$_POST['thursday4']."'";
            if(($_POST['thursday5'])!="") $qr4.=",'".$_POST['thursday5']."'";
            if(($_POST['thursday6'])!="") $qr4.=",'".$_POST['thursday6']."'";
            $qr4.=")";
           
            $data=$pdo->query($qr4);
            $_POST['thursday1']=array();
            $_POST['thursday2']=array();
            $_POST['thursday3']=array();
            $_POST['thursday4']=array();
            $_POST['thursday5']=array();
            $_POST['thursday6']=array();
        }
        if(isset($_POST['friday1']))
        //Monday
        {
            $qr5="INSERT INTO timetable(`tid`, `day`";
            if(($_POST['friday1'])!="") $qr5.=",`slot1`";
            if(($_POST['friday2'])!="") $qr5.=",`slot2`";
            if(($_POST['friday3'])!="") $qr5.=",`slot3`";
            if(($_POST['friday4'])!="") $qr5.=",`slot4`";
            if(($_POST['friday5'])!="") $qr5.=",`slot5`";
            if(($_POST['friday6'])!="") $qr5.=",`slot6`";
            $qr5.=") VALUES ('".$_SESSION['tid']."','FRIDAY'";
            if(($_POST['friday1'])!="") $qr5.=",'".$_POST['friday1']."'";
            if(($_POST['friday2'])!="") $qr5.=",'".$_POST['friday2']."'";
            if(($_POST['friday3'])!="") $qr5.=",'".$_POST['friday3']."'";
            if(($_POST['friday4'])!="") $qr5.=",'".$_POST['friday4']."'";
            if(($_POST['friday5'])!="") $qr5.=",'".$_POST['friday5']."'";
            if(($_POST['friday6'])!="") $qr5.=",'".$_POST['friday6']."'";
            $qr5.=")";
            $data=$pdo->query($qr5);
            $_POST['friday1']=array();
            $_POST['friday2']=array();
            $_POST['friday3']=array();
            $_POST['friday4']=array();
            $_POST['friday5']=array();
            $_POST['friday6']=array();
        }
        
?>
<!DOCTYPE html>
<html lang='en'>
<head>
   <nav class="navbar navbar-dark navbar-expand-sm fixed-top">
		<div class="container">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="Navbar">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item "><a class="nav-link" href="Teacher_Menu.php"><span class="fa fa-list fa-sm"></span> Teacher Menu </a></li>
					<li class="nav-item active"><a class="nav-link" href="#"><span class="fa fa-plus fa-sm"></span> Create TimeTable</a></li>
					<li class="nav-item"><a class="nav-link" href="course_details.php"><span class="fa fa-address-card fa-sm"></span> Allot Course</a></li>
				</ul>
				<span class="navbar-text">
					<a href="logout.php"><span id="Home" class="fa fa-sign-out fa-sm"></span>Logout</a>
				</span>
			</div>
		</div>
	</nav>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta http-equiv='x-ua-compatible' content='ie=edge'>

    <link rel='stylesheet' href='node_modules/bootstrap/dist/css/bootstrap.min.css'>
    <link rel='stylesheet' href='./css/style.css'>
    <link rel='stylesheet' href='node_modules/font-awesome/css/font-awesome.min.css'>
    <link rel='stylesheet' href='node_modules/bootstrap-social/bootstrap-social.css'>

</head>

<body>
    <? include "navbar.php"; ?>
    <br />
    <br />
    <form method = "POST">
        
        <br /><br />
        <div class="container">

            <div class="accordion" id="accordionExample">
                <div class="card" style="width:23rem;">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                MONDAY
                            </button>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <span>I&nbsp&nbsp&nbsp&nbsp&nbsp</span><input type="text" name="monday1" placeholder="Course Code"><br />
                            <span>II&nbsp&nbsp&nbsp&nbsp</span><input type="text" name="monday2" placeholder="Course Code"><br />
                            <span>III&nbsp&nbsp&nbsp</span><input type="text" name="monday3" placeholder="Course Code"><br />
                            <span>IV&nbsp&nbsp&nbsp</span><input type="text" name="monday4" placeholder="Course Code"><br />
                            <span>V&nbsp&nbsp&nbsp&nbsp</span><input type="text" name="monday5" placeholder="Course Code"><br />
                            <span>VI&nbsp&nbsp&nbsp</span><input type="text" name="monday6" placeholder="Course Code"><br />
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion" id="accordionExample1">
                <div class="card" style="width:23rem;">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne">
                                TUESDAY
                            </button>
                        </h5>
                    </div>
                    <div id="collapseOne1" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample1">
                        <div class="card-body" name="tuesday">
                            <span>I&nbsp&nbsp&nbsp&nbsp&nbsp</span><input type="text" name="tuesday1" placeholder="Course Code"><br />
                            <span>II&nbsp&nbsp&nbsp&nbsp</span><input type="text" name="tuesday2" placeholder="Course Code"><br />
                            <span>III&nbsp&nbsp&nbsp</span><input type="text" name="tuesday3" placeholder="Course Code"><br />
                            <span>IV&nbsp&nbsp&nbsp</span><input type="text" name="tuesday4" placeholder="Course Code"><br />
                            <span>V&nbsp&nbsp&nbsp&nbsp</span><input type="text" name="tuesday5" placeholder="Course Code"><br />
                            <span>VI&nbsp&nbsp&nbsp</span><input type="text" name="tuesday6" placeholder="Course Code"><br />
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion" id="accordionExample2">
                <div class="card" style="width:23rem;">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="true" aria-controls="collapseOne">
                                WEDNESDAY
                            </button>
                        </h5>
                    </div>
                    <div id="collapseOne2" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body" name="wednesday">
                            <span>I&nbsp&nbsp&nbsp&nbsp&nbsp</span><input type="text" name="wednesday1" placeholder="Course Code"><br />
                            <span>II&nbsp&nbsp&nbsp&nbsp</span><input type="text" name="wednesday2" placeholder="Course Code"><br />
                            <span>III&nbsp&nbsp&nbsp</span><input type="text" name="wednesday3" placeholder="Course Code"><br />
                            <span>IV&nbsp&nbsp&nbsp</span><input type="text" name="wednesday4" placeholder="Course Code"><br />
                            <span>V&nbsp&nbsp&nbsp&nbsp</span><input type="text" name="wednesday5" placeholder="Course Code"><br />
                            <span>VI&nbsp&nbsp&nbsp</span><input type="text" name="wednesday6" placeholder="Course Code"><br />
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion" id="accordionExample3">
                <div class="card" style="width:23rem;">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne3" aria-expanded="true" aria-controls="collapseOne">
                                THURSDAY
                            </button>
                        </h5>
                    </div>
                    <div id="collapseOne3" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample3">
                        <div class="card-body" name="thursday">
                            <span>I&nbsp&nbsp&nbsp&nbsp&nbsp</span><input type="text" name="thursday1" placeholder="Course Code"><br />
                            <span>II&nbsp&nbsp&nbsp&nbsp</span><input type="text" name="thursday2" placeholder="Course Code"><br />
                            <span>III&nbsp&nbsp&nbsp</span><input type="text" name="thursday3" placeholder="Course Code"><br />
                            <span>IV&nbsp&nbsp&nbsp</span><input type="text" name="thursday4" placeholder="Course Code"><br />
                            <span>V&nbsp&nbsp&nbsp&nbsp</span><input type="text" name="thursday5" placeholder="Course Code"><br />
                            <span>VI&nbsp&nbsp&nbsp</span><input type="text" name="thursday6" placeholder="Course Code"><br />
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion" id="accordionExample4">
                <div class="card" style="width:23rem;">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne4" aria-expanded="true" aria-controls="collapseOne">
                                FRIDAY
                            </button>
                        </h5>
                    </div>
                    <div id="collapseOne4" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample4">
                        <div class="card-body" name="friday">
                            <span>I&nbsp&nbsp&nbsp&nbsp&nbsp</span><input type="text" name="friday1" placeholder="Course Code"><br />
                            <span>II&nbsp&nbsp&nbsp&nbsp</span><input type="text" name="friday2" placeholder="Course Code"><br />
                            <span>III&nbsp&nbsp&nbsp</span><input type="text" name="friday3" placeholder="Course Code"><br />
                            <span>IV&nbsp&nbsp&nbsp</span><input type="text" name="friday4" placeholder="Course Code"><br />
                            <span>V&nbsp&nbsp&nbsp&nbsp</span><input type="text" name="friday5" placeholder="Course Code"><br />
                            <span>VI&nbsp&nbsp&nbsp</span><input type="text" name="friday6" placeholder="Course Code"><br />

                        </div>
                    </div>
                </div>
            </div>
			</br>
        <input type="submit" value="submit" class="btn btn-primary">
		</br>
        </div>

    </form>
                                    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
                                    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
                                    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
                                    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
