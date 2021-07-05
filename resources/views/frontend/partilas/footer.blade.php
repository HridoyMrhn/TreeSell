<!-- Footer -->
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ asset('uploads/others/logo.jpg') }}" class="logo-image rounded-circle" style="height: 80px; width:80px; line-height:80px">
                    <p>
                        <address>
                            Uttara, Dhaka-1300
                            <br>
                            Dhaka, Banglasesh
                        </address>
                        <p>Email: <a href="mailto:mrhninfo@gmail.com">mrhninfo@gmail.com</a></p>
                        <p>Phone: <a href="tel:01622825992">01622825992</a></p>
                    </p>
                </div>

                <div class="col-md-3">
                    <h4>Top Links</h4><hr>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('tree.recent') }}">All Tree</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    </ul>
                </div>


                <div class="col-md-3">
                    <h4>Top Links</h4><hr>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Create New Account</a></li>
                        <li><a href="">Privacy Policy</a></li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <h4>Top Links</h4> <hr>
                    <ul class="list-unstyled">
                        <li><a href="https://www.facebook.com/HridoyMrhn/"><i class="fa fa-facebook" aria-hidden="true"></i>
                            Facebook</a></li>
                        <li><a href="https://github.com/HridoyMrhn"><i class="fa fa-github" aria-hidden="true"></i>
                            Github</a></li>
                        <li><a href="https://www.instagram.com/hridoymrhn/"><i class="fa fa-instagram" aria-hidden="true"></i> Instragram</a></li>
                        <li><a href="https://www.linkedin.com/in/hridoymrhn/"><i class="fa fa-linkedin-square" aria-hidden="true"></i>
                            Linkedin</a></li>
                        <li><a href="https://twitter.com/hridoy_mrhn"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom text-center mt-3 pb-3">
                &copy; 2021 - All rights reserved by <a href="https://www.facebook.com/HridoyMrhn/" target="_blank">Hridoy MRHN</a>
            </div>
        </div>
    </div>
<!-- Footer -->

</div>

<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
@yield('js')
</body>
</html>
