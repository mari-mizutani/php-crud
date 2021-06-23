<?php require 'includes/header.php'?>
<body class="px-3">
<!-- <?php var_dump($teachers)?> -->
<div class="container-fluid row">
    <!-- STUDENT RESISTER  -->
    <div class="col-lg-4 col-sm-12">
        <h3 class="py-5 text-center">Student Register</h3>
        <div  class="mx-auto justify-content-center px-5">   
            <form method="POST">

                <!-- Id would be automatically added -->
                <div class="form-group row">
                    <label for="studentName">Student Name</label>
                    <input type="text" name="studentName" value="" class="form-control">
                </div>
                <div class="form-group row">
                    <label for="studentEmail">Email</label>
                    <input type="email" name="studentEmail" value="" class="form-control" >
                </div>
                <div class="form-group row">
                    <label for="teacherName">Select teacher</label>
                    <select name="teacherName" id="teacherName" class="form-control">
                        <?php foreach ($teachers->getTeacherArr() as $teacher):?>
                            <option value="<?php echo $teacher->getId() ?>"> <?php echo $teacher->getName() ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group row">
                    <label for="className">Select class</label>
                    <select name="className" id="className" class="form-control">
                        <?php foreach ($classes->getClassArr() as $class): ?>
                            <option value="<?php echo $class->getId() ?>"> <?php echo $class->getName() ?> </option>
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
    <div class="col-lg-8 col-sm-12">
        <h3 class="text-center py-5">Class List</h3>

        <div class="table-responsive px-5">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>Class Name</th>
                    <th>Teacher Name</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td><?php echo $studentName ?></td>
                    <td><?php echo $studentEmail ?></td>
                    <td><?php echo $teacherName ?></td>
                    <td><?php echo $className ?></td>
                </tr>
            </tbody>


            </table>
        </div>
    </div>    


</div>
<p class="text-center"><a href="index.php">Back to homepage</a></p> 

</body>



<?php require 'includes/footer.php'?>
