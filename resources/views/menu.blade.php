<x-app>

    <section class="">
        <div class="h-96 flex items-center w-full bg-no-repeat bg-cover bg-center "
        style="background-image: url('{{ URL::asset('image/banner.jpg') }}')">
        <div
        class="h-full w-full backdrop-brightness-50 text-white ">
            <x-navbar></x-navbar>
            <div class=" mt-14  flex flex-col text-center bg-center justify-center items-center">
                <h1 class="md:text-3xl mx-10  xl:w-1/2 font-semibold">"Rasa adalah bagian dari pengalaman hidup; kita
                    tidak hanya
                    makan untuk mengisi perut, tetapi juga untuk merasakan kebahagiaan."</h1>
                    <p class=" md:text-2xl font-regural italic mt-2">'Gordon Ramsay'</p>
                </div>
            </div>
        </div>
    </section>
    <section class="flex h-auto my-14 mx-4 lg:mx-14">
        <div class="w-64 h-full hidden lg:block">
            <div>
                <h1 class="text-2xl md:text-4xl mb-4">Kategori</h1>
            </div>
            <div class="p-3 mt-3">
                <ul class="flex flex-col gap-3 font-semibold">
                    @foreach ($kategori as $data)
                        <a href="?kategori={{ $data['id_kategori_222339'] }}">{{ $data['kategori'] }}</a>
                    @endforeach

                </ul>
            </div>
        </div>
        <div class=" h-full w-full ">
            <form class="h-auto bg-white flex justify-center mb-5 ">
                <input type="text" name="search" class="p-2 w-full  rounded-l  border-red-900 border"
                    placeholder="Cari Menu...">
                <button type="submit" class="p-2 lg:px-14 bg-red-900 text-white rounded-r border-red-900 border">Cari</button>
            </form>
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 lg:m-10 lg:gap-10 min-h-96 gap-5 ">
                @foreach ($datas as $data)
                    <a href="/detail/{{ $data['id_menu_222339'] }}" class="">
                        <div class="  shadow-lg w-full h-[300px] bg-bottom bg-cover bg-no-repeat  rounded flex flex-col justify-end rounded-xl"
                            style="background-image: url('{{ URL::asset($data['foto_222339']) }}');">
                            <div class="py-5 px-6 h-40 rounded-t-xl rounded-b bg-white p-3 flex flex-col">
                                <div class="flex justify-between">
                                    <span class="text-sm">{{ $data['stok_222339'] }} tersisa</span>
                                    <span class="text-sm px-4 py-1 bg-red-900 text-white rounded-sm">{{ $data->kategori['kategori_222339'] }}</span>
                                </div>
                                <span class="text-2xl font-semibold">{{ $data['nama_222339'] }}</span>
                                <span
                                    class="text-sm font-light">{{ Str::limit($data['deskripsi_222339'], 70) }}</span>
                                <span class="text-lg">Rp. {{ number_format($data['harga_222339']) }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

    </section>

    <x-footter></x-footter>
</x-app>
