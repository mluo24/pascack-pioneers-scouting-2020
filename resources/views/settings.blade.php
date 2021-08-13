@extends('layouts.main')

<!-- Page title -->
@section('title', 'Settings | Team 1676 Scouting')

@section('content')
<!--<div class="container">-->
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
                    <form method="post" action="{{ route('settings.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="competition">Competition</label>
                            <select class="form-control" id="competition" name="competition" required>
                                @foreach($competitions as $competition)
                                  <option value="{{ $competition->slug }}" @if($competition->active) selected @endif>{{ $competition->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </div>
                    <div class="col-md">
                    <h2>Upload Match Info</h2>
                    <form method="post" action="{{ route('settings.store') }}" enctype="multipart/form-data">
                        @csrf
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
<!--</div>-->
@endsection
