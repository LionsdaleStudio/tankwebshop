@extends('layouts.tankapp')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-4">
                <a href="{{route('tanks.create')}}" class="btn btn-outline-primary">Add a new tank</a>
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
                            <td><form action=""><button class="btn btn-info">Show</button></form></td>
                            <td><form action=""><button class="btn btn-warning">Edit</button></form></td>
                            <td><form action=""><button class="btn btn-danger">Delete</button></form></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
