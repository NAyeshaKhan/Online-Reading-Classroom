@component('mail::message')
Hello from ReadApp!

{{  $user->name }} has sent you the class code for {{ $course->title  }}:
{{  $course->code }}<br>
Join our classroom now!

Thanks,<br>
From the ReadApp team
@endcomponent
