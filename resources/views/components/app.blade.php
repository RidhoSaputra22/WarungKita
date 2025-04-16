<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <title>RestoKU</title>

    <style>
    * {
        /* outline: 1px solid red; */
    }

    @media print{
        #aksi{
            display: none;
        }
    }
    </style>

</head>

<body class="bg-white">
    {{$slot}}

</body>

</html>
