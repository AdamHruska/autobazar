<?php include 'header.php'; ?>

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
    
            <div class="row1 d-flex w-75">
              <div class="col-md-4 col-md-5 col-sm-12">
                <div class="row">
                  <div class="col-sm-3">
                    <strong>Make:</strong>
                  </div>
                  <div class="col-sm-9">
                        <?php echo $make; ?>
                  </div>
                  <div class="col-sm-3">
                  <strong>Model:</strong>
                  </div>
                  <div class="col-sm-9">
                        <?php echo $model; ?>
                  </div>
                  <div class="col-sm-3">
                  <strong>VIN:</strong>
                  </div>
                  <div class="col-sm-9">
                        <?php echo $WIN; ?>
                  </div>
                  <div class="col-sm-3">
                  <strong>Date of Production:</strong>
                  </div>
                  <div class="col-sm-9">
                        <?php echo $dateOfProduction; ?>
                  </div>
                </div>
              </div>
              <div class="col-sm-2">
                  <strong>Description:</strong>
                  </div>
              <div class="col-sm-7">
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