<?php
        session_start();
        require_once("dbinit.php");
        if(!isset($_SESSION['id']))
        {
            header("Location:index.php");
            return;
        }
        $data2=$pdo->prepare("SELECT * FROM review WHERE sid=:sid AND cid=:cid AND first IS NULL");
        $data2->execute(array(":sid"=>$_SESSION['id'],":cid"=>$_GET['course']));
        $row2=$data2->fetch(PDO::FETCH_ASSOC);
        if(($row2)==False)
        {
            die("No Feedback due");
        }
        if(isset($_POST['name1']))
        {
        $data2=$pdo->prepare("SELECT * FROM review WHERE sid=:sid AND cid=:cid AND first IS NULL");
        $data2->execute(array(":sid"=>$_SESSION['id'],":cid"=>$_GET['course']));
        $row2=$data2->fetch(PDO::FETCH_ASSOC);
        $data=$pdo->prepare("UPDATE `review` SET `rdate`=:rdate,`first`=:f,`second`=:s,`third`=:t,`additional`=:a WHERE `cid`=:cid AND `sid`=:sid AND `rdate`=:rdate"); 
          $data->execute(array(":f"=>$_POST['name1'],":s"=>$_POST['name2'],":t"=>$_POST['name3'],":a"=>$_POST['textf'],":cid"=>$_GET['course'],":sid"=>$_SESSION['id'],":rdate"=>$row2['rdate']));

        header("Location:student_menu.php");
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
    <h2 style='text-align:center'>COURSE FEEDBACK</h2>
    </br></br>
    <form method="POST">
        <div class="form-group-row">
            <div class="col-sm-12 col-md-12">
                <h3>
                    1. How well the topic was covered?

                </h3>
                <div class="offset-1">
                    <div class="col-sm-9" id="guests" name="score1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="name1" id="inlineRadio1" value="10">
                            <label class="form-check-label" for="inlineRadio1">Poor</label>
                        </div>
                        </br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="name1" id="inlineRadio1" value="25">
                            <label class="form-check-label" for="inlineRadio1">Below Average</label>
                        </div>
                        </br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="name1" id="inlineRadio2" value="50">
                            <label class="form-check-label" for="inlineRadio2">Average</label>
                        </div></br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="name1" id="inlineRadio3" value="75">
                            <label class="form-check-label" for="inlineRadio1">Good</label>
                        </div></br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="name1" id="inlineRadio4" value="100">
                            <label class="form-check-label" for="inlineRadio1">Excellent</label>
                        </div></br>

                    </div>
                </div>

            </div>
        </div>
        </br></br>
        <div class="form-group-row">
            <div class="col-sm-12 col-md-12">
                <h3>
                    2. How interactive was the faculty?

                </h3>
                <div class="offset-1">
                    <div class="col-sm-9" id="guests" name="score2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="name2" id="inlineRadio1" value="10">
                            <label class="form-check-label" for="inlineRadio1">Poor</label>
                        </div>
                        </br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="name2" id="inlineRadio1" value="25">
                            <label class="form-check-label" for="inlineRadio1">Below Average</label>
                        </div>
                        </br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="name2" id="inlineRadio2" value="50">
                            <label class="form-check-label" for="inlineRadio2">Average</label>
                        </div></br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="name2" id="inlineRadio3" value="75">
                            <label class="form-check-label" for="inlineRadio1">Good</label>
                        </div></br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="name2" id="inlineRadio4" value="100">
                            <label class="form-check-label" for="inlineRadio1">Excellent</label>
                        </div></br>

                    </div>
                </div>

            </div>
        </div>
        </br></br>
        <div class="form-group-row">
            <div class="col-sm-12 col-md-12">
                <h3>
                    3. Was he/she was able to solve your doubts?

                </h3>
                <div class="offset-1">
                    <div class="col-sm-9" id="guests" name="score3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="name3" id="inlineRadio1" value="10">
                            <label class="form-check-label" for="inlineRadio1">Poor</label>
                        </div>
                        </br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="name3" id="inlineRadio1" value="25">
                            <label class="form-check-label" for="inlineRadio1">Below Average</label>
                        </div>
                        </br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="name3" id="inlineRadio2" value="50">
                            <label class="form-check-label" for="inlineRadio2">Average</label>
                        </div></br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="name3" id="inlineRadio3" value="75">
                            <label class="form-check-label" for="inlineRadio1">Good</label>
                        </div></br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="name3" id="inlineRadio4" value="100">
                            <label class="form-check-label" for="inlineRadio1">Excellent</label>
                        </div></br>

                    </div>
                </div>

            </div>
        </div>

        <div class="form-group-row">
            <div class="col-sm-12 col-md-12">
                <h3><label for="comment">Comment:</label></h3>
                <textarea class="form-control" rows="5" name="textf" id="comment"></textarea>
            </div>
        </div>
        </br></br>
        <div class="form-group-row">
            <div class="col-sm-12 col-md-3">
                <button type="Submit" class="btn btn-success btn-lg btn-block">Submit</button>
            </div>
        </div>
        </br></br>
    </form>


    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>

