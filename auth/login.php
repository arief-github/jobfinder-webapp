 <?php
 require "../config/config.php";
 require "../include/header.php";
 ?>

  <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('<?php echo APP_URL; ?>/images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Log In</h1>
            <div class="custom-breadcrumbs">
              <a href="<?php echo APP_URL; ?>">Home</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Log In</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section">
      <div class="container">
        <div class="row">

          <?php 
            if (isset($_POST["submit"])) {
              if (empty($_POST["email"]) or empty($_POST["password"])) {
                  echo '<div class="alert bg-danger text-white alert-danger" role="alert">Some input are empty</div>';
              } else {
                  $email = $_POST["email"];
                  $password = $_POST["password"];

                  $login = $conn->query(
                      "SELECT * FROM users WHERE email = '$email' "
                  );

                  $login->execute();

                  $select_login = $login->fetch(PDO::FETCH_ASSOC);

                  if ($login->rowCount() > 0) {
                      if (
                          password_verify($password, $select_login["password"])
                      ) {
                          echo '<div class="alert bg-success text-white alert-success" role="alert">Login Success</div>';
                      } else {
                          echo '<div class="alert bg-danger text-white alert-danger" role="alert">User Invalid</div>';
                      }
                  } else {
                      echo '<div class="alert bg-danger text-white alert-danger" role="alert">User Invalid</div>';
                  }
              }
            } 
          ?>
      
          <div class="col-md-12">
            <form action="login.php" method="POST" class="p-4 border rounded">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Email</label>
                  <input type="text" id="fname" class="form-control" placeholder="Email address" name="email">
                </div>
              </div>
              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Password</label>
                  <input type="password" id="fname" class="form-control" placeholder="Password" name="password">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Log In" class="btn px-4 btn-primary text-white">
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </section>

<?php require "../include/footer.php"; ?>
