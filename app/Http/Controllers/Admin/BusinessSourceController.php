<?php

namespace App\Http\Controllers\Admin;

use App\Models\BusinessSource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;


class BusinessSourceController extends Controller
{
    //
    function __construct()
    {
         $this->middleware('permission:business_source-list|business_source-create|business_source-edit|business_source-delete', ['only' => ['index','store']]);
         $this->middleware('permission:business_source-create', ['only' => ['create','store']]);
         $this->middleware('permission:business_source-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:business_source-massDestroy', ['only' => ['massDestroy']]);
         $this->middleware('permission:business_source-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $business_sources = BusinessSource::all();
        return view('admin.business_source.view')->with('business_sources',$business_sources);
    }

    public function create()
    {
        return view('admin.business_source.create');
    }

    public function store(Request $request)
    {
        $business_sources = new BusinessSource();
        $business_sources->source = $request->input('source');
        $business_sources->apply_commission = $request->input('apply_commission');
        $business_sources->save();
        return redirect()->route('admin.business_source.index')->with([
                'message' => 'Successfully Created !',
                'alert-type' => 'success'
            ]);
    }

    public function edit($id)
    {
        $business_sources = BusinessSource::find($id);
        return view('admin.business_source.edit', compact('business_sources'));
    }

    public function update(Request $request,$id)
    {
        $business_sources = BusinessSource::find($id);
        $business_sources->source = $request->input('source');
        $business_sources->apply_commission = $request->input('apply_commission');
        $business_sources->update();
        return redirect()->route('admin.business_source.index')->with([
            'message' => 'Successfully Updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy($id)
    {
        $business_sources = BusinessSource::find($id);
        $business_sources->delete();
        return redirect()->route('admin.business_source.index')->with([
            'message' => 'Successfully Deleted !',
            'alert-type' => 'danger'
        ]);
    }
    
    public function massDestroy(Request $request)
    {
        BusinessSource::whereIn('id', request('ids'))->delete();
        return response()->noContent();
    }
}
