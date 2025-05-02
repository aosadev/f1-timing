@extends('layouts.app')

@section('content')
    <h1>Clasificación {{ date('Y') }}</h1>
    <table>
        <thead><tr><th>Pos</th><th>Piloto</th><th>N°</th></tr></thead>
        <tbody>
            @foreach($drivers as $driver)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $driver->name() }}</td>
                    <td>{{ $driver->number() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection