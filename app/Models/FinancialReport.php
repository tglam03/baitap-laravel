<?php

namespace App\Models;

class FinancialReport
{
    protected $fillable = [
        'month', 'year', 'total_sales', 'total_expenses',
        'profit_before_tax', 'tax_amount', 'profit_after_tax'
    ];
}
