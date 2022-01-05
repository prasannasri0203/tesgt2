<html>
    <head>
        <title>Zakah</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <meta name="robots" content="noindex,nofollow" />
        <link rel="stylesheet" href="./css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="./css/style.css" type="text/css">
        <link rel="stylesheet" href="./css/responsive.css" type="text/css">
        <link rel="preconnect" href="https://fonts.gstatic.com">

<style>
    .showicon
    {

    }

.double-inp-parent {
    display: flex;
}
.left-inp input {
    /*width: 115px;*/
    width: 90px;
    margin-right: 15px;
}
/*.left-inp select{
    background: url(../images/flag-400.png) #fff;
    background-repeat: no-repeat;
    background-size: 30px;
    background-position: 10px;

}*/
.left-inp input{
    background: url(../images/flag-400.png) #fff;
    background-repeat: no-repeat;
    background-size: 30px;
    background-position: 10px;

}

.right-inp input{
    background: url(../images/download.png) #fff;
    background-repeat: no-repeat;
    background-size: 24px;
    background-position: 10px;
}
.l-txt-bx {
    padding-left: 45px!important;
}
select.l-txt-bx.sel-data {
    padding: 14px 20px;
}

@media only screen and (max-width:991px){
.right-inp {
    width: 100%;
}

.left-inp {
    width: 190px;
    margin-right: 10px;
}
}

