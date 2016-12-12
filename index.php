<?php

	/*
	
	author : nguyen minh tan
	email : nguyenminhtan893@gmail.com
	
	*/ 
	session_start();
	require_once('./apps/commons/connection.php');
	require_once('./apps/commons/env.php');

	if(isset($_GET['ctr']) && isset($_GET['act'])){
		$ctr = $_GET['ctr'];
		$act = $_GET['act'];
		if(isset($_GET['act1'])){
			$act_tmp = $_GET['act1'];
		}
	}
	else{
		$ctr = "Home";
		$act = "Index";
	}
	if(isset($_GET['act1'])){
		echo 'dsf';
	}
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		require_once('apps/views/layout.php');
	}
	else{
		require_once('route.php');
	}
?>