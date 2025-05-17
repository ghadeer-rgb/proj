<?php
session_start();

$error = '';

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'househero1';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $inputPassword = isset($_POST['password']) ? $_POST['password'] : '';

    if ($email && $inputPassword) {
        $stmt = $conn->prepare("SELECT userid, Email, password_u FROM users WHERE Email = ?");
        if ($stmt) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();

                if (password_verify($inputPassword, $user['password_u'])) {
                    $_SESSION['user_id'] = $user['userid'];
                    $_SESSION['user_email'] = $user['Email'];

                    if ($user['Email'] === 'admin@gmail.com') {
                        header("Location: admindashboard.php");
                    } else {
                        header("Location: services.php");
                    }
                    exit();
                } else {
                    $error = "Invalid password!";
                }
            } else {
                $error = "No account found with that email!";
            }
            $stmt->close();
        } else {
            $error = "Database error: failed to prepare statement.";
        }
    } else {
        $error = "Please enter both email and password.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Login | HouseHero</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #ffc75f;
    }
    .login-container {
      max-width: 400px;
      margin-top: 100px;
      padding: 2rem;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
  <div class="login-container">
    
    <img src="imgs/worker.png" alt="Logo" class="d-block mx-auto mb-4" style="height: 100px;">
    <h3 class="text-center mb-4">Login to HouseHero</h3>

    <?php if (!empty($error)): ?>
      <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="post" action="" autocomplete="off">
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input
          type="email"
          name="email"
          class="form-control"
          id="email"
          required
          autocomplete="off"
        />
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input
          type="password"
          name="password"
          class="form-control"
          id="password"
          required
          autocomplete="new-password"
        />
      </div>

      
      <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>

    <div class="text-center mt-3"> <a href="createaccount.html">Create an account</a>
    </div>
  </div>
</div>

</body>
</html>
