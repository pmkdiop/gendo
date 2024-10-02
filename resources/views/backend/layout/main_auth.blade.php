<!doctype html>
<html lang="fr">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
    <!--favicon-->
	<link rel="icon" href="{{asset("backend/assets/themeAssets/assets/images/favicon-32x32.png")}}" type="image/png" />
	
    <!--plugins-->
	<link href="{{asset("backend/assets/themeAssets/assets/plugins/simplebar/css/simplebar.css")}}" rel="stylesheet" />
	<link href="{{asset("backend/assets/themeAssets/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css")}}" rel="stylesheet" />
	<link href="{{asset("backend/assets/themeAssets/assets/plugins/metismenu/css/metisMenu.min.css")}}" rel="stylesheet" />
	
    <!-- loader-->
	<link href="{{asset("backend/assets/themeAssets/assets/css/pace.min.css")}}" rel="stylesheet" />
	<script src="{{asset("backend/assets/themeAssets/assets/js/pace.min.js")}}"></script>
	
    <!-- Bootstrap CSS -->
	<link href="{{asset("backend/assets/themeAssets/assets/css/bootstrap.min.css")}}" rel="stylesheet">
	<link href="{{asset("backend/assets/themeAssets/assets/css/bootstrap-extended.css")}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="{{asset("backend/assets/themeAssets/assets/css/app.css")}}" rel="stylesheet">
	<link href="{{asset("backend/assets/themeAssets/assets/css/icons.css")}}" rel="stylesheet">
	<title>Gestion des Budgetaire et Calcule des couts | Republique de Mali </title>
</head>

<body class="">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-cover">
			<div class="">
                <!-- Content here --> 

				@yield("content")
                
				<!--end row-->
			</div>
		</div>
        <footer class="bg-white shadow-none border-top p-2 text-center fixed-bottom">
			<p class="mb-0">Copyright © {{date('Y')}} | Tous droits réservés.</p>
		</footer>
	</div>
	<!--end wrapper-->
	
    <!-- Bootstrap JS -->
	<script src="{{asset("backend/assets/themeAssets/assets/js/bootstrap.bundle.min.js")}}"></script>
	
    <!--plugins-->
	<script src="{{asset("backend/assets/themeAssets/assets/js/jquery.min.js")}}"></script>
	<script src="{{asset("backend/assets/themeAssets/assets/plugins/simplebar/js/simplebar.min.js")}}"></script>
	<script src="{{asset("backend/assets/themeAssets/assets/plugins/metismenu/js/metisMenu.min.js")}}"></script>
	<script src="{{asset("backend/assets/themeAssets/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js")}}"></script>
	
    <!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="{{asset("backend/assets/themeAssets/assets/js/app.js")}}"></script>
</body>

</html>