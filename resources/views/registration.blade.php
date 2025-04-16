<x-app>
    <section class="h-screen bg-cover " style="background-image: url('{{ URL::asset('image/pattern.jpg') }}')">
        <div class="h-screen flex flex-col justify-center items-center ">
            <div class="w-[1000px] h-auto rounded-xl flex shadow-xl">
                <div class="w-full bg-cover" style="background-image: url('{{ URL::asset('image/bento.jpg') }}');">

                </div>
                <div class="p-10 w-full grow flex flex-col bg-white">
                    <div class="text-2xl font-semibold flex justify-center">Register</div>
                    <form method="POST" action="{{route('register.custom')}}" class="flex flex-col gap-5 pt-9">
                        @csrf
                        <div>
                            <h1>Nama</h1>
                            <input type="text" name="nama" class="mt-1 border rounded border-black p-2 w-full">
                        </div>
                        <div class="flex gap-2">
                            <div class="grow">
                                <h1>Alamat</h1>
                                <input type="text" name="alamat" class="mt-1 border rounded border-black p-2 w-full">
                            </div>
                            <div class="">
                                <h1>No Hp</h1>
                                <input type="text" name="hp" class="mt-1 border rounded border-black p-2 w-full">
                            </div>

                        </div>
                        <div class="">
                            <h1>Username</h1>
                            <input type="text" name="username" class="mt-1 border rounded border-black p-2 w-full">
                        </div>
                        <div class="">
                                <h1>Password</h1>
                                <input type="password" name="password" class="mt-1 border rounded border-black p-2 w-full">
                            </div>


                        <div>
                            <button type="submit" class="p-2 rounded px-4 border" >Register</b>

                        </div>
                    </form>
                </div>

            </div>
        </div>

    </section>
</x-app>
