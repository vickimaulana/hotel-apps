<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservations;
use App\Models\Rooms;
use App\Models\Categories;

class RevertaionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Reservations::orderBy('id','desc')->get();
        $title = "Data Reservasi";
        return view('reservation.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::get();
        return view('reservation.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getRoomByCategory($id_category)
    {
        try{
            $rooms =  Rooms::where('category_id', $id_category)->get();
            return response()->json(['data'=>$rooms, 'message'=>'Fetch Success']);
        //code...
        } catch (\Throwable $th){
            return response()->json(['message' => 'errrorrrrrrrrrrr', 'eror'=> $th->getMessage()]);
            // $th->getMessage();
        //throw $th;
        }

    }
}
