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
    });
</script>