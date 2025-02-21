@if($ordonnance)
    <table class="table">
        <thead>
        <tr>
            <th>Code de l'ordonnance</th>
            <th>Date de création</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $ordonnance->code }}</td>
                <td>{{ $ordonnance->created_at->formatLocalized('%A %d %B %Y') }}</td>
                <td>
                    <button class="btn btn-primary shadow btn-xs sharp" data-bs-toggle="collapse"
                            data-bs-target="#accordion-{{$ordonnance->id}}">
                        <i class="fa fa-info-circle"></i>
                    </button>
                </td>
            </tr>
            <tr id="accordion-{{$ordonnance->id}}" class="collapse">
                <td colspan="3">
                    <div>
                        <p><strong>Code:</strong> {{ $ordonnance->code }}</p>
                        <p><strong>Date de création:</strong> {{ $ordonnance->created_at }}</p>
                        <p><strong>Patient :</strong> {{ $ordonnance->prescription->patient->firstname . ' '. $ordonnance->prescription->patient->lastname  }}</p>
                        <p><strong>Prescription:</strong> {{ $ordonnance->created_at }}</p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Médicament</th>
                                    <th>Posologie</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ordonnance->prescriptionMedications as $prescriptionMedication)
                                    <tr>
                                        <td>{{ $prescriptionMedication->medication->name }}</td>
                                        <td>{{ $prescriptionMedication->posology }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Ajoutez d'autres informations de l'ordonnance ici -->
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
@else
    <p>Pas de details pour cette ordonnance</p>
@endif
