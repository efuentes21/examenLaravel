<div>
    <h2>Editar casal</h2>
    <form method="POST" action="{{ route('casal.update', [$casal]) }}">
        @csrf
        <div>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" value="{{ old("nom", $casal->nom) }}" required>
        </div>
        <div>
            <label for="data_inici">Data de inici</label>
            <input type="date" id="data_inici" name="data_inici" value="{{ old("data_inici", $casal->data_inici->format('Y-m-d')) }}" required>
        </div>
        <div>
            <label for="data_final">Data final</label>
            <input type="date" id="data_final" name="data_final" value="{{ old("data_final", $casal->data_final->format('Y-m-d')) }}" required>
        </div>
        <div>
            <label for="n_places">Numero de places</label>
            <input type="number" id="n_places" name="n_places" value="{{ old("n_places", $casal->n_places) }}" required>
        </div>
        <div>
            <label for="ciutat_id">Ciutat</label>
            <select name="ciutat_id" id="ciutat_id" required>
                @foreach ($ciutats as $ciutat)
                    @if($ciutat == $casal->ciutat)
                        <option value="{{ $ciutat->id }}" selected>{{ $ciutat->nom }}</option>
                    @else
                        <option value="{{ $ciutat->id }}">{{ $ciutat->nom }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <button type="submit">Actualizar</button>
    </form>
    @if($errors)
        <div>
            <ul>
                @foreach($errors as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>