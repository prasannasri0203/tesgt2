<html>
    <head>
        <title>Zakah</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <meta name="robots" content="noindex,nofollow" />
        <link rel="stylesheet" href="./css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="./css/style.css" type="text/css">
        <link rel="stylesheet" href="./css/responsive.css" type="text/css">
        <style>
.hav-txt-g {
    margin-bottom: 15px;
    float: left;
    margin-top: 8px;
}

.btn-btn {
    width: 50% !important;
    float: right;
    height: 41px;
    clear: right;
    margin: -33px 0px;
background: #2985ba !important;
}
.login-right b {
    text-align: left;
    width: 100%;
    display: block;
    margin-bottom: 8px;
}
.div-note {
    float: left;
    width: 100%;
}
.div-note p {
    text-align: justify;
}
.login-right {
    top: 0px;
}
@media only screen and (max-width:767px){
.login-right {
    top: 0;
}
.div-note p {
    padding-bottom: 15px;
    margin-bottom: 0;
}
.login-sec {
     height: auto !important;
}
}
.col-lg-5.col-md-12.col-xs-12.col-sm-12.login-right.login-top {
    max-height: 580px;
    overflow-y: auto;
}

</style>
    </head>
    <body>

        <section class="login-sec">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-xs-12 col-sm-12 login-lft">
                        <img src="./images/login-left.png">
                    </div>
                   
                    <div class="col-lg-5 col-md-12 col-xs-12 col-sm-12 login-right login-top">
                        <div class="login-wrap">
                            <h2 class="login-gd">Forgot your Password?</h2>
                            <p class="login-sub">Enter your email address below and we will send you a link to reset your password.</p>
                           
                            @if(session()->get('success'))
                            <div class="alert alert-success alert-success fade show" role="alert">
                                <span>{{session()->get('success')}}</span>
                                {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                            </div>
                            @endif
                            @if(session()->get('message'))
                            <div class="alert alert-danger alert-danger fade show" role="alert">
                                <span>{{session()->get('message')}}</span>
                                {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                            </div>
                            @endif
                            <form id="doLogin" action="{{ url('/changePassword') }}" method="POST" >
                            @csrf
                            <h2 class="label-txt">Email Address</h2>
                            <div class="login-bx">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M22.5 3.75H1.5C0.672 3.75 0 4.422 0 5.25V6.1035L12 11.1855L24 6.102V5.25C24 4.422 23.328 3.75 22.5 3.75Z" fill="#002859"/>
                                <path d="M12.2925 12.69C12.1995 12.7305 12.099 12.75 12 12.75C11.901 12.75 11.8005 12.7305 11.7075 12.69L0 7.7325V18.75C0 19.578 0.672 20.25 1.5 20.25H22.5C23.328 20.25 24 19.578 24 18.75V7.7325L12.2925 12.69Z" fill="#002859"/>
                                </svg>
                                <input type="text" class="l-txt-bx" name="email" value="{{ old('email') }}" placeholder="|Enter Email">
                                @error('email')
                                <div class="alert alert-danger error-msg">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="login-bx">
                                <button class="eye-icon toggle-password">
                                    <g clip-path="url(#clip0)">
                                    <path d="M21.3373 2.65994C20.9945 2.31221 20.4362 2.31711 20.0884 2.65994L16.9539 5.79442C13.0701 4.03128 8.92675 4.46227 4.97437 7.04331C2.0309 8.96318 0.243272 11.3777 0.169807 11.4806C-0.0652784 11.8038 -0.0554832 12.2446 0.194295 12.558C1.86928 14.615 3.62263 16.2166 5.41516 17.3332L2.6578 20.0906C2.31496 20.4334 2.31496 20.9917 2.6578 21.3395C2.82921 21.5109 3.0545 21.599 3.2798 21.599C3.50509 21.599 3.73038 21.5109 3.90179 21.3395L21.3373 3.90884C21.6802 3.566 21.6802 3.00768 21.3373 2.65994ZM9.81812 12.9303C9.69078 12.6413 9.62711 12.3278 9.62711 11.9997C9.62711 11.3679 9.87199 10.7704 10.3226 10.3198C11.0278 9.61456 12.071 9.44804 12.933 9.81537L9.81812 12.9303ZM14.2358 8.5175C12.6342 7.489 10.4744 7.67511 9.07858 9.07093C8.29496 9.85455 7.86886 10.8928 7.86886 11.9948C7.86886 12.798 8.09905 13.5669 8.52515 14.2281L6.70813 16.0451C5.1164 15.1244 3.54916 13.7628 2.02601 11.985C2.67739 11.221 4.05362 9.7468 5.9392 8.5175C9.20102 6.39193 12.4481 5.93155 15.612 7.14127L14.2358 8.5175Z" fill="#B0B1A9"/>
                                    <path d="M23.8057 11.4414C22.596 9.9525 21.3422 8.69871 20.0689 7.70449C19.6819 7.40574 19.1285 7.4743 18.8249 7.85632C18.5261 8.23833 18.5947 8.79176 18.9767 9.09542C19.9856 9.88393 20.9945 10.8635 21.974 12.0095C21.3961 12.6854 20.2697 13.9 18.7416 15.0117C15.7981 17.152 12.8253 17.9258 9.91119 17.3087C9.43612 17.2059 8.96595 17.5144 8.868 17.9895C8.76515 18.4646 9.0737 18.9347 9.54877 19.0327C10.3079 19.1943 11.0719 19.2727 11.8409 19.2727C12.9967 19.2727 14.1623 19.0915 15.3231 18.729C16.8462 18.254 18.3596 17.4703 19.824 16.4027C22.2924 14.5954 23.7666 12.6021 23.8302 12.5189C24.0653 12.1956 24.0555 11.7548 23.8057 11.4414Z" fill="#B0B1A9"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0">
                                    <rect width="24" height="24" fill="white"/>
                                    </clipPath>
                                    </defs>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" id="pw-open">
                                        <path d="M23.8475 11.5332C23.6331 11.2399 18.5245 4.35165 11.9999 4.35165C5.47529 4.35165 0.366469 11.2399 0.152297 11.5329C-0.0507657 11.8112 -0.0507657 12.1886 0.152297 12.4668C0.366469 12.7601 5.47529 19.6484 11.9999 19.6484C18.5245 19.6484 23.6331 12.7601 23.8475 12.467C24.0508 12.1888 24.0508 11.8112 23.8475 11.5332ZM11.9999 18.066C7.19383 18.066 3.03127 13.4941 1.79907 11.9995C3.02968 10.5035 7.18351 5.93406 11.9999 5.93406C16.8057 5.93406 20.968 10.5051 22.2007 12.0005C20.9701 13.4964 16.8163 18.066 11.9999 18.066Z" fill="#002859"/>
                                        <path d="M11.9999 7.25275C9.3823 7.25275 7.25262 9.38243 7.25262 12C7.25262 14.6176 9.3823 16.7473 11.9999 16.7473C14.6175 16.7473 16.7472 14.6176 16.7472 12C16.7472 9.38243 14.6175 7.25275 11.9999 7.25275ZM11.9999 15.1648C10.2547 15.1648 8.83508 13.7451 8.83508 12C8.83508 10.2549 10.2548 8.83521 11.9999 8.83521C13.745 8.83521 15.1647 10.2549 15.1647 12C15.1647 13.7451 13.745 15.1648 11.9999 15.1648Z" fill="#002859"/>
                                        </svg>
                                </button>
                            </div>
                            <button class="login-btn-g login" type="submit">Enter</button>
                           </form>
                        </div>
                        <p><a href="{{url('/registration')}}" class="">Back to Zakah User Registration</a></p>
                    </div>
                </div>
            </div>
        </section>

        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/custom.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script>
            $(".toggle-password").click(function(e) {
                e.preventDefault()
            });

            $(".login").click(function(e) {
                e.preventDefault();
                $(this).css({'background-color':'red','cursor':'not-allowed'});
                $(this).attr("disabled", true);
                $(this).text("Processing...");
                $("#doLogin").submit();
                
            });
            $(".register").click(function(e) {
                e.preventDefault();
                $(".register").css('background-color','red !important');
                window.location.href='/registration';
            });
        </script>
    </body>
</html>