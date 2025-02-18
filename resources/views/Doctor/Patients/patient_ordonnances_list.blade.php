@if($ordonnances)
    <table class="table">
        <thead>
        <tr>
            <th>Nom de l'ordonnance</th>
            <th>Date de création</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($ordonnances as $ordonnance)
            <tr>
                <td>{{ $ordonnance->nom }}</td>
                <td>{{ $ordonnance->created_at->formatLocalized('%A %d %B %Y à %H:%M') }}</td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-primary shadow btn-xs sharp showOrdonnanceButton"
                           data-ordonnance-id="{{$ordonnance->id}}"><i
                                class="fa fa-eye"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>Aucune ordonnance trouvée pour ce patient.</p>
@endif
