<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();

        return response()->json($contacts, 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $postData = $request->all();

    //     dd($postData);
    // }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [    
            'name' => 'required|min:6|max:255',
            'email' => 'required|email|unique:contacts'
        
        ]);

        if($validator->fails()) {
            $errors = $validator->errors();

            return response()->json($errors, 400);
        }

        $contact = Contact::create($request->all());

        return response()->json($contact);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return response()->json($contact);
    }
    // public function show(Request $request, int $id)
    // {
    //     $contact = Contact::find($id);

    //     return response()->json($contact);
    // }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $validator = Validator::make($request->all(), [    
            'name' => 'required|min:6|max:255',
            'email' => 'required|email|unique:contacts,' . $contact->id
        
        ]);

        if($validator->fails()) {
            $errors = $validator->errors();

            return response()->json($errors, 400);
        }

        $contact->update($request->all());

        return response()->json($contact);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Contact $contact)
    // {
    //     $deleted = $contact->delete();
    // }

    public function destroy(Request $request, int $id)
    {
        $contact = Contact::find($id);

        $contact->delete();

        return response()->json('Contato deletado com sucesso', 200);
    }
}
