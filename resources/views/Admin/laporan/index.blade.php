<x-admin-app>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laporan Penjualan</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    </head>

    <body class="bg-gray-100">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Laporan Metrik Penjualan</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Jumlah Produk Terjual -->
                <div class="bg-white rounded-lg shadow-md p-6 flex items-center">
                    <div class="rounded-full bg-blue-100 p-3 mr-4">
                        <i class="fas fa-box text-blue-600 text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 mb-1">Produk Terjual</h3>
                        <p>{{$datas['pesanan_selesai']}}</p>
                    </div>
                </div>

                <!-- Jumlah Pelanggan -->
                <div class="bg-white rounded-lg shadow-md p-6 flex items-center">
                    <div class="rounded-full bg-green-100 p-3 mr-4">
                        <i class="fas fa-users text-green-600 text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 mb-1">Jumlah Pelanggan</h3>
                        <p>{{$datas['pelanggan']}}</p>

                    </div>
                </div>

                <!-- Jumlah Order -->
                <div class="bg-white rounded-lg shadow-md p-6 flex items-center">
                    <div class="rounded-full bg-purple-100 p-3 mr-4">
                        <i class="fas fa-shopping-cart text-purple-600 text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 mb-1">Banyak Menu</h3>
                        <p>{{$datas['menu']}}</p>

                    </div>
                </div>

                <!-- Jumlah Registrasi -->
                <div class="bg-white rounded-lg shadow-md p-6 flex items-center">
                    <div class="rounded-full bg-yellow-100 p-3 mr-4">
                        <i class="fas fa-user-plus text-yellow-600 text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 mb-1">Pembelian Tak Terkonfirmasi</h3>
                        <p>{{$datas['pesanan_belum']}}</p>

                    </div>
                </div>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-5">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama Menu
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Pelanggan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Harga
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jumlah
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Tanggal
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total Keseluruhan
                            </th>


                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas['order'] as $data)

                        <tr class=" border text-black">
                            <th scope="row" class="px-6 py-4  ">
                                {{ $data->menu['nama_222339'] }}
                            </th>
                            <th scope="row" class="px-6 py-4  ">
                                {{ $data->pelanggan['nama_222339'] }}
                            </th>
                            <th scope="row" class="px-6 py-4  ">
                                {{ $data->menu['harga_222339'] }}
                            </th>
                            <th scope="row" class="px-6 py-4  ">
                                {{ number_format($data['jumlah_222339']) }}
                            </th>
                            <th scope="row" class="px-6 py-4  ">
                                Rp. {{ number_format($data['total_222339']) }}
                            </th>
                            <th scope="row" class="px-6 py-4  ">
                                {{ $data['status_222339'] }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $data['tanggal_222339'] }}

                            </td>
                            <th scope="row" class="px-6 py-4  ">
                                Rp. {{ number_format($data['total_222339']) }}
                            </th>
                            <td class="px-6 py-4 text-right">
                                <form method="POST" action="{{ route('order.update', $data['id_carts_222339']) }}">
                                    @csrf
                                    @method('PUT')
                                    <button class="text-blue">Konfirmasi</button>
                                </form>
                                <form method="POST" action="{{ route('order.destroy', $data['id_carts_222339']) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button>Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>



    </body>

    </html>
</x-admin-app>
