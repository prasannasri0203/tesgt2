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
                <div class="header-sec">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 header-lft">
                                <div class="head-inner">
                                    <img src="../images/z-LOGO.png" class="z-logo"/>
                                    <h2 class="logo-txt-g">Zakah Registration Status</h2>
                                    
                                     <div class="profi-p content-button">
                                       <div><a href="{{url('/login')}}"><button type="button" class="btn btn-info">Login</button></a></div>
                                       <div class="reg-btn"><a href="{{url('/registration')}}"><button type="button" class="btn btn-info">Registration</button></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="reqfor-inner">
                      <div class="container">
                          <h2 class="reqfor-hd"></h2>
                         <h5> Hi {{ucfirst(session()->get('name'))}},</h5>
                          <p>Your verification attempt has failed. Please contact your Masjid directly to fill out a paper Zakah application and provide the necessary ID. Please note that your application processing times will be longer. For technical support questions only, please email support@zakah-network.com..</p>

                            <br>
                            <br>
                          <div class="reg-btn" align="center"><a href="{{url('registration')}}"><button type="button" class="btn btn-info">Zakah Applicant</button></a></div>


                      </div>
                    </div>
            </section>
        </body>
    </html>