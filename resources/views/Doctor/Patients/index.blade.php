@extends('partials.master')

@section('title')
    Liste Des Patients

@endsection

@section('content')

    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <h4>Patients</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item "><a href="javascript:void(0)">Patients</a></li>
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
                                                         src="{{ 'images/profile/small/' . ($patient->gender == 'Masculin' ? 'male.jpg' : 'female.jpg') }}"
                                                         alt=""></td>
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
                                                        <a class="btn btn-primary shadow btn-xs sharp showPatientOrdonnancesButton"
                                                           data-patient-id="{{$patient->id}}"><i
                                                                class="fa fa-eye"></i></a>
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

                <div class="modal fade" id="patientModal" tabindex="-1" role="dialog"
                     aria-labelledby="patientModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="patientModalLabel">Ordonnances du Patient</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="modalContent">
                                <!-- Le contenu des ordonnances sera inséré ici -->
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div id="loader"
                 class="position-fixed top-0 start-0 w-100 h-100 bg-white bg-opacity-75 d-flex align-items-center justify-content-center d-none">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Chargement...</span>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.showPatientOrdonnancesButton').on('click', function () {
                $('#loader').removeClass('d-none');
                var patientId = $(this).data('patient-id');
                console.log('fasfasf');

                $.ajax({
                    url: '/patients/' + patientId + '/ordonnancesList',
                    type: 'GET',
                    success: function (response) {
                        // Insérez le code HTML reçu dans le modal
                        $('#modalContent').html(response.html);
                        // Affichez le modal
                        $('#loader').addClass('d-none');
                        $('#patientModal').modal('show');
                    },
                    error: function (xhr) {
                        // Gérez les erreurs ici
                        $('#loader').addClass('d-none');
                        console.error(xhr.responseText);
                    }
                });
            });
        });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

@endsection
