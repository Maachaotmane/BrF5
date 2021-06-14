<?php  session_start();
    if ($_SESSION['user_type'] == 'admin') {
        ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dash</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>css/dash.css">
</head>

<body class="home">
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <div class="navi">
                    <ul>
                        <li class="active"><a href="#"><i class="fa fa-home" aria-hidden="true"></i><span
                                    class="hidden-xs hidden-sm">Home</span></a></li>
                        <li><a href="#"><i class="fa fa-tasks" aria-hidden="true"></i><span
                                    class="hidden-xs hidden-sm">Tarifs</span></a></li>
                        <li><a href="#"><i class="fa fa-bar-chart" aria-hidden="true"></i><span
                                    class="hidden-xs hidden-sm">Offres</span></a></li>
                        <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i><span
                                    class="hidden-xs hidden-sm">Users</span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <div class="row">
                    <header>
                        <div class="col-md-7">
                            <nav class="navbar-default pull-left">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas"
                                        data-target="#side-menu" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                            </nav>
                        </div>
                        <div class="col-md-5">
                            <div class="header-rightside">
                                <ul class="list-inline header-top pull-right">
                                    <li class="hidden-xs"><a href="#" class="add-project" data-toggle="modal"
                                            data-target="#add_project">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </header>
                </div>
                <div class="user-dashboard">
                    <h1 class="text-center">Edit Tarifs</h1>
                    <div class="row">
                        <div class="col-md-7 mx-auto">
                            <!-- form input -->
                            <?php
                    foreach ($data['tarifs'] as $tarif) :?>
                            <form method="POST" action="<?php echo URLROOT; ?>tarifs/update/<?php echo $tarif->id; ?>">
                                <div class="form-group">
                                    <label>Type: </label>
                                    <input class="form-control" name="prix" type="text"
                                        value="<?php echo $tarif->prix; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Prix: </label>
                                </div>
                                <a href="#" class="btn btn-secondary">Close</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <script>
        $(document).ready(function () {
            $('[data-toggle="offcanvas"]').click(function () {
                $("#navigation").toggleClass("hidden-xs");
            });
        });
    </script>
</body>

</html>
<?php
    } else {
        echo '<div> <h1 class="text-danger">Cestte page n existe pas</h1></div>';
    }
?>