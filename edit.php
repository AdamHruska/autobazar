<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "autobazar";

    //vytvorenie spojenia s Databazou
    $connection = new mysqli($servername, $username, $password, $database);

    $id = "";
    $make = "";
    $model = "";
    $WIN = ""; 
    $dateOfProduction = "";
    
    $errorMessage = "";
    $successMessage = "";

    if( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
        //GET methoda (vypisat udaje auta)
        if (!isset($_GET["id"]) ) {
            header("location: /autobazar/index.php");
            exit;
        }

        $id = $_GET["id"];

        // precitanie riadku db podla id auta
        $sql = "SELECT * FROM cars WHERE id=$id";
        $result = $connection->query($sql);
        $row = $result->fetch_assoc();

        if(!$row) {
            header("location: /autobazar/index.php");
            exit;
        }

        $make = $row["make"];
        $model = $row["model"];
        $WIN = $row["WIN"]; 
        $dateOfProduction = $row["dateOfProduction"];

    }
    else {
        // POST (update dat aut)
        
        $id = $_POST["id"];
        $make = $_POST["make"];
        $model = $_POST["model"];
        $WIN = $_POST["WIN"]; 
        $dateOfProduction = $_POST["dateOfProduction"];

        do {
            if( empty($id) || empty($make) || empty($model) || empty($WIN) || empty($dateOfProduction) ) {
                $errorMessage = "All the fields are required";
                break;
            }

            $sql = "UPDATE cars " . 
                    "SET make = '$make', model = '$model', WIN = '$WIN', dateOfProduction = '$dateOfProduction' " .
                    "WHERE id=$id";
            //vykonanie sql query
            $result = $connection->query($sql);
            // test ci sql query prebehlo spravne
            if (!$result) {
                $errorMessage = "Invalid query: " . $connection->error;
                break;
            }

            $successMessage = "Client updated correctly";

            header("location: /autobazar/index.php");
            exit;

        } while(false);
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
            <input type="hidden" name="id" value="<?php echo $id; ?>">
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