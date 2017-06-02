
	<!-- View listening content -->
	<div id="viewlisteningModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg modal-dialog-detail">
			<div class="content modal_background">
				<div class="modal-tittle">
					<h3 class="modal_header col-centered" align="center">View Detail Content</h3>
				</div>
				<div class="modal-body modal-body-detail">
					<div class="col-md-10 col-md-offset-1">
						<div class="form-group col-centered">
							<label class="control-label text-info">Tittle</label>
							<div id="listening_tittle"></div>
						</div>
						<div class="form-group col-centered">
							<label class="control-label text-info">Introduce</label>
							<div id="listening_introduce"></div>
						</div>
						<div class="form-group col-centered">
							<label class="control-label text-info">Audio</label>
							<div id="listening_audio"></div>
						</div>
						<div class="form-group col-centered">
							<label class="control-label"></label>
							<div id="listening_audio_show">
								<audio id="audioPlayer" width="800" height="30" controls="controls">
								    <source id="oggSource" type="audio/ogg" src="" />
								    <source id="mp3Source" type="audio/mp3" src=""/>
								</audio>
							</div>
						</div>
						<div class="form-group col-centered">
							<button type="button" class="btn_admin success" data-toggle="collapse" data-target="#listening_transcript">Transcript</button>
							<div id="listening_transcript" class="collapse"></div>
						</div>
					</div>
				</div>
				<div class="modal-footer modal-body-footer">
					<button class="btn_admin danger pull-right" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
