<?php
        session_start();
        require_once("dbinit.php");
        if(!isset($_SESSION['tid']))
        {
            header("Location:index.php");
            return;
        }
        $i=1;
    	echo $_POST['max'];
        while($i<$_POST['max'])
        {
        	$sid=$_POST['enroll'.$i];
        	var_dump($sid);
        	$status=$_POST[$sid];
        	$data2=$pdo->prepare("DELETE FROM attendance WHERE cid=:cid AND sid=:sid AND adate=:adate");
        	$data2->execute(array(":cid"=>$_GET['course'],":sid"=>$sid,":adate"=>$_GET['date']));
        	$data=$pdo->prepare("INSERT INTO `attendance`(`cid`, `sid`, `adate`, `status`) VALUES (:cid,:sid,:adate,:status)");
       		$data->execute(array(":cid"=>$_GET['course'],":sid"=>$sid,":adate"=>$_GET['date'],":status"=>$status)); 	
        	$i++;
        	if($_POST['flag']==1)
        	{
        		$data3=$pdo->prepare("INSERT INTO review(`cid`, `tid`, `rdate`,`sid`) VALUES (:cid,:tid,:rdate,:sid)");
        		$data3->execute(array(":cid"=>$_GET['course'],":tid"=>$_SESSION['tid'],":rdate"=>$_GET['date'],":sid"=>$sid));
        	}
        }
        $_SESSION['msg']="Attendance Successfully Updated";
       	header("Location:teacher_menu.php");
        return;
 ?>