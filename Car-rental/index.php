<?php
// code for showing error 
ini_set('display_errors', 0);
ini_set('log_errors', 0);
error_reporting(E_ALL);

// Starting Session
session_start();
// connecting database by including connect page
include("config.php");

include('inc/header.php');


// Getting Message From Multiple Pages
$message = $_GET["message"];
if ($message) {
    echo "<div class='alert alert-warning alert-dismissible'>
 <i class='bi bi-check2-circle'></i>
  <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
  <strong>$message</strong>.
</div>";
}
?>
<?php
include('inc/connect.php');
?>


<!-- Carousal-->
<div class="container-fluid px-lg-4">
    <!-- Swiper -->
    <div class="swiper swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="images/car1.jpg" height="500px" class="w-100 d-block" />
            </div>
            <div class="swiper-slide">
                <img src="images/car4.jpg" height="500px" class="w-100 d-block" />
            </div>
            <div class="swiper-slide">
                <img src="images/car3.jpg" height="500px" class="w-100 d-block" />
            </div>
            <div class="swiper-slide">
                <img src="images/car4.jpg" height="500px" class="w-100 d-block" />
            </div>
            <div class="swiper-slide">
                <img src="images/car1.jpg" height="500px" class="w-100 d-block" />
            </div>
            <div class="swiper-slide">
                <img src="images/car3.jpg" height="500px" class="w-100 d-block" />
            </div>
        </div>
    </div>
</div>
<!-- Carousal END-->

<!-- Availability-->
<div class="container availability-form">
    <div class="row">

        <div class="col-lg-12 bg-white shadow p-4 rounded">
            <h5 class="mb-4">
                Check Availability
            </h5>
            <form action="">
                <div class="row align-items-end">
                    <div class="col-lg-3 mb-3">
                        <label class="form-label" style="font-weight:500;">Start Date</label>
                        <input type="date" class="form-control shadow-none">
                    </div>
                    <div class="col-lg-3 mb-3">
                        <label class="form-label" style="font-weight:500;">Number of Days</label>
                        <select class="form-select shadow-none">
                            <option value="1">1 day</option>
                            <option value="2">2 day</option>
                            <option value="3">3 day</option>
                            <option value="4">4 day</option>
                            <option value="5">More than 4 day</option>
                        </select>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <label class="form-label" style="font-weight:500;">Pick Up Location</label>
                        <input type="text" class="form-control shadow-none">
                    </div>
                    <div class="col-lg-2 mb-3">
                        <label class="form-label" style="font-weight:500;">Drop Location</label>
                        <input type="text" class="form-control shadow-none">
                    </div>
                    <div class="col-lg-1 mb-lg-3 mt-2">
                        <button type="submit" class="btn text-white shadow-none custom-bg">
                            search
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Availability End-->

<!-- our rooms-->
<h2 class="mt-5 pt-4 text-center fw-bold h-font ">AVAILABLE CARS</h2>
<div class="h-line bg-dark"></div>
<div class="container">
    <div class="row">
        <?php
        $sql = "SELECT * FROM cars";
        //die($sql);
        $result = mysqli_query($conn, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="col-lg-4 col-md-6 my-3">
            <div class="card border-0 shadow" style="max-width: 350px; margin:auto;">
                <img src="images/<?php echo $row['image']; ?>" class="card-img-top" alt="">
                <div class="card-body">
                    <h5>
                        <?php echo $row['model']; ?>
                    </h5>
                    <h6 class="mb-4">
                        <?php echo $row['rent']; ?>/day
                    </h6>

                    <div class="features mb-4">
                        <h6 class="mb-1">Features</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap ">
                            <?php echo $row['seats']; ?> Seater
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap ">
                            Diseal
                        </span>
                    </div>
                    <div class="facilities mb-4">
                        <h6 class="mb-1">Vechical Number </h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap ">
                            <?php echo $row['car_number']; ?>
                        </span>

                    </div>
                    <div class="d-flex justify-content-evenly mb-2">
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
        </div>
        <?php }
            echo "<br>";
        } ?>

        <div class="col-lg-12 text-center mt-5">
            <a href="cars.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Cars >>></a>
        </div>
    </div>
</div>
<!-- our rooms end-->

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

<!-- script for swiper  -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
var swiper = new Swiper(".swiper-container", {
    spaceBetween: 30,
    effect: "fade",
    loop: true,
    autoplay: {
        delay: 3500,
        disableOnInteraction: false,
    }
});


// modal for bookings
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
<!-- script for swiper  -->