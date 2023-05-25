<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../assets/admin/layout1/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/admin/layout1/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/admin/layout1/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../assets/admin/layout1/css/_all-skins.min.css">
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- load file ckeditor vao day -->
    <script type="text/javascript" src="../assets/admin/ckeditor/ckeditor.js"></script>
    <style type="text/css">
        .panel{
            border-color:   #008B8B;
        }
        .panel-primary>.panel-heading{
            background-color: #008B8B;
        }
        .content{
            height: 2000px;
        }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" style="background: f2d5ba;">

    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Trang quản trị</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="hidden-xs">Hello: <?php echo $_SESSION["email"]; ?></span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar" >
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" >
            <!-- Sidebar user panel -->

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree" style="margin-top: 30px;">
                

                <li>
                    <a href="index.php?controller=categories">
                        <i style="font-size: 16px; margin-right:5px;" class="	fas fa-list"></i>  <span style="font-size: 16px;"> Danh mục đồ uống</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?controller=products">
                        <i style="font-size: 16px; margin-right:5px;" class="	far fa-newspaper"></i>  <span style="font-size: 16px;"> Danh sách đồ uống</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?controller=users">
                        <i style="font-size: 16px; margin-right:5px;" class="fas fa-user"></i>  <span style="font-size: 16px;"> Quản lý nhân viên</span>
                    </a>
                </li>
                
                <li>
                    <a href="index.php?controller=news">
                        <i style="font-size: 16px; margin-right:5px;" class="fas fa-bell"></i>  <span style="font-size: 16px;"> Quản lý Tin Tức</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?controller=banners">
                        <i style="font-size: 16px; margin-right:5px;" class="fas fa-image"></i>  <span style="font-size: 16px;"> Quản lý Banner</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?controller=ncc">
                        <i style="font-size: 16px; margin-right:5px;" class="fas fa-address-book"></i>  <span style="font-size: 16px;"> Nhà cung cấp</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?controller=orders">
                        <i style="font-size: 16px; margin-right:5px;" class="fas fa-shopping-cart"></i>  <span style="font-size: 16px;"> Quản lý Đơn hàng</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?controller=doanhthu">
                        <i style="font-size: 16px; margin-right:5px;" class="fas fa-dollar-sign"></i>  <span style="font-size: 16px;"> Doanh thu</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?controller=login&action=logout">
                        <i></i>    <span style="font-size: 16px;">Đăng xuất</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content">
            <?php echo $this->view; ?>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../assets/admin/layout1/js/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets/admin/layout1/js/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../assets/admin/layout1/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/admin/layout1/js/adminlte.min.js"></script>
</body>
</html>
