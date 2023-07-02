<?php
// Update the following variables with your database credentials
$host = 'localhost';
$dbname = 'users';
$username = 'root';
$password = '';

$isSubmitted = false; // Initialize the flag variable

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Establish a database connection using PDO
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

        // Enable PDO error mode
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Get the submitted form data
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        // Prepare and execute the SQL query
        $query = "INSERT INTO feedback (email, subject,message) VALUES ( ?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$email, $subject, $message]);

        // Check if the feedback was successfully inserted
        if ($stmt->rowCount() > 0) {
            $isSubmitted = true; // Set the flag variable to true
        } else {
            echo "Sorry, there was an error submitting your feedback. Please try again.";
        }
    } catch (PDOException $e) {
        // Handle any database connection errors
        echo "Database connection failed: " . $e->getMessage();
    }
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Page</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
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
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Contact Us
            </h2>
            <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">Got a technical
                issue? Want to send feedback about a beta feature? Need details about our Business plan? Let us know.
            </p>
            <form method="POST" class="space-y-8">
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your
                        email</label>
                    <input type="email" name="email" id="email"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                        placeholder="name@flowbite.com" required>
                </div>
                <div>
                    <label for="subject" name="subject"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subject</label>
                    <input type="text" id="subject" name="subject"
                        class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                        placeholder="Let us know how we can help you" required>
                </div>
                <div class="sm:col-span-2">
                    <label for="message" 
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your message</label>
                    <textarea id="message" rows="6" name="message" required
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Leave a comment..."></textarea>
                </div>
                <button type="submit"
                    class="text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Send
                    message</button>
            </form>
        </div>
    </section><!-- footer starts -->

<footer style="background-color: #d4af37;" class="text-gray-600 body-font ">
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