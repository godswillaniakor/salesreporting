<?php

namespace App\Http\Controllers\Admin;

use App\Sale;
use App\Setup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSalesRequest;
use App\Http\Requests\Admin\UpdateSalesRequest;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    /**
     * Display a listing of Sale.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('sale_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('sale_delete')) {
                return abort(401);
            }
            $sales = Sale::onlyTrashed()->get();
        } else {
            $sales = Sale::all();
        }

        return view('admin.sales.index', compact('sales'));
    }

    /**
     * Show the form for creating new Sale.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('sale_create')) {
            return abort(401);
        }
        $setup = Setup::first();
//        dd($setup);
        return view('admin.sales.create', compact('setup'));
    }

    /**
     * Store a newly created Sale in storage.
     *
     * @param  \App\Http\Requests\StoreSalesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSalesRequest $request)
    {
        if (! Gate::allows('sale_create')) {
            return abort(401);
        }
//        dd($request->all());
        $input = $request->all();
        $input['volume_after_sales'] = $input['volume_before_sales'] - $input['volume_sold'];
        $input['amount'] = $input['volume_sold'] * $input['price_per_liter'];
        $setup = Setup::findOrFail($input['id']);
        $setup->update(['cvd' => $input['volume_after_sales']]);
        Sale::create($input);

        return redirect()->route('admin.sales.index');
    }


    /**
     * Show the form for editing Sale.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('sale_edit')) {
            return abort(401);
        }
        $sale = Sale::findOrFail($id);

        $setup = Setup::first();

        return view('admin.sales.edit', [ 'sale' => $sale, 'setup' => $setup]);
    }

    /**
     * Update Sale in storage.
     *
     * @param  \App\Http\Requests\UpdateSalesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSalesRequest $request, $id)
    {
//        dd($request->all());
        $input = $request->all();
        if (! Gate::allows('sale_edit')) {
            return abort(401);
        }

        $sale = Sale::findOrFail($id);

        $newVs = $input['volume_sold'];
        $oldVs = $sale->volume_sold;

        $difference = $newVs - $oldVs;

        $this->updateSalesCVD($difference, $sale, $newVs, $input['id']);

        $this->updateSalesAfter($difference, $sale->id);

        return redirect()->route('admin.sales.index');
    }


    /**
     * Display Sale.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('sale_view')) {
            return abort(401);
        }
        $sale = Sale::findOrFail($id);

        return view('admin.sales.show', compact('sale'));
    }

    /**
     * @param $difference
     * @param $sale
     * @param $newVs
     * @param $setupId
     */
    public function updateSalesCVD($difference, $sale, $newVs, $setupId): void
    {
        $setup = Setup::findOrFail($setupId);

        $newVAS = $sale->volume_after_sales - $difference;

        $sale->update([
            'volume_sold' => $newVs,
            'volume_after_sales' => $newVAS,
            'amount' => $sale->price_per_liter * $newVs
        ]);

        //Update the setup table
        $setup->update([
            'cvd' => $setup->cvd - $difference
        ]);
    }

    /**
     * @param $difference
     * @param $offset
     */
    public function updateSalesAfter($difference, $offset): void
    {
        DB::table('sales')
            ->where('id', '>', $offset)
            ->update([
                'volume_after_sales' => DB::raw('volume_after_sales - '.$difference),
                'volume_before_sales' => DB::raw('volume_before_sales - '.$difference)
            ]);
    }

}
