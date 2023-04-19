<div>
    <div class="card card-navy">
        <div class="card-header">
            <h3 class="card-title">Premier parcours</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body"><div class="form-group" data-select2-id="44">
            <label>Minimal (.select2-danger)</label>
            <select class="form-control select2 select2-danger select2-hidden-accessible" data-dropdown-css-class="select2-danger" style="width: 100%;" data-select2-id="12" tabindex="-1" aria-hidden="true">
                @foreach ($schedules() as $schedule)
                    <option data-select2-id="{{ $schedule -> id }}">{{  $schedule -> titre_diplome }}</option>
                @endforeach
            </select>
          </div>

            @php
                $headers = ['Parcours', 'Grade', 'Ecole', 'Choix'];
                $h= null
            @endphp
          
            <script>
             .//   let firstChoice =null

                /* const setFirst = (e) => {
                    firstChoice = e
                    alert(firstChoice)
                } */
                // document.getElementById('first').innerHTML()
            </script>
            <div id="first">
                   {{ $setFirst(1) }}
                    first choice : {{ $firstChoice }}
            </div>
            <x-layout.partials.table-with-filter>
               
                <x-slot:headers>
                    @foreach ($headers as $header)
                        <x-layout.partials.sortable-th :title="$header" />
                    @endforeach
                </x-slot:headers>
                <x-slot:body>
                    @foreach ($schedules() as $schedule)
                        <tr role="row" class="odd">
                            <td>{{ $schedule->titre_diplome }}</td>
                            <td>{{ $schedule->grade }}</td>
                            <td>{{ $schedule->school->nom }}</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="firstChoice" value="{{ $schedule -> id }}"
                                     onchange= 
                                     
                                     >
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </x-slot:body>
            </x-layout.partials.table-with-filter>
        </div>
        <!-- /.card-body -->
    </div>
</div>
