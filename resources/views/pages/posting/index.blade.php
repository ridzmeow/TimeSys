@extends('app',[
    'page' => 'Post'
])
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Posting</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <button type="button" class="btn btn-outline-secondary" onClick="addFunc()" href="javascript:void(0)">Post Data</button>
      </div>
    </div>
  </div>
<div class="row">
    <table id="posttbl" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Event Date</th>
                <th>Post No.</th>
                <th>Total</th>
                <th>Posted By</th>
                <th>Posted At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- <tr>
                <td>Jena Gaines</td>
                <td>Office Manager</td>
                <td>London</td>
                <td>30</td>
                <td>2008/12/19</td>
                <td>$90,560</td>
            </tr> --}}
        </tbody>
    </table>
</div>

@include('pages.posting.create')

<script type="text/javascript">

    $(document).ready( function () {
        $('#posttbl').DataTable();

        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // $('#posttbl').DataTable({
        //     processing: true,
        //     serverSide: true,
        //     ajax: "{{ url('/post') }}",
        //     columns: [
        //         { data: 'id', name: 'id' },
        //         { data: 'event_date', name: 'event_date' },
        //         { data: 'post_no', name: 'post_no' },
        //         { data: 'total_rows', name: 'total_rows' },
        //         { data: 'postedBy_id', name: 'postedBy_id' },
        //         { data: 'created_at', name: 'created_at' },
        //         { data: 'action', name: 'action', orderable: false },
        //     ],
        //     order: [[0, 'desc']]
        // });

        $("#btnSubmit").click(function(e){
  
            e.preventDefault();

            var event_date = $("#event_date").val();
            var post_no = $("#post_no").val();

            console.log(event_date, post_no);

            $.ajax({
                type:'POST',
                url:"{{ url('/post/store') }}",
                data:{event_date:event_date, post_no:post_no},
                success:function(data){
                    alert(data.success);
                }
            });
        });
    });

    // SHOW MODAL
    function addFunc(){
        $('#postform').trigger("reset");
        $('#postmdl-title').html("Post Data");
        $('#postmdl').modal('show');
        $('#id').val('');
    }  

</script>
@endsection