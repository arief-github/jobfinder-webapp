    <?php
    require "../config/config.php";
    require "../include/header.php";

    if (isset($_SESSION["username"])) {
        header("location: " . APP_URL . "");
    }
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

            <?php if (isset($_POST["submit"])) {
                if (
                    empty($_POST["username"]) or
                    empty($_POST["email"]) or
                    empty($_POST["re_password"] or empty($_POST["type"]))
                ) {
                    echo '<div class="alert bg-danger text-white alert-danger" role="alert">Some input are empty</div>';
                } else {
                    $username = $_POST["username"];
                    $email = $_POST["email"];
                    $password = $_POST["password"];
                    $re_password = $_POST["re_password"];
                    $img = "web-coding.png";
                    $type = $_POST["type"];

                    // checking length of character
                    if (strlen($email) > 25 OR strlen($username) > 25) {
                        $input_error =
                            '<p class="text-danger">Text is too length</p>';
                    } else {
                        $input_error = "";
                    }

                    // check matching password and set password
                    if ($password == $re_password) {
                        if ($input_error == "") {
                            // check if email and username is already registered
                            $check_user = $conn->prepare("SELECT * FROM users WHERE email = :email OR username = :username");

                            $check_user->execute([
                              ":email" => $email,
                              ":username" => $username,
                            ]);

                            if($check_user->rowCount() > 0) {
                              $register_failed_alert = "<div class='alert alert-danger bg-danger text-white' role='alert'>Email or Username has already exist</div>";
                              echo $register_failed_alert;
                            } else {
                                // proceed if username is valid
                                $insert = $conn->prepare(
                                    "INSERT INTO users (username, email, password, img, type) VALUES (:username, :email, :password, :img, :type) "
                                );

                                $insert->execute([
                                    ":username" => $username,
                                    ":email" => $email,
                                    ":password" => password_hash(
                                        $password,
                                        PASSWORD_DEFAULT
                                    ),
                                    ":img" => $img,
                                    ":type" => $type,
                                ]);

                                $direct_to_login_page = APP_URL."/auth/login.php";

                                $register_success_alert = "<div class='alert alert-success bg-success text-white' role='alert'>User Successfully Registered <a href='{$direct_to_login_page}' class='text-white'> Login Here</a> </div>";
                                 
                                echo $register_success_alert;
                            }
                        } else {
                            $register_failed_alert =
                                "<div class='alert alert-danger bg-danger text-white' role='alert'>". $email_error ."</div>";
                            echo $register_failed_alert;
                        }
                    } else {
                        $register_failed_alert =
                            "<div class='alert alert-danger bg-danger text-white' role='alert'>Password not match</div>";
                        echo $register_failed_alert;
                    }
                }
            } ?>

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
                  <input type="email" id="fname" class="form-control" placeholder="Email address" name="email">
                  <?php 
                    if(isset($input_error)) {
                      echo $input_error;  
                    }
                  ?>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label for="type" class="text-black">Select Type</label>
                  <select class="selectpicker border" data-style="btn-white btn-lg" data-width="100%" title="Select Type" name="type">
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
    <?php require "../include/footer.php"; ?>
