<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    class fruit{
        public $name;
        public $color;
        function set_name($name)
        {
            $this->name = $name;
        }
        function get_name()
        {
            return $this->name;
        }
    
    }
    $apple = new fruit();
    $banana = new fruit();
    $apple->set_name("apple");
    $banana->set_name("banana");
    echo $apple->get_name();
    echo "<br>";
    echo $banana->get_name();
    ?>
</body>
</html>