<?php 
    if(isset($_GET['res'])) {
        $res = $_GET['res'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/main.css">
    <title>Document</title>
</head>

<body>
    <div class="content">
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
        <div class="main">
            <form action="./?kichBan=kichBan1&action=guiThongTin" method="POST" class="form" id="form-1">
                <h3 class="heading">Tư vấn dinh dưỡng</h3>
                <p class="desc"> Để trẻ có một cuộc sống khỏe mạnh ❤️</p>

                <div class="spacer"></div>

                <div class="form-group">
                    <label for="gender" class="form-label">Giới tính</label>
                    <input
                        value="<?php if(isset($_GET['res']) && isset($_SESSION['StoreCase1'][0])) echo $_SESSION['StoreCase1'][0] ?>"
                        id="gender" name="gender" type="text" placeholder="Nam/Nữ" class="form-control">
                    <span class="form-message"></span>
                </div>

                <div class="form-group">
                    <label for="month" class="form-label">Tháng tuổi</label>
                    <input
                        value="<?php if(isset($_GET['res']) && isset($_SESSION['StoreCase1'][0])) echo $_SESSION['StoreCase1'][1] ?>"
                        id="month" name="month" type="text" placeholder="VD: 36" class="form-control">
                    <span class="form-message"></span>
                </div>

                <div class="form-group">
                    <label for="weight" class="form-label">Cân nặng</label>
                    <input
                        value="<?php if(isset($_GET['res']) && isset($_SESSION['StoreCase1'][0])) echo $_SESSION['StoreCase1'][2] ?>"
                        id="weight" name="weight" type="text" placeholder="Kg" class="form-control">
                    <span class="form-message"></span>
                </div>

                <div class="form-group">
                    <label for="high" class="form-label">Chiều cao</label>
                    <input
                        value="<?php if(isset($_GET['res']) && isset($_SESSION['StoreCase1'][0])) echo $_SESSION['StoreCase1'][3] ?>"
                        id="high" name="high" placeholder="Cm" type="text" class="form-control">
                    <span class="form-message"></span>
                </div>

                <button type="submit" class="form-submit">Kiểm tra</button>
            </form>

        </div>
        <div class="response">
            <h3 class="heading">Thông tin dinh dưỡng</h3>
            <?php if(isset($traLoi)){ ?>
            <p class="desc"><?php echo($traLoi) ?></p>
            <?php }?>
        </div>
    </div>

    <script src="../asset//validator.js"></script>
    <script>
    Validator({
        form: "#form-1",
        rules: [
            Validator.isRequired('#gender', 'Không để trống trường này'),
            Validator.checkGender('#gender', "Giá trị bắt buộc phải là Nam hoặc Nữ"),
            Validator.isRequired('#month', 'Không để trống trường này'),
            Validator.isMonth("#month"),
            Validator.isRequired('#weight'),
            Validator.isWeight('#weight'),
            Validator.isRequired('#high'),
            Validator.isHigh('#high'),
        ],
        onSubmit: function(data) {
            console.log(data);
        }
    });
    </script>
</body>

</html>