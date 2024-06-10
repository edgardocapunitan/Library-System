<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["StudentID"])) {
    $id = $_GET["StudentID"];
    require_once "database.php"; 

    $sql = "SELECT * FROM tblstudents WHERE StudentID = $StudentID";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data not found.";
    }

    $conn->close();
}

include 'header.php';
?>

<div class="row justify-content-center mt-4">
    <div class="col-md-8">
        <h2>Edit Data</h2>
        <form action="save.php" method="post">
            <input type="hidden" name="StudentID" value="<?= $row['StudentID'] ?>">
            <div class="form-group">
                <label for="fullname">Fullname:</label>
                <input type="text" name="Username" class="form-control" value="<?= $row['Username'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Data</button>
        </form>
    </div>
</div>

<?php
include 'footer.php'; 
?>
