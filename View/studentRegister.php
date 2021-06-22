<?php require 'includes/header.php'?>
<body>
    <!-- STUDENT RESISTER  -->
    <div>
        <h3 class="py-2 text-center">Student Register</h3>
         
        <div  class="form-row mx-auto justify-content-center py-5">   
            <form method="POST" class="pt-5 col-lg-4 col-sm-12 text-center mx-auto">
                <div class="form-group">
                    <label>Student Name</label>
                    <input type="text" name="name" value="">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="">
                </div>
                <div class="form-group">
                    <label>Select the class</label>
                    <select name="className" id="className">
                        <?php foreach ($classes->class as $class): ?>
                            <option value="<?php echo $class->getId() ?>"> <?php echo $class->getName() ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Select the teacher</label>
                    <select name="teacherName" id="teacherName">
                        <?php foreach ($teachers->teacher as $teacher): ?>
                            <option value="<?php echo $teacher->getId() ?>"> <?php echo $teacher->getName() ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit" name="Register">Register</button>
                    <button class="btn btn btn-secondary" type="submit" name="Delete">Delete</button>
                </div>
            </form>
        </div>
        
    </div>

    <p class="text-center"><a href="index.php">Back to homepage</a></p>

</body>

<?php require 'includes/footer.php'?>
