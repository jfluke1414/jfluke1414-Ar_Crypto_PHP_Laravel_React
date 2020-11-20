@extends('layout.master')

@section('sidebar')
@include('layout.sidebar')

@section('topmenu')
@include('layout.topmenu')

@section('content')

<!-- Begin Page Content -->
        <div class="container-fluid">
          
		<?php foreach($data as $key => $list){ 
		    $key = strtoupper($key);?>
			
        <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?=$key?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Currency</th>
                      <th>Price</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Currency</th>
                      <th>Price</th>
                      <th>Date</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    	<?php foreach($list as $data){
                    	       $currency = strtoupper($data->currency);
                    	       $price = number_format($data->price, 2, '.', ',');                    	       
                    	    ?>
                    		<tr>
                        		<td><?=$currency?></td>
                        		<td><?=$price?></td>
                        		<td><?=$data->date?></td>
                    		</tr>
                    		<?php 
                    	}?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <?php }?>
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->