<?php
session_start();
	require_once("../includes/modele.inc.php");
	$tabRes=array();
    $rep=array();
   // $tabRes="";
	function enregistrerUtil(){
		global $rep;	
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$courriel=$_POST['courriel'];
        $sexe=$_POST['sexe'];
		$num_util=$_POST['num_util'];
        $date_naiss=$_POST['date_naiss'];
        $motpasse=$_POST['motpasse'];
		$tel=$_POST['tel'];
        $adresse=$_POST['adresse'];
        $ville=$_POST['ville'];
		$pays=$_POST['pays'];
        $categorie=$_POST['categorie'];
        $id_ville = 0;
        $id_adresse = 0;
        $id_util = 0;
        
		
		$rep['action']="enregistrerUtil";
       // $chaine = $nom."--".$prenom."--".$courriel."--".$sexe."--".$num_util."--".$date_naiss."--".$motpasse."--".$tel."--".$adresse."--".$ville."--".$pays."--".$categorie;
       // $rep['rep']=$chaine;
		$requete="SELECT id FROM Ville WHERE nom_ville=? AND pays=?";
		try{
			 $unModele=new requestsModele($requete,array($ville, $pays));
			 $stmt=$unModele->executer();
			 if($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			    $id_ville=$ligne->id;   

			}
			else{
                
                try{
                   // $unModele=new requestsModele();
                    $requete="INSERT INTO Ville VALUES(0,?,?)";
                    $unModele=new requestsModele($requete,array($ville,$pays));
                    $stmt=$unModele->executer();

                //
                    $requete="SELECT id FROM Ville WHERE nom_ville=? AND pays=?";

                     $unModele=new requestsModele($requete,array($ville, $pays));
                     $stmt=$unModele->executer();
                     if($ligne=$stmt->fetch(PDO::FETCH_OBJ))
                         $id_ville=$ligne->id; 
                }catch(Exception $e){
                }finally{
                    unset($unModele);
                }
			}
		}catch(Exception $e){
		}finally{
                
            $requete="INSERT INTO Adresse VALUES(0,?,?)";  
            try{
                
                $unModele=new requestsModele($requete,array($id_ville,$adresse));
                $stmt=$unModele->executer();
                //$tabRes['msg']="Vile bien enregistrée";
            }catch(Exception $e){
            }finally{
                unset($unModele);
            }
                
                
            $requete="SELECT id FROM Adresse WHERE id_ville=? AND adresse=?";
            try{
                 $unModele=new requestsModele($requete,array($id_ville,$adresse));
                 $stmt=$unModele->executer();
                 if($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
                    $id_adresse=$ligne->id; 
                 }
            }catch(Exception $e){
            }finally{
                unset($unModele);
            }

            
            $requete="INSERT INTO Utilisateur VALUES(0,?,?,?,?,?,?,?)";   
            try{
               // $pochete=$unModele->verserFichier("nom", "prenom","courriel", "num_util","sex", "tel", $id_adresse, $id_cat); //"pochette",  "avatar.jpg",$titre
                $unModele=new requestsModele($requete,array($nom,$prenom,$num_util,$sexe,$date_naiss,$tel,$id_adresse));
                $stmt=$unModele->executer();
            }catch(Exception $e){
            }finally{
                unset($unModele);
            }
                
                
            $requete="SELECT id FROM Utilisateur WHERE nom=? AND prenom=? AND date_naiss=?";
            try{
                 $unModele=new requestsModele($requete,array($nom,$prenom,$date_naiss));
                 $stmt=$unModele->executer();
                 if($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
                    $id_util=$ligne->id; 
                 }
            }catch(Exception $e){
            }finally{
                unset($unModele);
            }
                  
            $requete="INSERT INTO Connexion VALUES(0,?,?,?,?)";    
            try{
               // $pochete=$unModele->verserFichier("nom", "prenom","courriel", "num_util","sex", "tel", $id_adresse, $id_cat); //"pochette",  "avatar.jpg",$titre
                $unModele=new requestsModele($requete,array($id_util,$categorie,$motpasse,$courriel));
                $stmt=$unModele->executer();
                $rep['rep']="Utilisateur bien enregistre";
            }catch(Exception $e){
            }finally{
                unset($unModele);
            }
                
		}  

	}
	

