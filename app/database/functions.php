<?php

session_start();
require('connection.php');

function isLoggedIn()
{
	if ($_SESSION['logged_in'] == 1) {
		return true;
	}else{
		return false;
	}
}