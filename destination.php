 <?php  
$a =  ["Aarhus"=>["Denmark","AAR"],"Abadan"=>["Iran","ABD"], "Bangkok"=>["Thailand","BKK"], "Toronto"=>["Canada", "YTO"]];







if($_REQUEST['name']){
$data = $a[$_REQUEST['name']];
echo "<div class='col-xs-4'>
<label for=''>Country</label>			
<input type='text' name='country' value='$data[0]' class='form-control'style='cursor: no-drop;' >
</div>				
<div class='col-xs-4'><label for=''>Code</label><input type='text' name='country_code' value='$data[1]' class='form-control' style='cursor: no-drop;'></div>";
 die;
}
 function gp($bugg){
	 echo "<pre>";
	 print_r($bugg);
	 echo "</pre>";
	 
 }
 
 ?>