<x-app>
    <section class="h-screen bg-cover "
        style="background-image: url('{{ URL::asset('image/login.jpg') }}')">
        <div class="h-screen flex flex-col justify-center items-center ">
            <div class="w-[950px] h-[500px] rounded-xl flex shadow-xl">
                <div class="h-full aspect-square bg-cover" style="background-image: url('{{ URL::asset('image/bbbbb.webp') }}');">

                </div>
                <div class="p-10 w-full grow flex flex-col bg-white">
                    <div class="text-2xl font-semibold flex justify-center">Login</div>
                    <form action="{{route('login.custom')}}" method="POST" class="flex flex-col gap-5 pt-9">
                        @csrf
                        <div>
                            <h1>Username</h1>
                            <input type="text" name="username" class="mt-1 border rounded border-black p-2 w-full">
                        </div>
                        <div>
                            <h1>Password</h1>
                            <input type="password" name="password" class="mt-1 border rounded border-black p-2 w-full">
                        </div>
                        <div>
                            <a href="/registration" class="underline">Belum pernah masuk?</a>
                        </div>

                        <div>
                            <button type="submit" class="p-2 rounded px-4 border" href="bayar.php">Submit</b>

                        </div>
                    </form>
                </div>

            </div>
        </div>

    </section>
</x-app>
