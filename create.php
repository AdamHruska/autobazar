<?php
   $make = "";
   $model = "";
   $WIN = ""; 
   $dateOfProduction = "";

   if ($_SERVER['REQEUEST_METHOD'] == 'POST') {
        $make = $_POST["make"];
        $model = $_POST["model"];
        $WIN = $_POST["WIN"];
        $dateOfProduction = $_POST["dateOfProduction"];
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
</head>
<body>
    <div class="container my-5">
        <h2>New Car</h2>
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