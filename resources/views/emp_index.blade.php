<!--
	// Modul Description : Employee
	// Date              : 2022-01-20
	// Created by.       : yudhi irawan
	// Contact person    : IG: @iam.yudhi_irawan

	// File name   : emp_index.blade.php
	// Last Edited : 2025-06-25


	// MCG - Massive CRUD Generator Laravel-AdminLTE3-MySQL for Laravel 11 ver. May 2025-Free Version

	// Private message at Telegram        : @yudhi_irawan
	// Private activity feeds at Instagram: @iam.yudhi_irawan

	// Download Massive CRUD Generator on telegram and github link
	// MCG Application: https://t.me/MCGFreeVersion
	// Documentation  : https://yudhi-irawan.github.io/mcg-documentation/tutorial.html
	// Testing        : 
	// Template       : 

	// Donation and Support link
	// Ko-fi   : https://ko-fi.com/MassiveCrudGenerator
	// Trakteer: https://trakteer.id/MassiveCrudGenerator

	// Please follow us for information about new releases

-->

@extends('layouts.016_1st')
@section('page-content')

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<!-- two-1444 -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title" id="title_one">Emp</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
								<i class="fas fa-minus"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<table id="datatable_list_one" class="table table-bordered table-hover">
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	@include('emp_form')

@endsection

@section('extra_javascript')

