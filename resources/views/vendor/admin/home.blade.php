@component('admin::layouts.app')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @php
        $users = \App\Http\Controllers\Panel\DashboardController::thisMonthUsers();
        $incomeMonth = \App\Http\Controllers\Panel\DashboardController::thisMonthIncome();
        $incomeYear = \App\Http\Controllers\Panel\DashboardController::thisYearIncome();
    @endphp
    <div class="row">
        <div class="col-md-12">
            <canvas id="incomeMonth" style="max-height: 50vh;"></canvas>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <canvas id="usersChart"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="incomeYear"></canvas>
        </div>
    </div>


    <script>
{{--        @php--}}
{{--            foreach(\App\Http\Controllers\Panel\DashboardController::getUsers() as $i => $month) {--}}
{{--                $month->--}}
{{--     linear-gradient(to right,#8971ea,#7f72ea,#7574ea,#6a75e9,#ff8383)       }--}}
{{--        @endphp--}}

        const usersEl = document.getElementById('usersChart');
        const usersChart = new Chart(usersEl, {
            type: 'bar',
            data: {
                labels: [@foreach($users as $k => $u) {!! "'$k', " !!} @endforeach],
                datasets: [{
                    label: 'کاربران جدید ' + '{{ verta()->format('F') }}',
                    data: [{{ implode(' , ' , $users) }}],
                    backgroundColor: '#ff8383',
                }]
            },
            options: {
                responsive: true,
            }
        });


        const incomeMonthEl = document.getElementById('incomeMonth');
        const incomeMonth = new Chart(incomeMonthEl, {
            type: 'bar',
            data: {
                labels: [@foreach($incomeMonth as $k => $i) {!! "'$k', " !!} @endforeach],
                datasets: [{
                    label: 'مبالغ پرداخت شده ' + '{{ verta()->format('F') }}' + " ماه",
                    data: [{{ implode(' , ' , $incomeMonth) }}],
                    backgroundColor: '#ff8383',
                }]
            },
            options: {
                responsive: true,
            }
        });


        const incomeYearEl = document.getElementById('incomeYear');
        const incomeYear = new Chart(incomeYearEl, {
            type: 'bar',
            data: {
                labels: [@foreach($incomeYear as  $u) {!! "'".$u['time']."', " !!} @endforeach],
                datasets: [{
                    label: 'مبالغ پرداخت شده یک سال گذشته',
                    data: [{{ implode(', ', array_map(function ($entry) {return $entry['price'];}, $incomeYear)) }}],
                    backgroundColor: '#ff8383',
                }]
            },
            options: {
                responsive: true,
            }
        });
    </script>
@endcomponent
