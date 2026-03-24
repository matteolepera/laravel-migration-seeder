@extends("layouts.base-layout")
@section("win-title", "TrainTime©")

@section("page-main")
    <table class="board-table">
        <thead>
            <tr>
                <th>DATA / ORARIO</th>
                <th>DESTINAZIONE</th>
                <th>CODICE</th>
                <th>AZIENDA</th>
                <th>STATO</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($trains as $train)
                <tr class="board-table__row {{ $train->is_cancelled ? 'board-table__row--cancelled' : '' }}">

                    {{-- Data + Orario --}}
                    <td class="board-table__time">
                        <div class="board-table__date">
                            {{ date('d/m/Y', strtotime($train->departure_at)) }}
                        </div>

                        <span class="board-table__time-dep">
                            {{ date('H:i', strtotime($train->departure_at)) }}
                        </span>
                        <span class="board-table__time-arrow">→</span>
                        <span class="board-table__time-arr">
                            {{ date('H:i', strtotime($train->arrival_at)) }}
                        </span>
                    </td>

                    {{-- Stazioni --}}
                    <td class="board-table__destination">
                        <span class="board-table__dest-from">{{ $train->departure_station }}</span>
                        <span class="board-table__dest-arrow">→</span>
                        <span class="board-table__dest-to">{{ $train->arrival_station }}</span>
                    </td>

                    {{-- Codice --}}
                    <td class="board-table__code">{{ $train->train_code }}</td>

                    {{-- Azienda --}}
                    <td class="board-table__company">{{ $train->company }}</td>

                    {{-- Stato --}}
                    <td class="board-table__status">
                        @if ($train->is_cancelled)
                            <span class="board-badge board-badge--cancelled">CANCELLATO</span>
                        @elseif(!$train->is_on_time)
                            <span class="board-badge board-badge--late">IN RITARDO</span>
                        @else
                            <span class="board-badge board-badge--ontime">IN ORARIO</span>
                        @endif
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="5" class="board-table__empty">Nessun treno in partenza</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection