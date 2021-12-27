<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

  <!-- Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

  <!-- CSS -->
  <link rel="stylesheet" href="resource/css/login.css" />

  <title>Login</title>
</head>

<body>
  <div class="container-fluid">
    <div class="card login-form">
      <div class="card-text">
        <form action="register_user.php" method="POST">
          <h1 class="card-title text-center">SIGN UP</h1>
          <!-- <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">First Name</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Last Name</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
          </div> -->
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
          </div>
          <div class="mb-3">
            <label for="password-field" class="form-label">Password</label>
            <input id="password-field" name="password" type="password" class="form-control" />
          </div>
          <div class="mb-3">
            <label for="number" class="form-label">No Telp</label>
            <input id="number" name="telp" type="number" class="form-control" />
          </div>

          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-success">Sign Up</button>
          </div>
          <p class="para-2">Already have an account? <a href="Login.php">Login Here</a></p>
        </form>

      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>