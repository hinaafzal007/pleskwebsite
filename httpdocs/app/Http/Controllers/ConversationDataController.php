<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConversationData;
use Illuminate\Support\Facades\DB;

class ConversationDataController extends Controller
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

        $data=collect([]);
        $question = $request->question;
        $resultArray = explode(" ", $question);
        $collection = collect($resultArray);
        if($collection->count()>2){
            $j=2;
        }else{
            $j=1;
        }
        for ($i = 0; $i < count($resultArray); $i++){
            if(count($collection->sliding($j))>0){
                $data[] = $collection->sliding($j);
            }
            $j++;
        }    

        $new_data = [];
        for ($i = 0; $i < count($data); $i++){
            foreach($data[$i] as $dat){
                $new_data[]=$dat->values()->implode(" ");
            }
        }

        $datas = array_reverse($new_data);

        $name = DB::Table('documents')
        ->select('*')                
        ->Where(function ($query) use($datas) {
             for ($i = 0; $i < count($datas); $i++){
                $query->orwhere('description', 'like',  '%' . $datas[$i] .'%');
             }      
        })->first();


        $conversation_data = new ConversationData;
        $conversation_data->question = $request->question;
        $conversation_data->conversation_id = $request->conversation_id;
        if(!is_null($name))
        {
            $conversation_data->answer = $name->description;
        }
        else{
            $conversation_data->answer ="I'm sorry, I could not find anything in the knowledgebase related to".
            $request->question . "Can you please provide more information about what you are looking for?";
        }
        $conversation_data->save();
        return back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConversationData  $conversationData
     * @return \Illuminate\Http\Response
     */
    public function show(ConversationData $conversationData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConversationData  $conversationData
     * @return \Illuminate\Http\Response
     */
    public function edit(ConversationData $conversationData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConversationData  $conversationData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConversationData $conversationData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConversationData  $conversationData
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConversationData $conversationData)
    {
        //
    }
}
