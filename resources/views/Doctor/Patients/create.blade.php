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
                        <li class="active" aria-current="page"> Ajouter</li>
                    </ol>
                </nav>


            </div>
            <!-- row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Liste Des Médicaments</h4>
                            <a href="{{ route('medications.create') }}" class="btn btn-primary">Ajouter</a>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('medications.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="name" class="form-label"><strong>Nom</strong></label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="dosage" class="form-label"><strong>Dosage</strong></label>
                                        <input type="text" class="form-control" id="dosage" name="dosage" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- col -->
            </div>
        </div>
    </div>

@endsection
