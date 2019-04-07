<footer>
    <div class="container">
        <div class="row mx-0 py-5">
            <div class="col-12 col-md-6 p-1">
                <p><img src="admin/files/images/images/logo.png" width="149" height="42" data-retina="true" alt=""></p>
                <p class='mt-4'>
                    Mea nibh meis philosophia eu. Duis legimus efficiantur ea sea. Id placerat tacimates definitionem sea, prima quidam vim
                    no. Duo nobis persecuti cu. Nihil facilisi indoctum an vix, ut delectus expetendis vis.
                </p>

                <div class="follow_us">
                    <ul>
                        <li>Follow us</li>
                        <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
                        <li><a href="#"><i class="fab fa-google-plus-square"></i></a></li>
                        <li><a href="#"><i class="fab fa-pinterest-square"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-6 col-md-3 p-1">
                <h5>Useful links</h5>
                <ul class="links">
                    <li><a href="#">Admission</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Register</a></li>
                    <li><a href="#">News &amp; Events</a></li>
                    <li><a href="#">Contacts</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-3 p-1">
                <h5>Contact with Us</h5>
                <ul class="contacts">
                    <li><a href="tel://61280932400"><i class="fas fa-phone-square"></i> + 61 23 8093 3400</a></li>
                    <li><a href="mailto:info@udema.com"><i class="fas fa-envelope-square"></i> info@udema.com</a></li>
                </ul>
                <div id="newsletter">
                    <h6>Newsletter</h6>
                    <div id="message-newsletter"></div>
                    <form method="post" action="assets/newsletter.php" name="newsletter_form" id="newsletter_form">
                        <div class="form-group">
                            <input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
                            <input type="submit" value="Submit" id="submit-newsletter">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row mx-0">
            <div class='col-12 mb-2' id='divider'></div>

            <div class="col-md-8">
                <ul id="additional_links">
                    <li><a href="#">Terms and conditions</a></li>
                    <li><a href="#">Privacy</a></li>
                </ul>
            </div>

            <div class="col-md-4">
                <div id="copy">© <?php echo date('Y') ?> FlexiStudy</div>
            </div>
        </div>
    </div>
</footer>

<!-- The Modal -->
<div class="modal" id="login_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <figure>
                    <img src="admin/files/images/temp/logo.png" alt="">
                </figure>
                <form id='registration_form' class='d-none'>
                    <div class='form-row mx-0 mb-3'>
                        <input class='form-control form-control-lg' type='text' placeholder='Enter first name' autocomplete='off'>
                    </div>
                    <div class='form-row mx-0 mb-3'>
                        <input class='form-control form-control-lg' type='text' placeholder='Enter last name' autocomplete='off'>
                    </div>
                    <div class='form-row mx-0 mb-3'>
                        <input class='form-control form-control-lg' type='date' placeholder='Date of birth' autocomplete='off'>
                    </div>
                    <div class='form-row mx-0 mb-3'>
                        <input class='form-control form-control-lg' type='email' placeholder='Enter email address' autocomplete='off'>
                    </div>
                    <div class='form-row mx-0 mb-3'>
                        <input class='form-control form-control-lg' type='tel' placeholder='Enter mobile contact' autocomplete='off'>
                    </div>
                    <div class='form-row mx-0 mb-3'>
                        <input class='form-control form-control-lg' type='password' placeholder='Enter login password' autocomplete='off'>
                    </div>
                    <div class='form-row mx-0 mb-5'>
                        <input class='form-control form-control-lg' type='password' placeholder='Confirm login password' autocomplete='off'>
                    </div>

                    <div class='form-row mx-0'>
                        <div class='col-6 offset-3 p-0'>
                            <button class='btn solid'>Create FlexiStudy account</button>
                        </div>
                    </div>
                    <div class='text-center mt-3'>
                        Already have a FlexiStudy account? <strong><span id='button_login'>Login!</span></strong>
                    </div>
                </form>
                <form id='login_form'>
                    <div class='access_social'>
                        <a href='#' class='social_bt facebook'>Login with Facebook</a>
                        <a href='#' class='social_bt google'>Login with Google</a>
                        <a href='#' class='social_bt linkedin'>Login with Linkedin</a>
                    </div>

                    <div class='divider'><span>Or</span></div>

                    <div class='form-row mx-0 mb-5'>
                        <input class='form-control form-control-lg' type='email' placeholder='Login email address' autocomplete='off'>
                    </div>

                    <div class='form-row mx-0 mb-5'>
                        <input class='form-control form-control-lg' type='password' placeholder='Login password' autocomplete='off'>
                    </div>

                    <div class='form-group'>
                        <div class='form-row mx-0'>
                            <div class='col-6 offset-3 p-0'>
                                <button class='btn solid'>Login to FlexiStudy</button>
                            </div>
                        </div>
                        <div class='text-center mt-3'>
                            New to FlexiStudy? <strong><span id='button_register'>Create Account</span></strong>
                        </div>
                    </div>
                </form>
                <div class='copy mt-4'>© <?php echo date('Y') ?> FlexiStudy</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" style='width: 100px'>Close</button>
            </div>

        </div>
    </div>
</div>


<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>
<script src='https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js'></script>
<![endif]-->


<!-- jQuery 3.3.1 -->
<script src='admin/files/lib/js/jquery-3.3.1.js'></script>
<!-- popper -->
<script src='admin/files/lib/js/popper.js'></script>
<!-- Bootstrap -->
<script src='admin/files/lib/js/bootstrap.js' type='text/javascript'></script>

<script src='admin/files/lib/js/icheck.min.js' type='text/javascript'></script>

<script src='admin/files/lib/js/wow.min.js' type='text/javascript'></script>


<script>
    $(document).ready(function () {
        // WoW - animation on scroll
        var wow = new WOW(
            {
                boxClass: "wow",      // animated element css class (default is wow)
                animateClass: "animated", // animation css class (default is animated)
                offset: 0,          // distance to the element when triggering the animation (default is 0)
                mobile: true,       // trigger animations on mobile devices (default is true)
                live: true,       // act on asynchronously loaded content (default is true)
                callback: function (box) {
                    // the callback is fired every time an animation is started
                    // the argument that is passed in is the DOM node being animated
                },
                scrollContainer: null // optional scroll container selector, otherwise use window
            }
        );
        wow.init();

        $("#button_login").click(function () {
            $("#login_form").removeClass("d-none");
            $("#registration_form").addClass("d-none");
        });

        $("#button_register").click(function () {
            $("#login_form").addClass("d-none");
            $("#registration_form").removeClass("d-none");
        });
    });
</script>
