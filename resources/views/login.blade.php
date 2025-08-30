    <!DOCTYPE html>
    <html lang="en">
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-90680653-2"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-90680653-2');
        </script>
        
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Twitter -->
        <!-- <meta name="twitter:site" content="@bootstrapdash">
        <meta name="twitter:creator" content="@bootstrapdash">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Azia">
        <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
        <meta name="twitter:image" content="https://www.bootstrapdash.com/azia/img/azia-social.png"> -->

        <!-- Facebook -->
        <!-- <meta property="og:url" content="https://www.bootstrapdash.com/azia">
        <meta property="og:title" content="Azia">
        <meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">

        <meta property="og:image" content="https://www.bootstrapdash.com/azia/img/azia-social.png">
        <meta property="og:image:secure_url" content="https://www.bootstrapdash.com/azia/img/azia-social.png">
        <meta property="og:image:type" content="image/png">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="600"> -->

        <!-- Meta -->
        <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
        <meta name="author" content="BootstrapDash">

        <title>Azia Responsive Bootstrap 4 Dashboard Template</title>

        <!-- vendor css -->
        <link href="{{ asset('Azia/lib/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('Azia/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('Azia/lib/typicons.font/typicons.css') }}" rel="stylesheet">

        <!-- azia CSS -->
                <link rel="stylesheet" href="{{ asset('Azia/css/azia.css') }}">
     <style>
            .breadcrumb {
                background-color: transparent;
                padding: 0;
                margin-bottom: 0;
            }
            .breadcrumb-item {
                font-size: 0.80rem;
            }
            .breadcrumb-item.active {
                color: #6c757d;
            }
            .breadcrumb-item a {
                color: #0b233a;
                text-decoration: none;
            }
            .breadcrumb-item a:hover {
                text-decoration: underline;
            }
            .buttom-radius {
                border-radius: 8px;
            }
            .card-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                background-color: transparent;
            }
            .card-title {
                margin-bottom: 0;
            }
            .card {
                padding: 20px;
                range: 5px;
                border-radius: 10px
            }
            .az-dashboard-one-title {
                margin-bottom: 20px;
                font: Roboto, sans-serif;
            }
            .az-dashboard-one-title h2 {
                font-size: 1.5rem;
                margin-bottom: 0;
            }
            .form-control{
                border-radius: 8px;
                padding: 10px;
                font-size: 0.9rem;
            }
            .form-group label {
                font-weight: bold;
                margin-bottom: 5px;
            }

            .az-header-left{
                display: flex;
                align-items: center;
                font: lemon;
            }

            .az-logo{
                font-size: 1.5rem;
                font-weight: bold;
                font-family: 'Roboto', sans-serif;
                text-transform: uppercase;
                color: #1f28a3;
            }
            .az-card-signin {
                max-width: 400px;
                margin: 50px auto;
                padding: 30px;
                border-radius: 20px;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            }

            .az-logo {
            display: flex;
            align-items: center;
            justify-content: center; /* biar logo + teks tetap di tengah */
            font-size: 15px;
            font-weight: bold;
            font-family: 'Roboto', sans-serif;
            text-transform: uppercase;
            color: #1f28a3;
        }
        .az-logo img {
            margin-right: 12px;
            width: 60px; /* Ukuran logo */
            vertical-align: middle; /* Agar logo sejajar dengan teks */

        }

        .az-card-signin {
            max-width: 400px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .az-signin-header h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
        .az-signin-header h4 {
            font-size: 1rem;
            color: #6c757d;
            margin-bottom: 20px;
        }

            
        </style>
    </head>
    <body class="az-body">

        <div class="az-signin-wrapper">
        <div class="az-card-signin">
            <h1 class="az-logo">
            <img src="images/logoUR.png" 
            alt="Logo Universitas Royal" 
            style="width:60px; height:60px; margin-right:10px; vertical-align:middle;">
            BEBAS PUSTAKA UNIVERSITAS ROYAL KISARAN</h1>
            <div class="az-signin-header">
            <h2>Welcome back!</h2>
            <h4>Silahkan Masukan Email dan Password!</h4>

            <form action="{{ route('process-login') }}" method="POST">
                @csrf
                <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter your email" value="{{ old('email') }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter your password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <button class="btn btn-az-primary btn-block buttom-radius" type="submit">Sign In</button>
            </form>
            </div>
            <div class="az-signin-footer">
            </div>
        </div>
        </div>
        
@include('partials.footer')
