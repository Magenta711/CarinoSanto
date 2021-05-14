@component('mail::message')
# Error interno de servidor 500
{{ $id->message }}

@component('mail::button', ['url' => config('app.url').$id->url ])
    Ir aquí
@endcomponent

@component('mail::table')
| Detalles |
|:-------------:|
| <b>ID</b> <br> {{ $id->id }} |
| <b>URL</b> <br> {{config('app.url')}}{{ $id->url }} |
| <b>Método</b> <br> {{ $id->method }} |
| <b>Usuario</b> <br> {{ $id->user->name ?? '' }} |
| <b>Código</b> <br> {{ $id->code }} |
| <b>IP</b> <br> {{ $id->ip }} |
| <b>Fecha</b> <br> {{ $id->created_at }} |
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent