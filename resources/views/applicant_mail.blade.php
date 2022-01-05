

<p>@if($data['first'] != '')  <b>{{ucfirst($data['first'])}} {{ucfirst($data['last'])}}</b> @endif has applied for Zakah at @if($data['majidFields'] != '' )  <b>{{$data['majidFields']}}</b> @endif on @if($data['submissionData'] != '' )  
<b> {{ date('m/d/Y', strtotime($data['submissionData'])) }}</b> @endif . A copy of the Zakah application is attached. Please log into your Masjid portal via the Zakah Network to approve or deny the application.<p>