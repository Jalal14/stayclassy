<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title> @yield('title') </title>
    <link rel="shortcut icon" href="{{asset('images')}}/{{$icon}}" />
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{asset('css')}}/adminStyle.css">
    <link href="https://fonts.googleapis.com/css?family=Russo+One" rel="stylesheet"> 
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    @yield('style')

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h4>STAY CLASSY</h4>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="{{route('admin.dashboard')}}">Dashboard</a>
                </li>
                <li>
                    <a href="#orderSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Order</a>
                    <ul class="collapse list-unstyled submenu" id="orderSubmenu">
                        <li>
                            <a href="{{route('order.pending')}}">Pending</a>
                        </li>
                        <li>
                            <a href="{{route('order.delivered')}}">Delivered</a>
                        </li>
                        <li>
                            <a href="{{route('order.returned')}}">Returned</a>
                        </li>
                        <li>
                            <a href="{{route('order.cancelled')}}">Cancelled</a>
                        </li>
                        <li>
                            <a href="{{route('order.index')}}">All</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#productSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Product</a>
                    <ul class="collapse list-unstyled submenu" id="productSubmenu">
                        <li>
                            <a href="{{route('product.create')}}">Add new</a>
                        </li>
                        <li>
                            <a href="{{route('product.index')}}">View all</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#stuffSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Stuff</a>
                    <ul class="collapse list-unstyled submenu" id="stuffSubmenu">
                        <li>
                            <a href="{{route('stuff.create')}}">Add new</a>
                        </li>
                        <li>
                            <a href="{{route('stuff.index')}}">View all</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#layoutSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Layout</a>
                    <ul class="collapse list-unstyled submenu" id="layoutSubmenu">
                        <li>
                            <a href="{{route('layout.slider')}}">Slider</a>
                        </li>
                        <li>
                            <a href="{{route('layout.leftImage')}}">Left image</a>
                        </li>
                        <li>
                            <a href="{{route('layout.rightImage')}}">Right image</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#footerSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Footer</a>
                    <ul class="collapse list-unstyled submenu" id="footerSubmenu">
                        <li>
                            <a href="{{route('footer.social')}}">Social</a>
                        </li>
                        <li>
                            <a href="{{route('footer.quality')}}">Quality</a>
                        </li>
                        <li>
                            <a href="{{route('footer.return')}}">Return policy</a>
                        </li>
                        <li>
                            <a href="{{route('footer.shipping')}}">Shipping</a>
                        </li>
                        <li>
                            <a href="{{route('footer.service')}}">Customer service</a>
                        </li>
                        <li>
                            <a href="{{route('footer.contact')}}">Contact</a>
                        </li>
                        <li>
                            <a href="{{route('footer.policy')}}">Policy</a>
                        </li>
                        <li>
                            <a href="{{route('footer.about')}}">About</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('layout.icon')}}">Icon</a>
                </li>
            </ul>
        </nav>

        <div id="content">
            <nav class="navbar navbar-expand-lg bg-dark fixed-top">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>

                    <div id="navbarSupportedContent">
                        <ul class="nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="navbardrop" data-toggle="dropdown">
                                    Account <i class="fa fa-caret-down"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('stuff.edit')}}">Profile <i class="fas fa-user"></i></a>
                                    <a class="dropdown-item" href="{{route('stuff.editPassword')}}">Password <i class="fa fa-key"></i></a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.logout')}}">Logout <i class="fas fa-sign-out-alt"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            @yield('content')
        </div>
    </div>

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="{{asset('js')}}/adminScript.js"></script>
    @yield('script')
</body>
</html>