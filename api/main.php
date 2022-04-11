<?php
session_start();
require "./crud.php";

$crud = new Crud("localhost", "root", "Felabs@6986", "bikehire");

if (isset($_GET['registerUser'])) {
    $fetch_email = $crud->fetch_data("SELECT * FROM users WHERE email = '" . $_POST['email'] . "'");
    if (count($fetch_email) > 0) {
        echo "email_exists";
    } else {
        $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $insert = $crud->insert_data("users", [
            "fullName" => $_POST['fullName'],
            "email" => $_POST['email'],
            "password" => $pass_hash,
            "phone" => $_POST['phone']
        ]);

        if ($insert) {
            echo "success";
        } else {
            echo $crud->conn->error;
        }
    }
}

if (isset($_GET['loginUser'])) {
    $fetch_email = $crud->fetch_data("SELECT * FROM users WHERE email = '" . $_POST['loginEmail'] . "'");
    if (count($fetch_email) > 0) {
        foreach ($fetch_email as $row) {
            if (password_verify($_POST['loginPassword'], $row['password'])) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['fullName'] = $row['fullName'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['password'] = $_POST['loginPassword'];
                $_SESSION['contact'] = $row['contact'];
                echo "login_success";
            } else {
                echo "incorrect_pass";
            }
        }
    } else {
        echo "invalid_user";
    }
}

if (isset($_GET['bikehire'])) {
    //check whether the bike is allready hired
    $fetch = $crud->fetch_data("SELECT * FROM bikes WHERE id = '" . $_GET['bikehire'] . "'");
    foreach ($fetch as $row) {
        if ($row['status'] === "unavailable") {
            echo "bike_hired";
        } else {
            //if not proceed with the transaction
            $insert = $crud->insert_data("hire", [
                "hireFullName" => $_POST['hireFullName'],
                "hireAddress" => $_POST['hireAddress'],
                "hireContact" => $_POST['hireContact'],
                "hireReturnDate" => $_POST['hireReturnDate'],
                "hireReason" => $_POST['hireReason'],
                "hireAmount" => $_POST['hireAmount'],
                "bikeId" => $_GET['bikehire']
            ]);

            if ($insert) {
                $update = $crud->update_data("bikes", ["status" => "unavailable"], ["id" => $_GET['bikehire']]);
                if ($update) {
                    echo "success";
                } else {
                    echo $crud->conn->error;
                }
            } else {
                echo $crud->conn->error;
            }
        }
    }
}

if (isset($_GET['bikesale'])) {

    // check whether the bike is allready hired or sold
    $fetch = $crud->fetch_data("SELECT * FROM bikes WHERE id = '" . $_GET['bikesale'] . "'");
    foreach ($fetch as $row) {
        if ($row['status'] === "unavailable") {
            //if hired throw a message
            echo "bike_hired";
        } else {
            //else continue with the transaction
            $insert = $crud->insert_data("sales", [
                "saleFullName" => $_POST['saleFullName'],
                "saleAddress" => $_POST['saleAddress'],
                "saleContact" => $_POST['saleContact'],
                "saleAmount" => $_POST['saleAmount'],
                "bikeId" => $_GET['bikesale']
            ]);
            //if transaction is successfull, update bike to unavailable
            if ($insert) {
                $update = $crud->update_data("bikes", ["status" => "unavailable"], ["id" => $_GET['bikesale']]);
                if ($update) {
                    echo "success";
                } else {
                    echo $crud->conn->error;
                }
            } else {
                echo $crud->conn->error;
            }
        }
    }
}

if (isset($_GET['deletebike'])) {
    $delete = $crud->delete_data("DELETE FROM bikes WHERE id = '" . $_GET['deletebike'] . "'");
    if ($delete) {
        echo "success";
    } else {
        echo $crud->conn->error;
    }
}
