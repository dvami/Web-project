const form = document.querySelector("#user-info-form");
const firstNameInput = document.querySelector("#first-name");
const emailInput = document.querySelector("#email");
const phoneNumberInput = document.querySelector("#phone-number");
const cityInput = document.querySelector("#city");
const stateInput = document.querySelector("#state");

const idInput = document.getElementById("pid");

let firstName = "";
let email = "";
let phoneNumber = "";
let city = "";
let state = "";

const valueToSend = idInput.value;
// Create an XMLHttpRequest object
const xhr = new XMLHttpRequest();

// Prepare the AJAX request
xhr.open("POST", "companyphpforjs.php", true);
xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

// Set up the callback function for when the AJAX response is received
xhr.onreadystatechange = function () {
  if (xhr.readyState === 4 && xhr.status === 200) {
    // Handle the response from the PHP script
    const response = xhr.responseText;
    const data = JSON.parse(xhr.response);
    // Access individual fields
    phoneNumberInput.value = Number(data.phoneNumber);
    emailInput.value = data.email;
    firstNameInput.value = data.companyname;
    cityInput.value = data.city;
    stateInput.value = data.state;

    phoneNumber = data.phoneNumber;
    firstName = data.companyname;
    email = data.email;
    city = data.city;
    state = data.state;
  }
};

// Send the AJAX request with the value to PHP
xhr.send("id=" + encodeURIComponent(valueToSend));
// Save input values in variables on change
firstNameInput.addEventListener("input", function (e) {
  firstName = e.target.value;
});

emailInput.addEventListener("input", function (e) {
  email = e.target.value;
});

phoneNumberInput.addEventListener("input", function (e) {
  phoneNumber = e.target.value;
});

cityInput.addEventListener("input", function (e) {
  city = e.target.value;
});

stateInput.addEventListener("input", function (e) {
  state = e.target.value;
});

// Display last saved input values when input field is focused
firstNameInput.addEventListener("focus", function () {
  firstNameInput.value = firstName;
});

emailInput.addEventListener("focus", function () {
  emailInput.value = email;
});

phoneNumberInput.addEventListener("focus", function () {
  phoneNumberInput.value = phoneNumber;
});

cityInput.addEventListener("focus", function () {
  cityInput.value = city;
});

stateInput.addEventListener("focus", function () {
  stateInput.value = state;
});

form.addEventListener("submit", function (e) {
  e.preventDefault();

  // Remove whitespace from phone number
  const cleanedPhoneNumber = phoneNumber.replace(/\s+/g, "");
  // Check if phone number has 11 numeric characters
  if (/^\d{11}$/.test(cleanedPhoneNumber)) {
    form.submit();
  } else {
    alert("Please enter a valid 11-digit phone number.");
  }
});
