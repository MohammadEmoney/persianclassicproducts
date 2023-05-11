<?php

namespace App\Http\Livewire\Front\Contacts;

use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class CreateContact extends Component
{
    public $fullname;
    public $email;
    public $phone;
    public $message;

    public $rules = [
        'fullname' => 'required|min:3|max:255',
        'email' => 'required|email',
        'message' => 'required|min:3',
        'phone' => 'required|numeric'
    ];

    public function render()
    {
        return view('livewire.front.contacts.create-contact');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->validate($this->rules);
        $contact = Contact::create([
            'full_name' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'message' => $this->message,
        ]);

        Mail::to("persianfoodproduct@gmail.com")->send(new ContactMail($contact));

        $this->dispatchBrowserEvent('swal:modal', [
            'icon' => 'success',
            'title' => __('messages.contact_created_title'),
            'text' => __('messages.contact_created_text')
        ]);

        $this->fullname = '';
        $this->email = '';
        $this->phone = '';
        $this->message = '';
    }
}
