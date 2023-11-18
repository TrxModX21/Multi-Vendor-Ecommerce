<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SellerProductDataTable extends DataTable
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
                $editBtn = "<a href='" . route('root.products.edit', $query->id) . "' class='btn btn-primary'><i class='far fa-edit'></i></a>";

                $deleteBtn = "<a href='" . route('root.products.destroy', $query->id) . "' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";

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
                        return '<i class="badge badge-success">New Arrival</i>';
                    case 'featured_product':
                        return '<i class="badge badge-warning">Featured Product</i>';
                    case 'top_product':
                        return '<i class="badge badge-info">Top Product</i>';
                    case 'best_product':
                        return '<i class="badge badge-danger">Top Product</i>';
                    default:
                        return '<i class="badge badge-dark">None</i>';
                }
            })
            ->addColumn('status', function ($query) {
                if ($query->status == 1) {
                    $button = '<label class="custom-switch">
                    <input type="checkbox" checked name="" class="custom-switch-input change-status" data-id="' . $query->id . '" />
                    <span class="custom-switch-indicator"></span>
                </label>';
                } else {
                    $button = '<label class="custom-switch">
                    <input type="checkbox" name="" class="custom-switch-input change-status" data-id="' . $query->id . '" />
                    <span class="custom-switch-indicator"></span>
                </label>';
                }

                return $button;
            })
            ->addColumn('vendor', function ($query) {
                return $query->vendor->shop_name;
            })->addColumn('approve', function ($query) {
            return "<select class='form-control is_approve' data-id='$query->id' >
                    <option value='0' >Pending</option>
                    <option selected value='1' >Approved</option>
                </select>";
        })
            ->rawColumns(['action', 'thumb_image', 'status', 'product_type', 'approve'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->where('vendor_id', '!=', Auth::user()->vendor->id)
            ->where('is_approved', 1)
            ->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('sellerproduct-table')
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
            Column::make('vendor')
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
            Column::make('approve')
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
        return 'SellerProduct_' . date('YmdHis');
    }
}
