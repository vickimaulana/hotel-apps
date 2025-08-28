<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservations;
use App\Models\Rooms;
use App\Models\Categories;
use Symfony\Contracts\Service\Attribute\Required;
use Carbon\Carbon;

class RevertaionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function createReservationNumber()
    {
        // RSV-TODAY-001
        $code_format    = "RSV";
        $today          = Carbon::now()->format('Ymd');//2025-08-28
        $prefix         = $code_format . "-" . $today . "-";

        $lastReservation = Reservations::whereDate('created_at', Carbon::today())->orderBy('id', 'desc')->first();
        if($lastReservation){
            $lastNumber = substr($lastReservation->reservation_number, -3);
            // $lasNumber = $lastReservation->id; //jadinya 4
            // contoh Budi 3 = bud huruf nya blkng ilang || klo 0,3 = Bud nya ilang
            $newNumber  = str_pad($lastNumber,  3, "0", STR_PAD_LEFT);
            // klo R= rsv-100, klo L=rsv-0001
        }else{
            $newNumber = "001";
        }
        $reservation_number = $prefix . $newNumber;
        return $reservation_number;

        // pake get  = [{data}]
        //pake first = {data}
    }

    public function index()
    {
        $datas = Reservations::with('room')->orderBy('id','desc')->get();
        $title = "Data Reservasi";
        return view('reservation.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $reservation_number = $this->createReservationNumber();
        $categories = Categories::get();
        return view('reservation.create', compact('categories', 'reservation_number'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        //output : RSV-tgl hari ini - 001
        $reservation_number ="RSV-270893-001";
    try {
        // $data = $request->validate([
        //     'reservation_number'=> 'required',
        //     'guest_name' => 'required',
        //     'guest_email' => 'required|email',
        //     'guest_phone' => 'required',
        //     'guest_note' => 'nullable|string',
        //     'guest_room_number' => 'nullable|string',
        //     'guest_check_in' => 'required|date',
        //     'guest_check_out' => 'required|date|after:checkin',
        //     'payment_method' => 'required',
        //     'room_id' => 'required',
        //     'subtotal' => 'required',
        //     'totalAmount' => 'required',
        // ]);

        $data = [
            'reservation_number'=> $request->reservation_number,
            'guest_name' => $request->guest_name,
            'guest_email' => $request->guest_email,
            'guest_phone' => $request->guest_phone,
            'guest_note' => $request->guest_note,
            'guest_room_number' => $request->guest_room_number,
            'guest_check_in' => $request->guest_check_in,
            'guest_check_out' => $request->guest_check_out,
            'payment_method' => $request->payment_method,
            'room_id' => $request->room_id,
            'subtotal' => $request->subtotal,
            'totalAmount' => $request->totalAmount,
            'guest_qty' => $request->guest_qty,
            'isReverse' => 1,
        ];
        $create = Reservations::create($data);
        return response()->json(['status'=>'success','message'=>'Reservasi create success', 'data' => $create],201);
    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json(['status' => 'error', 'message' => 'Validation error', 'error' => $e->errors()], 422);
    } catch(\Exception $e){
          return response()->json(['status' => 'error', 'message'=> 'PEA', 'error' => $e->getMessage()], 500);
    }
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
