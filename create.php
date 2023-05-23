<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "autobazar";

//vytvorenie spojenia s Databazou
$connection = new mysqli($servername, $username, $password, $database);

$make = "";
$model = "";
$WIN = ""; 
$dateOfProduction = "";
$description = "";
$img = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $make = $_POST["make"];
    $model = $_POST["model"];
    $WIN = $_POST["WIN"];
    $dateOfProduction = $_POST["dateOfProduction"];
    $description = $_POST["description"];
    $img = $_POST["img"];

    do {
        if( empty($make) || empty($model) || empty($WIN) || empty($dateOfProduction)  || empty($description) ||  empty($img) ) {
            $errorMessage = "All the fields are required";
            break;
        }

        // pridavanie auto do db
        $sql = "INSERT INTO cars (make, model, WIN, dateOfProduction, description, img)" .
                "VALUES ('$make', '$model', '$WIN', '$dateOfProduction', '$description', '$img')";
        $result = $connection->query($sql);

        if(!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $make = "";
        $model = "";
        $WIN = ""; 
        $dateOfProduction = "";
        $description = "";
        $img = "";

        $successMessage = "Car added correctly";

        //redirect na index page
        header("location: /autobazar/index.php");
        exit;

    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autobazar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>New Car</h2>

        <?php 
            //ked je error message prazdny nevypise ho
           if( !empty($errorMessage)) {
                echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>  
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";    
            
           } 
        ?>

        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Make</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="make" value="<?php echo $make; ?>"> 
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Model</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="model" value="<?php echo $model; ?>"> 
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">VIN</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="WIN" value="<?php echo $WIN; ?>"> 
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Date of Production</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="dateOfProduction" value="<?php echo $dateOfProduction; ?>"> 
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="description" value="<?php echo $description; ?>"> 
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Image link</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="img" value="<?php echo $img; ?>"> 
                </div>
            </div>
            

        
           <?php 
                //success message
                if ( !empty($successMessage) ) {
                    echo "
                        <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <strong>$successMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        </div>
                    </div>
                    ";
                    
                }
           ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/autobazar/index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>