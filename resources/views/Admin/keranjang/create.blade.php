<x-admin-app>
    <div>
        <a href="{{route('pelanggan.index')}}" class="bg-lime-950 text-white px-2 py-3 ">Kembali</a>
    </div>
    <form action="{{ route('pelanggan.store') }}" method="POST" class="py-5 flex " enctype="multipart/form-data">
        @csrf
        <div class="w-full">
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm  ">Nama</h1>
                <input name="nama" class="rounded w-full border p-2">
            </div>
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm">Alamat</h1>
                <input name="alamat" class="rounded w-full border p-2">
            </div>
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm">Hp</h1>
                <input name="hp" class="rounded w-full border p-2">
            </div>
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm">Username</h1>
                <input name="username" class="rounded w-full border p-2">
            </div>
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm">Password</h1>
                <input name="password" class="rounded w-full border p-2">
            </div>


            <div>
                <button class="bg-lime-950 text-white px-3 py-2 rounded my-3">
                    Submit
                </button>
            </div>
        </div>

    </form>

</x-admin-app>
