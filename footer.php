<footer>
    <p class="text">Eternity Cafe Website 2020. </p>
</footer>
<!-- end of footer -->


<!-- jQuery -->
<!-- <script src="assets/jquery/jquery-3.5.1.js"></script> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Fontawesome js -->

<script src="assets/font-awesome/all.js"></script>

<!-- custom js file -->
<script src="js/script.js"></script>
<script src="js/custom.js"></script>
<script>
    window.onscroll = function() {
        myFunction()
    };

    var navbar = document.getElementsByClassName("navbar-user");
    var sticky = navbar.offsetTop;

    function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("fxd-navbar")
        } else {
            navbar.classList.remove("fxd-navbar");
        }
    }
</script>

<script>
    var FRONT_SITE_PATH = "<?php echo FRONT_SITE_PATH;
                            ?>";
</script>
<script>
    function add_to_cart(id, type) {

        var qty = jQuery("#quantity_dish" + id).val();
        var attr = jQuery('input[name="attribute_dish' + id + '"]:checked').val();
        var is_attr_checked = '';
        if (typeof attr === 'undefined') {
            is_attr_checked = 'no';
        }

        if (qty > 0 && is_attr_checked != 'no') {
            jQuery.ajax({
                url: 'manage_cart.php',
                type: 'post',
                data: 'qty=' + qty + '&attr=' + attr + '&type=' + type,
                success: function(result) {

                    var data = jQuery.parseJSON(result);
                    jQuery('.mycart').html(data.totalCartDish);
                    jQuery('.totalPrice').html(data.totalPrice + "/-");

                }
            });
        } else {
            alert("Please select Quantity");

        }
    }

    function delete_cart(id) {
        jQuery.ajax({
            url: 'manage_cart.php',
            type: 'post',
            data: 'attr=' + id + '&type=delete',
            success: function(result) {

                // if(is_type=='load'){
                // 	window.location.href=window.location.href;
                // }else{
                var data = jQuery.parseJSON(result);

                jQuery('#totalCartDish').html(data.totalCartDish);


                // if (data.totalCartDish == 0) {
                //     jQuery('.shopping-cart-content').remove();
                //     jQuery('#totalPrice').html('');
                // } else {
                var tp1 = data.totalPrice;
                jQuery('.mycart').html(data.totalCartDish);
                jQuery('#dish_' + id).remove();
                jQuery('.totalPrice').html(data.totalPrice + "/-");

                // }
            }

        });
    }

    function deleteOrder(oid) {
        jQuery.ajax({
            url: 'delete_order.php',
            type: 'post',
            data: 'oid=' + oid,
            success: function() {
                alert("Sucessful");
                jQuery('#order_' + oid).remove();


            }

        });
    }
</script>
</body>

</html>