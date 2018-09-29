<?php
    session_start();
    require_once "dbinit.php";
    if(isset($_POST['id']) && isset($_POST['pass']) )
    {
        unset($_SESSION['id']);
        if ( strlen($_POST['id']) < 1 || strlen($_POST['pass']) < 1 )
        {
            $_SESSION['error'] = "User id and password are required";
            header('Location: index.php');
            return;
        }
        else
        {
            if($_POST['role']=='1')
            {
                    $stmt = $pdo->prepare('SELECT * FROM faculty WHERE uid = :id AND pwd = :pw');
                    $stmt->execute(array(':id' => $_POST['id'], ':pw' => $_POST['pass']));
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($row != false)
                    {
                        $_SESSION['tid'] = $row['uid'];
                        $_SESSION['name'] = $row['name'];
                        header("Location: teacher_menu.php");
                        return;
                    }
                    else
                    {
                        $_SESSION['error'] = "Incorrect ID or Password";
                        header("Location: index.php");
                        return;
                    }
            }
            else
            {
                    $stmt = $pdo->prepare('SELECT * FROM students WHERE uid = :id AND pwd = :pw');
                    $stmt->execute(array(':id' => $_POST['id'], ':pw' => $_POST['pass']));
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($row != false)
                    {
                        $_SESSION['id'] = $row['uid'];
                        $_SESSION['name'] = $row['name'];
                        header("Location: student_menu.php");
                        return;
                    }
                    else
                    {
                        $_SESSION['error'] = "Incorrect ID or Password";
                        header("Location: index.php");
                        return;
                    }
            }
        }
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
    <title>Teacher's Feedback System</title>
</head>

<body>
    <header class="jumbotron-fluid">
        <div class="container">
            <div class="row row-header">
                <div class="col-12 col-sm align-self-center">
                    <img src="./assets/logo.jpg" class="img-fluid" alt="Logo" id="logo" />
                </div>
            </div>
        </div>
    </header >
    <br />
    <br />


	<div class="row row-content ">
	<div class="col-md-4 col-sm-12 offset-md-4 ">
		<div id="logincard">
		<div class="card" >
			<div class="card-header bg-danger text-white">
				<h3>LOGIN</h3>
			</div>
			<div class="card-body">
               
			
            <form id="loginform" method="POST">
                <div id="form-group-row" >
						<label for="roles">Role :</label>
						<div id="roles">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="role" value="0"> Student &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="radio" name="role" value="1" checked> Faculty 
						</div>
                        </div>
						<br />
                </div>
                <div class="form-group-row" >
					<label for="id">Username</label>
                    <input type="text" name="id" id="id" class="form-control" required placeholder="Username">
                    <br>
                </div>
                 <br>
                    <div class="form-group-row">
						<label for="pass">Password</label>
                        <input type="password" name="pass" id="pass" class="form-control" required placeholder="Password">
                        <br>
                    </div>
                    <br>
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
                    <input type="submit" value="Log In" class="btn btn-primary">
                </form>
				
            </div>
        </div>
		</div>
		</div></div>
	</div>
	
		 
	</div>





    <script>
       $(document).ready(function() {
 
  $('#loginform').submit(function(e) {
    e.preventDefault();
    var username = $('#id').val();
    var password = $('#pass').val();
    
 
    $(".error").remove();
 
    if (username.length < 1) {
      $('#id').after('<span class="error">This field is required</span>');
    }
    if (password.length < 1) {
      $('#id').after('<span class="error">This field is required</span>');
    }
    
  
    if (password.length < 8) {
      $('#pass').after('<span class="error">Password must be at least 8 characters long</span>');
    }
  });
 
});
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
    <!-- build:js js/main.js -->
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- endbuild -->
</body>

</html>