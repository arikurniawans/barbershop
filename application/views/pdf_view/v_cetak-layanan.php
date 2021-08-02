<?php
require ("./assets/mpdf/mpdf.php");

$fileName = 'Rekap Layanan';
$mpdf = new mPDF('utf-8', 'A4');
$stylesheet = file_get_contents('assets/style_print.css'); // external css
$mpdf->AddPage('L','','','','',10, 10, 20, 20, 30, 10);
$mpdf->SetTitle('Rekapitulasi Transaksi Layanan');
$mpdf->WriteHTML($stylesheet,1);

$html = '<html>
<head>
    <title>Barbershop Apps</title>
</head>
<body>
    <div class="a"><h1>Barbershop ABC</h1>
    <p>Alamat : Kota Bandar Lampung <br/> Email  : xxxxxx@gmail.com | Telephone   : 08521361xxxx</p></div>
    <hr/>
    <div class="a"><b>Rekapitulasi Transaksi Layanan Barbershop</b><br/>Tanggal : '.$cal1.' s/d '.$cal2.'</div><br/><br/>
    <table class="table1">
        <tr>
            <th>No</th>
            <th>Tanggal Transaksi</th>
            <th>Nama Layanan</th>
            <th>Tarif Layanan</th>
            <th>Jumlah Transaksi</th>
            <th>Total Hasil Transaksi</th>
        </tr>';

$no=1; if(!empty($layanan)){ foreach($layanan as $data){
$html .= '<tr>
            <td>'.$no++ .'</td>
            <td>'.$data->tgl_transaksi.'</td>
            <td>'.ucwords($data->nama_layanan).'</td>
            <td>Rp.'.number_format($data->tarif_layanan,0,",",".").'</td>
            <td>'.$data->qty.' (kali)</td>
            <td>Rp.'.number_format($data->total_transaksi,0,",",".").'</td>
</tr>';
} } else{ 
    $html .= '<tr> <td colspan="6" align="center">Rekap data tidak ditemukan</td> </tr>';
}

$html .= '</table></body></html>';

$mpdf->WriteHTML($html);
$mpdf->Output($fileName. '.pdf','I');
?>
