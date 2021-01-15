<?php
include("header.php");
if (isset($_SESSION['ORDER_ID'])) { ?>
    <div class="title success" style="padding:11rem 1rem;">
        <h2>ORDER PLACED SUCCESSFULLY.</h2>
        <p style="fon">ORDER ID: <?php echo $_SESSION['ORDER_ID']; ?></p>
    </div>
<?php }
include("footer.php") ?>