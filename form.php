<?php
// Update the following variables with your database credentials
$host = 'sql6.freemysqlhosting.net';
$dbname = 'sql6631029';
$username = 'sql6631029';
$password = '6kQ5lHTI2l';

$isSubmitted = false; // Initialize the flag variable

// Check if the user is logged in
session_start();
if (isset($_SESSION['useridlogin'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            // Establish a database connection using PDO
            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

            // Enable PDO error mode
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Get the submitted form data
            $name = $_POST['name'];
            $title = $_POST['title'];
            $links = $_POST['links'];
            $info = $_POST['info'];

            // Prepare and execute the SQL query
            $query = "INSERT INTO inputs (name, title, links, info) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$name, $title, $links, $info]);

            // Check if the feedback was successfully inserted
            if ($stmt->rowCount() > 0) {
                $isSubmitted = true; // Set the flag variable to true
                echo "<script>alert('Your feedback has been sent')</script>";
            } else {
                echo "Sorry, there was an error submitting your feedback. Please try again.";
            }
        } catch (PDOException $e) {
            // Handle any database connection errors
            echo "Database connection failed: " . $e->getMessage();
        }
    }
} else {
    echo "<script>alert('You need to log in to submit the form'); window.location.href='connection.php';</script>";
exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Page</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body >
    <!-- header starts -->

    <header class="text-amber-600 body-font bg-stone-950">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <img src="img/logo.png" style="max-width: 50px;" alt="app logo">

            <span class="ml-3 text-xl">Elites Blog</span>

            <nav
                class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400	flex flex-wrap items-center text-base justify-center">
                <a href="index.php" class=" mr-5 hover:text-yellow-900 ">Index</a>
                <a href="feedback.php" class="mr-5 hover:text-yellow-900">Contact Admin</a>
        </div>
    </header>
    <!-- header ends -->
    <br>
    <section class="text-gray-600 body-font">

        <div class="flex justify-center items-center w-screen h-screen bg-white">
            <!-- COMPONENT CODE -->
            <div class="container mx-auto my-4 px-4 lg:px-20">
<form method="POST"
                <div class="w-full p-8 my-4 md:px-12 lg:w-9/12 lg:pl-20 lg:pr-40 mr-auto rounded-2xl shadow-2xl">
                    <div class="flex">
                        <h1 class="font-bold uppercase text-5xl">Send us a <br /> Request</h1>
                    </div>
                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2 mt-5">
                        <input
                            class="w-full bg-gray-100 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline"
                            type="text" name="name"placeholder="Artists Name*" required />
                        <input
                            class="w-full bg-gray-100 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline"
                            type="text" name="title"placeholder="Artists tittle*"required />
                        <input
                            class="w-full bg-gray-100 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline"name="links"
                            type="url" placeholder="Your sources" required/>
                    </div>
                    <div class="my-4">
                        <textarea placeholder="Artists information*" required name="info"
                            class="w-full h-32 bg-gray-100 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline"></textarea>
                    </div>


                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                                    800x400px)</p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" />
                        </label>
                    </div>
                    <div class="my-2 w-1/2 lg:w-1/4">
                        <button class="uppercase text-sm font-bold tracking-wide bg-blue-900 text-gray-100 p-3 rounded-lg w-full 
                      focus:outline-none focus:shadow-outline">

                            Send Message
                        </button>
</form>        <?php if ($isSubmitted): ?>
<script >alert('Request send successfully')</script>
  <?php endif; ?>
                    </div>
                </div>
    </section>
    <br>
    <br>

    <!-- footer starts -->

    <footer style="background-color: #d4af37;"class="text-gray-600 body-font ">

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