@extends('layouts.app')

@section('content')
	<div class="container">
	    <div class="card">
	        <div class="card-body">
	    <h1 style="text-align:center;padding-top:30px;">Submit Scouting Data</h1>

		<div class="row">
			<div class="col-md-12 mt-5">
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
                    </div><br />
                  @endif
				<div class="bs-stepper">
					<div class="bs-stepper-header" role="tablist">
						<div class="step" data-target="#pregame">
							<button type="button" class="btn btn-link step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
								<span class="bs-stepper-circle">1</span>
								<span class="bs-stepper-label">Pre-match</span>
							</button>
						</div>
						<div class="line"></div>
						<div class="step" data-target="#midgame">
							<button type="button" class="btn btn-link step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
								<span class="bs-stepper-circle">2</span>
								<span class="bs-stepper-label">During the game</span>
							</button>
						</div>
						<div class="line"></div>
						<div class="step" data-target="#endgame">
							<button type="button" class="btn btn-link step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
								<span class="bs-stepper-circle">3</span>
								<span class="bs-stepper-label">Endgame</span>
							</button>
						</div>
						<div class="line"></div>
						<div class="step" data-target="#review">
							<button type="button" class="btn btn-link step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
								<span class="bs-stepper-circle">4</span>
								<span class="bs-stepper-label">Review</span>
							</button>
						</div>
					</div>
					<div class="bs-stepper-content">
						<form method="POST" action="{{ route('scout.store') }}">
							@csrf

							<div id="pregame" class="content" role="tabpanel" aria-labelledby="pregame-trigger">
								<h2 class="text-center">Pre-match</h2>
								<div class="form-group row">
									<label for="matchNumber" class="col-sm-2 col-form-label">Match Number</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" id="matchNumber" name="match_num" value="{{old('match_num')}}">
									</div>
								</div>
								<div class="form-group row">
									<label for="teamNumber" class="col-sm-2 col-form-label">Team Number</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" id="teamNumber" name="team_num" value="{{old('team_num')}}">
									</div>
								</div>
								<fieldset class="form-group">
									<div class="row">
										<legend class="col-form-label col-sm-2 pt-0">Alliance</legend>
										<div class="col-sm-10">
											<div class="form-check">
												<input class="form-check-input" type="radio" name="gridRadios" id="allianceRed" value="red" {{ old('gridRadios') == 'red' ? 'checked="checked"' : '' }}>
												<label class="form-check-label" for="allianceRed">Red</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="gridRadios" id="allianceBlue" value="blue" {{ old('gridRadios')  == 'blue' ? 'checked="checked"' : '' }}>
												<label class="form-check-label" for="allianceBlue">Blue</label>
											</div>
										</div>
									</div>
								</fieldset>
								<fieldset class="form-group">
									<div class="row">
										<legend class="col-form-label col-sm-2 pt-0">Starting Point</legend>
										<div class="col-sm-10">
											<div class="form-check">
												<input class="form-check-input" type="radio" name="gridRadios2" id="startingPoint1" value="startingPoint1" {{ old('gridRadios2') == 'startingPoint1' ? 'checked="checked"' : '' }}>
												<label class="form-check-label" for="startingPoint1">Starting Point 1</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="gridRadios2" id="startingPoint2" value="startingPoint2" {{ old('gridRadios2') == 'startingPoint2' ? 'checked="checked"' : '' }}>
												<label class="form-check-label" for="startingPoint2">Starting Point 2</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="gridRadios2" id="startingPoint3" value="startingPoint3" {{ old('gridRadios2') == 'startingPoint3' ? 'checked="checked"' : '' }}>
												<label class="form-check-label" for="startingPoint3">Starting Point 3</label>
											</div>
										</div>
									</div>
								</fieldset>
								<br>
							</div>
							<div id="midgame" class="content" role="tabpanel" aria-labelledby="midgame-trigger">
								<h2 class="text-center">During the game</h2>
								<fieldset class="form-group">
									<div class="row">
										<legend class="col-form-label col-sm-2 pt-0">Mode</legend>
										<div class="col-sm-10">
											<div class="form-check">
												<input class="form-check-input" type="radio" name="gridRadios3" id="driving" value="driving" {{ old('gridRadios3') == 'driving' ? 'checked="checked"' : '' }}>
												<label class="form-check-label" for="driving">Driving</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="gridRadios3" id="autonomous" value="autonomous" {{ old('gridRadios3') == 'autonomous' ? 'checked="checked"' : '' }}>
												<label class="form-check-label" for="autonomous">Autonomous</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="gridRadios3" id="both" value="both" {{ old('gridRadios3') == 'both' ? 'checked="checked"' : '' }}>
												<label class="form-check-label" for="both">Both</label>
											</div>
										</div>
									</div>
								</fieldset>
								<div class="form-group row">
									<label for="rocketPanels" class="col-sm-2 col-form-label">Rocket Panels</label>
									<div class="col-sm-10">
										<div class="input-group">
											<input type="number" class="form-control" id="rocketPanels" name="rocketPanels" value="{{ old('rocketPanels', 0) }}" min="0" max="3">
											<div class="input-group-append" id="button-addon4">
												<button class="btn btn-outline-secondary" type="button" onclick="minus(rocketPanels)">-</button>
												<button class="btn btn-outline-secondary" type="button" onclick="plus(rocketPanels)">+</button>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="rocketCargo" class="col-sm-2 col-form-label">Rocket Cargo</label>
									<div class="col-sm-10">
										<div class="input-group">
											<input type="number" class="form-control" id="rocketCargo" name="rocketCargo" value="{{ old('rocketCargo', 0) }}" min="0" max="3">
											<div class="input-group-append" id="button-addon4">
												<button class="btn btn-outline-secondary" type="button" onclick="minus(rocketCargo)">-</button>
												<button class="btn btn-outline-secondary" type="button" onclick="plus(rocketCargo)">+</button>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="cargoShipPanels" class="col-sm-2 col-form-label">Cargo Ship Panels</label>
									<div class="col-sm-10">
										<div class="input-group">
											<input type="number" class="form-control" id="cargoShipPanels" name="cargoShipPanels" value="{{ old('cargoShipPanels', 0) }}" min="0" max="3">
											<div class="input-group-append" id="button-addon4">
												<button class="btn btn-outline-secondary" type="button" onclick="minus(cargoShipPanels)">-</button>
												<button class="btn btn-outline-secondary" type="button" onclick="plus(cargoShipPanels)">+</button>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="cargoShipCargo" class="col-sm-2 col-form-label">Cargo Ship Cargo</label>
									<div class="col-sm-10">
										<div class="input-group">
											<input type="number" class="form-control" id="cargoShipCargo" name="cargoShipCargo" value="{{ old('cargoShipCargo', 0) }}" min="0" max="3">
											<div class="input-group-append" id="button-addon4">
												<button class="btn btn-outline-secondary" type="button" onclick="minus(cargoShipCargo)">-</button>
												<button class="btn btn-outline-secondary" type="button" onclick="plus(cargoShipCargo)">+</button>
											</div>
										</div>
									</div>
								</div>
								<br>
							</div>
							<div id="endgame" class="content" role="tabpanel" aria-labelledby="endgame-trigger">
								<h2 class="text-center">Endgame</h2>
								<fieldset class="form-group">
									<div class="row">
										<legend class="col-form-label col-sm-2 pt-0">Ending Hab</legend>
										<div class="col-sm-10">
											<div class="form-check">
												<input class="form-check-input" type="radio" name="gridRadios4" id="hab1" value="hab1" {{ old('gridRadios4') == 'hab1' ? 'checked="checked"' : '' }}>
												<label class="form-check-label" for="hab1">Hab 1</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="gridRadios4" id="hab2" value="hab2" {{ old('gridRadios4') == 'hab2' ? 'checked="checked"' : '' }}>
												<label class="form-check-label" for="hab2">Hab 2</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="gridRadios4" id="hab3" value="hab3" {{ old('gridRadios4') == 'hab3' ? 'checked="checked"' : '' }}>
												<label class="form-check-label" for="hab3">Hab 3</label>
											</div>
										</div>
									</div>
								</fieldset>
								<fieldset class="form-group">
									<div class="form-group row">
										<label for="redScore" class="col-sm-2 col-form-label">Red Score</label>
										<div class="col-sm-10">
											<input type="number" class="form-control" name="red_score" id="redScore" value="{{ old('red_score') }}">
										</div>
									</div>
									<div class="form-group row">
										<label for="blueScore" class="col-sm-2 col-form-label">Blue Score</label>
										<div class="col-sm-10">
											<input type="number" class="form-control" name="blue_score" id="blueScore" value="{{ old('blue_score') }}">
										</div>
									</div>
									<div class="row">
										<legend class="col-form-label col-sm-2 pt-0">Robot Status (If Applicable):</legend>
										<div class="col-sm-10">
											<div class="form-check">
												<input class="form-check-input" name="end_status" type="checkbox" id="e-stopped" value="e-stopped" {{ old('end_status') == 'e-stopped' ? 'checked="checked"' : '' }}>
												<label class="form-check-label" for="e-stopped">E-Stopped</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" name="end_status" type="checkbox" id="dqed" value="dqed" {{ old('end_status') == 'dqed' ? 'checked="checked"' : '' }}>
												<label class="form-check-label" for="dqed">DQed</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" name="end_status" type="checkbox" id="disabled" value="disabled" {{ old('end_status') == 'disabled' ? 'checked="checked"' : '' }}>
												<label class="form-check-label" for="disabled">Disabled</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" name="end_status" type="checkbox" id="bypassed" value="bypassed" {{ old('end_status') == 'bypassed' ? 'checked="checked"' : '' }}>
												<label class="form-check-label" for="bypassed">Bypassed</label>
											</div>
										</div>
									</div>
								</fieldset>
								<br>
							</div>
							<div id="review" class="content" role="tabpanel" aria-labelledby="review-trigger">
								<h2 class="text-center">Review</h2>
								<button type="submit" class="btn btn-primary">Submit</button>
								<br>
							</div>
						</form>
					</div>
				</div>
				<div class="d-flex justify-content-center">
					<button class="btn btn-primary" onclick="stepper.previous()">Previous</button>&nbsp;
					<button class="btn btn-primary" onclick="stepper.next()">Next</button>
				</div>
			</div>
		</div>
		<br>
</div>
</div>
	</div><!-- /.container -->
@endsection