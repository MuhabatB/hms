<?php require './components/header.php' ?>

<div class="container">
    <div class="">
        <form action="./backend/hasta_mysql.php" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Doktor Adı</label>
                <input type="text" placeholder="" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Soyad</label>
                <input type="text" placeholder="" class="form-control" name="soyad" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Hastane</label>
                <input type="text" placeholder="" class="form-control" name="hastane" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Uzmanlık alanı</label>
                <input type="text" placeholder="" class="form-control" name="uzmanlik_alan" required>
            </div>
    
            <button class="btn btn-primary" type="submit" name="add-doktor-btn">Add Doktor</button>
        </form>
    </div>
</div>

<?php require './components/footer.php' ?>