

# LISA CEINOS
Portfolio website built in object-oriented PHP using the Model-View-Controller design pattern.

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
Located inside the _public_ folder, this is the file where every user arrives when visiting the website. It calls _config.php_ and and _bootstrap.php_ (both located inside the _tools_ folder at the _app_ root). It also initialites the whole website by instantiating a new _Core_ class from the libs.

```php
require_once '../app/tools/config.php';
require_once '../app/tools/bootstrap.php';
// Init
new Core();
```

### config.php
File located inside the _tools_ folder in the _app_ root. Contains important information that can be accessed throughout the whole site via the following constants:
* __DB\_HOST__: Host name of the database.
* __DB\_NAME__: Name of the database.
* __DB\_USER__: Username used to log into the database.
* __DB\_PSWD__: Password used to log into the database.
* __URL__: Shortcut to the URL root.
* __SITENAME__: Name of the website.
* __META\_TITLE__: Title in the meta tags.
* __META\_DESCRIPTION__: Description in the meta tags
* __OG\_IMG__: Open Graph image URL.
* __TWITTER__: Twitter account
* __TWITTER\_CARD__: Twitter card image URL
* __APPROOT__: Shorcut to the _app_ folder.
* __HEAD__: Shortcut to the _head.php_ include.
* __FOOT__: Shortcut to the _foot.php_ include.
* __MAILTO__: Email address to which the contact form will send its data input.
* __CAPTCHA\_PUBLIC\_KEY__: Google reCaptcha's public key.
* __CAPTCHA\_SECRET\_KEY__: Google reCaptcha's secret key.
* __TIMESTAMP__: Current version of the website. It can be set to the _time()_ PHP function while developing to avoid caching of CSS and Javascript files.

### bootstrap.php
File located inside the _tools_ folder at the _app_ root. It automatically loads all the libraries, which are located inside the _libs_ folder at the _app_ root.

### libs
##### Core
File in charge of parsing URL parameters, calling the right method from a controller and pass extra parameters if desired. If nothing is passed through the URL the Core will call the _Photo_ controller by default. If no method is passed through the URL, the _Core_ will call the _index_ method by default.

Examples:

http://www.lisaceinos.com/video/display - will call the _display_ method from the _Video_ controller.

http://www.lisaceinos.com/contact - will call the _index_ method from the _Contact_ controller.


##### Database
File in charge of connecting to the database using PDO. Models will instantiate the _Database_ class in order to interact with the database by using the following methods:

* __query(\$sql)__: Prepares a statement by passing a string with SQL code.
* __bind(\$param, \$val)__: Will bind SQL parameters and values. This method protects the database from SQL injection.
* __execute()__: Will execute the SQL statement with its bound parameters.
* __getResultSet()__: Will fetch all the data returned by the database from the SQL query.
* __getResultSingle()__: Will fetch one single row of the data returned by the database from the SQL query.
* __getRowCount()__: Will count the number of rows returned by the database from the SQL query.

##### Controller
All controllers extend this class which contains two methods:

* __model($model)__: Method in charge of calling a model. Takes in a string which specifies which model should be called.
* __view($view, $data)__: Method in charge of calling a view. Takes in a string which specifies which view should be called, and an associative array with the data generated from the controller.

***
### Controllers
Located inside the _controller_ folder at the _app_ root, each controller can contain different methods to handle data. This data can be stored in the _\$data_ variable and sent to the view by using the _view()_ method and passing _$data_ as the second parameter.

Example:

```php
class About extends Controller {
	public function __construct() {
		$this->bioModel = $this->model('Bios');
	}

	public function index() {
		$bio = $this->bioModel->getBio();
		$data = [
			'bio' => $bio
		];
		$this->view('about/index', $data);
	}
}
```
***
### Models
Located inside the _model_ folder at the _app_ root. Different models can provide different methods in order to interact with the database. For this to be possible, a new _Database_ class must be instantiated in the constructor and stored in a variable (_$db_ for example). All methods from the _Database_ lib will be available to use through this variable.

Example:

```php
class Bios {
	private $db;

	public function __construct() {
		$this->db = new Database();
	}

	public function getBio() {
		// Get Latest Version Of Bio
		$sql = "SELECT * FROM bio ORDER BY id DESC LIMIT 1";
		$this->db->query($sql);
		return $this->db->fetch();
	}
}
```

***
### Views
Located inside the _view_ folder at the _app_ root, views can display data stored in the _\$data_ array in HTML format, like so:

```php
<h1><?= $data['video-title'] ?></h1>
```

__Important:__ The contents inside a view file will be displayed inside the _body_ tag of the page. The _DOCTYPE_ is automatically generated, therefore it must not be included inside the view files. The head (which includes head and header) and foot (which includes the links to the Javascript files) can be included like so:

```php
<? require_once HEAD; ?>
	<main id="about">
		<p>	
			<?= $data['bio']; ?>	
		</p>
	</main>
<? require_once FOOT; ?>
```
#### inc
Folder located inside the _views_ folder. It contains the following files:

* __head.php__: HTML _head_. Contains the title, meta tags and links to the CSS files.
* __header.php__: Contains the header and navigation bar.
* __foot.php__: Contains the links to the Javascript files.

#### The _\$current_ variable
When using a controller, a _$current_ variable is automatically set up containing the name of the current controller. This variable can be accessed from the views, and it is used to generate a custom CSS stylesheet in the _head_ for each individual controller if needed, or Javascript files in the foot.

Example:
```php
	<link rel="stylesheet" type="text/css" href="<?= URLROOT ?>/css/<?= strtolower($current)?>.css?<?=   TIMESTAMP ?>">
```

... or

```php
<? if ($current == "Contact"): ?>
	<script src="https://www.google.com/recaptcha/api.js"></script>
<? endif; ?>
```
***
### Helpers
Located inside the _helpers_ folder at the _app_ root, these files can contain custom PHP functions that can be called directly from the Views, in order to keep these as clean as possible.