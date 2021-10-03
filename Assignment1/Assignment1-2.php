<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap head -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384- BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap- theme.min.css" integrity="sha384- rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384- Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- Making some space for the navbar -->
    <style>
        .header {
            padding: 40px;
        }
    </style>
</head>

<body>
    <!-- Multidimensional Array containing the animal, an early year, and some info about the zodiac-->
    <?php
    $zodiac = array(
        // Element 1: Rat
        array("Rat", 1924, "Ranking the first in the Chinese zodiac, rat represents wisdom. Personality traits for the people born in the year of the Rat are intelligent, charming, quick-witted, practical, ambitious, and good at economizing as well as social activities. The weaknesses are that the Rats are likely to be timid, stubborn, wordy, greedy, devious, too eager for power and love to gossip."),
        // Element 2: Ox
        array("Ox", 1925, "In 2021 - the Xin Chou year, the Chou (丑) earthly branch corresponds to the animal sign Ox, which belongs to earth in five elements. Therefore, Ox people will conflict Tai Sui. The heavenly stem Xin (辛) of 2021 belongs to metal, which is in the generating cycle with earth and it will promote the Ox horoscope to a certain extent. However, Ox horoscope will be suppressed by Tai Sui in Ben Ming Nian."),
        // Element 3: Tiger
        array("Tiger", 1926, "Ranking as the third animal in the Chinese zodiac, Tigers are the symbol of brave. People born in the year of the Tiger are friendly, brave, competitive, charming and endowed with good luck and authority. With indomitable fortitude and great confidence, the tiger people can be competent leaders. On the other side, they are likely to be impetuous, irritable, overindulged and love to boast to others."),
        // Element 4: Rabbit
        array("Rabbit", 1927, "Rabbit (Hare) represents longevity, discretion and good luck. It has the fourth position in the Chinese Zodiac. People born under the sign of the Rabbit are kind-hearted, friendly, intelligent, cautious, skillful, gentle, quick and live long. They dislike fighting and like to find solutions through compromise and negotiation. On the negative side, Rabbit people have the potential to be superficial, stubborn, melancholy and overly-discreet."),
        // Element 5: Dragon
        array("Dragon", 1928, "As the symbol of Chinese nation, dragon represents authority and good fortune. It has the fifth position among the Chinese zodiac animals. People born in the year of the Dragon are powerful, kind-hearted, successful, innovative, brave, healthy courageous and enterprising. However, they tend to be conceited, scrutinizing, tactless, quick-tempered and over-confident."),
        // Element 6: Snake
        array("Snake", 1929, "Among the Chinese Zodiac animals, Snake has the sixth position. Snake is regarded to be pliable. Some of the positive characteristics of the people born in the year of the Snake are wise, discreet, agile, attractive and full of sympathy. On the other hand, there is a tendency for them to be lazy, greedy, arrogant and indulging in self-admiration."),
        // Element 7: Horse
        array("Horse", 1930, "Horse has an indomitable spirit and is always moving toward a goal. It ranks the seventh in the Chinese Zodiac. People born under the sign of the Horse are clever, active, energetic, quick-witted, fashionable, agile, popular among others and have the ability to persuade others. On the other side, they might be some selfish, arrogant and over-confident."),
        // Element 8: Goat
        array("Goat", 1931, "Ranking the eighth position of all the animals in Chinese zodiac, Sheep (also Goat or Ram) represents solidarity, harmony and calmness. People born in the year of the Sheep are polite, mild mannered, shy, imaginative, determined and have good taste. On the negative side, they are sometimes pessimistic, unrealistic, short-sighted and slow in behavior."),
        // Element 9: Monkey
        array("Monkey", 1932, "Monkey ranks ninth position in the Chinese Zodiac. They are cheerful and energetic by nature and usually represent flexibility. People under the sign of the Monkey are wise, intelligent, confident, charismatic, loyal, inventive and have leadership. The weaknesses of the Monkeys are being egotistical, arrogant, crafty, restless and snobbish."),
        // Element 10: Rooster
        array("Rooster", 1933, "Rooster (or Chicken) ranks the tenth among the Chinese zodiac animals. In Chinese culture, Rooster represents fidelity and punctuality, for it wakes people up on time. People born in the year of the Rooster are beautiful, kind-hearted, hard-working, courageous, independent, humorous and honest. They like to keep home neat and organized. On the other side, they might be arrogant, self-aggrandizing, persuasive to others and wild as well as admire things or persons blindly."),
        // Element 11: Dog
        array("Dog", 1934, "Ranking as the eleventh animal in Chinese zodiac, Dog is the symbol of loyalty and honesty. People born in the Year of the Dog possess the best traits of human nature. They are honest, friendly, faithful, loyal, smart, straightforward, venerable and have a strong sense of responsibility. On the negative side, they are likely to be self-righteous, cold, terribly stubborn, slippery, critical of others and not good at social activities."),
        // Element 12: Pig
        array("Pig", 1935, "Occupying the last position in 12 Chinese Zodiac animals, Pig is mild and a lucky animal representing carefree fun, good fortune and wealth. Personality traits of the people born under the sign of the Pig are happy, easygoing, honest, trusting, educated, sincere and brave. The possible dark sides the Pig people are stubbornness, naive, over-reliant, self-indulgent, easy to anger and materialistic. They are sometimes regarded as being lazy.")
    );
    ?>
    <header class="header" id="top">
        <!-- Fixed to the top - Navbar with buttons for each zodiac animal -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <!-- When the window shrinks, links on the navbar become a dropdown box with 3 icon bars as the button -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navBar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Chinese Zodiac</a>
                </div>
                <!-- Navbar that responds according to the size of the screen -->
                <div class="collapse navbar-collapse" id="navBar">
                    <ul class="nav navbar-nav">
                        <!-- Links that bring you to the corresponding location on the page -->
                        <li><a href="#top">Rat</a></li>
                        <li><a href="#Ox">Ox</a></li>
                        <li><a href="#Tiger">Tiger</a></li>
                        <li><a href="#Rabbit">Rabbit</a></li>
                        <li><a href="#Dragon">Dragon</a></li>
                        <li><a href="#Snake">Snake</a></li>
                        <li><a href="#Horse">Horse</a></li>
                        <li><a href="#Goat">Goat</a></li>
                        <li><a href="#Monkey">Monkey</a></li>
                        <li><a href="#Rooster">Rooster</a></li>
                        <li><a href="#Dog">Dog</a></li>
                        <li><a href="#Pig">Pig</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <!-- button that brings you back to the top of the page from anywhere -->
                        <li><a href="#top"><button class="btn btn-md btn-danger"><span class="glyphicon glyphicon-circle-arrow-up"></span> TOP</button></a></li>
                    </ul>
                </div>
        </nav>
    </header>

    <div class="container-fluid">
        <?php
        // Loops through this block of code once for each element in the array.
        for ($i = 0; $i < count($zodiac); $i++) {
            // Creates a heading for each animal and assigns it an id.
            echo '<h1 id="' . $zodiac[$i][0] . '">' . $zodiac[$i][0] . '</h1>';
            // nested while loop generates all the dates for each zodiac sign
            while ($zodiac[$i][1] < 2100) {
                // Creates a badge for each date displayed
                echo '<kbd>' . $zodiac[$i][1] . '</kbd>';
                // Increments the year by 12 each iteration. Each cycle is 12 years.
                $zodiac[$i][1] += 12;
            }
            // displays the approriate quote for each zodiac animal inside a blockquote with an attribution.
            echo '<blockquote class="bg-info">' . $zodiac[$i][2] . '<footer> - chinesenewyear.net</footer></blockquote><br>';
        }
        ?>
    </div>


</body>

</html>