<script>
	var _trans_crud = "";	//one-301
	var __url;
	var __text_success1;
	var __text_success2;
	var __id = 0;	//three-2091
	//----------------------------------------------------------------------------------------
	var ___datatable_list_one = $("#datatable_list_one").DataTable({
		"scrollX": true,
		"dom": '<"container-fluid"<"row"<"col"B><"col"f>>>rtlip',
		"pageLength": 10,
		"lengthMenu": [[3, 10, 25, 50, 100], [3, 10, 25, 50, 100]],
		"bLengthChange": true,
		"bFilter": true,
		"bInfo": true,
		"processing":true,
		"bServerSide": true,
		// two-1647
		"order": [[ 1, "desc" ]],
		"ajax":{
			url:"{{route('emp_getdata_one')}}",
			type:"POST",
			data:function(data){
				data._token = "{{csrf_token()}}"
			}
		},
		// two-1673
		columns: [
			{ title: "No", data: "no", orderable: false, width: "10px", sClass: "text-center"}
			,{ title: "Action", data: "id", orderable: false, width: "115px", sClass: "text-center", render: createEditDeleteViewBtn_one}
			,{ title: "Emp Name", data: "name", width: "20%" }
			,{ title: "Birth Day", data: "bday", width: "60px" }
			,{ title: "Sex ID", data: "sex_id", visible: false }
			,{ title: "Sex Description", data: "sex_desc", width: "20%" }
			,{ title: "Edu Code", data: "edu_code" }
			,{ title: "Edu Description", data: "edu_desc", width: "20%" }
		],
		buttons: {
			dom: {
				button: {
					className: 'myBtnDatatables_one'
				}
			},
			buttons: [
				{
					text: 'Add',
					className: 'myBtnAdd_one',
					action: function ( e, dt, node, config ) {
						create_one();
					}
				}
				,{ extend: 'copy' }
				,{ extend: 'excel' }
				,{ extend: 'pdf' }
				,{ extend: 'print'}
			],
		},
	});
	//----------------------------------------------------------------------------------------

	___datatable_list_one.buttons().container( 0, null).appendTo('#example1_wrapper .col-md-6:eq(0)');

	function create_one()
	{
		_trans_crud = "add";
		action = "";	//two-1531

		$("#formtitle_one").html("Add Emp");	//two-1718
		$('#form_one')[0].reset();
		$("#modal_one").modal("show");	//two-1740
		__text_success1 = "Added!";
		__text_success2 = "Data Added Successfully!";
		__url = "{{ route('emp_savecreate_one') }}";	//store
	};

	//two-1067
	$("#form_one").submit(function(e) {
		e.preventDefault();
		const fd = new FormData(this);

		$.ajax({
			url: __url,
			method: 'post',
			data: fd,
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'json',
			success: function(response) {
				if (response.result == 'OK') {
					Swal.fire({
						position: 'center',
						icon: 'success',
						title: __text_success1,
						text: __text_success2,
						showConfirmButton: false,
						timer: 1500
					})
					___datatable_list_one.ajax.reload();
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'data '+response.result
					})
				}
				$('#form_one')[0].reset();
				$('#modal_one').modal('hide');	//two-1125
			}
		});
	});

	//two-1877
	$(document).on('click', '.editIcon_one', function(e) {
		_trans_crud = "edit";
		action = "";

		let id = $(this).attr('id');
		$.ajax({
			url: '{{ route('employee-edit') }}',	//edit
			method: 'get',
			data: {
				id: id,
				_token: '{{ csrf_token() }}'
			},
			dataType: 'json',
			success: function(response) {
				$("#formtitle_one").html("Edit Emp");	//two-1965
				$("#modal_one").modal("show");
				__text_success1 = "Updated!";
				__text_success2 = "Data Updated Successfully!";
				__url = "{{ route('emp_saveedit_one') }}";	//update
				//action = "";	//two-1575
				$("#form_one [name='id']").val(response.id);	//three-229
				$("#form_one [name='name']").val(response.name);	//three-229
				$("#form_one [name='bday']").val(response.bday);	//three-229
				$("#form_one [name='sex_id']").val(response.sex_id).trigger('change');	//three-226
				$("#form_one [name='sex_desc']").val(response.sex_desc);	//three-229
				$("#form_one [name='edu_code']").val(response.edu_code).trigger('change');	//three-226
				$("#form_one [name='edu_desc']").val(response.edu_desc);	//three-229
			}
		});
	});

	//two-1467
	$(document).on('click', '.deleteIcon_one', function(e) {
		e.preventDefault();
		_trans_crud = "delete";
		let id = $(this).attr('id');
		let csrf = '{{ csrf_token() }}';
		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!',
			reverseButtons: true

		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: '{{ route('employee-delete') }}',	//delete
					method: 'delete',
					data: {
					id: id,
					_token: csrf
					},
					dataType: 'json',
					success: function(response) {
						console.log(response);
						Swal.fire(
							'Deleted!',
							'Your file has been deleted.',
							'success'
						)
						___datatable_list_one.ajax.reload();
					}
				});
			}
		})
	});

	function createEditDeleteViewBtn_one(data, type, row, full, meta) {
		let btn = '';
		let nwidth = 18;
		let nheight = 18;
		let xTrash = '<svg xmlns="http://www.w3.org/2000/svg" width="'+nwidth+'" height="'+nheight+'+" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/> <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg>';
		let xPencil = '<svg xmlns="http://www.w3.org/2000/svg" width="'+nwidth+'" height="'+nheight+'" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"> <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/> <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>';
		let xEye = '<svg xmlns="http://www.w3.org/2000/svg" width="'+nwidth+'" height="'+nheight+'" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/></svg>';
		let xBasket = '<svg xmlns="http://www.w3.org/2000/svg" width="'+nwidth+'" height="'+nheight+'" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16"> <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/></svg>';
		let xBasketfill = '<svg xmlns="http://www.w3.org/2000/svg" width="'+nwidth+'" height="'+nheight+'" fill="currentColor" class="bi bi-basket-fill" viewBox="0 0 16 16"> <path d="M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717L5.07 1.243zM3.5 10.5a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3z"/></svg>';

		btn += ' <a href="#" type="button" id="'+data+'" class="text-success mx-1 editIcon_one" title="edit data">'+xPencil+'</a>';
		btn += ' <a href="#" type="button" id="'+data+'" class="text-danger mx-1 deleteIcon_one" title="delete data">'+xTrash+'</a>';
		btn += ' <a href="#" type="button" id="'+data+'" class="text-info mx-1 viewIcon_one"  title="view data" data-toggle="modal" data-target="#modal_view_one">'+xEye+'</a>';
		btn += ' <a href="#" type="button" id="'+data+'" class="text-secondary mx-1 detailIcon_one"  title="detail data" data-toggle="modal" data-target="#modal_detail_one">'+xBasketfill+'</a>';
		return btn;
	}

	$('.myBtnDatatables_one').each(function() {
		$(this)
			.removeClass('btn-default')
			.addClass('btn btn-none btn-sm btn-rounded')
			.css({ 'width': '50px', 'height': '40px', 'border': '2px', 'font-size':'12pt','margin': '3px', 'padding': '5px', 'float': 'left' })
	})

	$('.myBtnAdd_one').each(function() {
		$(this)
			.html('  <span class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Add data"/>Add')
			.addClass('btn btn-primary btn-sm btn-rounded')
			.css({ 'width': '80px'})
	})




	$(document).ready(function (){
		$('#emp').addClass('active');
	});


</script>

@endsection

