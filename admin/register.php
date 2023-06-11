<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../assets/css/style_admin.css" />
  <title>Register</title>
</head>

<body>
  <form action="sv_register.php" method="post">
    <div class="container">
      <div class="box form-box">
        <header>Register an Admin</header>
        <form action="">
          <div class="field input">
            <label for="username"></label>
            <input type="text" name="username" id="username" autocomplete="off" placeholder="Username" required />
          </div>
          <div class="field input">
            <label for="email"></label>
            <input type="email" name="email" id="email" autocomplete="off" placeholder="E-mail" required />
          </div>
          <div class="field input">
            <label for="password"></label>
            <input type="password" name="password" id="password" autocomplete="off" placeholder="Password" required />
          </div>
          <div class="field input">
            <label for="confirm_password"></label>
            <input type="password" name="confirm_password" id="confirm_password" autocomplete="off"
              placeholder="Confirm Password" required />
          </div>
          <div class="field">
            <input type="submit" class="btn" id="btn" name="submit" value="Sign Up" required />
          </div>
          <div class="links">
            <a href="page.php">
              << Back to Dashboard</a>
          </div>
        </form>
      </div>
    </div>
</body>

<script>
  function cek_password() {
    var password = docoument.getElementById("password").value;
    var confirm_password = document.getElementById("confirm_password").value;

    if (password == confirm_password) {
      document.getElementById("btn").disabled = false; //enabled
    } else {
      document.getElementById("btn").disabled = true; //disabled
    }
  }
</script>

</html>