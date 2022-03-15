@extends('app',[
    'page' => 'Roles'
])
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">List of roles</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <button type="button" class="btn btn-outline-secondary" onClick="addFunc()" href="javascript:void(0)">Add role</button>
      </div>
    </div>
</div>
<div class="row">
  
    <table id="roleTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>{{ $role->description }}</td>
                <td>
                    <a href="/role/{{ $role->id }}" data-toggle="tooltip" data-original-title="Edit" class="btn btn-success btn-sm">Edit</a>
                    <a onclick="onDelete({{ $role->id }})" data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

<div class="modal fade" id="roleModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width: 30%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="roleModal-title"></h4>
            </div>
            <div class="modal-body" id="roleModal-body">
                <form action="{{ route('role.store') }}" method="POST" id="roleForm">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{ Session::get('role.id') }}">

                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
            
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Name" required value="{{ Session::get('role.name') }}">
                    </div>
        
                    <div class="mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <textarea name="description" class="form-control" id="description">{{ Session::get('role.description') }}</textarea>
                    </div>
            
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
     
<script type="text/javascript">
      
    $(document).ready( function () {
        $('#roleTable').DataTable();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
  
    function addFunc(){
        sessionStorage.removeItem('role');
        $('#roleForm').trigger("reset");
        $('#roleModal-title').html("Add Role");
        $('#roleModal').modal('show');
        $('#id').val('');
    } 

    function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }

    @if(Session::has('role'))
        $('#roleForm').trigger("reset");
        $('#roleModal-title').html("Update Role");
        $(window).on('load', function(){ 
            $('#roleModal').modal('show');
        });
    @endif

    function onDelete(id)
    {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-danger',
                cancelButton: 'btn btn-default'
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                if (result.isConfirmed){

                    window.location.href = "{{URL::to('role/delete')}}/"+id;
                }
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                toastr.info(
                    'Your data is safe :)',
                    'CANCELLED'
                );
            }
        });
        }
  
</script>
  
@endsection