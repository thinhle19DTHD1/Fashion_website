<?php
    if(isset($_GET['trang'])){
        $page = $_GET['trang'];
    }else{
        $page =1;
    }
    if($page == '' || $page == 1){
        $begin = 0;
    }else{
        $begin = ($page*10)-10;
    }
    $sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.
    id_sanpham DESC LIMIT $begin,10";
    $query_pro = mysqli_query($mysqli,$sql_pro);

?>
<h3 style="color:darkgreen">Sản phẩm mới nhất : </h3>
                <ul class="product_list">
                    <?php
                        while($row = mysqli_fetch_array($query_pro)){
                    ?>
                    <li>
                        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                            <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh']?>">
                            <p class="title_product"><?php echo $row['tensanpham']?></p>
                            <p class="price_product">Giá: <?php echo number_format($row['giasp'],0,',','.').' vnđ'?></p>
                            <p style="text-align: center;color:darkslategray"><?php echo $row['tendanhmuc'] ?></p>
                        </a>
                    </li>
                    <?php 
                        }
                    ?>
                </ul>


                <div style="clear:both;"></div>
                <style type="text/css">
                    ul.list_trang {
                        margin: 0;
                        padding: 0;
                        list-style: none;
                        line-height: 27px;
                    }
                    ul.list_trang li {
                        float: left;
                        padding: 5px 13px;
                        list-style: none;
                        margin: 5px;
                        background: darkslategray;
                    }
                    ul.list_trang li a {

                        color: aliceblue;
                        text-align: center;
                        text-decoration: none;
                        display:block;
                    }
                    ul.list_trang li:hover {
                        background: cadetblue;
                    }
                </style>
                <?php 
                    $sql_trang = mysqli_query($mysqli,"SELECT * FROM tbl_sanpham");
                    $row_acount = mysqli_num_rows($sql_trang); 
                    $trang = ceil($row_acount/10);
                ?>
                <h3>Trang : <?php echo $page ?>/<?php echo $trang?></h3>
                    <ul class="list_trang">
                        <?php 
                            for($i=1;$i<=$trang;$i++){
                        ?>
                        <li <?php if($i==$page){echo 'style="background:cadetblue"';}else{echo '';} ?>> <a href="index.php?trang=<?php echo $i ?>"><?php echo $i?></a></li>
                        <?php
                            }
                        ?>
                    </ul>
                