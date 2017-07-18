<?php  include "db.php"; ?>
<?php  include "header.php"; ?>
<?php  include "../admin/functions.php"; ?>

<?php
if(isset($_POST['login'])){
    loginUser($_POST['username'], $_POST['password']);
}
?>