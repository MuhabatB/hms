<?php require './components/header.php' ?>
<?php require './backend/Connection.php' ?>

<?php
    $hastaName = '';
    $doktorName = '';
    $randevuDate = '';
    $randevud = '';
    $randevuId;

    if(isset($_GET['update-randevu'])){

        # Get * from randevu by id
        $id = $_GET['update-randevu'];
        $sql = "SELECT * FROM randevu WHERE randevuID = $id";
        $result = mysqli_query($connection, $sql);
        $randevuRow = mysqli_fetch_assoc($result);
        $randevuDate = $randevuRow['tarih'];
        $randevud = $randevuRow['randevu_durumu'];

        $randevuId = $id;
        $hastaID = $randevuRow['hastaID'];
        $doktorID = $randevuRow['doktorID'];

        # Get hasta info by id
        $sql = "SELECT name FROM hasta WHERE hastaID = $hastaID";
        $result = mysqli_query($connection, $sql);
        $userRow = mysqli_fetch_assoc($result);
        $hastaName = $userRow['name'];

        

        $sql = "SELECT name FROM doktor WHERE doktorID = $doktorID";
        $result = mysqli_query($connection, $sql);
        $doktorRow = mysqli_fetch_assoc($result);
        $doktorname = $doktorRow['name'];

    }
?>

<div class="container">
    <div class="">
        <form action="./backend/hasta_mysql.php" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> hasta Name</label>
                <input type="text" class="form-control" value="<?php echo $hastaName ?>" disabled>
            </div>
           
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">doktorname</label>
                <input type="text" class="form-control" value="<?php echo $doktorname ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">tarih</label>
                <input type="text" class="form-control" value="<?php echo $randevuDate ?>" disabled>
            </div>
         
            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">randevu durumu</label>
                <select class="form-control" name="randevu_durumu" aria-label="Default select example" required>
                    <option value="<?php echo $randevud ?>"><?php echo $randevud ?></option>
                    <option value="randevu geçerli">randevu geçerli</option>
                    <option value="randevu iptal edildi">randevu iptal edildi</option>
                    <option value="randevu zamanı geçti">randevu zamanı geçti</option>

                </select>
            </div>
            <button value="<?php echo $randevuId ?>" class="btn btn-primary" type="submit" name="update-randevu">update randevu</button>
        </form>
    </div>
</div>

<?php require './components/footer.php' ?>