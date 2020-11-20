@extends('layout.master')

@section('sidebar')
@include('layout.sidebar')

@section('topmenu')
@include('layout.topmenu')

@section('content')



		
        
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">SETTING</h1>
            
          </div>
			<!-- <div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label></div>
    		<label>
    			BTC : <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
    			</label>
    		</div> -->

          <!-- Begin Page Content -->
        <div class="container-fluid">
        
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">My coin count</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>COIN</th>
                      <th>QTY</th>
                      
                    </tr>
                  </thead>
                  
                  <tbody>
                    <tr>
                      <?php foreach($result as $coin_data){
                              foreach($coin_data as $key => $data){
                                  if($key == 'coin_name'){
                                      ?><td><?=$data?></td><td><input type="search" id="<?=$data?>_count"  class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></td></tr><?php         
                                      }
                                  }
                              }?>
                  </tbody>
                </table>
              </div>
              <a class="btn btn-primary btn-user btn-block setting_user_coin" style="height:60px;padding-top:15px;">Confirm</a>
            </div>
          </div>
        </div>
        
        <!-- /.container-fluid -->
 
        <script src="{{ asset('js/app.js') }}"></script>