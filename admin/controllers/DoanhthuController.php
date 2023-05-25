<?php 
	//include file model vao day
	include "models/DoanhthuModel.php";
	
	class DoanhthuController extends Controller{
		use DoanhthuModel;

		public function index(){
			$this->loadView("DoanhthuView.php");
		}
		public function doanhthu(){
			$from = isset($_GET["from"]) ? $_GET["from"] : "";
			$to = isset($_GET["to"]) ? $_GET["to"] : "";
			$data = $this->tongdt();
			$this->loadView("DoanhthuView.php",["data"=>$data,"from"=>$from,"to"=>$to]);
		}
	}
 ?>