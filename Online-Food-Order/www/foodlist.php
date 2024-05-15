<?php
session_start();

if(!isset($_SESSION['login_user2'])){
    header("location: customerlogin.php"); 
    exit; // It's a good practice to stop script execution after redirection
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore | Food Le Cafe'</title>
    <link rel="stylesheet" type="text/css" href="css/foodlist.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>

    <!-- Your navigation bar code goes here -->

    <div class="container" style="width:95%;">

        <!-- Display all Food from food table -->
        <?php

        require 'connection.php';
        $conn = Connect();

        $sql = "SELECT * FROM food WHERE options = 'ENABLE' ORDER BY F_ID";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            echo "Error: " . mysqli_error($conn);
        } elseif (mysqli_num_rows($result) > 0) {
            $count = 0;

            while($row = mysqli_fetch_assoc($result)){
                if ($count == 0)
                    echo "<div class='row'>";

                ?>
                <div class="col-md-3">
                    <form method="post" action="cart.php?action=add&id=<?php echo $row["F_ID"]; ?>">
                        <div class="mypanel" align="center">
                            <img src="<?php echo $row["images_path"]; ?>" class="img-responsive">
                            <h4 class="text-dark"><?php echo $row["name"]; ?></h4>
                            <h5 class="text-info"><?php echo $row["description"]; ?></h5>
                            <h5 class="text-danger">&#8377; <?php echo $row["price"]; ?>/-</h5>
                            <h5 class="text-info">Quantity: <input type="number" min="1" max="25" name="quantity" class="form-control" value="1" style="width: 60px;"> </h5>
                            <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                            <input type="hidden" name="hidden_RID" value="<?php echo $row["R_ID"]; ?>">
                            <input type="submit" name="add" style="margin-top:5px;" class="btn btn-success" value="Add to Cart">
                        </div>
                    </form>
                </div>

                <?php
                $count++;
                if($count == 4) {
                    echo "</div>";
                    $count = 0;
                }
            }
        } else {
            ?>

            <div class="container">
                <div class="jumbotron">
                    <center>
                        <label style="margin-left: 5px;color: red;"> <h1>Oops! No food is available.</h1> </label>
                        <p>Stay Hungry...! :P</p>
                    </center>

                </div>
            </div>

            <?php
        }

        ?>

    </div>
</body>
</html>
