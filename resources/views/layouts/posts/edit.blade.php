<!-- Edit Post -->
<div class="modal fade" id="Editpost{{$posts->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
   <div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel"> Edit Post </h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <form action="{{route('posts.update',$posts->id)}}" method="post" autocomplete="off" enctype="multipart/form-data" >
                   @method('POST')
                   @csrf
                   {{--Input hidden id--}}
                   <input type="hidden" name="id" value="{{$contacts->id}}"/>

                    <div class="col">
                        <label> Title </label>
                        <input type="text" name="title" class="form-control">
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                   <br>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Category</label>
                        <select class="form-control" name="category_id" id="category">
                        
                        @foreach ($category as $category)
                        <option value="{{$category->id}}" >{{$category->name}}</option>
                        @endforeach
                        
                        </select>
                    </div>


                    <div class="col">
                        <label> Description </label>
                        <textarea class="form-control" name="content"
                            id="content" rows="8" cols="8"></textarea>
                            @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>

                    <div class="col">
                        <label for="featured">Photo</label>
                        <input type="file" class="form-control-file" name="featured">
                        @error('featured')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                       <button class="btn btn-primary">Confirm</button>
                   </div>

               </form>
           </div>
       </div>
   </div>
</div>

