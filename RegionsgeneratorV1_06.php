<!DOCTYPE html><html><head><meta charset="utf-8">

<!-- 
	OpenSim Regions Generator V1.05 by Manfred Aabye
	Benötigte Dateien für OpenSim Regions Generator V1.06
	w3.css
	uuid.clas.php
 -->

<link id="main" rel="stylesheet" href="http://www.w3schools.com/lib/w3.css" type="text/css" media="screen"/>

</head>
    <title>openSIMULATOR Regionsgenerator</title>
</head>

<body>


<div class="w3-container w3-blue-grey">
  <h1>openSIMULATOR Regionsgenerator</h1>
</div>



<?php if (!isset($_POST['etape'])): ?>

<form class="w3-container" action="" method="post">
    <input type="hidden" name="etape" value="1" />
	
 
	<div class="form-group">
    <label for="base" class="w3-label w3-text-red control-label">Regionsname :</b></label>
        <div class="col-sm-4">
            <input class="w3-input w3-border" type="text" placeholder="Welcome" name="osRegionsname" maxlength="40" />
        </div>
    </div>
 
	<div class="form-group">
    <label for="base" class="w3-label w3-text-red control-label">Lokalisation X :</b></label>
        <div class="col-sm-4">
            <input class="w3-input w3-border" type="text" placeholder="1100" name="osLocationx" maxlength="40" />
        </div>
    </div>

 	<div class="form-group">
    <label for="base" class="w3-label w3-text-red control-label">Lokalisation Y :</b></label>
        <div class="col-sm-4">
            <input class="w3-input w3-border" type="text" placeholder="1100" name="osLocationy" maxlength="40" />
        </div>
    </div>
	
 	<div class="form-group">
    <label for="base" class="w3-label w3-text-red control-label">Port :</b></label>
        <div class="col-sm-4">
            <input class="w3-input w3-border" type="text" placeholder="9100" name="osInternalPort" maxlength="40" />
        </div>
    </div>
 
 	<div class="form-group">
    <label for="base" class="w3-label w3-text-red control-label">Externe IP Adresse :</b></label>
        <div class="col-sm-4">
            <input class="w3-input w3-border" type="text" placeholder="SYSTEMIP" name="osExternalHostName" maxlength="40" />
        </div>
    </div>
	
 	<div class="form-group">
    <label for="base" class="w3-label w3-text-red control-label">Regionsgröße in Meter :</b></label>
        <div class="col-sm-4">
            <input class="w3-input w3-border" type="text" placeholder="512" name="osSize" maxlength="40" />
        </div>
    </div>
 
 	<div class="form-group">
    <label for="base" class="w3-label w3-text-red control-label">Landepunkt x,y,z :</b></label>
        <div class="col-sm-4">
            <input class="w3-input w3-border" type="text" placeholder="128,128,30" name="osDefaultLanding" maxlength="40" />
        </div>
    </div>

 	<div class="form-group">
    <label for="base" class="w3-label w3-text-red control-label">Prim Größe in Meter :</b></label>
        <div class="col-sm-4">
            <input class="w3-input w3-border" type="text" placeholder="1024" name="osNonPhysicalPrimMax" maxlength="40" />
        </div>
    </div>

 	<div class="form-group">
    <label for="base" class="w3-label w3-text-red control-label">Maximum an Prims :</b></label>
        <div class="col-sm-4">
            <input class="w3-input w3-border" type="text" placeholder="15000" name="osMaxPrims" maxlength="40" />
        </div>
    </div>

 	<div class="form-group">
    <label for="base" class="w3-label w3-text-red control-label">Maximum an Besucher :</b></label>
        <div class="col-sm-4">
            <input class="w3-input w3-border" type="text" placeholder="20" name="osMaxAgents" maxlength="40" />
        </div>
    </div> 

 	<div class="form-group">
    <label for="base" class="w3-label w3-text-red control-label">Besitzer Vorname :</b></label>
        <div class="col-sm-4">
            <input class="w3-input w3-border" type="text" placeholder="Test" name="osMasterAvatarFirstName" maxlength="40" />
        </div>
    </div> 
 
 	<div class="form-group">
    <label for="base" class="w3-label w3-text-red control-label">Besitzer Nachname :</b></label>
        <div class="col-sm-4">
            <input class="w3-input w3-border" type="text" placeholder="User" name="osMasterAvatarLastName" maxlength="40" />
        </div>
    </div> 
 
 	<div class="form-group">
    <label for="base" class="w3-label w3-text-red control-label">Max Prims Pro Benutzer (Unbegrenzt = -1) :</b></label>
        <div class="col-sm-4">
            <input class="w3-input w3-border" type="text" placeholder="-1" name="osMaxPrimsPerUser" maxlength="40" />
        </div>
    </div> 
	

<br>

