<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lostcomplain;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class LostComplainController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:lostcomplain-list|lostcomplain-create|lostcomplain-edit|lostcomplain-delete', ['only' => ['index','store']]);
         $this->middleware('permission:lostcomplain-create', ['only' => ['create','store']]);
         $this->middleware('permission:lostcomplain-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:lostcomplain-massDestroy', ['only' => ['massDestroy']]);
         $this->middleware('permission:lostcomplain-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $lostcomplains = Lostcomplain::all();
        return view('admin.lostcomplain.view')->with('lostcomplains',$lostcomplains);
    }

    public function create()
    {
        $rooms = Room::all();
        return view('admin.lostcomplain.create',compact('rooms'));
    }

    public function store(Request $request)
    {
        $lostcomplains = new Lostcomplain();
        $lostcomplains->item_name = $request->input('item_name');
        $lostcomplains->room_number = $request->input('room_number');
        $lostcomplains->date = $request->input('date');
        $lostcomplains->description = $request->input('description');
        $lostcomplains->complain_received = $request->input('complain_received');
        $lostcomplains->save();
        return redirect()->route('admin.lostcomplain.index')->with([
                'message' => 'Successfully Created !',
                'alert-type' => 'success'
            ]);
    }

    public function edit($id)
    {
        $lostcomplain = Lostcomplain::find($id);
        $rooms = Room::all();
        return view('admin.lostcomplain.edit', compact('rooms','lostcomplain'));
    }

    public function update(Request $request,$id)
    {
        $lostcomplain = Lostcomplain::find($id);
        $lostcomplain->item_name = $request->input('item_name');
        $lostcomplain->room_number = $request->input('room_number');
        $lostcomplain->date = $request->input('date');
        $lostcomplain->description = $request->input('description');
        $lostcomplain->complain_received = $request->input('complain_received');
        $lostcomplain->update();
        
        return redirect()->route('admin.lostcomplain.index')->with([
            'message' => 'Successfully Updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy($id)
    {
        $lostcomplains = Lostcomplain::find($id);
        $lostcomplains->delete();
        return redirect()->route('admin.lostcomplain.index')->with([
            'message' => 'Successfully Deleted !',
            'alert-type' => 'danger'
        ]);
    }
    
    public function massDestroy(Request $request)
    {
        Lostcomplain::whereIn('id', request('ids'))->delete();
        return response()->noContent();
    }
}
