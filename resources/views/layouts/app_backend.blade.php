<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title')</title>
    <base href="{{ asset('') }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Pignose Calender -->
    <link href="backend/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="backend/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="backend/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Select2 -->
    <link href="backend/css/select2.min.css" rel="stylesheet" />
    
    <!-- Custom Stylesheet -->
    <link href="backend/plugins/toastr/css/toastr.min.css" rel="stylesheet">
    <link href="backend/css/style.css" rel="stylesheet">
    
</head>
<body>
<!--*******************
   Preloader start
   ********************-->
<div id="preloader">
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
        </svg>
    </div>
</div>
<!--*******************
   Preloader end
   ********************-->
<!--**********************************
   Main wrapper start
   ***********************************-->
<div id="main-wrapper">

    <!--Header start-->
    @include('backend.common.header')
    <!--Header end ti-comment-alt-->

    <!--Sidebar start-->
    @include('backend.common.sidebar')
    <!--Sidebar end-->

    <!--Content body start-->
    @yield('content')
    <!--Content body end-->

    <!--Footer start-->
    @include('backend.common.footer')
    <!--Footer end-->
</div>

<!--Main wrapper end-->

<!--**********************************
   Scripts
   ***********************************-->
<script src="backend/plugins/common/common.min.js"></script>
<script src="backend/js/custom.min.js"></script>
<script src="backend/js/settings.js"></script>
<script src="backend/js/gleek.js"></script>
<script src="backend/js/styleSwitcher.js"></script>

<!-- Select2 -->
<script src="backend/js/select2.min.js"></script>
<!-- Chartjs -->
<script src="backend/plugins/chart.js/Chart.bundle.min.js"></script>
<!-- Circle progress -->
<script src="backend/plugins/circle-progress/circle-progress.min.js"></script>
<!-- Datamap -->
<script src="backend/plugins/d3v3/index.js"></script>
<script src="backend/plugins/topojson/topojson.min.js"></script>
<!-- <script src="backend/plugins/datamaps/datamaps.world.min.js"></script> -->
<!-- Morrisjs -->
<script src="backend/plugins/raphael/raphael.min.js"></script>
<script src="backend/plugins/morris/morris.min.js"></script>
<!-- Pignose Calender -->
<script src="backend/plugins/moment/moment.min.js"></script>
<script src="backend/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
<!-- ChartistJS -->
<script src="backend/plugins/chartist/js/chartist.min.js"></script>
<script src="backend/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
{{--<script src="backend/js/dashboard/dashboard-1.js"></script>--}}
<!-- Toastr -->
<script src="backend/plugins/toastr/js/toastr.min.js"></script>
<script src="backend/plugins/toastr/js/toastr.init.js"></script>

@yield('js')

<script type="text/javascript">
    $(document).ready(function(){
        $('.select2_category').on('change', function(){
            var id_category = $('#option_category').val();
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url : '{{url('/promotion/select-product')}}',
                method: 'POST',
                data:{id_category:id_category, _token:_token},
                success:function(data){
                   $('#select_product').html(data);
                }
            });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2({
        placeholder: "Chọn sản phẩm"
    });
});
</script>

<script type="text/javascript">
    $(document).ready(function(){

        fetch_delivery();

        function fetch_delivery(){
            var _token = $('input[name="_token"]').val();
             $.ajax({
                url : '{{url('/feeship/select-feeship')}}',
                method: 'POST',
                data:{_token:_token},
                success:function(data){
                   $('#load_delivery').html(data);
                }
            });
        }
        $(document).on('blur','.fee_feeship_edit',function(){

            var feeship_id = $(this).data('feeship_id');
            var fee_value = $(this).text();
            var _token = $('input[name="_token"]').val();
            // alert(feeship_id);
            // alert(fee_value);
            $.ajax({
                url : '{{url('/feeship/update-delivery')}}',
                method: 'POST',
                data:{feeship_id:feeship_id, fee_value:fee_value, _token:_token},
                success:function(data){
                   fetch_delivery();
                }
            });

        });

        $('.add_delivery').click(function(){
            var provinces = $('.provinces').val();
            var districts = $('.districts').val();
            var wards = $('.wards').val();
            var feeship = $('.feeship').val();
            var _token = $('input[name="_token"]').val();
            
            $.ajax({
                url : '{{url('/feeship/store')}}',
                method : 'POST',
                data : {provinces:provinces,districts:districts,wards:wards,feeship:feeship,_token:_token},
                success:function(data){
                    fetch_delivery();
                }
            });
        });


        $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            // alert(action);
            // alert(ma_id);
            // alert(_token);

            if(action=='provinces'){
                result = 'districts';
            }else{
                result = 'wards';
            }
            $.ajax({
                url : '{{url('/feeship/select-delivery')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                   $('#'+result).html(data);     
                }
            });
        }); 
});
</script>

<script type="text/javascript">
   
   // Check all danh mục
   
   $('.checkbox_wrapper').on('click', function(){
       $(this).parents('.cards').find('.checkbox_childrent').prop('checked', $(this).prop('checked'));
   });
   $('.checkboxall').on('click', function(){
       $(this).parents().find('.checkbox_wrapper').prop('checked', $(this).prop('checked'));
       $(this).parents().find('.checkbox_childrent').prop('checked', $(this).prop('checked'));
   });
  
    
               // Chức năng chọn hết
               document.getElementById("btn1").onclick = function () 
               {
                   // Lấy danh sách checkbox
                   var checkboxes = document.getElementsByName('permissions[]');
                   var checkboxes = document.getElementsByName('product_id[]');
    
                   // Lặp và thiết lập checked
                   for (var i = 0; i < checkboxes.length; i++){
                       checkboxes[i].checked = true;
                   }
               };
    
               // Chức năng bỏ chọn hết
               document.getElementById("btn2").onclick = function () 
               {
                   // Lấy danh sách checkbox
                   var checkboxes = document.getElementsByName('permissions[]');
                   var checkboxes = document.getElementsByName('product_id[]');
    
                   // Lặp và thiết lập Uncheck
                   for (var i = 0; i < checkboxes.length; i++){
                       checkboxes[i].checked = false;
                   }
               };
    
     
</script>

</body>
</html>
