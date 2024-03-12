<script>
   $(document).ready( function () {
        $('#propietario').DataTable();
    } );
</script>  
<?php
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
	//print_r($objeto);
  ?>
        
        <select class="form-select" aria-label="Default select example" name="user"
                                require="">
                                <option selected>Seleccionar</option>
                                <?php 
                                foreach ($objeto as $reg) {
                                    ?>
                               
                                <option value="1"><?php  echo $reg->user_id ?> </option>
                                <?php } ?>
                            </select>   

                           <form>
                             <input type="button" value="Start machine" />
                                </form>
                            
                            <script> button.addEventListener("click", updateButton);

                                </script>  

<?php
}
?>