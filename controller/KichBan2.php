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
        $_SESSION['StoreCase2'] = [];            
        require('./model/ResponseCase2.php');
        $result = (new ResponseCase2())->layCacBieuHien();
        $moDau = "Xin chào, Hãy nhập vào biểu hiện của trẻ để được đưa ra những giải pháp tham khảo cho bé </br>";
        foreach($result as $each1) {
            $moDau .= $each1[0]. " " . $each1[1] . "</br>";
        }
        $_SESSION['StoreCase2'][] = $moDau;
        require('./view/KichBan2.php');
    }
    public function handleInfo($info){
        if($info == '') {
            $_SESSION['StoreCase2'][] = "...";
            $traLoi = "Thông tin nhập vào đang bị trống, anh chị nhập lại thông tin để hệ thống
            đưa ra kết quả chính xác nhất.";
            $_SESSION['StoreCase2'][] = $traLoi;
            require('./view/KichBan2.php');
        }
        else {
            $_SESSION['StoreCase2'][] = $info;
            require('./model/ResponseCase2.php');
            $result = (new ResponseCase2())->duaRaPhuongPhap($info);
            $traLoi = "Với các biểu hiện về: ". $result[1] ." thì giải pháp như sau: </br>" . $result[2]."</br>";
            $_SESSION['StoreCase2'][] = $traLoi;
            require('./view/KichBan2.php');
        }
    }
}