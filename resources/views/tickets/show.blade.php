<h1>{{ $ticket->titulo }}</h1>
<p>{{ $ticket->descripcion }}</p>
<p>Estado: {{ $ticket->estado }}</p>
<a href="{{ route('tickets.index') }}">Volver al listado</a>
