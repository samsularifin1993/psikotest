<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/main.css') }}" />
    <script src="{{ asset('js/main.css') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</head>
<body>
    <div class="sidebar">
        <ul>
            <li><a class="icon ion-md-cart" href=""></a></li>
            <li><a class="icon ion-md-car" href=""></a></li>
            <li><a class="icon ion-md-construct" href=""></a></li>
            <li><a class="icon ion-md-desktop" href=""></a></li>
            <li><a class="icon ion-md-cut" href=""></a></li>
            <li><a class="icon ion-md-cube" href=""></a></li>
            <li><a class="icon ion-md-finger-print" href=""></a></li>
            <li><a class="icon ion-md-hammer" href=""></a></li>
            <li><a class="icon ion-md-hammer" href=""></a></li>
            <li><a class="icon ion-md-hammer" href=""></a></li>
            <li><a class="icon ion-md-hammer" href=""></a></li>
            <li><a class="icon ion-md-hammer" href=""></a></li>
            <li><a class="icon ion-md-hammer" href=""></a></li>
            <li><a class="icon ion-md-hammer" href=""></a></li>
            <li><a class="icon ion-md-hammer" href=""></a></li>
            <li><a class="icon ion-md-hammer" href=""></a></li>
        </ul>
    </div>
    <a class="btn icon ion-md-menu"></a>

    <div id="timer">
        @{{ message }}
    </div>
    
    <script type="text/javascript">
        $('.btn').on('click', function(){
            $('.btn').toggleClass('ion-md-close');
            $('.sidebar').toggleClass('side');

            if($('.btn').hasClass('ion-md-menu')){
                $('.btn').removeClass('ion-md-menu');
            }else{
                $('.btn').removeClass('ion-md-close');
                $('.btn').addClass('ion-md-menu');
            }
        });


        var app = new Vue({
            el: '#timer',
            data: {
                message: 'Hello Vue!'
            }
        })
    </script>

</body>
</html>