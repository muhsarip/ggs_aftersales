<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>

<body>
    <div style="margin:2% 5% 10% 5%">
        <table style="width:100%;">
            <tr>
                <td style="width: 100px;">
                    <img src="{{url('images/logo-ggs.png')}}" width="120" alt="">
                </td>
                <td>
                    <h1>Service Information</h1>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <h2 style="padding-left: 5px;">
            No. RMA : <strong>{{$data->rma_id}}</strong>
        </h2>
        <table style="width: 100%;font-size:20px;">
            <tr>
                <td style="width: 50%">
                    <table>
                        <tr>
                            <td>Nama Pelanggan</td>
                            <td>: <strong>{{$data->name}}</strong> </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: <strong>{{$data->address}}</strong> </td>
                        </tr>
                        <tr>
                            <td>Telepon</td>
                            <td>: <strong>{{$data->phone}}</strong> </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>: <strong>{{$data->email}}</strong> </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table>
                        <tr>
                            <td>Nama Barang</td>
                            <td>: <strong>{{$data->nama_barang}}</strong> </td>
                        </tr>
                        <tr>
                            <td>Serial Number</td>
                            <td>: <strong>{{$data->serial_number}}</strong> </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
        <div style="margin-top: 20px;font-size:20px;">
            <p>Detail Kerusakan</p>
            <h3><strong>
                    {{$data->detail_kerusakan}}
                </strong>

            </h3>
        </div>

        <div style="margin-top: 20px;">
            <p>
                This is text for claim text, so long and can be changed everywhehere
            </p>
        </div>

    </div>
</body>

</html>