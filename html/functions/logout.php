<?php

require 'functions.php';

addToLogs(getUserId(),"Signed out");

	unset($_SESSION['email']);
	unset($_SESSION['token']);
	unset($_SESSION['id']);

	header("Location: ../index.php");
