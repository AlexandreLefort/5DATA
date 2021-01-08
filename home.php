<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>SupDATA</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        
        
        <script src="js/jquery.min.js"></script>
        <script src="js/skel.min.js"></script>
        <script src="js/skel-layers.min.js"></script>
        <script src="js/init.js"></script>
        <noscript>
            <link rel="Pstylesheet" href="css/skel.css" />
            <link rel="stylesheet" href="css/style.css" />
            <link rel="stylesheet" href="css/style-xlarge.css" />
        </noscript>
    </head>
    <body class="landing">

        <!-- Header -->
            <header id="header">
                <h1><a href="home.php">SupDATA</a></h1>
                <nav id="nav">
                    <ul>
                        <li><a href="home.php">Accueil</a></li>
                        <li><a href="connect.php">Rechercher ou filtrer</a></li>
                    </ul>
                </nav>
            </header>

		<!-- Banner -->
			<section id="banner">
				<h2>Bienvenue chez Data Supinfo</h2>
				<ul class="actions">
					<li>
						<form method="post"> 
    <input type="submit" name="test" id="test" value="Voir la BD" /><br/> 
</form> 
                    </li>

				</ul>
			</section>

<?php 
include 'connect.php';

    if(array_key_exists('test',$_POST)){ 
    voirLaBd(); 
}
 ?>

	</body>
</html>