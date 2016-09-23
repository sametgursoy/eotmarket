<?php
if( isset($_SESSION['message']))
{
   echo "<br> <div class='alert alert-danger'>". $_SESSION['message'] ."</div>";
   $_SESSION['message'] = null;
}

?>
