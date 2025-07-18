@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1>{{ $unidade->nome }}</h1>
    
    <img src="{{ asset('storage/' . $unidade->imagem) }}" alt="Foto da unidade" class="img-fluid rounded mb-4" style="max-height: 300px;">

    <p><strong>Endereço:</strong> {{ $unidade->endereco }}</p>
    <p><strong>Telefone:</strong> {{ $unidade->telefone }}</p>
    <p><strong>Email:</strong> {{ $unidade->email }}</p>
    <p><strong>Especialidades:</strong> {{ $unidade->especialidades }}</p>

    <div id="map" style="height: 400px;" class="mt-4 rounded shadow"></div>
</div>
@endsection

@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
<script>
function initMap() {
    const location = { lat: {{ $unidade->latitude }}, lng: {{ $unidade->longitude }} };
    const map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: location
    });
    new google.maps.Marker({
        position: location,
        map: map
    });
}
</script>
@endsection