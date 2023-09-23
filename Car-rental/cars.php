<?php
include('inc/header.php');
?>
<?php
include('inc/connect.php');
?>
<!-- Heading avaiable cars -->
<div class="my-5 px4">
    <h2 class="fw-bold h-font text-center">
        AVAILABLE CARS
    </h2>
    <div class="h-line bg-dark"></div>
</div>

<!-- Cards and filter  start-->
<div class="container ">
    <div class="row">
        <!-- Cars avaiable filter start-->
        <div class="col-lg-3 col-md-12 mb-lg-0 mb-4  px-lg-0 ">
            <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow ">
                <div class="container-fluid flex-lg-column align-items-stretch">
                    <h4 class="mt-2 ">FILTERS</h4>
                    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                        data-bs-target="#filterDropdown" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse flex-column mt-2 align-items-stretch" id="filterDropdown">

                        <div class="border bg-light p-3 rounded mb-3">
                            <h5 class="mb-3" style="font-size:18px;">CHECK AVAILABILITY</h5>
                            <label class="form-label">Start Date</label>
                            <input type="date" class="form-control shadow-none mb-3">
                            <label class="form-label">Number of Days</label>
                            <select class="form-select shadow-none">
                                <option value="1">1 day</option>
                                <option value="2">2 day</option>
                                <option value="3">3 day</option>
                                <option value="4">4 day</option>
                                <option value="5">More than 4 day</option>
                            </select>
                        </div>

                        <div class="border bg-light p-3 rounded mb-3">
                            <h5 class="mb-3" style="font-size:18px;">Location</h5>
                            <div class="d-flex">
                                <div class="me-3">
                                    <label class="form-label">Pick up</label>
                                    <input type="text" class="form-control shadow-none mb-3">
                                </div>
                                <div>
                                    <label class="form-label">Drop</label>
                                    <input type="text" class="form-control shadow-none mb-3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- Cars avaiable filter end-->
        </nav>

        <!-- Cars avaiable  start-->
        <div class="col-lg-9 col-md-12 px-4">
            <?php
            $sql = "SELECT * FROM cars";
            //die($sql);
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="card mb-4 border-0 shadow">

                <div class="row g-0  p-3 align-items-center">

                    <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                        <img src="images/<?php echo $row['image']; ?>" class="img-fluid rounded" alt="...">
                    </div>
                    <div class="col-md-5 px-lg-3 px-md-3 px-0">
                        <h5 class="mb-3 ">
                            <?php echo $row['model']; ?>
                        </h5>
                        <div class="features mb-3">
                            <h6 class="mb-1">Features</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                <?php echo $row['seats']; ?> Seater
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                Diseal
                            </span>
                        </div>
                        <div class="facilities mb-3">
                            <h6 class="mb-1">Vechical Number</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                <?php echo $row['car_number']; ?>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                        <h6 class="mb-4">
                            <?php echo $row['rent']; ?>/day
                        </h6>
                        <?php if ($_SESSION['name']) {

                                    $name = $_SESSION['name'];
                                    $sqla = "SELECT name from customer WHERE name = '$name'";
                                    $cat = mysqli_query($conn, $sqla);
                                    if ($cat) {
                                        while ($rows = mysqli_fetch_assoc($cat)) {
                                            echo "<button id=" . $row['id'] . " class='btn lead btn-sm btn-outline-dark shadow-none'>Rent Car</button>";
                                        }
                                    }
                                } else {
                                    echo "<a data-bs-toggle='modal' data-bs-target='#LoginModal' class='btn  btn-sm btn-outline-dark shadow-none'>Book Now</a>";
                                } ?>
                    </div>

                </div>

            </div>
            <?php }
                echo "<br>";
            } ?>
        </div>
        <!-- Cars avaiable  end-->
    </div>
</div>

<!-- Modal for booking -->
<div class="modal fade" id="book" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title d-flex align-items-center"><i class="bi bi-person-lines-fill  fs-3 me-2"></i>Rent
                    A Car</h5>
                <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="actions/booking.php" method="post">
                    <div class="container-fluid">
                        <div class="info">

                        </div>
                    </div>
                    <div class="text-center my-1">
                        <button type="submit" name="submit" class="btn btn-dark shadow-none">Book</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal for booking end-->

<?php
include('inc/footer.php');
?>

<!-- javascript modal for bookings -->
<script>
$(document).on('click', '.lead', function() {
    var id = $(this).attr('id');
    //alert(id);
    $.ajax({
        url: "modal.php",
        type: "post",
        data: {
            id: id
        },
        success: function(data) {
            $(".info").html(data);
            $("#book").modal('show');
        }
    });
});
</script>
<!-- javascript modal for bookings end -->