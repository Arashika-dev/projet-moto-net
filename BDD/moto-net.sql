-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 12 nov. 2023 à 17:56
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `moto-net`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

DROP TABLE IF EXISTS `annonces`;
CREATE TABLE IF NOT EXISTS `annonces` (
  `annonce_id` int NOT NULL AUTO_INCREMENT,
  `annonce_title` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_moto` int NOT NULL,
  `annonces_kilometrage` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `annonce_price_eur` float NOT NULL,
  `date_of_publication` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `annonce_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`annonce_id`),
  KEY `id_moto` (`id_moto`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `article_id` int NOT NULL AUTO_INCREMENT,
  `id_type` int NOT NULL,
  `article_title` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_of_publication` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `article_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_category` int DEFAULT NULL,
  `id_user` int NOT NULL,
  `id_brand` int DEFAULT NULL,
  `video_id` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image_cover` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image_content` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`article_id`),
  KEY `id_brand` (`id_brand`),
  KEY `id_type` (`id_type`),
  KEY `id_user` (`id_user`),
  KEY `article_ibfk_2` (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`article_id`, `id_type`, `article_title`, `date_of_publication`, `article_text`, `id_category`, `id_user`, `id_brand`, `video_id`, `image_cover`, `image_content`) VALUES
(6, 2, 'Suzuki révèle la GSX-8R, relève des GSX-R en Europe', '2023-11-11 19:55:39', 'Le Supersport est mort... Du moins, celui des années 1990-2000 lorsque les 4-cylindres 600 cc se vendaient comme des petits \"shokupan\", ces savoureux petits pains au lait japonais. À l’époque d’ailleurs, Suzuki se démarquait de la concurrence en proposant une 750, qui se voulait aussi compacte et agile qu’une 600, aussi démonstrative et rapide qu’une 1000...\r\n\r\nDans son ultime version importée en France, lancée en 2011 et maintenue dans le catalogue jusqu’en 2017 et l’application de la norme Euro3, cette fameuse \"Gex sept-et-demi\" crachait 150 chevaux - à contrôler au seul moyen de la poignée de gaz, sans antipatinage ! - et ne pesait que 190 kilogrammes tous pleins faits.\r\n\r\n    Comparo GSX-R 600 Vs GSX-R 750 : laquelle choisir ?\r\n    Essai Suzuki GSX-8S 2023 : un grand 8 sans vertige\r\n\r\nSur le papier donc, la GSX-8R ne joue pas - du tout - dans la même cour que la GSX-R750 : avec son Twin développant 83 ch et un poids tous pleins faits de 205 kg, le rapport puissance/poids paraît faiblard. Et pourtant, Suzuki France clame haut et fort qu’avec cette nouvelle sportive, \"la relève est arrivée !\"\r\n\r\nSuzuki révèle la GSX-8R, relève des GSX-R en Europe\r\n\r\nD’un côté, Moto-Net.Com entend déjà les pistards grincer des sliders : une GSX-8S carénée, affublée de demi-guidons et munie de suspensions Showa (Vs Kayaba sur le roadster) ne remplacera jamais leur bonne vieille Gex. Certes. Mais de l’autre côté, notre interview de la concession Suzuki La Défense - qui a définitivement fermé ses portes cet été... - nous revient aussi en casque...\r\n\r\n\"Je serais le premier ravi de voir le retour de la Gex 600 ou de la 750 qu\'on était les seuls à conserver. Mais elles ne se vendraient pas\", constatait fin 2020 le patron Henri Farcigny. Devant la disparition des - vraies - petites motos sportives, \"certains motards sont scandalisés ! Mais quand on demande combien envoient un chèque pour en réserver une, là, tout de suite : plus personne\", se désolait-il.\r\n\r\nLes chiffres donnent raison aux professionnels, concessionnaire comme constructeur : l’an passé (en 2022), Yamaha a vendu 922 de ses nouvelles R7, Aprilia 746 de ses récentes RS660 et Kawasaki 361 de ses inoxydables Ninja 650. Seul Honda résiste avec une CBR650R qui n’a, malgré son 4-en-ligne, pas l’étoffe des héroïnes du temps jadis (lorsque les motards étaient plus jeunes et infatigables, les radars peu nombreux et repérables).\r\n\r\nPour 2024 donc, Suzuki sort une nouvelle Supersport d’un nouveau genre, étroitement dérivée de la GSX-8S. Le Twin parallèle de 776 cc et son électronique de pointe (assistances paramétrables et écran colorisé), le châssis acier et le bras oscillant alu, les jantes et leurs freins Nissin sont conservés tel quel.\r\n\r\n\r\nL’unique modification sur la partie-cycle concerne les suspensions : selon Suzuki, la fourche inversée Showa SFF-BP (à fonctions séparées sur chaque tube et à gros piston) profite d’une structure qui \"ne réduit pas uniquement le poids, mais assure aussi des caractéristiques d\'amortissement stables qui la rendent adaptée à la fois à la conduite sportive et aux longues distances\".\r\n\r\n\r\nSans dénigrer le matériel installé sur le roadster bien sûr, les ingénieurs d’Hamamatsu estiment que la \"suspension arrière mono-amortisseur de type Link (également fournie par Showa, NDLR), avec réglage de la précharge, est conçue pour contribuer à la stabilité en ligne droite et à une conduite souple et contrôlable\". Euh, pas trop souple quand même ?!', NULL, 7, NULL, 'RN0jy4MXN00', 'b2bf005e3dd852b85f4e.jpg', '9761f276d3c4facf3319.jpg'),
(7, 1, 'Essai Tracer 9 GT+ : toujours plus', '2023-11-11 19:58:59', 'Quoi de \"9\" sur la Tracer 9 GT, référence des motos sport-GT en Europe qui cannibalise quelque \"23%\" des ventes en France, son premier marché ? Sur le fond, pas grand-chose : Yamaha reconduit à l’identique son pêchu 3-cylindres de 119 ch, son cadre en alu, son semi-carénage protecteur - avec protège-mains et pare-brise réglable - et sa dotation ultra-complète qui inclut valises rigides et suspensions pilotées (liste des équipements en page 2).\r\n\r\nLa vraie nouveauté pour 2023 est l’inédite Tracer 9 GT+, nouvelle variante mieux équipée que les Tracer 9 tout-court et Tracer 9 GT. Pourquoi ce suffixe \"+\" ? Car elle en propose… plus ! Plus de confort avec sa nouvelle selle redessinée et réglable, plus de sophistication avec sa jolie instrumentation couleurs connectée de 7 pouces, sa pratique prise USB-A au cockpit et ses nouveaux commodos avec joystick à gauche. \r\n\r\nPlus d’agrément, aussi, avec son shifter double effet repensé pour une gestion plus fluide des montées et descentes des rapports sans débrayer ou encore son disque de frein arrière plus volumineux (267 mm Vs 245 en 2022). Et aussi, surtout, plus de sophistication avec son inédit et intriguant Adaptative Cruise Control (ACC), soit un régulateur de vitesse adaptatif…\r\n\r\nConcrètement, un régulateur adaptatif est un dispositif qui adapte automatiquement l’allure de la moto aux conditions de circulation. Ce système - apparu depuis peu chez BMW, Ducati, KTM et Kawasaki - contrôle l’accélérateur électronique et le freinage combiné de la Yamaha pour maintenir une distance de sécurité avec le véhicule qui le précède. \r\n\r\nLe tout, de façon autonome : le pilote renseigne juste sa vitesse de croisière puis la distance minimale avec les véhicules devant. Quatre seuils sont proposés par Yamaha : le minimum maintient une seconde d’écart avec la voiture, la moto ou le camion qui circule en amont. Le système - fonctionnel de 30 à 160 km/h - est renseigné par un radar à ondes millimétrique situé dans le boitier rectangulaire en plastique sous les phares à LED.\r\n\r\nLa Tracer 9 GT+ est la toute première Yamaha à intégrer ce dispositif dérivé de l’automobile, ce qui en fait à ce jour la moto la plus sophistiquée de la gamme d’Iwata. Ce recours aux hautes technologies n’est évidemment pas sans incidence sur le prix : à 16 999 euros, la nouveauté déplace aussi le curseur vers le + en termes de tarif ! \r\n\r\nDire que la toute première génération de 2014 s’était hissée en tête des ventes en grande partie grâce à son prix canon : 9999 euros pour celle qui s’appelait alors MT-09 Tracer ! Certes, cette version n’incluait pas les valises et toute l’électronique qui caractérisent aujourd’hui la Tracer 9 GT. Mais impossible de ne pas noter l’embourgeoisement de la sport-GT Yamaha… \r\n\r\n \r\n\r\nSi l’équipement et la technologie embarquée participent indéniablement à ce repositionnement Premium (tout comme sa nouvelle selle très élégante), ce n’est pas le cas de certains aspects : les gaines qui courent grossièrement sous l’instrumentation (ci-dessus) et l’intégration passable des câbles et durits autour du moteur de 890 cc en sont un exemple. L’aspect cheap de la visserie des carters et du plastique des pare-mains en est un autre...\r\n\r\nL’absence de réglage d’écartement du levier d’embrayage, de valves coudées et de clé sans contact (keyless) est par ailleurs critiquable sur une moto à 17 000 euros. De même, un petit vide poche aurait été le bienvenu dans le retour de sa tête de fourche pour glisser monnaie, télécommande ou carte de crédit.\r\n\r\nA noter enfin que ses valises de 30 litres - simples à utiliser et à démonter - autorisent l’emport d’un casque intégral au format standard, mais pas d’un gros modulable. Notre HJC i100 en taille L entre de justesse, puis exige de forcer sur le couvercle pour refermer la valise… Rayures sur la peinture du casque à la clé : bref, ça ne le fait pas.\r\nPoints clés Yamaha Tracer 9 GT+ \r\n\r\n    3-cylindres 890 cc de 119 ch commun à la MT-09\r\n    Cadre périmétrique en alu et jantes forgées\r\n    Étriers radiaux 4-pistons et disques de 298 mm à l’avant. Étrier 2-pistons et disque de 267 mm à l’arrière (245 mm en 2022)\r\n    223 kg avec le plein de 18,7 litres (+ 3 kg Vs Tracer 9 GT standard)\r\n    Régulateur de vitesse adaptatif \"ACC\" via radar à ondes millimétriques \r\n    Centrale à inertie sur six axes pour renseigner ABS et contrôle de motricité \r\n    Tableau de bord TFT de 7 pouces connecté, mais navigation en option (Garmin)\r\n    Shifter double effet et suspensions électroniques Kayaba de série\r\n    Nouvelle selle réglable de 820 à 835 mm :plus haute de 10 mm Vs 2022\r\n    Modes de conduite - Sport, Street, Rain et personnalisé - avec action sur accélérateur, amortissement, freinage, cabrage et patinage\r\n    Valises de série (casque intégral ok, mais pas gros modulable), pare-mains et poignées chauffantes de série\r\n    Béquille centrale, bulle réglable et nouvelle prise USB-A dans cockpit \r\n    Éclairage adaptatif avec Led qui éclairent l\'intérieur des courbes\r\n\r\nAu guidon de la Tracer 9 GT+ \r\n\r\nPrendre le guidon de la nouvelle Tracer 9 GT+ ne déstabilisera pas les habitués, et pour cause : c’est exactement le même qu’en 2022 ! Son cintre large et relevé prodigue la même position détendue : buste droit et bras écartés à l’horizontale, à la manière d’un trail. Ce roadster haut sur pattes (130 et 137 mm de débattements) mélange effectivement les genres aux bénéfices du confort de conduite.\r\n\r\n \r\n\r\nLa seule différence ergonomique tient à sa nouvelle selle, en similicuir avec coutures surpiquées. Cette assise réglable sans outils de 820 à 835 mm (contre 810 à 825 mm sur la GT \"tout-court\") accueille favorablement un pilote d’1m75, qui pose - de justesse  - chaque pied à plat. En position haute, seule une semelle est entièrement au contact du sol et l’autre sur la pointe.\r\n\r\nLe confort est correct, sans plus : la faute à un rembourrage qui n’a pas vraiment progressé sur le plan du moelleux. Le maintien est plutôt ferme, à l’image du compromis visé : un mix entre agrément et dynamisme. Pour autant, aucun mal au fondement n’est venu sanctionner nos 280 km de roulage : ce n’est certes pas la selle la plus onctueuse, mais la qualité de son accueil est satisfaisant sur la durée.\r\n\r\nCette assise développe par ailleurs suffisamment d’espace pour se mouvoir librement autour du réservoir de 18,7 litres, qui n’écarte pas beaucoup les cuisses : la Tracer 9 GT+ conserve une silhouette compacte et un poids raisonnable de 223 kg sans valises (+ 3 kg Vs GT tout court). Rien à voir avec les volumes d’une routière \"pur jus\", comme l’était par exemple feue la FJR1300.\r\n\r\nCette compacité ne s’exprime pas au détriment de la protection : le pare-brise réglable sans outils place la tête et les épaules à l’abri, sans créer de turbulences désagréables en position haute. Garder la mentonnière d’un casque modulable ouverte sur le réseau secondaire est parfaitement réalisable derrière cette \"pelle à tarte\", par ailleurs très facile à faire coulisser d’une main grâce à une pince de verrouillage en position centrale. \r\n\r\nLes membres inférieurs profitent eux de la déflexion offerte par les flancs de carénages qui partent de la double optique et recouvrent esthétiquement le radiateur. Les écopes devant le réservoir améliorent également le sort réservé au-dessus des cuisses. Suffisant pour tailler la route confortablement… par temps sec. Car sous la pluie et dans le froid, seul un carénage intégral de vraie routière fait la différence !\r\n\r\nAutres caractéristiques distinctives de cette Tracer 9 GT+ : ses commodos repensés avec joystick sur la gauche pour contrôler l’instrumentation. Ce nouveau format valorise bien la nouveauté, tant en termes de commodité qu’en qualité perçue : ce joystick - semblable à celui qu’utilisent certaines Triumph - apporte une touche classieuse bienvenue.\r\n\r\nUn simple coup de pouce permet d’accéder aux nouveaux menus de la planche de bord couleurs, qui gagne elle-aussi au change par rapport au précédent dispositif à double écran façon masque de plongée ! Cette dalle TFT grand format (7 pouces) expose toutes les informations attendues d’une telle moto, de manière lisible et ordonnée : trips, rapport engagé, températures, consommations, modes de conduite, etc.\r\n\r\nSa connexion Bluetooth ouvre une liaison avec le téléphone pour afficher des notifications d’appel et de SMS, en plus de faire défiler sa playlist. Seul regret : que la navigation GPS intégrée soit soumise à un abonnement auprès de Garmin… Là encore, ce genre d’économies se légitiment sur des motos à prix plancher, pas sur une machine qui tend à se rapprocher des 20 000 roros.\r\n\r\nA noter que les actuelles Tracer 9 et Tracer 9 GT - à respectivement 12 499 € et 14 999 € - conservent l’ancien format d’instrumentation et de commodos. MNC pressent que leurs futures évolutions incluront inévitablement ces améliorations réservées à la haut de gamme Tracer 9 GT+, qui est par ailleurs la seule à profiter de la nouvelle selle… et du régulateur adaptatif ! \r\nRégulateur adaptatif Yamaha : utile ou gadget ?\r\n\r\nCe nouveau régulateur s’enclenche classiquement depuis un bouton dédié au commodo gauche : une pression pour l’activer, puis une autre sur le poussoir \"-\" pour le mettre en action. La moto agit alors directement sur l’injection pour maintenir une vitesse constante, qu’il est possible d’augmenter ou de diminuer facilement depuis les touches \"+\" et \"-\". \r\n\r\nCouper les gaz ou freiner désactive immédiatement le dispositif, comme un régulateur conventionnel. Jusque-là, rien de sorcier ! La spécificité du dispositif s’exprime visuellement par une jauge de quatre graduations sur la gauche de l’instrumentation : une pression sur le bouton dédié derrière le commodo gauche - comme pour les appels de phare - permet de faire monter et descendre ces graduations.\r\n\r\nCette fonctionnalité sert à renseigner la distance que vous souhaitez conserver avec le véhicule qui vous précède : quatre graduations correspondent à la distance la plus élevée, une graduation à la plus courte (soit une seconde d’écart). A partir de cet instant, l’Adaptative cruise control prend intégralement le contrôle de l’accélérateur et du freinage pour maintenir cette distance !\r\n\r\nConcrètement, le radar mesure en permanence la vitesse de déplacement du véhicule en amont : si vous roulez à 130 km/h et que la voiture devant est à 125 km/h, une alerte visuelle s’enclenche et les gaz sont réduits pour adapter votre allure. L’opération est aussi douce qu’instantanée pour une régulation progressive. Ce n’est pas on-off sur les gaz !\r\n\r\nL’alerte visuelle en question prend la forme d’un large signal orange clignotant qui représente une voiture et le pictogramme triangulaire de danger. Impossible à rater, même en étant distrait, car l’alerte occupe une large partie de l’écran. Il ne manque qu’un bip façon klaxon de recul d’engins de chantier pour faire bonne mesure...\r\n\r\nLa même opération se produit en cas de ralentissements plus prononcés : si la voiture devant freine brutalement, les étriers avant et arrière de la Yamaha sont aussitôt actionnés via la centrale de son freinage intégralement combiné United Braking System (UBS). Là encore, l’action du régulateur est totalement transparente grâce à l’électronique. \r\n\r\nSi le véhicule devant accélère de nouveau - typiquement comme dans les bouchons sur le périph ou autoroute -, le régulateur adaptatif actionne de nouveau l’accélérateur pour revenir à votre vitesse cible de 130 km/h. Précision importante : ce système donne priorité à la distance et non à la vitesse…\r\n\r\nAutrement dit : si vous réglez le dispositif à 150 km/h  - oulàlà : c’est mal ! - mais que le véhicule devant respecte scrupuleusement le 130 km/h (bien !), la Tracer 9 GT+ ne dépassera pas l\'allure légale afin de conserver l’écart entre les deux véhicules. A l’inverse, si la voiture devant vient à dépasser les 150 km/h - nân, mais ça va pas ?! -, la Yamaha elle n\'ira pas au-delà.\r\n\r\nEn revanche, si le radar ne détecte plus aucun obstacle, la moto va gentiment grimper aux 150 km/h de votre vitesse cible. Gentiment, car l’accélération est volontairement bridée pour éviter de surprendre pilote et passager avec un changement d’allure trop vif : magie de l’électronique…\r\n\r\nPour mettre cette fonctionnalité à l’épreuve, MNC s’est calé dans la roue d’un collègue avec le régulateur volontairement paramétré sur sa vitesse maxi (160 km/h) : notre Tracer 9 GT+ est sagement restée dans le sillage de la moto qui nous précédait, en maintenant l’écart prédéfini. Pas besoin d’accélérer ou de freiner : l’ACC s’occupe de tout à votre place.\r\n\r\nPuis nous nous sommes déportés sur le côté pour faire sortir la moto en amont du champ de détection du radar : notre Tracer s’est immédiatement élancée vers notre vitesse cible de 160 km/h ! Vicieusement, nous l’avons alors replacée dans l’axe de la moto en amont : le régulateur a aussitôt actionné les freins car de nouveau conscient de la présence d’un obstacle !\r\n\r\nCe freinage automatique intervient également de façon progressive : le régulateur adaptatif ne pile pas comme un pilote MotoGP, au risque de mettre la moto en stoppie et de déséquilibrer l’équipage. Le freinage combiné autorise des ralentissements puissants et sans brutalité, car réparti entre roue avant et arrière : le régulateur Yamaha en tire brillamment parti. \r\nFreinage autonome : ah bon ?!\r\n\r\nDernière fonctionnalité de cette Tracer 9 GT+ : son inédit système d’assistance au freinage renseigné par le radar. Pour faire simple, le dispositif Yamaha va automatiquement accroître la pression sur les étriers s’il juge votre freinage insuffisant pour éviter un obstacle. Vous arrivez un peu vite derrière une voiture sur les freins ? Le système est en théorie capable de renforcer l’action de ralentissement pour éviter la collision.\r\n\r\n \r\n\r\nMNC précise en théorie car aucune pression supplémentaire au freinage ne s’est faite ressentir malgré d’innombrables essais (bon à savoir : c’est aussi le cas de membres de l’équipe Yamaha) ! Démonstration en direct durant notre vidéo où nous pressons doucement le levier droit à l’approche d’une voiture, sans déclencher quoi que ce soit… alors que le coffre se rapproche dangereusement !\r\n\r\nIdem durant nos tentatives avec le seul frein arrière : aucun signe de l’entrée en action d’un freinage assisté, même en frôlant la roue de l’ouvreur. Pas d’alerte au tableau de bord, ni d’action supplémentaire perceptible sur les étriers : une technologie à peaufiner ?\r\n\r\nAttention : cette assistance au freinage ne fonctionne que lorsque le régulateur adaptatif n’est pas activé : oui, c’est un peu compliqué…  Elle est par ailleurs censée intervenir - en ligne droite comme en courbes (!) - uniquement en renfort de votre freinage : aucune action ne se produit si vous ne freinez pas. \r\nDes fondamentaux préservés \r\n\r\nQu’en-est-il des autres aspects de la moto ? Sans surprise identiques ou presque aux modèles actuels testés par MNC. Les seules différences concernent la puissance supplémentaire apportée par le disque de frein arrière plus gros, bien pratique pour resserrer une trajectoire et/ou assoir la moto.\r\n\r\n \r\n\r\nLa troisième génération de shifter apporte également un plus avec un fonctionnement extrêmement agréable et précis, à la montée comme à la descente des rapports : le dispositif fonctionne suffisamment bien pour être utilisé en ville, où les autres qualités de la Tracer 9 GT se font apprécier. \r\n\r\nA commencer par son 3-pattes, toujours aussi onctueux à très bas régimes puis beaucoup plus nerveux dans les tours. Reprendre à 1500 tr/mn en sixième ne lui pose aucune difficulté, tout comme de dépasser puissamment sur le gras du couple (93 Nm à 7000 tr/mn). Le tout avec une consommation raisonnable : MNC l’a mesurée à 5,6 l/100 km malgré le rythme rapide de cet essai mené en compagnie de Stéphane Peterhansel (\"Monsieur Dakar\" n’a rien perdu de son coup de guidon, soit dit en passant !).\r\n\r\nVif, le Crossplane 3 (CP3) prend ses tours avec énergie et bonne humeur en délivrant une sonorité aux accents caverneux : carrément jouissif lorsque s’ajoute à cela les détonations du shifter ! Ce bloc complet est garant de belles envolées dès 5500 tr/mn, régime où apparaissent des vibrations déjà détectées par MNC sur le modèle précédent. Logique puisque le moteur ne change pas.\r\n\r\nPuis l’accélération devient ultra-tonique entre 7000 et la régulation à 10 500 tr/mn : la Tracer 9 GT+ pousse fort, très fort même, grâce à cette motorisation de MT-09. Le châssis est aux diapasons - forcément chez Yamaha - avec un excellent toucher de route et une stabilité désormais hors de critique. Rappelons que les premières générations étaient beaucoup plus volages : Yamaha a copieusement allongé le bras oscillant en 2018 (+ 60 mm !) pour canaliser ses mouvements de direction.\r\n\r\nAgile, la Tracer 9 GT + se place en courbes avec sérénité et précision : ses 223 kg et ses volumes se font totalement oublier, au point parfois de se surprendre à la malmener comme un roadster sportif. Son moteur joueur au tempérament canaille à partir des mi-régimes y est pour beaucoup ! \r\n\r\nLes étriers 4-pistons évidés à l’avant sont à la hauteur du rendement mécanique : puissance, dosage et constance répondent présents, le tout sous la fine gestion d’un ABS sensible à l’inclinaison de la moto grâce à la centrale à inertie sur six axes. Idem pour le contrôle de traction, dont l’action rapide et efficace est plus ou moins interventionniste selon le mode de conduite enclenché : pluie, route, sport ou personnalisé.\r\n\r\nEnfin, cette Tracer 9 GT+ reconduit de série les suspensions gérées par électronique de chez Kayaba : cet amortissement piloté agit en temps réel sur les lois hydrauliques de la fourche inversée et du mono-amortisseur monté sur biellette. La précharge reste, elle, réglable à la main : à l’arrière, une molette déportée est prévue à cet effet sur le flanc droit.\r\n\r\nCe système fonctionne automatiquement selon deux tarages préprogrammés en usine : sport (A1) ou confort (A2). Par défaut, la Tracer 9 GT+ démarre sur le mode de conduite Street qui active le tarage confort. Ce dernier présente pour MNC toutes les qualités requises sur petites routes : confort et réactivité sont au rendez-vous.\r\n\r\nL’itinéraire devient plus technique et le bitume est un billard ? Une pression sur le bouton Mode à droite pour activer la configuration Sport, et l’amortissement de la Tracer 9 GT+ devient immédiatement plus ferme ! Les transferts de masses sont mieux contenus, aux bénéfices directs de la précision en entrée de courbes.\r\n\r\nA noter que ces suspensions semi-actives travaillent de concert avec le nouveau régulateur adaptatif pour ajuster l’équilibre de la moto selon les informations transmises par le radar. \r\nVerdict : qui peut le +…\r\n\r\nPeu de surprises, finalement, avec cette Tracer 9GT+ : ses qualités dynamiques sont toujours aussi enthousiasmantes, bien aidée par son truculent moteur. Pêche, souplesse, allonge, caractère : le 3-pattes a tout ce qu’il faut là où il faut ! L’équilibre de la partie cycle et la richesse des équipements complètent ce tableau réjouissant, malgré la hausse sensible de prix.\r\n\r\nMNC apprécie l’arrivée de son nouvel écran et des commodos plus raffinés, tout comme sa selle vraiment plaisante à détailler : son confort, en revanche, peut encore s’améliorer avec davantage de rembourrage, alors que la finition générale pourrait aussi faire un pas supplémentaire au regard du prix atteint par cette version +.\r\n\r\nReste ce fameux régulateur adaptatif, en réalité la vraie nouveauté de ce millésime 2023… Sur un plan technique, le système apparaît diablement au point et, par ricochet, sacrément sécurisant : les risques de percuter le véhicule qui vous précède par inattention sont grâce à lui considérablement réduits, voire sur la papier totalement évités.\r\n\r\nLe Journal Moto du Net ne peut cependant s’empêcher de craindre un effet pervers à cet \"assistanat technologique\" : plus l’électronique va contrôler la moto, moins le motard sera attentif aux différents facteurs extérieurs. A quoi bon rester strictement concentré sur son environnement puisque la machine le fait à sa place ? Au temps pour la vigilance et l\'anticipation, pourtant fondamentales à moto...\r\n\r\nLe papy dans sa Citronault Pipo lance l’opération escargot sur la voie de gauche de l’autoroute ? Pas de problème : le radar le détecte et la moto freine. Le trafic reprend de la vitesse ? Le régulateur actionne l’accélérateur électronique, le tout sans aucune action nécessaire du pilote… qui peut gentiment faire joujou avec la nouvelle instrumentation connectée !\r\n\r\nSi cette avancée apporte par ailleurs une incontestable plus-value sur un plan sécuritaire - aspect que MNC applaudit des deux gants -, elle place également une roue de Yamaha vers la conduite totalement autonome. Science-fiction ? Pas tant que cela : rappelons que le blason d’Iwata – à l’instar de BMW et Honda - travaille sur un projet d’auto stabilisation. \r\n\r\nAutrement dit : une moto qui tient équilibre toute seule, sans intervention du conducteur. Ajoutez lui le régulateur adaptatif et un GPS pour lui indiquer où elle se trouve et à quelle vitesse rouler, et vous obtenez une moto autonome. MNC est à la fois curieux de tester une telle machine et pas vraiment pressé de voir cette technologie s\'étendre...', NULL, 7, NULL, 'C9QWJlH_w_I', '56d99f47bbeaef3e8bf5.jpg', '782fbab06c3c738295bb.jpg'),
(9, 2, 'Place à la nouvelle BMW R 1300 GS 2024 !', '2023-11-12 16:00:52', 'Les performances progressent comme prévu à 145 ch contre 136 ch, obtenus au même régime de 7750 tr/mn. Le couple augmente aussi sensiblement de : 149 Nm à 6500 tr/mn contre 143 Nm à 6250 tr/mn en 2023. Argument notable : BMW annonce \"plus de 130 Nm entre 3600 et 7800 tr/mn\" pour ce moteur sérieusement repensé, notamment au niveau de la transmission.\r\n\r\nDans le détail, le Boxer est plus compact grâce au déplacement de sa boîte de vitesses désormais en dessous du bloc (derrière en 2023). Cette configuration permet de raccourcir les arbres de transmission, aux bénéfices - on l\'espère ! - d\'une meilleure fluidité du passage des rapports. Autre avantage : cela participe à alléger l\'ensemble puisque la mécanique perd à elle seule quelque 6,5 kg !\r\n\r\nLa partie cycle n\'est pas en reste : le nouveau cadre est toujours en deux parties, mais si la structure avant reste en acier la boucle arrière fait dorénavant appel à l\'aluminium. Bon pour le poids, moins pour les possibilités de réparations… surtout dans la cambrousse. BMW grapille aussi du poids grâce à la batterie lithium-ion (bien !), mais aussi en rognant la capacité du réservoir qui passe de 20 à 19 litres (pas bien...).\r\n\r\n \r\n\r\nAu niveau des dimensions, la R1300GS reproduit plusieurs valeurs à l\'identique : notamment ses débattements de 190 et 200 mm et ses dimensions de roues, en 120/70/19 et 170/60/17. En clair : BMW ne succombe pas à la tendance orientée très tout-terrain de certaines de ses rivales, en 21 et 18 pouces avec des suspensions qui s\'ébattent sur plus de 20 cm.\r\n\r\nLe constructeur allemand préfère reconduire son compromis éprouvé \"route-chemin\". Et comment lui reprocher au regard du succès de la GS d\'une part, et de l\'utilisation en réalité bien plus \"bitume\" que \"terre\" d\'autre part ? La R1300GS conserve son approche \"maxi-trail-GT\" qui lui réussit : c\'est la moto de plus 500 cc la plus vendue au monde !\r\n\r\nTémoins de son orientation \"mixte\" : sa bulle réglable sans outils (une version électrique fait son apparition en option), son instrumentation couleur connectée de 6,5\" (la même qu\'en 2023), sa très pratique molette Multicontroller ou encore son nouveau compartiment pour loger son smartphone avec prise USB dédiée (une prise 12V est aussi incluse de série).\r\nUne GS plus élancée\r\n\r\nCette chasse au poids se traduit par une silhouette plus élancée, moins intimidante visuellement : la nouveauté paraît plus menue et compacte, bien que ses mensurations soient pratiquement identiques à 2023. La R1300GS est même un tantinet plus longue : 2212 mm contre 2207 mm pour la R1250GS, avec toujours une largeur de 1000 mm.\r\n\r\n \r\n\r\nEn revanche, son empattement diminue légèrement - 1518 mm contre 1525 mm -, tout comme sa chasse (99,6 contre 112 mm) : MNC pressent un bénéfice sur l\'agilité, à plus forte raison avec ses 12 kg de moins. La précédente GS était remarquablement alerte au regard de son poids, la nouvelle présente - sur le papier - les atouts nécessaires pour faire mieux à basse vitesse et moteur coupé.\r\n\r\nLa ligne évolue notamment au niveau de sa partie avant, qui accueille un inédit phare à LED en forme de \"X\" : finie l\'optique asymétrique typique des GS ! Le traditionnel \"bec de canard\" est conservé, mais dans un format court : la R1300GS y gagne en dynamisme visuel.\r\n\r\nDu côté des périphériques, MNC note l\'augmentation du diamètre de ses disques de frein : de 305 à 310 mm à l\'avant et de 276 à 285 mm à l\'arrière. Le freinage s\'appuie toujours sur des étriers radiaux 4-pistons à l\'avant et devient entièrement intégral : le levier droit actionne les étriers avant et arrière (idem 2023) et c\'est désormais aussi le cas de la pédale.\r\n\r\n \r\n\r\nLa gestion du train avant reste confiée au Telelever, système non conventionnel \"maison\" qui dissocie les forces de direction et de freinage. BMW annonce une progression en termes de \"stabilité et de précision\" sur ce nouveau \"Telelever Evo\", tout comme sur son nouveau \"Paralever Evo\".\r\n\r\nComme la précédente R 1250 GS, la R 1300 GS peut par ailleurs recevoir en option un pilotage électronique de ses suspensions : ce dispositif repensé s\'appelle désormais Dynamic suspension Adjustment (DSA), et non plus \"ESA\" ! Sa subtilité ? Il agit désormais sur la raideur du ressort du Telelever, en plus de ses lois hydrauliques, alors que l\'Electronic suspension adjustment (ESA) n\'intervient que sur l\'hydraulique du train avant. \r\n\r\nD\'autre part, ce nouveau DSA permet d\'abaisser l\'assiette pour faciliter les manoeuvres à l\'arrêt à et à basse vitesse : le dispositif \"dégonfle\" automatiquement les suspensions pour passer d\'une hauteur de selle de 850 mm d\'origine à 820 mm. Une astuce pratique introduite par Harley-Davidson sur sa Pan America, puis reprise par Ducati sur sa Multistrada V4. A noter qu\'un châssis sport est aussi proposé en option avec 20 mm de débattement de suspensions supplémentaires.\r\nUne meilleure dotation de série \r\n\r\nAutre argument favorable à cette nouvelle R 1300 GS : sa dotation de série enrichie par rapport au modèle précédent. La nouveauté 2024 reçoit de série des pare-mains avec clignotants intégrés (option en 2023), mais aussi l\'indicateur de pression des pneus, le démarrage sans clé keyless et les poignées chauffantes (si, si !).\r\n\r\n \r\n\r\nElle est livrée d\'origine avec quatre modes de conduites (trois en 2023) : \"Rain\", \"Road\", \"Éco\" et \"Enduro\", qui agissent sur la réactivité de sa poignée de gaz électronique, de son antipatinage, de son ABS mais aussi sur son frein moteur. BMW intègre même un assistant au démarrage en côte, de série lui aussi !\r\n\r\nRien à redire, donc ? Si : le Journal Moto du Net déplore que les supports de valises restent au catalogue des accessoires, tout comme les roues à rayons (à bâtons de série). Plus agaçant : la béquille centrale migre désormais dans les options, alors qu\'elle était jusqu\'ici incluse d\'origine…\r\n\r\nOn se console avec l\'intégration d\'un inédit régulateur adaptatif de série, capable de ralentir la moto en cas de rapprochement trop rapide avec un véhicule qui le précède. Ce système renseigné par des radars peut également activer des fonctionnalités supplémentaires en option : un détecteur de collision frontale - qui active le freinage - et un avertisseur de changement de voie, dispositif étrenné par BMW sur ses scooters C650.\r\n\r\nLa nouvelle BMW R 1300 GS se décline d\'ores et déjà en quatre versions : standard, Triple black, Trophy et Option 719. Son prix débute à 20 690 euros en version standard (coloris blanc), en hausse de 800 euros par rapport à l\'ancienne R 1250 GS à 19 890 euros.', NULL, 7, NULL, 'B7cV_JrD0YE', '015e88071d8c8a24f62b.jpg', 'd92e2ec8a0f36455084b.jpg'),
(11, 2, 'Les CB650R et CBR650R inaugurent l’embrayage E-Clutch chez Honda', '2023-11-12 17:26:41', 'Subtilement revue pour 2021, la CB650R a été totalement éclipsée en 2023 dans les concessions Honda par la récente Hornet 750 et son tout nouveau Twin ? Certes. Mais attention, le petit roadster très-néo-un-peu-rétro réapparaît sous les feux des projecteurs du salon Eicma de Milan à la faveur de petites mises à jour... et d’une grosse (r)évolution technologique !\r\n\r\n\"Avec l\'adoption de la nouvelle technologie d\'embrayage électronique E-Clutch sur les Honda CB650R et CBR650R 2024, Honda bouleverse une fois encore les fondamentaux de la conduite moto pour les utilisateurs de tous types et de tous niveaux d\'expérience\", en même temps qu’il redore le blason - ailé - des petits 4-cylindres !\r\n\r\n    Toutes les nouveautés moto sur MNC\r\n    Honda dévoile son embrayage automatique E-Clutch\r\n\r\nPrésenté il y a un petit mois - sur MNC bien évidemment -, le nouveau dispositif Honda \"fait appel à des composants de différentes origines -embrayage classique, \"quickshifters\" (passage rapide des rapports) et double embrayage DCT - pour créer un système unique associant le meilleur de ces technologies largement éprouvées\", rappellent les motoristes nippons.\r\n\r\nLes CB650R et CBR650R inaugurent l’embrayage E-Clutch chez Honda\r\n\r\n\"Très compact, le E-Clutch ne pèse que 2 kg, la transmission et l\'embrayage lui-même ne présentant aucune différence par rapports aux pièces d\'une moto conventionnelle, ce qui garantit une compatibilité optimale pour de futures applications\", précisent les savant-pas-fous-du-tout de Tokyo.\r\n\r\nPour mémoire, cet embrayage permet au conducteur de se passer intégralement du levier gauche, que ce soit pour monter ou descendre les vitesses, mais également pour démarrer ou s’arrêter ! La commande d’embrayage ne disparaît pour autant pas du guidon, puisqu’il reste opérationnel.\r\n\r\nLes CB650R et CBR650R inaugurent l’embrayage E-Clutch chez Honda\r\n\r\n\"Dans le détail, lorsque le levier est actionné pour passer un rapport, le E-Clutch reste inerte puis se réenclenche automatiquement après 5 secondes à bas régime ou après moins d\'une seconde au-dessus d\'un certain régime\", nous révèlent aujourd’hui les ingénieurs nippons.\r\n\r\n\"Et si l\'on souhaite déconnecter le E-Clutch pour une raison quelconque\", anticipe Honda, \"il suffit d\'actionner une commande sur le guidon gauche, le retour à un mode manuel classique étant alors indiqué par un témoin \"M\" sur le tableau de bord\".\r\n\r\nLes CB650R et CBR650R inaugurent l’embrayage E-Clutch chez Honda\r\n\r\nEn outre, cet inédit E-Clutch propose au pilote trois \"touchers\" de sélecteur différents : Hard, Medium ou Soft, \"chacun pouvant être sélectionné indépendamment pour monter ou descendre les rapports. Enfin, si le rapport de boîte engagé est trop élevé par rapport à la vitesse de la machine, la technologie E-Clutch informe le pilote qu\'il doit descendre un rapport via l\'apparition d\'un symbole sur le tableau de bord\".\r\n\r\nLes japonais profitent de cette première présentation - statique - au public pour détailler leur mécanisme : \"l\'embrayage est entraîné par un actionneur composé de 2 moteurs logés dans le carter extérieur droit\" et tient compte \"de paramètres tels que la vitesse de la moto, l\'angle d\'ouverture de la poignée des gaz, le régime moteur, la pression appliquée au sélecteur, l\'angle du pignon d\'entraînement de l\'actionneur de l\'embrayage ou encore la position angulaire et la vitesse de rotation du contre-arbre d\'équilibrage des vibrations\". Sur le papier, un motard ne saurait faire mieux...', NULL, 7, NULL, '', '1da3cc5dc18972d55636.jpg', '695c363f450907fb7d5a.jpg'),
(12, 2, 'Calendrier, points inspectés et modalités du contrôle technique moto en avril 2024', '2023-11-12 17:30:30', 'Ni les manifestations, ni l\'opposition nourrie des motards (encadré ci-dessous), ni les doutes soulevés par les contrôleurs eux-même et encore moins les faibles statistiques d\'accidentologie liées à une défaillance mécanique n\'ont suffi à éviter la mise en place d\'un contrôle périodique pour les motos et les scooters, deux et trois-roues, 50 et 125 cc inclus.\r\n\r\n    Le point sur le contrôle technique moto et scooter en juin 2023\r\n    Tous nos articles Contrôle technique moto \r\n\r\nCe projet maintes fois repoussé depuis 20 ans entre en vigueur le 15 avril 2024, comme le stipule désormais officiellement l\'arrêté \"relatif au contrôle technique des véhicules motorisés à deux ou trois roues et quadricycles à moteur\" publié le 23 octobre au Journal officiel. Cette fois, c\'est sûr : plus d\'échappatoire possible ! Cet arrêté de sept pages (!) est signé par le ministre de la transition écologique et de la cohésion des territoires, Christophe Béchu, et par le ministre délégué en charge des transports, Clément Beaune. Il fixe notamment l\'échéancier ci-dessous, qui débute comme prévu avec les motos et scooters de plus de cinq ans.\r\n\r\nCalendrier du contrôle technique motos et scooters 2024\r\n\r\n    Véhicules immatriculés avant le 1er janvier 2017 : au plus tard le 31 décembre 2024 \r\n    Véhicules immatriculés entre le 1er janvier 2017 et le 31 décembre 2019 : à effectuer en 2025 \r\n    Véhicules immatriculés entre le 1er janvier 2020 et le 31 décembre 2021 : à faire en 2026 \r\n    Véhicules immatriculés à partir du 1er janvier 2022 : au bout de cinq ans, puis tous les trois ans (article R. 323-27 du Code de la route)\r\n    Véhicules de collection :  \"cinq ans entre deux contrôles, à l\'exception des cas de mutation\"\r\n\r\nCe document définit par ailleurs le \"contenu et le déroulé du contrôle technique (points de contrôle, niveau des défaillances)\", explique le législateur. \"Il porte également sur les règles statutaires des contrôleurs, des centres de contrôle et des réseaux (conditions et procédure d\'agrément, formation initiale et continue des contrôleurs, organisation de l\'activité), sur les moyens matériels (configuration des installations, équipements) et sur la surveillance administrative\".\r\nLe propriétaire va déplacer sa moto pendant le CT !\r\n\r\nLa lecture attentive de cet arrêté confirme à MNC ce qu\'un contrôleur nous avait suggéré lors de notre interview : les motards vont activement participer au contrôle technique de leur propre moto, pour la déplacer à l\'invitation du contrôleur ! Objectif ? Faciliter la mise en place du CT dans les centres en allégeant la formation spécifique \"2RM\" !\r\n\r\n    ITW d\'un contrôleur : \"Le contrôle technique n\'a pas d\'intérêt pour les motos\"\r\n\r\n\"La personne présentant le véhicule est autorisée à pénétrer dans la zone de contrôle à l\'invitation du contrôleur pour aider celui-ci à manipuler le véhicule dans le respect des consignes de sécurité de l\'installation de contrôle et des instructions données par le contrôleur en cours de contrôle\", précise l\'arrêté. Les petites cylindrées ne sont pas concernées par cet aménagement : logique, puisqu\'elles sont plus faciles à manipuler qu\'une Goldwing ou une Electra Glide, et moins frayeuses en cas de crash ! \r\nPoints de contrôle et niveaux de défaillances \r\n\r\nLe contrôle technique porte sur huit domaines : l\'identification du véhicule (plaque, n° de série), le freinage, la direction, la visibilité, l\'éclairage et équipements électriques, les trains roulants (roues, pneus, suspensions), le châssis, les \"autres matériels\" et les nuisances (bruit, rejets polluants). Chacun de ces aspects pourra entraîner la notification de \"défaillances\", sous trois formes : \"mineures\", \"majeures\" ou \"critiques\". Sans surprise, impossible de décrocher le précieux sésame avec une défaillance majeure et critique…\r\n\r\n    Résultat favorable (A) en l\'absence de défaillance majeure et critique \r\n    Résultat défavorable pour défaillances majeures (S), en l\'absence de défaillance critique et lorsqu\'il est constaté au moins une défaillance majeure. Dans ce cas, la validité du contrôle est de deux mois à compter de la date du contrôle technique périodique\r\n    Résultat défavorable pour défaillances critiques (R) lorsqu\'il est constaté au moins une défaillance critique. Dans ce cas, la validité du contrôle est limitée au jour du contrôle.\r\n    Dans le cas d\'un résultat défavorable, une contre-visite est à réaliser dans un délai de deux mois après le contrôle, \"faute de quoi un nouveau contrôle technique périodique est à réaliser\", prévient l\'administration. En cela, le CT moto calque ses modalités sur le contrôle technique automobile.\r\n\r\nUne vignette contrôle technique \r\n\r\n\"A l\'issue du contrôle technique, le contrôleur positionne immédiatement par tout moyen adapté à l\'intérieur du véhicule, recto visible de l\'extérieur, sur la partie inférieure droite du pare-brise, lorsque le véhicule en est équipé, une vignette conforme aux dispositions de l\'annexe II du présent arrêté, indiquant la date limite de validité du contrôle\", fait savoir le législateur. Entre la vignette Crit\'Air, de l\'assurance et maintenant du contrôle technique, ça en fait de la déco…\r\n\r\nMais quelles dispositions sont prévues pour toutes les motos dépourvues de pare-brise, notamment les roadsters ? \"Les véhicules ne disposant pas d\'un pare-brise ainsi que les véhicules de collection ne sont pas soumis aux dispositions du premier alinéa du présent article\", prévoit l\'arrêté. \"Dans ce cas, la vignette est rendue inutilisable à l\'issue du contrôle technique et archivée avec la copie ou le duplicata du procès-verbal\". Ouf !\r\n\r\n    Interview : La FFMC envisage le boycott du contrôle technique moto\r\n\r\nCette concrétisation du contrôle technique moto met fin à des années de combat essentiellement menés par la Fédération française des motards en colère : dans une interview accordée à MNC, la FFMC nous avait indiqué ne pas écarter l\'ultime recours au boycot, comme elle l\'avait fait par le passé pour la vignette.  A suivre : restez mobilisés !', NULL, 7, NULL, '', '6c9a41e5159d893f285f.jpg', '3fa93c6875c938957db7.jpg'),
(13, 1, 'Essai vidéo Yamaha X-Max 300 Tech Max 2023', '2023-11-12 17:32:15', 'Le Tmax est trop volumineux et/ou trop cher ? Optez pour le nouveau Yamaha X-Max 300 2023 ! Look retravaillé, instrumentation connectée, ergonomie et freinage peaufinés : ce scooter sport-GT - accessible avec permis moto (A2) - fait valoir de solides arguments, à condition d\'y mettre le prix ! Particulièrement dans sa déclinaison haut de gamme Tech Max testée par Moto-Net.Com... Essai.', NULL, 7, NULL, 'wOPpk8WtwYo', '8cfb106323a445962b66.jpg', '1e9fcc3e172b5105f392.jpg'),
(14, 1, 'Moto Guzzi V100 Mandello S : le bilan de notre essai en vidéo', '2023-11-12 17:35:53', 'La V100 Mandello est une vraie nouveauté, une toute nouvelle moto produite, comme son nom l’indique, dans l’usine de Moto Guzzi basée depuis plus de 100 ans à Mandello del Lario en Italie. C’est là que MNC a d’ailleurs pu tester sa version haut de gamme S. Bilan en vidéo.', NULL, 9, NULL, 'BAIWqdmxx1s', '531cdd79e9a0ceab49ce.jpg', 'ac35e08d1f7deb55b291.jpg'),
(15, 1, 'Essai vidéo DesertX : le trail Ducati qui va faire des Euros !', '2023-11-12 17:37:00', 'Ducati investit le tout-terrain avec une nouvelle moto aussi belle qu\'ambitieuse : le trail DesertX et son énergique bicylindre de 937 cc ! MNC l\'a poussée dans ses retranchements sur route, pistes et petits chemins dans un essai vidéo ultra-complet pour découvrir les qualités et les défauts de cette inédite italienne en 21 et 18 pouces. ', NULL, 9, NULL, 'FYqvfqWIxu0', 'f78ed2d17d206d317b86.jpg', '23495bcc28887fa33edb.jpg'),
(16, 1, 'Essai Z900RS SE : le meilleur des roadsters Kawasaki', '2023-11-12 17:40:03', 'Essai Z900RS SE page 1 : Petit coup d’oeil dans le rétro\r\n\r\nLa digne héritière de la Z1, c’est elle, la Z900RS. Lancée avec succès il y a quatre ans par Kawasaki, elle fait jeu égal avec les références du segment \"néo-rétro-costaud\" sur le marché français. Cette japonaise concurrence les anglaises, allemandes et italiennes... Oui c’est cela, comme à la belle époque, il y a cinquante ans déjà !\r\n\r\nEn 2022, la firme d’Akashi célèbre le cinquantenaire de sa célèbre série Z, entamée par la \"Super Four\" à cause de - grâce à ! - la CB750 \"Four\" dévoilée en 1968 par Honda. Pour mémoire, le géant de Tokyo avait coupé l’herbe sous le pied la botte des petits hommes verts d’Akashi qui bossaient sur un 4-cylindres 4-temps \"sept-et-demi\" (nom de code N600 !)...\r\n\r\n    Dossier spécial MNC : Toutes les nouveautés 2022\r\n    Dossier spécial MNC : Tout savoir sur la Z900RS\r\n\r\nKawasaki n’abandonne pas pour autant et remet son \"4-pattes\" sur l’ouvrage... Les motoristes qui avaient étudié des cylindrées plus grosses planche désormais sur un projet T103 de machine qui cubera 900 cc. Un monstre ! Mais ce dernier ne devra pas peser plus lourd que la N600, afin de tordre la CB750. Et concurrencer les \"big\" Harley ?\r\n\r\nEssai Z900RS SE : le meilleur des roadsters Kawasaki\r\n\r\nConçue en priorité pour un marché américain alors en plein essor - et plus unifié que les exigeants marchés européens donc plus facile à définir et contenter -, la Z1 a été testée et \"éprouvée\" en 1971 aux USA par les ingénieurs japonais, un pilote local et le britannique Paul Smart accompagnée de sa femme Maggie (sœur d’un certain Barry Sheene).\r\n\r\n\"Il y aurait tant à dire sur le développement de la Z1, et sur cette traversée du continent américain, aller-retour\", se marre le porte-parole de Kawasaki Europe, Martin Lambert. Cette moto en gestation est alors surnommée le \"New-York Steak\", soit le plat le plus copieux et savoureux proposé dans les fameux Diner’s. Tout un programme menu !\r\n\r\nEssai Z900RS SE : le meilleur des roadsters Kawasaki\r\n\r\nAu cours de ce périple, les moteurs de 903 cc à double arbre à cames en tête qui développeront au final 82 chevaux (Vs 736 cc, SACT et 67 ch sur la CB) ont été constamment cravachés et fréquemment démontés sur le bord de la route. L’une des trois motos de pré-série a même participé à une course d’endurance de 3 heures, sans l’accord préalable de l’usine.\r\n\r\nTout aussi inenvisageable de nos jours, ces prototypes Kawasaki portaient des badges \"Honda\" afin de voyager incognito ! Cependant, cette \"super\" production d’Akashi se distinguait totalement de celle de Tokyo : \"le responsable du design, Tada San, est allé jusqu’à redessiner certaines pièces du moteur\", nous confirme Mister Lambert.\r\n\r\nEssai Z900RS SE : le meilleur des roadsters Kawasaki\r\n\r\nPrésentée en avant-première à quatre journalistes US en juin 1972 puis dévoilée au grand public lors du salon de Cologne en automne 1972, la Z1 a instauré une série de records de vitesse et d’endurance sur le célèbre ovale de Daytona le printemps suivant. Autant de jolis coups de pub et marketing qui ont participé à l’immense succès de la \"Zak\"...\r\n\r\n\"Au lancement, l’usine prévoyait de produire 500 Z1 par mois afin d’atteindre son objectif de 6000 machines livrées en un an\", nous indique notre hôte, \"mais très vite, le rythme a atteint les 5800 exemplaires... par mois !\" Un sacré défi industriel, remporté par ce constructeur japonais de sous-marins, avions, bateaux, trains, etc !\r\n\r\nEssai Z900RS SE : le meilleur des roadsters Kawasaki\r\n\r\nEntre 1972 et 1979, 706 500 \"Zed\" (Z1, Z650, Z1300, Z400, etc) ont été vendues, puis 594 500 dans les années 80. Moins performante dans les 90ies avec les Zephyr et ZRX (303 100 exemplaires), la dynastie est repartie au milieu des années 2000 avec les Z1000 et Z750 (330 500) et les \"années 10\" avec les Z800/900 et la Z650 qui remplaçait l’ER-6 (536 100).\r\n\r\nMalgré le coronavirus et sa pandémie mondial, la belle mécanique ne s’est pas grippée en ce début de nouvelle décennie : les 100 300 unités livrées tant bien que mal en 2020 et 2021 portent le total de \"Zed\" produites à 2,571 millions. Tout cela, grâce à la Z1 !\r\n\r\nEssai Z900RS SE : le meilleur des roadsters Kawasaki\r\n\r\nLes propriétaires de Z900 auront peut-être du mal à le croire mais à la toute fin des années 60, Kawasaki Heavy Industries songeait sérieusement à fermer sa branche deux-roues. \"La réussite de la Z1 a permis de développer la gamme, de tisser un réseau mondial, de créer l’autre grande famille Ninja, et d’offrir à Kawasaki son image de marque performante et ingénieuse\", estime Martin Lambert.\r\n\r\nC’est pour fêter dignement le \"Zinquantenaire\" de cette moto iconique - et lancer officiellement de nouvelles déclinaisons qui font partie des célébrations - que les responsables européens de la firme nippone nous accueillent chez Kawasaki Suisse qui abrite dans ses bureaux une impressionnante collection de motos...', NULL, 9, NULL, '', 'b2f1950074836b8cc6a2.jpg', '7298808d73f8ac2516ef.jpg'),
(17, 1, 'Essai vidéo Yamaha Ténéré 700 World Raid 2022', '2023-11-12 17:41:54', 'Petites routes tortueuses, chemins cassants, pistes engagées : rien n\'arrête la nouvelle Yamaha Ténéré 700 World Raid, inédite déclinaison de la \"T7\" encore plus \"off-road\" avec son double réservoir et ses immenses suspates ! La preuve dans notre essai vidéo en complément de notre test complet à lire sur MNC.', NULL, 9, NULL, 'kBfm7pImpJg', 'f4ab333b10aa4b3e5b01.jpg', '34a17ba3e9d3fd89df17.jpg');
INSERT INTO `article` (`article_id`, `id_type`, `article_title`, `date_of_publication`, `article_text`, `id_category`, `id_user`, `id_brand`, `video_id`, `image_cover`, `image_content`) VALUES
(18, 2, 'La nouvelle KTM 990 Duke veut le scalp des roadsters maxi-mid-size ', '2023-11-12 17:43:30', 'Lancée en 2021, soit un an après la 890 Duke R dont elle est issue, la 890 Duke sort déjà du catalogue KTM ! Pour MNC, cela ne fait aucun doute : c’est le retour de la 790 Duke - bridée à 95 ch et \"Made in China\" par le partenaire CF Moto - qui a précipité la disparition du second \"Scalpel\" de la gamme des roadsters autrichiens .\r\n\r\nEn 2024 donc, la firme de Mattighofen réorganise ses troupes pour mieux canarder la concurrence, en atteignant plus précisément ses cibles : la 125 Duke drague les nombreux permis B et les jeunes permis A1, les 390 et 790 Duke chassent les permis A2, les 1290 Super Duke s’orientent vers les permis A \"Full full full\". Et cette nouvelle 990 Duke ?\r\n\r\n    Toutes les nouveautés moto sur MNC\r\n    Toute l’actualité KTM sur MNC\r\n\r\nSurnommée \"The Sniper\" par ses concepteurs, \"la toute nouvelle KTM 990 Duke vise directement le segment convoité des roadsters de 1000 cc\", annoncent en introduction les autrichiens... alors qu’en conclusion, ils résument \"l’objectif était simple : concevoir la machine Naked de moyenne cylindrée par excellence. Objectif atteint : la KTM 990 Duke 2024 touche la cible en plein centre\". En plein dans le mille ?', NULL, 9, NULL, 'Vn4vOaVNDO4', '6569dd3442928af58a3d.jpg', '95874a1dfdac1bba86e7.jpg'),
(19, 2, 'Une Kawasaki Z7 Hybrid pour continuer à rouler en centre-ville', '2023-11-12 18:53:28', '\"Kawasaki double son offre hybride avec la Z7 Hybrid\", clame fièrement le constructeur qui vient de lancer sa Ninja 7 Hybrid, toute première moto à double motorisation électrique et thermique... Enfin, tout premier \"modèle de production de grande série (à l\'exclusion des scooters) d\'un grand fabricant de motos\", précise Kawa.\r\n\r\nPrès de quinze ans après le retentissant flop des MP3 Hybrid (125 puis 300 LT, même combat), Kawasaki propose une nouvelle machine aux \"commuters\", ces adeptes du \"moto-boulot-dodo\" de plus en plus bridés par les restrictions ou interdictions de circulation dans les grandes villes, par le stationnement régulé, contrôlé voire payant dans les centres-villes...\r\n\r\n    Toutes les nouveautés moto sur MNC\r\n    Toute l’actualité Kawasaki sur MNC\r\n\r\n\"Exploitant la même technologie innovante, unique et révolutionnaire que la Ninja, la Z7 Hybrid 2024 est un roadster combinant un moteur électrique, un moteur thermique et des modes permettant de faire fonctionner les deux moteurs en simultané\", rappellent les Verts d’Europe Ecologie d’Iwata.\r\n\r\n\"La Z7 Hybrid peut fonctionner de trois manières différentes\", appâte Kawasaki. Avec son moteur électrique de 9 kW seul, elle peut s’aventurer dans les zones à faibles émissions et y parcourir jusqu\'à 12 km en mode 100% électrique. Attention, passé ce seuil, \"le moteur thermique assure la charge de la batterie de manière transparente pour le pilote\".\r\n\r\nLes deux autres modes hybrides font simultanément appel aux deux motorisations et donne le choix \"entre une transmission automatique à six rapports ou une sélection manuelle des rapports via deux boutons situés sur le commodo gauche\". On enclenchera le mode \"Sport\" le matin en cas de panne d’oreiller, le mode \"éco-hybride\" pour rentrer tranquillement le soir.\r\n\r\nLa Z7 Hybrid propose un quatrième mode \"Walk\" qui facilite les manoeuvres à basse vitesse et le stationnement, et dispose d\'une fonction Start & Stop qui coupe le moteur thermique à chaque arrêt. Malgré ses accélérations de sportive 1000 cc (fonction \"E-Boost\" de cinq secondes) et sa puissance maxi de 43,5 kW (59 ch), le bicylindre de 451 cc aurait une \"consommation de carburant similaire à une 250 cc\".\r\n\r\nAttendue dans les concessions françaises pour le deuxième trimestre 2024, cette nouvelle \"Zed\" sera proposée dans deux coloris : le premier mêlera Argent, Vert \"Lime\" et Noir \"Ebony\", le second Gris \"Graphenesteel\", Gris \"Ebony\"et \"Graphite\". Le tarif n’est pas encore communiqué : restez connectés !', NULL, 9, NULL, '0Seo09OF9bQ', '83c1aca7167f2e717b9b.jpg', 'a9d4eed86d307a0052f5.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `article_tag`
--

DROP TABLE IF EXISTS `article_tag`;
CREATE TABLE IF NOT EXISTS `article_tag` (
  `article_tag_id` int NOT NULL AUTO_INCREMENT,
  `id_tag` int NOT NULL,
  `id_article` int NOT NULL,
  PRIMARY KEY (`article_tag_id`),
  KEY `id_article` (`id_article`),
  KEY `id_tag` (`id_tag`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `article_tag`
--

INSERT INTO `article_tag` (`article_tag_id`, `id_tag`, `id_article`) VALUES
(1, 1, 9),
(2, 2, 9),
(3, 3, 9),
(11, 1, 11),
(12, 2, 11),
(13, 3, 11),
(14, 4, 11),
(15, 5, 11),
(16, 6, 11),
(17, 7, 11),
(18, 8, 12),
(19, 9, 12),
(20, 10, 12),
(21, 11, 12),
(22, 12, 13),
(23, 13, 13),
(24, 14, 13),
(25, 15, 13),
(26, 12, 14),
(27, 16, 14),
(28, 17, 14),
(29, 3, 14),
(30, 18, 14),
(31, 12, 15),
(32, 19, 15),
(33, 14, 15),
(34, 20, 15),
(35, 12, 16),
(36, 13, 16),
(37, 4, 16),
(38, 12, 17),
(39, 16, 17),
(40, 21, 17),
(41, 3, 17),
(42, 14, 17),
(43, 20, 17),
(44, 1, 18),
(45, 2, 18),
(46, 3, 18),
(47, 4, 18),
(48, 1, 19),
(49, 2, 19),
(50, 3, 19),
(51, 4, 19);

-- --------------------------------------------------------

--
-- Structure de la table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `brand_id` int NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`brand_id`),
  UNIQUE KEY `brand_name` (`brand_name`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(11, 'Aprilia'),
(7, 'BMW'),
(5, 'Ducati'),
(6, 'Harley-Davidson'),
(1, 'Honda'),
(14, 'Husqvarna'),
(12, 'Indian'),
(3, 'Kawasaki'),
(9, 'KTM'),
(10, 'Moto Guzzi'),
(15, 'Royal Enfield'),
(4, 'Suzuki'),
(8, 'Triumph'),
(13, 'Victory'),
(2, 'Yamaha');

-- --------------------------------------------------------

--
-- Structure de la table `category_moto`
--

DROP TABLE IF EXISTS `category_moto`;
CREATE TABLE IF NOT EXISTS `category_moto` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_name` (`category_name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `category_moto`
--

INSERT INTO `category_moto` (`category_id`, `category_name`) VALUES
(3, 'Cruiser'),
(6, 'Custom'),
(4, 'Enduro'),
(1, 'Roadster'),
(2, 'Sportive'),
(5, 'Touring');

-- --------------------------------------------------------

--
-- Structure de la table `images_annonces`
--

DROP TABLE IF EXISTS `images_annonces`;
CREATE TABLE IF NOT EXISTS `images_annonces` (
  `image_id` int NOT NULL AUTO_INCREMENT,
  `image_path` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_annonce` int NOT NULL,
  PRIMARY KEY (`image_id`),
  UNIQUE KEY `image_path` (`image_path`),
  KEY `id_annonce` (`id_annonce`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `model_moto`
--

DROP TABLE IF EXISTS `model_moto`;
CREATE TABLE IF NOT EXISTS `model_moto` (
  `model_id` int NOT NULL AUTO_INCREMENT,
  `model_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_category_moto` int NOT NULL,
  `id_brand` int NOT NULL,
  `year` int NOT NULL,
  PRIMARY KEY (`model_id`),
  KEY `id_brand` (`id_brand`),
  KEY `id_category_moto` (`id_category_moto`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `model_moto`
--

INSERT INTO `model_moto` (`model_id`, `model_name`, `id_category_moto`, `id_brand`, `year`) VALUES
(1, 'CBR 1000RR', 2, 1, 2022),
(2, 'CBR 600RR', 2, 1, 2022),
(3, 'Africatwin', 5, 1, 2021),
(4, 'YZF R1', 2, 2, 2023),
(5, 'YZF R6', 2, 2, 2023),
(6, 'MT-09', 1, 2, 2022),
(7, 'Ninja ZX-10R', 2, 3, 2021),
(8, 'Ninja 650', 1, 3, 2022),
(9, 'Z900', 1, 3, 2022),
(10, 'GSX-R1000', 2, 4, 2022),
(11, 'GSX-R750', 2, 4, 2022),
(12, 'V-Strom 650', 5, 4, 2022),
(13, 'Panigale V4', 2, 5, 2023),
(14, 'Monster 821', 1, 5, 2021),
(15, 'Multistrada 950', 5, 5, 2022),
(16, 'Sportster', 1, 6, 2022),
(17, 'R 1250 GS', 5, 7, 2022),
(18, 'Street Triple', 2, 8, 2023),
(19, '1290 Super Duke R', 2, 9, 2021),
(20, 'V85 TT', 5, 10, 2022),
(21, 'Svartpilen 701', 1, 14, 2019);

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `tag_id` int NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`tag_id`),
  UNIQUE KEY `tag_name` (`tag_name`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tag`
--

INSERT INTO `tag` (`tag_id`, `tag_name`) VALUES
(21, ' 2022'),
(17, ' 2023'),
(2, ' 2024'),
(6, ' Business'),
(14, ' Catégorie'),
(9, ' Environnement'),
(10, ' Lobbying'),
(3, ' Motos'),
(16, ' Nouveautés'),
(7, ' R&D'),
(4, ' Roadster'),
(18, ' Routière'),
(15, ' Scooter'),
(11, ' Sécurité routière'),
(5, ' Sportive'),
(19, ' Tous les Essais'),
(13, ' Tous les Tests'),
(20, ' Trail'),
(12, 'Essais'),
(1, 'Nouveautés'),
(8, 'Société');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `type_id` int NOT NULL AUTO_INCREMENT,
  `type_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`type_id`),
  UNIQUE KEY `type_name` (`type_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`type_id`, `type_name`) VALUES
(2, 'Actualité'),
(1, 'Essai');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_firstname` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_pseudo` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_email` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_password` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `user_is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `user_profile_picture` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_pseudo` (`user_pseudo`),
  UNIQUE KEY `user_profile_picture` (`user_profile_picture`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_name`, `user_pseudo`, `user_email`, `user_password`, `date_of_birth`, `user_is_admin`, `user_profile_picture`) VALUES
(1, 'Florian', 'Morel-Alessi', 'Arashika', 'morelalessi.florian@gmail.com', '$2y$10$PzN1dytEl7yWbx6g.dxvgeHSUk0fza87.z.sliLggzNOpHL0/Wuoa', NULL, 1, NULL),
(7, 'Mathieu', 'Bretille', 'Bretox', 'm.bretille@mnc.com', '$2y$10$KrXvWUcnwVnlx0rbxs6lW.rBE/wx/6gwwpX0NeUhnNc3V415CzK46', NULL, 1, NULL),
(8, 'user', 'User', 'User', 'user@test.com', '$2y$10$iDsLnMjNmpxiblBxBT50auE8zpScqERbGcd8t9VxHbgNNPjly5GsC', NULL, 0, NULL),
(9, 'Alexandre ', 'BARDIN', 'Bardin', 'b.alex@mnc.com', '$2y$10$eJyv3oHRYR1qBCVcxjdg0ulpyUtFkVMQ74qW9sXEcjOEBAmbGk3Pu', NULL, 1, NULL),
(10, 'Lucas', 'Delobelle', 'ld_web', 'ldweb@php.com', '$2y$10$/JWg8R2y8i3MSi1CqOoYVO2HVtq76I0THdgv49G.gAa4ZXGObzj3y', NULL, 1, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD CONSTRAINT `annonces_ibfk_1` FOREIGN KEY (`id_moto`) REFERENCES `model_moto` (`model_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `annonces_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`brand_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `category_moto` (`category_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `article_ibfk_3` FOREIGN KEY (`id_type`) REFERENCES `type` (`type_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `article_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `article_tag`
--
ALTER TABLE `article_tag`
  ADD CONSTRAINT `article_tag_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`article_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `article_tag_ibfk_2` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`tag_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `images_annonces`
--
ALTER TABLE `images_annonces`
  ADD CONSTRAINT `images_annonces_ibfk_1` FOREIGN KEY (`id_annonce`) REFERENCES `annonces` (`annonce_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `model_moto`
--
ALTER TABLE `model_moto`
  ADD CONSTRAINT `model_moto_ibfk_1` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`brand_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `model_moto_ibfk_2` FOREIGN KEY (`id_category_moto`) REFERENCES `category_moto` (`category_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
