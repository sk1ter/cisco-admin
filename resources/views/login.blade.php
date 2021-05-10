<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" charset="UTF-8">
    <style>
        .login__page {
            min-height: 100vh;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            justify-content: center;
        }

        .login_bg_image {
            position: relative;
            width: 100%;
            height: 100vh;
        }

        .login__page .login_bg_image img {
            width: 85%;
            height: 100%;
        }

        .login__page .login__box {
            width: 50%;
            max-width: 550px;
            background: white;
            padding: 60px 70px;
            -webkit-box-shadow: 5px 5px 50px rgba(22, 37, 80, 0.25);
            box-shadow: 5px 5px 50px rgba(22, 37, 80, 0.25);
            position: absolute;
            margin: 0 auto;
        }

        @media (max-width: 1100px) {
            .login__page .login__box {
                width: 60%;
            }
        }

        @media (max-width: 768px) {
            .login__page .login__box {
                width: 90%;
            }
        }

        .login__page .login__logo {
            margin-bottom: 30px;
        }

        .login__page .login__logo img {
            -webkit-filter: invert(1);
            filter: invert(1);
        }

        .login_input {
            border-top: none;
            border-left: none;
            border-right: none;
            border-bottom: 1.5px solid black;
            width: 100%;
            margin: 10px 0;
            outline: none;
        }

        .login__page .login__title {
            text-transform: uppercase;
            font-weight: bold;
            font-size: 18px;
            line-height: 24px;
            color: #323232;
            margin-bottom: 30px;
        }

        .login__page .form_group {
            margin-top: 30px;
            margin-bottom: 15px;
        }

        .login__page .forgetPassword {
            display: block;
            color: #7598FF;
            font-size: 12px;
            line-height: 14px;
            text-decoration: none;
            margin-left: 15px;
            margin-bottom: 20px;
        }

        .login__page .radio_group {
            position: relative;
            margin-bottom: 20px;
        }

        .login__page .radio_group input {
            position: absolute;
            left: 0;
            top: 0;
            visibility: hidden;
            opacity: 0;
        }

        .login__page .radio_group input:checked ~ label:before {
            background: #9A9A9A;
        }

        .login__page .radio_group label {
            padding-left: 15px;
            font-size: 15px;
            line-height: 18px;
            color: #9A9A9A;
            position: relative;
            cursor: pointer;
        }

        .login__page .radio_group label:before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            width: 10px;
            height: 10px;
            border-radius: 50%;
            border: 1px solid #9A9A9A;
        }

        .login__page p {
            font-size: 14px;
            line-height: 19px;
            color: #9A9A9A;
            margin-bottom: 20px;
        }

        .loginbtn {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login__page button {
            height: 50px;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            padding: 0 80px;
            font-weight: bold;
            font-size: 16px;
            line-height: 21px;
            color: white;
            background: #7598FF;
            border-radius: 5px;
            outline: none;
            border: none;
            cursor: pointer;
        }

    </style>
</head>
<body>
<div class="login__page">
    <div class="login_bg_image"><img src="{{asset('img/login_bg.png')}}" alt="LoginBanner"></div>
    <div class="login__box">
        <div class="login__logo"><a href="/"><img src="{{asset('img/logo.png')}}" alt="Logo1"></a></div>
        <h1 class="login__title">Войти в систему</h1>

        <form method="post" action="">
            @csrf
            <div class="form_group">
                <input class="login_input" id="user" type="text"
                       placeholder="Пользователь" required="" name="login"/>
                @error('login')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form_group">
                <input class="login_input" type="password" placeholder="Пароль"
                       required="" name="password"/>
                @error('password')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="radio_group"><input type="checkbox" id="rememberMe"><label for="rememberMe">Запомнить
                    меня</label></div>
            <div class="loginbtn">
                <button type="submit">Войти</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
