@extends('layout.app')

@section('body')
<div class="container">
    <div class="row">
        <div class="card mt-3" style="width: 100%;">
            {{-- <img src="..." class="card-img-top" alt="..."> --}}
            <div class="card-body">
              <h5 class="card-title">Nome: {{ $pokemon['name'] }}</h5>
              <p class="card-text">Altura: {{ $pokemon['height'] }}</p>
              <p class="card-text">Peso: {{ $pokemon['weight'] }}</p>
              <p>
                <ul>
                    @foreach ($pokemon['type'] as $type)
                        <li>{{ $type->type->name }}</li>
                    @endforeach
                </ul>
              </p>
              <a href="{{ route('index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
</div>
@endsection
