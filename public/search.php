<?php
  require_once('../includes/header.php');


?>
  <div class="container mt-1">
    <h1>Search Users</h1><br>
    
      <div class="form-group">                    
        <input type="text" id="search" class="form-control" />
      </div>
          
    <div class="container">
      <div class="col-md-12">
          <div id="result"></div>
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

  $(document).ready(function(){
    $('#search').keyup(function(){
      var txt = $(this).val();
      if(txt == ''){
        $('#result').html('');
      }else{
        $.ajax({
          type: "POST",
          url:'../includes/fetchusers.php',
          data: {keyword: txt},
          success: function (data){
            $('#result').html(data);
            
            
          }

        });
      }
    })

  })

</script>

</html>