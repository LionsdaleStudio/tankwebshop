@extends('layouts.tankapp')

@can("create")
{{-- Form a létrheozásra és elküldésre --}}
@else
    {{-- Figyelmeztetés hogy nincs engedélye erre. --}}
@endcan

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tank hozzáadása</h4>
                <p class="card-text">Fields marked with * are mandatory.</p>

                {{-- Ha van bármilyen error a validálás során, akkor írja ki őket alulra. --}}
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <strong>ERROR!</strong> Please correct your mistakes.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        <strong>Success!</strong> {{ session()->get('success') }}
                    </div>
                @endif

                <div>
                    {{-- Form eleje --}}
                    <form action="{{ route('tanks.store') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" id="name" placeholder=""
                                value="{{ old('name') }}" />
                            <label for="name">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="crewnumber" id="crewnumber" placeholder="" />
                            <label for="crewnumber">Crew Number</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="country" id="country" placeholder="" />
                            <label for="country">Country</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="wars" id="wars" placeholder="" />
                            <label for="wars">Wars</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="releaseyear" id="releaseyear" placeholder="" />
                            <label for="releaseyear">Release Year</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="cost" id="cost" step="0.01"
                                placeholder="" />
                            <label for="cost">Cost</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="description" id="description" placeholder="" />
                            <label for="description">Description</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="active" name="active" />
                            <label class="form-check-label" for="active"> Szolgálatban? </label>
                        </div>
                        <div class="mb-3">
                            <select class="form-select form-select-lg" name="tanktype_id" id="tanktype_id">
                                <option selected>Select one</option>
                                <option value="1">Tigris 1</option>
                                <option value="2">Tigris 2</option>
                                <option value="3">T72</option>
                                <option value="4">T82</option>
                            </select>
                        </div>

                        <div class="text-center">
                            <button name="submit" id="submit" type="submit"
                                class="btn btn-outline-success">Hozzáadás</button>
                        </div>
                    </form>
                    {{-- Form vége --}}
                </div>
            </div>
        </div>

    </div>
@endsection
