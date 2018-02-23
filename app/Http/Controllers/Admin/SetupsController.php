<?php

namespace App\Http\Controllers\Admin;

use App\Setup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSetupsRequest;
use App\Http\Requests\Admin\UpdateSetupsRequest;

class SetupsController extends Controller
{
    /**
     * Display a listing of Setup.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('setup_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('setup_delete')) {
                return abort(401);
            }
            $setups = Setup::onlyTrashed()->get();
        } else {
            $setups = Setup::all();
        }

        return view('admin.setups.index', compact('setups'));
    }

    /**
     * Show the form for editing Setup.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('setup_edit')) {
            return abort(401);
        }
        $setup = Setup::findOrFail($id);

        return view('admin.setups.edit', compact('setup'));
    }

    /**
     * Update Setup in storage.
     *
     * @param  \App\Http\Requests\UpdateSetupsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSetupsRequest $request, $id)
    {
        if (! Gate::allows('setup_edit')) {
            return abort(401);
        }
        $setup = Setup::findOrFail($id);
        $setup->update($request->all());



        return redirect()->route('admin.setups.index');
    }


    /**
     * Display Setup.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('setup_view')) {
            return abort(401);
        }
        $setup = Setup::findOrFail($id);

        return view('admin.setups.show', compact('setup'));
    }

    public function updateVolume(Request $request, $id)
    {
//        dd($id, $request->all());
        $setup = Setup::findOrFail($id);
        $setup->cvd += $request['cvd'];
//        dd($setup->cvd);
        $setup->update(['cvd' => $setup->cvd]);
        return redirect()->route('admin.setups.index');
    }

}
