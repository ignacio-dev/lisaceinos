# LISA CEINOS
Porftolio website built in object-oriented PHP using the Model-View-Controller design pattern.

***
## Technologies
* PHP
* SQL & PDO
* HTML5
* CSS3
* Javascript

***
## How It Works
The structure of this website is divided in two folders, _app_ and _public_, which are located at the root. With the use of htaccess files, the _app_ folder is made inaccessible directly from the browser, while the root redirects the user directly into the _public_ folder.

### index.php
Located inside the _public_ folder, this file calls _config.php_ (located inside the _config_ folder at the _app_ root), automatically loads all the libs (located inside the _libs_ folder at the _app_ root) and initialites the whole script by instantiating the _Core_ class from the libs.

```php
new Core();
```

### config.php
File located inside the _config_ folder in the _app_ folder root. Contains important information that can be accessed throughout the whole site, in the form of the following constants:
* __SITENAME__: Name of the website. This will be echoed inside the _title_ HTML tag.
* __TIMESTAMP__: Current version of the website. It can be set to the _time()_ PHP function when developing to avoid caching of CSS and Javascript files.
* __PUBLICROOT__: Shortcut to the _public_ folder.
* __APPROOT__: Shorcut to the _app_ folder.
* __INCLUDES__: Shortcut to the _includes_ views folder
* __HELPERS__: Shortcut to the _helpers_ folder.
* __MAILTO__: Email address to which the contact form will send its data input.
* __CAPTCHA\_SECRET\_KEY__: Google reCaptcha's secret key.
* __DB\_HOST__: Host name of the database.
* __DB\_NAME__: Name of the database.
* __DB\_USER__: Username used to log into the database.
* __DB\_PASS__: Password used to log into the database.
* __API\_BASE\_URL__: Base URL used to interact with the API.
* __API\_TOKEN__: Token used to gain permission to interact with the API.
* __ADMIN\_NAME__: Username used to log into the admin section.
* __ADMIN\_PASS__: Password used to log into the admin section.

### libs
##### Core
File in charge of parsing URL parameters, calling the right method from a controller and pass extra parameters if desired. If nothing is passed through the URL the Core will call the _Home_ controller by default. If no method is passed through the URL, the _Core_ will call the _Index_ method by default.

Examples:

http://www.felvet.es/descargar/pdf - will call the _Pdf_ method from the _Descargar_ controller.

http://www.felvet.es/contact - will call the _Index_ method from the _Contact_ controller.


##### Database
File in charge of connecting to the database using PDO. Models will instantiate the _Database_ class in order to interact with the database by using the following methods:

* __query(\$sql)__: Prepares a statement by passing a string with SQL code.
* __bind(\$param, \$val)__: Will bind SQL parameters and values. This method protects the database from SQL injection.
* __execute()__: Will execute the SQL statement with its bound parameters.
* __getResultSet()__: Will fetch all the data returned by the database from the SQL query.
* __getResultSingle()__: Will fetch one single row of the data returned by the database from the SQL query.
* __getRowCount()__: Will count the number of rows returned by the database from the SQL query.


##### Api
File in charge of interacting with the _Active-Campaign_ API by using the following methods:

* __saveUser(\$email, \$name, \$list)__: Saves a new user using a name and an email. The _\$list_ parameter is optional; if provided the user will also be added to that list.
* __findEntry($email, $list)__: Finds a user by passing in an email address. The _\$list_ parameter is optional; if provided the user will only be searched on that list. Returns a boolean value.

##### Controller
All controllers extend this class which contains two methods:

* __model($model)__: Method in charge of calling a model. Takes in a string which specifies which model should be called.
* __view($view, $data)__: Method in charge of calling a view. Takes in a string which specifies which view should be called, and an associative array with the data generated from the controller.

***
### Controllers
Located inside the _controller_ folder at the _app_ root, each controller can contain different methods to handle data. This data must be stored in the _\$data_ variable and sent to the view by using the _view()_ method and passing _$data_ as the second parameter.

Example:

```php
$this->view('Home/index', $data);
```
##### \$data
The _\$data_ variable is an associative array that can be used to store data collected from the Database, Api and/or user input. The _view()_ method will require this array to be passed through.

For the view to be displayed properly, each controller must also add the following data to the _\$data_ array:

* __'current_menu'__: must be set to a string. It will tell the view what css and js file to use. (Example: 'home' will result in the view using _home.css_ and _home.js_).
* __'current_title'__: must be set to a string which will be echoed inside the _title_ html tag.
* __'header'__: must be set to a boolean. It will tell the view if it should load the header and navigation bar or not.

Example:

```php
$data = [
	'current_menu'  => 'gracias',
	'current_title' => 'Gracias por descargar la guía',
	'header'        => false
];
```
***
### Models
Located inside the _model_ folder at the _app_ root. Different models can provide different methods in order to interact with the database. For this to be possible, a new _Database_ class must be instantiated in the constructor and stored in a variable. All methods from the _Database_ lib will be available to use through this variable.

Example:

```php
class User {
		private $db;

		public function __construct() {
			$this->db = new Database();
		}

		public function selectAll() {
			$this->db->query('SELECT * FROM users');
			$this->db->execute();
		}
}
```

***
### Views
Located inside the _view_ folder at the _app_ root, views can display data stored in the _\$data_ array in HTML format, like so:

```php
<h1><?= $data['user-name'] ?></h1>
```

__Important:__ The contents inside a view file will be displayed inside the _body_ tag of the page. The _DOCTYPE_, _head_, etc... are automatically generated, therefore they must not be included inside the view files.

#### inc
Folder located inside the _views_ folder. It contains the following files:

* __head.php__: HTML _head_. Contains the title, meta tags and links to the CSS files.
* __header.php__: Contains the header and navigation bar.
* __foot.php__: Contains the links to the Javascript files.

***
### Helpers
Located inside the _helpers_ folder at the _app_ root, these files can contain custom PHP functions that can be called directly from the Views, in order to keep these as clean as possible.

***
### Download system
FELVET offers a free PDF in exchange of the user's data. This is all taken care of by the 'Descargar' controller. When a user provides a name and an email address, a download link will be sent to them via email. This link will point to a controller that will check if the user has been added to the 'download' list in Active Campaign (by using the API lib), take the PDF from a secret location, change the name of the file (which is initially transcoded) and force the browser to downlaoad the file with its new name.

```php
private    $secretFilePath = APPROOT . '/ffMgfjslLY6rLwDgnTW/fjslk.pdf';
protected  $publicFilePath = 'FELVET_GUIA-DE-COMPORTAMIENTO.pdf';

header('Content-type: application/pdf');
header('Content-Disposition: attachment; filename="' . $this->publicFilePath . '"');
readfile($this->secretFilePath);
```

***
### Cookies & Sessions
This website uses the following cookies and sessions:

* __downloadActive__: Session that makes the PDF file available to download after the user inputs his or her data until the browser is closed.
* __cookiesAccepted__: Cookie that checks if the user has accepted the company's cookie policy. Gets destroyed after 30 days.