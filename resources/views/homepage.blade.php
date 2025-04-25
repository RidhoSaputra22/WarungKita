<x-app>
    <div class="h-screen w-full bg-no-repeat bg-cover bg-center"
        style="background-image: url('{{ URL::asset('image/banner.jpg') }}')">
        <div class="h-full w-full backdrop-brightness-[36%] text-white ">
            <x-navbar></x-navbar>
            <div class="flex flex-col lg:flex-row  justify-center lg:justify-left text-center lg:text-left w-full">
                <div class="px-8 py-14 md:py-36 md:px-24 w-full flex flex-col gap-6">
                    <div class=" text-4xl md:text-8xl font-semibold ">Warung Kita</div>
                    <p class="text-sm sm:text-xl font-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem
                        eius, vero dolorem deleniti fugiat autem eligendi eum natus ullam at. Lorem ipsum dolor sit amet
                        consectetur adipisicing elit</p>
                    <div class="flex flex-col md:flex-row justify-center w-full lg:justify-start  sm:gap-5 pt-2">
                        <a href="#produk-unggulan"><span class="w-full block md:w-auto rounded-sm px-4 py-2 mt-3 bg-red-800 ">Pesan
                                Sekarang</span></a>
                        <a href="#produk-unggulan"><span class="w-full block md:w-auto rounded-sm border px-4 py-2 mt-3 ">Lihat Menu</span></a>
                    </div>
                </div>
                <div class="w-1/2">

                </div>
            </div>
        </div>

    </div>
    <section id="menu" class=" sm:px-10 h-auto ">
        <section id="produk-unggulan" class="min-h-screen">
            <div class="sm:pt-14">
                <p class="text-2xl lg:text-4xl  font-semibold flex justify-center lg:justify-start my-14 pb-7 border-black border-b-2  ">Menu Unggulan</p>

            </div>
            <div class="mx-4 lg:mx-10 ">
                <div class="min-h-96 ">
                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 min-h-96 gap-5 lg:gap-14">
                        @foreach ($datas as $data)
                            <a href="/detail/{{ $data['222339_id_menu'] }}" class="">
                                <div class="  shadow-lg w-full h-[300px] bg-bottom bg-cover bg-no-repeat  rounded flex flex-col justify-end rounded-xl"
                                    style="background-image: url('{{ URL::asset($data['222339_foto']) }}');">
                                    <div class="py-5 px-6 h-40 rounded-t-xl rounded-b bg-white p-3 flex flex-col">
                                        <div class="flex justify-between">
                                            <span class="text-sm">{{ $data['222339_stok'] }} tersisa</span>
                                            <span class="text-sm px-4 py-1 bg-red-900 text-white rounded-sm">{{ $data->kategori['222339_kategori'] }}</span>
                                        </div>
                                        <span class="text-2xl font-semibold">{{ $data['222339_nama'] }}</span>
                                        <span
                                            class="text-sm font-light">{{ Str::limit($data['222339_deskripsi'], 70) }}</span>
                                        <span class="text-lg">Rp. {{ number_format($data['222339_harga']) }}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="my-14 w-full lg:w-fit text-center bg-red-900 py-4 text-white">
                        <a href="/menu" >
                            <span class=" px-10 py-2 my-5 w-full">
                                Lihat Selengkapnya . . .

                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </section>


    <section class="h-full  bg-red-900 flex flex-col lg:flex-row">
        <div class="h-[70vh] sm:h-[50vh] lg:h-screen w-full bg-cover bg-center" style="background-image: url('{{ URL::asset('image/imagelogin.jpg') }}')">
        </div>
        <div class="w-auto text-white m-9 md:m-10 lg:m-20">
            <h1 class="text-3xl lg:text-8xl font-semibold">Rasa Bintang Lima, Harga Kaki Lima</h1>
            <p class="text-6x1 mt-4">
                mau makan enak rasa resto bintang lima, tapi dompet lagi tipis?
                Cobain menu di WarungKita yang ngga cuman nikmat, tapi juga murah
            </p>
            <div class="mt-5">

                <a href="/menu" class="border px-4 py-2 ">Coba Sekarang!</a>
            </div>
        </div>

    </section>


    <section id="experience" class="sm:px-10 min-h-screen ">
        <div class="sm:pt-14">
            <p class="text-2xl lg:text-4xl  font-semibold flex justify-center lg:justify-start mb-5 mt-14 pb-7 border-black border-b-2  ">Penilaian Pelanggan</p>

        </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3  gap-5 lg:gap-10 p-5 ">
                <div class=" rounded h-96   border border-black w-full">
                    <div class="p-6 flex justify-center ">
                        <div>
                            <div class="h-24 w-24 rounded-full bg-cover"
                                style="background-image: url('{{ URL::asset('image/user/fiqri.JPG') }}')"></div>
                            <div class="flex justify-center text-lg font-semibold">Fiqri</div>
                        </div>
                    </div>
                    <div class="text-center mx-3">
                        <p><strong>WarungKita</strong> benar-benar memenuhi ekspektasi saya. Rasa makanannya enak
                            banget,
                            dan yang paling penting harganya sangat terjangkau. Favorit saya adalah nasi gorengnya,
                            porsi besar dengan harga yang ramah di kantong!</p>
                    </div>
                </div>
                <div class=" rounded h-96   border border-black w-full">
                    <div class="p-6 flex justify-center ">
                        <div>
                            <div class="h-24 w-24 rounded-full bg-cover"
                                style="background-image: url('{{ URL::asset('image/user/jeff.JPG') }}')"></div>
                            <div class="flex justify-center text-lg font-semibold">Jeff</div>
                        </div>
                    </div>
                    <div class="text-center mx-3">
                        <p>Datang ke <strong>WarungKita</strong> saat jam makan siang, meskipun ramai, pelayanannya
                            terstruktur dengan baik. Plus, makanannya datang tepat waktu dan rasanya luar biasa.
                            Recommended banget untuk yang ingin makan cepat dan enak!</p>
                    </div>
                </div>
                <div class=" rounded h-96   border border-black w-full md:px-14 md:py-9 md:col-span-2 lg:px-0 lg:py-0 lg:col-span-1">
                    <div class="p-6 flex justify-center ">
                        <div>
                            <div class="h-24 w-24 rounded-full bg-cover"
                                style="background-image: url('{{ URL::asset('image/user/firman.JPG') }}')"></div>
                            <div class="flex justify-center text-lg font-semibold">Firman</div>
                        </div>
                    </div>
                    <div class="text-center mx-3">
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
