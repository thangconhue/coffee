<?php 
	//include file model vao day
	include "models/NccModel.php";
	
	class NccController extends Controller{
		//ke thua class NccModel
		use NccModel;

		public function index(){
			//quy dinh so ban ghi tren mot trang
			$recordPerPage = 20;
			//tinh so trang
			//ham ceil(so) se lay gia tri lam tron tren cua so do. VD: ceil(3.1) = 4
			$numPage = ceil($this->modelTotalRecord()/$recordPerPage);
			//lay du lieu tu model
			$data = $this->modelRead($recordPerPage);
			//goi view, truyen du lieu ra view
			$this->loadView("NccView.php",["data"=>$data,"numPage"=>$numPage]);
		}
		public function update(){
			$id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
			//lay mot ban ghi
			$record = $this->modelGetRecord();
			//tao bien $action de biet duoc khi an nut submit thi trang se submit den dau
			$action = "index.php?controller=ncc&action=updatePost&id=$id";
			//goi view, truyen du lieu ra view
			$this->loadView("NccFormView.php",["record"=>$record,"action"=>$action]);
		}
		public function updatePost(){
			$id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
			//goi ham modelUpdate de update ban ghi
			$this->modelUpdate();
			//quay tro lai trang Ncc
			header("location:index.php?controller=ncc");
		}
		public function create(){
			//tao bien $action de biet duoc khi an nut submit thi trang se submit den dau
			$action = "index.php?controller=ncc&action=createPost";
			//goi view, truyen du lieu ra view
			$this->loadView("NccFormView.php",["action"=>$action]);
		}
		public function createPost(){
			//goi ham modelCreate de update ban ghi
			$this->modelCreate();
			//quay tro lai trang Ncc
			header("location:index.php?controller=ncc");
		}
		public function delete(){
			$id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
			//goi ham modelDelete
			$this->modelDelete();
			//quay tro lai trang Ncc
			header("location:index.php?controller=ncc");
		}
	}
 ?>