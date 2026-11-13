<?php
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $s = $conn->prepare("SELECT password FROM users WHERE username=?");
  $s->bind_param("s", $_POST['username']);
  $s->execute();
  $r = $s->get_result()->fetch_assoc();
  if ($r && password_verify($_POST['password'], $r['password'])) {
    echo "<p>Login successful: " . htmlspecialchars($_POST['username']) . "</p>";
  } else { echo "<p>Invalid credentials</p>"; }
}
?>
<h2>CAT 2 - Login</h2>
<form method="post">
  <input name="username" placeholder="Username" required><br>
  <input name="password" type="password" placeholder="Password" required><br>
  <button>Login</button>
</form>
<a href="signup.php">Sign up</a>
