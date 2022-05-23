
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/stylehome.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giày QHP</title>
</head>
<body>
<header>
        <div class="htren">
            <div class="hotline"><p>Hotline: 0987666666</p></div>
            <div class="checking-order"><a href="#">Kiểm tra đơn hàng</a></div>
            <div class="login">
                <a href="/dangNhap">Log in <input type="hidden" name="_token" value="<?php echo csrf_token();?>"></a>
                <pre>|</pre>
                <a href="/dangKy">Register <input type="hidden" name="_token" value="<?php echo csrf_token();?>"></a>
            </div>
        </div>
        <div class="hduoi">
            <a href="../"><img src="<?php echo e(asset('assets/images/Logo.PNG')); ?>" alt="LOGO"> <input type="hidden" name="_token" value="<?php echo csrf_token();?>"></a>
            <nav>
                <ul>
                    <li><a href="#">About us</a></li>
                    <?php foreach($danhmuc as $datadm){ ?>
                        <li class="nam">
                            <a href="<?php echo e(route('XemDanhMuc.index',['id'=>$datadm->MaDanhMuc])); ?>"><?php echo $datadm->TenDanhMuc ?> <input type="hidden" name="_token" value="<?php echo csrf_token();?>"></a>
                            <ul class="namnam">
                                <?php foreach($theloai as $data){ ?>
                                    <li><a href="<?php echo e(route('XemTheLoai.index',['id'=>$data->MaTheLoai])); ?>"><?php echo $data->TenTheLoai ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php }?>
                    <li><a href="#">Trẻ em</a></li>
                </ul>
            </nav>
            <div class="search">
                <form action="#">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    <input type="text" name="search" id="search">
                </form>
            </div>
            <div class="acc_cart">
                <a class="acc" href="<?php echo e(route('ThongTinCaNhan.index')); ?>"><div><i class="fa-solid fa-user"></i></div></a>
                <a href="/GioHang"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>
        </div>
    </header>
    <div class="banner"><img src="<?php echo e(asset('assets/images/Image 1.png')); ?>" alt="banner1"></div>
    <div class="content">
        
        <div class="title0"><p>SẢN PHẨM</p></div>
        <div class="sp-nam">
            <div class="title1"><img src="<?php echo e(asset('assets/images/Image 3.png')); ?>" alt="nam"></div>
            <div class="hang">
                <?php
                    foreach($sanphamnam as $data){
                ?>
                    <div class="cot">
                        <a href="<?php echo e(route('xemChiTiet.index',['id'=>$data->MaSP])); ?>"><img src="<?php echo asset('assets/images/sp1.jpg')?>" alt="Giay"><input type="hidden" name="_token" value="<?php echo csrf_token();?>"></a>
                        <a href="<?php echo e(route('xemChiTiet.index',['id'=>$data->MaSP])); ?>"><p class="tensp"><?php echo $data->TenSP ?></p><input type="hidden" name="_token" value="<?php echo csrf_token();?>"></a>
                        <a href="#"><p class="price"><?php echo $data->GiaBan?>$</p></a>
                    </div>
                <?php }?>
            </div>
        <div class="view-more">
            <a href="/XemDanhMuc/1"><button>VIEW MORE PRODUCTS</button></a>
        </div>
        <div class="sp-nu">
            <div class="title2"><img src="<?php echo asset('assets/images/Image 11.png')?>" alt="nu"></div>
            <div class="hang">
            <?php
                    foreach($sanphamnu as $data){
                ?>
                    <div class="cot">
                        <a href="<?php echo e(route('xemChiTiet.index',['id'=>$data->MaSP])); ?>"><img src="<?php echo asset('assets/images/sp1.jpg')?>" alt="Giay"><input type="hidden" name="_token" value="<?php echo csrf_token();?>"></a>
                        <a href="<?php echo e(route('xemChiTiet.index',['id'=>$data->MaSP])); ?>"><p class="tensp"><?php echo $data->TenSP ?></p><input type="hidden" name="_token" value="<?php echo csrf_token();?>"></a>
                        <a href="#"><p class="price"><?php echo $data->GiaBan?>$</p></a>
                    </div>
                <?php }?>
            </div>
            <div class="view-more">
                <a href="/XemDanhMuc/2"><button>VIEW MORE PRODUCTS</button></a>
            </div>
        </div>
    </div>
    <div class="feed-back">
        <div class="title3"><p>HASHTAG QHP FOR THE CHANCE TO BE ON OUR WEBSITE</p></div>
        <div class="fb">
            <img src="<?php echo asset('assets/images/Image 26.png')?>" alt="feed back">
            <img src="<?php echo asset('assets/images/Image 26.png')?>" alt="feed back">
            <img src="<?php echo asset('assets/images/Image 26.png')?>" alt="feed back">
            <img src="<?php echo asset('assets/images/Image 26.png')?>" alt="feed back">
            <img src="<?php echo asset('assets/images/Image 26.png')?>" alt="feed back">
            <img src="<?php echo asset('assets/images/Image 26.png')?>" alt="feed back">
            <img src="<?php echo asset('assets/images/Image 26.png')?>" alt="feed back">
            <img src="<?php echo asset('assets/images/Image 26.png')?>" alt="feed back">
        </div>
    </div>
    <footer>
        <div class="container_footer">
        <div class="support">
            <p class="bold">SUPPORT</p>
            <p>Checking order</p>
            <p>Checkout Method</p>
            <p>Return Policy</p>
        </div>
        <div class="information">
            <p class="bold">INFORMATION</p>
            <p>Store Finder</p>
            <p>Cooperation with</p>
            <p>QHP</p>
            <p>Q&A</p>
        </div>
        <div class="about">
            <p class="bold">ABOUT'S QHP</p>
            <p>About QHP</p>
            <p>QHP Stories</p>
            <p>QHP Development</p>
            <p>Activities</p>
            <p>Contact Us</p>
        </div>
        <div class="LOGO"><img src="<?php echo e(asset('assets/images/Logo.PNG')); ?>" alt="LOGO"></div>
        </div>

        <div class="copyright">© Copyright QHP Store</div>
    </footer>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\htdocs\QHP_project\QHP_project\resources\views/home.blade.php ENDPATH**/ ?>