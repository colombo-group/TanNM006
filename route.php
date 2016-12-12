<?php

function Call($ctr, $act ,$act1=null){
	require_once('apps/models/'.$ctr."Model.php");
	require_once('apps/controllers/'.$ctr."Controller.php");
	$class = $ctr.'Controller';
		return $tmp=$class::$act();		
}

// Tap hop cac controller va cac ham cua he thong
// Su dung de check 2 bien $ctr, $action tren url xem co hop le khong
$listCtr = [
	'User' => ['Register','Index','Save','Login','LogOut','Del','Update']
];

// Loc thong tin tu bien $ctr, $action khoi tao tai index.php
if(array_key_exists($ctr ,$listCtr)){ // Check gia tri cua $ctr co trong tap key cua listCtr hay khong
	if(in_array($act, $listCtr[$ctr])){ // Check gia tri cua $action co trong tap value cua listCtr hay khong 
		switch ($ctr) {
			case 'User':
				Call($ctr,$act);
				break;
			
			default:
				Call($ctr,'Index');
				break;
		}
	}else{
		$ctr = "User";
		$act = "Index";
		Call($ctr, $act);
	}
}else{
	$ctr = "User";
	$act = "Index";
	Call($ctr, $act);
}
?>