<?php require_once('../includes/header.php');?> 
<div class="container mt-5">
  <h1>Compose a message</h1><br>
  <form action="../includes/composesub.php" method="POST">
    <div class="form-group">
      <label>from:</label>                    
      <input type="text" class="form-control" name="from" value="<?=$email?>" readonly />
      <input type="hidden" name="senderid" value="<?=$userid?>"/>
    </div>
    <div class="form-group">
      <label>message to:</label>                    
      <input type="text" class="form-control" name="to"/>
    </div>
    <div class="form-group">
      <label>subject:</label>                    
      <input type="text" class="form-control" name="subject"/>
    </div>
    <div class="form-group">
      <label>message:</label>                    
      <textarea class="form-control" name="message"></textarea>
    </div>
    <div class="form-group">
      <button class="btn btn-success" name="submit">submit</button>
    </div>        
  </form> 
  <div class="form-group">
    <?php if(isset($_GET['error'])){ ?>
      <div class="alert alert-danger">
        <?=$_GET['error']?>
      </div>
      <?php }elseif(isset($_GET['success'])){ ?>
        <div class="alert alert-success">
          <?=$_GET['success'] ?>
        </div>
      <?php } ?>
  </div>
  
  <h3>click<a class="btn btn-link" href="dashboard.php">Here</a> to go back</h3>
</div>

</body>
<script type="text/javascript" src="../assets/dist/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../assets/dist/js/all.js"></script>
<script type="text/javascript" src="../assets/dist/js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="../assets/dist/js/bootstrap.js"></script>
</html>