const form = document.querySelector("#user-info-form");
const firstNameInput = document.querySelector("#first-name");
const lastNameInput = document.querySelector("#last-name");
const emailInput = document.querySelector("#email");
const phoneNumberInput = document.querySelector("#phone-number");
const addressInput = document.querySelector("#address");
const cityInput = document.querySelector("#city");
const stateInput = document.querySelector("#state");
const zipCodeInput = document.querySelector("#zip-code");
const dobInput = document.querySelector("#date-of-birth");
const idInput = document.getElementById("pid");

let firstName = "";
let lastName = "";
let email = "";
let phoneNumber = "";
let address = "";
let city = "";
let state = "";
let zipCode = "";

let dob = "1900-01-01";
dobInput.value = dob;
dobInput.dispatchEvent(new Event("input"));

const valueToSend = idInput.value;

// Create an XMLHttpRequest object
const xhr = new XMLHttpRequest();

// Prepare the AJAX request
xhr.open("POST", "userphpforjs.php", true);
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
    firstNameInput.value = data.firstname;
    lastNameInput.value = data.lastname;
    addressInput.value = data.address;
    cityInput.value = data.city;
    stateInput.value = data.state;
    zipCodeInput.value = data.zipcode;
    dobInput.value = data.dob;

    phoneNumber = data.phoneNumber;
    firstName = data.firstname;
    lastName = data.lastname;
    email = data.email;
    address = data.address;
    city = data.city;
    state = data.state;
    zipCode = data.zipcode;
    dob = data.dob;
    if (
      dobInput.value === "1900-01-01" ||
      dobInput.value === null ||
      dobInput.value === ""
    ) {
      dobInput.style.color = "gray";
    } else {
      dobInput.style.color = "red";
    }
  }
};

// Send the AJAX request with the value to PHP
xhr.send("id=" + encodeURIComponent(valueToSend));
// Save input values in variables on change
firstNameInput.addEventListener("input", function (e) {
  firstName = e.target.value;
});

lastNameInput.addEventListener("input", function (e) {
  lastName = e.target.value;
});

emailInput.addEventListener("input", function (e) {
  email = e.target.value;
});

phoneNumberInput.addEventListener("input", function (e) {
  phoneNumber = e.target.value;
});

addressInput.addEventListener("input", function (e) {
  address = e.target.value;
});

cityInput.addEventListener("input", function (e) {
  city = e.target.value;
});

stateInput.addEventListener("input", function (e) {
  state = e.target.value;
});

zipCodeInput.addEventListener("input", function (e) {
  zipCode = e.target.value;
});

dobInput.addEventListener("input", function (e) {
  dob = e.target.value;
  if (dob === "1900-01-01" || dob === null || dob === "") {
    dobInput.style.color = "gray";
  } else {
    dobInput.style.color = "red";
  }
});

// Display last saved input values when input field is focused
firstNameInput.addEventListener("focus", function () {
  firstNameInput.value = firstName;
});

lastNameInput.addEventListener("focus", function () {
  lastNameInput.value = lastName;
});

emailInput.addEventListener("focus", function () {
  emailInput.value = email;
});

phoneNumberInput.addEventListener("focus", function () {
  phoneNumberInput.value = phoneNumber;
});

addressInput.addEventListener("focus", function () {
  addressInput.value = address;
});

cityInput.addEventListener("focus", function () {
  cityInput.value = city;
});

stateInput.addEventListener("focus", function () {
  stateInput.value = state;
});

zipCodeInput.addEventListener("focus", function () {
  zipCodeInput.value = zipCode;
});

dobInput.addEventListener("focus", function () {
  dobInput.value = dob;

  if (
    dobInput.value === "1900-01-01" ||
    dobInput.value === null ||
    dobInput.value === ""
  ) {
    dobInput.style.color = "gray";
  } else {
    dobInput.style.color = "red";
  }
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
