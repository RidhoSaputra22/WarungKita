<x-admin-app>
    <section>
        <div class="pb-3">
            <a href="/print/order" class="px-3 py-1 border rounded shadow-xl">Print Data</a>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)

                    <tr class=" border text-black">
                        <th scope="row" class="px-6 py-4  ">
                            {{ $data->menu['222339_nama'] }}
                        </th>
                        <th scope="row" class="px-6 py-4  ">
                            {{ $data->pelanggan['222339_nama'] }}
                        </th>
                        <th scope="row" class="px-6 py-4  ">
                            {{ number_format($data['222339_jumlah']) }}
                        </th>
                        <th scope="row" class="px-6 py-4  ">
                            Rp. {{ number_format($data['222339_total']) }}
                        </th>
                        <th scope="row" class="px-6 py-4  ">
                            {{ $data['222339_status'] }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $data['222339_tanggal'] }}

                        </td>
                        <td class="px-6 py-4 text-right">
                            <form method="POST" action="{{ route('order.update', $data['222339_id_carts']) }}">
                                @csrf
                                @method('PUT')
                                <button>Konfirmasi</button>
                            </form>
                            <form method="POST" action="{{ route('order.destroy', $data['222339_id_carts']) }}">
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

    </section>
</x-admin-app>
