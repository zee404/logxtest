<?php 
/**
 * a controller to make test cases
 */

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx; 
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing as PHPExcel_Worksheet_MemoryDrawing; // Instead PHPExcel_Worksheet_Drawing

class Ptests extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('order_model');
		 $this->load->model("Setting_model");
	}

	function index()
	{

	}
   
   
//   make it old at 1 jan 2021
// 	function excel_old()
// 	{
// 	    $this->load->model('driver_model');
	    
// 		$areas = $this->order_model->get_areas();
// 		$areas = array_column($areas, 'area_name');
		
// 	//	array_push($areas, 'Other');

//  		//$types =  $this->order_model->get_deliveries_type();
//  $data['old_emirites_typ'] = $this->order_model->get_emirate_with_TimeSlots();
//   $data['emirites_typ']=$this->driver_model->get_combinations($data['old_emirites_typ']);
  

   
// 		$types = array_values($data['emirites_typ']);
// //		$types = array_column($types,'name');
		
// // 			echo '<br>i am after array col<pre>';
// //       print_r($types);

	
// // 	echo "<pre>";
// // 	print_r($types);
// // 	echo "<pre>";
// // 	die();
  
// //   	echo '<br>My<pre>';
// //       print_r($xp);
// //       die();
// //$types=$data['emirites_typ'];
//     //  $newtypes=$xp;
// //   $types=$xp;
// // 		 echo '<br>i am New types<pre>';
// //           print_r($newtypes);
// // 		 echo '<br>i am array column types<pre>';
// //             print_r($types);
// //             die();
// 		//print_r($types);
//  		$alerts = 'Yes,No';
// // 		echo"<pre>";
// // 		print_r($types);
// // 		echo"<pre>";
		
// // 			echo"<pre>";
// // 		print_r($type);
// // 		echo"<pre>";
// // 		die();

// 		$spreadsheet = new Spreadsheet();
// 		$sheet = $spreadsheet->getActiveSheet();

// 		$sheet->setCellValue('A1', 'Phone');
// 		$sheet->setCellValue('B1', 'Full Name');
// 		$sheet->setCellValue('C1', 'Address');
// 		$sheet->setCellValue('D1', 'Area with Emirate(Select Option)');
// 		$sheet->setCellValue('E1', 'Pickup Point');
// 		$sheet->setCellValue('F1', 'Emirate With Time(Select Option)');
// 		$sheet->setCellValue('G1', 'Notes');
// 		$sheet->setCellValue('H1', 'Notification(Select Option)');
// 		$sheet->setCellValue('I1', 'Product Type(Optional)');

// 		$styleArrayFirstRow = [
//             'font' => [
//                 'bold' => true,
//             ],
//             ['fill_solid' => 'e3eb8a']
//         ];
//         $highestColumn = $sheet->getHighestColumn();
//         $sheet->getStyle('A1:' . $highestColumn . '1' )->applyFromArray($styleArrayFirstRow);

//         //$sheet->getStyle('A1:11')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('e3eb8a');

// 		$sheet->getStyle('1:1')->getFont()->setBold(true);
// 		//$sheet->getColumnDimension('D')->setWidth(25);

// 		foreach(range('A','H') as $columnID) {
//     			$sheet->getColumnDimension($columnID)->setWidth(20);
// 		} 
		
// 		//Najam Work
		
//           // Add new sheet
//           $objWorkSheet = $spreadsheet->createSheet(1); //Setting index when creating
//           //Write cells
//           $cell = "";
//             if(count($areas)) {
//                 $key = 1;
//                 foreach($areas as $area) {
//                     $cell = 'A'.$key;
//                   $objWorkSheet->setCellValue($cell, $area);
//                   $key++;
//                 }
//             }
//           // Rename sheet
//           $objWorkSheet->setTitle("cities");
          
//           $objWorkSheet->getProtection()->setSheet(true);
//           $objWorkSheet->getProtection()->setSort(true);
//           $objWorkSheet->getProtection()->setInsertRows(true);
//           $objWorkSheet->getProtection()->setFormatCells(true);
        
//           $objWorkSheet->getProtection()->setPassword('password');
          
//           $spreadsheet->addNamedRange(
//                 new \PhpOffice\PhpSpreadsheet\NamedRange('city', $spreadsheet->getSheetByName('cities'), 'A1:'.$cell) 
//             );
          
// 		// End Najam Work
// 		$writer = new Xlsx($spreadsheet);
		
// 			//Ayesha Work
		
//           // Add new sheet
//           $objWorkSheet2 = $spreadsheet->createSheet(2); //Setting index when creating
//           //Write cells
//           $cell = "";
//             if(count($types)) {
//                 $key = 1;
//                 foreach($types as $type) {
//                     $cell = 'A'.$key;
//                   $objWorkSheet2->setCellValue($cell, $type);
//                   $key++;
//                 }
//             }
//           // Rename sheet
//           $objWorkSheet2->setTitle("emirates");
          
//           $objWorkSheet2->getProtection()->setSheet(true);
//           $objWorkSheet2->getProtection()->setSort(true);
//           $objWorkSheet2->getProtection()->setInsertRows(true);
//           $objWorkSheet2->getProtection()->setFormatCells(true);
        
//           $objWorkSheet2->getProtection()->setPassword('password');
          
//           $spreadsheet->addNamedRange(
//                 new \PhpOffice\PhpSpreadsheet\NamedRange('emirates', $spreadsheet->getSheetByName('emirates'), 'A1:'.$cell) 
//             );
          
// 		// End Ayesha Work

// 		$writer = new Xlsx($spreadsheet);

// 		//area validation
// 		$validation = $sheet->getCell('D2')->getDataValidation();
// 		$validation->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST );
// 		$validation->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION );
// 		$validation->setAllowBlank(false);
// 		$validation->setShowInputMessage(true);
// 		$validation->setShowErrorMessage(true);
// 		$validation->setShowDropDown(true);
// 		$validation->setErrorTitle('Input error');
// 		$validation->setError('Value is not in list.');
// 		$validation->setPromptTitle('Pick from list');
// 		$validation->setPrompt('Please pick a value from the drop-down list.');
// 		$validation->setFormula1('=city');

// 		//emirates validation 
//                                   // 		$objvalidation->setFormula1('ExampleSheet!A1:A100');
// 		$validation1 = $sheet->getCell('F2')->getDataValidation();
// 		$validation1->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST );
// 		$validation1->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION );
// 		$validation1->setAllowBlank(false);
// 		$validation1->setShowInputMessage(true);
// 		$validation1->setShowErrorMessage(true);
// 		$validation1->setShowDropDown(true);
// 		$validation1->setErrorTitle('Input error');
// 		$validation1->setError('Value is not in list.');
// 		$validation1->setPromptTitle('Pick from list');
// 		$validation1->setPrompt('Please pick a value from the drop-down list.');
// 	   //	$validation1->setFormula1('"'.utf8_encode(implode(',', $types)).'"');
// 	   	$validation1->setFormula1('=emirates');

// 		//notification validation
// 		$validation2 = $sheet->getCell('H2')->getDataValidation();
// 		$validation2->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST );
// 		$validation2->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION );
// 		$validation2->setAllowBlank(false);
// 		$validation2->setShowInputMessage(true);
// 		$validation2->setShowErrorMessage(true);
// 		$validation2->setShowDropDown(true);
// 		$validation2->setErrorTitle('Input error');
// 		$validation2->setError('Value is not in list.');
// 		$validation2->setPromptTitle('Pick from list');
// 		$validation2->setPrompt('Please pick a value from the drop-down list.');
// 		$validation2->setFormula1('"'.$alerts.'"');

// 		for($in = 2; $in < 4; $in++){
// 		$sheet->setCellValue("A$in", '971-32736722');
// 		$sheet->setCellValue("B$in", 'John Doe');
// 		$sheet->setCellValue("C$in", 'St#2 B Block');
// 		$sheet->setCellValue("D$in", !empty($areas[0]) ? $areas[0] : '');
// 		$sheet->setCellValue("E$in", 'Office Location');
// 		$sheet->setCellValue("F$in", !empty($types[0]) ? $types[0] : '');
// 		$sheet->setCellValue("G$in", 'Lorem Ipsum Notes');
// 		$sheet->setCellValue("H$in", 'No');
// 		$sheet->setCellValue("I$in", 'Food/Liquid');
// 	}

// 		for($c = 3; $c <= 300; $c++){

// 			$sheet->getCell("D$c")->setDataValidation(clone $validation);
// 			$sheet->getCell("F$c")->setDataValidation(clone $validation1);
// 			$sheet->getCell("H$c")->setDataValidation(clone $validation2);
// 		}

		
// 		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
// 		header('Content-Disposition: attachment; filename="sample_deliveries_'.date('Y-m-d_(H:i:s)').'.xlsx"');
// 		$writer->save("php://output"); 
		

// 		//$writer->save('Sample Deliveries.xlsx');
// 	}


	function excel()
	{
	    $this->load->model('driver_model');
	    
		$areas = $this->order_model->get_areas();
		$areas = array_column($areas, 'area_name');
		
	//	array_push($areas, 'Other');

 		//$types =  $this->order_model->get_deliveries_type();
 $data['old_emirites_typ'] = $this->order_model->get_emirate_with_TimeSlots();
  $data['emirites_typ']=$this->driver_model->get_combinations($data['old_emirites_typ']);
  

   
		$types = array_values($data['emirites_typ']);
//		$types = array_column($types,'name');
		
// 			echo '<br>i am after array col<pre>';
//       print_r($types);

	
// 	echo "<pre>";
// 	print_r($types);
// 	echo "<pre>";
// 	die();
  
//   	echo '<br>My<pre>';
//       print_r($xp);
//       die();
//$types=$data['emirites_typ'];
    //  $newtypes=$xp;
//   $types=$xp;
// 		 echo '<br>i am New types<pre>';
//           print_r($newtypes);
// 		 echo '<br>i am array column types<pre>';
//             print_r($types);
//             die();
		//print_r($types);
 		$alerts = 'Yes,No';
// 		echo"<pre>";
// 		print_r($types);
// 		echo"<pre>";
		
// 			echo"<pre>";
// 		print_r($type);
// 		echo"<pre>";
// 		die();

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'Phone');
		$sheet->setCellValue('B1', 'Full Name');
		$sheet->setCellValue('C1', 'Address');
		$sheet->setCellValue('D1', 'Area with Emirate(Select Option)');
		$sheet->setCellValue('E1', 'Pickup Point');
		$sheet->setCellValue('F1', 'Emirate With Time(Select Option)');
		$sheet->setCellValue('G1', 'Notes');
		$sheet->setCellValue('H1', 'Notification(Select Option)');
		$sheet->setCellValue('I1', 'Product Type(Optional)');
		$sheet->setCellValue('J1', 'Payment(Optional)');
		$sheet->setCellValue('K1', 'CompanyID/Unique ID(Optional)');
		$sheet->setCellValue('L1', 'Google Link Address(Optional)');

		$styleArrayFirstRow = [
            'font' => [
                'bold' => true,
            ],
            ['fill_solid' => 'e3eb8a']
        ];
        $highestColumn = $sheet->getHighestColumn();
        $sheet->getStyle('A1:' . $highestColumn . '1' )->applyFromArray($styleArrayFirstRow);

        //$sheet->getStyle('A1:11')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('e3eb8a');

		$sheet->getStyle('1:1')->getFont()->setBold(true);
		//$sheet->getColumnDimension('D')->setWidth(25);

		foreach(range('A','H') as $columnID) {
    			$sheet->getColumnDimension($columnID)->setWidth(20);
		} 
		
		foreach(range('J','L') as $columnID) {
    			$sheet->getColumnDimension($columnID)->setWidth(25);
		} 
		
		
		
		//Najam Work
		
          // Add new sheet
          $objWorkSheet = $spreadsheet->createSheet(1); //Setting index when creating
          //Write cells
          $cell = "";
            if(count($areas)) {
                $key = 1;
                foreach($areas as $area) {
                    $cell = 'A'.$key;
                   $objWorkSheet->setCellValue($cell, $area);
                   $key++;
                }
            }
          // Rename sheet
          $objWorkSheet->setTitle("cities");
          
          $objWorkSheet->getProtection()->setSheet(true);
          $objWorkSheet->getProtection()->setSort(true);
          $objWorkSheet->getProtection()->setInsertRows(true);
          $objWorkSheet->getProtection()->setFormatCells(true);
        
          $objWorkSheet->getProtection()->setPassword('password');
          
          $spreadsheet->addNamedRange(
                new \PhpOffice\PhpSpreadsheet\NamedRange('city', $spreadsheet->getSheetByName('cities'), 'A1:'.$cell) 
            );
          
		// End Najam Work
		$writer = new Xlsx($spreadsheet);
		
			//Ayesha Work
		
          // Add new sheet
          $objWorkSheet2 = $spreadsheet->createSheet(2); //Setting index when creating
          //Write cells
          $cell = "";
            if(count($types)) {
                $key = 1;
                foreach($types as $type) {
                    $cell = 'A'.$key;
                   $objWorkSheet2->setCellValue($cell, $type);
                   $key++;
                }
            }
          // Rename sheet
          $objWorkSheet2->setTitle("emirates");
          
          $objWorkSheet2->getProtection()->setSheet(true);
          $objWorkSheet2->getProtection()->setSort(true);
          $objWorkSheet2->getProtection()->setInsertRows(true);
          $objWorkSheet2->getProtection()->setFormatCells(true);
        
          $objWorkSheet2->getProtection()->setPassword('password');
          
          $spreadsheet->addNamedRange(
                new \PhpOffice\PhpSpreadsheet\NamedRange('emirates', $spreadsheet->getSheetByName('emirates'), 'A1:'.$cell) 
            );
          
		// End Ayesha Work

		$writer = new Xlsx($spreadsheet);

		//area validation
		$validation = $sheet->getCell('D2')->getDataValidation();
		$validation->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST );
		$validation->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION );
		$validation->setAllowBlank(false);
		$validation->setShowInputMessage(true);
		$validation->setShowErrorMessage(true);
		$validation->setShowDropDown(true);
		$validation->setErrorTitle('Input error');
		$validation->setError('Value is not in list.');
		$validation->setPromptTitle('Pick from list');
		$validation->setPrompt('Please pick a value from the drop-down list.');
		$validation->setFormula1('=city');

		//emirates validation 
                                  // 		$objvalidation->setFormula1('ExampleSheet!A1:A100');
		$validation1 = $sheet->getCell('F2')->getDataValidation();
		$validation1->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST );
		$validation1->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION );
		$validation1->setAllowBlank(false);
		$validation1->setShowInputMessage(true);
		$validation1->setShowErrorMessage(true);
		$validation1->setShowDropDown(true);
		$validation1->setErrorTitle('Input error');
		$validation1->setError('Value is not in list.');
		$validation1->setPromptTitle('Pick from list');
		$validation1->setPrompt('Please pick a value from the drop-down list.');
	   //	$validation1->setFormula1('"'.utf8_encode(implode(',', $types)).'"');
	   	$validation1->setFormula1('=emirates');

		//notification validation
		$validation2 = $sheet->getCell('H2')->getDataValidation();
		$validation2->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST );
		$validation2->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION );
		$validation2->setAllowBlank(false);
		$validation2->setShowInputMessage(true);
		$validation2->setShowErrorMessage(true);
		$validation2->setShowDropDown(true);
		$validation2->setErrorTitle('Input error');
		$validation2->setError('Value is not in list.');
		$validation2->setPromptTitle('Pick from list');
		$validation2->setPrompt('Please pick a value from the drop-down list.');
		$validation2->setFormula1('"'.$alerts.'"');
		
		
		//  Company Ammount
	
		$validation3 = $sheet->getCell('J2')->getDataValidation();
        $validation3->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_DECIMAL ); //'or whole'

           //This Line 
        $validation3->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION );
        
       
        $validation3->setOperator( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::OPERATOR_BETWEEN);
        
        
       
      $validation3->setAllowBlank(true);
      
      $validation3->setShowInputMessage(true);
      $validation3->setShowErrorMessage(true);
      $validation3->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP ); //'stop'
      $validation3->setErrorTitle('Error');
      $validation3->setError('Enter Only numbers or float');
      $validation3->setPromptTitle('Wrong Input!');
      $validation3->setPrompt('Enter Only numbers or float Only!');
      $validation3->setFormula1(0);
      $validation3->setFormula2(999999);
      $validation3->setAllowBlank(true);
    //   $validation3->getStyle('J2')->getNumberFormat()->setFormatCode('#');
// echo 'hi i am done';
//         die();




		for($in = 2; $in < 4; $in++){
		$sheet->setCellValue("A$in", '971-32736722');
		$sheet->setCellValue("B$in", 'John Doe');
		$sheet->setCellValue("C$in", 'St#2 B Block');
		$sheet->setCellValue("D$in", !empty($areas[0]) ? $areas[0] : '');
		$sheet->setCellValue("E$in", 'Office Location');
		$sheet->setCellValue("F$in", !empty($types[0]) ? $types[0] : '');
		$sheet->setCellValue("G$in", 'Lorem Ipsum Notes');
		$sheet->setCellValue("H$in", 'No');
		$sheet->setCellValue("I$in", 'Food/Liquid');
		$sheet->setCellValue("J$in", 0.0);
		$sheet->setCellValue("K$in", 'Company_01');
		$sheet->setCellValue("L$in", 'https://www.google.com/maps/dir/31.4311985,74.2643582/emporium+location/@31.450313,74.2489583,14z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x391903d4d940f12b:0xdb8c83f6699d5226!2m2!1d74.2666475!2d31.4678169');
	   }

		for($c = 3; $c <= 300; $c++){

			$sheet->getCell("D$c")->setDataValidation(clone $validation);
			$sheet->getCell("F$c")->setDataValidation(clone $validation1);
			$sheet->getCell("H$c")->setDataValidation(clone $validation2);
			$sheet->getCell("J$c")->setDataValidation(clone $validation3);
		}

		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="sample_deliveries_'.date('Y-m-d_(H:i:s)').'.xlsx"');
		$writer->save("php://output"); 
		

		//$writer->save('Sample Deliveries.xlsx');
	}

	function bags()
	{   
	    $areas = $this->order_model->get_areas();
		$areas = array_column($areas, 'area_name');
		//array_push($areas, 'Other');

// 		$types =  $this->order_model->get_deliveries_type();
// 		$types = array_column($types, 'name');

        $data['old_emirites_typ'] = $this->order_model->get_emirate_with_TimeSlots();
     $data['emirites_typ']=$this->driver_model->get_combinations($data['old_emirites_typ']);
  $types = array_values($data['emirites_typ']);
		$alerts = 'Yes,No';

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'Full Name');
		$sheet->setCellValue('B1', 'Phone');
		$sheet->setCellValue('C1', 'Address');
		$sheet->setCellValue('D1', 'Area(Select Option)');
		$sheet->setCellValue('E1', 'Bags Qty');
		$sheet->setCellValue('F1', 'Notes');
		$sheet->setCellValue('G1', 'Emirate With Time(Select Option)');
		$sheet->setCellValue('H1', 'Notification(Select Option)');

		$styleArrayFirstRow = [
            'font' => [
                'bold' => true,
            ],
            ['fill_solid' => 'e3eb8a']
        ];
        $highestColumn = $sheet->getHighestColumn();
        $sheet->getStyle('A1:' . $highestColumn . '1' )->applyFromArray($styleArrayFirstRow);

		$sheet->getStyle('1:1')->getFont()->setBold(true);
		//$sheet->getColumnDimension('D')->setWidth(25);

		foreach(range('A','H') as $columnID) {
    			$sheet->getColumnDimension($columnID)->setWidth(20);
		} 
		
		//Najam Work
		
          // Add new sheet
          $objWorkSheet = $spreadsheet->createSheet(1); //Setting index when creating
          //Write cells
          $cell = "";
            if(count($areas)) {
                $key = 1;
                foreach($areas as $area) {
                    $cell = 'A'.$key;
                   $objWorkSheet->setCellValue($cell, $area);
                   $key++;
                }
            }
          // Rename sheet
          $objWorkSheet->setTitle("cities");
          
          $objWorkSheet->getProtection()->setSheet(true);
          $objWorkSheet->getProtection()->setSort(true);
          $objWorkSheet->getProtection()->setInsertRows(true);
          $objWorkSheet->getProtection()->setFormatCells(true);
        
          $objWorkSheet->getProtection()->setPassword('password');
          
          $spreadsheet->addNamedRange(
                new \PhpOffice\PhpSpreadsheet\NamedRange('city', $spreadsheet->getSheetByName('cities'), 'A1:'.$cell) 
            );
          
		// End Najam Work

		$writer = new Xlsx($spreadsheet);
		
			//Ayesha Work
		
          // Add new sheet
          $objWorkSheet2 = $spreadsheet->createSheet(2); //Setting index when creating
          //Write cells
          $cell = "";
            if(count($types)) {
                $key = 1;
                foreach($types as $type) {
                    $cell = 'A'.$key;
                   $objWorkSheet2->setCellValue($cell, $type);
                   $key++;
                }
            }
          // Rename sheet
          $objWorkSheet2->setTitle("emirates");
          
          $objWorkSheet2->getProtection()->setSheet(true);
          $objWorkSheet2->getProtection()->setSort(true);
          $objWorkSheet2->getProtection()->setInsertRows(true);
          $objWorkSheet2->getProtection()->setFormatCells(true);
        
          $objWorkSheet2->getProtection()->setPassword('password');
          
          $spreadsheet->addNamedRange(
                new \PhpOffice\PhpSpreadsheet\NamedRange('emirates', $spreadsheet->getSheetByName('emirates'), 'A1:'.$cell) 
            );
          
		// End Ayesha Work

		$writer = new Xlsx($spreadsheet);

		//area validation
		$validation = $sheet->getCell('D2')->getDataValidation();
		$validation->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST );
		$validation->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION );
		$validation->setAllowBlank(false);
		$validation->setShowInputMessage(true);
		$validation->setShowErrorMessage(true);
		$validation->setShowDropDown(true);
		$validation->setErrorTitle('Input error');
		$validation->setError('Value is not in list.');
		$validation->setPromptTitle('Pick from list');
		$validation->setPrompt('Please pick a value from the drop-down list.');
		$validation->setFormula1('=city');

		//emirates validation
		$validation1 = $sheet->getCell('G2')->getDataValidation();
		$validation1->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST );
		$validation1->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION );
		$validation1->setAllowBlank(false);
		$validation1->setShowInputMessage(true);
		$validation1->setShowErrorMessage(true);
		$validation1->setShowDropDown(true);
		$validation1->setErrorTitle('Input error');
		$validation1->setError('Value is not in list.');
		$validation1->setPromptTitle('Pick from list');
		$validation1->setPrompt('Please pick a value from the drop-down list.');
		$validation1->setFormula1('=emirates');

		//notification validation
		$validation2 = $sheet->getCell('H2')->getDataValidation();
		$validation2->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST );
		$validation2->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION );
		$validation2->setAllowBlank(false);
		$validation2->setShowInputMessage(true);
		$validation2->setShowErrorMessage(true);
		$validation2->setShowDropDown(true);
		$validation2->setErrorTitle('Input error');
		$validation2->setError('Value is not in list.');
		$validation2->setPromptTitle('Pick from list');
		$validation2->setPrompt('Please pick a value from the drop-down list.');
		$validation2->setFormula1('"'.$alerts.'"');

		for($in = 2; $in < 4; $in++){
			$sheet->setCellValue("A$in", 'John Doe');
			$sheet->setCellValue("B$in", '971-32736722');
			$sheet->setCellValue("C$in", 'St#2 B Block');
			$sheet->setCellValue("D$in", !empty($areas[0]) ? $areas[0] : '');
			$sheet->setCellValue("E$in", '2');
			$sheet->setCellValue("F$in", 'Lorem Ipsum Notes');
			$sheet->setCellValue("G$in", !empty($types[0]) ? $types[0] : '');
			$sheet->setCellValue("H$in", 'No');
		}

		for($c = 3; $c <= 300; $c++){

			$sheet->getCell("D$c")->setDataValidation(clone $validation);
			$sheet->getCell("G$c")->setDataValidation(clone $validation1);
			$sheet->getCell("H$c")->setDataValidation(clone $validation2);
		}

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="sample_bags_'.date('Y-m-d(H:i:s)').'.xlsx"');
		$writer->save("php://output");
		
		$writer->save('my_bags.xlsx');
	}
	
	function cash()
	{
		$areas = $this->order_model->get_areas();
		$areas = array_column($areas, 'area_name');
		//array_push($areas, 'Other');

// 		$types =  $this->order_model->get_deliveries_type();
// 		$types = array_column($types, 'name');

 $data['old_emirites_typ'] = $this->order_model->get_emirate_with_TimeSlots();
      $data['emirites_typ']=$this->driver_model->get_combinations($data['old_emirites_typ']);
  
		$types = array_values($data['emirites_typ']);
		
		$payt =  $this->Setting_model->get_payment_type();
		$payt = array_column($payt, 'payment_name');

		$alerts = 'Yes,No';

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'Full Name');
		$sheet->setCellValue('B1', 'Phone');
		$sheet->setCellValue('C1', 'Address');
		$sheet->setCellValue('D1', 'Area(Select Option)');
		$sheet->setCellValue('E1', 'Amount');
		$sheet->setCellValue('F1', 'Payment Type(Select Option)');
		$sheet->setCellValue('G1', 'Notes');
		$sheet->setCellValue('H1', 'Emirate With Time(Select Option)');
		$sheet->setCellValue('I1', 'Notification(Select Option)');

		$styleArrayFirstRow = [
            'font' => [
                'bold' => true,
            ],
            ['fill_solid' => 'e3eb8a']
        ];
        $highestColumn = $sheet->getHighestColumn();
        $sheet->getStyle('A1:' . $highestColumn . '1' )->applyFromArray($styleArrayFirstRow);

		$sheet->getStyle('1:1')->getFont()->setBold(true);
		//$sheet->getColumnDimension('D')->setWidth(25);

		foreach(range('A','I') as $columnID) {
    			$sheet->getColumnDimension($columnID)->setWidth(20);
		}
		
		//Najam Work
		
          // Add new sheet
          $objWorkSheet = $spreadsheet->createSheet(1); //Setting index when creating
          //Write cells
          $cell = "";
            if(count($areas)) {
                $key = 1;
                foreach($areas as $area) {
                    $cell = 'A'.$key;
                   $objWorkSheet->setCellValue($cell, $area);
                   $key++;
                }
            }
          // Rename sheet
          $objWorkSheet->setTitle("cities");
          
          $objWorkSheet->getProtection()->setSheet(true);
          $objWorkSheet->getProtection()->setSort(true);
          $objWorkSheet->getProtection()->setInsertRows(true);
          $objWorkSheet->getProtection()->setFormatCells(true);
        
          $objWorkSheet->getProtection()->setPassword('password');
          
          $spreadsheet->addNamedRange(
                new \PhpOffice\PhpSpreadsheet\NamedRange('city', $spreadsheet->getSheetByName('cities'), 'A1:'.$cell) 
            );
          
		// End Najam Work

		$writer = new Xlsx($spreadsheet);
   
   	//Ayesha Work
		
          // Add new sheet
          $objWorkSheet2 = $spreadsheet->createSheet(2); //Setting index when creating
          //Write cells
          $cell = "";
            if(count($types)) {
                $key = 1;
                foreach($types as $type) {
                    $cell = 'A'.$key;
                   $objWorkSheet2->setCellValue($cell, $type);
                   $key++;
                }
            }
          // Rename sheet
          $objWorkSheet2->setTitle("emirates");
          
          $objWorkSheet2->getProtection()->setSheet(true);
          $objWorkSheet2->getProtection()->setSort(true);
          $objWorkSheet2->getProtection()->setInsertRows(true);
          $objWorkSheet2->getProtection()->setFormatCells(true);
        
          $objWorkSheet2->getProtection()->setPassword('password');
          
          $spreadsheet->addNamedRange(
                new \PhpOffice\PhpSpreadsheet\NamedRange('emirates', $spreadsheet->getSheetByName('emirates'), 'A1:'.$cell) 
            );
          
		// End Ayesha Work

		$writer = new Xlsx($spreadsheet);
		//area validation
		$validation = $sheet->getCell('D2')->getDataValidation();
		$validation->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST );
		$validation->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION );
		$validation->setAllowBlank(false);
		$validation->setShowInputMessage(true);
		$validation->setShowErrorMessage(true);
		$validation->setShowDropDown(true);
		$validation->setErrorTitle('Input error');
		$validation->setError('Value is not in list.');
		$validation->setPromptTitle('Pick from list');
		$validation->setPrompt('Please pick a value from the drop-down list.');
		$validation->setFormula1('=city');

		//emirates validation
		$validation1 = $sheet->getCell('H2')->getDataValidation();
		$validation1->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST );
		$validation1->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION );
		$validation1->setAllowBlank(false);
		$validation1->setShowInputMessage(true);
		$validation1->setShowErrorMessage(true);
		$validation1->setShowDropDown(true);
		$validation1->setErrorTitle('Input error');
		$validation1->setError('Value is not in list.');
		$validation1->setPromptTitle('Pick from list');
		$validation1->setPrompt('Please pick a value from the drop-down list.');
		$validation1->setFormula1('=emirates');
		
		//payment Type validation
		$validation3 = $sheet->getCell('F2')->getDataValidation();
		$validation3->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST );
		$validation3->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION );
		$validation3->setAllowBlank(false);
		$validation3->setShowInputMessage(true);
		$validation3->setShowErrorMessage(true);
		$validation3->setShowDropDown(true);
		$validation3->setErrorTitle('Input error');
		$validation3->setError('Value is not in list.');
		$validation3->setPromptTitle('Pick from list');
		$validation3->setPrompt('Please pick a value from the drop-down list.');
		$validation3->setFormula1('"'.implode(',', $payt).'"');

		//notification validation
		$validation2 = $sheet->getCell('I2')->getDataValidation();
		$validation2->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST );
		$validation2->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION );
		$validation2->setAllowBlank(false);
		$validation2->setShowInputMessage(true);
		$validation2->setShowErrorMessage(true);
		$validation2->setShowDropDown(true);
		$validation2->setErrorTitle('Input error');
		$validation2->setError('Value is not in list.');
		$validation2->setPromptTitle('Pick from list');
		$validation2->setPrompt('Please pick a value from the drop-down list.');
		$validation2->setFormula1('"'.$alerts.'"');

		for($in = 2; $in < 4; $in++){
			$sheet->setCellValue("A$in", 'John Doe');
			$sheet->setCellValue("B$in", '971-32736722');
			$sheet->setCellValue("C$in", 'St#2 B Block');
			$sheet->setCellValue("D$in", !empty($areas[0]) ? $areas[0] : '');
			$sheet->setCellValue("E$in", '2');
			$sheet->setCellValue("F$in", !empty($payt[0]) ? $payt[0] : '');
			$sheet->setCellValue("G$in", 'Lorem Ipsum Notes');
			$sheet->setCellValue("H$in", !empty($types[0]) ? $types[0] : '');
			$sheet->setCellValue("I$in", 'No');
		}

		for($c = 3; $c <= 300; $c++){

			$sheet->getCell("D$c")->setDataValidation(clone $validation);
			$sheet->getCell("F$c")->setDataValidation(clone $validation3);
			$sheet->getCell("H$c")->setDataValidation(clone $validation1);
			$sheet->getCell("I$c")->setDataValidation(clone $validation2);
		}

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="sample_cash_'.date('Y-m-d(H:i:s)').'.xlsx"');
		$writer->save("php://output");
		
		$writer->save('my_cash.xlsx');
	}
	
	
	
// 	start

 function partner_report_Yaseen(){
        //   echo 'hi';
        //   die();
             
          
         $response = array('success' => false);
         
       
        $start_date = @$_POST['from'];
        $end_date = @$_POST['to'];
        $vendor_id = @$_POST['vendor_list'];
        $status=0;
        
        // echo '$start_date='.$start_date.'<br>';
        // echo '$end_date='.$end_date.'<br>';
        // echo '$vendor_id='.$vendor_id.'<br>';

        if(!$start_date){
            $start_date = date('Y-m-d h:i:s', strtotime($start_date));
        }

        if(!$end_date){
            $end_date = date('Y-m-d h:i:s');
        }
        
        
        
        
        if(($vendor_id) AND ($start_date) AND ($end_date)){
                  if($this->session->userdata('role') == 'admin'){
                  
                  if($vendor_id){
                         $where = "o.is_neutral=1 and o.str_keep_varification ='yes' and o.driver_id > 0 and  v.status='".$status."' and (o.status='Collected') and o.cooling_bag_check !=3 and o.vendor_id='".$vendor_id."' and o.varified_at BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
                  }
                }else{
                    $where = "o.is_neutral=1 and o.str_keep_varification ='yes' and o.driver_id > 0 and v.status='".$status."' and (o.status='Collected') and o.cooling_bag_check !=3  and o.vendor_id='".$vendor_id."' and o.varified_at BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
                 }
                
                 $report_data = $data['result'] =  $this->order_model->get_tracking_statistics_details($vendor_id,$start_date,$end_date,$where);
        }
                
                
                
       
        $sorted_data=$report_data['records'];
        if($report_data['result']){
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }
        
        
        $where2 = "o.vendor_id = $vendor_id and o.driver_id > 0 and (o.status = 'Delivered' or o.status='Collected') AND o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' AND '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $res=$this->order_model->get_orders_where($where2);
        
         $where3= " b.vendor_id= $vendor_id and b.driver_id != 0 and b.status ='Picked' and b.collected_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' AND '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
         
         
         $b_data=$this->bag_model->get_where($where3);
         $bag_data=$b_data['records'];
        // echo 'hi';
        // die();
        $response['res2'] = $res;
        $response['bag_data'] = $bag_data;
        
        // echo '<pre>';
        // print_r($response);
        // echo '<br>';
        // die();
        
        // echo '<pre>';
        // echo 'THIS IS IT:<br>';
        // foreach($res as $data =>$val) {
        //     echo 'hi';
        //     // print_r($val);
        //     echo $val['order_id'];
        //     // die();
        //     // echo 'data is :'.$data.'<br>';
        //     // echo 'Val is :'.$val.'<br>';
        //     // echo $data->order_id.'<br>';
        // }
        
        
        
        
        
        // START XLS HERE 
 
//   echo '$bag_data :'.$bag_data[0]->vendor;
//   die();
   if(count($sorted_data) > 0 OR count($res) > 0 OR count($bag_data) >0){
     
       $last=0;
         $yrdata= strtotime($start_date);
    
         $set_strt_dt=date('d M Y', $yrdata);
         
         $yrdata= strtotime($end_date);
          $set_end_dt=date('d M Y', $yrdata);
         
        //  echo '$set_strt_dt:'.$set_strt_dt.'-';
        //  echo '$set_end_dt:'.$set_end_dt;
         
         if(count($sorted_data) > 0){ //Taha
             $title_strng=$sorted_data[0]->vendor.' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Verified bags with delivery detail';
            $title_strng1=$sorted_data[0]->vendor.' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Bags Detail';
         }else if(count($res) >0){
            
             $title_strng=$res[0]['vendor'].' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Verified bags with delivery detail';
            $title_strng1=$res[0]['vendor'].' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Bags Detail';
         
         }else{
             $title_strng=$bag_data[0]->vendor.' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Verified bags with delivery detail';
            $title_strng1=$bag_data[0]->vendor.' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Bags Detail';
         }
        
       
        //  echo '<br> $title_strng:<br>'.$title_strng1;
        //  die();
        
        if(count($sorted_data) > 0){ //Taha
         $main_title=$sorted_data[0]->vendor;
        }else if(count($res) >0){
            $main_title=$res[0]['vendor'];
        }else{
            $main_title=$bag_data[0]->vendor;
        }
         	$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		
		$spreadsheet->getProperties()
    ->setCreator("LOGX TEAM")
    ->setLastModifiedBy("LOGX TEAM")
    ->setTitle('Verified_bags_delivery_detail')
    ->setSubject($title_strng)
    ->setDescription(
      $title_strng
    )
    ->setKeywords("Logx Team")
    ->setCategory("LOGX Partner Report");
		
		
	
		
		
		$sheet->setTitle('Verified_bags_delivery_detail');
		
    // 	$sheet->getDefaultStyle()->getFont()->setName('Times New Roman');
        
       
        
       
         $sheet->mergeCells('A1:D1');
          $sheet->setCellValue('A1',$title_strng);
           $sheet->getStyle("A1")->getFont()->setName('Times New Roman');
          $sheet->getStyle("A1")->getFont()->setSize(14);
         $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
         $spreadsheet->getActiveSheet()->getStyle("A1")->getFont()->getColor()->setARGB('3838414a');
         
         $sheet->mergeCells('E1:I1');
          $sheet->setCellValue('E1','LOGX');
          $sheet->getStyle("E1")->getFont()->setName('Times New Roman');
          $sheet->getStyle("E1")->getFont()->setSize(14);
         $sheet->getStyle('E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
      $spreadsheet->getActiveSheet()->getStyle("E1")->getFont()->getColor()->setARGB('3838414a');
       
       $sheet->getStyle("A2:I2")->getFont()->setName('Times New Roman');
          $sheet->getStyle("A2:I2")->getFont()->setSize(12);
          
          
               		 
    
           $spreadsheet->getActiveSheet()->getStyle("A2:I2")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $spreadsheet->getActiveSheet()->getStyle("A2:I2")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                 $spreadsheet->getActiveSheet()->getStyle("A2:I2")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
       
       
       
        $spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman');
          $spreadsheet->getDefaultStyle()->getFont()->setSize(10);
       
        // 	$sheet->setCellValue('I1', 'LOGX');
        // 	$sheet->getStyle("I1")->getFont()->setSize(10);
          	
		$sheet->setCellValue('A2', 'Sr');
		$sheet->setCellValue('B2', 'Order ID');
		$sheet->setCellValue('C2', 'Customer');
		$sheet->setCellValue('D2', 'Delivery Address');
		$sheet->setCellValue('E2', 'Bag Received');
		$sheet->setCellValue('F2', 'Ice Packs');
		$sheet->setCellValue('G2', 'Delivered Date');
		$sheet->setCellValue('H2', 'Storekeeper Varification');
		$sheet->setCellValue('I2', 'Vendor Varification');

		$styleArrayFirstRow = [
            'font' => [
                'bold' => true,
            ],
            ['fill_solid' => 'e3eb8a']
        ];
        $highestColumn = $sheet->getHighestColumn();
        $sheet->getStyle('A2:' . $highestColumn . '2' )->applyFromArray($styleArrayFirstRow);
        $sheet->getStyle('A1:' . $highestColumn . '1' )->applyFromArray($styleArrayFirstRow);

        //$sheet->getStyle('A1:11')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('e3eb8a');

		$sheet->getStyle('2:2')->getFont()->setBold(true);
		
		
		foreach(range('A','I') as $columnID) {
		    if($columnID =='D' ){
		        $sheet->getColumnDimension($columnID)->setWidth(60);
		    }else if($columnID =='A'OR $columnID =='H'OR $columnID =='E' OR $columnID =='I' OR $columnID =='C' OR $columnID =='B'){
		        $sheet->getColumnDimension($columnID)->setWidth(40);
		    }else{
    			$sheet->getColumnDimension($columnID)->setWidth(20);
		    }
		} 
           
           $siz_of_total=sizeof($sorted_data); 
           $cit=$siz_of_total+1;
           $emi=$cit+1;
       $sheet_index=1;
       $in=3;
       $num=1;
       
       $bags_returned_by_clients=0;
       $icebags_returned_by_clients=0;
        // echo 'total size is:'.$siz_of_total;
       $rest_of_information=$siz_of_total+10;
    //   echo 'other is:'.$rest_of_information;
    //   die();
    
    
    
    
    
   
     if(count($sorted_data) > 0){  //Taha
      foreach($sorted_data as $data =>$val){
 

                
                		$writer = new Xlsx($spreadsheet);

                        
                        		//notification validation
                        // 		$validation2 = $sheet->getCell('H2')->getDataValidation();
                        // 		$validation2->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST );
                        // 		$validation2->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION );
                        // 		$validation2->setAllowBlank(false);
                        // 		$validation2->setShowInputMessage(true);
                        // 		$validation2->setShowErrorMessage(true);
                        // 		$validation2->setShowDropDown(true);
                        // 		$validation2->setErrorTitle('Input error');
                        // 		$validation2->setError('Value is not in list.');
                        // 		$validation2->setPromptTitle('Pick from list');
                        // 		$validation2->setPrompt('Please pick a value from the drop-down list.');
                        // 		$validation2->setFormula1('"'.$alerts.'"');

                //END VALIDATIONS //
               
               
                $sheet->setCellValue("A$in", $num );
        		$sheet->setCellValue("B$in", $val->order_id);
        		$sheet->setCellValue("C$in", $val->name_on_delivery." ".$val->number_on_delivery);
        		$sheet->getStyle("C$in")->getAlignment()->setWrapText(true);
        		
        		$sheet->setCellValue("D$in", $val->delivery_address);
        		$sheet->setCellValue("E$in", $val->own_bag_rcv_by_driver);
        		$sheet->setCellValue("F$in", $val->ice_bags);
        		$sheet->setCellValue("G$in", $val->delivery_date);
        		$sheet->setCellValue("H$in", $val->str_keepr_name." ".$val->str_keeper_Phone);
        // 		$sheet->getStyle("H$in")->getAlignment()->setWrapText(true);
        		
        		$sheet->setCellValue("I$in", $val->neutral_name." ".$val->neutral_Phone);
        // 		$sheet->getStyle("I$in")->getAlignment()->setWrapText(true);
        		
        	
        	//Counting bags returend with clients	
        		$bags_returned_by_clients = $bags_returned_by_clients + $val->own_bag_rcv_by_driver;
        		
           //Ice packs returned by clients
              	$icebags_returned_by_clients = $icebags_returned_by_clients + $val->ice_bags;
              	
        		 if($val->own_bag_rcv_by_driver ==0){
                       		  $spreadsheet->getActiveSheet()->getStyle("A$in:I$in")
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED); 
    
                $spreadsheet->getActiveSheet()->getStyle("A$in:I$in")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $spreadsheet->getActiveSheet()->getStyle("A$in:I$in")
                ->getFill()->getStartColor()->setARGB('FFFFFF00');
        		 }
        		 $in +=1;
        		 $num +=1;
        }
     
        
        
        
       $sheet->getStyle("A$rest_of_information:C$rest_of_information")->getFont()->setName('Times New Roman');
          $sheet->getStyle("A$rest_of_information:C$rest_of_information")->getFont()->setSize(12);
          
          
               		 
    
           $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$rest_of_information")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$rest_of_information")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                 $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$rest_of_information")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
    
              	$sheet->setCellValue("A$rest_of_information", 'Total Verified Deliveries');
        		$sheet->setCellValue("B$rest_of_information", 'Total Bags returned by Clients');
        		$sheet->setCellValue("C$rest_of_information", 'Total IcePacks returned by Clients');
        		
        		
        		
     
                $rest_of_information_n=$rest_of_information+1;
                
                $counter=$rest_of_information_n+3;
                
                 $sheet->mergeCells("A$rest_of_information_n:A$counter");
                 $sheet->setCellValue("A$rest_of_information_n", $siz_of_total );
                 $sheet->getStyle("A$rest_of_information_n")->getFont()->setSize(14);
                 $sheet->getStyle("A$rest_of_information_n")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information_n")->getFont()->getColor()->setARGB('3838414a');
         
         
                 $sheet->mergeCells("B$rest_of_information_n:B$counter");
        		 $sheet->setCellValue("B$rest_of_information_n", $bags_returned_by_clients);
        		 $sheet->getStyle("B$rest_of_information_n")->getFont()->setSize(14);
                 $sheet->getStyle("B$rest_of_information_n")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $spreadsheet->getActiveSheet()->getStyle("B$rest_of_information_n")->getFont()->getColor()->setARGB('3838414a');
         
                 $sheet->mergeCells("C$rest_of_information_n:C$counter");
        		 $sheet->setCellValue("C$rest_of_information_n", $icebags_returned_by_clients);
        		 $sheet->getStyle("C$rest_of_information_n")->getFont()->setSize(14);
        		 $sheet->getStyle("C$rest_of_information_n")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $spreadsheet->getActiveSheet()->getStyle("C$rest_of_information_n")->getFont()->getColor()->setARGB('3838414a');
        
        		
        		$spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$counter")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$counter")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$counter")->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$counter")->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
      
       //Taha
      
      
    //   sami bhae
                        //   $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
                        //   $spreadsheet->getActiveSheet()->getProtection()->setSort(true);
                        //   $spreadsheet->getActiveSheet()->getProtection()->setInsertRows(true);
                        //   $spreadsheet->getActiveSheet()->getProtection()->setFormatCells(true);
                        
                        //   $spreadsheet->getActiveSheet()->getProtection()->setPassword('SAMI_LOGX_password');
                        
                        
                        // sami bhae end
               
                // echo '$siz_of_total:'.$siz_of_total.'<br>';
                // echo '$bags_returned_by_clients:'.$bags_returned_by_clients.'<br>';
                // echo '$icebags_returned_by_clients:'.$icebags_returned_by_clients.'<br>';
                // die();
       
     }else{$writer = new Xlsx($spreadsheet);
         
         
          $sheet->mergeCells('A3:H3');
          $sheet->setCellValue('A3','No Verified bags found!');
          $sheet->getStyle("A3")->getFont()->setName('Times New Roman');
          $sheet->getStyle("A3")->getFont()->setSize(16);
          $sheet->getStyle('A3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
              
       		
        		
        // 		sami bhae
        		  //$spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
            //               $spreadsheet->getActiveSheet()->getProtection()->setSort(true);
            //               $spreadsheet->getActiveSheet()->getProtection()->setInsertRows(true);
            //               $spreadsheet->getActiveSheet()->getProtection()->setFormatCells(true);
                        
            //               $spreadsheet->getActiveSheet()->getProtection()->setPassword('SAMI_LOGX_password');
         
        //  sami bhae end
     }
        		//AYESHA NEW Work
		
          // Add new sheet
          $objWorkSheet = $spreadsheet->createSheet(1); //Setting index when creating
          //Write cells
          $cell = "";
          
       
            
          
         
                $objWorkSheet->mergeCells('A1:D1');
          $objWorkSheet->setCellValue('A1',$title_strng1);
           $objWorkSheet->getStyle("A1")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("A1")->getFont()->setSize(14);
         $objWorkSheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
         $objWorkSheet->getStyle("A1")->getFont()->getColor()->setARGB('3838414a');
          
      
         
         $objWorkSheet->mergeCells('E1:I1');
          $objWorkSheet->setCellValue('E1','LOGX');
          $objWorkSheet->getStyle("E1")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("E1")->getFont()->setSize(14);
         $objWorkSheet->getStyle('E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
      $objWorkSheet->getStyle("E1")->getFont()->getColor()->setARGB('3838414a');
       
       $objWorkSheet->getStyle("A2:I2")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("A2:I2")->getFont()->setSize(12);
          
          
               		 
    
           $objWorkSheet->getStyle("A2:I2")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $objWorkSheet->getStyle("A2:I2")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                 $objWorkSheet->getStyle("A2:I2")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
       
       	
       
       $spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman');
          $spreadsheet->getDefaultStyle()->getFont()->setSize(10);
          
         
          
        //   error
        // $objWorkSheet->getDefaultStyle()->getFont()->setName('Times New Roman');
        //   $objWorkSheet->getDefaultStyle()->getFont()->setSize(10);
         //   error
         
         
        // 	$sheet->setCellValue('I1', 'LOGX');
        // 	$sheet->getStyle("I1")->getFont()->setSize(10);
          
		$objWorkSheet->setCellValue('A2', 'Sr');
		$objWorkSheet->setCellValue('B2', 'Order ID');
		$objWorkSheet->setCellValue('C2', 'Customer');
		$objWorkSheet->setCellValue('D2', 'Delivery Address');
		$objWorkSheet->setCellValue('E2', 'Bag Received');
		$objWorkSheet->setCellValue('F2', 'Ice Packs');
		$objWorkSheet->setCellValue('G2', 'Delivered Date');
		$objWorkSheet->setCellValue('H2', 'Collected Date');
// 		tayyab
$objWorkSheet->setCellValue('I2', 'Collected From');
		 
          
		$styleArrayFirstRow = [
            'font' => [
                'bold' => true,
            ],
            ['fill_solid' => 'e3eb8a']
        ];
        $highestColumn = $objWorkSheet->getHighestColumn();
        $objWorkSheet->getStyle('A2:' . $highestColumn . '2' )->applyFromArray($styleArrayFirstRow);
        $objWorkSheet->getStyle('A1:' . $highestColumn . '1' )->applyFromArray($styleArrayFirstRow);

        //$sheet->getStyle('A1:11')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('e3eb8a');

		$objWorkSheet->getStyle('2:2')->getFont()->setBold(true);

		
		foreach(range('A','I') as $columnID) {
		    if($columnID =='D' ){
		        $objWorkSheet->getColumnDimension($columnID)->setWidth(60);
		    }else if($columnID =='H'OR $columnID =='E' OR $columnID =='G' OR $columnID =='H' OR $columnID =='C' OR $columnID =='I' ){
		        $objWorkSheet->getColumnDimension($columnID)->setWidth(40);
		    }else if($columnID =='B' OR $columnID =='A'){
		        $objWorkSheet->getColumnDimension($columnID)->setWidth(70);
		    }else{
    			$objWorkSheet->getColumnDimension($columnID)->setWidth(20);
		    }
		} 
           		          
           $siz_of_total1=sizeof($res); 
        //   $cit1=$siz_of_total+1;
        //   $emi1=$cit+1;
       $sheet_index=1;
       $in1=3;
       $num1=1;
       
       $bags_returned_by_clients1=0;
       $icebags_returned_by_clients1=0;
        // echo 'total size is:'.$siz_of_total;
       $rest_of_information1=$siz_of_total1+10;
                $key = 1;
    
    
    $total_deliveires_from_delivery=0;
      if(count($res) > 0){  //Taha
      
                foreach($res as $data =>$val) {
                
                $objWorkSheet->setCellValue("A$in1", $num1 );
        		$objWorkSheet->setCellValue("B$in1", $val['order_id']);
        		$objWorkSheet->setCellValue("C$in1", $val['name_on_delivery']." ".$val['number_on_delivery']);
        		$objWorkSheet->getStyle("C$in1")->getAlignment()->setWrapText(true);
        		
        		$objWorkSheet->setCellValue("D$in1", $val['delivery_address']);
        		$objWorkSheet->setCellValue("E$in1", $val['bag_received']);
        		$objWorkSheet->setCellValue("F$in1", $val['ice_bags']);
        		$objWorkSheet->setCellValue("G$in1", $val['delivery_date']);
        		$objWorkSheet->setCellValue("H$in1", '00-00-0000');
        		
        // 		tayyab
               $objWorkSheet->setCellValue("I$in1", 'Delivery');
        	//Counting bags returend with clients	
        		$bags_returned_by_clients1 = $bags_returned_by_clients1 + $val['bag_received'];
        		
           //Ice packs returned by clients
              	$icebags_returned_by_clients1 = $icebags_returned_by_clients1 + $val['ice_bags'];
              	
        		 if($val['bag_received'] ==0){
        		     $objWorkSheet->setCellValue("I$in1", 'None');
                       		  $objWorkSheet->getStyle("A$in1:I$in1")
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED); 
    
                $objWorkSheet->getStyle("A$in1:I$in1")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $objWorkSheet->getStyle("A$in1:I$in1")
                ->getFill()->getStartColor()->setARGB('FFFFFF00');
        		 }
        		 $in1 +=1;
        		 $num1 +=1;
                }
                
      }
            
              $total_deliveires_from_delivery=$num1;
            
            if(count($bag_data) > 0){
                
                foreach($bag_data as $data =>$val) {
                
                $objWorkSheet->setCellValue("A$in1", $num1 );
        		$objWorkSheet->setCellValue("B$in1", $val->bag_id);
        		$objWorkSheet->setCellValue("C$in1", $val->customer." ".$val->c_phone);
        		$objWorkSheet->getStyle("C$in1")->getAlignment()->setWrapText(true);
        		
        		$objWorkSheet->setCellValue("D$in1", $val->bag_address);
        		$objWorkSheet->setCellValue("E$in1", $val->received_bag_qty);
        		$objWorkSheet->setCellValue("F$in1", '0');
        		$objWorkSheet->setCellValue("G$in1", '00-00-0000');
                $objWorkSheet->setCellValue("H$in1", $val->collected_date);
                
                // tayyab
                $objWorkSheet->setCellValue("I$in1", 'Bag Collection');
        	//Counting bags returend with clients	
        		$bags_returned_by_clients1 = $bags_returned_by_clients1 + $val->received_bag_qty;
        		
             	
        		 if($val->received_bag_qty ==0){
                       		  $objWorkSheet->getStyle("A$in1:I$in1")
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED); 
    
                $objWorkSheet->getStyle("A$in1:I$in1")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $objWorkSheet->getStyle("A$in1:I$in1")
                ->getFill()->getStartColor()->setARGB('FFFFFF00');
        	
        		 }else{
        		     
    
                $objWorkSheet->getStyle("A$in1:I$in1")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                
                $objWorkSheet->getStyle("A$in1:I$in1")
                ->getFill()->getStartColor()->setARGB('ffff7f00');
        		 
        		     
        		 }
        		 
        		 
        		 
        		 
        		 
        		 
        		 $in1 +=1;
        		 $num1 +=1;
                }
                
                 $rest_of_information1=$num1+10;
            }
          
            
            
            if(count($bag_data) ==0 AND count($res)==0){
                $objWorkSheet->mergeCells('A3:I3');
          $objWorkSheet->setCellValue('A3','No Detail found!');
          $objWorkSheet->getStyle("A3")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("A3")->getFont()->setSize(16);
          $objWorkSheet->getStyle('A3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
          
            }
            
   
          // Rename sheet
          $objWorkSheet->setTitle("Bags_detail");
          
          
        //   sami bhae
        //   $objWorkSheet->getProtection()->setSheet(true);
        //   $objWorkSheet->getProtection()->setSort(true);
        //   $objWorkSheet->getProtection()->setInsertRows(true);
        //   $objWorkSheet->getProtection()->setFormatCells(true);
        
        //   $objWorkSheet->getProtection()->setPassword('password');
          
        //   end sami bhae
          
          $spreadsheet->addNamedRange(
                new \PhpOffice\PhpSpreadsheet\NamedRange('Bags_detail', $spreadsheet->getSheetByName('Bags_detail'), 'A1:I1') 
            );
          
		// End AYESHA NEW Work
		
      
       if(count($res) > 0){  //Taha
       $objWorkSheet->getStyle("A$rest_of_information1:C$rest_of_information1")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("A$rest_of_information1:C$rest_of_information1")->getFont()->setSize(12);
          
          
               		 
   
           $objWorkSheet->getStyle("A$rest_of_information1:C$rest_of_information1")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                
                $objWorkSheet->getStyle("A$rest_of_information1:C$rest_of_information1")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                	 
                 $objWorkSheet->getStyle("A$rest_of_information1:C$rest_of_information1")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
    
              	$objWorkSheet->setCellValue("A$rest_of_information1", 'Total Deliveries');
        		$objWorkSheet->setCellValue("B$rest_of_information1", 'Total Bags returned by Clients');
        		$objWorkSheet->setCellValue("C$rest_of_information1", 'Total IcePacks returned by Clients');
        		
        		
     
                $rest_of_information_n1=$rest_of_information1+1;
                
                $counter1=$rest_of_information_n1+3;
                
                
                  $total_delivries_counter=$num1-1;
                  
                  $total_deliveires_from_delivery=$total_deliveires_from_delivery-1;
                
                 $objWorkSheet->mergeCells("A$rest_of_information_n1:A$counter1");
                 $objWorkSheet->setCellValue("A$rest_of_information_n1",$total_deliveires_from_delivery );
                 $objWorkSheet->getStyle("A$rest_of_information_n1")->getFont()->setSize(14);
                 $objWorkSheet->getStyle("A$rest_of_information_n1")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("A$rest_of_information_n1")->getFont()->getColor()->setARGB('3838414a');
        
         
                 $objWorkSheet->mergeCells("B$rest_of_information_n1:B$counter1");
        		 $objWorkSheet->setCellValue("B$rest_of_information_n1", $bags_returned_by_clients1);
        		 $objWorkSheet->getStyle("B$rest_of_information_n1")->getFont()->setSize(14);
                 $objWorkSheet->getStyle("B$rest_of_information_n1")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("B$rest_of_information_n1")->getFont()->getColor()->setARGB('3838414a');
                   
                    
                    
                 $objWorkSheet->mergeCells("C$rest_of_information_n1:C$counter1");
        		 $objWorkSheet->setCellValue("C$rest_of_information_n1", $icebags_returned_by_clients1);
        		 $objWorkSheet->getStyle("C$rest_of_information_n1")->getFont()->setSize(14);
        		 $objWorkSheet->getStyle("C$rest_of_information_n1")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("C$rest_of_information_n1")->getFont()->getColor()->setARGB('3838414a');
        
        		
        		$objWorkSheet->getStyle("A$rest_of_information1:C$counter1")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1:C$counter1")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1:C$counter1")->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1:C$counter1")->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
      
      
        //       echo '$siz_of_total1+10:'.$siz_of_total1.'<br>';
        // 		echo '$rest_of_information1:'.$rest_of_information1.'<br>';
        		
        //         echo '$counter1:'.$counter1.'<br>';
                
        //         echo '$rest_of_information_n1:'.$rest_of_information_n1.'<br>';
                
        //         echo '--------------------------------';
                // die();
      
     if(count($sorted_data) > 0){ 
    //   For EXTRA BAGS DETAILS
    // echo 'before:'.$rest_of_information1.'<br>';
        //         die();
                 $rest_of_information1x=$counter1+4;
    // echo 'after:'.$rest_of_information1x.'<br>';
    
    // echo 'old counter:'.$counter1.'<br>';
    
            $objWorkSheet->getStyle("A$rest_of_information1x:C$rest_of_information1x")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("A$rest_of_information1x:C$rest_of_information1x")->getFont()->setSize(12);
                
                 
          
               		 
   
           $objWorkSheet->getStyle("A$rest_of_information1x:C$rest_of_information1x")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                
                $objWorkSheet->getStyle("A$rest_of_information1x:C$rest_of_information1x")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                	 
                 $objWorkSheet->getStyle("A$rest_of_information1x:C$rest_of_information1x")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
    
              	$objWorkSheet->setCellValue("A$rest_of_information1x", 'Verified Bags(Bags have delivery track and QR)');
        		$objWorkSheet->setCellValue("B$rest_of_information1x", 'Extra Bags(Bags do not have delivery track/QR/complete verifications)');
        		$objWorkSheet->setCellValue("C$rest_of_information1x", 'Total Bags Received');
        		
        		
     
                $rest_of_information_n1x=$rest_of_information1x+1;
                
                // echo 'inner data cell is:'.$rest_of_information_n1x.'<br>';
                // die();
                $counter1x=$rest_of_information_n1x+3;
            //   echo 'And new counter is:'.$counter1x.'<br>';
                    //  die();
                     // CALCULATION 
                    //  echo '$bags_returned_by_clients: '.$bags_returned_by_clients.'<br>';
                    //  echo 'tot: '.$bags_returned_by_clients1.'<br>';
                    //  die();
                     $verified_bags = $bags_returned_by_clients;
                     
                     $total_bag_recv = $bags_returned_by_clients1;
                     
                     $not_verified_bag = $total_bag_recv - $verified_bags;
       
                
                 $objWorkSheet->mergeCells("A$rest_of_information_n1x:A$counter1x");
                 $objWorkSheet->setCellValue("A$rest_of_information_n1x", $verified_bags );
                 $objWorkSheet->getStyle("A$rest_of_information_n1x")->getFont()->setSize(14);
                 $objWorkSheet->getStyle("A$rest_of_information_n1x")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("A$rest_of_information_n1x")->getFont()->getColor()->setARGB('3838414a');
        
                     
                     
                     
                     
                     
                    
                     
                 $objWorkSheet->mergeCells("B$rest_of_information_n1x:B$counter1x");
        		 $objWorkSheet->setCellValue("B$rest_of_information_n1x",$not_verified_bag);
        		 $objWorkSheet->getStyle("B$rest_of_information_n1x")->getFont()->setSize(14);
                 $objWorkSheet->getStyle("B$rest_of_information_n1x")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("B$rest_of_information_n1x")->getFont()->getColor()->setARGB('3838414a');
         
                 
                   
                 $objWorkSheet->mergeCells("C$rest_of_information_n1x:C$counter1x");
        		 $objWorkSheet->setCellValue("C$rest_of_information_n1x",$total_bag_recv);
        		 $objWorkSheet->getStyle("C$rest_of_information_n1x")->getFont()->setSize(14);
        		 $objWorkSheet->getStyle("C$rest_of_information_n1x")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("C$rest_of_information_n1x")->getFont()->getColor()->setARGB('3838414a');
        
        	
        		$objWorkSheet->getStyle("A$rest_of_information1x:C$counter1x")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1x:C$counter1x")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1x:C$counter1x")->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1x:C$counter1x")->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                   
    	   //     echo '$rest_of_information1:'.$rest_of_information1.'<br>';
        // 		echo '$rest_of_information1x:'.$rest_of_information1x.'<br>';
        		
        //         echo '$counter1x:'.$counter1x.'<br>';
                
        //         echo '$rest_of_information_n1x:'.$rest_of_information_n1x.'<br>';
                
        //         echo 'verified_bags:'.$verified_bags.'<br>';
        //         echo '$not_verified_bag:'.$not_verified_bag.'<br>';
        //         echo '$total_bag_recv:'.$total_bag_recv.'<br>';
        //         die();
    
    // END EXTRA BAG DETAIL
    
     }
    //   echo 'hi';
    //       die();
    
       }
    
      	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      	if(count($sorted_data) > 0){
		header('Content-Disposition: attachment; filename="'.$sorted_data[0]->vendor.'_'.date('Y-m-d_(H:i:s)').'.xlsx"');
      	}else{
      	    header('Content-Disposition: attachment; filename="'.$res[0]['vendor'].'_'.date('Y-m-d_(H:i:s)').'.xlsx"');
      	
      	}
		$writer->save("php://output");
		
		redirect('vendor_deliveries_complete_report');
// 		echo json_encode($response);
	// END OF MAIN IF	
   }else{
       
       $this->session->set_flashdata('error', 'No Record Found, Try Again!');
              redirect('vendor_deliveries_complete_report');
       
       } 
   
}


// END


// Strt 
 function partner_report(){
        //   echo 'hi';
        //   die();
             
          
         $response = array('success' => false);
         
       
        $start_date = @$_POST['from'];
        $end_date = @$_POST['to'];
        $vendor_id = @$_POST['vendor_list'];
        $status=0;
        
        // echo '$start_date='.$start_date.'<br>';
        // echo '$end_date='.$end_date.'<br>';
        // echo '$vendor_id='.$vendor_id.'<br>';

        if(!$start_date){
            $start_date = date('Y-m-d h:i:s', strtotime($start_date));
        }

        if(!$end_date){
            $end_date = date('Y-m-d h:i:s');
        }
        
        
        
        
        if(($vendor_id) AND ($start_date) AND ($end_date)){
                  if($this->session->userdata('role') == 'admin'){
                  
                  if($vendor_id){
                         $where = "o.is_neutral=1 and o.str_keep_varification ='yes' and o.driver_id > 0 and  v.status='".$status."' and (o.status='Collected') and o.cooling_bag_check !=3 and o.vendor_id='".$vendor_id."' and o.varified_at BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
                  }
                }else{
                    $where = "o.is_neutral=1 and o.str_keep_varification ='yes' and o.driver_id > 0 and v.status='".$status."' and (o.status='Collected') and o.cooling_bag_check !=3  and o.vendor_id='".$vendor_id."' and o.varified_at BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
                 }
                
                 $report_data = $data['result'] =  $this->order_model->get_tracking_statistics_details($vendor_id,$start_date,$end_date,$where);
        }
                
                
           
       
        $sorted_data=$report_data['records'];
        if($report_data['result']){
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }
        
      
        
        $where2 = "o.vendor_id = $vendor_id and o.driver_id > 0 and (o.status = 'Delivered' or o.status='Collected') AND o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' AND '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $res=$this->order_model->get_orders_where($where2);
        
         $where3= " b.vendor_id= $vendor_id and b.driver_id != 0 and b.status ='Picked' and b.collected_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' AND '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
         
         
         $b_data=$this->bag_model->get_where($where3);
         $bag_data=$b_data['records'];
        // echo 'hi';
        // die();
        $response['res2'] = $res;
        $response['bag_data'] = $bag_data;
        
        // echo '<pre>';
        // print_r($response);
        // echo '<br>';
        // die();
        
        // echo '<pre>';
        // echo 'THIS IS IT:<br>';
        // foreach($res as $data =>$val) {
        //     echo 'hi';
        //     // print_r($val);
        //     echo $val['order_id'];
        //     // die();
        //     // echo 'data is :'.$data.'<br>';
        //     // echo 'Val is :'.$val.'<br>';
        //     // echo $data->order_id.'<br>';
        // }
        
        
        
        
        
        // START XLS HERE 
 
//   echo '$bag_data :'.$bag_data[0]->vendor;
//   die();
   if(count($sorted_data) > 0 OR count($res) > 0 OR count($bag_data) >0){
     
       $last=0;
         $yrdata= strtotime($start_date);
    
         $set_strt_dt=date('d M Y', $yrdata);
         
         $yrdata= strtotime($end_date);
          $set_end_dt=date('d M Y', $yrdata);
         
        //  echo '$set_strt_dt:'.$set_strt_dt.'-';
        //  echo '$set_end_dt:'.$set_end_dt;
         
         if(count($sorted_data) > 0){ //Taha
             $title_strng=$sorted_data[0]->vendor.' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Verified bags with delivery detail';
            $title_strng1=$sorted_data[0]->vendor.' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Bags Detail';
         }else if(count($res) >0){
            
             $title_strng=$res[0]['vendor'].' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Verified bags with delivery detail';
            $title_strng1=$res[0]['vendor'].' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Bags Detail';
         
         }else{
             $title_strng=$bag_data[0]->vendor.' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Verified bags with delivery detail';
            $title_strng1=$bag_data[0]->vendor.' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Bags Detail';
         }
        
       
        //  echo '<br> $title_strng:<br>'.$title_strng1;
        //  die();
        
        if(count($sorted_data) > 0){ //Taha
         $main_title=$sorted_data[0]->vendor;
        }else if(count($res) >0){
            $main_title=$res[0]['vendor'];
        }else{
            $main_title=$bag_data[0]->vendor;
        }
         	$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		
		$spreadsheet->getProperties()
    ->setCreator("LOGX TEAM")
    ->setLastModifiedBy("LOGX TEAM")
    ->setTitle('Verified_bags_delivery_detail')
    ->setSubject($title_strng)
    ->setDescription(
      $title_strng
    )
    ->setKeywords("Logx Team")
    ->setCategory("LOGX Partner Report");
		
		
	
		
		
		$sheet->setTitle('Verified_bags_delivery_detail');
		
    // 	$sheet->getDefaultStyle()->getFont()->setName('Times New Roman');
        
       
        
       
         $sheet->mergeCells('B1:G1');
          $sheet->setCellValue('B1',$title_strng);
           $sheet->getStyle("B1")->getFont()->setName('Times New Roman');
          $sheet->getStyle("B1")->getFont()->setSize(14);
         $sheet->getStyle('B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
         $spreadsheet->getActiveSheet()->getStyle("A1")->getFont()->getColor()->setARGB('3838414a');
         
         $sheet->mergeCells('H1:I1');
            
            $img = './assets/images/logos-logo-full.png';
            $objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
            $objDrawing->setName('Sample image');
            $objDrawing->setDescription('Sample image');
            $objDrawing->setPath($img);
            $objDrawing->setHeight(25);
            $objDrawing->setCoordinates('I1');
            $objDrawing->setWorksheet($spreadsheet->getActiveSheet());
            // Najam bhae Image in Excel
         
         
         
         
         
         
          //$sheet->setCellValue('E1','LOGX');
          $sheet->getStyle("I1")->getFont()->setName('Times New Roman');
          $sheet->getStyle("I1")->getFont()->setSize(14);
         $sheet->getStyle('I1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
      $spreadsheet->getActiveSheet()->getStyle("I1")->getFont()->getColor()->setARGB('3838414a');
       
       $sheet->getStyle("A2:I2")->getFont()->setName('Times New Roman');
          $sheet->getStyle("A2:I2")->getFont()->setSize(12);
          
          
               		 
    
           $spreadsheet->getActiveSheet()->getStyle("A2:I2")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $spreadsheet->getActiveSheet()->getStyle("A2:I2")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                 $spreadsheet->getActiveSheet()->getStyle("A2:I2")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
       
       
       
        $spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman');
          $spreadsheet->getDefaultStyle()->getFont()->setSize(10);
       
        // 	$sheet->setCellValue('I1', 'LOGX');
        // 	$sheet->getStyle("I1")->getFont()->setSize(10);
          	
		$sheet->setCellValue('A2', 'Sr');
		$sheet->setCellValue('B2', 'Order ID');
		$sheet->setCellValue('C2', 'Customer');
		$sheet->setCellValue('D2', 'Delivery Address');
		$sheet->setCellValue('E2', 'Bag Received');
		$sheet->setCellValue('F2', 'Ice Packs');
		$sheet->setCellValue('G2', 'Delivered Date');
		$sheet->setCellValue('H2', 'Storekeeper Varification');
		$sheet->setCellValue('I2', 'Vendor Varification');
		

		$styleArrayFirstRow = [
            'font' => [
                'bold' => true,
            ],
            ['fill_solid' => 'e3eb8a']
        ];
        $highestColumn = $sheet->getHighestColumn();
        $sheet->getStyle('A2:' . $highestColumn . '2' )->applyFromArray($styleArrayFirstRow);
        $sheet->getStyle('A1:' . $highestColumn . '1' )->applyFromArray($styleArrayFirstRow);

        //$sheet->getStyle('A1:11')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('e3eb8a');

		$sheet->getStyle('2:2')->getFont()->setBold(true);
		
		
		foreach(range('A','I') as $columnID) {
		    if($columnID =='D' ){
		        $sheet->getColumnDimension($columnID)->setWidth(30);
		    }else if($columnID =='A'OR $columnID =='H'OR $columnID =='E' OR $columnID =='I' OR $columnID =='C' OR $columnID =='B'){
		        $sheet->getColumnDimension($columnID)->setWidth(20);
		    }else{
    			$sheet->getColumnDimension($columnID)->setWidth(10);
		    }
		} 
           
           $siz_of_total=sizeof($sorted_data); 
           $cit=$siz_of_total+1;
           $emi=$cit+1;
       $sheet_index=1;
       $in=3;
       $num=1;
       
       $bags_returned_by_clients=0;
       $icebags_returned_by_clients=0;
        // echo 'total size is:'.$siz_of_total;
       $rest_of_information=$siz_of_total+10;
    //   echo 'other is:'.$rest_of_information;
    //   die();
    
    
    
    
    
   
     if(count($sorted_data) > 0){  //Taha
      foreach($sorted_data as $data =>$val){
 

                
                		$writer = new Xlsx($spreadsheet);

                        
                        		//notification validation
                        // 		$validation2 = $sheet->getCell('H2')->getDataValidation();
                        // 		$validation2->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST );
                        // 		$validation2->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION );
                        // 		$validation2->setAllowBlank(false);
                        // 		$validation2->setShowInputMessage(true);
                        // 		$validation2->setShowErrorMessage(true);
                        // 		$validation2->setShowDropDown(true);
                        // 		$validation2->setErrorTitle('Input error');
                        // 		$validation2->setError('Value is not in list.');
                        // 		$validation2->setPromptTitle('Pick from list');
                        // 		$validation2->setPrompt('Please pick a value from the drop-down list.');
                        // 		$validation2->setFormula1('"'.$alerts.'"');

                //END VALIDATIONS //
               
               
                $sheet->setCellValue("A$in", $num );
        		$sheet->setCellValue("B$in", $val->order_id);
        		$sheet->setCellValue("C$in", $val->name_on_delivery." "); //.$val->number_on_delivery
        		$sheet->getStyle("C$in")->getAlignment()->setWrapText(true);
        		
        		$sheet->setCellValue("D$in", $val->delivery_address);
        		$sheet->setCellValue("E$in", $val->own_bag_rcv_by_driver);
        		$sheet->setCellValue("F$in", $val->ice_bags);
        		$sheet->setCellValue("G$in", $val->delivery_date);
        		$sheet->setCellValue("H$in", $val->str_keepr_name." ".$val->str_keeper_Phone);
        // 		$sheet->getStyle("H$in")->getAlignment()->setWrapText(true);
        		
        		$sheet->setCellValue("I$in", $val->neutral_name." ".$val->neutral_Phone);
        // 		$sheet->getStyle("I$in")->getAlignment()->setWrapText(true);
        		
        	
        	//Counting bags returend with clients	
        		$bags_returned_by_clients = $bags_returned_by_clients + $val->own_bag_rcv_by_driver;
        		
           //Ice packs returned by clients
              	$icebags_returned_by_clients = $icebags_returned_by_clients + $val->ice_bags;
              	
        		 if($val->own_bag_rcv_by_driver ==0){
                       		  $spreadsheet->getActiveSheet()->getStyle("A$in:I$in")
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED); 
    
                $spreadsheet->getActiveSheet()->getStyle("A$in:I$in")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $spreadsheet->getActiveSheet()->getStyle("A$in:I$in")
                ->getFill()->getStartColor()->setARGB('FFFFFF00');
        		 }
        		 $in +=1;
        		 $num +=1;
        }
     
        
        
        
       $sheet->getStyle("A$rest_of_information:C$rest_of_information")->getFont()->setName('Times New Roman');
          $sheet->getStyle("A$rest_of_information:C$rest_of_information")->getFont()->setSize(12);
          
          
               		 
    
           $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$rest_of_information")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$rest_of_information")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                 $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$rest_of_information")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
    
              	$sheet->setCellValue("A$rest_of_information", 'Total Verified Deliveries');
        		$sheet->setCellValue("B$rest_of_information", 'Total Bags returned by Clients');
        		$sheet->setCellValue("C$rest_of_information", 'Total IcePacks returned by Clients');
        		
        		
        		
     
                $rest_of_information_n=$rest_of_information+1;
                
                $counter=$rest_of_information_n+3;
                
                 $sheet->mergeCells("A$rest_of_information_n:A$counter");
                 $sheet->setCellValue("A$rest_of_information_n", $siz_of_total );
                 $sheet->getStyle("A$rest_of_information_n")->getFont()->setSize(14);
                 $sheet->getStyle("A$rest_of_information_n")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information_n")->getFont()->getColor()->setARGB('3838414a');
         
         
                 $sheet->mergeCells("B$rest_of_information_n:B$counter");
        		 $sheet->setCellValue("B$rest_of_information_n", $bags_returned_by_clients);
        		 $sheet->getStyle("B$rest_of_information_n")->getFont()->setSize(14);
                 $sheet->getStyle("B$rest_of_information_n")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $spreadsheet->getActiveSheet()->getStyle("B$rest_of_information_n")->getFont()->getColor()->setARGB('3838414a');
         
                 $sheet->mergeCells("C$rest_of_information_n:C$counter");
        		 $sheet->setCellValue("C$rest_of_information_n", $icebags_returned_by_clients);
        		 $sheet->getStyle("C$rest_of_information_n")->getFont()->setSize(14);
        		 $sheet->getStyle("C$rest_of_information_n")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $spreadsheet->getActiveSheet()->getStyle("C$rest_of_information_n")->getFont()->getColor()->setARGB('3838414a');
        
        		
        		$spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$counter")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$counter")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$counter")->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$counter")->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
      
       //Taha
      
      
    //   sami bhae
                        //   $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
                        //   $spreadsheet->getActiveSheet()->getProtection()->setSort(true);
                        //   $spreadsheet->getActiveSheet()->getProtection()->setInsertRows(true);
                        //   $spreadsheet->getActiveSheet()->getProtection()->setFormatCells(true);
                        
                        //   $spreadsheet->getActiveSheet()->getProtection()->setPassword('SAMI_LOGX_password');
                        
                        
                        // sami bhae end
               
                // echo '$siz_of_total:'.$siz_of_total.'<br>';
                // echo '$bags_returned_by_clients:'.$bags_returned_by_clients.'<br>';
                // echo '$icebags_returned_by_clients:'.$icebags_returned_by_clients.'<br>';
                // die();
       
     }else{$writer = new Xlsx($spreadsheet);
         
         
          $sheet->mergeCells('A3:H3');
          $sheet->setCellValue('A3','No Verified bags found!');
          $sheet->getStyle("A3")->getFont()->setName('Times New Roman');
          $sheet->getStyle("A3")->getFont()->setSize(16);
          $sheet->getStyle('A3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
              
       		
        		
        // 		sami bhae
        		  //$spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
            //               $spreadsheet->getActiveSheet()->getProtection()->setSort(true);
            //               $spreadsheet->getActiveSheet()->getProtection()->setInsertRows(true);
            //               $spreadsheet->getActiveSheet()->getProtection()->setFormatCells(true);
                        
            //               $spreadsheet->getActiveSheet()->getProtection()->setPassword('SAMI_LOGX_password');
         
        //  sami bhae end
     }
        		//AYESHA NEW Work
		
          // Add new sheet
          $objWorkSheet = $spreadsheet->createSheet(1); //Setting index when creating
          //Write cells
          $cell = "";
          
       
            
          
         
                $objWorkSheet->mergeCells('B1:G1');
          $objWorkSheet->setCellValue('B1',$title_strng1);
           $objWorkSheet->getStyle("B1")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("B1")->getFont()->setSize(14);
         $objWorkSheet->getStyle('B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
         $objWorkSheet->getStyle("B1")->getFont()->getColor()->setARGB('3838414a');
          
      
         
         $objWorkSheet->mergeCells('H1:K1');
            $img = './assets/images/logos-logo-full.png';
            $objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
            $objDrawing->setName('Sample image');
            $objDrawing->setDescription('Sample image');
            $objDrawing->setPath($img);
            $objDrawing->setHeight(25);
            $objDrawing->setCoordinates('K1');
            $objDrawing->setWorksheet($spreadsheet->getActiveSheet());
            
            
            
            
            
          $objWorkSheet->setCellValue('I1','LOGX');
          $objWorkSheet->getStyle("I1")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("I1")->getFont()->setSize(14);
         $objWorkSheet->getStyle('I1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
      $objWorkSheet->getStyle("I1")->getFont()->getColor()->setARGB('3838414a');
       
       $objWorkSheet->getStyle("A2:I2")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("A2:I2")->getFont()->setSize(12);
          
          
               		 
    
           $objWorkSheet->getStyle("A2:K2")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $objWorkSheet->getStyle("A2:K2")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                 $objWorkSheet->getStyle("A2:K2")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
       
       	
       
       $spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman');
          $spreadsheet->getDefaultStyle()->getFont()->setSize(10);
          
         
          
        //   error
        // $objWorkSheet->getDefaultStyle()->getFont()->setName('Times New Roman');
        //   $objWorkSheet->getDefaultStyle()->getFont()->setSize(10);
         //   error
         
         
        // 	$sheet->setCellValue('I1', 'LOGX');
        // 	$sheet->getStyle("I1")->getFont()->setSize(10);
          
		$objWorkSheet->setCellValue('A2', 'Sr');
		$objWorkSheet->setCellValue('B2', 'Order ID');
		$objWorkSheet->setCellValue('C2', 'Customer');
		$objWorkSheet->setCellValue('D2', 'Delivery Address');
		$objWorkSheet->setCellValue('E2', 'Bag Received');
		$objWorkSheet->setCellValue('F2', 'Ice Packs');
		$objWorkSheet->setCellValue('G2', 'Delivered Date');
		$objWorkSheet->setCellValue('H2', 'Collected Date');
// 		tayyab
        $objWorkSheet->setCellValue('I2', 'Collected From');
        $objWorkSheet->setCellValue('J2', 'Empty Bags Code');
		$objWorkSheet->setCellValue('K2', 'Empty Bags Image');
		 
          
		$styleArrayFirstRow = [
            'font' => [
                'bold' => true,
            ],
            ['fill_solid' => 'e3eb8a']
        ];
        $highestColumn = $objWorkSheet->getHighestColumn();
        $objWorkSheet->getStyle('A2:' . $highestColumn . '2' )->applyFromArray($styleArrayFirstRow);
        $objWorkSheet->getStyle('A1:' . $highestColumn . '1' )->applyFromArray($styleArrayFirstRow);

        //$sheet->getStyle('A1:11')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('e3eb8a');

		$objWorkSheet->getStyle('2:2')->getFont()->setBold(true);

		
		foreach(range('A','K') as $columnID) {
		    if($columnID =='D' ){
		        $objWorkSheet->getColumnDimension($columnID)->setWidth(20);
		    }else if($columnID =='H'OR $columnID =='E' OR $columnID =='G' OR $columnID =='H' OR $columnID =='C' OR $columnID =='I' ){
		        $objWorkSheet->getColumnDimension($columnID)->setWidth(20);
		    }else if($columnID =='B' OR $columnID =='A'){
		        $objWorkSheet->getColumnDimension($columnID)->setWidth(20);
		    }else if($columnID =='K' ){
		        $objWorkSheet->getColumnDimension($columnID)->setWidth(25);
		    }else{
    			$objWorkSheet->getColumnDimension($columnID)->setWidth(20);
		    }
		} 
           		          
           $siz_of_total1=sizeof($res); 
        //   $cit1=$siz_of_total+1;
        //   $emi1=$cit+1;
       $sheet_index=1;
       $in1=3;
       $num1=1;
       
       $bags_returned_by_clients1=0;
       $icebags_returned_by_clients1=0;
        // echo 'total size is:'.$siz_of_total;
       $rest_of_information1=$siz_of_total1+10;
                $key = 1;
    
    
    $total_deliveires_from_delivery=0;
      if(count($res) > 0){  //Taha
      
                foreach($res as $data =>$val) {
                   if($val['empty_bag_attachment'] !=''){  
                    // $objWorkSheet->getDefaultRowDimension("A$in1")->setRowHeight(55);
                    $objWorkSheet->getRowDimension($in1)->setRowHeight(40);
                    }
                $objWorkSheet->setCellValue("A$in1", $num1 );
                $objWorkSheet->getStyle("A$in1")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        		
                $objWorkSheet->setCellValue("B$in1", $val['order_id']);
        		$objWorkSheet->getStyle("B$in1")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);  
        		
        		$objWorkSheet->setCellValue("C$in1", $val['name_on_delivery']." "); //.$val['number_on_delivery']
        		$objWorkSheet->getStyle("C$in1")->getAlignment()->setWrapText(true);
        		
        		$objWorkSheet->setCellValue("D$in1", $val['delivery_address']);
        		$objWorkSheet->setCellValue("E$in1", $val['bag_received']);
        		$objWorkSheet->getStyle("E$in1")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        		
        		$objWorkSheet->setCellValue("F$in1", $val['ice_bags']);
        		$objWorkSheet->getStyle("F$in1")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        		
        		$objWorkSheet->setCellValue("G$in1", $val['delivery_date']);
        		$objWorkSheet->setCellValue("H$in1", '00-00-0000');
        		
        // 		tayyab
               $objWorkSheet->setCellValue("I$in1", 'Delivery');
        	//Counting bags returend with clients	
        		$bags_returned_by_clients1 = $bags_returned_by_clients1 + $val['bag_received'];
        		
           //Ice packs returned by clients
              	$icebags_returned_by_clients1 = $icebags_returned_by_clients1 + $val['ice_bags'];
              	
        		 if($val['bag_received'] ==0){
        		     $objWorkSheet->setCellValue("I$in1", 'None');
                       		  $objWorkSheet->getStyle("A$in1:I$in1")
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED); 
    
                $objWorkSheet->getStyle("A$in1:I$in1")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $objWorkSheet->getStyle("A$in1:I$in1")
                ->getFill()->getStartColor()->setARGB('FFFFFF00');
        		 }
        		 
        		 
        		 
        		 
        		 if($val['empty_bag_code'] !=''){
        		     $objWorkSheet->setCellValue("J$in1", $val['empty_bag_code'] );
                //  $objWorkSheet->getStyle("J$in1")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        		
        		 }else{
        		     $objWorkSheet->setCellValue("J$in1", "None" );
                //  $objWorkSheet->getStyle("J$in1")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        		
        		 }
        		 
        		 if($val['empty_bag_attachment'] !=''){
        		      //$objWorkSheet->setCellValue("K$in1", $val['empty_bag_code'] );
        		      
        		       $img = './upload_empty_bag/'.$val['empty_bag_attachment'];
            $objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
            $objDrawing->setName('Sample image');
            $objDrawing->setDescription('Sample image');
            $objDrawing->setPath($img);
            $objDrawing->setHeight(50);
            // $objDrawing->setWidth(300);
            // $objDrawing->setWidthAndHeight(80,80);
            // $objDrawing->setResizeProportional(true);
            $objDrawing->setCoordinates("K$in1");
            $objDrawing->setWorksheet($spreadsheet->getActiveSheet());
        		 }else{
        		       $objWorkSheet->setCellValue("K$in1", "None" );
        		 }
        		 
        	
        		 
        		 
        		 
        		 
        		 
        		 $in1 +=1;
        		 $num1 +=1;
                }
                
      }
            
              $total_deliveires_from_delivery=$num1;
            
            if(count($bag_data) > 0){
                
                foreach($bag_data as $data =>$val) {
                    // echo '<pre>';
                    // print_r($bag_data);
                    // echo 'hii'.$val->proof_image;
                    // die();
                    
                     if($val->proof_image !=''){  
                    // $objWorkSheet->getDefaultRowDimension("A$in1")->setRowHeight(55);
                    $objWorkSheet->getRowDimension($in1)->setRowHeight(40);
                    }

                
                $objWorkSheet->setCellValue("A$in1", $num1 );
                $objWorkSheet->getStyle("A$in1")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);  
        	
        	
        	     


                
        		$objWorkSheet->setCellValue("B$in1", $val->bag_id);
        			$objWorkSheet->getStyle("B$in1")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);  
        	
        		$objWorkSheet->setCellValue("C$in1", $val->customer." ".$val->c_phone);
        		$objWorkSheet->getStyle("C$in1")->getAlignment()->setWrapText(true);
        		
        		$objWorkSheet->setCellValue("D$in1", $val->bag_address);
        		$objWorkSheet->setCellValue("E$in1", $val->received_bag_qty);
        		$objWorkSheet->getStyle("E$in1")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);  
        	
        		$objWorkSheet->setCellValue("F$in1", '0');
        		$objWorkSheet->getStyle("F$in1")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);  
        	
        		$objWorkSheet->setCellValue("G$in1", '00-00-0000');
                $objWorkSheet->setCellValue("H$in1", $val->collected_date);
                
                // tayyab
                $objWorkSheet->setCellValue("I$in1", 'Bag Collection');
        	//Counting bags returend with clients	
        		$bags_returned_by_clients1 = $bags_returned_by_clients1 + $val->received_bag_qty;
        		
             	
        		 if($val->received_bag_qty ==0){
                       		  $objWorkSheet->getStyle("A$in1:I$in1")
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED); 
    
                $objWorkSheet->getStyle("A$in1:I$in1")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $objWorkSheet->getStyle("A$in1:I$in1")
                ->getFill()->getStartColor()->setARGB('FFFFFF00');
        	
        		 }else{
        		     
    
                $objWorkSheet->getStyle("A$in1:I$in1")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                
                $objWorkSheet->getStyle("A$in1:I$in1")
                ->getFill()->getStartColor()->setARGB('ffff7f00');
        		 
        		     
        		 }
        		 
        		  if($val->empty_bag_code !=''){
        		     $objWorkSheet->setCellValue("J$in1", $val->empty_bag_code );
                //  $objWorkSheet->getStyle("J$in1")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        		
        		 }else{
        		     $objWorkSheet->setCellValue("J$in1", "None" );
                //  $objWorkSheet->getStyle("J$in1")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        		
        		 }
        		 
        		 if($val->proof_image !=''){
        		      //$objWorkSheet->setCellValue("K$in1", $val['empty_bag_code'] );
        		  //  $img = './'.$val->proof_image;   
        		  //  echo $img ;
        		  //   $img2 = './upload_empty_bag/'.$val->proof_image;
        		  //   echo '<br>'.$img2.'<br>';
        		     
        		     $img_lnk= strstr( $val->proof_image, '/upload' );
        		      $img = './'.$img_lnk;
        		      // $img = $val->proof_image;
            $objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
            $objDrawing->setName('Sample image');
            $objDrawing->setDescription('Sample image');
            $objDrawing->setPath($img);
            $objDrawing->setHeight(50);
            // $objDrawing->setWidth(300);
            // $objDrawing->setWidthAndHeight(80,80);
            // $objDrawing->setResizeProportional(true);
            $objDrawing->setCoordinates("K$in1");
            $objDrawing->setWorksheet($spreadsheet->getActiveSheet());
        		 }else{
        		       $objWorkSheet->setCellValue("K$in1", "None" );
        		 }

        		 
        		 
        		 
        		 
        		 $in1 +=1;
        		 $num1 +=1;
                }
                
                 $rest_of_information1=$num1+10;
            }
          
            
            
            if(count($bag_data) ==0 AND count($res)==0){
                $objWorkSheet->mergeCells('A3:I3');
          $objWorkSheet->setCellValue('A3','No Detail found!');
          $objWorkSheet->getStyle("A3")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("A3")->getFont()->setSize(16);
          $objWorkSheet->getStyle('A3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
          
            }
            
   
          // Rename sheet
          $objWorkSheet->setTitle("Bags_detail");
          
          
        //   sami bhae
        //   $objWorkSheet->getProtection()->setSheet(true);
        //   $objWorkSheet->getProtection()->setSort(true);
        //   $objWorkSheet->getProtection()->setInsertRows(true);
        //   $objWorkSheet->getProtection()->setFormatCells(true);
        
        //   $objWorkSheet->getProtection()->setPassword('password');
          
        //   end sami bhae
          
          $spreadsheet->addNamedRange(
                new \PhpOffice\PhpSpreadsheet\NamedRange('Bags_detail', $spreadsheet->getSheetByName('Bags_detail'), 'A1:I1') 
            );
          
		// End AYESHA NEW Work
		
      
       if(count($res) > 0){  //Taha
       $objWorkSheet->getStyle("A$rest_of_information1:C$rest_of_information1")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("A$rest_of_information1:C$rest_of_information1")->getFont()->setSize(12);
          
          
               		 
   
           $objWorkSheet->getStyle("A$rest_of_information1:C$rest_of_information1")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                
                $objWorkSheet->getStyle("A$rest_of_information1:C$rest_of_information1")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                	 
                 $objWorkSheet->getStyle("A$rest_of_information1:C$rest_of_information1")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
    
              	$objWorkSheet->setCellValue("A$rest_of_information1", 'Total Deliveries');
        		$objWorkSheet->setCellValue("B$rest_of_information1", 'Total Bags returned by Clients');
        		$objWorkSheet->setCellValue("C$rest_of_information1", 'Total IcePacks returned by Clients');
        		
        		
     
                $rest_of_information_n1=$rest_of_information1+1;
                
                $counter1=$rest_of_information_n1+3;
                
                
                  $total_delivries_counter=$num1-1;
                  
                  $total_deliveires_from_delivery=$total_deliveires_from_delivery-1;
                
                 $objWorkSheet->mergeCells("A$rest_of_information_n1:A$counter1");
                 $objWorkSheet->setCellValue("A$rest_of_information_n1",$total_deliveires_from_delivery );
                 $objWorkSheet->getStyle("A$rest_of_information_n1")->getFont()->setSize(14);
                 $objWorkSheet->getStyle("A$rest_of_information_n1")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("A$rest_of_information_n1")->getFont()->getColor()->setARGB('3838414a');
        
         
                 $objWorkSheet->mergeCells("B$rest_of_information_n1:B$counter1");
        		 $objWorkSheet->setCellValue("B$rest_of_information_n1", $bags_returned_by_clients1);
        		 $objWorkSheet->getStyle("B$rest_of_information_n1")->getFont()->setSize(14);
                 $objWorkSheet->getStyle("B$rest_of_information_n1")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("B$rest_of_information_n1")->getFont()->getColor()->setARGB('3838414a');
                   
                    
                    
                 $objWorkSheet->mergeCells("C$rest_of_information_n1:C$counter1");
        		 $objWorkSheet->setCellValue("C$rest_of_information_n1", $icebags_returned_by_clients1);
        		 $objWorkSheet->getStyle("C$rest_of_information_n1")->getFont()->setSize(14);
        		 $objWorkSheet->getStyle("C$rest_of_information_n1")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("C$rest_of_information_n1")->getFont()->getColor()->setARGB('3838414a');
        
        		
        		$objWorkSheet->getStyle("A$rest_of_information1:C$counter1")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1:C$counter1")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1:C$counter1")->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1:C$counter1")->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
      
      
        //       echo '$siz_of_total1+10:'.$siz_of_total1.'<br>';
        // 		echo '$rest_of_information1:'.$rest_of_information1.'<br>';
        		
        //         echo '$counter1:'.$counter1.'<br>';
                
        //         echo '$rest_of_information_n1:'.$rest_of_information_n1.'<br>';
                
        //         echo '--------------------------------';
                // die();
      
     if(count($sorted_data) > 0){ 
    //   For EXTRA BAGS DETAILS
    // echo 'before:'.$rest_of_information1.'<br>';
        //         die();
                 $rest_of_information1x=$counter1+4;
    // echo 'after:'.$rest_of_information1x.'<br>';
    
    // echo 'old counter:'.$counter1.'<br>';
    
            $objWorkSheet->getStyle("A$rest_of_information1x:C$rest_of_information1x")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("A$rest_of_information1x:C$rest_of_information1x")->getFont()->setSize(12);
                
                 
          
               		 
   
           $objWorkSheet->getStyle("A$rest_of_information1x:C$rest_of_information1x")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                
                $objWorkSheet->getStyle("A$rest_of_information1x:C$rest_of_information1x")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                	 
                 $objWorkSheet->getStyle("A$rest_of_information1x:C$rest_of_information1x")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
    
              	$objWorkSheet->setCellValue("A$rest_of_information1x", 'Verified Bags(Bags have delivery track and QR)');
        		$objWorkSheet->setCellValue("B$rest_of_information1x", 'Extra Bags(Bags do not have delivery track/QR/complete verifications)');
        		$objWorkSheet->setCellValue("C$rest_of_information1x", 'Total Bags Received');
        		
        		
     
                $rest_of_information_n1x=$rest_of_information1x+1;
                
                // echo 'inner data cell is:'.$rest_of_information_n1x.'<br>';
                // die();
                $counter1x=$rest_of_information_n1x+3;
            //   echo 'And new counter is:'.$counter1x.'<br>';
                    //  die();
                     // CALCULATION 
                    //  echo '$bags_returned_by_clients: '.$bags_returned_by_clients.'<br>';
                    //  echo 'tot: '.$bags_returned_by_clients1.'<br>';
                    //  die();
                     $verified_bags = $bags_returned_by_clients;
                     
                     $total_bag_recv = $bags_returned_by_clients1;
                     
                     $not_verified_bag = $total_bag_recv - $verified_bags;
       
                
                 $objWorkSheet->mergeCells("A$rest_of_information_n1x:A$counter1x");
                 $objWorkSheet->setCellValue("A$rest_of_information_n1x", $verified_bags );
                 $objWorkSheet->getStyle("A$rest_of_information_n1x")->getFont()->setSize(14);
                 $objWorkSheet->getStyle("A$rest_of_information_n1x")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("A$rest_of_information_n1x")->getFont()->getColor()->setARGB('3838414a');
        
                     
                     
                     
                     
                     
                    
                     
                 $objWorkSheet->mergeCells("B$rest_of_information_n1x:B$counter1x");
        		 $objWorkSheet->setCellValue("B$rest_of_information_n1x",$not_verified_bag);
        		 $objWorkSheet->getStyle("B$rest_of_information_n1x")->getFont()->setSize(14);
                 $objWorkSheet->getStyle("B$rest_of_information_n1x")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("B$rest_of_information_n1x")->getFont()->getColor()->setARGB('3838414a');
         
                 
                   
                 $objWorkSheet->mergeCells("C$rest_of_information_n1x:C$counter1x");
        		 $objWorkSheet->setCellValue("C$rest_of_information_n1x",$total_bag_recv);
        		 $objWorkSheet->getStyle("C$rest_of_information_n1x")->getFont()->setSize(14);
        		 $objWorkSheet->getStyle("C$rest_of_information_n1x")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("C$rest_of_information_n1x")->getFont()->getColor()->setARGB('3838414a');
        
        	
        		$objWorkSheet->getStyle("A$rest_of_information1x:C$counter1x")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1x:C$counter1x")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1x:C$counter1x")->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1x:C$counter1x")->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                   
    	   //     echo '$rest_of_information1:'.$rest_of_information1.'<br>';
        // 		echo '$rest_of_information1x:'.$rest_of_information1x.'<br>';
        		
        //         echo '$counter1x:'.$counter1x.'<br>';
                
        //         echo '$rest_of_information_n1x:'.$rest_of_information_n1x.'<br>';
                
        //         echo 'verified_bags:'.$verified_bags.'<br>';
        //         echo '$not_verified_bag:'.$not_verified_bag.'<br>';
        //         echo '$total_bag_recv:'.$total_bag_recv.'<br>';
        //         die();
    
    // END EXTRA BAG DETAIL
    
     }
    //   echo 'hi';
    //       die();
    
       }
    
      	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      	if(count($sorted_data) > 0){
		header('Content-Disposition: attachment; filename="'.$sorted_data[0]->vendor.'_'.date('Y-m-d_(H:i:s)').'.xlsx"');
      	}else{
      	    header('Content-Disposition: attachment; filename="'.$res[0]['vendor'].'_'.date('Y-m-d_(H:i:s)').'.xlsx"');
      	
      	}
		$writer->save("php://output");
		
		redirect('vendor_deliveries_complete_report');
// 		echo json_encode($response);
	// END OF MAIN IF	
   }else{
       
       $this->session->set_flashdata('error', 'No Record Found, Try Again!');
              redirect('vendor_deliveries_complete_report');
       
       } 
   
}
// ENd
	
// SEND PARTNER REPORT EMAIL

 function partner_report_email_previous_30_nov2020(){
     
     $this->load->model('bag_model');
               
         $response = array('success' => false);
         
       
        $start_date = @$_POST['from'];
        $end_date = @$_POST['to'];
        $vendor_id = @$_POST['vendor_list'];
        $status=0;
        
        // echo '$start_date='.$start_date.'<br>';
        // echo '$end_date='.$end_date.'<br>';
        // echo '$vendor_id='.$vendor_id.'<br>';

        if(!$start_date){
            $start_date = date('Y-m-d h:i:s', strtotime($start_date));
        }

        if(!$end_date){
            $end_date = date('Y-m-d h:i:s');
        }
        
        
        
        
        if(($vendor_id) AND ($start_date) AND ($end_date)){
                  if($this->session->userdata('role') == 'admin'){
                  
                  if($vendor_id){
                         $where = "o.is_neutral=1 and o.str_keep_varification ='yes' and o.driver_id > 0 and  v.status='".$status."' and (o.status='Collected') and o.cooling_bag_check !=3 and o.vendor_id='".$vendor_id."' and o.varified_at BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
                  }
                }else{
                    $where = "o.is_neutral=1 and o.str_keep_varification ='yes' and o.driver_id > 0 and v.status='".$status."' and (o.status='Collected') and o.cooling_bag_check !=3  and o.vendor_id='".$vendor_id."' and o.varified_at BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
                 }
                
                 $report_data = $data['result'] =  $this->order_model->get_tracking_statistics_details($vendor_id,$start_date,$end_date,$where);
        }
                
                
                
       
        $sorted_data=$report_data['records'];
        if($report_data['result']){
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }
        
        
        $where2 = "o.vendor_id = $vendor_id and o.driver_id > 0 and (o.status = 'Delivered' or o.status='Collected') AND o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' AND '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $res=$this->order_model->get_orders_where($where2);
        
         $where3= " b.vendor_id= $vendor_id and b.driver_id != 0 and b.status ='Picked' and b.collected_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' AND '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
         
         
         $b_data=$this->bag_model->get_where($where3);
         $bag_data=$b_data['records'];
        // echo 'hi';
        // die();
        $response['res2'] = $res;
        $response['bag_data'] = $bag_data;
        
        // echo '<pre>';
        // print_r($response);
        // echo '<br>';
        // die();
        
        // echo '<pre>';
        // echo 'THIS IS IT:<br>';
        // foreach($res as $data =>$val) {
        //     echo 'hi';
        //     // print_r($val);
        //     echo $val['order_id'];
        //     // die();
        //     // echo 'data is :'.$data.'<br>';
        //     // echo 'Val is :'.$val.'<br>';
        //     // echo $data->order_id.'<br>';
        // }
        
        
        
        
        
        // START XLS HERE 
 
//   echo '$bag_data :'.$bag_data[0]->vendor;
//   die();
  if(count($sorted_data) > 0 OR count($res) > 0 OR count($bag_data) >0){
     
      $last=0;
         $yrdata= strtotime($start_date);
    
         $set_strt_dt=date('d M Y', $yrdata);
         
         $yrdata= strtotime($end_date);
          $set_end_dt=date('d M Y', $yrdata);
         
        //  echo '$set_strt_dt:'.$set_strt_dt.'-';
        //  echo '$set_end_dt:'.$set_end_dt;
         
         if(count($sorted_data) > 0){ //Taha
             $title_strng=$sorted_data[0]->vendor.' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Verified bags with delivery detail';
            $title_strng1=$sorted_data[0]->vendor.' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Bags Detail';
         }else if(count($res) >0){
            
             $title_strng=$res[0]['vendor'].' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Verified bags with delivery detail';
            $title_strng1=$res[0]['vendor'].' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Bags Detail';
         
         }else{
             $title_strng=$bag_data[0]->vendor.' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Verified bags with delivery detail';
            $title_strng1=$bag_data[0]->vendor.' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Bags Detail';
         }
        
       
        //  echo '<br> $title_strng:<br>'.$title_strng1;
        //  die();
        
        if(count($sorted_data) > 0){ //Taha
         $main_title=$sorted_data[0]->vendor;
        }else if(count($res) >0){
            $main_title=$res[0]['vendor'];
        }else{
            $main_title=$bag_data[0]->vendor;
        }
         	$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		
		$spreadsheet->getProperties()
    ->setCreator("LOGX TEAM")
    ->setLastModifiedBy("LOGX TEAM")
    ->setTitle('Verified_bags_delivery_detail')
    ->setSubject($title_strng)
    ->setDescription(
      $title_strng
    )
    ->setKeywords("Logx Team")
    ->setCategory("LOGX Partner Report");
		
		
	
		
		
		$sheet->setTitle('Verified_bags_delivery_detail');
		
    // 	$sheet->getDefaultStyle()->getFont()->setName('Times New Roman');
        
       
        
       
         $sheet->mergeCells('A1:D1');
          $sheet->setCellValue('A1',$title_strng);
          $sheet->getStyle("A1")->getFont()->setName('Times New Roman');
          $sheet->getStyle("A1")->getFont()->setSize(14);
         $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
         $spreadsheet->getActiveSheet()->getStyle("A1")->getFont()->getColor()->setARGB('3838414a');
         
         $sheet->mergeCells('E1:I1');
          $sheet->setCellValue('E1','LOGX');
          $sheet->getStyle("E1")->getFont()->setName('Times New Roman');
          $sheet->getStyle("E1")->getFont()->setSize(14);
         $sheet->getStyle('E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
      $spreadsheet->getActiveSheet()->getStyle("E1")->getFont()->getColor()->setARGB('3838414a');
       
      $sheet->getStyle("A2:I2")->getFont()->setName('Times New Roman');
          $sheet->getStyle("A2:I2")->getFont()->setSize(12);
          
          
               		 
    
          $spreadsheet->getActiveSheet()->getStyle("A2:I2")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $spreadsheet->getActiveSheet()->getStyle("A2:I2")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                 $spreadsheet->getActiveSheet()->getStyle("A2:I2")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
       
       
       
        $spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman');
          $spreadsheet->getDefaultStyle()->getFont()->setSize(10);
       
        // 	$sheet->setCellValue('I1', 'LOGX');
        // 	$sheet->getStyle("I1")->getFont()->setSize(10);
          	
		$sheet->setCellValue('A2', 'Sr');
		$sheet->setCellValue('B2', 'Order ID');
		$sheet->setCellValue('C2', 'Customer');
		$sheet->setCellValue('D2', 'Delivery Address');
		$sheet->setCellValue('E2', 'Bag Received');
		$sheet->setCellValue('F2', 'Ice Packs');
		$sheet->setCellValue('G2', 'Delivered Date');
		$sheet->setCellValue('H2', 'Storekeeper Varification');
		$sheet->setCellValue('I2', 'Vendor Varification');

		$styleArrayFirstRow = [
            'font' => [
                'bold' => true,
            ],
            ['fill_solid' => 'e3eb8a']
        ];
        $highestColumn = $sheet->getHighestColumn();
        $sheet->getStyle('A2:' . $highestColumn . '2' )->applyFromArray($styleArrayFirstRow);
        $sheet->getStyle('A1:' . $highestColumn . '1' )->applyFromArray($styleArrayFirstRow);

        //$sheet->getStyle('A1:11')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('e3eb8a');

		$sheet->getStyle('2:2')->getFont()->setBold(true);
		
		
		foreach(range('A','I') as $columnID) {
		    if($columnID =='D' ){
		        $sheet->getColumnDimension($columnID)->setWidth(60);
		    }else if($columnID =='A'OR $columnID =='H'OR $columnID =='E' OR $columnID =='I' OR $columnID =='C' OR $columnID =='B'){
		        $sheet->getColumnDimension($columnID)->setWidth(40);
		    }else{
    			$sheet->getColumnDimension($columnID)->setWidth(20);
		    }
		} 
           
          $siz_of_total=sizeof($sorted_data); 
          $cit=$siz_of_total+1;
          $emi=$cit+1;
      $sheet_index=1;
      $in=3;
      $num=1;
       
      $bags_returned_by_clients=0;
      $icebags_returned_by_clients=0;
        // echo 'total size is:'.$siz_of_total;
      $rest_of_information=$siz_of_total+10;
    //   echo 'other is:'.$rest_of_information;
    //   die();
    
    
    
    
    
   
     if(count($sorted_data) > 0){  //Taha
      foreach($sorted_data as $data =>$val){
 

                
                		$writer = new Xlsx($spreadsheet);

                        
                        		//notification validation
                        // 		$validation2 = $sheet->getCell('H2')->getDataValidation();
                        // 		$validation2->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST );
                        // 		$validation2->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION );
                        // 		$validation2->setAllowBlank(false);
                        // 		$validation2->setShowInputMessage(true);
                        // 		$validation2->setShowErrorMessage(true);
                        // 		$validation2->setShowDropDown(true);
                        // 		$validation2->setErrorTitle('Input error');
                        // 		$validation2->setError('Value is not in list.');
                        // 		$validation2->setPromptTitle('Pick from list');
                        // 		$validation2->setPrompt('Please pick a value from the drop-down list.');
                        // 		$validation2->setFormula1('"'.$alerts.'"');

                //END VALIDATIONS //
               
               
                $sheet->setCellValue("A$in", $num );
        		$sheet->setCellValue("B$in", $val->order_id);
        		$sheet->setCellValue("C$in", $val->name_on_delivery." ".$val->number_on_delivery);
        		$sheet->getStyle("C$in")->getAlignment()->setWrapText(true);
        		
        		$sheet->setCellValue("D$in", $val->delivery_address);
        		$sheet->setCellValue("E$in", $val->own_bag_rcv_by_driver);
        		$sheet->setCellValue("F$in", $val->ice_bags);
        		$sheet->setCellValue("G$in", $val->delivery_date);
        		$sheet->setCellValue("H$in", $val->str_keepr_name." ".$val->str_keeper_Phone);
        // 		$sheet->getStyle("H$in")->getAlignment()->setWrapText(true);
        		
        		$sheet->setCellValue("I$in", $val->neutral_name." ".$val->neutral_Phone);
        // 		$sheet->getStyle("I$in")->getAlignment()->setWrapText(true);
        		
        	
        	//Counting bags returend with clients	
        		$bags_returned_by_clients = $bags_returned_by_clients + $val->own_bag_rcv_by_driver;
        		
          //Ice packs returned by clients
              	$icebags_returned_by_clients = $icebags_returned_by_clients + $val->ice_bags;
              	
        		 if($val->own_bag_rcv_by_driver ==0){
                      		  $spreadsheet->getActiveSheet()->getStyle("A$in:I$in")
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED); 
    
                $spreadsheet->getActiveSheet()->getStyle("A$in:I$in")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $spreadsheet->getActiveSheet()->getStyle("A$in:I$in")
                ->getFill()->getStartColor()->setARGB('FFFFFF00');
        		 }
        		 $in +=1;
        		 $num +=1;
        }
     
        
        
        
      $sheet->getStyle("A$rest_of_information:C$rest_of_information")->getFont()->setName('Times New Roman');
          $sheet->getStyle("A$rest_of_information:C$rest_of_information")->getFont()->setSize(12);
          
          
               		 
    
          $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$rest_of_information")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$rest_of_information")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                 $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$rest_of_information")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
    
              	$sheet->setCellValue("A$rest_of_information", 'Total Verified Deliveries');
        		$sheet->setCellValue("B$rest_of_information", 'Total Bags returned by Clients');
        		$sheet->setCellValue("C$rest_of_information", 'Total IcePacks returned by Clients');
        		
        		
        		
     
                $rest_of_information_n=$rest_of_information+1;
                
                $counter=$rest_of_information_n+3;
                
                 $sheet->mergeCells("A$rest_of_information_n:A$counter");
                 $sheet->setCellValue("A$rest_of_information_n", $siz_of_total );
                 $sheet->getStyle("A$rest_of_information_n")->getFont()->setSize(14);
                 $sheet->getStyle("A$rest_of_information_n")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information_n")->getFont()->getColor()->setARGB('3838414a');
         
         
                 $sheet->mergeCells("B$rest_of_information_n:B$counter");
        		 $sheet->setCellValue("B$rest_of_information_n", $bags_returned_by_clients);
        		 $sheet->getStyle("B$rest_of_information_n")->getFont()->setSize(14);
                 $sheet->getStyle("B$rest_of_information_n")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $spreadsheet->getActiveSheet()->getStyle("B$rest_of_information_n")->getFont()->getColor()->setARGB('3838414a');
         
                 $sheet->mergeCells("C$rest_of_information_n:C$counter");
        		 $sheet->setCellValue("C$rest_of_information_n", $icebags_returned_by_clients);
        		 $sheet->getStyle("C$rest_of_information_n")->getFont()->setSize(14);
        		 $sheet->getStyle("C$rest_of_information_n")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $spreadsheet->getActiveSheet()->getStyle("C$rest_of_information_n")->getFont()->getColor()->setARGB('3838414a');
        
        		
        		$spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$counter")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$counter")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$counter")->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$counter")->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
      
      //Taha
      
      
      
                          $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
                          $spreadsheet->getActiveSheet()->getProtection()->setSort(true);
                          $spreadsheet->getActiveSheet()->getProtection()->setInsertRows(true);
                          $spreadsheet->getActiveSheet()->getProtection()->setFormatCells(true);
                        
                          $spreadsheet->getActiveSheet()->getProtection()->setPassword('SAMI_LOGX_password');
               
                // echo '$siz_of_total:'.$siz_of_total.'<br>';
                // echo '$bags_returned_by_clients:'.$bags_returned_by_clients.'<br>';
                // echo '$icebags_returned_by_clients:'.$icebags_returned_by_clients.'<br>';
                // die();
       
     }else{$writer = new Xlsx($spreadsheet);
         
         
          $sheet->mergeCells('A3:H3');
          $sheet->setCellValue('A3','No Verified bags found!');
          $sheet->getStyle("A3")->getFont()->setName('Times New Roman');
          $sheet->getStyle("A3")->getFont()->setSize(16);
          $sheet->getStyle('A3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
              
       		
        		
        		  $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
                          $spreadsheet->getActiveSheet()->getProtection()->setSort(true);
                          $spreadsheet->getActiveSheet()->getProtection()->setInsertRows(true);
                          $spreadsheet->getActiveSheet()->getProtection()->setFormatCells(true);
                        
                          $spreadsheet->getActiveSheet()->getProtection()->setPassword('SAMI_LOGX_password');
         
     }
        		//AYESHA NEW Work
		
          // Add new sheet
          $objWorkSheet = $spreadsheet->createSheet(1); //Setting index when creating
          //Write cells
          $cell = "";
          
       
            
          
         
                $objWorkSheet->mergeCells('A1:D1');
          $objWorkSheet->setCellValue('A1',$title_strng1);
          $objWorkSheet->getStyle("A1")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("A1")->getFont()->setSize(14);
         $objWorkSheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
         $objWorkSheet->getStyle("A1")->getFont()->getColor()->setARGB('3838414a');
          
      
         
         $objWorkSheet->mergeCells('E1:I1');
          $objWorkSheet->setCellValue('E1','LOGX');
          $objWorkSheet->getStyle("E1")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("E1")->getFont()->setSize(14);
         $objWorkSheet->getStyle('E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
      $objWorkSheet->getStyle("E1")->getFont()->getColor()->setARGB('3838414a');
       
      $objWorkSheet->getStyle("A2:I2")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("A2:I2")->getFont()->setSize(12);
          
          
               		 
    
          $objWorkSheet->getStyle("A2:I2")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $objWorkSheet->getStyle("A2:I2")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                 $objWorkSheet->getStyle("A2:I2")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
       
       	
       
      $spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman');
          $spreadsheet->getDefaultStyle()->getFont()->setSize(10);
          
         
          
        //   error
        // $objWorkSheet->getDefaultStyle()->getFont()->setName('Times New Roman');
        //   $objWorkSheet->getDefaultStyle()->getFont()->setSize(10);
         //   error
         
         
        // 	$sheet->setCellValue('I1', 'LOGX');
        // 	$sheet->getStyle("I1")->getFont()->setSize(10);
          
		$objWorkSheet->setCellValue('A2', 'Sr');
		$objWorkSheet->setCellValue('B2', 'Order ID');
		$objWorkSheet->setCellValue('C2', 'Customer');
		$objWorkSheet->setCellValue('D2', 'Delivery Address');
		$objWorkSheet->setCellValue('E2', 'Bag Received');
		$objWorkSheet->setCellValue('F2', 'Ice Packs');
		$objWorkSheet->setCellValue('G2', 'Delivered Date');
		$objWorkSheet->setCellValue('H2', 'Collected Date');
// 		tayyab
$objWorkSheet->setCellValue('I2', 'Collected From');
		 
          
		$styleArrayFirstRow = [
            'font' => [
                'bold' => true,
            ],
            ['fill_solid' => 'e3eb8a']
        ];
        $highestColumn = $objWorkSheet->getHighestColumn();
        $objWorkSheet->getStyle('A2:' . $highestColumn . '2' )->applyFromArray($styleArrayFirstRow);
        $objWorkSheet->getStyle('A1:' . $highestColumn . '1' )->applyFromArray($styleArrayFirstRow);

        //$sheet->getStyle('A1:11')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('e3eb8a');

		$objWorkSheet->getStyle('2:2')->getFont()->setBold(true);

		
		foreach(range('A','I') as $columnID) {
		    if($columnID =='D' ){
		        $objWorkSheet->getColumnDimension($columnID)->setWidth(60);
		    }else if($columnID =='H'OR $columnID =='E' OR $columnID =='G' OR $columnID =='H' OR $columnID =='C' OR $columnID =='I' ){
		        $objWorkSheet->getColumnDimension($columnID)->setWidth(40);
		    }else if($columnID =='B' OR $columnID =='A'){
		        $objWorkSheet->getColumnDimension($columnID)->setWidth(70);
		    }else{
    			$objWorkSheet->getColumnDimension($columnID)->setWidth(20);
		    }
		} 
           		          
          $siz_of_total1=sizeof($res); 
        //   $cit1=$siz_of_total+1;
        //   $emi1=$cit+1;
      $sheet_index=1;
      $in1=3;
      $num1=1;
       
      $bags_returned_by_clients1=0;
      $icebags_returned_by_clients1=0;
        // echo 'total size is:'.$siz_of_total;
      $rest_of_information1=$siz_of_total1+10;
                $key = 1;
    
    
    $total_deliveires_from_delivery=0;
      if(count($res) > 0){  //Taha
      
                foreach($res as $data =>$val) {
                
                $objWorkSheet->setCellValue("A$in1", $num1 );
        		$objWorkSheet->setCellValue("B$in1", $val['order_id']);
        		$objWorkSheet->setCellValue("C$in1", $val['name_on_delivery']." ".$val['number_on_delivery']);
        		$objWorkSheet->getStyle("C$in1")->getAlignment()->setWrapText(true);
        		
        		$objWorkSheet->setCellValue("D$in1", $val['delivery_address']);
        		$objWorkSheet->setCellValue("E$in1", $val['bag_received']);
        		$objWorkSheet->setCellValue("F$in1", $val['ice_bags']);
        		$objWorkSheet->setCellValue("G$in1", $val['delivery_date']);
        		$objWorkSheet->setCellValue("H$in1", '00-00-0000');
        		
        // 		tayyab
              $objWorkSheet->setCellValue("I$in1", 'Delivery');
        	//Counting bags returend with clients	
        		$bags_returned_by_clients1 = $bags_returned_by_clients1 + $val['bag_received'];
        		
          //Ice packs returned by clients
              	$icebags_returned_by_clients1 = $icebags_returned_by_clients1 + $val['ice_bags'];
              	
        		 if($val['bag_received'] ==0){
        		     $objWorkSheet->setCellValue("I$in1", 'None');
                      		  $objWorkSheet->getStyle("A$in1:I$in1")
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED); 
    
                $objWorkSheet->getStyle("A$in1:I$in1")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $objWorkSheet->getStyle("A$in1:I$in1")
                ->getFill()->getStartColor()->setARGB('FFFFFF00');
        		 }
        		 $in1 +=1;
        		 $num1 +=1;
                }
                
      }
            
              $total_deliveires_from_delivery=$num1;
            
            if(count($bag_data) > 0){
                
                foreach($bag_data as $data =>$val) {
                
                $objWorkSheet->setCellValue("A$in1", $num1 );
        		$objWorkSheet->setCellValue("B$in1", $val->bag_id);
        		$objWorkSheet->setCellValue("C$in1", $val->customer." ".$val->c_phone);
        		$objWorkSheet->getStyle("C$in1")->getAlignment()->setWrapText(true);
        		
        		$objWorkSheet->setCellValue("D$in1", $val->bag_address);
        		$objWorkSheet->setCellValue("E$in1", $val->received_bag_qty);
        		$objWorkSheet->setCellValue("F$in1", '0');
        		$objWorkSheet->setCellValue("G$in1", '00-00-0000');
                $objWorkSheet->setCellValue("H$in1", $val->collected_date);
                
                // tayyab
                $objWorkSheet->setCellValue("I$in1", 'Bag Collection');
        	//Counting bags returend with clients	
        		$bags_returned_by_clients1 = $bags_returned_by_clients1 + $val->received_bag_qty;
        		
             	
        		 if($val->received_bag_qty ==0){
                      		  $objWorkSheet->getStyle("A$in1:I$in1")
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED); 
    
                $objWorkSheet->getStyle("A$in1:I$in1")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $objWorkSheet->getStyle("A$in1:I$in1")
                ->getFill()->getStartColor()->setARGB('FFFFFF00');
        	
        		 }else{
        		     
    
                $objWorkSheet->getStyle("A$in1:I$in1")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                
                $objWorkSheet->getStyle("A$in1:I$in1")
                ->getFill()->getStartColor()->setARGB('ffff7f00');
        		 
        		     
        		 }
        		 
        		 
        		 
        		 
        		 
        		 
        		 $in1 +=1;
        		 $num1 +=1;
                }
                
                
                $rest_of_information1=$num1+10;
            }
          
            
            
            if(count($bag_data) ==0 AND count($res)==0){
                $objWorkSheet->mergeCells('A3:I3');
          $objWorkSheet->setCellValue('A3','No Detail found!');
          $objWorkSheet->getStyle("A3")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("A3")->getFont()->setSize(16);
          $objWorkSheet->getStyle('A3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
          
            }
            
   
          // Rename sheet
          $objWorkSheet->setTitle("Bags_detail");
          
          $objWorkSheet->getProtection()->setSheet(true);
          $objWorkSheet->getProtection()->setSort(true);
          $objWorkSheet->getProtection()->setInsertRows(true);
          $objWorkSheet->getProtection()->setFormatCells(true);
        
          $objWorkSheet->getProtection()->setPassword('password');
          
          $spreadsheet->addNamedRange(
                new \PhpOffice\PhpSpreadsheet\NamedRange('Bags_detail', $spreadsheet->getSheetByName('Bags_detail'), 'A1:I1') 
            );
          
		// End AYESHA NEW Work
		
      
      if(count($res) > 0){  //Taha
      $objWorkSheet->getStyle("A$rest_of_information1:C$rest_of_information1")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("A$rest_of_information1:C$rest_of_information1")->getFont()->setSize(12);
          
          
               		 
   
          $objWorkSheet->getStyle("A$rest_of_information1:C$rest_of_information1")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                
                $objWorkSheet->getStyle("A$rest_of_information1:C$rest_of_information1")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                	 
                 $objWorkSheet->getStyle("A$rest_of_information1:C$rest_of_information1")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
    
              	$objWorkSheet->setCellValue("A$rest_of_information1", 'Total Deliveries');
        		$objWorkSheet->setCellValue("B$rest_of_information1", 'Total Bags returned by Clients');
        		$objWorkSheet->setCellValue("C$rest_of_information1", 'Total IcePacks returned by Clients');
        		
        		
     
                $rest_of_information_n1=$rest_of_information1+1;
                
                $counter1=$rest_of_information_n1+3;
                
                
                  $total_delivries_counter=$num1-1;
                  
                  $total_deliveires_from_delivery=$total_deliveires_from_delivery-1;
                
                 $objWorkSheet->mergeCells("A$rest_of_information_n1:A$counter1");
                 $objWorkSheet->setCellValue("A$rest_of_information_n1",$total_deliveires_from_delivery );
                 $objWorkSheet->getStyle("A$rest_of_information_n1")->getFont()->setSize(14);
                 $objWorkSheet->getStyle("A$rest_of_information_n1")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("A$rest_of_information_n1")->getFont()->getColor()->setARGB('3838414a');
        
         
                 $objWorkSheet->mergeCells("B$rest_of_information_n1:B$counter1");
        		 $objWorkSheet->setCellValue("B$rest_of_information_n1", $bags_returned_by_clients1);
        		 $objWorkSheet->getStyle("B$rest_of_information_n1")->getFont()->setSize(14);
                 $objWorkSheet->getStyle("B$rest_of_information_n1")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("B$rest_of_information_n1")->getFont()->getColor()->setARGB('3838414a');
                   
                    
                    
                 $objWorkSheet->mergeCells("C$rest_of_information_n1:C$counter1");
        		 $objWorkSheet->setCellValue("C$rest_of_information_n1", $icebags_returned_by_clients1);
        		 $objWorkSheet->getStyle("C$rest_of_information_n1")->getFont()->setSize(14);
        		 $objWorkSheet->getStyle("C$rest_of_information_n1")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("C$rest_of_information_n1")->getFont()->getColor()->setARGB('3838414a');
        
        		
        		$objWorkSheet->getStyle("A$rest_of_information1:C$counter1")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1:C$counter1")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1:C$counter1")->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1:C$counter1")->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
      
      
        //       echo '$siz_of_total1+10:'.$siz_of_total1.'<br>';
        // 		echo '$rest_of_information1:'.$rest_of_information1.'<br>';
        		
        //         echo '$counter1:'.$counter1.'<br>';
                
        //         echo '$rest_of_information_n1:'.$rest_of_information_n1.'<br>';
                
        //         echo '--------------------------------';
                // die();
      
     if(count($sorted_data) > 0){ 
    //   For EXTRA BAGS DETAILS
    // echo 'before:'.$rest_of_information1.'<br>';
        //         die();
                 $rest_of_information1x=$counter1+4;
    // echo 'after:'.$rest_of_information1x.'<br>';
    
    // echo 'old counter:'.$counter1.'<br>';
    
            $objWorkSheet->getStyle("A$rest_of_information1x:C$rest_of_information1x")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("A$rest_of_information1x:C$rest_of_information1x")->getFont()->setSize(12);
                
                 
          
               		 
   
          $objWorkSheet->getStyle("A$rest_of_information1x:C$rest_of_information1x")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                
                $objWorkSheet->getStyle("A$rest_of_information1x:C$rest_of_information1x")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                	 
                 $objWorkSheet->getStyle("A$rest_of_information1x:C$rest_of_information1x")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
    
              	$objWorkSheet->setCellValue("A$rest_of_information1x", 'Verified Bags(Bags have delivery track and QR)');
        		$objWorkSheet->setCellValue("B$rest_of_information1x", 'Extra Bags(Bags do not have delivery track/QR/complete verifications)');
        		$objWorkSheet->setCellValue("C$rest_of_information1x", 'Total Bags Received');
        		
        		
     
                $rest_of_information_n1x=$rest_of_information1x+1;
                
                // echo 'inner data cell is:'.$rest_of_information_n1x.'<br>';
                // die();
                $counter1x=$rest_of_information_n1x+3;
            //   echo 'And new counter is:'.$counter1x.'<br>';
                    //  die();
                     // CALCULATION 
                    //  echo '$bags_returned_by_clients: '.$bags_returned_by_clients.'<br>';
                    //  echo 'tot: '.$bags_returned_by_clients1.'<br>';
                    //  die();
                     $verified_bags = $bags_returned_by_clients;
                     
                     $total_bag_recv = $bags_returned_by_clients1;
                     
                     $not_verified_bag = $total_bag_recv - $verified_bags;
       
                
                 $objWorkSheet->mergeCells("A$rest_of_information_n1x:A$counter1x");
                 $objWorkSheet->setCellValue("A$rest_of_information_n1x", $verified_bags );
                 $objWorkSheet->getStyle("A$rest_of_information_n1x")->getFont()->setSize(14);
                 $objWorkSheet->getStyle("A$rest_of_information_n1x")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("A$rest_of_information_n1x")->getFont()->getColor()->setARGB('3838414a');
        
                     
                     
                     
                     
                     
                    
                     
                 $objWorkSheet->mergeCells("B$rest_of_information_n1x:B$counter1x");
        		 $objWorkSheet->setCellValue("B$rest_of_information_n1x",$not_verified_bag);
        		 $objWorkSheet->getStyle("B$rest_of_information_n1x")->getFont()->setSize(14);
                 $objWorkSheet->getStyle("B$rest_of_information_n1x")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("B$rest_of_information_n1x")->getFont()->getColor()->setARGB('3838414a');
         
                 
                   
                 $objWorkSheet->mergeCells("C$rest_of_information_n1x:C$counter1x");
        		 $objWorkSheet->setCellValue("C$rest_of_information_n1x",$total_bag_recv);
        		 $objWorkSheet->getStyle("C$rest_of_information_n1x")->getFont()->setSize(14);
        		 $objWorkSheet->getStyle("C$rest_of_information_n1x")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("C$rest_of_information_n1x")->getFont()->getColor()->setARGB('3838414a');
        
        	
        		$objWorkSheet->getStyle("A$rest_of_information1x:C$counter1x")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1x:C$counter1x")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1x:C$counter1x")->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1x:C$counter1x")->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                   
    	   //     echo '$rest_of_information1:'.$rest_of_information1.'<br>';
        // 		echo '$rest_of_information1x:'.$rest_of_information1x.'<br>';
        		
        //         echo '$counter1x:'.$counter1x.'<br>';
                
        //         echo '$rest_of_information_n1x:'.$rest_of_information_n1x.'<br>';
                
        //         echo 'verified_bags:'.$verified_bags.'<br>';
        //         echo '$not_verified_bag:'.$not_verified_bag.'<br>';
        //         echo '$total_bag_recv:'.$total_bag_recv.'<br>';
        //         die(); 
    // END EXTRA BAG DETAIL
    }
    //   echo 'hi';
    //       die();
    
      }
    // $vemail=$bag_data[0]->v_email;
    // echo 'email is : '.$vemail;
    // echo '<pre>';
    // print_r($sorted_data);
    // die();
      	
      	if(count($sorted_data) > 0){
      	    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="'.$sorted_data[0]->vendor.'_'.date('Y-m-d_(H:i:s)').'.xlsx"');
      	}else if(count($res) > 0){
      	    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      	    header('Content-Disposition: attachment; filename="'.$res[0]['vendor'].'_'.date('Y-m-d_(H:i:s)').'.xlsx"');
      	}else{
      	    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      	    header('Content-Disposition: attachment; filename="'.$bag_data[0]->vendor.'_'.date('Y-m-d_(H:i:s)').'.xlsx"');
        }
// 		$writer->save("php://output");
// 		 echo 'hi';
    $v='';
    $vemail='';
      if(count($sorted_data) > 0){
		$name=$sorted_data[0]->vendor.get_unique_string().'.xlsx';
		$v=$sorted_data[0]->vendor;
		$vemail=$sorted_data[0]->vendor_email;
      }else if(count($res) > 0){
          $name=$res[0]['vendor'].get_unique_string().'.xlsx';
          	$v=$res[0]['vendor'];
          	$vemail=$res[0]['v_email'];
      }else{
          $name=$bag_data[0]->vendor.get_unique_string().'.xlsx';
          	$v=$bag_data[0]->vendor;
          	$vemail=$bag_data[0]->v_email;
      }
       
       
		$path=FCPATH.'assets/partner_reports/'.$name;
			$writer->save($path);
        //   echo '$path: '.$path;
	
// 		 die();

// 	$email_data = $result;
		$config = Array(
			'protocol' => 'smtp',
			'smtp_port' => 465,
			'smtp_user' => 'admin@thelogx.com',
			'mailtype' => 'html',
			'charset' => 'utf-8'
		);
		$this->load->library('email');
		$this->email->set_newline("\r\n");
		$htmlContent = '<h4><p style="text-transform: uppercase;">DEAR ' . $v .',</p> </h4>It is to inform you about report "'.$set_strt_dt.' - '.$set_end_dt.'" Please, find the report attached. <br/><br/><br/><pre>Regards,
TEAM L O G X</pre><br/>';
 		$this->email->to($vemail);
        // $this->email->to('ayesha.attique.work@gmail.com');
        // $this->email->to('t.raza5588@gmail.com');
		$this->email->from('admin@thelogx.com', 'LOGX');
		$this->email->subject('Report');
		$this->email->message($htmlContent);
		$this->email->set_mailtype("html");
		 $this->email->attach($path);
// 		 $this->email->attach('assets/partner_reports/Partner_reportdef9c4d6.xlsx');
		 
		  
		     
		     	$email=$this->email->send();
		
// 	$email=false;
		
		unlink($path);
	
		  //  $this->session->set_flashdata('success', 'Report send successfully.');
            //   redirect('vendor_deliveries_complete_report');
              
		  
		if($email){
		  
		    $this->session->set_flashdata('success', 'Report sent successfully.');
              redirect('vendor_deliveries_complete_report');
            // $this->load->view('vendor_deliveries_complete_report');
		 
		}else{
		    $this->session->set_flashdata('error', 'Report has not been sent., Try Again!');
              redirect('vendor_deliveries_complete_report');
		}
// 		redirect('vendor_deliveries_complete_report');
// 		echo json_encode($response);
	// END OF MAIN IF	
  }else{
       
      $this->session->set_flashdata('error', 'No Record Found, Try Again!');
              redirect('vendor_deliveries_complete_report');
       
      } 
       
}


function partner_report_email(){
     
       $this->load->model('bag_model');
               
         $response = array('success' => false);
         
       
        $start_date = @$_POST['from'];
        $end_date = @$_POST['to'];
        $vendor_id = @$_POST['vendor_list'];
        $status=0;
        
        // echo '$start_date='.$start_date.'<br>';
        // echo '$end_date='.$end_date.'<br>';
        // echo '$vendor_id='.$vendor_id.'<br>';

        if(!$start_date){
            $start_date = date('Y-m-d h:i:s', strtotime($start_date));
        }

        if(!$end_date){
            $end_date = date('Y-m-d h:i:s');
        }
        
        
        
        
        if(($vendor_id) AND ($start_date) AND ($end_date)){
                  if($this->session->userdata('role') == 'admin'){
                  
                  if($vendor_id){
                         $where = "o.is_neutral=1 and o.str_keep_varification ='yes' and o.driver_id > 0 and  v.status='".$status."' and (o.status='Collected') and o.cooling_bag_check !=3 and o.vendor_id='".$vendor_id."' and o.varified_at BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
                  }
                }else{
                    $where = "o.is_neutral=1 and o.str_keep_varification ='yes' and o.driver_id > 0 and v.status='".$status."' and (o.status='Collected') and o.cooling_bag_check !=3  and o.vendor_id='".$vendor_id."' and o.varified_at BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
                 }
                
                 $report_data = $data['result'] =  $this->order_model->get_tracking_statistics_details($vendor_id,$start_date,$end_date,$where);
        }
                
                
                
       
        $sorted_data=$report_data['records'];
        if($report_data['result']){
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }
        
        
        $where2 = "o.vendor_id = $vendor_id and o.driver_id > 0 and (o.status = 'Delivered' or o.status='Collected') AND o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' AND '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $res=$this->order_model->get_orders_where($where2);
        
         $where3= " b.vendor_id= $vendor_id and b.driver_id != 0 and b.status ='Picked' and b.collected_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' AND '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
         
         
         $b_data=$this->bag_model->get_where($where3);
         $bag_data=$b_data['records'];
        // echo 'hi';
        // die(); rizvi
        $response['res2'] = $res;
        $response['bag_data'] = $bag_data;
        
        // echo ' res2 And bag_data ::<br><pre>';
        // print_r($response);
        // echo '<br>sorted data <pre>';
        
        // print_r($sorted_data);
        
      
        
        // echo '<pre>';
        // echo 'THIS IS IT:<br>';
        // foreach($res as $data =>$val) {
        //     echo 'hi';
        //     // print_r($val);
        //     echo $val['order_id'];
        //     // die();
        //     // echo 'data is :'.$data.'<br>';
        //     // echo 'Val is :'.$val.'<br>';
        //     // echo $data->order_id.'<br>';
        // }
        
        
        
        
        
        // START XLS HERE 
 
//   echo '$bag_data :'.$bag_data[0]->vendor;
//   die();
  if(count($sorted_data) > 0 OR count($res) > 0 OR count($bag_data) >0){
     
      $last=0;
         $yrdata= strtotime($start_date);
    
         $set_strt_dt=date('d M Y', $yrdata);
         
         $yrdata= strtotime($end_date);
          $set_end_dt=date('d M Y', $yrdata);
         
        //  echo '$set_strt_dt:'.$set_strt_dt.'-';
        //  echo '$set_end_dt:'.$set_end_dt;
         
         if(count($sorted_data) > 0){ //Taha
             $title_strng=$sorted_data[0]->vendor.' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Verified bags with delivery detail';
            $title_strng1=$sorted_data[0]->vendor.' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Bags Detail';
         }else if(count($res) >0){
            
             $title_strng=$res[0]['vendor'].' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Verified bags with delivery detail';
            $title_strng1=$res[0]['vendor'].' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Bags Detail';
         
         }else{
             $title_strng=$bag_data[0]->vendor.' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Verified bags with delivery detail';
            $title_strng1=$bag_data[0]->vendor.' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Bags Detail';
         }
        
       
        //  echo '<br> $title_strng:<br>'.$title_strng1;
        //  die();
        
        if(count($sorted_data) > 0){ //Taha
         $main_title=$sorted_data[0]->vendor;
        }else if(count($res) >0){
            $main_title=$res[0]['vendor'];
        }else{
            $main_title=$bag_data[0]->vendor;
        }
         	$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		
		$spreadsheet->getProperties()
    ->setCreator("LOGX TEAM")
    ->setLastModifiedBy("LOGX TEAM")
    ->setTitle('Verified_bags_delivery_detail')
    ->setSubject($title_strng)
    ->setDescription(
      $title_strng
    )
    ->setKeywords("Logx Team")
    ->setCategory("LOGX Partner Report");
		
		
	
		
		
		$sheet->setTitle('Verified_bags_delivery_detail');
		
    // 	$sheet->getDefaultStyle()->getFont()->setName('Times New Roman');
        
       
        
       
         $sheet->mergeCells('A1:D1');
          $sheet->setCellValue('A1',$title_strng);
          $sheet->getStyle("A1")->getFont()->setName('Times New Roman');
          $sheet->getStyle("A1")->getFont()->setSize(14);
         $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
         $spreadsheet->getActiveSheet()->getStyle("A1")->getFont()->getColor()->setARGB('3838414a');
         
         $sheet->mergeCells('E1:I1');
          $sheet->setCellValue('E1','LOGX');
          $sheet->getStyle("E1")->getFont()->setName('Times New Roman');
          $sheet->getStyle("E1")->getFont()->setSize(14);
         $sheet->getStyle('E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
      $spreadsheet->getActiveSheet()->getStyle("E1")->getFont()->getColor()->setARGB('3838414a');
       
      $sheet->getStyle("A2:I2")->getFont()->setName('Times New Roman');
          $sheet->getStyle("A2:I2")->getFont()->setSize(12);
          
          
               		 
    
          $spreadsheet->getActiveSheet()->getStyle("A2:I2")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $spreadsheet->getActiveSheet()->getStyle("A2:I2")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                 $spreadsheet->getActiveSheet()->getStyle("A2:I2")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
       
       
       
        $spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman');
          $spreadsheet->getDefaultStyle()->getFont()->setSize(10);
       
        // 	$sheet->setCellValue('I1', 'LOGX');
        // 	$sheet->getStyle("I1")->getFont()->setSize(10);
          	
		$sheet->setCellValue('A2', 'Sr');
		$sheet->setCellValue('B2', 'Order ID');
		$sheet->setCellValue('C2', 'Customer');
		$sheet->setCellValue('D2', 'Delivery Address');
		$sheet->setCellValue('E2', 'Bag Received');
		$sheet->setCellValue('F2', 'Ice Packs');
		$sheet->setCellValue('G2', 'Delivered Date');
		$sheet->setCellValue('H2', 'Storekeeper Varification');
		$sheet->setCellValue('I2', 'Vendor Varification');

		$styleArrayFirstRow = [
            'font' => [
                'bold' => true,
            ],
            ['fill_solid' => 'e3eb8a']
        ];
        $highestColumn = $sheet->getHighestColumn();
        $sheet->getStyle('A2:' . $highestColumn . '2' )->applyFromArray($styleArrayFirstRow);
        $sheet->getStyle('A1:' . $highestColumn . '1' )->applyFromArray($styleArrayFirstRow);

        //$sheet->getStyle('A1:11')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('e3eb8a');

		$sheet->getStyle('2:2')->getFont()->setBold(true);
		
		
		foreach(range('A','I') as $columnID) {
		    if($columnID =='D' ){
		        $sheet->getColumnDimension($columnID)->setWidth(60);
		    }else if($columnID =='A'OR $columnID =='H'OR $columnID =='E' OR $columnID =='I' OR $columnID =='C' OR $columnID =='B'){
		        $sheet->getColumnDimension($columnID)->setWidth(40);
		    }else{
    			$sheet->getColumnDimension($columnID)->setWidth(20);
		    }
		} 
           
          $siz_of_total=sizeof($sorted_data); 
          $cit=$siz_of_total+1;
          $emi=$cit+1;
      $sheet_index=1;
      $in=3;
      $num=1;
       
      $bags_returned_by_clients=0;
      $icebags_returned_by_clients=0;
        // echo 'total size is:'.$siz_of_total;
      $rest_of_information=$siz_of_total+10;
    //   echo 'other is:'.$rest_of_information;
    //   die();
    
    
    
    
    
   
     if(count($sorted_data) > 0){  //Taha
      foreach($sorted_data as $data =>$val){
 

                
                		$writer = new Xlsx($spreadsheet);

                        
                        		//notification validation
                        // 		$validation2 = $sheet->getCell('H2')->getDataValidation();
                        // 		$validation2->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST );
                        // 		$validation2->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION );
                        // 		$validation2->setAllowBlank(false);
                        // 		$validation2->setShowInputMessage(true);
                        // 		$validation2->setShowErrorMessage(true);
                        // 		$validation2->setShowDropDown(true);
                        // 		$validation2->setErrorTitle('Input error');
                        // 		$validation2->setError('Value is not in list.');
                        // 		$validation2->setPromptTitle('Pick from list');
                        // 		$validation2->setPrompt('Please pick a value from the drop-down list.');
                        // 		$validation2->setFormula1('"'.$alerts.'"');

                //END VALIDATIONS //
               
               
                $sheet->setCellValue("A$in", $num );
        		$sheet->setCellValue("B$in", $val->order_id);
        		$sheet->setCellValue("C$in", $val->name_on_delivery." ".$val->number_on_delivery);
        		$sheet->getStyle("C$in")->getAlignment()->setWrapText(true);
        		
        		$sheet->setCellValue("D$in", $val->delivery_address);
        		$sheet->setCellValue("E$in", $val->own_bag_rcv_by_driver);
        		$sheet->setCellValue("F$in", $val->ice_bags);
        		$sheet->setCellValue("G$in", $val->delivery_date);
        		$sheet->setCellValue("H$in", $val->str_keepr_name." ".$val->str_keeper_Phone);
        // 		$sheet->getStyle("H$in")->getAlignment()->setWrapText(true);
        		
        		$sheet->setCellValue("I$in", $val->neutral_name." ".$val->neutral_Phone);
        // 		$sheet->getStyle("I$in")->getAlignment()->setWrapText(true);
        		
        	
        	//Counting bags returend with clients	
        		$bags_returned_by_clients = $bags_returned_by_clients + $val->own_bag_rcv_by_driver;
        		
          //Ice packs returned by clients
              	$icebags_returned_by_clients = $icebags_returned_by_clients + $val->ice_bags;
              	
        		 if($val->own_bag_rcv_by_driver ==0){
                      		  $spreadsheet->getActiveSheet()->getStyle("A$in:I$in")
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED); 
    
                $spreadsheet->getActiveSheet()->getStyle("A$in:I$in")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $spreadsheet->getActiveSheet()->getStyle("A$in:I$in")
                ->getFill()->getStartColor()->setARGB('FFFFFF00');
        		 }
        		 $in +=1;
        		 $num +=1;
        }
     
        
        
        
      $sheet->getStyle("A$rest_of_information:C$rest_of_information")->getFont()->setName('Times New Roman');
          $sheet->getStyle("A$rest_of_information:C$rest_of_information")->getFont()->setSize(12);
          
          
               		 
    
          $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$rest_of_information")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$rest_of_information")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                 $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$rest_of_information")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
    
              	$sheet->setCellValue("A$rest_of_information", 'Total Verified Deliveries');
        		$sheet->setCellValue("B$rest_of_information", 'Total Bags returned by Clients');
        		$sheet->setCellValue("C$rest_of_information", 'Total IcePacks returned by Clients');
        		
        		
        		
     
                $rest_of_information_n=$rest_of_information+1;
                
                $counter=$rest_of_information_n+3;
                
                 $sheet->mergeCells("A$rest_of_information_n:A$counter");
                 $sheet->setCellValue("A$rest_of_information_n", $siz_of_total );
                 $sheet->getStyle("A$rest_of_information_n")->getFont()->setSize(14);
                 $sheet->getStyle("A$rest_of_information_n")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information_n")->getFont()->getColor()->setARGB('3838414a');
         
         
                 $sheet->mergeCells("B$rest_of_information_n:B$counter");
        		 $sheet->setCellValue("B$rest_of_information_n", $bags_returned_by_clients);
        		 $sheet->getStyle("B$rest_of_information_n")->getFont()->setSize(14);
                 $sheet->getStyle("B$rest_of_information_n")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $spreadsheet->getActiveSheet()->getStyle("B$rest_of_information_n")->getFont()->getColor()->setARGB('3838414a');
         
                 $sheet->mergeCells("C$rest_of_information_n:C$counter");
        		 $sheet->setCellValue("C$rest_of_information_n", $icebags_returned_by_clients);
        		 $sheet->getStyle("C$rest_of_information_n")->getFont()->setSize(14);
        		 $sheet->getStyle("C$rest_of_information_n")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $spreadsheet->getActiveSheet()->getStyle("C$rest_of_information_n")->getFont()->getColor()->setARGB('3838414a');
        
        		
        		$spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$counter")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$counter")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$counter")->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$counter")->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
      
      //Taha
      
      
      
                          $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
                          $spreadsheet->getActiveSheet()->getProtection()->setSort(true);
                          $spreadsheet->getActiveSheet()->getProtection()->setInsertRows(true);
                          $spreadsheet->getActiveSheet()->getProtection()->setFormatCells(true);
                        
                          $spreadsheet->getActiveSheet()->getProtection()->setPassword('SAMI_LOGX_password');
               
                // echo '$siz_of_total:'.$siz_of_total.'<br>';
                // echo '$bags_returned_by_clients:'.$bags_returned_by_clients.'<br>';
                // echo '$icebags_returned_by_clients:'.$icebags_returned_by_clients.'<br>';
                // die();
       
     }else{$writer = new Xlsx($spreadsheet);
         
         
          $sheet->mergeCells('A3:H3');
          $sheet->setCellValue('A3','No Verified bags found!');
          $sheet->getStyle("A3")->getFont()->setName('Times New Roman');
          $sheet->getStyle("A3")->getFont()->setSize(16);
          $sheet->getStyle('A3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
              
       		
        		
        		  $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
                          $spreadsheet->getActiveSheet()->getProtection()->setSort(true);
                          $spreadsheet->getActiveSheet()->getProtection()->setInsertRows(true);
                          $spreadsheet->getActiveSheet()->getProtection()->setFormatCells(true);
                        
                          $spreadsheet->getActiveSheet()->getProtection()->setPassword('SAMI_LOGX_password');
         
     }
        		//AYESHA NEW Work
		
          // Add new sheet
          $objWorkSheet = $spreadsheet->createSheet(1); //Setting index when creating
          //Write cells
          $cell = "";
          
       
            
          
         
                $objWorkSheet->mergeCells('A1:D1');
          $objWorkSheet->setCellValue('A1',$title_strng1);
          $objWorkSheet->getStyle("A1")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("A1")->getFont()->setSize(14);
         $objWorkSheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
         $objWorkSheet->getStyle("A1")->getFont()->getColor()->setARGB('3838414a');
          
      
         
         $objWorkSheet->mergeCells('E1:I1');
          $objWorkSheet->setCellValue('E1','LOGX');
          $objWorkSheet->getStyle("E1")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("E1")->getFont()->setSize(14);
         $objWorkSheet->getStyle('E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
      $objWorkSheet->getStyle("E1")->getFont()->getColor()->setARGB('3838414a');
       
      $objWorkSheet->getStyle("A2:I2")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("A2:I2")->getFont()->setSize(12);
          
          
               		 
    
          $objWorkSheet->getStyle("A2:I2")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $objWorkSheet->getStyle("A2:I2")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                 $objWorkSheet->getStyle("A2:I2")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
       
       	
       
      $spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman');
          $spreadsheet->getDefaultStyle()->getFont()->setSize(10);
          
         
          
        //   error
        // $objWorkSheet->getDefaultStyle()->getFont()->setName('Times New Roman');
        //   $objWorkSheet->getDefaultStyle()->getFont()->setSize(10);
         //   error
         
         
        // 	$sheet->setCellValue('I1', 'LOGX');
        // 	$sheet->getStyle("I1")->getFont()->setSize(10);
          
		$objWorkSheet->setCellValue('A2', 'Sr');
		$objWorkSheet->setCellValue('B2', 'Order ID');
		$objWorkSheet->setCellValue('C2', 'Customer');
		$objWorkSheet->setCellValue('D2', 'Delivery Address');
		$objWorkSheet->setCellValue('E2', 'Bag Received');
		$objWorkSheet->setCellValue('F2', 'Ice Packs');
		$objWorkSheet->setCellValue('G2', 'Delivered Date');
		$objWorkSheet->setCellValue('H2', 'Collected Date');
// 		tayyab
$objWorkSheet->setCellValue('I2', 'Collected From');
		 
          
		$styleArrayFirstRow = [
            'font' => [
                'bold' => true,
            ],
            ['fill_solid' => 'e3eb8a']
        ];
        $highestColumn = $objWorkSheet->getHighestColumn();
        $objWorkSheet->getStyle('A2:' . $highestColumn . '2' )->applyFromArray($styleArrayFirstRow);
        $objWorkSheet->getStyle('A1:' . $highestColumn . '1' )->applyFromArray($styleArrayFirstRow);

        //$sheet->getStyle('A1:11')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('e3eb8a');

		$objWorkSheet->getStyle('2:2')->getFont()->setBold(true);

		
		foreach(range('A','I') as $columnID) {
		    if($columnID =='D' ){
		        $objWorkSheet->getColumnDimension($columnID)->setWidth(60);
		    }else if($columnID =='H'OR $columnID =='E' OR $columnID =='G' OR $columnID =='H' OR $columnID =='C' OR $columnID =='I' ){
		        $objWorkSheet->getColumnDimension($columnID)->setWidth(40);
		    }else if($columnID =='B' OR $columnID =='A'){
		        $objWorkSheet->getColumnDimension($columnID)->setWidth(70);
		    }else{
    			$objWorkSheet->getColumnDimension($columnID)->setWidth(20);
		    }
		} 
           		          
          $siz_of_total1=sizeof($res); 
        //   $cit1=$siz_of_total+1;
        //   $emi1=$cit+1;
      $sheet_index=1;
      $in1=3;
      $num1=1;
       
      $bags_returned_by_clients1=0;
      $icebags_returned_by_clients1=0;
        // echo 'total size is:'.$siz_of_total;
      $rest_of_information1=$siz_of_total1+10;
                $key = 1;
    
    
    $total_deliveires_from_delivery=0;
      if(count($res) > 0){  //Taha
      
                foreach($res as $data =>$val) {
                
                $objWorkSheet->setCellValue("A$in1", $num1 );
        		$objWorkSheet->setCellValue("B$in1", $val['order_id']);
        		$objWorkSheet->setCellValue("C$in1", $val['name_on_delivery']." ".$val['number_on_delivery']);
        		$objWorkSheet->getStyle("C$in1")->getAlignment()->setWrapText(true);
        		
        		$objWorkSheet->setCellValue("D$in1", $val['delivery_address']);
        		$objWorkSheet->setCellValue("E$in1", $val['bag_received']);
        		$objWorkSheet->setCellValue("F$in1", $val['ice_bags']);
        		$objWorkSheet->setCellValue("G$in1", $val['delivery_date']);
        		$objWorkSheet->setCellValue("H$in1", '00-00-0000');
        		
        // 		tayyab
              $objWorkSheet->setCellValue("I$in1", 'Delivery');
        	//Counting bags returend with clients	
        		$bags_returned_by_clients1 = $bags_returned_by_clients1 + $val['bag_received'];
        		
          //Ice packs returned by clients
              	$icebags_returned_by_clients1 = $icebags_returned_by_clients1 + $val['ice_bags'];
              	
        		 if($val['bag_received'] ==0){
        		     $objWorkSheet->setCellValue("I$in1", 'None');
                      		  $objWorkSheet->getStyle("A$in1:I$in1")
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED); 
    
                $objWorkSheet->getStyle("A$in1:I$in1")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $objWorkSheet->getStyle("A$in1:I$in1")
                ->getFill()->getStartColor()->setARGB('FFFFFF00');
        		 }
        		 $in1 +=1;
        		 $num1 +=1;
                }
                
      }
            
              $total_deliveires_from_delivery=$num1;
            
            if(count($bag_data) > 0){
                
                foreach($bag_data as $data =>$val) {
                
                $objWorkSheet->setCellValue("A$in1", $num1 );
        		$objWorkSheet->setCellValue("B$in1", $val->bag_id);
        		$objWorkSheet->setCellValue("C$in1", $val->customer." ".$val->c_phone);
        		$objWorkSheet->getStyle("C$in1")->getAlignment()->setWrapText(true);
        		
        		$objWorkSheet->setCellValue("D$in1", $val->bag_address);
        		$objWorkSheet->setCellValue("E$in1", $val->received_bag_qty);
        		$objWorkSheet->setCellValue("F$in1", '0');
        		$objWorkSheet->setCellValue("G$in1", '00-00-0000');
                $objWorkSheet->setCellValue("H$in1", $val->collected_date);
                
                // tayyab
                $objWorkSheet->setCellValue("I$in1", 'Bag Collection');
        	//Counting bags returend with clients	
        		$bags_returned_by_clients1 = $bags_returned_by_clients1 + $val->received_bag_qty;
        		
             	
        		 if($val->received_bag_qty ==0){
                      		  $objWorkSheet->getStyle("A$in1:I$in1")
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED); 
    
                $objWorkSheet->getStyle("A$in1:I$in1")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $objWorkSheet->getStyle("A$in1:I$in1")
                ->getFill()->getStartColor()->setARGB('FFFFFF00');
        	
        		 }else{
        		     
    
                $objWorkSheet->getStyle("A$in1:I$in1")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                
                $objWorkSheet->getStyle("A$in1:I$in1")
                ->getFill()->getStartColor()->setARGB('ffff7f00');
        		 
        		     
        		 }
        		 
        		 
        		 
        		 
        		 
        		 
        		 $in1 +=1;
        		 $num1 +=1;
                }
                
                
                $rest_of_information1=$num1+10;
            }
          
            
            
            if(count($bag_data) ==0 AND count($res)==0){
                $objWorkSheet->mergeCells('A3:I3');
          $objWorkSheet->setCellValue('A3','No Detail found!');
          $objWorkSheet->getStyle("A3")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("A3")->getFont()->setSize(16);
          $objWorkSheet->getStyle('A3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
          
            }
            
   
          // Rename sheet
          $objWorkSheet->setTitle("Bags_detail");
          
          $objWorkSheet->getProtection()->setSheet(true);
          $objWorkSheet->getProtection()->setSort(true);
          $objWorkSheet->getProtection()->setInsertRows(true);
          $objWorkSheet->getProtection()->setFormatCells(true);
        
          $objWorkSheet->getProtection()->setPassword('password');
          
          $spreadsheet->addNamedRange(
                new \PhpOffice\PhpSpreadsheet\NamedRange('Bags_detail', $spreadsheet->getSheetByName('Bags_detail'), 'A1:I1') 
            );
          
		// End AYESHA NEW Work
		
      
      if(count($res) > 0){  //Taha
      $objWorkSheet->getStyle("A$rest_of_information1:C$rest_of_information1")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("A$rest_of_information1:C$rest_of_information1")->getFont()->setSize(12);
          
          
               		 
   
          $objWorkSheet->getStyle("A$rest_of_information1:C$rest_of_information1")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                
                $objWorkSheet->getStyle("A$rest_of_information1:C$rest_of_information1")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                	 
                 $objWorkSheet->getStyle("A$rest_of_information1:C$rest_of_information1")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
    
              	$objWorkSheet->setCellValue("A$rest_of_information1", 'Total Deliveries');
        		$objWorkSheet->setCellValue("B$rest_of_information1", 'Total Bags returned by Clients');
        		$objWorkSheet->setCellValue("C$rest_of_information1", 'Total IcePacks returned by Clients');
        		
        		
     
                $rest_of_information_n1=$rest_of_information1+1;
                
                $counter1=$rest_of_information_n1+3;
                
                
                  $total_delivries_counter=$num1-1;
                  
                  $total_deliveires_from_delivery=$total_deliveires_from_delivery-1;
                
                 $objWorkSheet->mergeCells("A$rest_of_information_n1:A$counter1");
                 $objWorkSheet->setCellValue("A$rest_of_information_n1",$total_deliveires_from_delivery );
                 $objWorkSheet->getStyle("A$rest_of_information_n1")->getFont()->setSize(14);
                 $objWorkSheet->getStyle("A$rest_of_information_n1")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("A$rest_of_information_n1")->getFont()->getColor()->setARGB('3838414a');
        
         
                 $objWorkSheet->mergeCells("B$rest_of_information_n1:B$counter1");
        		 $objWorkSheet->setCellValue("B$rest_of_information_n1", $bags_returned_by_clients1);
        		 $objWorkSheet->getStyle("B$rest_of_information_n1")->getFont()->setSize(14);
                 $objWorkSheet->getStyle("B$rest_of_information_n1")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("B$rest_of_information_n1")->getFont()->getColor()->setARGB('3838414a');
                   
                    
                    
                 $objWorkSheet->mergeCells("C$rest_of_information_n1:C$counter1");
        		 $objWorkSheet->setCellValue("C$rest_of_information_n1", $icebags_returned_by_clients1);
        		 $objWorkSheet->getStyle("C$rest_of_information_n1")->getFont()->setSize(14);
        		 $objWorkSheet->getStyle("C$rest_of_information_n1")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("C$rest_of_information_n1")->getFont()->getColor()->setARGB('3838414a');
        
        		
        		$objWorkSheet->getStyle("A$rest_of_information1:C$counter1")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1:C$counter1")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1:C$counter1")->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1:C$counter1")->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
      
      
        //       echo '$siz_of_total1+10:'.$siz_of_total1.'<br>';
        // 		echo '$rest_of_information1:'.$rest_of_information1.'<br>';
        		
        //         echo '$counter1:'.$counter1.'<br>';
                
        //         echo '$rest_of_information_n1:'.$rest_of_information_n1.'<br>';
                
        //         echo '--------------------------------';
                // die();
      
     if(count($sorted_data) > 0){ 
    //   For EXTRA BAGS DETAILS
    // echo 'before:'.$rest_of_information1.'<br>';
        //         die();
                 $rest_of_information1x=$counter1+4;
    // echo 'after:'.$rest_of_information1x.'<br>';
    
    // echo 'old counter:'.$counter1.'<br>';
    
            $objWorkSheet->getStyle("A$rest_of_information1x:C$rest_of_information1x")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("A$rest_of_information1x:C$rest_of_information1x")->getFont()->setSize(12);
                
                 
          
               		 
   
          $objWorkSheet->getStyle("A$rest_of_information1x:C$rest_of_information1x")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                
                $objWorkSheet->getStyle("A$rest_of_information1x:C$rest_of_information1x")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                	 
                 $objWorkSheet->getStyle("A$rest_of_information1x:C$rest_of_information1x")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
    
              	$objWorkSheet->setCellValue("A$rest_of_information1x", 'Verified Bags(Bags have delivery track and QR)');
        		$objWorkSheet->setCellValue("B$rest_of_information1x", 'Extra Bags(Bags do not have delivery track/QR/complete verifications)');
        		$objWorkSheet->setCellValue("C$rest_of_information1x", 'Total Bags Received');
        		
        		
     
                $rest_of_information_n1x=$rest_of_information1x+1;
                
                // echo 'inner data cell is:'.$rest_of_information_n1x.'<br>';
                // die();
                $counter1x=$rest_of_information_n1x+3;
            //   echo 'And new counter is:'.$counter1x.'<br>';
                    //  die();
                     // CALCULATION 
                    //  echo '$bags_returned_by_clients: '.$bags_returned_by_clients.'<br>';
                    //  echo 'tot: '.$bags_returned_by_clients1.'<br>';
                    //  die();
                     $verified_bags = $bags_returned_by_clients;
                     
                     $total_bag_recv = $bags_returned_by_clients1;
                     
                     $not_verified_bag = $total_bag_recv - $verified_bags;
       
                
                 $objWorkSheet->mergeCells("A$rest_of_information_n1x:A$counter1x");
                 $objWorkSheet->setCellValue("A$rest_of_information_n1x", $verified_bags );
                 $objWorkSheet->getStyle("A$rest_of_information_n1x")->getFont()->setSize(14);
                 $objWorkSheet->getStyle("A$rest_of_information_n1x")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("A$rest_of_information_n1x")->getFont()->getColor()->setARGB('3838414a');
        
                     
                     
                     
                     
                     
                    
                     
                 $objWorkSheet->mergeCells("B$rest_of_information_n1x:B$counter1x");
        		 $objWorkSheet->setCellValue("B$rest_of_information_n1x",$not_verified_bag);
        		 $objWorkSheet->getStyle("B$rest_of_information_n1x")->getFont()->setSize(14);
                 $objWorkSheet->getStyle("B$rest_of_information_n1x")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("B$rest_of_information_n1x")->getFont()->getColor()->setARGB('3838414a');
         
                 
                   
                 $objWorkSheet->mergeCells("C$rest_of_information_n1x:C$counter1x");
        		 $objWorkSheet->setCellValue("C$rest_of_information_n1x",$total_bag_recv);
        		 $objWorkSheet->getStyle("C$rest_of_information_n1x")->getFont()->setSize(14);
        		 $objWorkSheet->getStyle("C$rest_of_information_n1x")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("C$rest_of_information_n1x")->getFont()->getColor()->setARGB('3838414a');
        
        	
        		$objWorkSheet->getStyle("A$rest_of_information1x:C$counter1x")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1x:C$counter1x")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1x:C$counter1x")->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1x:C$counter1x")->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                   
    	   //     echo '$rest_of_information1:'.$rest_of_information1.'<br>';
        // 		echo '$rest_of_information1x:'.$rest_of_information1x.'<br>';
        		
        //         echo '$counter1x:'.$counter1x.'<br>';
                
        //         echo '$rest_of_information_n1x:'.$rest_of_information_n1x.'<br>';
                
        //         echo 'verified_bags:'.$verified_bags.'<br>';
        //         echo '$not_verified_bag:'.$not_verified_bag.'<br>';
        //         echo '$total_bag_recv:'.$total_bag_recv.'<br>';
        //         die(); 
    // END EXTRA BAG DETAIL
    }
    //   echo 'hi';
    //       die();
    
      }
    // $vemail=$bag_data[0]->v_email;
    // echo 'email is : '.$vemail;
    // echo '<pre>';
    // print_r($sorted_data);
    // die();
      	
      	if(count($sorted_data) > 0){
      	    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="'.$sorted_data[0]->vendor.'_'.date('Y-m-d_(H:i:s)').'.xlsx"');
      	}else if(count($res) > 0){
      	    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      	    header('Content-Disposition: attachment; filename="'.$res[0]['vendor'].'_'.date('Y-m-d_(H:i:s)').'.xlsx"');
      	}else{
      	    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      	    header('Content-Disposition: attachment; filename="'.$bag_data[0]->vendor.'_'.date('Y-m-d_(H:i:s)').'.xlsx"');
        }
// 		$writer->save("php://output");
// 		 echo 'hi';
    $v='';
    $vemail='';
      if(count($sorted_data) > 0){
		$name=$sorted_data[0]->vendor.get_unique_string().'.xlsx';
		$v=$sorted_data[0]->vendor;
	   //	$vemail=$sorted_data[0]->vendor_email; 
	   $vemail=explode(',', $sorted_data[0]->emails_for_report);
      }else if(count($res) > 0){
          $name=$res[0]['vendor'].get_unique_string().'.xlsx';
          	$v=$res[0]['vendor'];
          	// $vemail=$res[0]['v_email'];
          	$vemail=explode(',', $res[0]['emails_for_report']);
      }else{
          $name=$bag_data[0]->vendor.get_unique_string().'.xlsx';
          	$v=$bag_data[0]->vendor;
          	// $vemail=$bag_data[0]->v_email;
          	$vemail=explode(',', $bag_data[0]->emails_for_report);
      }
       
    //   rizvi
    //   echo '$vemail is : ';
    //   print_r($vemail);
       
    //   die();
       
		$path=FCPATH.'assets/partner_reports/'.$name;
			$writer->save($path);
        //   echo '$path: '.$path;
	
// 		 die();

// 	$email_data = $result;
$email=false;

  	if(!empty($vemail)){
    foreach($vemail as $email_s){
		$config = Array(
			'protocol' => 'smtp',
			'smtp_port' => 465,
			'smtp_user' => 'admin@thelogx.com',
			'mailtype' => 'html',
			'charset' => 'utf-8'
		);
		$this->load->library('email');
		$this->email->set_newline("\r\n");
		$htmlContent = '<h4><p style="text-transform: uppercase;">DEAR ' . $v .',</p> </h4>It is to inform you about report "'.$set_strt_dt.' - '.$set_end_dt.'" Please, find the report attached. <br/><br/><br/><pre>Regards,
TEAM L O G X</pre><br/>';
 		$this->email->to($email_s);
        // $this->email->to('ayesha.attique.work@gmail.com');
        // $this->email->to('t.raza5588@gmail.com');
		$this->email->from('admin@thelogx.com', 'LOGX');
		$this->email->subject('Report');
		$this->email->message($htmlContent);
		$this->email->set_mailtype("html");
		 $this->email->attach($path);
// 		 $this->email->attach('assets/partner_reports/Partner_reportdef9c4d6.xlsx');
		 
		  
		     
		     	$email=$this->email->send();
		     	
		     	// echo "email res is :".$email;
		     	// die();
		     	
     }
  	}
		
// 	$email=false;
		
		unlink($path);
	
		  //  $this->session->set_flashdata('success', 'Report send successfully.');
            //   redirect('vendor_deliveries_complete_report');
              
		  
		if($email){
		  
		    $this->session->set_flashdata('success', 'Report sent successfully.');
              redirect('vendor_deliveries_complete_report');
            // $this->load->view('vendor_deliveries_complete_report');
		 
		}else{
		    $this->session->set_flashdata('error', 'Report did not send, Try Again!');
              redirect('vendor_deliveries_complete_report');
		}
// 		redirect('vendor_deliveries_complete_report');
// 		echo json_encode($response);
	// END OF MAIN IF	
  }else{
       
      $this->session->set_flashdata('error', 'No Record Found, Try Again!');
              redirect('vendor_deliveries_complete_report');
       
      } 
       
}






// END SEND PARTNER REPORT EMAIL
 function partner_report_email_old(){
     
     $this->load->model('bag_model');
     $response = array('success' => false);
         
       
        $start_date = @$_POST['from'];
        $end_date = @$_POST['to'];
        $vendor_id = @$_POST['vendor_list'];
        $status=0;
        
        // echo '$start_date='.$start_date.'<br>';
        // echo '$end_date='.$end_date.'<br>';
        // echo '$vendor_id='.$vendor_id.'<br>';

        if(!$start_date){
            $start_date = date('Y-m-d h:i:s', strtotime($start_date));
        }

        if(!$end_date){
            $end_date = date('Y-m-d h:i:s');
        }
        
        
        
        
        if(($vendor_id) AND ($start_date) AND ($end_date)){
                  if($this->session->userdata('role') == 'admin'){
                  
                  if($vendor_id){
                         $where = "o.is_neutral=1 and o.str_keep_varification ='yes' and o.driver_id > 0 and  v.status='".$status."' and (o.status='Collected') and o.cooling_bag_check !=3 and o.vendor_id='".$vendor_id."' and o.varified_at BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
                  }
                }else{
                    $where = "o.is_neutral=1 and o.str_keep_varification ='yes' and o.driver_id > 0 and v.status='".$status."' and (o.status='Collected') and o.cooling_bag_check !=3  and o.vendor_id='".$vendor_id."' and o.varified_at BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
                 }
                
                 $report_data = $data['result'] =  $this->order_model->get_tracking_statistics_details($vendor_id,$start_date,$end_date,$where);
        }
                
                
                
       
        $sorted_data=$report_data['records'];
        if($report_data['result']){
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }
        
        
        $where2 = "o.vendor_id = $vendor_id and o.driver_id > 0 and (o.status = 'Delivered' or o.status='Collected') AND o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' AND '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $res=$this->order_model->get_orders_where($where2);
        
         $where3= " b.vendor_id= $vendor_id and b.driver_id != 0 and b.status ='Picked' and b.collected_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' AND '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
         
         
         $b_data=$this->bag_model->get_where($where3);
         $bag_data=$b_data['records'];
        // echo 'hi';
        // die();
        $response['res2'] = $res;
        $response['bag_data'] = $bag_data;
        $response['sorted_data'] = $sorted_data;
        
        // echo '<pre>';
        // print_r($response);
        // echo '<br>';
        // die();
        
        // echo '<pre>';
        // echo 'THIS IS IT:<br>';
        // foreach($res as $data =>$val) {
        //     echo 'hi';
        //     // print_r($val);
        //     echo $val['order_id'];
        //     // die();
        //     // echo 'data is :'.$data.'<br>';
        //     // echo 'Val is :'.$val.'<br>';
        //     // echo $data->order_id.'<br>';
        // }
        
        
        
        
        
        // START XLS HERE 
 
//   echo '$bag_data :'.$bag_data[0]->vendor;
//   die();
  if(count($sorted_data) > 0 OR count($res) > 0 OR count($bag_data) >0){
    
      $last=0;
         $yrdata= strtotime($start_date);
    
         $set_strt_dt=date('d M Y', $yrdata);
         
         $yrdata= strtotime($end_date);
          $set_end_dt=date('d M Y', $yrdata);
         
        //  echo '$set_strt_dt:'.$set_strt_dt.'-';
        //  echo '$set_end_dt:'.$set_end_dt;
         
         if(count($sorted_data) > 0){ //Taha
             $title_strng=$sorted_data[0]->vendor.' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Verified bags with delivery detail';
            $title_strng1=$sorted_data[0]->vendor.' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Bags Detail';
         }else if(count($res) >0){
            
             $title_strng=$res[0]['vendor'].' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Verified bags with delivery detail';
            $title_strng1=$res[0]['vendor'].' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Bags Detail';
         
         }else{
             $title_strng=$bag_data[0]->vendor.' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Verified bags with delivery detail';
            $title_strng1=$bag_data[0]->vendor.' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Bags Detail';
         }
        
       
        //  echo '<br> $title_strng:<br>'.$title_strng1;
        //  die();
        
        if(count($sorted_data) > 0){ //Taha
         $main_title=$sorted_data[0]->vendor;
        }else if(count($res) >0){
            $main_title=$res[0]['vendor'];
        }else{
            $main_title=$bag_data[0]->vendor;
        }
         	$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		
		$spreadsheet->getProperties()
    ->setCreator("LOGX TEAM")
    ->setLastModifiedBy("LOGX TEAM")
    ->setTitle('Verified_bags_delivery_detail')
    ->setSubject($title_strng)
    ->setDescription(
      $title_strng
    )
    ->setKeywords("Logx Team")
    ->setCategory("LOGX Partner Report");
		
		
	
		
		
		$sheet->setTitle('Verified_bags_delivery_detail');
		
    // 	$sheet->getDefaultStyle()->getFont()->setName('Times New Roman');
        
       
        
       
         $sheet->mergeCells('A1:D1');
          $sheet->setCellValue('A1',$title_strng);
          $sheet->getStyle("A1")->getFont()->setName('Times New Roman');
          $sheet->getStyle("A1")->getFont()->setSize(14);
         $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
         $spreadsheet->getActiveSheet()->getStyle("A1")->getFont()->getColor()->setARGB('3838414a');
         
         $sheet->mergeCells('E1:I1');
          $sheet->setCellValue('E1','LOGX');
          $sheet->getStyle("E1")->getFont()->setName('Times New Roman');
          $sheet->getStyle("E1")->getFont()->setSize(14);
         $sheet->getStyle('E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
      $spreadsheet->getActiveSheet()->getStyle("E1")->getFont()->getColor()->setARGB('3838414a');
       
      $sheet->getStyle("A2:I2")->getFont()->setName('Times New Roman');
          $sheet->getStyle("A2:I2")->getFont()->setSize(12);
          
          
               		 
    
          $spreadsheet->getActiveSheet()->getStyle("A2:I2")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $spreadsheet->getActiveSheet()->getStyle("A2:I2")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                 $spreadsheet->getActiveSheet()->getStyle("A2:I2")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
       
       
       
        $spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman');
          $spreadsheet->getDefaultStyle()->getFont()->setSize(10);
       
        // 	$sheet->setCellValue('I1', 'LOGX');
        // 	$sheet->getStyle("I1")->getFont()->setSize(10);
          	
		$sheet->setCellValue('A2', 'Sr');
		$sheet->setCellValue('B2', 'Order ID');
		$sheet->setCellValue('C2', 'Customer');
		$sheet->setCellValue('D2', 'Delivery Address');
		$sheet->setCellValue('E2', 'Bag Received');
		$sheet->setCellValue('F2', 'Ice Packs');
		$sheet->setCellValue('G2', 'Delivered Date');
		$sheet->setCellValue('H2', 'Storekeeper Varification');
		$sheet->setCellValue('I2', 'Vendor Varification');

		$styleArrayFirstRow = [
            'font' => [
                'bold' => true,
            ],
            ['fill_solid' => 'e3eb8a']
        ];
        $highestColumn = $sheet->getHighestColumn();
        $sheet->getStyle('A2:' . $highestColumn . '2' )->applyFromArray($styleArrayFirstRow);
        $sheet->getStyle('A1:' . $highestColumn . '1' )->applyFromArray($styleArrayFirstRow);

        //$sheet->getStyle('A1:11')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('e3eb8a');

		$sheet->getStyle('2:2')->getFont()->setBold(true);
		
		
		foreach(range('A','I') as $columnID) {
		    if($columnID =='D' ){
		        $sheet->getColumnDimension($columnID)->setWidth(60);
		    }else if($columnID =='A'OR $columnID =='H'OR $columnID =='E' OR $columnID =='I' OR $columnID =='C' OR $columnID =='B'){
		        $sheet->getColumnDimension($columnID)->setWidth(40);
		    }else{
    			$sheet->getColumnDimension($columnID)->setWidth(20);
		    }
		} 
           
          $siz_of_total=sizeof($sorted_data); 
          $cit=$siz_of_total+1;
          $emi=$cit+1;
      $sheet_index=1;
      $in=3;
      $num=1;
       
      $bags_returned_by_clients=0;
      $icebags_returned_by_clients=0;
        // echo 'total size is:'.$siz_of_total;
      $rest_of_information=$siz_of_total+10;
    //   echo 'other is:'.$rest_of_information;
    //   die();
    
    
    
    
    
   
     if(count($sorted_data) > 0){  //Taha
      foreach($sorted_data as $data =>$val){
 

                
                		$writer = new Xlsx($spreadsheet);

                        
                        		//notification validation
                        // 		$validation2 = $sheet->getCell('H2')->getDataValidation();
                        // 		$validation2->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST );
                        // 		$validation2->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION );
                        // 		$validation2->setAllowBlank(false);
                        // 		$validation2->setShowInputMessage(true);
                        // 		$validation2->setShowErrorMessage(true);
                        // 		$validation2->setShowDropDown(true);
                        // 		$validation2->setErrorTitle('Input error');
                        // 		$validation2->setError('Value is not in list.');
                        // 		$validation2->setPromptTitle('Pick from list');
                        // 		$validation2->setPrompt('Please pick a value from the drop-down list.');
                        // 		$validation2->setFormula1('"'.$alerts.'"');

                //END VALIDATIONS //
               
               
                $sheet->setCellValue("A$in", $num );
        		$sheet->setCellValue("B$in", $val->order_id);
        		$sheet->setCellValue("C$in", $val->name_on_delivery." ".$val->number_on_delivery);
        		$sheet->getStyle("C$in")->getAlignment()->setWrapText(true);
        		
        		$sheet->setCellValue("D$in", $val->delivery_address);
        		$sheet->setCellValue("E$in", $val->own_bag_rcv_by_driver);
        		$sheet->setCellValue("F$in", $val->ice_bags);
        		$sheet->setCellValue("G$in", $val->delivery_date);
        		$sheet->setCellValue("H$in", $val->str_keepr_name." ".$val->str_keeper_Phone);
        // 		$sheet->getStyle("H$in")->getAlignment()->setWrapText(true);
        		
        		$sheet->setCellValue("I$in", $val->neutral_name." ".$val->neutral_Phone);
        // 		$sheet->getStyle("I$in")->getAlignment()->setWrapText(true);
        		
        	
        	//Counting bags returend with clients	
        		$bags_returned_by_clients = $bags_returned_by_clients + $val->own_bag_rcv_by_driver;
        		
          //Ice packs returned by clients
              	$icebags_returned_by_clients = $icebags_returned_by_clients + $val->ice_bags;
              	
        		 if($val->own_bag_rcv_by_driver ==0){
                      		  $spreadsheet->getActiveSheet()->getStyle("A$in:I$in")
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED); 
    
                $spreadsheet->getActiveSheet()->getStyle("A$in:I$in")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $spreadsheet->getActiveSheet()->getStyle("A$in:I$in")
                ->getFill()->getStartColor()->setARGB('FFFFFF00');
        		 }
        		 $in +=1;
        		 $num +=1;
        }
     
        
        
        
      $sheet->getStyle("A$rest_of_information:C$rest_of_information")->getFont()->setName('Times New Roman');
          $sheet->getStyle("A$rest_of_information:C$rest_of_information")->getFont()->setSize(12);
          
          
               		 
    
          $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$rest_of_information")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$rest_of_information")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                 $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$rest_of_information")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
    
              	$sheet->setCellValue("A$rest_of_information", 'Total Verified Deliveries');
        		$sheet->setCellValue("B$rest_of_information", 'Total Bags returned by Clients');
        		$sheet->setCellValue("C$rest_of_information", 'Total IcePacks returned by Clients');
        		
        		
        		
     
                $rest_of_information_n=$rest_of_information+1;
                
                $counter=$rest_of_information_n+3;
                
                 $sheet->mergeCells("A$rest_of_information_n:A$counter");
                 $sheet->setCellValue("A$rest_of_information_n", $siz_of_total );
                 $sheet->getStyle("A$rest_of_information_n")->getFont()->setSize(14);
                 $sheet->getStyle("A$rest_of_information_n")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information_n")->getFont()->getColor()->setARGB('3838414a');
         
         
                 $sheet->mergeCells("B$rest_of_information_n:B$counter");
        		 $sheet->setCellValue("B$rest_of_information_n", $bags_returned_by_clients);
        		 $sheet->getStyle("B$rest_of_information_n")->getFont()->setSize(14);
                 $sheet->getStyle("B$rest_of_information_n")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $spreadsheet->getActiveSheet()->getStyle("B$rest_of_information_n")->getFont()->getColor()->setARGB('3838414a');
         
                 $sheet->mergeCells("C$rest_of_information_n:C$counter");
        		 $sheet->setCellValue("C$rest_of_information_n", $icebags_returned_by_clients);
        		 $sheet->getStyle("C$rest_of_information_n")->getFont()->setSize(14);
        		 $sheet->getStyle("C$rest_of_information_n")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $spreadsheet->getActiveSheet()->getStyle("C$rest_of_information_n")->getFont()->getColor()->setARGB('3838414a');
        
        		
        		$spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$counter")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$counter")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$counter")->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$counter")->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
      
      //Taha
      
      
      
                          $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
                          $spreadsheet->getActiveSheet()->getProtection()->setSort(true);
                          $spreadsheet->getActiveSheet()->getProtection()->setInsertRows(true);
                          $spreadsheet->getActiveSheet()->getProtection()->setFormatCells(true);
                        
                          $spreadsheet->getActiveSheet()->getProtection()->setPassword('SAMI_LOGX_password');
               
                // echo '$siz_of_total:'.$siz_of_total.'<br>';
                // echo '$bags_returned_by_clients:'.$bags_returned_by_clients.'<br>';
                // echo '$icebags_returned_by_clients:'.$icebags_returned_by_clients.'<br>';
                // die();
       
     }else{$writer = new Xlsx($spreadsheet);
         
         
          $sheet->mergeCells('A3:H3');
          $sheet->setCellValue('A3','No Verified bags found!');
          $sheet->getStyle("A3")->getFont()->setName('Times New Roman');
          $sheet->getStyle("A3")->getFont()->setSize(16);
          $sheet->getStyle('A3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
              
        //         $sheet->setCellValue("A$in", $num );
        // 		$sheet->setCellValue("B$in", $val->order_id);
        // 		$sheet->setCellValue("C$in", $val->name_on_delivery." ".$val->number_on_delivery);
        // 		$sheet->getStyle("C$in")->getAlignment()->setWrapText(true);
        		
        // 		$sheet->setCellValue("D$in", $val->delivery_address);
        // 		$sheet->setCellValue("E$in", $val->own_bag_rcv_by_driver);
        // 		$sheet->setCellValue("F$in", $val->ice_bags);
        // 		$sheet->setCellValue("G$in", $val->delivery_date);
        // 		$sheet->setCellValue("H$in", $val->str_keepr_name." ".$val->str_keeper_Phone);
        		
        		
        		
        		  $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
                          $spreadsheet->getActiveSheet()->getProtection()->setSort(true);
                          $spreadsheet->getActiveSheet()->getProtection()->setInsertRows(true);
                          $spreadsheet->getActiveSheet()->getProtection()->setFormatCells(true);
                        
                          $spreadsheet->getActiveSheet()->getProtection()->setPassword('SAMI_LOGX_password');
         
     }
        		//AYESHA NEW Work
		
          // Add new sheet
          $objWorkSheet = $spreadsheet->createSheet(1); //Setting index when creating
          //Write cells
          $cell = "";
          
       
            
          
         
                $objWorkSheet->mergeCells('A1:D1');
          $objWorkSheet->setCellValue('A1',$title_strng1);
          $objWorkSheet->getStyle("A1")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("A1")->getFont()->setSize(14);
         $objWorkSheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
         $objWorkSheet->getStyle("A1")->getFont()->getColor()->setARGB('3838414a');
          
      
         
         $objWorkSheet->mergeCells('E1:H1');
          $objWorkSheet->setCellValue('E1','LOGX');
          $objWorkSheet->getStyle("E1")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("E1")->getFont()->setSize(14);
         $objWorkSheet->getStyle('E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
      $objWorkSheet->getStyle("E1")->getFont()->getColor()->setARGB('3838414a');
       
      $objWorkSheet->getStyle("A2:H2")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("A2:H2")->getFont()->setSize(12);
          
          
               		 
    
          $objWorkSheet->getStyle("A2:H2")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $objWorkSheet->getStyle("A2:H2")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                 $objWorkSheet->getStyle("A2:H2")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
       
       	
       
      $spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman');
          $spreadsheet->getDefaultStyle()->getFont()->setSize(10);
          
         
          
        //   error
        // $objWorkSheet->getDefaultStyle()->getFont()->setName('Times New Roman');
        //   $objWorkSheet->getDefaultStyle()->getFont()->setSize(10);
         //   error
         
         
        // 	$sheet->setCellValue('I1', 'LOGX');
        // 	$sheet->getStyle("I1")->getFont()->setSize(10);
          
		$objWorkSheet->setCellValue('A2', 'Sr');
		$objWorkSheet->setCellValue('B2', 'Order ID');
		$objWorkSheet->setCellValue('C2', 'Customer');
		$objWorkSheet->setCellValue('D2', 'Delivery Address');
		$objWorkSheet->setCellValue('E2', 'Bag Received');
		$objWorkSheet->setCellValue('F2', 'Ice Packs');
		$objWorkSheet->setCellValue('G2', 'Delivered Date');
		$objWorkSheet->setCellValue('H2', 'Collected Date');
		 
          
		$styleArrayFirstRow = [
            'font' => [
                'bold' => true,
            ],
            ['fill_solid' => 'e3eb8a']
        ];
        $highestColumn = $objWorkSheet->getHighestColumn();
        $objWorkSheet->getStyle('A2:' . $highestColumn . '2' )->applyFromArray($styleArrayFirstRow);
        $objWorkSheet->getStyle('A1:' . $highestColumn . '1' )->applyFromArray($styleArrayFirstRow);

        //$sheet->getStyle('A1:11')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('e3eb8a');

		$objWorkSheet->getStyle('2:2')->getFont()->setBold(true);

		
		foreach(range('A','H') as $columnID) {
		    if($columnID =='D' ){
		        $objWorkSheet->getColumnDimension($columnID)->setWidth(60);
		    }else if($columnID =='H'OR $columnID =='E' OR $columnID =='G' OR $columnID =='H' OR $columnID =='C'  ){
		        $objWorkSheet->getColumnDimension($columnID)->setWidth(40);
		    }else if($columnID =='B' OR $columnID =='A'){
		        $objWorkSheet->getColumnDimension($columnID)->setWidth(70);
		    }else{
    			$objWorkSheet->getColumnDimension($columnID)->setWidth(20);
		    }
		} 
           		          
          $siz_of_total1=sizeof($res); 
        //   $cit1=$siz_of_total+1;
        //   $emi1=$cit+1;
      $sheet_index=1;
      $in1=3;
      $num1=1;
       
      $bags_returned_by_clients1=0;
      $icebags_returned_by_clients1=0;
        // echo 'total size is:'.$siz_of_total;
      $rest_of_information1=$siz_of_total1+10;
                $key = 1;
    
      if(count($res) > 0){  //Taha
                foreach($res as $data =>$val) {
                
                $objWorkSheet->setCellValue("A$in1", $num1 );
        		$objWorkSheet->setCellValue("B$in1", $val['order_id']);
        		$objWorkSheet->setCellValue("C$in1", $val['name_on_delivery']." ".$val['number_on_delivery']);
        		$objWorkSheet->getStyle("C$in1")->getAlignment()->setWrapText(true);
        		
        		$objWorkSheet->setCellValue("D$in1", $val['delivery_address']);
        		$objWorkSheet->setCellValue("E$in1", $val['bag_received']);
        		$objWorkSheet->setCellValue("F$in1", $val['ice_bags']);
        		$objWorkSheet->setCellValue("G$in1", $val['delivery_date']);
        		$objWorkSheet->setCellValue("H$in1", '00-00-0000');
        
        	//Counting bags returend with clients	
        		$bags_returned_by_clients1 = $bags_returned_by_clients1 + $val['bag_received'];
        		
          //Ice packs returned by clients
              	$icebags_returned_by_clients1 = $icebags_returned_by_clients1 + $val['ice_bags'];
              	
        		 if($val['bag_received'] ==0){
                      		  $objWorkSheet->getStyle("A$in1:H$in1")
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED); 
    
                $objWorkSheet->getStyle("A$in1:H$in1")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $objWorkSheet->getStyle("A$in1:H$in1")
                ->getFill()->getStartColor()->setARGB('FFFFFF00');
        		 }
        		 $in1 +=1;
        		 $num1 +=1;
                }
                
      }
      
            
            if(count($bag_data) > 0){
                foreach($bag_data as $data =>$val) {
                
                $objWorkSheet->setCellValue("A$in1", $num1 );
        		$objWorkSheet->setCellValue("B$in1", $val->bag_id);
        		$objWorkSheet->setCellValue("C$in1", $val->customer." ".$val->c_phone);
        		$objWorkSheet->getStyle("C$in1")->getAlignment()->setWrapText(true);
        		
        		$objWorkSheet->setCellValue("D$in1", $val->bag_address);
        		$objWorkSheet->setCellValue("E$in1", $val->received_bag_qty);
        		$objWorkSheet->setCellValue("F$in1", '0');
        		$objWorkSheet->setCellValue("G$in1", '00-00-0000');
                $objWorkSheet->setCellValue("H$in1", $val->collected_date);
        	//Counting bags returend with clients	
        		$bags_returned_by_clients1 = $bags_returned_by_clients1 + $val->received_bag_qty;
        		
             	
        		 if($val->received_bag_qty ==0){
                      		  $objWorkSheet->getStyle("A$in1:H$in1")
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED); 
    
                $objWorkSheet->getStyle("A$in1:H$in1")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $objWorkSheet->getStyle("A$in1:H$in1")
                ->getFill()->getStartColor()->setARGB('FFFFFF00');
        		 }
        		 $in1 +=1;
        		 $num1 +=1;
                }
            }
          
            
            
            if(count($bag_data) ==0 AND count($res)==0){
                $objWorkSheet->mergeCells('A3:H3');
          $objWorkSheet->setCellValue('A3','No Detail found!');
          $objWorkSheet->getStyle("A3")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("A3")->getFont()->setSize(16);
          $objWorkSheet->getStyle('A3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
          
            }
            
   
          // Rename sheet
          $objWorkSheet->setTitle("Bags_detail");
          
          $objWorkSheet->getProtection()->setSheet(true);
          $objWorkSheet->getProtection()->setSort(true);
          $objWorkSheet->getProtection()->setInsertRows(true);
          $objWorkSheet->getProtection()->setFormatCells(true);
        
          $objWorkSheet->getProtection()->setPassword('password');
          
          $spreadsheet->addNamedRange(
                new \PhpOffice\PhpSpreadsheet\NamedRange('Bags_detail', $spreadsheet->getSheetByName('Bags_detail'), 'A1:H1') 
            );
          
		// End AYESHA NEW Work
		
      
      if(count($res) > 0){  //Taha
      $objWorkSheet->getStyle("A$rest_of_information1:C$rest_of_information1")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("A$rest_of_information1:C$rest_of_information1")->getFont()->setSize(12);
          
          
               		 
   
          $objWorkSheet->getStyle("A$rest_of_information1:C$rest_of_information1")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                
                $objWorkSheet->getStyle("A$rest_of_information1:C$rest_of_information1")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                	 
                 $objWorkSheet->getStyle("A$rest_of_information1:C$rest_of_information1")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
    
              	$objWorkSheet->setCellValue("A$rest_of_information1", 'Total Deliveries');
        		$objWorkSheet->setCellValue("B$rest_of_information1", 'Total Bags returned by Clients');
        		$objWorkSheet->setCellValue("C$rest_of_information1", 'Total IcePacks returned by Clients');
        		
        		
     
                $rest_of_information_n1=$rest_of_information1+1;
                
                $counter1=$rest_of_information_n1+3;
                
                
                  $total_delivries_counter=$num1-1;
                
                 $objWorkSheet->mergeCells("A$rest_of_information_n1:A$counter1");
                 $objWorkSheet->setCellValue("A$rest_of_information_n1",$total_delivries_counter );
                 $objWorkSheet->getStyle("A$rest_of_information_n1")->getFont()->setSize(14);
                 $objWorkSheet->getStyle("A$rest_of_information_n1")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("A$rest_of_information_n1")->getFont()->getColor()->setARGB('3838414a');
        
         
                 $objWorkSheet->mergeCells("B$rest_of_information_n1:B$counter1");
        		 $objWorkSheet->setCellValue("B$rest_of_information_n1", $bags_returned_by_clients1);
        		 $objWorkSheet->getStyle("B$rest_of_information_n1")->getFont()->setSize(14);
                 $objWorkSheet->getStyle("B$rest_of_information_n1")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("B$rest_of_information_n1")->getFont()->getColor()->setARGB('3838414a');
                   
                    
                    
                 $objWorkSheet->mergeCells("C$rest_of_information_n1:C$counter1");
        		 $objWorkSheet->setCellValue("C$rest_of_information_n1", $icebags_returned_by_clients1);
        		 $objWorkSheet->getStyle("C$rest_of_information_n1")->getFont()->setSize(14);
        		 $objWorkSheet->getStyle("C$rest_of_information_n1")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("C$rest_of_information_n1")->getFont()->getColor()->setARGB('3838414a');
        
        		
        		$objWorkSheet->getStyle("A$rest_of_information1:C$counter1")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1:C$counter1")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1:C$counter1")->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1:C$counter1")->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
      
      
        //       echo '$siz_of_total1+10:'.$siz_of_total1.'<br>';
        // 		echo '$rest_of_information1:'.$rest_of_information1.'<br>';
        		
        //         echo '$counter1:'.$counter1.'<br>';
                
        //         echo '$rest_of_information_n1:'.$rest_of_information_n1.'<br>';
                
        //         echo '--------------------------------';
                // die();
      
    if(count($sorted_data) > 0){   
    //   For EXTRA BAGS DETAILS
    // echo 'before:'.$rest_of_information1.'<br>';
        //         die();
                 $rest_of_information1x=$counter1+4;
    // echo 'after:'.$rest_of_information1x.'<br>';
    
    // echo 'old counter:'.$counter1.'<br>';
    
            $objWorkSheet->getStyle("A$rest_of_information1x:C$rest_of_information1x")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("A$rest_of_information1x:C$rest_of_information1x")->getFont()->setSize(12);
                
                 
          
               		 
   
          $objWorkSheet->getStyle("A$rest_of_information1x:C$rest_of_information1x")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                
                $objWorkSheet->getStyle("A$rest_of_information1x:C$rest_of_information1x")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                	 
                 $objWorkSheet->getStyle("A$rest_of_information1x:C$rest_of_information1x")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
    
              	$objWorkSheet->setCellValue("A$rest_of_information1x", 'Verified Bags(Bags have delivery track and QR)');
        		$objWorkSheet->setCellValue("B$rest_of_information1x", 'Extra Bags(Bags do not have delivery track/QR/complete verifications)');
        		$objWorkSheet->setCellValue("C$rest_of_information1x", 'Total Bags Received');
        		
        		
     
                $rest_of_information_n1x=$rest_of_information1x+1;
                
                // echo 'inner data cell is:'.$rest_of_information_n1x.'<br>';
                // die();
                $counter1x=$rest_of_information_n1x+3;
            //   echo 'And new counter is:'.$counter1x.'<br>';
                    //  die();
                     // CALCULATION 
                    //  echo '$bags_returned_by_clients: '.$bags_returned_by_clients.'<br>';
                    //  echo 'tot: '.$bags_returned_by_clients1.'<br>';
                    //  die();
                     $verified_bags = $bags_returned_by_clients;
                     
                     $total_bag_recv = $bags_returned_by_clients1;
                     
                     $not_verified_bag = $total_bag_recv - $verified_bags;
       
                
                 $objWorkSheet->mergeCells("A$rest_of_information_n1x:A$counter1x");
                 $objWorkSheet->setCellValue("A$rest_of_information_n1x", $verified_bags );
                 $objWorkSheet->getStyle("A$rest_of_information_n1x")->getFont()->setSize(14);
                 $objWorkSheet->getStyle("A$rest_of_information_n1x")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("A$rest_of_information_n1x")->getFont()->getColor()->setARGB('3838414a');
        
                     
                     
                     
                     
                     
                    
                     
                 $objWorkSheet->mergeCells("B$rest_of_information_n1x:B$counter1x");
        		 $objWorkSheet->setCellValue("B$rest_of_information_n1x",$not_verified_bag);
        		 $objWorkSheet->getStyle("B$rest_of_information_n1x")->getFont()->setSize(14);
                 $objWorkSheet->getStyle("B$rest_of_information_n1x")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("B$rest_of_information_n1x")->getFont()->getColor()->setARGB('3838414a');
         
                 
                   
                 $objWorkSheet->mergeCells("C$rest_of_information_n1x:C$counter1x");
        		 $objWorkSheet->setCellValue("C$rest_of_information_n1x",$total_bag_recv);
        		 $objWorkSheet->getStyle("C$rest_of_information_n1x")->getFont()->setSize(14);
        		 $objWorkSheet->getStyle("C$rest_of_information_n1x")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("C$rest_of_information_n1x")->getFont()->getColor()->setARGB('3838414a');
        
        	
        		$objWorkSheet->getStyle("A$rest_of_information1x:C$counter1x")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1x:C$counter1x")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1x:C$counter1x")->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1x:C$counter1x")->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                   
    	   //     echo '$rest_of_information1:'.$rest_of_information1.'<br>';
        // 		echo '$rest_of_information1x:'.$rest_of_information1x.'<br>';
        		
        //         echo '$counter1x:'.$counter1x.'<br>';
                
        //         echo '$rest_of_information_n1x:'.$rest_of_information_n1x.'<br>';
                
        //         echo 'verified_bags:'.$verified_bags.'<br>';
        //         echo '$not_verified_bag:'.$not_verified_bag.'<br>';
        //         echo '$total_bag_recv:'.$total_bag_recv.'<br>';
        //         die();
    
    // END EXTRA BAG DETAIL
    }
    //   echo 'hi';
    //       die();
    
      }
    // $vemail=$bag_data[0]->v_email;
    // echo 'email is : '.$vemail;
    // echo '<pre>';
    // print_r($sorted_data);
    // die();
      	
      	if(count($sorted_data) > 0){
      	    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="'.$sorted_data[0]->vendor.'_'.date('Y-m-d_(H:i:s)').'.xlsx"');
      	}else if(count($res) > 0){
      	    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      	    header('Content-Disposition: attachment; filename="'.$res[0]['vendor'].'_'.date('Y-m-d_(H:i:s)').'.xlsx"');
      	}else{
      	    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      	    header('Content-Disposition: attachment; filename="'.$bag_data[0]->vendor.'_'.date('Y-m-d_(H:i:s)').'.xlsx"');
        }
// 		$writer->save("php://output");
// 		 echo 'hi';
  
  
    $v='';
    $vemail='';
       if(count($sorted_data) > 0){
		$name=$sorted_data[0]->vendor.get_unique_string().'.xlsx';
		$v=$sorted_data[0]->vendor;
	   //	$vemail=$sorted_data[0]->vendor_email; 
	   $vemail=explode(',', $sorted_data[0]->emails_for_report);
       }else if(count($res) > 0){
           $name=$res[0]['vendor'].get_unique_string().'.xlsx';
           	$v=$res[0]['vendor'];
           	// $vemail=$res[0]['v_email'];
           	$vemail=explode(',', $res[0]['emails_for_report']);
       }else{
           $name=$bag_data[0]->vendor.get_unique_string().'.xlsx';
           	$v=$bag_data[0]->vendor;
           	// $vemail=$bag_data[0]->v_email;
           	$vemail=explode(',', $bag_data[0]->emails_for_report);
       }
       
       
		$path=FCPATH.'assets/partner_reports/'.$name;
			$writer->save($path);
        //   echo '$path: '.$path;
	
// 		 die();

// 	$email_data = $result;
$email=false;

  	if(!empty($vemail)){
    foreach($vemail as $email_s){
		$config = Array(
			'protocol' => 'smtp',
			'smtp_port' => 465,
			'smtp_user' => 'admin@thelogx.com',
			'mailtype' => 'html',
			'charset' => 'utf-8'
		);
		$this->load->library('email');
		$this->email->set_newline("\r\n");
		$htmlContent = '<h4><p style="text-transform: uppercase;">DEAR ' . $v .',</p> </h4>It is to inform you about report "'.$set_strt_dt.' - '.$set_end_dt.'" Please, find the report attached. <br/><br/><br/><pre>Regards,
TEAM L O G X</pre><br/>';
 		$this->email->to($email_s);
        // $this->email->to('ayesha.attique.work@gmail.com');
        // $this->email->to('t.raza5588@gmail.com');
		$this->email->from('admin@thelogx.com', 'LOGX');
		$this->email->subject('Report');
		$this->email->message($htmlContent);
		$this->email->set_mailtype("html");
		 $this->email->attach($path);
// 		 $this->email->attach('assets/partner_reports/Partner_reportdef9c4d6.xlsx');
		 
		  
		     
		     	$email=$this->email->send();
		     	
     }
  	}
		
// 	$email=false;
		
		unlink($path);
	
		  //  $this->session->set_flashdata('success', 'Report send successfully.');
            //   redirect('vendor_deliveries_complete_report');
              
		  
		if($email){
		  
		    $this->session->set_flashdata('success', 'Report sent successfully.');
              redirect('vendor_deliveries_complete_report');
            // $this->load->view('vendor_deliveries_complete_report');
		 
		}else{
		    $this->session->set_flashdata('error', 'Report did not send, Try Again!');
              redirect('vendor_deliveries_complete_report');
		}
// 		redirect('vendor_deliveries_complete_report');
// 		echo json_encode($response);
	// END OF MAIN IF	
  }else{
       
      $this->session->set_flashdata('error', 'No Record Found, Try Again!');
              redirect('vendor_deliveries_complete_report');
       
      } 
       
}





function partner_report_seprate(){
        //   echo 'hi';
        //   die();
             
          
         $response = array('success' => false);
         
       
        $start_date = @$_POST['from'];
        $end_date = @$_POST['to'];
        $vendor_id = @$_POST['vendor_list'];
        $status=0;
        
        // echo '$start_date='.$start_date.'<br>';
        // echo '$end_date='.$end_date.'<br>';
        // echo '$vendor_id='.$vendor_id.'<br>';

        if(!$start_date){
            $start_date = date('Y-m-d h:i:s', strtotime($start_date));
        }

        if(!$end_date){
            $end_date = date('Y-m-d h:i:s');
        }
        
        
        
        
        if(($vendor_id) AND ($start_date) AND ($end_date)){
                  if($this->session->userdata('role') == 'admin'){
                  
                  if($vendor_id){
                         $where = "o.is_neutral=1 and o.str_keep_varification ='yes' and o.driver_id > 0 and  v.status='".$status."' and (o.status='Collected') and o.cooling_bag_check !=3 and o.vendor_id='".$vendor_id."' and o.varified_at BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
                  }
                }else{
                    $where = "o.is_neutral=1 and o.str_keep_varification ='yes' and o.driver_id > 0 and v.status='".$status."' and (o.status='Collected') and o.cooling_bag_check !=3  and o.vendor_id='".$vendor_id."' and o.varified_at BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
                 }
                
                 $report_data = $data['result'] =  $this->order_model->get_tracking_statistics_details($vendor_id,$start_date,$end_date,$where);
        }
                
                
                
       
        $sorted_data=$report_data['records'];
        if($report_data['result']){
            $response['success'] = true;
            $response['report_data'] = $report_data;
        }
        
        
        $where2 = "o.vendor_id = $vendor_id and o.driver_id > 0 and (o.status = 'Delivered' or o.status='Collected') AND o.delivery_date BETWEEN '".date('Y-m-d', strtotime($start_date))." 00:00:00' AND '".date('Y-m-d', strtotime($end_date))." 23:59:59'";
        $res=$this->order_model->get_orders_where($where2);
        $response['res2'] = $res;
        // echo '<pre>';
        // print_r($response);
        // echo '<br>';
        // die();
        
        // echo '<pre>';
        // echo 'THIS IS IT:<br>';
        // foreach($res as $data =>$val) {
        //     echo 'hi';
        //     // print_r($val);
        //     echo $val['order_id'];
        //     // die();
        //     // echo 'data is :'.$data.'<br>';
        //     // echo 'Val is :'.$val.'<br>';
        //     // echo $data->order_id.'<br>';
        // }
        
        
        
        
        
        // START XLS HERE 
 
    
  if(count($sorted_data) > 0 OR count($res) > 0){
     
          $last=0;
         $yrdata= strtotime($start_date);
    
         $set_strt_dt=date('d M Y', $yrdata);
         
         $yrdata= strtotime($end_date);
          $set_end_dt=date('d M Y', $yrdata);
         
        //  echo '$set_strt_dt:'.$set_strt_dt.'-';
        //  echo '$set_end_dt:'.$set_end_dt;
         
         if(count($sorted_data) > 0){ //Taha
             $title_strng=$sorted_data[0]->vendor.' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Verified bags with delivery detail';
            $title_strng1=$sorted_data[0]->vendor.' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Bags Detail';
         }else{
            
             $title_strng=$res[0]['vendor'].' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Verified bags with delivery detail';
            $title_strng1=$res[0]['vendor'].' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Bags Detail';
         
         }
        
       
        //  echo '<br> $title_strng:<br>'.$title_strng1;
        //  die();
        
        if(count($sorted_data) > 0){ //Taha
         $main_title=$sorted_data[0]->vendor;
        }else{
            $main_title=$res[0]['vendor'];
        }
         	$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		
		$spreadsheet->getProperties()
    ->setCreator("LOGX TEAM")
    ->setLastModifiedBy("LOGX TEAM")
    ->setTitle('Verified_bags_delivery_detail')
    ->setSubject($title_strng)
    ->setDescription(
      $title_strng
    )
    ->setKeywords("Logx Team")
    ->setCategory("LOGX Partner Report");
		
		
	
		
		
		$sheet->setTitle('Verified_bags_delivery_detail');
		
    // 	$sheet->getDefaultStyle()->getFont()->setName('Times New Roman');
        
       
        
       
         $sheet->mergeCells('A1:D1');
          $sheet->setCellValue('A1',$title_strng);
          $sheet->getStyle("A1")->getFont()->setName('Times New Roman');
          $sheet->getStyle("A1")->getFont()->setSize(14);
         $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
         $spreadsheet->getActiveSheet()->getStyle("A1")->getFont()->getColor()->setARGB('3838414a');
         
         $sheet->mergeCells('E1:I1');
          $sheet->setCellValue('E1','LOGX');
          $sheet->getStyle("E1")->getFont()->setName('Times New Roman');
          $sheet->getStyle("E1")->getFont()->setSize(14);
         $sheet->getStyle('E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
      $spreadsheet->getActiveSheet()->getStyle("E1")->getFont()->getColor()->setARGB('3838414a');
       
      $sheet->getStyle("A2:I2")->getFont()->setName('Times New Roman');
          $sheet->getStyle("A2:I2")->getFont()->setSize(12);
          
          
               		 
    
          $spreadsheet->getActiveSheet()->getStyle("A2:I2")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $spreadsheet->getActiveSheet()->getStyle("A2:I2")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                 $spreadsheet->getActiveSheet()->getStyle("A2:I2")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
       
       
       
        $spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman');
          $spreadsheet->getDefaultStyle()->getFont()->setSize(10);
       
        // 	$sheet->setCellValue('I1', 'LOGX');
        // 	$sheet->getStyle("I1")->getFont()->setSize(10);
          	
		$sheet->setCellValue('A2', 'Sr');
		$sheet->setCellValue('B2', 'Order ID');
		$sheet->setCellValue('C2', 'Customer');
		$sheet->setCellValue('D2', 'Delivery Address');
		$sheet->setCellValue('E2', 'Bag Received');
		$sheet->setCellValue('F2', 'Ice Packs');
		$sheet->setCellValue('G2', 'Delivered Date');
		$sheet->setCellValue('H2', 'Storekeeper Varification');
		$sheet->setCellValue('I2', 'Vendor Varification');

		$styleArrayFirstRow = [
            'font' => [
                'bold' => true,
            ],
            ['fill_solid' => 'e3eb8a']
        ];
        $highestColumn = $sheet->getHighestColumn();
        $sheet->getStyle('A2:' . $highestColumn . '2' )->applyFromArray($styleArrayFirstRow);
        $sheet->getStyle('A1:' . $highestColumn . '1' )->applyFromArray($styleArrayFirstRow);

        //$sheet->getStyle('A1:11')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('e3eb8a');

		$sheet->getStyle('2:2')->getFont()->setBold(true);
		
		
		foreach(range('A','I') as $columnID) {
		    if($columnID =='D' ){
		        $sheet->getColumnDimension($columnID)->setWidth(60);
		    }else if($columnID =='A'OR $columnID =='H'OR $columnID =='E' OR $columnID =='I' OR $columnID =='C' OR $columnID =='B'){
		        $sheet->getColumnDimension($columnID)->setWidth(40);
		    }else{
    			$sheet->getColumnDimension($columnID)->setWidth(20);
		    }
		} 
           
          $siz_of_total=sizeof($sorted_data); 
          $cit=$siz_of_total+1;
          $emi=$cit+1;
      $sheet_index=1;
      $in=3;
      $num=1;
       
      $bags_returned_by_clients=0;
      $icebags_returned_by_clients=0;
        // echo 'total size is:'.$siz_of_total;
      $rest_of_information=$siz_of_total+10;
    //   echo 'other is:'.$rest_of_information;
    //   die();
    
    
    
    
    
   
     if(count($sorted_data) > 0){  //Taha
      foreach($sorted_data as $data =>$val){
 

                
                		$writer = new Xlsx($spreadsheet);

                        
                        		//notification validation
                        // 		$validation2 = $sheet->getCell('H2')->getDataValidation();
                        // 		$validation2->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST );
                        // 		$validation2->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION );
                        // 		$validation2->setAllowBlank(false);
                        // 		$validation2->setShowInputMessage(true);
                        // 		$validation2->setShowErrorMessage(true);
                        // 		$validation2->setShowDropDown(true);
                        // 		$validation2->setErrorTitle('Input error');
                        // 		$validation2->setError('Value is not in list.');
                        // 		$validation2->setPromptTitle('Pick from list');
                        // 		$validation2->setPrompt('Please pick a value from the drop-down list.');
                        // 		$validation2->setFormula1('"'.$alerts.'"');

                //END VALIDATIONS //
               
               
                $sheet->setCellValue("A$in", $num );
        		$sheet->setCellValue("B$in", $val->order_id);
        		$sheet->setCellValue("C$in", $val->name_on_delivery." ".$val->number_on_delivery);
        		$sheet->getStyle("C$in")->getAlignment()->setWrapText(true);
        		
        		$sheet->setCellValue("D$in", $val->delivery_address);
        		$sheet->setCellValue("E$in", $val->own_bag_rcv_by_driver);
        		$sheet->setCellValue("F$in", $val->ice_bags);
        		$sheet->setCellValue("G$in", $val->delivery_date);
        		$sheet->setCellValue("H$in", $val->str_keepr_name." ".$val->str_keeper_Phone);
        // 		$sheet->getStyle("H$in")->getAlignment()->setWrapText(true);
        		
        		$sheet->setCellValue("I$in", $val->neutral_name." ".$val->neutral_Phone);
        // 		$sheet->getStyle("I$in")->getAlignment()->setWrapText(true);
        		
        	
        	//Counting bags returend with clients	
        		$bags_returned_by_clients = $bags_returned_by_clients + $val->own_bag_rcv_by_driver;
        		
          //Ice packs returned by clients
              	$icebags_returned_by_clients = $icebags_returned_by_clients + $val->ice_bags;
              	
        		 if($val->own_bag_rcv_by_driver ==0){
                      		  $spreadsheet->getActiveSheet()->getStyle("A$in:I$in")
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED); 
    
                $spreadsheet->getActiveSheet()->getStyle("A$in:I$in")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $spreadsheet->getActiveSheet()->getStyle("A$in:I$in")
                ->getFill()->getStartColor()->setARGB('FFFFFF00');
        		 }
        		 $in +=1;
        		 $num +=1;
        }
     
        
        
        
      $sheet->getStyle("A$rest_of_information:C$rest_of_information")->getFont()->setName('Times New Roman');
          $sheet->getStyle("A$rest_of_information:C$rest_of_information")->getFont()->setSize(12);
          
          
               		 
    
          $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$rest_of_information")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$rest_of_information")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                 $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$rest_of_information")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
    
              	$sheet->setCellValue("A$rest_of_information", 'Total Verified Deliveries');
        		$sheet->setCellValue("B$rest_of_information", 'Total Bags returned by Clients');
        		$sheet->setCellValue("C$rest_of_information", 'Total IcePacks returned by Clients');
        		
        		
        		
     
                $rest_of_information_n=$rest_of_information+1;
                
                $counter=$rest_of_information_n+3;
                
                 $sheet->mergeCells("A$rest_of_information_n:A$counter");
                 $sheet->setCellValue("A$rest_of_information_n", $siz_of_total );
                 $sheet->getStyle("A$rest_of_information_n")->getFont()->setSize(14);
                 $sheet->getStyle("A$rest_of_information_n")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information_n")->getFont()->getColor()->setARGB('3838414a');
         
         
                 $sheet->mergeCells("B$rest_of_information_n:B$counter");
        		 $sheet->setCellValue("B$rest_of_information_n", $bags_returned_by_clients);
        		 $sheet->getStyle("B$rest_of_information_n")->getFont()->setSize(14);
                 $sheet->getStyle("B$rest_of_information_n")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $spreadsheet->getActiveSheet()->getStyle("B$rest_of_information_n")->getFont()->getColor()->setARGB('3838414a');
         
                 $sheet->mergeCells("C$rest_of_information_n:C$counter");
        		 $sheet->setCellValue("C$rest_of_information_n", $icebags_returned_by_clients);
        		 $sheet->getStyle("C$rest_of_information_n")->getFont()->setSize(14);
        		 $sheet->getStyle("C$rest_of_information_n")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $spreadsheet->getActiveSheet()->getStyle("C$rest_of_information_n")->getFont()->getColor()->setARGB('3838414a');
        
        		
        		$spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$counter")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$counter")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$counter")->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("A$rest_of_information:C$counter")->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
      
      //Taha
      
      
      
                          $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
                          $spreadsheet->getActiveSheet()->getProtection()->setSort(true);
                          $spreadsheet->getActiveSheet()->getProtection()->setInsertRows(true);
                          $spreadsheet->getActiveSheet()->getProtection()->setFormatCells(true);
                        
                          $spreadsheet->getActiveSheet()->getProtection()->setPassword('SAMI_LOGX_password');
               
                // echo '$siz_of_total:'.$siz_of_total.'<br>';
                // echo '$bags_returned_by_clients:'.$bags_returned_by_clients.'<br>';
                // echo '$icebags_returned_by_clients:'.$icebags_returned_by_clients.'<br>';
                // die();
       
     
         
     }else{$writer = new Xlsx($spreadsheet);
         
         
          $sheet->mergeCells('A3:H3');
          $sheet->setCellValue('A3','No Verified bags found!');
          $sheet->getStyle("A3")->getFont()->setName('Times New Roman');
          $sheet->getStyle("A3")->getFont()->setSize(16);
          $sheet->getStyle('A3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
              
       	
        		
        		  $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
                          $spreadsheet->getActiveSheet()->getProtection()->setSort(true);
                          $spreadsheet->getActiveSheet()->getProtection()->setInsertRows(true);
                          $spreadsheet->getActiveSheet()->getProtection()->setFormatCells(true);
                        
                          $spreadsheet->getActiveSheet()->getProtection()->setPassword('SAMI_LOGX_password');
         
     }
        
    //     	echo 'hi';
	   //  	die();
	   
	   header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      	if(count($sorted_data) > 0){
		header('Content-Disposition: attachment; filename="'.$sorted_data[0]->vendor.'1_'.date('Y-m-d_(H:i:s)').'.xlsx"');
      	}else{
      	    header('Content-Disposition: attachment; filename="'.$res[0]['vendor'].'1_'.date('Y-m-d_(H:i:s)').'.xlsx"');
      	
      	}
      	
      	
		$writer->save("php://output");
        
      die();
//********************************************************************************************************//        
        //AYESHA NEW Work
	
          // Add new sheet
          $spreadsheet = new Spreadsheet();
          $objWorkSheet = $spreadsheet->createSheet(0); //Setting index when creating
          //Write cells
          $cell = "";
          
       
            $writer2 = new Xlsx($spreadsheet);
          
    //           	echo 'hi';
	   //  	die();
                $objWorkSheet->mergeCells('A1:D1');
          $objWorkSheet->setCellValue('A1',$title_strng1);
          $objWorkSheet->getStyle("A1")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("A1")->getFont()->setSize(14);
         $objWorkSheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
         $objWorkSheet->getStyle("A1")->getFont()->getColor()->setARGB('3838414a');
          
      
         
         $objWorkSheet->mergeCells('E1:G1');
          $objWorkSheet->setCellValue('E1','LOGX');
          $objWorkSheet->getStyle("E1")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("E1")->getFont()->setSize(14);
         $objWorkSheet->getStyle('E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
      $objWorkSheet->getStyle("E1")->getFont()->getColor()->setARGB('3838414a');
       
      $objWorkSheet->getStyle("A2:G2")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("A2:G2")->getFont()->setSize(12);
          
          
               		 
    
          $objWorkSheet->getStyle("A2:G2")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $objWorkSheet->getStyle("A2:G2")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                 $objWorkSheet->getStyle("A2:G2")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
       
       	
       
      $spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman');
          $spreadsheet->getDefaultStyle()->getFont()->setSize(10);
          
         
          
        //   error
        // $objWorkSheet->getDefaultStyle()->getFont()->setName('Times New Roman');
        //   $objWorkSheet->getDefaultStyle()->getFont()->setSize(10);
         //   error
         
         
        // 	$sheet->setCellValue('I1', 'LOGX');
        // 	$sheet->getStyle("I1")->getFont()->setSize(10);
          
		$objWorkSheet->setCellValue('A2', 'Sr');
		$objWorkSheet->setCellValue('B2', 'Order ID');
		$objWorkSheet->setCellValue('C2', 'Customer');
		$objWorkSheet->setCellValue('D2', 'Delivery Address');
		$objWorkSheet->setCellValue('E2', 'Bag Received');
		$objWorkSheet->setCellValue('F2', 'Ice Packs');
		$objWorkSheet->setCellValue('G2', 'Delivered Date');
		 
          
		$styleArrayFirstRow = [
            'font' => [
                'bold' => true,
            ],
            ['fill_solid' => 'e3eb8a']
        ];
        $highestColumn = $objWorkSheet->getHighestColumn();
        $objWorkSheet->getStyle('A2:' . $highestColumn . '2' )->applyFromArray($styleArrayFirstRow);
        $objWorkSheet->getStyle('A1:' . $highestColumn . '1' )->applyFromArray($styleArrayFirstRow);

        //$sheet->getStyle('A1:11')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('e3eb8a');

		$objWorkSheet->getStyle('2:2')->getFont()->setBold(true);

		
		foreach(range('A','G') as $columnID) {
		    if($columnID =='D' ){
		        $objWorkSheet->getColumnDimension($columnID)->setWidth(60);
		    }else if($columnID =='H'OR $columnID =='E' OR $columnID =='G' OR $columnID =='C'  ){
		        $objWorkSheet->getColumnDimension($columnID)->setWidth(40);
		    }else if($columnID =='B' OR $columnID =='A'){
		        $objWorkSheet->getColumnDimension($columnID)->setWidth(70);
		    }else{
    			$objWorkSheet->getColumnDimension($columnID)->setWidth(20);
		    }
		} 
           		          
          $siz_of_total1=sizeof($res); 
        //   $cit1=$siz_of_total+1;
        //   $emi1=$cit+1;
      $sheet_index=1;
      $in1=3;
      $num1=1;
       
      $bags_returned_by_clients1=0;
      $icebags_returned_by_clients1=0;
        // echo 'total size is:'.$siz_of_total;
      $rest_of_information1=$siz_of_total1+10;
                $key = 1;
    
      if(count($res) > 0){  //Taha
                foreach($res as $data =>$val) {
                
                $objWorkSheet->setCellValue("A$in1", $num1 );
        		$objWorkSheet->setCellValue("B$in1", $val['order_id']);
        		$objWorkSheet->setCellValue("C$in1", $val['name_on_delivery']." ".$val['number_on_delivery']);
        		$objWorkSheet->getStyle("C$in1")->getAlignment()->setWrapText(true);
        		
        		$objWorkSheet->setCellValue("D$in1", $val['delivery_address']);
        		$objWorkSheet->setCellValue("E$in1", $val['bag_received']);
        		$objWorkSheet->setCellValue("F$in1", $val['ice_bags']);
        		$objWorkSheet->setCellValue("G$in1", $val['delivery_date']);
        
        	//Counting bags returend with clients	
        		$bags_returned_by_clients1 = $bags_returned_by_clients1 + $val['bag_received'];
        		
          //Ice packs returned by clients
              	$icebags_returned_by_clients1 = $icebags_returned_by_clients1 + $val['ice_bags'];
              	
        		 if($val['bag_received'] ==0){
                      		  $objWorkSheet->getStyle("A$in1:G$in1")
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED); 
    
                $objWorkSheet->getStyle("A$in1:G$in1")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $objWorkSheet->getStyle("A$in1:G$in1")
                ->getFill()->getStartColor()->setARGB('FFFFFF00');
        		 }
        		 $in1 +=1;
        		 $num1 +=1;
                }
                
            }else{
        //         $objWorkSheet->setCellValue("A$in1", $num1 );
        // 		$objWorkSheet->setCellValue("B$in1", $val['order_id']);
        // 		$objWorkSheet->setCellValue("C$in1", $val['name_on_delivery']." ".$val['number_on_delivery']);
        // 		$objWorkSheet->getStyle("C$in")->getAlignment()->setWrapText(true);
        		
        // 		$objWorkSheet->setCellValue("D$in1", $val['delivery_address']);
        // 		$objWorkSheet->setCellValue("E$in1", $val['bag_received']);
        // 		$objWorkSheet->setCellValue("F$in1", $val['ice_bags']);
        // 		$objWorkSheet->setCellValue("G$in1", $val['delivery_date']);
        
       
         
          $sheet->mergeCells('A3:G3');
          $sheet->setCellValue('A3','No Detail found!');
          $sheet->getStyle("A3")->getFont()->setName('Times New Roman');
          $sheet->getStyle("A3")->getFont()->setSize(16);
          $sheet->getStyle('A3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            }
            
   
          // Rename sheet
          $objWorkSheet->setTitle("Bags_detail");
          
          $objWorkSheet->getProtection()->setSheet(true);
          $objWorkSheet->getProtection()->setSort(true);
          $objWorkSheet->getProtection()->setInsertRows(true);
          $objWorkSheet->getProtection()->setFormatCells(true);
        
          $objWorkSheet->getProtection()->setPassword('password');
          
          $spreadsheet->addNamedRange(
                new \PhpOffice\PhpSpreadsheet\NamedRange('Bags_detail', $spreadsheet->getSheetByName('Bags_detail'), 'A1:G1') 
            );
          
		// End AYESHA NEW Work
		
      
      if(count($res) > 0){  //Taha
      $objWorkSheet->getStyle("A$rest_of_information1:C$rest_of_information1")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("A$rest_of_information1:C$rest_of_information1")->getFont()->setSize(12);
          
          
               		 
   
          $objWorkSheet->getStyle("A$rest_of_information1:C$rest_of_information1")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                
                $objWorkSheet->getStyle("A$rest_of_information1:C$rest_of_information1")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                	 
                 $objWorkSheet->getStyle("A$rest_of_information1:C$rest_of_information1")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
    
              	$objWorkSheet->setCellValue("A$rest_of_information1", 'Total Deliveries');
        		$objWorkSheet->setCellValue("B$rest_of_information1", 'Total Bags returned by Clients');
        		$objWorkSheet->setCellValue("C$rest_of_information1", 'Total IcePacks returned by Clients');
        		
        		
     
                $rest_of_information_n1=$rest_of_information1+1;
                
                $counter1=$rest_of_information_n1+3;
                
                
        
                
                 $objWorkSheet->mergeCells("A$rest_of_information_n1:A$counter1");
                 $objWorkSheet->setCellValue("A$rest_of_information_n1", $siz_of_total1 );
                 $objWorkSheet->getStyle("A$rest_of_information_n1")->getFont()->setSize(14);
                 $objWorkSheet->getStyle("A$rest_of_information_n1")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("A$rest_of_information_n1")->getFont()->getColor()->setARGB('3838414a');
        
         
                 $objWorkSheet->mergeCells("B$rest_of_information_n1:B$counter1");
        		 $objWorkSheet->setCellValue("B$rest_of_information_n1", $bags_returned_by_clients1);
        		 $objWorkSheet->getStyle("B$rest_of_information_n1")->getFont()->setSize(14);
                 $objWorkSheet->getStyle("B$rest_of_information_n1")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("B$rest_of_information_n1")->getFont()->getColor()->setARGB('3838414a');
                   
                    
                    
                 $objWorkSheet->mergeCells("C$rest_of_information_n1:C$counter1");
        		 $objWorkSheet->setCellValue("C$rest_of_information_n1", $icebags_returned_by_clients1);
        		 $objWorkSheet->getStyle("C$rest_of_information_n1")->getFont()->setSize(14);
        		 $objWorkSheet->getStyle("C$rest_of_information_n1")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("C$rest_of_information_n1")->getFont()->getColor()->setARGB('3838414a');
        
        		
        		$objWorkSheet->getStyle("A$rest_of_information1:C$counter1")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1:C$counter1")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1:C$counter1")->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1:C$counter1")->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
      
      
        //       echo '$siz_of_total1+10:'.$siz_of_total1.'<br>';
        // 		echo '$rest_of_information1:'.$rest_of_information1.'<br>';
        		
        //         echo '$counter1:'.$counter1.'<br>';
                
        //         echo '$rest_of_information_n1:'.$rest_of_information_n1.'<br>';
                
        //         echo '--------------------------------';
                // die();
      
      
    //   For EXTRA BAGS DETAILS
    // echo 'before:'.$rest_of_information1.'<br>';
        //         die();
                 $rest_of_information1x=$counter1+4;
    // echo 'after:'.$rest_of_information1x.'<br>';
    
    // echo 'old counter:'.$counter1.'<br>';
    
            $objWorkSheet->getStyle("A$rest_of_information1x:C$rest_of_information1x")->getFont()->setName('Times New Roman');
          $objWorkSheet->getStyle("A$rest_of_information1x:C$rest_of_information1x")->getFont()->setSize(12);
                
                 
          
               		 
   
          $objWorkSheet->getStyle("A$rest_of_information1x:C$rest_of_information1x")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                
                $objWorkSheet->getStyle("A$rest_of_information1x:C$rest_of_information1x")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                	 
                 $objWorkSheet->getStyle("A$rest_of_information1x:C$rest_of_information1x")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
    
              	$objWorkSheet->setCellValue("A$rest_of_information1x", 'Verified Bags(Bags have delivery track and QR)');
        		$objWorkSheet->setCellValue("B$rest_of_information1x", 'Extra Bags(Bags do not have delivery track/QR/complete verifications)');
        		$objWorkSheet->setCellValue("C$rest_of_information1x", 'Total Bags Received');
        		
        		
     
                $rest_of_information_n1x=$rest_of_information1x+1;
                
                // echo 'inner data cell is:'.$rest_of_information_n1x.'<br>';
                // die();
                $counter1x=$rest_of_information_n1x+3;
            //   echo 'And new counter is:'.$counter1x.'<br>';
                    //  die();
                     // CALCULATION 
                    //  echo '$bags_returned_by_clients: '.$bags_returned_by_clients.'<br>';
                    //  echo 'tot: '.$bags_returned_by_clients1.'<br>';
                    //  die();
                     $verified_bags = $bags_returned_by_clients;
                     
                     $total_bag_recv = $bags_returned_by_clients1;
                     
                     $not_verified_bag = $total_bag_recv - $verified_bags;
       
                
                 $objWorkSheet->mergeCells("A$rest_of_information_n1x:A$counter1x");
                 $objWorkSheet->setCellValue("A$rest_of_information_n1x", $verified_bags );
                 $objWorkSheet->getStyle("A$rest_of_information_n1x")->getFont()->setSize(14);
                 $objWorkSheet->getStyle("A$rest_of_information_n1x")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("A$rest_of_information_n1x")->getFont()->getColor()->setARGB('3838414a');
        
                     
                     
                     
                     
                     
                    
                     
                 $objWorkSheet->mergeCells("B$rest_of_information_n1x:B$counter1x");
        		 $objWorkSheet->setCellValue("B$rest_of_information_n1x",$not_verified_bag);
        		 $objWorkSheet->getStyle("B$rest_of_information_n1x")->getFont()->setSize(14);
                 $objWorkSheet->getStyle("B$rest_of_information_n1x")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("B$rest_of_information_n1x")->getFont()->getColor()->setARGB('3838414a');
         
                 
                   
                 $objWorkSheet->mergeCells("C$rest_of_information_n1x:C$counter1x");
        		 $objWorkSheet->setCellValue("C$rest_of_information_n1x",$total_bag_recv);
        		 $objWorkSheet->getStyle("C$rest_of_information_n1x")->getFont()->setSize(14);
        		 $objWorkSheet->getStyle("C$rest_of_information_n1x")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $objWorkSheet->getStyle("C$rest_of_information_n1x")->getFont()->getColor()->setARGB('3838414a');
        
        	
        		$objWorkSheet->getStyle("A$rest_of_information1x:C$counter1x")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1x:C$counter1x")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1x:C$counter1x")->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $objWorkSheet->getStyle("A$rest_of_information1x:C$counter1x")->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                   
    	   //     echo '$rest_of_information1:'.$rest_of_information1.'<br>';
        // 		echo '$rest_of_information1x:'.$rest_of_information1x.'<br>';
        		
        //         echo '$counter1x:'.$counter1x.'<br>';
                
        //         echo '$rest_of_information_n1x:'.$rest_of_information_n1x.'<br>';
                
        //         echo 'verified_bags:'.$verified_bags.'<br>';
        //         echo '$not_verified_bag:'.$not_verified_bag.'<br>';
        //         echo '$total_bag_recv:'.$total_bag_recv.'<br>';
        //         die();
    
    // END EXTRA BAG DETAIL
    //   echo 'hi';
    //       die();
    
      }
       
       
      //************************************************************************************//
    
      	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      	if(count($sorted_data) > 0){
		header('Content-Disposition: attachment; filename="'.$sorted_data[0]->vendor.'2_'.date('Y-m-d_(H:i:s)').'.xlsx"');
      	}else{
      	    header('Content-Disposition: attachment; filename="'.$res[0]['vendor'].'2_'.date('Y-m-d_(H:i:s)').'.xlsx"');
      	
      	}
      	
      	
		$writer->save("php://output");
		$writer2->save("php://output");
		
		redirect('vendor_deliveries_complete_report');
// 		echo json_encode($response);
	// END OF MAIN IF	
  }else{
       
      $this->session->set_flashdata('error', 'No Record Found, Try Again!');
              redirect('vendor_deliveries_complete_report');
       
      } 
   
}

 public function send_mail($result)
	{
	    
		$email_data = $result;
		$config = Array(
			'protocol' => 'smtp',
			'smtp_port' => 465,
			'smtp_user' => 'admin@thelogx.com',
			'mailtype' => 'html',
			'charset' => 'utf-8'
		);
		$this->load->library('email');
		$this->email->set_newline("\r\n");
		$htmlContent = '<h4><p style="text-transform: uppercase;">DEAR ' . $email_data[0]->vendor .',</p> </h4>It is to inform you about report. Kindly find and attachment. <br/><br/><br/><pre>Regards,
TEAM L O G X</pre><br/>';
//  		$this->email->to($email_data[0]->vendor_email);
        $this->email->to('ayesha.attique.work@gmail.com');
		$this->email->from('admin@thelogx.com', 'LOGX');
		$this->email->subject('Report');
		$this->email->message($htmlContent);
		$this->email->set_mailtype("html");
// 		 $this->email->attach($file_data['full_path']);
		$email=$this->email->send();
		//sending sms to agent
// 		$this->load->library('twilio');
// 		$from="+14154292457";
// 		$to=$email_data[0]->phone;
// 		$body = $email_data[0]->name . ' Welcome to PremiumBlinds Team!You have been registered to Premium blinds portal with following details. EMAIL: '.$email_data[0]->email.'Password: '.$email_data[0]->password;
// 		try{
// 			//$this->twilio->sms($from,$to,$body);
// 	        if($email){
// 	            echo "Mail sent successfully";
// 	        }
// 		}catch (Exception $e){
//                 echo "Mail  not sent";
// 		}
	}




// New Module TA 25-April-2021 Start

	function excel_customer()
	{
	    $this->load->model('driver_model');
	    
		$areas = $this->order_model->get_areas();
		$areas = array_column($areas, 'area_name');
		
	//	array_push($areas, 'Other');

 		//$types =  $this->order_model->get_deliveries_type();
 $data['old_emirites_typ'] = $this->order_model->get_emirate_with_TimeSlots();
  $data['emirites_typ']=$this->driver_model->get_combinations($data['old_emirites_typ']);
  

   
		$types = array_values($data['emirites_typ']);
//		$types = array_column($types,'name');
		
// 			echo '<br>i am after array col<pre>';
//       print_r($types);

	
// 	echo "<pre>";
// 	print_r($types);
// 	echo "<pre>";
// 	die();
  
//   	echo '<br>My<pre>';
//       print_r($xp);
//       die();
//$types=$data['emirites_typ'];
    //  $newtypes=$xp;
//   $types=$xp;
// 		 echo '<br>i am New types<pre>';
//           print_r($newtypes);
// 		 echo '<br>i am array column types<pre>';
//             print_r($types);
//             die();
		//print_r($types);
 		$alerts = 'Yes,No';
// 		echo"<pre>";
// 		print_r($types);
// 		echo"<pre>";
		
// 			echo"<pre>";
// 		print_r($type);
// 		echo"<pre>";
// 		die();

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'Phone');
		$sheet->setCellValue('B1', 'Full Name');
		$sheet->setCellValue('C1', 'Email (Optional)');
		$sheet->setCellValue('D1', 'Address');
		$sheet->setCellValue('E1', 'Google Link Address (Optional)');
		$sheet->setCellValue('F1', 'Area with Emirate(Select Option)');
		$sheet->setCellValue('G1', 'Pickup Point (Optional)');
		$sheet->setCellValue('H1', 'Emirate With Time(Select Option)');
		$sheet->setCellValue('I1', 'Notes');
		$sheet->setCellValue('J1', 'Notification(Select Option)');
		$sheet->setCellValue('K1', 'Product Type(Optional)');
	    $sheet->setCellValue('L1', 'CustomerID (Optional)');
	
		

		$styleArrayFirstRow = [
            'font' => [
                'bold' => true,
            ],
            ['fill_solid' => 'e3eb8a']
        ];
        $highestColumn = $sheet->getHighestColumn();
        $sheet->getStyle('A1:' . $highestColumn . '1' )->applyFromArray($styleArrayFirstRow);

        //$sheet->getStyle('A1:11')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('e3eb8a');

		$sheet->getStyle('1:1')->getFont()->setBold(true);
		//$sheet->getColumnDimension('D')->setWidth(25);

		foreach(range('A','C') as $columnID) {
    			$sheet->getColumnDimension($columnID)->setWidth(20);
		} 
		
		foreach(range('D','H') as $columnID) {
    			$sheet->getColumnDimension($columnID)->setWidth(40);
		} 
		
		foreach(range('I','L') as $columnID) {
    			$sheet->getColumnDimension($columnID)->setWidth(25);
		} 
		
		
		
		//Najam Work
		
          // Add new sheet
          $objWorkSheet = $spreadsheet->createSheet(1); //Setting index when creating
          //Write cells
          $cell = "";
            if(count($areas)) {
                $key = 1;
                foreach($areas as $area) {
                    $cell = 'A'.$key;
                   $objWorkSheet->setCellValue($cell, $area);
                   $key++;
                }
            }
          // Rename sheet
          $objWorkSheet->setTitle("cities");
          
          $objWorkSheet->getProtection()->setSheet(true);
          $objWorkSheet->getProtection()->setSort(true);
          $objWorkSheet->getProtection()->setInsertRows(true);
          $objWorkSheet->getProtection()->setFormatCells(true);
        
          $objWorkSheet->getProtection()->setPassword('password');
     
    //  Coco Test
         // $objWorkSheet->setAutoFilter('A1:A400');
          
          $spreadsheet->addNamedRange(
                new \PhpOffice\PhpSpreadsheet\NamedRange('city', $spreadsheet->getSheetByName('cities'), 'A1:'.$cell) 
            );
          
		// End Najam Work
		$writer = new Xlsx($spreadsheet);
		
			//Ayesha Work
		
          // Add new sheet
          $objWorkSheet2 = $spreadsheet->createSheet(2); //Setting index when creating
          //Write cells
          $cell = "";
            if(count($types)) {
                $key = 1;
                foreach($types as $type) {
                    $cell = 'A'.$key;
                   $objWorkSheet2->setCellValue($cell, $type);
                   $key++;
                }
            }
          // Rename sheet
          $objWorkSheet2->setTitle("emirates");
          
          $objWorkSheet2->getProtection()->setSheet(true);
          $objWorkSheet2->getProtection()->setSort(true);
          $objWorkSheet2->getProtection()->setInsertRows(true);
          $objWorkSheet2->getProtection()->setFormatCells(true);
        
          $objWorkSheet2->getProtection()->setPassword('password');
          
          $spreadsheet->addNamedRange(
                new \PhpOffice\PhpSpreadsheet\NamedRange('emirates', $spreadsheet->getSheetByName('emirates'), 'A1:'.$cell) 
            );
          
		// End Ayesha Work

		$writer = new Xlsx($spreadsheet);

		//area validation
		
		
		
		$validation = $sheet->getCell('F2')->getDataValidation();
		$validation->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST );
	
		$validation->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION );
		$validation->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP);
		$validation->setAllowBlank(false);
		$validation->setShowInputMessage(true);
		$validation->setShowErrorMessage(true);
		$validation->setShowDropDown(true);
		$validation->setErrorTitle('Input error');
		$validation->setError('Area is not in list.');
		$validation->setPromptTitle('Pick from list');
		$validation->setPrompt('Please pick a area from the drop-down list.');
		$validation->setFormula1('=city');
// 			$validation->setFormula2('=not(isna(match(D2, A1:A400, 0)))');
// 		$validation->setFormula1('=OFFSET(city,,,,,COUNTIF($A$1:$A$100,"?*"))');
    //   $validation->setFormula1('=city!$A$1:$A$400');

		//emirates validation 
                                  // 		$objvalidation->setFormula1('ExampleSheet!A1:A100');
		$validation1 = $sheet->getCell('H2')->getDataValidation();
		$validation1->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST );
		$validation1->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION );
		$validation1->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP);
		$validation1->setAllowBlank(false);
		$validation1->setShowInputMessage(true);
		$validation1->setShowErrorMessage(true);
		$validation1->setShowDropDown(true);
		$validation1->setErrorTitle('Input error');
		$validation1->setError('Value is not in list.');
		$validation1->setPromptTitle('Pick from list');
		$validation1->setPrompt('Please pick a value from the drop-down list.');
	   //	$validation1->setFormula1('"'.utf8_encode(implode(',', $types)).'"');
	   	$validation1->setFormula1('=emirates');
	   	
	   	
	   	
	   
	   	
	   	
	   	

		//notification validation
		$validation2 = $sheet->getCell('J2')->getDataValidation();
		$validation2->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST );
		$validation2->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION );
		$validation2->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP);
		$validation2->setAllowBlank(false);
		$validation2->setShowInputMessage(true);
		$validation2->setShowErrorMessage(true);
		$validation2->setShowDropDown(true);
		$validation2->setErrorTitle('Input error');
		$validation2->setError('Value is not in list.');
		$validation2->setPromptTitle('Pick from list');
		$validation2->setPrompt('Please pick a value from the drop-down list.');
		$validation2->setFormula1('"'.$alerts.'"');
		
		
// 		Validate email =ISNUMBER(MATCH("*@*.?*",A2,0))

        $validation_email = $sheet->getCell('C2')->getDataValidation();
		$validation_email->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_CUSTOM );
		$validation_email->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP );
		$validation_email->setAllowBlank(true);
		$validation_email->setShowInputMessage(true);
		$validation_email->setShowErrorMessage(true);
	
		$validation_email->setErrorTitle('Input error');
		$validation_email->setError('Wrong Email Address');
		$validation_email->setPromptTitle('Enter Email');
		$validation_email->setPrompt('Enter Email Address');
		$validation_email->setFormula1('=ISNUMBER(MATCH("*@*.?*",C2,0))');
// 		$validation_email->setFormula1('=AND(FIND("@",A2),FIND(".",A2),ISERROR(FIND(" ",A2)))');

		
	
	
// 	HOLD {	
		//  Company Ammount
	
		$validation3 = $sheet->getCell('L2')->getDataValidation();
        $validation3->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_CUSTOM ); //'or whole'

           //This Line 
        $validation3->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION );
        $validation3->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP);
      
      $validation3->setAllowBlank(true);
      $validation3->setShowInputMessage(true);
      $validation3->setShowErrorMessage(true);
    //   $validation3->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP ); //'stop'
      $validation3->setErrorTitle('Error!');
      $validation3->setError('Kindly do not use special characters.');
      $validation3->setPromptTitle('Enter Customer ID e.g PU-123,123,Logx_1122');
      $validation3->setPrompt('If you did not enter code system will generate auto code for you after file upload.');
      $validation3->setFormula1('=ISNUMBER(SUMPRODUCT(SEARCH(MID(L2,ROW(INDIRECT("1:"&LEN(L2))),1),"-_0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ")))');
    //   $validation3->setFormula2(999999);
    
    //   $validation3->getStyle('L2')->getNumberFormat()->setFormatCode('#');


//  HOLD }


		for($in = 2; $in < 4; $in++){
		$sheet->setCellValue("A$in", '971-32736722');
		$sheet->setCellValue("B$in", 'John Doe');
		$sheet->setCellValue("C$in", 'John@gmail.com');
		$sheet->setCellValue("D$in", 'St#2 B Block');
		$sheet->setCellValue("E$in", 'https://www.google.com');
		$sheet->setCellValue("F$in", !empty($areas[0]) ? $areas[0] : '');
		$sheet->setCellValue("G$in", 'Office Location');
		$sheet->setCellValue("H$in", !empty($types[0]) ? $types[0] : '');
		$sheet->setCellValue("I$in", 'Lorem Ipsum Notes');
		$sheet->setCellValue("J$in", 'No');
		$sheet->setCellValue("K$in", 'Food/Liquid');
		$sheet->setCellValue("L$in", '11');
		
	   }

		for($c = 3; $c <= 300; $c++){

			$sheet->getCell("F$c")->setDataValidation(clone $validation);
			$sheet->getCell("H$c")->setDataValidation(clone $validation1);
			$sheet->getCell("J$c")->setDataValidation(clone $validation2);
			$sheet->getCell("L$c")->setDataValidation(clone $validation3);
			$sheet->getCell("C$c")->setDataValidation(clone $validation_email);
			
		}

		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="sample_customers_'.date('Y-m-d_(H:i:s)').'.xlsx"');
		$writer->save("php://output"); 
		

		//$writer->save('Sample Deliveries.xlsx');
	}
	
	
	
	function predelivery_report(){
        //   echo 'hi';
        //   die();
             
          $this->load->model('MonthlyMeals_model');
         $response = array('success' => false);
         
       
        $start_date = @$_POST['from'];
        $end_date = @$_POST['to'];
        $vendor_id = @$_POST['vendor_list'];
        $status=0;
        
        // echo '$start_date='.$start_date.'<br>';
        // echo '$end_date='.$end_date.'<br>';
        // echo '$vendor_id='.$vendor_id.'<br>';
        // die();

        if(!$start_date){
            $start_date = date('Y-m-d h:i:s', strtotime($start_date));
        }

        if(!$end_date){
            $end_date = date('Y-m-d h:i:s');
        }
        
        
        
        
        if(($vendor_id) AND ($start_date) AND ($end_date)){
                  if(strtolower($this->session->userdata('role')) != 'vendor'){
                  
                  if($vendor_id){
                        //   $where = "o.is_neutral=1 and o.str_keep_varification ='yes' and o.driver_id > 0 and  v.status='".$status."' and (o.status='Collected') and o.cooling_bag_check !=3 and o.vendor_id='".$vendor_id."' and o.varified_at BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
                          $where=" o.plan_id !=0 AND (o.status='Assign' OR o.status='Not Assign' OR o.status='Cancel') AND o.vendor_id='".$vendor_id."'  AND o.delivery_date  BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59' AND o.action !='Freezed' ";
                
                  }
                }else{
                    // $where = "o.is_neutral=1 and o.str_keep_varification ='yes' and o.driver_id > 0 and v.status='".$status."' and (o.status='Collected') and o.cooling_bag_check !=3  and o.vendor_id='".$vendor_id."' and o.varified_at BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
                 }
                
                //  $report_data = $data['result'] =  $this->order_model->get_tracking_statistics_details($vendor_id,$start_date,$end_date,$where);
                 $Deliveries = $this->MonthlyMeals_model->get_all_upcoming_pre_deliveries_forXL($where);
            
        }
                
                
                
       
       
        if($Deliveries){
            $response['success'] = true;
            $response['report_data'] = $Deliveries;
        }
        
        
       
        
        // echo '<pre>';
        // print_r($response);
        // echo '<br>';
        // die();
        
        
        
        
        
        
        
        // START XLS HERE 
 
//   echo '$bag_data :'.$bag_data[0]->vendor;
//   die();
   if(count($Deliveries) > 0){
     
         $last=0;
         $yrdata= strtotime($start_date);
    
         $set_strt_dt=date('d M Y', $yrdata);
         
         $yrdata= strtotime($end_date);
          $set_end_dt=date('d M Y', $yrdata);
         
        //  echo '$set_strt_dt:'.$set_strt_dt.'-';
        //  echo '$set_end_dt:'.$set_end_dt;
         
        
             $title_strng=$Deliveries[0]->vendor.' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Deliveries Confirmation Report';
             $main_title=$Deliveries[0]->vendor;
         
        
       
        //  echo '<br> $title_strng:<br>'.$title_strng;
        //  die();
        
        
            
       
         	$spreadsheet = new Spreadsheet();
		    $sheet = $spreadsheet->getActiveSheet();
		
		$spreadsheet->getProperties()
    ->setCreator("LOGX TEAM")
    ->setLastModifiedBy("LOGX TEAM")
    ->setTitle('Deliveries Confirmation Report')
    ->setSubject($title_strng)
    ->setDescription(
      $title_strng
    )
    ->setKeywords("Logx Team")
    ->setCategory("LOGX Deliveries Confirmation Report");
	$sheet->setTitle('Deliveries Confirmation Report');
		
    // 	$sheet->getDefaultStyle()->getFont()->setName('Times New Roman');
        
       
        
       
         $sheet->mergeCells('C1:H1');
          $sheet->setCellValue('C1',$title_strng);
           $sheet->getStyle("C1")->getFont()->setName('Arial');
          $sheet->getStyle("C1")->getFont()->setSize(14);
         $sheet->getStyle('C1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
         $spreadsheet->getActiveSheet()->getStyle("C1")->getFont()->getColor()->setARGB('3838414a');
         
         $sheet->mergeCells('I1:J1');
          $sheet->setCellValue('I1','LOGX');
          $sheet->getStyle("I1")->getFont()->setName('Arial');
          $sheet->getStyle("I1")->getFont()->setSize(14);
         $sheet->getStyle('I1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
      $spreadsheet->getActiveSheet()->getStyle("I1")->getFont()->getColor()->setARGB('3838414a');
       
       $sheet->getStyle("A2:J2")->getFont()->setName('Arial');
          $sheet->getStyle("A2:J2")->getFont()->setSize(12);
          
          
               		 
    
           $spreadsheet->getActiveSheet()->getStyle("A2:J2")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $spreadsheet->getActiveSheet()->getStyle("A2:J2")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                 $spreadsheet->getActiveSheet()->getStyle("A2:J2")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
       
       
       
        $spreadsheet->getDefaultStyle()->getFont()->setName('Arial');
          $spreadsheet->getDefaultStyle()->getFont()->setSize(10);
       
        // 	$sheet->setCellValue('I1', 'LOGX');
        // 	$sheet->getStyle("I1")->getFont()->setSize(10);
          	
		$sheet->setCellValue('A2', 'Sr');
		$sheet->setCellValue('B2', 'Order ID');
		$sheet->setCellValue('C2', 'Plan ID');
		$sheet->setCellValue('D2', 'Customer ID');
		$sheet->setCellValue('E2', 'Customer');
		$sheet->setCellValue('F2', 'Status');
		$sheet->setCellValue('G2', 'Delivery Address');
		$sheet->setCellValue('H2', 'Delivery Date');
		$sheet->setCellValue('I2', 'TimeSlot');
		$sheet->setCellValue('J2', 'Note');
	

		$styleArrayFirstRow = [
            'font' => [
                'bold' => true,
            ],
            ['fill_solid' => 'e3eb8a']
        ];
        $highestColumn = $sheet->getHighestColumn();
        $sheet->getStyle('A2:' . $highestColumn . '2' )->applyFromArray($styleArrayFirstRow);
        $sheet->getStyle('A1:' . $highestColumn . '1' )->applyFromArray($styleArrayFirstRow);

        //$sheet->getStyle('A1:11')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('e3eb8a');

		$sheet->getStyle('2:2')->getFont()->setBold(true);
		
		
		foreach(range('A','J') as $columnID) {
		    if($columnID =='A' OR $columnID =='C' ){
		        $sheet->getColumnDimension($columnID)->setWidth(10);
		    }else if($columnID =='G'){
		        $sheet->getColumnDimension($columnID)->setWidth(60);
		    }else if($columnID =='I'){
		        $sheet->getColumnDimension($columnID)->setWidth(30);
		    }else{
    			$sheet->getColumnDimension($columnID)->setWidth(20);
		    }
		} 
           
           $siz_of_total=sizeof($Deliveries); 
           $rest_of_information=$siz_of_total+12;
           $cancel=0;
       $sheet_index=1;
       $in=3;
       $num=1;
       
       
      
    
    
    
    
    
   
     if(count($Deliveries) > 0){  //Taha
      foreach($Deliveries as $data =>$val){
 

                
                		$writer = new Xlsx($spreadsheet);

                        
                        		//notification validation
                        // 		$validation2 = $sheet->getCell('H2')->getDataValidation();
                        // 		$validation2->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST );
                        // 		$validation2->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION );
                        // 		$validation2->setAllowBlank(false);
                        // 		$validation2->setShowInputMessage(true);
                        // 		$validation2->setShowErrorMessage(true);
                        // 		$validation2->setShowDropDown(true);
                        // 		$validation2->setErrorTitle('Input error');
                        // 		$validation2->setError('Value is not in list.');
                        // 		$validation2->setPromptTitle('Pick from list');
                        // 		$validation2->setPrompt('Please pick a value from the drop-down list.');
                        // 		$validation2->setFormula1('"'.$alerts.'"');

                //END VALIDATIONS //
               
               
                $sheet->setCellValue("A$in", $num );
        		$sheet->setCellValue("B$in", $val->order_id);
        		$sheet->setCellValue("C$in", $val->plan_id);
        		$sheet->setCellValue("D$in", $val->pcustomer_id);
        		$sheet->setCellValue("E$in", $val->name_on_delivery." ".$val->number_on_delivery);
        		$sheet->getStyle("E$in")->getAlignment()->setWrapText(true);
        		
        			 if($val->is_cancelled =='yes' OR $val->status=='Cancel'){
                       		  $spreadsheet->getActiveSheet()->getStyle("A$in:J$in")
                                   ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED); 
    
                      $spreadsheet->getActiveSheet()->getStyle("A$in:J$in")
                      ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                      $spreadsheet->getActiveSheet()->getStyle("A$in:J$in")
                      ->getFill()->getStartColor()->setARGB('FFFFFF00');
                                                                
                           
                       $sheet->setCellValue("F$in",'Canceled( This delivery is canceled.)');
                       
                       $cancel +=1;
        		             }else{  
        		                 
        		                 if($val->status=='Assign'){
        		                     $sheet->setCellValue("F$in", 'Assigned');
        		                 }else if($val->status=='Not Assign'){
        		                     $sheet->setCellValue("F$in", 'Not Assigned');
        		                 }else{
        		                     $sheet->setCellValue("F$in", $val->status);
        		                 }
        		                 
        		             }
        		
        		
        		
        		
        		$sheet->setCellValue("G$in", $val->delivery_address);
        		$sheet->setCellValue("H$in", $val->delivery_date);
        		$sheet->setCellValue("I$in", $val->delivery_time);
        		$sheet->setCellValue("J$in", $val->note);
        	
       
        		
        	
        	
        		
       
              	
        	
        		 $in +=1;
        		 $num +=1;
        }
     
        
        
       
       $sheet->getStyle("E$rest_of_information:G$rest_of_information")->getFont()->setName('Arial');
          $sheet->getStyle("E$rest_of_information:G$rest_of_information")->getFont()->setSize(12);
          
          
               		 
    
           $spreadsheet->getActiveSheet()->getStyle("E$rest_of_information:G$rest_of_information")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $spreadsheet->getActiveSheet()->getStyle("E$rest_of_information:G$rest_of_information")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                 $spreadsheet->getActiveSheet()->getStyle("E$rest_of_information:G$rest_of_information")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
    
              	$sheet->setCellValue("E$rest_of_information", 'Total Deliveries');
        		$sheet->setCellValue("F$rest_of_information", 'Total Canceled');
        		$sheet->setCellValue("G$rest_of_information", 'Confirmed Deliveries');
        		
        		
        
     
                $rest_of_information_n=$rest_of_information+1;
                
                $counter=$rest_of_information_n+3;
                
                 $sheet->mergeCells("E$rest_of_information_n:E$counter");
                 $sheet->setCellValue("E$rest_of_information_n", $siz_of_total );
                 $sheet->getStyle("E$rest_of_information_n")->getFont()->setSize(14);
                 $sheet->getStyle("E$rest_of_information_n")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $spreadsheet->getActiveSheet()->getStyle("E$rest_of_information_n")->getFont()->getColor()->setARGB('3838414a');
         
         
                 $sheet->mergeCells("F$rest_of_information_n:F$counter");
        		 $sheet->setCellValue("F$rest_of_information_n", $cancel);
        		 $sheet->getStyle("F$rest_of_information_n")->getFont()->setSize(14);
                 $sheet->getStyle("F$rest_of_information_n")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $spreadsheet->getActiveSheet()->getStyle("F$rest_of_information_n")->getFont()->getColor()->setARGB('3838414a');
         
                 $sheet->mergeCells("G$rest_of_information_n:G$counter");
        		 $sheet->setCellValue("G$rest_of_information_n", $siz_of_total-$cancel);
        		 $sheet->getStyle("G$rest_of_information_n")->getFont()->setSize(14);
        		 $sheet->getStyle("G$rest_of_information_n")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $spreadsheet->getActiveSheet()->getStyle("G$rest_of_information_n")->getFont()->getColor()->setARGB('3838414a');
        
        		
        		$spreadsheet->getActiveSheet()->getStyle("E$rest_of_information:G$counter")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("E$rest_of_information:G$counter")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("E$rest_of_information:G$counter")->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("E$rest_of_information:G$counter")->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
      
       //Taha
      		 
      
    //   sami bhae
                        //   $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
                        //   $spreadsheet->getActiveSheet()->getProtection()->setSort(true);
                        //   $spreadsheet->getActiveSheet()->getProtection()->setInsertRows(true);
                        //   $spreadsheet->getActiveSheet()->getProtection()->setFormatCells(true);
                        
                        //   $spreadsheet->getActiveSheet()->getProtection()->setPassword('SAMI_LOGX_password');
                        
                        
                        // sami bhae end
               
                // echo '$siz_of_total:'.$siz_of_total.'<br>';
                // echo '$bags_returned_by_clients:'.$bags_returned_by_clients.'<br>';
                // echo '$icebags_returned_by_clients:'.$icebags_returned_by_clients.'<br>';
                // die();
       
     }else{
          
         $this->session->set_flashdata('error', 'No Record Found, Try Again!');
              redirect('monthlyMeal/VendorPreDeliveriesReport');
     }
        
        
      	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      
      	    header('Content-Disposition: attachment; filename="'.$Deliveries[0]->vendor.'ConfirmationReport_'.date('Y-m-d_(H:i:s)').'.xlsx"');
      	    
      	                                                      
     
      
		$writer->save("php://output");
		 
        
		redirect('monthlyMeal/VendorPreDeliveriesReport');
// 		echo json_encode($response);
	// END OF MAIN IF	
   }else{
       
       $this->session->set_flashdata('error', 'No Record Found, Try Again!');
              redirect('monthlyMeal/VendorPreDeliveriesReport');
       
       } 
   
}

    function predelivery_ALLreport(){
        //   echo 'hi';
        //   die();
             
          $this->load->model('MonthlyMeals_model');
         $response = array('success' => false);
         
       
        $start_date = @$_POST['from'];
        $end_date = @$_POST['to'];
        $vendor_id = @$_POST['vendor_list'];
        $status=0;
        
        // echo '$start_date='.$start_date.'<br>';
        // echo '$end_date='.$end_date.'<br>';
        // echo '$vendor_id='.$vendor_id.'<br>';
        // die();

        if(!$start_date){
            $start_date = date('Y-m-d h:i:s', strtotime($start_date));
        }

        if(!$end_date){
            $end_date = date('Y-m-d h:i:s');
        }
        
        
        
        
        if(($vendor_id) AND ($start_date) AND ($end_date)){
                  if(strtolower($this->session->userdata('role')) != 'vendor'){
                  
                  if($vendor_id){
                        //   $where = "o.is_neutral=1 and o.str_keep_varification ='yes' and o.driver_id > 0 and  v.status='".$status."' and (o.status='Collected') and o.cooling_bag_check !=3 and o.vendor_id='".$vendor_id."' and o.varified_at BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
                        //   o.plan_id !=0 AND 
                          $where=" ( o.status='Assign' OR o.status='Not Assign' OR o.status='Cancel') AND o.vendor_id='".$vendor_id."'  AND o.delivery_date  BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59' AND o.action !='Freezed' ";
                
                  }
                }else{
                    // $where = "o.is_neutral=1 and o.str_keep_varification ='yes' and o.driver_id > 0 and v.status='".$status."' and (o.status='Collected') and o.cooling_bag_check !=3  and o.vendor_id='".$vendor_id."' and o.varified_at BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
                 }
                
                //  $report_data = $data['result'] =  $this->order_model->get_tracking_statistics_details($vendor_id,$start_date,$end_date,$where);
                 $Deliveries = $this->MonthlyMeals_model->get_all_upcoming_pre_deliveries_forXL($where);
            
        }
                
                
                
       
       
        if($Deliveries){
            $response['success'] = true;
            $response['report_data'] = $Deliveries;
        }
        
        
       
        
        // echo '<pre>';
        // print_r($response);
        // echo '<br>';
        // die();
        
        
        
        
        
        
        
        // START XLS HERE 
 
//   echo '$bag_data :'.$bag_data[0]->vendor;
//   die();
   if(count($Deliveries) > 0){
     
         $last=0;
         $yrdata= strtotime($start_date);
    
         $set_strt_dt=date('d M Y', $yrdata);
         
         $yrdata= strtotime($end_date);
          $set_end_dt=date('d M Y', $yrdata);
         
        //  echo '$set_strt_dt:'.$set_strt_dt.'-';
        //  echo '$set_end_dt:'.$set_end_dt;
         
        
             $title_strng=$Deliveries[0]->vendor.' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Deliveries Confirmation Report';
             $main_title=$Deliveries[0]->vendor;
         
        
       
        //  echo '<br> $title_strng:<br>'.$title_strng;
        //  die();
        
        
            
       
         	$spreadsheet = new Spreadsheet();
		    $sheet = $spreadsheet->getActiveSheet();
		
		$spreadsheet->getProperties()
    ->setCreator("LOGX TEAM")
    ->setLastModifiedBy("LOGX TEAM")
    ->setTitle('Deliveries Confirmation Report')
    ->setSubject($title_strng)
    ->setDescription(
      $title_strng
    )
    ->setKeywords("Logx Team")
    ->setCategory("LOGX Deliveries Confirmation Report");
	$sheet->setTitle('Deliveries Confirmation Report');
		
    // 	$sheet->getDefaultStyle()->getFont()->setName('Times New Roman');
        
       
        
       
         $sheet->mergeCells('C1:H1');
          $sheet->setCellValue('C1',$title_strng);
           $sheet->getStyle("C1")->getFont()->setName('Arial');
          $sheet->getStyle("C1")->getFont()->setSize(14);
         $sheet->getStyle('C1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
         $spreadsheet->getActiveSheet()->getStyle("C1")->getFont()->getColor()->setARGB('3838414a');
         
         $sheet->mergeCells('I1:J1');
          $sheet->setCellValue('I1','LOGX');
          $sheet->getStyle("I1")->getFont()->setName('Arial');
          $sheet->getStyle("I1")->getFont()->setSize(14);
         $sheet->getStyle('I1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
      $spreadsheet->getActiveSheet()->getStyle("I1")->getFont()->getColor()->setARGB('3838414a');
       
       $sheet->getStyle("A2:J2")->getFont()->setName('Arial');
          $sheet->getStyle("A2:J2")->getFont()->setSize(12);
          
          
               		 
    
           $spreadsheet->getActiveSheet()->getStyle("A2:J2")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $spreadsheet->getActiveSheet()->getStyle("A2:J2")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                 $spreadsheet->getActiveSheet()->getStyle("A2:J2")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
       
       
       
        $spreadsheet->getDefaultStyle()->getFont()->setName('Arial');
          $spreadsheet->getDefaultStyle()->getFont()->setSize(10);
       
        // 	$sheet->setCellValue('I1', 'LOGX');
        // 	$sheet->getStyle("I1")->getFont()->setSize(10);
          	
		$sheet->setCellValue('A2', 'Sr');
		$sheet->setCellValue('B2', 'Order ID');
		$sheet->setCellValue('C2', 'Plan ID');
		$sheet->setCellValue('D2', 'Customer ID');
		$sheet->setCellValue('E2', 'Customer');
		$sheet->setCellValue('F2', 'Status');
		$sheet->setCellValue('G2', 'Delivery Address');
		$sheet->setCellValue('H2', 'Delivery Date');
		$sheet->setCellValue('I2', 'TimeSlot');
		$sheet->setCellValue('J2', 'Note');
	

		$styleArrayFirstRow = [
            'font' => [
                'bold' => true,
            ],
            ['fill_solid' => 'e3eb8a']
        ];
        $highestColumn = $sheet->getHighestColumn();
        $sheet->getStyle('A2:' . $highestColumn . '2' )->applyFromArray($styleArrayFirstRow);
        $sheet->getStyle('A1:' . $highestColumn . '1' )->applyFromArray($styleArrayFirstRow);

        //$sheet->getStyle('A1:11')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('e3eb8a');

		$sheet->getStyle('2:2')->getFont()->setBold(true);
		
		
		foreach(range('A','J') as $columnID) {
		    if($columnID =='A' OR $columnID =='C' ){
		        $sheet->getColumnDimension($columnID)->setWidth(10);
		    }else if($columnID =='G'){
		        $sheet->getColumnDimension($columnID)->setWidth(60);
		    }else if($columnID =='I'){
		        $sheet->getColumnDimension($columnID)->setWidth(30);
		    }else{
    			$sheet->getColumnDimension($columnID)->setWidth(20);
		    }
		} 
           
           $siz_of_total=sizeof($Deliveries); 
           $rest_of_information=$siz_of_total+12;
           $cancel=0;
       $sheet_index=1;
       $in=3;
       $num=1;
       
       
      
    
    
    
    
    
   
     if(count($Deliveries) > 0){  //Taha
      foreach($Deliveries as $data =>$val){
 

                
                		$writer = new Xlsx($spreadsheet);

                        
                        		//notification validation
                        // 		$validation2 = $sheet->getCell('H2')->getDataValidation();
                        // 		$validation2->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST );
                        // 		$validation2->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION );
                        // 		$validation2->setAllowBlank(false);
                        // 		$validation2->setShowInputMessage(true);
                        // 		$validation2->setShowErrorMessage(true);
                        // 		$validation2->setShowDropDown(true);
                        // 		$validation2->setErrorTitle('Input error');
                        // 		$validation2->setError('Value is not in list.');
                        // 		$validation2->setPromptTitle('Pick from list');
                        // 		$validation2->setPrompt('Please pick a value from the drop-down list.');
                        // 		$validation2->setFormula1('"'.$alerts.'"');

                //END VALIDATIONS //
               
               
                $sheet->setCellValue("A$in", $num );
        		$sheet->setCellValue("B$in", $val->order_id);
        		$sheet->setCellValue("C$in", $val->plan_id);
        		$sheet->setCellValue("D$in", $val->pcustomer_id);
        		$sheet->setCellValue("E$in", $val->name_on_delivery." ".$val->number_on_delivery);
        		$sheet->getStyle("E$in")->getAlignment()->setWrapText(true);
        		
        			 if($val->is_cancelled =='yes' OR $val->status=='Cancel'){
                       		  $spreadsheet->getActiveSheet()->getStyle("A$in:J$in")
                                   ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED); 
    
                      $spreadsheet->getActiveSheet()->getStyle("A$in:J$in")
                      ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                      $spreadsheet->getActiveSheet()->getStyle("A$in:J$in")
                      ->getFill()->getStartColor()->setARGB('FFFFFF00');
                                                                
                           
                       $sheet->setCellValue("F$in",'Canceled( This delivery is canceled.)');
                       
                       $cancel +=1;
        		             }else{  
        		                 
        		                 if($val->status=='Assign'){
        		                     $sheet->setCellValue("F$in", 'Assigned');
        		                 }else if($val->status=='Not Assign'){
        		                     $sheet->setCellValue("F$in", 'Not Assigned');
        		                 }else{
        		                     $sheet->setCellValue("F$in", $val->status);
        		                 }
        		                 
        		             }
        		
        		
        		
        		
        		$sheet->setCellValue("G$in", $val->delivery_address);
        		$sheet->setCellValue("H$in", $val->delivery_date);
        		$sheet->setCellValue("I$in", $val->delivery_time);
        		$sheet->setCellValue("J$in", $val->note);
        	
       
        		
        	
        	
        		
       
              	
        	
        		 $in +=1;
        		 $num +=1;
        }
     
        
        
       
       $sheet->getStyle("E$rest_of_information:G$rest_of_information")->getFont()->setName('Arial');
          $sheet->getStyle("E$rest_of_information:G$rest_of_information")->getFont()->setSize(12);
          
          
               		 
    
           $spreadsheet->getActiveSheet()->getStyle("E$rest_of_information:G$rest_of_information")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $spreadsheet->getActiveSheet()->getStyle("E$rest_of_information:G$rest_of_information")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                 $spreadsheet->getActiveSheet()->getStyle("E$rest_of_information:G$rest_of_information")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
    
              	$sheet->setCellValue("E$rest_of_information", 'Total Deliveries');
        		$sheet->setCellValue("F$rest_of_information", 'Total Canceled');
        		$sheet->setCellValue("G$rest_of_information", 'Confirmed Deliveries');
        		
        		
        
     
                $rest_of_information_n=$rest_of_information+1;
                
                $counter=$rest_of_information_n+3;
                
                 $sheet->mergeCells("E$rest_of_information_n:E$counter");
                 $sheet->setCellValue("E$rest_of_information_n", $siz_of_total );
                 $sheet->getStyle("E$rest_of_information_n")->getFont()->setSize(14);
                 $sheet->getStyle("E$rest_of_information_n")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $spreadsheet->getActiveSheet()->getStyle("E$rest_of_information_n")->getFont()->getColor()->setARGB('3838414a');
         
         
                 $sheet->mergeCells("F$rest_of_information_n:F$counter");
        		 $sheet->setCellValue("F$rest_of_information_n", $cancel);
        		 $sheet->getStyle("F$rest_of_information_n")->getFont()->setSize(14);
                 $sheet->getStyle("F$rest_of_information_n")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $spreadsheet->getActiveSheet()->getStyle("F$rest_of_information_n")->getFont()->getColor()->setARGB('3838414a');
         
                 $sheet->mergeCells("G$rest_of_information_n:G$counter");
        		 $sheet->setCellValue("G$rest_of_information_n", $siz_of_total-$cancel);
        		 $sheet->getStyle("G$rest_of_information_n")->getFont()->setSize(14);
        		 $sheet->getStyle("G$rest_of_information_n")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $spreadsheet->getActiveSheet()->getStyle("G$rest_of_information_n")->getFont()->getColor()->setARGB('3838414a');
        
        		
        		$spreadsheet->getActiveSheet()->getStyle("E$rest_of_information:G$counter")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("E$rest_of_information:G$counter")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("E$rest_of_information:G$counter")->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("E$rest_of_information:G$counter")->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
      
       //Taha
      		 
      
    //   sami bhae
                        //   $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
                        //   $spreadsheet->getActiveSheet()->getProtection()->setSort(true);
                        //   $spreadsheet->getActiveSheet()->getProtection()->setInsertRows(true);
                        //   $spreadsheet->getActiveSheet()->getProtection()->setFormatCells(true);
                        
                        //   $spreadsheet->getActiveSheet()->getProtection()->setPassword('SAMI_LOGX_password');
                        
                        
                        // sami bhae end
               
                // echo '$siz_of_total:'.$siz_of_total.'<br>';
                // echo '$bags_returned_by_clients:'.$bags_returned_by_clients.'<br>';
                // echo '$icebags_returned_by_clients:'.$icebags_returned_by_clients.'<br>';
                // die();
       
     }else{
          
         $this->session->set_flashdata('error', 'No Record Found, Try Again!');
              redirect('monthlyMeal/VendorPreDeliveriesReport');
     }
        
        
      	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      
      	    header('Content-Disposition: attachment; filename="'.$Deliveries[0]->vendor.'ConfirmationReport_'.date('Y-m-d_(H:i:s)').'.xlsx"');
      	    
      	                                                      
     
      
		$writer->save("php://output");
		 
        
		redirect('monthlyMeal/VendorPreDeliveriesReport');
// 		echo json_encode($response);
	// END OF MAIN IF	
   }else{
       
       $this->session->set_flashdata('error', 'No Record Found, Try Again!');
              redirect('monthlyMeal/VendorPreDeliveriesReport');
       
       } 
   
}


   function predelivery_report_email(){
        //   echo 'hi';
        //   die();
             
          $this->load->model('MonthlyMeals_model');
         $response = array('success' => false);
         
       
        $start_date = @$_POST['from'];
        $end_date = @$_POST['to'];
        $vendor_id = @$_POST['vendor_list'];
        $status=0;
        
        // echo '$start_date='.$start_date.'<br>';
        // echo '$end_date='.$end_date.'<br>';
        // echo '$vendor_id='.$vendor_id.'<br>';
        // die();

        if(!$start_date){
            $start_date = date('Y-m-d h:i:s', strtotime($start_date));
        }

        if(!$end_date){
            $end_date = date('Y-m-d h:i:s');
        }
        
        
        
        
        if(($vendor_id) AND ($start_date) AND ($end_date)){
                  if(strtolower($this->session->userdata('role')) != 'vendor'){
                  
                  if($vendor_id){
                        //   $where = "o.is_neutral=1 and o.str_keep_varification ='yes' and o.driver_id > 0 and  v.status='".$status."' and (o.status='Collected') and o.cooling_bag_check !=3 and o.vendor_id='".$vendor_id."' and o.varified_at BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
                          $where=" o.plan_id !=0 AND (o.status='Assign' OR o.status='Not Assign' OR o.status='Cancel') AND o.vendor_id='".$vendor_id."'  AND o.delivery_date  BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59' AND o.action !='Freezed' ";
                
                  }
                }else{
                    // $where = "o.is_neutral=1 and o.str_keep_varification ='yes' and o.driver_id > 0 and v.status='".$status."' and (o.status='Collected') and o.cooling_bag_check !=3  and o.vendor_id='".$vendor_id."' and o.varified_at BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
                 }
                
                //  $report_data = $data['result'] =  $this->order_model->get_tracking_statistics_details($vendor_id,$start_date,$end_date,$where);
                 $Deliveries = $this->MonthlyMeals_model->get_all_upcoming_pre_deliveries_forXL($where);
            
        }
                
                
                
       
       
        if($Deliveries){
            $response['success'] = true;
            $response['report_data'] = $Deliveries;
        }
        
        
       
        
        // echo '<pre>';
        // print_r($response);
        // echo '<br>';
        // die();
        
        
        
        
        
        
        
        // START XLS HERE 
 
//   echo '$bag_data :'.$bag_data[0]->vendor;
//   die();
   if(count($Deliveries) > 0){
     
         $last=0;
         $yrdata= strtotime($start_date);
    
         $set_strt_dt=date('d M Y', $yrdata);
         
         $yrdata= strtotime($end_date);
          $set_end_dt=date('d M Y', $yrdata);
         
        //  echo '$set_strt_dt:'.$set_strt_dt.'-';
        //  echo '$set_end_dt:'.$set_end_dt;
         
        
             $title_strng=$Deliveries[0]->vendor.' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Deliveries Confirmation Report';
             $main_title=$Deliveries[0]->vendor;
         
        
       
        //  echo '<br> $title_strng:<br>'.$title_strng;
        //  die();
        
        
            
       
         	$spreadsheet = new Spreadsheet();
		    $sheet = $spreadsheet->getActiveSheet();
		
		$spreadsheet->getProperties()
    ->setCreator("LOGX TEAM")
    ->setLastModifiedBy("LOGX TEAM")
    ->setTitle('Deliveries Confirmation Report')
    ->setSubject($title_strng)
    ->setDescription(
      $title_strng
    )
    ->setKeywords("Logx Team")
    ->setCategory("LOGX Deliveries Confirmation Report");
	$sheet->setTitle('Deliveries Confirmation Report');
		
    // 	$sheet->getDefaultStyle()->getFont()->setName('Times New Roman');
        
       
        
       
         $sheet->mergeCells('C1:H1');
          $sheet->setCellValue('C1',$title_strng);
           $sheet->getStyle("C1")->getFont()->setName('Arial');
          $sheet->getStyle("C1")->getFont()->setSize(14);
         $sheet->getStyle('C1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
         $spreadsheet->getActiveSheet()->getStyle("C1")->getFont()->getColor()->setARGB('3838414a');
         
         $sheet->mergeCells('I1:J1');
          $sheet->setCellValue('I1','LOGX');
          $sheet->getStyle("I1")->getFont()->setName('Arial');
          $sheet->getStyle("I1")->getFont()->setSize(14);
         $sheet->getStyle('I1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
      $spreadsheet->getActiveSheet()->getStyle("I1")->getFont()->getColor()->setARGB('3838414a');
       
       $sheet->getStyle("A2:J2")->getFont()->setName('Arial');
          $sheet->getStyle("A2:J2")->getFont()->setSize(12);
          
          
               		 
    
           $spreadsheet->getActiveSheet()->getStyle("A2:J2")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $spreadsheet->getActiveSheet()->getStyle("A2:J2")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                 $spreadsheet->getActiveSheet()->getStyle("A2:J2")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
       
       
       
        $spreadsheet->getDefaultStyle()->getFont()->setName('Arial');
          $spreadsheet->getDefaultStyle()->getFont()->setSize(10);
       
        // 	$sheet->setCellValue('I1', 'LOGX');
        // 	$sheet->getStyle("I1")->getFont()->setSize(10);
          	
		$sheet->setCellValue('A2', 'Sr');
		$sheet->setCellValue('B2', 'Order ID');
		$sheet->setCellValue('C2', 'Plan ID');
		$sheet->setCellValue('D2', 'Customer ID');
		$sheet->setCellValue('E2', 'Customer');
		$sheet->setCellValue('F2', 'Status');
		$sheet->setCellValue('G2', 'Delivery Address');
		$sheet->setCellValue('H2', 'Delivery Date');
		$sheet->setCellValue('I2', 'TimeSlot');
		$sheet->setCellValue('J2', 'Note');
	

		$styleArrayFirstRow = [
            'font' => [
                'bold' => true,
            ],
            ['fill_solid' => 'e3eb8a']
        ];
        $highestColumn = $sheet->getHighestColumn();
        $sheet->getStyle('A2:' . $highestColumn . '2' )->applyFromArray($styleArrayFirstRow);
        $sheet->getStyle('A1:' . $highestColumn . '1' )->applyFromArray($styleArrayFirstRow);

        //$sheet->getStyle('A1:11')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('e3eb8a');

		$sheet->getStyle('2:2')->getFont()->setBold(true);
		
		
		foreach(range('A','J') as $columnID) {
		    if($columnID =='A' OR $columnID =='C' ){
		        $sheet->getColumnDimension($columnID)->setWidth(10);
		    }else if($columnID =='G'){
		        $sheet->getColumnDimension($columnID)->setWidth(60);
		    }else if($columnID =='I'){
		        $sheet->getColumnDimension($columnID)->setWidth(30);
		    }else{
    			$sheet->getColumnDimension($columnID)->setWidth(20);
		    }
		} 
           
           $siz_of_total=sizeof($Deliveries); 
           $rest_of_information=$siz_of_total+12;
           $cancel=0;
       $sheet_index=1;
       $in=3;
       $num=1;
       
       
      
    
    
    
    
    
   
     if(count($Deliveries) > 0){  //Taha
      foreach($Deliveries as $data =>$val){
 

                
                		$writer = new Xlsx($spreadsheet);

                        
                        		//notification validation
                        // 		$validation2 = $sheet->getCell('H2')->getDataValidation();
                        // 		$validation2->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST );
                        // 		$validation2->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION );
                        // 		$validation2->setAllowBlank(false);
                        // 		$validation2->setShowInputMessage(true);
                        // 		$validation2->setShowErrorMessage(true);
                        // 		$validation2->setShowDropDown(true);
                        // 		$validation2->setErrorTitle('Input error');
                        // 		$validation2->setError('Value is not in list.');
                        // 		$validation2->setPromptTitle('Pick from list');
                        // 		$validation2->setPrompt('Please pick a value from the drop-down list.');
                        // 		$validation2->setFormula1('"'.$alerts.'"');

                //END VALIDATIONS //
               
               
                $sheet->setCellValue("A$in", $num );
        		$sheet->setCellValue("B$in", $val->order_id);
        		$sheet->setCellValue("C$in", $val->plan_id);
        		$sheet->setCellValue("D$in", $val->pcustomer_id);
        		$sheet->setCellValue("E$in", $val->name_on_delivery." ".$val->number_on_delivery);
        		$sheet->getStyle("E$in")->getAlignment()->setWrapText(true);
        		
        			 if($val->is_cancelled =='yes' OR $val->status=='Cancel'){
                       		  $spreadsheet->getActiveSheet()->getStyle("A$in:J$in")
                                   ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED); 
    
                      $spreadsheet->getActiveSheet()->getStyle("A$in:J$in")
                      ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                      $spreadsheet->getActiveSheet()->getStyle("A$in:J$in")
                      ->getFill()->getStartColor()->setARGB('FFFFFF00');
                                                                
                           
                       $sheet->setCellValue("F$in",'Canceled( This delivery is canceled.)');
                       
                       $cancel +=1;
        		             }else{  
        		                 
        		                 if($val->status=='Assign'){
        		                     $sheet->setCellValue("F$in", 'Assigned');
        		                 }else if($val->status=='Not Assign'){
        		                     $sheet->setCellValue("F$in", 'Not Assigned');
        		                 }else{
        		                     $sheet->setCellValue("F$in", $val->status);
        		                 }
        		                 
        		             }
        		
        		
        		
        		
        		$sheet->setCellValue("G$in", $val->delivery_address);
        		$sheet->setCellValue("H$in", $val->delivery_date);
        		$sheet->setCellValue("I$in", $val->delivery_time);
        		$sheet->setCellValue("J$in", $val->note);
        	
       
        		
        	
        	
        		
       
              	
        	
        		 $in +=1;
        		 $num +=1;
        }
     
        
        
       
       $sheet->getStyle("E$rest_of_information:G$rest_of_information")->getFont()->setName('Arial');
          $sheet->getStyle("E$rest_of_information:G$rest_of_information")->getFont()->setSize(12);
          
          
               		 
    
           $spreadsheet->getActiveSheet()->getStyle("E$rest_of_information:G$rest_of_information")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $spreadsheet->getActiveSheet()->getStyle("E$rest_of_information:G$rest_of_information")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                 $spreadsheet->getActiveSheet()->getStyle("E$rest_of_information:G$rest_of_information")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
    
              	$sheet->setCellValue("E$rest_of_information", 'Total Deliveries');
        		$sheet->setCellValue("F$rest_of_information", 'Total Canceled');
        		$sheet->setCellValue("G$rest_of_information", 'Confirmed Deliveries');
        		
        		
        
     
                $rest_of_information_n=$rest_of_information+1;
                
                $counter=$rest_of_information_n+3;
                
                 $sheet->mergeCells("E$rest_of_information_n:E$counter");
                 $sheet->setCellValue("E$rest_of_information_n", $siz_of_total );
                 $sheet->getStyle("E$rest_of_information_n")->getFont()->setSize(14);
                 $sheet->getStyle("E$rest_of_information_n")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $spreadsheet->getActiveSheet()->getStyle("E$rest_of_information_n")->getFont()->getColor()->setARGB('3838414a');
         
         
                 $sheet->mergeCells("F$rest_of_information_n:F$counter");
        		 $sheet->setCellValue("F$rest_of_information_n", $cancel);
        		 $sheet->getStyle("F$rest_of_information_n")->getFont()->setSize(14);
                 $sheet->getStyle("F$rest_of_information_n")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $spreadsheet->getActiveSheet()->getStyle("F$rest_of_information_n")->getFont()->getColor()->setARGB('3838414a');
         
                 $sheet->mergeCells("G$rest_of_information_n:G$counter");
        		 $sheet->setCellValue("G$rest_of_information_n", $siz_of_total-$cancel);
        		 $sheet->getStyle("G$rest_of_information_n")->getFont()->setSize(14);
        		 $sheet->getStyle("G$rest_of_information_n")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $spreadsheet->getActiveSheet()->getStyle("G$rest_of_information_n")->getFont()->getColor()->setARGB('3838414a');
        
        		
        		$spreadsheet->getActiveSheet()->getStyle("E$rest_of_information:G$counter")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("E$rest_of_information:G$counter")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("E$rest_of_information:G$counter")->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("E$rest_of_information:G$counter")->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
      
       //Taha
      		 
      
    //   sami bhae
                        //   $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
                        //   $spreadsheet->getActiveSheet()->getProtection()->setSort(true);
                        //   $spreadsheet->getActiveSheet()->getProtection()->setInsertRows(true);
                        //   $spreadsheet->getActiveSheet()->getProtection()->setFormatCells(true);
                        
                        //   $spreadsheet->getActiveSheet()->getProtection()->setPassword('SAMI_LOGX_password');
                        
                        
                        // sami bhae end
               
                // echo '$siz_of_total:'.$siz_of_total.'<br>';
                // echo '$bags_returned_by_clients:'.$bags_returned_by_clients.'<br>';
                // echo '$icebags_returned_by_clients:'.$icebags_returned_by_clients.'<br>';
                // die();
       
     }else{
          
         $this->session->set_flashdata('error', 'No Record Found, Try Again!');
              redirect('monthlyMeal/VendorPreDeliveriesReport');
     }
        
        
      	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      
      	    header('Content-Disposition: attachment; filename="'.$Deliveries[0]->vendor.'ConfirmationReport_'.date('Y-m-d_(H:i:s)').'.xlsx"');
      	    
      	                                                      
     
      
// 		$writer->save("php://output");
		
		
		
		 $v='';
    $vemail='';
       if(count($Deliveries) > 0){
		$name=$Deliveries[0]->vendor.'ConfirmationReport_'.get_unique_string().'.xlsx';
		$v=$Deliveries[0]->vendor;
	
		 $vemail=explode(',', $Deliveries[0]->emails_for_mealplan);
       
       }else{
           $name=$Deliveries[0]->vendor.'ConfirmationReport_'.get_unique_string().'.xlsx';
		$v=$Deliveries[0]->vendor;
		$vemail=explode(',', $Deliveries[0]->emails_for_mealplan);
       }
       
       
		$path=FCPATH.'assets/partner_reports/'.$name;
			$writer->save($path);
        //   echo '$path: '.$path;
	
// 		 die();

// 	$email_data = $result;

$email=false;

  	if(!empty($vemail)){
    // foreach($vemail as $email_s){

		$config = Array(
			'protocol' => 'smtp',
			'smtp_port' => 465,
			'smtp_user' => 'admin@thelogx.com',
			'mailtype' => 'html',
			'charset' => 'utf-8'
		);
		$this->load->library('email');
		$this->email->set_newline("\r\n");
		$htmlContent = '<h4><p style="text-transform: uppercase;">DEAR ' . $v .',</p> </h4>It is to inform you about confirmed deliveries report "'.$set_strt_dt.' - '.$set_end_dt.'" Please, find the report attached. <br/><br/><br/><pre>Regards,
TEAM L O G X</pre><br/>';
 		$this->email->to($vemail);
        // $this->email->to('ayesha.attique.work@gmail.com');
        // $this->email->to('t.raza5588@gmail.com');
		$this->email->from('admin@thelogx.com', 'LOGX');
		$this->email->subject('Confirmed Deliveries Report');
		$this->email->message($htmlContent);
		$this->email->set_mailtype("html");
		 $this->email->attach($path);
// 		 $this->email->attach('assets/partner_reports/Partner_reportdef9c4d6.xlsx');
		 
		  
		     
		     	$email=$this->email->send();
		
// 	$email=false;

        // echo 'email is:'.$email;
		
		
    // }
  	    
  	}
		unlink($path);
	
		  //  $this->session->set_flashdata('success', 'Report send successfully.');
            //   redirect('vendor_deliveries_complete_report');
              
		  
		if($email){
		  
		    $this->session->set_flashdata('success', 'Report sent successfully.');
              
              redirect('monthlyMeal/VendorPreDeliveriesReport');
            // $this->load->view('vendor_deliveries_complete_report');
		 
		}else{
		  //  $this->session->set_flashdata('error', 'Report did not send, Try Again!');
		    
		     $msg='<h2>Failed to send report.</h2>';
		    $msg=$msg.'<button class="btn btn-warning" data-toggle="collapse" data-target="#demo">More Information</button><div id="demo" class="collapse">Kindly make sure you have set partner email for pre-delivery report.(Partners->Partners List)</div>';
		    
		    
		    $this->session->set_flashdata('error', $msg);
              redirect('monthlyMeal/VendorPreDeliveriesReport');
		}
// 
		 
        
// 		redirect('monthlyMeal/VendorPreDeliveriesReport');
// 		echo json_encode($response);
	// END OF MAIN IF	
   }else{
       
       $this->session->set_flashdata('error', 'No Record Found, Try Again!');
              redirect('monthlyMeal/VendorPreDeliveriesReport');
       
       } 
   
}

   function predelivery_report_email_all(){
        //   echo 'hi';
        //   die();
             
          $this->load->model('MonthlyMeals_model');
         $response = array('success' => false);
         
       
        $start_date = @$_POST['from'];
        $end_date = @$_POST['to'];
        $vendor_id = @$_POST['vendor_list'];
        $status=0;
        
        // echo '$start_date='.$start_date.'<br>';
        // echo '$end_date='.$end_date.'<br>';
        // echo '$vendor_id='.$vendor_id.'<br>';
        // die();

        if(!$start_date){
            $start_date = date('Y-m-d h:i:s', strtotime($start_date));
        }

        if(!$end_date){
            $end_date = date('Y-m-d h:i:s');
        }
        
        
        
        
        if(($vendor_id) AND ($start_date) AND ($end_date)){
                  if(strtolower($this->session->userdata('role')) != 'vendor'){
                  
                  if($vendor_id){
                        //   $where = "o.is_neutral=1 and o.str_keep_varification ='yes' and o.driver_id > 0 and  v.status='".$status."' and (o.status='Collected') and o.cooling_bag_check !=3 and o.vendor_id='".$vendor_id."' and o.varified_at BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
                          $where=" (o.status='Assign' OR o.status='Not Assign' OR o.status='Cancel') AND o.vendor_id='".$vendor_id."'  AND o.delivery_date  BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59' AND o.action !='Freezed' ";
                
                  }
                }else{
                    // $where = "o.is_neutral=1 and o.str_keep_varification ='yes' and o.driver_id > 0 and v.status='".$status."' and (o.status='Collected') and o.cooling_bag_check !=3  and o.vendor_id='".$vendor_id."' and o.varified_at BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
                 }
                
                //  $report_data = $data['result'] =  $this->order_model->get_tracking_statistics_details($vendor_id,$start_date,$end_date,$where);
                 $Deliveries = $this->MonthlyMeals_model->get_all_upcoming_pre_deliveries_forXL($where);
            
        }
                
                
                
       
       
        if($Deliveries){
            $response['success'] = true;
            $response['report_data'] = $Deliveries;
        }
        
        
       
        
        // echo '<pre>';
        // print_r($response);
        // echo '<br>';
        // die();
        
        
        
        
        
        
        
        // START XLS HERE 
 
//   echo '$bag_data :'.$bag_data[0]->vendor;
//   die();
   if(count($Deliveries) > 0){
     
         $last=0;
         $yrdata= strtotime($start_date);
    
         $set_strt_dt=date('d M Y', $yrdata);
         
         $yrdata= strtotime($end_date);
          $set_end_dt=date('d M Y', $yrdata);
         
        //  echo '$set_strt_dt:'.$set_strt_dt.'-';
        //  echo '$set_end_dt:'.$set_end_dt;
         
        
             $title_strng=$Deliveries[0]->vendor.' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Deliveries Confirmation Report';
             $main_title=$Deliveries[0]->vendor;
         
        
       
        //  echo '<br> $title_strng:<br>'.$title_strng;
        //  die();
        
        
            
       
         	$spreadsheet = new Spreadsheet();
		    $sheet = $spreadsheet->getActiveSheet();
		
		$spreadsheet->getProperties()
    ->setCreator("LOGX TEAM")
    ->setLastModifiedBy("LOGX TEAM")
    ->setTitle('Deliveries Confirmation Report')
    ->setSubject($title_strng)
    ->setDescription(
      $title_strng
    )
    ->setKeywords("Logx Team")
    ->setCategory("LOGX Deliveries Confirmation Report");
	$sheet->setTitle('Deliveries Confirmation Report');
		
    // 	$sheet->getDefaultStyle()->getFont()->setName('Times New Roman');
        
       
        
       
         $sheet->mergeCells('C1:H1');
          $sheet->setCellValue('C1',$title_strng);
           $sheet->getStyle("C1")->getFont()->setName('Arial');
          $sheet->getStyle("C1")->getFont()->setSize(14);
         $sheet->getStyle('C1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
         $spreadsheet->getActiveSheet()->getStyle("C1")->getFont()->getColor()->setARGB('3838414a');
         
         $sheet->mergeCells('I1:J1');
          $sheet->setCellValue('I1','LOGX');
          $sheet->getStyle("I1")->getFont()->setName('Arial');
          $sheet->getStyle("I1")->getFont()->setSize(14);
         $sheet->getStyle('I1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
      $spreadsheet->getActiveSheet()->getStyle("I1")->getFont()->getColor()->setARGB('3838414a');
       
       $sheet->getStyle("A2:J2")->getFont()->setName('Arial');
          $sheet->getStyle("A2:J2")->getFont()->setSize(12);
          
          
               		 
    
           $spreadsheet->getActiveSheet()->getStyle("A2:J2")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $spreadsheet->getActiveSheet()->getStyle("A2:J2")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                 $spreadsheet->getActiveSheet()->getStyle("A2:J2")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
       
       
       
        $spreadsheet->getDefaultStyle()->getFont()->setName('Arial');
          $spreadsheet->getDefaultStyle()->getFont()->setSize(10);
       
        // 	$sheet->setCellValue('I1', 'LOGX');
        // 	$sheet->getStyle("I1")->getFont()->setSize(10);
          	
		$sheet->setCellValue('A2', 'Sr');
		$sheet->setCellValue('B2', 'Order ID');
		$sheet->setCellValue('C2', 'Plan ID');
		$sheet->setCellValue('D2', 'Customer ID');
		$sheet->setCellValue('E2', 'Customer');
		$sheet->setCellValue('F2', 'Status');
		$sheet->setCellValue('G2', 'Delivery Address');
		$sheet->setCellValue('H2', 'Delivery Date');
		$sheet->setCellValue('I2', 'TimeSlot');
		$sheet->setCellValue('J2', 'Note');
	

		$styleArrayFirstRow = [
            'font' => [
                'bold' => true,
            ],
            ['fill_solid' => 'e3eb8a']
        ];
        $highestColumn = $sheet->getHighestColumn();
        $sheet->getStyle('A2:' . $highestColumn . '2' )->applyFromArray($styleArrayFirstRow);
        $sheet->getStyle('A1:' . $highestColumn . '1' )->applyFromArray($styleArrayFirstRow);

        //$sheet->getStyle('A1:11')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('e3eb8a');

		$sheet->getStyle('2:2')->getFont()->setBold(true);
		
		
		foreach(range('A','J') as $columnID) {
		    if($columnID =='A' OR $columnID =='C' ){
		        $sheet->getColumnDimension($columnID)->setWidth(10);
		    }else if($columnID =='G'){
		        $sheet->getColumnDimension($columnID)->setWidth(60);
		    }else if($columnID =='I'){
		        $sheet->getColumnDimension($columnID)->setWidth(30);
		    }else{
    			$sheet->getColumnDimension($columnID)->setWidth(20);
		    }
		} 
           
           $siz_of_total=sizeof($Deliveries); 
           $rest_of_information=$siz_of_total+12;
           $cancel=0;
       $sheet_index=1;
       $in=3;
       $num=1;
       
       
      
    
    
    
    
    
   
     if(count($Deliveries) > 0){  //Taha
      foreach($Deliveries as $data =>$val){
 

                
                		$writer = new Xlsx($spreadsheet);

                        
                        		//notification validation
                        // 		$validation2 = $sheet->getCell('H2')->getDataValidation();
                        // 		$validation2->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST );
                        // 		$validation2->setErrorStyle( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION );
                        // 		$validation2->setAllowBlank(false);
                        // 		$validation2->setShowInputMessage(true);
                        // 		$validation2->setShowErrorMessage(true);
                        // 		$validation2->setShowDropDown(true);
                        // 		$validation2->setErrorTitle('Input error');
                        // 		$validation2->setError('Value is not in list.');
                        // 		$validation2->setPromptTitle('Pick from list');
                        // 		$validation2->setPrompt('Please pick a value from the drop-down list.');
                        // 		$validation2->setFormula1('"'.$alerts.'"');

                //END VALIDATIONS //
               
               
                $sheet->setCellValue("A$in", $num );
        		$sheet->setCellValue("B$in", $val->order_id);
        		$sheet->setCellValue("C$in", $val->plan_id);
        		$sheet->setCellValue("D$in", $val->pcustomer_id);
        		$sheet->setCellValue("E$in", $val->name_on_delivery." ".$val->number_on_delivery);
        		$sheet->getStyle("E$in")->getAlignment()->setWrapText(true);
        		
        			 if($val->is_cancelled =='yes' OR $val->status=='Cancel'){
                       		  $spreadsheet->getActiveSheet()->getStyle("A$in:J$in")
                                   ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED); 
    
                      $spreadsheet->getActiveSheet()->getStyle("A$in:J$in")
                      ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                      $spreadsheet->getActiveSheet()->getStyle("A$in:J$in")
                      ->getFill()->getStartColor()->setARGB('FFFFFF00');
                                                                
                           
                       $sheet->setCellValue("F$in",'Canceled( This delivery is canceled.)');
                       
                       $cancel +=1;
        		             }else{  
        		                 
        		                 if($val->status=='Assign'){
        		                     $sheet->setCellValue("F$in", 'Assigned');
        		                 }else if($val->status=='Not Assign'){
        		                     $sheet->setCellValue("F$in", 'Not Assigned');
        		                 }else{
        		                     $sheet->setCellValue("F$in", $val->status);
        		                 }
        		                 
        		             }
        		
        		
        		
        		
        		$sheet->setCellValue("G$in", $val->delivery_address);
        		$sheet->setCellValue("H$in", $val->delivery_date);
        		$sheet->setCellValue("I$in", $val->delivery_time);
        		$sheet->setCellValue("J$in", $val->note);
        	
       
        		
        	
        	
        		
       
              	
        	
        		 $in +=1;
        		 $num +=1;
        }
     
        
        
       
       $sheet->getStyle("E$rest_of_information:G$rest_of_information")->getFont()->setName('Arial');
          $sheet->getStyle("E$rest_of_information:G$rest_of_information")->getFont()->setSize(12);
          
          
               		 
    
           $spreadsheet->getActiveSheet()->getStyle("E$rest_of_information:G$rest_of_information")
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $spreadsheet->getActiveSheet()->getStyle("E$rest_of_information:G$rest_of_information")
                ->getFill()->getStartColor()->setARGB('3838414a');
                
                 $spreadsheet->getActiveSheet()->getStyle("E$rest_of_information:G$rest_of_information")
    ->getFont()->getColor()->setARGB('FFFFFFFF');
    
              	$sheet->setCellValue("E$rest_of_information", 'Total Deliveries');
        		$sheet->setCellValue("F$rest_of_information", 'Total Canceled');
        		$sheet->setCellValue("G$rest_of_information", 'Confirmed Deliveries');
        		
        		
        
     
                $rest_of_information_n=$rest_of_information+1;
                
                $counter=$rest_of_information_n+3;
                
                 $sheet->mergeCells("E$rest_of_information_n:E$counter");
                 $sheet->setCellValue("E$rest_of_information_n", $siz_of_total );
                 $sheet->getStyle("E$rest_of_information_n")->getFont()->setSize(14);
                 $sheet->getStyle("E$rest_of_information_n")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $spreadsheet->getActiveSheet()->getStyle("E$rest_of_information_n")->getFont()->getColor()->setARGB('3838414a');
         
         
                 $sheet->mergeCells("F$rest_of_information_n:F$counter");
        		 $sheet->setCellValue("F$rest_of_information_n", $cancel);
        		 $sheet->getStyle("F$rest_of_information_n")->getFont()->setSize(14);
                 $sheet->getStyle("F$rest_of_information_n")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $spreadsheet->getActiveSheet()->getStyle("F$rest_of_information_n")->getFont()->getColor()->setARGB('3838414a');
         
                 $sheet->mergeCells("G$rest_of_information_n:G$counter");
        		 $sheet->setCellValue("G$rest_of_information_n", $siz_of_total-$cancel);
        		 $sheet->getStyle("G$rest_of_information_n")->getFont()->setSize(14);
        		 $sheet->getStyle("G$rest_of_information_n")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                 $spreadsheet->getActiveSheet()->getStyle("G$rest_of_information_n")->getFont()->getColor()->setARGB('3838414a');
        
        		
        		$spreadsheet->getActiveSheet()->getStyle("E$rest_of_information:G$counter")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("E$rest_of_information:G$counter")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("E$rest_of_information:G$counter")->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("E$rest_of_information:G$counter")->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
      
       //Taha
      		 
      
    //   sami bhae
                        //   $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
                        //   $spreadsheet->getActiveSheet()->getProtection()->setSort(true);
                        //   $spreadsheet->getActiveSheet()->getProtection()->setInsertRows(true);
                        //   $spreadsheet->getActiveSheet()->getProtection()->setFormatCells(true);
                        
                        //   $spreadsheet->getActiveSheet()->getProtection()->setPassword('SAMI_LOGX_password');
                        
                        
                        // sami bhae end
               
                // echo '$siz_of_total:'.$siz_of_total.'<br>';
                // echo '$bags_returned_by_clients:'.$bags_returned_by_clients.'<br>';
                // echo '$icebags_returned_by_clients:'.$icebags_returned_by_clients.'<br>';
                // die();
       
     }else{
          
         $this->session->set_flashdata('error', 'No Record Found, Try Again!');
              redirect('monthlyMeal/VendorPreDeliveriesReport');
     }
        
        
      	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      
      	    header('Content-Disposition: attachment; filename="'.$Deliveries[0]->vendor.'ConfirmationReport_'.date('Y-m-d_(H:i:s)').'.xlsx"');
      	    
      	                                                      
     
      
// 		$writer->save("php://output");
		
		
		
		 $v='';
    $vemail='';
       if(count($Deliveries) > 0){
		$name=$Deliveries[0]->vendor.'ConfirmationReport_'.get_unique_string().'.xlsx';
		$v=$Deliveries[0]->vendor;
	
		 $vemail=explode(',', $Deliveries[0]->emails_for_mealplan);
       
       }else{
           $name=$Deliveries[0]->vendor.'ConfirmationReport_'.get_unique_string().'.xlsx';
		$v=$Deliveries[0]->vendor;
		$vemail=explode(',', $Deliveries[0]->emails_for_mealplan);
       }
       
       
		$path=FCPATH.'assets/partner_reports/'.$name;
			$writer->save($path);
        //   echo '$path: '.$path;
	
// 		 die();

// 	$email_data = $result;

$email=false;

  	if(!empty($vemail)){
    // foreach($vemail as $email_s){

		$config = Array(
			'protocol' => 'smtp',
			'smtp_port' => 465,
			'smtp_user' => 'admin@thelogx.com',
			'mailtype' => 'html',
			'charset' => 'utf-8'
		);
		$this->load->library('email');
		$this->email->set_newline("\r\n");
		$htmlContent = '<h4><p style="text-transform: uppercase;">DEAR ' . $v .',</p> </h4>It is to inform you about confirmed deliveries report "'.$set_strt_dt.' - '.$set_end_dt.'" Please, find the report attached. <br/><br/><br/><pre>Regards,
TEAM L O G X</pre><br/>';
 		$this->email->to($vemail);
        // $this->email->to('ayesha.attique.work@gmail.com');
        // $this->email->to('t.raza5588@gmail.com');
		$this->email->from('admin@thelogx.com', 'LOGX');
		$this->email->subject('Confirmed Deliveries Report');
		$this->email->message($htmlContent);
		$this->email->set_mailtype("html");
		 $this->email->attach($path);
// 		 $this->email->attach('assets/partner_reports/Partner_reportdef9c4d6.xlsx');
		 
		  
		     
		     	$email=$this->email->send();
		
// 	$email=false;

        // echo 'email is:'.$email;
		
		
    // }
  	    
  	}
		unlink($path);
	
		  //  $this->session->set_flashdata('success', 'Report send successfully.');
            //   redirect('vendor_deliveries_complete_report');
              
		  
		if($email){
		  
		    $this->session->set_flashdata('success', 'Report sent successfully.');
              
              redirect('monthlyMeal/VendorPreDeliveriesReport');
            // $this->load->view('vendor_deliveries_complete_report');
		 
		}else{
		  //  $this->session->set_flashdata('error', 'Report did not send, Try Again!');
		    
		    
		     $msg='<h2>Failed to send report.</h2>';
		    $msg=$msg.'<button class="btn btn-warning" data-toggle="collapse" data-target="#demo">More Information</button><div id="demo" class="collapse">Kindly make sure you have set partner email for pre-delivery report.(Partners->Partners List)</div>';
		    
		    
		    $this->session->set_flashdata('error', $msg);
              redirect('monthlyMeal/VendorPreDeliveriesReport');
		}
// 
		 
        
// 		redirect('monthlyMeal/VendorPreDeliveriesReport');
// 		echo json_encode($response);
	// END OF MAIN IF	
   }else{
       
       $this->session->set_flashdata('error', 'No Records Found, Try Again!');
              redirect('monthlyMeal/VendorPreDeliveriesReport');
       
       } 
   
}




	function bag_pickup_reportSAVEFORBACKUP(){
     
     $this->load->model('bag_model');
               
         $response = array('success' => false);
         
       
        $start_date = @$_POST['from'];
        $end_date = @$_POST['to'];
        $vendor_id = @$_POST['vendor_list'];
        $status=0;
        
        // echo '$start_date='.$start_date.'<br>';
        // echo '$end_date='.$end_date.'<br>';
        // echo '$vendor_id xc='.$vendor_id.'<br>';
        // die();

        if(!$start_date){
            $start_date = date('Y-m-d h:i:s', strtotime($start_date));
        }

        if(!$end_date){
            $end_date = date('Y-m-d h:i:s');
        }
        
        
        
        
        if(($vendor_id) AND ($start_date) AND ($end_date)){
                  if($this->session->userdata('role') == 'admin'){
                  
                  if($vendor_id){
                         $where = "  (o.status !='Collected') and (o.action != 'Freezed') and (o.action != 'Paused') and  (o.status !='Delivered') and (o.status !='Cancel') and (o.is_cancelled !='yes') and o.vendor_id='".$vendor_id."' and o.delivery_date BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
                  }
                }else{
                         $where = "  (o.status !='Collected') and (o.action != 'Freezed') and (o.action != 'Paused') and  (o.status !='Delivered') and (o.status !='Cancel') and (o.is_cancelled !='yes') and o.vendor_id='".$vendor_id."' and o.delivery_date BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
                 }
                
                 $report_data  =  $this->order_model->get_orders_pickup_bag_records($vendor_id,$start_date,$end_date,$where);
        }
   
                
                
       
        $sorted_data=$report_data;
        
        // echo '<pre> records are <br>';
        // print_r($sorted_data);
        // die();
    
        
        $response['res2'] = $sorted_data;
      
    // START XLS HERE 

   if(count($sorted_data) > 0 ){
     
         $last=0;
         $yrdata= strtotime($start_date);
    
         $set_strt_dt=date('d M Y', $yrdata);
         
         $yrdata= strtotime($end_date);
          $set_end_dt=date('d M Y', $yrdata);
         
        //  echo '$set_strt_dt:'.$set_strt_dt.'-';
        //  echo '$set_end_dt:'.$set_end_dt;
         
         if(count($sorted_data) > 0){ //Taha
             $title_strng='DELIVERY PICK UP '.$sorted_data[0]->vendor;
            // $title_strng1=$sorted_data[0]->vendor.' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Bags Detail';
         }else{
            $title_strng='DELIVERY PICK UP '.$sorted_data[0]->vendor;
            // $title_strng1=$bag_data[0]->vendor.' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Bags Detail';
         }
        
       
        //  echo '<br> $title_strng:<br>'.$title_strng;
        //  die();  
        // echo 'hello';
        //   die();
        
        if(count($sorted_data) > 0){ //Taha
         $main_title=$sorted_data[0]->vendor;
        }else{
             $main_title=$sorted_data[0]->vendor;
        }
        
        
        $spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		
		$spreadsheet->getProperties()
    ->setCreator("LOGX TEAM")
    ->setLastModifiedBy("LOGX TEAM")
    ->setTitle('DELIVERY PICK UP')
    ->setSubject($title_strng)
    ->setDescription(
      $title_strng
    )
    ->setKeywords("Logx Team")
    ->setCategory("LOGX DELIVERY PICK UP REPORT");
     $sheet->setTitle('DELIVERY PICK UP REPORT');
   
          $sheet->mergeCells('A1:I1');
          $sheet->mergeCells('B2:H2');
          $sheet->getRowDimension(2)->setRowHeight(30);
         
         
          
          $img = './assets/images/logos-logo-full.png';
            $objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
            $objDrawing->setName('Sample image');
            $objDrawing->setDescription('Sample image');
            $objDrawing->setPath($img);
            $objDrawing->setHeight(30);
            $objDrawing->setCoordinates('E2');
            $objDrawing->setOffsetX(15);
            $objDrawing->setOffsetY(8);
            
            $objDrawing->setWorksheet($spreadsheet->getActiveSheet());
          
          
           $sheet->getStyle('E2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
           $sheet->getStyle('E2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
      
           $spreadsheet->getActiveSheet()->getStyle("B2:I2")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
           $spreadsheet->getActiveSheet()->getStyle("B2:I2")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
             
          
           $sheet->setCellValue('I2','Date:'.$set_strt_dt.'-'.$set_end_dt);
           $sheet->getStyle("I2")->getFont()->setName('Times New Roman');
           $sheet->getStyle("I2")->getFont()->setSize(8);
           
             $sheet->mergeCells('B3:G3');
             $sheet->mergeCells('H3:I3');
              
              $sheet->getRowDimension(1)->setRowHeight(7);
         
        //   -----------------------------------------------------------------------------
          //dadag
        //   $sheet->mergeCells('E1:I1');
           
        
            $sheet->setCellValue('B3','DELIVERY PICK UP '.strtoupper($main_title)); 
            $sheet->getStyle('B3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle("B3")->getFont()->setSize(20);
            $spreadsheet->getActiveSheet()->getStyle("B3")->getFont()->setBold( true );
      
          $sheet->mergeCells('B4:I4');
          $sheet->getRowDimension(4)->setRowHeight(4);
      
      	foreach(range('A','I') as $columnID) {
		    if($columnID =='B' OR  $columnID =='D'  OR  $columnID =='F' OR  $columnID =='H'){
		        $sheet->getColumnDimension($columnID)->setWidth(6);
		    }else if($columnID =='C'OR  $columnID =='E' OR $columnID =='G' OR $columnID =='I'){
		        $sheet->getColumnDimension($columnID)->setWidth(30);
		    }else{
    			$sheet->getColumnDimension($columnID)->setWidth(2);
		    }
		} 
           
           $siz_of_total=sizeof($sorted_data); 
           $cit=$siz_of_total+1;
           $emi=$cit+1;
       $sheet_index=1;
       $in=5;
       $num=1;
       $lst_in=0;
       $first_half=1;
       $second_half=41;
       
       $secure_indicator=4;
       
       
       $rest_of_information=$siz_of_total+10;
   // BACHY START
   
     $in_starter=5;
     $lst_in2=0;
    if(count($sorted_data) > 0)
     {  //Taha
         $total_exist=0;
      foreach($sorted_data as $data =>$val)
      { 
           $total_exist +=1;
      	$writer = new Xlsx($spreadsheet);
                           

       $spreadsheet->getActiveSheet()->getStyle("B$in:I$in")->getFont()->setSize(14);
            if($num <=40){
                
                //   echo '<br>i am number num in <= 40 :  '.$num;
                //   echo 'i am val in <= 40 :  '.$in;
                //   echo 'i am total_exist  :  '.$total_exist;
                  
                 $sheet->setCellValue("B$in", $total_exist );
                 $sheet->setCellValue("C$in", $val->name_on_delivery);
                 $sheet->getStyle("C$in")->getAlignment()->setWrapText(true);
                 $sheet->getStyle("C$in")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                 if($num==40){
                    //   echo '<br>i am number num in == 40 :'.$num;
                    //     echo 'i was val in == 40 :'.$in;
                    //      echo '  i am total_exist  :  '.$total_exist;
                 	$in=$secure_indicator;
                //  	 echo '- i am val in == 40 :'.$in;
                 }
            }else if($num >40 AND $num <= 80){
                
                        // echo '<br>i am number num  > 40 & <=80 :'.$num;
                        // echo 'i was val in > 40 & <=80 , so in == 40 :'.$in;
                        //  echo 'i am total_exist  :  '.$total_exist;
                        
                 $sheet->setCellValue("D$in", $total_exist );
                 $sheet->setCellValue("E$in", $val->name_on_delivery);
                 $sheet->getStyle("E$in")->getAlignment()->setWrapText(true);
                $sheet->getStyle("E$in")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                 if($num==80){
                        // echo '<br>i am number num  > 40 & <=80 inside ==80 check :'.$num;
                        // echo 'i was val in > 40 & <=80 inside ==80 check, so  before in == 40 :'.$in;
                 	$in=$secure_indicator;
                //  	 echo 'i was val in > 40 & <=80 inside ==80 check, so  after in == 40 :'.$in;
                 }
            }else if($num >80 AND $num <= 120){
                        //  echo '<br>i am number num  > 80 & <=120  check :'.$num;
                        // echo 'i was val in  > 80 & <=120 , in :'.$in;
                $sheet->setCellValue("F$in", $total_exist );
                 $sheet->setCellValue("G$in", $val->name_on_delivery);
                 $sheet->getStyle("G$in")->getAlignment()->setWrapText(true);
                $sheet->getStyle("G$in")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                 if($num==120){
                    //   echo '<br>i am number num   > 80 & <=120 inside ==120 check :'.$num;
                    //     echo 'i was val in > 80 & <=120 inside ==120 check, so  before  :'.$in;
                 	$in=$secure_indicator;
                 		 //echo 'i was val in  > 80 & <=120 inside ==180 check, so  after  :'.$in;
                 }
                
            }else if($num >120 AND $num <= 160){
                        //  echo '<br>i am number num  > 120 & <=160  :'.$num;
                        // echo 'i was val in  > 120 & <=160 , in :'.$in;
                 $sheet->setCellValue("H$in", $total_exist );
                 $sheet->setCellValue("I$in", $val->name_on_delivery);
                 $sheet->getStyle("I$in")->getAlignment()->setWrapText(true);
                $sheet->getStyle("I$in")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                
                
            }
            
            
            
            
            
            
         
            
            
            
        if(count($sorted_data) == $total_exist  OR $num ==160  ){
                
                
                // echo '<br> iam runing.........total count:'.count($sorted_data);
                // echo '<br> iam runing......... num:'.'=='.$num;
                //  echo '<br> iam runing.........was ins:'.$in;
                // echo '<br> and ...........';
                //  echo 'i am total_exist  :  '.$total_exist;
                // echo 'i was in:'.$in;
               
                 
                //   echo 'i was num:'.$num;
                //  if($in < 40){
                     
                    //  echo 'in was: before -44 :'.$secure_indicator;
                    //  $lst_in_difference= 44 - $secure_indicator;
                    //   echo '<br> difference were:'.$lst_in_difference;
                     $lst_in =  40 + $secure_indicator;
                     
                    //   echo '<br> iam difference(in <40 conditions runs.........new lst_in:'.$lst_in;
                //  }else{
                //       $lst_in=$in;
                //       echo '<br> iam NOT difference(in <40) conditions here lst_in = in:'.$lst_in;
                //  } 
                  $lst_in +=1;
                    //   echo '<br> final last in after add 1.........ins:'.$lst_in;
                
                 $sheet->mergeCells("B$lst_in:E$lst_in");
                 $sheet->getRowDimension($lst_in)->setRowHeight(20);
                 $sheet->setCellValue("B$lst_in", "We have received total num of bags:" );
                 $sheet->getStyle("B$lst_in")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                 $sheet->getStyle("B$lst_in")->getFont()->setSize(12);
                 $spreadsheet->getActiveSheet()->getStyle("B$lst_in")->getFont()->setBold( true ); 
                   $lst_in +=2;
                   
                 $sheet->mergeCells("B$lst_in:E$lst_in");
                 $sheet->getRowDimension($lst_in)->setRowHeight(20);
                 $sheet->setCellValue("B$lst_in", "The total bags not received/cancelled:" );
                 $sheet->getStyle("B$lst_in")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                 $sheet->getStyle("B$lst_in")->getFont()->setSize(12);
                 $spreadsheet->getActiveSheet()->getStyle("B$lst_in")->getFont()->setBold( true );
                 $lst_in +=2;
                   
                 $sheet->mergeCells("B$lst_in:E$lst_in");
                 $sheet->getRowDimension($lst_in)->setRowHeight(20);
                 $sheet->setCellValue("B$lst_in", "Kitchen Signature:" );
                 $sheet->getStyle("B$lst_in")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                 $sheet->getStyle("B$lst_in")->getFont()->setSize(12);
                 $spreadsheet->getActiveSheet()->getStyle("B$lst_in")->getFont()->setBold( true ); 
                  
                   $sheet->setCellValue("I$lst_in", 'Date: '.$set_strt_dt );
                   $sheet->getStyle("I$lst_in")->getFont()->setSize(12);
                   $spreadsheet->getActiveSheet()->getStyle("I$lst_in")->getFont()->setBold( true );
                  $lst_in +=2;
                   
                 $sheet->mergeCells("B$lst_in:E$lst_in");
                 $sheet->getRowDimension($lst_in)->setRowHeight(20);
                 $sheet->setCellValue("B$lst_in", "Driver Signature:" );
                 $sheet->getStyle("B$lst_in")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                 $sheet->getStyle("B$lst_in")->getFont()->setSize(12);
                 $spreadsheet->getActiveSheet()->getStyle("B$lst_in")->getFont()->setBold( true );
                 
                 
           
                           
                           
           
           
           
           
           
           
                        if($num==160 AND count($sorted_data) != $num){
                //   echo'  New page prep start';
                        // echo '<br>i am number num   > 120 & <=160 inside ==160 check :'.$num;
                        // echo 'i was val in > 120 & <=160 inside ==160 check, so  before  :'.$in;
                    
                    //   $new_indicator=$in+0;
                    //   echo 'new_indicator:'.$new_indicator;
                      
                      
                    //   echo ' <br> I RUN WHEN NUM IS 160 and total values are remaing........... HERE LST_IN IS'.$lst_in;
                      
                      
                      
                    //   New PAge for print
                    
                    // echo '*****************NEW PAGE CODE RUNS*********';
                     $lst_in +=9; // to maintain the 60th row new start
                     
                    //  echo '<br><br> LSt in is:'.$lst_in;
                     
                      $sheet->mergeCells("A$lst_in:I$lst_in");
                      $lst_in2 = $lst_in + 1;
                      $sheet->mergeCells("B$lst_in2:H$lst_in2");
                      $sheet->getRowDimension($lst_in2)->setRowHeight(30);
                      
                      
                       $img = './assets/images/logos-logo-full.png';
                         $objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
                         $objDrawing->setName('Sample image');
                         $objDrawing->setDescription('Sample image');
                         $objDrawing->setPath($img);
                         $objDrawing->setHeight(30);
                         $objDrawing->setCoordinates("E$lst_in2");
                         $objDrawing->setOffsetX(15);
                         $objDrawing->setOffsetY(8);
            
                         $objDrawing->setWorksheet($spreadsheet->getActiveSheet());
          
                    
                          $sheet->getStyle("E$lst_in2")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                          $sheet->getStyle("E$lst_in2")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
      
                          $spreadsheet->getActiveSheet()->getStyle("B$lst_in2:I$lst_in2")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                          $spreadsheet->getActiveSheet()->getStyle("B$lst_in2:I$lst_in2")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
          
                    
                          $sheet->setCellValue("I$lst_in2","Date:".$set_strt_dt."-".$set_end_dt);
                          $sheet->getStyle("I$lst_in2")->getFont()->setName('Times New Roman');
                          $sheet->getStyle("I$lst_in2")->getFont()->setSize(8);
                          
                          $lst_in3 = $lst_in2 + 1;
           
                            $sheet->mergeCells("B$lst_in3:G$lst_in3");
                            $sheet->mergeCells("H$lst_in3:I$lst_in3");
                            
                            
                            $sheet->getRowDimension($lst_in)->setRowHeight(7);
                            $sheet->setCellValue("B$lst_in3","DELIVERY PICK UP ".strtoupper($main_title)); 
                            $sheet->getStyle("B$lst_in3")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                            $sheet->getStyle("B$lst_in3")->getFont()->setSize(20);
                            $spreadsheet->getActiveSheet()->getStyle("B$lst_in3")->getFont()->setBold( true );
                            
                            $lst_in4 =$lst_in3 + 1;
                            
                            $sheet->mergeCells("B$lst_in4:I$lst_in4");
                            $sheet->getRowDimension($lst_in4)->setRowHeight(4);
                            
                            
                             $lst_in_borders= $lst_in + 50;
                            //  echo '<br><br> LSt in lst_in_borders :'.$lst_in_borders;
                             
                              $spreadsheet->getActiveSheet()->getStyle("B$lst_in_borders:I$lst_in_borders")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                                $spreadsheet->getActiveSheet()->getStyle("B$lst_in2:I$lst_in2")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                                $spreadsheet->getActiveSheet()->getStyle("B$lst_in2:B$lst_in_borders")->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                                $spreadsheet->getActiveSheet()->getStyle("I$lst_in2:I$lst_in_borders")->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                          
                             	
                      
                            $in=$lst_in4;
                            $secure_indicator=$lst_in4;
                             $num=0;
                             
                            //  echo '<br> *****NEw PAGE VALUES ARE *******<br>';
                            //  echo '<br>in is: '.$in;
                            //  echo '<br>secure_indicator is: '.$secure_indicator;
                            //  echo '<br>num is: '.$num;
                            //   echo '<br>i am total_exist  :  '.$total_exist;
                 }
           
         }
               
                 $in +=1;
        		 $num +=1;
        

     }

   }
   
   
//   die();

         		$spreadsheet->getActiveSheet()->getStyle("B2:I2")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("B51:I51")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("B2:B51")->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("I2:I51")->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
      
      //Taha
  	
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="'.$sorted_data[0]->vendor.'_'.date('Y-m-d_(H:i:s)').'.xlsx"');
		$writer->save("php://output");

	// END OF MAIN IF	
   }else{
       
       $this->session->set_flashdata('error', 'No Record Found, Try Again!');
              redirect('vendor_deliveries_complete_report');
       
       } 
       
}



    function bag_pickup_report(){
     
     $this->load->model('bag_model');
               
         $response = array('success' => false);
         
       
        $start_date = @$_POST['from'];
        $end_date = @$_POST['to'];
        $vendor_id = @$_POST['vendor_list'];
         $emi_slot=@$_POST['emirate_list'];
        $status=0;
        
        // echo '$start_date='.$start_date.'<br>';
        // echo '$end_date='.$end_date.'<br>';
        // echo '$vendor_id xc='.$vendor_id.'<br>';
        // die();

        if(!$start_date){
            $start_date = date('Y-m-d h:i:s', strtotime($start_date));
        }

        if(!$end_date){
            $end_date = date('Y-m-d h:i:s');
        }
        
        
        
        
        if(($vendor_id) AND ($start_date) AND ($end_date)){
                  if($this->session->userdata('role') == 'admin'){
                  
                  if($vendor_id){
                         $where = "  (o.status !='Collected') and (o.action != 'Freezed') and (o.action != 'Paused') and  (o.status !='Delivered') and (o.status !='Cancel') and (o.is_cancelled !='yes') and o.vendor_id='".$vendor_id."' and o.delivery_date BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
                  }
                }else{
                         $where = "  (o.status !='Collected') and (o.action != 'Freezed') and (o.action != 'Paused') and  (o.status !='Delivered') and (o.status !='Cancel') and (o.is_cancelled !='yes') and o.vendor_id='".$vendor_id."' and o.delivery_date BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
                 }
                 
                  if($emi_slot !=''){
                     $where = $where." and o.delivery_time = '".$emi_slot."'";
                 }
                
                 $report_data  =  $this->order_model->get_orders_pickup_bag_records($vendor_id,$start_date,$end_date,$where);
        }
   
                
                
       
        $sorted_data=$report_data;
        
        // echo '<pre> records are <br>';
        // print_r($sorted_data);
        // die();
    
        
        $response['res2'] = $sorted_data;
      
    // START XLS HERE 

   if(count($sorted_data) > 0 ){
     
         $last=0;
         $yrdata= strtotime($start_date);
    
         $set_strt_dt=date('d M Y', $yrdata);
         
         $yrdata= strtotime($end_date);
          $set_end_dt=date('d M Y', $yrdata);
         
        //  echo '$set_strt_dt:'.$set_strt_dt.'-';
        //  echo '$set_end_dt:'.$set_end_dt;
         
         if(count($sorted_data) > 0){ //Taha
             $title_strng='DELIVERY PICK UP '.$sorted_data[0]->vendor;
            // $title_strng1=$sorted_data[0]->vendor.' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Bags Detail';
         }else{
            $title_strng='DELIVERY PICK UP '.$sorted_data[0]->vendor;
            // $title_strng1=$bag_data[0]->vendor.' ( '.$set_strt_dt.' - '.$set_end_dt.' )'.' Bags Detail';
         }
        
       
        //  echo '<br> $title_strng:<br>'.$title_strng;
        //  die();  
        // echo 'hello';
        //   die();
        
        if(count($sorted_data) > 0){ //Taha
         $main_title=$sorted_data[0]->vendor;
        }else{
             $main_title=$sorted_data[0]->vendor;
        }
        
        
        $spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		
		$spreadsheet->getProperties()
    ->setCreator("LOGX TEAM")
    ->setLastModifiedBy("LOGX TEAM")
    ->setTitle('DELIVERY PICK UP')
    ->setSubject($title_strng)
    ->setDescription(
      $title_strng
    )
    ->setKeywords("Logx Team")
    ->setCategory("LOGX DELIVERY PICK UP REPORT");
     $sheet->setTitle('DELIVERY PICK UP REPORT');
   
          $sheet->mergeCells('A1:I1');
          $sheet->mergeCells('B2:H2');
          $sheet->getRowDimension(2)->setRowHeight(30);
         
         
          
          $img = './assets/images/logos-logo-full.png';
            $objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
            $objDrawing->setName('Sample image');
            $objDrawing->setDescription('Sample image');
            $objDrawing->setPath($img);
            $objDrawing->setHeight(30);
            $objDrawing->setCoordinates('E2');
            $objDrawing->setOffsetX(15);
            $objDrawing->setOffsetY(8);
            
            $objDrawing->setWorksheet($spreadsheet->getActiveSheet());
          
          
           $sheet->getStyle('E2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
           $sheet->getStyle('E2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
      
           $spreadsheet->getActiveSheet()->getStyle("B2:I2")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
           $spreadsheet->getActiveSheet()->getStyle("B2:I2")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
             
          
           $sheet->setCellValue('I2','Date:'.$set_strt_dt.'-'.$set_end_dt);
           $sheet->getStyle("I2")->getFont()->setName('Times New Roman');
           $sheet->getStyle("I2")->getFont()->setSize(8);
           
             $sheet->mergeCells('B3:G3');
             $sheet->mergeCells('H3:I3');
              
              $sheet->getRowDimension(1)->setRowHeight(7);
         
        //   -----------------------------------------------------------------------------
          //dadag
        //   $sheet->mergeCells('E1:I1');
           
        
            $sheet->setCellValue('B3','DELIVERY PICK UP '.strtoupper($main_title)); 
            $sheet->getStyle('B3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle("B3")->getFont()->setSize(20);
            $spreadsheet->getActiveSheet()->getStyle("B3")->getFont()->setBold( true );
            $spreadsheet->getActiveSheet()->getStyle("B3:I3")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
           
      
          $sheet->mergeCells('B4:I4');
          $sheet->getRowDimension(4)->setRowHeight(4);
          
            $spreadsheet->getActiveSheet()->getStyle("B4:I4")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
           
      
      
      
            // $spreadsheet->getActiveSheet()->getStyle("B4:I4")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
              
            
            
            
            //   $spreadsheet->getActiveSheet()->getStyle("B$lst_in2:I$lst_in2")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
            //   $spreadsheet->getActiveSheet()->getStyle("B$lst_in2:B$lst_in_borders")->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
            //   $spreadsheet->getActiveSheet()->getStyle("I$lst_in2:I$lst_in_borders")->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                          
           
           
           
      	foreach(range('A','I') as $columnID) {
      	    $cl_str=$columnID.'5';
      	    $cl_end=$columnID.'51';
      	     
      	     $spreadsheet->getActiveSheet()->getStyle("$cl_str:$cl_end")->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
             
      	    
		    if($columnID =='B' OR  $columnID =='D'  OR  $columnID =='F' OR  $columnID =='H'){
		        $sheet->getColumnDimension($columnID)->setWidth(6);
		    }else if($columnID =='C'OR  $columnID =='E' OR $columnID =='G' OR $columnID =='I'){
		        $sheet->getColumnDimension($columnID)->setWidth(30);
		    }else{
    			$sheet->getColumnDimension($columnID)->setWidth(2);
		    }
		} 
           
           $siz_of_total=sizeof($sorted_data); 
           $cit=$siz_of_total+1;
           $emi=$cit+1;
       $sheet_index=1;
       $in=5;
       $num=1;
       $lst_in=0;
       $first_half=1;
       $second_half=41;
       
       $secure_indicator=4;
       
       
       $rest_of_information=$siz_of_total+10;
   // BACHY START
   
     $in_starter=5;
     $lst_in2=0;
    if(count($sorted_data) > 0)
     {  //Taha
         $total_exist=0;
      foreach($sorted_data as $data =>$val)
      { 
           $total_exist +=1;
      	$writer = new Xlsx($spreadsheet);
                           

       $spreadsheet->getActiveSheet()->getStyle("B$in:I$in")->getFont()->setSize(14);
       $spreadsheet->getActiveSheet()->getStyle("B$in:I$in")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
 
            if($num <=40){
                
                //   echo '<br>i am number num in <= 40 :  '.$num;
                //   echo 'i am val in <= 40 :  '.$in;
                //   echo 'i am total_exist  :  '.$total_exist;
                  
                 $sheet->setCellValue("B$in", $total_exist );
                 $sheet->setCellValue("C$in", $val->name_on_delivery);
                 $sheet->getStyle("C$in")->getAlignment()->setWrapText(true);
                 $sheet->getStyle("C$in")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                 if($num==40){
                    //   echo '<br>i am number num in == 40 :'.$num;
                    //     echo 'i was val in == 40 :'.$in;
                    //      echo '  i am total_exist  :  '.$total_exist;
                 	$in=$secure_indicator;
                //  	 echo '- i am val in == 40 :'.$in;
                 }
            }else if($num >40 AND $num <= 80){
                
                        // echo '<br>i am number num  > 40 & <=80 :'.$num;
                        // echo 'i was val in > 40 & <=80 , so in == 40 :'.$in;
                        //  echo 'i am total_exist  :  '.$total_exist;
                        
                 $sheet->setCellValue("D$in", $total_exist );
                 $sheet->setCellValue("E$in", $val->name_on_delivery);
                 $sheet->getStyle("E$in")->getAlignment()->setWrapText(true);
                $sheet->getStyle("E$in")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                 if($num==80){
                        // echo '<br>i am number num  > 40 & <=80 inside ==80 check :'.$num;
                        // echo 'i was val in > 40 & <=80 inside ==80 check, so  before in == 40 :'.$in;
                 	$in=$secure_indicator;
                //  	 echo 'i was val in > 40 & <=80 inside ==80 check, so  after in == 40 :'.$in;
                 }
            }else if($num >80 AND $num <= 120){
                        //  echo '<br>i am number num  > 80 & <=120  check :'.$num;
                        // echo 'i was val in  > 80 & <=120 , in :'.$in;
                $sheet->setCellValue("F$in", $total_exist );
                 $sheet->setCellValue("G$in", $val->name_on_delivery);
                 $sheet->getStyle("G$in")->getAlignment()->setWrapText(true);
                $sheet->getStyle("G$in")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                 if($num==120){
                    //   echo '<br>i am number num   > 80 & <=120 inside ==120 check :'.$num;
                    //     echo 'i was val in > 80 & <=120 inside ==120 check, so  before  :'.$in;
                 	$in=$secure_indicator;
                 		 //echo 'i was val in  > 80 & <=120 inside ==180 check, so  after  :'.$in;
                 }
                
            }else if($num >120 AND $num <= 160){
                        //  echo '<br>i am number num  > 120 & <=160  :'.$num;
                        // echo 'i was val in  > 120 & <=160 , in :'.$in;
                 $sheet->setCellValue("H$in", $total_exist );
                 $sheet->setCellValue("I$in", $val->name_on_delivery);
                 $sheet->getStyle("I$in")->getAlignment()->setWrapText(true);
                $sheet->getStyle("I$in")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                
                
            }
            
            
            
            
            
            
         
            
            
            
        if(count($sorted_data) == $total_exist  OR $num ==160  ){
                
                
                // echo '<br> iam runing.........total count:'.count($sorted_data);
                // echo '<br> iam runing......... num:'.'=='.$num;
                //  echo '<br> iam runing.........was ins:'.$in;
                // echo '<br> and ...........';
                //  echo 'i am total_exist  :  '.$total_exist;
                // echo 'i was in:'.$in;
               
                 
                //   echo 'i was num:'.$num;
                //  if($in < 40){
                     
                    //  echo 'in was: before -44 :'.$secure_indicator;
                    //  $lst_in_difference= 44 - $secure_indicator;
                    //   echo '<br> difference were:'.$lst_in_difference;
                     $lst_in =  40 + $secure_indicator;
                     
                    //   echo '<br> iam difference(in <40 conditions runs.........new lst_in:'.$lst_in;
                //  }else{
                //       $lst_in=$in;
                //       echo '<br> iam NOT difference(in <40) conditions here lst_in = in:'.$lst_in;
                //  } 
                  $lst_in +=1;
                    //   echo '<br> final last in after add 1.........ins:'.$lst_in;
                
                 $sheet->mergeCells("B$lst_in:E$lst_in");
                 $sheet->getRowDimension($lst_in)->setRowHeight(20);
                 $sheet->setCellValue("B$lst_in", "We have received total num of bags:" );
                 $sheet->getStyle("B$lst_in")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                 $sheet->getStyle("B$lst_in")->getFont()->setSize(12);
                 $spreadsheet->getActiveSheet()->getStyle("B$lst_in")->getFont()->setBold( true ); 
                   $lst_in +=2;
                   
                 $sheet->mergeCells("B$lst_in:E$lst_in");
                 $sheet->getRowDimension($lst_in)->setRowHeight(20);
                 $sheet->setCellValue("B$lst_in", "The total bags not received/cancelled:" );
                 $sheet->getStyle("B$lst_in")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                 $sheet->getStyle("B$lst_in")->getFont()->setSize(12);
                 $spreadsheet->getActiveSheet()->getStyle("B$lst_in")->getFont()->setBold( true );
                 $lst_in +=2;
                   
                 $sheet->mergeCells("B$lst_in:E$lst_in");
                 $sheet->getRowDimension($lst_in)->setRowHeight(20);
                 $sheet->setCellValue("B$lst_in", "Kitchen Signature:" );
                 $sheet->getStyle("B$lst_in")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                 $sheet->getStyle("B$lst_in")->getFont()->setSize(12);
                 $spreadsheet->getActiveSheet()->getStyle("B$lst_in")->getFont()->setBold( true ); 
                  
                   $sheet->setCellValue("I$lst_in", 'Date: '.$set_strt_dt );
                   $sheet->getStyle("I$lst_in")->getFont()->setSize(12);
                   $spreadsheet->getActiveSheet()->getStyle("I$lst_in")->getFont()->setBold( true );
                  $lst_in +=2;
                   
                 $sheet->mergeCells("B$lst_in:E$lst_in");
                 $sheet->getRowDimension($lst_in)->setRowHeight(20);
                 $sheet->setCellValue("B$lst_in", "Driver Signature:" );
                 $sheet->getStyle("B$lst_in")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                 $sheet->getStyle("B$lst_in")->getFont()->setSize(12);
                 $spreadsheet->getActiveSheet()->getStyle("B$lst_in")->getFont()->setBold( true );
                 
                 
           
                           
                           
           
           
           
           
           
           
                        if($num==160 AND count($sorted_data) != $num){
                //   echo'  New page prep start';
                        // echo '<br>i am number num   > 120 & <=160 inside ==160 check :'.$num;
                        // echo 'i was val in > 120 & <=160 inside ==160 check, so  before  :'.$in;
                    
                    //   $new_indicator=$in+0;
                    //   echo 'new_indicator:'.$new_indicator;
                      
                      
                    //   echo ' <br> I RUN WHEN NUM IS 160 and total values are remaing........... HERE LST_IN IS'.$lst_in;
                      
                      
                      
                    //   New PAge for print
                    
                    // echo '*****************NEW PAGE CODE RUNS*********';
                     $lst_in +=9; // to maintain the 60th row new start
                     
                    //  echo '<br><br> LSt in is:'.$lst_in;
                     
                      $sheet->mergeCells("A$lst_in:I$lst_in");
                      $lst_in2 = $lst_in + 1;
                      $sheet->mergeCells("B$lst_in2:H$lst_in2");
                      $sheet->getRowDimension($lst_in2)->setRowHeight(30);
                      
                      
                       $img = './assets/images/logos-logo-full.png';
                         $objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
                         $objDrawing->setName('Sample image');
                         $objDrawing->setDescription('Sample image');
                         $objDrawing->setPath($img);
                         $objDrawing->setHeight(30);
                         $objDrawing->setCoordinates("E$lst_in2");
                         $objDrawing->setOffsetX(15);
                         $objDrawing->setOffsetY(8);
            
                         $objDrawing->setWorksheet($spreadsheet->getActiveSheet());
          
                    
                          $sheet->getStyle("E$lst_in2")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                          $sheet->getStyle("E$lst_in2")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
      
                          $spreadsheet->getActiveSheet()->getStyle("B$lst_in2:I$lst_in2")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                          $spreadsheet->getActiveSheet()->getStyle("B$lst_in2:I$lst_in2")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
          
                    
                          $sheet->setCellValue("I$lst_in2","Date:".$set_strt_dt."-".$set_end_dt);
                          $sheet->getStyle("I$lst_in2")->getFont()->setName('Times New Roman');
                          $sheet->getStyle("I$lst_in2")->getFont()->setSize(8);
                          
                          $lst_in3 = $lst_in2 + 1;
           
                            $sheet->mergeCells("B$lst_in3:G$lst_in3");
                            $sheet->mergeCells("H$lst_in3:I$lst_in3");
                            
                            
                            $sheet->getRowDimension($lst_in)->setRowHeight(7);
                            $sheet->setCellValue("B$lst_in3","DELIVERY PICK UP ".strtoupper($main_title)); 
                            $sheet->getStyle("B$lst_in3")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                            $sheet->getStyle("B$lst_in3")->getFont()->setSize(20);
                            $spreadsheet->getActiveSheet()->getStyle("B$lst_in3")->getFont()->setBold( true );
                            
                            $spreadsheet->getActiveSheet()->getStyle("B$lst_in3:I$lst_in3")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                            
                            $lst_in4 =$lst_in3 + 1;
                            
                            $sheet->mergeCells("B$lst_in4:I$lst_in4");
                            $sheet->getRowDimension($lst_in4)->setRowHeight(4);
                            
                            $spreadsheet->getActiveSheet()->getStyle("B$lst_in4:I$lst_in4")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                            
                            
                             $lst_in_borders= $lst_in + 50;
                            //  echo '<br><br> LSt in lst_in_borders :'.$lst_in_borders;
                             
                              $spreadsheet->getActiveSheet()->getStyle("B$lst_in_borders:I$lst_in_borders")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                                $spreadsheet->getActiveSheet()->getStyle("B$lst_in2:I$lst_in2")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                                $spreadsheet->getActiveSheet()->getStyle("B$lst_in2:B$lst_in_borders")->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                                $spreadsheet->getActiveSheet()->getStyle("I$lst_in2:I$lst_in_borders")->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                          
                          
                          
                          
                                       foreach(range('A','H') as $columnID) {
                                           $updt_lstin4=$lst_in4+1;
      	                                     $cl_str=$columnID.$updt_lstin4;
      	                                     $cl_end=$columnID.$lst_in_borders;
      	                                    $spreadsheet->getActiveSheet()->getStyle("$cl_str:$cl_end")->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
             
      	                                 }
                             	
                      
                            $in=$lst_in4;
                            $secure_indicator=$lst_in4;
                             $num=0;
                             
                            //  echo '<br> *****NEw PAGE VALUES ARE *******<br>';
                            //  echo '<br>in is: '.$in;
                            //  echo '<br>secure_indicator is: '.$secure_indicator;
                            //  echo '<br>num is: '.$num;
                            //   echo '<br>i am total_exist  :  '.$total_exist;
                 }
           
         }
               
                 $in +=1;
        		 $num +=1;
        

     }

   }
   
   
//   die();

         		$spreadsheet->getActiveSheet()->getStyle("B2:I2")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("B51:I51")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("B2:B51")->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
                $spreadsheet->getActiveSheet()->getStyle("I2:I51")->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
      
      //Taha
  	
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="'.$sorted_data[0]->vendor.'_'.date('Y-m-d_(H:i:s)').'.xlsx"');
		$writer->save("php://output");

	// END OF MAIN IF	
   }else{
       
       $this->session->set_flashdata('error', 'No Record Found, Try Again!');
              redirect('vendor_deliveries_complete_report');
       
       } 
       
}




// AyeshaG
function excel_for_assigned()
	{
	    
	    
	   // echo '<pre>';
	   // print_r($this->input->post());
	   // die();
	     $start_date = @$_POST['from'];
        $end_date = @$_POST['to'];
       

        if(!$start_date){
            $start_date = date('Y-m-d h:i:s', strtotime($start_date));
        }

        if(!$end_date){
            $end_date = date('Y-m-d h:i:s');
        }
        
       if(($start_date) AND ($end_date)){
                  if($this->session->userdata('role') != 'vendor'){
                        $where = "o.action != 'Freezed' and o.action != 'Paused' and o.driver_id > 0 and o.status !='Delivered' and o.status!='Collected' and delivery_date BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59'";
                }else{
                          $where = "o.action != 'Freezed' and o.action != 'Paused' and o.driver_id > 0 and o.status !='Delivered' and o.status!='Collected' and delivery_date BETWEEN '".$start_date." 00:00:00' and '".$end_date." 23:59:59' AND o.vendor_id = ".$this->session->userdata('u_id');
                   }
                
               $data =  $this->order_model->get_xls_sheet_assigned($where);
        // echo '<pre>';
        // print_r($data);
        // die();
                 
      }
   
                
                
       
        $sorted_data=$data;
	    
if(count($sorted_data) > 0 ){
    
    
          $yrdata= strtotime($start_date);
          $set_strt_dt=date('d M Y', $yrdata);
         
          $yrdata= strtotime($end_date);
          $set_end_dt=date('d M Y', $yrdata);
         

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		
	    	$sheet->mergeCells('B1:D1');
          $sheet->mergeCells('A2:E2');
          $sheet->getRowDimension(2)->setRowHeight(7);


          
          $img = './assets/images/logos-logo-full.png';
            $objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
            $objDrawing->setName('Sample image');
            $objDrawing->setDescription('Sample image');
            $objDrawing->setPath($img);
            $objDrawing->setHeight(22);
            $objDrawing->setCoordinates('E1');
            $objDrawing->setOffsetX(13);
            $objDrawing->setOffsetY(6);
            
            $objDrawing->setWorksheet($spreadsheet->getActiveSheet());
          
          
           $sheet->getStyle('E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
           $sheet->getStyle('E1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
      
        //   $spreadsheet->getActiveSheet()->getStyle("A2:E2")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
          $spreadsheet->getActiveSheet()->getStyle("A2:E2")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
             
          
           $sheet->setCellValue('A1','Date:'.$set_strt_dt.'-'.$set_end_dt);
           $sheet->getStyle("A1")->getFont()->setName('Times New Roman');
           $sheet->getStyle("A1")->getFont()->setSize(8);
           
            
         
        //   -----------------------------------------------------------------------------
          //dadag
        //   $sheet->mergeCells('E1:I1');
           
        
            $sheet->setCellValue('B1','DELIVERY SHEET FOR '.$set_strt_dt); 
            $sheet->getStyle('B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle("B1")->getFont()->setSize(16);
            $spreadsheet->getActiveSheet()->getStyle("B1")->getFont()->setBold( true );
            $spreadsheet->getActiveSheet()->getStyle("A1:E1")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
           
      
        //   $sheet->mergeCells('A4:E4');
        //   $sheet->getRowDimension(4)->setRowHeight(4);
          
        //     $spreadsheet->getActiveSheet()->getStyle("A4:E4")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);





		
		
		
		
		
		
		
		

		$sheet->setCellValue('A3', 'Customer');
		$sheet->setCellValue('B3', 'Driver');
		$sheet->setCellValue('C3', 'Delivery Address');
		$sheet->setCellValue('D3', 'Time Slot');
		$sheet->setCellValue('E3', 'Partner');
		
		
        
		$styleArrayFirstRow = [
            'font' => [
                'bold' => true,
            ],
            ['fill_solid' => 'e3eb8a']
        ];
        $highestColumn = $sheet->getHighestColumn();
        $sheet->getStyle('A3:' . $highestColumn . '3' )->applyFromArray($styleArrayFirstRow);
 
        $sheet->getStyle('A3:E3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('4BACC6');

// 		$sheet->getStyle('1:1')->getFont()->setBold(true);
		$sheet->getStyle('3:3')->getFont()->setBold(true);
		//$sheet->getColumnDimension('D')->setWidth(25);
		
		$spreadsheet->getActiveSheet()->getStyle("A3:E3")->getFont()->setSize(12);

		foreach(range('A','E') as $columnID) {
		    
		     $cl_str=$columnID.'3';
      	    $cl_end=$columnID.'2000';
      	     
      	     $spreadsheet->getActiveSheet()->getStyle("$cl_str:$cl_end")->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
             
		    if($columnID == 'A' OR $columnID == 'E'){
    			$sheet->getColumnDimension($columnID)->setWidth(30);
		    }elseif($columnID == 'C'){
		        	$sheet->getColumnDimension($columnID)->setWidth(60);
		    }else{
		        	$sheet->getColumnDimension($columnID)->setWidth(20);
		    }
		} 
		
		$in=4;
$writer = new Xlsx($spreadsheet);
     foreach($sorted_data as $data =>$val){
         
     $spreadsheet->getActiveSheet()->getStyle("A$in:E$in")->getFont()->setSize(11);
       $spreadsheet->getActiveSheet()->getStyle("A$in:E$in")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
 
		$sheet->setCellValue("A$in", $val->customer);
		$sheet->setCellValue("B$in", $val->driver);
		$sheet->setCellValue("C$in", $val->address);
		$sheet->setCellValue("D$in", $val->timeslot);
		$sheet->setCellValue("E$in", $val->vendor);
		
		$in +=1;
		
		
		  }

	
	
		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		
		header('Content-Disposition: attachment; filename="DeliverySheetAssigned_'.date('Y-m-d_(H:i:s)').'.xlsx"');
		
	
		$writer->save("php://output"); 
		

		//$writer->save('Sample Deliveries.xlsx');
	}else{
       
       $this->session->set_flashdata('error', 'No Record Found, Try Again!');
              redirect('order');
       
       } 



	}



	
}

 ?>