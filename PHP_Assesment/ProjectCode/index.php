
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter</title>
   <link rel="stylesheet" href="config/bootstrap.css">
   <link rel="stylesheet" href="css/custom.css">
  <style>
      #heading{
 color: white;
 text-align: center;
     }
  </style>
</head>
<body>
 <div class="container">
    <div>
        
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container-fluid col-7">
   <h1 id="heading" >Filtering of rido database</h1>
        </div>
    </nav>
  <div class="container" >
      <h2 style="text-align: center;">Normal database fetched from rido </h1>
  </div>
  <div class="row">
 
  
 <table class="table table-striped table-hover" >
 <thead>
     <tr>
         <th>Id</th>
         <th>Name</th>
         <th>Mobile_No</th>
         <th>City</th>
         <th>Gender</th>
         <th>DOB</th>
     </tr>
 </thead>
 
 <tbody>
 <?php  
 ini_set('display_errors', 'Off');
              include 'config/db.php';
            
             
          
                 $query="SELECT  * FROM  student_details";
                 
                  $data = mysqli_query($conn,$query) or die('error');
                  if(mysqli_num_rows($data)>0){
                      while($row =mysqli_fetch_assoc($data)){
                          $id=$row['id'];
                          $name=$row['name'];
                          $mob=$row['mob'];
                          $city=$row['city'];
                          $gender=$row['gender'];
                          $dob=$row['dob'];
                          ?>
                          <tr>
                              <td><?php echo $id ?></td>
                              <td><?php echo $name ?></td>
                              <td><?php echo $mob ?></td>
                              <td><?php echo $city ?></td>
                              <td><?php echo $gender?></td>
                              <td><?php echo $dob?></td>
                          </tr>
                          <?php
                      }
                 }
                 else{
                     echo"no data found";
                 }
                
                 
                 
             //  }
             ?> 
 </tbody>
 </table>
 </div>
 <hr><br><br>
 <div class="container" >
      <h2 style="text-align: center;">Filters can be used in database  </h1>
  </div>
    <div class="container">
<div class="row">
    <form class="form-horizontal"    action="index.php" method="POST">
    <div class="form-group">
            <label class="col-lg-2 control-label">City</label>
            <div class="col-lg-4">
                <select class="form-control" name="city">
                    <option value="">Select City</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Mumbai">Mumbai</option>
                    <option value="Bangalore">Bangalore</option>
                    <option value="Lucknow">Lucknow</option>
                    <option value="Raipur">Raipur</option>
                    <option value="Hyderabad">Hyderabad</option>

            </div>

          
        </div>
      <br>
    <div class="form-group">
            <label class="col-lg-2 control-label">Gender</label>
            <div class="col-lg-4">
                <input type="radio" name="gender" value="Male">Male
                <input type="radio" name="gender" value="Female">Female
                <input type="radio" name="gender" value="Other">Other
                
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">DOB</label>
            <div class="col-lg-4">
                <select class="form-control" name="dob">
                    <option value="">Select year</option>
                    
                    <option value="1998">1998</option>
                    <option value="1999">1999</option>
                    <option value="2000">2000</option>
                    <option value="2001">2001</option>
                    <option value="2002">2002</option>
                    <option value="2003">2003</option>
                    <option value="2004">2004</option>

            </div>
        </div>
        <br>
   

       <br>
        <div class="form-group">
            <label class="col-lg-2 control-label"></label>
            <div class="col-lg-4">
              <input type="submit" value="submit" class="btn btn-primary">
            </div>
        </div>





    </form>
</div>
<div>


<div class="row">
 
  
<table class="table table-striped table-hover" >
<thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Mobile_No</th>
        <th>City</th>
        <th>Gender</th>
        <th>DOB</th>
    </tr>
</thead>

<tbody>
<?php  
ini_set('display_errors', 'Off');
             include 'config/db.php';
             $name=null;
             $gender=null;
             $mob=null;
             $city=null;
             $dob=null;
            //  if(isset($_POST['submit']))
            //  {
                if(isset($_POST['city'])||$_POST['gender']){
                 $name=$_POST['name'];
                 $gender=$_POST['gender'];
                 $mob=$_POST['mob'];
                 $city=$_POST['city'];
                 $dob=$_POST['dob'];
                 $greater=$_POST['compare'];
            
         
               if($gender!=""||$city!=""||$dob!="")
              {  $query="SELECT  * FROM  student_details WHERE city ='$city' OR gender = '$gender' OR dob ='$dob'";
                
                
                 $data = mysqli_query($conn,$query) or die('error');
                 if(mysqli_num_rows($data)>0){
                     while($row =mysqli_fetch_assoc($data)){
                         $id=$row['id'];
                         $name=$row['name'];
                         $mob=$row['mob'];
                         $city=$row['city'];
                         $gender=$row['gender'];
                         $dob=$row['dob'];
                         ?>
                         <tr>
                             <td><?php echo $id ?></td>
                             <td><?php echo $name ?></td>
                             <td><?php echo $mob ?></td>
                             <td><?php echo $city ?></td>
                             <td><?php echo $gender?></td>
                             <td><?php echo $dob?></td>
                         </tr>
                         <?php
                     }
                }
                else{
                    echo"no data found";
                }
                }
                
                }
            //  }
            ?> 
</tbody>
</table>
</div>
</div>

</div>
</div>
<script src="config/bootstrap.js"></script>
</body>
</html>