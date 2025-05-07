<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<x-layoute>
    <x-slot:title>{{ $title }}</x-slot:title>


    <div class=" bg-gray-100">
        <div class="p-4">
            <p class="text-3xl">Dashboard</p>
        </div>
        <!-- Header Metrics -->
        <div class="flex  p-8   mb-2  w-full">
            <div class="flex-1 p-4 m-2 m bg-white rounded-lg shadow-md text-center min-w-[200px]">
                <p class="text-sm text-gray-500">Jumlah Total Pendaftar</p>
                <p class="text-2xl font-semibold">{{ $all_user }}</p>

            </div>
            <div class="flex-1 p-4 m-2 h-full bg-white rounded-lg shadow-md text-center min-w-[200px]">
                <p class="text-sm text-gray-500">Jumlah Pendapatan Pendaftaran</p>
                <p class="text-2xl font-semibold">@currency($total_bayar)</p>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="flex  gap-8 mb-6 px-8 w-full ">
            <!-- Chart Pendaftar-->
            <div class="flex-1 bg-white p-4 rounded-lg shadow-md w-40">
                <p class="text-lg font-semibold mb-4">Tipe Pendaftar</p>
                <canvas id="contextualChart"></canvas>
            </div>

            <!--Chart Keuntungan-->
            <div class="flex-1 flex-wrap bg-white p-4 rounded-lg shadow-md mb-6">
                <p class="text-lg font-semibold w-full mb-4">Grafik Pendapatan Pembayaran</p>
                <div class="w-full">
                    <canvas id="spendChart"></canvas>
                </div>
            </div>

            <!-- Chart Pendaftar perUnit -->
            <div class="flex-1 flex-wrap bg-white p-4 rounded-lg shadow-md mb-6">
                <p class="text-lg font-semibold w-full mb-4">Grafik Pendaftar per Unit Pendidikan</p>
                <div class="w-full">
                    <canvas id="unitChart"></canvas>
                </div>
            </div>


        </div>




    </div>
</x-layoute>
<script>
    const genderLaki = @json($gender_laki);
    const totalBayar = {
        tpq: @json($total_bayar_tpq),
        pondok: @json($total_bayar_pondok),
        madin: @json($total_bayar_madin),
        tk: @json($total_bayar_tk),
        sd: @json($total_bayar_sd),
        smp: @json($total_bayar_smp),
        sma: @json($total_bayar_sma)
    };
    const genderPerempuan = @json($gender_perempuan);
    const totalPendaftar = {
        tpq: @json($user_tpq),
        pondok: @json($user_pondok),
        madin: @json($user_madin),
        tk: @json($user_tk),
        sd: @json($user_sd),
        smp: @json($user_smp),
        sma: @json($user_sma)
    };

    // Contextual Chart (Pie)
    const ctxContextual = document.getElementById('contextualChart');
    new Chart(ctxContextual, {
        type: 'pie',
        data: {
            labels: ['Laki - laki', 'Perempuan', ],
            datasets: [{
                data: [genderLaki, genderPerempuan],
                backgroundColor: ['#818cf8', '#f472b6'],
            }]
        }
    });





    // totalKeuntunganChart (Bar)
    const ctxSpend = document.getElementById('spendChart');
    new Chart(ctxSpend, {
        type: 'bar',
        data: {
            labels: ['TPQ', 'PONDOK', 'MADIN', 'TK', 'SD', 'SMP', 'SMA'],
            datasets: [{
                label: 'Pendapatan (Rp)',
                data: [totalBayar.tpq,
                    totalBayar.pondok,
                    totalBayar.madin,
                    totalBayar.tk,
                    totalBayar.sd,
                    totalBayar.smp,
                    totalBayar.sma
                ],
                backgroundColor: [
                    '#f472b6', // pink
                    '#34d399', // green
                    '#fbbf24', // yellow
                    '#ef4444', // red
                    '#8b5cf6', // purple
                    '#10b981', // emerald
                    '#eab308'
                ]

            }]
        }
    });

    //chart Pendaftar
    const ctxPendaftar = document.getElementById('unitChart');
    new Chart(ctxPendaftar, {
        type: 'bar',
        data: {
            labels: ['TPQ', 'PONDOK', 'MADIN', 'TK', 'SD', 'SMP', 'SMA'],
            datasets: [{
                label: 'Total Pendaftar',
                data: [totalPendaftar.tpq,
                    totalPendaftar.pondok,
                    totalPendaftar.madin,
                    totalPendaftar.tk,
                    totalPendaftar.sd,
                    totalPendaftar.smp,
                    totalPendaftar.sma
                ],
                backgroundColor: [
                    '#f472b6', // pink
                    '#34d399', // green
                    '#fbbf24', // yellow
                    '#ef4444', // red
                    '#8b5cf6', // purple
                    '#10b981', // emerald
                    '#eab308'
                ]

            }]
        }
    });
</script>