<!-- Install Button -->
	
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button class="w3-btn-block w3-blue-grey" type="submit" name="submit" value="Installer">Erstellen</button>
        </div>
    </div>
	
</form>

<?php endif ?>
	
</div>

<!-- Keine ahnung -->

<?php if (isset($_POST['delete']))
{
    unlink('$osRegionsname'.'.ini');
    header('Location: ./');
}
?>
	


<?php
if (isset($_POST['etape']) AND $_POST['etape'] == 1)
{
    // eine Konstante erzeugen, die später verwendet wird
    define('RETOUR', '<input class="btn btn-primary" type="button" value="Return of form" onclick="history.back()">');

	// Die UUID Funktionen einbinden
	include "uuid.clas.php";
	
	$osRegionsname   = trim($_POST['osRegionsname']);
	
    $datei = './' . $osRegionsname . '.ini';

    if (file_exists($datei) AND filesize($datei ) > 0)
    {
        // wenn die Datei existiert und nicht leer ist, dann
        exit('<div class="alert alert-danger">Datei Existiert oder ist nicht leer.</div>'. RETOUR);
    }


    // wir schaffen unsere Variablen und alle Leerzeichen beiläufig entfernen	
	
	$osLocationx   = trim($_POST['osLocationx']);
	$osLocationy   = trim($_POST['osLocationy']);
    $osInternalPort  = trim($_POST['osInternalPort']);
    $osExternalHostName   = trim($_POST['osExternalHostName']);
    $osSize   = trim($_POST['osSize']);
	$osDefaultLanding   = trim($_POST['osDefaultLanding']);
	$osNonPhysicalPrimMax   = trim($_POST['osNonPhysicalPrimMax']);
	$osMaxPrims   = trim($_POST['osMaxPrims']);
	$osMaxAgents   = trim($_POST['osMaxAgents']);
	$osMasterAvatarFirstName   = trim($_POST['osMasterAvatarFirstName']);
	$osMasterAvatarLastName   = trim($_POST['osMasterAvatarLastName']);
	$osMaxPrimsPerUser   = trim($_POST['osMaxPrimsPerUser']);
	$osRegionsanzahlx   = trim($_POST['osRegionsanzahlx']);
	$osRegionsanzahly   = trim($_POST['osRegionsanzahly']);

	
	
	
    // der Text, der in der Regions.ini gesetzt wird
    $texte = '

; Datei '.$osRegionsname.'.ini erstellt mit dem Regions Generator v1.0

['.$osRegionsname.']

RegionUUID = '.$v4uuid.'

Location = '.$osLocationx.','.$osLocationy.'
InternalAddress = 0.0.0.0
InternalPort = '.$osInternalPort.'
AllowAlternatePorts = False
ExternalHostName = '.$osExternalHostName.'

SizeX = '.$osSize.'
SizeY = '.$osSize.'
SizeZ = '.$osSize.'

DefaultLanding = <'.$osDefaultLanding.'>

NonPhysicalPrimMax = '.$osNonPhysicalPrimMax.'
PhysicalPrimMax = 64
ClampPrimSize = False
MaxPrims = '.$osMaxPrims.'
MaxAgents = '.$osMaxAgents.'

MaxPrimsPerUser = '.$osMaxPrimsPerUser.'

MasterAvatarFirstName = '.$osMasterAvatarFirstName.'
MasterAvatarLastName = '.$osMasterAvatarLastName.'

; Ende '.$osRegionsname.'.ini

   ';

   
   
   
   
   
    if (!$offen = fopen($datei, 'w'))
    {
        exit('<div class="alert alert-danger">Öffnen fehlgeschlagen Datei : <strong>'. $datei .'</strong>, Installation corrupt. Create the file manually (' . $osRegionsname . '.ini) or change the permissions on the directory.</div>'. RETOUR);
    }

    if (fwrite($offen, $texte) == FALSE)
    {
        exit('<div class="alert alert-danger">Can not write to the file : <strong>'. $datei .'</strong>, installation corrupt. Create the file manually (' . $osRegionsname . '.ini) or change the permissions on the directory.</div>'. RETOUR);
    }

    echo '<div class="alert alert-success">Creation of effected configuration file with success ...</div>';
    fclose($offen);


    echo '<div class="alert alert-success">Installing the ' . $osRegionsname . '.ini of data effected with success...</div>';
    echo '<div class="alert alert-warning">Please delete the file <strong>' . $osRegionsname . '.ini</strong> of server ...</div>';
    echo '<form class="form-group" action="" method="post">';
    echo '<input type="hidden" name="delete" value="1" />';
    echo '<div class="form-group">';
    echo '<button class="btn btn-danger" type="submit" name="submit" >Delete file ' . $osRegionsname . '.ini</button>';
    echo '</div>';
    echo '</form>';
	
}

?>
<div class="clearfix"></div>

</div>
</body>
</html>	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	