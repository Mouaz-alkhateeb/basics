@component('mail::message')
hello ...!!
<h2>welcome in our websites</h2>
@component('mail::button', ['url' => 'https://www.positronx.io','color'=>'success'])
Button Text
@endcomponent
Thanks..
< br>
    {{ config('app.name') }}
    @endcomponent