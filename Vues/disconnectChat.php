<?php
    session_start();
    if(isset($_SESSION['nameTarget'])) unset($_SESSION["nameTarget"]);
    header('Location: ../index.php');
    exit();
?>