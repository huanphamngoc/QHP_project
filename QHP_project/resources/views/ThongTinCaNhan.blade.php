
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/ThongTinCaNhan.css')}}">
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
                @if (!(session()->has('TenTaiKhoan')))
                    <a href="{{route('DangNhap')}}">Đăng Nhập</a>
                    <pre>|</pre>
                    <a href="./DangKy">Đăng Ký</a>
                    @endif

            </div>
        </div>
        <div class="hduoi">
            <a href="./"><img src="{{ asset('assets/images/Logo.PNG')}}" alt="LOGO"></a>
            <nav>
                <ul>
                    <li><a href="#">Về chúng tôi</a></li>
                    <?php foreach($danhmuc as $datadm){ ?>
                        <li class="nam">
                            <a href="{{route('XemDanhMuc.index',['id'=>$datadm->MaDanhMuc])}}"><?php echo $datadm->TenDanhMuc ?> <input type="hidden" name="_token" value="<?php echo csrf_token();?>"></a>
                            <ul class="namnam">
                                <?php foreach($theloai as $data){ ?>
                                    <li><a href="{{route('XemTheLoai.index',['id'=>$data->MaTheLoai])}}"><?php echo $data->TenTheLoai ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php }?>
                </ul>
            </nav>
            <div class="search">
                <form action="{{route('search-products')}}" method="get">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    <input type="text" name="search" id="search" placeholder="Tìm kiếm sản phẩm...">
                </form>
            </div>
            {{-- href="{{route('ThongTinCaNhan.index')}}" --}}
            <div class="acc_cart">
                    @if (session()->has('TenTaiKhoan'))
                        <a class="acc"  >
                            <div><i class="fa-solid fa-user"></i></div>
                            <input type="hidden" name="_token" id="" value="<?php echo csrf_token() ?>">
                            <div class="loguot" onclick="logout()">Logout </div>
                        </a>

                    @endif
                <a href="{{route('giohang')}}"><i class="fa-solid fa-cart-shopping GH">
                    @if(count(Session::get('cart', array()))>0)
                        <div class="carthover">
                            @if(session('cart'))
                                @php echo count(Session::get('cart', array())); @endphp
                            @endif
                        </div>
                    @endif
                </i></a>
            </div>
        </div>
    </header>
    <section>
        <?php foreach($taikhoan as $data){?>
    <div class="ThongTinCaNhan">
            <table>
                <caption><h2>Thông tin cá nhân</h2></caption>
                <tr>
                    <td><label for="name">Họ và tên</label></td>
                    <td><div class="hoTen"><?php echo $data->HoVaTen?></div></td>
                </tr>
                <tr>
                    <td><label for="dateOfBirth">Ngày sinh</label></td>
                    <td><div class="ngaysinh"><?php echo $data->NgaySinh?></div></td>
                </tr>
                <tr>
                    <td><label for="username">Tên tài khoản</label></td>
                    <td><div class="username"><?php echo $data->TenTaiKhoan?></div></td>
                </tr>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td><div class="email"><?php echo $data->Email?></div></td>
                </tr>
                <tr>
                    <td><label for="DiaChi">Địa chỉ</label></td>
                    <td><div class="DiaChi"><?php echo $data->DiaChi?></div></td>
                </tr>
                <tr>
                    <td><label for="SoDT">Số điện thoại</label></td>
                    <td><div name="SoDT"><?php echo $data->SoDT?></div></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <a href="{{route('ThongTinCaNhan.suaThongTin')}}"><input id="btn_thaydoi" type="button" value="Thay đổi"></a></td>
                </tr>
            </table>
        </div>
        <?php } ?>
    </section>
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
        <div class="LOGO"><img src="{{ asset('assets/images/Logo.PNG')}}" alt="LOGO"></div>
        </div>

        <div class="copyright">© Copyright QHP Store</div>
    </footer>

    <script type="text/javascript">
        document.getElementById("loginBtn").onclick = function(){
            document.getElementById("dangNhap").style.display = "none";
            document.getElementById("forgot-pass-form").style.display = "block";
            return false;
        }
        document.getElementById("submitBtn").onclick = function(){
            document.getElementById("forgot-pass-form").style.display = "none";
            document.getElementById("dangNhap").style.display = "";
            return false;
        }
    </script>
</body>
</html>