const lux = document.getElementById("luxbutton");
const fam = document.getElementById("fambutton");
const sui = document.getElementById("suibutton");
const luxbtn = document.getElementById("submit1");
const fambtn = document.getElementById("submit2");
const suibybtn = document.getElementById("submit3");
lux.addEventListener("click", function (event) {
  event.preventDefault();
  document.getElementById("booking-form1").style.display = "block";
});

fam.addEventListener("click", function (event) {
  event.preventDefault();
  document.getElementById("booking-form2").style.display = "block";
});
sui.addEventListener("click", function (event) {
  event.preventDefault();
  document.getElementById("booking-form3").style.display = "block";
});

// Get the form element
const form1 = document.getElementById("booking-form1");

// Add a submit event listener to the form
form1.addEventListener("submit", function (event) {
  // Prevent the form from submitting by default
  event.preventDefault();

  // Get the input values
  const firstName = document.getElementById("first-name1").value;
  const lastName = document.getElementById("last-name1").value;
  const nationalCode = document.getElementById("national-code1").value;
  const phoneNumber = document.getElementById("phone-number1").value;

  // Check if the required fields are empty

  // Validate the national code and phone number fields
  const nationalCodeRegex = /^[0-9]{10}$/;
  const phoneNumberRegex = /^[0-9]{11}$/;
  if (
    !nationalCodeRegex.test(nationalCode) ||
    !phoneNumberRegex.test(phoneNumber)
  ) {
    alert("Please enter a valid national code and phone number.");
    return;
  }

  // Submit the form if all checks pass
  form1.submit();
});

// Get the form element
const form2 = document.getElementById("booking-form2");

// Add a submit event listener to the form
form2.addEventListener("submit", function (event) {
  // Prevent the form from submitting by default
  event.preventDefault();

  // Get the input values
  const firstName = document.getElementById("first-name2").value;
  const lastName = document.getElementById("last-name2").value;
  const nationalCode = document.getElementById("national-code2").value;
  const phoneNumber = document.getElementById("phone-number2").value;
  console.log(nationalCode, phoneNumber);
  // Validate the national code and phone number fields
  const nationalCodeRegex = /^[0-9]{10}$/;
  const phoneNumberRegex = /^[0-9]{11}$/;
  if (
    !nationalCodeRegex.test(nationalCode) ||
    !phoneNumberRegex.test(phoneNumber)
  ) {
    alert("Please enter a valid national code and phone number.");
    return;
  }

  // Submit the form if all checks pass
  form2.submit();
});

// Get the form element
const form3 = document.getElementById("booking-form3");

// Add a submit event listener to the form
form3.addEventListener("submit", function (event) {
  // Prevent the form from submitting by default
  event.preventDefault();

  // Get the input values
  const firstName = document.getElementById("first-name3").value;
  const lastName = document.getElementById("last-name3").value;
  const nationalCode = document.getElementById("national-code3").value;
  const phoneNumber = document.getElementById("phone-number3").value;

  // Validate the national code and phone number fields
  const nationalCodeRegex = /^[0-9]{10}$/;
  const phoneNumberRegex = /^[0-9]{11}$/;
  if (
    !nationalCodeRegex.test(nationalCode) ||
    !phoneNumberRegex.test(phoneNumber)
  ) {
    alert("Please enter a valid national code and phone number.");
    return;
  }

  // Submit the form if all checks pass
  form3.submit();
});
