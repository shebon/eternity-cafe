<?php
include('header.php');
?>



<div class="container1 padding-top">
    <!-- title -->
    <div class="title">
        <h2>Shopping Cart</h2>
        <div class="line center">
            <div></div>
            <span><i class="fas fa-utensils"></i></span>
            <div></div>
        </div>
    </div>
    <!-- end of title -->
</div>
<div class="tablediv">
    <table class="cart-table table table-bordered" style="font-family: var(--Libre)">
        <thead>
            <tr>
                <th>&nbsp;</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>


            <?php
            foreach ($cartArr as $key => $list) { ?>
                <tr id="dish_<?php echo $key ?>">
                    <td>
                        <a href="javascript:void(0)" onclick="delete_cart(<?php echo $key ?>)" class="remove"><i class="fa fa-times"></i></a>
                    </td>
                    <td>
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
                    <button class="btn btn-default" style="width: 100%; height: 45px; " onclick="window.location.href = 'menu.php'">
                        Continue
                    </button>
                </td>
                <td>
                    <button class="btn btn-default" style="width: 100%; height: 45px;" onclick="window.location.href = 'checkout.php'">
                        Checkout
                    </button>
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
                                            <td> Cart Subtotal: </td>
                                            <td class="totalPrice"> <?php
                                                                    if ($totalPrice !== 0) {
                                                                        echo $cartPrice . "/-";
                                                                    } ?></td>
                                        </tr>
                                        <tr>
                                            <td>Delivery Charge:</td>
                                            <td><?php echo $deliveryCharge . "/-" ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <hr>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Order total:</td>
                                            <td><?php echo $totalPrice . "/-" ?></td>
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

<br>
<br>

</div>
<?php
include('footer.php');
?>