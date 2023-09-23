<?php
//Session Start
session_start();

// Connecting Database By Including Config Page
include("inc/connect.php");

// Fetching Id From Index Page Using Ajax And Php
if (isset($_REQUEST['id'])) {
    $id1 = $_POST['id'];
    $id2 = $_SESSION['id'];

    //echo $id;
?>
<div class="row">
    <div class="col-sm-6 mb-3">
        <input class="form-control controls" name="car_id" type="hidden" value="<?php echo $id1; ?>">
    </div>
    <div class="col-sm-6 mb-3">
        <input class="form-control controls" name="customer_id" type="hidden" value="<?php echo $id2; ?>">
    </div>
    <div class="col-md-6 ps-0 mb-3">
        <label for="pickup" class="form-label">Pick Up Location</label>
        <input type="text" name="pickup" class="form-control shadow-none">
    </div>
    <div class="col-md-6 ps-0 mb-3">
        <label for="drop" class="form-label">Drop Location</label>
        <input type="text" name="drop" class="form-control shadow-none">
    </div>
    <div class="col-md-6 ps-0 mb-3">
        <label class="form-label">Select Start Date</label>
        <input type="date" name="start_date" class="form-control shadow-none">
    </div>
    <div class="col-md-6 ps-0 mb-3">
        <label for="days" class="form-label">Select Number of Days</label>
        <select id="inputState" name="filter_config" class="form-select shadow-none" id="days">
            <option value="">Number Of Days</option>
            <option value="1">
                1 Day
            </option>
            <option value="2">
                2 Days
            </option>
            <option value="3">
                3 Days
            </option>
            <option value="4">
                4 Days
            </option>
            <option value="5">
                5 Days
            </option>
            <option value="5">
                More Than 5 Days
            </option>
        </select>
    </div>
</div>

</div>
<!---------------- Row End ----------------->
<?php } ?>