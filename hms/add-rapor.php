<?php require './components/header.php' ?>
<?php require './backend/Connection.php' ?>


<div class="container">
    <div class="">
        <form action="./backend/hasta_mysql.php" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Hasta Adı</label>
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
                <label for="exampleFormControlInput1" class="form-label">Doktor ADI</label>
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
                <label for="exampleFormControlInput1" class="form-label">İçerik</label>
                <input type="text" placeholder="" class="form-control" name="icerik" required>
            </div>
    
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tarih</label>
                <input type="datetime-local" id="tarih" name="tarih">

            </div>
            <button class="btn btn-primary" type="submit" name="add-rapor-btn">Add rapor</button>
        </form>
    </div>
</div>

<?php require './components/footer.php' ?>