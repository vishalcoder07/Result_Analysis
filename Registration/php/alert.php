
<html> 
 <body>    
 
<script src="../Admin Dashbord/pages/js/salert.js"> </script> 
<script> 
<?php
if( isset($_SESSION["status"]) && ($_SESSION["status"]!=''))
{
  ?>
swal({
  title: "<?php echo$_SESSION['status']; ?>",
  text: "<?php echo$_SESSION['status_msg'];?> ",
  icon: "<?php echo$_SESSION['status_code']; ?>",
  button: "ok",
});
<?php } 

session_destroy();
?> 
</script> 
</body> 
</html>
          