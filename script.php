<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
<script type="text/javascript" src="js/jquery-3.6.0.slim.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/bootstrap.min.js" ></script>

<!-- font awsome JavaScript -->
<script type="text/javascript" src="js/all.js"></script>

<!-- Material Design for Bootstrap -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<script type="text/javascript" src="js/datatables.min.js"></script>

<script type="text/javascript" >
	$(document).ready(function () {
		$('#adminNavbar .navbar-nav a').on('click', function(){
			$('#adminNavbar .navbar-nav').find('li.active').removeClass('active');
			$(this).parent('li').addClass('active');
		});
	});
</script>

