<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\DataTables;
use App\Http\Requests\ManagementMemberRequest;
use App\Services\AddUpdateUserServices;

class ManagementMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
           

            if ($request->type == 'inactive') {
                $query = User::whereIN('status_member',['reject','inactive']);
                $query->onlyTrashed();
            }else{
                $query = User::where('status_member','approve');
            }

            return DataTables::of($query)
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('admin.management_member');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManagementMemberRequest $request, AddUpdateUserServices $AddUpdateUserServices)
    {
        $AddUpdateUserServices->handle($request);
        return response()->json(["status" => "success", "message" => "User Created"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $management_member)
    {
        return response()->json(["status" => "success", "data" => $management_member->load('Family')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ManagementMemberRequest $request, $id,AddUpdateUserServices $AddUpdateUserServices)
    {
        $AddUpdateUserServices->handle($request);
        return response()->json(["status" => "success", "message" => "User Updated"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)
            ->update(['status_member' => 'inactive']);
        User::find($id)->delete();
        return response()->json(["status" => "success", "message" => "User Deleted"]);
    }

    public function reverse($id)
    {
        User::withTrashed()->find($id)->restore();
        User::find($id)
            ->update(['status_member' => 'approve']);
        return response()->json(["status" => "success", "message" => "User Restore"]);
    }
}
