<x-app>
    <div class="h-screen w-full bg-no-repeat bg-cover bg-center"
        style="background-image: url('{{ URL::asset('image/banner.jpg') }}')">
        <div class="h-full w-full backdrop-brightness-[36%] text-white ">
            <x-navbar></x-navbar>
            <div class="flex">
                <div class="py-36 px-24 w-full flex flex-col gap-6">
                    <span class="text-8xl font-semibold ">Warung Kita</span>
                    <p class="text-lg font-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem
                        eius, vero dolorem deleniti fugiat autem eligendi eum natus ullam at. Lorem ipsum dolor sit amet
                        consectetur adipisicing elit. Optio, ea. Lorem, ipsum dolor sit amet consectetur adipisicing
                        elit. Aspernatur, odio! Lorem ipsum dolor sit amet</p>
                    <div class="flex gap-5 pt-2">
                        <a href="#produk-unggulan"><span class="rounded-sm px-4 py-2 mt-3 bg-red-800 ">Pesan
                                Sekarang</span></a>
                        <a href="#produk-unggulan"><span class="rounded-sm border px-4 py-2 mt-3 ">Lihat Menu</span></a>
                    </div>
                </div>
                <div class="w-1/2">

                </div>
            </div>
        </div>

    </div>
    <section id="about" class="px-24 h-auto bg-gray-100">
        <section id="produk-unggulan" class="h-screen">
            <div class="pt-14">
                <p class="text-4xl font-semibold flex justify-center py-14">Menu Unggulan</p>
            </div>
            <div class="flex ">
                <div class=" h-96">
                    <div class="flex h-96 gap-14">
                        @foreach ($datas as $data)
                            {{-- <a href="/detail/{{ $data->getId() }}" class="">
                                <div class="  shadow-lg w-full h-90 bg-bottom bg-cover bg-no-repeat  rounded flex flex-col justify-end "
                                    style="background-image: url('{{ Storage::url($data->getThumbnail()) }}');">
                                    <div class="h-40 rounded-t-xl rounded-b bg-white p-3 flex flex-col">
                                        <div class="flex items-center">
                                            <div class="flex text-yellow-400">
                                                {{ str_repeat('⭐', $data->getRating()) }}
                                            </div>
                                            <span class="text-gray-600 ml-2">{{ $data->getRating() / 5 }}</span>
                                        </div>
                                        <span class="text-lg font-semibold">{{ $data->getNama() }}</span>
                                        <span
                                            class="text-sm font-light">{{ Str::limit($data->getDeskripsi(), 70) }}</span>
                                        <span class="text-lg">Rp. {{ number_format($data->getHarga()) }}</span>
                                    </div>
                                </div>
                            </a> --}}
                        @endforeach
                    </div>
                    <div class="mt-14">
                        <a href="/menu" class="border px-4 py-2 mt-5">Lihat Selengkapnya . . .</a>
                    </div>
                </div>
            </div>
        </section>

    </section>


    <section class="h-screen bg-sea-green flex">
        <div class="h-full w-full bg-cover" style="background-image: url('{{ URL::asset('image/imagelogin.jpg') }}')">
        </div>
        <div class="w-full text-white  m-32">
            <h1 class="text-8xl font-semibold">Rasa Bintang Lima, Harga Kaki Lima</h1>
            <p class="text-6x1 mt-4">
                mau makan enak rasa resto bintang lima, tapi dompet lagi tipis?
                Cobain menu di RestoKu yang ngga cuman nikmat, tapi juga murah
            </p>
            <div class="mt-5">

                <a href="/menu" class="border px-4 py-2 ">Coba Sekarang!</a>
            </div>
        </div>

    </section>
    <section class="h-screen bg-linen flex">
        <div class="w-full text-white  m-32">
            <h1 class="text-8xl font-semibold">Temukan Berbagai Macam Pilihan di RestoKu!</h1>
            <p class="text-lg mt-4">
                Di <strong>RestoKu</strong>, kami bangga menyajikan berbagai macam menu yang lezat dan bervariasi,
                cocok
                untuk segala selera. Mulai dari hidangan tradisional yang otentik hingga kreasi modern yang
                inovatif,
                setiap sajian dibuat dengan bahan-bahan berkualitas dan segar.
            </p>
            <div class="mt-5">

                <a href="/menu/unggulan" class="border px-4 py-2 ">Beli Sekarang</a>
            </div>
        </div>
        <div class="h-full w-full bg-cover" style="background-image: url('{{ URL::asset('image/food.jpg') }}')">
        </div>

    </section>

    <section id="produk-unggulan" class="h-screen ">
        <div class="pt-24">
            <p class="text-4xl font-semibold flex justify-center py-14">Experience</p>
        </div>
        <div class="flex justify-center h-96">
            <div class="grid grid-cols-3 h-96 gap-24 ">
                <div class="shadow-2xl rounded h-96 w-80 ">
                    <div class="p-6 flex justify-center ">
                        <div>
                            <div class="h-24 w-24 rounded-full bg-cover"
                                style="background-image: url('{{ URL::asset('image/user/fiqri.JPG') }}')"></div>
                            <div class="flex justify-center text-lg font-semibold">Fiqri</div>
                        </div>
                    </div>
                    <div class="text-center mx-3">
                        <p><strong>RestoKu</strong> benar-benar memenuhi ekspektasi saya. Rasa makanannya enak
                            banget,
                            dan yang paling penting harganya sangat terjangkau. Favorit saya adalah nasi gorengnya,
                            porsi besar dengan harga yang ramah di kantong!</p>
                    </div>
                </div>
                <div class="shadow-2xl rounded h-96 w-80 ">
                    <div class="p-6 flex justify-center ">
                        <div>
                            <div class="h-24 w-24 rounded-full bg-cover"
                                style="background-image: url('{{ URL::asset('image/user/jeff.JPG') }}')"></div>
                            <div class="flex justify-center text-lg font-semibold">Jeff</div>
                        </div>
                    </div>
                    <div class="text-center mx-3">
                        <p>Datang ke <strong>RestoKu</strong> saat jam makan siang, meskipun ramai, pelayanannya
                            terstruktur dengan baik. Plus, makanannya datang tepat waktu dan rasanya luar biasa.
                            Recommended banget untuk yang ingin makan cepat dan enak!</p>
                    </div>
                </div>
                <div class="shadow-2xl rounded h-96 w-80 ">
                    <div class="p-6 flex justify-center ">
                        <div>
                            <div class="h-24 w-24 rounded-full bg-cover"
                                style="background-image: url('{{ URL::asset('image/user/firman.JPG') }}')"></div>
                            <div class="flex justify-center text-lg font-semibold">Firman</div>
                        </div>
                    </div>
                    <div class="text-center mx-3">
                        <p>Suka banget sama suasana di <strong>RestoKu</strong>. Tempatnya cozy, cocok buat makan
                            bareng
                            teman atau keluarga. Ditambah lagi, makanannya enak dan variatif, rasanya pas di lidah!
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-footter></x-footter>
</x-app>
