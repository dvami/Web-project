// Sample flight data
const orign = document.getElementById("origin");
const destination = document.getElementById("destination");
const arrive = document.getElementById("departure");
const departures = document.getElementById("return");
const passengernumbers = document.getElementById("passengers");
// JavaScript code

var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function () {
  if (xhr.readyState === 4 && xhr.status === 200) {
    // Code to handle the response from the PHP file
    var response = xhr.responseText;
  }
};
xhr.open("GET", "airplanesubmitphp.php", true); // Replace 'example.php' with your PHP file path
xhr.send();

let flights = [];
const form = document.getElementById("filterForm");

function handleSubmit(event) {
  flights = [];
  // Make an asynchronous request to the PHP script
  fetch("airplanephp.php", {
    method: "POST",
    body: new FormData(form), // Replace 'yourFormElement' with the actual form element containing the filter values
  })
    .then((response) => response.json()) // Parse the JSON response
    .then((data) => {
      // Process the JSON data returned from PHP
      // You can also iterate over the data array and access individual objects
      data.forEach((flight) => {
        // Access specific fields of each airplane object
        const name = flight.name;

        const id = flight.id;
        const origin = flight.origin;
        const destination = flight.destination;
        const arrivaltime = flight.arrivaltime;
        const departuretime = flight.departuretime;
        const guestnumber = flight.passengerleft;
        const baggage = flight.baggage;
        const terminal = flight.terminal;

        //const capacity = flight.capacity;
        //const coupenumber = flight.coupenumber;
        //  const coupecapacity = flight.coupecapacity;

        const flightObj = {
          name: flight.name,

          origin: flight.origin,
          destination: flight.destination,
          id: flight.id,
          arrival: flight.arrivaltime,
          departure: flight.departuretime,
          passengerleft: flight.passengerleft,
          baggage: flight.baggage,
          terminal: flight.terminal,
          //  capacity: train.capacity,
          //coupenumber: train.coupenumber,
          //coupecapacity: train.coupecapacity,
        };

        // Push the hotel object into the hotelArray
        flights.push(flightObj);
      });
      filterFlights(event);
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
    if (orign.value === "") {
      alert("fill out origin field");
      return false;
    } else if (destination.value === "") {
      alert("fill out destination field");
      return false;
    } else if (arrive.value === "") {
      alert("fill out departure field");
      return false;
    } else if (passengernumbers.value === "") {
      alert("fill out passenger field");
      return false;
    }
    handleSubmit(event);
  });

function showFlightDetails(index) {
  const flight = flights[index];

  // Create flight details HTML
  const flightDetails = `

    <p>Origin: ${flight.origin}</p>
    <p>Destination: ${flight.destination}</p>

      <p>Flight Number: ${flight.id}</p>
      <p>Terminal Number: ${flight.terminal}</p>

      <p>Allowed Baggage: ${flight.baggage}</p>
      <p>Departure Date: ${flight.arrival}</p>
      <p>Return Date: ${flight.departure}</p>
      <p>Passengers Left: ${flight.passengerleft}</p>
   `;

  // Hide all flight info and passenger forms
  const flightInfos = document.getElementsByClassName("flight-info");
  const passengerForms = document.getElementsByClassName("passenger-form");
  const showDetailsButtons = document.getElementsByClassName(
    "show-details-button"
  );

  for (let i = 0; i < flightInfos.length; i++) {
    if (i === index) {
      // Toggle display for the selected flight
      // Show flight details and passenger form for the selected flight
      document.getElementById(`flightInfo_${index}`).innerHTML = flightDetails;
      document.getElementById(`flightInfo_${index}`).style.display = "block";
      document.getElementById(`passengerForm_${index}`).style.display = "block";
      showDetailsButtons[i].style.display = "none";
    } else {
      // Show flight info and passenger form for other flights
      flightInfos[i].style.display = "none";
      passengerForms[i].style.display = "none";
      showDetailsButtons[i].style.display = "block"; // Show the button for other flights
    }
  }
}

// Function to validate passenger form
function validateForm(index) {
  const nationalCodeInput = document.getElementById(`nationalCode_${index}`);
  const nationalCode = nationalCodeInput.value;

  if (nationalCode.length !== 10) {
    alert("National code must be 10 digits long.");
    return false; // Prevent form submission
  }

  // Additional validation logic can be added here if needed

  return true; // Allow form submission
}

// Function to filter flights based on user input
function filterFlights(event) {
  event.preventDefault();
  let filteredFlights = flights;
  // Display filtered trains
  const searchResults = document.getElementById("searchResults");
  searchResults.innerHTML = "";

  if (filteredFlights.length > 0) {
    filteredFlights.forEach((flight, index) => {
      const flightElement = document.createElement("div");
      flightElement.classList.add("flight");

      const flightInfo = document.createElement("div");
      flightInfo.id = `flightInfo_${index}`;
      flightInfo.classList.add("flight-info");

      const showDetailsButton = document.createElement("button");

      showDetailsButton.textContent = "Show Details";

      showDetailsButton.addEventListener("click", () =>
        showFlightDetails(index)
      );

      showDetailsButton.classList.add("show-details-button");

      const passengerForm = document.createElement("form");
      passengerForm.id = `passengerForm_${index}`;
      passengerForm.classList.add("passenger-form");
      passengerForm.action = "airplanesubmitphp.php"; // Replace with the actual URL where form data should be submitted
      passengerForm.method = "POST"; // Replace with the desired HTTP method, such as POST or GET

      const passengerFormHTML = `
      <input type="hidden" id="flightid" name="airplaneid" value="${flight.id}">
      <input type="hidden" id="passengernumbers" name="passengernumbers" value="${passengernumbers.value}">

        <h3>Passenger Information</h3>
        
          <label for="gender_${index}">Gender:</label>
          <select id="gender_${index}" class="gender" name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>

          <label for="firstName_${index}">First Name:</label>
          <input type="text" id="firstName_${index}" name="firstname"required>

          <label for="lastName_${index}">Last Name:</label>
          <input type="text" id="lastName_${index}" name="lastname" required>

          <label for="nationalCode_${index}">National Code:</label>
          <input type="text" id="nationalCode_${index}" name="nationalcode" required>

          <label for="dateOfBirth_${index}">Date of Birth:</label> 
          <input type="date" id="dateOfBirth_${index}" name="birthdate"required>

          <button type="submit" onclick="return validateForm(${index})">Finalize Ticket</button>
    
      `;
      passengerForm.addEventListener("submit", (event) => validateForm(index));

      passengerForm.innerHTML = passengerFormHTML;

      flightElement.textContent = `${flight.origin} to ${flight.destination}`;

      flightElement.appendChild(showDetailsButton);
      flightElement.appendChild(flightInfo);
      flightElement.appendChild(passengerForm);

      searchResults.appendChild(flightElement);
    });
  } else {
    searchResults.textContent = "No flights found.";
  }
  document.getElementById("flightSearchResults").style.display = "block";
}

// Attach filterFlights function to form submit event
//document.getElementById("filterForm").addEventListener("submit", filterFlights);
