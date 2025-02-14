@extends('partials.master')

@section('content')
    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <h4>Ordonnance</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Ordonnance</a></li>
                </ol>
            </div>
            <!-- row -->


            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Liste Des Patients</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display min-w850">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nom</th>
                                        <th>Métier</th>
                                        <th>Genre</th>
                                        <th>Tel</th>
                                        <th>Email</th>
                                        <th>Dernière Ordonnance</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($patients && $patients->isNotEmpty())
                                        @foreach($patients as $patient)
                                            <tr>
                                                <td><img class="rounded-circle" width="35"
                                                         src="images/profile/small/pic1.jpg" alt=""></td>
                                                <td>{{ $patient->firstname . ' ' . $patient->lastname }}</td>
                                                <td>{{ $patient->job }}</td>
                                                <td>{{ $patient->gender }}</td>
                                                <td>
                                                    <a href="javascript:void(0);"><strong>{{ $patient->phone_number }}</strong></a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);"><strong>{{ $patient->email }}</strong></a>
                                                </td>
                                                <td>{{ $patient->prescription->last()->ordonnance->created_at->formatLocalized('%A %d %B %Y à %H:%M') }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                                class="fa fa-pencil"></i></a>
                                                        <a href="#" class="btn btn-danger shadow btn-xs sharp"><i
                                                                class="fa fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8" class="text-center">Aucun Patient Pour l'instant</td>
                                        </tr>
                                    @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

@endsection
