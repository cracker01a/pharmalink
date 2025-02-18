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
                            <h4 class="card-title">Liste Des Ordonnances</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display min-w850">
                                    <thead>
                                    <tr class="align-items-center">
                                        <th>Code</th>
                                        <th>Patient</th>
                                        <th>Diagnostic</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($ordonnances && $ordonnances->isNotEmpty())
                                        @foreach($ordonnances as $ordonnance)
                                            <tr>
                                                <td>{{ $ordonnance->code }}</td>
                                                <td>{{ $ordonnance->prescription->patient->firstname . ' ' . $ordonnance->prescription->patient->lastname }}</td>
                                                <td>{{ $ordonnance->prescription->disease }}</td>
                                                <td>{{ $ordonnance->created_at->formatLocalized('%A %d %B %Y à %H:%M') }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a class="btn btn-primary shadow btn-xs sharp showPatientOrdonnancesButton"
                                                           data-patient-id="{{$ordonnance->id}}"><i
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
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="modalContent">
                                <!-- Le contenu des ordonnances sera inséré ici -->
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

        @section('scripts')
            <script>
                $(document).ready(function () {
                    $('.showPatientOrdonnancesButton').on('click', function () {
                        var patientId = $(this).data('patient-id');

                        $.ajax({
                            url: '/patients/' + patientId + '/ordonnancesList',
                            type: 'GET',
                            success: function (response) {
                                // Insérez le code HTML reçu dans le modal
                                $('#modalContent').html(response.html);
                                // Affichez le modal
                                $('#patientModal').modal('show');
                            },
                            error: function (xhr) {
                                // Gérez les erreurs ici
                                console.error(xhr.responseText);
                            }
                        });
                    });
                    $('.showOrdonnanceButton').on('click', function () {
                        var patientId = $(this).data('ordonnance-id');

                        $.ajax({
                            url: '/patients/' + patientId + '/ordonnancesList',
                            type: 'GET',
                            success: function (response) {
                                $('#patientModal').modal('show');
                                // Insérez le code HTML reçu dans le modal
                                $('#modalContent').html(response.html);
                                // Affichez le modal

                            },
                            error: function (xhr) {
                                // Gérez les erreurs ici
                                console.error(xhr.responseText);
                            }
                        });
                    });
                });

            </script>
@endsection
