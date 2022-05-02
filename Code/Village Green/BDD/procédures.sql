
-- Procédure d'affichage du chiffre d'affaire annuel (donc calcul hors taxe)

DELIMITER |

CREATE PROCEDURE chiffre_annuel(annee)
BEGIN
    SELECT MONTH(com_date_facturation) AS mois, SUM(det_prix_ht * det_quantite) AS chiffre_d_affaire FROM commande
    JOIN detail ON commande.com_id = detail.com_id
    WHERE YEAR(com_date_facturation) = annee
    GROUP BY MONTH(com_date_facturation);
END |

DELIMITER ;

-- Procédure d'affichage du chiffre d'affaire d'un fournisseur (donc calcul hors taxe)

DELIMITER |

CREATE PROCEDURE chiffre_fournisseur(fournis)
BEGIN
    SELECT fou_nom AS nom_du_fournisseur, SUM(det_quantite)*art_prix_fournisseur_ht AS chiffre_d_affaire FROM fournisseur
    JOIN article ON article.fou_id = fournisseur.fou_id
    JOIN detail ON article.art_id = detail.art_id
    WHERE fou_nom = fournis;
END |

DELIMITER ;

-- TOP 10 des produits les plus commandés sur une année

DELIMITER |

CREATE PROCEDURE top_10_commandes(annee)
BEGIN
    SELECT article.art_id, art_nom, SUM(det_quantite), fou_nom FROM article
    JOIN detail ON article.art_id = detail.art_id
    JOIN fournisseur ON fournisseur.fou_id = produit.fou_id
    JOIN commande ON commande.com_id = detail.com_id
    WHERE YEAR(com_date) = annee
    GROUP BY article.art_id
    ORDER BY SUM(det_quantite) DESC
    LIMIT 10;
END |

DELIMITER ;

-- TOP 10 des produits les plus rentables sur une année

DELIMITER |

CREATE PROCEDURE top_10_rentables(annee)
BEGIN
    SELECT article.art_id, art_nom, SUM((det_prix_ht - art_prix_fournisseur_ttc * det_quantite)) AS marge, fou_nom FROM article
    JOIN detail ON article.art_id = detail.art_id
    JOIN fournisseur ON fournisseur.fou_id = produit.fou_id
    JOIN commande ON commande.com_id = detail.com_id
    WHERE YEAR(com_date) = annee
    GROUP BY article.article_id
    ORDER BY marge DESC
    LIMIT 10;
END |

DELIMITER ;

-- TOP 10 des clients en nombre d'achats sur une année

DELIMITER |

CREATE PROCEDURE top_10_clients_quantite(annee)
BEGIN
    SELECT uti_nom, SUM(det_quantite) FROM utilisateur
    JOIN commande ON utilisateur.uti_id = commande.uti_id
    JOIN detail on commande.com_id = detail.com_id
    WHERE YEAR(com_date) = annee
    GROUP BY uti_nom
    ORDER BY SUM(det_quantite) DESC
    LIMIT 10;
END |

DELIMITER ;

-- TOP 10 des clients en chiffre d'affaire (et non marge) sur une année

DELIMITER |

CREATE PROCEDURE top_10_clients_chiffre_affaire(annee)
BEGIN
    SELECT uti_nom, SUM(det_prix_ht) FROM utilisateur
    JOIN commande ON utilisateur.uti_id = commande.uti_id
    JOIN detail on commande.com_id = detail.com_id
    WHERE YEAR(com_date) = annee
    GROUP BY uti_nom
    ORDER BY SUM(prix_ht) DESC
    LIMIT 10;
END |

DELIMITER ;


-- Répartition du chiffre d'affaire par type de client

DELIMITER |

CREATE PROCEDURE chiffre_d_affaire_type()
BEGIN
    SELECT typ_nom, SUM(det_prix_ht) FROM type
    JOIN utilisateur ON type.typ_id = utilisateur.typ_id
    JOIN commande ON utilisateur.uti_id = commande.uti_id
    JOIN detail ON commande.com_id = detail.com_id
    GROUP BY typ_nom;
END |

DELIMITER ;


-- Nombre de commandes en cours de livraison

DELIMITER |

CREATE PROCEDURE commandes_en_livraison()
BEGIN
    SELECT sum(com_id) FROM commande
    WHERE com_date_envoi IS NOT NULL AND com_date_reception IS NULL;
END |

DELIMITER ;

-- Vérifier les commandes à expédier

DELIMITER |

CREATE PROCEDURE commandes_a_expedier()
BEGIN
    SELECT com_id, uti_nom, uti_prenom, uti_adresse, uti_code_postal, uti_commune, com_commentaire FROM commande
    JOIN utilisateur ON utilisateur.uti_id = commande.uti_id
    WHERE com_date_envoi IS NULL;
END |

DELIMITER ;
