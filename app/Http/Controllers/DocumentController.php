<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $crew)
    {
        $this->validate($request, [
			'file' => 'required',
			'name' => 'required',
		]);
 
		$file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;

        $path = 'uploads/documents/';
        $file->move($path, $filename);

        Crew::find($crew)->documents()->create([
            'user_id' => $request->user()->id,
            'url' => $path.$filename,
            'name' => $request->input('name'),
            'reminder' => $request->input('reminder'),
        ]);

        Session::flash('alert-class', 'success'); 
        Session::flash('message', 'Document created successfully.'); 

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        $this->validate($request, [
			'name' => 'required',
		]);

        $document->update([
            'name' => $request->input('name'),
            'reminder' => $request->input('reminder'),
        ]);

        Session::flash('alert-class', 'success'); 
        Session::flash('message', 'Document updated successfully.'); 

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        // $this->authorize('delete', $document);

        $document->delete();

        if(File::exists($document->url)) {
            File::delete($document->url);
        }

        Session::flash('alert-class', 'success'); 
        Session::flash('message', 'Document deleted successfully.'); 

        return redirect()->back();
    }
}
