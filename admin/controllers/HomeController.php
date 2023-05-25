<?php 
	class HomeController extends Controller{
		//ham tao la ham duoc tu dong goi dau tien khi khoi tao class
		public function __construct(){
			//kiem tra xem user da dang nhap chua
			$this->authentication();//ham nay trong file Controller.php
		}
		public function index(){
			//load view
			$this->loadView("HomeView.php");
		}
	}
 ?>