<?php
    // session_start();
    if(!isset($_SESSION['StoreCase1'])) {
        $_SESSION['StoreCase1'] = ["Xin chào, để đưa ra được chế độ dinh dưỡng cho trẻ, xin mời anh chị nhập vào lần lượt
        giới tính, số tháng tuổi(tháng), số cân nặng (kg), số chiều cao của trẻ (cm), ngăn cách nhau bởi dấu phấy (,)"];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/kichBan1.css">
    <title>KickBan1</title>
</head>

<body>
    <div class="main">
        <div class="formChat">
            <?php foreach($_SESSION['StoreCase1'] as $each) { ?>
            <p class="text"><?php echo($each) ?></p>
            <?php }?>
        </div>
        <form class="form" action='?kichBan=kichBan1&action=guiThongTin' method="POST">
            <input name="info" type="text" placeholder="the anwser...">
            <button class="btn">SEND</button>
        </form>
    </div>
</body>

</html>