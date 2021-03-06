<footer>
    <div class="container">
        <div class="row mx-0 py-5">
            <div class="col-12 col-md-6 p-1">
                <p>
                    <img src="admin/files/images/images/logo.png" width="149" height="42" data-retina="true" alt="">
                </p>
                <p class='mt-4'>
                    Mea nibh meis philosophia eu. Duis legimus efficiantur ea sea. Id placerat tacimates definitionem sea, prima quidam vim
                    no. Duo nobis persecuti cu. Nihil facilisi indoctum an vix, ut delectus expetendis vis.
                </p>

                <div class="follow_us">
                    <ul>
                        <li>Follow us</li>
                        <li>
                            <a href="#"><i class="fab fa-facebook-square"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-twitter-square"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-google-plus-square"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-pinterest-square"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-6 col-md-3 p-1">
                <h5>Useful links</h5>
                <ul class="links">
                    <li>
                        <a href="#">Admission</a>
                    </li>
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Login</a>
                    </li>
                    <li>
                        <a href="#">Register</a>
                    </li>
                    <li>
                        <a href="#">News &amp; Events</a>
                    </li>
                    <li>
                        <a href="#">Contacts</a>
                    </li>
                </ul>
            </div>

            <div class="col-6 col-md-3 p-1">
                <h5>Contact with Us</h5>
                <ul class="contacts">
                    <li>
                        <a href="tel://61280932400"><i class="fas fa-phone-square"></i> + 61 23 8093 3400</a>
                    </li>
                    <li>
                        <a href="mailto:info@udema.com"><i class="fas fa-envelope-square"></i> info@udema.com</a>
                    </li>
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
                    <li>
                        <a href="#">Terms and conditions</a>
                    </li>
                    <li>
                        <a href="#">Privacy</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-4">
                <div id="copy">© <?php echo date('Y') ?> FlexiStudy</div>
            </div>
        </div>
    </div>
</footer>

<?php
    $min_date = (intval(date('Y', time())) - 12) . '-01-01';
?>

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
                        <input class='form-control form-control-lg' id='reg_first_name' type='text' placeholder='Enter first name'
                               autocomplete='off'>
                    </div>
                    <div class='form-row mx-0 mb-3'>
                        <input class='form-control form-control-lg' id='reg_last_name' type='text' placeholder='Enter last name'
                               autocomplete='off'>
                    </div>
                    <div class='form-row mx-0 mb-3'>
                        <input class='form-control form-control-lg' id='reg_user_name' type='text' placeholder='Enter user name'
                               autocomplete='off'>
                    </div>
                    <div class='form-row mx-0 mb-3'>
                        <input class='form-control form-control-lg' id='reg_birth_date' type='date' placeholder='Date of birth'
                               max='<?php echo $min_date ?>' autocomplete='off'>
                    </div>
                    <div class='form-row mx-0 mb-3'>
                        <input class='form-control form-control-lg' id='reg_email_address' type='email' placeholder='Enter email address'
                               autocomplete='off'>
                    </div>
                    <div class='form-row mx-0 mb-3'>
                        <input class='form-control form-control-lg' id='reg_telephone' type='tel' placeholder='Enter mobile contact'
                               autocomplete='off'>
                    </div>
                    <div class='form-row mx-0 mb-3'>
                        <input class='form-control form-control-lg' id='reg_password' type='password' placeholder='Enter login password'
                               autocomplete='off'>
                    </div>
                    <div class='form-row mx-0 mb-5'>
                        <input class='form-control form-control-lg' id='reg_confirm_password' type='password'
                               placeholder='Confirm login password'
                               autocomplete='off'>
                    </div>

                    <div class='form-row mx-0'>
                        <div class='col-6 offset-3 p-0'>
                            <button class='btn solid' type='button' id='create_account'>Create FlexiStudy account</button>
                        </div>
                    </div>
                    <div class='text-center mt-3'>
                        Already have a FlexiStudy account?
                        <strong><span id='button_login'>Login!</span></strong>
                    </div>
                </form>
                <form id='login_form'>
                    <div class='access_social'>
                        <button class='social_bt facebook' id='facebook_login' type='button'>Login with Facebook</button>
                        <button class='social_bt google' id='google_login' type='button'>Login with Google</button>
                        <a href='#' class='social_bt linkedin d-none'>Login with Linkedin</a>
                    </div>

                    <div class='divider'><span>Or</span></div>

                    <div class='form-row mx-0 mb-5'>
                        <input class='form-control form-control-lg' type='text' placeholder='Email address or mobile contact'
                               autocomplete='off' id='login_credential'>
                    </div>

                    <div class='form-row mx-0 mb-5'>
                        <input class='form-control form-control-lg' type='password' placeholder='Login password' autocomplete='off'
                               id='login_password'>
                    </div>

                    <div class='form-group'>
                        <div class='form-row mx-0'>
                            <div class='col-6 offset-3 p-0'>
                                <button class='btn solid' type='button' id='login_user_now'>Login to FlexiStudy</button>
                            </div>
                        </div>
                        <div class='text-center mt-3'>
                            New to FlexiStudy?
                            <strong><span id='button_register'>Create Account</span></strong>
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

