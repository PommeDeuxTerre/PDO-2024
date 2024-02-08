<?php

require_once "../config.php"; // constantes

function get_url($url, $getName, $page){
    if ($page!=1){
        $pattern = "/(?<=\?".$getName."=|\&".$getName."=)\d*(?=$|&)/";
        if (preg_match($pattern, $url))return preg_replace($pattern , $page, $url);
        else if (preg_match("/\?/", $url))return $url."&$getName=$page";
        else return $url."?$getName=$page";
    }
    if (preg_match("/&page=[^&^$]*/", $url))return preg_replace("/&page=[^&^$]*/", "", $url);
    else if (preg_match("/\?page=[^&^\$]*&/", $url))return preg_replace("/\?page=[^&^$]*&/", "?", $url);
    else return preg_replace("/\?page=[^&^$]*/", "", $url);
}

// fonction utilisateur de pagination au format texte
function PaginationModel(string $url, // url (pour garder les autres variables get)
                        string $getName, // le nom de notre variable get de pagination
                        int $nbTotalItem, // le nombre total d'item à afficher
                        int $currentPage=1,  // la page actuelle
                        int $nbByPage=10 // la nombre d'item par page
                        ): string|null 
{
    // pas d'item, pas de pagination
    if($nbTotalItem===0) return null;
    // création de la variable de sortie au format texte
    $sortie="";
    // on calcule le nombre de page en divisant le nombre
    // total d'item par le nombre d'item par page
    // le tout arrondit à l'entier supérieur ceil
    // et retourné en entier avec (int), ceil() retourne un float
    $nbPage = (int) ceil($nbTotalItem/$nbByPage);

    // si une seule page, pas de pagination
    if($nbPage<2) return null;

    // on commence par le bouton précédent
    if($currentPage===1){
        // pas de liens
        $sortie.= "<< <";
    }elseif ($currentPage===2) {
        // liens vers l'accueil sans duplicate content (./ = ./?pg=1)
        $sortie.= "<a href='".get_url($url, $getName, 1)."'><<</a> <a href='".get_url($url, $getName, 1)."'><</a>";
    }else{
        // liens vers l'accueil et la page précédente
        $sortie.= "<a href='".get_url($url, $getName, 1)."'><<</a> <a href='".get_url($url, $getName, $currentPage-1)."'><</a>";
    }

    // on boucle sur le nombre de pages
    for($i=1;$i<=$nbPage;$i++)
    {
        // si on est sur la page en cours, on affiche un texte
        if($i===$currentPage) $sortie.= " $i ";
        // sinon si on affiche la page 1, on évite le duplicate content
        else if($i===1) $sortie.= " <a href='".get_url($url, $getName, 1)."'>$i</a> ";
        // sinon on affiche un lien
        else $sortie.= " <a href='".get_url($url, $getName, $i)."'>$i</a> ";
    }

    // on termine par le bouton suivant, utilisation d'une ternaire pour remplacer un il et else
    $sortie.= $currentPage === $nbPage ? "> >>" : "<a href='".get_url($url, $getName, $currentPage+1)."'>></a> <a href='".get_url($url, $getName, $nbPage)."'>>></a>";

    return $sortie;
}
