<?php 
	trait NccModel{
		//lay ve danh sach cac ban ghi
		public function modelRead($recordPerPage){
			//lay bien page truyen tu url
			$page = isset($_GET["p"]) && $_GET["p"] > 0 ? ($_GET["p"] - 1) : 0;
			//lay tu ban ghi nao
			$from = $page * $recordPerPage;
			//---
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//thuc hien truy van
			$query = $db->query("select * from ncc order by id desc limit $from,$recordPerPage");
			//tra ve nhieu ban ghi
			return $query->fetchAll();
		}
		//tinh tong cac ban ghi
		public function modelTotalRecord(){
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//thuc hien truy van
			$query = $db->query("select * from ncc");
			//tra ve so luong ban ghi
			return $query->rowCount();
		}
		//lay mot ban ghi tuong ung voi id truyen vao
		public function modelGetRecord(){
			$id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//chuan bi truy van
			$query = $db->prepare("select * from ncc where id=:var_id");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_id"=>$id]);
			//tra ve mot ban ghi
			return $query->fetch();
		}
		public function modelUpdate(){
			$id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
			$name = $_POST["name"];
			$email = $_POST["email"];
			$phone = $_POST["phone"];
			$address = $_POST["address"];
			$content = $_POST["content"];
			//update cot name
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//chuan bi truy van
			$query = $db->prepare("update ncc set name = :var_name, content = :var_content, email = :var_email,phone = :var_phone, address = :var_address where id=:var_id");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_id"=>$id,"var_name"=>$name,"var_content"=>$content,"var_phone"=>$phone,"var_email"=>$email,"var_address"=>$address]);	
			//---
			//neu user upload anh thi thuc hien upload
			$photo = "";
			if($_FILES['photo']['name'] != ""){
				//---
				//lay anh de xoa
				$oldPhoto = $db->query("select photo from ncc where id=$id");
				if($oldPhoto->rowCount() > 0){
					$record = $oldPhoto->fetch();
					//xoa anh
					if($record->photo != "" && file_exists("../assets/upload/ncc/".$record->photo))
						unlink("../assets/upload/ncc/".$record->photo);
				}
				//---
				$photo = time()."_".$_FILES['photo']['name'];
				move_uploaded_file($_FILES['photo']['tmp_name'], "../assets/upload/ncc/$photo");
				$query = $db->prepare("update ncc set photo=:var_photo where id=$id");
				$query->execute(['var_photo'=>$photo]);
			}
			//---
		}
		public function modelCreate(){
			$name = $_POST["name"];
			$email = $_POST["email"];
			$phone = $_POST["phone"];
			$address = $_POST["address"];
			$content = $_POST["content"];
			//---
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//neu user upload anh thi thuc hien upload
			$photo = "";
			if($_FILES['photo']['name'] != ""){
				$photo = time()."_".$_FILES['photo']['name'];
				move_uploaded_file($_FILES['photo']['tmp_name'], "../assets/upload/ncc/$photo");
			}
			//---			
			//chuan bi truy van
			$query = $db->prepare("insert into ncc set name = :var_name, content = :var_content,email = :var_email,phone = :var_phone, address = :var_address,photo = :var_photo");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_name"=>$name,"var_content"=>$content,"var_photo"=>$photo,"var_phone"=>$phone,"var_email"=>$email,"var_address"=>$address]);	
			
		}
		public function modelDelete(){
			$id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//---
			//lay anh de xoa
			$oldPhoto = $db->query("select photo from ncc where id=$id");
			if($oldPhoto->rowCount() > 0){
				$record = $oldPhoto->fetch();
				//xoa anh
				if($record->photo != "" && file_exists("../assets/upload/ncc/".$record->photo))
					unlink("../assets/upload/ncc/".$record->photo);
			}
			//---
			//chuan bi truy van
			$query = $db->prepare("delete from ncc where id=:var_id");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_id"=>$id]);
		}
	}
 ?>