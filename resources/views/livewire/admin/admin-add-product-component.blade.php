<div>
    <div class="container" style="padding: 30px">
     <div class="row">
         <div class="col-md-12">
             <div class="panel panel-default">
                 <div class="panel-heading">   
                     @if (Session::has('message'))
 
                          <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        
                     @endif            
                     <div class="row">    
                         <div class="col-md-6">
                             Add New Product
                         </div>
                         <div class="col-md-6">
                             <a href="{{route('admin.product')}}" class="btn btn-success pull-right">All Products </a>  
                         </div>
                     </div>
                 </div>
                 <div class="panel-body">
                    
                    <form  class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="addProduct">
                     <div class="form-group">
                         <label for="" class="col-md-4">Product Name</label>
                         <div class="col-md-4">
                             <input type="text" placeholder="Enter Product Name" class="form-control input-md" wire:model="name" wire:keyup="generateslug"/>
                             @error('name') <p class="text-danger">{{ $message }}</p>@enderror
                         </div>
                     </div>
                    <div class="form-group">
                         <label for="" class="col-md-4">Product Slug</label>
                         <div class="col-md-4">
                             <input type="text" placeholder="Enter Product Slug" class="form-control input-md" wire:model="slug"/>
                             @error('slug') <p class="text-danger">{{ $message }}</p>@enderror
                         </div>
                     </div>
                    <div class="form-group">
                         <label for="" class="col-md-4">Short Description</label>
                         <div class="col-md-4" wire:ignore>
                             <textarea type="text" id="short-description" placeholder="Short Description" class="form-control input-md" wire:model="short_description"></textarea>
                             @error('short_description') <p class="text-danger">{{ $message }}</p>@enderror
                         </div>
                     </div>
                     <div class="form-group">
                         <label for="" class="col-md-4">Description</label>
                         <div class="col-md-4" wire:ignore>
                             <textarea type="text" id="description" placeholder="Description" class="form-control input-md" wire:model="description"></textarea>
                             @error('description') <p class="text-danger">{{ $message }}</p>@enderror
                         </div>
                     </div>
                     <div class="form-group">
                         <label for="" class="col-md-4">Regular Price</label>
                         <div class="col-md-4">
                             <input type="text" placeholder="Regular Price" class="form-control input-md" wire:model="regular_price"/>
                             @error('regular_price') <p class="text-danger">{{ $message }}</p>@enderror
                         </div>
                     </div>
                     <div class="form-group">
                         <label for="" class="col-md-4">Sale Price</label>
                           <div class="col-md-4">
                             <input type="text" placeholder="Sale Price" class="form-control input-md" wire:model="sale_price"/>
                             @error('sale_price') <p class="text-danger">{{ $message }}</p>@enderror
                         </div>
                     </div>
                     <div class="form-group">
                         <label for="" class="col-md-4">SKU</label>
                           <div class="col-md-4">
                             <input type="text" placeholder="SKU" class="form-control input-md" wire:model="SKU"/>
                             @error('SKU') <p class="text-danger">{{ $message }}</p>@enderror
                          </div>
                     </div>
                     <div class="form-group">
                         <label for="" class="col-md-4">Stock Status</label>
                           <div class="col-md-4">
                             <select  class="form-control" wire:model="stock_status">
                                 <option value="InStock">InStock</option>
                                 <option value="OutOfStock">outofStock</option>
                             </select>
                             @error('stock_status') <p class="text-danger">{{ $message }}</p>@enderror
                          </div>
                     </div>
                     <div class="form-group">
                         <label for="" class="col-md-4">Quantity</label>
                         <div class="col-md-4">
                             <input type="text" placeholder="Quantity" class="form-control input-md" wire:model="quantity"/>
                             @error('quantity') <p class="text-danger">{{ $message }}</p>@enderror
                         </div>
                     </div>
                    <div class="form-group">
                         <label for="" class="col-md-4">Image</label>
                         <div class="col-md-4">
                             <input type="file"   class="input-file" wire:model="image"/>
                             @if ($image)
                                  <img src="{{$image->temporaryUrl()}}"  width="120" alt="">                                
                             @endif
                             @error('image') <p class="text-danger">{{ $message }}</p>@enderror
                         </div>
                     </div> 
                     <div class="form-group">
                         <label for="" class="col-md-4">Gallery</label>
                         <div class="col-md-4">
                             <input type="file"   class="input-file" wire:model="images" multiple/>
                             @if ($images)
                               @foreach ($images as $image)
                                  <img src="{{$image->temporaryUrl()}}"  width="120" alt="">
                               @endforeach                                
                             @endif
                             @error('images') <p class="text-danger">{{ $message }}</p>@enderror
                         </div>
                     </div>
 
                     <div class="form-group">
                         <label for="" class="col-md-4">Categories</label>
                           <div class="col-md-4">
                             <select  class="form-control" wire:model="category_id" wire:change="chanegeSubcategory">
                                 <option value="">Select Category</option>
                                 @foreach ($categories as $category)
                                 <option value="{{$category->id}}">{{$category->name}}</option> 
                                 @endforeach
                             </select>
                             @error('category_id') <p class="text-danger">{{ $message }}</p>@enderror
                          </div>
                     </div> 
                     <div class="form-group">
                         <label for="" class="col-md-4">Sub Categories</label>
                           <div class="col-md-4">
                             <select  class="form-control" wire:model="scategory_id">
                                 <option value="0">Select Category</option>
                                 @foreach ($scategories as $scategory)
                                 <option value="{{$scategory->id}}">{{$scategory->name}}</option> 
                                 @endforeach
                             </select>
                             @error('scategory_id') <p class="text-danger">{{ $message }}</p>@enderror
                          </div>
                     </div>
                     <div class="form-group">
                        <label for="" class="col-md-4">Product Attribute</label>
                          <div class="col-md-3">
                            <select  class="form-control" wire:model="attr">
                                <option value="0">Select Attribute</option>
                                @foreach ($pattribute as $pattribute)
                                <option value="{{$pattribute->id}}">{{$pattribute->name}}</option> 
                                @endforeach
                            </select>
                         </div>
                         <div class="col-md-1">
                            <button  type="button" class="btn btn-info" wire:click.prevent="add">Add</button>
                         </div>
                    </div>
                    @foreach ($input as $key=>$value)
                    <div class="form-group">
                        <label for="" class="col-md-4">{{ $pattribute->where('id',$attribute_arr[$key])->first()->name }}</label>
                          <div class="col-md-4">
                            <input type="text" placeholder="{{ $pattribute->where('id',$attribute_arr[$key])->first()->name }}" class="form-control input-md" wire:model="attribute_values.{{ $value }}"/>
                            
                         </div>
                         <div class="col-md-1">
                             <button type="button" class="btn btn-danger btn-sm" wire:click.prevent="remove({{ $key }}) ">Remove</button>
                         </div>
                    </div>
                    @endforeach
 
                     <div class="form-group">
                         <label for="" class="col-md-4"></label>
                         <div class="col-md-4">
                             <button type="submit" class="btn btn-primary">Submit</button>
                         </div>
                     </div>
                 </form>
                 </div>
             </div>
         </div>
     </div>   
   </div>
 </div>
 
 
 {{-- @push('scripts')
     <script>
         $(function(){
             tinymce.init({
                 selector:'#short-description',
                 setup:function(editor){
                     editor.on('change',function(e){
                         tinyMCE.triggersave();
                         var  sd_data = $('#short-description').val();   
                         @this.set('short-description',sd_data);
                     });
                 }
             });
             tinymce.init({
                 selector:'#description',
                 setup:function(editor){
                     editor.on('change',function(e){
                         tinyMCE.triggersave();
                         var  d_data = $('#description').val();   
                         @this.set('description',d_data);
                     });
                 }
             });
         });
     </script>
     
 @endpush --}}