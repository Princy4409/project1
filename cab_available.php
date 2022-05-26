<head>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Map | View</title>
	</head> 
<header class="bg-dark py-5" id="main-header">
    <div class="container h-100 d-flex align-items-center justify-content-center w-100">
        <div class="text-center text-white w-100">
            <h1 class="display-4 fw-bolder">Available Cabs</h1>
            <link href="./assets/css/hide.css" rel="stylesheet">
            <!-- <p class="lead fw-normal text-white-50 mb-0">We will take care of your vehicle</p> -->
        </div>
    </div>


<!-- jquery-->
    <link href="http://code.jquery.com/ui/1.9.2/themes/smoothness/jquery-ui.css" rel="stylesheet">
<!-- <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script> -->
</header>
<!-- Section-->

						Start Date: 
						<input type="date" name="startdate" id='x' required ="required">
                        <script>
				var today = new Date().toISOString().split('T')[0];
document.getElementsByName("startdate")[0].setAttribute('min', today);
				</script>

				
End Date: 
 <input type="date"  name="enddate" id='j' required onchange='drop();' required onchange='diff();'>
 <script>
				var today = new Date().toISOString().split('T')[0];
document.getElementsByName("enddate")[0].setAttribute('min',today);
				</script>
 
 <i class="ion-ios-clock"></i>
									<select class="selectpicker time-select" name="time">
										<option value="01:00">01:00 am</option>
										<option value="02:00">02:00 am</option>
										<option value="03:00">03:00 am</option>
										<option value="04:00">04:00 am</option>
										<option value="05:00">05:00 am</option>
										<option value="06:00">06:00 am</option>
										<option value="07:00">07:00 am</option>
										<option value="08:00">08:00 am</option> 
 										<option value="09:00">09:00 am</option>
										<option value="10:00">10:00 am</option>
										<option value="11:00">11:00 am</option>
										<option value="12:00">12:00 pm</option>
										<option value="13:00">01:00 pm</option>
										<option value="14:00">02:00 pm</option>
										<option value="15:00">03:00 pm</option>
										<option value="16:00">04:00 pm</option>
										<option value="17:00">05:00 pm</option>
										<option value="18:00">06:00 pm</option>
										<option value="19:00">07:00 pm</option>
										<option value="20:00">08:00 pm</option>
										<option value="21:00">09:00 pm</option>
										<option value="22:00">10:00 pm</option>
										<option value="23:00">11:00 pm</option>
										<option value="24:00">12:00 am</option>
									</select>	
							
							
						</div>
No Of persons :  
<select name="persons" id="name">   
  <option value="Select">Select</option>}  
  <option value="one">1</option>  
  <option value="two">2</option>  
  <option value="three">3</option>  
  <option value="four">4</option>  
  <option value="five">5</option>  
  <option value="six">6</option>   
</select> 
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-md-12">

<div class="messagestyle">
            <div id="single" class="one data">
                <div class="col-md-4">
                  
                        <label name="labeltitle">great you have selected single seater</label><br>
                        <label name='content'>we recommend alto for you,thanyou</label>
                    
                </div>
            </div>

               <div id="double" class="two data">
                    <div class="col-md-4">
                        
                            <label name="labeltitle">great you have selected two seater</label><br>
                            <label name='content'>we recommend alto,beat for you,thanyou</label>
                        
                    </div>
                </div>    

               <div id="three" class="three data">
                    <div class="col-md-4">
                        
                            <label name="labeltitle">great you have selected  three seater</label><br>
                            <label name='content'>we recommend alto,beat,wagoner for you,thanyou</label>
                        
                    </div>
                </div>    
  

               <div id="four" class="four data">
                    <div class="col-md-4">
                       
                            <label name="labeltitle">great you have selected four seater</label><br>
                            <label name='content'>we recommend alto,kia sonet,kia seltos for you,thanyou</label>
                        
                    </div>
                </div>    


               <div id="five" class="five data">
                    <div class="col-md-4">
                        
                            <label name="labeltitle">great you have selected five seater</label><br>
                            <label name='content'>we recommend kia seltos for you,thanyou</label>
                        
                    </div>
                </div>    

               <div id="six" class="six data">
                    <div class="col-md-4">
                        
                            <label name="labeltitle">great you have selected six seater</label><br>
                            <label name='content'>we recommend kia carravan for you,thanyou</label>
                        
               
                    </div>
                </div>

            </div>


    </div>        
            <br></br>
                <div class="form-group">
                <div class="input-group mb-3">
                    <input type="search" id="search" class="form-control" placeholder="Search Here" aria-label="Search Here" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <span class="input-group-text bg-primary" id="basic-addon2"><i class="fa fa-search"></i></span>
                    </div>
                </div>
                </div>
                <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-xl-2" id="cab_list">
                    <?php 
                    $cabs = $conn->query("SELECT c.*, cc.name as category FROM `cab_list` c inner join category_list cc on c.category_id = cc.id where c.delete_flag = 0 and c.id not in (SELECT cab_id FROM `booking_list` where `status` in (0,1,2)) order by c.`reg_code`");
                    while($row= $cabs->fetch_assoc()):
                    ?>
                    <a class="col item text-decoration-none text-dark book_cab" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>" data-bodyno="<?php echo $row['body_no'] ?>">
                        <div class="callout callout-primary border-primary rounded-0">
                            <dl>
                                <dt class="h3"><i class="fa fa-car"></i> <?php echo $row['body_no'] ?></dt>
                                <dd class="truncate-3 text-muted lh-1">
                                    <small><?php echo $row['category'] ?></small><br>
                                    <small><?php echo $row['cab_model'] ?></small>
                                </dd>
                            </dl>
                        </div>
                    </a>
                    <?php endwhile; ?>
                </div>
                <div id="noResult" style="display:none" class="text-center"><b>No Result</b></div>
            </div>
