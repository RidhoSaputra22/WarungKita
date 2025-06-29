<x-app>
    <div class="w-full h-screen bg-center bg-no-repeat bg-cover"
        style="background-image: url('{{ URL::asset('image/banner.jpg') }}')">
        <div class="h-full w-full backdrop-brightness-[36%] text-white ">
            <x-navbar></x-navbar>
            <div class="flex flex-col justify-center w-full text-center lg:flex-row lg:justify-left lg:text-left">
                <div class="flex flex-col w-full gap-6 px-8 py-14 md:py-36 md:px-24">
                    <div class="text-4xl font-semibold  md:text-8xl">Warung Kita</div>
                    <p class="text-sm font-light sm:text-xl">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Voluptatem
                        eius, vero dolorem deleniti fugiat autem eligendi eum natus ullam at. Lorem ipsum dolor sit amet
                        consectetur adipisicing elit</p>
                    <div class="flex flex-col justify-center w-full pt-2 md:flex-row lg:justify-start sm:gap-5">
                        <a href="#produk-unggulan"><span
                                class="block w-full px-4 py-2 mt-3 bg-red-800 rounded-sm md:w-auto ">Pesan
                                Sekarang</span></a>
                        <a href="#produk-unggulan"><span
                                class="block w-full px-4 py-2 mt-3 border rounded-sm md:w-auto ">Lihat Menu</span></a>
                    </div>
                </div>
                <div class="w-1/2">

                </div>
            </div>
        </div>

    </div>
    <section id="menu" class="h-auto  sm:px-10">
        <section id="produk-unggulan" class="min-h-screen">
            <div class="sm:pt-14">
                <p
                    class="flex justify-center text-2xl font-semibold border-b-2 border-black lg:text-4xl lg:justify-start my-14 pb-7 ">
                    Menu Unggulan</p>

            </div>
            <div class="mx-4 lg:mx-10 ">
                <div class="min-h-96 ">
                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-3 min-h-96 lg:gap-14">
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
                                        <span
                                            class="text-sm font-light">{{ Str::limit($data['deskripsi_222339'], 70) }}</span>
                                        <span class="text-lg">Rp. {{ number_format($data['harga_222339']) }}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="w-full py-4 text-center text-white bg-red-900 my-14 lg:w-fit">
                        <a href="/menu">
                            <span class="w-full px-10 py-2 my-5 ">
                                Lihat Selengkapnya . . .

                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </section>


    <section class="flex flex-col h-full bg-red-900 lg:flex-row">
        <div class="h-[70vh] sm:h-[50vh] lg:h-screen w-full bg-cover bg-center"
            style="background-image: url('{{ URL::asset('image/imagelogin.jpg') }}')">
        </div>
        <div class="w-auto text-white m-9 md:m-10 lg:m-20">
            <h1 class="text-3xl font-semibold lg:text-8xl">Rasa Bintang Lima, Harga Kaki Lima</h1>
            <p class="mt-4 text-6x1">
                mau makan enak rasa resto bintang lima, tapi dompet lagi tipis?
                Cobain menu di WarungKita yang ngga cuman nikmat, tapi juga murah
            </p>
            <div class="mt-5">

                <a href="/menu" class="px-4 py-2 border ">Coba Sekarang!</a>
            </div>
        </div>

    </section>


    <section id="experience" class="min-h-screen sm:px-10 ">
        <div class="sm:pt-14">
            <p
                class="flex justify-center mb-5 text-2xl font-semibold border-b-2 border-black lg:text-4xl lg:justify-start mt-14 pb-7 ">
                Penilaian Pelanggan</p>

        </div>
        <div class="grid grid-cols-1 gap-5 p-5 md:grid-cols-2 lg:grid-cols-3 lg:gap-10 ">
            <div class="w-full border border-black rounded  h-96">
                <div class="flex justify-center p-6 ">
                    <div>
                        <div class="w-24 h-24 bg-cover rounded-full"
                            style="background-image: url('{{ URL::asset('image/user/fiqri.JPG') }}')"></div>
                        <div class="flex justify-center text-lg font-semibold">Fiqri</div>
                    </div>
                </div>
                <div class="mx-3 text-center">
                    <p><strong>WarungKita</strong> benar-benar memenuhi ekspektasi saya. Rasa makanannya enak
                        banget,
                        dan yang paling penting harganya sangat terjangkau. Favorit saya adalah nasi gorengnya,
                        porsi besar dengan harga yang ramah di kantong!</p>
                </div>
            </div>
            <div class="w-full border border-black rounded  h-96">
                <div class="flex justify-center p-6 ">
                    <div>
                        <div class="w-24 h-24 bg-cover rounded-full"
                            style="background-image: url('{{ URL::asset('image/user/jeff.JPG') }}')"></div>
                        <div class="flex justify-center text-lg font-semibold">Jeff</div>
                    </div>
                </div>
                <div class="mx-3 text-center">
                    <p>Datang ke <strong>WarungKita</strong> saat jam makan siang, meskipun ramai, pelayanannya
                        terstruktur dengan baik. Plus, makanannya datang tepat waktu dan rasanya luar biasa.
                        Recommended banget untuk yang ingin makan cepat dan enak!</p>
                </div>
            </div>
            <div
                class="w-full border border-black rounded  h-96 md:px-14 md:py-9 md:col-span-2 lg:px-0 lg:py-0 lg:col-span-1">
                <div class="flex justify-center p-6 ">
                    <div>
                        <div class="w-24 h-24 bg-cover rounded-full"
                            style="background-image: url('{{ URL::asset('image/user/firman.JPG') }}')"></div>
                        <div class="flex justify-center text-lg font-semibold">Firman</div>
                    </div>
                </div>
                <div class="mx-3 text-center">
                    <p>Suka banget sama suasana di <strong>WarungKita</strong>. Tempatnya cozy, cocok buat makan
                        bareng
                        teman atau keluarga. Ditambah lagi, makanannya enak dan variatif, rasanya pas di lidah!
                </div>
            </div>
        </div>
        </div>
    </section>

    <x-footter></x-footter>
</x-app>
