<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Auth;

class ContactController extends Controller
{

    public function Contact() {

        $contacts = DB::table('contacts')->first();

        return view('layouts.pages.contact', compact('contacts'));
    }

    public function AdminContact() {

        $contacts = Contact::all();

        return view('admin.contact.index', compact('contacts'));
    }

    public function NewContact() {

        return view('admin.contact.add_contact');
    }

    public function AddContact(Request $request)
    {
        $validated = $request->validate(
            [
                'address' => 'required|min:5',
                'email' => 'required|min:5',
                'phone' => 'required|min:5',
            ],

        );

        Contact::insert([
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('admin.contact')->with('success', 'Contact Inserted Successfully');
    }

    public function EditContact($id)
    {

        $contacts = Contact::find($id);

        return view('admin.contact.edit_contact', compact('contacts'));
    }

    public function UpdateContact(Request $request, $id)
    {

        $validated = $request->validate(
            [
                'address' => 'required|min:5',
                'email' => 'required|min:5',
                'phone' => 'required|min:5',
            ],

        );


            $update = Contact::find($id)->update([
                'address' => $request->address,
                'email' => $request->email,
                'phone' => $request->phone,
                'created_at' => Carbon::now()
            ]);

            return Redirect()->route('admin.contact')->with('success', 'Contact Updated Successfully');
        }

    public function DeleteContact($id)
    {

        $delete = Contact::find($id)->delete();

        return Redirect()->back()->with('success', 'Contact Deleted Successfully');
    }

    public function ContactForm(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required|min:5',
                'email' => 'required|min:5',
                'subject' => 'required|min:5',
                'message' => 'required|min:10',
            ],

        );

        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('contact')->with('success', 'Your Messsage was Sent Successfully');
    }

    public function AdminContactMessage() {

        $contact_message = ContactForm::all();

        return view('admin.contactform.index', compact('contact_message'));
    }

    public function DeleteMessage($id)
    {

        $delete = ContactForm::find($id)->delete();

        return Redirect()->back()->with('success', 'Message Deleted Successfully');
    }
}
