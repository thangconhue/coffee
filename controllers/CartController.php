<?php 
	include "models/CartModel.php";

	class CartController extends Controller{
		use CartModel;
		
		public function __construct(){
			//kiem tra neu gio hang chua ton tai thi khoi tao no
			if(isset($_SESSION["cart"]) == false)
				$_SESSION['cart'] = array();
		}
		//hien thi danh sach cac san pham trong gio hang
		public function index(){
			$this->loadView("CartView.php");
		}
		//them san pham vao gio hang
		public function create(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			//goi ham trong model de them phan tu vao gio hang
			$this->cartAdd($id);
			header("location:index.php?controller=cart");
		}
		//xoa san pham khoi gio hang
		public function delete(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			//goi ham trong model de xoa phan tu khoi gio hang
			$this->cartDelete($id);
			header("location:index.php?controller=cart");
		}
		//xoa tat ca cac san pham khoi gio hang
		public function destroy(){
			//goi ham trong model
			$this->cartDestroy();
			header("location:index.php?controller=cart");
		}
		//cap nhat so luong san pham trong gio hang
		public function update(){
			foreach($_SESSION['cart'] as $product){
				$name = "product_".$product["id"];
				$number = $_POST[$name];
				$this->cartUpdate($product["id"],$number);
			}
			header("location:index.php?controller=cart");
		}
		//thanh toan gio hang
		public function checkout(){
			//kiem tra neu user chua dang nhap thi yeu cau dang nhap
			if(isset($_SESSION['customer_email']) == false)
				header("location:index.php?controller=account&action=login");
			else{
				//goi ham cartCheckout trong model
				$conn = Connection::getInstance();			
			//lay id vua moi insert
			$ht = isset($_POST["ht1"]) ? 1 : 0;
			$customer_id = $_SESSION["customer_id"];
			//---
			//---
			//insert ban ghi vao orders, lay order_id vua moi insert
			//lay tong gia cua gio hang
			$price = $this->cartTotal();
			$query = $conn->prepare("insert into orders set customer_id=:customer_id, date=now(),price=:price, hinhthuc=:ht1");
			$query->execute(array("customer_id"=>$customer_id,"price"=>$price,"ht1"=>$ht));
			//lay id vua moi insert
			$order_id = $conn->lastInsertId();
			//---
			//duyet cac ban ghi trong session array de insert vao orderdetails
			foreach($_SESSION["cart"] as $product){
				$query = $conn->prepare("insert into orderdetails set order_id=:order_id, product_id=:product_id, price=:price, quantity=:quantity");
				$query->execute(array("order_id"=>$order_id,"product_id"=>$product["id"],"price"=>$product["price"],"quantity"=>$product["number"]));
				$a = $product["number"];
				$query = $conn->prepare("update products set sl = sl - $a where id =:var_id");
				$query->execute(array("var_id"=>$product["id"]));
			}
			//xoa gio hang
			unset($_SESSION["cart"]);
			header("location:index.php?controller=cart&notify=order-success");
			}
		}
	}
 ?>