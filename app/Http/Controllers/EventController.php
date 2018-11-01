<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User, App\Event;
use Auth;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        $events = Event::orderBy("user_id", "desc")->get();

        foreach($events as $e)
        {
            if($e->user_id == Auth::id())
                $e->sTemp = 1;
            else
                $e->sTemp = 2;
        }
        $events = $events->sortBy("sTemp");
        return view('acara.index', compact("events"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('acara.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function date_format($date, $format)
    {
        $d = date_create($date);
        return date_format($d, $format);
    }

    public function store(Request $request)
    {
        $event = new Event;
        $event->nama = $request->nama;
        $event->tanggal_mulai = $this->date_format($request->tanggal_mulai, "Y-m-d");
        $event->tanggal_selesai = $this->date_format($request->tanggal_akhir, "Y-m-d");
        $event->user_id = Auth::user()->id;
        $event->save();

        $status = "1||Success||Berhasil menambahkan event $event->nama";

        return redirect()->action('EventController@index')->with('status', $status);
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
        return redirect()->action('EventController@index');
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
        $event = Event::find($id);
        
        if(Auth::user()->username == "akira_pp")// || $event->user_id == Auth::user()->id)
            return view('acara.edit', compact('event'));
        else
            return redirect()->action('EventController@index')->with('status', "0||Not Allowed||Anda tidak dapat mengedit acara ini.");
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
        $event = Event::find($id);
        $event->nama = $request->nama;
        $event->tanggal_mulai = $this->date_format($request->tanggal_mulai, "Y-m-d");
        $event->tanggal_selesai = $this->date_format($request->tanggal_akhir, "Y-m-d");
        $event->save();

        $status = "1||Success||Berhasil mengupdate event $event->nama";
        return redirect()->action('EventController@index')->with('status', $status);
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
        $event = Event::find($id);
        $status = 1;

        if(Auth::user()->username == "akira_pp")// || $event->user_id == Auth::user()->id)
            $event->delete();
        else
            $status = 0;
        
        return $status;
    }
}
