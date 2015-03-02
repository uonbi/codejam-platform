<?
class Time_model extends CI_Model{

		/**
	*Returns Remaining time in Hoursa and minutes
	*/
	public function remaining_time()
	{
		$current_date = date("Y-m-dTH:i:s");
 		$date1 = new DateTime($current_date);
		$date2 = new DateTime('2015-03-04T10:00:00');

		// The diff-methods returns a new DateInterval-object...
		$diff = $date2->diff($date1);

		// Call the format method on the DateInterval-object
		//echo $diff->format('%a Day and %h hours %d minutes');
		$hours = $diff->h;
		$mins = $diff->i;
		$hours = $hours + ($diff->days*24);

		$hrs_suffix = ($hours > 1) ? 's' : '';
		$min_suffix = ($mins > 1) ? 's' : '';

		$time_to_end = $hours." hour".$hrs_suffix." ".$mins." minute".$min_suffix;

		return $time_to_end;
	}
}