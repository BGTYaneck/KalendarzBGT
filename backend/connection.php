<?php
session_start();
$conn = new mysqli('localhost','root','','kalendarz');
// if (isset($_SESSION['Imie']) && str_contains($_SERVER['PHP_SELF'],"login.php")){
//     $user_name = $_SESSION['Imie'];
// }
// else{
//     header("Location: /login.php");
// }
// $q = "SELECT id from users WHERE username = $user_name ";
// $result = $conn->query($q);
?>
<script>
    class Zadanie
    {
        constructor(nazwa,data,opis,waga,kalendarz_id){
            this.nazwa = nazwa;
            this.data = new Date(data);
            this.opis = opis;
            this.waga = waga;
            this.kalendarz_id = kalendarz_id;
        }
    }
    class Wydarzenie
    {
        constructor(nazwa,data,opis,powtarzanie,kalendarz_id){
            this.nazwa = nazwa;
            this.data = new Date(data);
            this.opis = opis;
            this.powtarzanie = powtarzanie;
            this.kalendarz_id = kalendarz_id;
        }
    }
    class Kalendarz
    {
        constructor(id,kolor,nazwa,user_id){
            this.id = id;
            this.kolor = kolor;
            this.nazwa = nazwa;
            this.user_id = user_id;
        }
    }
    zadania = [];
    kalendarze = [];
    wydarzenia = [];
</script>
<?php
    // zadania baza -> js
    $q = 'SELECT * FROM zadania';
    $result = $conn->query($q);
    echo '<script>';
    $i = 0;
    while($obj = $result->fetch_object())
    {
        echo "zadania.push(new Zadanie('$obj->nazwa','$obj->data','$obj->opis','$obj->waga',$obj->kalendarz_id))";
    }
    echo '</script>';
    // kalendarze baza -> js
    $q = 'SELECT * FROM kalendarze';
    $result = $conn->query($q);
    echo '<script>';
    $i = 0;
    while($obj = $result->fetch_object())
    {
        echo "kalendarze.push(new Kalendarz($obj->id,'$obj->kolor','$obj->nazwa',$obj->user_id))";
    }
    echo '</script>';
    // wydarzenia baza -> js
    $q = 'SELECT * FROM wydarzenia';
    $result = $conn->query($q);
    echo '<script>';
    $i = 0;
    while($obj = $result->fetch_object())
    {
        echo "wydarzenia.push(new Wydarzenie('$obj->nazwa','$obj->data','$obj->opis','$obj->powtarzanie',$obj->kalendarz_id))";
    }
    echo '</script>';
?>