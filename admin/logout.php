<?php
session_start();
ob_start();
include('includes/conn.php');

session_destroy();


    $loggedout = urlencode("<b>Success!</b> You have been logged out!");
	header("location: ../index.php?loggedout=".$loggedout);

