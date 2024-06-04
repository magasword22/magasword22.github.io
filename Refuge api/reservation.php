<!DOCTYPE html>
<head>
  <title>Réservation de refuge</title>
</head>


<body>
 <h2> Formulaire de reservation de </h2><?php echo htmlspecialchars($_POST['nomRefuge']);?> 
  
  <form method="post" action="confirmation.php">
   <input type="hidden" name="refuge" value="<?php echo htmlspecialchars($_POST['nomRefuge']);?>">
    <br>
    <p>
      date de debut:
    </p>
    <input type="date" name="dateDebut" required>
    <br>
    <p>
      date de fin:
    </p>
    <input type="date" name="dateFin" required>
    <br>
    <p>
      prenom:
    </p>
    <input type="text" name="prenom" required>
    <br>
    <p>
      nom:
    </p>
    <input type="text" name="nom" required>
    <br>
    <p>
      adresse email:
    </p>
    <input type="email" pattern="+@+\.+" name="email" required>
    <br>
    <p>
      nombre de personnes:
    </p>
    <input type="number" name="nbPersonne" required>
    <br><br>
    
    <input type="submit" value="Confirmer la reservation">
  </form>
  
  
  
  
</body>

