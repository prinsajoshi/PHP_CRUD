<?php
include "db_conn.php";

if (isset($_POST["submit"])) {
   $CompanyName = $_POST['CompanyName'];
   $Address = $_POST['Address'];

   $sql = "INSERT INTO `company_detail`(`id`, `CompanyName`, `Address`) VALUES (NULL,'$CompanyName','$Address')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: index.php?msg=New record created successfully");
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <title>Company PHP CRUD Application</title>
</head>

<body>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: purple; color: white; font-weight: bold;">
    Company PHP Complete CRUD Application
</nav>


   <div class="container">
      <div class="text-center mb-4">
         <h3>Add New Company</h3>
         <p class="text-muted">Complete the form below to add a new company</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post"   style="width:50vw; min-width:300px;" id="prinsa">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Company Name</label>
                  <input id="e_name" type="text" class="form-control" name="CompanyName"  >
                  <div id="nameError" class="text-danger"></div> 
               </div>


            <div class="mb-3">
               <label class="form-label">Address</label>
               <input id="e_address" type="text" class="form-control" name="Address">
               <div id="addressError" class="text-danger"></div>

            </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
            </form>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
   <script>
        
        const e_name = document.getElementById('e_name')
        const e_address = document.getElementById('e_address')
    

        const e_errorElement = document.getElementById('nameError')




prinsa.addEventListener('submit', (e) => {
let messages = []
if (e_name.value === '' || e_name.value === null) {
            messages.push('Company Name is required');
         }

        
         if (e_address.value === '' || e_address.value === null) {
            messages.push('Company Address is required');
         }

         if (messages.length > 0) {
            e.preventDefault();
            e_errorElement.innerText = messages.join(', ');
         }
})

    </script>

</body>

</html>

