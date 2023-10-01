<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login_action</title>

    <!---------------------------------------------------------------->

    <link rel="stylesheet" href="./Frameworks/Bootstrap-5.3.1/bootstrap-5.3.1-dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="./base.css">

    <script src="./Frameworks/Bootstrap-5.3.1/bootstrap-5.3.1-dist/js/bootstrap.min.js" defer></script>

    <!---------------------------------------------------------------->

</head>

<body>

    <?php
    
    session_start();

    $un = $_POST['txt-priv-name'];
    $pd = $_POST['txt-priv-pw'];

    include 'connect_DB.php';
    echo "<br><br>";

    $sql = "SELECT * FROM users WHERE u_username = '$un' AND u_password = '$pd'";

    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            $_SESSION['s_u_ID'] = $row['u_ID'];
            $role = $row['u_role'];

            switch ($role) {
                case "user":
                    header("Location: index_log.html");
                    break;
                case "doctor":
                    header("Location: d_home.php");
                    break;
                case "receptionist":
                    header("Location: r_home.php");
                    break;
                case "admin":
                    header("Location: aa_home.php");
                    break;
                default:
                    header("Location: index.php");
            }
        }
    } else {
        echo <<<HTML
            <script>
                  window.onload = function() {
                      var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
                      myModal.show();
                      
                      setTimeout(function() {
                          window.history.back();
                      }, 2500); 
                  }
              </script>
        HTML;
    }
    ?>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Invalid Credentials</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    The username or password you entered is incorrect. <br>Please try again.
                </div>
            </div>
        </div>
    </div>

</body>

</html>