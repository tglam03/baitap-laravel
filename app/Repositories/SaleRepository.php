<?php

namespace App\Repositories;

use App\Models\Sale;

class SaleRepository
{
    // Hàm lấy tổng doanh thu theo tháng và năm
    public function getSalesByMonthAndYear($month, $year)
    {
        return Sale::whereMonth('sale_date', $month)  // Lọc theo tháng
        ->whereYear('sale_date', $year)   // Lọc theo năm
        ->sum('total');                  // Tính tổng doanh thu
    }

    // Hàm lấy danh sách các giao dịch bán hàng theo tháng và năm
    public function getSalesListByMonthAndYear($month, $year)
    {
        return Sale::whereMonth('sale_date', $month)
            ->whereYear('sale_date', $year)
            ->get();  // Lấy tất cả các giao dịch
    }
}
