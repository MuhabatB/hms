<?php require './components/header.php' ?>
<?php require './backend/Connection.php' ?>

<!-- Analitics -->
<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tüm Hastalar</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                                $sql = "SELECT COUNT(*) AS row_count FROM hasta;";
                                $res = mysqli_query($connection, $sql);
                                if($res) {
                                    $row = mysqli_fetch_assoc($res);
                                    $rowCount = $row['row_count'];
                                    echo $rowCount;
                                }
                            ?>
                        </div>
                        <div class="row no-gutters align-items-center">
                            <a href="/hms/hasta.php" class="btn btn-success mt-4">View</a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tüm Randevular</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                                $sql = "SELECT COUNT(*) AS row_count FROM randevu;";
                                $res = mysqli_query($connection, $sql);
                                if($res) {
                                    $row = mysqli_fetch_assoc($res);
                                    $rowCount = $row['row_count'];
                                    echo $rowCount;
                                }
                            ?>
                        </div>
                        <div class="row no-gutters align-items-center">
                            <a href="/hms/randevu.php" class="btn btn-success mt-4">View</a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

   

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Tüm Doktorlar</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                                $sql = "SELECT COUNT(*) AS row_count FROM doktor;";
                                $res = mysqli_query($connection, $sql);
                                if($res) {
                                    $row = mysqli_fetch_assoc($res);
                                    $rowCount = $row['row_count'];
                                    echo $rowCount;
                                }
                            ?>
                        </div>
                        <div class="row no-gutters align-items-center">
                            <a href="/hms/doktor.php" class="btn btn-success mt-4">View</a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Orders List -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tüm Randevular</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Hasta</th>
                        <th>Doktor</th>
                        <th>Tarih</th>
                        <th>Randevu durumu</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sql = "SELECT * FROM randevu";
                    $result = mysqli_query($connection, $sql);
                    $check = mysqli_num_rows($result);
                    if($check > 0){
                ?>
                    <?php    while($row = mysqli_fetch_assoc($result)){ ?>
                        <tr>
                            <?php
                                $hastaID = $row['hastaID'];
                                $sql = "SELECT name FROM hasta WHERE hastaID = $hastaID";
                                $customer_res = mysqli_query($connection, $sql);
                                $userRow = mysqli_fetch_assoc($customer_res);
                                $name = $userRow['name'];
                                echo '<td>'.$name.'</td>';


                                $doktorID = $row['doktorID'];
                                $sql = "SELECT name FROM doktor WHERE doktorID = $doktorID";
                                $doktor_res = mysqli_query($connection, $sql);
                                $doktorRow = mysqli_fetch_assoc($doktor_res);
                                $doktorName = $doktorRow['name'];
                                echo '<td>'.$doktorName.'</td>';
                                
                            ?>
                            <td><?php  echo $row['tarih']; ?></td>
                            <td><?php  echo $row['randevu_durumu']; ?></td>
                            <td>
                            <a href="/hms/backend/hasta_mysql.php?delete-randevu=<?php echo $row['randevuID']; ?>" name="delete-randevu" class="btn btn-danger">Delete</a>
                            <a href="/hms/update-randevu.php?update-randevu=<?php echo $row['randevuID']; ?>" name="update-randevu" class="btn btn-success">Update</a>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require './components/footer.php' ?>
