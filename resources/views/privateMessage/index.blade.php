@extends('layouts.app')

@section('content')


<!--Breadcrumb-->
<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">All Private Messages</li>
    </ol>
  </nav>
</div>




<div class="container">
  <h1 class="text-center pb-3">All Private Messages</h1>
  @if($messages->count() < 1) <h1 class="text-center">No Messages Received </h1>
    @else

    <!-- Display table -->
    <div class="col d-flex justify-content-center">
      <table class="table table-striped">
        <tr>
          <th>Id</th>
          <th>From UserId</th>
          <th>To UserId</th>
          <th>Report ID</th>
          <th>First Name</th>
          <th>Message</th>
          <th>Message Received</th>
          <th>Delete Message</th>
        </tr>

        <!-- Display messages -->
        @foreach($messages as $message)
        <tr>
          <td style="font-style: italic; color: #000033">{{ $message->id }}</td>
          <td>{{ $message->user_id }}</td>
          <td>{{ $message->ToUser_id }}</td>
          <td>{{ $message->report_id }}</td>
          <td>{{ $message->firstName }}</td>

          <td>{{ $message->message }}</td>
          <td>{{ $message->created_at->diffForHumans() }}</td>

          <td>

            <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#deleteModal">
              Delete
            </button>

            <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel"><strong>Are you sure you want to delete this message?</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                  </div>
                  <div class="modal-body">
                    Deleting this message is permanent and cannot be undone!!
                  </div>
                  <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger">Delete Message</a>
                    <form action="{{ route('privateMessage.destroy', $message->id) }}" method="post">
                      @method('DELETE')
                      @csrf
                    </form>
                  </div>

                </div>
              </div>
            </div>


          </td>



          </td>

        </tr>

        @endforeach

      </table>
    </div>
    @endif

    <div class="pagination justify-content-center mt-3">
      {{ $messages->links() }}
    </div>



</div>


@endsection