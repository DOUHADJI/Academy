<div>
    <div class="bg-navy">
        <p class="text-center font-bold text-md">
            Découpage de l'année académique
        </p>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th></th>
                <th>
                    Début
                </th>
                <th>
                    Fin
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Année académique</td>
                <td>{{strftime("%B %d, %Y",strtotime($year->start)) }}</td>
                <td>{{strftime("%B %d, %Y",strtotime($year->end)) }}</td>
            </tr>

            <tr>
                <td>Semestre Harmattan</td>
                <td>{{strftime("%B %d, %Y",strtotime($year->harmattan_start)) }}</td>
                <td>{{strftime("%B %d, %Y",strtotime($year->harmattan_start)) }}</td>
            </tr>

             <tr>
                <td>Congés harmattan</td>
                <td>{{strftime("%B %d, %Y",strtotime($year->hollydays_harmattan_start)) }}</td>
                <td>{{strftime("%B %d, %Y",strtotime($year->hollydays_harmattan_end)) }}</td>
            </tr>

            
             <tr>
                <td>Examens harmattan</td>
                <td>{{strftime("%B %d, %Y",strtotime($year->harmattan_exams_start)) }}</td>
                <td>{{strftime("%B %d, %Y",strtotime($year->harmattan_exams_end)) }}</td>
            </tr>

            <tr>
                <td>Semestre mousson</td>
                <td>{{strftime("%B %d, %Y",strtotime($year->mousson_start)) }}</td>
                <td>{{strftime("%B %d, %Y",strtotime($year->mousson_end)) }}</td>
            </tr>

            <tr>
                <td>Congés mousson</td>
                <td>{{strftime("%B %d, %Y",strtotime($year->hollydays_mousson_start)) }}</td>
                <td>{{strftime("%B %d, %Y",strtotime($year->hollydays_mousson_end)) }}</td>
            </tr>

            <tr>
                <td>Examens mousson</td>
                <td>{{strftime("%B %d, %Y",strtotime($year->mousson_exams_start)) }}</td>
                <td>{{strftime("%B %d, %Y",strtotime($year->mousson_exams_end)) }}</td>
            </tr>
        </tbody>
    </table>
</div>