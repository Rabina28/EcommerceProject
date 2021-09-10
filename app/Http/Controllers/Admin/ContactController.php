<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::all();
        return view('admin.contact.index',compact('contact'));
        //$contacts = Contact::paginate(10);
        //return view('pages.contacts.index',compact('contacts'));
    }

    public function create()
    {
        return view('admin.contact.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'message'=>'required',
        ]);
        $contact = new Contact();
        $contact->name=$request->name;
        $contact->phone=$request->phone;
        $contact->email=$request->email;
        $contact->message=$request->message;
        $contact->save();
        return redirect()->route('admin.contact.index')->with('message','New contact added Successfull !');
    }

    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('admin.contact.edit',compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'message'=>'required',
        ]);
        $contact =Contact::find($id);
        $contact->name=$request->name;
        $contact->phone=$request->phone;
        $contact->email=$request->email;
        $contact->message=$request->message;
        $contact->update();
        return redirect()->route('admin.contact.index')->with('message','Contact Updated Successfull !');
    }

    public function destroy($id)
    {
        $contact = Contact::find($id)->delete();
        return back()->with('message','Contact Deleted Successfull !');
    }



}
