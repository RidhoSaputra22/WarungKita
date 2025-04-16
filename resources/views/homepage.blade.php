<x-app>
    <x-navbar></x-navbar>


    <div class="h-screen flex items-center w-full bg-no-repeat bg-cover "
        style="background-image: url('{{ URL::asset('image/awal.jpg') }}')">

        <div
            class="h-full w-full backdrop-brightness-50 text-white flex flex-col text-center bg-center justify-center items-center">
            <h1 class="text-9xl font-semibold">RestoKu</h1>
            <p class="text-2xl font-regural italic">Silahkan memilih</p>
            <a href="#produk-unggulan" class="border px-4 py-2 mt-3 ">Menu Unggulan</a>
        </div>
    </div>



    <section id="about" class="h-auto pt-24 bg-contain">
        <div class="mx-10">
            <p class="text-4xl font-semibold flex justify-center pb-24 bg-white">Apa itu RestoKu</p>
            <div class="flex">
                <div class="h-96 aspect-square bg-no-repeat bg-cover py-3   "
                    style="background-image: url('{{URL::asset('image/bbbbb.webp')}}');">
                </div>
                <div class="px-10 w-full bg-white">
                    <h1 class="text-4xl font-semibold">RestoKu</h1>
                    <p class="text-lg mt-4"><strong>RestoKu</strong> adalah sebuah website yang menawarkan pengalaman kuliner
                        dengan cita rasa khas indonesia yang berkualitas. Dengan suasana yang nyaman dan modern,
                        <strong>RestoKu</strong> menawarkan beragam pilihan menu yang dibuat untuk memuaskan berbagai
                        selera, mulai dari hidangan tradisional hingga kreasi fusion yang inovatif dan juga sesuai lidah orag indonesia. Setiap hidangan
                        disiapkan dengan bahan-bahan segar yang berkualitas dan teknik masak yang hati-hati untuk menjaga rasa dan
                        kualitas.
                    </p>
                    <p class="text-lg mt-4"><strong>RestoKu</strong> juga berkomitmen untuk memberikan pelayanan terbaik
                        kepada setiap pelanggan, menciptakan suasana yang ramah dan hangat, cocok untuk makan bersama
                        keluarga, teman, atau acara spesial. Apapun selera dan preferensimu, <strong>RestoKu</strong>
                        adalah tempat yang tepat untuk menikmati makanan lezat dan pengalaman bersantap yang tak
                        terlupakan.</p>


                </div>
            </div>
        </div>
        <section id="produk-unggulan" class="h-screen mx-24 ">
            <div class="pt-24">
                <p class="text-4xl font-semibold flex justify-center py-14">Menu Unggulan</p>
            </div>
            <div class="flex justify-center">
                <div class=" h-96">
                    <div class="grid grid-cols-4 h-96 gap-14">
                        @foreach ($datas as $data)
                        <x-card id="{{$data['222118_id_menu']}}" nama="{{$data['222118_nama']}}" harga="{{$data['222118_harga']}}" image="{{$data['222118_foto']}}"></x-card>

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
                Di <strong>RestoKu</strong>, kami bangga menyajikan berbagai macam menu yang lezat dan bervariasi, cocok
                untuk segala selera. Mulai dari hidangan tradisional yang otentik hingga kreasi modern yang inovatif,
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
                        <p><strong>RestoKu</strong> benar-benar memenuhi ekspektasi saya. Rasa makanannya enak banget,
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
                        <p>Suka banget sama suasana di <strong>RestoKu</strong>. Tempatnya cozy, cocok buat makan bareng
                            teman atau keluarga. Ditambah lagi, makanannya enak dan variatif, rasanya pas di lidah!
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-footter></x-footter>

</x-app>
