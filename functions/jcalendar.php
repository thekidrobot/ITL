<script>
function goLastMonth(month, year){
// If the month is January, decrement the year
if(month == 1){
--year;
month = 13;
}
document.location.href = '<?=$_SERVER['PHP_SELF'];?>?month='+(month-1)+'&year='+year;
}
//next function
function goNextMonth(month, year){
// If the month is December, increment the year
if(month == 12){
++year;
month = 0;
}
document.location.href = '<?=$_SERVER['PHP_SELF'];?>?month='+(month+1)+'&year='+year;
}

function remChars(txtControl, txtCount, intMaxLength)
{
if(txtControl.value.length > intMaxLength)
txtControl.value = txtControl.value.substring(0, (intMaxLength-1));
else
txtCount.value = intMaxLength - txtControl.value.length;
}

function checkFilled() {
var filled = 0
var x = document.form1.calName.value;
//x = x.replace(/^\s+/,""); // strip leading spaces
if (x.length > 0) {filled ++}

var y = document.form1.calDesc.value;
//y = y.replace(/^s+/,""); // strip leading spaces
if (y.length > 0) {filled ++}

if (filled == 2) {
document.getElementById("Submit").disabled = false;
}
else {document.getElementById("Submit").disabled = true} // in case a field is filled then erased

}
</script>

<?php
//$todaysDate = date("n/j/Y");
//echo $todaysDate;
// Get values from query string
$day = (isset($_GET["day"])) ? $_GET['day'] : "";
$month = (isset($_GET["month"])) ? $_GET['month'] : "";
$year = (isset($_GET["year"])) ? $_GET['year'] : "";
//comparaters for today's date
//$todaysDate = date("n/j/Y");
//$sel = (isset($_GET["sel"])) ? $_GET['sel'] : "";
//$what = (isset($_GET["what"])) ? $_GET['what'] : "";

//$day = (!isset($day)) ? $day = date("j") : $day = "";
if(empty($day)){ $day = date("j"); }

if(empty($month)){ $month = date("n"); }

if(empty($year)){ $year = date("Y"); }
//set up vars for calendar etc
$currentTimeStamp = strtotime("$year-$month-$day");
$monthName = date("F", $currentTimeStamp);
$numDays = date("t", $currentTimeStamp);
$counter = 0;
//$numEventsThisMonth = 0;
//$hasEvent = false;
//$todaysEvents = "";
//run a selec statement to hi-light the days'
?>
<div class="calendar_box">
  <table border="0" cellpadding="0" cellspacing="0">
    <tr class="month">
    <td>
      <input type="button" value=" < " onClick="goLastMonth(<?php echo $month . ", " . $year; ?>);return false;">
    </td>
    <td colspan="5" style="color:#000">
      <?php echo $monthName . " " . $year; ?>
    </td>
    <td>
      <input type="button" value=" > " onClick="goNextMonth(<?php echo $month . ", " . $year; ?>);return false;">
    </td>
  </tr>
  <tr class="days">
    <th>S</td>
    <th>M</td>
    <th>T</td>
    <th>W</td>
    <th>T</td>
    <th>F</td>
    <th>S</td>
  </tr>
  <tr>
    <?php
    for($i = 1; $i < $numDays+1; $i++, $counter++)
    {
      $dateToCompare = $month . '/' . $i . '/' . $year;
      $timeStamp = strtotime("$year-$month-$i");
      //echo $timeStamp . '<br/>';
      if($i == 1)
      {
        // Workout when the first day of the month is
        $firstDay = date("w", $timeStamp);
        for($j = 0; $j < $firstDay; $j++, $counter++){
        echo "<td>&nbsp;</td>";
      }
    }
    if($counter % 7 == 0)
    {
      ?>
      </tr>
      <tr>
      <?php
    }
    ?>
    <!--right here-->
    <td <?=hiLightEvt($month,$i,$year);?>>
<?
if($month<=9)
  $mm="0".$month;
else
  $mm=$month;  
  if($i<=9)
  $dd="0".$i;
else
  $dd=$i; 
if(check_event($month,$i,$year)==1){
$evedate=$dd."-".get_month($month)."-".$year;
?>
<a rel="lyteframe" href="event_view.php?date=<?=$evedate;?>" rev="width: 800px; height: 400px; scrolling: yes;"><?=$i;?></a>
<?}else{?>
<a href="<?=$_SERVER['PHP_SELF'] . '?month='. $month . '&day=' . $i . '&year=' . $year;?>&v=1"><?=$i;?></a>
<?}?>
</td>
<?php
}
?>
</table>
</div>
<? $hsql=mysql_query("SELECT holiday_date,title FROM holidays WHERE holiday_date LIKE '%".$year."-".$mm."%'ORDER BY holiday_date");
  $count_holidays=mysql_num_rows($hsql);
  if($count_holidays>0)
  {
  echo "<b>List of public holidays</b><br />";
  for($i=0;$holidays=mysql_fetch_object($hsql);$i++)
   {
    $day=explode("-",$holidays->holiday_date);
	echo $day[2]."&nbsp;&nbsp;-&nbsp;&nbsp;".$holidays->title."<br />";
   }
  }
?>