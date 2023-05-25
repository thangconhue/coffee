<?php 
	trait DoanhthuModel{
		public function modelRead($recordPerPage){
			$page = isset($_GET["p"]) && $_GET["p"] > 0 ? ($_GET["p"] - 1) : 0;
			$from = $page * $recordPerPage;
			$db = Connection::getInstance();
			$query = $db->query("select * from news order by id desc limit $from,$recordPerPage");
			return $query->fetchAll();
		}
        public function modelTongdt(){
            $db = Connection::getInstance();
			$query = $db->query("select price from orders where status = 3 and date = curdate()");
            return $query->fetchAll();
		}
        public function modelHuy(){
            $db = Connection::getInstance();
			$query = $db->query("select price from orders where status = 4 and date = curdate()");
            return $query->fetchAll();
		}
		public function tongdt(){
			$from = isset($_GET["from"]) ? $_GET["from"] : "";
			$to = isset($_GET["to"]) ? $_GET["to"] : "";
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from orders where date between '$from' and  '$to' and status = 3");
			//tra ve nhieu ban ghi
			return $query->fetchAll();
		}
	}
 ?>