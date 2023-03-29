@extends('layouts.app')

@section('content')


<!--Breadcrumb-->
<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">View Messages</li>
  </ol>
</nav>
</div>




<div class="container">
<h1 class="text-center mb-3"><label for="messages"><strong>Messages</strong></label></h1>
  <!-- Display table -->
  <div class="col d-flex justify-content-center">
    <table class="table table-striped">
      <tr>
        <th>Id</th>
        <th>First Name</th>
        <th>Surname</th>
        <th>Email</th>        
        <th>Message</th>
        <th>Message Received</th>
        <th>Delete Message</th>
      </tr>

      <!-- Display messages -->
      @foreach($contacts as $contact)
      <tr>
        <td style="font-style: italic; color: #000033">{{ $contact->id }}</td>
        <td>{{ $contact->firstName }}</td>
        <td>{{ $contact->surname }}</td>
        <td>{{ $contact->email }}</td>        
        <td>{{ $contact->message }}</td>
        <td>{{ $contact->created_at->diffForHumans() }}</td>

        <td>
          <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger">Delete</a>
          <form action="{{ route('contactUs.destroy', $contact->id) }}" method="post">
            @method('DELETE')
            @csrf
          </form>
        </td>



        </td>

      </tr>

      @endforeach

    </table>
  </div>
  {{ $contacts->links() }}


</div>


@endsection