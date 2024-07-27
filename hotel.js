// extra
var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function () {
  if (xhr.readyState === 4 && xhr.status === 200) {
    // Code to handle the response from the PHP file
    var response = xhr.responseText;
    console.log(response);
  }
};
xhr.open("GET", "hotelsubmitphp.php", true);
xhr.send();

// Get references to the search bar elements
const form = document.getElementById("search-bar");
const nameFilter = document.getElementById("name-filter");
const cityFilter = document.getElementById("city-filter");
const arrivalFilter = document.getElementById("arrival-filter");
const departureFilter = document.getElementById("departure-filter");
const guestsFilter = document.getElementById("guests-filter");
const searchButton = document.getElementById("search-button");
//show all hotel when page loade
window.addEventListener("load", filterHotels);
let hotelnumber = -1;
// Add event listeners to each filter field(press enter on each field to run search)
nameFilter.addEventListener("keydown", function (event) {
  if (event.key === "Enter") {
    filterHotels();
  }
});

cityFilter.addEventListener("keydown", function (event) {
  if (event.key === "Enter") {
    filterHotels();
  }
});

arrivalFilter.addEventListener("keydown", function (event) {
  if (event.key === "Enter") {
    filterHotels();
  }
});

departureFilter.addEventListener("keydown", function (event) {
  if (event.key === "Enter") {
    filterHotels();
  }
});

guestsFilter.addEventListener("keydown", function (event) {
  if (event.key === "Enter") {
    filterHotels();
  }
});
// Add event listener to the search button
searchButton.addEventListener("click", function (event) {
  event.preventDefault(); // Prevent the default form submission behavior

  handleSubmit(event);
});

// Get reference to the results container element
const resultsContainer = document.getElementById("results");

arrivalFilter.addEventListener("load", function () {
  arrivalFilter.placeholder = "Arrival Date";
});
departureFilter.addEventListener("load", function () {
  departureFilter.placeholder = "Departure Date";
});
let initialresult = false;
// Define an array of hotels
let hotels = [];
// Assuming you have a form with the ID "filter-form" and fields with the IDs "name-filter", "city-filter", etc.

// Function to handle form submission
function handleSubmit(event) {
  // Make an asynchronous request to the PHP script
  fetch("hotelphp.php", {
    method: "POST",
    body: new FormData(form), // Replace 'yourFormElement' with the actual form element containing the filter values
  })
    .then((response) => response.json()) // Parse the JSON response
    .then((data) => {
      hotels = [];
      // Process the JSON data returned from PHP
      // You can also iterate over the data array and access individual objects
      data.forEach((hotel) => {
        // Access specific fields of each hotel object
        const name = hotel.name;
        const id = hotel.id;
        const roomtype = hotel.roomtype;
        const arrivaltime = hotel.arrivaltime;
        const departuretime = hotel.departuretime;
        const guestnumber = hotel.guestnumber;
        const city = hotel.city;

        // Now you can use the retrieved fields as needed
        // console.log(name);
        // console.log(id);
        // console.log(roomtype);
        // console.log(arrivaltime);
        // console.log(departuretime);
        // console.log(guestnumber);
        //console.log(city);

        const hotelObj = {
          name: hotel.name,
          id: hotel.id,
          roomtype: hotel.roomtype,
          arrival: hotel.arrivaltime,
          departure: hotel.departuretime,
          guests: hotel.guestnumber,
          city: hotel.city,
        };

        // Push the hotel object into the hotelArray
        hotels.push(hotelObj);
      });
      initialresult = true;
      filterHotels(event);

      // Perform any other actions with the data
    })
    .catch((error) => {
      // Handle any errors that occurred during the request
      console.error("Error:", error);
    });
}

// Define a function to filter the hotels based on the search parameters
function filterHotels() {
  // Filter the hotels based on the search parameters
  const filteredHotels = hotels;
  // Render the filtered hotels to the results container
  resultsContainer.innerHTML = "";

  if (filteredHotels.length === 0 && initialresult === true) {
    resultsContainer.innerHTML = `<p id="noresults">No results found.</p>`;
  } else {
    hotelnumber = -1;
    filteredHotels.forEach(function (hotel) {
      hotelnumber = hotelnumber + 1;

      const hotelElement = document.createElement("div");
      hotelElement.innerHTML = `
        <h2>${hotel.name}</h2>
        <p>City: ${hotel.city}</p>
        <p>Arrival: ${hotel.arrival}</p>
        <p>Departure: ${hotel.departure}</p>
        <p>Guests: ${hotel.guests}</p>
        <p>Roomtype: ${hotel.roomtype}</p>

        <form class="booking-form" action="hotelsubmitphp.php" method="post">
        <label for="gender">Gender:</label>
        <select  id="gender1"name="gender" id="gender">
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        </select>
        <br>
        <input type="hidden" id="hotid" name="hotid" value="${hotel.id}">

        <label for="first-name">First Name:</label>
        <input  id="first-name"type="text" id="first-name" name="first-name" required>
        <br>
        <label for="last-name">Last Name:</label>
        <input id="last-name"type="text" id="last-name" name="last-name" required>
        <br>
        <label for="national-code">National Code:</label>
        <input id="national-code"type="text" id="national-code" name="national-code" required>
        <br>
        <label for="phone-number">Phone Number:</label>
        <input id="phone-number"type="text" id="phone-number" name="phone-number" required>
        <br>
        <input button id="submits"type="submit" value="Submit">
        </form>

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

      const ShowDetails = document.createElement("button");
      ShowDetails.innerText = "Show Details";
      ShowDetails.addEventListener("click", function () {
        window.location.href = `hotel-details.html`;
      });

      const booking = document.createElement("button");
      booking.innerText = "Book Now!";

      booking.addEventListener("click", function () {
        const bookingForm = hotelElement.querySelector(".booking-form");
        if (
          bookingForm.style.display === "" ||
          bookingForm.style.display === "none"
        ) {
          booking.innerText = "Close Booking Form";
          bookingForm.style.display = "block";
          bookingForm.style.backgroundColor = "#e6eeff"; // Set the background
        } else {
          booking.innerText = "Book Now!";
          bookingForm.style.display = "none";
          bookingForm.style.backgroundColor = "#ffffff"; // Set the background
        }
      });
      hotelElement.appendChild(booking);
      hotelElement.appendChild(ShowDetails);

      resultsContainer.appendChild(hotelElement);
    });
  }
}
