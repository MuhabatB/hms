<?php require './components/header.php' ?>
<?php require './backend/Connection.php' ?>

<div class="container">
    <div class="">
        <form action="./backend/hasta_mysql.php" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">hasta</label>
                <select class="form-control" name="hastaID" aria-label="Default select example" required>
                    <?php
                        $sql = "SELECT * FROM hasta";
                        $result = mysqli_query($connection, $sql);
                        $check = mysqli_num_rows($result);
                        if($check > 0){
                    ?>
                        <?php    while($row = mysqli_fetch_assoc($result)){ ?>
                            <option value="<?php  echo $row['hastaID']; ?>"><?php  echo $row['name']; ?></option>
                        <?php
                            }
                        ?>
                    <?php
                        }
                    ?>
                </select>
            </div>
           
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">doktor</label>
                <select class="form-control" name="doktorID" aria-label="Default select example" required>
                    <?php
                        $sql = "SELECT * FROM doktor";
                        $result = mysqli_query($connection, $sql);
                        $check = mysqli_num_rows($result);
                        if($check > 0){
                    ?>
                        <?php    while($row = mysqli_fetch_assoc($result)){ ?>
                            <option value="<?php  echo $row['doktorID']; ?>"><?php  echo $row['name']; ?></option>
                        <?php
                            }
                        ?>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">doktor</label>
                <input type="datetime-local" id="tarih" name="tarih">

            </div>
            <button class="btn btn-primary" type="submit" name="add-randevu-btn">Add randevu</button>
        </form>
    </div>
</div>

<?php require './components/footer.php' ?>