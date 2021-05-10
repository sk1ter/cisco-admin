<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0"
        crossorigin="anonymous"
    />
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>
<body>

<div class="row">
    <div class="col-md-3">
        <aside class="sidebar">
            <div class="logo">
                <img src="{{asset('img/logo_black.png')}}" alt="" />
            </div>
            <div class="menu">
                <div class="menu-items">
                    <div class="title">Home</div>
                    <ul>
                        <li class="active"><a class="menu-item" href="#">Заявки</a></li>
                        <li><a href="#">Точки продаж</a></li>
                        <li><a href="#">Продукция</a></li>
                        <li><a href="#">Медиафайлы</a></li>
                    </ul>
                </div>
            </div>
        </aside>
    </div>
    <div class="col-md-9">
        <div class="content">
            @yield('content')
        </div>
    </div>
</div>

<script src="{{asset('js/admin.js')}}"></script>
</body>
</html>
