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
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Red+Hat+Display:wght@300&family=Roboto:wght@300;500&display=swap"
        rel="stylesheet">
    <title>KickBan1</title>
</head>

<body>
    <div class="main">
        <div class="nav">
            <p class="select ">Bạn muốn tư vấn về</p>
            <ul>
                <li class="btn-select"><a href="?kichBan=kichBan1">Chế độ dinh dưỡng</a></li>
                <li class="btn-select"><a href="?kichBan=kichBan2">Biểu hiện bệnh</a></li>
            </ul>
        </div>
        <div class="border-chat">
            <div class="formChat">
                <?php foreach($_SESSION['StoreCase1'] as $each) { ?>
                <div class="sentence">
                    <p class="text"><?php echo($each) ?></p>
                </div>
                <?php }?>
            </div>
            <form class="form" action='?kichBan=kichBan1&action=guiThongTin' method="POST">
                <input class="input" name="info" type="text" placeholder="Aa">
                <button class="btn">SEND</button>
            </form>
        </div>
    </div>
</body>

</html>