<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['useridlogin'])) {
    // User is not logged in, redirect to index.php
    header("Location: index.php");
    exit();
}

// Retrieve the user's status from the database
try {
    $pdo = new PDO("mysql:host=sql6.freemysqlhosting.net;dbname=sql6631029;charset=utf8", 'sql6631029', '6kQ5lHTI2l');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT status FROM sql6631029 WHERE username = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_SESSION['useridlogin']]);
    $user = $stmt->fetch();

    if (!$user || $user['status'] !== '1') {
        // User does not have status 1, redirect to index.php
        header("Location: index.php");
        exit();
    }
} catch (PDOException $e) {
    // Handle any database connection errors
    echo "Database connection failed: " . $e->getMessage();
}
?>


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashbord</title>
  <style>
        #footer {
            position: fixed;
            padding: 10px 10px 0px 10px;
            bottom: 0;
            width: 100%;
            /* Height of the footer*/
            height: 40px;
            background: grey;
        }
    </style>
 
  <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        // js to open and close Contact table using button 
        function toggleTable() {
            var table = document.getElementById("data-table");
            table.style.display = (table.style.display === "none") ? "table" : "none";
        }

        // js to open and close request table using button 

        function toggleTable1() {
            var table = document.getElementById("data-table1");
            table.style.display = (table.style.display === "none") ? "table" : "none";
        }

        // js to open and close Feedback table using button 
</script>


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
if (isset($_SESSION['useridlogin'])) {
    // User is logged in
    $username = $_SESSION['useridlogin'];
    echo '<form method="POST">
              <button type="submit" name="logout">Logout</button>
          </form>';
}
 else {
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
  </header><!-- first table starts  -->
    <div class="container">
        <button onclick="toggleTable()">View new artists request</button>
        <div id="data-table" style="display: none;">
            <?php
            // Database configuration
            $servername = "sql6.freemysqlhosting.net";
            $username = "sql6631029";
            $password = "6kQ5lHTI2l";
            $dbname1 = "sql6631029";

            // Create connections
            $conn1 = new mysqli($servername, $username, $password, $dbname1);



            // Check connections
            if ($conn1->connect_error) {
                die("Connection failed: " . $conn1->connect_error);
            }

            $sql1 = "SELECT * FROM inputs";
            $result1 = $conn1->query($sql1);



            if ($result1 && $result1->num_rows > 0) {
                echo "<h2>Database: Contacts</h2>";
                echo '<table class="md:table-fixed">';
                echo "<tr><th>ID</th><th>Name</th><th>title</th><th>link</th><th>info</th></tr>";

                while ($row = $result1->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["title"] . "</td>";
                    echo "<td>" . $row["links"] . "</td>";
                    echo "<td>" . $row["info"] . "</td>";

                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "<p>No requests were found</p>";
            }
            // Close the connections
            $conn1->close();
            ?>
        </div>


    </div><br>
    <!-- first table ends -->
    <!-- second table starts -->

    <div class="container">
        <button onclick="toggleTable1()">View feedback</button>
        <div id="data-table1" class= "center"style="display: none;">


            <?php

            // Create connections
            $conn1 = new mysqli($servername, $username, $password, $dbname1);
            $sql2 = "SELECT * FROM feedback";
            $result2 = $conn1->query($sql2);


            // Display the data from the "admission" database
            if ($result2 && $result2->num_rows > 0) {
                echo "<h2>Database: Feedback</h2>";
                echo '<table class="md:table-fixed hover:table-fixed">';
                echo "<tr><th>ID</th><th>Email</th><th>subject</th><th>messege</th></tr>";

                while ($row = $result2->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["subject"] . "</td>";
                    echo "<td>" . $row["message"] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "<p>No Feedback were found</p>";
            }
            // Close the connections
            $conn1->close();
            ?>
        </div>
        <!-- third table ends -->

  <!-- footer starts -->

  <footer class="text-gray-600 body-font ">
    <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col ">
      <img src="img/logo.png " style="max-width: 50px; " alt="app logo ">
      <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4 ">
        <a href="https://google.com/ " class="text-gray-600 ml-1 " rel="noopener noreferrer " target="_blank ">@ Skad</a>
      </p>
      <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start ">
        <a class="text-gray-500 ">
          <svg fill="currentColor " stroke-linecap="round " stroke-linejoin="round " stroke-width="2 " class="w-5 h-5 "
            viewBox="0 0 24 24 ">
            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z "></path>
          </svg>
        </a>
        <a class="ml-3 text-gray-500 ">
          <svg fill="currentColor " stroke-linecap="round " stroke-linejoin="round " stroke-width="2 " class="w-5 h-5 "
            viewBox="0 0 24 24 ">
            <path
              d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z ">
            </path>
          </svg>
        </a>
        <a class="ml-3 text-gray-500 ">
          <svg fill="none " stroke="currentColor " stroke-linecap="round " stroke-linejoin="round " stroke-width="2 "
            class="w-5 h-5 " viewBox="0 0 24 24 ">
            <rect width="20 " height="20 " x="2 " y="2 " rx="5 " ry="5 "></rect>
            <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01 "></path>
          </svg>
        </a>
        <a class="ml-3 text-gray-500 ">
          <svg fill="currentColor " stroke="currentColor " stroke-linecap="round " stroke-linejoin="round "
            stroke-width="0 " class="w-5 h-5 " viewBox="0 0 24 24 ">
            <path stroke="none "
              d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z "></path>
            <circle cx="4 " cy="4 " r="2 " stroke="none "></circle>
          </svg>
        </a>
      </span>
    </div>
  </footer>

  <!-- footer ends  -->
</body>

</html>