<div>
@foreach($records as $records)

    @if($records['field_10'])
    
       <h4>Hi {{$records['field_7_raw']['first']}} {{$records['field_7_raw']['middle']}} {{$records['field_7_raw']['last']}},</h4>
       <h4>In Zakah Application,Your Application Status Approved...</h4>
       
    @else
       <h4>Hi {{$records['field_7_raw']['first']}} {{$records['field_7_raw']['middle']}} {{$records['field_7_raw']['last']}},</h4>
       <h4>In Zakah Application,Your Application Status Denied...</h4>
       
    @endif
    
@endforeach
</div>
    
    