<?php
require 'controller/Controller.php';
require 'controller/KichBan1.php';
require 'controller/KichBan2.php';
$action = $_GET['action'] ?? '';
$kichBan = $_GET['kichBan'] ?? '';
switch ($kichBan) {
    case "" :
        (new Controller())->index();
        break;
    case "kichBan1": 
        switch ($action) {
            case "" :
                (new KichBan1())->index();
                break;
            case "guiThongTin":
                (new KichBan1())->handleInfo();
                break;
            default:
                echo("Hanh Dong Khong hop le");
        }
        break;
    case "kichBan2":
        switch ($action) {
            case "":
                (new kichBan2())->index();
                break;
            case "guiThongTin":
                $info = $_POST['info'];
                (new kichBan2())->handleInfo($info);
                break;
            default:
                echo("Hanh Dong Khong Hop Le");
        }
        break;
    default:
        echo("Kich Ban Khong hop le");
}