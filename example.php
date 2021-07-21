$conn = mysqli_connect($servername, $username, $password, $database);
// Проверяем соединение
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

if (!$conn->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $conn->error);
    exit();
} else {
    printf("Current character set: %s\n", $conn->character_set_name());
}
/**очистка таблиц**/
// $sql = "TRUNCATE TABLE Statistics";
// if (mysqli_query($conn, $sql)) {
//       echo "New record created successfully";
// } else {
//       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }

...............

// Получаем данные:
	// $sql = "INSERT INTO `Statistics`(`ID`, `ID_Task`, `ID_Volunteer`, `Status`, `ID_Category`, `Date`) VALUES ($statisticsID,$statisticsID_Task,$statisticsID_Volunteer,$statisticsStatus,$statisticsID_Category,$statisticsDate)";
	$sql = "SELECT * FROM Statistics";
	// $sql = "SHOW COLUMNS FROM Statistics";
	// $sql = "SHOW FIELDS FROM Statistics";

	$result = mysqli_query($conn, $sql);
	// $row = $result->fetch_assoc();
	// echo $row['ID'];

	// $sql = "SELECT ID FROM Statistics";

    // if ($result = $mysqli->query($sql)) {
	
        while($obj = $result->fetch_object()){
            $line = $obj->ID;
            $line2 = $obj->Date;
            if ($line2 == '0000-00-00 00:00:00') {
            	# code...
            	$line2 = "";
            }

            // $line.=$obj->role;
            // $line.=$obj->roleid;
            echo "ID-".$obj->ID.", ID_Task-".$obj->ID_Task.", ID_Volunteer-".$obj->ID_Volunteer.", Status-".$obj->Status.", ID_Category-".$obj->ID_Category.", Дата - ".$line2."<br>";

 //            // `ID`, `ID_Task`, `ID_Volunteer`, `Status`, `ID_Category`, `Date`

 //            // echo "ID события (ID) - ".$el['ID'].", ";
	// // echo "ID задания (ID_Task) - ".$el['UF_TASK'].", ";
	// // echo "ID волонтера (ID_Volunteer) - ".$el['UF_VOL'].", ";
	// // echo "ID статуса (Status) - ".$status_id.", ";
	// // echo "ID категории задания (ID_Category) - ".$el['UF_CAT'].", ";
	// // echo "Дата события (Date) - ".$el['UF_DATE'].", ";
        }





//***************************************************************************//
// Блок для вывода названия столбцов ($sql = "SHOW COLUMNS FROM Statistics";)
   //      while($row = mysqli_fetch_object($result)) {
			//     echo $row->Field . '<br/>';
			// }
//***************************************************************************//

//***************************************************************************//
// Блок для вывода типов полей ($sql = "SHOW FIELDS FROM Statistics";)
   //      while($row = mysqli_fetch_object($result)) {
			//     // echo $row->Field . '<br/>';
			//     print_r($row) . '<br/>';
			// }
//***************************************************************************//

