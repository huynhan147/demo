<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin - login</title>
    <link rel="stylesheet" href="../publics/css/bootstrap.min.css">
    <link rel="stylesheet" href="../publics/css/login.css">
</head>
<body>
    <div class="container">
        <div class="login-container">
            <div id="output"></div>
            <div class="row">
                <img class=" img-responsive avatar img-rounded" src="../publics/images/login.jpg" alt="">
            </div>
            <div class="form-box">
                <form action="?c=login&m=handle" method="POST">
                    <input name="user" type="text" placeholder="Username">
                    <input name="pass" type="password" placeholder="Password">
                    <button class="btn btn-info btn-block login" type="submit" name="btnsubmit">Login</button>
                </form>
            </div>
        </div>
    </div>
    <!-- <script src="../publics/js/jquery.min.js" type="text/javascript"></script> -->
    <!-- <script type="text/javascript">
        $(function(){
            var textfield = $("input[name=user]");
            var password  = $("input[type=password]");
            $('button[type="submit"]').click(function(e) {
                e.preventDefault();
                if (textfield.val() != "" && password.val() != "" ) {

                    $("#output").addClass("alert alert-success animated fadeInUp").html("Welcome back " + "<span style='text-transform:uppercase'>" + textfield.val() + "</span>");
                    $("#output").removeClass(' alert-danger');
                    $("input").css({
                        "height":"0",
                        "padding":"0",
                        "margin":"0",
                        "opacity":"0"
                    });
                    //change button text
                    $('button[type="submit"]').html("continue").removeClass("btn-info").addClass("btn-default").click(function(){
                        $("input").css({
                        "height":"auto",
                        "padding":"10px",
                        "opacity":"1"
                        }).val("");
                    });
                } else {
                    //remove success mesage replaced with error message
                    $("#output").removeClass(' alert alert-success');
                    $("#output").addClass("alert alert-danger animated fadeInUp").html("sorry enter a username ");
                }
            });
        });
    </script> -->
</body>
</html>