<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('src/css/tailwindcss.css')}}">
    <title>Document</title>
    <style>
        table {
            width: 100%;
            border: 1px solid #000;
            }
            th, td {
            width: 25%;
            text-align: left;
            vertical-align: top;
            border: 1px solid #000;
            border-collapse: collapse;
            padding: 0.3em;
            caption-side: bottom;
            }
            caption {
            padding: 0.3em;
            color: #fff;
                background: #000;
            }
            th {
            background: #eee;
            }
    </style>
</head>
<body class="flex items-center">
    <div class="bg-red-800 border-t border-b border-blue-500 text-blue-700 px-4 py-3 " role="alert">
        <p class="font-bold"> TecnologyJr</p>
        <img src="{{asset('src/img/layouts/logo.png')}}" width="50px" height="50px" style="float: right">
    </div>
    <br>
    <div>
        <p>Factura Nº : FACTCF{{$invoi->id}}</p>
        <p>NombreCliente : {{$invoi->usuario->name}}</p>
        <p>E-Mail Cliente : {{$invoi->usuario->email}}</p>
    </div>



    <table class="w-full ">
        <thead>
            <tr>
                <th>Cantidad</th>
                <th>Prodcuto</th>
                <th>Precio Unitario</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($factura as $item)
                <tr>
                    <td >{{$item->quantity}}</td>
                    <td >{{$item->product->name}}</td>
                    <td >$ {{$item->unit_price}}</td>
                    <td >$ {{$item->unit_price}}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3">Total Factura :</td>
                <td>$ {{$invoi->total_invoice}}</td>
            </tr>
            <tr>
                <td colspan="2">Estado : Cancelado</td>
                <td colspan="2">Proceso : Tramitando envio</td>
            </tr>
        </tbody>
    </table>
</body>
</html>