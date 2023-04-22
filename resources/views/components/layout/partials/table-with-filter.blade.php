<table id="{{ $tableId }}" class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                        aria-describedby="{{ $tableId }}_info">
                        <thead>
                            <tr role="row">
                               {{ $headers }}
                            </tr>
                        </thead>
                        <tbody>
                            {{ $body }}
                        </tbody>
                        {{-- <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">Sigle</th>
                                <th rowspan="1" colspan="1">Nom complet</th>
                                <th rowspan="1" colspan="1">Grades disponibles</th>
                                <th rowspan="1" colspan="1">Détails</th>
                            </tr>
                        </tfoot> --}}
                    </table>