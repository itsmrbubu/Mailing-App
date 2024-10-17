<?php 
    require_once('../includes/header.php');
	if(isset($_GET['id'])){
		$id = base64_decode($_GET['id']);
		$fetchmsg = "SELECT * FROM inbox WHERE id = '$id' ";
		$msgres =mysqli_query($connect, $fetchmsg);
		$msg = mysqli_fetch_assoc($msgres);
		$sender = $msg['sender'];
		$cd = $msg['createddate'];
		$subject = $msg['subject'];
		$message = $msg['message'];
		$read = "UPDATE `inbox` SET `msgread` = 0 WHERE `id` = '$id' ";
		mysqli_query($connect, $read);
	}else{
		header('location:index.php?error = login first');
		return false;
	}
?>
	<div class="container-fluid mt-5">
		<div class="row">
			<div class="col-md-6">
				<div class="float-left">
					<p>Message From: <span><?=$sender?></span></p>
					<p>Sent By: <span><?=$cd?></span></p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="float-right">
					<p><a href="../includes/deletemsg.php?id=<?=$id?>">click here to delete message</a></p>
					<p><a href="dashboard.php">click here to go back</a></p>
				</div>	
			</div>
		</div>
	</div>
	<div class="container mt-5">
		<div>
			<h4>SUBJECT:</h4>
			<p><?=$subject?></p>
		</div>
		<div>
			<h4>MESSAGE:</h4>
			<p><?=$message?></p>
		</div>
	</div>
</body>
<script type="text/javascript" src="../assets/dist/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../assets/dist/js/all.js"></script>
<script type="text/javascript" src="../assets/dist/js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="../assets/dist/js/bootstrap.js"></script>
</html>