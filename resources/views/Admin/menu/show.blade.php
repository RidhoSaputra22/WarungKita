<x-admin-app>

    <form action="{{ route('menu.update', $data['id_menu_222339']) }}" method="POST" class="py-5 flex " enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="w-full">
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm  ">Nama Menu</h1>
                <input name="nama" value="{{ $data['nama_222339'] }}" class="rounded w-full border p-2">
            </div>
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm">Harga</h1>
                <input name="harga" value="{{ $data['harga_222339'] }}" class="rounded w-full border p-2">
            </div>
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm">Stok</h1>
                <input type="number" name="stok"  value="{{ $data['stok_222339'] }}"  class="rounded w-full border p-2">
            </div>
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm">Kategori</h1>
                <select name="kategori" id="" class="w-full px-2 py-3 border">
                    @foreach ($kategori as $k )
                        <option value="{{$k['id_kategori_222339']}}" {{ ($k['id_kategori_222339'] == $data['id_kategori_222339']) ? 'selected' : '' }} >{{ $k['kategori'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm">Foto</h1>
                <input type="file" name="file" class="rounded w-full border p-2">
            </div>

            <div>
                <button class="bg-slate-950 text-white px-3 py-2 rounded my-3">
                    Submit
                </button>
            </div>
        </div>
        <div class="w-full bg-contain bg-no-repeat bg-center " style="background-image: url('{{ URL::asset($data['foto_222339']) }}');">

        </div>

    </form>

</x-admin-app>
