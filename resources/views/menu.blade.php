<x-app>

    <section class="">
        <div class="flex items-center w-full bg-center bg-no-repeat bg-cover h-96 "
            style="background-image: url('{{ URL::asset('image/banner.jpg') }}')">
            <div class="w-full h-full text-white backdrop-brightness-50 ">
                <x-navbar></x-navbar>
                <div class="flex flex-col items-center justify-center text-center bg-center mt-14">
                    <h1 class="mx-10 font-semibold md:text-3xl xl:w-1/2">"Rasa adalah bagian dari pengalaman hidup; kita
                        tidak hanya
                        makan untuk mengisi perut, tetapi juga untuk merasakan kebahagiaan."</h1>
                    <p class="mt-2 italic md:text-2xl font-regural">'Gordon Ramsay'</p>
                </div>
            </div>
        </div>
    </section>
    <section class="flex h-auto mx-4 my-14 lg:mx-14">
        <div class="hidden w-64 h-full lg:block">
            <div>
                <h1 class="mb-4 text-2xl md:text-4xl">Kategori</h1>
            </div>
            <div class="p-3 mt-3">
                <ul class="flex flex-col gap-3 font-semibold">
                    @foreach ($kategori as $data)
                        <a href="?kategori={{ $data['id_kategori_222339'] }}">{{ $data['kategori'] }}</a>
                    @endforeach

                </ul>
            </div>
        </div>
        <div class="w-full h-full ">
            <form class="flex justify-center h-auto mb-5 bg-white ">
                <input type="text" name="search" class="w-full p-2 border border-red-900 rounded-l"
                    placeholder="Cari Menu...">
                <button type="submit"
                    class="p-2 text-white bg-red-900 border border-red-900 rounded-r lg:px-14">Cari</button>
            </form>
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-3 lg:m-10 lg:gap-10 min-h-96 ">
                @foreach ($datas as $data)
                    <a href="/detail/{{ $data['id_menu_222339'] }}" class="">
                        <div class="  shadow-lg w-full h-[300px] bg-bottom bg-cover bg-no-repeat  rounded flex flex-col justify-end rounded-xl"
                            style="background-image: url('{{ URL::asset($data['foto_222339']) }}');">
                            <div class="flex flex-col h-40 p-3 px-6 py-5 bg-white rounded-b rounded-t-xl">
                                <div class="flex justify-between">
                                    <span class="text-sm">{{ $data['stok_222339'] }} tersisa</span>
                                    <span
                                        class="px-4 py-1 text-sm text-white bg-red-900 rounded-sm">{{ $data->kategori['kategori_222339'] }}</span>
                                </div>
                                <span class="text-2xl font-semibold">{{ $data['nama_222339'] }}</span>
                                <span class="text-sm font-light">{{ Str::limit($data['deskripsi_222339'], 70) }}</span>
                                <span class="text-lg">Rp. {{ number_format($data['harga_222339']) }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

    </section>

</x-app>
