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
                         <h5>Congratulations! You have successfully verified your identity. Please save the following instructions.</h5>
                        <ul>
                          <li>Save your username and password that you have created.</li>
                          <li>Use your Masjid's Zakah link for future Zakah applications. Please note that Masjids must complete annual information assurance training in order to use the Zakah Network online application system.</li>
                          <li>Your account access is good for 12 months. After 12 months, your account access will be deleted and you must apply under "New Zakah Application" and re-verify your identity.
                          Your photo ID and photo are NOT saved and are not shared with any Masjid. It is not retained for longer than 24 hours. Please note that the Zakah Network complies with all lawful requests for information from local, state, and federal authorities.</li>
                        </ul>  
                      </div>
                    </div>
            </section>
        </body>
    </html>