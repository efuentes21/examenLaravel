@if (auth()->check())
    <div>
        <div style="display: flex; align-items: center; gap: 10px;">
            <h1>Gestió de casals</h1>
            <a href="{{ route("casal.new") }}">Afegir</a>
        </div>
        <table>
            <tr>
                <th>Nom</th>
                <th>Data inici</th>
                <th>Data final</th>
                <th>Num places</th>
                <th>Ciutat</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
            @foreach($casals as $casal)
                <tr>
                    <td>{{ $casal->nom }}</td>
                    <td>{{ $casal->data_inici->format('d-m-Y') }}</td>
                    <td>{{ $casal->data_final->format('d-m-Y') }}</td>
                    <td>{{ $casal->n_places }}</td>
                    <td>{{ $casal->ciutat->nom }}</td>
                    <td><a href="{{ route('casal.edit', ['casal' => $casal]) }}">Editar</a></td>
                    <td>
                        <form action={{ route("casal.destroy", $casal) }} method="POST">
                            @csrf
                            @method("delete")
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@else
    <p>Log in first to access this page.</p>
@endif