@component('mail::message', ['user' => $user, 'auth' => $auth, 'screenin' => $screening])
# Hi {{$auth->username}}, you have an upcoming event hosted by {{$user->username}} on {{$screening->date}}

- You can view this event <a href="http://movietix.dev/screening/{{$screening->slug}}">here</a> 


@component('mail::button', ['url' => 'http://movietix.dev/screening/{{$screening->slug}}'])
Proceed
@endcomponent

<small> If this was a mistake, please <a href="http://movietix.dev/contact/"> contact us</a> </small>

Thanks,<br>
{{ config('app.name') }}
@endcomponent