<x-admin-app>
    <div>
        <a href="{{ route('pelanggan.index') }}" class="px-2 py-3 text-white bg-slate-950 ">Kembali</a>
    </div>
    <form action="{{ route('pelanggan.update', $data['username_222339']) }}" method="POST" class="flex py-5 "
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="w-full">
            <div class="w-full h-auto mb-2">
                <h1 class="text-sm ">Nama Menu</h1>
                <input name="nama" value="{{ $data['nama_222339'] }}" class="w-full p-2 border rounded">
            </div>
            <div class="w-full h-auto mb-2">
                <h1 class="text-sm ">Alamat</h1>
                <input name="alamat" value="{{ $data['alamat_222339'] }}" class="w-full p-2 border rounded">
            </div>
            <div class="w-full h-auto mb-2">
                <h1 class="text-sm ">Hp</h1>
                <input name="hp" value="{{ $data['hp_222339'] }}" class="w-full p-2 border rounded">
            </div>
            <div class="w-full h-auto mb-2">
                <h1 class="text-sm ">Role</h1>
                <select name="role" class="w-full p-2 border rounded">
                    <option value="user" {{ $data['role_222339'] == 'user' ? 'selected' : '' }}>Pelanggan</option>
                    <option value="driver" {{ $data['role_222339'] == 'driver' ? 'selected' : '' }}>Kurir</option>
                </select>
            </div>
            <div class="w-full h-auto mb-2">
                <h1 class="text-sm ">Foto</h1>
                <input type="file" name="file" class="w-full p-2 border rounded">
            </div>
            <div>
                <button class="px-3 py-2 my-3 text-white rounded bg-slate-950">
                    Submit
                </button>
            </div>
        </div>
        <div class="w-full bg-center bg-no-repeat bg-contain "
            style="background-image: url('{{ URL::asset($data['foto_222339']) }}');">

        </div>

    </form>

</x-admin-app>
