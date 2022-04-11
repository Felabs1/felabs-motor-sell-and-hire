function loginDrop(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}

function openModal(x) {
  $(`#${x}`).show();
}

("use strict");
const registerUser = () => {
  var fullName = $("#fullName");
  var email = $("#email");
  var password = $("#password");
  var confirmPassword = $("#confirmPassword");
  var phone = $("#phone");

  if (
    fullName.val() === "" ||
    password.val() === "" ||
    confirmPassword.val() === "" ||
    phone.val() === ""
  ) {
    alert("please fill  in all the fields");
    return;
  }

  if (
    /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.val()) === false
  ) {
    alert("please enter a valid email");
    return;
  }

  if (password.val() !== confirmPassword.val()) {
    alert("your passwords arent matching");
    return;
  }

  $.ajax({
    url: "./api/main.php?registerUser=true",
    method: "POST",
    data: $("#frmSignup").serialize(),
    success: function (data) {
      if (data === "success") {
        alert("Registration success, Now you can log in");
        window.location.href = "./index.php";
      } else if (data === "email_exists") {
        alert("this email is allready taken");
      } else {
        alert("internal server error");
        console.log(data);
      }
    },
  });
};

const login = () => {
  var email = $("#loginEmail");
  var password = $("#loginPassword");

  if (email.val() === "" || password.val() === "") {
    alert("please fill  in all eht fields");
    return;
  }

  if (
    /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.val()) == false
  ) {
    alert("please enter a valid email");
    return;
  }

  $.ajax({
    url: "./api/main.php?loginUser=true",
    method: "POST",
    data: $("#frmlogin").serialize(),
    success: function (data) {
      if (data === "login_success") {
        alert("login successfull. redirecting...");
        window.location.href = "./index.php";
      } else if (data === "incorrect_pass") {
        alert("wrong password");
      } else if (data === "invalid_user") {
        alert("this username is invalid or not registered");
      } else {
        alert("internal server error");
        console.log(data);
      }
    },
  });
};

const hire = (x) => {
  var hireFullName = $("#hireFullName");
  var hireAddress = $("#hireAddress");
  var hireContact = $("#hireContact");
  var hireReturnDate = $("#hireReturnDate");
  var hireReason = $("#hireReason");
  var hireAmount = $("#hireAmount");

  if (
    hireFullName.val === "" ||
    hireAddress.val() === "" ||
    hireContact.val() === "" ||
    hireReturnDate.val() === "" ||
    hireReason.val() === "" ||
    hireAmount.val() === ""
  ) {
    alert("please fill in all the forms");
    return;
  }

  $.ajax({
    url: "./api/main.php?bikehire=" + x,
    method: "post",
    data: $("#frmhire").serialize(),
    success: (data) => {
      if (data === "bike_hired") {
        alert("the bike is allready hired");
      } else if (data === "success") {
        alert("successfully booked, we`ll contact you in a while");
      } else {
        alert("internal server error");
        console.log(data);
      }
    },
  });
};

const buy = (x) => {
  var saleFullName = $("#saleFullName");
  var saleAddress = $("#saleAddress");
  var saleContact = $("#saleContact");
  var saleAmount = $("#saleAmount");

  if (
    saleFullName.val() === "" ||
    saleAddress.val() === "" ||
    saleContact.val() === "" ||
    saleAmount.val() === ""
  ) {
    alert("please fill in all the fields");
    return;
  }

  $.ajax({
    url: `./api/main.php?bikesale=${x}`,
    method: "post",
    data: $("#frmsell").serialize(),
    success: (data) => {
      // console.log(data)
      if (data === "bike_hired") {
        alert("the bike has allready been sold out");
        window.location.href = "./bikes.php";
      } else if (data === "success") {
        alert("Bought bike successfully");
        window.location.href = "./bikes.php";
      } else {
        alert("internal server error");
        console.log(data);
      }
    },
  });
};

const deleteBike = (id) => {
  var confirm = window.confirm("are you sure?");
  // console.log(confirm);

  if (confirm === true) {
    $.get(`./api/main.php?deletebike=${id}`, (data) => {
      if (data === "success") {
        alert("successfully deleted");
        window.location.href = "./managebikes.php";
      } else {
        alert("internal server error");
        console.log(data);
      }
    });
  }
};
