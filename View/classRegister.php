<?php require 'includes/header.php'?>
<!-- this is the view, try to put only simple if's and loops here.
Anything complex should be calculated in the model -->
<body>
    <!-- CLASS RESISTER  -->
    <div>

        <h3 class="py-2 text-center">Class Register</h3>

        <div class="row mx-auto justify-content-center py-5"> 

        <form method="POST">
            <div class="form-group">
                <label>Class Name</label>
                <input type="text" name="name" value="">
            </div>
            <div class="form-group">
                <label>Location</label>
                <input type="text" name="location" value="">
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
                <label>Select the student</label>
                <select name="studentName" id="studentName">
                    <?php foreach ($students->student as $student): ?>
                        <option value="<?php echo $student->getId() ?>"> <?php echo $student->getName() ?> </option>
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