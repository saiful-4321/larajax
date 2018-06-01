<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\subcategory;
use DB;
use Response;
use View;
class ajaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = category::all();

        return view('ajax',[

            'category' => $category
        ]);

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
    public function getSubCategories(Request $request){
        if($request->ajax()){
            $id = $request->category;
            $sector = DB::select("SELECT * FROM subcategories WHERE category_id='$id'");
            // return Response::json( $sector->category );
            return response()->json(array('subCategoryData'=> $sector), 200);

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }
    public function message(Request $request){

        echo  $msg = "This is a simple message.";
        exit();
        return response()->json(array('msg'=> $msg), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function updateAjax(Request $request){

         if($request->ajax()){

          $data = category::find($request->id);
            // echo $request->category_name;
          $data->category_name = $request->category_name;

          $data->update();

          
         }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete(Request $request){
        if($request->ajax()){
            $id = $request->delete_id;
            // $sector = DB::select("SELECT * FROM subcategories WHERE category_id='$id'");
            $data=category::find($id);
            // return Response::json( $sector->category );

            $data->delete();
            return response()->json();

        }

    }


    public function AjaxPage(){
         
         $category = category::all();

        return view('ajax_category',[

            'category' => $category
        ]);

    }

    public function findsub($id){

       $sub_cat = subcategory::where('category_id','=',$id)->get();

       return View::make('ajax_load',['sub_cat'=>$sub_cat]);

    }
}
