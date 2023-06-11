<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../assets/css/style_admin.css" />
  <title>Login</title>
</head>

<body>
  <form action="sv_login.php" method="post">
    <div class="container">
      <div class="box form-box">
        <a href="../index.php" class="login-title">
          <span><b>Yako Treats</b></span></a><br>
        <header>Login</header>
        <form action="">
          <div class="field input">
            <label for="email"></label>
            <input type="email" name="email" id="email" autocomplete="off" placeholder="E-mail" required />
          </div>
          <div class="field input">
            <label for="password"></label>
            <input type="password" name="password" id="password" autocomplete="off" placeholder="Password" required />
          </div>
          <div class="field">
            <input type="submit" class="btn" name="submit" value="Login" required />
          </div>
        </form>
      </div>
    </div>
</body>

</html>