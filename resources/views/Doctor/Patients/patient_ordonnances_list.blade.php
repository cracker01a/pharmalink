@if($ordonnances)
    <table class="table">
        <thead>
        <tr>
            <th>Code de l'ordonnance</th>
            <th>Date de création</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($ordonnances as $ordonnance)
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
                        <!-- Ajoutez d'autres informations de l'ordonnance ici -->
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>Aucune ordonnance trouvée pour ce patient.</p>
@endif
