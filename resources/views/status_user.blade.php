<div>
@if($datas['field_10_raw']['email'] !='' && $datas['field_245'] =="Approved")

   <p>As'Salaamu Alaikum <b>{{ucfirst($datas['field_7_raw']['first'])}} {{ucfirst($datas['field_7_raw']['last'])}}</b> - Congratulations! Your Zakah application has been approved by <b>{{$datas['field_141_raw'][0]['identifier']}}</b>. A Masjid representation will contact you within 5 business days with further details. If you do not hear back within 5 business days, please contact the Masjid and reference this application. Do not reply to this message.<p>
   
@elseif($datas['field_10_raw']['email'] !='' && $datas['field_245'] =="Denied")

   <p>As'Salaamu Alaikum <b>{{ucfirst($datas['field_7_raw']['first'])}} {{ucfirst($datas['field_7_raw']['last'])}}</b>, - Your Zakah application has been denied. Please contact your Masjid directly for details. Do not reply to this message.</p>
   
@endif
</div>

