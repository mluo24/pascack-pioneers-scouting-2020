@extends('layouts.layout')

@section('title')
Table of Users
@endsection

<div class="container mt-5">
    
    <h1 class = "mt-5 text-center"> All Users </h1>

<table class="table" id="usertable">
<thead>
    <tr>
        <!--DO NOT DELETE THE LINE BELLOW, IT IS NECECEARY FOR THE TABLE TO BE GOOD-->
      <th scope="col">Id:</th>
      <th scope="col">Name:</th>
      <th scope="col">Role:</th>
      <th scope="col">Email:</th>
      <th scope="col">Created at:</th>
    </tr>
  </thead>
  <tbody>
    
    @foreach($users as $user)
    <tr>
        
      <td>{{ $user->id }}</td>
      <td> <a href="{{ route('users.show', $user) }}">{{ $user->name }}</a></td>
        <td>{{ $user->role->display_name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->created_at}}</td>

    </tr>
    @endforeach

  </tbody>
</table>
</div>

<!--<table id="downloadviewtable" class="table table-striped table-bordered dataTable no-footer" style="width: 100%; position: relative;" role="grid" aria-describedby="downloadviewtable_info">-->
<!--<tr>-->
    
<!--    <td>{{ $user->id }}</td>-->
<!--</tr>-->
<!--</table>-->

@section("custom_scripts")
<script>

    $(document).ready( function () {
        $('#usertable').DataTable();
    });
    
</script>

@endsection
