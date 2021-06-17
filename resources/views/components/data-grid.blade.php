<div class="card h-100 d-flex flex-grow-1">
    <div class="table-responsive h-100">
        <table class="table m-0">

            <thead>
                <tr>
                    <th class="w-01">
                        Actions
                    </th>

                    @foreach ($columnDefs as $column)
                        <th>{{ $column['columnDisplayName'] }}</th>
                    @endforeach
                </tr>
            </thead>

            <tbody>
                @foreach ($rows as $row)
                    <tr>

                        <td class="align-middle p-0 m-0">
                            <div class="d-flex p-2">
                                <a href="{{ $makeRowEditAction($row) }}" class="btn btn-sm btn-outline-warning">Edytuj</a>
                                &nbsp;
                                <form action="{{ $makeRowDeleteAction($row) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" name="DELETE_ROW" value="DELETE_ROW">Usun</button>
                                </form>
                            </div>
                        </td>

                        @foreach ($columnDefs as $column)
                            <td>
                                @if (isset($column['valueFormatter']))
                                    @php
                                        $value = $row[$column['columnKey']];
                                    @endphp
                                    {{ $column['valueFormatter']($value, $row) }}
                                @else
                                    {{ $row[$column['columnKey']] }}
                                @endif
                            </td>
                        @endforeach

                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
