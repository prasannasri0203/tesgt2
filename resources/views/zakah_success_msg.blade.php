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
    .header-sec.logout-successmsg .hav-txt-g{margin-bottom: 0px;}
    
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
    
            <section class="login-sec req-form d-block">
              <div class="header-sec logout-successmsg">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 header-lft">
                            <div class="head-inner">
                                <img src="./images/z-LOGO.png" class="z-logo"/>
                                <h2 class="logo-txt-g">Zakah Applicant Status</h2>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 header-rgt">
                            <div class="hear-rt-inner">
                                <div class="profi-p">
                                        <h2 class="hav-txt-g"><a href="#" onClick="logout()" >Logout</a></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 
            <div class="reqfor-inner">
              <div class="container">
                  <h2 class="reqfor-hd"></h2>
                 <h5> Hi {{ucfirst($fullName)}},</h5>
                  <p>Your Zakah application was submitted successfully. You will be contacted by your local Masjid within 5 business days. Please contact <b>{{$email}}</b> if you have not been contacted after 5 business days...</p>
              </div>
            </div>
            </section>
        </body>
    </html>
    <script type="text/javascript">
        function logout(){

               if(confirm("Are you sure you want to logout")){

                   window.location.href = "{{URL::to('logout')}}";
               }
            }
    </script>