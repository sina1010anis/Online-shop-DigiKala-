<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DigiKala</title>
    <link rel="shortcut icon" href="{{url('data/image/icon/shop.png')}}">
    <script src="https://kit.fontawesome.com/d4c29863c5.js" crossorigin="anonymous"></script>
</head>
<body>
<div id="shit">
    <div id="row">
        <div id="app">
<!--            <btn>
                <template v-slot:title="slotProps">
                    <h1>@{{slotProps.msg}}</h1>
                </template>
                <template v-slot="slotProps">
                    <p>@{{ slotProps.msg }}</p>
                </template>
            </btn>-->
            @yield('index')
        </div>
    </div>
</div>
<script src="{{url('js/app.js')}}"></script>
</body>
</html>
