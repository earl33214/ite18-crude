
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> CDM - Cadet Management System</title>

  <link rel="stylesheet" type="text/css" href="css/vendor.css">

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />


  <!-- Link Bootstrap's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <link rel="stylesheet" href="style.css">

  <!-- Google Fonts ================================================== -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

  <!-- script ================================================== -->
  <script src="js/modernizr.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<body data-bs-spy="scroll" data-bs-target="#navbar-example2" tabindex="0">





  <!-- nav bar start  -->
  <header id="nav" class="site-header position-fixed text-white bg-dark">
    <nav id="navbar-example2" class="navbar navbar-expand-lg py-2">

      <div class="container ">

        <a class="navbar-brand text-uppercase fw-bold" href="#">CMS</a>


        <button class="navbar-toggler text-white" type="button" data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2" aria-label="Toggle navigation"><ion-icon
            name="menu-outline" style="font-size: 30px;"></ion-icon></button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar2"
          aria-labelledby="offcanvasNavbar2Label">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbar2Label">Menu</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
              aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav align-items-center justify-content-end align-items-center flex-grow-1 ">
              <li class="nav-item">
                <a class="nav-link active me-md-4" href="#billboard">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-md-4" href="#residence">Service</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-md-4" href="#about-us">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-md-4" href="#help">Contact</a>
              </li>
              @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end navbar-nav">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                         class="nav-link me-md-4 active"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="nav-link me-md-4 active"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="nav-link me-md-4 active"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif

            </header>


  <!-- billboard start  -->
  <section id="billboard">
    <div class="container">
      <div class="row flex-lg-row-reverse align-items-center">

        <div class="col-lg-6">
          <img src="images/file.jpg" class="d-block mx-lg-auto img-fluid border" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
        </div>

        <div class="col-lg-6">
          <h1 class="text-capitalize lh-1 my-3">Cadet Management System</h1>
          <p class="lead">Streamline cadet operations with ease—track progress, manage records, and enhance efficiency effortlessly.</p>
          <nav class="navbar navbar-expand-lg billboard-nav">
            <div class="container billboard-search p-0">
            </div>
          </nav>
        </div>
      </div>
    </div>
  </section>



  <!-- service start  -->
  <section id="residence">
    <div class="container  my-5 py-5">
      <h2 class="text-capitalize m-0 py-lg-5">Service</h2>

      <div class="swiper-button-next residence-swiper-next  residence-arrow"></div>
      <div class="swiper-button-prev residence-swiper-prev residence-arrow"></div>

      <section id="Residence" class="py-5" style="background: linear-gradient(270deg, #1A242F 0.01%, rgba(26, 36, 47, 0.00) 100%);">
        <div class="container-lg my-5">

          <div class="row d-flex justify-content-between align-items-center">

            <div class="col-md-6">
              <div class="image-holder d-flex">
                <img src="images/hey.jpg" class="d-block mx-lg-auto img-fluid border" alt="System Help" loading="lazy">
              </div>
            </div>

            <div class="col-md-6">
              <div class="text-content ps-md-5 mt-4 mt-md-0">
                <h2 class="text-capitalize">We help you streamline operations</h2>
                <p>Our system automates key tasks such as attendance tracking, scheduling, and communication, allowing you to focus on what matters most. With real-time updates and secure data management, you can easily manage cadet activities without the hassle of manual processes.</p>
                <a href="index.html" class="btn btn-primary btn-lg">Get Started</a>
              </div>
            </div>

          </div>
        </div>
      </section>


    </div>
  </section>

  <!--About us start  -->
  <section id="about-us">
    <div class="container">
      <div class="row py-lg-5">

        <h2 class="text-capitalize text-center m-0 py-lg-5">Why Choose Our System</h2>

        <div class="text-center col-lg-4">
          <img src="images/search.png" class="bd-placeholder-img rounded-circle" alt="Automation" width="140" height="140" loading="lazy">
          <h4 class="fw-normal mt-5">Automated Processes</h4>
          <p>Our system automates key operations like attendance tracking and scheduling, eliminating the need for manual effort and reducing errors.</p>
        </div>

        <div class="text-center col-lg-4">
          <img src="images/price.png" class="bd-placeholder-img rounded-circle" alt="Security" width="140" height="140" loading="lazy">
          <h4 class="fw-normal mt-5">Enhanced Security</h4>
          <p>With secure data management and encryption, our system ensures that cadet data and schedules are safe from unauthorized access.</p>
        </div>

        <div class="text-center col-lg-4">
          <img src="images/time.png" class="bd-placeholder-img rounded-circle" alt="Real-Time Updates" width="140" height="140" loading="lazy">
          <h4 class="fw-normal mt-5">Real-Time Updates</h4>
          <p>Receive real-time updates and notifications for events, schedules, and attendance, ensuring that you are always in the loop.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonial start  -->

  <!-- Help start  -->
  <section id="help" class="py-5" style="background: linear-gradient(270deg, #1A242F 0.01%, rgba(26, 36, 47, 0.00) 100%);">
    <div class="container-lg my-5">

      <div class="row d-flex justify-content-between align-items-center">

        <div class="col-md-6">
          <div class="text-content ps-md-5 mt-4 mt-md-0">
            <h2 class="text-capitalize text-white">Get in Touch</h2>
            <p class="text-white">If you have any questions or need assistance, feel free to reach out. We're here to help you make the most of our system!</p>

            <!-- Contact Form -->
            <form action="#" method="POST">
              <div class="mb-3">
                <label for="name" class="form-label text-white">Your Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label text-white">Your Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
              </div>
              <div class="mb-3">
                <label for="message" class="form-label text-white">Your Message</label>
                <textarea class="form-control" id="message" rows="4" placeholder="Enter your message" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
            </form>
          </div>
        </div>


      </div>

      <!-- Contact Details Section -->
      <div class="row mt-5">
        <div class="col-md-4 text-center text-white">
          <h4>Our Location</h4>
          <p>Caraga State University</p>
        </div>
        <div class="col-md-4 text-center text-white">
          <h4>Email Us</h4>
          <p><a href="mailto:contact@oursystem.com" class="text-white">Cadetmanagement@yahoo.com</a></p>
        </div>
        <div class="col-md-4 text-center text-white">
          <h4>Call Us</h4>
          <p><a href="tel:+1234567890" class="text-white">+ 9852483515</a></p>
        </div>
      </div>

    </div>
  </section>

  <!-- Include Bootstrap JS for form validation and interactivity -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>



  <!-- Lets start  -->


  <!-- Footer start  -->
  <section id="footer">
    <div class="container footer-container">
      <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5">

        <div class="col-md-4">
            <a class="navbar-brand text-uppercase fw-bold" href="./index.html">CMS</a>
          <p>Our system helps streamline ROTC cadet operations, making attendance tracking, scheduling, and communication efficient and easy to manage.</p>
          <i class="bi-facebook pe-4"></i>
          <i class="bi-instagram pe-4"></i>
          <i class="bi-twitter pe-4"></i>
          <i class="bi-youtube pe-4"></i>
        </div>

        <div class="col-md-2">
          <h5>Features</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Attendance Tracking</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Scheduling</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Event Management</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Real-Time Updates</a></li>
          </ul>
        </div>

        <div class="col-md-2">
          <h5>About Us</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">How It Works</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Our Mission</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Our Team</a></li>
          </ul>
        </div>

        <div class="col-md-2">
          <h5>Support</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Help Center</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Contact Us</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">FAQs</a></li>
          </ul>
        </div>

        <div class="col-md-2">
          <h5>Legal</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Privacy Policy</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Terms of Service</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Security</a></li>
          </ul>
        </div>

      </footer>
    </div>

    <footer class="d-flex flex-wrap justify-content-between align-items-center border-top"></footer>

    <div class="container">
      <footer class="d-flex flex-wrap justify-content-between align-items-center py-2">
        <div class="col-md-8 d-flex align-items-center">
          <p>© 2023 Cadet Management System, All rights reserved.</p>
        </div>
        <div class="col-md-4 d-flex align-items-center">
          <p>Developed by: <a href="https://oursystem.com" class="link-primary" target="_blank">Our System Team</a></p>
        </div>
      </footer>
    </div>
  </section>




  <script src="js/jquery-1.11.0.min.js"></script>
  <script src="js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>
