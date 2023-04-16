    <?php 
      require '../config/config.php';
      require '../include/header.php'; 
    ?>
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('../images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Register</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Home</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Register</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section">
      <div class="container">
        <div class="row">

            <?php
                if(isset($_POST["submit"])) {
                  if(empty($_POST["username"]) OR empty($_POST["email"]) OR empty($_POST["re_password"])) {
                    echo '<div class="alert bg-danger text-white alert-danger" role="alert">Some input are empty</div>';
                  } else {
                      $username = $_POST["username"];
                      $email = $_POST["email"];
                      $password = $_POST["password"];
                      $re_password = $_POST["re_password"];
                      $img = "web-coding.png";
                      $type = $_POST["type"];
                      
                      // check matching password and set password
                      if ($password == $re_password) {
                        $insert = $conn->prepare("INSERT INTO users (username, email, password, img, type) VALUES (:username, :email, :password, :img, :type) ");

                        $insert->execute([
                          ":username" => $username,
                          ":email" => $email,
                          ":password" => password_hash($password, PASSWORD_DEFAULT),
                          ":img" => $img,
                          ":type" => $type,
                        ]);

                        $register_success_alert = "<div class='alert alert-success bg-success text-white' role='alert'>User Successfully Registered</div>";

                        echo $register_success_alert;
                      
                        // header("location: login.php");
                      } else {

                        $register_failed_alert = "<div class='alert alert-danger bg-danger text-white' role='alert'>Password not match</div>";

                        echo $register_failed_alert;
                      }
                  }
                }
               ?>

          <div class="col-md-12 mb-5">
            <form action="register.php" method="POST" class="p-4 border rounded">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Username</label>
                  <input type="text" id="fname" class="form-control" placeholder="Username" name="username">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Email</label>
                  <input type="text" id="fname" class="form-control" placeholder="Email address" name="email">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label for="type" class="text-black">Select Type</label>
                  <select class="selectpicker" data-style="btn-white btn-lg" data-width="100%" title="Select Type" name="type">
                    <option>Job Suitors</option>
                    <option>Company</option>
                  </select>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Password</label>
                  <input type="password" id="fname" class="form-control" placeholder="Password" name="password">
                </div>
              </div>
              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Re-Type Password</label>
                  <input type="password" id="fname" class="form-control" placeholder="Re-type Password" name="re_password">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Sign Up" class="btn px-4 btn-primary text-white">
                </div>
              </div>

            </form>
          </div>
      
        </div>
      </div>
    </section>
    <?php require '../include/footer.php'; ?>