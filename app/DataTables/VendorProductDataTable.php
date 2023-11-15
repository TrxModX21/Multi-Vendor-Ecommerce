<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class VendorProductDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $editBtn = "<a href='" . route('vendor.products.edit', $query->id) . "' class='btn btn-primary'><i class='far fa-edit'></i></a>";

                $deleteBtn = "<a href='" . route('vendor.products.destroy', $query->id) . "' class='btn btn-danger delete-item'><i class='far fa-trash-alt'></i></a>";

                $moreBtn = "<div class='dropdown d-inline dropleft ml-1'>
                <button class='btn btn-primary dropdown-toggle' type='button' id='' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    <i class='fas fa-cog'></i>                    
                </button>
                    <div class='dropdown-menu' x-placement='bottom-start' style='position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;'>
                        <a class='dropdown-item has-icon' href='" . route('root.products-image-gallery.index', ['product' => $query->id]) . "'>
                            <i class='fas fa-heart'></i>
                            Image Gallery                    
                        </a>
                        <a class='dropdown-item has-icon' href='" . route('root.products-variant.index', ['product' => $query->id]) . "'>
                            <i class='fas fa-file'></i>
                            Variants                    
                        </a>
                    </div>
            </div>";

                return $editBtn . $deleteBtn . $moreBtn;
            })
            ->addColumn('thumb_image', function ($query) {
                return "<img width='100px' src='" . asset($query->thumb_image) . "' alt='no-image'></img>";
            })
            ->addColumn('product_type', function ($query) {
                switch ($query->product_type) {
                    case 'new_arrival':
                        return '<i class="badge bg-success">New Arrival</i>';
                    case 'featured_product':
                        return '<i class="badge bg-warning">Featured Product</i>';
                    case 'top_product':
                        return '<i class="badge bg-info">Top Product</i>';
                    case 'best_product':
                        return '<i class="badge bg-danger">Top Product</i>';
                    default:
                        return '<i class="badge bg-dark">None</i>';
                }
            })
            ->addColumn('status', function ($query) {
                if ($query->status == 1) {
                    $button = '<div class="form-check form-switch">
                        <input checked class="form-check-input change-status" type="checkbox" id="statusCheck" data-id="' . $query->id . '" />
                    </div>';
                } else {
                    $button = '<div class="form-check form-switch">
                        <input class="form-check-input change-status" type="checkbox" id="statusCheck" data-id="' . $query->id . '" />
                    </div>';
                }

                return $button;
            })
            ->rawColumns(['action', 'thumb_image', 'status', 'product_type'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('vendorproduct-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(0)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')
                ->width(50)
                ->addClass('text-center'),
            Column::make('thumb_image')
                ->width(150)
                ->addClass('text-center'),
            Column::make('name'),
            Column::make('price')
                ->width(100)
                ->addClass('text-center'),
            Column::make('product_type')
                ->width(150)
                ->addClass('text-center'),
            Column::make('status')
                ->width(100)
                ->addClass('text-center'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'VendorProduct_' . date('YmdHis');
    }
}
