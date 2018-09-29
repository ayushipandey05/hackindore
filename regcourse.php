<?php
        session_start();
        require_once("dbinit.php");
        if(!isset($_SESSION['id']))
        {
            header("Location:index.php");
            return;
        }
        if(isset($_POST['ccode'])&&isset($_POST['pwd']))
        {
            $data=$pdo->query("SElECT * FROM course WHERE cid='".$_POST['ccode']."' AND pwd='".$_POST['pwd']."'");
            $row=$data->fetch(PDO::FETCH_ASSOC);
            if($row==False)
            {
                $_SESSION['error']='WRONG CREDENTIALS';
                die("WRONG CREDENTIALS");
            }
            else
            {
                $data=$pdo->prepare("INSERT INTO regstu values(:sid,:cid)");
                $data->execute(array(":sid"=>$_SESSION['id'],":cid"=>$_POST['ccode']));
                echo"DONE";
                header("Location:student_menu.php");
                return;
            }
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
					<li class="nav-item active"><a class="nav-link" href="#"><span class="fa fa-home fa-sm"></span> Register Course</a></li>
					
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

    <div id="PromptModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="content">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">DONE</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="form-group">
                            <div class="form-group row">
                                <h2>Successfully Registered</h2>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-9">
                                </div>
                                <div class="col-sm-3">
                                    <button class="btn btn-secondary btn-sm" type="button" >OK</button>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
                        <?php
                if ( isset($_SESSION['error']) )
                {
                    echo('<p style="color: red;">'.$_SESSION['error']."</p>\n");
                    unset($_SESSION['error']);
                }
                if ( isset($_SESSION['success']))
                {
                    echo('<p style="color: green;">'.$_SESSION['success']."</p>\n");
                    unset($_SESSION['success']);
                }
            ?>
        <h2 style='text-align:center'>REGISTRATION FOR COURSES</h2><br />
        <div class="row row-content">
            <div class="col-sm-12 offset-md-4 col-md-4">

                <form method="POST">
                    <div class="form-group-row">
                        <label for="exampleInputEmail2"><h2>Enter the Course Code</h2></label>
                        <input type="text" name="ccode" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Course Code">
                    </div>
                    <br />
                    <br />
                    <div class="form-group-row">
                        <label for="exampleInputEmail1"><h2>Enter the Passcode given to you by your faculty</h2></label>
                        <input type="password" name="pwd" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Passcode">
                    </div>
                    </br>
                    <div class="form-group-row">
                        <div class="col-sm-12 col-md-12">
                            <button id="Prompt" type="Submit" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#PromptModal">Submit</button>
                        </div>
                    </div>
                    </br></br>
                </form>
            </div>
        </div>
    </div>




    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        $("#Prompt").click(function () {
            $("#{PromptModal").modal('toggle');
        });

    </script>
</body>
</html>
