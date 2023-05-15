<?php 
require '../config.php';
require '../model/connectdb.php';
require '../bootstrap.php';
session_start();

//Nếu tồn tại giá trị của phần tử có key là c thì trả về giá trị đó, ngược lại trả về home
$c = $_GET['c'] ?? 'home';
$a = $_GET['a'] ?? 'index';
$controller = ucfirst($c). 'Controller';//StudentController
require 'controller/'.$controller.'.php';//controller/StudentController.php
$controller = new $controller();
$controller->$a();//Gọi hàm index() của đối tượng StudentController
?>