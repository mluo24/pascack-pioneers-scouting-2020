@extends('layouts.layout')

@section('title')
Your Profile
@endsection


<div class = "container mt-5">
    <!--<div class = "card mt-5" ></div>-->
   <!-- the div above is a spacer -->
    <!--<div class="card mt-5 ml-3" style="width: 80%;">-->
         <!--<div class="card-body">-->
           <h1 class="mt-5 text-center"> Your Profile </h1>
        <!--</div>-->
    <!--</div>-->
    
    <!--<div class="card mt-5">-->
    <!--     <div class="card-body">-->
          
          
    <div class="row">
        <div class="col-md">
          <!--<div class = "ml-3 mt-5" style="width: 80%;">-->
            <ul class="list-group">
            <li class="list-group-item"> Role: {{ $user->role->display_name }}  </li>    
            <li class="list-group-item"> Name:    {{ $user->name }}            </li>
            <li class="list-group-item"> Email:   {{ $user->email }}          </li>
            <li class="list-group-item"> Created at: {{ $user->created_at}}    </li>
            </ul>
        <!--</div>-->
        </div>
    </div>
            
    <!--    </div>-->
    <!--</div>-->
    
    
    
    
    
</div>