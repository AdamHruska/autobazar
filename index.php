<?php include 'header.php'; ?>
<body>
    <div class="container my-5">
        <h2>List of Cars</h2>
        <a class="btn btn-primary" href="/autobazar/create.php" role="button">New Car</a>
        <br>
        <table class="table">
            <head>
                <tr>
                    <th>ID</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>VIN</th>
                    <th>Date of Production</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </head>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "autobazar";

                //vytvorenie spojenia s Databazou
                $connection = new mysqli($servername, $username, $password, $database);

                // test spojenia
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                // citanie riadkov z db a kontrola ci prebehlo spravne
                $sql = "SELECT * FROM cars";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                // citanie dat kazdeho riadku
                while($row = $result->fetch_assoc()) {
                    echo "
                    <tr onclick=\"window.location='/autobazar/detail.php?id=" . $row['id'] . "'\">
                        <td>$row[id]</td>
                        <td>$row[make]</td>
                        <td>$row[model]</td>
                        <td>$row[WIN]</td>
                        <td>$row[dateOfProduction]</td>
                        <td>$row[created_at]</td>
                        <td>
                            <a class='btn btn-primary btn-small' href='/autobazar/edit.php?id=$row[id]'>Edit</a>
                            <a class='btn btn-danger btn-small' href='/autobazar/delete.php?id=$row[id]'>Delete</a>
                        </td>
                    </tr>
                    ";
                }

                ?>

               
            </tbody>
        </table>
    </div>
</body>
</html>