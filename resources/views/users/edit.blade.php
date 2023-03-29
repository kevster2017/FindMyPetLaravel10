@extends('layouts.app')

@section('content')

    <div class="wrapper" style="background-image: url('../layouts/assets/images/bg-registration-form-2.jpg');">
        <div class="inner">
        <form action="{{ route('users.update', $users->id) }} " enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')

                <h3>Edit User Form</h3>
                <div class="avartar">
                
                    <div class="avartar-picker">
                        <input type="file" class="inputfile" id="image" name="image">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label for="image">
                                <i class="zmdi zmdi-camera"></i>
                                <span>Choose Picture</span>
                            </label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-wrapper">
                        <label for="firstName" name="firstName">First Name</label>
                        <input type="text" name="firstName" class="form-control">
                    </div>

                    <div class="form-wrapper">
                        <label for="surname" name="surname">Surname</label>
                        <input type="text" name="surname" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-wrapper">
                        <label for="town" name="town">Town</label>
                        <input type="text" name="town" class="form-control">
                    </div>

                    <div class="form-wrapper">
                        <label for="postCode" name="postCode">Post Code</label>
                        <input type="text" name="postCode" class="form-control">
                    </div>
                </div>

               
                <button>Edit Profile</button>
            </form>
        </div>
    </div>

@endsection