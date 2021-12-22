@extends('layouts.layout')

@section('title')
settings
@endsection

<!-- Page title -->
@section('title', 'Settings | Team 1676 Scouting')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Settings</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
        			    @if(session()->get('success'))
                            <div class="alert alert-success">
                              {{ session()->get('success') }}  
                            </div>
                        @endif
                      </div>
                    </div>
                    
                    <div class="row">
                        
                    <div class="col-md">
                    
                    <h2>Change Global Competition</h2>
                    <div class="alert alert-warning">
                        Current Competition (in database): {{ $current->name }}
                    </div>
                    <form method="post" action="{{ route('settings.change') }}">
                        @csrf
                        <div class="form-group">
                            <label for="event">Competition</label>
                            <select class="form-control" id="event" name="event" required>
                                @foreach($events as $event)
                                  <option value="{{$event->id}}" @if($event->active) selected @endif>{{ $event->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </div>
                    <div class="col-md">
                    <h2>Upload Match Info</h2>
                    <form method="post" action="{{ route('settings.change') }}" enctype="multipart/form-data">
                        @csrf
                        <p>Format of CSV should be <code>match, red1, red2, red3, blue1, blue2, blue3</code>.
                        <div class="form-group">
                            <input class="form-control-file" type="file" name="csvfile" id="csvfile" accept=".csv" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
