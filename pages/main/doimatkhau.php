<?php
    if(isset($_POST['doimatkhau'])){
        $matkhau_cu = md5($_POST['password_cu']);
        $matkhau_moi = md5($_POST['password_moi']);
        $matkhau_moi2 = md5($_POST['password_moi2']);
        $sql = "SELECT * FROM tbl_dangky WHERE matkhau='".$matkhau_cu."' LIMIT 1 ";
        $row = mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);
        if($count>0){
            if($matkhau_moi != $matkhau_moi2){
            echo '<p style = "color:red">Mật khẩu mới và nhập lại mật khẩu không khớp</p>';
            }else{
                $sql_update = mysqli_query($mysqli,"UPDATE tbl_dangky SET matkhau='".$matkhau_moi."'");
                echo '<p style = "color:green">Mật khẩu đã được thay đổi!</p>';
            }
            
         }else{
            echo '<p style = "color:red">Mật khẩu cũ bạn vừa nhập không chính xác, vui lòng nhập lại</p>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doi mat khau</title>
</head>
<body>
<div class="wrapper-login">
        <form action="" autocomplete="off" method="POST">
            <table border="1" class="table-login" style="text-align: center; border-collapse:collapse">
                <tr>
                    <td colspan="2"><h3>Đổi mật khẩu</h3></td>
                </tr>
                <tr>
                    <td>Mật khẩu cũ:</td>
                    <td><input type="text" name="password_cu"></td>
                </tr>
                <tr>
                <td>Mật khẩu mới:</td>
                    <td><input type="text" name="password_moi"></td>
                </tr>
                <td>Nhập lại mật khẩu mới:</td>
                    <td><input type="text" name="password_moi2"></td>
                </tr>
                    <td colspan="2"><input type="submit" name="doimatkhau" value="Thay đổi"></td>
                </tr>
            </table>
        </form>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</body>
</html>