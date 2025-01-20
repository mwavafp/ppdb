<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>AKUN</h2>
    <div>
        <table class="min-w-full divide-y divide-gray-200" id="dataTable">
            <thead class="bg-gray-50 border-b-2">
                <tr>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Nama Lengkap</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">NIP
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Password</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Role</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200" id="tableBody">
                @if ($all_data->isEmpty())
                    <tr>
                        <td colspan="9" class="text-center py-4 text-gray-500">
                            Data tidak ditemukan
                        </td>
                    </tr>
                @else
                    @foreach ($all_data as $item)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2 text-center">{{ $item->name }}</td>
                            <td class="border px-4 py-2 text-center">{{ $item->nip }}</td>
                            <td class="border px-4 py-2 text-center">{{ $item->email }}</td>
                            <td class="border px-4 py-2 text-center">{{ $item->password }}</td>
                            <td class="border px-4 py-2 text-center">{{ $item->role }}td>
                            <td class="border px-4 py-2 text-center">{{ $item->created_at }}td>


                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</body>

</html>
