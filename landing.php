<?php
include ("logout.php");


?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="landing.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Booking Page</title>
    <style>
    /* Style for the button */
    #logout-form button {
        background-color: #4CAF50; /* Green background color */
        color: white; /* Text color */
        padding: 10px 20px; /* Padding around the button text */
        border: none; /* Remove border */
        cursor: pointer; /* Show pointer cursor on hover */
        border-radius: 4px; /* Add some border radius for rounded corners */
        font-size: 16px; /* Set font size */
        margin-bottom:10px;
    }

    /* Hover effect for the button */
    #logout-form button:hover {
        background-color: #45a049; /* Darker green background color on hover */
    }


    /* Style for the button */
    button.profbutton {
        background-color: #4CAF50; /* Green background color */
        color: white; /* Text color */
        padding: 10px 20px; /* Padding around the button text */
        border: none; /* Remove border */
        cursor: pointer; /* Show pointer cursor on hover */
        border-radius: 4px; /* Add some border radius for rounded corners */
        font-size: 16px; /* Set font size */
        margin-right:10px;
        margin-bottom:10px;

    }

    /* Hover effect for the button */
    button.button:hover {
        background-color: #45a049; /* Darker green background color on hover */
    }
</style>

  </head>
  <body>
    <!-- Navbar -->
    <div class="head">
      <div class="navbar">
        <ul>
          <li class="left-menu">
            <a href="landing.php">Home</a>

            <?php       

             if (isset($_SESSION["username"])) {
 
              echo '<a href="hotel.php">Hotels</a>';
              echo '<a href="train.php">Trains</a>';
              echo '<a href="airplane.php">Flights</a>';

            }
            else if (isset($_SESSION["usercompany"])) {

              echo '<a href="companyhotel.php">Add Hotels</a>';
              echo '<a href="companytrain.php">Add Trains</a>';
              echo '<a href="companyairplane.php">Add Flights</a>';
            }
            else {
              echo '<a href="hotel.php">Hotels</a>';
              echo '<a href="train.php">Trains</a>';
              echo '<a href="airplane.php">Flights</a>';
            }
            
            ?>
          
          </li>
          <li class="right-menu">
         
          <?php
            if (isset($_SESSION["username"])) {
 
              echo '<button class="profbutton" onclick="window.location.href=\'user.php\'">User Profile</button>';
              echo '
              <form id="logout-form" method="post" action="logout.php">
                  <button type="submit">Logout</button>
              </form>';
              
            }
            else if (isset($_SESSION["usercompany"])) {

              echo '<button class="profbutton" onclick="window.location.href=\'company.php\'">Company Profile</button>';

              echo '
              <form id="logout-form" method="post" action="logout.php">
                  <button type="submit">Logout</button>
              </form>';
            }
            else {
              echo '<a href="login.php">Sign In</a>';
              echo '<a href="register.php">Sign Up</a>';
            }
            
            ?>
          </li>
        </ul>
      </div>

      <!-- Slide menu icon -->
      <div class="slide-menu-icon" onclick="toggleSlideMenu()">
        <i class="fa fa-bars fa-3x" style="color: red"></i>
      </div>

      <!-- Close menu icon -->
      <div class="close-menu-icon" onclick="toggleSlideMenu()">
        <i class="fa fa-times fa-3x" style="color: red"></i>
      </div>
      <!-- Hero Section -->
      <div class="hero">
        <h1>Reserve Your Booking Now!</h1>
      </div>
    </div>

    <!-- Slide menu -->
    <!-- Slide menu -->
    <div class="slide-menu" id="slideMenu">
    <?php
      if (isset($_SESSION["usercompany"])) {
        echo '<ul>';
        echo '<li><a href="landing.php">Home</a></li>';
        echo '<li><a href="companyhotel.php">Add Hotels</a></li>';
        echo '<li><a href="companytrain.php">Add Trains</a></li>';
        echo '<li><a href="companyairplane.php">Add Flights</a></li>';

        echo '</ul>';

      }
      else{
        echo '<ul>';
        echo '<li><a href="landing.php">Home</a></li>';
        echo '<li><a href="hotel.php">Hotels</a></li>';
        echo '<li><a href="train.php">Trains</a></li>';
        echo '<li><a href="airplane.php">Flights</a></li>';

        echo '</ul>';


      }
