
<html> 
 <body>    
 
<script src="./js/salert.js"> </script> 
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
unset($_SESSION['status']);
unset($_SESSION['status_code']);
unset($_SESSION['status_msg']); 
?> 
</script> 
</body> 
</html>
