<div class="search-popup">
    <div class="search-popup-container">

      <form role="search" method="get" class="search-form" action="">
        <input type="search" id="search-form" class="search-field" placeholder="Type and press enter" value="" name="s" />
        <button type="submit" class="search-submit"><a href="#"><i class="icon icon-search"></i></a></button>
      </form>

      <h5 class="cat-list-title">Browse Categories</h5>
      
      <ul class="cat-list">
        <li class="cat-list-item">
          <a href="shop.html" title="Men Jackets">Men Jackets</a>
        </li>
        <li class="cat-list-item">
          <a href="shop.html" title="Fashion">Fashion</a>
        </li>
        <li class="cat-list-item">
          <a href="shop.html" title="Casual Wears">Casual Wears</a>
        </li>
        <li class="cat-list-item">
          <a href="shop.html" title="Women">Women</a>
        </li>
        <li class="cat-list-item">
          <a href="shop.html" title="Trending">Trending</a>
        </li>
        <li class="cat-list-item">
          <a href="shop.html" title="Hoodie">Hoodie</a>
        </li>
        <li class="cat-list-item">
          <a href="shop.html" title="Kids">Kids</a>
        </li>
      </ul>
    </div>
  </div>
  <header id="header">
    <div id="header-wrap">
      <nav class="secondary-nav border-bottom">
        <div class="container">
          <div class="row d-flex align-items-center">
            <div class="col-md-4 header-contact">
              <p>Let's talk! <strong>+57 444 11 00 35</strong>
              </p>
            </div>
            <div class="col-md-4 shipping-purchase text-center">
              <p>Free shipping on a purchase value of $200</p>
            </div>
            <div class="col-md-4 col-sm-12 user-items">
              <ul class="d-flex justify-content-end list-unstyled">
                
                @auth
                <li>
                  <form action=" {{ route('logout') }} " method="POST">
                    @csrf
                      <button type="submit" >Logout</button>
                  </form>
                </li>
                <li>
                  <a href="{{route('password.update')}}"  rel="noopener noreferrer">Change Password</a>
                </li>
                
                <li>
                  <form action=" {{ route('makeOrder') }} " method="POST">
                    @csrf
                      <input type="date" name="req_date" id="">
                      <button type="submit" >Order</button>
                  </form>
                </li>
                @endauth
                @guest
                <li>
                  <a href="{{route("login")}}">
                    <i class="icon icon-user"></i>
                  </a>
                </li>
                @endguest
                
                
                <li>
                  <a href="{{route("myCart")}}">
                    <i class="icon icon-shopping-cart"></i>
                  </a>
                </li>
                
                <li>
                  <a href="wishlist.html">
                    <i class="icon icon-heart"></i>
                  </a>
                </li>
                @auth
                    
                <li>
                  <a href="{{url("orders")}}">
                    <i class="bi bi-box"></i>
                  </a>
                </li>
                @endauth

                <li class="user-items search-item pe-3">
                  <a href="#" class="search-button">
                    <i class="icon icon-search"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <nav class="primary-nav padding-small">
        <div class="container">
          <div class="row d-flex align-items-center">
            <div class="col-lg-2 col-md-2">
              <div class="main-logo">
                <a href="{{url("")}}">
                  <img src="{{asset("User")}}/images/main-logo.png" alt="logo">
                </a>
              </div>
            </div>
            <div class="col-lg-10 col-md-10">
              <div class="navbar">

                <div id="main-nav" class="stellarnav d-flex justify-content-end right">
                  <ul class="menu-list">

                    <li class="menu-item has-sub">
                      <a href="index.html" class="item-anchor active d-flex align-item-center" data-effect="Home">Home<i class="icon icon-chevron-down"></i></a>
                      <ul class="submenu">
                        <li><a href="index.html" class="item-anchor active">Home</a></li>
                        <li><a href="home2.html" class="item-anchor">Home v2<span class="text-primary"> (PRO)</span></a></li>
                      </ul>
                    </li>

                    <li><a href="about.html" class="item-anchor" data-effect="About">About</a></li>

                    <li class="menu-item has-sub">
                      <a href="shop.html" class="item-anchor d-flex align-item-center" data-effect="Shop">Shop<i class="icon icon-chevron-down"></i></a>
                      <ul class="submenu">
                        <li><a href="shop.html" class="item-anchor">Shop</a></li>
                        <li><a href="shop-slider.html" class="item-anchor">Shop slider<span class="text-primary"> (PRO)</span></a></li>
                        <li><a href="shop-grid.html" class="item-anchor">Shop grid<span class="text-primary"> (PRO)</span></a></li>
                        <li><a href="shop-list.html" class="item-anchor">Shop list<span class="text-primary"> (PRO)</span></a></li>
                        <li><a href="single-product.html" class="item-anchor">Single product<span class="text-primary"> (PRO)</span></a></li>
                        <li><a href="cart.html" class="item-anchor">Cart<span class="text-primary"> (PRO)</span></a></li>
                        <li><a href="wishlist.html" class="item-anchor">Wishlist<span class="text-primary"> (PRO)</span></a></li>
                        <li><a href="checkout.html" class="item-anchor">Checkout<span class="text-primary"> (PRO)</span></a></li>
                      </ul>
                    </li>

                    <li class="menu-item has-sub">
                      <a href="#" class="item-anchor d-flex align-item-center" data-effect="Pages">Pages<i class="icon icon-chevron-down"></i></a>
                      <ul class="submenu">
                        <li><a href="coming-soon.html" class="item-anchor">Coming soon<span class="text-primary"> (PRO)</span></a></li>
                        <li><a href="login.html" class="item-anchor">Login<span class="text-primary"> (PRO)</span></a></li>
                        <li><a href="faqs.html" class="item-anchor">FAQs<span class="text-primary"> (PRO)</span></a></li>
                        <li><a href="styles.html" class="item-anchor">Styles</a></li>
                        <li><a href="thank-you.html" class="item-anchor">Thankyou</a></li>
                        <li><a href="error.html" class="item-anchor">Error page<span class="text-primary"> (PRO)</span></a></li>
                      </ul>
                    </li>

                    <li class="menu-item has-sub">
                      <a href="blog.html" class="item-anchor d-flex align-item-center" data-effect="Blog">Blog<i class="icon icon-chevron-down"></i></a>
                      <ul class="submenu">
                        <li><a href="blog.html" class="item-anchor">Blog</a></li>
                        <li><a href="blog-sidebar.html" class="item-anchor">Blog with sidebar<span class="text-primary"> (PRO)</span></a></li>
                        <li><a href="blog-masonry.html" class="item-anchor">Blog masonry<span class="text-primary"> (PRO)</span></a></li>
                        <li><a href="single-post.html" class="item-anchor">Single post</a></li>
                      </ul>
                    </li>

                    <li><a href="contact.html" class="item-anchor" data-effect="Contact">Contact</a></li>

                  </ul>
                </div>

              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>