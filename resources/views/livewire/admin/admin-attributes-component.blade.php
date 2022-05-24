<div>
    <style>
        .sclist{
            list-style: none;
        }
        .sclist li{
            line-height: 33px;
            border-bottom: 3px solid #ccc;
        }
        .slink i{
            font-size:16px;
            margin-left:12px;

        }
    </style>
    <div class="container" style="padding:30px 0">
    <div class="row">
      <div class="col-md-12">
          <div class="panel panel-default">
              <div class="panel-heading">
                  <div class="row">          
                    <div class="col-md-4">
                        All Attributes
                  </div>
                  <div class="col-md-4">
                        <a href="{{ route('admin.add_attributes') }}" class="btn btn-success pull-right" style="margin-right: -388px">Add New</a>
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
                          <th>ID</th>
                          <th>Name</th>
                          <th>Created_at</th>
                          <th>Action</th>
                      </tr>
                    </thead>  
                    <tbody>
                        @foreach ($productAttributes as $Attributes)
                            <tr>
                                <td>{{$Attributes->id}}</td>
                                <td>{{$Attributes->name}}</td>
                                <td>{{$Attributes->created_at}}</td>
                                <td> <a href="{{route('admin.edit_attributes',['attribute_id'=>$Attributes->id])}}"> <button class="btn btn-primary">Edit</button> </a> </td>
                                <td> <a href="#" onclick="return confirm('Are you sure, You want to delete this Category?') || event.stopImmediatePropagation()" wire:click.prevent="deleteAttribute({{$Attributes->id}})"> <button class="btn btn-danger">Delete</button> </a> </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                  {{$productAttributes->links()}}
              </div>
          </div>
      </div>
    </div>
    </div>
</div>
