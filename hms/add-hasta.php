<?php require './components/header.php' ?>

<div class="container">
    <div class="">
        <form action="./backend/hasta_mysql.php" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Fullname</label>
                <input type="text" placeholder="Fullname" class="form-control" name="fullname" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">age</label>
                <input type="text" placeholder="12" class="form-control" name="age" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                <input type="text" placeholder="+90" class="form-control" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">cinsiyet</label>
                <input type="text" placeholder="kadın-erkek" class="form-control" name="cinsiyet" required>
            </div>
            <button class="btn btn-primary" type="submit" name="add-hasta-btn">Add Hasta</button>
        </form>
    </div>
</div>

<?php require './components/footer.php' ?>
