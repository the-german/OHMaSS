<?php 
	$title = "Register";
	include_once 'header.php';
	require 'connect.php';
	session_start();

	if (isset($_SESSION['loginname'])) {
		$message = "Bienvenue <strong> ".$_SESSION['loginname']."</strong> <br>";
	}else{
		header('location:../');
	}
 ?>
	<body>
		<nav  id="header" class="navbar navbar-expand-sm bg-dark navbar-dark">
  			<p class="navbar-brand"><?php if (isset($message)) echo $message; ?></p>
  			<div id="button"><a href="logout.php"><button class="btn btn-success" type="submit">Logout</button></a></div>
		</nav>
		<div class="container">
			<form action="" method="post">
			  	<div class="form-row">
				    <div class="col-md-4 mb-3">
				      	<label for="code"> Code </label>
				     	<input type="text" class="form-control" id="code" name="code" placeholder="Code" required>
				    </div>
				    <div class="col-md-4 mb-3">
					    <label for="description"> Description </label>
					    <input type="text" class="form-control" name=" description" placeholder="Description" required>
				    </div>
				    <div class="col-md-4 mb-3">
				       <label for=""> Forme </label>
				       <select name="forme" class="custom-select">
				       	<option value="Solide" selected>Solide </option>
								<option value="Semi-Solide">Semi-Solide </option>
							<!-- <option value="Orales" selected>Orales</option>
							<option value="injectables">injectables </option>
							<option value="dermiques">dermiques </option>
							<option value="inhalées">inhalées</option>
							<option value="rectales">rectales </option> -->
						</select>
				    </div> 
			  	</div>

			  	<div class="form-row">
				    <div class="col-md-4 mb-3">
				      	<label for="">Nom Manufacture</label>
				      	<select name="nom_manufacture" class="custom-select">
				      			<?php 
										$reponse = $connection->query("SELECT * FROM manufacture");
										while ($donnees = $reponse->fetch())
										{
									 ?>
									 	<option value="<?php echo $donnees['nom_manufacture']; ?>"> <?php echo $donnees['nom_manufacture'];?></option>
									 <?php 
									 	}
									  ?>
				      		 ?>
				      	</select>
				    </div>
				    <div class="col-md-4 mb-3">
				      	<label for="adresse">Adresse</label>
				      	<input type="text" class="form-control" name="adresse" placeholder="Adresse" required>
				    </div>
				    <div class="col-md-4 mb-3">
				      	<label for="">Pays Origine Medicament</label>
				      		<select name="pays" class="custom-select">
						      	<?php 
										$reponse = $connection->query("SELECT * FROM pays");
										while ($donnees = $reponse->fetch())
										{
									 ?>
									 	<option value="<?php echo $donnees['en']; ?>"> <?php echo $donnees['en'];?></option>
									 <?php 
									 	}
									  ?>
									</select>
				    </div>
			  	</div>

			  	<div class="form-row">
				    <div class="col-md-4 mb-3">
				      	<label for="date_reception">Date d'expiration</label>
				      	<input type="date" class="form-control" name="date_expiration" placeholder="Date d'expiration" required>
				    </div>
				    <div class="col-md-4 mb-3">
				      	<label for="unite">Unite</label>
				      	<input type="number" class="form-control" name="unite" placeholder="Unite" required>
				    </div>
				    <div class="col-md-4 mb-3">
				      	<label for="pack_size">Pack Size</label>
				      	<input type="number" class="form-control" name="pack_size" placeholder="Pack Size" required>
				    </div>
			  	</div>

			  	<div class="form-row">
				    <div class="col-md-4 mb-3">
				      	<label for="total_medicament">Total Medicament</label>
				      	<input type="text" class="form-control" name="total_medicament"  value="" readonly>
				    </div>
				    <div class="col-md-4 mb-3">
				       	<label for="batch">Batch</label>
				       	<input type="text" class="form-control" name="batch" placeholder="Batch" required >
				    </div>
				    <div class="col-md-4 mb-3">
				       <label for=""> Status des médicament</label>
				       <select name="statut" class="custom-select">
							<option value="Expired" selected>Expired</option>
							<option value="Altere">Altere</option>
							<option value="Non-utilisable">Non-utilisable</option>
						</select>
				    </div> 
			  	</div>

			  	<div class="form-row">
				    <div class="col-md-4 mb-3">
				      	<label for="prix_unitaire">Drug price</label>
				      	
         				  <div class="input-group mb-2">
       							 <div class="input-group-prepend">
          							<div class="input-group-text">USD</div>
        							</div>
				  			    	<input type="number" step=0.01 class="form-control" name="prix_unitaire" placeholder="" required >
				  			  </div>
				    </div>
				    <div class="col-md-4 mb-3">
				      	<label for="prix_total">Prix Total</label>
				      	  <div class="input-group mb-2">
       							<div class="input-group-prepend">
          						<div class="input-group-text">USD</div>
        						</div>
				      			<input type="number"class="form-control" name="prix_total" required readonly>
				      	</div>
				    </div>
				    <div class="col-md-4 mb-3">
				      	<label for="poids_unitaire">Poids Unitaire</label>
				      	<div class="input-group mb-2">
       							<div class="input-group-prepend">
          						<div class="input-group-text">KG</div>
        						</div>
				      			<input type="number" step=0.01 class="form-control" name="poids_unitaire" placeholder="" required >
				      	</div>
				    </div>
			  	</div>

			  	<div class="form-row">
				    <div class="col-md-4 mb-3">
				      	<label for="prix_unitaire">Volume Unitaire</label>
				      	  <div class="input-group mb-2">
       							<div class="input-group-prepend">
          						<div class="input-group-text">M3</div>
        						</div>
				      			<input type="number" step=0.01 class="form-control" name="volume_unitaire" placeholder="" required>
				      		</div>
				    </div>
				    <div class="col-md-4 mb-3">
				      	<label for="prix_total">Volume Total</label>
				      	<div class="input-group mb-2">
       							<div class="input-group-prepend">
          						<div class="input-group-text">M3</div>
        						</div>
				      			<input type="number " step=0.01 class="form-control" name="volume_total" required readonly>
				      	</div>
				    </div>
				    <div class="col-md-4 mb-3">
				       <label for=""> Budget Holder</label>
				       <select  name="budget" class="custom-select">
							<option value="OHMaSS" selected>OHMaSS</option>
							<option value="PSM">PSM</option>
							<option value="UNDP">UNDP</option>
							<option value="SCMS">SCMS</option>
							<option value="Inconnu">Inconnu</option>
						</select>
				    </div>
			  	</div>

			  	<div class="form-row">
				  	<div class="col-md-4 mb-3">
					      	<label for="prix_total">Poids Total</label>
					      	<div class="input-group mb-2">
       							<div class="input-group-prepend">
          						<div class="input-group-text">KG</div>
        						</div>
					      		<input type="number" class="form-control" name="poids_total" required readonly value="<?php echo $_POST['poids_unitaire']?>">
					      	</div>
					    </div>

				  	<div class="col-md-4 mb-3">
					    <label for=""> Département </label>
				       <select name="departement" class="custom-select">
				       		<option value="Ouest" selected>Ouest</option>
				       		<option value="Nord">Nord</option>
				       		<option value="Nord Est">Nord Est</option>
				       		<option value="Nord ouest">Nord ouest</option>
				       		<option value="Centre">Centre</option>
				       		<option value="Artibonite">Artibonite</option>
				       		<option value="Sud">Sud</option>
				       		<option value="Sud Est">Sud Est</option>
				       		<option value="Nippes">Nippes</option>
				       		<option value="Grand Anse">Grand Anse</option>
								</select>	
					    </div>

					    	<div class="col-md-4 mb-3">
					      	<label for="commune">Commune</label>
					      	<input type="text" class="form-control" name="commune" required>
					    </div>
				  </div>

			  	<div class="form-row">
			  		<div class="col-md-4 mb-3">
				      	<label for="date_inventaire">Date d'Inventaire</label>
				      	<input type="date" class="form-control" name="date_inventaire" placeholder="Date d'Iventaire" required >
				    </div>
				    <div class="col-md-4 mb-3">
				       <label for=""> Site</label>
				       <select name="site" class="custom-select">
							<?php 
								$reponse = $connection->query("SELECT * FROM site");
								while ($donnees = $reponse->fetch())
								{
							 ?>
							 	<option value="<?php echo $donnees['nom_site']; ?>"> <?php echo $donnees['nom_site'];?></option>
							 <?php 
							 	}
							  ?>
						</select>
				    </div> 
				    <div class="col-md-4 mb-3">
				       <label for=""> Categorie </label>
				       <select name="categories" class="custom-select">
				       		<option value="ARV" selected>ARV</option>
				       		<option value="OI">OI</option>
				       		<option value="LAB">LAB</option>
				       		<option value="TB">TB</option>
				       		<option value="Malaria">Malaria</option>
				       		<option value="PF">PF</option>
							</select>
				    </div> 
				</div>

				<div class="form-row">
					<div class="col-md-4 mb-3">
				       <label for=""> Accompagnateur</label>
				       <select name="accomp" class="custom-select">
							<?php 
								$reponse = $connection->query("SELECT nom_acc,prenom_acc FROM accompagnateur");
								while ($donnees = $reponse->fetch())
								{
							 ?>
							 	<option value=" <?php echo $donnees['nom_acc'].' '.$donnees['prenom_acc']?>"> <?php echo $donnees['nom_acc'].' '.$donnees['prenom_acc']?></option>
							 <?php 
							 	}
							  ?>
						</select>
				    </div>
				    <div class="col-md-4 mb-3">
				       <label for=""> Chef d'Equipe</label>
				       <select name="chef_equipe" class="custom-select">
							<?php 
								$reponse = $connection->query("SELECT nom_chef_equipe,prenom_chef_equipe FROM chef_equipe");
								while ($donnees = $reponse->fetch())
								{
							 ?>
							 	<option value="<?php echo $donnees['nom_chef_equipe'].' '.$donnees['prenom_chef_equipe']?>"> <?php echo $donnees['nom_chef_equipe'].' '.$donnees['prenom_chef_equipe']?></option>
							 <?php 
							 	}
							  ?>
						</select>
				    </div> 
				    <div class="col-md-4 mb-3">
				       <label for=""> Reseau</label>
				       <select name="reseau" class="custom-select">
							<?php 
								$reponse = $connection->query("SELECT * FROM reseau");
								while ($donnees = $reponse->fetch())
								{
							 ?>
							 	<option value="<?php echo $donnees['nom_reseau']; ?>"> <?php echo $donnees['nom_reseau'];?></option>
							 <?php 
							 	}
							  ?>
						</select>
				    </div>  
				</div>

			  	<button class="btn btn-primary" type="submit" name="submit">Save</button>
			  	
			</form>
			<?php 
				if (isset($_POST['submit'])) {

					$code = $_POST['code'];
					$description = $_POST['description'];
					$forme = $_POST['forme'];
					$date_expiration = $_POST['date_expiration'];
					$unite = $_POST['unite'];
					$pack_size = $_POST['pack_size'];
					$total_medicament = $unite * $pack_size;
					$batch = $_POST['batch'];
					$statut = $_POST['statut'];
					$prix_unitaire = $_POST['prix_unitaire'];
					$prix_total = $prix_unitaire * $pack_size;
					$poids_unitaire = $_POST['poids_unitaire'];
					$volume_unitaire = $_POST['volume_unitaire'];
					$volume_total = $prix_unitaire * $pack_size;
					$date_inventaire = $_POST['date_inventaire'];
					$site = $_POST['site'];
					$categories = $_POST['categories'];
					$accomp = $_POST['accomp'];
					$chef_equipe = $_POST['chef_equipe'];
					$reseau = $_POST['reseau'];
					$budget = $_POST['budget'];
					$departement = $_POST['departement'];
					$commune = $_POST['commune'];
					$pays = $_POST['pays'];
					$manufacture = $_POST['nom_manufacture'];
					$adresse = $_POST['adresse'];
					$poids_total = $poids_unitaire * $pack_size;


				$query = "INSERT INTO medicament (med_code, med_desc,med_pays_origin,med_nom_manufacture,med_man_adresse, med_forme, exp_date, med_unit, med_pack_size, med_tot, med_batch, med_status,med_price_unit, med_price_tot, med_weight_unit, med_weight_tot, med_volume_unit, med_volume_tot, med_bud_holder, med_date_inventory, name_acc, name_categorie, name_chef_equipe, name_reseau, name_site,med_site_dep,med_site_com) VALUES ('".$code."','".$description."','".$pays."','".$manufacture."','".$adresse."','".$forme."','".$date_expiration."','".$unite."','".$pack_size."','".$total_medicament."','".$batch."','".$statut."','".$prix_unitaire."','".$prix_total."','".$poids_unitaire."','".$poids_total."','".$volume_unitaire."','".$volume_total."','".$budget."','".$date_inventaire."','".$accomp."','".$categories."','".$chef_equipe."','".$reseau."','".$site."','".$departement."','".$commune."')";

				$connection->exec($query);
   			}

			 ?>

		</div>
	</body>
	<br>
	<br>

	<?php 
		include_once 'footer.php';
	?>
</html>
