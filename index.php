<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'phpcrud'; 

    $dsn = "mysql:host=localhost;dbname=phpcrud;charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $pass);
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<?php
  // SIGN UP
  if (isset($_POST['signup'])) {
    // FORM DATA VARIABLES
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = md5(htmlspecialchars($_POST['password']));

    $sql = "INSERT INTO auth (name, email, password) VALUES (:name, :email, :password)";
    $stmt = $pdo -> prepare($sql);

    // CORRECT THE FORM DATA
    $stmt -> bindParam(':name', $name);
    $stmt -> bindParam(':email', $email);
    $stmt -> bindParam(':password', $password);

    // EXECUTE THE SQL QUERY
    $stmt -> execute();

    // START SESSION AFTER SUBMISSION
    session_start();
    $_SESSION['name'] = $name;

    // REDIRECT TO HOMEPAGE
    header('location: crud.php');
  }



  // SIGN IN
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the email and password from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    // Prepare the SQL query
    $query = "SELECT * FROM auth WHERE email = ? AND password = ?";
    $stmt = $pdo->prepare($query);

    // Bind the parameters
    $stmt->bindParam(1, $email);
    $stmt->bindParam(2, $password);

    // Execute the query
    $stmt->execute();

    // Check if the query returned a row
    if ($stmt->rowCount() == 1) {
        // Authentication successful
        session_start();
        $_SESSION['name'] = $name;
        header('location: crud.php');
    } else {
        // Authentication failed
        echo "Invalid email or password";
    }
    } else {
    // Check if the user is already logged in
    session_start();
    if (isset($_SESSION['name'])) {
        // User is already logged in
        echo "Welcome, " . $_SESSION['name'];
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
    <title>AUTHENTICATION</title>
  </head>
  <body>
    <div class="container" id="container">
      <div class="form-container sign-up-container">
        <form method="POST">
          <h1>Sign Up</h1>
          <div class="social-container">
            <a href="#" class="social"><i class="fab fa-instagram"></i></a>
            <a href="#" class="social"><i class="fab fa-google"></i></a>
            <a href="#" class="social"><i class="fab fa-tiktok"></i></a>
          </div>
          <span>or use your email for registration</span>
          <input type="text" name="name" placeholder="Name" />
          <input type="email" name="email" placeholder="Email" />
          <input type="password" name="password" placeholder="Password" />
          <input type="submit" name="signup" value="Sign Up">
        </form>
      </div>
      <div class="form-container sign-in-container">
        <form method="POST">
          <h1>Sign In</h1>
          <div class="social-container">
            <a href="#" class="social"><i class="fab fa-instagram"></i></a>
            <a href="#" class="social"><i class="fab fa-google"></i></a>
            <a href="#" class="social"><i class="fab fa-tiktok"></i></a>
          </div>
          <span>or use your account</span>
          <input type="text" name="name" placeholder="Username" />
          <input type="email" name="email" placeholder="Email" />
          <input type="password" name="password" placeholder="Password" />
          <a href="#">Forgot your password?</a>
          <input type="submit" name="login" value="Log In">
        </form>
      </div>
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1>Welcome Back!</h1>
            <p>Please login with your personal info</p>
            <button class="ghost" id="signIn">Sign In</button>
          </div>
          <div class="overlay-panel overlay-right">
            <h1>Hello, Friend!</h1>
            <p>Enter your personal details and start your journey with us</p>
            <button class="ghost" id="signUp">Sign Up</button>
          </div>
        </div>
      </div>
    </div>
    <script src="script.js"></script>
  </body>
</html>
