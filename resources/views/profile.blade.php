@extends('layouts.main')

<!-- Page title -->
@section('title', 'Profile | Team 1676 Scouting')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h1>User Profile</h1>
                <form method="POST" action="">
                    @method('PUT')
                    @csrf
                <ul id="profileinfo">
                    <li>Name: <span id="initname">{{ $user->first_name }} {{ $user->last_name }}</span></li>
                    <li>Email: <span id="initemail">{{ $user->email }}</span></li>
                    <li>Role: <span id="initrole">{{ $user->roles()->first()->name }}</span></li>
                    <select style="display:none;" id="role" name="role">
                        @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </ul>
                <!--My Code from 02/13/2019-->
                @can('update-settings') <button type="button" class="btn btn-primary" onclick="myEdit()" style="display:block-inline;" id="edit">Edit</button>@endcan<button type="submit" class="btn btn-primary" style="margin-left:10px; display:none;" id="save" onclick="myEdit()">Save Changes</button>
                </form>
                
                <script>
                    function reviseText(element){
			            document.getElementById('initrole').innerHTML =  element.value;
                    }
                    function myEdit() {
                        document.getElementById("role").style.display='inline-block';
                        document.getElementById("save").style.display='inline-block';
                    }
                </script>
                <!--End of my Code-->
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_scripts')
@endsection
