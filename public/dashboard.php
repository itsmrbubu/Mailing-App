<?php require_once('../includes/header.php');?>

	<div class="text-center">
		<h1>WELCOME BACK TO YOUR DASHBOARD...</h1>
	</div>
	<div class="container-fluid mt-5">
		<div class="row">
			<div class="col-md-6">
				<div class="float-left">
					<p><?=$fname?></p>
					<p><?=$address?></p>
					<p><?=$phone?></p>
					<p><a href="compose.php">Compose</a></p>
					<p><a href="../includes/logoutsub.php">Log out</a></p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="float-right">
					<p><a href="sent.php" class="btn btn-link">sent messages</a></p>
					<p><a href="search.php" class="btn btn-link">Search Contacts</a></p>
					<p><a href="changedp.php" class="btn btn-link">change display picture</a></p>
					<p><a href="changeprofile.php" class="btn btn-link">edit profile details</a></p>
					<p><a href="changepass.php" class="btn btn-link">change password</a></p>
				</div>
			</div>
		</div>
	</div>
	<div class="container mt-3">
		<div class="table-responsive">
			<table class="table table-bordered table-hover"  id="box">
				<tr>
					<th>Display</th>
					<th>Email</th>
					<th>Subject</th>
					<th>Date sent</th>
					<th>Action</th>
				</tr>

				<?php
				   $inbox = "SELECT * FROM inbox WHERE receiver =
				   '$email' AND  deleted = 1 ORDER BY id DESC ";
				   $checkinbox = mysqli_query($connect, $inbox);
				   if(mysqli_num_rows($checkinbox)>0){
					while($rows = mysqli_fetch_assoc($checkinbox)){
						$id = $rows['id'];
						$senderid = $rows['senderid'];
						$sender = $rows['sender'];
						$subject = $rows['subject'];
						$message = $rows['message'];
						$createddate = $rows['createddate'];
						$msgread = $rows['msgread'];
						$sqlu = "SELECT img FROM user WHERE id ='$senderid'";
						$resu = mysqli_query($connect , $sqlu);
						$users = mysqli_fetch_assoc($resu);
						$img = $users['img'];		
				?>
				
				<tr>
					<td>
						<?php if($img ==""){?>
						<img src="../assets/img/img2.jpeg" width="50" height="50" alt="">
						<?php }else{?>
						<img src="../includes/uploads/<?=$img?>"
						width="50" height="50" alt="">
						<?php } ?>
					</td>

					<td><?=$sender?></td>
					<td><a href="message.php?id=<?=base64_encode($id)?>"><?=$subject?></a></td>
					<td><?=$createddate?></td>
					<td><button class="btn btn-danger" id="<?=$id?>clear" onclick="deletemsg(<?=$id?>)">delete</button></td>

					<td>
						<?php if($msgread == 1){?>
						<span class="badge badge-danger">new</span>
						<?php }?>
					</td>
				</tr>
				<?php } ?> 
				<?php }else{ ?>
					<p>no messages yet...</p>
				<?php } ?>

			</table>
		</div>
	</div>
</body>
<script type="text/javascript" src="../assets/dist/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../assets/dist/js/all.js"></script>
<script type="text/javascript" src="../assets/dist/js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="../assets/dist/js/bootstrap.js"></script>
<script>
	function deletemsg(id){
		var msgid = id;
		var formdata = new FormData();
		formdata.append('msgid', msgid);

		$.ajax({
			type: 'POST',
			url: '../includes/deletemsg2.php',
			data: formdata,
			processData: false,
			contentType : false,
			success: function (data){
				$('#box').load('dashboard.php #box> *')
			}
		})
	}
</script>
</html>