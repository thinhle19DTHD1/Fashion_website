
<h3>Giỏ hàng 
<?php
  if(isset($_SESSION['dangky'])){
    echo 'Xin chào '.'<span style="color:darkblue">'.$_SESSION['dangky'].'</span>';
  } 
?>
</h3>
<?php
    if(isset($_SESSION['cart'])){
    }
?>
<table style="width:100%;text-align:center; border-collapse: collapse;" border="1">
  <tr>
    <th>Id</th>
    <th>Mã sản phẩm</th>
    <th>Tên sản phẩm</th>
    <th>Ảnh sản phẩm</th>
    <th>Số lượng</th>
    <th>Đơn giá</th>
    <th>Thành tiền</th>
    <th>Quản lý</th>



  </tr>
  <?php
    if(isset($_SESSION['cart'])){
      $i=0;
      $tongtien=0;
        foreach($_SESSION['cart'] as $cart_item){
          $thanhtien = $cart_item['soluong']*$cart_item['giasp'] ;
          $tongtien+=$thanhtien;
          $i++; 
          
  ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $cart_item['masp']; ?></td>
    <td><?php echo $cart_item['tensanpham']; ?></td>
    <td><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>"width=150px></td>
    <td>
      <a style="text-decoration: none;" href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa-sharp fa-solid fa-minus fa-style"></i></i></a>
      <input style="width: 15px;" type="text" name="soluong" value="<?php echo $cart_item['soluong']; ?>"> 
      <a style="text-decoration: none;" href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa-sharp fa-solid fa-plus fa-style"></i></a>
      
    </td>
    <td><?php echo number_format($cart_item['giasp'],0,',','.').' '.'vnđ'; ?></td>
    <td><?php echo number_format($thanhtien,0,',','.').' '.'vnđ' ?> </td>
    <td><a href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>">Xóa</a></td>


    <td></td>
  </tr>
  <?php 
    }
  ?>
  <tr>
    <td colspan="8">
      <p style="float:left">Tổng tiền:<?php echo number_format($tongtien,0,',','.').' '.'vnđ' ?></p>
      <p style="float:right"><a href="pages/main/themgiohang.php?xoatatca=1">Xóa tất cả</p>
      <div style="clear:both";></div>

      <!-- Nút đặt hàng -->
      <?php 
        if(isset($_SESSION['dangky'])){
          ?>
        <p><a href="index.php?quanly=thanhtoan">Đặt hàng</a></p>
        <?php
           }else{
         ?>
      <p><a href="index.php?quanly=dangky">Đăng ký để đặt hàng</a></p>
      <?php
        } 
      ?>







    </td>
  </tr>
  <?php
  }else{
  ?> 
  <tr>
    <td colspan="8"><p>Hiện tại giỏ hàng đang trống</p></td>

  </tr>
<?php
}
?>

</table>