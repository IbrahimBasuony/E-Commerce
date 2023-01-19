<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

        <!-- Start Links -->
        <link rel="stylesheet" href="css/splide.min.css">
        <link rel="stylesheet" href="css/splide-core.min.css">
        <link rel="stylesheet" href="css/all.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <!--Start Home Style -->
        <link rel="stylesheet" href="css/index_style.css">
        <!-- End Home Style -->

        <!-- Start Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:ital,wght@1,400&display=swap" rel="stylesheet">
        <!-- End Google Fonts -->

        <!-- End Links -->

        {{-- <title>Haga Helwa</title> --}}
        <section id="header">
            <a href="category">
                <img src="{{asset('img/logo.png')}}" alt="homeLogo">
            </a>

            <div>
                <ul id="navbar">
                    <li class="link">
                        <a class="active " href="index.html"></a>
                    </li>
                    <li class="link">
                        <a href="shop">shop</a>
                    </li>
                    <li class="link">
                        <a href="">Blog</a>
                    </li>
                    <li class="link">
                        <a href="">About</a>
                    </li>
                    <li class="link">
                        <a href="">Contact</a>
                    </li>


                    <li class="link">
                        <a href="">English</a>
                    </li>
                    <li class="link">
                        <a href="">Arabic</a>
                    </li>
                    @guest
                    <li class="link">
                        <a href="signup">Signup</a>
                    </li>
                    <li class="link">
                        <a href="login">Login</a>
                    </li>
                    @endguest

                    @auth
                    <form action="{{url('logout')}}" method="post">
                        @csrf
                        <button type="submit"class="btn btn-danger">Logout</button>
                    </form>
                    @endauth

                    <li class="link">
                        <a id="lg-cart" href="cart">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </li>
                    <a href="#" id="close"><i class="fas fa-times"></i> </a>
                </ul>

            </div>

            <div id="mobile">
                <a href="cart.html">
                    <i class="fas fa-shopping-cart"></i>
                </a>
                <a href="#" id="bar"> <i class="fas fa-outdent"></i> </a>
            </div>
            </section>
</head>

<body>


    @yield('body')

</body>


<footer class="section-p1">
    <div class="col">
        <a href="index.html"><img class="logo" src="img/logo.png" alt=""></a>
        <h4>Contact</h4>
        <p><strong>Address: </strong>526 manchster Road, street 32, manchster</p>
        <p><strong>Phone: </strong>0106244875</p>
        <p><strong>Hourse: </strong>10AM - 10Pm, Sat- thus</p>
        <div class="follow">
            <h4>Follow US :</h4>
            <div class="icon">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>

    </div>
    <div class="col">
        <h4>About Us</h4>
        <a href="#">About Us</a>
        <a href="#">Delivery information</a>
        <a href="#">Privacy policy</a>
        <a href="#">Terms & Condtions</a>
        <a href="#">Contact Us</a>
    </div>
    <div class="col">
        <h4>My Account</h4>
        <a href="#">Sign in</a>
        <a href="#">View Cart</a>
        <a href="#">My Whishlist</a>
        <a href="#">Track My order</a>
        <a href="#">Help</a>
    </div>
    <div class="col install">
        <h4>Install App</h4>
        <p>From App Store Or Google Play</p>
        <div class="oo">
            <img src="img/pay/app.jpg " alt=" ">
            <img src="img/pay/play.jpg " alt=" ">
        </div>
        <p>Secure payment For your happy Service</p>
        <img src="img/pay/pay.png " alt=" ">
    </div>

    <div class="copyright">
        <p> all The right reserved for OmarTurbo, 2022</p>
    </div>
</footer>


<script src="js/all.min.js "></script>
<script src="js/bootstrap.bundle.min.js "></script>
<script src="js/main.js"></script>
</body>

</html>

