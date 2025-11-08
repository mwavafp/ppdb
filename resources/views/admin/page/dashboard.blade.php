<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<x-layoute>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="">
        <p class="text-3xl font-bold">Dashboard</p>
    </div>

    <div class="text-right mb-8">
        <form action="{{ route('admin.dahsboard-export') }}" method="GET">
            <button type="submit" class="btn btn-primary">
                <span
                    class="border-2 border-[oklch(62.7%_0.194_149.214)] bg-[oklch(62.7%_0.194_149.214)] text-white hover:bg-white hover:text-[oklch(62.7%_0.194_149.214)] text-center px-6 py-4 rounded-md transition">
                    Download Excel Data Pendaftar
                </span>
            </button>
        </form>
    </div>

    @php
        $adminUnit = auth('admin')->user()->unit;
    @endphp

    {{-- SUPER ADMIN --}}
    @if ($adminUnit === 'super')
        <div class="flex mb-2 w-full">
            <div class="flex-1 p-4 m-2 bg-white rounded-lg shadow-md text-center min-w-[200px]">
                <p class="text-sm text-gray-500">Jumlah Total Pendaftar</p>
                <p class="text-2xl font-semibold">{{ $all_user }}</p>
            </div>
            <div class="flex-1 p-4 m-2 bg-white rounded-lg shadow-md text-center min-w-[200px]">
                <p class="text-sm text-gray-500">Jumlah Pendapatan Pendaftaran</p>
                <p class="text-2xl font-semibold">@currency($total_bayar)</p>
            </div>
        </div>

        <div class="flex gap-8 mb-6 w-full">
            <div class="flex-1 bg-white p-4 rounded-lg shadow-md w-40">
                <p class="text-lg font-semibold mb-4">Tipe Pendaftar</p>
                <canvas id="contextualChart"></canvas>
            </div>

            <div class="flex-1 bg-white p-4 rounded-lg shadow-md mb-6">
                <p class="text-lg font-semibold mb-4">Grafik Pendapatan Pembayaran</p>
                <canvas id="spendChart"></canvas>
            </div>

            <div class="flex-1 bg-white p-4 rounded-lg shadow-md mb-6">
                <p class="text-lg font-semibold mb-4">Grafik Pendaftar per Unit Pendidikan</p>
                <canvas id="unitChart"></canvas>
            </div>
        </div>

        {{-- NON-SUPER ADMIN --}}
    @else
        <div class="flex mb-2 w-full">
            <div class="flex-1 p-4 m-2 bg-white rounded-lg shadow-md text-center min-w-[200px]">
                <p class="text-sm text-gray-500">Jumlah Pendaftar Unit {{ strtoupper($adminUnit) }}</p>
                <p class="text-2xl font-semibold">{{ ${'user_' . strtolower($adminUnit)} ?? 0 }}</p>
            </div>
            <div class="flex-1 p-4 m-2 bg-white rounded-lg shadow-md text-center min-w-[200px]">
                <p class="text-sm text-gray-500">Total Pendapatan Unit {{ strtoupper($adminUnit) }}</p>
                <p class="text-2xl font-semibold">@currency(${'total_bayar_' . strtolower($adminUnit)} ?? 0)</p>
            </div>
        </div>

        {{-- Canvas khusus unit admin --}}
        <div class="flex gap-8 mb-6 w-2/4">
            <div class="flex-1 bg-white p-4 rounded-lg shadow-md">
                <p class="text-lg font-semibold mb-4">Tipe Pendaftar Unit {{ strtoupper($adminUnit) }}</p>
                <canvas id="contextualChart"></canvas>
            </div>
        </div>
    @endif

</x-layoute>

<script>
    const adminUnit = @json($adminUnit);
    const genderLaki = @json($gender_laki);
    const genderPerempuan = @json($gender_perempuan);

    const totalBayar = {
        tpq: @json($total_bayar_tpq),
        pondok: @json($total_bayar_pondok),
        madin: @json($total_bayar_madin),
        tk: @json($total_bayar_tk),
        sd: @json($total_bayar_sd),
        smp: @json($total_bayar_smp),
        sma: @json($total_bayar_sma)
    };

    const totalPendaftar = {
        tpq: @json($user_tpq),
        pondok: @json($user_pondok),
        madin: @json($user_madin),
        tk: @json($user_tk),
        sd: @json($user_sd),
        smp: @json($user_smp),
        sma: @json($user_sma)
    };

    // ==== PIE CHART: GENDER ====
    const ctxContextual = document.getElementById('contextualChart');
    if (ctxContextual) {
        new Chart(ctxContextual, {
            type: 'pie',
            data: {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    data: [genderLaki, genderPerempuan],
                    backgroundColor: ['#818cf8', '#f472b6'],
                }]
            },
        });
    }

    // ==== HANYA UNTUK SUPER ADMIN ====
    if (adminUnit === 'super') {
        const ctxSpend = document.getElementById('spendChart');
        if (ctxSpend) {
            new Chart(ctxSpend, {
                type: 'bar',
                data: {
                    labels: ['TPQ', 'PONDOK', 'MADIN', 'TK', 'SD', 'SMP', 'SMA'],
                    datasets: [{
                        label: 'Pendapatan (Rp)',
                        data: Object.values(totalBayar),
                        backgroundColor: ['#F54927', '#34d399', '#fbbf24', '#ef4444', '#8b5cf6',
                            '#10b981', '#00008B'
                        ]
                    }]
                }
            });
        }

        const ctxPendaftar = document.getElementById('unitChart');
        if (ctxPendaftar) {
            new Chart(ctxPendaftar, {
                type: 'bar',
                data: {
                    labels: ['TPQ', 'PONDOK', 'MADIN', 'TK', 'SD', 'SMP', 'SMA'],
                    datasets: [{
                        label: 'Total Pendaftar',
                        data: Object.values(totalPendaftar),
                        backgroundColor: ['#ffffff', '#34d399', '#fbbf24', '#ef4444', '#8b5cf6',
                            '#10b981', '#00008B'
                        ]
                    }]
                }
            });
        }
    }

    // ==== UNTUK NON-SUPER ADMIN ====
    else {
        const unitKey = adminUnit.toLowerCase();

        const ctxContextual = document.getElementById('contextualChart');
        if (ctxContextual) {
            new Chart(ctxContextual, {
                type: 'bar',
                data: {
                    labels: [unitKey.toUpperCase()],
                    datasets: [{
                            label: 'Total Pendaftar',
                            data: [totalPendaftar[unitKey] ?? 0],
                            backgroundColor: '#34d399'
                        },
                        {
                            label: 'Pendapatan (Rp)',
                            data: [totalBayar[unitKey] ?? 0],
                            backgroundColor: '#818cf8'
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    }
</script>
