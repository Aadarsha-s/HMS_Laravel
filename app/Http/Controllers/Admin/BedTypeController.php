<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\BedType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class BedTypeController extends Controller
{
    //
    public function index()
    {
        $bedtypes = BedType::all();
        return view('admin.rooms.bedtype.view')->with('bedtypes',$bedtypes);
    }

    public function create()
    {
        return view('admin.rooms.bedtype.create');
    }

    public function store(Request $request)
    {
        $bedtypes = new BedType();
        $bedtypes->bed_type = $request->input('bed_type');
        $bedtypes->save();
        return redirect()->route('admin.bedtype.index')->with([
                'message' => 'Successfully Created !',
                'alert-type' => 'success'
            ]);
    }

    
    public function edit($id)
    {
        $bedtypes = BedType::find($id);
        return view('admin.rooms.bedtype.edit', compact('bedtypes'));
    }

    
    public function update(Request $request,$id)
    {
        $bedtypes = BedType::find($id);
        $bedtypes->bed_type = $request->input('bed_type');
        $bedtypes->update();
        
        return redirect()->route('admin.bedtype.index')->with([
            'message' => 'Successfully Updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy($id)
    {
        $bedtypes = BedType::find($id);
        $bedtypes->delete();
        return redirect()->route('admin.bedtype.index')->with([
            'message' => 'Successfully Deleted !',
            'alert-type' => 'danger'
        ]);
    }
    
    public function massDestroy(Request $request)
    {
        BedType::whereIn('id', request('ids'))->delete();
        return response()->noContent();
    }
}
