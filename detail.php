
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/autobazar/style/detail.css">
</head>
<body>
<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "autobazar";

    //vytvorenie spojenia s Databazou
    $connection = new mysqli($servername, $username, $password, $database); 
    //ziskanie id z parametru
    $id=$_GET['id'];

    //ziskanie dat pre dane id
    $sql = "SELECT * FROM cars WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    $make = $row["make"];
    $model = $row["model"];
    $WIN = $row["WIN"];
    $dateOfProduction = $row["dateOfProduction"];
    $description = $row["description"];
    $img = $row["img"];

?>    

<div class="container container-contact bootstrap snippets bootdeys bootdey">
    <div class="row decor-default">
        <div class="col-md-12">
          <div class="contact">
          <h1 class="text-center mb-3"><?php echo $make;?> <?php echo $model;?></h1>
            <div class="controls">
              <img src="<?php echo $img;?>" alt="cover" class="cover">
            </div>
    
            <div class="row1">
              <div class="col-md-4 col-md-5 col-xs-12">
                <div class="row">
                  <div class="col-sm-3">
                    Make:
                  </div>
                  <div class="col-sm-9">
                        <?php echo $make; ?>
                  </div>
                  <div class="col-sm-3">
                    Model:
                  </div>
                  <div class="col-sm-9">
                        <?php echo $model; ?>
                  </div>
                  <div class="col-sm-3">
                    VIN:
                  </div>
                  <div class="col-sm-9">
                        <?php echo $WIN; ?>
                  </div>
                  <div class="col-sm-3">
                    Date of Production:
                  </div>
                  <div class="col-sm-9">
                        <?php echo $dateOfProduction; ?>
                  </div>
                </div>
              </div>
              <div class="col-lg-8 col-md-7 col-xs-12">
                <p class="contact-description"><?php echo $description; ?></p>
              </div>
            </div>
          </div>
          <div class="text-center my-2">
            <a class='btn btn-dark btn-lg' href='/autobazar/index.php'>Home Page</a>
          </div>
        </div>        
      </div>   
  </div>
</body>
</html>