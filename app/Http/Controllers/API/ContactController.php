<?php

namespace App\Http\Controllers\API;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\ContactRepository;

class ContactController extends Controller
{
    private $contactRepository;

    public function __construct(ContactRepository $contactRepositry)
    {
        $this->contactRepository = $contactRepositry;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = $this->contactRepository->getAll();
        return response()->json([
            'success' => true,
            'data' => $contacts
        ], 200);
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
        //
        $contactDetails = $request->only([
            'name', 'number'
        ]);
        return response()->json([
            'success' => true,
            'data' => $this->contactRepository->createContact($contactDetails)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get by id
        $contact = $this->contactRepository->getById($id);
        return response()->json([
            'success' => true,
            'data' => $contact
        ], 200);
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
        $id = $request->route('id');
        $contactDetails = $request->only([
            'name', 'number', 'is_active'
        ]);
        // dd($this->contactRepository->updateContact($id, $contactDetails));
        return response()->json([
            'success' => true,
            'data' => $this->contactRepository->updateContact($id, $contactDetails)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $id = $request->route('id');
        $contact = $this->contactRepository->deleteContact($id);
        return response()->json([
            'success' => true,
            'data' => $contact
        ], 200);
    }
}
