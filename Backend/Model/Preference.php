<?php
class Preference extends Connexion
{

    function __construct()
    {
        parent::__construct();
    }

    public function getBDD()
    {
        $connexion = parent::getBDD();
        return $connexion;
    }

    // CRUD

    public function create($iduser, $gr, $rea, $ann)
    {
        $os = new Preference();
        if ($connexion = ($os->getBDD())) {
            if ($os->NoDoublons($iduser) == 1) {
                echo "dans doublons";
                $iduser = $connexion->quote($iduser);
                $requete = "INSERT INTO preference (id,id_user,genre,realisateur,annee) VALUES ('', $iduser,'$gr', '$rea','$ann')";
                $insertion = $connexion->exec($requete);
                return "1";
            } else {
                $os->update($iduser, $gr, $rea, $ann);
            }
        }
    }

    public function update($iduser, $genre, $realisateur, $anne)
    {
        $os = new Preference();
        if ($connexion = ($os->getBDD())) {
            if (!empty($genre)) {
                $msj = "UPDATE preference SET genre = '$genre' WHERE id_user ='$iduser'";
            }
            if (!empty($realisateur)) {
                $msj = "UPDATE preference SET genre = '$genre', realisateur='$realisateur' WHERE id_user ='$iduser'";
            }
            if (!empty($anne)) {
                $msj = "UPDATE preference SET genre = '$genre', realisateur='$realisateur', annee='$anne' WHERE id_user = $iduser";
            }
            $up = $connexion->query($msj);
        }
    }

    public function NoDoublons($iduser)
    {
        $os = new Preference();
        if ($connexion = ($os->getBDD())) {
            $recherche = "SELECT id_user FROM preference WHERE id_user=$iduser";
            $result = $connexion->query($recherche);
            $tab = $result->fetch();
            if(!empty($tab['id_user'])){
                if ($tab['id_user'] == $iduser) {
                    return 0;
                } else {
                    return 1;
                }
            }else{
                return 1;
            }
        }
    }
}
