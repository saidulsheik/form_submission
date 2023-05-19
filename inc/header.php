<?php 
    require "./config/config.php"; 
    require "./lib/Database.php"; 
    require "./helpers/Format.php"; 
    require "./lib/Session.php";  
    Session::checkSession(); 
    $db = new Database(); 
    $fm = new Format();
  if(isset($_GET['action'])){
    $action =  $_GET['action'];
  }

  if(isset($_GET['action']) && $_GET['action']=="logout"){
        Session::destroy();
  }

  if(isset($_GET['action']) && $_GET['action']=="add_receipt"){
    header("Location:{$action}.php");
  }
  
  if(isset($_GET['action']) && $_GET['action']=="receipt_report"){
    header("Location:{$action}.php");
  }

  
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo URL; ?>/assets/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo URL; ?>/assets/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <!--link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css"-->
        <!-- jvectormap -->
        <link rel="stylesheet" href="<?php echo URL; ?>/assets/css/jquery-jvectormap.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo URL; ?>/assets/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo URL; ?>/assets/css/_all-skins.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="<?php echo URL; ?>/assets/css/_all-skins.min.css">
        <link rel="stylesheet" href="<?php echo URL; ?>/assets/css/fontcss.css">
        <script src="<?php echo URL; ?>/assets/js/jquery.min.js"></script>
        <script src="<?php echo URL; ?>/assets/js/bootstrap-tagsinput.js"></script>
        <style>
        .no-arrow::-webkit-inner-spin-button,
        .no-arrow::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .no-arrow {
            -moz-appearance: textfield;
        }


        .bootstrap-tagsinput {
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            display: block;
            padding: 4px 6px;
            color: #555;
            vertical-align: middle;
            border-radius: 4px;
            max-width: 100%;
            line-height: 22px;
            cursor: text;
        }

        .bootstrap-tagsinput input {
            border: none;
            box-shadow: none;
            outline: none;
            background-color: transparent;
            padding: 0 6px;
            margin: 0;
            width: auto;
            max-width: inherit;
        }


        .bootstrap-tagsinput .tag [data-role="remove"] {
            margin-left: 8px;
            cursor: pointer;
        }

        .bootstrap-tagsinput .tag [data-role="remove"]:after {
            content: "x";
            padding: 0px 2px;
        }

        .bootstrap-tagsinput .tag [data-role="remove"]:hover {
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .bootstrap-tagsinput .tag [data-role="remove"]:hover:active {
            box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
        }

        input {
            width: 96%;
            padding: 0 2%;
        }

        .error {
            color: red;
        }

        </style>
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">

                <!-- Logo -->
                <a href="<?php echo URL; ?>index.php" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>X</b>S</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Xpeed</b>Studio</span>
                </a>

                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="hidden-xs">Saidul Islam Sheik</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="?action=logout" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>

                </nav>
            </header>
