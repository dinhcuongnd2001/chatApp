<?php
    session_start();
    // unset($_SESSION['StoreCase1']);
    require_once('./model/Connect.php');
class KichBan1
{
    public function index(){
        if(isset($_SESSION['StoreCase1'])){
            unset($_SESSION['StoreCase1']);
        }
        require('./view/KichBan11.php');
    } 

    
    public function handleInfo(){
        include("./model/ChildrenInfo.php");
        require('./model/ObjectInfo.php');
        // $value = explode(',',$info );
        $gender = $_POST['gender'];
        $month = $_POST['month'];
        $weight =  $_POST['weight'];
        $high =  $_POST['high'];
        $children = (new ChildrenInfo($gender, $month, $weight, $high));
        $children->setBMI();
        $current_BMI = $children->getBMI();
        // Kiểm tra thể trạng của trẻ:
        $sql = "select * from thongtincoban where gioiTinh like '%$gender%' and tuoi = '$month'";
        $result = mysqli_fetch_array((new Connect)->select($sql)); 
        // Luu thong tin chuan cua tre theo dung gioit tinh va tuoi
        if(isset($result)){
            if($current_BMI <= $result['BMI_SDD3']) {
                $children->setTheTrang("SDD3");
            } else if($current_BMI <= $result['BMI_SDD2']) {
                $children->setTheTrang('SDD2');
            } else if($current_BMI <= $result['BMI_SDD1']){
                $children->setTheTrang('SDD1');   
            }else if($current_BMI < $result['BMI_BP1']){
                $children->setTheTrang('TB');   
            }else if($current_BMI < $result['BMI_BP2']){
                $children->setTheTrang('BP1');   
            }else if($current_BMI < $result['BMI_BP3']){
                $children->setTheTrang('BP2');   
            } else{
                $children->setTheTrang('BP3');
            }
            $_SESSION['StoreCase1'][] = $gender;
            $_SESSION['StoreCase1'][] = $month;
            $_SESSION['StoreCase1'][] = $weight;
            $_SESSION['StoreCase1'][] = $high;

            require('./model/ReponseCase1.php');
            require('./view/KichBan11.php');
        }
    }
}