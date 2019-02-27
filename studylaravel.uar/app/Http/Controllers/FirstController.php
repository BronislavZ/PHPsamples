<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class FirstController extends Controller{
	public function show(){
		echo __METHOD__;
		
	}
		public function showid($id){
		echo __METHOD__;
		echo $id;
	}
}
?>