function enregistrerUtil2(){
		global $rep;	
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$courriel=$_POST['courriel'];
        $sexe=$_POST['sexe'];
		$num_util=$_POST['num_util'];
        $id_util=$_POST['id_util'];
        $date_naiss=$_POST['date_naiss'];
        //$motpasse=$_POST['motpasse'];
		$tel=$_POST['tel'];
        $adresse=$_POST['adresse'];
        $ville=$_POST['ville'];
		$pays=$_POST['pays'];
        $categorie=$_POST['categorie'];
        $id_ville = 0;
        $id_adresse = 0;
        //$id_util = 2;
        $id_connexion=0;
		
		$rep['action']="enregistrerUtil2";
       // $chaine = $nom."--".$prenom."--".$courriel."--".$sexe."--".$num_util."--".$date_naiss."--".$motpasse."--".$tel."--".$adresse."--".$ville."--".$pays."--".$categorie;
       // $rep['rep']=$chaine;
		$requete="SELECT id_adresse FROM Utilisateur WHERE id=?";
		try{
			 $unModele=new requestsModele($requete,array($id_util));
			 $stmt=$unModele->executer();
			 if($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			    $id_adresse=$ligne->id_adresse;   

			}
			
            
            $requete="UPDATE Adresse SET  adresse=? WHERE id=?"; 
            try{
                
                $unModele=new requestsModele($requete,array($adresse,$id_adresse));
                $stmt=$unModele->executer();
                //$tabRes['msg']="Vile bien enregistrée";
            }catch(Exception $e){
            }finally{
                unset($unModele);
            }
            
            $requete="SELECT id_ville FROM Adresse WHERE id=?";
            try{
                 $unModele=new requestsModele($requete,array($id_adresse));
                 $stmt=$unModele->executer();
                 if($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
                    $id_ville=$ligne->id_ville; 
                 }
            }catch(Exception $e){
            }finally{
                unset($unModele);
            }
                
            try{
               // $unModele=new requestsModele();
                $requete="UPDATE Ville SET nom_ville=?, pays=? WHERE id=?";
                $unModele=new requestsModele($requete,array($ville,$pays,$id_ville));
                $stmt=$unModele->executer();
 
            }catch(Exception $e){
            }finally{
                unset($unModele);
            }
			
                
                
          /*  $requete="SELECT id FROM Adresse WHERE id_ville=? AND adresse=?";
            try{
                 $unModele=new requestsModele($requete,array($id_ville,$adresse));
                 $stmt=$unModele->executer();
                 if($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
                    $id_adresse=$ligne->id; 
                 }
            }catch(Exception $e){
            }finally{
                unset($unModele);
            }

            
            $requete="UPDATE Adresse SET  adresse=? WHERE id=?"; 
            try{
                
                $unModele=new requestsModele($requete,array($adresse,$id_adresse));
                $stmt=$unModele->executer();
                //$tabRes['msg']="Vile bien enregistrée";
            }catch(Exception $e){
            }finally{
                unset($unModele);
            }*/
            
            $requete="UPDATE Utilisateur SET nom=?, prenom=?, num_util=?, sexe=?, date_naiss=?, tel=? WHERE id=?";  
            try{
               // $pochete=$unModele->verserFichier("nom", "prenom","courriel", "num_util","sex", "tel", $id_adresse, $id_cat); //"pochette",  "avatar.jpg",$titre
                $unModele=new requestsModele($requete,array($nom,$prenom,$num_util,$sexe,$date_naiss,$tel,$id_util));
                $stmt=$unModele->executer();
            }catch(Exception $e){
            }finally{
                unset($unModele);
            }
                
                
            $requete="SELECT id FROM Connexion WHERE id_util=?";
            try{
                 $unModele=new requestsModele($requete,array($id_util));
                 $stmt=$unModele->executer();
                 if($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
                    $id_connexion=$ligne->id; 
                 }
            }catch(Exception $e){
            }finally{
                unset($unModele);
            }
                  
            $requete="UPDATE Connexion SET categorie=?, courriel=? WHERE id=?";    
            try{
               // $pochete=$unModele->verserFichier("nom", "prenom","courriel", "num_util","sex", "tel", $id_adresse, $id_cat); //"pochette",  "avatar.jpg",$titre
                $unModele=new requestsModele($requete,array($categorie,$courriel,$id_connexion));
                $stmt=$unModele->executer();
                $rep['rep']="Utilisateur bien enregistre";
            }catch(Exception $e){
            }finally{
                unset($unModele);
            }
                
		}catch(Exception $e){
		}

	}

                
    function connexion(){
		global $rep;
        $courriel=$_POST['courriel'];
		$motpasse=$_POST['motpasse'];
        $cat ="";
        $idClient = 0;
		$rep['action']="connexion";
		$requete="SELECT * FROM Connexion WHERE courriel =? AND motdepasse =?";
		try{
			 $unModele=new requestsModele($requete,array($courriel, $motpasse));
			 $stmt=$unModele->executer();
			 
             if($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
                 $id_util=$ligne->id_util;
                 $_SESSION['id_util']=$id_util;
                $rep['categorie']=$ligne->categorie;
                 $rep['id_util']=$ligne->id_util;
             }else{
                 $rep['categorie']="Courrielle ou mot de passe incorrect";
             }
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}

    function profilUtil(){
		global $rep;
		$id_util=$_SESSION['id_util'];
		$rep['action']="profilUtil";
        $rep['id_util']=$id_util;
		$requete="SELECT * FROM Utilisateur WHERE id=?";
		try{
			 $unModele=new requestsModele($requete,array($id_util));
			 $stmt=$unModele->executer();
			 $rep['util']=array();
			 if($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			    $rep['util'][]=$ligne;
                 $id_adresse=$ligne->id_adresse;
                 
                $requete="SELECT * FROM Connexion WHERE id=?";
                try{
                     $unModele=new requestsModele($requete,array($id_util));
                     $stmt=$unModele->executer();
                     $rep['connexion_util']=array();
                     if($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
                        $rep['connexionUtil'][]=$ligne;
                        $rep['OK']=true;  
                    }
                    else{
                        $rep['OK']=false;
                    }
                }catch(Exception $e){
                }
                 
                $id_ville=0;
                $requete="SELECT Adresse.id_ville, Adresse.adresse FROM Utilisateur inner join Adresse on Utilisateur.id_adresse = Adresse.id WHERE Utilisateur.id_adresse=?";
                try{
                     $unModele=new requestsModele($requete,array($id_util));
                     $stmt=$unModele->executer();
                    // $rep['connexion_util']=array();
                     if($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
                         $id_ville = $ligne->id_ville;
                        $rep['adresseUtil']=$ligne->adresse; 
                    }
                    else{
                        $rep['OK']=false;
                    }
                }catch(Exception $e){
                }
                
                $requete="SELECT nom_ville, pays FROM Ville  WHERE id=?";
                try{
                     $unModele=new requestsModele($requete,array($id_ville));
                     $stmt=$unModele->executer();
                     if($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
                        $rep['villeUtil']=$ligne->nom_ville; 
                         $rep['paysUtil']=$ligne->pays; 
                    }
                    else{
                        $rep['OK']=false;
                    }
                }catch(Exception $e){
                }
  
			}
			else{
				$rep['OK']=false;
			}
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	function lister(){
		global $tabRes;
		$tabRes['action']="lister";
		$requete="SELECT * FROM films";
		try{
			 $unModele=new requestsModele($requete,array());
			 $stmt=$unModele->executer();
			 $tabRes['listeFilms']=array();
			 while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			    $tabRes['listeFilms'][]=$ligne;
			}
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	
	function enlever(){
		global $tabRes;	
		$idf=$_POST['numE'];
		try{
			$requete="SELECT * FROM films WHERE idf=?";
			$unModele=new requestsModele($requete,array($idf));
			$stmt=$unModele->executer();
			if($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
				$unModele->enleverFichier("pochettes",$ligne->pochette);
				$requete="DELETE FROM films WHERE idf=?";
				$unModele=new requestsModele($requete,array($idf));
				$stmt=$unModele->executer();
				$tabRes['action']="enlever";
				$tabRes['msg']="Film ".$idf." bien enleve";
			}
			else{
				$tabRes['action']="enlever";
				$tabRes['msg']="Film ".$idf." introuvable";
			}
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	
	function fiche(){
		global $tabRes;
		$idf=$_POST['numF'];
		$tabRes['action']="fiche";
		$requete="SELECT * FROM films WHERE idf=?";
		try{
			 $unModele=new requestsModele($requete,array($idf));
			 $stmt=$unModele->executer();
			 $tabRes['fiche']=array();
			 if($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			    $tabRes['fiche']=$ligne;
				$tabRes['OK']=true;
			}
			else{
				$tabRes['OK']=false;
			}
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	
	function modifier(){
		global $tabRes;	
		$titre=$_POST['titreF'];
		$duree=$_POST['dureeF'];
		$res=$_POST['resF'];
		$idf=$_POST['idf']; 
		try{
			//Recuperer ancienne pochette
			$requette="SELECT pochette FROM films WHERE idf=?";
			$unModele=new requestsModele($requette,array($idf));
			$stmt=$unModele->executer();
			$ligne=$stmt->fetch(PDO::FETCH_OBJ);
			$anciennePochette=$ligne->pochette;
			$pochette=$unModele->verserFichier("pochettes", "pochette",$anciennePochette,$titre);	
			
			$requete="UPDATE films SET titre=?,duree=?, res=?, pochette=? WHERE idf=?";
			$unModele=new requestsModele($requete,array($titre,$duree,$res,$pochette,$idf));
			$stmt=$unModele->executer();
			$tabRes['action']="modifier";
			$tabRes['msg']="Film $idf bien modifie";
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	//******************************************************
	//Contrôleur
    //$tabRes['action'] = "C'est fait"
   // $rep=array();
   // $rep['act']="enregistrerUtil";
   // $rep['rep']="C'est fait";
	$action=$_POST['action'];
	switch($action){
		case "enregistrerUtil" :
			enregistrerUtil();
            //echo json_encode($rep);
		break;
        case "enregistrerUtil2" :
			enregistrerUtil2();
            //echo json_encode($rep);
		break;
		case "connexion" :
			connexion();
		break;
		case "enlever" :
			enlever();
		break;
        case "profilUtil" :
			profilUtil();
		break;
		case "fiche" :
			fiche();
		break;
		case "modifier" :
			modifier();
		break;
	}
    echo json_encode($rep);
?>