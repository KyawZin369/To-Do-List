<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //create route to postpage
    public function post (){
        $allData = post::orderBy('updated_at','desc')->paginate(3);
        return view('post',compact('allData'));
    }

    //create Main request function
    public function postToDb(Request $request){
     $this->validatedRule($request,'create');
     $data = $this -> insertDataToDb($request);
     post::create($data);
     return back()->with('InsertSuccess','Your Post Insert Successful.');
    }

    //delete data 

    public function deleteData($id) {
        post::where('id',$id)->delete();
        return redirect()->route('postRoute');
    }


    //update data 

    public function updateData($id){
        $post= post::where('id',$id)->first();
        return view('EditOrshow',compact('post'));
    }

    public function updateEdit($id){
        $post= post::where('id',$id)->first()->toArray();
        return view('updateUI',compact('post'));
    }

    public function updateDataEdit(Request $request)
    {
        $this->validatedRule($request, 'update');
        $updatedata = $this->insertDataToDb($request);
        post::where('id',$request['UpdateId'])->update($updatedata);
        return redirect()->route('postRoute')->with('InsertSuccess','Your Post Update Successful.');
    }

    //insert data

    private function insertDataToDb($request){
        return [
            'post_title' => $request->postTitle,
            'post_desc' => $request->postDesc
        ];
    }

    //validate rule and message

    private function validatedRule($request , $status){
        if ($status = 'update') {
            $validateRule = [
                'postTitle' => 'required|min:5|unique:posts,post_title,'.$request['UpdateId'],
                'postDesc' => 'required|min:5',
            ];
        }else{
            $validateRule = [
                'postTitle' => 'required|min:5|unique:posts,post_title',
                'postDesc' => 'required|min:5',
            ];
        }

        Validator::make($request->all(),$validateRule)->validate();
    }
}