.fa-eye>svg:nth-child(2)
{
    display: block !important;
        top: -22px !important;
          
}
.fa-eye>svg:nth-child(1)
{
    display: none !important;
}
</style>
    </head>

    <body>
      <section class="login-sec register_wrap">
         <div class="container">
            <div class="row">
               <div class="col-lg-7 col-md-12 col-xs-12 col-sm-12 login-lft">
                  <img src="./images/login-left.png">
               </div>
               <div class="col-lg-5 col-md-12 col-xs-12 col-sm-12 login-right">
                  <div class="login-wrap reg-wrap">
                  {{--  success   --}}
                     @if(session()->get('success'))
                     <div class="alert alert-success alert-dismissible">
                         <span>{{session()->get('success')}}</span>
                     </div>
                     @endif
                     @if(session()->get('failedMessage'))
                     <div class="alert alert-danger">
                         <span>{{session()->get('failedMessage')}}</span>
                     </div>
                     @endif
                                       {{--  success   --}}
                     <h2 class="login-gd">Registration</h2>
                        <p class="login-sub">Create your Account</p>
                           <form  id="register_form" action="{{ url('/insert') }}" method="post" enctype="multipart/form-data">
                           @csrf
                              <h2 class="label-txt">First Name</h2>
                              <div class="login-bx">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <g clip-path="url(#clip0)">
                                    <path d="M11.829 11.5609C13.4172 11.5609 14.7925 10.9912 15.9162 9.86733C17.0399 8.74362 17.6096 7.36868 17.6096 5.78025C17.6096 4.19237 17.0399 2.81725 15.916 1.69317C14.7921 0.569639 13.417 0 11.829 0C10.2405 0 8.86559 0.569639 7.74188 1.69335C6.61816 2.81707 6.04834 4.19218 6.04834 5.78025C6.04834 7.36868 6.61816 8.7438 7.74206 9.86751C8.86596 10.991 10.2411 11.5609 11.829 11.5609Z" fill="#002859"/>
                                    <path d="M21.9435 18.4548C21.9111 17.9871 21.8455 17.477 21.749 16.9383C21.6516 16.3956 21.5262 15.8825 21.376 15.4136C21.2209 14.9289 21.01 14.4503 20.7493 13.9916C20.4786 13.5155 20.1608 13.101 19.8041 12.7598C19.4311 12.403 18.9744 12.116 18.4463 11.9068C17.9201 11.6986 17.3369 11.5931 16.7131 11.5931C16.4681 11.5931 16.2311 11.6936 15.7736 11.9915C15.492 12.1752 15.1625 12.3876 14.7949 12.6225C14.4805 12.8228 14.0546 13.0105 13.5285 13.1804C13.0153 13.3465 12.4942 13.4307 11.9798 13.4307C11.4655 13.4307 10.9445 13.3465 10.4308 13.1804C9.90524 13.0107 9.47934 12.823 9.16532 12.6227C8.80112 12.39 8.47153 12.1776 8.18571 11.9913C7.72868 11.6934 7.49156 11.5929 7.24656 11.5929C6.62254 11.5929 6.03954 11.6986 5.51347 11.9069C4.98577 12.1159 4.52892 12.4028 4.15557 12.76C3.79907 13.1013 3.48101 13.5157 3.21075 13.9916C2.95019 14.4503 2.73925 14.9287 2.58398 15.4138C2.43402 15.8827 2.30859 16.3956 2.21118 16.9383C2.11468 17.4762 2.04913 17.9866 2.01672 18.4553C1.98486 18.9145 1.96875 19.3912 1.96875 19.8725C1.96875 21.1253 2.367 22.1396 3.15234 22.8875C3.92797 23.6256 4.95427 24.0001 6.20231 24.0001H17.7584C19.0065 24.0001 20.0324 23.6258 20.8082 22.8875C21.5937 22.1401 21.992 21.1257 21.992 19.8724C21.9918 19.3888 21.9755 18.9118 21.9435 18.4548Z" fill="#002859"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0">
                                    <rect width="23.9999" height="24" fill="white"/>
                                    </clipPath>
                                    </defs>
                                    </svg>
                                <input type="text" class="l-txt-bx" name ="first" value="{{ old('first') }}" placeholder="|Enter First Name">
                                {{-- alert message  --}}
                                @error('first')
                                <div class="alert alert-danger error-msg">{{ $message }}</div>
                                @enderror
                               {{-- alert message  --}}
                            </div>
                            <h2 class="label-txt">Last Name</h2>
                            <div class="login-bx">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <g clip-path="url(#clip0)">
                                    <path d="M11.829 11.5609C13.4172 11.5609 14.7925 10.9912 15.9162 9.86733C17.0399 8.74362 17.6096 7.36868 17.6096 5.78025C17.6096 4.19237 17.0399 2.81725 15.916 1.69317C14.7921 0.569639 13.417 0 11.829 0C10.2405 0 8.86559 0.569639 7.74188 1.69335C6.61816 2.81707 6.04834 4.19218 6.04834 5.78025C6.04834 7.36868 6.61816 8.7438 7.74206 9.86751C8.86596 10.991 10.2411 11.5609 11.829 11.5609Z" fill="#002859"/>
                                    <path d="M21.9435 18.4548C21.9111 17.9871 21.8455 17.477 21.749 16.9383C21.6516 16.3956 21.5262 15.8825 21.376 15.4136C21.2209 14.9289 21.01 14.4503 20.7493 13.9916C20.4786 13.5155 20.1608 13.101 19.8041 12.7598C19.4311 12.403 18.9744 12.116 18.4463 11.9068C17.9201 11.6986 17.3369 11.5931 16.7131 11.5931C16.4681 11.5931 16.2311 11.6936 15.7736 11.9915C15.492 12.1752 15.1625 12.3876 14.7949 12.6225C14.4805 12.8228 14.0546 13.0105 13.5285 13.1804C13.0153 13.3465 12.4942 13.4307 11.9798 13.4307C11.4655 13.4307 10.9445 13.3465 10.4308 13.1804C9.90524 13.0107 9.47934 12.823 9.16532 12.6227C8.80112 12.39 8.47153 12.1776 8.18571 11.9913C7.72868 11.6934 7.49156 11.5929 7.24656 11.5929C6.62254 11.5929 6.03954 11.6986 5.51347 11.9069C4.98577 12.1159 4.52892 12.4028 4.15557 12.76C3.79907 13.1013 3.48101 13.5157 3.21075 13.9916C2.95019 14.4503 2.73925 14.9287 2.58398 15.4138C2.43402 15.8827 2.30859 16.3956 2.21118 16.9383C2.11468 17.4762 2.04913 17.9866 2.01672 18.4553C1.98486 18.9145 1.96875 19.3912 1.96875 19.8725C1.96875 21.1253 2.367 22.1396 3.15234 22.8875C3.92797 23.6256 4.95427 24.0001 6.20231 24.0001H17.7584C19.0065 24.0001 20.0324 23.6258 20.8082 22.8875C21.5937 22.1401 21.992 21.1257 21.992 19.8724C21.9918 19.3888 21.9755 18.9118 21.9435 18.4548Z" fill="#002859"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0">
                                    <rect width="23.9999" height="24" fill="white"/>
                                    </clipPath>
                                    </defs>
                                    </svg>
                                 <input type="text" class="l-txt-bx" name="last" value="{{ old('last') }}"  placeholder="|Enter Last Name">
                                 @error('last')
                                 <div class="alert alert-danger error-msg">{{ $message }}</div>
                                @enderror
                            </div>
                            <h2 class="label-txt">Email</h2>
                            <div class="login-bx">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M22.5 3.75H1.5C0.672 3.75 0 4.422 0 5.25V6.1035L12 11.1855L24 6.102V5.25C24 4.422 23.328 3.75 22.5 3.75Z" fill="#002859"/>
                                 <path d="M12.2925 12.69C12.1995 12.7305 12.099 12.75 12 12.75C11.901 12.75 11.8005 12.7305 11.7075 12.69L0 7.7325V18.75C0 19.578 0.672 20.25 1.5 20.25H22.5C23.328 20.25 24 19.578 24 18.75V7.7325L12.2925 12.69Z" fill="#002859"/>
                                </svg>
                                <input type="text" class="l-txt-bx" name="email" value="{{ old('email') }}" placeholder="|Enter Email" >

                                @error('email')
                                <div class="alert alert-danger error-msg">{{ $message }}</div>
                               @enderror
                               @if(session()->get('failed_email'))
                               <div class="alert alert-danger error-msg">
                                   <span>{{session()->get('failed_email')}}</span>
                               </div>
                               @endif
                            </div>
                            
                            <h2 class="label-txt">Mobile Number</h2>
                            <div class="login-bx">
                               <div class="double-inp-parent">
                                <div class="left-inp">
                                <!-- <select class="l-txt-bx sel-data" name="country_code">
                                    <option value="+91" value="{{ old('country_code') }}"> +91 </option>
                                    <option value="+1" value="{{ old('country_code') }}"> +1 </option>
                                </select> -->
                                <input type="text" class="l-txt-bx" id="country_code" name="country_code" value="+1">
                            </div>
                             <div class="right-inp">
                                <input type="text" class="l-txt-bx" id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}" placeholder="(___) ___-____" >
                            </div>
                        </div>
                        @error('country_code')
                             <div class="alert alert-danger error-msg">{{ $message }}</div>
                        @enderror
                         @error('mobile_number')
                             <div class="alert alert-danger error-msg">{{ $message }}</div>
                        @enderror
                        @if(session()->get('failed_mobile_number'))
                               <div class="alert alert-danger error-msg">
                                   <span>{{session()->get('failed_mobile_number')}}</span>
                               </div>
                               @endif

                             </div>

                            <!--  <h2 class="label-txt">Supporting Document</h2>
                            <div class="login-bx">
                                 <input id="field_305_files" name="field_305_files" value="" type="hidden">
                                 <input type="file" class="l-txt-bx" id ="supporting_document" name="supporting_document" accept="image/*" 
                                 onchange="imageUpload()">
                                 @error('supporting_document')
                                 <div class="alert alert-danger error-msg">{{ $message }}</div>
                                @enderror
                            </div> -->

                            <h2 class="label-txt">Create Password</h2>
                            <div class="login-bx">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="24" viewBox="0 0 18 24" fill="none">
                                    <path d="M15.75 9H15V6C15 2.69099 12.309 -5.72205e-06 9 -5.72205e-06C5.691 -5.72205e-06 3 2.69099 3 6V9H2.25C1.01 9 0 10.009 0 11.25V21.75C0 22.991 1.01 24 2.25 24H15.75C16.99 24 18 22.991 18 21.75V11.25C18 10.009 16.99 9 15.75 9ZM5 6C5 3.79399 6.794 1.99999 9 1.99999C11.206 1.99999 13 3.79399 13 6V9H5V6ZM10 16.722V19C10 19.552 9.553 20 9 20C8.447 20 8 19.552 8 19V16.722C7.405 16.375 7 15.737 7 15C7 13.897 7.897 13 9 13C10.103 13 11 13.897 11 15C11 15.737 10.595 16.375 10 16.722Z" fill="#002859"/>
                                    </svg>
                                <input type="password" class="psw-bx l-txt-bx" name="password" value="" placeholder="|Enter Password" id="psw-bx" autocomplete="nope">
                                @error('password')
                                <div class="alert alert-danger error-msg">{{ $message }}</div>
                               @enderror
                                <button toggle="#psw-bx" class="toggle-password eye-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" id="pw-close">
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

                            <h2 class="label-txt">Confirm Password</h2>
                            <div class="login-bx">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="24" viewBox="0 0 18 24" fill="none">
                                    <path d="M15.75 9H15V6C15 2.69099 12.309 -5.72205e-06 9 -5.72205e-06C5.691 -5.72205e-06 3 2.69099 3 6V9H2.25C1.01 9 0 10.009 0 11.25V21.75C0 22.991 1.01 24 2.25 24H15.75C16.99 24 18 22.991 18 21.75V11.25C18 10.009 16.99 9 15.75 9ZM5 6C5 3.79399 6.794 1.99999 9 1.99999C11.206 1.99999 13 3.79399 13 6V9H5V6ZM10 16.722V19C10 19.552 9.553 20 9 20C8.447 20 8 19.552 8 19V16.722C7.405 16.375 7 15.737 7 15C7 13.897 7.897 13 9 13C10.103 13 11 13.897 11 15C11 15.737 10.595 16.375 10 16.722Z" fill="#002859"/>
                                    </svg>
                                <input type="password" class="l-txt-bx" name="password_confirmation" autocomplete="nope" value="" placeholder="|Enter Confirm Password" id="psw-bx1">
                                @error('password_confirmation')
                                <div class="alert alert-danger error-msg">{{ $message }}</div>
                               @enderror
                                <button toggle="#psw-bx1" class="toggle-password eye-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" id="pw-close">
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
                            <input type = "hidden" value="pending approval" name ="field_293" /> 
                            <input type = "hidden" value="false" name = "send_email_intro" /> 
                            <input type = "hidden" value="profile_30" name = "field_294" /> 

                            <p>I am at least 18 years old,I agree to the collection, processing or storage of my personal information, including biometric data, by Zakah Network for the purpose(s) of identity verification; that the information I provide is true and accurate to the best of my knowledge; and I shall be fully responsible in case I provide wrong information or any of the documents I use are fake, forged, counterfeit etc.</p>
                            <p><input type="checkbox" id="checkbox1" name="checkbox1" value="1">  I agree with the above statement and have read the Zakah Network privacy policy.</p>
                            <p><input type="checkbox" id="checkbox2" name="checkbox2" value="2">  I have read and agree to the Zakah Network Privacy Notice</p>
                            <p><input type="checkbox" id="checkbox3" name="checkbox3" value="3">  I have viewed the YouTube instructional video</p>
                            <!-- <p><a href="{{url('privacyPolicy')}}">Privacy and Policy</p> -->

                            <button class="login-btn-g register" >Register Now</button>
                           </form>
                            <h2 class="hav-txt-g">Already have a account?<a href="{{url('/login')}}" class="l-txt" >Login</a></h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script type="text/javascript">app_id="59c99d5c6b83d222c7507c61";distribution_key="dist_2";</script><script type="text/javascript" src="https://loader.knack.com/59c99d5c6b83d222c7507c61/dist_2/knack.js"></script>
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/custom.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
        
        <script>

            $(".register").click(function(e) {

                e.preventDefault()
                if($("#checkbox1").prop("checked") == true || $("#checkbox2").prop("checked") == true || $("#checkbox3").prop("checked") == true){
                     $("#register_form").submit();
                }else{
                    alert("Please tick the checkbox...");
                }
            });

            $(".toggle-password").click(function(e) {
            e.preventDefault()
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.prop("type", "text");
            } else {
            input.prop("type", "password");
            }
            });
            
            $(".register").click(function(e) {
                e.preventDefault();
                $(this).css({'background-color':'red','cursor':'not-allowed'});
                $(this).attr("disabled", true);
                $(this).text("Processing..."); 
                $("#register_form").submit();
            });

            $(window).load(function()
            {
                var phones = [{ "mask": "(###) ###-####"}, { "mask": "(###) ###-####"}];
                $('#mobile_number').inputmask({ 
                    mask: phones, 
                    greedy: false, 
                    definitions: { '#': { validator: "[0-9]", cardinality: 1}} });
            });
   
            $(document).ready(function(){  
                $('.eye-icon').click(function(){
                        if($(this).prev().attr('type')== 'password'){
                            $(this).prev().attr('type','text');
                            $(this).find('#pw-close').hide();
                            $(this).find('#pw-open').show();
                        }
                        else{
                            $(this).prev().attr('type','password');
                            $(this).find('#pw-close').show();
                            $(this).find('#pw-open').hide();
                        }        
                });

            });


            // function imageUpload(){

            //   var form = new FormData();
            //   // change #myfileinput to select your <input type="file" /> element
            //   var file = $(`#supporting_document`)[0].files[0];
              
            //   form.append(`files`, file);
                      
            //   var url = `https://api.knack.com/v1/applications/59c99d5c6b83d222c7507c61/assets/image/upload`;

            //   var headers = {
            //     'X-Knack-Application-ID': `59c99d5c6b83d222c7507c61`,
            //     'X-Knack-REST-API-Key': `5f8cb74d-0cd6-474e-9c5e-1cc60848ef6e`,
            //   };

            //   Knack.showSpinner();

            //   // Make the AJAX call
            //   $.ajax({
            //     url: url,
            //     type: `POST`,
            //     headers: headers,
            //     processData: false,
            //     contentType: false,
            //     mimeType: `multipart/form-data`,
            //     data: form,
            //   }).done(function(responseData) {
            //       Knack.hideSpinner();
            //       console.log(responseData);
            //       response = JSON.parse(responseData);
            //       document.getElementById("field_305_files").value  = response.id;
            //   });
            // }

        </script>
    </body>
</html>