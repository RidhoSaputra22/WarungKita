<x-admin-app>
    <div>
        <a href="{{route('pelanggan.index')}}" class="bg-slate-950 text-white px-2 py-3  ">Kembali</a>
    </div>
    <form action="{{ route('pelanggan.update', $data['id_user_222339']) }}" method="POST" class="py-5 flex " enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="w-full">
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm  ">Nama Menu</h1>
                <input name="nama" value="{{ $data['nama_222339'] }}" class="rounded w-full border p-2">
            </div>
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm">Alamat</h1>
                <input name="alamat" value="{{ $data['alamat_222339'] }}" class="rounded w-full border p-2">
            </div>
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm">Hp</h1>
                <input name="hp" value="{{ $data['hp_222339'] }}" class="rounded w-full border p-2">
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
