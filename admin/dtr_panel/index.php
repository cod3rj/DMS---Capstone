<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="dtr_dashboard/css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <style>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");
        
:root {
  --main-color: #0F1E2D;
  --light: #eeebdd;
  --medj-light: #d8b6a4;
  --maroon: #630000;
  --red: #f20000;
  --gray: #32312f;
  --black: #13131a;
  --bg: #0F1E2D;
  --border: 0.1rem solid rgba(255, 255, 255, 0.3);
  --box-shadow: 0 0.1rem 1.5rem rgba(0, 0, 0, 0.1);
  --transparent: rgba(0, 0, 0, 0.5);
}

section {
  position: relative;
  width: 100%;
  height: 100vh;
  display: flex;
}

section .imgBx {
  position: relative;
  width: 50%;
  height: 100%;
}

section .imgBx::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
}

section .imgBx img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%; 
}

section .contentBx {
  background: var(--gray);
  display: flex;
  justify-content: center;
  align-items: center;
  width: 50%;
  height: 100%;
}

section .contentBx .formBx {
  width: 50%;
}

    .button {
      background-color: #d6a92b; /* Green */
      border: none;
      color: white;
      padding: 16px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      transition-duration: 0.4s;
      cursor: pointer;
    }

    .button1 {
      background-color: white; 
      color: black; 
      border: 2px solid black;
    }

    .button1:hover {
      background-color: var(--main-color);
      color: white;
    }
    
    </style>
</head>

<body>

<section>
        <div class="imgBx">
            <img src="dtr_dashboard/images/dormitory.png" alt = "dormitorylogo">
        </div>
        <div class="contentBx">
            <div class="formBx">
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center">LOGIN HERE</div>
            <div class="card-body">
                <form method="post" name="login_sform">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" alt="username" type="text" placeholder="Username" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" type="password" alt="password" placeholder="Password"  autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="remember" onclick="myFunction()"><span class="custom-control-label">Show Password</span>
                        </label>
                    </div>
                   <div class="form-group">
                    <button class="btn btn-lg btn-block button1" value="Sign in" id="btn-admin" name="btn-admin">Sign in</button>
                    </div>
                     <div class="form-group" id="alert-msg">
                </form>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
 </div>
        </div>
    </section>

    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script type="text/javascript">
      document.oncontextmenu = document.body.oncontextmenu = function() {return false;}//disable right click
    </script>
     <script type="text/javascript">
            jQuery(function(){
                $('form[name="login_sform"]').on('submit', function(e){
                    e.preventDefault();

                    var u_username = $(this).find('input[alt="username"]').val();
                    var p_password = $(this).find('input[alt="password"]').val();
                   // var s_status = 1;

                    if (u_username === '' && p_password ===''){
                        $('#alert-msg').html('<div class="alert alert-danger"> Required Username and Password!</div>');
                    }else{
                        $.ajax({
                            type: 'POST',
                            url: '../init/controllers/login_process.php',
                            data: {
                                username: u_username,
                                password: p_password
                                //status: s_status
                            },
                            beforeSend:  function(){
                                $('#alert-msg').html('');
                            }
                        })
                        .done(function(t){
                            if (t == 0){
                                $('#alert-msg').html('<div class="alert alert-danger">Incorrect username or password!</div>');
                            }else{
                                $("#btn-admin").html('<img src="../assets/images/loading.gif" /> &nbsp; Signing In ...');
                                setTimeout(' window.location.href = "dtr_dashboard/home.php"; ',2000);
                            }
                        });
                    }
                });
           });
        </script>
        <script>
            function myFunction() {
              var x = document.getElementById("password");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            }
     </script>
    </body>
</html>