<a href="/detail/{{ $id }}" class=" h-96 w-80 rounded  bg-cover bg-center" style="background-image: url('{{ URL::asset($image) }}')">
    <div class=" h-full flex flex-col-reverse ">
        <div class="bg-white text-black p-3">
            <h1 class="text-lg font-semibold">{{$nama}}</h1>
            <h2 class="text-lg">Rp. {{number_format($harga)}}</h2>
        </div>
    </div>
</a>
