
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{asset('vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('js/main.js')}}"></script>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>



  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('input[type="radio"]').click(function(){
					var val = $(this).attr("value");
					var target = $("." + val);
					$(".modules_stat").not(target).hide();
					$(target).show();
				});
			});
		</script>
    <script type="text/javascript">
			$(document).ready(function(){
				$('input[type="radio"]').click(function(){
					var val = $(this).attr("value");
					var target = $("." + val);
					$(".matieres_stat").not(target).hide();
					$(target).show();
				});
			});
		</script>
    <script type="text/javascript">
			$(document).ready(function(){
				$('input[type="radio"]').click(function(){
					var val = $(this).attr("value");
					var target = $("." + val);
					$(".filieres_stat").not(target).hide();
					$(target).show();
				});
			});
		</script>