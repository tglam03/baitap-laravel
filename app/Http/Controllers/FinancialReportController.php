<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Expense;
use App\Models\FinancialReport;
use App\Models\Tax;
use Illuminate\Http\Request;

class FinancialReportController extends Controller
{
    public function generateMonthlyReport($month, $year)
    {
        // Tính tổng doanh thu trong tháng
        $totalRevenue = Sale::whereMonth('sale_date', $month)
            ->whereYear('sale_date', $year)
            ->sum('total');

        // Tính tổng chi phí trong tháng
        $totalExpenses = Expense::whereMonth('expense_date', $month)
            ->whereYear('expense_date', $year)
            ->sum('amount');

        // Tính lợi nhuận trước thuế
        $profitBeforeTax = $totalRevenue - $totalExpenses;

        // Tính thuế VAT phải nộp
        $vatRate = Tax::where('name', 'VAT')->first()->rate;
        $taxDue = $profitBeforeTax * ($vatRate / 100);

        // Tính lợi nhuận sau thuế
        $profitAfterTax = $profitBeforeTax - $taxDue;

        // Lưu báo cáo tài chính
        FinancialReport::create([
            'total_revenue' => $totalRevenue,
            'total_expenses' => $totalExpenses,
            'profit_before_tax' => $profitBeforeTax,
            'tax_due' => $taxDue,
            'profit_after_tax' => $profitAfterTax,
            'report_month' => "$year-$month-01" // Ngày đầu tháng
        ]);

        return response()->json([
            'total_revenue' => $totalRevenue,
            'total_expenses' => $totalExpenses,
            'profit_before_tax' => $profitBeforeTax,
            'tax_due' => $taxDue,
            'profit_after_tax' => $profitAfterTax,
        ]);
    }
}
