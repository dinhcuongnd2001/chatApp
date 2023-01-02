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
    <title>KickBan2</title>
</head>

<body>
    <div class="main">
        <div class="formChat">
            <?php foreach($_SESSION['StoreCase2'] as $each) { ?>
            <p class="text"><?php echo($each) ?></p>
            <?php }?>
        </div>
        <form class="form" action='?kichBan=kichBan2&action=guiThongTin' method="POST">
            <input name="info" type="text" placeholder="the anwser...">
            <button class="btn">SEND</button>
        </form>
    </div>
</body>

</html>