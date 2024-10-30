@extends('layout.app')

@section('body')
<div class="container">
    <div class="row mt-4">
        <form action="{{ route('index') }}" method="GET">
            <h2>Filtrar:</h2>
            <div class="mb-3 mb-4">
                <label for="exampleFormControlInput1" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $nameFilter }}">
                </div>
                <div class="mb-3">
                <button type="submit" class="btn btn-dark">Buscar</button>
                <a href="{{ route('index') }}" class="btn btn-dark">Limpar</a>
            </div>
        </form>
    </div>
    <div class="row">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pokemons as $pokemon)
              <tr>
                    <th scope="row">{{ $pokemon['id'] }}</th>
                    <td>{{ $pokemon['name'] }}</td>
                    <td>
                        <a href="{{ route('searchPokemon', $pokemon['id']) }}" class="btn btn-dark">Ver mais</a>
                    </td>
              </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
