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
?>
<!---------------- Session Start For Dashboard ----------------->
<div class="card mt-1">
    <!---------------- Card Head ----------------->
    <div class="card-header bg-dark">
        <div class="row">
            <div class="col-lg-9 col-sm-6">
                <h3 class="text-white h-font">Dashboard</h3>
            </div>
        </div>
    </div>
    <!---------------- Card Head End ----------------->
</div>
<!---------------- Container ----------------->
<div class="container my-5">
    <!---------------- Row ----------------->
    <div class="row">
        <!---------------- Column ----------------->
        <div class="col-sm-6">
            <div class="card no-gutters">
                <div class="text-center mt-3">
                    <h4>Available Cars</h4>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="bg-success text-white text-center p-2 icon">
                            <i class="bi bi-car-front-fill" style="font-size:50px"></i>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-center p-2 icon">
                            <h1> <?php
                                    $id = $_SESSION['id'];
                                    $sql = "SELECT * FROM cars WHERE agent_id = $id";
                                    //die($sql);
                                    $query = $conn->query($sql);
                                    echo "$query->num_rows" . " Cars";
                                    ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card no-gutters">
                <div class="text-center mt-3">
                    <h4>Booked Cars</h4>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="bg-warning text-white text-center p-2 icon">
                            <i class="bi bi-person-fill" style="font-size:50px"></i>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-center p-2 icon">
                            <h1> <?php
                                    $id = $_SESSION['id'];
                                    $sql = "SELECT booked_car.*, cars.model, cars.car_number, cars.agent_id, customer.name 
                            FROM ((booked_car 
                            INNER JOIN cars ON booked_car.car_id = cars.id)
                            INNER JOIN customer ON booked_car.customer_id = customer.id) WHERE cars.agent_id = $id";
                                    //die($sql);
                                    $query = $conn->query($sql);
                                    echo "$query->num_rows" . " Cars";
                                    ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!---------------- Column ----------------->
    </div>
    <!---------------- Row ----------------->
</div>
<!---------------- Container ----------------->
<!---------------- Session End For Dashboard ----------------->
<!---------------- Including Footer Page ----------------->
<?php include("footer.php"); ?>