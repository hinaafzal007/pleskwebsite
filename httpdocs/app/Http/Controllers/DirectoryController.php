<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Document;
use App\Models\Directory;
use Illuminate\Http\Request;

class DirectoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $directory = new Directory;
        $directory->name =$request->name;
        $directory->user_id =auth()->id();
        $directory->team_id =auth()->user()->team_id;
        $directory->save();

        return redirect('/directory/'.$directory->id);
        // $users = User::all();
        // $directories = Directory::where('user_id',auth()->id())->get();
        // $documents = Document::where([['directory_id',$directory->id],['user_id',auth()->id()]])->get();
        // $id =  $directory->id;

        // return view('admin.directory.index', compact('users','directories','documents','id'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::all();
        $directories = Directory::where('team_id',auth()->user()->team_id)->get();
        $documents = Document::where([['directory_id',$id],['team_id',auth()->user()->team_id]])->get();
        $id = $id;
        return view('admin.directory.index', compact('users','directories','documents','id'));
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
}
