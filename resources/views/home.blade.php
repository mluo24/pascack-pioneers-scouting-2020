@extends('layouts.layout')


@section('title')
Home Page
@endsection

@section('content')

<div class = "container">
<h1 class="mt-4 text-center">Home</h1>

<div id="alert" style="margin-top: 20px;" class="alert alert-danger">
        
        <p style="padding: 10px 20%; font-size: 16pt; text-align: center;">
                   <b> MT. OLIVE CANCELLED</b><br>
<span style="font-size: 14pt;">The Mt. Olive Competition has been cancelled.<br>
Team 1676 will no longer be competing this weekend. <br>
More information will appear here as we receive it.</span></p>
        
    </div>

<div class = "row justify-content-center mt-4">
<div class = "col-md-4">
  <div class="card">
    <div class="card-header">
      Change Settings
    </div>
    <div class="card-body">

      <form method="post" action="{{ route('settings.session') }}">
          @csrf
          <div class="form-group mx-auto">
          <select class="custom-select d-block w-100" name="event" required>
            <option value="">Choose event...</option>
            @php
              $events = DB::table('events')->get();
            @endphp
            @foreach($events as $event)
              <option value="{{$event->id}}" @if(session('event') == $event->id) selected @endif>{{ $event->name }}</option>
            @endforeach
          </select>
          </div>

          @can("create", App\DataEntry::class)
          <div class="form-group mx-auto">
            <select class="custom-select d-block w-100" name="alliance" required>
              <option value="">Choose alliance...</option>
              <option value="red" @if(session('alliance') == "red") selected @endif>Red</option>
              <option value="blue" @if(session('alliance') == "blue") selected @endif>Blue</option>
            </select>
          </div>

          <div class="form-group mx-auto">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inputtype" id="fieldoption" value="field" @if(session('inputtype') == "field") checked @endif>
              <label class="form-check-label" for="fieldoption">Field</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inputtype" id="manualformoption" value="manual" @if(session('inputtype') == "manual") checked @endif>
              <label class="form-check-label" for="manualformoption">Manual Form</label>
            </div>
          </div>

          <div class="form-group mx-auto">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="orientation" id="redright" value="redright" @if(session('orientation') == "redright") checked @endif>
              <label class="form-check-label" for="redright">Red Right</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="orientation" id="redleft" value="redleft" @if(session('orientation') == "redleft") checked @endif>
              <label class="form-check-label" for="redleft">Red Left</label>
            </div>
          </div>
            
          @endcan
            
          <button class="btn btn-primary float-right" type="submit">Submit</button>
      </form>

      </div>
    </div>
</div>

<div class="col-md">
  <div class="card">
    <div class="card-header">Welcome!</div>
    <div class="card-body">
      @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}!
      </div>
      @endif
      <div class="alert alert-info">
        @if(session()->exists("event"))
            Current Competition: {{ DB::table('events')->find(session('event'))->name }}
            @can("create", App\DataEntry::class) <br>
            Current Alliance: {{ session('alliance')}} <br>
            Form type: {{ session('inputtype')}}<br>
            Orientation: {{ session('orientation')}}<br>
            @endcan
        @else
            Please submit this form before doing anything else. Thank you!
        @endif
      </div>
      <h3 class="text-center">Welcome to the Scouting Website!</h3>
      <p>The banner above shows the current session values, set by default when you log in. The form on the left lets you set your session.</p>
      @can("create", App\DataEntry::class)
      <!--For the people on the team-->
      <p>Make sure to select the right competition! It's likely that the right one has been selected for you already.</p>
      <p>The "red" or "blue" options are for your assigned alliance when scouting.</p>
      <p>The "field" or "manual form" options are for choosing your desired method of input, field being looking at the actual field, manual form being an actual physical form to enter values and submit, like we usually do in previous years.</p>
      <p>The last option changes the orientation of the field. This is only relevant if selecting the "field" input method, and the orientation depends on your view from the stands. If the red alliance is on the right, select that option, and if on the left, select that option.</p>
      <p>You can also submit this form in the "Scout" page if you realize something is wrong. Note that the alliance does not automatically update in the form when you change it, so you'll have to do that manually.</p>
      @else
      <!--For the people not on the team-->
      <p>The different competitions selected will affect what data is displayed in the "View Data" page. Do not pick "Test" as there is no meaningful data there.</p>
      @endcan
    </div>
  </div>
</div>

</div>
</div>
@endsection
