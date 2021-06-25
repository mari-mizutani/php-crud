<?php require 'includes/header.php'?>
<body class="px-3">
<div class="container-fluid row">

    <div class="col-lg-4 col-sm-12">
        <h3 class="py-5 text-center">Student Register</h3>
        <div  class="mx-auto justify-content-center px-5">   
            <form method="POST">
                <input type="hidden" name="studentId" value="<?php echo $studentId ?>">
                <div class="form-group row">
                    <label for="studentName">Student Name</label>
                    <input type="text" name="studentName" value="<?php echo $studentName ?>" class="form-control">
                </div>
                <div class="form-group row">
                    <label for="studentEmail">Email</label>
                    <input type="email" name="studentEmail" value="<?php echo $studentEmail ?>" class="form-control" >
                </div>
                <div class="form-group row">
                    <label for="teacherName">Select teacher</label>
                    <select name="teacherName" id="teacherName" class="form-control">
                        <?php foreach ($teachers->getTeacherArr() as $teacher):?>
                            <option value="<?php echo $teacher->getId() ?>">                            
                            <?php echo $teacher->getName() ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group row">
                    <label for="className">Select class</label>
                    <select name="className" id="className" class="form-control">
                        <?php foreach ($classes->getClassArr() as $class): ?>
                            <option value="<?php echo $class->getId()?>"> 
                            <?php echo $class->getName() ?> 
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group row pt-3">
                <?php if($update == true):?>
                    <input class="btn btn-info" type="submit" name="update" value="Update"></button>
                <?php else: ?>    
                    <input class="btn btn-primary" type="submit" name="register" value="Register"></button>
                <?php endif;?>    
                </div>
            </form>
        </div>
    </div>

    <!-- SHOW LIST -->
    <div class="col-lg-8 col-sm-12">
        <h3 class="text-center py-5">Class List</h3>

        <div class="table-responsive px-5">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Email</th>
                        <th>Teacher Name</th>
                        <th>Class Name</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($students_arr as $student_info): ?>
                    <tr>
                        <td><?php echo $student_info->getName(); ?></td>
                        <td><?php echo $student_info->getEmail(); ?></td>
                        <td><?php echo $student_info->getTeacherName() ?></td>
                        <td><?php echo $student_info->getClassName() ?></td>
                        <td>
                        <form style="display:inline-block;" method="post">
                            <button type="submit" name="edit" class="btn btn-outline-primary btn-sm" value="<?php echo $student_info->getId(); ?>">Edit</button>
                        </form>
                        <form style="display:inline-block;" method="post">
                            <button type="submit" name="delete" class="btn btn-outline-danger btn-sm" value="<?php echo $student_info->getId(); ?>">Delete</button>
                        </form>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
                
            </table>
        </div>
    </div>    


</div>
<p class="text-center mt-5"><a href="index.php">Back to homepage</a></p> 

</body>



<?php require 'includes/footer.php'?>
