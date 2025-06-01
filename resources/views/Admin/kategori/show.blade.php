<x-admin-app>
    <form action="{{ route('kategori.update', $datas['kategori_222339']) }}" method="POST" class="flex py-5 ">
        @csrf
        @method('PUT')
        <div class="w-full">
            <div class="w-full h-auto mb-2">
                <h1 class="text-sm ">Nama kategori</h1>
                <input name="kategori" value="{{ $datas['kategori_222339'] }}" class="w-full p-2 border rounded">
            </div>
            <div>
                <button class="px-3 py-2 my-3 text-white rounded bg-lime-950">
                    Submit
                </button>
            </div>
        </div>


    </form>

</x-admin-app>
