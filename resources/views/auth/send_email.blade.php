<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
  <style>
        body{
            background-color: #ebecf0;
        }
        .otp-letter-input{
            max-width: 100%;
            height: 90px;
            border: 1px solid #198754;
            border-radius:10px;
            color: #198754;
            font-size: 60px;
            text-align: center;
            font-weight: bold;
        }
        .btn{
            height: 40px;
        }
  </style>
</head>
<body class="hold-transition login-page">
    <div class="container p-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-5 mt-5">
                <div class="bg-white p-5 rounded-3 shadow-sm border">
                    <div>
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <p class="text-center text-success" style="font-size: 5.5rem;"><i class="fa-solid fa-envelope-circle-check"></i></p>
                        <p class="text-center text-center h5 ">Please input your email</p>
                        <form action="{{ route('get_OTP') }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="email">
                        </div>
                        <div class="row">
                            <div class="col-4">
                            <button type="submit" class="btn btn-primary">Send OTP</button>
                            </div>   
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
