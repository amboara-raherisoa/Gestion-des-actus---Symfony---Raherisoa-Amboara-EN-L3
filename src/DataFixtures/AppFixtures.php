<?php

namespace App\DataFixtures;

use App\Entity\Actu;
use App\Entity\Redacteur;
use App\Entity\Rubrique;
use DateTime;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        // Rubriques
        $rubriques = [];
        $intitules = ['Politique', 'Economie', 'Société', 'Sport', 'Culture'];

        foreach ($intitules as $value) {
            $rubrique = new Rubrique();
            $rubrique->setIntitule($value);

            $manager->persist($rubrique);
            $rubriques[] = $rubrique;
        }

        // Rédacteurs
        $redacteurs = [];
        $noms = ['Rija R.', 'Antsa R.', 'Clément Rabary', 'T.H'];

        foreach ($noms as $value) {
            $redacteur = new Redacteur();
            $redacteur->setNom($value);

            $manager->persist($redacteur);
            $redacteurs[] = $redacteur;
        }

        // Actus
        $themes = [
            "Conseil des ministres",
            "Concours ABH",
            "Tennis - Championnats d’Afrique U14",
            "Ministère de la Jeunesse et des Sports"
        ];
        $titres = [
            "Andry Andriatongarivo limogé",
            "1,5 million de dollars pour les 10 meilleurs entrepreneurs",
            "Les Malgaches font sensation !",
            "Tinoka Roberto place les Jeux des Iles à domicile comme priorité"
        ];
        $descris = [
            "Fin de parcours pour ce membre du parti Freedom au niveau du ministère de l’Energie et des Hydrocarbures.",
            "Madagascar était représenté dans le top 50 du concours ABH (Africa’s Business Heroes) de 2021. Pour cette édition 2022, les organisateurs représentant la Fondation Jack Ma ont de nouveau fait appel aux jeunes startupers de la Grande île, pour concourir.",
            "Les Égyptiens ont été pris de court par la ténacité et le professionnalisme des Malgaches aux championnats d’Afrique de tennis des moins de 14 ans.",
            "L’organisation des Jeux des Iles de l’Océan Indien à domicile en 2023 et l’accentuation des actions en faveur des jeunes seront les priorités du ministère de la Jeunesse et des Sports."
        ];
        $contenus = [
            "Andry Andriatongarivo a formé le trio de tête du ministère de l’Energie et des Hydrocarbures aux côtés du ministre Andry Ramaroson et de son directeur de cabinet Odon Marius Randrianaina. Ils se distinguent de leurs collègues des autres ministères par leur présence régulière sur les réseaux sociaux. Mais le parcours de ce conseiller auprès du ministère de la Défense nationale au département de l’énergie prend fin. Sa nomination a été abrogée, hier, en conseil des ministres. Une décision en haut lieu qui a déjà été lue à travers l’annonce de l’intéressé sur les réseaux sociaux. Hier, un post de Andry Andriatongarivo sur le réseau social Facebook a annoncé son départ de ce département. \"J’ai déjà partagé avec le président de la République mon souhait de quitter mon poste de secrétaire général du ministère de l’Energie et des Hydrocarbures\" a-t-il affirmé.",
            "Les candidatures sont ouvertes depuis hier, pour la participation à l’édition 2022 du concours ABH. Désormais, les entrepreneurs des 54 pays africains, quel que soit leur secteur, âge ou sexe, peuvent déposer leur candidature, en anglais ou en français, sur AfricaBusinessHeroes.org, pour avoir une chance de figurer parmi les 10 finalistes. Pour cette fois, le slogan officiel du concours est « l’heure de l’Afrique a sonné », dans l’optique de faire appel à l’action à tous les talentueux entrepreneurs africains qui remettent en question les stéréotypes associés à « l’heure africaine » – créant un impact à l’échelle locale et bâtissant un avenir meilleur et plus inclusif à travers leurs entreprises. « Les candidatures sont ouvertes pour la quatrième édition du concours. ABH offre chaque année à 10 entrepreneurs exceptionnels des quatre coins de l’Afrique une part de la cagnotte totale s’élevant à 1,5 million de dollars », ont communiqué les organisateurs de l’ABH, qui figure parmi les programmes philanthropiques phares de la Fondation Jack Ma mettant sous les feux des projecteurs et célébrant les talents entrepreneuriaux africains.",
            "C’était lors du premier tour du double quand la paire malgache composée de Nicolas Faye et Mirija Andriantefihasina, a battu les Egyptiens, Eyan Rede et Yassin Ahmad, qui sont pourtant le numéro Un de ce sommet africain. Devant leur public, les deux Egyptiens ont été surpris par cette belle entente bien malgache qui s’offrait le premier set par 7 à 5. Les Egyptiens se sont ensuite offert le second set par 3 à 6, mais Nicolas et Mirija ne leur ont laissé aucune chance au tie break remporté par 10 à 7. Enhardis par ce succès, nos deux représentants ont entamé pied au plancher les quarts de finale du double en s’offrant le premier set par 6/4. Mais ils ont dû payer cash cette débauche d’énergie en s’inclinant sèchement au second set (6/0/) avant de céder au tie break par 10 à 5. Éliminé au premier tour du simple, Mirija s’est rattrapé au tournoi de classement en battant le Kenyan, Brian Odingo, en deux manches (4/1 : 4/1) montrant par la même occasion une maîtrise parfaite de son jeu. Et quand ses amortis se conjuguent à ses coups droits gagnants, le public tombe sous le charme. En huitièmes de finale du simple, Mirindra Razafinarivo a perdu devant l’Egyptienne, Judy Tawela, en deux sets (2/6 ;3/6). Mitia Voavy Andraina s’est imposé devant une autre Égyptienne, Yasser Haya en deux sets (6/2 ; 6/2). Nicolas Fays fut expéditif face à l’Egyptien, Abbes Mohammed, en deux sets (6/1 ; 6/2). Les choses se corsent pour le camp malgache en quarts de finale puisque Mirindra a eu en face la numéro 3 du tournoi, en l’occurrence l’Egyptienne, Hassan Fardi. Nicolas n’est pas mieux loti face au numéro 2 de ce sommet africain, le Marocain, Ali Missoumi.",
            "Un air de déjà vu. La passation d’hier a réuni les mêmes acteurs que celle de la passation au mois d’août 2021. Tinoka Roberto, ministre de la Jeunesse et des Sports a officiellement pris son poste, hier, à Ambohijatovo, dans son ancien-nouveau bureau. Il prône la continuité des actions effectuées par son prédécesseur, Hawel Mamod’Ali. « En sept mois, nous avons fait un plaidoyer pour que les Jeux des Iles reviennent à Madagascar selon le souhait du président de la République après le retrait des Maldives. J’espère que nous allons organiser avec brio ce grand évènement. Je suis confiant que ce ministère est entre de bonnes mains et je suis toujours là pour les conseils et soutiens en cas de besoin », a souligné Hawel Mamod’Ali."
        ];
        $datesPubli = [
            new DateTime('2022-03-24'),
            new DateTime('2022-03-26'),
            new DateTime('2022-03-26'),
            new DateTime('2022-03-22')
        ];
        $rubriquesConcernees = [
            $rubriques[0],
            $rubriques[1],
            $rubriques[3],
            $rubriques[3]
        ];

        for ($i = 0; $i < 4; $i++) { 
            $actu = new Actu();
            $actu->setTheme($themes[$i]);
            $actu->setTitre($titres[$i]);
            $actu->setBreveDescription($descris[$i]);
            $actu->setContenu($contenus[$i]);
            $actu->setDatePublication($datesPubli[$i]);

            $rubriquesConcernees[$i]->addActu($actu);
            $redacteurs[$i]->addActu($actu);

            $manager->persist($actu);
        }

        $manager->flush();
    }
}
