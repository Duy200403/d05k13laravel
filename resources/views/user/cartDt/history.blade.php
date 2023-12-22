<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
        href="https://myshoes.vn/image/catalog/logo/logo-myshoes-nho.png"
        rel="icon"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <title>LapTop</title>
    {{--    <link rel="stylesheet" href="/Public/Icons/fontawesome/css/all.min.css" />--}}
    <link rel="stylesheet" href=" {{asset('user/Icons/fontawesome/css/all.min.css')}} ">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
        crossorigin="anonymous"
    />
    <link
        rel="stylesheet"
        type="text/css"
        href="{{asset('user/Css/Client/base/reset.css')}}"
    />
    <link
        rel="stylesheet"
        type="text/css"
        href=" {{asset('user/Css/Client/base/root.css')}}"
    />
    <link rel="stylesheet" href="{{asset('user/Css/Client/Effects/hover.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/cart.css')}}" />
</head>
<body>
<div class="site-wrapper">
    <header class="header">
        <div class="header-wrapper">
            <div class="header-navbar">
                <div class="logo-wrapper">
                    <a href="{{ route('user.home.index')}}">
                        <img
                            src="https://static.ybox.vn/2022/5/1/1653287716717-LOGO%20XGEAR%20FINAL%20black.png"
                            alt
                            class="logo-img"
                        />
                    </a>
                </div>
                <form class="search-wrapper" action method="POST">
                    <input type="text" name="by" placeholder="Tìm kiếm sản phẩm..." />
                    <button type="submit" class="search-btn">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
                <div class="classic-wrapper">
                    @if(Auth::guard('customers')->check())
                        <div class="accounts">
                            <a href="?controller=login&action=login" class="accounts-link">
                                <i class='bx bxs-user'></i>
                                <div class="links-text">
                                    <span>Tài khoản</span>
                                    <span>{{ Auth::guard('customers')->user()->name }}</span>
                                </div>
                            </a>
                            <div class="dropdown-menu-accounts">
                                <span class="login"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                                <a href="{{ route('user.login.logout') }}">Logout</a></span>
                            </div>
                        </div>
                    @else
                        <div class="accounts">
                            <a href="?controller=login&action=login" class="accounts-link">
                                <i class='bx bxs-user'></i>
                                <div class="links-text">
                                    <span>Tài khoản</span>
                                    <span>Đăng nhập/ Đăng ký</span>
                                </div>
                            </a>
                        </div>
                    @endif
                    <div class="cart">
                        <a href="{{ route('home.showCart') }}" class="cart-link hvr-icon-grow">
                            <i class='bx bx-cart-alt'></i>
                        </a>
                        <span class="quantity">!</span>
                        <div class="cart-empty">
                            <span>Giỏ Hàng</span>
                        </div>
                    </div>
                    <div class="cart">
                        <a href="{{ route('user.cartHistory.history') }}" class="cart-link hvr-icon-grow">
                            <i class='bx bx-cart-download' ></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="body">
        <a class="btn btn-danger" href="{{route('user.cartHistory.history')}}"> back
        </a>
        <div class="cart-desc">
            <h1>Giỏ hàng của bạn</h1>
            <form method="POST" action="#" class="cart-table cart-form">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 10%">Hình ảnh</th>
                        <th style="width: 30%">Tên sản phẩm</th>
                        <th style="width: 10%">Số lượng</th>
                        <th style="width: 10%">Đơn giá</th>
                        <th style="width: 10%">Ngày</th>
                    </tr>
                    </thead>

                    <tbody>
                    <!-- Kiểm tra nếu $cart là mảng -->
                    @foreach ($orderDt as $dt)

                        <tr>
                            <td>
                                <img class="td-img" src="{{ asset(Storage::url('public/admin/' . $dt -> image)) }}">
                            </td>

                            <td>
                                <a href="#" class="td-name">{{ $dt-> Version_name }}</a>
                            </td>

                            <td class="td-quantity">
                                <div class="product-uantity">
                                    {{ $dt-> Amount }}
                                </div>
                            </td>
{{--                            <td>--}}
{{--                                <a href="{{ route('home.deleteCart', ['id' => $id]) }}" class="td-delete">--}}
{{--                                    Xóa--}}
{{--                                </a>--}}
{{--                            </td>--}}
                            <td>{{ number_format($dt-> PriceVersion  * $dt-> Amount )}}₫</td>
                            <td>
                                {{ $dt-> OrderDate }}
                            </td>
                        </tr>
                    @endforeach
                    <!-- Xử lý khi $cart không phải là mảng, ví dụ hiển thị thông báo hoặc thực hiện các xử lý khác -->

                    </tbody>
                </table>
            </form>
        </div>

    </div>
    <div >
        <form class="cart-paymentt" method="POST" action="{{ route('home.buy')}} ">
            @csrf
            <div class="panels-total">
                <div class="cart-total">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <td style="font-weight: 700;">Thành tiền:</td>
                            <td>
                                <input class="td-input" type="text" readonly value="{{number_format ($totalPrice) }}₫">
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
    <div>
        <form class="cart-paymentt" method="POST" action="{{ route('update.order.status', ['order_id' => $order->id]) }}">
            @csrf
            <div class="panels-total">
                <div class="cart-total">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <td style="font-weight: 700;">
                                @if ($order->Status === 'Shipping')
                                    <span style="color: #ff0303; font-size:15px " >Không thể hủy đơn hàng vì đang vận chuyển</span>
                                @elseif($order->Status === 'Đã Nhận Hàng')
                                    <span style="color: #ff0303; font-size:15px " >Đã Nhận Hàng Thành Công</span>
                                @elseif ($order->Status === 'Pending' || $order->Status === 'Confirmed')
                                    <button id="cancelButton" class="update-cart cancel-order">Hủy Đơn Hàng</button>
                                    <span id="cancelMessage" style="display: none;">Đơn hàng đã được hủy</span>
                                @else
                                    <span id="cancelMessage" >Đơn hàng đã được hủy</span>
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const cancelButton = document.getElementById("cancelButton");
            const cancelMessage = document.getElementById("cancelMessage");

            if (cancelButton) {
                cancelButton.addEventListener("click", function (event) {
                    event.preventDefault(); // Ngăn chặn hành vi mặc định của nút
                    Swal.fire({
                        title: 'Bạn có chắc chắn muốn hủy đơn hàng?',
                        text: "Hành động này không thể hoàn tác!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Đồng ý',
                        cancelButtonText: 'Hủy bỏ'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            cancelButton.style.display = "none"; // Ẩn nút "Hủy Đơn Hàng"
                            cancelMessage.style.display = "inline"; // Hiển thị span "Đơn hàng đã được hủy"

                            // Gửi yêu cầu POST đến server
                            fetch('{{ route('update.order.status', ['order_id' => $order->id]) }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({ status: 'Cancelled' }) // Cập nhật trạng thái sang 'Cancelled'
                            })
                                .then(response => response.json())
                                .then(data => console.log(data)) // Có thể thực hiện hành động khác sau khi cập nhật thành công
                                .catch(error => console.error('Error:', error));
                        }
                    });
                });
            }
        });
    </script>

    <footer>
        <div class="footer">
            <div class="footer-wrapper">
                <div class="row g-0">
                    <div class="col-6">
                        <div class="title-module">
                            <h3 class="title-register">ĐĂNG KÝ NHẬN THÔNG TIN</h3>
                            <p>
                                Đăng ký ngay để được cập nhật sớm nhất những thông tin hữu
                                ích, ữu đãi vô cùng hấp dẫn và những món quà bất ngờ từ
                                Myshoes.vn!
                            </p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="newsletter-form">
                            <div class="input-group">
                                <input
                                    type="text"
                                    class="form-control newsletter-email"
                                    placeholder="Nhập email của bạn "
                                />
                                <div class="input-group-append d-flex">
                                    <button class="btn btn-danger btn-register" type="button">
                                        <i class="fa-solid fa-envelope"></i>Đăng Ký
                                    </button>
                                </div>
                            </div>
                            <div class="form-check mt-3">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    value
                                    id="flexCheckChecked"
                                />
                                <label class="form-check-label" for="flexCheckChecked">
                                    Tôi đã đọc và đồng ý với <span>Chính sách bảo mật</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="footer-wrapper">
                <div class="row g-0 mt-3">
                    <div class="col-5">
                        <div class="block-address">
                            <h3>LAPTOP CHÍNH HÃNG</h3>
                            <div class="block-header">
                                <img
                                    src="https://xgear.net/wp-content/uploads/2023/06/Logo-Xgear-300.png"
                                    alt
                                />
                                <div class="block-wrapper">
                      <span
                      >Website được định hướng trở thành hệ thống thương mại
                        điện tử bán giày chính hãng hàng đầu Việt Nam.</span
                      >
                                    <span>Showroom: 249 Xã Đàn, Đống Đa, Hà Nội</span>
                                    <span>Hotline: 0973711868</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2-3">
                        <div class="about-us">
                            <h3>VỀ CHÚNG TÔI</h3>
                            <ul>
                                <li>
                                    <a style="color: #fff" href="?redirect=about"
                                    >Giới thiệu</a
                                    >
                                </li>
                                <li><a>Điều khoản sử dụng</a></li>
                                <li><a>Chính sách bảo mật</a></li>
                                <li><a>Tin tức myshoes</a></li>
                                <li><a>Cơ hội việc làm</a></li>
                                <li><a>Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-2-3">
                        <div class="about-us">
                            <h3>KHÁCH HÀNG</h3>
                            <ul>
                                <li><a>Hướng dẫn mua hàng</a></li>
                                <li><a>Chính sách đổi trả</a></li>
                                <li><a>Chính sách bảo hành</a></li>
                                <li><a>Khách hàng thân thiết</a></li>
                                <li><a>Hướng dẫn chọn size</a></li>
                                <li><a>Chương trình khuyến mại</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-2-3">
                        <div class="about-us certificate">
                            <h3>KHÁCH HÀNG</h3>
                            <div class="certificate-img">
                                <img
                                    src="https://images.dmca.com/Badges/DMCA_logo-grn-btn150w.png?ID=1ed4cd9e-5ee4-4b63-95dc-c70388edd3cb"
                                    alt
                                />
                                <img
                                    src="https://myshoes.vn/image/catalog/logo/logo-bct.png"
                                    alt
                                    width="60%"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="footer-wrapper">
                <div class="copyright">Copyright © 2023 Mygroup Tech.,JSC</div>
            </div>
        </div>
    </footer>
</div>

<script src="{{asset('/Views/Client/cart/handleMoreQuantity.js')}}"></script>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"
></script>
<!-- Thêm mã JavaScript để xử lý sự kiện click -->
<script>
    function cancelOrder() {
        // Thực hiện kiểm tra trạng thái đơn hàng (chỉ một ví dụ, bạn cần cung cấp trạng thái đơn hàng từ phía máy chủ)
        var orderStatus = "Confirmed"; // Thay thế bằng trạng thái đơn hàng thực tế từ máy chủ

        if (orderStatus === "Confirmed" || orderStatus === "Pending") {
            // Cho phép hủy đơn hàng
            // Điều này có thể thực hiện bằng cách chuyển người dùng đến trang xác nhận hủy đơn hàng hoặc thực hiện các tác vụ khác.
            // Ví dụ: window.location.href = "link_den_trang_xac_nhan_huy_don_hang";
        } else {
            // Không cho phép hủy đơn hàng
            alert("Không thể hủy đơn hàng ở trạng thái 'Shipping'.");
        }
    }
</script>

</body>
</html>

