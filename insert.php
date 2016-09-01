<?php

require_once('MagicParser.php');

global $pdo, $i, $j;

$pdo = new PDO('mysql:host=localhost; dbname=test; charset=UTF8', 'root', '');
$i = 0;
$j = 0;

MagicParser_parse('catalogue.XML', 'insertRow');

echo 'Sur un total de <b>'.$j.'</b> lignes, <b>'.$i.'</b> on été importée.<br />';
dump('hf_document');

function insertRow($row)
{
    global $pdo, $i, $j;
    
    $j++;
    
    $produit_pocleunik = intval($row['PRODUIT_POCLEUNIK']);
    $refciale_arcleunik = intval($row['REFCIALE_ARCLEUNIK']);
    $refciale_ctva = intval($row['REFCIALE_CTVA']);
    $refciale_ficheina = intval($row['REFCIALE_FICHEINA']);
    $article_poids = floatval(str_replace(',', '.', $row['ARTICLE_POIDS']));
    $article_hnormel = intval($row['ARTICLE_HNORMEL']);
    $article_categ = intval($row['ARTICLE_CATEG']);
    $refciale_modte = $row['REFCIALE_MODTE'];
    $produit_modte = $row['PRODUIT_MODTE'];
    $produit_ref = $row['PRODUIT_REF'];
    $refciale_refcat = $row['REFCIALE_REFCAT'];
    $potrad_desi = $row['POTRAD_DESI'];
    $produit_marque = $row['PRODUIT_MARQUE'];
    $produit_clep01 = $row['PRODUIT_CLEP01'];
    $produit_clep02 = $row['PRODUIT_CLEP02'];
    $produit_clep03 = $row['PRODUIT_CLEP03'];
    $produit_clep04 = $row['PRODUIT_CLEP04'];
    $produit_clep06 = $row['PRODUIT_CLEP06'];
    $produit_clep07 = $row['PRODUIT_CLEP07'];
    $produit_gcoloris = $row['PRODUIT_GCOLORIS'];
    $produit_gtaille = $row['PRODUIT_GTAILLE'];
    $produit_clep12 = $row['PRODUIT_CLEP12'];
    $fictech_memocat = $row['FICTECH_MEMOCAT'];
    $fictech_memonet = $row['FICTECH_MEMONET'];
    
    $query = $pdo->prepare('INSERT INTO `hf_document`'
        . 'VALUES(null, ?, ?, ?, ?, ?, ?, ?, ?, ?,'
        . '?, ?, ?, ?, ?, ?, ?, ?, ?, ?,'
        . '? ,?, ?, ? ,?)');
    $query->bindParam(1, $produit_pocleunik, PDO::PARAM_INT);
    $query->bindParam(2, $refciale_arcleunik, PDO::PARAM_INT);
    $query->bindParam(3, $refciale_ctva, PDO::PARAM_INT);
    $query->bindParam(4, $refciale_ficheina, PDO::PARAM_INT);
    $query->bindParam(5, $article_poids);
    $query->bindParam(6, $article_hnormel, PDO::PARAM_INT);
    $query->bindParam(7, $article_categ, PDO::PARAM_INT);
    $query->bindParam(8, $refciale_modte);
    $query->bindParam(9, $produit_modte);
    $query->bindParam(10, $produit_ref);
    $query->bindParam(11, $refciale_refcat);
    $query->bindParam(12, $potrad_desi);
    $query->bindParam(13, $produit_marque);
    $query->bindParam(14, $produit_clep01);
    $query->bindParam(15, $produit_clep02);
    $query->bindParam(16, $produit_clep03);
    $query->bindParam(17, $produit_clep04);
    $query->bindParam(18, $produit_clep06);
    $query->bindParam(19, $produit_clep07);
    $query->bindParam(20, $produit_gcoloris);
    $query->bindParam(21, $produit_gtaille);
    $query->bindParam(22, $produit_clep12);
    $query->bindParam(23, $fictech_memocat);
    $query->bindParam(24, $fictech_memonet);
    
    if ($query->execute()){
        $i++;
    }
}

function dump($table)
{
    global $pdo;
    
    $queryName = array();
    $i = 0;
    
    $comments =  "-- ----------------------------- --\n";
    $comments .= "-- -- Content of $table ----\n";
    $comments .= "-- Generate with insert.php file --\n";
    $comments .= "-- ----------------------------- --\n";
    
    $query = $pdo->prepare('SELECT * FROM `'.$table.'`');
    if ($query->execute()) {
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        
        for ($i = 0; $i < count($result); $i++) {
            $values = '';
            $keys = '';
            
            foreach ($result[$i] as $key => $val) {
                $values .= '"'.$val.'", ';
                $keys .= '`'.$key.'`, ';
            }
            
            $queryName[] = 'INSERT INTO `'.$table.'` ('
                .substr($keys, 0, -2).') VALUES('.substr($values, 0, -2).');';
        }

        $content = $comments.implode("\n", $queryName);
        file_put_contents('dump.sql', $content);
        
        echo 'Vous poucez retrouver un dump de la table <b>'
            .$table.'</b> dans le fichier <b>dump.sql</b>, il est '
            . 'directement importable dans MySQL.';
    } else {
        echo 'Une erreur est survenue : '.$query->errorInfo();
    }
}
