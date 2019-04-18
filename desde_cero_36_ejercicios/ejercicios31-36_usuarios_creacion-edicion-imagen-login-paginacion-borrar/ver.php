<?php include 'includes/redirect.php'; ?>
<?php require_once 'includes/header.php'; ?>
<?php
if(!isset($_GET["id"]) || empty($_GET["id"]) || !is_numeric($_GET["id"])){
	header("Location:index.php");
}

$id = $_GET["id"]; 
$usuario_query = mysqli_query($db, "SELECT * FROM usuarios WHERE usuario_id = {$id}");
$usuario = mysqli_fetch_assoc($usuario_query);

if(!isset($usuario["usuario_id"]) || empty($usuario["usuario_id"])){
	header("Location:index.php");
}
?>

<?php if($usuario["imagen"] != null){ ?>
<div class="col-lg-2">
		<img src="uploads/<?php echo $usuario["imagen"] ?>" width="150" height="150" /><br/>
</div>
<?php } ?>

<div class="col-lg-6">
	<h3><strong><?php echo $usuario["nombre"]." ".$usuario["apellido"]; ?></strong></h3>
	<p>Email: <?php echo $usuario["email"]; ?></p>
	<p>Biografia: <?php echo $usuario["bio"]; ?></p>
</div>
<div class="clearfix"></div>
<?php require_once './includes/footer.php'; ?>