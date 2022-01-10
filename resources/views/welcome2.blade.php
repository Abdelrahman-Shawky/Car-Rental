<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>PHPJabbers.com | Free Car Rental Website Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('welcomeTemplate/assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('welcomeTemplate/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('welcomeTemplate/assets/css/owl.css')}}">
  </head>

  <body>
     <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="main-banner header-text" id="top">
        <div class="Modern-Slider">
          <!-- // Item -->
          <!-- Item -->
          <div class="item item-3">
            <div class="img-fill">
                <div class="text-content">
                  <h4>Car Rental</h4>
                  <p>Safety Guranteed</p>
                  <a href="/home" class="filled-button">Find Your Vehicle Now !</a>
                </div>
            </div>
          </div>
          <!-- // Item -->
        </div>
    </div>    
    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Additional Scripts -->
    <script src="{{asset('welcomeTemplate/assets/js/custom.js')}}"></script>
    <script src="{{asset('welcomeTemplate/assets/js/owl.js')}}"></script>
    <script src="{{asset('welcomeTemplate/assets/js/slick.js')}}"></script>
    <script src="{{asset('welcomeTemplate/assets/js/accordions.js')}}"></script>

    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

  </body>
</html>