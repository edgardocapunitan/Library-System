<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information</title>
    <link rel="stylesheet" type="text/css" href="account_management.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="media-showcase" tabindex="0"> 
<div class="form-wrapper text-center">
    <h5>Welcome to Account Management</h5>
    <h4 class="mt-4">Information Table</h4>
<div class="row justify-content-center mt-4">
    <div class="col-md-8">
        <h2>Student Table</h2>
        <div class="table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>StudentID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Contact Info</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once "database.php";
                    $data = fetchAllData();
                    if ($data) {
                        $count = 0;
                        foreach ($data as $row) {
                            if ($count >= 3) break;
                            echo "<tr>";
                            echo "<td>{$row['StudentID']}</td>";
                            echo "<td>{$row['Username']}</td>";
                            echo "<td>{$row['password']}</td>";
                            echo "<td>{$row['Contactinfo']}</td>";
                            echo "<td>{$row['email']}</td>";
                            echo "<td>";
                            echo "<div class='btn-group' role='group'>";
                            echo "</div>";
                            echo "</td>";
                            echo "</tr>";
                            $count++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="row justify-content-center mt-4">
    <div class="col-md-8">
        <div class="form-button">
            <form action="index.php">
                <button type="submit" class="btn btn-secondary">Login Again</button>
            </form>
            <form action="read.php">
                <button type="submit" class="btn btn-secondary">Home</button>
            </form>
        </div>
    </div>
</div>

</div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
