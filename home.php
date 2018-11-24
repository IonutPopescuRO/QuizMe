<?php
session_start();
require_once 'class.user.php';
$database = new USER();

if(!$database->is_logged_in())
	$database->redirect('index.php');

$stmt = $database->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$user_info = $stmt->fetch(PDO::FETCH_ASSOC);

include "include/functions/basic.php";
include "include/functions/language.php";
?>
<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title><?php print $site_title; ?></title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
    </head>
    
    <body class="paper-main">
		

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="home.php"><?php print $site_title; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active" style="margin-right: 10px;">
                <a class="nav-link" href="home.php"><?php print $lang['home']; ?> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="margin-right: 10px;" href="history.php"><?php print $lang['history']; ?></a>
            </li>
            <li class="nav-item dropdown" style="margin-right: 10px;">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<?php print $lang['buy_credits']; ?>
        </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="pp.php">PayPal</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="paysafe.php">PaySafe/Card</a>
                </div>
            </li>
            <li class="nav-item dropdown" style="margin-right: 10px;">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<?php if($language_code=='ro') print 'Română'; else print 'English'; ?>
        </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="home.php?lang=en">English</a>
                    <a class="dropdown-item" href="home.php?lang=ro">Română</a>
                </div>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item dropdown dropleft">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $user_info['userName']; ?> <i class="caret"></i>
        </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <span class="dropdown-item"><?php print $lang['funds'].': '.$user_info['funds']; ?> &euro;</span>
                    <div class="dropdown-divider"></div>
                    <span class="dropdown-item"><?php echo $user_info['userEmail']; ?></span>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<main role="main" class="container">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Categories<?php if($user_info['admin']) print '<a class="float-right" data-toggle="collapse" href="#addCategory" role="button" aria-expanded="false" aria-controls="addCategory">+ Adaugă categorie</a>'; ?></h6>
        <?php if($user_info['admin']) {
			if(isset($_GET['delete']))
				deleteCategory($_GET['delete']);
			
			if(isset($_POST['name']))
				addCategory($_POST['name'], $_POST['minidescription'], $_POST['description'], $_POST['price'], $_POST['img']);
		?>
		<div class="collapse" id="addCategory"><br>
			<div class="card card-body">
				<form action="" method="post">
					<div class="form-group">
						<label for="exampleFormControlInput1">Denumire categorie</label>
						<input type="text" class="form-control" name="name" placeholder="Nume...">
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">Preț per cont (euro)</label>
						<input type="number" class="form-control" name="price" placeholder="10" required>
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">URL imagine</label>
						<input type="text" class="form-control" name="img" placeholder="https://...">
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Mini-descriere (ce apare pe prima pagină)</label>
						<textarea class="form-control" id="exampleFormControlTextarea1" name="minidescription" rows="2"></textarea>
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Descriere</label>
						<textarea name="description" id="editor" rows="10"></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Adaugă</button>
					</div>
				</form>
			</div>
		</div>
		<?php }
			$categories = array();
			$categories = getCategories();
		?>
		<br>
		<?php
			$i=1;
			foreach($categories as $category) {
				if($i==1)
					print '<div class="card-deck" style="margin-bottom: 15px;">';
		?>
		<div class="card card2">
			<a href="item.php?id=<?php print $category['id']; ?>"><img class="card-img-top" src="<?php print $category['img']; ?>" alt="<?php print $category['name']; ?>"></a>
			<div class="card-body"><a href="item.php?id=<?php print $category['id']; ?>">
				<h5 class="card-title"><?php print $category['name']; ?></h5>
				<p class="card-text"><?php print $category['minidescription']; ?></p></a>
			</div>
			<div class="card-footer">
				<small class="text-muted"><a href="item.php?id=<?php print $category['id']; ?>"><?php print countAccountsCategory($category['id']).' '.$lang['available_accounts']; ?></a></small>
				<?php if($user_info['admin']) { ?>
				<div class="float-right">
					<a href="item.php?id=<?php print $category['id']; ?>"><i class="fas fa-pencil-alt"></i></a> 
					<a href="home.php?delete=<?php print $category['id']; ?>" onclick="return confirm('Ești sigur bă???');"><i style="color:red;" class="far fa-trash-alt" aria-hidden="true"></i></a>
				</div>
				<?php } ?>
			</div>
		</div>
		<?php
			if($i==3)
			{
				print '</div>';
				$i=0;
			}
			$i++;
			} if($i!=1) print '</div>'; ?>
		
        <small class="d-block text-right mt-3">
			<a href="home.php"><?php print countAccounts().' '.$lang['available_accounts']; ?></a>
        </small>
    </div>
</main>
        <!--/.fluid-container-->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<?php if($user_info['admin']) { ?>
		<script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
		<script>
			ClassicEditor
				.create( document.querySelector( '#editor' ) )
				.catch( error => {
					console.error( error );
				} );
		</script>
		<?php } ?>
    </body>

</html>