<?php 
	trait SearchModel{
		//lay ve danh sach cac ban ghi
		public function modelRead($recordPerPage){
			$key = isset($_GET["key"]) ? $_GET["key"] : "";
			//lay bien page truyen tu url
			$page = isset($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"]-1 : 0;
			//lay tu ban ghi nao
			$from = $page * $recordPerPage;
			//---
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from products where name like '%$key%' order by id desc limit $from, $recordPerPage");
			//tra ve nhieu ban ghi
			return $query->fetchAll();
		}
		//tinh tong so ban ghi
		public function modelTotalRecord(){
			$key = isset($_GET["key"]) ? $_GET["key"] : "";
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from products where name like '%$key%'");
			//tra ve so luong ban ghi
			return $query->rowCount();
		}	
		//lay ve danh sach cac ban ghi
		public function modelReadSearchPrice($recordPerPage){
			$fromPrice = isset($_GET["fromPrice"]) ? $_GET["fromPrice"] : "";
			$toPrice = isset($_GET["toPrice"]) ? $_GET["toPrice"] : "";
			//lay bien page truyen tu url
			$page = isset($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"]-1 : 0;
			//lay tu ban ghi nao
			$from = $page * $recordPerPage;
			//---
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from products where (price - (price * discount)/100) >= $fromPrice and (price - (price * discount)/100) <= $toPrice order by id desc limit $from, $recordPerPage");
			//tra ve nhieu ban ghi
			return $query->fetchAll();
		}
		//tinh tong so ban ghi
		public function modelTotalRecordSearchPrice(){
			$fromPrice = isset($_GET["fromPrice"]) ? $_GET["fromPrice"] : "";
			$toPrice = isset($_GET["toPrice"]) ? $_GET["toPrice"] : "";
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from products where (price - (price * discount)/100) >= $fromPrice and (price - (price * discount)/100) <= $toPrice");
			//tra ve so luong ban ghi
			return $query->rowCount();
		}
		public function modelHotNews15(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from news where id = 15");
			//tra ve tat ca cac ban ghi truy van duoc
			return $query->fetchAll();
		}
		public function modelHotNews17(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from news where id = 17");
			//tra ve tat ca cac ban ghi truy van duoc
			return $query->fetchAll();
		}
		public function modelHotNews16(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from news where id = 16");
			//tra ve tat ca cac ban ghi truy van duoc
			return $query->fetchAll();
		}
		public function modelHotNews18(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from news where id = 18");
			//tra ve tat ca cac ban ghi truy van duoc
			return $query->fetchAll();
		}
		public function modelAjaxSearch(){
			$key = isset($_GET["key"]) ? $_GET["key"] : "";
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from products where name like '%$key%' limit 4");
			//tra ve tat ca ket qua
			return $query->fetchAll();
		}
	}
 ?>