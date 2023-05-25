<?php 
	trait CategoriesModel{
		public function modelRead($recordPerPage){
			$page = isset($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"]-1 : 0;
			$from = $page * $recordPerPage;
			$conn = Connection::getInstance();
			$query = $conn->query("select * from categories order by id desc limit $from, $recordPerPage");
			return $query->fetchAll();
		}
		public function modelTotalRecord(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from categories ");
			return $query->rowCount();
		}
		public function modelGetRecord($id){
			$conn = Connection::getInstance();
			$query = $conn->prepare("select * from categories where id = :var_id");
			$query->execute(["var_id"=>$id]);
			return $query->fetch();
		}
		public function modelUpdate($id){
			$name = $_POST["name"];
			$content = $_POST["content"];
			$conn = Connection::getInstance();
			$query = $conn->prepare("update categories set name = :var_name, content = :var_content where id = :var_id");
			$query->execute(["var_name"=>$name,"var_content"=>$content,"var_id"=>$id]);

			$photo = "";
			if($_FILES['photo']['name'] != ""){
				$oldPhoto = $conn->query("select photo from categories where id=$id");
				if($oldPhoto->rowCount() > 0){
					$record = $oldPhoto->fetch();
					if($record->photo != "" && file_exists("../assets/upload/products/".$record->photo)){
						unlink("../assets/upload/products/".$record->photo);
					}
				}
				$photo = time()."_".$_FILES['photo']['name'];
				move_uploaded_file($_FILES['photo']['tmp_name'], "../assets/upload/products/$photo");
				$query = $conn->prepare("update categories set photo=:var_photo where id=:var_id");
				$query->execute(["var_photo"=>$photo,"var_id"=>$id]);
			}
			$anh = "";
			if($_FILES['anh']['name'] != ""){
				$oldAnh = $conn->query("select anh from categories where id=$id");
				if($oldAnh->rowCount() > 0){
					$record = $oldAnh->fetch();
					if($record->anh != "" && file_exists("../assets/upload/products/".$record->anh)){
						unlink("../assets/upload/products/".$record->anh);
					}
				}
				$anh = time()."_".$_FILES['anh']['name'];
				move_uploaded_file($_FILES['anh']['tmp_name'], "../assets/upload/products/$anh");
				$query = $conn->prepare("update categories set anh=:var_anh where id=:var_id");
				$query->execute(["var_anh"=>$anh,"var_id"=>$id]);
			}
		}
		public function modelCreate(){
			$name = $_POST["name"];
			$content = $_POST["content"];
			$photo = "";
			if($_FILES['photo']['name'] != ""){
				$photo = time()."_".$_FILES['photo']['name'];
				move_uploaded_file($_FILES['photo']['tmp_name'], "../assets/upload/products/$photo");
			}
			$anh = "";
			if($_FILES['anh']['name'] != ""){
				$anh = time()."_".$_FILES['anh']['name'];
				move_uploaded_file($_FILES['anh']['tmp_name'], "../assets/upload/products/$anh");
			}
			$conn = Connection::getInstance();
			$query = $conn->prepare("insert into categories set name=:var_name,photo=:var_photo,anh=:var_anh,content=:var_content");
			$query->execute(["var_name"=>$name,"var_photo"=>$photo,"var_anh"=>$anh,"var_content"=>$content]);
			header("location:index.php?controller=categories");
		}
		public function modelDelete($id){
			$conn = Connection::getInstance();
			$query = $conn->prepare("delete from categories where id = :var_id");
			$query->execute(["var_id"=>$id]);
		}
	}
 ?>