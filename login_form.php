<?php

session_start();

$message = '';

if (isset($_GET['fail']) == TRUE) {
  $message = '
    <div class="alert alert-danger" role="alert">
    username หรือ password ไม่ถูกต้อง
    </div>
  ';
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Borrow Device</title>
  </head>
  <style>
      .button_image {
      background-color: #4CAF50; /* Green */
      border: none;
      color: white;
      padding: 10px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
    }

    .button_images{
      border-radius: 8px;
    }

    .center {
      margin: auto;
      width: 60%;

    }

    .logout {
      border: none;
      color: white;
      padding: 5px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      transition-duration: 0.4s;
      cursor: pointer;
    }

    .cancel {
      border: none;
      color: white;
      padding: 1px 5px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      transition-duration: 0.4s;
      cursor: pointer;
    }
    
    .logoutbtn {
      color: black; 
      border: 1px solid #C70039;
    }

    .cancelbtn {
      color: black; 
      border: 1px solid #C70039;
    }

</style>
<body>

<body class="bg-light">

<?php echo $message; ?>

<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Please Return</h2>
      <img src="http://localhost/borrow/upload/returnpic.png"  width="500" height="500" >

  </div>
  <br>
  <form method="post" action="login_do.php">
      <div class="row g-5">

      <div class="col-lg-8 center">
        <form class="needs-validation" novalidate="">
          <div class="row g-3">

            <br>

            <div class="col-12">
              <label class="form-label"><b>Username</b></label>
              <input type="text" class="form-control" placeholder="Enter Username" name="username" required>     
            </div>

            <div class="col-12">
              <label  class="form-label"><b>Password</b></label>
              <input type="password" class="form-control" placeholder="Enter Password" name="password" required> 
            </div>

          <hr class="my-4">

         <button class="w-100 btn btn-primary btn-lg" type="submit">Sign In</button>
        </form>
      </div>
    </div>
  </main>
</div>

</body>
</html>
