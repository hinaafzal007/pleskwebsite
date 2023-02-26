<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;
use Spatie\PdfToText\Pdf;

class DocumentController extends Controller
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

        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $image)
            {   

                $name=$image->getClientOriginalName();
                $image->move(public_path().'/documents', $name);  
                
                $document = new Document;
                $document->name = $name;
                $document->type = $image->getClientOriginalExtension();
                $document->directory_id = $request->directory_id;
                $document->user_id = auth()->id();
                $document->team_id = auth()->user()->team_id;
                $document->status = true;
                $document->save();
                $content = '';

                if($document->type == 'doc' || $document->type == 'docs' || $document->type == 'docx'){
                    $phpWord = IOFactory::load('documents/'.$image->getClientOriginalName());
                
                    foreach($phpWord->getSections() as $section) {
                        foreach($section->getElements() as $element) {
                            if (method_exists($element, 'getElements')) {
                                foreach($element->getElements() as $childElement) {
                                    if (method_exists($childElement, 'getText')) {
                                        $content .= $childElement->getText() . ' ';
                                    }
                                    else if (method_exists($childElement, 'getContent')) {
                                        $content .= $childElement->getContent() . ' ';
                                    }
                                }
                            }
                            else if (method_exists($element, 'getText')) {

                                $content .= is_string($element->getText()) ?? $element->getText() . ' ';
                            }
                        }
                    }
                
                }
                else if($document->type == 'pdf'){
                    $content=(new Pdf('C:\Program Files\Git\mingw64\bin\pdftotext.exe'))->setPdf('documents/'.$image->getClientOriginalName())->text();
                }
                $document->description = $content;
                $document->save();
            }
        }
        $documents = Document::where([['directory_id', $request->directory_id],['team_id',auth()->user()->team_id]])->get();
        return back()->with('documents',$documents);
    }

    public function storeDocument(Request $request)
    {
        $document = new Document;
        $document->name = $request->title;
        $document->display_name = $request->title;
        $document->title = $request->title;
        $document->description = $request->description;
        $document->real_description = strip_tags($request->description);
        $document->type = 'custom';
        $document->directory_id = $request->directory_id;
        $document->user_id = auth()->id();
        $document->team_id = auth()->user()->team_id;
        $document->status = true;
        $document->save();
           
        $documents = Document::where([['directory_id', $request->directory_id],['team_id',auth()->user()->team_id]])->get();
        return back()->with('documents',$documents);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }
}
