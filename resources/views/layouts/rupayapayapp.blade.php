<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'RUPAYAPAY') }}</title>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    @if(isset($loadcss))
      @switch($loadcss)
        @case("gallery")
        <link href="{{ asset('css/gallery-style.css') }}" rel="stylesheet">
            @break
        @case("career")
        <link href="{{ asset('css/career-style.css') }}" rel="stylesheet">
            @break
        @case("csr")
        <link href="{{ asset('css/csr-style.css') }}" rel="stylesheet">
            @break
        @case("press-release")
        <link href="{{ asset('css/press-release-style.css') }}" rel="stylesheet">
            @break 
        @case("integration")
        <link href="{{ asset('css/integration.css') }}" rel="stylesheet">
            @break
        @case("event")
        <link href="{{ asset('css/event-style.css') }}" rel="stylesheet">
            @break

        @default 
          <link href="{{ asset('css/rupayapay-styles.css') }}" rel="stylesheet">
      @endswitch
    @endif
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="assets/code/icofont/icofont.min.css" rel="stylesheet">

     <!-- Favicons -->
    <link href="assets/img/android-chrome-192x192.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link href="assets/code/boxicons/css/boxicons.min.css" rel="stylesheet">

    <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

    <!-- =================Font Awsome=================== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>
<body>
    <div id="app">

       <!------------------------Navbar------------------- --->
        <header id="header-section" class="sticky">
          <nav
            class="navbar navbar-expand-lg bg-white fixed-top py-3 pl-3 pl-sm-0"
            id="navbar"
          >
            <div class="container">
              <div class="navbar-brand-wrapper d-flex w-100 mt-2">
                <a href="/">
                  <img src="{{asset('/images/final-logo.png')}}" width="100" alt="rupayapay-logo"
                /></a>
                <button
                  class="navbar-toggler bg-black ml-auto"
                  type="button"
                  data-toggle="collapse"
                  data-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
                >
                  <span class="mdi mdi-menu navbar-toggler-icon"
                    ><i class="fa fa-bars"></i
                  ></span>
                </button>
              </div>
              <div
                class="collapse navbar-collapse navbar-menu-wrapper"
                id="navbarSupportedContent"
              >
                <ul
                  class="navbar-nav align-items-lg-center align-items-start ml-auto"
                >
                  <li
                    class="d-flex align-items-center justify-content-between pl-4 pl-lg-0"
                  >
                    <div class="navbar-collapse-logo">
                      <p class="font-weight-bold mt-1">MENU</p>
                    </div>
                    <button
                      class="navbar-toggler close-button"
                      type="button"
                      data-toggle="collapse"
                      data-target="#navbarSupportedContent"
                      aria-controls="navbarSupportedContent"
                      aria-expanded="false"
                      aria-label="Toggle navigation"
                    >
                      <span class="mdi mdi-close navbar-toggler-icon pl-5 mt-5"
                        ><i class="fa fa-times mr-3"></i
                      ></span>
                    </button>
                  </li>
    
                  <!-- product -->
                  <li class="nav-item dropdown">
                    <a
                      class="nav-link dropdown-toggle"
                      href="#"
                      id="navbarDropdown"
                      role="button"
                      data-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      Product
                    </a>
                    <div
                      class="dropdown-menu mega-menu"
                      id="mega-menu1"
                      aria-labelledby="navbarDropdown"
                      style="align-self: center"
                    >
                      <div class="row">
                        <div class="col-lg-3 col-md-12 menu-11">
                          <p class="text-bold">BANKING</p>
                          <div>
                            <a href="/rpay-mudra"
                              ><i class="fab fa-gg mr-2" style="color: #971334"></i>
                              <h4>Rpay Mudra</h4></a
                            >
                          </div>
                          <div>
                            <a href="/rpay-punji"
                              ><i class="fas fa-cubes mr-2 text-success"></i>
                              <h4>Rpay Punji</h4></a
                            >
                          </div>
                          <div>
                            <a href="/rpay-tej"
                              ><i
                                class="fab fa-xing mr-2"
                                style="color: #3c3c7e"
                              ></i>
                              <h4>Rpay Tej</h4></a
                            >
                          </div>
    
                          <div>
                            <a href="/rpay-wallet"
                              ><i class="fas fa-wallet mr-2 text-danger"></i>
                              <h4>Rpay Wallet</h4></a
                            >
                          </div>
                        </div>
    
                        <div class="col-lg-3 col-md-12 ml-5 mt-1 slide-rgt">
                          <p class="text-bold">PAYMENT OPTION</p>
                          <div>
                            <a href="/payment-gateway"
                              ><i class="fas fa-lira-sign mr-2"></i>
                              <h4>Payment Gateway</h4></a
                            >
                          </div>
                          <div>
                            <a href="/payment-link"
                              ><i
                                class="fas fa-link mr-2"
                                style="color: #248d91"
                              ></i>
                              <h4>Payment Link</h4></a
                            >
                          </div>
                          <div>
                            <a href="/payment-pages"
                              ><i class="fas fa-file mr-2 text-warning"></i>
                              <h4>Payment Pages</h4></a
                            >
                          </div>
                          <div>
                            <a href="/subscription"
                              ><i class="fas fa-subscript mr-2 text-danger"></i>
                              <h4>Subscription</h4></a
                            >
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-12 ml-5 slide-rgt slideRgt">
                          <p class="text-bold">MORE</p>
                          <div>
                            <a href="/partner"
                              ><i class="fas fa-users mr-3 text-black-50"></i>
                              <h4>Partner</h4></a
                            >
                          </div>
    
                          <div>
                            <a href="/route"
                              ><i
                                class="fas fa-project-diagram mr-3"
                                style="color: #248292"
                              ></i>
                              <h4>Route</h4></a
                            >
                          </div>
                          <div>
                            <a href="/invoice"
                              ><i
                                class="fas fa-file-alt mr-3 text-success"
                                style="color: #f06441"
                              ></i>
                              <h4>Invoice</h4></a
                            >
                          </div>
                          <div>
                            <a href="/upi"
                              ><i class="fab fa-cc-visa mr-3"></i>
                              <h4>UPI</h4></a
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
    
                  <!-- pricing -->
                  <li class="nav-item">
                    <a class="nav-link page-scroll" href="/pricing"
                      >Pricing</a
                    >
                  </li>
                  <!-- pricing -->
    
                  <!-- api doc -->
                  <li class="nav-item dropdown">
                    <a
                      class="nav-link dropdown-toggle"
                      href="#"
                      role="button"
                      id="navbarDropdown"
                      data-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      API Doc
                    </a>
                    <div
                      class="dropdown-menu mega-menu ml-auto"
                      id="mega-menu-3"
                      aria-labelledby="navbarDropdown"
                    >
                      <div class="row">
                        <div class="col-md-12 pl-5 slide-rgt-2">
                          <div>
                            <a href="/dev-doc"
                              ><i class="fas fa-file-pdf mr-4"></i>
                              <h4>Doc</h4></a
                            >
                          </div>
                          <div>
                            <a href="/integration"
                              ><i class="fas fa-link mr-4 text-success"></i>
                              <h4>Integration</h4></a
                            >
                          </div>
                          <div>
                            <a href="/api"
                              ><i
                                class="fas fa-location-arrow mr-4 text-danger"
                              ></i>
                              <h4>API Reference</h4></a
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
    
                  <!-- resource -->
                  <li class="nav-item dropdown">
                    <a
                      class="nav-link dropdown-toggle"
                      href="#"
                      role="button"
                      id="navbarDropdown"
                      data-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      Resources
                    </a>
                    <div
                      class="dropdown-menu mega-menu ml-auto"
                      id="mega-menu-4"
                      aria-labelledby="navbarDropdown"
                    >
                      <div class="col-lg-6 col-md-12 float-left">
                        <div>
                          <a href="/blog"
                            ><i class="fas fa-blog" style="color: #c90a0a"></i>
                            <h4>Blog</h4></a
                          >
                        </div>
                        <div>
                          <a href="/event"
                            ><i
                              class="fas fa-user-friends"
                              style="color: #038046"
                            ></i>
                            <h4>Event</h4></a
                          >
                        </div>
                        <div>
                          <a href="/customer-stories"
                            ><i class="fas fa-bell" style="color: #5e4785"></i>
                            <h4>Custom Stories</h4></a
                          >
                        </div>
                        <div>
                          <a href="/adjustment-guide"
                            ><i class="fas fa-handshake" style="color: #246c75"></i>
                            <h4>Adjustment-Guide</h4></a
                          >
                        </div>
                      </div>
    
                      <div class="col-lg-6 col-md-12 float-left resourcee">
                        <div>
                          <a href="/saas"
                            ><i class="fas fa-dice-d20" style="color: #961540"></i>
                            <h4>Saas</h4></a
                          >
                        </div>
    
                        <div>
                          <a href="/education"
                            ><i
                              class="fas fa-book-reader"
                              style="color: #eb892e"
                            ></i>
                            <h4>Education</h4></a
                          >
                        </div>
                        <div>
                          <a href="/ecommerce"
                            ><i
                              class="fas fa-cart-arrow-down"
                              style="color: #941478"
                            ></i>
                            <h4>E-commerce</h4></a
                          >
                        </div>
                      </div>
                    </div>
                  </li>
                  <!-- resource -->
    
                  <li class="nav-item btn-contact-us1">
                    <a href="/login">
                      <button data-toggle="modal" data-target="#exampleModal">
                        Login
                      </button></a
                    >&nbsp;&nbsp;&nbsp;
                    <a href="/register">
                      <button data-toggle="modal" data-target="#exampleModal">
                        Signup
                      </button></a
                    >
                  </li>
    
                  <li class="nav-item collapse-login">
                    <a href="/login" class="nav-link"> Login</a>
                  </li>
                  <li class="nav-item collapse-login">
                    <a href="/register" class="nav-link">Signup</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </header>
	     <!-- --------------------End navbar--------------------------- -->
        
        @yield('content')
        
        <footer id="footer" class="mt-3">
          <div class="footer-top">
            <div class="container">
              <div class="row">
                <div class="col-lg-4 col-md-6">
                  <div class="footer-info">
                    <h3>Rupayapay</h3>
                    <p class="pb-3">
                      <em
                        >If your business needs assistance in digital payments, then
                        we are a force to be reckon with. With Rupayapay payment
                        gateway, you can instantly setup a business account,
                        automate payments, and acquire collateral-free capital loans
                        with ease. Capitalizing on our state-of-the-art technology,
                        you can offer your customers a simplified and secure online
                        payment experience with multiple options.</em
                      >
                    </p>
    
                    <div>Rupayapay Payments(India) Pvt. Ltd</div>
                    <div>Flat no.301, 3rd floor, 9-1-164, Amsri Plaza,</div>
                    <div>SD Road, Secunderabad-500003</div>
                    <br /><br />
                    <strong>Phone:</strong>+91 9718667722<br />
                    <strong>Email:</strong> info@rupayapay.com<br />
                  </div>
                </div>
    
                <div class="col-lg-2 col-md-6 footer-links">
                  <h4>Company</h4>
                  <ul>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/about">About Us</a>
                    </li>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/pricing">Pricing</a>
                    </li>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/disclaimer">Disclaimer</a>
                    </li>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/agreement">Agreement</a>
                    </li>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/privacy">Privacy policy</a>
                    </li>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/term&condition">Terms & Condition</a>
                    </li>
                  </ul>
                  <br />
    
                  <h4>Developerss</h4>
                  <ul>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/dev-doc">Doc</a>
                    </li>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/integration">Integration</a>
                    </li>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/api">API Reference</a>
                    </li>
                  </ul>
                </div>
                <br />
    
                <div class="col-lg-2 col-md-6 footer-links">
                  <h4>Rpay products</h4>
                  <ul>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/rpay-mudra">Rpay Mudra</a>
                    </li>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/rpay-punji">Rpay Punji</a>
                    </li>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/rpay-tej">Rpay Tej</a>
                    </li>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/rpay-wallet">Rpay Wallet</a>
                    </li>
                  </ul>
                  <br />
    
                  <h4>Resources</h4>
                  <ul>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/blog">Blog</a>
                    </li>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/event">Event</a>
                    </li>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/career">Career</a>
                    </li>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/gallery">Gallery</a>
                    </li>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/press-release">Press-Release</a>
                    </li>
                  </ul>
                  <br />
                </div>
    
                <div class="col-lg-2 col-md-6 footer-links">
                  <h4>Accept Payment</h4>
                  <ul>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/payment-gateway">Payment Gateway</a>
                    </li>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/payment-pages">Payment Pages</a>
                    </li>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/payment-link">Payment Links</a>
                    </li>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/subscription">Subscription</a>
                    </li>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/route">Router</a>
                    </li>
                  </ul>
                  <br />
                  <h4>Help & Support</h4>
                  <ul>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/invoice">Contact Us</a>
                    </li>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="https://rupayapay.com/support">Support</a>
                    </li>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/">FAQ's</a>
                    </li>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/">Banned Products</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-2 col-md-6 footer-links">
                  <h4>Solutions</h4>
                  <ul>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/saas">Saas</a>
                    </li>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/partner">Partners</a>
                    </li>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/education">Education</a>
                    </li>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/ecommerce">E-commerce</a>
                    </li>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/adjustment-guide">Adjustment Guide</a>
                    </li>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/customer-stories">Customer Stories</a>
                    </li>
                  </ul>
                  <br />
                  <h4>More</h4>
                  <ul>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/invoice">Invoice</a>
                    </li>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/covid">Covid-19</a>
                    </li>
                    <li>
                      <i class="fa fa-chevron-right"></i>&nbsp;
                      <a href="/csr">CSR Activities</a>
                    </li>
                  </ul>
                  <br />
                </div>
              </div>
            </div>
          </div>
          <div class="container d-md-flex py-4">
            <div class="mr-md-auto text-center text-md-left footer-line">
              <div class="credits">
                &copy; <span id="year"></span> Copyright
                <strong><span>Rupayapay</span></strong
                >. All Rights Reserved Designed by <a href="#">Rupayapay</a>
              </div>
            </div>
            <div class="mr-md-auto text-center">
              <a href="https://rupayapay.qrcsolutionz.com" target="_blank">
                <img
                  src="{{asset('images/rupayapay-pci.png')}}"
                  width="70"
                  alt="PCI"
                  style="background: #fff; border-radius: 50px"
              /></a>
              <img src="{{asset('images/atm.png')}}" width="100" alt="" />
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
              <a href="https://twitter.com/rupayapay" class="twitter"
                ><i class="fab fa-twitter"></i
              ></a>
              <a href="https://www.facebook.com/RupayaPay.India/" class="facebook"
                ><i class="fab fa-facebook"></i
              ></a>
              <a href="https://www.instagram.com/rupayapay/" class="instagram"
                ><i class="fab fa-instagram"></i
              ></a>
              <a href="https://www.youtube.com/channel/UCaXwdrltC4zcadBkz7uWlhQ" class="google-plus"><i class="fab fa-youtube"></i></a>
              <a href="https://www.linkedin.com/company/rupayapay/" class="linkedin"
                ><i class="fab fa-linkedin"></i
              ></a>
            </div>
          </div>
        </footer>
</div>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src= "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/crudapp.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/validatefunction.js') }}"></script>
    @if(isset($loadscript))
      @switch($loadscript)
        @case("gallery")
            <script type="text/javascript" src="{{ asset('js/gallery.js') }}"></script>
            @break
        @case("career")
            <script type="text/javascript" src="{{ asset('js/career.js') }}"></script>
            @break
        @default
            <script type="text/javascript" src="{{ asset('js/supportapp.js') }}"></script>
      @endswitch
    @endif
    <script>
        $('.dropdown').hover(function() {
        $(this).find('.mega-menu').stop(true, true).delay(200).fadeIn(500);
        }, function() {
        $(this).find('.mega-menu').stop(true, true).delay(200).fadeOut(500);
        });
    </script>
</body>
</html>