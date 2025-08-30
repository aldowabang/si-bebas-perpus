<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 14px;
            line-height: 1.6;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h2, .header h3 {
            margin: 0;
        }
        .line {
            border-top: 2px solid black;
            margin: 10px 0;
        }
        .content {
            margin: 40px 60px 40px 60px;
        }
        .ttd {
            margin-top: 50px;
            width: 100%;
            text-align: right;
        }
        .ttd p {
            margin: 5px 0;
        }
    </style>
</head>
<body>

    
    <div class="header">
        <img src="{{ url('images/logUR.png') }}" alt="Logo" style="width:80px;">

        <h2>PERPUSTAKAAN UNIVERSITAS ROYAL KISARAN</h2>
        <h4>Jl. Pro. H. M. Yamin No. 173 Kisaran, Sumatra Utara 21222</h4>
        <div class="line"></div>
        <h2><strong>SURAT KETERANGAN BEBAS PUSTAKA</strong></h2>
    </div>


    <div class="content">
        <p>Perpustakaan Universita Royal Kisaran dengan ini menerangkan bahwa:</p>
        <table>
            <tr>
                <td>Nama Mahasiswa</td>
                <td>: {{ $student->name }}</td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>: {{ $student->nim }}</td>
            </tr>
            <tr>
                <td>Tahun Lulus</td>
                <td>: {{ $skripsi1->tahun ?? '-' }}</td>
            </tr>
            <tr>
                <td>Prodi</td>
                <td>: {{ $student->department }}</td>
            </tr>
            <tr>
                <td>Judul Skripsi</td>
                <td>: {{ $skripsi1->judul ?? '-' }}</td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>: <strong>{{ $skripsi1->jalur_lulus ?? '-' }}</strong></td>
            </tr>
        </table>

        <p>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Terhitung Sejak tanggal {{ \Carbon\Carbon::parse($bebasPerpus->tanggal_terbit)->format('d-m-Y') }}, dinyatakan telah bebas dari peminjaman buku dan koleksi lainnya di <strong>Perpustakaan Universitas Royal Kisaran</strong>.
        </p>
        <p>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dengan Demikian surat ini dibuat untuk dipergunakan sebagaimana mestinya.
        </p>
        
        <!-- Tanda Tangan -->
        <div class="ttd">
            <p>Kisaran, {{ \Carbon\Carbon::parse($bebasPerpus->tanggal_terbit)->format('d-m-Y') }}</p>
            <p>Kepala Perpustakaan</p>
            <br><br><br>
            <p><u>Tri Suci Wulandari S. Sos</u></p>
            
        </div>
    </div>

</body>
</html>
