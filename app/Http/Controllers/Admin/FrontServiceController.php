<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\FrontService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class FrontServiceController extends Controller
{
    //
    public function index()
    {
        $frontservices = FrontService::all();
        return view('admin.front_office_order.frontservice.view')->with('frontservices',$frontservices);
    }

    public function create()
    {
        return view('admin.front_office_order.frontservice.create');
    }

    public function store(Request $request)
    {
        $frontservices = new FrontService();
        $frontservices->service = $request->input('service');
        $frontservices->save();
        return redirect()->route('admin.frontservice.index')->with([
                'message' => 'Successfully Created !',
                'alert-type' => 'success'
            ]);
    }

    public function edit($id)
    {
        $frontservices = FrontService::find($id);
        return view('admin.front_office_order.frontservice.edit', compact('frontservices'));
    }

    
    public function update(Request $request,$id)
    {
        $frontservices = FrontService::find($id);
        $frontservices->service = $request->input('service');
        $frontservices->update();
        
        return redirect()->route('admin.frontservice.index')->with([
            'message' => 'Successfully Updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy($id)
    {
        $frontservices = FrontService::find($id);
        $frontservices->delete();
        return redirect()->route('admin.frontservice.index')->with([
            'message' => 'Successfully Deleted !',
            'alert-type' => 'danger'
        ]);
    }
    
    public function massDestroy(Request $request)
    {
        FrontService::whereIn('id', request('ids'))->delete();
        return response()->noContent();
    }

}
