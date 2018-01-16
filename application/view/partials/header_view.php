<!DOCTYPE HTML>
<html>
    <head>
        <title><?php echo $title ?></title>
        <meta http-equiv="cache-control" content="no-cache"/>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
        <meta name="keyword" content="<?php echo $content; ?>">

        <meta charset="UTF-8"/>
        <meta name="viewport" content="initial-scale=1, maximum-scale=1"/>
        <meta name="viewport" content="width=device-width"/>
        <link rel="icon" type="image/x-icon" href="publics/user/public/images/logo.png">
        <link href="publics/user/public/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="publics/user/public/css/style1.css" rel="stylesheet" type="text/css"/>
        <link href="publics/user/public/css/bs.css" rel="stylesheet" type="text/css"/>
        <link href="publics/user/public/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="publics/user/public/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="publics/user/public/css/range-slider.css" rel="stylesheet" type="text/css"/>

        <script src="publics/user/public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="publics/user/public/js/bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="publics/user/public/js/lib.js"></script>
        <script type="text/javascript" src="publics/user/public/js/bxslider.js"></script>
        <script src="publics/user/public/js/range-slider.js"></script>
        <script src="publics/user/public/js/jquery.zoom.js"></script>
        <script type="text/javascript" src="publics/user/public/js/bookblock.js"></script>
        <script type="text/javascript" src="publics/user/public/js/custom.js"></script>
        <script type="text/javascript" src="publics/user/public/js/social.js"></script>
        <script src="publics/user/public/js/formValidation.min1.js" type="text/javascript"></script>
        <script src="publics/user/public/js/formValidation.min2.js" type="text/javascript"></script>
        <script src="publics/user/public/js/index1.js" type="text/javascript"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            $('.social_active').hoverdir( {} );
            $('#ex1').zoom();
        });
            $(function(){
                $("#menua").click(function(){
                    // $("span#span1").removeClass();
                    $("span#span1").toggleClass('glyphicon glyphicon-triangle-bottom');
                    $("span#span1").toggleClass('glyphicon glyphicon-triangle-right'); 
                })
            });
              $(function(){
                $("#menub").click(function(){
                    // $("span#span1").removeClass();
                    $("span#span2").toggleClass('glyphicon glyphicon-triangle-bottom');
                    $("span#span2").toggleClass('glyphicon glyphicon-triangle-right'); 
                })
            });
                $(function(){
                $("#menuc").click(function(){
                    // $("span#span1").removeClass();
                    $("span#span3").toggleClass('glyphicon glyphicon-triangle-bottom');
                    $("span#span3").toggleClass('glyphicon glyphicon-triangle-right'); 
                })
            });
            $(function(){
                $("#menud").click(function(){
                    // $("span#span1").removeClass();
                    $("span#span4").toggleClass('glyphicon glyphicon-triangle-bottom');
                    $("span#span4").toggleClass('glyphicon glyphicon-triangle-right'); 
                })
            });
                $(function(){
                  $("#btnSearch").click(function(){
                    let keyword= $('#txtSearch').val().trim();
                    window.location.href="?c=home&s="+keyword;
                  });
                });
            $(function(){
             $("#txtSearch").keypress(function(event){
             if (event.keyCode ==13 || event.which ==13 ){
                let keyword= $('#txtSearch').val().trim();
                window.location.href="?c=home&s="+keyword;
            }
        });

    });
        </script>
    </head>
    <body>
                                 <!-- Modal -->
                                 <div id="myModal" class="modal fade" role="dialog">
                                  <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content col-md-8 col-md-offset-2">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Đăng Nhập</h4>
                                      </div>
                                      <div class="modal-body">
                                        <form role="form">
                                              <div class="form-group">
                                                <label for="exampleInputEmail1" class="font-weight-bold text-uppercase">Email address</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                              </div>
                                              <div class="form-group">
                                                <label for="exampleInputPassword1" class="font-weight-bold text-uppercase">Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                              </div>
                                              <button type="submit" class="btn btn-info">Đăng nhập</button>
                                              <div class="fb-login-button" data-max-rows="1" data-size="medium" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>
                                            </form>
      
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                      </div>
                                    </div>

                                  </div>
                                </div>
                    <!-- end -->
                    <!--                                                         -->
                    <!-- Modal -->
                                 <div id="myModalx" class="modal fade" role="dialog">
                                  <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Đăng Nhập</h4>
                                      </div>
                                      <div class="modal-body">
                                        <form role="form">
                                            <div class="form-group">
                                            <label for="txtfirstname">First Name</label>
                                            <input type="text" class="form-control" id="txtfirstname" placeholder="Enter name" name="txtfirstname">
                                          </div>
                                            <div class="form-group">
                                            <label for="txtlastname">Last Name</label>
                                            <input type="text" class="form-control" id="txtlastname" placeholder="Enter name" name="txtlastname">
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                          </div>
                                          <div class="form-group">
                                            <label for="avatar">Avatar</label>
                                            <input type="file" id="avatar" name="avatar">
                                            <p class="help-block">Điều khoản sử dụng:</p>
                                          </div>
                                          <div class="checkbox">
                                            <label>
                                              <input type="checkbox">Đồng ý điều khoản
                                            </label>
                                          </div>
                                          <fieldset disabled>
                                          <button type="submit" class="btn btn-info">Đăng ký</button>
                                      </fieldset>
                                        </form>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                      </div>
                                    </div>

                                  </div>
                                </div>
                    <!-- end -->
        <div class="wrapper">
            <header id="main-header">
                <section class="container-fluid container">
                    <section class="row-fluid">
                        <section class="span4">
                            <h1 id="logo"> <a href="?c=home"><img src="publics/user/public/images/logo.png"/></a> </h1>
                        </section>
                        <section class="span8">
                            <ul class="top-nav2">
                                <li><a href="?c=cart">Giỏ hàng <i class="fa fa-shopping-cart" aria-hidden="true"></i><span style="color: red">&nbsp;&nbsp; <?php echo $countCart; ?> </span></a></li>
                                <li><a href="#myModal" data-toggle="modal">Đăng nhập</a></li>

                                <li><a href="#">Hello : Hai !</a></li>

                                <li><a href="#myModalx" data-toggle="modal">Đăng kí</a></li>

                                <li><a href="#">Logout</a></li>
                            </ul>
                            <div class="col-xs-12 ">
                                <input class="col-md-6 col-xs-10" name="" type="text" style="" placeholder="Tìm kiếm" id="txtSearch" />
                                <button id="btnSearch" class="btn btn-info" type="submit" style="height: 35px;"><i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                                <div style="background-color: #CCC;width: 400px; min-height: 100px; overflow-y: auto;display: none;" id="listData">
                                </div>

                                <select class="pull-right" name="slcLanguage" style="width: 100px;">
                                    <option value="vietnamese">Viet Nam</option>
                                    <option value="english">English</option>
                                </select>
                            </div>
                        </section>
                         
                    </section>
                </section>
                <button id="menu1" style="font-size: 23px;background-color: #E5E5E5;height: 40px;line-height: 40px; width: 40px; text-align: center  " class="navbar-toggler pull-xs-right hidden-sm-up collapsed" type="button" data-toggle="collapse" data-target=".menu1" aria-expanded="false">
                    ☰
                </button>
                <nav id="nav">
                    <nav class="navbar menu1">
                        <div class="container-fluid">
                            <ul class="nav navbar-nav">
                                <li class="<?php echo($tabHeader=='home')? 'active' :'' ?>"> <a href="?c=home">Home</a> </li>
                                <li class="<?php echo($tabHeader=='about')? 'active' :'' ?>"> <a href="?c=about">About</a></li>
                                <li class="<?php echo($tabHeader=='discount')? 'active' :'' ?>"><a href="?c=discount">Discount</a></li>
                                <li class="<?php echo($tabHeader=='support')? 'active' :'' ?>"><a href="?c=support">Support</a></li>
                                <li class="<?php echo($tabHeader=='contact')? 'active' :'' ?>"><a href="?c=contact">Contact</a></li>
                            </ul>
                        </div>
                    </nav>
                </nav>
            </header>