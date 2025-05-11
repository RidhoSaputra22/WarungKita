<x-admin-app>
    <section>
        <div class="pb-3">
            <a href="/print/pesanan" class="px-3 py-1 border rounded shadow-xl">Print Data</a>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Kode Pesanan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Pelanggan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Kurir
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Konfirmasi Kurir
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Konfirmasi Pelanggan
                        </th>


                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Tanggal

                            </div>
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)

                    <tr class=" border text-black">
                        <th scope="row" class="px-6 py-4  ">
                            {{ $data['kode_222339'] }}
                        </th>
                        <th scope="row" class="px-6 py-4  ">
                            {{ $data->cart[0]->pelanggan['nama_222339'] }}
                        </th>
                        <th scope="row" class="px-6 py-4  ">
                            {{ $data->driver['nama_222339'] }}
                        </th>
                        <th scope="row" class="px-6 py-4  ">
                            {{ $data['konfirmasi_driver_222339'] }}
                        </th>
                        <th scope="row" class="px-6 py-4  ">
                            {{ $data['konfirmasi_pelanggan_222339'] }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $data['created_at'] }}

                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </section>
</x-admin-app>
