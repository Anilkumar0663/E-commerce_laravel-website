<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Contact;

class AdminContactComponent extends Component
{
    public function render()
    {
        $contact = Contact::paginate(12);
        return view('livewire.admin.admin-contact-component',['contact'=>$contact])->layout('layouts.base');
    }
}
