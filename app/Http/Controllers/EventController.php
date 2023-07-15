<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Carbon;

use App\Models\Event;

class EventController extends Controller
{
    public function __construct(Event $events){
        $this->events = $events;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$request->filter){
            $events = $this->events->orderBy('start_date','asc')->get();
        }else{
            $condition = $request->filter;
            if($condition == "finished"){
                $events = $this->events->whereDate('end_date', '<', carbon::today())->where('status','finished')->orderBy('start_date','asc')->get();
            }elseif($condition == "upcoming"){
                $events = $this->events->whereDate('end_date', '>', carbon::today())->where('status','running')->orderBy('start_date','asc')->get();
            }elseif($condition == "event_seven_days"){
                $start = Carbon::today();
                $sevenDays = Carbon::today()->addDays(7);
                $events = $this->events->whereBetween('end_date', [$start, $sevenDays])->where('status','running')->orderBy('start_date','asc')->get();
            }elseif($condition == "finished_seven_days"){
                $sevenDays = Carbon::today();
                $start = Carbon::today()->subDays(7);
                $events = $this->events->whereBetween('end_date', [$start, $sevenDays])->where('status','finished')->orderBy('start_date','asc')->get();
            }
        }
        $eventData = [];
        foreach($events as $event){
            $eventData[] = [
                'id' => $event->id,
                'title' => $event->title,
                'description' => $event->description,
                'start_date' => Carbon::parse($event->start_date)->diffForHumans(),
                'end_date' => Carbon::parse($event->end_date)->diffForHumans(),
                'status' => $event->status
            ];
        }
        return view('event',['events' => $eventData]);
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        if($validator->fails()){
            $errors = $validator->errors()->all();
            $error = [];
            foreach($errors as $err){
                $error[] = $err;
            }
            $flasmessage = [
                'status' => 'Error',
                'message' => $error
            ];
            set_flash_message($flasmessage);
            return redirect()->back();
        }
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => Carbon::parse($request->start_date),
            'end_date' => Carbon::parse($request->end_date),
        ];
        $entry = $this->events->add_data($data);
        if($entry['status'] == true){
            $flasmessage = [
                'status' => 'Success',
                'message' => ['I have added the event']
            ];
        }else{
            $flasmessage = [
                'status' => 'Error',
                'message' => ['I cannot add event']
            ];
        }
        set_flash_message($flasmessage);
        return redirect()->back();

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
    public function edit($id)
    {
        $event = $this->events->where('id',$id)->first();
        if(!$event){
            $flasmessage = [
                'status' => 'Error',
                'message' => ['I cannot find the event']
            ];
            set_flash_message($flasmessage);
            return redirect()->back();
        }
        return view('edit-event',['event' => $event]);
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
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        if($validator->fails()){
            $errors = $validator->errors()->all();
            $error = [];
            foreach($errors as $err){
                $error[] = $err;
            }
            $flasmessage = [
                'status' => 'Error',
                'message' => $error
            ];
            set_flash_message($flasmessage);
            return redirect()->back();
        }
        $event = $this->events->where('id',$id)->first();
        if(!$event){
            $flasmessage = [
                'status' => 'Error',
                'message' => ['I cannot find the event']
            ];
            set_flash_message($flasmessage);
            return redirect()->back();
        }
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => Carbon::parse($request->start_date),
            'end_date' => Carbon::parse($request->end_date),
            'status' => $request->status
        ];
        $status = $this->events->update_data($id,$data);
        if($status == true){
            $flasmessage = [
                'status' => 'Success',
                'message' => ['I updated the event']
            ]; 
            set_flash_message($flasmessage);
            return redirect()->back();
        }
        $flasmessage = [
            'status' => 'Error',
            'message' => ['I cannot update the event']
        ]; 
        set_flash_message($flasmessage);
        return redirect()->back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->events->delete_data($id);
        if($delete == true){
            $flasmessage = [
                'status' => 'Success',
                'message' => ['I deleted the event']
            ]; 
        }else{
            $flasmessage = [
                'status' => 'Error',
                'message' => ['I cannot delete the event']
            ]; 
        }
        set_flash_message($flasmessage);
        return redirect()->back();
    }
}
