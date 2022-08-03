# Blablafpa

Trajet : 
    Depart : 
    - soit Depart d'un trajet
    - soit index < Destination

    Destination : 
    - soit Destination d'un trajet
    - soit index > Depart

    Siege:
    - seulement si placeDemander < placeDisponible

Exemple Trajet : Rouen -> Amiens -> St Quentin ->Lille || placesMax 3

    - si 3 personne Rouen: (2 Amiens,1 Lille)
        reste 0 places :
            - place complet
    - arriver a Amiens:
        - reservation possible 2 places : Amiens -> St-Quentin -> Lille : 
            - 1 personne reserve Amiens -> St-Quentin
        reste 1 places :
            - 1 places non reservé
    - arriver a St-Quentin:
        - reservation possible 2places: St-Quentin -> Lille
            - 1 passager descend
            - 2 personne reserves : St-Quentin -> Lille
        reste 0 place :
            - complet
    - arriver a Lille :
        - Arriver destination