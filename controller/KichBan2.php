<!-- Kịch bản 2 dùng để xử lý các biểu hiện liên quan đến các triệu chứng bệnh -->
<?php
    // session_start();
    require_once('./model/Connect.php');
class kichBan2
{
    public function index(){
        if(isset($_SESSION['StoreCase2'])) {
            unset($_SESSION['StoreCase2']);
        }
        require('./view/KichBan2.php');
    }
    public function handleInfo($info){
        if($info == '') {
            $_SESSION['StoreCase2'][] = "...";
            $traLoi = "Thông tin nhập vào đang bị trống, anh chị nhập lại thông tin để hệ thống
            đưa ra kết quả chính xác nhất.";
            $_SESSION['StoreCase2'][] = $traLoi;
        }
        else {
            $_SESSION['StoreCase2'][] = $info;
            require('./model/ResponseCase2.php');
        }
        require('./view/KichBan2.php');
    }
}