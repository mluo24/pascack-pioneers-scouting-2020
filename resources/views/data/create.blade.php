@extends('layouts.main')

<!-- Page title -->
@section('title', 'Team 1676 Scouting')

<!-- Insert main body content here -->
@section('content')
<h1 class="scouting-header">Submit Scouting Data</h1><br>
<div class="row">
	<div class="col-lg-12">
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
		<form action="{{ route('scout.store') }}" method="POST">
			@csrf

			<!-- Pre-match -->
			<div class="card-deck">
				<div class="card">
					<div class="card-body" align="center">
						<h2 class="card-title">Pre-Match</h2>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group row">
									<span class="mytooltip tooltip-effect-2 col-lg-4">
										<span class="tooltip-item"><label for="matchNumber" class="col-form-label">Match Number</label></span> <span class="tooltip-content clearfix"></span>
									</span>
									<div class="col-lg-8">
										<input type="number" class="form-control" id="matchNumber" name="match_num" min="0" value="{{ old('match_num') }}">
									</div>
								</div>
								<div class="form-group row">
									<span class="mytooltip tooltip-effect-2 col-lg-4">
										<span class="tooltip-item"><label for="teamNumber" class="col-form-label">Team Number</label></span> <span class="tooltip-content clearfix"></span>
									</span>
									<div class="col-lg-8">
										<input type="number" class="form-control" id="teamNumber" name="team_num" min="0" value="{{ old('team_num') }}">
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<fieldset class="form-group">
									<div class="row">
										<span class="mytooltip tooltip-effect-2 col-lg-4">
											<span class="tooltip-item"><legend class="col-form-label" style="cursor: default;">Alliance</legend></span> <span class="tooltip-content clearfix"></span>
										</span>
										<div class="col-lg-4">
											<div class="form-check">
												<input class="form-check-input" type="radio" name="alliance" id="allianceRed" value="red" @if(old('alliance')=="red") checked @endif>
												<label class="form-check-label form-check-label-custom" for="allianceRed">Red</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="alliance" id="allianceBlue" value="blue" @if(old('alliance')=="blue") checked @endif>
												<label class="form-check-label form-check-label-custom" for="allianceBlue">Blue</label>
											</div>
										</div>
										<div class="col-lg-4">
										</div>
									</div>
								</fieldset>
								<fieldset class="form-group">
									<div class="row">
										<span class="mytooltip tooltip-effect-2 col-lg-4">
											<span class="tooltip-item"><legend class="col-form-label" style="text-decoration:underline; cursor: pointer;">Starting Hab</legend></span> <span class="tooltip-content clearfix">
												<img src="../img/hab.png">
												<span class="tooltip-text">Level 1: Yellow<br>Level 2: Green<br>Level 3: Blue</span>
											</span>
										</span>
										<div class="col-lg-4">
										<table class="table table-responsive" id="tab">
											<tbody>
												<form>
													<tr>
														<td>
															<div class="radio_1">
																<label style="cursor: pointer;"><input type="radio" name="startingPoint" value="L2 - Left" @if(old('startingPoint')=="L2 - Left") checked @endif></label>
															</div>
														</td>
														<td>
															<div class="radio" style="background: none;">
															</div>  
														</td>
														<td>
															<div class="radio_1">
																<label style="cursor: pointer;"><input type="radio" name="startingPoint" value="L2 - Right" @if(old('startingPoint')=="L2 - Right") checked @endif></label>
															</div>  
														</td>
													</tr>
													<tr>
														<td>
															<div class="radio_2">
																<label style="cursor: pointer;"><input type="radio" name="startingPoint" value="L1 - Left" @if(old('startingPoint')=="L1 - Left") checked @endif></label>
															</div>
														</td>
														<td>
															<div class="radio_2">
																<label style="cursor: pointer;"><input type="radio" name="startingPoint" value="L1 - Center" @if(old('startingPoint')=="L1 - Center") checked @endif></label>
															</div>
														</td>
														<td>
															<div class="radio_2">
																<label style="cursor: pointer;"><input type="radio" name="startingPoint" value="L1 - Right" @if(old('startingPoint')=="L1 - Right") checked @endif></label>
															</div>
														</td>
													</tr>
												</form>
											</tbody>
										</table>

											<!--<div class="form-check">
												<input class="form-check-input" type="radio" name="startingPoint" id="startingPoint1" value="L1 - Left" @if(old('startingPoint')=="L1 - Left") checked @endif>
												<label class="form-check-label" for="startingPoint1">L1 - Left</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="startingPoint" id="startingPoint2" value="L1 - Center" @if(old('startingPoint')=="L1 - Center") checked @endif>
												<label class="form-check-label" for="startingPoint2">L1 - Center</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="startingPoint" id="startingPoint3" value="L1 - Right" @if(old('startingPoint')=="L1 - Right") checked @endif>
												<label class="form-check-label" for="startingPoint3">L1 - Right</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="startingPoint" id="startingPoint4" value="L2 - Left" @if(old('startingPoint')=="L2 - Left") checked @endif>
												<label class="form-check-label" for="startingPoint4">L2 - Left</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="startingPoint" id="startingPoint5" value="L2 - Right" @if(old('startingPoint')=="L2 - Right") checked @endif>
												<label class="form-check-label" for="startingPoint5">L2 - Right</label>
											</div>-->
										</div>
										<div class="col-lg-4">
										</div>
									</div>
								</fieldset>
							</div>
						</div>
					</div>
				</div>
			</div>

			<br id="sandstorm"><hr><br>

			<!-- Sandstorm -->
			<div class="card-deck">
				<div class="card" id="sandstormCard">
					<div class="card-body" align="center">
						<h2 class="card-title">T-Minus 2:30 (Sandstorm)</h2>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group row">
									<span class="mytooltip tooltip-effect-2 col-lg-4">
										<span class="tooltip-item"><label for="rocketPanels1" class="col-form-label" style="text-decoration:underline;cursor: pointer;">Rocket Panels</label></span> <span class="tooltip-content clearfix">
											<img src="../img/rocketPanel.png">
											<span class="tooltip-text">The robot put a hatch panel (plastic disk) on the rocket (side of field).</span>
										</span>
									</span>
									<div class="col-lg-8">
										<div class="input-group">
											<input type="number" class="form-control" id="rocketPanels1" name="rocketPanels1" value="{{ old('rocketPanels1', 0) }}" min="0" max="12">
											<div class="input-group-append">
												<button class="btn btn-outline-secondary" type="button" onclick="minus(rocketPanels1)">-</button>
												<button class="btn btn-outline-secondary" type="button" onclick="plus(rocketPanels1)">+</button>
											</div>
										</div>
									</div>
								</div>
								
								<div class="form-group row">
									<span class="mytooltip tooltip-effect-2 col-lg-4">
										<span class="tooltip-item"><label for="rocketCargo1" class="col-form-label" style="text-decoration:underline;cursor: pointer;">Rocket Cargo</label></span> <span class="tooltip-content clearfix">
											<img src="../img/rocketCargo.png">
											<span class="tooltip-text">The robot put cargo (orange ball) in the rocket (side of field).</span>
										</span>
									</span>
									<div class="col-lg-8">
										<div class="input-group">
											<input type="number" class="form-control" id="rocketCargo1" name="rocketCargo1" value="{{ old('rocketCargo1', 0) }}" min="0" max="12">
											<div class="input-group-append">
												<button class="btn btn-outline-secondary" type="button" onclick="minus(rocketCargo1)">-</button>
												<button class="btn btn-outline-secondary" type="button" onclick="plus(rocketCargo1)">+</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-lg-6">
								<div class="form-group row">
									<span class="mytooltip tooltip-effect-2 col-lg-4">
										<span class="tooltip-item"><label for="cargoShipPanels1" class="col-form-label" style="text-decoration:underline;cursor: pointer;">Cargo Ship Panels</label></span> <span class="tooltip-content clearfix">
											<img src="../img/cargoShipPanel.png">
											<span class="tooltip-text">The robot put a hatch panel (plastic disk) on the cargo ship (center of field).</span>
										</span>
									</span>
									<div class="col-lg-8">
										<div class="input-group">
											<input type="number" class="form-control" id="cargoShipPanels1" name="cargoShipPanels1" value="{{ old('cargoShipPanels1', 0) }}" min="0" max="6">
											<div class="input-group-append">
												<button class="btn btn-outline-secondary" type="button" onclick="minus(cargoShipPanels1)">-</button>
												<button class="btn btn-outline-secondary" type="button" onclick="plus(cargoShipPanels1)">+</button>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<span class="mytooltip tooltip-effect-2 col-lg-4">
										<span class="tooltip-item"><label for="cargoShipCargo1" class="col-form-label" style="text-decoration:underline;cursor: pointer;">Cargo Ship Cargo</label></span> <span class="tooltip-content clearfix">
											<img src="../img/cargoShipCargo.png">
											<span class="tooltip-text">The robot put cargo (orange ball) in the cargo ship (center of field).</span>
										</span>
									</span>
									<div class="col-lg-8">
										<div class="input-group">
											<input type="number" class="form-control" id="cargoShipCargo1" name="cargoShipCargo1" value="{{ old('cargoShipCargo1', 0) }}" min="0" max="6">
											<div class="input-group-append">
												<button class="btn btn-outline-secondary" type="button" onclick="minus(cargoShipCargo1)">-</button>
												<button class="btn btn-outline-secondary" type="button" onclick="plus(cargoShipCargo1)">+</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<fieldset class="form-group">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="mode" id="autonomous" value="1" @if(old('mode') == "1") checked @endif>
										<label class="form-check-label" for="autonomous">&nbsp;This robot moved during the sandstorm <i>completely</i> on its own.</label>
									</div>
								</div>
								<div class="col-lg-6">
								</div>
							</div>
						</fieldset>
					</div>
				</div>
			</div>

			<br id="game"><hr><br>

			<!-- During the game -->
			<div class="card-deck">
				<div class="card" id="gameCard">
					<div class="card-body" align="center">
						<h2 class="card-title">T-Minus 2:15 (Regular Game)</h2>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group row">
									<span class="mytooltip tooltip-effect-2 col-lg-4">
										<span class="tooltip-item"><label for="rocketPanels2" class="col-form-label" style="text-decoration:underline;cursor: pointer;">Rocket Panels</label></span> <span class="tooltip-content clearfix">
											<img src="../img/rocketPanel.png">
											<span class="tooltip-text">The robot put a hatch panel (plastic disk) on the rocket (side of field).</span>
										</span>
									</span>
									<div class="col-lg-8">
										<div class="input-group">
											<input type="number" class="form-control" id="rocketPanels2" name="rocketPanels2" value="{{ old('rocketPanels2', 0) }}" min="0" max="12">
											<div class="input-group-append">
												<button class="btn btn-outline-secondary" type="button" onclick="minus(rocketPanels2)">-</button>
												<button class="btn btn-outline-secondary" type="button" onclick="plus(rocketPanels2)">+</button>
											</div>
										</div>
									</div>
								</div>
								
								<div class="form-group row">
									<span class="mytooltip tooltip-effect-2 col-lg-4">
										<span class="tooltip-item"><label for="rocketCargo2" class="col-form-label" style="text-decoration:underline;cursor: pointer;">Rocket Cargo</label></span> <span class="tooltip-content clearfix">
											<img src="../img/rocketCargo.png">
											<span class="tooltip-text">The robot put cargo (orange ball) in the rocket (side of field).</span>
										</span>
									</span>
									<div class="col-lg-8">
										<div class="input-group">
											<input type="number" class="form-control" id="rocketCargo2" name="rocketCargo2" value="{{ old('rocketCargo2', 0) }}" min="0" max="12">
											<div class="input-group-append">
												<button class="btn btn-outline-secondary" type="button" onclick="minus(rocketCargo2)">-</button>
												<button class="btn btn-outline-secondary" type="button" onclick="plus(rocketCargo2)">+</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-lg-6">
								<div class="form-group row">
									<span class="mytooltip tooltip-effect-2 col-lg-4">
										<span class="tooltip-item"><label for="cargoShipPanels2" class="col-form-label" style="text-decoration:underline;cursor: pointer;">Cargo Ship Panels</label></span> <span class="tooltip-content clearfix">
											<img src="../img/cargoShipPanel.png">
											<span class="tooltip-text">The robot put a hatch panel (plastic disk) on the cargo ship (center of field).</span>
										</span>
									</span>
									<div class="col-lg-8">
										<div class="input-group">
											<input type="number" class="form-control" id="cargoShipPanels2" name="cargoShipPanels2" value="{{ old('cargoShipPanels2', 0) }}" min="0" max="6">
											<div class="input-group-append">
												<button class="btn btn-outline-secondary" type="button" onclick="minus(cargoShipPanels2)">-</button>
												<button class="btn btn-outline-secondary" type="button" onclick="plus(cargoShipPanels2)">+</button>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<span class="mytooltip tooltip-effect-2 col-lg-4">
										<span class="tooltip-item"><label for="cargoShipCargo2" class="col-form-label" style="text-decoration:underline;cursor: pointer;">Cargo Ship Cargo</label></span> <span class="tooltip-content clearfix">
											<img src="../img/cargoShipCargo.png">
											<span class="tooltip-text">The robot put cargo (orange ball) in the cargo ship (center of field).</span>
										</span>
									</span>
									<div class="col-lg-8">
										<div class="input-group">
											<input type="number" class="form-control" id="cargoShipCargo2" name="cargoShipCargo2" value="{{ old('cargoShipCargo2', 0) }}" min="0" max="6">
											<div class="input-group-append">
												<button class="btn btn-outline-secondary" type="button" onclick="minus(cargoShipCargo2)">-</button>
												<button class="btn btn-outline-secondary" type="button" onclick="plus(cargoShipCargo2)">+</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<br><hr><br>

			<!-- Endgame -->
			<div class="card-deck">
				<div class="card">
					<div class="card-body" align="center">
						<h2 class="card-title">Post-Match</h2>
						<fieldset class="form-group">
							<div class="row">
								<div class="col-lg-6">

									<div class="form-group row">
										<span class="mytooltip tooltip-effect-2 col-lg-4">
											<span class="tooltip-item"><label for="redScore" class="col-form-label">Red Score</label></span> <span class="tooltip-content clearfix"></span>
										</span>
										<div class="col-lg-8">
											<input type="number" class="form-control" id="redScore" name="red_score" min="0" value="{{ old('red_score') }}">
										</div>
									</div>
									<div class="form-group row">
										<span class="mytooltip tooltip-effect-2 col-lg-4">
											<span class="tooltip-item"><label for="blueScore" class="col-form-label">Blue Score</label></span> <span class="tooltip-content clearfix"></span>
										</span>
										<div class="col-lg-8">
											<input type="number" class="form-control" id="blueScore" name="blue_score" min="0" value="{{ old('red_score') }}">
										</div>
									</div>
								</div>
								
								

								<div class="col-lg-6">
									<div class="form-group row">

										<span class="mytooltip tooltip-effect-2 col-lg-4">
											<span class="tooltip-item"><legend class="col-form-label" style="cursor: default;">Robot Status</legend></span> <span class="tooltip-content clearfix"></span>
										</span>
										<div class="col-lg-4">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" name="end_status" onclick="robotStatus(this)" value="e-stopped" id="e-stopped" @if(old('end_status')=="e-stopped") checked @endif>
												<label class="form-check-label form-check-label-custom" for="e-stopped">E-Stopped</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="checkbox" name="end_status" onclick="robotStatus(this)" value="disqualified" id="dqed" @if(old('end_status')=="disqualified") checked @endif>
												<label class="form-check-label form-check-label-custom" for="dqed">Bypassed</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="checkbox" name="end_status" onclick="robotStatus(this)" value="disabled" id="disabled" @if(old('end_status')=="disabled") checked @endif>
												<label class="form-check-label form-check-label-custom" for="disabled">Lost Comms</label>
											</div>
											<script>
												function robotStatus(checkbox) {
													var checkboxes = document.getElementsByName('end_status')
													checkboxes.forEach((item) => {
														if (item !== checkbox) item.checked = false
													})
												}
											</script>
										</div>
										<div class="col-lg-4">
										</div>
										
										
									</div>
								</div>
							</div>


						</fieldset>
						<fieldset class="form-group">
							<div class="row">

								<span class="mytooltip tooltip-effect-2 col-lg-2">
									<span class="tooltip-item"><legend class="col-form-label" style="text-decoration:underline;cursor: pointer;">Ending Hab</legend></span> <span class="tooltip-content clearfix">
										<img src="../img/hab.png">
										<span class="tooltip-text">Level 1: Yellow<br>Level 2: Green<br>Level 3: Blue</span>
									</span>
								</span>
								<div class="col-lg-4">
									<table class="table table-responsive" id="tab" width='100%'>
										<tbody>
											<tr>
												<td>
													<div class="radio_1">
														<label style="cursor: pointer;"><input type="radio" name="hab" value="2" @if(old('hab')=="2") checked @endif></label>
													</div>
												</td>
												<td>
													<div class="radio">
														<label style="cursor: pointer;"><input type="radio" name="hab" value="3" @if(old('hab')=="3") checked @endif></label>
													</div>  
												</td>
												<td>
													<div class="radio_1">
														<label style="cursor: pointer;"><input type="radio" name="hab" value="2"></label>
													</div>  
												</td>
											</tr>
											<tr>
												<td>
													<div class="radio_2">
														<label style="cursor: pointer;"><input type="radio" name="hab" value="1" @if(old('hab')=="1") checked @endif></label>
													</div>
												</td>
												<td>
													<div class="radio_2">
														<label style="cursor: pointer;"><input type="radio" name="hab" value="1" ></label>
													</div>
												</td>
												<td>
													<div class="radio_2">
														<label style="cursor: pointer;"><input type="radio" name="hab" value="1"></label>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								
								<div class="col-lg-6">
									<div class="form-group row">
										<div class="col-lg-11">
											<div class="form-check form-check-inline radio-container">
												<input class="form-check-input" type="checkbox" name="help" id="help" value="1"  @if(old('help')=="1") checked @endif>
												<label class="form-check-label" for="help">&nbsp;This robot <i>can</i> help another team up a level.</label>
												<span class="checkmark"></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</fieldset>
					</div>
				</div>
			</div>

			<br>

			<!-- Submit -->
			<div class="card-deck">
				<div align="center" style="margin-left:50%; margin-top:15px; left:-50px; position: absolute;">
					<button type="submit" class="btn btn-primary btn-lg btn-block" style="width: 100px;">Submit</button>
				</div>
			</div>

            <br>
            
		</form>

		<div id="notification-container"></div>
		<button type="button" id="notif" style="display: none;">Info</button>

		<button type="button" id="rc" style="display: none;">Info</button>
		<button type="button" id="rp" style="display: none;">Info</button>
		<button type="button" id="cc" style="display: none;">Info</button>
		<button type="button" id="cp" style="display: none;">Info</button>

		<script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</div>
<br>
</div>
<br>
@endsection

<!-- Insert custom scripts here -->
@section('custom_scripts')
<script src="{{ asset('js/jquery.are-you-sure.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
@endsection