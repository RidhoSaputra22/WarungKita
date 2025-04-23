<a href="/detail/{{ $id }}" >
    <div class="rounded h-96 w-full bg-cover" style="background-image: url('{{ URL::asset($image) }}')">
        <div class=" h-full w-full flex flex-col-reverse ">
            <div class="bg-white w-full text-black p-3">
                <p class="text-lg w-full font-semibold">{{$nama}}</p>
                <p class="text-lg w-full ">Rp. {{number_format($harga)}}</p>
            </div>
        </div>
    </div>
</a>
