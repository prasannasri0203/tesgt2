
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 <title></title>
 <style type="text/css">
*{margin:0; padding:0;}
*[class]{margin:0 auto;}
#email a:link,a:active,a:visited {font-family:Roboto Regular; text-decoration: underline; color: #009366;}
  body{-webkit-text-size-adjust:none; 
  
  
  }
 .ReadMsgBody{width:100%;}
 .ExternalClass{width:100%;}
  @font-face {
 font-family: 'Roboto Regular';
 src: url('font/roboto-regular-webfont.ttf') format('truetype')
 url('font/roboto-regular-webfont.woff') format('woff') 
 url('font/roboto-regular-webfont.woff2') format('woff2');
 font-weight: normal;
 font-style: normal;
}

 @media only screen and (max-width: 580px) {
	 	*[class].mobile{ width:100% !important;}
		*[class].h15{height:15px !important;}
	 
 }
  </style>
</head>
<body>

<table style="padding-left:20px;padding-right:20px;" width="600" border="0" cellspacing="0" cellpadding="0" align="center" class="mobile">
  <tr>
    <td valign="top">
	<table width="600" border="0" cellspacing="0" cellpadding="0" class="mobile">
  <tr>
    <td valign="top">
<table width="60" border="0" cellspacing="0" cellpadding="0" class="mobile" style="font-family:Arial; font-size:16px; color:#838383;">
    <tr>
        <td  width="100%" valign="top" style="padding:10px 0px;"><img src="z-LOGO.png" style="max-width: 70px;"/> 
        <span style="font-weight: 700;font-size: 20px;line-height: 38px;text-transform: uppercase;color: #002859;margin-bottom: 0;margin-left: 30px;vertical-align: top;margin-top: 20px;display: inline-block;">Zakah Application 
        </span></td>
        <td style="text-align: right;font-weight: 700;font-size: 20px;color: #002859;">Date:{{ date('m/d/Y') }}</td>
    </tr>
   <tr>
    <td colspan="2" valign="top" style="padding-top:5px;width:100%;">
		<span style="font-size: 14px;line-height:16px;color:#262624;margin-bottom:5px;display:block;">Applicant Details</span>
	</td>
  </tr>
    <tr>
        <td valign="top" width="250" style="padding-top:5px;padding-bottom: 2px;padding-right: 10px;">
            <span style="border-bottom: 1px solid; display: block;" >
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">@if($data['first'] != '')  {{ucfirst($data['first'])}} @else -  @endif</span>
            </span>
            <span style="display: block;">
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">First Name</span>
            </span>
        </td>
        <td valign="top" width="250" style="padding-top:5px;padding-bottom: 2px;padding-right: 10px;">

            <span style="border-bottom: 1px solid; display: block;" >
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;"> @if($data['last'] != '')  {{ucfirst($data['last'])}} @else -  @endif</span>
            </span>

            <span style="display: block;">
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">Last Name</span>
            </span>
        </td>
    </tr>  
    <tr>
         <td valign="top" width="250" style="padding-top:5px;padding-bottom: 2px;padding-right: 10px;">
            <span style="border-bottom: 1px solid; display: block;" >
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;"> @if($data['majidFields'] != '' )  {{$data['majidFields']}} @else -  @endif</span>
            </span>
            <span style="display: block;">
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">Lead/Sponsoring Masjid</span>
            </span>
        </td>
        <td valign="top" width="250" style="padding-top:5px;padding-bottom: 2px;padding-right: 10px;">
            <span style="border-bottom: 1px solid; display: block;" >
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;"> @if($data['street'] != '')  {{$data['street']}} @else -  @endif</span>
            </span>
            <span style="display: block;">
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">Street Address</span>
            </span>
        </td>
    </tr>
    <tr>
        <td valign="top" width="250" style="padding-top:5px;padding-bottom: 2px;padding-right: 10px;">
            <span style="border-bottom: 1px solid; display: block;" >
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">@if($data['city'] != '')  {{$data['city']}} @else -  @endif</span>
            </span>
            <span style="display: block;">
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">City</span>
            </span>
        </td>
        <td valign="top" width="250" style="padding-top:5px;padding-bottom: 2px;padding-right: 10px;">

            <span style="border-bottom: 1px solid; display: block;" >
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">@if($data['state'] != '')  {{$data['state']}} @else -  @endif</span>
            </span>
            <span style="display: block;">
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">State</span>
            </span>
        </td>
    </tr>

    <tr>
        <td valign="top" width="250" style="padding-top:5px;padding-bottom: 2px;padding-right: 10px;">

            <span style="border-bottom: 1px solid; display: block;" >
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;"> @if($data['zip'] != '')  {{$data['zip']}} @else -  @endif</span>
            </span>

            <span style="display: block;">
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">Zipcode</span>
            </span>
        </td>
    </tr>

    <tr>
		<td colspan="2" valign="top" style="padding-top:5px;width:100%;">
			<span style="font-size: 14px;line-height:15px;color:#262624;margin-bottom:5px;display:block;">Contact Details</span>
		</td>
	</tr>

    <tr>
        <td valign="top" width="250" style="padding-top:5px;padding-bottom: 2px;padding-right: 10px;">

            <span style="border-bottom: 1px solid; display: block;" >
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;"> @if($data['email'] != '')  {{$data['email']}} @else -  @endif</span>
            </span>

            <span style="display: block;">
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">Applicant Email</span>
        
            </span>
        </td>
        <td valign="top" width="250" style="padding-top:5px;padding-bottom: 2px;padding-right: 10px;">

            <span style="border-bottom: 1px solid; display: block;" >
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;"> @if($data['field_11'] != '')  {{$data['field_11']}} @else -  @endif</span>
            </span>

            <span style="display: block;">
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">Applicant's Phone Number</span>
            </span>
        </td>
    </tr>
    <tr>
        <td valign="bottom" width="250" style="padding-top:5px;padding-bottom: 2px;padding-right: 10px;">
            <span style="border-bottom: 1px solid; display: block;" >
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;"> @if($data['field_106'] != '')  {{$data['field_106']}} @else -  @endif</span>
            </span>

            <span style="display: block;">
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">Primary Reason for Zakah</span>
            </span>
        </td>
        <td valign="bottom" width="250" style="padding-top:5px;padding-bottom: 2px;padding-right: 10px;text-overflow: ellipsis;work-break:break-all;">

            <span style="border-bottom: 1px solid; display: block;text-overflow: ellipsis;work-break:break-all;">
                <span style="display:block;text-align:left;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;width:100%;min-width:100px; text-overflow: ellipsis;">   @if($data['field_108'] != '')  {{$data['field_108']}} @else -  @endif</span>
            </span>

            <span style="display: block;">
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">Notes</span>
            </span>
        </td>
    </tr>  
      <tr>
		<td colspan="2" valign="top" style="padding-top:5px;width:100%;">
			<span style="font-size: 14px;line-height:15px;color:#262624;margin-bottom:5px;display:block;">Other Details</span>
		</td>
	</tr>
    <tr>
        <td valign="top" width="250" style="padding-top:5px;padding-bottom: 2px;padding-right: 10px;">

            <span style="border-bottom: 1px solid; display: block;" >
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">@if($data['field_112'] != '')  {{$data['field_112']}} @else -  @endif</span>
            </span>

            <span style="display: block;">
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">Zakah Category</span>
            </span>
        </td>
        <td valign="top" width="250" style="padding-top:5px;padding-bottom: 2px;padding-right: 10px;">

            <span style="border-bottom: 1px solid; display: block;" >
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">@if($data['field_112'] != '')  {{$data['field_112']}} @else -  @endif</span>
            </span>

            <span style="display: block;">
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">Zakah Category</span>
        
            </span>
        </td>
    </tr>
    <tr>
        <td valign="top" width="250" style="padding-top:5px;padding-bottom: 2px;padding-right: 10px;">

            <span style="border-bottom: 1px solid; display: block;" >
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;"> @if($data['field_114'] != '')  {{$data['field_114']}} @else -  @endif</span>
            </span>

            <span style="display: block;">
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">Applicant Talents/Skills</span>
        
            </span>
        </td>
        <td valign="top" width="250" style="padding-top:5px;padding-bottom: 2px;padding-right: 10px;">

            <span style="border-bottom: 1px solid; display: block;" >
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;"> @if($data['field_216'] != '')  {{$data['field_216']}} @else -  @endif</span>
            </span>

            <span style="display: block;">
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">Ethnic Background</span>
        
            </span>
        </td>
    </tr>

    <tr>
        <td valign="top" width="250" style="padding-top:5px;padding-bottom: 2px;padding-right: 10px;">

            <span style="border-bottom: 1px solid; display: block;" >
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">  @if($data['field_217'] != '')  {{$data['field_217']}} @else -  @endif</span>
            </span>

            <span style="display: block;">
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">
					Residency</span>
        
            </span>
        </td>
        <td valign="top" width="250" style="padding-top:5px;padding-bottom: 2px;padding-right: 10px;">

            <span style="border-bottom: 1px solid; display: block;" >
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">@if($data['field_218'] != '')  {{$data['field_218']}} @else -  @endif</span>
            </span>
            <span style="display: block;">
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">Income Range</span>
            </span>
        </td>
    </tr>

    <tr>
        <td valign="top" width="250" style="padding-top:5px;padding-bottom: 2px;padding-right: 10px;">
            <span style="border-bottom: 1px solid; display: block;" >
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">@if($data['field_221'] != '')  {{$data['field_221']}} @else -  @endif</span>
            </span>
            <span style="display: block;">
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">
                    Zakat-ul-Fitr Applicant</span>
            </span>
        </td>
        <td valign="top" width="250" style="padding-top:5px;padding-bottom: 2px;padding-right: 10px;">

            <span style="border-bottom: 1px solid; display: block;" >
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">@if($data['field_245'] != '')  {{$data['field_245']}} @else -  @endif</span>
            </span>
            <span style="display: none;">
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">
                    Application Status</span>
        
            </span>
        </td>
    </tr>
    <tr>
        <td valign="top" width="250" style="padding-top:5px;padding-bottom: 2px;padding-right: 10px;">

            <span style="border-bottom: 1px solid; display: block;" >
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">@if($data['field_246'] != '')  {{$data['field_246']}} @else -  @endif</span>
            </span>
            <span style="display: block;">
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">
                    Marital Status</span>
            </span>
        </td>
    </tr>
      <tr>
		<td colspan="2" valign="top" style="padding-top:5px;width:100%;">
			<span style="font-size: 14px;;line-height:15px;color:#262624;margin-bottom:5px;display:block;">Spouse Details</span>
		</td>
	</tr>
    <tr>
        <td valign="top" width="250" style="padding-top:5px;padding-bottom: 2px;padding-right: 10px;">
            <span style="border-bottom: 1px solid; display: block;" >
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">@if($data['first_field_248'] != '')  {{ucfirst($data['first_field_248'])}} @else -  @endif</span>
            </span>
            <span style="display: block;">
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">
                    Spouse First Name</span>
            </span>
        </td>
        <td valign="top" width="250" style="padding-top:5px;padding-bottom: 2px;padding-right: 10px;">

            <span style="border-bottom: 1px solid; display: block;" >
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;"> @if($data['last_field_248'] != '')  {{ucfirst($data['last_field_248'])}} @else -  @endif</span>
            </span>
            <span style="display: block;">
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">
                    Last Name</span>
            </span>
        </td>
    </tr>
    <tr>
        <td valign="top" width="250" style="padding-top:5px;padding-bottom: 2px;padding-right: 10px;">

            <span style="border-bottom: 1px solid; display: block;" >
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;"> @if($data['field_249'] != '')  {{$data['field_249']}} @else -  @endif</span>
            </span>
            <span style="display: block;">
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">
                    Spouse Phone Number</span>
            </span>
        </td>
        <td valign="top" width="250" style="padding-top:5px;padding-bottom: 2px;padding-right: 10px;">

            <span style="border-bottom: 1px solid; display: block;" >
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">@if($data['field_289'] != '')  {{$data['field_289']}} @else -  @endif</span>
            </span>
            <span style="display: block;">
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">
                    What type of program would help you most</span>
            </span>
        </td>
    </tr>
    <tr>
        <td valign="top" width="250" style="padding-top:5px;padding-bottom: 2px;padding-right: 10px;">

            <span style="border-bottom: 1px solid; display: block;" >
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">@if($data['field_257'] != '')  {{$data['field_257']}} @else -  @endif</span>
            </span>
            <span style="display: block;">
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">
                    Number of People in Home</span>
            </span>
        </td>
    </tr>
    <tr>
        <td valign="bottom" width="250" style="padding-top:5px;padding-bottom: 2px;padding-right: 10px;">

            <span style="border-bottom: 1px solid; display: block;" >
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">@if($data['field_276'] != '')  {{$data['field_276']}} @else -  @endif</span>
            </span>
            <span style="display: block;">
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">
                    Full-Time Job (40 hours/week)</span>
            </span>
        </td>
         <td valign="top" width="250" style="padding-top:5px;padding-bottom: 2px;padding-right: 10px;">

            <span style="border-bottom: 1px solid; display: block;" >
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;"> @if($data['field_277'] != '')  {{$data['field_277']}} @else -  @endif</span>
            </span>

            <span style="display: block;">
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">
                    Health Insurance</span>
            </span>
        </td>
    </tr>
    <tr>
        <td valign="top" width="250" style="padding-top:5px;padding-bottom: 2px;padding-right: 10px;">
            <span style="border-bottom: 1px solid; display: block;" >
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">@if($data['field_278'] != '')  {{$data['field_278']}} @else -  @endif</span>
            </span>
            <span style="display: block;">
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">
                Age Range </span>
                            </span>
        </td>
        <td valign="top" width="250" style="padding-top:5px;padding-bottom: 2px;padding-right: 10px;">
            <span style="border-bottom: 1px solid; display: block;" >
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">@if($data['field_306'] != '')  {{$data['field_306']}} @else -  @endif</span>
            </span>
            <span style="display: block;">
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">
                Reason you are applying for Zakah </span>
                            </span>
        </td>
    </tr>
    <tr>
        <td valign="top" width="250" style="padding-top:5px;padding-bottom: 2px;padding-right: 10px;">
            <span style="border-bottom: 1px solid; display: block;" >
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">@if($data['field_266'] != '')  {{$data['field_266']}} @else -  @endif </span>
            </span>
            <span style="display: block;">
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">
                    Sharing of Zakah Information Waiver</span>
            </span>
        </td>
        <td valign="bottom" width="250" style="padding-top:5px;padding-bottom: 2px;padding-right: 10px;">
            <span style="border-bottom: 1px solid; display: block;" >
                <span style="display:block;text-align:center;font-weight: 600; max-width:275px;min-width:275px; width:275px; font-size: 12px;line-height: 20px;color: #8F9187;padding-right: 20px;"><?php if(isset($data['image']) && $data['image'] != '')  echo $data['image'];  else echo '-';  ?> </span>
            </span>
            <span style="display: block;">
                <span style="display:block;text-align:center;font-weight: 600;font-size: 12px;line-height: 20px;color: #000000;padding-right: 20px;">
                    Signature</span>
            </span>
        </td>
    </tr>
</table>
    </td>
  </tr>
</table>
</td>
  </tr>
</table>
<br>
<br>
<br>
<br>
<br>
<p style="padding:0px 40px 0px 70px; margin:20px 0px; color:#262624; font-size: 12px;font-weight: 600;line-height: 18px;text-align:justify;">As a precondition to receiving this charitable donation, the applicant verified his/her identity via a commercial biometric platform, ID verification, and multifactor authentication. The sensitive personal information contained on the applicant's ID card was independently verified and immediately deleted. It is not stored/retained in accordance with best practices as referenced by the Virginia Customer Data Protection Act, the Maryland Personal Information Protection Act, the California Consumer Privacy Protection Act, and other similar State laws for maintaining the privacy and security of an applicant's sensitive personal information. The Zakah Network is a data processor. The Zakah application data on this document is property of the receiving Masjid and applicable records retention policies apply.</p>
</body>
</html>
