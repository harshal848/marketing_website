<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ url('css/app.css') }}">
{{--
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet"> --}}

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet">

    <style type="text/css">
        body{
            font-family: 'Montserrat';
        }
    </style>


    <style type="text/css">
        @media (min-width: 992px){
            .dropdown-menu .dropdown-toggle:after{
                border-top: .3em solid transparent;
                border-right: 0;
                border-bottom: .3em solid transparent;
                border-left: .3em solid;
            }

            .dropdown-menu .dropdown-menu{
                margin-left:0; margin-right: 0;
            }

            .dropdown-menu li{
                position: relative;
            }
            .nav-item .submenu{
                display: none;
                position: absolute;
                left:100%; top:-7px;
            }
            .nav-item .submenu-left{
                right:100%; left:auto;
            }

            .dropdown-menu > li:hover{ background-color: #f1f1f1 }
            .dropdown-menu > li:hover > .submenu{
                display: block;
            }
        }
    </style>

    <script src="{{ url('js/app.js') }}" defer></script>

    <script type="text/javascript">
        /// some script

        // jquery ready start
        $(document).ready(function() {
            // jQuery code

            //////////////////////// Prevent closing from click inside dropdown
            $(document).on('click', '.dropdown-menu', function (e) {
              e.stopPropagation();
            });

            // make it as accordion for smaller screens
            if ($(window).width() < 992) {
                  $('.dropdown-menu a').click(function(e){
                      e.preventDefault();
                    if($(this).next('.submenu').length){
                        $(this).next('.submenu').toggle();
                    }
                    $('.dropdown').on('hide.bs.dropdown', function () {
                       $(this).find('.submenu').hide();
                    })
                  });
            }

        }); // jquery end
    </script>

    <title>DocBoyz - @yield('title')</title>

</head>

<body class="bg-white">

    @include('Layouts.navbar')

    @yield('content')

    @include('Layouts.footer')

</body>

</html>
