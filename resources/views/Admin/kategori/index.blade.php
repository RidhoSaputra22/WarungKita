<x-admin-app>
    <section>
        <div class="pb-3">
            <a href="{{ route('kategori.create') }}" class="px-3 py-1 border rounded shadow-xl">Tambah Data</a>
            <a href="/print/kategori" class="px-3 py-1 border rounded shadow-xl">Print Data</a>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama Menu
                        </th>


                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr class="text-black border ">
                            <th scope="row" class="px-6 py-4 ">
                                {{ $data['kategori_222339'] }}
                            </th>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('kategori.show', $data['kategori_222339']) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Show</a>
                                <form method="POST" action="{{ route('kategori.destroy', $data['kategori_222339']) }}">
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
