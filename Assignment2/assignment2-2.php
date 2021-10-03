<!-- Vincent Adams - COP 2842_54FZ_FA21 - 9/16/2021 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 2-2</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384- BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap- theme.min.css" integrity="sha384- rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384- Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<style>
    header {
        background-color: brown;
        color: white;
        padding: 25px;
    }
</style>

<body>
    <?php
    // class dog requires a name, the breed of the dog, a picture sources, and an interesting fact
    class Dog
    {
        // declare variables
        private $name;
        private $breed;
        private $pic;
        private $fact;

        // initialize variables
        function __construct($name, $breed, $pic, $fact)
        {
            $this->name = $name;
            $this->breed = $breed;
            $this->pic = $pic;
            $this->fact = $fact;
        }
        // Getters and Setters
        public function getName()
        {
            return $this->name;
        }

        public function setName($name)
        {
            $this->name = $name;
        }

        public function getBreed()
        {
            return $this->breed;
        }

        public function setBreed($breed)
        {
            $this->breed = $breed;
        }

        public function getPic()
        {
            return $this->pic;
        }

        public function setPic($pic)
        {
            $this->pic = $pic;
        }

        public function getFact()
        {
            return $this->fact;
        }

        public function setFact($fact)
        {
            $this->fact = $fact;
        }
    }
    // end class

    // objects of Dog class
    $lexus = new Dog("Lexus", "Pit/Labrador", "LEXUS.jpg", "Lexus does not actually wear glasses to see.");
    $koopa = new Dog("Koopa", "Pit/German Shepherd", "KOOPA.jpg", "Koopa has been quarentined for biting a human.");
    $bear = new Dog("Bear", "Chow", "BEAR.jpg", "Bear is incredibly agile for his weight.");
    $bailey = new Dog("Bailey", "Australian Shepherd", "BAILEY.jpg", "Bailey is terrified of rain and thunder.");
    $gryffin = new Dog("Gryffin", "Red Nose Pitbull", "GRYFFIN.jpg", "Gryffin scratches his own belly on the carpet.");
    $maddie = new Dog("Maddie", "Labrador Retriever", "MADDIE.jpg", "Maddie is a cancer survivor!");

    // array of Dog objects
    $dogs = array($koopa, $bear, $maddie, $bailey, $lexus, $gryffin);
    // sorts the objects in alphabetical order
    sort($dogs);
    ?>
    <!-- end php -->

    <!-- header -->
    <header>
        <h1><strong>D<u>ogipedia</u></strong></h1>
    </header>
    <!-- navigation tabs -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <ul class="nav nav-tabs">
                    <!-- for each element in the $dogs array, creates a tab containing the name of the dog and points 
                    to the associated media object created below -->
                    <?php
                    for ($i = 0; $i < count($dogs); $i++) {
                        if ($i == 0) {
                            echo "<li class='active'><a data-toggle='tab' href='#" . $dogs[$i]->getName() . "'>" .
                                $dogs[$i]->getName() . "</a></li>";
                        } else {
                            echo "<li><a data-toggle='tab' href='#" . $dogs[$i]->getName() . "'>" .
                                $dogs[$i]->getName() . "</a></li>";
                        }
                    }
                    ?>
                </ul>
                <!-- The content each tab will display -->
                <div class="tab-content">
                    <!-- for each Dog element added to the array, displays a picture, the name, breed, and a fact -->
                    <?php
                    for ($i = 0; $i < count($dogs); $i++) {
                        if ($i == 0) {
                            // generates the content for the tab at index 0 and sets it as active
                            echo "<div id='" . $dogs[$i]->getName() . "' class='tab-pane fade in active'>
                        <div class='media'>
                        <div class='media-left' style='padding: 10px;'>
                        <img src='" . $dogs[$i]->getPic() . "' class='media-object' style='width: 100px;'>
                        </div>
                        <div class='media-body' style='padding: 10px;'>
                        <h4 class='media-heading'>" . $dogs[$i]->getName() . " - " . $dogs[$i]->getBreed() . "</h4>
                        <p>" . $dogs[$i]->getFact() . "</p>
                        </div></div></div>";
                            // generates the content for all the other tabs
                        } elseif ($i != 0) {
                            echo "<div id='" . $dogs[$i]->getName() . "' class='tab-pane fade'>
                        <div class='media'>
                        <div class='media-left' style='padding: 10px;'>
                        <img src='" . $dogs[$i]->getPic() . "' class='media-object' style='width: 100px;'>
                        </div>
                        <div class='media-body' style='padding: 10px;'>
                        <h4 class='media-heading'>" . $dogs[$i]->getName() . " - " . $dogs[$i]->getBreed() . "</h4>
                        <p>" . $dogs[$i]->getFact() . "</p>
                        </div></div></div>";
                        }
                    }
                    ?>
                </div>

            </div>
        </div>
    </nav>
    <!-- THIS IS THE CODE BEFORE I COPIED IT IN THE ECHO STATEMENTS AND IT LOST ITS FORMATTING -->
    <!-- EASIER TO VIEW AND EDIT FROM HERE -->

    <!-- <div class="container-fluid">
        <div class="media">
            <div class="media-left">
                <img src="<?php echo $dogs[0]->getPic(); ?>" class="media-object" style="width: 100px;">
            </div>
            <div class="media-body">
                <h4 class="media-heading"><?php echo $dogs[0]->getName() . " - " . $dogs[0]->getBreed() ?></h4>
                <p><?php echo $dogs[0]->getFact(); ?></p>
            </div>
        </div>
    </div> -->
</body>

</html>