<?php include('partials/menu.php'); ?>
<style>
    .text-center{
        top: 10%;
    text-align: center;
}
.container{
    width: 80%;
    margin: 0 auto;
    padding: 1%;
}

.food-search{
    background-image: url(../images/bg.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    padding: 7% 0;
}

.food-search input[type="search"]{
    width: 50%;
    padding: 1%;
    font-size: 1rem;
    border: none;
    border-radius: 5px;
}
.food-menu{
    background-color: #ececec;
    padding: 6% 0;
}

.food-menu-desc{
    top: 70%;
    width: 70%;
    float: left;
    margin-left: 8%;
}
.sucess{
    color: #2ed573;
}
.error{
    color: #ff4757;
}
</style>

    <!-- stock sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php 

                //Get the Search Keyword
                // $search = $_POST['search'];
                $search = mysqli_real_escape_string($conn, $_POST['search']);
            
            ?>


            <h2>Stocks on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- stock sEARCH Section Ends Here -->



    <!-- stock MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Stock Menu</h2>

            <?php 

                $sql = "SELECT * FROM categories WHERE stock_name LIKE '%$search%' ";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //Check whether stock available of not
                if($count>0)
                {
                    //stock Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the details
                        $id = $row['id'];
                        $stock_name = $row['stock_name'];
                        $count_of_stocks = $row['count_of_stocks'];
                        $availability = $row['availability'];
                        ?>

                        

                            <div class="food-menu-desc">
                                <h4>Stock Name :<?php echo $stock_name; ?></h4>
                                <h4 class="food-price">Stock count: <?php echo $count_of_stocks; ?></h4>
                                <h4 class="food-price"> Availability:<?php echo $availability;?></h4>
                                <p class="food-detail">
                                </p>
                                <a href="add_borrower.php" class="btn btn-primary">borrow Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //stock Not Available
                    echo "<div class='error'>Stock not found.</div>";
                }
            
            ?>
        </div>
    </section>