<?php
include('header.php');
?>
<!-- menu section -->
<div class="padding-y menu" id="menu">
    <div class="container">
        <!-- title -->
        <div class="title">
            <h2> Menu</h2>
            <h2 id="totalPrice"></h2>
            <div class="line center">
                <div></div>
                <span><i class="fas fa-utensils"></i></span>
                <div></div>
            </div>
        </div>
        <?php
        $cat_res = mysqli_query($con, "select * from category where status = 1 order by order_number")


        ?>


        <div class="center">
            <a href="menu.php" class="button category purple">All</a>
            <?php
            while ($cat_row = mysqli_fetch_assoc($cat_res)) {
                echo '<div class=' . $cat_row['category'] . '>
            <a class="button category ' . $cat_row['color'] . '" href="menu.php?cat_id=' . $cat_row['id'] . '">' . $cat_row['category'] . '</a></div>';
            } ?>

        </div>


        <!-- end of title -->

        <div class="menu-row">


            <?php
            // to display course titles

            $course_res = mysqli_query($con, "select * from course order by id");

            while ($course_row = mysqli_fetch_assoc($course_res)) {
                echo
                    '<div class="menu-col-1">
                <div class="center">
                    <h2 class="menu-section-title">' . $course_row['course'] . '</h2>
                </div>';
                $product_sql = "select * from dish where status = 1 and course_id=" . $course_row['id'] . " order by dish";

                // if a category veg/non-veg is set 
                if (isset($_GET['cat_id']) && $_GET['cat_id'] > 0) {
                    $cat_id = get_safe_value($_GET['cat_id']);
                    $product_sql = "select * from dish where status = 1 and course_id=" . $course_row['id'] . " and category_id=" . $cat_id . " order by dish";
                }

                //To display dishes
                $product_res = mysqli_query($con, $product_sql);
                $product_count = mysqli_num_rows($product_res);
                if ($product_count > 0) {
                    while ($product_row = mysqli_fetch_assoc($product_res)) {
                        $id = $product_row['id'];
                        $dish_attr_res_1 = mysqli_query($con, "select * from dish_details 
                                    where status = 1 and dish_id=$id order by price");
                        $dish_attr_row = mysqli_fetch_assoc($dish_attr_res_1); ?>
                        <div class="menu-item">
                            <div class="menu-text">
                                <div class="price">
                                    <?php
                                    if ($product_row['category_id'] == 1) {
                                        echo ' <img style="width:17px;height:17px;" src="images/Veg.jpg" >';
                                    } else {
                                        echo ' <img style="width:17px;height:17px;" src="images/Non-Veg.jpg" alt="">';
                                    }
                                    ?>


                                    <h3><?php echo $product_row['dish']; ?></h3>
                                    <h3><?php echo $dish_attr_row['price']; ?>/-</h3>

                                </div>
                                <div>
                                    <p class="text"><?php echo $product_row['dish_detail'] ?></p>





                                    <div class="price">
                                        <div>

                                            <!-- To display dish quantity -->

                                            <label>Choose Quantity:</label>
                                            <select class="dropdown center" id="quantity_dish<?php echo $id; ?>" name="quantity_dish<?php echo $id; ?>">
                                                <?php
                                                for ($i = 1; $i <= 20; $i++) {
                                                    echo "<option value='$i'>$i</option>";
                                                }
                                                ?>

                                            </select>
                                        </div>
                                        <br>
                                        <div>
                                            <!-- To display attributes (radio button) -->
                                            <?php
                                            $dish_attr_res = mysqli_query($con, "select * from dish_details 
                                            where status = 1 and dish_id=$id order by price");
                                            while ($dish_attr_row = mysqli_fetch_assoc($dish_attr_res)) {
                                                $attr = $dish_attr_row['attribute'];
                                                $attr_id = $dish_attr_row['id']; ?>

                                                <input type="radio" id="attribute_dish<?php echo $id; ?>" name="attribute_dish<?php echo $id; ?>" value="<?php echo $attr_id; ?>">
                                                <label for="attribute_dish<?php echo $id; ?>"><?php echo $attr; ?></label><br>
                                            <?php }
                                            ?>
                                        </div>
                                    </div>
                                    <input class="add_to_cart" type="submit" style="border: none;" value="Add to cart" onclick="add_to_cart(<?php echo $id ?>,'add');">




                                </div>

                            </div>
                        </div>
            <?php
                    }
                } else {
                    echo "<h4 class='title'>No dish available in this course.</h4>";
                }


                echo ' </div>';
            } ?>


        </div>

    </div>
</div>
<!-- end of menu section -->

<?php
include('footer.php');
?>