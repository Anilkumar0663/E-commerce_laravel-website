<div>
    <div class="container" style="padding:30px 0">
    <div class="row">
      <div class="col-md-12">
          <div class="panel panel-default">
              <div class="panel-heading">
                  <div class="row">          
                    <div class="col-md-4">
                        All Coupons
                  </div>
                  <div class="col-md-4">
                        <a href="{{ route('admin.addcoupon') }}" class="btn btn-success pull-right" style="margin-right: -388px">Add New</a>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                  @if (Session::has('message'))
                  <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                      
                  @endif
                  <table class="table table-striped">
                      <thead> 
                      <tr>
                          <th>Coupon Code</th>
                          <th>Coupon type</th>
                          <th>Coupon value</th>
                          <th>Cart value</th>
                          <th>Expiry date</th>
                          <th>Action</th>
                      </tr>
                    </thead>  
                    <tbody>
                        @foreach ($coupons as $coupon)
                            <tr>
                                <td>{{$coupon->code}}</td>
                                <td>{{$coupon->type}}</td>
                                @if ($coupon->type == 'fixed')
                                    <td>${{$coupon->value}}</td>
                                @else 
                                    <td>${{$coupon->value}}%</td>
                                @endif
                                
                                <td>{{$coupon->cart_value}}</td>
                                <td>{{$coupon->expiry_date}}</td>
                                <td> <a href="{{route('admin.editcoupon',['coupon_id'=>$coupon->id])}}"> <button class="btn btn-primary">Edit</button> </a> </td>
                                <td> <a href="#" onclick="return confirm('Are you sure, You want to delete this Category?') || event.stopImmediatePropagation()" wire:click.prevent="deleteCoupon({{$coupon->id}})"> <button class="btn btn-danger">Delete</button> </a> </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                  {{-- {{$categories->links()}} --}}
              </div>
          </div>
      </div>
    </div>
    </div>
</div>
