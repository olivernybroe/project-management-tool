# Project management tool

The project management tool is based on Nova, and therefore require you to add the Nova package before you can use
this project. There are no passwords for login, and you login with your name.
You can create all of the resources from the interface and going to a specific project will also give you access to the
team matcher (which is not done yet.).


## Setup
- Add nova package into the root of the project and call the folder `nova`.
- Run `composer install` to install dependencies
- Setup your `.env` file with your database.
- Migrate the database with `php artisan migrate:fresh --seed`.
- Run `php artisan serve`, to deploy the website locally.
- Open the link from the serve command and you can now login using username `Oliver`.


## Further development
Adding true team matcher. The idea was to use [combinatorics](https://github.com/markrogoyski/math-php#probability---combinatorics),
and calculate the coverage of each skill for all of the combinations. 
Then take the combination where the lowest score for the required skill is highest.
This would give us a team where we not necessarily have any experts in any skills, but we have the best coverage
of all the skills.


## ER Diagram
![alt text](https://github.com/olivernybroe/project-management-tool/raw/master/ER.png)