<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomModel extends Model
{
    // public function getReportLs()
    // {
    //     $query = $this->db->table('stock_awal_ls');
    //     $query->join('product_ls', 'product_ls.code = stock_awal_ls.code');
    //     $query->select('product_ls.type, ,DATE_FORMAT(product_ls.purchasedt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
    //     $query->selectSum('product_ls.priceusr', 'total_priceusr');
    //     $query->selectSum('product_ls.pricenet', 'total_pricenet');
    //     $query->groupBy(['product_ls.type', 'yearmonth']);
    //     $query->orderBy('product_ls.type', 'ASC');
    //     $query->orderBy('yearmonth', 'DESC');
    //     return $query->get()->getResultArray();
    // }

    public function getReportLsGeneric()
    {
        $query = $this->db->table('product_ls');
        $query->join('stock_awal_ls', 'stock_awal_ls.code = product_ls.code', 'left');
        $query->select('product_ls.type, DATE_FORMAT(product_ls.purchasedt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('product_ls.type', '1');
        $query->selectSum('product_ls.weight', 'total_weight');
        $query->selectSum('product_ls.priceusr', 'total_priceusr');
        $query->selectSum('product_ls.pricenet', 'total_pricenet');
        $query->groupBy(['yearmonth']);
        $query->orderBy('product_ls.type', 'ASC');
        $query->orderBy('yearmonth', 'DESC');
        return $query->get()->getResultArray();
    }

    public function getReportLsGemstone()
    {
        $query = $this->db->table('stock_awal_ls');
        $query->join('product_ls', 'product_ls.code = stock_awal_ls.code');
        $query->select('product_ls.type, DATE_FORMAT(product_ls.purchasedt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('product_ls.type', '2');
        $query->selectSum('product_ls.weight', 'total_weight');
        $query->selectSum('product_ls.priceusr', 'total_priceusr');
        $query->selectSum('product_ls.pricenet', 'total_pricenet');
        $query->groupBy(['yearmonth']);
        $query->orderBy('product_ls.type', 'ASC');
        $query->orderBy('yearmonth', 'DESC');
        return $query->get()->getResultArray();
    }

    public function getReportLsDossier()
    {
        $query = $this->db->table('stock_awal_ls');
        $query->join('product_ls', 'product_ls.code = stock_awal_ls.code');
        $query->select('product_ls.type, DATE_FORMAT(product_ls.purchasedt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('product_ls.type', '3');
        $query->selectSum('product_ls.weight', 'total_weight');
        $query->selectSum('product_ls.priceusr', 'total_priceusr');
        $query->selectSum('product_ls.pricenet', 'total_pricenet');
        $query->groupBy(['yearmonth']);
        $query->orderBy('product_ls.type', 'ASC');
        $query->orderBy('yearmonth', 'DESC');
        return $query->get()->getResultArray();
    }

    public function getReportLsBranded()
    {
        $query = $this->db->table('stock_awal_ls');
        $query->join('product_ls', 'product_ls.code = stock_awal_ls.code');
        $query->select('product_ls.type, DATE_FORMAT(product_ls.purchasedt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('product_ls.type', '4');
        $query->selectSum('product_ls.weight', 'total_weight');
        $query->selectSum('product_ls.priceusr', 'total_priceusr');
        $query->selectSum('product_ls.pricenet', 'total_pricenet');
        $query->groupBy(['yearmonth']);
        $query->orderBy('product_ls.type', 'ASC');
        $query->orderBy('yearmonth', 'DESC');
        return $query->get()->getResultArray();
    }

    public function getReportDJProduksi()
    {
        $query = $this->db->table('product_dj');
        $query->join('stock_awal_dj', 'stock_awal_dj.code = product_dj.code', 'left');
        $query->select('DATE_FORMAT(product_dj.purchasedt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('product_dj.isproduction', '1');
        $query->where('product_dj.type', 'DJ');
        $query->orWhere('product_dj.type', 'DJ,LS');
        $query->selectSum('product_dj.priceusr', 'total_priceusr');
        $query->selectSum('product_dj.pricenet', 'total_pricenet');
        $query->selectSum('product_dj.weightg', 'total_carat');
        $query->selectSum('product_dj.weightm', 'total_gram');
        $query->selectSum('product_dj.cogm', 'total_cogm');
        $query->groupBy(['yearmonth']);
        $query->orderBy('yearmonth', 'DESC');


        return $query->get()->getResultArray();
    }

    public function getReportDJGSProduksi()
    {
        $query = $this->db->table('stock_awal_dj');
        $query->join('product_dj', 'product_dj.code = stock_awal_dj.code');
        $query->select('DATE_FORMAT(product_dj.purchasedt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('product_dj.isproduction', '1');
        $query->where('product_dj.type', 'DJ,GS');
        $query->orWhere('product_dj.type', 'DJ,GS,LS');
        $query->selectSum('product_dj.priceusr', 'total_priceusr');
        $query->selectSum('product_dj.pricenet', 'total_pricenet');
        $query->selectSum('product_dj.weightg', 'total_carat');
        $query->selectSum('product_dj.weightm', 'total_gram');
        $query->selectSum('product_dj.cogm', 'total_cogm');
        $query->groupBy(['yearmonth']);
        $query->orderBy('yearmonth', 'DESC');

        return $query->get()->getResultArray();
    }

    public function getReportDDProduksi()
    {
        $query = $this->db->table('stock_awal_dj');
        $query->join('product_dj', 'product_dj.code = stock_awal_dj.code');
        $query->select('DATE_FORMAT(product_dj.purchasedt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('product_dj.isproduction', '1');
        $query->where('product_dj.type', 'DD');
        $query->selectSum('product_dj.priceusr', 'total_priceusr');
        $query->selectSum('product_dj.pricenet', 'total_pricenet');
        $query->selectSum('product_dj.weightg', 'total_carat');
        $query->selectSum('product_dj.weightm', 'total_gram');
        $query->selectSum('product_dj.cogm', 'total_cogm');
        $query->groupBy(['yearmonth']);
        $query->orderBy('yearmonth', 'DESC');

        return $query->get()->getResultArray();
    }

    public function getReportDJBDProduksi()
    {
        $query = $this->db->table('stock_awal_dj');
        $query->join('product_dj', 'product_dj.code = stock_awal_dj.code');
        $query->select('DATE_FORMAT(product_dj.purchasedt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('product_dj.isproduction', '1');
        $query->where('product_dj.type', 'BD');
        $query->selectSum('product_dj.priceusr', 'total_priceusr');
        $query->selectSum('product_dj.pricenet', 'total_pricenet');
        $query->selectSum('product_dj.weightg', 'total_carat');
        $query->selectSum('product_dj.weightm', 'total_gram');
        $query->selectSum('product_dj.cogm', 'total_cogm');
        $query->groupBy(['yearmonth']);
        $query->orderBy('yearmonth', 'DESC');

        return $query->get()->getResultArray();
    }

    // Beli
    public function getReportDJBeli()
    {
        $query = $this->db->table('product_dj');
        $query->join('stock_awal_dj', 'stock_awal_dj.code = product_dj.code', 'left');
        $query->select('DATE_FORMAT(product_dj.purchasedt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('product_dj.type', 'DJ');
        $query->where('product_dj.isproduction', '0');
        $query->orWhere('product_dj.type', 'DJ,LS');
        $query->selectSum('product_dj.priceusr', 'total_priceusr');
        $query->selectSum('product_dj.pricenet', 'total_pricenet');
        $query->selectSum('product_dj.weightg', 'total_carat');
        $query->selectSum('product_dj.weightm', 'total_gram');
        $query->selectSum('product_dj.cogm', 'total_cogm');
        $query->groupBy(['yearmonth']);
        $query->orderBy('yearmonth', 'DESC');

        return $query->get()->getResultArray();
    }

    public function getReportDJGSBeli()
    {
        $query = $this->db->table('stock_awal_dj');
        $query->join('product_dj', 'product_dj.code = stock_awal_dj.code');
        $query->select('DATE_FORMAT(product_dj.purchasedt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('product_dj.type', 'DJ,GS');
        $query->where('product_dj.isproduction', '0');
        $query->orWhere('product_dj.type', 'DJ,GS,LS');
        $query->selectSum('product_dj.priceusr', 'total_priceusr');
        $query->selectSum('product_dj.pricenet', 'total_pricenet');
        $query->selectSum('product_dj.weightg', 'total_carat');
        $query->selectSum('product_dj.weightm', 'total_gram');
        $query->selectSum('product_dj.cogm', 'total_cogm');
        $query->groupBy(['yearmonth']);
        $query->orderBy('yearmonth', 'DESC');

        return $query->get()->getResultArray();
    }

    public function getReportDDBeli()
    {
        $query = $this->db->table('stock_awal_dj');
        $query->join('product_dj', 'product_dj.code = stock_awal_dj.code');
        $query->select('DATE_FORMAT(product_dj.purchasedt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('product_dj.isproduction', '0');
        $query->where('product_dj.type', 'DD');
        $query->selectSum('product_dj.priceusr', 'total_priceusr');
        $query->selectSum('product_dj.pricenet', 'total_pricenet');
        $query->selectSum('product_dj.weightg', 'total_carat');
        $query->selectSum('product_dj.weightm', 'total_gram');
        $query->selectSum('product_dj.cogm', 'total_cogm');
        $query->groupBy(['yearmonth']);
        $query->orderBy('yearmonth', 'DESC');

        return $query->get()->getResultArray();
    }

    public function getReportDJBDBeli()
    {
        $query = $this->db->table('stock_awal_dj');
        $query->join('product_dj', 'product_dj.code = stock_awal_dj.code');
        $query->select('DATE_FORMAT(product_dj.purchasedt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('product_dj.isproduction', '0');
        $query->where('product_dj.type', 'BD');
        $query->selectSum('product_dj.priceusr', 'total_priceusr');
        $query->selectSum('product_dj.pricenet', 'total_pricenet');
        $query->selectSum('product_dj.weightg', 'total_carat');
        $query->selectSum('product_dj.weightm', 'total_gram');
        $query->selectSum('product_dj.cogm', 'total_cogm');
        $query->groupBy(['yearmonth']);
        $query->orderBy('yearmonth', 'DESC');

        return $query->get()->getResultArray();
    }

    public function getReportLsGenericBuyback()
    {
        $query = $this->db->table('buyback_ls');
        $query->select('DATE_FORMAT(buyback_ls.buybackdt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('buyback_ls.type', '1');
        $query->groupBy(['yearmonth']);
        $query->orderBy('yearmonth', 'DESC');

        return $query->get()->getResultArray();
    }

    public function getReportLsGenericSales()
    {
        $query = $this->db->table('sales_ls');
        $query->select('DATE_FORMAT(sales_ls.salesdt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('sales_ls.type', '1');
        $query->groupBy(['yearmonth']);
        $query->orderBy('yearmonth', 'DESC');

        return $query->get()->getResultArray();
    }

    public function getReportLsGemstoneBuyback()
    {
        $query = $this->db->table('buyback_ls');
        $query->select('DATE_FORMAT(buyback_ls.buybackdt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('buyback_ls.type', '2');
        $query->groupBy(['yearmonth']);
        $query->orderBy('yearmonth', 'DESC');

        return $query->get()->getResultArray();
    }

    public function getReportLsGemstoneSales()
    {
        $query = $this->db->table('sales_ls');
        $query->select('DATE_FORMAT(sales_ls.salesdt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('sales_ls.type', '2');
        $query->groupBy(['yearmonth']);
        $query->orderBy('yearmonth', 'DESC');

        return $query->get()->getResultArray();
    }

    public function getReportLsDossierBuyback()
    {
        $query = $this->db->table('buyback_ls');
        // $query->select('DATE_FORMAT(buyback_ls.buybackdt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('buyback_ls.type', '3');
        // $query->groupBy(['yearmonth']);
        // $query->orderBy('yearmonth', 'DESC');

        return $query->get()->getResultArray();
    }

    public function getReportLsDossierSales()
    {
        $query = $this->db->table('sales_ls');
        $query->select('DATE_FORMAT(sales_ls.salesdt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('sales_ls.type', '3');
        $query->groupBy(['yearmonth']);
        $query->orderBy('yearmonth', 'DESC');

        return $query->get()->getResultArray();
    }

    public function getReportLsBrandedBuyback()
    {
        $query = $this->db->table('buyback_ls');
        $query->select('DATE_FORMAT(buyback_ls.buybackdt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('buyback_ls.type', '4');
        $query->groupBy(['yearmonth']);
        $query->orderBy('yearmonth', 'DESC');

        return $query->get()->getResultArray();
    }

    public function getReportLsBrandedSales()
    {
        $query = $this->db->table('sales_ls');
        $query->select('DATE_FORMAT(sales_ls.salesdt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('sales_ls.type', '4');
        $query->groupBy(['yearmonth']);
        $query->orderBy('yearmonth', 'DESC');

        return $query->get()->getResultArray();
    }

    public function getReportDJProduksiBuyback()
    {
        $query = $this->db->table('buyback_dj');
        $query->select('DATE_FORMAT(buyback_dj.buybackdt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('buyback_dj.isproduction', '1');
        $query->where('buyback_dj.type', 'DJ');
        $query->orWhere('buyback_dj.type', 'DJ, LS');
        $query->groupBy(['yearmonth']);
        $query->orderBy('yearmonth', 'DESC');



        return $query->get()->getResultArray();
    }

    public function getReportDJProduksiSales()
    {
        $query = $this->db->table('sales_dj');
        $query->select('DATE_FORMAT(sales_dj.salesdt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('sales_dj.isproduction', '1');
        $query->where('sales_dj.type', 'DJ');
        $query->orWhere('sales_dj.type', 'DJ, LS');
        $query->groupBy(['yearmonth']);
        $query->orderBy('yearmonth', 'DESC');

        return $query->get()->getResultArray();
    }

    public function getReportDJGSProduksiBuyback()
    {
        $query = $this->db->table('buyback_dj');
        $query->select('DATE_FORMAT(buyback_dj.buybackdt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('buyback_dj.isproduction', '1');
        $query->where('buyback_dj.type', 'DJ,GS');
        $query->orWhere('buyback_dj.type', 'DJ,GS,LS');
        $query->groupBy(['yearmonth']);
        $query->orderBy('yearmonth', 'DESC');

        return $query->get()->getResultArray();
    }

    public function getReportDJGSProduksiSales()
    {
        $query = $this->db->table('sales_dj');
        $query->select('DATE_FORMAT(sales_dj.salesdt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('sales_dj.isproduction', '1');
        $query->where('sales_dj.type', 'DJ,GS');
        $query->orWhere('sales_dj.type', 'DJ,GS,LS');
        $query->groupBy(['yearmonth']);
        $query->orderBy('yearmonth', 'DESC');

        return $query->get()->getResultArray();
    }

    public function getReportDDProduksiBuyback()
    {
        $query = $this->db->table('buyback_dj');
        $query->select('DATE_FORMAT(buyback_dj.buybackdt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('buyback_dj.isproduction', '1');
        $query->where('buyback_dj.type', 'DD');
        $query->groupBy(['yearmonth']);
        $query->orderBy('yearmonth', 'DESC');

        return $query->get()->getResultArray();
    }

    public function getReportDDProduksiSales()
    {
        $query = $this->db->table('sales_dj');
        $query->select('DATE_FORMAT(sales_dj.salesdt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('sales_dj.isproduction', '1');
        $query->where('sales_dj.type', 'DD');
        $query->groupBy(['yearmonth']);
        $query->orderBy('yearmonth', 'DESC');

        return $query->get()->getResultArray();
    }

    public function getReportDJBDProduksiBuyback()
    {
        $query = $this->db->table('buyback_dj');
        $query->select('DATE_FORMAT(buyback_dj.buybackdt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('buyback_dj.isproduction', '1');
        $query->where('buyback_dj.type', 'BD');
        $query->groupBy(['yearmonth']);
        $query->orderBy('yearmonth', 'DESC');

        return $query->get()->getResultArray();
    }

    public function getReportDJBDProduksiSales()
    {
        $query = $this->db->table('sales_dj');
        $query->select('DATE_FORMAT(sales_dj.salesdt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('sales_dj.isproduction', '1');
        $query->where('sales_dj.type', 'BD');
        $query->groupBy(['yearmonth']);
        $query->orderBy('yearmonth', 'DESC');

        return $query->get()->getResultArray();
    }

    public function getReportDJBeliBuyback()
    {
        $query = $this->db->table('buyback_dj');
        $query->select('DATE_FORMAT(buyback_dj.buybackdt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('buyback_dj.isproduction', '0');
        $query->where('buyback_dj.type', 'DJ');
        $query->orWhere('buyback_dj.type', 'DJ, LS');
        $query->groupBy(['yearmonth']);
        $query->orderBy('yearmonth', 'DESC');

        return $query->get()->getResultArray();
    }

    public function getReportDJBeliSales()
    {
        $query = $this->db->table('sales_dj');
        $query->select('DATE_FORMAT(sales_dj.salesdt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('sales_dj.isproduction', '0');
        $query->where('sales_dj.type', 'DJ');
        $query->orWhere('sales_dj.type', 'DJ, LS');
        $query->groupBy(['yearmonth']);
        $query->orderBy('yearmonth', 'DESC');

        return $query->get()->getResultArray();
    }

    public function getReportDJGSBeliBuyback()
    {
        $query = $this->db->table('buyback_dj');
        $query->select('DATE_FORMAT(buyback_dj.buybackdt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('buyback_dj.isproduction', '0');
        $query->where('buyback_dj.type', 'DJ,GS');
        $query->orWhere('buyback_dj.type', 'DJ,GS,LS');
        $query->groupBy(['yearmonth']);
        $query->orderBy('yearmonth', 'DESC');

        return $query->get()->getResultArray();
    }

    public function getReportDJGSBeliSales()
    {
        $query = $this->db->table('sales_dj');
        $query->select('DATE_FORMAT(sales_dj.salesdt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('sales_dj.isproduction', '0');
        $query->where('sales_dj.type', 'DJ,GS');
        $query->orWhere('sales_dj.type', 'DJ,GS,LS');
        $query->groupBy(['yearmonth']);
        $query->orderBy('yearmonth', 'DESC');

        return $query->get()->getResultArray();
    }

    public function getReportDDBeliBuyback()
    {
        $query = $this->db->table('buyback_dj');
        $query->select('DATE_FORMAT(buyback_dj.buybackdt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('buyback_dj.isproduction', '0');
        $query->where('buyback_dj.type', 'DD');
        $query->groupBy(['yearmonth']);
        $query->orderBy('yearmonth', 'DESC');

        return $query->get()->getResultArray();
    }

    public function getReportDDBeliSales()
    {
        $query = $this->db->table('sales_dj');
        $query->select('DATE_FORMAT(sales_dj.salesdt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('sales_dj.isproduction', '0');
        $query->where('sales_dj.type', 'DD');
        $query->groupBy(['yearmonth']);
        $query->orderBy('yearmonth', 'DESC');

        return $query->get()->getResultArray();
    }

    public function getReportDJBDBeliBuyback()
    {
        $query = $this->db->table('buyback_dj');
        $query->select('DATE_FORMAT(buyback_dj.buybackdt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('buyback_dj.isproduction', '0');
        $query->where('buyback_dj.type', 'BD');
        $query->groupBy(['yearmonth']);
        $query->orderBy('yearmonth', 'DESC');

        return $query->get()->getResultArray();
    }

    public function getReportDJBDBeliSales()
    {
        $query = $this->db->table('sales_dj');
        $query->select('DATE_FORMAT(sales_dj.salesdt, "%Y-%m") AS yearmonth, COUNT(*) AS total_type');
        $query->where('sales_dj.isproduction', '0');
        $query->where('sales_dj.type', 'BD');
        $query->groupBy(['yearmonth']);
        $query->orderBy('yearmonth', 'DESC');

        return $query->get()->getResultArray();
    }
}