?>
      
      <div class="slide-menu-links">
      <?php
            if (isset($_SESSION["username"])) {
 
              echo '<button class="profbutton" onclick="window.location.href=\'user.php\'">User Profile</button>';
              echo '
              <form id="logout-form" method="post" action="logout.php">
                  <button type="submit">Logout</button>
              </form>';
            }
            else if (isset($_SESSION["usercompany"])) {

              echo '<button class="profbutton" onclick="window.location.href=\'company.php\'">Company Profile</button>';
              echo '
              <form id="logout-form" method="post" action="logout.php">
                  <button type="submit">Logout</button>
              </form>';
            }
            else {
              echo '<a href="login.php">Sign In</a>';
              echo '<a href="register.php">Sign Up</a>';
            }
            ?>
      </div>
    </div>

    <section class="section">
      <div class="airplane common">
        <h2>Airplane</h2>
        <p>
          Welcome to our flights section. Explore our wide range of flight
          options to various destinations around the world. Whether you're
          planning a business trip or a vacation, we've got you covered. Use our
          flight search tool to find the best deals, compare prices, and book
          your tickets hassle-free. Fly with comfort and convenience with our
          trusted airline partners.
        </p>
      </div>
      <div class="airplanedestinationcontainer commondestinationcontainer">
        <h3 class="airplanedestination commondestination">
          Popular Destinations
        </h3>
        <div class="slideshow-container">
          <div class="slide fade airslide">
            <img src="newyork.jpg" alt="New York" />
            <div class="caption">New York</div>
          </div>
          <div class="slide fade airslide">
            <img src="london.jpg" alt="London" />
            <div class="caption">London</div>
          </div>
          <div class="slide fade airslide">
            <img src="paris.jpg" alt="Paris" />
            <div class="caption">Paris</div>
          </div>
          <div class="slide fade airslide">
            <img src="tokyo.jpg" alt="Tokyo" />
            <div class="caption">Tokyo</div>
          </div>
          <div class="slide fade airslide">
            <img src="dubai.jpg" alt="Dubai" />
            <div class="caption">Dubai</div>
          </div>
        </div>
      </div>
      <div class="features">
        <h3>Featured Airlines</h3>
        <ul>
          <li>ABC Airlines</li>
          <li>XYZ Airways</li>
          <li>Global Airlines</li>
          <li>TravelAir</li>
          <li>JetLink</li>
        </ul>
      </div>

      <?php
            if (isset($_SESSION["usercompany"])) {
              echo '      <button class="companyairplane-button reserve-button">Add Now</button>
              ';

 
            }
            
            else {
              echo '      <button class="airplane-button reserve-button">Reserve Now</button>
              ';
             }
            ?>
      
    </section>

    <section class="section">
      <div class="train common">
        <h2>Train</h2>
        <p>
          Welcome to our train section. Explore our train services for
          comfortable and convenient travel. Whether you're commuting for work
          or planning a leisure trip, we have a wide range of options to suit
          your needs. Sit back, relax, and enjoy the scenic journey with our
          reliable train operators.
        </p>
      </div>
      <div class="traindestinationcontainer commondestinationcontainer">
        <h3 class="traindestination commondestination">Popular Destinations</h3>
        <div class="slideshow-container">
          <div class="slide fade trainslide">
            <img src="newyork.jpg" alt="New York" />
            <div class="caption">New York</div>
          </div>
          <div class="slide fade trainslide">
            <img src="london.jpg" alt="London" />
            <div class="caption">London</div>
          </div>
          <div class="slide fade trainslide">
            <img src="paris.jpg" alt="Paris" />
            <div class="caption">Paris</div>
          </div>
          <div class="slide fade trainslide">
            <img src="tokyo.jpg" alt="Tokyo" />
            <div class="caption">Tokyo</div>
          </div>
          <div class="slide fade trainslide">
            <img src="dubai.jpg" alt="Dubai" />
            <div class="caption">Dubai</div>
          </div>
        </div>
      </div>




      <div class="features">
        <h3>Featured Train Operators</h3>
        <ul>
          <li>ABC Railways</li>
          <li>XYZ Trains</li>
          <li>Global Express</li>
          <li>TravelTrain</li>
          <li>RailLink</li>
        </ul>
      </div>

      <?php
            if (isset($_SESSION["usercompany"])) {
              echo '<button class="companytrain-button reserve-button">Add Now</button>';

 
            }
            
            else {
              echo '<button class="train-button reserve-button">Reserve Now</button>';
             }
            ?>
      
    </section class="section">

    <div class="hotel common">
      <h2>Hotel</h2>
      <p>
        Welcome to our hotel section. Experience the comfort and luxury of our
        accommodations. Whether you're traveling for business or leisure, we
        provide exceptional service and amenities to make your stay enjoyable.
        Relax in our spacious rooms, indulge in delicious cuisine at our
        restaurant, and take advantage of our convenient location near popular
        attractions.
      </p>
    </div>




  <div class="hoteldestinationcontainer commondestinationcontainer">
        <h3 class="hoteldestination commondestination">Popular Destinations</h3>
        <div class="slideshow-container">
          <div class="slide fade trainslide">
            <img src="newyork.jpg" alt="New York" />
            <div class="caption">New York</div>
          </div>
          <div class="slide fade hotelslide">
            <img src="london.jpg" alt="London" />
            <div class="caption">London</div>
          </div>
          <div class="slide fade hotelslide">
            <img src="paris.jpg" alt="Paris" />
            <div class="caption">Paris</div>
          </div>
          <div class="slide fade hotelslide">
            <img src="tokyo.jpg" alt="Tokyo" />
            <div class="caption">Tokyo</div>
          </div>
          <div class="slide fade hotelslide">
            <img src="dubai.jpg" alt="Dubai" />
            <div class="caption">Dubai</div>
          </div>
        </div>
      </div>

    <div class="features">
      <h3 class="hotelfeatures commonfeatures">Hotel Features</h3>
      <ul>
        <li>Spacious and comfortable rooms</li>
        <li>24-hour front desk and concierge service</li>
        <li>On-site restaurant and bar</li>
        <li>Fitness center and spa</li>
        <li>Free Wi-Fi in all areas</li>
        <li>Business center and meeting rooms</li>
        <li>Laundry and dry cleaning services</li>
        <li>Parking facilities</li>
      </ul>
    </div>
    <?php
            if (isset($_SESSION["usercompany"])) {
              echo '<button class="companyhotel-button reserve-button">Add Now</button>';

 
            }
            
            else {
              echo '<button class="hotel-button reserve-button">Book Now</button>';
             }
            ?>
      
     </section>
    

    <!-- Footer -->
    <div class="footer">
      <div class="contact-us">
        <h3>Contact Us</h3>
        <p>If you have any questions or inquiries, feel free to reach out to us. Our team is here to assist you.</p>
        <ul>
          <li><strong>Phone:</strong> [+123456789]</li>
          <li><strong>Email:</strong> [info@example.com]</li>
          <li><strong>Address:</strong> [Street, City, Country]</li>
        </ul>
      </div>
      <br><br>
      <p>&copy; 2023 Your Company. All rights reserved.</p>
    </div>

    <script>
      var airplaneslideIndex = 0;
      var trainslideIndex = 2;
      var hotelslideIndex = 3;

      airplaneshowSlides();
      trainshowSlides();
      hotelshowSlides();

      function airplaneshowSlides() {
        var slides = document.getElementsByClassName("airslide");
        for (var i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        airplaneslideIndex++;
        if (airplaneslideIndex > slides.length) {
          airplaneslideIndex = 1;
        }
        slides[airplaneslideIndex - 1].style.display = "block";
        setTimeout(airplaneshowSlides, 5000); // Change slide every 3 seconds
      }



      function trainshowSlides() {
        var slides = document.getElementsByClassName("trainslide");
        for (var i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        trainslideIndex++;
        if (trainslideIndex > slides.length) {
          trainslideIndex = 1;
        }
        slides[trainslideIndex - 1].style.display = "block";
        setTimeout(trainshowSlides, 5000); // Change slide every 3 seconds
      }



      function hotelshowSlides() {
        var slides = document.getElementsByClassName("hotelslide");
        for (var i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        hotelslideIndex++;
        if (hotelslideIndex > slides.length) {
          hotelslideIndex= 1;
        }
        slides[hotelslideIndex - 1].style.display = "block";
        setTimeout(hotelshowSlides, 5000); // Change slide every 3 seconds
      }

      // JavaScript code
      function toggleSlideMenu() {
        var slideMenu = document.getElementById("slideMenu");
        var closeMenuIcon = document.querySelector(".close-menu-icon");
        var slideMenuIcon = document.querySelector(".slide-menu-icon");

        slideMenu.classList.toggle("show");

        closeMenuIcon.style.display = slideMenu.classList.contains("show")
          ? "block"
          : "none";
        slideMenuIcon.style.display = slideMenu.classList.contains("show")
          ? "none"
          : "block";
      }
//user
      // Find the button element by its class name
      try {var airplaneButton = document.querySelector(".airplane-button");

      // Add a click event listener to the button
      airplaneButton.addEventListener("click", redirectToPage);

      // Function to redirect to the desired page
      function redirectToPage() {
        // Perform any desired action or logic here

        // Redirect to the desired page
        window.location.href = "airplane.php";
      }}
      catch (e){};
try{
      // Find the button element by its class name
      var trainButton = document.querySelector(".train-button");

      // Add a click event listener to the button
      trainButton.addEventListener("click", redirectToPagetrain);

      // Function to redirect to the desired page
      function redirectToPagetrain() {
        // Perform any desired action or logic here

        // Redirect to the desired page
        window.location.href = "train.php";
      }}
      catch (e){};
try{
      var hotelButton = document.querySelector(".hotel-button");

      // Add a click event listener to the button
      hotelButton.addEventListener("click", redirectToPagehotel);

      // Function to redirect to the desired page
      function redirectToPagehotel() {
        // Perform any desired action or logic here

        // Redirect to the desired page
        window.location.href = "hotel.php";
      }
    }      catch (e){};




//company
try{
      // Find the button element by its class name
      var airplaneButtons = document.querySelector(".companyairplane-button");

      // Add a click event listener to the button
      airplaneButtons.addEventListener("click", redirectToPages);

      // Function to redirect to the desired page
      function redirectToPages() {
        // Perform any desired action or logic here
        // Redirect to the desired page
        window.location.href = "companyairplane.php";
      }}
      catch (e){};

try{
      // Find the button element by its class name
      var trainButtons = document.querySelector(".companytrain-button");

      // Add a click event listener to the button
      trainButtons.addEventListener("click", redirectToPagetrains);

      // Function to redirect to the desired page
      function redirectToPagetrains() {
        // Perform any desired action or logic here

        // Redirect to the desired page
        window.location.href = "companytrain.php";
      } 
    }      catch (e){};
try{
      var hotelButtons = document.querySelector(".companyhotel-button");

      // Add a click event listener to the button
      hotelButtons.addEventListener("click", redirectToPagehotels);

      // Function to redirect to the desired page
      function redirectToPagehotels() {
        // Perform any desired action or logic here

        // Redirect to the desired page
        window.location.href = "companyhotel.php";
      }}
      catch (e){};

    </script>
  </body>
</html>
