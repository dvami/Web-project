// JavaScript code
var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function () {
  if (xhr.readyState === 4 && xhr.status === 200) {
    // Code to handle the response from the PHP file
    var response = xhr.responseText;
  }
};
xhr.open("GET", "trainsubmitphp.php", true); // Replace 'example.php' with your PHP file path
xhr.send();

const form = document.getElementById("filterForm");
let trains = [];

function handleSubmit(event) {
  trains = [];
  // Make an asynchronous request to the PHP script
  fetch("trainphp.php", {
    method: "POST",
    body: new FormData(form), // Replace 'yourFormElement' with the actual form element containing the filter values
  })
    .then((response) => response.json()) // Parse the JSON response
    .then((data) => {
      // Process the JSON data returned from PHP
      // You can also iterate over the data array and access individual objects
      data.forEach((train) => {
        // Access specific fields of each train object
        const name = train.name;

        const id = train.id;
        const origin = train.origin;
        const destination = train.destination;
        const arrivaltime = train.arrivaltime;
        const departuretime = train.departuretime;
        const guestnumber = train.passengerleft;
        const trainObj = {
          name: train.name,

          origin: train.origin,
          destination: train.destination,
          id: train.id,
          arrival: train.arrivaltime,
          departure: train.departuretime,
          passengerleft: train.passengerleft,
        };

        // Push the hotel object into the hotelArray
        trains.push(trainObj);
      });
      filterTrains(event);
    })
    .catch((error) => {
      // Handle any errors that occurred during the request
      console.error("Error:", error);
    });
}

document
  .getElementById("search-button")
  .addEventListener("click", function (event) {
    event.preventDefault(); // Prevent the default form submission behavior

    handleSubmit(event);
  });

function showTrainDetails(index) {
  const train = trains[index];

  // Create train details HTML
  const trainDetails = `
  <p>name: ${train.name}</p>
      <p>Origin: ${train.origin}</p>
      <p>Destination: ${train.destination}</p>
       <p>Departure Date: ${train.arrival}</p>
      <p>Return Date: ${train.departure}</p>
      <p>Passengers Left: ${train.passengerleft}</p>
    `;

  // Hide all train info and passenger forms
  const trainInfos = document.getElementsByClassName("train-info");
  const passengerForms = document.getElementsByClassName("passenger-form");
  const showDetailsButtons = document.getElementsByClassName(
    "show-details-button"
  );

  for (let i = 0; i < trainInfos.length; i++) {
    if (i === index) {
      // Toggle display for the selected train
      // Show train details and passenger form for the selected train
      document.getElementById(`trainInfo_${index}`).innerHTML = trainDetails;
      document.getElementById(`trainInfo_${index}`).style.display = "block";
      document.getElementById(`passengerForm_${index}`).style.display = "block";
      showDetailsButtons[i].style.display = "none";
    } else {
      // Show train info and passenger form for other trains
      trainInfos[i].style.display = "none";
      passengerForms[i].style.display = "none";
      showDetailsButtons[i].style.display = "block"; // Show the button for other trains
    }
  }
}

const passengernumbers = document.getElementById("passengers");
// Function to filter trains based on user input
function filterTrains(event) {
  event.preventDefault();
  let filteredTrains = trains;
  // Display filtered trains
  const searchResults = document.getElementById("searchResults");
  searchResults.innerHTML = "";

  if (filteredTrains.length > 0) {
    filteredTrains.forEach((train, index) => {
      const trainElement = document.createElement("div");
      trainElement.classList.add("train");
      const trainInfo = document.createElement("div");
      trainInfo.id = `trainInfo_${index}`;
      trainInfo.classList.add("train-info");

      const showDetailsButton = document.createElement("button");
      showDetailsButton.textContent = "Show Details";
      showDetailsButton.addEventListener("click", () =>
        showTrainDetails(index)
      );
      showDetailsButton.classList.add("show-details-button");

      const passengerForm = document.createElement("form");
      passengerForm.id = `passengerForm_${index}`;
      passengerForm.classList.add("passenger-form");
      passengerForm.action = "trainsubmitphp.php"; // Replace with the actual URL where form data should be submitted
      passengerForm.method = "POST"; // Replace with the desired HTTP method, such as POST or GET

      passengerForm.addEventListener("submit", (event) => validateForm(index));
      const passengerFormHTML = `
      <input type="hidden" id="hotid" name="trainid" value="${train.id}">
      <input type="hidden" id="passengernumbers" name="passengernumbers" value="${passengernumbers.value}">

      <h3>Passenger Information</h3>
      <label for="gender_${index}">Gender:</label>
      <select id="gender_${index}" class="gender" name="gender">
        <option value="">Select</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
      </select><br>
      <label for="firstName_${index}">First Name:</label>
      <input type="text" id="firstName_${index}" name="firstname" required /><br>
      <label for="lastName_${index}">Last Name:</label>
      <input type="text" id="lastName_${index}" name="lastname" required /><br>
      <label for="nationalCode_${index}">National Code:</label>
      <input type="text" id="nationalCode_${index}" name="nationalcode" required /><br>
      <label for="birthDate_${index}">Date of Birth:</label>
      <input type="date" id="birthDate_${index}" name="birthdate" required /><br>
      <button type="submit" onclick="return validateForm(${index})">Finalize Ticket</button>

    `;
      //validation
      const bookingForm = hotelElement.querySelector(".booking-form");
      const nationalCodeInput = bookingForm.querySelector("#national-code");
      const phoneNumberInput = bookingForm.querySelector("#phone-number");
      const submitButton = bookingForm.querySelector("#submits");

      submitButton.addEventListener("click", function (event) {
        event.preventDefault(); // Prevent the form submission for now

        const nationalCode = nationalCodeInput.value;
        const phoneNumber = phoneNumberInput.value;

        if (
          nationalCode.length === 10 &&
          phoneNumber.length === 11 &&
          /^\d+$/.test(nationalCode) &&
          /^\d+$/.test(phoneNumber)
        ) {
          // Valid input, proceed with form submission
          bookingForm.submit();
        } else {
          // Invalid input, display an error message
          alert(
            "Please enter a valid 10-digit national code and 11-digit phone number with digits only."
          );
        }
      });
      passengerForm.innerHTML = passengerFormHTML;

      trainElement.textContent = `${train.origin} to ${train.destination}`;

      trainElement.appendChild(showDetailsButton);
      trainElement.appendChild(trainInfo);
      trainElement.appendChild(passengerForm);

      searchResults.appendChild(trainElement);
    });
  } else {
    searchResults.textContent = "No trains found.";
  }
  document.getElementById("trainSearchResults").style.display = "block";
}

// Function to validate passenger form
function validateForm(index) {
  const gender = document.getElementById(`gender`).value;
  const firstName = document.getElementById(`firstName`).value;
  const lastName = document.getElementById(`lastName_${index}`).value;
  const nationalCode = document.getElementById(`nationalCode_${index}`).value;
  const birthDate = document.getElementById(`birthDate_${index}`).value;

  if (
    gender === "" ||
    firstName === "" ||
    lastName === "" ||
    nationalCode === "" ||
    birthDate === ""
  ) {
    alert("Please fill in all fields.");
    return false;
  }

  // Validate national code
  if (nationalCode.length !== 10 || isNaN(nationalCode)) {
    alert("National code should be a 10-digit number.");
    return false;
  }

  // Add your own validation logic here

  alert("Ticket finalized successfully!");
  return true;
}
