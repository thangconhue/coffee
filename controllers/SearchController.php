<?php 
	//include file model vao day
	include "models/SearchModel.php";

	class SearchController extends Controller{
		//ke thua class SearchModel
		use SearchModel;
		
		public function name(){
			$key = isset($_GET["key"]) ? $_GET["key"] : "";
			//quy dinh so ban ghi tren mot trang
			$recordPerPage = 20;
			//tinh so trang
			$numPage = ceil($this->modelTotalRecord()/$recordPerPage);
			//lay du lieu tu model
			$data = $this->modelRead($recordPerPage);
			//goi view, truyen du lieu ra view
			$this->loadView("SearchNameView.php",["data"=>$data,"numPage"=>$numPage,"key"=>$key]);
		}
		public function price(){
			$fromPrice = isset($_GET["fromPrice"]) ? $_GET["fromPrice"] : "";
			$toPrice = isset($_GET["toPrice"]) ? $_GET["toPrice"] : "";
			//quy dinh so ban ghi tren mot trang
			$recordPerPage = 20;
			//tinh so trang
			$numPage = ceil($this->modelTotalRecordSearchPrice()/$recordPerPage);
			//lay du lieu tu model
			$data = $this->modelReadSearchPrice($recordPerPage);
			//goi view, truyen du lieu ra view
			$this->loadView("SearchPriceView.php",["data"=>$data,"numPage"=>$numPage,"fromPrice"=>$fromPrice,"toPrice"=>$toPrice]);
		}
		public function ajaxSearch(){
			//echo "<h1>Controller = SearchController, action = ajaxSearch</h1>";
			$data = $this->modelAjaxSearch();
			$strResult = "";
			foreach ($data as $rows) {
				$t = number_format($rows->price - ($rows->price * $rows->discount)/100);
				$strResult = $strResult."<li><img src='assets/upload/products/{$rows->photo}'>
                <div><a href='index.php?controller=products&action=detail&id={$rows->id}'>{$rows->name}</a>
                <span>{$t} vnđ</span></div><p><a href='index.php?controller=products&action=detail&id={$rows->id}'>chi tiết</a></p></li>";
                
			}
			echo $strResult;
		}
	}
 ?>	