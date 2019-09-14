<?php
require './vendor/autoload.php';

use GuzzleHttp\Client;
$client = new GuzzleHttp\Client(["base_uri"=>"https://api.github.com"]);

$page= (isset($_GET["p"])) ? $_GET["p"] : 1;
$reponse=$client->request('GET', '/search/users?q="mexico"&page='.$page.'&per_page=12');

$contents = $reponse->getBody()->getContents();
$github_users = json_decode($contents, TRUE);
?>

<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css

">
</head>
<body>
    <div align="center">
    <h1><u>cURL</u> api Github:</h1>
    <h2>Perfiles mencionando México</h2>
    <button class="btn-primary" onclick="javascript:location.href='index.php?p=<?php echo (isset($_GET['p'])) ? $_GET['p']-1 : 1 ; ?>';">Anterior</button>    
    <button class="btn-primary" onclick="javascript:location.href='index.php?p=<?php echo (isset($_GET['p'])) ? $_GET['p']+1 : 2 ; ?>';">Siguiente</button> 
    <div class="table-responsive">
    <table class="table">
    <thead>
    <tr>
    <th><b>Usuario</b></th>
    <th><b>Avatar</b></th>
    <th><b>Score</b></th>
    <th><b>Tipo</b></th>
    <th><b>URL</b></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($github_users["items"] as $usuario) { ?>
    <tr>
    <td><h3><?php echo $usuario["login"]; ?><h3></td>
    <td><img width="200" src="<?php echo $usuario["avatar_url"]; ?>" /></td>
    <td><h5><?php echo number_format($usuario["score"],2); ?></h5></td>
    <td><?php echo $usuario["type"]; ?></td>
    <td><a href="<?php echo $usuario["html_url"]; ?>" target="_blank">Abrir</a></td>
    </tr>
    <?php } ?>
    </tbody>
    </table>
    </div>
    <button class="btn-primary" onclick="javascript:location.href='index.php?p=<?php echo (isset($_GET['p'])) ? $_GET['p']-1 : 1 ; ?>';">Anterior</button>    
    <button class="btn-primary" onclick="javascript:location.href='index.php?p=<?php echo (isset($_GET['p'])) ? $_GET['p']+1 : 2 ; ?>';">Siguiente</button> 
    </div>
</body>
</html>