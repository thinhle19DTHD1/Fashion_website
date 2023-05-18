<?php
    if(isset($_POST['dangnhap'])){
        $dienthoai = $_POST['dienthoai'];
        $matkhau = md5($_POST['password']);
        $sql = "SELECT * FROM tbl_dangky WHERE dienthoai='".$dienthoai."' AND matkhau='".$matkhau."' LIMIT 1 ";
        $row = mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);
        if($count>0){
            $row_data = mysqli_fetch_array($row);
            $_SESSION['dangky'] = $row_data['tenkhachhang'];
            header("Location: index.php?quanly=giohang");
        }else{
            echo '<p style="color:red">Số điện thoại hoặc mật khẩu không đúng, vui lòng đăng nhập lại</p>';
        }
    }
?>
<form action="" autocomplete="off" method="POST">
            <table border="1" width="50%" class="table-login" style="text-align: center; border-collapse:collapse">
                <tr>
                    <td colspan="2"><h3>Đăng nhập khách hàng</h3></td>
                </tr>
                <tr>
                    <td>Số điện thoại:</td>
                    <td><input type="text" size="50" name="dienthoai" placeholder="Số điện thoại..."></td>
                </tr>
                <tr>
                <td>Mật khẩu:</td>
                    <td><input type="password" size="50" name="password" placeholder="Mật khẩu..."></td>
                </tr>
                    <td colspan="2"><input type="submit" name="dangnhap" value="Đăng nhập"></td>
                </tr>
            </table>
        </form>