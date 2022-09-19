@component('mail::message')

Sign Up here {{ $name }}

@component('mail::button', ['url'=>'www.google.com'])
   Click here
@endcomponent

@endcomponent