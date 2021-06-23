<?php require 'includes/header.php'?>
<body>
<div class="container-fluid row">
    <!-- STUDENT RESISTER  -->
    <div class="col-lg-5 col-sm-12">
        <h3 class="py-5 text-center">Teacher Register</h3>
         
        <div  class="mx-auto justify-content-center px-5">   
            <form method="POST">

                <!-- Id would be automatically added -->
                <input type="hidden" name="id" value="" class="form-control">

                <div class="form-group row">
                    <label for="teacherName">Teacher Name</label>
                    <input type="text" name="teacherName" value="" class="form-control">
                </div>
                <div class="form-group row">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="" class="form-control" >
                </div>
                <div class="form-group row">
                    <label for="studentName">Select student</label>
                    <select name="studentName" id="studentName" class="form-control">
                        <?php foreach ($students->student as $student): ?>
                            <option value="<?php echo $student->getId() ?>"> <?php echo $student->getName() ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group row pt-3">
                    <input class="btn btn-primary" type="submit" name="register" value="Register"></button>
                </div>
            </form>
        </div>
        
    </div>

        <!-- SHOW LIST  -->
    <div class="col-lg-7 col-sm-12">
        <h3 class="text-center py-5">CLASS LIST</h3>

        <div class="table-responsive px-5">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Teacher Name</th>
                    <th>Email</th>
                    <th>Student Name</th>
                </tr>
            </thead>

            <tbody>
                <?php ?>

            </tbody>


            </table>
        </div>
    </div>    


</div>
<p class="text-center"><a href="index.php">Back to homepage</a></p> 

</body>



<?php require 'includes/footer.php'?>
