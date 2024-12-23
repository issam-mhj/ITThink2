<?php
require_once 'connection.php';
// require_once 'sign_up.php';
// session_start();
// $_SESSION['sa7i7'] = $sa7i7;
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>ITTHINK</title>
  </head>
  <body>
    <div class="container" id="container">
      <h1>LOG-IN</h1>
      <form class="log-in-form" action="sign_in.php" method="post">
        <label class="label" for="username-login">username</label>
        <input
          type="text"
          id="username-login"
          placeholder="username"
          name="username-login"
        />
        <label class="label" for="password-login">password</label>
        <input
          type="password"
          id="password-login"
          placeholder="password"
          name="password-login"
        />
       
        <button class="submit" id="log-in-submit" type="submit">log in</button>
      </form>
      <?php 
      echo 'hey';
      
      ?>

      <span class="dont-have-account-text"
        >don't have an accont?
        <button id="dont-have-account" class="dont-have-account">
          sign up here
        </button></span
      >
    </div>

    <div style="display: none" class="container2" id="container2">
      <h1>LOG-UP</h1>
      <form class="log-in-form" action="sign_up.php" method="post">
        <label class="label" for="username-sign-up">username</label>
        <input
          type="text"
          id="username-sign-up"
          placeholder="username"
          name="username-sign-up"
        />

        <label class="label" for="password-sign-up">password</label>
        <input
          type="password"
          id="password-sign-up"
          placeholder="password"
          name="password-sign-up"
        />

        <label class="label" for="email-sign-up">email</label>
        <input
          type="text"
          id="email-sign-up"
          placeholder="email"
          name="email-sign-up"
        />

        <label class="label" for="phone-sign-up">phone number</label>
        <input
          type="text"
          id="phone-sign-up"
          placeholder="phone number"
          name="phone-sign-up"
        />

        <div class="error-messages" id="error-messages"></div>

        <button class="submit" id="sign-up-submit" name="sub" type="submit">log in</button>
      </form>

      <span class="dont-have-account-text"
        >already have an accont?
        <button id="already-have-account" class="dont-have-account">
          log in here
        </button></span
      >
    </div>

    <script>
      const dontHaveAccount = document.getElementById("dont-have-account");
      const alreadyHaveAccount = document.getElementById(
        "already-have-account"
      );
      console.log("ffff");
      dontHaveAccount.addEventListener("click", () => {
        document.getElementById("container").style.display = "none";
        document.getElementById("container2").style.display = "block";
      });

      alreadyHaveAccount.addEventListener("click", () => {
        document.getElementById("container2").style.display = "none";
        document.getElementById("container").style.display = "block";
      });
    </script>
  </body>
</html>