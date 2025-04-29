<x-admin-app>
    <form action="{{ route('kategori.update', $datas['id_kategori_222339']) }}" method="POST" class="py-5 flex ">
        @csrf
        @method('PUT')
        <div class="w-full">
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm  ">Nama kategori</h1>
                <input name="kategori" value="{{ $datas['kategori_222339'] }}" class="rounded w-full border p-2">
            </div>
            <div>
                <button class="bg-lime-950 text-white px-3 py-2 rounded my-3">
                    Submit
                </button>
            </div>
        </div>


    </form>

</x-admin-app>
