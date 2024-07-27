const form = document.querySelector("#registration-form");
const passwordInput = document.querySelector("#password");
const confirmPasswordInput = document.querySelector("#confirm-password");
const passwordStrength = document.querySelector("#password-strength");
const passwordMatch = document.querySelector("#password-match");
const phoneNumber = document.querySelector("#phone-number");
const numberMatch = document.querySelector("#number-match");
const phoneNumberPattern = /^\d{11}$/;

form.addEventListener("submit", function (event) {
  event.preventDefault();
  checkPasswords();
});

passwordInput.addEventListener("input", function (event) {
  checkPasswordStrength(event.target.value);
});

function checkPasswords() {
  if (!phoneNumberPattern.test(phoneNumber.value)) {
    numberMatch.textContent = "Invalid Number";
  } else if (passwordInput.value !== confirmPasswordInput.value) {
    passwordMatch.textContent = "Passwords do not match";
  } else {
    numberMatch.textContent = "";
    passwordMatch.textContent = "";
    form.submit();
  }
}

if (!phoneNumberPattern.test(phoneNumber.value)) {
  // phone number is not valid
}

function checkPasswordStrength(password) {
  const strengthIndicator = {
    0: "Worst",
    1: "Bad",
    2: "Weak",
    3: "Good",
    4: "Strong",
  };

  const strengthColor = {
    0: "#828282",
    1: "#f44336",
    2: "#ff9800",
    3: "#4caf50",
    4: "#008000",
  };

  let strength = 0;
  if (password.length > 7) {
    strength += 1;
  }
  if (password.match(/[a-z]/)) {
    strength += 1;
  }
  if (password.match(/[A-Z]/)) {
    strength += 1;
  }
  if (password.match(/[0-9]/)) {
    strength += 1;
  }
  if (password.match(/[^a-zA-Z0-9]/)) {
    strength += 1;
  }

  passwordStrength.textContent = strengthIndicator[strength];
  passwordStrength.style.color = strengthColor[strength];
}
