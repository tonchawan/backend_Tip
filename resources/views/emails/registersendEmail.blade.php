<x-mail::message>
    # Welcome to the first Newletter
    Dear {{$name}},
    We look forward to communicating more with you. For more information visit our blog.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
