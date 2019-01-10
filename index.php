<!DOCTYPE html>
<html>
    <head>
        <title>Testing</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css"/>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.4.0/clipboard.min.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
        <script type="text/javascript" src="sweet-alert/dist/sweetalert.min.js"></script>
        <link href="sweet-alert/dist/sweetalert.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>

        <div id="custom-bootstrap-menu" class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="/ITS2/index.php">TESTING</a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
        <br>
        <br>
        <br>
            <?php 
                $servername = "localhost";
                $username 	= "root";
                $password	= "";
                $dbname		= "its";

                //create connection 
                $conn = new mysqli($servername , $username , $password , $dbname);

                //check connection

                if ($conn->connect_error) {
                    die("connection failed: " . $conn->connection_error);
                }
            ?>
            <?php 
            if (isset($_POST['id'])&&$_POST['id']!=null) {
                $sql        = "UPDATE user
                SET username = '$username', nama = '$nama', email = '$email'
                WHERE condition;";
                $result     = $conn->query($sql);
            } else {
                $nama       = $_POST['nama'];
                $username   = $_POST['username'];
                $email      = $_POST['email'];
                $sql        = "INSERT INTO user(username,nama,email) VALUES ('$username','$nama','$email');";
                $result     = $conn->query($sql);
            }
            ?>
            <div class="wrapper-page">
                <div class="col-xs-6 center card-box">
                    <div class="panel-body">
                    <form class="form-horizontal" action = "" method = "post">
                    <fieldset>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <label>Username</label>
                                <input class="form-control" type="hidden" name="id" id="id">
                                <input class="form-control" type="text" required="" name="username" id="username" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <label>Nama</label>
                                <input class="form-control" type="text" required="" name="nama" id="nama" placeholder="Nama">
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <label>Email</label>
                                <input class="form-control" type="text" required="" name="email" id="email" placeholder="Email">
                            </div>
                        </div>
                        
                        <div class="form-group text-center m-t-30">
                            <div class="col-xs-12">
                                <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                    </form>
                    </div>
                </div>
                <hr>
                
                <?php 
                    $sql = "SELECT * FROM user";
                    $result = $conn->query($sql);

                ?>
                <table class="table data-table table-hover table-ultra-responsive">
                    <thead>
                        <tr>
                            <td>no</td>
                            <td>username</td>
                            <td>nama</td>
                            <td>email</td>
                            <td>action</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $a = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>
                        <input type='hidden' id='id'>".$a."</td>";
                        echo "<td>".$row['username']."</td>";
                        echo "<td>".$row['nama']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td>
                        <a href='#' class='btn btn-default btn-sm edit' id=".$row['id']." title='edit'>edit</a>
                        <a href='#' class='btn btn-danger btn-sm cdelete' id=".$row['id']." title='delete'>delete</a>
                        </td>";
                        echo "</tr>";
                        $a++;  
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>          

    </div>
  </div>
</div>
       
  </body>
<script>
$(function(){
	$(".edit").click(function (e) {
	});
	$(".cdelete").click(function (e) {
		e.preventDefault();
		var id = this.id;
		swal({
			title: "Are you sure?",
			text: "Data will be deleted !",
			type: "warning",
			showCancelButton: true,
			cancelButtonClass: "btn-raised btn-warning",
			cancelButtonText: "Cancel!",
			confirmButtonClass: "btn-raised btn-danger",
			confirmButtonText: "Yes!",
			closeOnConfirm: false
		}, function(result) {
			if (result) {
				var _url = $("#_url").val();
				window.location.href = _url + "draft/delete/" + id;
			}
		})
	});
	
});
</script>
</html>