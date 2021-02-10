<?php
session_start();
unset($_SESSION['AdminEmail']);
unset($_SESSION['AdminAngnaUid']);
unset($_SESSION['AdminName']);
unset($_SESSION['AdminGender']);
unset($_SESSION['AdminPhone']);
unset($_SESSION['AdminPassword']);
unset($_SESSION['AdminDp']);

header('location:../');

?>