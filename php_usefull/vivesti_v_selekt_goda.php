
<select>
	<?php
		$start_year = 1990;
		$year_now = (int)date('Y');
		while($start_year  <= $year_now)
		{
			echo "<option value=\"$start_year\">$start_year</option>";
			$start_year++ ;
		}
	?>
</select>
<br>

<select>
	<?php
		for($k=1990;  $k <= $year_now; $k++ )
		{
			echo "<option value=\"$k\">$k</option>";
		}
	?>
</select>