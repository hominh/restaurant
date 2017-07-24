<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Auth;
use App\Contact;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('contact')
            ->join('users','contact.user_id','=','users.id')
            ->select('contact.id as id', 'contact.location1 as location1','contact.location2 as location2','users.name as uname','contact.created_at')
            ->get();
        return view('admin/contact/list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/contact/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'location1' => 'required',
           'location2' => 'required'
        ]);

       $contact = new Contact;
       $contact->location1 = $request->location1;
       $contact->location2 = $request->location2;
       $contact->support_phone = $request->support_phone;
       $contact->address = $request->address;
       $contact->user_id = Auth::user()->id;
       $contact->save();
       return redirect()->route('admin.contact.list')->with('message','Success');
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
        $data = Contact::findOrFail($id)->toArray();
        return view('admin.contact.edit',compact('data','id'));
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
        $this->validate($request, [
           'location1' => 'required',
           'location2' => 'required'
        ]);
        $contact = Contact::find($id);
        $contact->location1 = $request->location1;
        $contact->location2 = $request->location2;
        $contact->support_phone = $request->support_phone;
        $contact->address = $request->address;
        $contact->user_id = Auth::user()->id;
        $contact->save();
        return redirect()->route('admin.contact.list')->with('message','Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->route('admin.contact.list');
    }
}
