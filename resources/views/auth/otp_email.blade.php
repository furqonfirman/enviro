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
            height: 80px;
            border: 1px solid #0066f2;
            border-radius:10px;
            color: #0066f2;
            font-size: 50px;
            text-align: center;
            font-weight: bold;
        }
        .btn{
            height: 50px;
        }

        [autocomplete="one-time-code"] {
  --magic-number: 100px;

  background-image: linear-gradient(#fff, #fff),
    url("https://assets.codepen.io/3/rounded-rectangle.svg");
  background-size: var(--magic-number);
  background-position-x: right, left;
  background-repeat: no-repeat, repeat-x;
  border: 0;
  height: var(--magic-number);
  width: calc(5 * var(--magic-number));
  font-size: calc(0.6 * var(--magic-number));
  font-family: monospace;
  letter-spacing: calc(0.64 * var(--magic-number));
  padding-inline-start: calc(0.3 * var(--magic-number));
  box-sizing: border-box;
  overflow: hidden;
  transform: translatex(calc(0.5 * var(--magic-number)));
}
[autocomplete="one-time-code"]:focus {
  outline: none;
  background-image: linear-gradient(#fff, #fff),
    url("https://assets.codepen.io/729148/blue-rounded-rectangle.svg");
  background-size: var(--magic-number);
  background-position-x: right, left;
  background-repeat: no-repeat, repeat-x;
}

body {
  height: 100vh;
  margin: 0;
  display: grid;
  place-items: center;
}
  </style>
</head>
<body class="hold-transition login-page">
<body>
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
                        @if(session('data'))
                            <div class="alert alert-danger">
                                {{ session('data') }}
                            </div>
                        @endif
                        <p class="text-center text-success" style="font-size: 5.5rem;"><i class="fa-solid fa-envelope-circle-check"></i></p>
                        <p class="text-center text-center h5 ">Please check your email</p>
                        <p class="text-muted text-center">We've sent a code to your email</p>
                        <form action="{{ route('verifikasi_email') }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row pt-2 pb-2">
                            <div class="col-6">
                            <input type="hidden" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{session('email')}}">
                            <input type="text" name="otp" class="form-control" placeholder="OTP" required="required">
                            </div>
                        </div>
                        <p class="text-muted text-center">Didn't get the code? <a href="{{ route('get_OTP') }}" class="text-primary">Click to resend.</a></p>

                        <div class="row pt-3">
                            <div class="col-6">
                                <button class="btn btn-outline-secondary w-100">Cancel</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary w-100">Verify</button>
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
