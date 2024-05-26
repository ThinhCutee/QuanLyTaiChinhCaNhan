// const togglePassword = document.getElementById("togglePassword");
// const iconLoading = document.getElementById("loading");
// const inputUsername = document.getElementById("username");
// const inputPassword = document.getElementById("password");
// const onToggleTypePassword = () => {
//   togglePassword.classList.toggle("fa-eye-slash");

//   if (inputPassword.type === "password") {
//     inputPassword.type = "text";
//   } else {
//     inputPassword.type = "password";
//   }
// };

// togglePassword.addEventListener("click", onToggleTypePassword);

// const showLoading = () => {
//   iconLoading.style.display = "flex";
// };
// const hideLoading = () => {
//   iconLoading.style.display = "none";
// };

// function checkUsername() {
//   let email = document.getElementById("username").value;
//   if (email.trim() == "") {
//     document.getElementById("err_user").innerHTML = "Hãy nhập email";
//     return false;
//   }
//   var reg_email = /^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/;
//   if (!reg_email.test(email)) {
//     document.getElementById("err_user").innerHTML = "Email không hợp lệ";
//     return false;
//   }
//   document.getElementById("err_user").innerHTML = "";
//   return true;
// }

// function checkPassword() {
//   let password = document.getElementById("password").value;
//   if (password.trim() == "") {
//     document.getElementById("err_password").innerHTML = "Hãy nhập mật khẩu";
//     return false;
//   }
//   var reg_password = /^\w{5,}$/;
//   if (!reg_password.test(password)) {
//     document.getElementById("err_password").innerHTML =
//       "Mật khẩu chứa ít nhất 5 ký tự";
//     return false;
//   }
//   document.getElementById("err_password").innerHTML = "";
//   return true;
// }

// function login() {
//   var email = document.getElementById("username").value;
//   var password = document.getElementById("password").value;

//   let dskh = JSON.parse(localStorage.getItem("dskh"));

//   showLoading();
//   setTimeout(() => {
//     for (var i = 0; i < dskh.length; i++) {
//       if (
//         dskh.find((spTemp) => spTemp.email === email) &&
//         dskh.find((spTemp) => spTemp.pass === password)
//       ) {
//         document.getElementById("err").innerHTML = "Đăng nhập thành công";
//         window.location.href = "index.html";
//         return true;
//       } else if (email.trim() == "" || password.trim() == "") {
//         Swal.fire({
//           icon: "error",
//           text: "Hãy nhập thông tin",
//         });
//         hideLoading();
//         return false;
//       } else {
//         Swal.fire({
//           icon: "error",
//           text: "Tên đăng nhập hoặc mật khẩu không đúng",
//         });
//         hideLoading();
//         return false;
//       }
//     }
//   }, 1000);
// }
