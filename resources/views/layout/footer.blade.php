 <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">Ã—</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary user_logout">Logout</a>
        </div>
      </div>
    </div>
  </div>
 
 
 
 <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('js/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('js/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('js/assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/assets/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('js/assets/vendor/chart.js/Chart.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('js/assets/js/demo/chart-area-demo.js') }}"></script>
  <script src="{{ asset('js/assets/js/demo/chart-pie-demo.js') }}"></script>
  <script src="{{ asset('js/assets/js/demo/chart-bar-demo.js') }}"></script>
  
   <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/assets/js/sb-admin-2.min.js') }}"></script>
  
  <!-- Page level plugins -->
  <script src="{{ asset('js/assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('js/assets/js/demo/datatables-demo.js') }}"></script>
  
  

 <script>

//moveType (0:left / 1:right) 
var moveType = 0;

var moveSpeed = 2500; 
 
var moveWork = false; 
 
var movePause = false;

function imgMove(){ 
    if(moveWork==false){ 
  
      if(moveType==0){
  
         var aWidth = $(".RollDiv > div > p:first").width(); 
  
         $(".RollDiv > div").append("<p href=\""+$(".RollDiv > div > p:first").attr("href")+"\">" + $(".RollDiv > div > p:first").html()+ "</p>"); 
          
         $(".RollDiv > div > p:first").animate({marginLeft:-aWidth},{duration:moveSpeed,step:function(){ 
          
         if(movePause==true){
          
            $(this).stop();
         }
         },complete:function(){ 
          
         $(this).remove();
          
         imgMove();
      }});
      }else{ 
 
       var aWidth = $(".RollDiv > div > p:last").width(); 
 
       $("<p href=\"" + $(".RollDiv > div > p:last").attr("href")+ "\" style=\"margin-left:-" + aWidth + "px\">" + $(".RollDiv > div > p:last").html()+ "</p>").insertBefore(".RollDiv > div > p:first") 
 
      $(".RollDiv > div > p:first").animate({marginLeft:0},{duration:moveSpeed,step:function(){ 
 
       if(movePause==true){ 
 
          $(this).stop(); 
       } 
       },complete:function(){ 
 
       $(".RollDiv > div > p:last").remove(); 
 
       imgMove(); 
    }}); 
 } 
 } 
 } 
 function goMove(){ 
 
    movePause=false;
     
    if(moveType==0){ 
       imgMove(); 
       }else{ 
       $(".RollDiv > div > a:first").animate({marginLeft:0},{duration:moveSpeed,step:function(){ 
 
       if(movePause==true){ 
 
          $(this).stop(); 
      } 
       },complete:function(){ 
 
      //$(".RollDiv > div > a:last").remove(); 
 
      imgMove(); 
   }}); 
}
   
}
imgMove(); 

</script>    

</body>

</html>