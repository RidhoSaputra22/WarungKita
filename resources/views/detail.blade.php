<x-app>
    <x-navbar></x-navbar>
    <section id="about" class="min-h-screen pt-24 bg-contain">
        <div class="mx-10">
            <div class="flex">
                <div class="h-96 w-1/2 bg-no-repeat bg-cover py-3  "
                    style="background-image: url('{{ URL::asset($data['222339_foto']) }}');">
                </div>
                <div class="px-10 w-full bg-white">
                    <h1 class="text-4xl font-semibold">{{ $data['222339_nama'] }}</h1>
                    <p class="text-lg mt-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolore amet quo sit
                        in corporis dicta totam, iste et dolores vero mollitia aspernatur debitis hic praesentium
                        commodi earum ex quidem numquam odio id! Enim expedita sit possimus amet sed officia, dolores,
                        placeat suscipit maxime, nobis dolorum explicabo quisquam saepe a! Numquam!
                    </p>
                    <p class="text-lg mt-4">Rp. {{ number_format($data['222339_harga']) }}</p>
                    <p class="text-lg mt-4">Qty. {{ $data['222339_stok'] }}</p>

                    <div class="mt-5">

                        <a href="/AddToCart/{{ $data['222339_id_menu'] }}" class="border px-4 py-2  ">Beli Sekarang</a>
                    </div>



                </div>
            </div>
        </div>

        <section class="m-10    ">
            <div>
                <h1 class="text-2xl">Komentar</h1>
                <hr>
            </div>
            @forelse ($komentarKu as $data)
                <div class="flex mt-2 border-b-2">
                    <div class="h-24 w-24 m-3 bg-center bg-cover bg-no-repeat rounded-circle"
                        style="background-image: url('{{ URL::asset($data->user['foto_222339']) }}')"></div>
                    <form class="py-3 grow" action="{{ route('komentar.update', $data['222339_id_komentar']) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="text-2xl uppercase mb-1">{{ $data->user['nama_222339'] }}</div>
                        <textarea name="komentar" class="text-lg w-full h-32 border p-3">{{ $data['222339_komentar'] }}</textarea>
                        <div class="flex gap-2 pt-2">
                            <button type="submit" class="px-2 py-1 bg-green-300">Edit</button>
                            <form action="{{ route('komentar.destroy', $data['222339_id_komentar']) }}">
                                @csrf
                                @method('DELETE')
                                <button class="px-2 py-1 bg-red-300">Hapus</button>

                            </form>
                        </div>
                    </form>
                </div>
            @empty
                @if (Auth::check())
                    <div class="flex mt-2 border-b-2">
                        <div class="h-24 w-24 m-3 bg-center bg-cover bg-no-repeat rounded-circle"
                            style="background-image: url('{{ URL::asset(Auth::user()['foto_222339']) }}')"></div>
                        <form class="py-3 grow" action="{{ route('komentar.store') }}" method="POST">
                            @csrf
                            <div class="text-2xl uppercase mb-1">{{ Auth::user()['nama_222339'] }}</div>
                            <textarea name="komentar" class="text-lg w-full h-32 border p-3">Buat Komentar Anda ..</textarea>
                            <input type="hidden" name="menu" value="{{ $data['222339_id_menu'] }}" id="">
                            <div class="flex gap-2 pt-2">
                                <button type="submit" class="px-2 py-1 bg-green-300">Submit</button>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="m-5 p-3 bg-red-400">
                        <h1>Anda harus Login untuk membuat komentar</h1>
                    </div>
                @endif
            @endforelse

            <hr>
            @forelse ($komentar as $data)
                <div class="flex mt-2 border-b-2">
                    <div class="h-24 w-24 m-3 bg-center bg-cover bg-no-repeat rounded-circle"
                        style="background-image: url('{{ URL::asset($data->user['foto_222339']) }}')"></div>
                    <form class="py-3 grow" action="{{ route('komentar.update', $data['222339_id_komentar']) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="text-2xl uppercase mb-1">{{ $data->user['nama_222339'] }}</div>
                        <div name="komentar" class="text-lg w-full h-14 ">{{ $data['222339_komentar'] }}</div>
                    </form>
                </div>
            @empty
                <h1>Tak ada data</h1>
            @endforelse


        </section>

    </section>
    <x-footter></x-footter>
</x-app>
