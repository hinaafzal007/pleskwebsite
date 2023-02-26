<?php

namespace App\Http\Controllers;

use App\Models\Directory;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Models\ConversationData;

class ConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.conversation.conversation',[
            'conversations' => Conversation::all(),
            'directories' => Directory::where('team_id', auth()->user()->team_id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $conversation = new Conversation;
        // $conversation->name =$request->name;
        // $conversation->user_id =auth()->id();
        // $conversation->team_id =auth()->user()->team_id;
        // $converasation->save();
        // return back();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $conversation = new Conversation;
        $conversation->name =$request->conversation_name;
        $conversation->directory_ids =json_encode($request->name);
        $conversation->user_id =auth()->id();
        $conversation->team_id =auth()->user()->team_id;
        $conversation->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return view('admin.conversation.show',[
            'conversation'=>Conversation::find($id),
            'conversation_datas' => ConversationData::where('conversation_id',$id)->get(),
            'conversations' => Conversation::where('team_id', auth()->user()->team_id)->get(),
            'directories' => Directory::where('team_id', auth()->user()->team_id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function edit(Conversation $conversation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conversation $conversation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conversation $conversation)
    {
        //
    }
}
