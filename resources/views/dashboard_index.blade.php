<!--

	// Last Edited : 2025-06-25
	// File name   : dashboard_index.blade.php


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
@section('title','Dashboard')
@section('breadcrumb','Dashboard')

@section('page-content')
	<section class="content">
		<div class="container-fluid">
			<div class="card">
				<div class="row">
					<div class="col-lg-3 col-6">
						<div class="small-box bg-info">
							<div class="inner">
								<h3><?= $count_sex; ?></h3>
								<p><h4>Tabel Sex</h4></p>
	 						</div>
					 		<div class="icon">
					 			<i class="ion ion-person-add"></i>
					 		</div>
					 		<a href="/sex" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<div class="col-lg-3 col-6">
						<div class="small-box bg-success">
							<div class="inner">
								<h3><?= $count_edu; ?></h3>
								<p><h4>Table Education Level</h4></p>
	 						</div>
					 		<div class="icon">
					 			<i class="ion ion-person-add"></i>
					 		</div>
					 		<a href="/edu" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<div class="col-lg-3 col-6">
						<div class="small-box bg-warning">
							<div class="inner">
								<h3><?= $count_emp; ?></h3>
								<p><h4>Employee</h4></p>
	 						</div>
					 		<div class="icon">
					 			<i class="ion ion-person-add"></i>
					 		</div>
					 		<a href="/employee" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection

@section('extra_javascript')
	<script>
	$(document).ready(function (){
		$('#dashboard').addClass('active');
	});
	</script>
@endsection