</section>
<section class="py-5">
    <div class="outer-scontainer">
	        <div class="row">
	            <form class="form-horizontal" action="" method="post" name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
                    <div class="form-area">	      
    					<button type="submit" id="submit" name="import" class="btn-submit">RELOAD DATA</button><br />
					</div>
                    <div class="form-area">	      
                            <select name = "startPoint" class = "sel_start_end">
                                <option> select Destination Point</option>
                                <?php
                                    /* Database connection settings */
//                                    $coordinates = array();
//                                    $latitudes = array();
//                                    $longitudes = array();

                                    // Select all the rows in the markers table
                                    $query = "SELECT  `locationLatitude`, `locationLongitude`,`name` FROM `location_tab` ";
                                    $result = $conn->query($query) or die('data selection for google map failed: ' . $mysqli->error);
                                    while ($row = mysqli_fetch_array($result)) { ?>

                                        <option value = <?php echo $row['locationLatitude']."_".$row['locationLongitude'];?>><?php echo $row['name'];?></option>
                                        <?php
//                                            $latitudes[] = $row['locationLatitude'];
//                                            $longitudes[] = $row['locationLongitude'];
//                                            $coordinates[] = 'new google.maps.LatLng(' . $row['locationLatitude'] .','. $row['locationLongitude'] .'),';
                                        }
                                        ?>
                            </select>
                        </div>
                    <div class="form-area">	      
                            <select name = "endPoint" class = "sel_start_end">
                                <option> select Starting Point</option>
                                <?php
                                    /* Database connection settings */
//                                    $coordinates = array();
//                                    $latitudes = array();
//                                    $longitudes = array();

                                    // Select all the rows in the markers table
                                    $query = "SELECT  `locationLatitude`, `locationLongitude`,`name` FROM `location_tab` ";
                                    $result = $conn->query($query) or die('data selection for google map failed: ' . $mysqli->error);
                                    while ($row = mysqli_fetch_array($result)) { ?>

                                        <option value = <?php echo $row['locationLatitude']."_".$row['locationLongitude'];?>><?php echo $row['name'];?></option>
                                        <?php
//                                            $latitudes[] = $row['locationLatitude'];
//                                            $longitudes[] = $row['locationLongitude'];
//                                            $coordinates[] = 'new google.maps.LatLng(' . $row['locationLatitude'] .','. $row['locationLongitude'] .'),';
                                        }
                                        ?>
                            </select>
                        </div>
                    <input type="hidden" id = "startZone" name = "startZone" value="<?php if (isset($_POST['startPoint'])){
                        echo $_POST['startPoint'];
                    } ?>">
                    <input type="hidden" id = "endZone" name = "endZone" value="<?php if (isset($_POST['endPoint'])){
                        echo $_POST['endPoint'];
                    } ?>">
	            </form>
	        </div>

		<div id="map" style="width: 100%; height: 80vh;"></div>
    </div>
