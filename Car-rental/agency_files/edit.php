<?php
// connecting database by including connect page
include("../inc/connect.php");

// Fetching Id From Edit Button Using Ajax
if (isset($_REQUEST['id2'])) {
    $id = $_POST['id2'];

    // Fetching Data From Cars To Update
    $sql = "SELECT * FROM cars WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
?>
<div class="mb-3">
    <input type="hidden" name="edit_id2" class="form-control" id="edit_id2" value="<?php echo $row['id']; ?>">
</div>
<div class="mb-3">
    <label for="model" class="form-label">Model Name Of Car</label>
    <input type="text" name="model" class="form-control" id="model" value="<?php echo $row['model']; ?>">
</div>
<div class="mb-3">
    <label for="number_plate" class="form-label">Car Number</label>
    <input type="text" name="number_plate" class="form-control" id="number_plate"
        value="<?php echo $row['car_number']; ?>">
</div>
<div class="mb-3">
    <label for="seats" class="form-label">No Of Seats In Car</label>
    <input type="text" name="seats" class="form-control" id="seats" value="<?php echo $row['seats']; ?>">
</div>
<div class="mb-3">
    <label for="rent" class="form-label">Rent Per Day</label>
    <input type="text" name="rent" class="form-control" id="rent" value="<?php echo $row['rent']; ?>">
</div>
<?php
    }
} ?>