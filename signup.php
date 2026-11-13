<?php
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $h = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $s = $conn->prepare("INSERT INTO users(username,email,password) VALUES(?,?,?)");
  $s->bind_param("sss", $_POST['username'], $_POST['email'], $h);
  if ($s->execute()) { echo "<p>Registered successfully</p>"; }
  else { echo "<p>Error: " . $conn->error . "</p>"; }
}
?>
<h2>CAT 2 - Sign Up (Trevor Kimani) - v2</h2>
<form method="post">
  <input name="username" placeholder="Username" required><br>
  <input name="email" type="email" placeholder="Email" required><br>
  <input name="password" type="password" placeholder="Password" required><br>
  <button>Sign up</button>
</form>
<a href="login.php">Login</a> | <a href="feedback.php">Feedback</a>
