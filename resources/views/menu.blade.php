<x-app>
    <x-navbar></x-navbar>

    <section class="">
        <div class="h-96 flex items-center w-full bg-no-repeat bg-cover bg-center "
            style="background-image: url('{{ URL::asset('image/bento.jpg') }}')">
            <div
                class="h-full w-full backdrop-brightness-50 text-white flex flex-col text-center bg-center justify-center items-center">
                <h1 class="text-3xl w-1/2 font-semibold">"Rasa adalah bagian dari pengalaman hidup; kita tidak hanya
                    makan untuk mengisi perut, tetapi juga untuk merasakan kebahagiaan."</h1>
                <p class="text-2xl font-regural italic mt-2">'Gordon Ramsay'</p>
            </div>
        </div>
    </section>
    <section class="flex h-auto my-14 mx-14">
        <div class="w-64 h-full ">
            <div>
                <p class="text-4xl font-semibold">Kategori</p>
            </div>
            <div class="p-3 mt-3">
                <ul class="flex flex-col gap-3 font-semibold">
                    @foreach ($kategori as $data )

                        <a href="?kategori={{ $data['222339_id_kategori']}}">{{ $data['kategori'] }}</a>

                    @endforeach

                </ul>
            </div>
        </div>
        <div class=" h-full w-full ">
            <form class="h-14 bg-white flex justify-center ">
                <input type="text" name="search" class="p-4 w-full mx-32 rounded m-2 border-yellow border" placeholder="Cari Menu...">
            </form>
            <div class="grid grid-cols-3 h-96 gap-2 m-14 w-full h-full  ">
                    @forelse ($datas as $data)
                        <x-card id="{{$data['222339_id_menu']}}" nama="{{$data['222339_nama']}}" harga="{{$data['222339_harga']}}" image="{{$data['222339_foto']}}"></x-card>

                    @empty
                        <h1>Tak ada data</h1>
                    @endforelse

                </div>
        </div>

    </section>

    <x-footter></x-footter>
</x-app>
