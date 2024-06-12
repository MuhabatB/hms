<?php require './components/header.php' ?>
<?php require './backend/Connection.php' ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Doktorlar listesi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Doktor adı</th>
                        <th>Soyad</th>
                        <th>Hastane</th>
                        <th>Uzmanlık alan</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sql = "SELECT * FROM doktor";
                    $result = mysqli_query($connection, $sql);
                    $check = mysqli_num_rows($result);
                    if($check > 0){
                ?>
                    <?php    while($row = mysqli_fetch_assoc($result)){ ?>
                        <tr>
                            <td><?php  echo $row['name']; ?></td>
                            <td><?php  echo $row['soyad']; ?></td>
                            <td><?php  echo $row['hastane']; ?></td>
                            <td><?php  echo $row['uzmanlik_alan']; ?></td>

                            <td>
                            <a href="/hms/backend/hasta_mysql.php?delete-doktor=<?php echo $row['doktorID']; ?>" name="delete-doktor" class="btn btn-danger">Delete</a>
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