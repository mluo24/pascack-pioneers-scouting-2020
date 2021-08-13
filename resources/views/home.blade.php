@extends('layouts.main')

<!-- Page title -->
@section('title', 'Home | Team 1676 Scouting')

@section('content')
<!--<div class="container">-->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1 style="text-align: center; font-size: 64px;">Welcome!</h1>
                    <br>
                    @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</span>.</span></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
        			    @if(session()->get('success'))
                            <div class="alert alert-success">
                              {{ session()->get('success') }}<span>!</span>
                            </div>
                        @endif
                    <div class="alert alert-warning">
                        @if(session()->exists("competition"))
                            Current Competition: <span style="text-transform: capitalize;">{{ DB::table('competitions')->where('id', session('competition'))->first()->slug }}</span> 
                        @else
                            <p>Please logout and login again. Thank you!</p>
                        @endif
                    </div>
                    
                    <form method="post" action="{{ route('competition.update') }}">
                        @csrf
                        <div class="form-group">
                            <label for="competition"><h2>Change Competition</h2></label>
                            <br>
                            <select class="form-control" id="competition" name="competition" required>
                                @foreach($competitions as $competition)
                                  <option value="{{ $competition->id }}" @if($competition->id == session('competition')) selected @endif>{{ $competition->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
<!--</div>-->
@endsection