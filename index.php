<?php
date_default_timezone_set('Asia/Jakarta');
$time = date('H:i');
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Simsisi Bot</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="css/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/notika-custom-icon.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="css/wave/waves.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Realtime sts area-->
    <div class="realtime-statistic-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <form>
                        <div class="notika-chat-list notika-shadow mg-t-30 tb-res-ds-n dk-res-ds">
                            <div class="realtime-ctn">
                                <div class="realtime-title">
                                    <h2>Chat Box</h2>
                                </div>
                            </div>
                            <div class="card-box">
                                <div class="chat-conversation">
                                    <div class="widgets-chat-scrollbar">
                                        <ul class="conversation-list">
                                            <div class="result"></div>
                                        </ul>
                                    </div>
                                    <div class="chat-widget-input">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-sm-12 col-xs-12 chat-inputbar">
                                                <div class="form-group todo-flex">
                                                    <div class="nk-int-st">
                                                        <input type="text" id="message" class="form-control chat-input" placeholder="Enter your text" autocomplete="off">
                                                    </div>
                                                    <div class="chat-send">
                                                        <button type="submit" id="send-message" class="btn btn-md btn-primary btn-block notika-chat-btn">Send</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Realtime sts area-->
    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/meanmenu/jquery.meanmenu.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.0.js"></script>

    <script>
        $(document).ready(function() {
            $('#send-message').click(function(e) {
                e.preventDefault();
                var message = $('#message').val();
                $.ajax({
                    url: 'bot.php',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        message: encodeURIComponent(message)
                    },
                    beforeSend: function() {
                        $('#message').val('');
                        $('.result').append(`<li class="clearfix odd"><div class="chat-avatar"><img src="http://sigud.sith.itb.ac.id/media/img/boy-2.png" alt="Female"><i><?php echo $time; ?></i></div><div class="conversation-text"><div class="ctext-wrap chat-widgets-cn"><i>Fansa</i><p>` + message + `</p></div></div></li>`);
                    },
                    success: function(data) {
                        $('.result').append(`<li class="clearfix"><div class="chat-avatar"><img src="https://propaganda.mediaeducationlab.com/themes/media_education/avatar/female1-512.png" alt="male"><i>` + data.time + `</i></div><div class="conversation-text"><div class="ctext-wrap"><i>` + data.botName + `</i><p>` + data.response + `</p></div></div></li>`);
                    }
                });
            });
        });
    </script>
</body>

</html>