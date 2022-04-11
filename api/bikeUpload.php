<?php


session_start();

require('./crud.php');
// header('Content-Type: application/json; charset=UTF-8');

$crud = new Crud("localhost", "root", "Felabs@6986", "bikehire");

if (isset($_GET['bikeupload'])) {


    $target_dir = "../images/uploads/";
    $target_file = $target_dir . basename($_FILES["bikeImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES["bikeImage"]["tmp_name"], $target_file)) {
        // echo "The file " . htmlspecialchars(basename($_FILES["bikeImage"]["name"])) . " has been uploaded.\n";
        // echo $target_file;
        $insert = $crud->insert_data("bikes", [
            "bikeName" => $_POST['bikeName'],
            "bikeModel" => $_POST['bikeModel'],
            "purpose" => $_POST['purpose'],
            "dateBought" => $_POST['dateBought'],
            "mileage" => $_POST['mileage'],
            "bikeImage" => $target_file,
            "price" => $_POST['bikePrice'],
            "owner" => $_SESSION['id']
        ]);

        if ($insert) {
            header("location: ../bikes.php?msg=Bike Registration successfull");
        } else {
            echo $crud->conn->error;
        }
    } else {
        header("location: ../bikes.php?err=this image is unsupported");
    }
}

if (isset($_GET['editbike'])) {
    $update = $crud->update_data("bikes", [
        "bikeName" => $_POST['bikeName'],
        "bikeModel" => $_POST['bikeModel'],
        "purpose" => $_POST['purpose'],
        "dateBought" => $_POST['dateBought'],
        "mileage" => $_POST['mileage'],
        "price" => $_POST['bikePrice'],
        "owner" => $_SESSION['id'],
        "status" => $_POST['bikestatus']
    ], ["id" => $_GET['editbike']]);
    if ($update) {
        header("location: ../edit.php?id=" . $_GET['editbike'] . "&msg=bike edited successfully");
    } else {
        echo $crud->conn->error;
    }
}
