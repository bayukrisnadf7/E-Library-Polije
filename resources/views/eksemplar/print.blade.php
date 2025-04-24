<!DOCTYPE html>
<html>
<head>
    <title>Cetak Barcode</title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
            padding-top: 50px;
        }
        .barcode {
            display: inline-block;
            border: 1px dashed #999;
            padding: 20px;
            margin-bottom: 20px;
        }
        .kode {
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
            letter-spacing: 1px;
        }
    </style>
</head>
<body onload="window.print()">

    <div class="barcode">
        {{-- Tampilkan barcode --}}
        {!! DNS1D::getBarcodeHTML($eksemplar->kode_eksemplar, 'C128') !!}
        
        {{-- Tampilkan kode di bawah barcode --}}
        <div class="kode">{{ $eksemplar->kode_eksemplar }}</div>
    </div>

</body>
</html>
