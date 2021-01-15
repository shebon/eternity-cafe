<?php include("header.php") ?>
<div class="container padding-top">
    <!-- title -->
    <div class="title">
        <h2>Login</h2>
        <div class="line center">
            <div></div>
            <span><i class="fas fa-utensils"></i></span>
            <div></div>
        </div>
    </div>
    <!-- end of title -->



    <div class="contact-row-1">
        <form method="post" id="frmLogin" class="contact-form" style="width: 30%; line-height:45px">
            <input class="form-control" type="email" name="user_email" placeholder="Email" required>
            <input class="form-control" type="password" name="user_password" placeholder="Password" required>


            <input type="submit" class="form-submit-btn" id="login_submit" value="Login">
            <input type="hidden" name="type" value="login" />
            <div id="form_login_msg" class="success_field"></div>

        </form>

        <div class="center" style="text-decoration: underline;">
            <a href="register.php" style="padding: 10px;">New? Click here to register.</a>
        </div>
    </div>

    <?php include("footer.php") ?>