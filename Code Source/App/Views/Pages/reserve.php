<?php session_start();
if ($_SESSION['user_type'] == 'client') {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js'></script>
        <link rel="stylesheet" href="<?php echo URLROOT; ?>css/reserve.css">
        <title>Reserve</title>
    </head>
    <nav class="mb-1 navbar navbar-expand-lg navbar-dark orange lighten-1">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
    aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item avatar">
        <a class="nav-link p-0" href="#">
          <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" class="rounded-circle z-depth-0"
            alt="avatar image" height="35">
        </a>
      </li>
    </ul>
  </div>
</nav>
    <body>
        <form action="<?php echo URLROOT; ?>users/logout" method="post">
            <button type="submit" class="btn btn-primary">se déconnecter</button>
        </form>
        <div id="successReserve">

            <div class="card shadow my-5 bg-white rounded">
                <div class="card-body">
                    <p class="card-title text-center shadow my-3 rounded">Reservation</p>
                    <div class="icons text-center">
                        <i class="fa fa-bed fa-2x" aria-hidden="true"></i>
                        <i class="fa fa-h-square fa-2x" aria-hidden="true"></i>
                        <i class="fa fa-cutlery fa-2x" aria-hidden="true"></i>
                    </div>
                    <hr>
                    <p class="searchText text-center"><strong>Reservation</strong></p>


                    <!-- form -->
                    <form action="" method="post" style="border: 5px solid #1C6EA4;" id="insertAfterForm1">
                        <div class="px-4 my-3">
                            <div class="row">
                                <div class="col-sm-3">
                                    <select id="typebien1" name="type" class="browser-default custom-select mb-4" onchange="a('1')">
                                        <option value="" disabled="" selected="">Type Bien</option>
                                        <option value="Chambre">Chambre</option>
                                        <option value="Appart">Appart</option>
                                        <option value="Bungalow">Bungalow</option>
                                    </select>
                                </div>
                                <div class="col-sm-3" id="classtypechambre1" name="classTypeChambre">
                                </div>
                                <div class="col-sm-3" id="typeLit1" name="typeLit">
                                </div>
                                <div class="col-sm-3" id="vue1" name="vueType">
                                </div>
                            </div>
                            <div id="enfant1">
                            </div>
                            <div class="row ">
                                <div class="col-sm-4">
                                    <select id="pension1" name="pension1" class="browser-default custom-select mb-4">
                                        <option value="" disabled="" selected="">Type Pension</option>
                                        <option value="Sans">Sans</option>
                                        <option value="Demi">Demi</option>
                                        <option value="Complete">Complete</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div id="insertBefore">
                            <input type="text" value="1" hidden>
                        </div>
                        <div id="buttonCalcule1">
                            <center>
                                <a class="btn btn-lg  mb-2" style="background-color: #FB9334;" id="calcule1" onclick="calcule('1')">calcule</a>
                            </center>
                        </div>
                    </form>

                    <form action="" method="post" class="mt-4">
                        <!-- start -> end -->
                        <div class="row p-3">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">START :</label>
                                    <input type="date" id="startTime" class="form-control datepicker" style="font-family:Arial, FontAwesome" id="date-picker-example" aria-describedby="emailHelp" placeholder="&#xf073; Departing">
                                </div>
                            </div>
                            <div class="col-sm-6">

                                <div class="form-group">
                                    <label for="exampleInputPassword1">END :</label>
                                    <input type="date" id="endTime" class="form-control datepicker" id="date-picker-example" placeholder="&#xf073; Arriving" style="font-family:Arial, FontAwesome">
                                </div>
                            </div>
                        </div>
                        <div id="allReservationPrice"> </div>
                        <div class="text-center" style="margin-top: -5%;">
                            <svg style="width: 10%;" class="w-6 h-6 float-right" fill="#0069D9" onclick="addNew()" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                            </svg>
                            <a href="#" class="btn btn-primary" style="margin-top: 8%;" onclick="book()">Book</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--            
        <script>
            var pp = <?php echo json_encode($data); ?>;
        </script> -->

        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>


        <script src='<?php echo URLROOT; ?>js/main.js'></script>

    </body>

    </html>
<?php
} else {
        echo '<div> <h1 class="text-danger">Cette page n existe pas</h1></div>';
    }
?>