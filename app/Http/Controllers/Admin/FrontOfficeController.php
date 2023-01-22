<?php

namespace App\Http\Controllers\Admin;


use App\Models\Frontoffice;
use App\Models\Room;
use App\Models\FrontService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class FrontOfficeController extends Controller
{
    //
    function __construct()
    {
         $this->middleware('permission:frontoffice-list|frontoffice-create|frontoffice-edit|frontoffice-delete|frontoffice-massDestroy', ['only' => ['index','store']]);
         $this->middleware('permission:frontoffice-create', ['only' => ['create','store']]);
         $this->middleware('permission:frontoffice-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:frontoffice-massDestroy', ['only' => ['massDestroy']]);
         $this->middleware('permission:frontoffice-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $frontoffices = Frontoffice::all();
        return view('admin.front_office_order.view')->with('frontoffices',$frontoffices);
    }

    public function create()
    {
        $rooms = Room::all();
        $frontservices = FrontService::all();
        return view('admin.front_office_order.create', compact('rooms','frontservices'));
    }

    public function store(Request $request)
    {
        $frontoffices = new Frontoffice();
        $frontoffices->room_number = $request->input('room_number');
        $frontoffices->service = $request->input('service');
        // $frontoffices->quantity = $request->input('quantity');
        // $frontoffices->rate = $request->input('rate');
        $frontoffices->description = $request->input('description');
        $frontoffices->save();
        return redirect()->route('admin.front_office_order.index')->with([
                'message' => 'Successfully Created !',
                'alert-type' => 'success'
            ]);
    }

    public function edit($id)
    {
        $frontoffices = Frontoffice::find($id);
        $rooms = Room::all();
        $frontservices = FrontService::all();
        return view('admin.front_office_order.edit', compact('frontoffices','rooms','frontservices'));
    }

    public function update(Request $request,$id)
    {
        $frontoffices = Frontoffice::find($id);
        $frontoffices->room_number = $request->input('room_number');
        $frontoffices->service = $request->input('service');
        // $frontoffices->quantity = $request->input('quantity');
        // $frontoffices->rate = $request->input('rate');
        $frontoffices->description = $request->input('description');
        $frontoffices->update();
        
        return redirect()->route('admin.front_office_order.index')->with([
            'message' => 'Successfully Updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy($id)
    {
        $frontoffices = Frontoffice::find($id);
        $frontoffices->delete();
        return redirect()->route('admin.front_office_order.index')->with([
            'message' => 'Successfully Deleted !',
            'alert-type' => 'danger'
        ]);
    }
    
    public function massDestroy(Request $request)
    {
        Frontoffice::whereIn('id', request('ids'))->delete();
        return response()->noContent();
    }
}