</section>
<?php 

    if (isset($_POST['startPoint']) && $_POST['endPoint'] !== "") {
        $startvalue = $_POST['startPoint'];
        $endvalue = $_POST['endPoint'];
        $start = explode("_",$startvalue);
        $end = explode("_",$endvalue);

        $coordinates = array();

        $coordinates[0] = 'new google.maps.LatLng(' . $start[0] .','. $start[1] .'),';
        $coordinates[1] = 'new google.maps.LatLng(' . $end[0] .','. $end[1] .'),';

        $lastcount = count($coordinates)-1;
        $coordinates[$lastcount] = trim($coordinates[$lastcount], ",");	
    }
?>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-dFHYjTqEVLndbN2gdvXsx09jfJHmNc8&callback=initMap"></script>
		<script>
			function initMap() {
			  var mapOptions = {
			    zoom: 10,
			    center: {<?php echo'lat:'. $start[0] .', lng:'. $start[1] ;?>}, //{lat: --- , lng: ....}
			    mapTypeId: google.maps.MapTypeId.SATELITE
			  };

			  var map = new google.maps.Map(document.getElementById('map'),mapOptions);

			  var RouteCoordinates = [
			  	<?php
			  		$i = 0;
					while ($i < count($coordinates)) {
						echo $coordinates[$i];
						$i++;
					}
			  	?>
			  ];

			  var RoutePath = new google.maps.Polyline({
			    path: RouteCoordinates,
			    geodesic: true,
			    strokeColor: '#1100FF',
			    strokeOpacity: 1.0,
			    strokeWeight: 10
			  });

			  mark = 'img/mark.png';
			  flag = 'img/flag.png';

			  startPoint = {<?php echo'lat:'. $start[0] .', lng:'. $start[1] ;?>};
			  endPoint = {<?php echo'lat:'.$end[0] .', lng:'. $end[1] ;?>};

			  var marker = new google.maps.Marker({
			  	position: startPoint,
			  	map: map,
			  	icon: mark,
			  	title:"Start point!",
			  	animation: google.maps.Animation.BOUNCE
			  });

			  var marker = new google.maps.Marker({
			  position: endPoint,
			   map: map,
			   icon: flag,
			   title:"End point!",
			   animation: google.maps.Animation.DROP
			});

			  RoutePath.setMap(map);
			}
    	</script>

    	<!--remenber to put your google map key-->
<script>
    $(function(){
        $('#search').on('input',function(){
            var _search = $(this).val().toLowerCase().trim()
            $('#cab_list .item').each(function(){
                var _text = $(this).text().toLowerCase().trim()
                    _text = _text.replace(/\s+/g,' ')
                    console.log(_text)
                if((_text).includes(_search) == true){
                    $(this).toggle(true)
                }else{
                    $(this).toggle(false)
                }
            })
            
            if( $('#cab_list .item:visible').length > 0){
                $('#noResult').hide('slow')
            }else{
                $('#noResult').show('slow')
            }
        })
        $('#cab_list .item').hover(function(){
            $(this).find('.callout').addClass('shadow')
        })
        $('#cab_list .book_cab').click(function(){
            if("<?= $_settings->userdata('id') && $_settings->userdata('login_type') == 2 ?>" == 1)
                uni_modal("Book Cab - "+$(this).attr('data-bodyno'),"booking.php?cid="+$(this).attr('data-id')+"&startzone="+$('#startZone').val()+"&endzone="+$('#endZone').val(),'mid-large');
            else
            location.href = './login.php';
        })
        $('#send_request').click(function(){
            if("<?= $_settings->userdata('id') > 0 && $_settings->userdata('login_type') == 2 ?>" == 1)
            uni_modal("Fill the cab Request Form","send_request.php",'mid-large');
            else
            alert_toast(" Please Login First.","warning");
        })

    })
    $(document).scroll(function() { 
        $('#topNavBar').removeClass('bg-transparent navbar-dark bg-primary')
        if($(window).scrollTop() === 0) {
           $('#topNavBar').addClass('navbar-dark bg-transparent')
        }else{
           $('#topNavBar').addClass('navbar-dark bg-primary')
        }
    });
    $(function(){
        $(document).trigger('scroll')
    })
</script>

<script>
        $(document).ready(function(){
          $("#name").change(function(){
            var elname =$("#name").val();
                $(".data").hide();
               $("."+elname).show().fadeIn(700);
                
          }) 

        });



</script>



