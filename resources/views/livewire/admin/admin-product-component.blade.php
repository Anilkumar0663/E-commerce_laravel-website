<div>
    <style>
            nav svg{
                height: 20px;
            }
            nav .hidden{
                display: block !important;
            }
    </style>
    <div class="container" style="padding:30px 0">  
    <div class="row">
      <div class="col-md-12">
          <div class="panel panel-default">
              <div class="panel-heading">
                  <div class="row">          
                    <div class="col-md-4">
                        All Products
                  </div>
                  <div class="col-md-4">
                       <a href="{{route('admin.addproduct')}}" class="btn btn-success pull-right" style="margin-right:-396px">Add New</a>
                  </div>
                  <hr>
                  <div class="col-md-4">
                      <input type="text" class="form-control" placeholder="Search..." wire:model="searchItem"/>
                  </div>
                </div>
              </div>
              <div class="panel-body">    
                @if (Session::has('message'))
                     <div class="alert alert-success"role="alert">{{Session::get('message')}}</div>                   
                @endif
                  <table class="table table-striped">
                      <thead> 
                      <tr>
                          <th>ID</th>
                          <th>Image</th>
                          <th>Product Name</th>
                          <th>Stock</th>
                          <th>Price</th>
                          <th>Category</th>
                          <th>Date Added</th>
                          <th>Action</th>
                      </tr>
                    </thead>  
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td><img src="{{asset('assets/images/products')}}/{{$product->image}}" width="60" alt=""></td>
                                <td>{{$product->name}}</td>
                                <td><button class="btn btn-success">{{$product->stock_status}}</button> </td>
                                <td>{{$product->regular_price}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->created_at}}</td>   
                                <td><a href="{{route('admin.editproduct',['product_slug'=>$product->slug])}}"> <button class="btn btn-primary">Edit</button></a>
                                    <a href="#"><button class="btn btn-danger" onclick="return confirm('Are you sure, You want to delete this Product?') || event.stopImmediatePropagation()" wire:click.prevent="deleteProduct({{$product->id}})">Delete</button></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                  {{$products->render()}}
              </div>
          </div>
      </div>
    </div>
    </div>
</div>
