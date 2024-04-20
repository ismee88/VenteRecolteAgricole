
    <!-- Top Header Area -->
    <div class="top-header-area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-6">
                    <div class="welcome-note">
                        <span class="popover--text" data-toggle="popover"
                            data-content="Bienvenue sur le site de FarmGood."><i
                                class="icofont-info-square"></i></span>
                        <span class="text">{{\App\Models\Parametre::value('titre')}}</span>
                    </div>
                </div>
                <div class="col-6">
                    {{-- <div class="language-currency-dropdown d-flex align-items-center justify-content-end">
                        <!-- Language Dropdown -->
                        <div class="language-dropdown">
                            <div class="dropdown">
                                <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenu1"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    English
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="#">Bangla</a>
                                    <a class="dropdown-item" href="#">Arabic</a>
                                </div>
                            </div>
                        </div>

                        <!-- Currency Dropdown -->
                        <div class="currency-dropdown">
                            <div class="dropdown">
                                <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenu2"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    $ USD
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                    <a class="dropdown-item" href="#">৳ BDT</a>
                                    <a class="dropdown-item" href="#">€ Euro</a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Main Menu -->
    <div class="bigshop-main-menu">
        <div class="container">
            <div class="classy-nav-container breakpoint-off">
                <nav class="classy-navbar" id="bigshopNav">

                    <!-- Nav Brand -->
                    <a href="{{route('home')}}" class="nav-brand"><img src="{{App\Models\Parametre::value('logo')}}" alt="logo"></a>

                    <!-- Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- Close -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav -->
                        <div class="classynav">
                            <ul>
                                <li><a href="{{route('home')}}">Accueil</a></li>
                                <li><a href="{{route('shop')}}">Nos produits</a>
                                    {{-- <ul class="dropdown">
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="#">Checkout</a>
                                            
                                        </li>
                                        <li><a href="#">Account Page</a>
                                            <ul class="dropdown">
                                                <li><a href="my-account.html">- Dashboard</a></li>
                                                <li><a href="order-list.html">- Orders</a></li>
                                                <li><a href="downloads.html">- Downloads</a></li>
                                                <li><a href="addresses.html">- Addresses</a></li>
                                                <li><a href="account-details.html">- Account Details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="compare.html">Compare</a></li>
                                    </ul> --}}
                                </li>
                                {{-- <li><a href="#">Pages</a>
                                    <div class="megamenu">
                                        <ul class="single-mega cn-col-4">
                                            <li><a href="about-us.html">- About Us</a></li>
                                            <li><a href="faq.html">- FAQ</a></li>
                                            <li><a href="contact.html">- Contact</a></li>
                                            <li><a href="login.html">- Login &amp; Register</a></li>
                                            <li><a href="404.html">- 404</a></li>
                                            <li><a href="500.html">- 500</a></li>
                                        </ul>
                                        <ul class="single-mega cn-col-4">
                                            <li><a href="my-account.html">- Dashboard</a></li>
                                            <li><a href="order-list.html">- Orders</a></li>
                                            <li><a href="downloads.html">- Downloads</a></li>
                                            <li><a href="addresses.html">- Addresses</a></li>
                                            <li><a href="account-details.html">- Account Details</a></li>
                                            <li><a href="coming-soon.html">- Coming Soon</a></li>
                                        </ul>
                                        <div class="single-mega cn-col-2">
                                            <div class="megamenu-slides owl-carousel">
                                                <a href="shop-grid-left-sidebar.html">
                                                    <img src="frontend/img/bg-img/mega-slide-2.jpg" alt="">
                                                </a>
                                                <a href="shop-list-left-sidebar.html">
                                                    <img src="frontend/img/bg-img/mega-slide-1.jpg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="#">Blog</a>
                                    <ul class="dropdown">
                                        <li><a href="blog-with-left-sidebar.html">Blog Left Sidebar</a></li>
                                        <li><a href="blog-with-right-sidebar.html">Blog Right Sidebar</a></li>
                                        <li><a href="blog-with-no-sidebar.html">Blog No Sidebar</a></li>
                                        <li><a href="single-blog.html">Single Blog</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Elements</a>
                                    <div class="megamenu">
                                        <ul class="single-mega cn-col-4">
                                            <li><a href="accordian.html">- Accordions</a></li>
                                            <li><a href="alerts.html">- Alerts</a></li>
                                            <li><a href="badges.html">- Badges</a></li>
                                            <li><a href="blockquotes.html">- Blockquotes</a></li>
                                        </ul>
                                        <ul class="single-mega cn-col-4">
                                            <li><a href="breadcrumb.html">- Breadcrumbs</a></li>
                                            <li><a href="buttons.html">- Buttons</a></li>
                                            <li><a href="forms.html">- Forms</a></li>
                                            <li><a href="gallery.html">- Gallery</a></li>
                                        </ul>
                                        <ul class="single-mega cn-col-4">
                                            <li><a href="heading.html">- Headings</a></li>
                                            <li><a href="icon-fontawesome.html">- Icon FontAwesome</a></li>
                                            <li><a href="icon-icofont.html">- Icon Ico Font</a></li>
                                            <li><a href="labels.html">- Labels</a></li>
                                        </ul>
                                        <ul class="single-mega cn-col-4">
                                            <li><a href="modals.html">- Modals</a></li>
                                            <li><a href="pagination.html">- Pagination</a></li>
                                            <li><a href="progress-bars.html">- Progress Bars</a></li>
                                            <li><a href="tables.html">- Tables</a></li>
                                        </ul>
                                    </div>
                                </li> --}}
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Hero Meta -->
                    <div class="hero_meta_area ml-auto d-flex align-items-center justify-content-end">
                        <!-- Search -->
                        <div class="search-area">
                            <div class="search-btn"><i class="icofont-search"></i></div>
                            <!-- Form -->
                            <form action="{{route('search')}}" method="get">
                                <div class="search-form">
                                    <input type="search" id="search_text" name="query" class="form-control" placeholder="Search">
                                    <input type="submit" class="d-none" value="Send">
                                </div>
                            </form>
                        </div>

                        <!-- Wishlist -->
                        <div class="wishlist-area">
                            <a href="{{route('wishlist')}}" class="wishlist-btn" id="wishlist_counter"><i class="icofont-heart">{{\Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->count()}}</i></a>
                        </div>

                        <!-- Cart -->
                        <div class="cart-area">
                            <div class="cart--btn"><i class="icofont-cart"></i> <span class="cart_quantity">{{\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->count()}}</span>
                            </div>

                            <!-- Cart Dropdown Content -->
                            <div class="cart-dropdown-content">
                                <ul class="cart-list">
                                    @foreach (\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
                                        <li>
                                            <div class="cart-item-desc">
                                                <a href="{{route('detail.produit',$item->model->slug)}}" class="image">
                                                    <img src="{{$item->model->photo}}" class="cart-thumb" alt="">
                                                </a>
                                                <div>
                                                    <a href="{{route('detail.produit',$item->model->slug)}}">{{$item->name}}</a>
                                                    <p>{{$item->qty}} x  <span class="price">{{number_format($item->price,1)}} CFA</span></p>
                                                </div>
                                            </div>
                                            <span class="dropdown-product-remove cart_delete" data-id="{{$item->rowId}}"><i class="icofont-bin"></i></span>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="cart-pricing my-4">
                                    <ul>
                                        <li>
                                            <span>Sous-total :</span>
                                            <span>{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}} CFA</span>
                                        </li>
                                        {{-- <li>
                                            <span>Shipping:</span>
                                            <span>$30.00</span>
                                        </li> --}}
                                        <li>
                                            <span>Total :</span>
                                            @if(session()->has('coupon'))
                                                <span>{{number_format((float) str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())-Session::get('coupon')['valeur'],2)}} CFA</span>
                                            @else
                                                <span>{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}} CFA</span>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                                <div class="cart-box">
                                    <a href="{{route('cart')}}" class="btn btn-success btn-sm d-block">Panier</a>
                                    <a href="{{route('checkout1')}}" class="btn btn-primary btn-sm d-block mt-1">Caisse</a>
                                </div>
                            </div>
                        </div>

                        <!-- Account -->
                        <div class="account-area">
                            <div class="user-thumbnail">
                                @if(auth()->check() && auth()->user()->photo != null)
                                    <img src="{{ auth()->user()->photo }}" alt="user">
                                @elseif (auth()->guest())
                                    <img src="{{Helper::userDefaultImage()}}" alt="user">
                                @else
                                    <img src="{{Helper::userDefaultImage()}}" alt="user">
                                @endif

                            </div>
                            <ul class="user-meta-dropdown">
                                @auth
                                    <li class="user-title"><span>Bonjour,</span> {{auth()->user()->nom_complet}}</li>
                                    <li><a href="{{route('user.dashboard')}}">Mon conpte</a></li>
                                    <li><a href="{{route('user.order')}}">Liste des commandes</a></li>
                                    <li><a href="{{route('wishlist')}}">Favoris</a></li>
                                    <li><a href="{{route('user.logout')}}"><i class="icofont-logout"></i> Déconnexion</a></li>
                                @else
                                    <li><a href="{{route('user.login')}}">Se connecter</a></li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
