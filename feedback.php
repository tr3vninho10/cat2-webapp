<?php
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $s = $conn->prepare("INSERT INTO feedback(name,message) VALUES(?,?)");
  $s->bind_param("ss", $_POST['name'], $_POST['message']);
  $s->execute();
}
?>
<h2>CAT 2 - Feedback</h2>
<form method="post">
  <input name="name" placeholder="Your name" required><br>
  <textarea name="message" placeholder="Message" required></textarea><br>
  <button>Send</button>
</form>
<h3>Submitted feedback</h3>
<?php
$res = $conn->query("SELECT * FROM feedback ORDER BY id DESC");
while ($row = $res->fetch_assoc()) {
  echo "<p><b>" . htmlspecialchars($row['name']) . "</b>: " . htmlspecialchars($row['message']) . " <small>(" . $row['created'] . ")</small></p>";
}
?>
<a href="signup.php">Sign up</a> | <a href="login.php">Login</a>
