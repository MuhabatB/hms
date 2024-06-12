<?php require './components/header.php' ?>
<?php require './backend/Connection.php' ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Randevu Listesi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>hasta</th>
                        <th>doktor</th>
                        <th>tarih</th>
                        <th>randevu durumu</th>
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
                                $sql = "SELECT name FROM hasta WHERE hastaID= $hastaID";
                                $hasta_res = mysqli_query($connection, $sql);
                                $userRow = mysqli_fetch_assoc($hasta_res);
                                $name = $userRow['name'];
                                echo '<td>'.$name.'</td>';

                                $doktor_id = $row['doktorID'];
                                $sql = "SELECT name FROM doktor WHERE doktorID = $doktor_id";
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