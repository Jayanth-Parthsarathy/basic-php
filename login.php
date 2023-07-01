<?php
require_once 'db.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
</head>

<body>
  <h1>Login</h1>
  <form action="login.php" method="post">
    <label for="username">Username: </label>
    <input type="text" name="username" id="username" placeholder="Username">
    <br>
    <label for="password">Password: </label>
    <input type="password" name="password" id="password" placeholder="Password">
    <br>
    <input type="submit" name="submit" value="Login">
  </form>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
        $sql = "SELECT * FROM users WHERE user='$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            echo "Login successful";
            header("Location: index.php");
        } else {
            echo "Login failed";
        }
    }
}
?>
