<?php

namespace App\Http\Controllers\Admin;


use App\Models\Founditem;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class FoundItemsController extends Controller
{
    //
    function __construct()
    {
         $this->middleware('permission:founditems-list|founditems-create|founditems-edit|founditems-delete', ['only' => ['index','store']]);
         $this->middleware('permission:founditems-create', ['only' => ['create','store']]);
         $this->middleware('permission:founditems-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:founditems-massDestroy', ['only' => ['massDestroy']]);
         $this->middleware('permission:founditems-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $founditems = Founditem::all();
        return view('admin.founditems.view')->with('founditems',$founditems);
    }

    public function create()
    {
        $rooms = Room::all();
        return view('admin.founditems.create',compact('rooms'));
    }

    public function store(Request $request)
    {
        $founditems = new Founditem();
        $founditems->item_name = $request->input('item_name');
        $founditems->room_number = $request->input('room_number');
        $founditems->found_date = $request->input('found_date');
        $founditems->description = $request->input('description');
        $founditems->found_by = $request->input('found_by');
        $founditems->reported_to = $request->input('reported_to');
        $founditems->save();
        return redirect()->route('admin.founditems.index')->with([
                'message' => 'Successfully Created !',
                'alert-type' => 'success'
            ]);
    }

    public function edit($id)
    {
        $founditems = Founditem::find($id);
        $rooms = Room::all();
        return view('admin.founditems.edit', compact('founditems','rooms'));
    }

    public function update(Request $request,$id)
    {
        $founditems = Founditem::find($id);
        $founditems->item_name = $request->input('item_name');
        $founditems->room_number = $request->input('room_number');
        $founditems->found_date = $request->input('found_date');
        $founditems->description = $request->input('description');
        $founditems->found_by = $request->input('found_by');
        $founditems->reported_to = $request->input('reported_to');
        $founditems->update();
        
        return redirect()->route('admin.founditems.index')->with([
            'message' => 'Successfully Updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy($id)
    {
        $founditems = Founditem::find($id);
        $founditems->delete();
        return redirect()->route('admin.founditems.index')->with([
            'message' => 'Successfully Deleted !',
            'alert-type' => 'danger'
        ]);
    }
    
    public function massDestroy(Request $request)
    {
        Founditem::whereIn('id', request('ids'))->delete();
        return response()->noContent();
    }

}
