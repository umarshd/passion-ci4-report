<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

    <title>EXPECTED RESULT</title>
</head>

<body>
    <h1>Report</h1>

    <div class="row">
        <div class="col-lg-6">
            <form method="get" class="my-3">

                <div class="row">
                    <div class="col-lg-3">
                        <input type="number" min="1900" max="2099" step="1"
                            value="<?= isset($_GET['year']) ? $_GET['year'] : date('Y') ?>" name="year"
                            class="form-control" />
                    </div>
                    <div class="col-lg-5">
                        <select class="form-select" aria-label="Default select example" required name="month">
                            <option disabled>Pilih Bulan</option>
                            <option <?= (isset($_GET['month']) && $_GET['month'] == "01" ? "selected" : "") ?> value="01">
                                Januari</option>
                            <option <?= (isset($_GET['month']) && $_GET['month'] == "02" ? "selected" : "") ?> value="02">
                                Februari</option>
                            <option <?= (isset($_GET['month']) && $_GET['month'] == "03" ? "selected" : "") ?> value="03">
                                Maret</option>
                            <option <?= (isset($_GET['month']) && $_GET['month'] == "04" ? "selected" : "") ?> value="04">
                                April</option>
                            <option <?= (isset($_GET['month']) && $_GET['month'] == "05" ? "selected" : "") ?> value="05">
                                Mei</option>
                            <option <?= (isset($_GET['month']) && $_GET['month'] == "06" ? "selected" : "") ?> value="06">
                                Juni</option>
                            <option <?= (isset($_GET['month']) && $_GET['month'] == "07" ? "selected" : "") ?> value="07">
                                Juli</option>
                            <option <?= (isset($_GET['month']) && $_GET['month'] == "08" ? "selected" : "") ?> value="08">
                                Agustus</option>
                            <option <?= (isset($_GET['month']) && $_GET['month'] == "09" ? "selected" : "") ?> value="09">
                                September</option>
                            <option <?= (isset($_GET['month']) && $_GET['month'] == "10" ? "selected" : "") ?> value="10">
                                Oktober</option>
                            <option <?= (isset($_GET['month']) && $_GET['month'] == "11" ? "selected" : "") ?> value="11">
                                November</option>
                            <option <?= (isset($_GET['month']) && $_GET['month'] == "12" ? "selected" : "") ?> value="12">
                                Desember</option>

                        </select>
                    </div>

                    <div class="col-lg-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <?php

    $totalpcs = 0;
    $totalcarat = 0;
    $totalgram = 0;
    $totalcogm = 0;
    $totalnet = 0;
    $totalusernet = 0;
    $totalstockinbeli = 0;
    $totalstockinbuyback = 0;
    $totalstockoutpenjualan = 0;
    $totalstockakhir = 0;
    ?>

    <table class="table table-striped table-hover" border="1" style="width: 100%; border: 1px solid black;" id="example">
        <thead>
            <tr>
                <th>Jenis</th>
                <th>YM</th>
                <th colspan="6">Stock Awal</th>
                <th>Stock In Beli</th>
                <th>Stock In Buyback</th>
                <th>Stock Out Penjualan</th>
                <th>Stock Akhir</th>
            </tr>
            <tr>
                <th>Jenis</th>
                <th>YM</th>
                <th>PCS</th>
                <th>CARAT</th>
                <th>GRAM</th>
                <th>COGM</th>
                <th>NET</th>
                <th>USERNET</th>
                <th>Stock In Beli</th>
                <th>Stock In Buyback</th>
                <th>Stock Out Penjualan</th>
                <th>Stock Akhir</th>
            </tr>

        </thead>
        <tbody>

     

            <?php foreach ($getReportLsGeneric as $key => $value): ?>

                                    <?php if (isset($_GET['year']) && isset($_GET['month'])): ?>
                                                            <?php if ($value['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                    <tr>
                                                                                        <td>
                                                                                            LS Generic
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['yearmonth'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] ?>
                                                                                            <?php $totalpcs += $value['total_type'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_weight'], 0, ',', ',') ?>
                                                                                            <?php $totalcarat += $value['total_weight'] ?>

                                                                                        </td>
                                                                                        <td>
                                                                                            0.00
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_pricenet'], 0, ',', ',') ?>
                                                                                            <?php $totalcogm += $value['total_pricenet'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_pricenet'], 0, ',', ',') ?>
                                                                                            <?php $totalnet += $value['total_pricenet'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_priceusr'], 0, ',', ',') ?>
                                                                                            <?php $totalusernet += $value['total_priceusr'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] ?>
                                                                                            <?php $totalstockinbeli += $value['total_type'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php
                                                                                            $total_buyback = 0;
                                                                                            $total_sales = 0;
                                                                                            ?>
                                                                                            <?php foreach ($getReportLsGenericBuyback as $key => $valueBuyback): ?>
                                                                                                                    <?php if ($valueBuyback['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                                            <?= $valueBuyback['total_type'] ?>
                                                                                                                                            <?php $total_buyback += $valueBuyback['total_type'] ?>
                                                                                                                                            <?php $totalstockinbuyback += $valueBuyback['total_type'] ?>
                                                                                                                    <?php endif ?>
                                                                                            <?php endforeach ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php foreach ($getReportLsGenericSales as $key => $valueSales): ?>
                                                                                                                    <?php if ($valueSales['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                                            <?= $valueSales['total_type'] ?>
                                                                                                                                            <?php $total_sales += $valueSales['total_type'] ?>
                                                                                                                                            <?php $totalstockoutpenjualan += $valueSales['total_type'] ?>
                                                                                                                    <?php endif ?>
                                                                                            <?php endforeach ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                            <?php $totalstockakhir += $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                        </td>
                                                                                    </tr>
                                                            <?php endif ?>
                                    <?php else: ?>
                                                            <?php if ($value['yearmonth'] == date('Y-m')): ?>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Ls Generic
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['yearmonth'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] ?>
                                                                                            <?php $totalpcs += $value['total_type'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_weight'], 0, ',', ',') ?>
                                                                                            <?php $totalcarat += $value['total_weight'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            0.00
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_pricenet'], 0, ',', ',') ?>
                                                                                            <?php $totalcogm += $value['total_pricenet'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_pricenet'], 0, ',', ',') ?>
                                                                                            <?php $totalnet += $value['total_pricenet'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_priceusr'], 0, ',', ',') ?>
                                                                                            <?php $totalusernet += $value['total_priceusr'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] ?>
                                                                                            <?php $totalstockinbeli += $value['total_type'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php
                                                                                            $total_buyback = 0;
                                                                                            $total_sales = 0;
                                                                                            ?>
                                                                                            <?php foreach ($getReportLsGenericBuyback as $key => $valueBuyback): ?>
                                                                                                                    <?php if ($valueBuyback['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                                            <?= $valueBuyback['total_type'] ?>
                                                                                                                                            <?php $total_buyback += $valueBuyback['total_type'] ?>
                                                                                                                                            <?php $totalstockinbuyback += $valueBuyback['total_type'] ?>
                                                                                                                    <?php endif ?>
                                                                                            <?php endforeach ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php foreach ($getReportLsGenericSales as $key => $valueSales): ?>
                                                                                                                    <?php if ($valueSales['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                                            <?= $valueSales['total_type'] ?>
                                                                                                                                            <?php $total_sales += $valueSales['total_type'] ?>
                                                                                                                                            <?php $totalstockoutpenjualan += $valueSales['total_type'] ?>
                                                                                                                    <?php endif ?>
                                                                                            <?php endforeach ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                            <?php $totalstockakhir += $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                        </td>
                                                                                    </tr>
                                                            <?php endif ?>
                                    <?php endif ?>
            <?php endforeach ?>

            <?php foreach ($getReportLsDossier as $key => $value): ?>

                                    <?php if (isset($_GET['year']) && isset($_GET['month'])): ?>
                                                            <?php if ($value['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Ls Dossier
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['yearmonth'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] ?>
                                                                                            <?php $totalpcs += $value['total_type'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_weight'], 0, ',', ',') ?>
                                                                                            <?php $totalcarat += $value['total_weight'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            0.00
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_pricenet'], 0, ',', ',') ?>
                                                                                            <?php $totalcogm += $value['total_pricenet'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_pricenet'], 0, ',', ',') ?>
                                                                                            <?php $totalnet += $value['total_pricenet'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_priceusr'], 0, ',', ',') ?>
                                                                                            <?php $totalusernet += $value['total_priceusr'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] ?>
                                                                                            <?php $totalstockinbeli += $value['total_type'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php
                                                                                            $total_buyback = 0;
                                                                                            $total_sales = 0;
                                                                                            ?>
                                                                                            <?php foreach ($getReportLsDossierBuyback as $key => $valueBuyback): ?>
                                                                                                                    <?php if ($valueBuyback['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                                            <?= $valueBuyback['total_type'] ?>
                                                                                                                                            <?php $total_buyback += $valueBuyback['total_type'] ?>
                                                                                                                                            <?php $totalstockinbuyback += $valueBuyback['total_type'] ?>
                                                                                                                    <?php endif ?>
                                                                                            <?php endforeach ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php foreach ($getReportLsDossierSales as $key => $valueSales): ?>
                                                                                                                    <?php if ($valueSales['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                                            <?= $valueSales['total_type'] ?>
                                                                                                                                            <?php $total_sales += $valueSales['total_type'] ?>
                                                                                                                                            <?php $totalstockoutpenjualan += $valueSales['total_type'] ?>
                                                                                                                    <?php endif ?>
                                                                                            <?php endforeach ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                            <?php $totalstockakhir += $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                        </td>
                                                                                    </tr>
                                                            <?php endif ?>
                                    <?php else: ?>
                                                            <?php if ($value['yearmonth'] == date('Y-m')): ?>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Ls Dossier
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['yearmonth'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] ?>
                                                                                            <?php $totalpcs += $value['total_type'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_weight'], 0, ',', ',') ?>
                                                                                            <?php $totalcarat += $value['total_weight'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            0.00
                                                                                        </td>
                                                                                        <td>

                                                                                            <?= number_format($value['total_pricenet'], 0, ',', ',') ?>
                                                                                            <?php $totalcogm += $value['total_pricenet'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_pricenet'], 0, ',', ',') ?>
                                                                                            <?php $totalnet += $value['total_pricenet'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_priceusr'], 0, ',', ',') ?>
                                                                                            <?php $totalusernet += $value['total_priceusr'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] ?>
                                                                                            <?php $totalstockinbeli += $value['total_type'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php
                                                                                            $total_buyback = 0;
                                                                                            $total_sales = 0;
                                                                                            ?>
                                                                                            <?php foreach ($getReportLsDossierBuyback as $key => $valueBuyback): ?>
                                                                                                                    <?php if ($valueBuyback['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                                            <?= $valueBuyback['total_type'] ?>
                                                                                                                                            <?php $total_buyback += $valueBuyback['total_type'] ?>
                                                                                                                                            <?php $totalstockinbuyback += $valueBuyback['total_type'] ?>
                                                                                                                    <?php endif ?>
                                                                                            <?php endforeach ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php foreach ($getReportLsDossierSales as $key => $valueSales): ?>
                                                                                                                    <?php if ($valueSales['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                                            <?= $valueSales['total_type'] ?>
                                                                                                                                            <?php $total_sales += $valueSales['total_type'] ?>
                                                                                                                                            <?php $totalstockoutpenjualan += $valueSales['total_type'] ?>
                                                                                                                    <?php endif ?>
                                                                                            <?php endforeach ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                            <?php $totalstockakhir += $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                        </td>
                                                                                    </tr>
                                                            <?php endif ?>
                                    <?php endif ?>
            <?php endforeach ?>

            <?php foreach ($getReportLsBranded as $key => $value): ?>

                                    <?php if (isset($_GET['year']) && isset($_GET['month'])): ?>
                                                            <?php if ($value['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Ls Branded
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['yearmonth'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] ?>
                                                                                            <?php $totalpcs += $value['total_type'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_weight'], 0, ',', ',') ?>
                                                                                            <?php $totalcarat += $value['total_weight'] ?>

                                                                                        </td>
                                                                                        <td>
                                                                                            0.00
                                                                                        </td>
                                                                                        <td>

                                                                                            <?= number_format($value['total_pricenet'], 0, ',', ',') ?>
                                                                                            <?php $totalcogm += $value['total_pricenet'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_pricenet'], 0, ',', ',') ?>
                                                                                            <?php $totalnet += $value['total_pricenet'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_priceusr'], 0, ',', ',') ?>
                                                                                            <?php $totalusernet += $value['total_priceusr'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] ?>
                                                                                            <?php $totalstockinbeli += $value['total_type'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php
                                                                                            $total_buyback = 0;
                                                                                            $total_sales = 0;
                                                                                            ?>
                                                                                            <?php foreach ($getReportLsBrandedBuyback as $key => $valueBuyback): ?>
                                                                                                                    <?php if ($valueBuyback['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                                            <?= $valueBuyback['total_type'] ?>
                                                                                                                                            <?php $total_buyback += $valueBuyback['total_type'] ?>
                                                                                                                                            <?php $totalstockinbuyback += $valueBuyback['total_type'] ?>
                                                                                                                    <?php endif ?>
                                                                                            <?php endforeach ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php foreach ($getReportLsBrandedSales as $key => $valueSales): ?>
                                                                                                                    <?php if ($valueSales['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                                            <?= $valueSales['total_type'] ?>
                                                                                                                                            <?php $total_sales += $valueSales['total_type'] ?>
                                                                                                                                            <?php $totalstockoutpenjualan += $valueSales['total_type'] ?>
                                                                                                                    <?php endif ?>
                                                                                            <?php endforeach ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                            <?php $totalstockakhir += $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                        </td>
                                                                                    </tr>
                                                            <?php endif ?>
                                    <?php else: ?>
                                                            <?php if ($value['yearmonth'] == date('Y-m')): ?>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Ls Branded
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['yearmonth'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] ?>
                                                                                            <?php $totalpcs += $value['total_type'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_weight'], 0, ',', ',') ?>
                                                                                            <?php $totalcarat += $value['total_weight'] ?>


                                                                                        </td>
                                                                                        <td>
                                                                                            0.00
                                                                                        </td>
                                                                                        <td>

                                                                                            <?= number_format($value['total_pricenet'], 0, ',', ',') ?>
                                                                                            <?php $totalcogm += $value['total_pricenet'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_pricenet'], 0, ',', ',') ?>
                                                                                            <?php $totalnet += $value['total_pricenet'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_priceusr'], 0, ',', ',') ?>
                                                                                            <?php $totalusernet += $value['total_priceusr'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] ?>
                                                                                            <?php $totalstockinbeli += $value['total_type'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php
                                                                                            $total_buyback = 0;
                                                                                            $total_sales = 0;
                                                                                            ?>
                                                                                            <?php foreach ($getReportLsBrandedBuyback as $key => $valueBuyback): ?>
                                                                                                                    <?php if ($valueBuyback['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                                            <?= $valueBuyback['total_type'] ?>
                                                                                                                                            <?php $total_buyback += $valueBuyback['total_type'] ?>
                                                                                                                                            <?php $totalstockinbuyback += $valueBuyback['total_type'] ?>
                                                                                                                    <?php endif ?>
                                                                                            <?php endforeach ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php foreach ($getReportLsBrandedSales as $key => $valueSales): ?>
                                                                                                                    <?php if ($valueSales['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                                            <?= $valueSales['total_type'] ?>
                                                                                                                                            <?php $total_sales += $valueSales['total_type'] ?>
                                                                                                                                            <?php $totalstockoutpenjualan += $valueSales['total_type'] ?>
                                                                                                                    <?php endif ?>
                                                                                            <?php endforeach ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                            <?php $totalstockakhir += $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                        </td>
                                                                                    </tr>
                                                            <?php endif ?>
                                    <?php endif ?>
            <?php endforeach ?>

            <?php foreach ($getReportLsGemstone as $key => $value): ?>

                                    <?php if (isset($_GET['year']) && isset($_GET['month'])): ?>
                                                            <?php if ($value['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Ls Gemstone
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['yearmonth'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] ?>
                                                                                            <?php $totalpcs += $value['total_type'] ?>
                                                                                        </td>
                                                                                        <td>

                                                                                            <?= number_format($value['total_weight'], 0, ',', ',') ?>
                                                                                            <?php $totalcarat += $value['total_weight'] ?>

                                                                                        </td>
                                                                                        <td>
                                                                                            0.00
                                                                                        </td>
                                                                                        <td>

                                                                                            <?= number_format($value['total_pricenet'], 0, ',', ',') ?>
                                                                                            <?php $totalcogm += $value['total_pricenet'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_pricenet'], 0, ',', ',') ?>
                                                                                            <?php $totalnet += $value['total_pricenet'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_priceusr'], 0, ',', ',') ?>
                                                                                            <?php $totalusernet += $value['total_priceusr'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] ?>
                                                                                            <?php $totalstockinbeli += $value['total_type'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php
                                                                                            $total_buyback = 0;
                                                                                            $total_sales = 0;
                                                                                            ?>
                                                                                            <?php foreach ($getReportLsGemstoneBuyback as $key => $valueBuyback): ?>
                                                                                                                    <?php if ($valueBuyback['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                                            <?= $valueBuyback['total_type'] ?>
                                                                                                                                            <?php $total_buyback += $valueBuyback['total_type'] ?>
                                                                                                                                            <?php $totalstockinbuyback += $valueBuyback['total_type'] ?>
                                                                                                                    <?php endif ?>
                                                                                            <?php endforeach ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php foreach ($getReportLsGemstoneSales as $key => $valueSales): ?>
                                                                                                                    <?php if ($valueSales['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                                            <?= $valueSales['total_type'] ?>
                                                                                                                                            <?php $total_sales += $valueSales['total_type'] ?>
                                                                                                                                            <?php $totalstockoutpenjualan += $valueSales['total_type'] ?>
                                                                                                                    <?php endif ?>
                                                                                            <?php endforeach ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                            <?php $totalstockakhir += $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                        </td>
                                                                                    </tr>
                                                            <?php endif ?>
                                    <?php else: ?>
                                                            <?php if ($value['yearmonth'] == date('Y-m')): ?>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Ls Gemstone
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['yearmonth'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] ?>
                                                                                            <?php $totalpcs += $value['total_type'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_weight'], 0, ',', ',') ?>
                                                                                            <?php $totalcarat += $value['total_weight'] ?>


                                                                                        </td>
                                                                                        <td>
                                                                                            0.00
                                                                                        </td>
                                                                                        <td>

                                                                                            <?= number_format($value['total_pricenet'], 0, ',', ',') ?>
                                                                                            <?php $totalcogm += $value['total_pricenet'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_pricenet'], 0, ',', ',') ?>
                                                                                            <?php $totalnet += $value['total_pricenet'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_priceusr'], 0, ',', ',') ?>
                                                                                            <?php $totalusernet += $value['total_priceusr'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] ?>
                                                                                            <?php $totalstockinbeli += $value['total_type'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php
                                                                                            $total_buyback = 0;
                                                                                            $total_sales = 0;
                                                                                            ?>
                                                                                            <?php foreach ($getReportLsGemstoneBuyback as $key => $valueBuyback): ?>
                                                                                                                    <?php if ($valueBuyback['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                                            <?= $valueBuyback['total_type'] ?>
                                                                                                                                            <?php $total_buyback += $valueBuyback['total_type'] ?>
                                                                                                                                            <?php $totalstockinbuyback += $valueBuyback['total_type'] ?>
                                                                                                                    <?php endif ?>
                                                                                            <?php endforeach ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php foreach ($getReportLsGemstoneSales as $key => $valueSales): ?>
                                                                                                                    <?php if ($valueSales['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                                            <?= $valueSales['total_type'] ?>
                                                                                                                                            <?php $total_sales += $valueSales['total_type'] ?>
                                                                                                                                            <?php $totalstockoutpenjualan += $valueSales['total_type'] ?>
                                                                                                                    <?php endif ?>
                                                                                            <?php endforeach ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                            <?php $totalstockakhir += $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                        </td>
                                                                                    </tr>
                                                            <?php endif ?>
                                    <?php endif ?>
            <?php endforeach ?>


            <?php foreach ($getReportDJProduksi as $key => $value): ?>

                                    <?php if (isset($_GET['year']) && isset($_GET['month'])): ?>
                                                            <?php if ($value['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                    <tr>
                                                                                        <td>
                                                                                            DJ Produksi
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['yearmonth'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] ?>
                                                                                            <?php $totalpcs += $value['total_type'] ?>
                                                                                        </td>
                                                                                        <td>

                                                                                            <?= number_format($value['total_carat'], 4, '.', '') ?>
                                                                                            <?php $totalcarat += $value['total_carat'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_gram'], 2, '.', ',') ?>
                                                                                            <?php $totalgram += $value['total_gram'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_cogm'], 0, ',', ',') ?>
                                                                                            <?php $totalcogm += $value['total_cogm'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_pricenet'], 0, ',', ',') ?>
                                                                                            <?php $totalnet += $value['total_pricenet'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_priceusr'], 0, ',', ',') ?>
                                                                                            <?php $totalusernet += $value['total_priceusr'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] ?>
                                                                                            <?php $totalstockinbeli += $value['total_type'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php
                                                                                            $total_buyback = 0;
                                                                                            $total_sales = 0;
                                                                                            ?>
                                                                                            <?php foreach ($getReportDJProduksiBuyback as $key => $valueBuyback): ?>
                                                                                                                    <?php if ($valueBuyback['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                                            <?= $valueBuyback['total_type'] ?>
                                                                                                                                            <?php $total_buyback += $valueBuyback['total_type'] ?>
                                                                                                                                            <?php $totalstockinbuyback += $valueBuyback['total_type'] ?>
                                                                                                                    <?php endif ?>
                                                                                            <?php endforeach ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php foreach ($getReportDJProduksiSales as $key => $valueSales): ?>
                                                                                                                    <?php if ($valueSales['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                                            <?= $valueSales['total_type'] ?>
                                                                                                                                            <?php $total_sales += $valueSales['total_type'] ?>
                                                                                                                                            <?php $totalstockoutpenjualan += $valueSales['total_type'] ?>
                                                                                                                    <?php endif ?>
                                                                                            <?php endforeach ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                            <?php $totalstockakhir += $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                        </td>
                                                                                    </tr>
                                                            <?php endif ?>
                                    <?php else: ?>
                                                            <?php if ($value['yearmonth'] == date('Y-m')): ?>
                                                                                    <tr>
                                                                                        <td>
                                                                                            DJ Produksi
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['yearmonth'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] ?>
                                                                                            <?php $totalpcs += $value['total_type'] ?>
                                                                                        </td>
                                                                                        <td>

                                                                                            <?= number_format($value['total_carat'], 4, '.', '') ?>
                                                                                            <?php $totalcarat += $value['total_carat'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_gram'], 2, '.', ',') ?>
                                                                                            <?php $totalgram += $value['total_gram'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_cogm'], 0, ',', ',') ?>
                                                                                            <?php $totalcogm += $value['total_cogm'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_pricenet'], 0, ',', ',') ?>
                                                                                            <?php $totalnet += $value['total_pricenet'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_priceusr'], 0, ',', ',') ?>
                                                                                            <?php $totalusernet += $value['total_priceusr'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php
                                                                                            $total_buyback = 0;
                                                                                            $total_sales = 0;
                                                                                            ?>
                                                                                            <?php foreach ($getReportDJProduksiBuyback as $key => $valueBuyback): ?>
                                                                                                                    <?php if ($valueBuyback['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                                            <?= $valueBuyback['total_type'] ?>
                                                                                                                                            <?php $total_buyback += $valueBuyback['total_type'] ?>
                                                                                                                                            <?php $totalstockinbuyback += $valueBuyback['total_type'] ?>
                                                                                                                    <?php endif ?>
                                                                                            <?php endforeach ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php foreach ($getReportDJProduksiSales as $key => $valueSales): ?>
                                                                                                                    <?php if ($valueSales['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                                            <?= $valueSales['total_type'] ?>
                                                                                                                                            <?php $total_sales += $valueSales['total_type'] ?>
                                                                                                                                            <?php $totalstockoutpenjualan += $valueSales['total_type'] ?>
                                                                                                                    <?php endif ?>
                                                                                            <?php endforeach ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                            <?php $totalstockakhir += $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                        </td>
                                                                                    </tr>
                                                            <?php endif ?>
                                     <?php endif ?>
            <?php endforeach ?>

            <?php foreach ($getReportDJGSProduksi as $key => $value): ?>

                                    <?php if (isset($_GET['year']) && isset($_GET['month'])): ?>
                                                            <?php if ($value['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                    <tr>
                                                                                        <td>
                                                                                            DJ + GS Produksi
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['yearmonth'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] ?>
                                                                                            <?php $totalpcs += $value['total_type'] ?>
                                                                                        </td>
                                                                                        <td>

                                                                                            <?= number_format($value['total_carat'], 4, '.', '') ?>
                                                                                            <?php $totalcarat += $value['total_carat'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_gram'], 2, '.', ',') ?>
                                                                                            <?php $totalgram += $value['total_gram'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_cogm'], 0, ',', ',') ?>
                                                                                            <?php $totalcogm += $value['total_cogm'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_pricenet'], 0, ',', ',') ?>
                                                                                            <?php $totalnet += $value['total_pricenet'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_priceusr'], 0, ',', ',') ?>
                                                                                            <?php $totalusernet += $value['total_priceusr'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] ?>
                                                                                            <?php $totalstockinbuyback += $value['total_type'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php
                                                                                            $total_buyback = 0;
                                                                                            $total_sales = 0;
                                                                                            ?>
                                                                                            <?php foreach ($getReportDJGSProduksiBuyback as $key => $valueBuyback): ?>
                                                                                                                    <?php if ($valueBuyback['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                                            <?= $valueBuyback['total_type'] ?>
                                                                                                                                            <?php $total_buyback += $valueBuyback['total_type'] ?>
                                                                                                                                            <?php $totalstockinbuyback += $valueBuyback['total_type'] ?>
                                                                                                                    <?php endif ?>
                                                                                            <?php endforeach ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php foreach ($getReportDJGSProduksiSales as $key => $valueSales): ?>
                                                                                                                    <?php if ($valueSales['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                                            <?= $valueSales['total_type'] ?>
                                                                                                                                            <?php $total_sales += $valueSales['total_type'] ?>
                                                                                                                                            <?php $totalstockoutpenjualan += $valueSales['total_type'] ?>
                                                                                                                    <?php endif ?>
                                                                                            <?php endforeach ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                            <?php $totalstockakhir += $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                        </td>
                                                                                    </tr>
                                                            <?php endif ?>
                                    <?php else: ?>
                                                            <?php if ($value['yearmonth'] == date('Y-m')): ?>
                                                                                    <tr>
                                                                                        <td>
                                                                                            DJ + GS Produksi
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['yearmonth'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] ?>
                                                                                            <?php $totalpcs += $value['total_type'] ?>
                                                                                        </td>
                                                                                        <td>

                                                                                            <?= number_format($value['total_carat'], 4, '.', '') ?>
                                                                                            <?php $totalcarat += $value['total_carat'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_gram'], 2, '.', ',') ?>
                                                                                            <?php $totalgram += $value['total_gram'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_cogm'], 0, ',', ',') ?>
                                                                                            <?php $totalcogm += $value['total_cogm'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_pricenet'], 0, ',', ',') ?>
                                                                                            <?php $totalnet += $value['total_pricenet'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_priceusr'], 0, ',', ',') ?>
                                                                                            <?php $totalusernet += $value['total_priceusr'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] ?>
                                                                                            <?php $totalstockinbuyback += $value['total_type'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php
                                                                                            $total_buyback = 0;
                                                                                            $total_sales = 0;
                                                                                            ?>
                                                                                            <?php foreach ($getReportDJGSProduksiBuyback as $key => $valueBuyback): ?>
                                                                                                                    <?php if ($valueBuyback['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                                            <?= $valueBuyback['total_type'] ?>
                                                                                                                                            <?php $total_buyback += $valueBuyback['total_type'] ?>
                                                                                                                                            <?php $totalstockinbuyback += $valueBuyback['total_type'] ?>
                                                                                                                    <?php endif ?>
                                                                                            <?php endforeach ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php foreach ($getReportDJGSProduksiSales as $key => $valueSales): ?>
                                                                                                                    <?php if ($valueSales['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                                            <?= $valueSales['total_type'] ?>
                                                                                                                                            <?php $total_sales += $valueSales['total_type'] ?>
                                                                                                                                            <?php $totalstockoutpenjualan += $valueSales['total_type'] ?>
                                                                                                                    <?php endif ?>
                                                                                            <?php endforeach ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                            <?php $totalstockakhir += $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                        </td>
                                                                                    </tr>
                                                            <?php endif ?>
                                    <?php endif ?>
            <?php endforeach ?>

            <?php foreach ($getReportDDProduksi as $key => $value): ?>

                                    <?php if (isset($_GET['year']) && isset($_GET['month'])): ?>
                                                            <?php if ($value['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                    <tr>
                                                                                        <td>
                                                                                            DD Produksi
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['yearmonth'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] ?>
                                                                                            <?php $totalpcs += $value['total_type'] ?>
                                                                                        </td>
                                                                                        <td>

                                                                                            <?= number_format($value['total_carat'], 4, '.', '') ?>
                                                                                            <?php $totalcarat += $value['total_carat'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_gram'], 2, '.', ',') ?>
                                                                                            <?php $totalgram += $value['total_gram'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_cogm'], 0, ',', ',') ?>
                                                                                            <?php $totalcogm += $value['total_cogm'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_pricenet'], 0, ',', ',') ?>
                                                                                            <?php $totalnet += $value['total_pricenet'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_priceusr'], 0, ',', ',') ?>
                                                                                            <?php $totalusernet += $value['total_priceusr'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] ?>
                                                                                            <?php $totalstockinbuyback += $value['total_type'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php
                                                                                            $total_buyback = 0;
                                                                                            $total_sales = 0;
                                                                                            ?>
                                                                                            <?php foreach ($getReportDDProduksiBuyback as $key => $valueBuyback): ?>
                                                                                                                <?php if ($valueBuyback['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                                    <?= $valueBuyback['total_type'] ?>
                                                                                                                                    <?php $total_buyback += $valueBuyback['total_type'] ?>
                                                                                                                                    <?php $totalstockinbuyback += $valueBuyback['total_type'] ?>
                                                                                                                <?php endif ?>
                                                                                            <?php endforeach ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php foreach ($getReportDDProduksiSales as $key => $valueSales): ?>
                                                                                                                <?php if ($valueSales['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                                    <?= $valueSales['total_type'] ?>
                                                                                                                                    <?php $total_sales += $valueSales['total_type'] ?>
                                                                                                                                    <?php $totalstockoutpenjualan += $valueSales['total_type'] ?>
                                                                                                                <?php endif ?>
                                                                                            <?php endforeach ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                            <?php $totalstockakhir += $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                        </td>
                                                                                    </tr>
                                                            <?php endif ?>
                                    <?php else: ?>
                                                            <?php if ($value['yearmonth'] == date('Y-m')): ?>
                                                                                    <tr>
                                                                                        <td>
                                                                                            DD Produksi
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['yearmonth'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] ?>
                                                                                            <?php $totalpcs += $value['total_type'] ?>
                                                                                        </td>
                                                                                        <td>

                                                                                            <?= number_format($value['total_carat'], 4, '.', '') ?>
                                                                                            <?php $totalcarat += $value['total_carat'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_gram'], 2, '.', ',') ?>
                                                                                            <?php $totalgram += $value['total_gram'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_cogm'], 0, ',', ',') ?>
                                                                                            <?php $totalcogm += $value['total_cogm'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_pricenet'], 0, ',', ',') ?>
                                                                                            <?php $totalnet += $value['total_pricenet'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= number_format($value['total_priceusr'], 0, ',', ',') ?>
                                                                                            <?php $totalusernet += $value['total_priceusr'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] ?>
                                                                                            <?php $totalstockinbuyback += $value['total_type'] ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php
                                                                                            $total_buyback = 0;
                                                                                            $total_sales = 0;
                                                                                            ?>
                                                                                            <?php foreach ($getReportDDProduksiBuyback as $key => $valueBuyback): ?>
                                                                                                                <?php if ($valueBuyback['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                                    <?= $valueBuyback['total_type'] ?>
                                                                                                                                    <?php $total_buyback += $valueBuyback['total_type'] ?>
                                                                                                                                    <?php $totalstockinbuyback += $valueBuyback['total_type'] ?>
                                                                                                                <?php endif ?>
                                                                                            <?php endforeach ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php foreach ($getReportDDProduksiSales as $key => $valueSales): ?>
                                                                                                                <?php if ($valueSales['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                                    <?= $valueSales['total_type'] ?>
                                                                                                                                    <?php $total_sales += $valueSales['total_type'] ?>
                                                                                                                                    <?php $totalstockoutpenjualan += $valueSales['total_type'] ?>
                                                                                                                <?php endif ?>
                                                                                            <?php endforeach ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?= $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                            <?php $totalstockakhir += $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                        </td>
                                                                                    </tr>
                                                            <?php endif ?>
                                    <?php endif ?>
            <?php endforeach ?>

            <?php foreach ($getReportDJBDProduksi as $key => $value): ?>

                                <?php if (isset($_GET['year']) && isset($_GET['month'])): ?>
                                                        <?php if ($value['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                <tr>
                                                                                    <td>
                                                                                        DJ + BD Produksi
                                                                                    </td>
                                                                                    <td>
                                                                                        <?= $value['yearmonth'] ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?= $value['total_type'] ?>
                                                                                        <?php $totalpcs += $value['total_type'] ?>
                                                                                    </td>
                                                                                    <td>

                                                                                        <?= number_format($value['total_carat'], 4, '.', '') ?>
                                                                                        <?php $totalcarat += $value['total_carat'] ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?= number_format($value['total_gram'], 2, '.', ',') ?>
                                                                                        <?php $totalgram += $value['total_gram'] ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?= number_format($value['total_cogm'], 0, ',', ',') ?>
                                                                                        <?php $totalcogm += $value['total_cogm'] ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?= number_format($value['total_pricenet'], 0, ',', ',') ?>
                                                                                        <?php $totalnet += $value['total_pricenet'] ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?= number_format($value['total_priceusr'], 0, ',', ',') ?>
                                                                                        <?php $totalusernet += $value['total_priceusr'] ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?= $value['total_type'] ?>
                                                                                        <?php $totalstockinbuyback += $value['total_type'] ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php
                                                                                        $total_buyback = 0;
                                                                                        $total_sales = 0;
                                                                                        ?>
                                                                                        <?php foreach ($getReportDJBDProduksiBuyback as $key => $valueBuyback): ?>
                                                                                                            <?php if ($valueBuyback['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                                <?= $valueBuyback['total_type'] ?>
                                                                                                                                <?php $total_buyback += $valueBuyback['total_type'] ?>
                                                                                                            <?php endif ?>
                                                                                        <?php endforeach ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php foreach ($getReportDJBDProduksiSales as $key => $valueSales): ?>
                                                                                                            <?php if ($valueSales['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                                <?= $valueSales['total_type'] ?>
                                                                                                                                <?php $total_sales += $valueSales['total_type'] ?>
                                                                                                            <?php endif ?>
                                                                                        <?php endforeach ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?= $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                    </td>
                                                                                </tr>
                                                        <?php endif ?>
                                <?php else: ?>
                                                    <?php if ($value['yearmonth'] == date('Y-m')): ?>
                                                                        <tr>
                                                                            <td>
                                                                                DJ + BD Produksi
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['yearmonth'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['total_type'] ?>
                                                                                <?php $totalpcs += $value['total_type'] ?>
                                                                            </td>
                                                                            <td>

                                                                                <?= number_format($value['total_carat'], 4, '.', '') ?>
                                                                                <?php $totalcarat += $value['total_carat'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_gram'], 2, '.', ',') ?>
                                                                                <?php $totalgram += $value['total_gram'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_cogm'], 0, ',', ',') ?>
                                                                                <?php $totalcogm += $value['total_cogm'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_pricenet'], 0, ',', ',') ?>
                                                                                <?php $totalnet += $value['total_pricenet'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_priceusr'], 0, ',', ',') ?>
                                                                                <?php $totalusernet += $value['total_priceusr'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['total_type'] ?>
                                                                                <?php $totalstockinbuyback += $value['total_type'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                $total_buyback = 0;
                                                                                $total_sales = 0;
                                                                                ?>
                                                                                <?php foreach ($getReportDJBDProduksiBuyback as $key => $valueBuyback): ?>
                                                                                                    <?php if ($valueBuyback['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                        <?= $valueBuyback['total_type'] ?>
                                                                                                                        <?php $total_buyback += $valueBuyback['total_type'] ?>
                                                                                                    <?php endif ?>
                                                                                <?php endforeach ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php foreach ($getReportDJBDProduksiSales as $key => $valueSales): ?>
                                                                                                    <?php if ($valueSales['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                        <?= $valueSales['total_type'] ?>
                                                                                                                        <?php $total_sales += $valueSales['total_type'] ?>
                                                                                                    <?php endif ?>
                                                                                <?php endforeach ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                            </td>
                                                                        </tr>                                                          
                                                    <?php endif ?>
                                <?php endif ?>
                                                                                      
            <?php endforeach ?>

            <?php foreach ($getReportDJBeli as $key => $value): ?>

                                <?php if (isset($_GET['year']) && isset($_GET['month'])): ?>
                                                    <?php if ($value['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                        <tr>
                                                                            <td>
                                                                                DJ Beli
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['yearmonth'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['total_type'] ?>
                                                                                <?php $totalpcs += $value['total_type'] ?>
                                                                            </td>
                                                                            <td>

                                                                                <?= number_format($value['total_carat'], 4, '.', '') ?>
                                                                                <?php $totalcarat += $value['total_carat'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_gram'], 2, '.', ',') ?>
                                                                                <?php $totalgram += $value['total_gram'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_cogm'], 0, ',', ',') ?>
                                                                                <?php $totalcogm += $value['total_cogm'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_pricenet'], 0, ',', ',') ?>
                                                                                <?php $totalnet += $value['total_pricenet'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_priceusr'], 0, ',', ',') ?>
                                                                                <?php $totalusernet += $value['total_priceusr'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['total_type'] ?>
                                                                                <?php $totalstockinbuyback += $value['total_type'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                $total_buyback = 0;
                                                                                $total_sales = 0;
                                                                                ?>
                                                                                <?php foreach ($getReportDJBeliBuyback as $key => $valueBuyback): ?>
                                                                                                    <?php if ($valueBuyback['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                        <?= $valueBuyback['total_type'] ?>
                                                                                                                        <?php $total_buyback += $valueBuyback['total_type'] ?>
                                                                                                                        <?php $totalstockinbuyback += $valueBuyback['total_type'] ?>
                                                                                                    <?php endif ?>
                                                                                <?php endforeach ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php foreach ($getReportDJBeliSales as $key => $valueSales): ?>
                                                                                                    <?php if ($valueSales['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                        <?= $valueSales['total_type'] ?>
                                                                                                                        <?php $total_sales += $valueSales['total_type'] ?>
                                                                                                                        <?php $totalstockoutpenjualan += $valueSales['total_type'] ?>
                                                                                                    <?php endif ?>
                                                                                <?php endforeach ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                <?php $totalstockakhir += $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                            </td>
                                                                        </tr>
                                                    <?php endif ?>
                                <?php else: ?>
                                                    <?php if ($value['yearmonth'] == date('Y-m')): ?>
                                                                        <tr>
                                                                            <td>
                                                                                DJ Beli
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['yearmonth'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['total_type'] ?>
                                                                                <?php $totalpcs += $value['total_type'] ?>
                                                                            </td>
                                                                            <td>

                                                                                <?= number_format($value['total_carat'], 4, '.', '') ?>
                                                                                <?php $totalcarat += $value['total_carat'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_gram'], 2, '.', ',') ?>
                                                                                <?php $totalgram += $value['total_gram'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_cogm'], 0, ',', ',') ?>
                                                                                <?php $totalcogm += $value['total_cogm'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_pricenet'], 0, ',', ',') ?>
                                                                                <?php $totalnet += $value['total_pricenet'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_priceusr'], 0, ',', ',') ?>
                                                                                <?php $totalusernet += $value['total_priceusr'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['total_type'] ?>
                                                                                <?php $totalstockinbuyback += $value['total_type'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                $total_buyback = 0;
                                                                                $total_sales = 0;
                                                                                ?>
                                                                                <?php foreach ($getReportDJBeliBuyback as $key => $valueBuyback): ?>
                                                                                                    <?php if ($valueBuyback['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                        <?= $valueBuyback['total_type'] ?>
                                                                                                                        <?php $total_buyback += $valueBuyback['total_type'] ?>
                                                                                                                        <?php $totalstockinbuyback += $valueBuyback['total_type'] ?>
                                                                                                    <?php endif ?>
                                                                                <?php endforeach ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php foreach ($getReportDJBeliSales as $key => $valueSales): ?>
                                                                                                    <?php if ($valueSales['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                        <?= $valueSales['total_type'] ?>
                                                                                                                        <?php $total_sales += $valueSales['total_type'] ?>
                                                                                                                        <?php $totalstockoutpenjualan += $valueSales['total_type'] ?>
                                                                                                    <?php endif ?>
                                                                                <?php endforeach ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                <?php $totalstockakhir += $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                            </td>
                                                                        </tr>
                                                    <?php endif ?>
                                <?php endif ?>
            <?php endforeach ?>

            <?php foreach ($getReportDJGSBeli as $key => $value): ?>

                                <?php if (isset($_GET['year']) && isset($_GET['month'])): ?>
                                                    <?php if ($value['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                        <tr>
                                                                            <td>
                                                                                DJ + GS Beli
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['yearmonth'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['total_type'] ?>
                                                                                <?php $totalpcs += $value['total_type'] ?>
                                                                            </td>
                                                                            <td>

                                                                                <?= number_format($value['total_carat'], 4, '.', '') ?>
                                                                                <?php $totalcarat += $value['total_carat'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_gram'], 2, '.', ',') ?>
                                                                                <?php $totalgram += $value['total_gram'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_cogm'], 0, ',', ',') ?>
                                                                                <?php $totalcogm += $value['total_cogm'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_pricenet'], 0, ',', ',') ?>
                                                                                <?php $totalnet += $value['total_pricenet'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_priceusr'], 0, ',', ',') ?>
                                                                                <?php $totalusernet += $value['total_priceusr'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['total_type'] ?>
                                                                                <?php $totalstockinbuyback += $value['total_type'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                $total_buyback = 0;
                                                                                $total_sales = 0;
                                                                                ?>
                                                                                <?php foreach ($getReportDJGSBeliBuyback as $key => $valueBuyback): ?>
                                                                                                    <?php if ($valueBuyback['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                        <?= $valueBuyback['total_type'] ?>
                                                                                                                        <?php $total_buyback += $valueBuyback['total_type'] ?>
                                                                                                                        <?php $totalstockinbuyback += $valueBuyback['total_type'] ?>
                                                                                                    <?php endif ?>
                                                                                <?php endforeach ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php foreach ($getReportDJGSBeliSales as $key => $valueSales): ?>
                                                                                                    <?php if ($valueSales['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                        <?= $valueSales['total_type'] ?>
                                                                                                                        <?php $total_sales += $valueSales['total_type'] ?>
                                                                                                                        <?php $totalstockoutpenjualan += $valueSales['total_type'] ?>
                                                                                                    <?php endif ?>
                                                                                <?php endforeach ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                <?php $totalstockakhir += $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                            </td>
                                                                        </tr>
                                                    <?php endif ?>
                                <?php else: ?>
                                                    <?php if ($value['yearmonth'] == date('Y-m')): ?>
                                                                        <tr>
                                                                            <td>
                                                                                DJ + GS Beli
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['yearmonth'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['total_type'] ?>
                                                                                <?php $totalpcs += $value['total_type'] ?>
                                                                            </td>
                                                                            <td>

                                                                                <?= number_format($value['total_carat'], 4, '.', '') ?>
                                                                                <?php $totalcarat += $value['total_carat'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_gram'], 2, '.', ',') ?>
                                                                                <?php $totalgram += $value['total_gram'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_cogm'], 0, ',', ',') ?>
                                                                                <?php $totalcogm += $value['total_cogm'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_pricenet'], 0, ',', ',') ?>
                                                                                <?php $totalnet += $value['total_pricenet'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_priceusr'], 0, ',', ',') ?>
                                                                                <?php $totalusernet += $value['total_priceusr'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['total_type'] ?>
                                                                                <?php $totalstockinbuyback += $value['total_type'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                $total_buyback = 0;
                                                                                $total_sales = 0;
                                                                                ?>
                                                                                <?php foreach ($getReportDJGSBeliBuyback as $key => $valueBuyback): ?>
                                                                                                    <?php if ($valueBuyback['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                        <?= $valueBuyback['total_type'] ?>
                                                                                                                        <?php $total_buyback += $valueBuyback['total_type'] ?>
                                                                                                                        <?php $totalstockinbuyback += $valueBuyback['total_type'] ?>
                                                                                                    <?php endif ?>
                                                                                <?php endforeach ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php foreach ($getReportDJGSBeliSales as $key => $valueSales): ?>
                                                                                                    <?php if ($valueSales['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                        <?= $valueSales['total_type'] ?>
                                                                                                                        <?php $total_sales += $valueSales['total_type'] ?>
                                                                                                                        <?php $totalstockoutpenjualan += $valueSales['total_type'] ?>
                                                                                                    <?php endif ?>
                                                                                <?php endforeach ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                <?php $totalstockakhir += $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                            </td>
                                                                        </tr>
                                                    <?php endif ?>
                                <?php endif ?>
            <?php endforeach ?>

            <?php foreach ($getReportDDBeli as $key => $value): ?>

                                <?php if (isset($_GET['year']) && isset($_GET['month'])): ?>
                                                    <?php if ($value['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                        <tr>
                                                                            <td>
                                                                                DD Beli
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['yearmonth'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['total_type'] ?>
                                                                                <?php $totalpcs += $value['total_type'] ?>
                                                                            </td>
                                                                            <td>

                                                                                <?= number_format($value['total_carat'], 4, '.', '') ?>
                                                                                <?php $totalcarat += $value['total_carat'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_gram'], 2, '.', ',') ?>
                                                                                <?php $totalgram += $value['total_gram'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_cogm'], 0, ',', ',') ?>
                                                                                <?php $totalcogm += $value['total_cogm'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_pricenet'], 0, ',', ',') ?>
                                                                                <?php $totalnet += $value['total_pricenet'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_priceusr'], 0, ',', ',') ?>
                                                                                <?php $totalusernet += $value['total_priceusr'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['total_type'] ?>
                                                                                <?php $totalstockinbuyback += $value['total_type'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                $total_buyback = 0;
                                                                                $total_sales = 0;
                                                                                ?>
                                                                                <?php foreach ($getReportDDBeliBuyback as $key => $valueBuyback): ?>
                                                                                                    <?php if ($valueBuyback['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                        <?= $valueBuyback['total_type'] ?>
                                                                                                                        <?php $total_buyback += $valueBuyback['total_type'] ?>
                                                                                                                        <?php $totalstockinbuyback += $valueBuyback['total_type'] ?>
                                                                                                    <?php endif ?>
                                                                                <?php endforeach ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php foreach ($getReportDDBeliSales as $key => $valueSales): ?>
                                                                                                    <?php if ($valueSales['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                        <?= $valueSales['total_type'] ?>
                                                                                                                        <?php $total_sales += $valueSales['total_type'] ?>
                                                                                                                        <?php $totalstockoutpenjualan += $valueSales['total_type'] ?>
                                                                                                    <?php endif ?>
                                                                                <?php endforeach ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                <?php $totalstockakhir += $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                            </td>
                                                                        </tr>
                                                    <?php endif ?>
                                <?php else: ?>
                                                    <?php if ($value['yearmonth'] == date('Y-m')): ?>
                                                                        <tr>
                                                                            <td>
                                                                                DD Beli
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['yearmonth'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['total_type'] ?>
                                                                                <?php $totalpcs += $value['total_type'] ?>
                                                                            </td>
                                                                            <td>

                                                                                <?= number_format($value['total_carat'], 4, '.', '') ?>
                                                                                <?php $totalcarat += $value['total_carat'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_gram'], 2, '.', ',') ?>
                                                                                <?php $totalgram += $value['total_gram'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_cogm'], 0, ',', ',') ?>
                                                                                <?php $totalcogm += $value['total_cogm'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_pricenet'], 0, ',', ',') ?>
                                                                                <?php $totalnet += $value['total_pricenet'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_priceusr'], 0, ',', ',') ?>
                                                                                <?php $totalusernet += $value['total_priceusr'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['total_type'] ?>
                                                                                <?php $totalstockinbuyback += $value['total_type'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                $total_buyback = 0;
                                                                                $total_sales = 0;
                                                                                ?>
                                                                                <?php foreach ($getReportDDBeliBuyback as $key => $valueBuyback): ?>
                                                                                                    <?php if ($valueBuyback['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                        <?= $valueBuyback['total_type'] ?>
                                                                                                                        <?php $total_buyback += $valueBuyback['total_type'] ?>
                                                                                                                        <?php $totalstockinbuyback += $valueBuyback['total_type'] ?>
                                                                                                    <?php endif ?>
                                                                                <?php endforeach ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php foreach ($getReportDDBeliSales as $key => $valueSales): ?>
                                                                                                    <?php if ($valueSales['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                        <?= $valueSales['total_type'] ?>
                                                                                                                        <?php $total_sales += $valueSales['total_type'] ?>
                                                                                                                        <?php $totalstockoutpenjualan += $valueSales['total_type'] ?>
                                                                                                    <?php endif ?>
                                                                                <?php endforeach ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                <?php $totalstockakhir += $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                            </td>
                                                                        </tr>
                                                    <?php endif ?>
                                <?php endif ?>
            <?php endforeach ?>

            <?php foreach ($getReportDJBDBeli as $key => $value): ?>

                                <?php if (isset($_GET['year']) && isset($_GET['month'])): ?>
                                                    <?php if ($value['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                        <tr>
                                                                            <td>
                                                                                DJ + BD Beli
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['yearmonth'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['total_type'] ?>
                                                                                <?php $totalpcs += $value['total_type'] ?>
                                                                            </td>
                                                                            <td>

                                                                                <?= number_format($value['total_carat'], 4, '.', '') ?>
                                                                                <?php $totalcarat += $value['total_carat'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_gram'], 2, '.', ',') ?>
                                                                                <?php $totalgram += $value['total_gram'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_cogm'], 0, ',', ',') ?>
                                                                                <?php $totalcogm += $value['total_cogm'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_pricenet'], 0, ',', ',') ?>
                                                                                <?php $totalnet += $value['total_pricenet'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_priceusr'], 0, ',', ',') ?>
                                                                                <?php $totalusernet += $value['total_priceusr'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['total_type'] ?>
                                                                                <?php $totalstockinbuyback += $value['total_type'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                $total_buyback = 0;
                                                                                $total_sales = 0;
                                                                                ?>
                                                                                <?php foreach ($getReportDJBDBeliBuyback as $key => $valueBuyback): ?>
                                                                                                    <?php if ($valueBuyback['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                        <?= $valueBuyback['total_type'] ?>
                                                                                                                        <?php $total_buyback += $valueBuyback['total_type'] ?>
                                                                                                                        <?php $totalstockinbuyback += $valueBuyback['total_type'] ?>
                                                                                                    <?php endif ?>
                                                                                <?php endforeach ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php foreach ($getReportDJBDBeliSales as $key => $valueSales): ?>
                                                                                                    <?php if ($valueSales['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                        <?= $valueSales['total_type'] ?>
                                                                                                                        <?php $total_sales += $valueSales['total_type'] ?>
                                                                                                                        <?php $totalstockoutpenjualan += $valueSales['total_type'] ?>
                                                                                                    <?php endif ?>
                                                                                <?php endforeach ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                <?php $totalstockakhir += $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                            </td>
                                                                        </tr>
                                                    <?php endif ?>
                                <?php else: ?>
                                                    <?php if ($value['yearmonth'] == date('Y-m')): ?>
                                                                        <tr>
                                                                            <td>
                                                                                DJ + BD Beli
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['yearmonth'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['total_type'] ?>
                                                                                <?php $totalpcs += $value['total_type'] ?>
                                                                            </td>
                                                                            <td>

                                                                                <?= number_format($value['total_carat'], 4, '.', '') ?>
                                                                                <?php $totalcarat += $value['total_carat'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_gram'], 2, '.', ',') ?>
                                                                                <?php $totalgram += $value['total_gram'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_cogm'], 0, ',', ',') ?>
                                                                                <?php $totalcogm += $value['total_cogm'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_pricenet'], 0, ',', ',') ?>
                                                                                <?php $totalnet += $value['total_pricenet'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= number_format($value['total_priceusr'], 0, ',', ',') ?>
                                                                                <?php $totalusernet += $value['total_priceusr'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['total_type'] ?>
                                                                                <?php $totalstockinbuyback += $value['total_type'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                $total_buyback = 0;
                                                                                $total_sales = 0;
                                                                                ?>
                                                                                <?php foreach ($getReportDJBDBeliBuyback as $key => $valueBuyback): ?>
                                                                                                    <?php if ($valueBuyback['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                        <?= $valueBuyback['total_type'] ?>
                                                                                                                        <?php $total_buyback += $valueBuyback['total_type'] ?>
                                                                                                                        <?php $totalstockinbuyback += $valueBuyback['total_type'] ?>
                                                                                                    <?php endif ?>
                                                                                <?php endforeach ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php foreach ($getReportDJBDBeliSales as $key => $valueSales): ?>
                                                                                                    <?php if ($valueSales['yearmonth'] == $_GET['year'] . '-' . $_GET['month']): ?>
                                                                                                                        <?= $valueSales['total_type'] ?>
                                                                                                                        <?php $total_sales += $valueSales['total_type'] ?>
                                                                                                                        <?php $totalstockoutpenjualan += $valueSales['total_type'] ?>
                                                                                                    <?php endif ?>
                                                                                <?php endforeach ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                                <?php $totalstockakhir += $value['total_type'] + $value['total_type'] + $total_buyback - $total_sales ?>
                                                                            </td>
                                                                        </tr>
                                                    <?php endif ?>
                                <?php endif ?>
            <?php endforeach ?>
            <tr>
                <td>Total</td>
                <td>
                    <?php if (isset($_GET['year']) && isset($_GET['month'])): ?>
                                        <?= $_GET['year'] . '-' . $_GET['month'] ?>
                    <?php else: ?>
                                        <?= date('Y-m') ?>
                    <?php endif ?>
                </td>
                <td>
                    <?= $totalpcs ?>
                </td>
                <td>
                    <?= number_format($totalcarat, 0, '.', '') ?>
                </td>
                <td>
                    <?= number_format($totalgram, 0, '.', ',') ?>
                </td>
                <td>
                    <?= number_format($totalcogm, 0, ',', ',') ?>
                </td>
                <td>
                    <?= number_format($totalnet, 0, ',', ',') ?>
                </td>
                <td>
                    <?= number_format($totalusernet, 0, ',', ',') ?>
                </td>
                <td>
                    <?= $totalstockinbeli ?>
                </td>
                <td>
                    <?= $totalstockinbuyback ?>
                </td>
                <td>
                    <?= $totalstockoutpenjualan ?>
                </td>
                <td>
                    <?= $totalstockakhir ?>
                </td>
            </tr>
        </tbody>
    </table>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
             'excel'
        ]
    } );
} );
    </script>
</body>

</html>