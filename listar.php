<script>
    $(document).ready(function () {
        $('#propietario').DataTable();
    });
</script>

<?php
require ("desplegable.php");
if(isset($_POST['user'])){

  $valorselect = $_POST['user'];

}




$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://gorest.co.in/public/v2/posts",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $objeto = json_decode($response);

    // Verifica si $objeto es un array u objeto
    if (is_array($objeto) || is_object($objeto)) {
?>
        <table class="table table-striped" id="propietario">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>user_id</th>
                    <th>title</th>
                    <th>body</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($objeto as $reg) {
                    // Verifica si el user_id coincide
                    if ($reg->user_id == $valorselect) {
                ?>
                        <tr>
                            <td><?= $reg->id ?></td>
                            <td><?= $reg->user_id ?></td>
                            <td><?= $reg->title ?></td>
                            <td><?= $reg->body ?></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
<?php
    } else {
        echo "La respuesta de la API no es un array u objeto.";
    }
}
?>
