<div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">
    <!-- Table Title and Search/Filter Section -->
    <div class="flex items-center justify-between pb-4">
        <h2 class="text-2xl font-semibold text-gray-900">Daftar Menu</h2>
        <div class="relative">
            <input type="text"
                   class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                   placeholder="Cari menu...">
        </div>
    </div>

    <!-- Main Table -->
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID Menu
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Menu
                </th>
                <th scope="col" class="px-6 py-3">
                    Harga
                </th>
                <th scope="col" class="px-6 py-3">
                    Jenis
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal Dibuat
                </th>
                <th scope="col" class="px-6 py-3">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            <!-- Example Row 1 -->
            <tr class="bg-white border-b hover:bg-gray-50">
                <td class="px-6 py-4">
                    1
                </td>
                <td class="px-6 py-4 font-medium text-gray-900">
                    Nasi Goreng Spesial
                </td>
                <td class="px-6 py-4">
                    Rp 25.000
                </td>
                <td class="px-6 py-4">
                    Makanan Utama
                </td>
                <td class="px-6 py-4">
                    2024-03-20 10:00:00
                </td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                        <button class="font-medium text-blue-600 hover:underline">Edit</button>
                        <button class="font-medium text-red-600 hover:underline">Hapus</button>
                    </div>
                </td>
            </tr>
            <!-- Example Row 2 -->
            <tr class="bg-white border-b hover:bg-gray-50">
                <td class="px-6 py-4">
                    2
                </td>
                <td class="px-6 py-4 font-medium text-gray-900">
                    Es Teh Manis
                </td>
                <td class="px-6 py-4">
                    Rp 5.000
                </td>
                <td class="px-6 py-4">
                    Minuman
                </td>
                <td class="px-6 py-4">
                    2024-03-20 10:00:00
                </td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                        <button class="font-medium text-blue-600 hover:underline">Edit</button>
                        <button class="font-medium text-red-600 hover:underline">Hapus</button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="flex items-center justify-between pt-4">
        <div class="text-sm text-gray-700">
            Showing <span class="font-medium">1</span> to <span class="font-medium">10</span> of <span class="font-medium">20</span> results
        </div>
        <div class="flex gap-2">
            <button class="px-3 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                Previous
            </button>
            <button class="px-3 py-1 text-sm font-medium text-white bg-blue-600 border border-blue-600 rounded-lg hover:bg-blue-700">
                Next
            </button>
        </div>
    </div>
</div>
