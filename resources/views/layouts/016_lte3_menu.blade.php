<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- <title> AAA | BBB</title> -->
  @include('016_lte3_title')
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @include('layouts.016_lte3_stylesheet')
  @yield('css')
  
<style>
.myBtnDatatables {
	//background-color: none;
	//border-radius: 1px;
	
	//padding-top: 1px;
	//padding-left: 2px;
	//padding-right: 2px;	
	//border: 1px solid #474747;  
	//padding: 1px 20px;
	//border: 5px outset;
	//hight: 10px;	
}
.myBtnDatatables_one {
}
.myBtnDatatables_two {
}
.myBtnDatatables_three {
}
.myBtnDatatables_four {
}

.myBtnDatatables:hover {
	color: black; 
	//font-size: 20px;
	background-color: aqua;
	//border-radius: 1px;
	
	//padding-top: 1px;
	//padding-left: 2px;
	//padding-right: 2px;	
	//border: 1px solid #474747;  
	//padding: 1px 20px;
	//border: 5px outset;
	left: 1px;	
}

.myBtnDatatables_one:hover {
	color: black; 
	background-color: aqua;
	left: 1px;	
}
.myBtnDatatables_two:hover {
	color: black; 
	background-color: aqua;
	left: 1px;	
}
.myBtnDatatables_three:hover {
	color: black; 
	background-color: aqua;
	left: 1px;	
}
.myBtnDatatables_four:hover {
	color: black; 
	background-color: aqua;
	left: 1px;	
}


div.dt-buttons {
    //position: relative;
    //float: left;
	//border: 1px solid grey;
	//background: grey;
}

.left-col {
    float: left;
    width: 25%;
}
 
.center-col {
    float: left;
    width: 50%;
}
 
.right-col {
    float: left;
    width: 25%;
}


//.myBtnAdd :hover {
//	color: black; 
//}
//
//.buttons-copy:hover {
//  color: black;
//}
//
//.buttons-excel:hover {
//  color: black;
//}
//
//.buttons-pdf:hover {
//  color: black;
//}
//
//.buttons-print:hover {
//  color: black;
//}

	
//.dt-buttons .dt-buttons:hover {
//    background: none;
//}
// 
//.dt-buttons .dt-buttons:active {
//    background: none;
//}
	

//div.dataTables_length {
//  margin-right: 10em;
//  padding-right: 50em;
//}

//div.dataTables_wrapper div.dataTables_info {
//    padding-top: 1.2em;
//    padding-left: 2px;
//}



</style>

  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

 @include('layouts.016_lte3_navbar')

 @include('layouts.016_lte3_sidebar')
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
			<h1 class="m-0 text-dark"><?= $title; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?= $title; ?></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    @yield('page-content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('layouts.016_lte3_footer')
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



@include('layouts.016_lte3_javascript')
@yield('extra_javascript')
</body>
</html>

