<label id="time_label" for="time" class="label">Time:</label>

<select id="time" name="time">

<option value="">Select</option>

<?php

$start = strtotime('12:00am');
$end = strtotime('11:59pm');
$now = strtotime('now');
$nowPart = $now % 900;
 if ( $nowPart >= 450) {
    $nearestToNow =  $now - $nowPart + 900;
    if ($nearestToNow > $end) { // bounds check
        $nearestToNow = $start;
    }
} else {
    $nearestToNow = $now - $nowPart;
}
for ($i = $start; $i <= $end; $i += 900){
    $selected = '';
    if ($nearestToNow == $i) {
        $selected = ' selected="selected"';
    }
    echo "\t<option" . $selected . '>' . date('g:i a', $i) . "\n";
}
?>

</select>

<?php

	$days = range (1, 31); 
	echo "Day: <select id='sm' name='day'>";
foreach ($days as $value) {
echo '<option value="'.$value.'">'.$value.'</option>\n';
} echo '</select><br />';

?>


