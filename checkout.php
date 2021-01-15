<?php include("header.php");

if ($totalCartDish != 0) {
} else {
    redirect(
        "menu.php"
    );
}
$userArray = getUserDetailsByid();
if (isset($_POST['place_order'])) {
    $checkout_name = get_safe_value($_POST['checkout_name']);
    $checkout_email = get_safe_value($_POST['checkout_email']);
    $checkout_mobile = get_safe_value($_POST['checkout_mobile']);
    $checkout_zip = get_safe_value($_POST['checkout_zip']);
    $checkout_address = get_safe_value($_POST['checkout_address']);
    $payment_type = get_safe_value($_POST['payment_type']);

    $added_on = date('Y-m-d h:i:s');
    $sql = "insert into order_master(user_id,name,email,mobile,address,zipcode,total_price,order_status,payment_status,added_on) values('" . $_SESSION['FOOD_USER_ID'] . "','$checkout_name','$checkout_email','$checkout_mobile','$checkout_address','$checkout_zip','$totalPrice','1','pending','$added_on')";
    mysqli_query($con, $sql);
    $insert_id = mysqli_insert_id($con);
    $_SESSION['ORDER_ID'] = $insert_id;
    foreach ($cartArr as $key => $val) {
        mysqli_query($con, "insert into order_detail(order_id,dish_details_id,price,qty) values('$insert_id','$key','" . $val['price'] . "','" . $val['qty'] . "')");
    }
    emptyCart();
    redirect('success.php');
}
?>

<div class="container-fluid">

    <div class="row">
        <div class="col-sm-8 checkout">

            <!-- title -->
            <div class="title">
                <h2>Enter Details</h2>
                <div class="line center">
                    <div></div>
                    <span><i class="fas fa-utensils"></i></span>
                    <div></div>
                </div>
            </div>
            <!-- end of title -->
            <?php
            if (!isset($_SESSION['FOOD_USER_ID'])) {

            ?>
                <div class="center" style="text-decoration: underline;">
                    <a href="login.php" style="padding: 10px;">Prefer to sign-in first? Click Here</a>
                </div>
            <?php } ?>
            <div class="contact-row-1">
                <form class="contact-form checkout-form" action="" method="post">
                    <div>
                        <input type="text" class="form-control a" placeholder="Your Full Name" name="checkout_name" value="<?php echo $userArray['name']; ?>" required>

                        <input type="email" class="form-control a" placeholder="Your Email" name="checkout_email" value="<?php echo $userArray['email']; ?>" required>
                    </div>
                    <div>
                        <input type="mobile" class="form-control a" placeholder="Your Mobile Number" name="checkout_mobile" value="<?php echo $userArray['mobile']; ?>" required>
                        <input type="text" class="form-control a" placeholder="Your Zipcode" name="checkout_zipcode" required>
                    </div>
                    <input type="text" class="form-control" name="checkout_address" placeholder="Address">
                    <input type="radio" name="payment_type" value="cod" checked>
                    <label>Cash On Delivery</label>
                    <button type="submit" class="form-submit-btn" name="place_order" value="true">Place Order</button>
                </form>
            </div>

        </div>

        <div class="tablediv checkout" style="width: 30%;">
            <table class="cart-table table table-bordered" style="font-family: var(--Libre)">
                <thead>
                    <tr>

                        <th width="50%">Product</th>
                        <th width="15%">Price</th>
                        <th width="15%">Quantity</th>
                        <th width="20%">Total</th>
                    </tr>
                </thead>
                <tbody>


                    <?php
                    foreach ($cartArr as $key => $list) { ?>
                        <tr id="dish_<?php echo $key ?>">

                            <td>

                                <a href="javascript:void(0)" onclick="delete_cart(<?php echo $key ?>)" class="remove"><i class="fa fa-times"></i></a>
                                <span><?php echo $list['dish']; ?></span>
                            </td>
                            <td>
                                <span><?php echo $list['price']; ?></span>
                            </td>
                            <td>
                                <div><?php echo $list['qty']; ?></div>
                            </td>
                            <td>
                                <span><?php echo $list['price'] * $list['qty']; ?></span>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="5">
                            <div class="center">
                                <div class="solid-line"></div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            &nbsp;
                        </td>

                        <div class="cart_totals">
                            <div class="col-md-6  ">
                                <div class="table table-bordered col-md-6 totals-table">
                                    <td colspan="2">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>Order Total: </td>
                                                    <td class="totalPrice"> <?php
                                                                            if ($totalPrice !== 0) {
                                                                                echo $totalPrice . "/-";
                                                                            } ?></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </td>
                                </div>
                            </div>
                        </div>
                    </tr>






                </tbody>



            </table>

        </div>

    </div>
</div>
<?php include("footer.php") ?>