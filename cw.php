
<?php
$string = $_POST['string'];
$wpm = $_POST['wpm'];
if ($string === "") {
    ?>
    <script type="text/javascript">
        window.close();
    </script>

    <?php
    exit;
}
include 'vendor/autoload.php';

use PiPHP\GPIO\GPIO;
use PiPHP\GPIO\Pin\PinInterface;

// Create a GPIO object
$gpio = new GPIO();

// Retrieve pin 18 and configure it as an output pin
$txPin = $gpio->getOutputPin(23);
$pin = $gpio->getOutputPin(24);

$string_lower = strtolower($string);
$assoc_array = array(
    "a" => ".-",
    "b" => "-...",
    "c" => "-.-.",
    "d" => "-..",
    "e" => ".",
    "f" => "..-.",
    "g" => "--.",
    "h" => "....",
    "i" => "..",
    "j" => ".---",
    "k" => "-.-",
    "l" => ".-..",
    "m" => "--",
    "n" => "-.",
    "o" => "---",
    "p" => ".--.",
    "q" => "--.-",
    "r" => ".-.",
    "s" => "...",
    "t" => "-",
    "u" => "..-",
    "v" => "...-",
    "w" => ".--",
    "x" => "-..-",
    "y" => "-.--",
    "z" => "--..",
    "0" => "-----",
    "1" => ".----",
    "2" => "..---",
    "3" => "...--",
    "4" => "....-",
    "5" => ".....",
    "6" => "-....",
    "7" => "--...",
    "8" => "---..",
    "9" => "----.",
    "." => ".-.-.-",
    "," => "--..--",
    "?" => "..--..",
    "/" => "-..-.",
    " " => " ");
//echo "<pre>\n";
$text = str_split($string_lower);
$txPin->setValue(PinInterface::VALUE_LOW);
usleep(($wpm / .005) * 100);
foreach ($text as $textChar) {

    foreach ($assoc_array as $letter => $code) {

        if (strtolower($letter) === $textChar) {
            $chars = str_split($code);
            foreach ($chars as $char) {
                if ($char === ".") {
                    echo $char;
                    $pin->setValue(PinInterface::VALUE_LOW);
                    usleep(($wpm / .05) * 100);
                    $pin->setValue(PinInterface::VALUE_HIGH);
                }
                if ($char === "-") {
                    echo $char;
                    $pin->setValue(PinInterface::VALUE_LOW);
                    usleep(($wpm / .01) * 100);
                    $pin->setValue(PinInterface::VALUE_HIGH);
                }
                usleep(($wpm / .03) * 100);
            }
        }
    }
    echo " ";
    //$pin->setValue(PinInterface::VALUE_HIGH);
    usleep(($wpm / .02) * 100);
}
usleep(($wpm / .005) * 100);
$txPin->setValue(PinInterface::VALUE_HIGH);
?>
<script type="text/javascript">
    window.close();
</script>