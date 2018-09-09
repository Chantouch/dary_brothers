<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->input('limit', 20);
        $contacts = (new Contact())->newQuery()->paginate($limit);
        return view('admin.contacts.index', [
            'contacts' => $contacts,
            'limit' => $limit
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Contact $contact
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Contact $contact)
    {
        DB::beginTransaction();
        $contact->delete();
        DB::commit();
        return redirect()->route('admin.contacts.index')->with('success', 'Contact has been deleted.');
    }
}
