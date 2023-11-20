<?php

namespace App\Exports;

use App\Models\Producto;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProductoExportExcel implements FromView
{
    public function view(): View
    {
        return view('panel.Producto.lista_productos.excel_productos', [
            'productos' => Producto::all()
        ]);
    }
}
