<!-- Start Status area -->
<div class="notika-status-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $karyawan; ?></span></h2>
                            <p>Jumlah Karyawan</p>
                        </div>
                        <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $produk; ?></h2>
                            <p>Jumlah Produk</p>
                        </div>
                        <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $layanan; ?></span></h2>
                            <p>Jumlah Layanan</p>
                        </div>
                        <div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $transaksi->jml_transaksi; ?></span></h2>
                            <p>Jumlah Transaksi Hari Ini</p>
                        </div>
                        <div class="sparkline-bar-stats4">2,4,8,4,5,7,4,7,3,5,7,5</div>
                    </div>
                </div>
                
                <div class="col-md-15" style="margin-top: 10%;">
                    <div class="form-example-wrap">
                        <div class="cmp-tb-hd">
                            <h2>Grafik Rekap Transaksi Per Bulan</h2>
                        </div>
                        <div id="view" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                    </div>
                </div>

                <br/><br/>
                <div class="col-md-6">

                    <div class="form-example-wrap">
                        <div class="cmp-tb-hd">
                            <h2>Layanan Terpopuler</h2>
                        </div>

                        <table class="table table-inner table-vmiddle">
                                    <thead>
                                        <tr>
                                            <th width="2%">#</th>
                                            <th>Nama Layanan</th>
                                            <th style="width: 80px;">Jumlah Transaksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no=1; foreach($terpopuler as $data1){ ?>
                                        <tr>
                                            <td class="f-500 c-cyan"><?php echo $no++; ?></td>
                                            <td><?php echo ucwords($data1->nama_layanan); ?></td>
                                            <td class="f-500 c-cyan"><?php echo $data1->qty; ?> (kali)</td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                    </div>

                </div>

                <div class="col-md-6">
                    
                    <div class="form-example-wrap">
                        <div class="cmp-tb-hd">
                            <h2>Produk Terlaris</h2>
                        </div>

                        <table class="table table-inner table-vmiddle">
                                    <thead>
                                        <tr>
                                            <th width="2%">#</th>
                                            <th>Nama Produk</th>
                                            <th style="width: 80px;">Jumlah Transaksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no=1; foreach($terlaris as $data2){ ?>
                                        <tr>
                                            <td class="f-500 c-cyan"><?php echo $no++; ?></td>
                                            <td><?php echo ucwords($data2->nama_produk); ?></td>
                                            <td class="f-500 c-cyan"><?php echo $data2->qty; ?> (item)</td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- End Status area-->
    
<script type="text/javascript">
var chart; 
        $(document).ready(function() {
        chart = new Highcharts.Chart(
            {     
        chart: {
                renderTo: 'view',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
        }, 
        title: {
            text: 'Transaksi Per Bulan',
            x: -20 //center
        },
        subtitle: {
            text: 'Barbershop ABC',
            x: -20
        },
        xAxis: {
            categories: [<?php foreach($grafik as $data1) { echo "'".$data1->bulan_transaksi."',"; } ?>]
        },
        yAxis: {
            title: {
                text: 'Jumlah Transaksi'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ''
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Jumlah Transaksi ',
            data: [<?php foreach($grafik as $data2) { echo $data2->qty.","; } ?>]
        }]
    });
});
</script>
