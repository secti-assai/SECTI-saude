@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-3">{{ $unidade->nome }}</h1>

    @if($unidade->imagem)
        <img src="{{ asset('images/unidades/' . $unidade->imagem) }}" alt="Foto da unidade {{ $unidade->nome }}"
             class="img-fluid rounded mb-4" style="max-height: 350px;">
    @endif

    <p><strong>Endereço:</strong> {{ $unidade->endereco }}</p>
    @if($unidade->telefone)
        <p><strong>Telefone:</strong> {{ $unidade->telefone }}</p>
    @endif
    @if($unidade->email)
        <p><strong>Email:</strong> {{ $unidade->email }}</p>
    @endif
    @if($unidade->especialidades)
        <p><strong>Especialidades:</strong> {{ $unidade->especialidades }}</p>
    @endif

    {{-- Mapa do Google --}}
    <div id="map" style="height: 400px;" class="mt-4 rounded shadow"></div>
</div>
@endsection

@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
<script>
    function initMap() {
        const local = { lat: {{ $unidade->latitude }}, lng: {{ $unidade->longitude }} };
        const map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: local
        });
        new google.maps.Marker({
            position: local,
            map: map
        });
    }
</script>
@endsection
