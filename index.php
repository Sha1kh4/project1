<!DOCTYPE html>
<html lang="en">
<?php
$servername = "sql6.freemysqlhosting.net";
$username = "sql6631029";
$password = "6kQ5lHTI2l";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$conn->close();
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>index</title>
  <script src="https://cdn.tailwindcss.com"></script>

</head>

<body style="background-color: #d4af37;">
  <!-- header starts -->

  <header class="text-amber-600 body-font bg-stone-950">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
      <img src="img/logo.png" style="max-width: 50px;" alt="app logo">

      <span class="ml-3 text-xl">Elites Blog</span>

      <nav
        class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400	flex flex-wrap items-center text-base justify-center">
        <a href="form.php" class=" mr-5 hover:text-yellow-900 ">Request Another Artist</a>
        <a href="feedback.php" class="mr-5 hover:text-yellow-900">Contact Admin</a>
      </nav>
      <?php
      session_start();
      if (isset($_SESSION['useridlogin'])) {
        // User is logged in
        $username = $_SESSION['useridlogin'];
        echo "Welcome, $username  L "; // Display the username
        echo '<form method="POST">
              <button type="submit" name="logout">ogout</button>
          </form>';
      } else {
        echo '<a href="connection.php"><button " class=" inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0 ">Sign up/Login
                        <svg fill="none " stroke="currentColor " stroke-linecap="round " stroke-linejoin="round " stroke-width="2 " class="w-4 h-4 ml-1 " viewBox="0 0 24 24 ">
                          <path d="M5 12h14M12 5l7 7-7 7 "></path>
                        </svg>
                      </button></a>
                        ';
      }
      ?>
      <?php
      // Check if the logout button is clicked
      if (isset($_POST['logout'])) {
        // Clear the session and redirect to index.php
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit();
      }
      ?>
    </div>
  </header>
  <!-- header ends -->

  <!-- body starts -->

  <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-wrap -m-4">
        <div class="p-4 md:w-1/3">
          <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
            <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="img/seedhe_maut.jpg"
              style="max-width: 500px; ;" alt="Seedhe Maut">
            <div class="p-6">
              <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">Dehli based rappers</h2>
              <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Seedhe Maut</h1>
              <p class="leading-relaxed mb-3">Seedhe Maut represent the next stage in the evolution of the capital’s
                hip-hop sound. Having mastered the art of delivering razor sharp, combative and witty rhymes, the duo
                are following in the trailblazing footsteps of international
                hip-hop collectives such as Run The Jewels, Clipse, Black Hippy, Mobb Deep, Blackstar and more.</p>
              <div class="flex items-center flex-wrap ">
                <a class="text-green-500 inline-flex items-center md:mb-2 lg:mb-0"
                  href="https://www.seedhemaut.com/bio/">Learn More
                  <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                    <path d="M12 5l7 7-7 7"></path>
                  </svg>
                </a>
                <span
                  class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                  <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                    stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                  </svg>1.2K
                </span>
                <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                  <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                    stroke-linejoin="round" viewBox="0 0 24 24">
                    <path
                      d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                    </path>
                  </svg>6
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="p-4 md:w-1/3">
          <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
            <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="img/talha.jpg" alt="Talha Yunus">
            <div class="p-6">
              <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">Chopper Flow king</h2>
              <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Talha Yunus</h1>
              <p class="leading-relaxed mb-3">Talhah Yunus (Urdu: طلحہ یونس; born 21 October 1996) is a Pakistani
                rapper, filmmaker and musician. He graduated from the National College of Arts in filmmaking. He is a
                part of the hip hop duo Young Stunners along with Talha
                Anjum, having the music producer Jokhay.[1] He was born and raised in Karachi. He appeared in the PSL
                Anthem of 2021 "Groove Mera".
              </p>
              <div class="flex items-center flex-wrap">
                <a class="text-green-500 inline-flex items-center md:mb-2 lg:mb-0"
                  href="https://en.wikipedia.org/wiki/Talhah_Yunus">Learn More
                  <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                    <path d="M12 5l7 7-7 7"></path>
                  </svg>
                </a>
                <span
                  class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                  <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                    stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                  </svg>1.2K
                </span>
                <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                  <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                    stroke-linejoin="round" viewBox="0 0 24 24">
                    <path
                      d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                    </path>
                  </svg>6
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="p-4 md:w-1/3">
          <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
            <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="img/Talha_Anjum.jpg" alt="Talha Anjum">
            <div class="p-6">
              <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">Jaun</h2>
              <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Talha Anjum</h1>
              <p class="leading-relaxed mb-3">Talha Anjum Rasheed[1][2] (Urdu: طلحہ انجُم رشید; born 3 October 1996) is
                a Pakistani rapper, songwriter and lyricist. He was born and raised in Karachi and is popularly known
                for being a member and co-founder of the Hip-hop
                band, Young Stunners along with Talhah Yunus, with Jokhay as music producer.[3][4] His first original
                was "Burger-e-Karachi" which was released in 2013 and it rose to fame.</p>
              <div class="flex items-center flex-wrap ">
                <a class="text-green-500 inline-flex items-center md:mb-2 lg:mb-0"
                  href="https://en.wikipedia.org/wiki/Talha_Anjum">Learn More
                  <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                    <path d="M12 5l7 7-7 7"></path>
                  </svg>
                </a>
                <span
                  class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                  <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                    stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                  </svg>1.2K
                </span>
                <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                  <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                    stroke-linejoin="round" viewBox="0 0 24 24">
                    <path
                      d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                    </path>
                  </svg>6
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- body ends  -->

  <!-- footer starts -->

  <footer class="text-gray-600 body-font ">
    <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col ">
      <img src="img/logo.png " style="max-width: 50px; " alt="app logo ">
      <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4 ">
        <a href="https://github.com/Sha1kh4/ " class="text-gray-600 ml-1 " rel="noopener noreferrer "
          target="_blank ">@Skad</a>
      </p>
      <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start ">
        <a class="text-gray-500 "> <a href="https://Facebook.com/ ">
            <!-- fb  -->
            <svg fill="currentColor " stroke-linecap="round " stroke-linejoin="round " stroke-width="2 "
              class="w-5 h-5 " viewBox="0 0 24 24 ">
              <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z "></path>
            </svg></a>
        </a>
        <a class="ml-3 text-gray-500 "> <a href="https://twitter.com/ ">
            <!-- twitter -->
            <svg fill="currentColor " stroke-linecap="round " stroke-linejoin="round " stroke-width="2 "
              class="w-5 h-5 " viewBox="0 0 24 24 ">
              <path
                d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z ">
              </path>
            </svg></a>
        </a>
        <a class="ml-3 text-gray-500 ">
          <!-- instagram -->
          <a href="https://instagram.com/maybe.skad/ "><svg fill="none " stroke="currentColor " stroke-linecap="round "
              stroke-linejoin="round " stroke-width="2 " class="w-5 h-5 " viewBox="0 0 24 24 ">
              <rect width="20 " height="20 " x="2 " y="2 " rx="5 " ry="5 "></rect>
              <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01 "></path>
            </svg></a>
        </a>
        <a class="ml-3 text-gray-500 "> <a href="https://www.linkedin.com/in/sha1kh4/ ">
            <!-- linkedin   -->
            <svg fill="currentColor " stroke="currentColor " stroke-linecap="round " stroke-linejoin="round "
              stroke-width="0 " class="w-5 h-5 " viewBox="0 0 24 24 ">
              <path stroke="none "
                d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z "></path>
              <circle cx="4 " cy="4 " r="2 " stroke="none "></circle>
            </svg></a>
        </a>
      </span>
    </div>
  </footer>

  <!-- footer ends  -->
</body>

</html>