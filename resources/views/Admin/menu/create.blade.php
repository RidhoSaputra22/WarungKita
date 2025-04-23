<x-admin-app>
    <div>
        <a href="{{route('menu.index')}}" class="bg-lime-950 text-white px-2 py-3 ">Kembali</a>
    </div>
    <form action="{{ route('menu.store') }}" method="POST" class="py-5 flex " enctype="multipart/form-data">
        @csrf
        <div class="w-full">
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm  ">Nama Menu</h1>
                <input name="nama" class="rounded w-full border p-2">
            </div>
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm">Harga</h1>
                <input type="number" name="harga" class="rounded w-full border p-2">
            </div>
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm">Stok</h1>
                <input name="stok" class="rounded w-full border p-2">
            </div>
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm">Kategori</h1>
                <select name="kategori" id="" class="w-full px-2 py-3 border">
                    @foreach ($kategori as $k )
                        <option value="{{$k['222339_id_kategori']}}">{{ $k['kategori'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm">Foto</h1>
                <input type="file" name="file" class="rounded w-full border p-2">
            </div>

            <div>
                <button class="bg-lime-950 text-white px-3 py-2 rounded my-3">
                    Submit
                </button>
            </div>
        </div>
        <div class="w-full bg-lime-50">

        </div>

    </form>

</x-admin-app>
