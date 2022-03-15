<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $roles = Role::get();
  
        return view('pages.role', compact('roles'));
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
  
        if ($validator->fails()) {
            return response()->json([
                        'error' => $validator->errors()->all()
                    ]);
        }
       
        if($request->id){
            $role = Role::findOrFail($request->id);
            $role->name = $request->name;
            $role->description = $request->description;
            $role->update();
        }else{
            $role = new Role();
            $role->name = $request->name;
            $role->description = $request->description;
            $role->save();
        }
  
        return redirect()->back()->with('success', 'Record successfully saved.');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function view($id){

        $role = Role::findOrFail($id);
        return redirect()->back()->with('role', $role);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function delete($id){
        
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->back()->with('success', 'Deleted successfully.');
    }


}


