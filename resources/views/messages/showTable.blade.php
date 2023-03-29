@extends('layouts.app')

@section('content')


<!--Breadcrumb-->
<div class="container">
  <ul class="breadcrumb">
    <li><a href="/">Home</a></li>
    <li>Messages</li>
  </ul>
</div>




<div class="container">
<h1 class="text-center"><label for="messages"><strong>Messages</strong></label></h1>
  <!-- Display table -->
  <div class="col d-flex justify-content-center">
    <table class="table table-striped">
      <tr>
        <th>Id</th>
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
        <td>{{ $message->report_id }}</td>
        <td>{{ $message->firstName }}</td>                
        <td>{{ $message->message }}</td>
        <td>{{ $message->created_at->diffForHumans() }}</td>

        <td>
          <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger">Delete</a>
          <form action="{{ route('messageUs.destroy', $message->id) }}" method="post">
            @method('DELETE')
            @csrf
          </form>
        </td>



        </td>

      </tr>

      @endforeach

    </table>
  </div>
  {{ $messages->links() }}


</div>


@endsection