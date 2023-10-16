<?php

namespace App\Controllers;

use App\Models\CustomModel;
use App\Models\ProductLsModel;
use App\Models\StockAwalLsModel;

class Report extends BaseController
{
    protected $CustomModel;
    protected $ProductLsModel;
    protected $StockAwalLsModel;

    public function __construct()
    {
        $this->CustomModel = new CustomModel();
        $this->ProductLsModel = new ProductLsModel();
        $this->StockAwalLsModel = new StockAwalLsModel();
    }
    public function index()
    {
        $year = $this->request->getVar('year');
        $month = $this->request->getVar('month');

        if ($year == null) {
            $year = date('Y');
        }
        if ($month == null) {
            $month = date('m');
        }

        $startFilter = $year . '-' . $month . '-01';
        $endFilter = $year . '-' . $month . '-31';


        $getReportLsGeneric = $this->CustomModel->getReportLsGeneric();
        // dd($getReportLsGeneric);
        $getReportLsGemstone = $this->CustomModel->getReportLsGemstone();
        $getReportLsDossier = $this->CustomModel->getReportLsDossier();
        $getReportLsBranded = $this->CustomModel->getReportLsBranded();

        $getReportDJProduksi = $this->CustomModel->getReportDJProduksi();
        // dd($getReportDJProduksi);
        $getReportDJGSProduksi = $this->CustomModel->getReportDJGSProduksi();
        $getReportDDProduksi = $this->CustomModel->getReportDDProduksi();
        $getReportDJBDProduksi = $this->CustomModel->getReportDJBDProduksi();
        $getReportDJBeli = $this->CustomModel->getReportDJBeli();
        $getReportDJGSBeli = $this->CustomModel->getReportDJGSBeli();
        $getReportDDBeli = $this->CustomModel->getReportDDBeli();
        $getReportDJBDBeli = $this->CustomModel->getReportDJBDBeli();

        $getReportLsGenericBuyback = $this->CustomModel->getReportLsGenericBuyback();
        $getReportLsGemstoneBuyback = $this->CustomModel->getReportLsGemstoneBuyback();
        $getReportLsDossierBuyback = $this->CustomModel->getReportLsDossierBuyback($startFilter, $endFilter);
        // dd($getReportLsDossierBuyback);
        $getReportLsBrandedBuyback = $this->CustomModel->getReportLsBrandedBuyback();

        $getReportLsGenericSales = $this->CustomModel->getReportLsGenericSales();
        $getReportLsGemstoneSales = $this->CustomModel->getReportLsGemstoneSales();
        $getReportLsDossierSales = $this->CustomModel->getReportLsDossierSales();
        $getReportLsBrandedSales = $this->CustomModel->getReportLsBrandedSales();

        $getReportDJProduksiBuyback = $this->CustomModel->getReportDJProduksiBuyback();
        $getReportDJGSProduksiBuyback = $this->CustomModel->getReportDJGSProduksiBuyback();
        $getReportDDProduksiBuyback = $this->CustomModel->getReportDDProduksiBuyback();
        $getReportDJBDProduksiBuyback = $this->CustomModel->getReportDJBDProduksiBuyback();

        $getReportDJProduksiSales = $this->CustomModel->getReportDJProduksiSales();
        $getReportDJGSProduksiSales = $this->CustomModel->getReportDJGSProduksiSales();
        $getReportDDProduksiSales = $this->CustomModel->getReportDDProduksiSales();
        $getReportDJBDProduksiSales = $this->CustomModel->getReportDJBDProduksiSales();

        $getReportDJBeliBuyback = $this->CustomModel->getReportDJBeliBuyback();
        $getReportDJGSBeliBuyback = $this->CustomModel->getReportDJGSBeliBuyback();
        $getReportDDBeliBuyback = $this->CustomModel->getReportDDBeliBuyback();
        $getReportDJBDBeliBuyback = $this->CustomModel->getReportDJBDBeliBuyback();

        $getReportDJBeliSales = $this->CustomModel->getReportDJBeliSales();
        $getReportDJGSBeliSales = $this->CustomModel->getReportDJGSBeliSales();
        $getReportDDBeliSales = $this->CustomModel->getReportDDBeliSales();
        $getReportDJBDBeliSales = $this->CustomModel->getReportDJBDBeliSales();



        // dd($getReportDJProduksi);
        $data = [
            'title' => 'Report',
            'heading' => 'Report',
            'subheading' => 'Report',
            'getReportLsGeneric' => $getReportLsGeneric,
            'getReportLsGemstone' => $getReportLsGemstone,
            'getReportLsDossier' => $getReportLsDossier,
            'getReportLsBranded' => $getReportLsBranded,
            'getReportDJProduksi' => $getReportDJProduksi,
            'getReportDJGSProduksi' => $getReportDJGSProduksi,
            'getReportDDProduksi' => $getReportDDProduksi,
            'getReportDJBDProduksi' => $getReportDJBDProduksi,
            'getReportDJBeli' => $getReportDJBeli,
            'getReportDJGSBeli' => $getReportDJGSBeli,
            'getReportDDBeli' => $getReportDDBeli,
            'getReportDJBDBeli' => $getReportDJBDBeli,
            'getReportLsGenericBuyback' => $getReportLsGenericBuyback,
            'getReportLsGemstoneBuyback' => $getReportLsGemstoneBuyback,
            'getReportLsDossierBuyback' => $getReportLsDossierBuyback,
            'getReportLsBrandedBuyback' => $getReportLsBrandedBuyback,

            'getReportLsGenericSales' => $getReportLsGenericSales,
            'getReportLsGemstoneSales' => $getReportLsGemstoneSales,
            'getReportLsDossierSales' => $getReportLsDossierSales,
            'getReportLsBrandedSales' => $getReportLsBrandedSales,

            'getReportDJProduksiBuyback' => $getReportDJProduksiBuyback,
            'getReportDJGSProduksiBuyback' => $getReportDJGSProduksiBuyback,
            'getReportDDProduksiBuyback' => $getReportDDProduksiBuyback,
            'getReportDJBDProduksiBuyback' => $getReportDJBDProduksiBuyback,

            'getReportDJProduksiSales' => $getReportDJProduksiSales,
            'getReportDJGSProduksiSales' => $getReportDJGSProduksiSales,
            'getReportDDProduksiSales' => $getReportDDProduksiSales,
            'getReportDJBDProduksiSales' => $getReportDJBDProduksiSales,

            'getReportDJBeliBuyback' => $getReportDJBeliBuyback,
            'getReportDJGSBeliBuyback' => $getReportDJGSBeliBuyback,
            'getReportDDBeliBuyback' => $getReportDDBeliBuyback,
            'getReportDJBDBeliBuyback' => $getReportDJBDBeliBuyback,

            'getReportDJBeliSales' => $getReportDJBeliSales,
            'getReportDJGSBeliSales' => $getReportDJGSBeliSales,
            'getReportDDBeliSales' => $getReportDDBeliSales,
            'getReportDJBDBeliSales' => $getReportDJBDBeliSales,

        ];
        // dd($this->ProductLsModel->findAll());
        return view('report/index', $data);
    }
}