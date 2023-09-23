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

// Fetching Data From Cars Table
$sql = "SELECT * FROM cars WHERE agent_id = $id";
//die($sql);
$result = mysqli_query($conn, $sql);
if ($result) {
?>
<!---------------- Session Start For Available Cars ----------------->
<div class="card mt-1">
    <!---------------- Card Head ----------------->
    <div class="card-header bg-dark">
        <!---------------- Row ----------------->
        <div class="row">
            <!---------------- Column ----------------->
            <div class="col-lg-9 col-sm-6">
                <h3 class="text-white h-font">Available Cars For Rent</h3>
            </div>
            <div class="col-lg-3 col-sm-6 d-flex">
                <input id="myInput" type="text" class="form-control me-2" placeholder="Search..">
                <!-- Button trigger modal -->
                <a type="button" class="btn btn-success me-3" data-toggle="popover" title="Add" data-bs-toggle="modal"
                    data-bs-target="#modal2">
                    <i class="bi bi-plus-circle me-1"></i><span>Add</span>
                </a>
                <!------------------ Button trigger modal End ------------------->
                <!------------------ Modal For Adding Cars ------------------>
                <form action="add_car.php" enctype="multipart/form-data" method="post">
                    <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="add" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="add">Add Car</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <input type="hidden" name="agent_id" class="form-control" id="agent_id"
                                            value="<?php echo $id; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="model" class="form-label">Model Name Of Car</label>
                                        <input type="text" name="model" class="form-control" id="model"
                                            placeholder="Enter Model Name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Car Image</label>
                                        <input type="file" class="form-control" name="filetoupload" id="filetoupload"
                                            placeholder="Upload File">
                                    </div>
                                    <div class="mb-3">
                                        <label for="number_plate" class="form-label">Car Number</label>
                                        <input type="text" name="number_plate" class="form-control" id="number_plate"
                                            placeholder="Enter Car Number">
                                    </div>
                                    <div class="mb-3">
                                        <label for="seats" class="form-label">No Of Seats In Car</label>
                                        <input type="text" name="seats" class="form-control" id="seats"
                                            placeholder="Enter No Of Seats In Car">
                                    </div>
                                    <div class="mb-3">
                                        <label for="rent" class="form-label">Rent Per Day</label>
                                        <input type="text" name="rent" class="form-control" id="rent"
                                            placeholder="Enter Rent Per Day Only In Number">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" name="submit"
                                        value="upload">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!------------------ Modal End ------------------>
            </div>
        </div>
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
                        <th>Model Name Of Car</th>
                        <th>Car Image</th>
                        <th>Car Number</th>
                        <th>No Of Seats In Car</th>
                        <th>Rent Per Day</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="search">
                    <?php

                        while ($row = mysqli_fetch_assoc($result)) {
                            //print_r($row); 
                        ?>
                    <tr>
                        <td>&nbsp;</td>
                        <td><?php echo $row['model'];
                                    ?></td>
                        <td><img src="../uploads/<?php echo $row['image']; ?>" width="50" height="30" alt=""></td>
                        <td><?php echo $row['car_number'];
                                    ?></td>
                        <td><?php echo $row['seats'];
                                    ?></td>
                        <td><?php echo $row['rent'];
                                    ?></td>
                        <td>
                            <button class="btn btn-primary edit2 my-1 " id="<?php echo $row['id']; ?>">Edit</button>
                        </td>

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
            <!------------------ Modal Button Trigger ------------------>
            <div style="float: right;">
                <button class="btn btn-primary edit2 my-1 " id="<?php echo $row['id']; ?>">Edit</button>
            </div>
            <!------------------ Modal Button Trigger End ------------------>
            <p><b>Model Name Of Car: </b><span><?php echo $row['model']; ?></span></p>
            <p><b>Car Image: </b>
                <span>
                    <img src="uploads/<?php echo $row['banner']; ?>" width="50" height="30" alt="">
                </span>
            </p>
            <p><b>Car Number: </b><span><?php echo $row['car_number']; ?></span></p>
            <p><b>No Of Seats In Car: </b><span><?php echo $row['seats']; ?></span></p>
            <p><b>Rent Per Day: </b><?php echo $row['rent']; ?></p>
        </div>
    </div>
    <!------------------ Card End ------------------>
    <?php
            }
            echo '<br>';
        }
        ?>


</div>
<!---------------- Session End For Available Cars ----------------->

<!---------------- Modal For Editing Car Data ----------------->
<form action="update.php" enctype="multipart/form-data" method="post">
    <div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="add" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add">Edit Car Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="info_update">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" name="submit" value="upload">Edit</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!---------------- Modal End ----------------->
<!---------------- Including Footer Page ----------------->
<?php include("footer.php"); ?>