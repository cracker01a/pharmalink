@extends('partials.master')

@section('content')

    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <h4>Medicaments</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class=""><a href="{{ route('home') }}">Dashboard</a> >></li>
                        <li class=""><a href="{{ route('medications.index') }}"> Médicaments</a> >></li>
                        <li class=""><a href=""></a> Modifier >> </li>
                        <li class=""><a href=""></a> {{$medication->name}}</li>
                    </ol>
                </nav>


            </div>
            <!-- row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Modifier  {{$medication->name}} </h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('medications.update', $medication->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="name" class="form-label"><strong>Nom</strong></label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{$medication->name}}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="dosage" class="form-label"><strong>Dosage</strong></label>
                                        <input type="text" class="form-control" id="dosage" name="dosage"
                                               value="{{$medication->dosage}}" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Modifier</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- col -->
            </div>
        </div>
    </div>

@endsection
