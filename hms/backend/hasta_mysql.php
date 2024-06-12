<?php

# DB connection
require 'Connection.php';


# Add Hastalar
if(isset($_POST['add-hasta-btn'])){
    
    $fullname = test_input($_POST['fullname']);
    $age = test_input($_POST['age']);
    $phone = test_input($_POST['phone']);
    $cinsiyet = test_input($_POST['cinsiyet']);
    
    # Mysql query for inserting the new hasta into database...
    $sql = "INSERT INTO hasta(name, age, phone, cinsiyet) VALUES('$fullname','$age','$phone', '$cinsiyet');";
    mysqli_query($connection, $sql);
    header("Location: /hms/hasta.php?add-hasta=true");
    exit();
}

# Delete Hasta
if(isset($_GET['delete-hasta'])){
    $id = $_GET['delete-hasta'];
    
    $sql = "DELETE FROM hasta WHERE hastaID=$id;";
    mysqli_query($connection, $sql);
    header("Location: /hms/hasta.php?hasta-deleted=true");
    exit();
}
# add rapor

if(isset($_POST['add-rapor-btn'])){
    
    $hastaId = test_input($_POST['hastaID']);
    $doktorId = test_input($_POST['doktorID']);
    
  
        # Mysql query for inserting the new hasta into database...

    $currentDateTime = test_input($_POST['tarih']);
    $icerik = test_input($_POST['icerik']);

    $new_sql = "INSERT INTO raporlar(hastaID, doktorID, tarih, icerik) VALUES('$hastaId','$doktorId','$currentDateTime','$icerik');";
    mysqli_query($connection, $new_sql);
    header("Location: /hms/rapor.php?add-rapor=true");
    exit();
    
    }

# Delete rapor
if(isset($_GET['delete-rapor'])){
    $id = $_GET['delete-rapor'];
    $sql = "DELETE FROM raporlar WHERE ID=$id;";
    mysqli_query($connection, $sql);
    header("Location: /hms/rapor.php?rapor-deleted=true");
    exit();
}

# Add doktor
if(isset($_POST['add-doktor-btn'])){
    
    $doktorName = test_input($_POST['name']);
    $doktorsoyad = test_input($_POST['soyad']);

    $hastane = test_input($_POST['hastane']);
    $uzmanlik_alan = test_input($_POST['uzmanlik_alan']);
    
    # Mysql query for inserting the new hasta into database...
    $sql = "INSERT INTO doktor(name, soyad, hastane,uzmanlik_alan) VALUES('$doktorName','$doktorsoyad','$hastane' ,'$uzmanlik_alan');";
    mysqli_query($connection, $sql);
    header("Location: /hms/doktor.php?add-doktor=true");
    exit();
}

# Delete doktor
if(isset($_GET['delete-doktor'])){
    $id = $_GET['delete-doktor'];
    $sql = "DELETE FROM doktor WHERE doktorID=$id;";
    mysqli_query($connection, $sql);
    header("Location: /hms/doktor.php?doktor-deleted=true");
    exit();
}

# Add randevu
if(isset($_POST['add-randevu-btn'])){
    
    $hastaId = test_input($_POST['hastaID']);
    $doktorId = test_input($_POST['doktorID']);
    
  
        # Mysql query for inserting the new hasta into database...

    $currentDateTime = test_input($_POST['tarih']);
    $randevu_durumu = "Geçerli";

    $new_sql = "INSERT INTO randevu(hastaID, doktorID, tarih, randevu_durumu) VALUES('$hastaId','$doktorId','$currentDateTime','$randevu_durumu');";
    mysqli_query($connection, $new_sql);
    header("Location: /hms/randevu.php?add-randevu=true");
    exit();
    
    }


# randevu Delete
if(isset($_GET['delete-randevu'])){
    $id = $_GET['delete-randevu'];
    $sql = "DELETE FROM randevu WHERE randevuID=$id;";
    mysqli_query($connection, $sql);
    header("Location: /hms/randevu.php?randevu-deleted=true");
    exit();
}

# Update randevu
if(isset($_POST['update-randevu'])) {
    $randevu_durumu = test_input($_POST['randevu_durumu']);
    $randevuID = test_input($_POST['update-randevu']);

    $sql = "UPDATE randevu SET randevu_durumu='$randevu_durumu' WHERE randevuID=$randevuID";
    mysqli_query($connection, $sql);
    header("Location: /hms/randevu.php?randevu-updated=true");
    exit();
}

/*create a function that will do all the checking for us (which is much more convenient than writing the same code over and over again). */
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
