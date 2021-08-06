<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>VNPAY RESPONSE</title>
        <base href="{{ asset('') }}">
        <!-- Bootstrap core CSS -->
        <link href="frontend/vnpay/assets/bootstrap.min.css" rel="stylesheet"/>
        <!-- Custom styles for this template -->
        <link href="frontend/vnpay/assets/jumbotron-narrow.css" rel="stylesheet">  
        <script src="frontend/vnpay/assets/jquery-1.11.3.min.js"></script>
    </head>
    <body>
        <!--Begin display -->
        <div class="container">
            <div class="header clearfix">
                <h3 class="text-muted">VNPAY RESPONSE</h3>
            </div>
            <div class="table-responsive">
                <div class="form-group">
                    <label >Mã đơn hàng:</label>

                    <label>{{ $vnpayData['vnp_TxnRef'] }}</label>
                </div>    
                <div class="form-group">

                    <label >Số tiền:</label>
                    <label>{{ $vnpayData['vnp_Amount'] }}</label>
                </div>  
                <div class="form-group">
                    <label >Nội dung thanh toán:</label>
                    <label>{{ $vnpayData['vnp_OrderInfo'] }}</label>
                </div> 
                <div class="form-group">
                    <label >Mã phản hồi (vnp_ResponseCode):</label>
                    <label>{{ $vnpayData['vnp_ResponseCode'] }}</label>
                </div> 
                <div class="form-group">
                    <label >Mã GD Tại VNPAY:</label>
                    <label>{{ $vnpayData['vnp_TransactionNo'] }}</label>
                </div> 
                <div class="form-group">
                    <label >Mã Ngân hàng:</label>
                    <label>{{ $vnpayData['vnp_BankCode'] }}</label>
                </div> 
                <div class="form-group">
                    <label >Thời gian thanh toán:</label>
                    <label>{{ $vnpayData['vnp_PayDate'] }}</label>
                </div> 
                <div class="form-group">
                    <label >Kết quả: GD thành công</label>
                    <label>
                    </label>
                </br>
                <a href="{{ URL::to('/') }}">
                    <button>Quay lại</button>
                </a>
                </div> 
            </div>
            <p>
                &nbsp;
            </p>
            <footer class="footer">
                <p>&copy; VNPAY 2015</p>
            </footer>
        </div>  
    </body>
</html>
