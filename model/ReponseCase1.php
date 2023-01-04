<!-- Xu ly du lieu khi nhap thong tin vao -->
<?php 
$sql = "select * from nhucaunangluong";
$nhuCauNangLuong = mysqli_fetch_all((new Connect)->select($sql));
// var_dump($nhuCauNangLuong);
// var_dump($_SESSION);
$BMI = $children->getBMI();
$theTrang = $children->getTheTrang();
$thangTuoi = $children->getThangTuoi();

foreach($nhuCauNangLuong as $each){
    if($each[1] >= $thangTuoi && $each[2] <= $thangTuoi) {
        // năng lượng tăng theo mỗi tháng từ tháng nhỏ nhất;
        $nangLuongTheoMoiThang = $each[3]/$each[1];
        // Năng lượng của một trẻ có tháng tuổi cần tính ở thể trạng
        // trung bình là:
        $nangLuong = $nangLuongTheoMoiThang*$thangTuoi;
        // Xử lý thông tin năng lượng
        // tùy theo thể trạng nên mức năng lượng của các trẻ sẽ khác nhau.
        // Nếu thể trạng của trẻ ở mức SDD3: thì năng lượng tăng lên 1.3 theo mức chuẩn,
        // Tương tự SDD2: năng lượng tăng 1.2
        // Tương tự SDD1: Năng lượng tăng 1.1
        // Mức trung bình giữ nguyên
        // Mức BP1: Giảm 0.1 (*0.9)
        // Mức BP2: Giảm 0.2 (*0.8)
        // Mức BP3: Giảm 0.3 (*0.7)
        if($theTrang == "SDD3"){
            $nangLuong *= 1.3;
        }
        else if($theTrang == "SDD2") {
            $nangLuong *= 1.2;
        }
        else if($theTrang == "SDD1") {
            $nangLuong *= 1.1;
        }
        else if($theTrang == "BP1") {
            $nangLuong *= 0.9;
        }
        else if($theTrang == "BP2") {
            $nangLuong *= 0.8;
        }
        else if($theTrang == "BP3") {
            $nangLuong *= 0.7;
        }
        $nangLuong = round($nangLuong * 1000) / 1000;
        $nangLuongChoChatDam = round($nangLuong * 15 * 10) / 1000;
        $nangLuongchoChatBeo = round($nangLuong * 25 * 10) / 1000;
        $nangLuongChoTinhBot = round($nangLuong * 60 * 10) / 1000;
        break;
    }
}
// Đưa ra giải pháp theo thể trạng:
$sql = "select * from giaiphaptheothetrang where theTrang like '%$theTrang%'";
$giaiPhap = mysqli_fetch_array((new Connect())->select($sql)) ;
// Xây dựng câu trả lời theo thể trạng
$traLoi = "Theo thông tin nhập vào, </br> Trẻ có chỉ số BMI = $BMI thuộc thể trạng $theTrang </br>";
$traLoi .= $giaiPhap[2];
$traLoi .= "</br> Anh Chị có thể tham khảo năng lượng và khẩu phần ăn cho trẻ như ở dưới đây</br>";
$traLoi .= "Năng lượng cần cho bé nhà bạn là $nangLuong kcal chia thành các khẩu phần như sau:</br>";
require('./model/HandleProtein.php');
$traLoi .= "- Năng lượng cho chất đạm là: $nangLuongChoChatDam Kcal :</br> $nhuCauDam";
require('./model/HandleLipid.php');
$traLoi .=  "- Năng lượng cho chất béo là: $nangLuongchoChatBeo Kcal :</br> $nhuCauBeo" ;
require('./model/HandleStarch.php');
$traLoi .= "- Năng lượng cho tinh bột là: $nangLuongChoTinhBot Kcal :</br> $nhuCauTinhBot";
// $_SESSION['StoreCase1'][] = $traLoi;