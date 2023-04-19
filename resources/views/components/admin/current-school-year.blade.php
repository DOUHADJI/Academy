<div class="px-12">
    <div class="grid gap-24 sm:grid-cols-2 md:grid-cols-3">
        <div class="info-box  bg-warning">
            <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

            <div class="info-box-content">
                <span class="info-box-text font-bold">Année scolaire</span>
                <span class="info-box-number">du {{ $year()->start }} au {{ $year()->end }} </span>

                <div class="progress">
                    <div class="progress-bar proress" style="width: {{ $remaning($year()->start, $year()->end) }}%">
                    </div>
                </div>
                <span class="progress-description">
                    Jours restants {{ $remaning($year()->start, $year()->end) }}
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>

        <div></div>
        <div></div>

        <div class="info-box  bg-navy">
            <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

            <div class="info-box-content">
                <span class="info-box-text font-bold">Semestre Harmattan</span>
                <span class="info-box-number">du {{ $year()->start }} au {{ $year()->end }} </span>

                <div class="progress">
                    <div class="progress-bar proress" style="width: {{ $remaning($year()->start, $year()->end) }}%">
                    </div>
                </div>
                <span class="progress-description">
                    Jours restants {{ $remaning($year()->start, $year()->end) }}
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>

        <div class="info-box  bg-primary">
            <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

            <div class="info-box-content">
                <span class="info-box-text font-bold">Semestre Mousson</span>
                <span class="info-box-number">du {{ $year()->start }} au {{ $year()->end }} </span>

                <div class="progress">
                    <div class="progress-bar proress" style="width: {{ $remaning($year() ->mousson_start, $year()->mousson_end) }}%">
                    </div>
                </div>
                <span class="progress-description">
                    Jours restants {{ $remaning($year()->start, $year()->end) }}
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>

    </div>

    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title font-bold">Découpage de l'année scolaire (jours)</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                        class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="chartjs-size-monitor">
                <div class="chartjs-size-monitor-expand">
                    <div class=""></div>
                </div>
                <div class="chartjs-size-monitor-shrink">
                    <div class=""></div>
                </div>
            </div>
            <canvas id="pieChart"
                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 330px;"
                width="659" height="499" class="chartjs-render-monitor"></canvas>
        </div>
        <!-- /.card-body -->
    </div>

</div>

<script>
    var donutData = {
        labels: [
            'cours - harmattan',
            'Congés de Noel',
            'Examens - harmattan',
            'cours - Mousson',
            'Congés de pâques',
            'Examens - mousson',
        ],
        datasets: [{
            data: [120, 30, 30, 120, 30, 30],
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }]
    }
</script>
