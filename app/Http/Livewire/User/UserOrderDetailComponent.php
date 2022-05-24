<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserOrderDetailComponent extends Component
{

    public $order_id;
    public function  mount($order_id)
    {
        $this->order_id = $order_id;
    }
    public function cancelOrder()
    {
        $order = Order::find($this->order_id);
        $order->status = "canceled";
        $order->canceled_date = DB::raw('CURRENT_DATE');
        $order->save();
        session()->flash('cancel_message','Order has been Canceled!');
    }   
    public function render()
    {
        $order = Order::where('user_id',Auth::user()->id)->where('id',$this->order_id)->first();
        return view('livewire.user.user-order-detail-component',['order'=>$order])->layout('layouts.base');
    }
}
