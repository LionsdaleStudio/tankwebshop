@extends('layouts.tankapp')

@section('content')
    <div class="container">
        @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        <strong>Success!</strong> {{ session()->get('success') }}
                    </div>
                @endif
        <div class="row mb-3">
            <div class="col-4">
                <a href="{{ route('tanks.create') }}" class="btn btn-outline-primary">Add a new tank</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Tank neve</th>
                        <th scope="col">Tank ára</th>
                        <th scope="col">Tank legénysége</th>
                        <th scope="col" colspan="3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tanks as $item)
                        <tr class="">
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->cost }}</td>
                            <td>{{ $item->crewnumber }}</td>
                            <td>
                                <form action="{{ route('tanks.show', $item) }}" method="GET"><button
                                        class="btn btn-info">Show</button></form>
                            </td>
                            <td>
                                <form action="{{ route('tanks.edit', $item) }}" method="GET"><button
                                        class="btn btn-warning">Edit</button></form>
                            </td>
                            <td>
                                <form action="{{ route('tanks.destroy', $item) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
