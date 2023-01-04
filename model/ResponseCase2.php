<?php 

class ResponseCase2 {
    public function layCacBieuHien() {
        $sql = "select * from kichBan2";
        $result = mysqli_fetch_all((new Connect)->select($sql));
        return $result;
    }

    public function duaRaPhuongPhap($info) {
        $sql = "select * from kichBan2 where id = '$info'";
        $result = mysqli_fetch_array((new Connect)->select($sql));
        return $result;
    }

}
// $sql = "select * from kichBan2 where bieuHien like N'%$info%'";
// $result = mysqli_fetch_all((new Connect)->select($sql));
// // xử lý trường hợp nếu biểu hiện đã có trong dữ liệu thì thực hiện hiển thị ra,
// // nếu chưa có thì thêm vào db phục vụ việc tiếp tục tìm kiếm sau này.
// $traLoi = "";
// if(count($result)){
//     foreach($result as $each) {
//         $traLoi .= "--Với các biểu hiện về: ". $each[1] ." thì giải pháp như sau: </br>" . $each[2]."</br>";
//     }
// } else {
//     // Nếu dữ liệu ko được tìm thấy thì hiện tượng mới sẽ được thêm vào bộ dữ liệu để nghiên cứu thêm.
//     $sql = "INSERT INTO `kichban2`(`bieuHien`, `giaiPhap`) VALUES ('$info', '')";
//     (new Connect)->excute($sql);
//     $traLoi = "Hiện tại thì hệ thống chưa có thông tin về những biểu hiện này, mong anh chị
//     đến cơ sở y tế gần nhất để được tư vấn kỹ hơn.";
    
// }
// $_SESSION['StoreCase2'][] = $traLoi;