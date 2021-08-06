<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Hệ Thống Hoa Quả Fruit</li>
            <li>
                <a  href="{{ route('admin.index') }}" >
                    <i class="icon-home menu-icon"></i><span class="nav-text">Trang Chủ</span>
                </a>
            </li>
            @if(Auth::user()->hasRole(['admin']))
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-user menu-icon"></i><span class="nav-text">Phân Quyền</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('users.list') }}">Quản Lý User</a></li>
                    <li><a href="{{ route('roles.list') }}">Quản Lý Vai Trò</a></li>
                    <li><a href="{{ route('permissions.list') }}">Quản Lý Quyền</a></li>
                </ul>
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-layers menu-icon"></i><span class="nav-text">Quản Lý Sản Phẩm</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('category.index') }}">Danh Mục</a></li>
                    <li><a href="{{ route('unit.index') }}">Đơn Vị Tính</a></li>
                    <li><a href="{{ route('product.index') }}">Sản Phẩm</a></li>
                    <li><a href="{{ route('promotion.index') }}">Khuyến Mãi</a></li>
                </ul>
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-book-open menu-icon"></i><span class="nav-text">Quản Lý Tin Tức</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('cate-new.index') }}">Danh Mục</a></li>
                    <li><a href="{{ route('new.index') }}">Bài Viết</a></li>
                </ul>
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-plane menu-icon"></i><span class="nav-text">Quản Lý Vận Chuyển</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('feeship.list') }}">Phí vận chuyển</a></li>
                </ul>
            </li>
            <li>
                <a  href="{{ route('slider.index') }}" >
                    <i class="icon-picture menu-icon"></i><span class="nav-text">Quản Lý Slider</span>
                </a>
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-chart menu-icon"></i><span class="nav-text">Thống Kê</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('order-confirmation.index') }}">Chờ Xác Nhận</a></li>
                    <li><a href="{{ route('shipping.index') }}">Đang Giao</a></li>
                    <li><a href="{{ route('order.index') }}">Đơn Hàng</a></li>
                    <li><a href="{{ route('countermand.index') }}">Đơn Hàng Huỷ</a></li>
                </ul>
            </li>
            @else
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-layers menu-icon"></i><span class="nav-text">Quản Lý Sản Phẩm</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('product.index') }}">Sản Phẩm</a></li>
                </ul>
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-book-open menu-icon"></i><span class="nav-text">Quản Lý Tin Tức</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('new.index') }}">Bài Viết</a></li>
                </ul>
            </li>
            @endif
        </ul>
    </div>
</div>
