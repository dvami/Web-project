const loginForm = document.getElementById("login-form");
const usernameInput = document.getElementById("username");
const passwordInput = document.getElementById("password");
const emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; // Email regular expression
const numberRegex = /^\d{11}$/; // 11 digit number regular expression
const validation = document.querySelector("#validation");

loginForm.addEventListener("submit", (event) => {
  event.preventDefault();

  const username = usernameInput.value.trim();
  const password = passwordInput.value.trim();

  if (!username.match(emailRegex) && !username.match(numberRegex)) {
    validation.textContent = "Invalid Number or email";
  } else {
    validation.textContent = "";
    loginForm.submit();
  }
});
