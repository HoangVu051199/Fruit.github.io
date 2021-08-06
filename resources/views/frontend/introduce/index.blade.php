@extends('layouts.app_frontend')
@section('title','Chi tiết tin tức')
@section('content')
 <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Giới thiệu</h3>
                        <ul>
                            <li><a href="{{ URL::to('/') }}">Trang chủ</a></li>
                            <li>Giới thiệu</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <!--about section area -->
    <section class="about_section"> 
       <div class="container">
            <div class="row">
                <div class="col-12">
                   <figure>
                        <!-- <div class="about_thumb">
                            <img src="assets/img/about/about1.jpg" alt="">
                        </div> -->
                        <figcaption class="about_content">
                            <h1>GIỚI THIỆU</h1>
                            <p style="text-align: justify;">Với mong muốn đem đến cho mọi gia đình Việt những loại hoa quả sạch – tươi - ngon – dinh dưỡng nhất. Đồng thời là cầu nối để các vườn cây ăn quả sạch trên khắp cả nước của những người nông dân tâm huyết được tiếp cận gần hơn với người tiêu dùng. Shop hoa quả HD Fruit đã được thành lập với hệ thống cửa hàng bán lẻ, cửa hàng trực tuyến sẵn sàng phục vụ cho mọi khách hàng.</p>

<p style="text-align: justify;">Shop hoa quả chúng tôi cung cấp đầy đủ các loại hoa quả sạch 3 miền, hoa quả nhập khẩu từ nước ngoài, cam kết tuyệt đối về chất lượng và bình ổn giá. Không chỉ bán lẻ trái cây thông thường, chúng tôi còn cung cấp giỏ hoa quả, mâm trái cây đi chùa, hoa quả gọt sẵn, ship hoa quả tận nơi nhanh chóng với mọi giá trị đơn hàng.</p>

<h1 class="mt-5">TÂM – TÍN</h1>

<p style="text-align: justify;">Chúng tôi thấu hiểu rằng, tất cả mọi mục tiêu kinh doanh của mình phải được thực hiện với chữ Tâm, chữ Tín đặt lên hàng đầu. Chính vì vậy, để thực hiện trọn vẹn sứ mệnh mang đến những loại quả đạt chuẩn, góp phần vào việc chăm sóc sức khỏe, giảm bớt nỗi lo an toàn vệ sinh thực phẩm cho người tiêu dùng Việt mỗi ngày, mọi thành viên trong gia đình shop hoa quả chúng tôi luôn tuân thủ những chuẩn mực khắt khe về nguồn gốc, chất lượng hoa quả, quy trình bán hàng tối ưu như đã cam kết.</p>

<p style="text-align: justify;">Song song đó, chúng tôi cũng luôn không ngừng lắng nghe, tìm kiếm, đa dạng sản phẩm cung cấp để đáp ứng nhu cầu ngày càng tăng của khách hàng.</p>

<p style="text-align: justify;">Hy vọng với những nỗ lực không ngừng nghỉ từng ngày của tập thể Shop hoa quả HD Fruit, người tiêu dùng Việt sẽ ngày càng khỏe - đẹp - hạnh phúc hơn.</p>
                            <!-- <div class="about_signature">
                                <img src="assets/img/about/about-us-signature.png" alt="">
                            </div> -->
                        </figcaption>
                    </figure>
                </div>    
            </div>  
        </div> 
    </section>
    <!--about section end-->

@endsection
