@component('mail::message')
<p> je suis {{ $contents['nameAndSurname'] }} </p>
<h1> {{ $contents['object'] }} </h1>
<p> contact: {{ $contents['phone'] }} </p>
<p> {{ $contents['message'] }} </p>
@endcomponent
