<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductAttribute;
use Livewire\Component;

class AdminAttributesComponent extends Component
{

    public function deleteAttribute($attribute_id)
    {
        $pattribute = ProductAttribute::find($attribute_id);
        $pattribute->delete();
        session()->flash('Attribute has been deleted successfully!');
    }
    public function render()
    {
        $productAttributes = ProductAttribute::paginate(10);
        return view('livewire.admin.admin-attributes-component',['productAttributes'=>$productAttributes])->layout('layouts.base');
    }
}
