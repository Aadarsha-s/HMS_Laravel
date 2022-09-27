<?php
namespace App\Http\Controllers\Admin;

use App\Models\Wakeupcall;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class WakeupCallController extends Controller
{
    //
    public function index()
    {
        $wakeupcalls = Wakeupcall::all();
        return view('admin.wakeupcall.view')->with('wakeupcalls',$wakeupcalls);
    }

    public function create()
    {
        return view('admin.wakeupcall.create');
    }

    public function store(Request $request)
    {
        $wakeupcalls = new Wakeupcall();
        $wakeupcalls->room_number = $request->input('room_number');
        $wakeupcalls->date = $request->input('date');
        $wakeupcalls->time = $request->input('time');
        $wakeupcalls->remark = $request->input('remark');
        $wakeupcalls->guest = $request->input('guest');
        $wakeupcalls->save();
        return redirect()->route('admin.wakeupcall.index')->with([
                'message' => 'Successfully Created !',
                'alert-type' => 'success'
            ]);
    }

    public function edit($id)
    {
        $wakeupcalls = Wakeupcall::find($id);
        return view('admin.wakeupcall.edit', compact('wakeupcalls'));
    }

    public function update(Request $request,$id)
    {
        $wakeupcalls = Wakeupcall::find($id);
        $wakeupcalls->room_number = $request->input('room_number');
        $wakeupcalls->date = $request->input('date');
        $wakeupcalls->time = $request->input('time');
        $wakeupcalls->remark = $request->input('remark');
        $wakeupcalls->guest = $request->input('guest');
        $wakeupcalls->update();
        
        return redirect()->route('admin.wakeupcall.index')->with([
            'message' => 'Successfully Updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy($id)
    {
        $wakeupcalls = Wakeupcall::find($id);
        $wakeupcalls->delete();
        return redirect()->route('admin.wakeupcall.index')->with([
            'message' => 'Successfully Deleted !',
            'alert-type' => 'danger'
        ]);
    }
    
    public function massDestroy(Request $request)
    {
        Wakeupcall::whereIn('id', request('ids'))->delete();
        return response()->noContent();
    }

}
