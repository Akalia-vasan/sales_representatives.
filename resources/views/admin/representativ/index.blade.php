@extends('layouts.app')

@section('title', 'My Task' . ' | ' . 'Representativ Management')

@section('breadcrumb-links')
<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Representativ</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
            <a class="dropdown-item" href="{{ route('admin.auth.representativ.create') }}">Create Representativ</a>
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                Sales Team
                </h4>
            </div>
            <!--col-->
        </div>
        <!--row-->
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
            <p>{{ $message }}</p>
            </div>
        @endif
        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive" style="overflow-y:visible;overflow-x:visible;">
                    <table class="table" id="users-table" data-ajax_url="{{ route("admin.auth.representativ.get") }}">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Telephone</th>
                                <th>Created</th>
                                <th>Last Updated</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--col-->
        </div>
        <!--row-->
    </div>
    <!--card-body-->
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td id="sale-id"></td>
                <tr>
                <tr>
                    <td>Full Name</td>
                    <td id="sale-name"></td>
                <tr>
                <tr>
                    <td>Email Address</td>
                    <td id="sale-email"></td>
                <tr>
                <tr>
                    <td>Telephone</td>
                    <td id="sale-phone"></td>
                <tr>
                <tr>
                    <td>Address</td>
                    <td id="sale-address"></td>
                <tr>
                <tr>
                    <td>Join Date</td>
                    <td id="sale-date"></td>
                <tr>
                <tr>
                    <td>Current Routes</td>
                    <td id="sale-route"></td>
                <tr>
                <tr>
                    <td>Comments</td>
                    <td id="sale-comment"></td>
                <tr>
            </thead>
        </table>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--card-->
@endsection

@section('pagescript')
<script>
    FTX.Utils.documentReady(function() {
        FTX.Users.list.init('');
    });
    $(document).on("click","#add-dialog",function() {
        console.log(11)
        var id = $(this).data('id');
        var name = $(this).data('name');
        var email = $(this).data('email');
        var phone = $(this).data('phone');
        var address = $(this).data('address');
        var routes = $(this).data('routes');
        var join = $(this).data('join');
        var comment = $(this).data('comment');

        $('#sale-id').text(id);
        $('#sale-name').html(name);
        $('#sale-email').html(email);
        $('#sale-phone').html(phone);
        $('#sale-date').html(join);
        $('#sale-address').html(address);
        $('#sale-route').html(routes);
        $('#sale-comment').html(comment);

    });
</script>
@endsection