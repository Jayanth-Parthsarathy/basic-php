<?php
require_once 'db.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>Register</title>
</head>

<body>
  <h1>Register</h1>
  <form action="register.php" method="post">
    <label for="username">Username: </label>
    <input type="text" name="username" id="username" placeholder="Username">
    <br>
    <label for="password">Password: </label>
    <input type="password" name="password" id="password" placeholder="Password">
    <br>
    <input type="submit" name="submit" value="Register">
  </form>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (user, password) VALUES ('$username', '$password')";
        try {

            mysqli_query($conn, $sql);
      header("Location: login.php");
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {

        echo "Please fill out the form";
    }
} else {
    echo "Register to continue";
}
?>
