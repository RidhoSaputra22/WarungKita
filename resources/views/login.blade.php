<x-app>
    <section class="h-screen bg-cover "
        style="background-image: url('{{ URL::asset('image/banner.jpg') }}')">
        @if(session('error'))
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                role="alert">
                <span class="font-medium">Error:</span> {{ session('error') }}
            </div>
        @endif
        <div class="p-10 md:p-32 h-screen flex flex-col justify-center items-center ">
            <div class=" w-full xl:w-[950px] xl:h-[500px] rounded-xl flex shadow-xl">
                <div class="p-10 w-full grow flex flex-col bg-white rounded-xl">
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
                            <button type="submit" class="p-2 rounded px-4 border bg-red-900 text-white" href="bayar.php">Submit</b>

                        </div>
                    </form>
                </div>

            </div>
        </div>

    </section>
</x-app>
