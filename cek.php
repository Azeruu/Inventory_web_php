<?php
//jika belum login 

If (isset($_SESSION['log'])) {

} else {
    header('location:login.php');   
}

?>