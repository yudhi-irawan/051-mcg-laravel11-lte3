<!-- two-966 -->
<div id="modal_one" class="modal fade" aria-labelledby="formtitle_one" data-bs-backdrop="static" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl">
		<div class="modal-content">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title" id="formtitle_one">Edu</h3>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-dismiss="modal" title="Close">
							<i class="fas fa-times"></i>
						</button>
					</div>
				</div>
				<form id="form_one" action="#" method="POST" enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="id" id="id">
					<div class="modal-body p-4 bg-light">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="code">Edu Code</label>
									<!-- three-1848 -->
									<input type="text" class="form-control uppercase" id="code" name="code" placeholder="Enter Edu Code" autofocus>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="desc">Edu Description</label>
									<!-- three-1848 -->
									<input type="text" class="form-control uppercase" id="desc" name="desc" placeholder="Enter Edu Description">
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
						<button id="btn_save_one" type="submit" class="btn btn-primary">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
