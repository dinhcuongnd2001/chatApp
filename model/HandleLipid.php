<!-- Hiển thị ra danh sách các chất béo  cho trẻ -->
<?php 
$sql = "select * from chatbeo";
$chatBeo = mysqli_fetch_all((new Connect)->select($sql));
$length = count($chatBeo);
$LengthShow = 4;
$i = 0;
$store = [];
$nhuCauBeo = "";
while($i < $LengthShow) {
    $indexRandom = rand(0, $length-1);
    if(!in_array($indexRandom, $store)){
        $store[] = $indexRandom;
        $nhuCauBeo .= "+) ".$chatBeo[$indexRandom][1]." (".$chatBeo[$indexRandom][2].")</br>";
        $i += 1;
    }
}
$nhuCauBeo .="...</br>";