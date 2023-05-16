# The first project from the public github repository!

### _The whole project was implemented by me._

### The project is built on WordPress installed externally by Composer. Used "Carbon Fields" in almost all blocks and sections to bring the fields to the admin panel. The "gaconnector" alternative is currently being implemented. In the future, it is planned to implement a database of applications in the admin panel in the form of a table.

There are several things you need to do in order to get the project up and running. 

**console:**

	composer update

**then console:**

	cd app/themes/uggwc_pro
	yarn upgrade

## Important!

The connection to the database will not happen without it on the local server!

The file **/inc/Ajax.php, which is responsible for sending requests, is located in .gitignore.