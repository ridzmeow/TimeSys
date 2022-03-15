<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostHistory;
use Log;

class PostController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            
            return datatables()->of(PostHistory::select('*'))
            ->addColumn('action', '<a href="javascript:void(0)" onClick="editFunc({{ $id }})" data-toggle="tooltip" data-original-title="Edit" class="btn btn-success btn-sm">Edit</a>
                                   <a href="javascript:void(0);" id="delete-barangay" onclick="deleteItem(this)" data-id="{{ $id }}" data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-sm">Delete</a>')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('pages.posting.index');
    }

    public function postData(Request $request){
        // dd($request->all());
        $input = $request->all();
          
        Log::info($input);
     
        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }
}
