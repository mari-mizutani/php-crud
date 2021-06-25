# Title: Create, Read, Update, Delete   
- BeCode learning challenge

## Learning objectives
- To be able to connect to a database
- To be able to write a simple Create, Read, Update & Delete (CRUD) application
- Use a provided MVC structure to work into.

## The Mission
You will create a CRUD system to store student, teacher and class information in the database.
You do not need to provide any login for this script, everybody can change and view anything!

You will use the MVC structure provided in the [PHP MVC Boilerplate](https://github.com/becodeorg/php-mvc-boilerplate) repo provided by your coach, to help you on your way!

In this assigment you will end up with at least 3 models and 3 controllers, but you could end up with more. Model the software how you want it!

## Must-have features
You have to provide the following pages for Students, Teacher & Class.

- A general overview of all records of that entity in a table
    * Each row should have a button to edit or delete the entity
    * This page should have a "create new" button
- A detailed overview of the selected entity
    * This should include a button to delete this entity
    * Edge case: A teacher cannot be removed if he is still assigned to a class
    * Edge case: If you remove a class, make sure to remove the link between the students and the class.
- A page to edit an existing entity
- A page to create a new entity

### Fields:
On the general overview table you can yourself decide what would be useful information to show.

On the detailed overview you have to provide the following information:

#### Student
- Name
- Email
- Class (with clickable link)
- Assigned teacher (clickable link - relation via class)

#### Teacher
- Name
- Email
- List of all students currently assigned to him (clickable link)
 
#### Class 
- Name class (Giertz, Lamarr, ...)
- Location (Antwerp, Gent, Genk, Brussels, Liege)
- Assigned teacher (clickable link)
- List of assigned students (clickable link)


## Current progress (2021.06.25)
all function tested only on student page

#### Database
- [x] See what tables and columns we need
- [x] Add Dummy DATABASE

#### Create
- [x] Check the data types
- [x] Check for empty fields
- [x] If checks are met, do a request and create post
- [x] Created post on database

#### Read
- [x] Read data from database

#### Update
- [x] Same as create, but we need values on the post
- [x] Check if values are not the same or empty
- [ ] Check if update button works correctly  *just create new post now. must fix it

#### Delete
- [x] Delete button that does a database request
- [x] Check if the user id is equal to the user id of post creation


 ![screenshot of the page](BecodeSchool.png)