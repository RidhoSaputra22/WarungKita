<x-admin-app>
    <div>
        <a href="{{ route('menu.index') }}" class="px-2 py-3 text-white bg-lime-950 ">Kembali</a>
    </div>
    <form action="{{ route('menu.store') }}" method="POST" class="flex py-5 " enctype="multipart/form-data">
        @csrf
        <div class="w-full">
            <div class="w-full h-auto mb-2">
                <h1 class="text-sm ">Nama Menu</h1>
                <input name="nama" class="w-full p-2 border rounded">
            </div>
            <div class="w-full h-auto mb-2">
                <h1 class="text-sm ">Harga</h1>
                <input type="number" name="harga" class="w-full p-2 border rounded">
            </div>
            <div class="w-full h-auto mb-2">
                <h1 class="text-sm ">Stok</h1>
                <input name="stok" class="w-full p-2 border rounded">
            </div>
            <div class="w-full h-auto mb-2">
                <h1 class="text-sm ">Kategori</h1>
                <select name="kategori" id="" class="w-full px-2 py-3 border">
                    @foreach ($kategori as $k)
                        <option value="{{ $k['kategori_222339'] }}">{{ $k['kategori_222339'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-full h-auto mb-2">
                <h1 class="text-sm ">Foto</h1>
                <input type="file" name="file" class="w-full p-2 border rounded">
            </div>

            <div>
                <button class="px-3 py-2 my-3 text-white rounded bg-lime-950">
                    Submit
                </button>
            </div>
        </div>
        <div class="w-full bg-lime-50">

        </div>

    </form>
    <div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

</x-admin-app>
