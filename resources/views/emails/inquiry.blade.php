You have a new message via the inquiry form (Elmacs Co. LLC).<br><br>

Via email: {{ $email }} <br> <br>

Client Name: {{ $name }} <br> <br>

Mobile no: {{ $phone }} <br> <br>

@if($residence != '')

Residence: {{ $residence }} <br> <br>

@endif

Nationality: {{ $nationality }} <br><br>

Message: <br> 

<hr>

 {{ $bodyMessage }}