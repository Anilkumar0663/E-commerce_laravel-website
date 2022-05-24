<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ProductAttribute;    

class AdminAddAttributesComponent extends Component
{

    public $name;

    public function update($fields)
    {
        $this->validateOnly($fields,[
            'name'=>'required'

        ]);
    }
       

    public function storeAtrribute()
    {
        $this->validate([
            'name'=>'required'
        ]);

        $pattribute =  new ProductAttribute();
        $pattribute->name = $this->name;
        $pattribute->save();
        session()->flash('message','Attribute has been Added successfully1');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-attributes-component')->layout('layouts.base');
    }
}
