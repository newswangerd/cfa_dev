# Community Farm Alliance Land Link Website

This is a project that we created for the Community Farm Alliance in order to help them match farm owners with workers that need a farm to work on.

Since PHP allows you to write really messy code where the HTML is mixed with the business logic for the page, we built our own simple MVT framework and object relational mapper which is loosely based off of Django to help structure the project a little better. The following is a description of how this MVT framework library works.

# Technical
Our database application consists of three major components. These are models, templates (views) and controllers. 

## Models: 
These files contain all of the database project that the program needs. There are two essential components to this. The first is the model_form.php library which contains the Form class, which contains all of the logic for accessing the database. This library has methods for creating, updating, deleting, inserting and reading from the database. This includes methods such as save, load_by_pk, load_by_filter, load_from_post, delete etc. The other set of classes are classes that describe specific field types such as IntegerField, TextField, CheckBox and ForeignKey. Each of these field classes contain validation logic for that specific class. For example, IntegerFields will validate to false if they contain data that is non-numeric.

The second set of files within the models category are files that describe specific tables within a specific database. These files contain sub classes that extent the Form class from the model_form.php file whose sole purpose is to provide a description of the database. For example Farmer would extend Form and would contain all the fields for the farmer table in the database.

## Templates: 
Templates are the files that describe exactly how the website should look and feel. For the most part, they are just HTML files with a .php extension. PHP tags are inserted into the form wherever the user wishes to display data from the database. For instance, if you want to display someone's name, you might place the tag <?PHP echo $form ->fields['name'] ?> in the HTML which echoes out the name variable in the fields database. From here, any information that you want to display onto the web page can be set as a variable in PHP and then echoed out.

Templates can be structured however you want, but the best way to do this is to structure them in a way that avoids duplicate code. For example there are certain elements that are common across all pages in a website. These are things such as navigation bars, logos, CSS imports etc. All of this skeleton information can be stored in a single PHP file. Then, information that changes from page to page, such as the contents of the body and title, can be included in this base template. For example, we could have a file called base.php which contains all of the HTML that is common to all the web pages in a website.  This file can then have a tag such as <?PHP include $body; ?>. This would allow for the user of the template to specify exactly what they want to have included in the body of the base.php page. If you wanted to include a login form, you could write a file called login.php which contains all the HTML for logging in. Then, to create the page, all you would have to do is create a variable called $body, set it to “login.php” and include base.php, which will include whatever is stored in $body.

## Controllers: 
The final component are controllers. This is the piece that pulls everything together. The controller uses the models to manipulate the database and the templates to display the information from it's interactions with the database to the user. A typical controller will include a model at the top, load information from the user via post or get requests, load information from the database via a model, set all the variables such as $body or $form for the templates and then include a template such as base.php.

Controllers are accessed directly by the user. When they load up the website they are invoking a controller. For example, if one of our controllers is called controller1.php, the user would access this by going to www.example.com/controller1.php. 

##File Structure: 
The directory for our project contains two folders: models and templates. The models folder stores all of the models as well as the necessary libraries. The templates folder contains all of the templates that the site uses as well as all of the files associated with these templates such as images, css and javascript. Controllers are stored in the root directory of the project, in the same place as the models and template folders. Once the project is ready to be deployed this folder gets uploaded to the web server’s document root so that the controllers and template/model folders are located in the web server’s document root.

### Example File Structure

```
Web Root:
-index.php
-controller1.php
-controller2.php
+ models
|-- model_form.php
|-- model1.php
|-- model2.php
+ templates
|-- base.php
|-- template1.php
|-- template2.php
|-- + css
    |-- style1.css
    |-- style2.css
|-- + javascript
    |-- script1.js
    |-- script2.js
|-- + images
    |-- image1.png
```
