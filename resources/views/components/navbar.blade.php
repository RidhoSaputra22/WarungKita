<div class="h-14 flex gap-3 p-4 sticky top-0 bg-white  z-50">
    <div>
        <a class="font-semibold  cursor-pointer" href="/"><strong>RestoKu</strong></a>
    </div>
    <div class="flex grow flex-row-reverse gap-5">
        <div class="flex gap-10 mr-14   ">
            <a class="hover:underline cursor-pointer" href="/riwayat"><strong>Riwayat</strong></a>
            <a class="hover:underline cursor-pointer" href="/"><strong>Home</strong></a>
            <a class="hover:underline cursor-pointer" href="/menu"><strong>Menu</strong></a>
            <a class="hover:underline cursor-pointer" href="/cart"><strong class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                  </svg>
                  @if (Auth::check())
                    {{$keranjang}}
                  @endif
            </strong></a>
            <a class="hover:underline cursor-pointer" href="/#about"><strong>About Us</strong></a>
        </div>
    </div>

    @if (Auth::check())
        <a class="hover:underline cursor-pointer " href="/signout"><strong class="upercase">{{Auth::user()['nama_222118']}}</strong></a>
    @else
        <a class="hover:underline cursor-pointer" href="/login"><strong>LOGIN</strong></a>
    @endif

</div>
