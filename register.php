<?php include("header.php") ?>
<div class="container padding-top">
    <!-- title -->
    <div class="title">
        <h2>Register</h2>
        <div class="line center">
            <div></div>
            <span><i class="fas fa-utensils"></i></span>
            <div></div>
        </div>
    </div>
    <!-- end of title -->

    <div class="contact-row-1">

        <form class="contact-form" style="width: 30%; line-height:35px" method="post" id="frmRegister">
            <input class="form-control" type="text" name="name" placeholder="Name" id="name" required>
            <input class="form-control" name="email" id="email" placeholder="Email" type="email" required>
            <div id="email_error" class="error_field"></div>
            <input class="form-control" type="password" name="password" placeholder="Password" id="password" required>
            <input class="form-control" type="text" name="mobile" placeholder="Mobile" id="mobile" required>
            <input type="submit" class="form-submit-btn" id="register_submit" value="Register">
            <input type="hidden" name="type" value="register" />
            <div id="form_msg" class="success_field"></div>
        </form>
        <div class="center" style="text-decoration: underline;">
            <a href="login.php" style="padding: 10px;">Already have an account? Click here to login.</a>
        </div>
    </div>
</div>
<?php include("footer.php") ?>