<?php
    if(!isset($_SESSION['StoreCase2'])) {
        $_SESSION['StoreCase2'] = ["Xin chào, Hãy nhập vào biểu hiện của trẻ để được đưa ra những giải pháp tham khảo cho bé"];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/kichBan1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Red+Hat+Display:wght@300&family=Roboto:wght@300;500&display=swap"
        rel="stylesheet">
    <title>KickBan2</title>
</head>

<body>
    <div class="main">
        <div class="nav">
            <p class="select">Bạn muốn tư vấn về</p>
            <ul>
                <li class="btn-select">
                    <a href="?kichBan=kichBan1">Chế độ dinh dưỡng</a>
                </li>
                <li class="btn-select">
                    <a href="?kichBan=kichBan2">Biểu hiện bệnh</a>
                </li>
            </ul>
        </div>
        <div class="border-chat">
            <div class="formChat">
                <?php foreach($_SESSION['StoreCase2'] as $each) { ?>
                <div class="sentence">
                    <p class="text"><?php echo($each) ?></p>
                </div>
                <?php }?>
            </div>
            <form class="form" action='?kichBan=kichBan2&action=guiThongTin' method="POST">
                <input class="input" name="info" type="text" placeholder="Aa">
                <button class="btn">SEND</button>
            </form>
        </div>
    </div>
</body>

</html>