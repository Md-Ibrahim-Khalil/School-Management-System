@extends('layouts.main')

@section('content')
<!-- With this particular page create a route method into the web.php   Route::get('/create', 'StudentController@create')->name('create');  -->

<div class="container">

@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <ul style="text-align:center">
            <li style="list-style: none">{{ $error }}</li>
        </ul>
        @endforeach
    </div>
@endif


    <h1>Edit Page</h1>


    <!-- Default form register:: link the store method for inserting data  into the database and name="firstname" -->
    <form class="text-center border border-light p-5" action="{{ route('update',$student->id) }}" method="POST">
    {{-- without csrf field will not insert all data --}}
    @csrf

        <p class="h4 mb-4">Add Student</p>

        <div class="form-row mb-4">
            <div class="col">
                <!-- First name -->
                <input type="text" id="defaultRegisterFormFirstName" class="form-control" value="{{ $student->first_name }}" name="firstname"
                    placeholder="First name">
            </div>
            <div class="col">
                <!-- Last name -->
                <input type="text" id="defaultRegisterFormLastName" class="form-control" value="{{ $student->last_name }}" name="lastname"
                    placeholder="Last name">
            </div>
        </div>

        <!-- E-mail -->
        <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" value="{{ $student->email }}" name="email" placeholder="E-mail">
        <!-- Phone number -->
        <input type="text" id="defaultRegisterPhonePassword" class="form-control" value="{{ $student->phone }}" name="phone"
            placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock">
        <!-- Sign up button -->
        <button class="btn btn-info my-4 btn-block" type="submit">Update</button>
</div>

@endsection
