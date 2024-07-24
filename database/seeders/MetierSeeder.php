<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $metiers = [
            ['id' => 1,'metier' => 'Menuisier', 'description_metier' => 'Travail du bois pour fabriquer des meubles.'],
            ['id' => 2,'metier' => 'Forgeron', 'description_metier' => 'Forge et façonne le métal pour créer des outils et des objets.'],
            ['id' => 3,'metier' => 'Cordonnier', 'description_metier' => 'Répare et fabrique des chaussures.'],
            ['id' => 4,'metier' => 'Tailleur', 'description_metier' => 'Confectionne des vêtements sur mesure.'],
            ['id' => 5,'metier' => 'Potier', 'description_metier' => 'Fabrique des objets en céramique.'],
            ['id' => 6,'metier' => 'Sculpteur', 'description_metier' => 'Crée des sculptures à partir de différents matériaux.'],
            ['id' => 7,'metier' => 'Bijoutier', 'description_metier' => 'Crée et répare des bijoux.'],
            ['id' => 8,'metier' => 'Ébéniste', 'description_metier' => 'Fabrique des meubles en bois de haute qualité.'],
            ['id' => 9,'metier' => 'Maroquinier', 'description_metier' => 'Travaille le cuir pour créer des sacs et accessoires.'],
            ['id' => 10,'metier' => 'Tisserand', 'description_metier' => 'Fabrique des tissus en utilisant un métier à tisser.'],
            ['id' => 11,'metier' => 'Verrier', 'description_metier' => 'Travaille le verre pour créer des objets décoratifs.'],
            ['id' => 12,'metier' => 'Horloger', 'description_metier' => 'Répare et fabrique des montres et des horloges.'],
            ['id' => 13,'metier' => 'Céramiste', 'description_metier' => 'Fabrique des objets en céramique.'],
            ['id' => 14,'metier' => 'Relieur', 'description_metier' => 'Restaure et fabrique des livres reliés.'],
            ['id' => 15,'metier' => 'Peintre en bâtiment', 'description_metier' => 'Peint et décore les bâtiments.'],
            ['id' => 16,'metier' => 'Tapissier', 'description_metier' => 'Fabrique et répare des sièges et des meubles rembourrés.'],
            ['id' => 17,'metier' => 'Serrurier', 'description_metier' => 'Travaille avec les serrures et les systèmes de sécurité.'],
            ['id' => 18,'metier' => 'Souffleur de verre', 'description_metier' => 'Utilise la technique du soufflage pour créer des objets en verre.'],
            ['id' => 19,'metier' => 'Restaurateur d\'art', 'description_metier' => 'Restaure et conserve des œuvres d\'art.'],
            ['id' => 20,'metier' => 'Facteur d\'instruments de musique', 'description_metier' => 'Fabrique et répare des instruments de musique.'],
            ['id' => 21,'metier' => 'Luthier', 'description_metier' => 'Fabrique et répare des instruments à cordes.'],
            ['id' => 22,'metier' => 'Ferronnier', 'description_metier' => 'Travaille le fer forgé pour créer des objets décoratifs et utilitaires.'],
            ['id' => 23,'metier' => 'Tonnelier', 'description_metier' => 'Fabrique des tonneaux et des fûts en bois.'],
            ['id' => 24,'metier' => 'Coutelier', 'description_metier' => 'Fabrique et répare des couteaux et autres outils tranchants.'],
            ['id' => 25,'metier' => 'Chaudronnier', 'description_metier' => 'Travaille le métal pour fabriquer des récipients et des structures métalliques.'],
            ['id' => 26,'metier' => 'Brodeur', 'description_metier' => 'Décore des tissus avec des motifs brodés.'],
            ['id' => 27,'metier' => 'Plombier', 'description_metier' => 'Installe et répare les systèmes de plomberie.'],
            ['id' => 28,'metier' => 'Peintre en lettres', 'description_metier' => 'Crée des enseignes et des lettrages peints à la main.'],
            ['id' => 29,'metier' => 'Graveur', 'description_metier' => 'Crée des motifs gravés sur divers matériaux.'],
            ['id' => 30,'metier' => 'Calligraphe', 'description_metier' => 'Pratique l\'art de la belle écriture.'],
            ['id' => 31,'metier' => 'Peintre en décor', 'description_metier' => 'Crée des peintures décoratives sur divers supports.'],
            ['id' => 32,'metier' => 'Maçon', 'description_metier' => 'Construit et répare des structures en pierre, en brique ou en béton.'],
            ['id' => 33,'metier' => 'Charpentier', 'description_metier' => 'Travaille le bois pour construire des structures telles que des maisons et des ponts.'],
            ['id' => 34,'metier' => 'Tailleur de pierre', 'description_metier' => 'Sculpte et taille la pierre pour créer des structures et des objets décoratifs.'],
            ['id' => 35,'metier' => 'Cordonnerie-bottier', 'description_metier' => 'Fabrique des bottes sur mesure.'],
            ['id' => 36,'metier' => 'Serrurier-métallier', 'description_metier' => 'Crée et installe des structures métalliques comme des grilles et des portails.'],
            ['id' => 37,'metier' => 'Vitrier', 'description_metier' => 'Installe et répare des fenêtres et des vitrages.'],
            ['id' => 38,'metier' => 'Chauffagiste', 'description_metier' => 'Installe et répare des systèmes de chauffage.'],
            ['id' => 39,'metier' => 'Orfèvre', 'description_metier' => 'Travaille les métaux précieux pour créer des objets décoratifs.'],
            ['id' => 40,'metier' => 'Marbrier', 'description_metier' => 'Travaille le marbre pour créer des objets décoratifs et des monuments.'],
            ['id' => 41,'metier' => 'Mosaïste', 'description_metier' => 'Crée des mosaïques en utilisant des tesselles.'],
            ['id' => 42,'metier' => 'Zingueur', 'description_metier' => 'Travaille le zinc pour des applications de toiture et de plomberie.'],
            ['id' => 43,'metier' => 'Gantier', 'description_metier' => 'Fabrique des gants sur mesure.'],
            ['id' => 44,'metier' => 'Taille-doucier', 'description_metier' => 'Grave des motifs sur des plaques de métal pour l\'impression.'],
            ['id' => 45,'metier' => 'Archetier', 'description_metier' => 'Fabrique des archets pour instruments à cordes.'],
            ['id' => 46,'metier' => 'Vannier', 'description_metier' => 'Tresse des objets en osier.'],
            ['id' => 47,'metier' => 'Perlier', 'description_metier' => 'Travaille les perles pour créer des bijoux.'],
            ['id' => 48,'metier' => 'Canneur', 'description_metier' => 'Répare et fabrique des sièges cannés.'],
            ['id' => 49,'metier' => 'Dorure', 'description_metier' => 'Applique de la dorure sur divers objets.']        ];

        foreach ($metiers as $metier) {
            DB::table('metiers')->insert($metier);
        }
    }
}
