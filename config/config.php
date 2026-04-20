<?php
$cardValues = [100, 200, 300, 400, 500];
$categories = ['science', 'history', 'literature', 'pop culture', 'food'];

$gameData = [
    "science" => [
        100 => ["q" => "\"Commonly known as the 'Red Planet'.\"", "a" => "Mars"],
        200 => ["q" => "\"This constant is approximately 299,792,458 meters per second.\"", "a" => "Speed of Light"],
        300 => ["q" => "\"The organelle often referred to as the powerhouse of the cell.\"", "a" => "Mitochondria"],
        400 => ["q" => "\"The closest star to Earth.\"", "a" => "The Sun"],
        500 => ["q" => "\"Represented by the symbol 'He', it is the lightest of the noble gases.\"", "a" => "Helium"]
    ],
    "history" => [
        100 => ["q" => "\"He served as the first President of the United States.\"", "a" => "George Washington"],
        200 => ["q" => "\"The French military leader who crowned himself Emperor in 1804.\"", "a" => "Napoleon Bonaparte"],
        300 => ["q" => "\"This 'unsinkable' British passenger liner sank on its maiden voyage in 1912.\"", "a" => "Titanic"],
        400 => ["q" => "\"The year the Berlin Wall finally fell, signaling the end of the Cold War.\"", "a" => "1989"],
        500 => ["q" => "\"The year the Magna Carta was signed by King John at Runnymede.\"", "a" => "1215"]
    ],
    "literature" => [
        100 => ["q" => "\"The English playwright who wrote 'Romeo and Juliet' and 'Hamlet'.\"", "a" => "William Shakespeare"],
        200 => ["q" => "\"The author who created the world-famous detective Sherlock Holmes.\"", "a" => "Arthur Conan Doyle"],
        300 => ["q" => "\"The author of the dystopian novel '1984'.\"", "a" => "George Orwell"],
        400 => ["q" => "\"The obsessive captain of the Pequod in Herman Melville's 'Moby-Dick'.\"", "a" => "Captain Ahab"],
        500 => ["q" => "\"The Italian poet famous for writing 'The Divine Comedy'.\"", "a" => "Dante Alighieri"]
    ],
    "pop culture" => [
        100 => ["q" => "\"Often referred to as the 'King of Pop'.\"", "a" => "Michael Jackson"],
        200 => ["q" => "\"The filmmaker responsible for the 1975 blockbuster 'Jaws'.\"", "a" => "Steven Spielberg"],
        300 => ["q" => "\"The comedic actor who provided the voice for the ogre Shrek.\"", "a" => "Mike Myers"],
        400 => ["q" => "\"The Dutch post-impressionist painter of 'The Starry Night'.\"", "a" => "Vincent van Gogh"],
        500 => ["q" => "\"An acronym for someone who has won an Emmy, Grammy, Oscar, and Tony.\"", "a" => "EGOT"]
    ],
    "food" => [
        100 => ["q" => "\"The primary green fruit used as the base for guacamole.\"", "a" => "Avocado"],
        200 => ["q" => "\"An alcoholic beverage made from fermented grapes.\"", "a" => "Wine"],
        300 => ["q" => "\"The scale used to measure the pungency or spicy heat of chili peppers.\"", "a" => "Scoville Scale"],
        400 => ["q" => "\"The Japanese name for the dried edible seaweed used to wrap sushi.\"", "a" => "Nori"],
        500 => ["q" => "\"A brined curd white cheese traditionally made in Greece from sheep's milk.\"", "a" => "Feta"]
    ]
];

$gameDataHard = [
    "science" => [
        100 => ["q" => "\"The subatomic particle composed of two up quarks and one down quark.\"", "a" => "Proton"],
        200 => ["q" => "\"The specific type of heat transfer occurring through electromagnetic waves.\"", "a" => "Radiation"],
        300 => ["q" => "\"The chemical process of converting sugars into cellular energy in the absence of oxygen.\"", "a" => "Anaerobic Respiration"],
        400 => ["q" => "\"The principle stating that it is impossible to know both the position and momentum of a particle simultaneously.\"", "a" => "Heisenberg Uncertainty Principle"],
        500 => ["q" => "\"The term for the maximum displacement from the equilibrium position in a wave.\"", "a" => "Amplitude"]
    ],
    "history" => [
        100 => ["q" => "\"The 1648 treaty that ended the Thirty Years' War.\"", "a" => "Peace of Westphalia"],
        200 => ["q" => "\"The ancient civilization that developed the Code of Hammurabi.\"", "a" => "Babylonians"],
        300 => ["q" => "\"The year the Byzantine Empire fell to the Ottoman Turks.\"", "a" => "1453"],
        400 => ["q" => "\"The primary author of the 1789 'Declaration of the Rights of Man and of the Citizen'.\"", "a" => "Marquis de Lafayette"],
        500 => ["q" => "\"The secret 1917 telegram that helped draw the United States into WWI.\"", "a" => "Zimmermann Telegram"]
    ],
    "literature" => [
        100 => ["q" => "\"The protagonist of James Joyce's 'Ulysses'.\"", "a" => "Leopold Bloom"],
        200 => ["q" => "\"The literary term for a character whose qualities contrast with another's to highlight specific traits.\"", "a" => "Foil"],
        300 => ["q" => "\"The author of the 14th-century Middle English poem 'Sir Gawain and the Green Knight'.\"", "a" => "The Pearl Poet"],
        400 => ["q" => "\"The real name of the French author who wrote under the pseudonym George Sand.\"", "a" => "Amantine Lucile Aurore Dupin"],
        500 => ["q" => "\"The philosophical movement explored in Albert Camus' 'The Myth of Sisyphus'.\"", "a" => "Absurdism"]
    ],
    "pop culture" => [
        100 => ["q" => "\"The 1927 film widely considered the first 'talkie' (feature-length film with synchronized dialogue).\"", "a" => "The Jazz Singer"],
        200 => ["q" => "\"The architect who designed the Guggenheim Museum in New York City.\"", "a" => "Frank Lloyd Wright"],
        300 => ["q" => "\"The first video game ever to be played in space (on a Game Boy in 1993).\"", "a" => "Tetris"],
        400 => ["q" => "\"The artist who created the 'Red, Blue, Yellow' neoplasticism paintings.\"", "a" => "Piet Mondrian"],
        500 => ["q" => "\"The first non-English language film to win the Academy Award for Best Picture.\"", "a" => "Parasite"]
    ],
    "food" => [
        100 => ["q" => "\"The culinary term for a mixture of equal parts flour and fat used as a thickener.\"", "a" => "Roux"],
        200 => ["q" => "\"The specific region of Italy where Balsamic Vinegar must be produced to be considered 'Traditional'.\"", "a" => "Modena"],
        300 => ["q" => "\"The French term for food prepared 'in the style of the miller's wife' (lightly floured and sautéed in butter).\"", "a" => "Meunière"],
        400 => ["q" => "\"The chemical compound responsible for the 'earthy' smell and taste of beets and soil.\"", "a" => "Geosmin"],
        500 => ["q" => "\"The world's most expensive spice by weight, derived from the Crocus sativus flower.\"", "a" => "Saffron"]
    ]
];

$isMaster = ($_SESSION['streak'] >= 3);
$deckName = $isMaster ? "HARD DECK" : "EASY DECK";
$badgeColor = $isMaster ? "#800000" : "#0056b3";
?>