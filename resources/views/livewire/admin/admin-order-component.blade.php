<div>
     <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        All Orders
                    </div>
                     <div class="panel-body">
                     @if (Session::has('status_message'))
                         <div class="alert alert-success" role="alert">{{ Session::get('status_message') }}</div>
                         
                     @endif
                      <table class="table table-striped">
                          <thead>
                              <th>Order Id</th>
                              <th>Subtotal</th>
                              <th>Discount</th>
                              <th>Tax</th>
                              <th>Total</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Mobile</th>
                              <th>Email</th>
                              <th>Zipcode</th>
                              <th>Status</th>
                              <th>Order date</th>
                              <th colspan="2" class="text-center">Action</th>
                             
                          </thead>
                          <tbody>
                              @foreach ($orders as $order)
                              <tr>
                                  <td>{{ $order->id }}</td>
                                  <td>${{ $order->subtotal }}</td>
                                  <td>${{ $order->discount }}</td>
                                  <td>${{ $order->tax }}</td>
                                  <td>${{ $order->total }}</td>
                                  <td>{{ $order->firstname }}</td>
                                  <td>{{ $order->lastname }}</td>
                                  <td>{{ $order->mobile }}</td>
                                  <td>{{ $order->email }}</td>
                                  <td>{{ $order->zipcode }}</td>
                                  <td>{{ $order->status }}</td>
                                  <td>{{ $order->created_at }}</td>
                                  <td><a href="{{ route('admin.orderdetail',['order_id'=>$order->id])}}" class="btn btn-info btn-sm">Details</a></td>
                                  <td>
                                      <div class="dropdown">
                                      <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">status
                                          <span class="caret"></span>
                                      </button>
                                      <ul class="dropdown-menu">
                                          <li><a href="#" wire:click.prevent="updateOrderStatus({{ $order->id }},'delivered')">Delivered</a></li>
                                          <li><a href="#"wire:click.prevent="updateOrderStatus({{ $order->id }},'canceled')">Canceled</a></li>
                                      </ul>
                                    </div>
                                  </td>                                  
                              </tr>
                                  
                              @endforeach
                          </tbody>
                      </table>
                       {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>

     </div>
</div>


@push('scripts')
    <script>        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </script>
@endpush