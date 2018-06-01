@extends('main.master')


@section('title','Showing Category')

@section('content')

    <div class="col-md-6 col-md-offset-3">
  <h3 style="background-color: #1b6d85;color: white;">Showing All Category</h3>
  <p class="delete_mess"></p>
        <div class="table-responsive">
            <table class="table ">
 
                <tr>
                    <th>Sl</th>
                    <th>Category</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php $i=0; ?>
                @foreach($category as $value)
                   <?php $i++; ?>

                   
                    <tr id="myTr{{ $value->id }}">
                    <td>{{ $i  }}</td>
                    <td>{{ $value->category_name  }}</td>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $value->id }}" data-whatever="@mdo">Edit</button>
                  <div class="modal fade" id="exampleModal{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Update Category</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Category Name:</label>
            <p id="error" style="color: red;font-size: 25px;"></p>
            <input type="text" value="{{ $value->category_name }}" class="form-control" id="category-name{{ $value->id }}">
          </div>
      
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" onclick="edit_data({{ $value->id }})" id="save-data" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>
                  </td>
                    <td><button onclick="deleteData({{ $value->id }})" id="delete_id" value="{{ $value->id }}" class="btn btn-danger">Delete</button></td>
                   </tr>



                @endforeach
            </table>
        </div>

    </div>
    <script>
    // background-color color of tr by oder of odd and even 
        $(document).ready(function(){
            $("tr:odd").css("background-color", "#525962");
            $("tr:even").css("background-color", "#ccc");
            $("tr:odd").css("color","#fff");
        });

        // functin for delete table data using ajax

        function deleteData(id){
                        
     var token = '{{ csrf_token()  }}';
            // alert(id);
            // alert(token);

     // var hiddenClass = "myTr"+id;
     // var b = hiddenClass+id;
     // alert(hiddenClass);
     if (confirm('Are you sure you want to delete this?')) {
            $.ajax({
                
                type:'post',
                url:'categoryDelete',
                data:{delete_id:id,_token:token},
                success:function(data){

                        // $('#delete_mess').html('Delete success');
                        $('#myTr'+id).hide('slow');
                }


            });
        }
         

        }

        // edit data
           
           function edit_data(id){
     var token = '{{ csrf_token()  }}';
           // alert(id);
    var name = $('#category-name'+id).val();
    if (name.length === 0 ) {
 
        // Usually show some kind of error message here
       $('#error').html('field must not be empty');
        // Prevent the form from submitting
         event.preventDefault();
  
    }
    else{
          
          $.ajax({

              type:'post',
              url:'Edit_ajax',
              data:{id:id,category_name:name,_token:token},

              success:function(data){
              // $('#dt').html(data);
               $('#exampleModal'+id).modal('hide');     
              }

          });
    }
           



           }


           // $( '#save-data' ).on( 'click', function () {

             // var name 
        // $.ajax({
        //     method: 'POST',
        //     url: urlEdit,
        //     data: { body: $( '#post-body' ).val(), postId: postId, _token: token }
        // })
        // .done( function ( msg ) {
        //     // console.log( msg[ 'message' ] );
        //     // console.log( JSON.stringify( msg ) );
        //     $( postBodyElement ).text( msg[ 'new_body' ] );
        //     $( '#editPost' ).modal( 'hide' );
        // } );
      // }

    </script>
@endsection