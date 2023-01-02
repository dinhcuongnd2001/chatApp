<?php
    session_start();
    require_once('./model/Connect.php');
class KichBan1
{
    public function index(){
        if(isset($_SESSION['StoreCase1'])){
            unset($_SESSION['StoreCase1']);
        }
        require('./view/KichBan1.php');
    } 

    
    public function handleInfo($info){
        include("./model/ChildrenInfo.php");
        require('./model/ObjectInfo.php');
        $value = explode(',',$info );
        $gender = trim($value[0]);
        $month = floatval(trim($value[1]));
        $weigth = floatval(trim($value[2]));
        $high = floatval(trim($value[3]));
        $children = (new ChildrenInfo($gender, $month, $weigth, $high));
        $children->setBMI();
        $current_BMI = $children->getBMI();
        // Kiểm tra thể trạng của trẻ:
        $sql = "select * from thongtincoban where gioiTinh like '%$gender%' and tuoi = '$month'";
        $result = mysqli_fetch_array((new Connect)->select($sql)); 
        // Luu thong tin chuan cua tre theo dung gioit tinh va tuoi
        $baseInfo = (new ClassObject($result));

        if($current_BMI <= $result['BMI_SDD3']) {
            $children->setTheTrang("SDD3");
        } else if($current_BMI <= $result['BMI_SDD2']) {
            $children->setTheTrang('SDD2');
        } else if($current_BMI <= $result['BMI_SDD1']){
            $children->setTheTrang('SDD1');   
        }else if($current_BMI < $result['BMI_BP1']){
            $children->setTheTrang('BT');   
        }else if($current_BMI < $result['BMI_BP2']){
            $children->setTheTrang('BP1');   
        }else if($current_BMI < $result['BMI_BP3']){
            $children->setTheTrang('BP2');   
        } else{
            $children->setTheTrang('BP3');
        }
        $_SESSION['StoreCase1'][] = $info;
        $_SESSION['children'] = $children;
        require('./model/ReponseCase1.php');
        require('./view/KichBan1.php');
    }
}