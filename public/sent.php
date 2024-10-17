<?php 
    require_once('../includes/header.php');
?>
	<div>
		<h1>Your Sent Messages</h1>
	</div>
	<div class="container-fluid mt-5">
		<div class="row">
			<div class="col-md-6">
				<div class="float-left">
					<p>click <a href="dashboard.php">Here</a> to go back</p>
				</div>
			</div>
		</div>
	</div>
	<div class="container mt-3">
		<div class="table-responsive">
			<table class="table table-bordered table-hover" id="box">
				<tr>
					<th>Display</th>
					<th>Email</th>
					<th>Subject</th>
					<th>Date sent</th>
					<th>Action</th>
				</tr>
				
				<?php
				   $inbox = "SELECT * FROM outbox WHERE sender =
				   '$email' AND  deleted = 1 ORDER BY id DESC ";
				   $checkinbox = mysqli_query($connect, $inbox);
				   if(mysqli_num_rows($checkinbox)>0){
					while($rows = mysqli_fetch_assoc($checkinbox)){
						$id = $rows['id'];
						$senderid = $rows['senderid'];
						$receiver = $rows['receiver'];
						$subject = $rows['subject'];
						$message = $rows['message'];
						$createddate = $rows['createddate'];
						$msgread = $rows['msgread'];
						
						$sqlu = "SELECT img FROM user WHERE email ='$receiver'";
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
					<td><?=$receiver?></td>
					<td><a href="sentmessages.php?id=<?=base64_encode($id)?>"><?=$subject?></a></td>
					<td><?=$createddate?></td>
					<td><button class="btn btn-danger" id="<?=$id?>clear" onclick="deletemsg(<?=$id?>)">delete</button></td>
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