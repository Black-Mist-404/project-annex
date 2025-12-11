<?php

namespace App\DataFixtures;

use App\Entity\Team;
use App\Entity\Player;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Team 1: Real Madrid
        $team1 = new Team();
        $team1->setName('Real Madrid');
        $team1->setLogo('https://upload.wikimedia.org/wikipedia/en/thumb/5/56/Real_Madrid_CF.svg/150px-Real_Madrid_CF.svg.png');
        $team1->setFoundedYear(1902);
        $team1->setCountry('Spain');
        $team1->setTitles(35);
        $manager->persist($team1);

        // Players for Real Madrid
        $realMadridPlayers = [
            ['Thibaut Courtois', 'GK', '1992-05-11'],
            ['Andriy Lunin', 'GK', '1999-02-11'],
            ['Dani Carvajal', 'RB', '1992-01-11'],
            ['David Alaba', 'CB', '1992-06-24'],
            ['Éder Militão', 'CB', '1998-01-18'],
            ['Antonio Rüdiger', 'CB', '1993-03-03'],
            ['Nacho', 'CB', '1990-01-18'],
            ['Ferland Mendy', 'LB', '1995-06-08'],
            ['Federico Valverde', 'CM', '1998-07-22'],
            ['Toni Kroos', 'CM', '1990-01-04'],
            ['Luka Modrić', 'CM', '1985-09-09'],
            ['Eduardo Camavinga', 'CM', '2002-11-10'],
            ['Aurélien Tchouaméni', 'CDM', '2000-01-27'],
            ['Jude Bellingham', 'CAM', '2003-06-29'],
            ['Vinícius Júnior', 'LW', '2000-07-12'],
            ['Rodrygo', 'RW', '2001-01-09'],
            ['Joselu', 'ST', '1990-03-27'],
            ['Brahim Díaz', 'CAM', '1999-08-03'],
            ['Arda Güler', 'CAM', '2005-02-25'],
            ['Lucas Vázquez', 'RB', '1991-07-01']
        ];

        foreach ($realMadridPlayers as $playerData) {
            $player = new Player();
            $player->setName($playerData[0]);
            $player->setPhoto($this->getPlayerPhoto($playerData[0]));
            $player->setPosition($playerData[1]);
            $player->setBirthdate(new \DateTime($playerData[2]));
            $player->setTeam($team1);
            $manager->persist($player);
        }

        // Team 2: FC Barcelona
        $team2 = new Team();
        $team2->setName('FC Barcelona');
        $team2->setLogo('https://upload.wikimedia.org/wikipedia/en/thumb/4/47/FC_Barcelona_%28crest%29.svg/150px-FC_Barcelona_%28crest%29.svg.png');
        $team2->setFoundedYear(1899);
        $team2->setCountry('Spain');
        $team2->setTitles(27);
        $manager->persist($team2);

        // Players for Barcelona
        $barcelonaPlayers = [
            ['Marc-André ter Stegen', 'GK', '1992-04-30'],
            ['Iñaki Peña', 'GK', '1999-03-02'],
            ['Ronald Araújo', 'CB', '1999-03-07'],
            ['Andreas Christensen', 'CB', '1996-04-10'],
            ['Jules Koundé', 'CB', '1998-11-12'],
            ['Alejandro Balde', 'LB', '2003-10-18'],
            ['João Cancelo', 'RB', '1994-05-27'],
            ['Marcos Alonso', 'LB', '1990-12-28'],
            ['Oriol Romeu', 'CDM', '1991-09-24'],
            ['Pedri', 'CM', '2002-11-25'],
            ['Gavi', 'CM', '2004-08-05'],
            ['Frenkie de Jong', 'CM', '1997-05-12'],
            ['İlkay Gündoğan', 'CM', '1990-10-24'],
            ['Robert Lewandowski', 'ST', '1988-08-21'],
            ['Raphinha', 'RW', '1996-12-14'],
            ['Ferran Torres', 'RW', '2000-02-29'],
            ['João Félix', 'LW', '1999-11-10'],
            ['Lamine Yamal', 'RW', '2007-07-13'],
            ['Fermín López', 'CM', '2003-05-11'],
            ['Sergi Roberto', 'CM', '1992-02-07']
        ];

        foreach ($barcelonaPlayers as $playerData) {
            $player = new Player();
            $player->setName($playerData[0]);
            $player->setPhoto($this->getPlayerPhoto($playerData[0]));
            $player->setPosition($playerData[1]);
            $player->setBirthdate(new \DateTime($playerData[2]));
            $player->setTeam($team2);
            $manager->persist($player);
        }

        // Team 3: Manchester City
        $team3 = new Team();
        $team3->setName('Manchester City');
        $team3->setLogo('https://upload.wikimedia.org/wikipedia/en/thumb/e/eb/Manchester_City_FC_badge.svg/150px-Manchester_City_FC_badge.svg.png');
        $team3->setFoundedYear(1880);
        $team3->setCountry('England');
        $team3->setTitles(9);
        $manager->persist($team3);

        // Players for Manchester City
        $cityPlayers = [
            ['Ederson', 'GK', '1993-08-17'],
            ['Stefan Ortega', 'GK', '1992-11-06'],
            ['Kyle Walker', 'RB', '1990-05-28'],
            ['Rúben Dias', 'CB', '1997-05-14'],
            ['John Stones', 'CB', '1994-05-28'],
            ['Manuel Akanji', 'CB', '1995-07-19'],
            ['Nathan Aké', 'CB', '1995-02-18'],
            ['Josko Gvardiol', 'CB', '2002-01-23'],
            ['Rodri', 'CDM', '1996-06-22'],
            ['Kevin De Bruyne', 'CM', '1991-06-28'],
            ['Bernardo Silva', 'CAM', '1994-08-10'],
            ['Jack Grealish', 'LW', '1995-09-10'],
            ['Phil Foden', 'RW', '2000-05-28'],
            ['Erling Haaland', 'ST', '2000-07-21'],
            ['Julián Álvarez', 'ST', '2000-01-31'],
            ['Mateo Kovačić', 'CM', '1994-05-06'],
            ['Matheus Nunes', 'CM', '1998-08-27'],
            ['Kalvin Phillips', 'CDM', '1995-12-02'],
            ['Sergio Gómez', 'LB', '2000-09-04'],
            ['Rico Lewis', 'RB', '2004-11-21']
        ];

        foreach ($cityPlayers as $playerData) {
            $player = new Player();
            $player->setName($playerData[0]);
            $player->setPhoto($this->getPlayerPhoto($playerData[0]));
            $player->setPosition($playerData[1]);
            $player->setBirthdate(new \DateTime($playerData[2]));
            $player->setTeam($team3);
            $manager->persist($player);
        }

        // Team 4: Bayern Munich
        $team4 = new Team();
        $team4->setName('Bayern Munich');
        $team4->setLogo('https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/FC_Bayern_M%C3%BCnchen_logo_%282017%29.svg/150px-FC_Bayern_M%C3%BCnchen_logo_%282017%29.svg.png');
        $team4->setFoundedYear(1900);
        $team4->setCountry('Germany');
        $team4->setTitles(32);
        $manager->persist($team4);

        // Players for Bayern Munich
        $bayernPlayers = [
            ['Manuel Neuer', 'GK', '1986-03-27'],
            ['Sven Ulreich', 'GK', '1988-08-03'],
            ['Dayot Upamecano', 'CB', '1998-10-27'],
            ['Matthijs de Ligt', 'CB', '1999-08-12'],
            ['Kim Min-jae', 'CB', '1996-11-15'],
            ['Benjamin Pavard', 'RB', '1996-03-28'],
            ['Alphonso Davies', 'LB', '2000-11-02'],
            ['Joshua Kimmich', 'CDM', '1995-02-08'],
            ['Leon Goretzka', 'CM', '1995-02-06'],
            ['Thomas Müller', 'CAM', '1989-09-13'],
            ['Jamal Musiala', 'CAM', '2003-02-26'],
            ['Leroy Sané', 'RW', '1996-01-11'],
            ['Kingsley Coman', 'LW', '1996-06-13'],
            ['Serge Gnabry', 'RW', '1995-07-14'],
            ['Harry Kane', 'ST', '1993-07-28'],
            ['Eric Maxim Choupo-Moting', 'ST', '1989-03-23'],
            ['Konrad Laimer', 'CM', '1997-05-27'],
            ['Noussair Mazraoui', 'RB', '1997-11-14'],
            ['Mathys Tel', 'ST', '2005-04-27'],
            ['Raphaël Guerreiro', 'LB', '1993-12-22']
        ];

        foreach ($bayernPlayers as $playerData) {
            $player = new Player();
            $player->setName($playerData[0]);
            $player->setPhoto($this->getPlayerPhoto($playerData[0]));
            $player->setPosition($playerData[1]);
            $player->setBirthdate(new \DateTime($playerData[2]));
            $player->setTeam($team4);
            $manager->persist($player);
        }

        // Team 5: Paris Saint-Germain
        $team5 = new Team();
        $team5->setName('Paris Saint-Germain');
        $team5->setLogo('https://upload.wikimedia.org/wikipedia/en/thumb/a/a7/Paris_Saint-Germain_F.C..svg/150px-Paris_Saint-Germain_F.C..svg.png');
        $team5->setFoundedYear(1970);
        $team5->setCountry('France');
        $team5->setTitles(11);
        $manager->persist($team5);

        // Players for PSG
        $psgPlayers = [
            ['Gianluigi Donnarumma', 'GK', '1999-02-25'],
            ['Keylor Navas', 'GK', '1986-12-15'],
            ['Marquinhos', 'CB', '1994-05-14'],
            ['Presnel Kimpembe', 'CB', '1995-08-13'],
            ['Danilo Pereira', 'CB', '1991-09-09'],
            ['Achraf Hakimi', 'RB', '1998-11-04'],
            ['Nuno Mendes', 'LB', '2002-06-19'],
            ['Lucas Hernández', 'CB', '1996-02-14'],
            ['Marco Verratti', 'CM', '1992-11-05'],
            ['Vitinha', 'CM', '2000-02-13'],
            ['Fabian Ruiz', 'CM', '1996-04-03'],
            ['Manuel Ugarte', 'CDM', '2001-04-11'],
            ['Warren Zaïre-Emery', 'CM', '2006-03-08'],
            ['Kylian Mbappé', 'ST', '1998-12-20'],
            ['Ousmane Dembélé', 'RW', '1997-05-15'],
            ['Randal Kolo Muani', 'ST', '1998-12-05'],
            ['Gonçalo Ramos', 'ST', '2001-06-20'],
            ['Bradley Barcola', 'LW', '2002-09-02'],
            ['Carlos Soler', 'CM', '1997-01-02'],
            ['Nordi Mukiele', 'RB', '1997-11-01']
        ];

        foreach ($psgPlayers as $playerData) {
            $player = new Player();
            $player->setName($playerData[0]);
            $player->setPhoto($this->getPlayerPhoto($playerData[0]));
            $player->setPosition($playerData[1]);
            $player->setBirthdate(new \DateTime($playerData[2]));
            $player->setTeam($team5);
            $manager->persist($player);
        }

        $manager->flush();
    }

    private function getPlayerPhoto(string $playerName): string
    {
        // Simple avatar generator that always works
        $encodedName = urlencode($playerName);
        
        // Use DiceBear API for consistent, working avatars
        $styles = ['adventurer', 'avataaars', 'big-ears', 'big-smile', 'croodles', 'micah', 'miniavs', 'open-peeps', 'personas', 'pixel-art'];
        $style = $styles[array_rand($styles)];
        
        return "https://api.dicebear.com/7.x/$style/svg?seed=$encodedName&backgroundColor=ffd5dc,d1d4f9,c0ebf5,b6e3f4,ffdfbf,ffd5dc";
    }
}