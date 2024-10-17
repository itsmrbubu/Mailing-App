<?php require_once('../includes/header.php');?>

  <div class="text-center">
    <?php if($pic == ""){?> 
    <img src="../assets/img/img2.jpeg" class="img-fluid rounded-circle" width="150" height="150">
    <?php  }else{ ?>
    <img src="../includes/uploads/<?=$pic?>" class="img-fluid rounded-circle" width="150" height="150">
    <?php }?>
  </div>
  
  <div class="container mt-5">
    <h1>Upload a new display picture</h1><br>
    <form action="../includes/dp.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label>choose pictures</label>                    
        <input type="file" id="gallery-photo-add" name="file"/>
        <input type="hidden" name="id" value="<?=$userid?>">
      </div>
      <div class="form-group">
        <button class="btn btn-success" name="submit">submit</button>
      </div>      
      <div class="form-group">
				<?php if (isset($_GET['error'])) { ?>
					<div class="alert alert-danger">
						<?= $_GET['error'] ?>
					</div>
				<?php } elseif (isset($_GET['success'])) { ?>
					<div class="alert alert-success">
						<?= $_GET['success'] ?>
					</div>
				<?php } ?>
			</div>   
    </form> 
    <div class="container">
      <div class="col-md-12">
          <div class="gallery"></div>
      </div>
    </div><br>
    <h3>click<a class="btn btn-link" href="dashboard.html">Here</a> to go back</h3>
  </div>
  
</body>
<script type="text/javascript" src="../assets/dist/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../assets/dist/js/all.js"></script>
<script type="text/javascript" src="../assets/dist/js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="../assets/dist/js/bootstrap.js"></script>
<script>
  $(function(){
    var imagepreview = function(input, placetoinsertimage){
      if(input.files){
        var fileamount = input.files.length;
        for(i = 0; i < fileamount; i++){
          var reader = new FileReader();

          reader.onload = function(event){
            $($.parseHTML('<embed width="20%" height="40%" >')).attr('src', event.target.result).appendTo(placetoinsertimage)
          }
          reader.readAsDataURL(input.files[i]);
        }
      }
    }
    $('#gallery-photo-add').on('change', function(){
      imagepreview(this, 'div.gallery');
    });
  });
</script>
</html>