<!-- The Modal -->
<div class="modal" id="progress_modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <div id="loader"></div>
                <div id='loader_content'>
                    <span></span>
                </div>
                <div class="progress" id="progress_div">
                    <div class="progress-bar progress-bar-animated" id="progress_bar"></div>
                </div>
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

<script src='admin/files/lib/js/alertify.min.js' type='text/javascript'></script>

<!-- popper -->
<script src='admin/files/lib/js/theia-sticky-sidebar.min.js'></script>

<script src='admin/files/lib/js/ellipsis.js' type='text/javascript'></script>

<script src='admin/files/lib/js/custom/scripts.js' type='text/javascript'></script>

<script>
    $(document).ready(function () {
        //const loader = new Loader("Uploading cover image, please wait");
        // Check and radio input styles
        $("input.icheck").iCheck({
            checkboxClass: "icheckbox_square-grey",
            radioClass: "iradio_square-grey"
        });

        $('small.error').addClass('d-none');

        $('p.lines_4')

        // WoW - animation on scroll
        const wow = new WOW(
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

        $("#side_navbars").theiaStickySidebar({
            additionalMarginTop: 0
        });

        new LoginRegister();
        max_4();
    });

    function max_4() {
        const paragraps = document.getElementsByClassName('max_4');
        for (let index = 0; index < paragraps.length; index++) {
            $clamp(paragraps[index], {clamp: 5})
        }
    }

    class LoginRegister {
        constructor() {
            const parent = this;
            this.first_name = $("#reg_first_name");
            this.last_name = $("#reg_last_name");
            this.user_name = $("#reg_user_name");
            this.email = $("#reg_email_address");
            this.contact = $("#reg_telephone");

            $("#login_user_now").on("click", function () {
                parent.login();
            });

            $("#create_account").on("click", function () {
                parent.register();
            });

            $("#google_login").on("click", function () {
                parent.google_login();
            });

            $("#facebook_login").on("click", function () {
                parent.facebook_log_in();
            });

            $("#sign_out_user").on("click", function () {
                parent.sign_out_user();
            });

            $('#logout').on('click', function () {
                parent.sign_out_user();
            });

            /*   $.getJSON('http://api.wipmania.com/jsonp?callback=?', function (data) {
                   alert('Latitude: ' + data.latitude +
                       '\nLongitude: ' + data.longitude +
                       '\nCountry: ' + data.address.country);
               });*/
        }

        facebook_log_in() {
            const facebook_provider = new firebase.auth.FacebookAuthProvider();
            //facebook_provider.addScope("user_birthday");
            facebook_provider.setCustomParameters({"display": "popup"});
            const parent = this;

            firebase.auth().signInWithPopup(facebook_provider).then(function (result) {
                // const token = result.credential.accessToken;
                parent.login_social(result.user);
            }).catch(function (error) {
                alertify.error("Could not login");
                console.log(error);
            });

        }

        google_login() {
            const provider = new firebase.auth.GoogleAuthProvider();
            const parent = this;

            firebase.auth().signInWithPopup(provider).then(function (result) {
                // This gives you a Google Access Token. You can use it to access the Google API.
                // const token = result.credential.accessToken;
                // The signed-in user info.
                parent.login_social(result.user);

            }).catch(function (error) {
                alertify.error("Could not login");
                console.log(error);
            });
        }

        login_social(user) {
            const names = user.providerData[0].displayName.split(' ', 2);
            const first_name = names.length >= 1 ? names[0] : '';
            const last_name = names.length >= 2 ? names[1] : '';


            const loader = new Loader("Logging in, please wait");
            $.post("admin/files/functions/api/account/login_user.php",
                {
                    operation: "social_sign_in",
                    first_name: first_name,
                    last_name: last_name,
                    email_address: user.providerData[0].email,
                    user_account: user.providerData[0].providerId,
                    profile_picture: user.providerData[0].photoURL
                },
                function (data) {
                    console.log(data);
                    loader.hide_modal();

                    data = JSON.parse(data);
                    if (parseInt(data["code"]) === 1) {
                        window.location.href = "index.php";
                    } else {
                        alertify.alert("System error occurred please retry");
                    }
                }, "text");
        }

        sign_out_user() {
            if (window.confirm("Are you sure you want to log out?")) {
                firebase.auth().signOut().then(function () {
                    // Sign-out successful.
                    const loader = new Loader("Logging in, please wait");
                    $.post("admin/files/functions/api/account/log_out.php",
                        {
                            operation: "logout_user",
                        },
                        function (data) {
                            console.log(data);
                            loader.hide_modal();

                            data = JSON.parse(data);
                            if (parseInt(data["code"]) === 1) {
                                window.location.href = "index.php";
                            } else {
                                alertify.alert("System error occurred please retry");
                            }
                        }, "text");
                }).catch(function (error) {
                    console.log(error);
                    // An error happened.
                });
            }
        }

        login() {
            const credential = $.trim($("#login_credential").val());
            const user_password = $("#login_password").val();

            if (!MyFunctions.is_valid_email(credential, false, null) && !MyFunctions.is_valid_contact(credential, false, null)) {
                alertify.alert("Enter a valid email or contact");
            } else if (user_password.length < 6) {
                alertify.alert("Password must at least be 6 characters");
            } else {
                const loader = new Loader("Logging in, please wait");
                $.post("admin/files/functions/api/account/login_user.php",
                    {
                        operation: "login_user",
                        credential: credential,
                        login_password: user_password
                    },
                    function (data) {
                        loader.hide_modal();

                        data = JSON.parse(data);
                        switch (parseInt(data["code"])) {
                            case 1:
                                window.location.href = "index.php";
                                break;
                            case 2:
                                alertify.alert("No account found that matches given credentials");
                                break;
                            case 3:
                                alertify.alert("This account was last logged in using \"GOOGLE\" please use google sign in to login using specified credentials");
                                break;
                            case 4:
                                alertify.alert("This account was last logged in using \"FACEBOOK\" please use facebook sign in to login using specified credentials");
                                break;
                            case 5:
                                alertify.alert("Password does not match account credentials");
                                break;
                            default:
                                alertify.alert("System error occurred please retry");
                                break;
                        }
                    }, "text");
            }
        }

        register() {
            const first_name = $.trim(this.first_name.val());
            const last_name = $.trim(this.last_name.val());
            const user_name = $.trim(this.user_name.val());
            const date_of_birth = $.trim($("#reg_birth_date").val());
            const email_address = $.trim(this.email.val());
            const mobile_contact = $.trim(this.contact.val());
            const user_password = $("#reg_password").val();
            const confirm_password = $("#reg_confirm_password").val();

            if (MyFunctions.is_valid_name(first_name, true, this.first_name, "Enter valid first name") &&
                MyFunctions.is_valid_name(last_name, true, this.last_name, "Enter valid last name") &&
                MyFunctions.is_valid_user_name(user_name, true, this.user_name)) {

                if (date_of_birth === "") {
                    alertify.alert("Select a valid date of birth");
                } else {
                    if (MyFunctions.is_valid_email(email_address, true, this.email) &&
                        MyFunctions.is_valid_contact(mobile_contact, true, this.contact)) {
                        if (user_password.length < 6) {
                            alertify.alert("Password should be at least 6 characters");
                        } else if (user_password !== confirm_password) {
                            alertify.alert("Passwords do not match");
                        } else {
                            const loader = new Loader("Creating account, please wait");

                            $.post("admin/files/functions/api/account/create_account.php",
                                {
                                    first_name: first_name,
                                    last_name: last_name,
                                    user_name: user_name,
                                    date_of_birth: date_of_birth,
                                    email_address: email_address,
                                    mobile_contact: mobile_contact,
                                    user_password: user_password
                                },
                                function (data) {
                                    console.log(data);
                                    loader.hide_modal();

                                    data = JSON.parse(data);
                                    switch (parseInt(data["code"])) {
                                        case 1:
                                            alertify.alert("Account successfully created");
                                            break;
                                        case 2:
                                            alertify.alert("Email address is already in use");
                                            break;
                                        case 3:
                                            alertify.alert("Mobile contact is already in use");
                                            break;
                                        default:
                                            alertify.alert("System error occurred please retry");
                                            break;
                                    }
                                }, "text"
                            );
                        }
                    }
                }
            }
        }
    }

    class Loader {
        constructor(text) {
            $("#progress_modal").modal({backdrop: "static", keyboard: false});

            const parent = this;
            this.dots = 1;
            this.progress_div = $('#progress_div');
            if (!this.progress_div.hasClass('d-none')) {
                this.progress_div.addClass('d-none');
            }

            this.timer = setInterval(function () {
                    let dots = "";
                    for (let index = 0; index < parent.dots; index++) {
                        dots = dots + ".";
                    }
                    $("#progress_modal #loader_content > span").html(text + dots);

                    parent.dots = parent.dots >= 10 ? 1 : parent.dots + 1;
                }, 500
            );
        }

        hide_modal() {
            clearInterval(this.timer);
            $("#progress_modal").modal("hide");
        }

        update_progress(loaded, total) {
            if (this.progress_div.hasClass('d-none')) {
                this.progress_div.removeClass('d-none');
            }

            const progress_bar = $("#progress_bar");

            const completed = (loaded / total) * 100;
            if (completed === 100) {
                progress_bar.css("width", "100%");
                progress_bar.html("");
                progress_bar.html("Server side data processing, please wait...");
            } else {
                progress_bar.css("width", completed + "%");
                progress_bar.html(completed + "%");
                let loaded_text = (loaded / 1024);
                loaded_text = loaded_text > 1024 ? (loaded_text / 1024).toFixed(2) + "mbs" : loaded_text + "kbs";
                let total_text = (total / 1024);
                total_text = total_text > 1024 ? (total_text / 1024).toFixed(2) + "mbs" : total_text + "kbs";
                progress_bar.html("Uploading, " + loaded_text + " of " + total_text);
            }
        }
    }
</script>
