<!-- Hiển thị ra danh sách các chất đạm cho trẻ -->
<?php 
$sql = "select * from chatdam";
$chatDam = mysqli_fetch_all((new Connect)->select($sql));
$length = count($chatDam);
$LengthShow = 4;
$i = 0;
$store = [];
$nhuCauDam = "";
while($i < $LengthShow) {
    $indexRandom = rand(0, $length-1);
    if(!in_array($indexRandom, $store)){
        $store[] = $indexRandom;
        $nhuCauDam .= "+) ".$chatDam[$indexRandom][1]." (".$chatDam[$indexRandom][2].")</br>";
        $i += 1;
    }
}
$nhuCauDam .="...</br>";