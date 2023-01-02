<!-- Hiển thị ra danh sách các tinh bột cho trẻ -->
<?php 
$sql = "select * from tinhbot";
$tinhBot = mysqli_fetch_all((new Connect)->select($sql));
$length = count($tinhBot);
$LengthShow = 4;
$i = 0;
$store = [];
$nhuCauTinhBot = "";
while($i < $LengthShow) {
    $indexRandom = rand(0, $length-1);
    if(!in_array($indexRandom, $store)){
        $store[] = $indexRandom;
        $nhuCauTinhBot .= "+) ".$tinhBot[$indexRandom][1]." (".$tinhBot[$indexRandom][2].")</br>";
        $i += 1;
    }
}
$nhuCauTinhBot .="...</br>";