<?php
// code for showing error
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL);

// Including Header Page
include("header.php");

//Session Start
session_start();

// If User Is Not Login Then Redirect To Agent Register Page
if (empty($_SESSION['name'])) {
    header('location:../agent-register.php?message=Please Sign In To Enter In Your Dashboard');
}

$id = $_SESSION['id'];
// Fetching Data From booked_cars Table And Combining With Cars And Customer Table Using Inner Join
$sql = "SELECT booked_car.*, cars.model, cars.car_number, cars.agent_id, customer.name 
    FROM ((booked_car 
    INNER JOIN cars ON booked_car.car_id = cars.id)
    INNER JOIN customer ON booked_car.customer_id = customer.id) WHERE cars.agent_id = $id";
//die($sql);
$result = mysqli_query($conn, $sql);
if ($result) {
?>
<!---------------- Session Start For Booked Cars ----------------->
<div class="card mt-1">
    <!---------------- Card Head ----------------->
    <div class="card-header bg-dark">
        <!---------------- Row ----------------->
        <div class="row">
            <!---------------- Column ----------------->
            <div class="col-lg-9 col-sm-6">
                <h3 class="text-white h-font">Booked Cars Detail</h3>
            </div>
            <div class="col-lg-3 col-sm-6 d-flex">
                <input id="myInput" type="text" class="form-control me-2" placeholder="Search..">
            </div>
            <!---------------- Column End ----------------->
        </div>
        <!---------------- Row ----------------->
    </div>
    <!---------------- Card Head End ----------------->
    <!---------------- Card Body ----------------->
    <!------------------ Card To Display On Desktop ------------------>
    <div class="card-body laptop">
        <!------------------ Container ------------------>
        <div class="container-fluid mt-3 table-responsive">
            <!------------------ Table ------------------>
            <table class="table table-hover table-bordered h6" id="tb2">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Customer Name</th>
                        <th>Model Name Of Car</th>
                        <th>Car Number</th>
                        <th>Pickup Location</th>
                        <th>Drop Location</th>
                        <th>Starting Date of Travel</th>
                        <th>Booked For Days</th>
                    </tr>
                </thead>
                <tbody id="search">
                    <?php

                        while ($row = mysqli_fetch_assoc($result)) {
                            //print_r($row); 
                        ?>
                    <tr>
                        <td>&nbsp;</td>
                        <td><?php echo $row['name'];
                                    ?></td>
                        <td><?php echo $row['model'];
                                    ?></td>
                        <td><?php echo $row['car_number'];
                                    ?></td>
                        <td><?php echo $row['pickup'];
                                    ?></td>
                        <td><?php echo $row['dropl'];
                                    ?></td>
                        <td><?php echo $row['date'];
                                    ?></td>
                        <td><?php echo $row['no_of_days'];
                                    ?></td>
                    </tr>
                    <?php
                        }
                        echo '<br>';
                    }
                    ?>
                </tbody>
            </table>
            <!------------------ Table End ------------------>
        </div>
        <!------------------ Container End ------------------>
    </div>
    <!---------------- Card Body End ----------------->
    <!------------------ Card End ------------------>

    <?php
        // Fetching Data From Cars Table
        $sql = "SELECT * FROM cars WHERE agent_id = $id";
        //die($sql);
        $result = mysqli_query($conn, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                //print_r($row); 
        ?>
    <!------------------ Card To Display On Mobile ------------------>
    <div class="card my-2 mx-1 mobile">
        <div class="card-body text">
            <p><b>Customer Name: </b><span><?php echo $row['name']; ?></span></p>
            <p><b>Model Name Of Car: </b><span><?php echo $row['model']; ?></span></p>
            <p><b>Car Number: </b><span><?php echo $row['car_number']; ?></span></p>
            <p><b>Pickup Location: </b><span><?php echo $row['pickup']; ?></span></p>
            <p><b>Drop Location: </b><?php echo $row['dropl']; ?></p>
            <p><b>Starting Date of Travel: </b><?php echo $row['date']; ?></p>
            <p><b>Booked For Days: </b><?php echo $row['no_of_days']; ?></p>
        </div>
    </div>
    <!------------------ Card End ------------------>
    <?php
            }
            echo '<br>';
        }
        ?>
</div>
<!---------------- Session End For Bookeed Cars ----------------->
<!---------------- Including Footer Page ----------------->
<?php include("footer.php"); ?>