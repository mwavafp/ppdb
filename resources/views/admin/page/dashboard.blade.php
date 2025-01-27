<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<x-layoute>
    <x-slot:title>{{ $title }}</x-slot:title>


    <div class=" bg-gray-100">
        <div class="p-4">
            <p class="text-3xl">Dashboard</p>
        </div>
        <!-- Header Metrics -->
        <div class="flex p-8  gap-4 mb-6 flex-row items-stretch">
            <div class="flex flex-col w-1/2 h-full justify-between ">
                <div class="flex-1 p-4 m-2 m bg-white rounded-lg shadow-md text-center min-w-[200px]">
                    <p class="text-sm text-gray-500">Jumlah Total Pendaftar</p>
                    <p class="text-2xl font-semibold">{{ $all_user }}</p>

                </div>
                <div class="flex-1 p-4 m-2 m bg-white rounded-lg shadow-md text-center min-w-[200px]">
                    <p class="text-sm text-gray-500">Jumlah Pendapatan Pendaftaran</p>
                    <p class="text-2xl font-semibold">@currency($total_bayar)</p>
                </div>
            </div>
            <div class="flex w-1/2 flex-wrap">

                @foreach ($tipe_user as $user)
                    <div class="flex-1 p-4 m-2 bg-white rounded-lg shadow-md text-center min-w-[200px]">
                        <p class="text-sm text-gray-500">{{ $user['title'] }}</p>
                        <p class="text-2xl font-semibold">{{ $user['fungsi'] }}</p>

                    </div>
                @endforeach
            </div>


        </div>

        <!-- Charts Section -->
        <div class="flex  gap-8 mb-6 p-8 w-4/5 mx-auto">
            <!-- Contextual Pie Chart -->
            <div class="flex-1 bg-white p-4 rounded-lg shadow-md w-40">
                <p class="text-lg font-semibold mb-4">Tipe Pendaftar</p>
                <canvas id="contextualChart"></canvas>
            </div>

            <!-- Device Type Doughnut Chart -->


            <!-- Impression Line Chart -->
            <div class="flex-1 flex-wrap bg-white p-4 rounded-lg shadow-md mb-6">
                <p class="text-lg font-semibold w-full mb-4">Grafik Pembayaran</p>
                <div class="w-full">
                    <canvas id="spendChart"></canvas>
                </div>
            </div>


        </div>




    </div>
</x-layoute>
<script>
    const genderLaki = @json($gender_laki);
    const total_bayar_tpq = @json($total_bayar_tpq);
    const total_bayar_pondok = @json($total_bayar_pondok);
    const total_bayar_madin = @json($total_bayar_madin);
    const total_bayar_tk = @json($total_bayar_tk);
    const total_bayar_sd = @json($total_bayar_sd);
    const total_bayar_smp = @json($total_bayar_smp);
    const total_bayar_sma = @json($total_bayar_sma);
    const genderPerempuan = @json($gender_perempuan);
    // Contextual Chart (Pie)
    const ctxContextual = document.getElementById('contextualChart');
    new Chart(ctxContextual, {
        type: 'pie',
        data: {
            labels: ['Laki - laki', 'Perempuan'],
            datasets: [{
                data: [genderLaki, genderPerempuan],
                backgroundColor: ['#f472b6', '#818cf8'],
            }]
        }
    });





    // Spend Chart (Bar)
    const ctxSpend = document.getElementById('spendChart');
    new Chart(ctxSpend, {
        type: 'bar',
        data: {
            labels: ['TPQ', 'PONDOK', 'MADIN', 'TK', 'SD', 'SMP', 'SMA'],
            datasets: [{
                label: 'Spend ($)',
                data: [total_bayar_tpq,
                    total_bayar_pondok,
                    total_bayar_madin,
                    total_bayar_tk,
                    total_bayar_sd,
                    total_bayar_smp,
                    total_bayar_sma
                ],
                backgroundColor: '#f472b6'

            }]
        }
    });

    // Resonance Chart (Polar Area)
    const ctxResonance = document.getElementById('resonanceChart');
    new Chart(ctxResonance, {
        type: 'polarArea',
        data: {
            labels: ['Creative A', 'Creative B', 'Creative C', 'Creative D'],
            datasets: [{
                data: [79, 82, 54, 67],
                backgroundColor: ['#f472b6', '#818cf8', '#34d399', '#fbbf24']
            }]
        }
    });
</script>
