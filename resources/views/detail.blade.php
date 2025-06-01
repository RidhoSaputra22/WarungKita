<x-app>
    <x-navbar></x-navbar>
    @if (session('error'))
        <div class="h-14 bg-red-500 p-3">
            <p class="text-2xl">{{ session('error') }}</p>
        </div>
    @endif

    <section id="about" class=" bg-contain lg:flex lg:justify-center bg-gray-100">
        <div class="h-full flex flex-col lg:flex-row  lg:my-10 lg:mx-24">
            <div class="h-full lg:w-3/5 lg:border lg:border-gray-300 lg:rounded-lg lg:shadow">
                <div class="h-full">
                    <div class="h-64  w-full bg-no-repeat bg-cover py-3  lg:rounded-t-lg"
                        style=" background-image: url('{{ URL::asset($data['foto_222339']) }}'); ">
                    </div>
                    <div class="px-5 lg:px-10 py-8  w-full bg-white">
                        <h1 class="text-4xl font-semibold">{{ $data['nama_222339'] }}</h1>
                        <p class="text-sm text-justify text-gray-900 lg:text-lg mt-4">Lorem ipsum dolor sit amet
                            consectetur,
                            adipisicing elit. Dolore amet quo sit
                            in corporis dicta totam, iste et dolores vero mollitia aspernatur debitis hic praesentium
                            commodi earum ex quidem numquam odio id! Enim expedita sit possimus amet sed officia,
                            dolores,
                            placeat suscipit maxime, nobis dolorum explicabo quisquam saepe a! Numquam!
                        </p>
                        <p class="text-2xl mt-4">Rp. {{ number_format($data['harga_222339']) }}</p>
                        <p class="text-lg mt-4">Qty. {{ $data['stok_222339'] }}</p>
                        <div class="my-5">
                            <a href="/AddToCart/{{ $data['nama_222339'] }}">
                                <div class=" w-fit bg-red-900 text-white px-4 py-2  ">Beli Sekarang</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <section
                class="bg-white mx-5 flex-1 w-auto overflow-auto lg:border lg:border-gray-300 lg:rounded-lg lg:shadow lg:px-6 lg:py-4  lg:mx-10 mt-10 lg:mt-0 "
                id="komentar">
                <div>
                    <h1 class="text-2xl lg:text-4xl mb-3 lg:mb-9">Komentar</h1>
                </div>
                <div class=" overflow-auto">
                    @forelse ($komentarKu as $data)
                        <div class=" mt-2  space-y-3">
                            <div class="flex gap-3">
                                <div class="h-14 aspect-square  bg-center bg-cover bg-no-repeat rounded-circle"
                                    style="background-image: url('{{ URL::asset(Auth::user()['foto_222339']) }}')">
                                </div>
                                <div class="">
                                    <div class="leading-none text-sm">{{ Auth::user()['username_222339'] }}</div>
                                    <div class="leading-none text-xl">{{ Auth::user()['nama_222339'] }}</div>
                                </div>
                            </div>
                            <div class="flex w-full gap-3">
                                <form class="flex w-full gap-3"
                                    action="{{ route('komentar.update', $data['id_komentar_222339']) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <textarea name="komentar" class="text-lg w-full h-auto border-2  shadow px-3 py-1">{{ $data['komentar_222339'] }}</textarea>
                                    <div class="">
                                        <button type="submit" class="px-3 py-1 bg-red-900 text-white">Edit</button>
                                    </div>
                                </form>
                                <form action="{{ route('komentar.destroy', $data['id_komentar_222339']) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-2 text-white py-1 bg-red-900">Hapus</button>
                                </form>
                            </div>


                        </div>
                    @empty
                        @if (Auth::check())
                            <div class=" mt-2  space-y-3">
                                <div class="flex gap-3">
                                    <div class="h-14 aspect-square  bg-center bg-cover bg-no-repeat rounded-circle"
                                        style="background-image: url('{{ URL::asset(Auth::user()['foto_222339']) }}')">
                                    </div>
                                    <div class="">
                                        <div class="leading-none text-sm">{{ Auth::user()['username_222339'] }}</div>
                                        <div class="leading-none text-xl">{{ Auth::user()['nama_222339'] }}</div>
                                    </div>
                                </div>
                                <div class="flex w-full gap-3">
                                    <form class="flex w-full gap-3" action="{{ route('komentar.store') }}"
                                        method="POST">
                                        @csrf
                                        <input type="text" name="menu" id=""
                                            value="{{ $data['nama_222339'] }}" hidden>
                                        <textarea name="komentar" class="text-lg w-full h-auto border-2  shadow px-3 py-1">{{ $data['komentar_222339'] }}</textarea>
                                        <div class="">
                                            <button type="submit"
                                                class="px-3 py-1 bg-red-900 text-white shadow-lg">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="m-5 pl-5 py-3 bg-red-900 text-white text-sm lg:text-lg">
                                <h1>Anda harus Login untuk membuat komentar</h1>
                            </div>
                        @endif
                    @endforelse

                    @forelse ($komentar as $data)
                        <div class=" mt-14  space-y-3">
                            <div class="flex gap-3">
                                <div class="h-14 aspect-square  bg-center bg-cover bg-no-repeat rounded-circle"
                                    style="background-image: url('{{ URL::asset($data->user['foto_222339']) }}')">
                                </div>
                                <div class="">
                                    <div class="leading-none text-sm">{{ $data->user['nama_222339'] }}</div>
                                    <div class="leading-none text-xl">{{ $data->user['username_222339'] }}</div>
                                </div>
                            </div>
                            <div class="flex w-full gap-3">
                                <div class="flex w-full gap-3" action="{{ route('komentar.store') }}" method="POST">
                                    <textarea name="komentar" class="text-lg w-full h-auto border-2  shadow px-3 py-1" readonly>{{ $data['komentar_222339'] }}</textarea>

                                </div>
                            </div>
                        </div>
                        <div class=" mt-14  space-y-3">
                            <div class="flex gap-3">
                                <div class="h-14 aspect-square  bg-center bg-cover bg-no-repeat rounded-circle"
                                    style="background-image: url('{{ URL::asset($data->user['foto_222339']) }}')">
                                </div>
                                <div class="">
                                    <div class="leading-none text-sm">{{ $data->user['nama_222339'] }}</div>
                                    <div class="leading-none text-xl">{{ $data->user['username_222339'] }}</div>
                                </div>
                            </div>
                            <div class="flex w-full gap-3">
                                <div class="flex w-full gap-3" action="{{ route('komentar.store') }}" method="POST">
                                    <textarea name="komentar" class="text-lg w-full h-auto border-2  shadow px-3 py-1" readonly>{{ $data['komentar_222339'] }}</textarea>

                                </div>
                            </div>
                        </div>
                        <div class=" mt-14  space-y-3">
                            <div class="flex gap-3">
                                <div class="h-14 aspect-square  bg-center bg-cover bg-no-repeat rounded-circle"
                                    style="background-image: url('{{ URL::asset($data->user['foto_222339']) }}')">
                                </div>
                                <div class="">
                                    <div class="leading-none text-sm">{{ $data->user['nama_222339'] }}</div>
                                    <div class="leading-none text-xl">{{ $data->user['username_222339'] }}</div>
                                </div>
                            </div>
                            <div class="flex w-full gap-3">
                                <div class="flex w-full gap-3" action="{{ route('komentar.store') }}" method="POST">
                                    <textarea name="komentar" class="text-lg w-full h-auto border-2  shadow px-3 py-1" readonly>{{ $data['komentar_222339'] }}</textarea>

                                </div>
                            </div>
                        </div>
                    @empty
                        <h1 class="py-5">Belum ada komentar</h1>
                    @endforelse


                </div>

            </section>
        </div>

    </section>
</x-app>
