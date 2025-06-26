<!-- two-966 -->
<div id="modal_one" class="modal fade" aria-labelledby="formtitle_one" data-bs-backdrop="static" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl">
		<div class="modal-content">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title" id="formtitle_one">Emp</h3>
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
									<label for="name">Emp Name</label>
									<!-- three-1848 -->
									<input type="text" class="form-control uppercase" id="name" name="name" placeholder="Enter Emp Name" autofocus>
								</div>
								<div class="form-group">
									<label for="bday">Birth Day</label>
									<!-- three-1848 -->
									<input type="text" class="form-control" id="bday" name="bday" placeholder="Enter Birth Day" value="{{old('bday', date('Y-m-d'))}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="sex_id">Sex ID</label>
									<!-- three-1662 -->
									<select id="sex_id" name="sex_id" class="form-control select2">
										<option value="">-Select Tabel Sex-</option>
										<?php foreach($sex as $row):?>
										<option value="<?= $row['id'];?>"><?= $row['desc'];?></option>
										<?php endforeach;?>
									</select>
								</div>

								<div class="form-group">
									<label for="edu_code">Edu Code</label>
									<!-- three-1742 -->
									<select id="edu_code" name="edu_code" class="form-control select2">
										<option value="">-Select Table Education Level-</option>
										<?php foreach($edu as $row):?>
										<option value="<?= $row['code'];?>"><?= $row['desc'];?></option>
										<?php endforeach;?>
									</select>
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
