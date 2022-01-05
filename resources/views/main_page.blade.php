<style>
    .display-button
    {
        display:none;
    }
    
    .mar-align{
        margin: -30px 62px;
    }

    .hav-txt a {
     font-weight: 700 !important;
     font-size: 15px !important;
     line-height: 19px !important;
     color: #002859 !important;
     margin-left: 10px !important;
    }

    .content-button{
        position: absolute !important;
        margin: 859px !important;
    }
    .reg-btn{
       margin: 10px;
    }
    .header-sec.logout-successmsg .profi-p h2.hav-txt-g a {
            padding: 0px 20px;
            font-size: 21px;
            height: 50px;
            line-height: 45px;
            width: 108px;
    }
    .header-sec.logout-successmsg .hav-txt-g{
      margin-bottom: 0px;
    }
    .cont-inner {
    width: 100%;
    float: left;
    height: 100%;
}
    </style>
    
    <html>
        <head>
            <title>Zakah</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
            <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
            <link rel="stylesheet" href="../css/style.css" type="text/css">
            <link rel="stylesheet" href="../css/responsive.css" type="text/css">
            <link rel="preconnect" href="https://fonts.gstatic.com">
    
        </head>
        <body>
    
             <section class="login-sec req-form d-block pr-ste">
            <div class="header-sec">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 header-lft">
                            <div class="head-inner">
                                <img src="./images/z-LOGO.png" class="z-logo"/>
                                <h2 class="logo-txt-g">Zakah Applicant</h2>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>

            <div class="cont-inner">
                <div class="container media">

                    <div class="main mt-5">

                        <div class="heading text-center">
                            <h4 class="text-uppercase bold txt">Welcome to the common Zakah Application system for the</h4>
                            <h4 class="dc-blue text-uppercase bold txt">DC, Marryland, and Northern Virginia Area</h4>

                        </div>

                        <div class="content d-flex justify-content-around align-items-start">
                            <div class="cont-l rounded p-3 mt-5">
                                <img class="user-img" src="./images/user-plus.png" alt="">
                                <h6 class="text-uppercase mt-2 bold left-card">First time users or 12+ months since last Zakah Application</h6>
                                <a href="{{url('/registration')}}"><button class="click red">Click here <img src="./images/right-arrow.png" alt=""></button></a>
                            </div>
                            <div class="video text-center"><img src="./images/video.png" alt=""></div>
                            <div class="cont-r rounded p-3 mt-5">
                                <img class="user-img" src="./images/user-c.png" alt="">
                                <h6 class="text-uppercase mt-2 bold left-card">Existing Users</h6>
                                <a href="{{url('/login')}}"><button class="click green">Click here <img src="./images/right-arrow.png" alt=""></button></a>

                            </div>

                        </div>

                        <div class="footer text-center">
                            <h5 class="text-uppercase bold txt">Please review our <span class="privacy bold"><a href="{{route('privacyPolicy')}}">Privacy Notice</a></span> </h5>
                            <h5 class="text-uppercase bold txt">and the youtube video before starting a Zakah Application </h5>

                        </div>




                    </div>
                 

                </div>
            </div>

        </section>







        <script src="js/jquery.js" type="text/javascript"></script>        
        <script src="js/custom.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        </body>
    </html>
   