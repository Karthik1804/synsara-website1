<?php
//Include PHPExcel
require_once 'Classes/PHPExcel.php';
require_once 'Classes/PHPExcel/IOFactory.php';

$error = '';
$name = '';
$email = '';
$dept = '';
$college = '';
$yr = '';
$mobile = '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

function create_file($path,$name,$email,$dept,$college,$yr,$mobile){
  $objPHPExcel = new PHPExcel();
  if(file_exists($path)){
    $objPHPExcel = PHPExcel_IOFactory::load($path);
  }
    $objPHPExcel->setActiveSheetIndex(0);
  $row = $objPHPExcel->getActiveSheet()->getHighestRow();
  if($row == 1){
    ////// style/////////////
    $objPHPExcel->getDefaultStyle()->getFont()->setName('Arial')->setSize(15);
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$row, 'ID');
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$row, 'Name');
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$row, 'College');
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$row, 'Department');
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$row, 'Year');
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$row, 'Email');
    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$row, 'Mobile');
  }
  $id = $row;
  $row = $row+1;
  ////// style/////////////
  $objPHPExcel->getDefaultStyle()->getFont()->setName('Arial')->setSize(10);
  $objPHPExcel->getActiveSheet()->SetCellValue('A'.$row, $id);
  $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
  $objPHPExcel->getActiveSheet()->SetCellValue('B'.$row, $name);
  $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
  $objPHPExcel->getActiveSheet()->SetCellValue('C'.$row, $college);
  $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
  $objPHPExcel->getActiveSheet()->SetCellValue('D'.$row, $dept);
  $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
  $objPHPExcel->getActiveSheet()->SetCellValue('E'.$row, $yr);
  $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
  $objPHPExcel->getActiveSheet()->SetCellValue('F'.$row, $email);
  $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
  $objPHPExcel->getActiveSheet()->SetCellValue('G'.$row, $mobile);
  $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
  $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
  $objWriter->save($path);
  return $id;
}

function create_specific_file($path,$id,$name,$email,$dept,$college,$yr,$mobile){
  $objPHPExcel = new PHPExcel();
  if(file_exists($path)){
    $objPHPExcel = PHPExcel_IOFactory::load($path);
  }
  $objPHPExcel->setActiveSheetIndex(0);
  $row = $objPHPExcel->getActiveSheet()->getHighestRow();
  if($row == 1){
    ////// style/////////////
    $objPHPExcel->getDefaultStyle()->getFont()->setName('Arial')->setSize(15);
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$row, 'ID');
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$row, 'Name');
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$row, 'College');
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$row, 'Department');
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$row, 'Year');
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$row, 'Email');
    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$row, 'Mobile');
  }
  $row = $row+1;
  ////// style/////////////
  $objPHPExcel->getDefaultStyle()->getFont()->setName('Arial')->setSize(10);
  $objPHPExcel->getActiveSheet()->SetCellValue('A'.$row, $id);
  $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
  $objPHPExcel->getActiveSheet()->SetCellValue('B'.$row, $name);
  $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
  $objPHPExcel->getActiveSheet()->SetCellValue('C'.$row, $college);
  $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
  $objPHPExcel->getActiveSheet()->SetCellValue('D'.$row, $dept);
  $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
  $objPHPExcel->getActiveSheet()->SetCellValue('E'.$row, $yr);
  $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
  $objPHPExcel->getActiveSheet()->SetCellValue('F'.$row, $email);
  $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
  $objPHPExcel->getActiveSheet()->SetCellValue('G'.$row, $mobile);
  $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
  $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
  $objWriter->save($path);
  return $row-1;
}


if(isset($_POST["submit"]))
{
 if(empty($_POST["name"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
 }
 else
 {
  $name = clean_text($_POST["name"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$name))
  {
   $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
  }
 }
 if(empty($_POST["email"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
 }
 else
 {
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p><label class="text-danger">Invalid email format</label></p>';
  }
 }
 if(empty($_POST["college"]))
 {
  $error .= '<p><label class="text-danger">Subject is required</label></p>';
 }
 else
 {
  $college = clean_text($_POST["college"]);
 }
 if(empty($_POST["department"]))
 {
  $error .= '<p><label class="text-danger">Select Department</label></p>';
 }
 else
 {
  $dept = clean_text($_POST["department"]);
 }

 if(empty($_POST["year"]))
 {
  $error .= '<p><label class="text-danger">Select Year</label></p>';
 }
 else
 {
  $yr = clean_text($_POST["year"]);
 }

 $mobile = $_POST["mobile_no"];
 if($error == '')
 {
  $path = "downloads\\total.xlsx";
  $id = create_file($path,$name,$email,$dept,$college,$yr,$mobile);
  //echo $path." ".$id."</br>";
  if(!empty($_POST['TechList'])){
    foreach($_POST['TechList'] as $selected){
      $path = "downloads\\".$selected.".xlsx";
      $row = create_specific_file($path,$id,$name,$email,$dept,$college,$yr,$mobile);
      //echo $path." ".$row."</br>";
    }
  }

  if(!empty($_POST['NonTechEvent'])){
    foreach($_POST['NonTechEvent'] as $selected){
      $path = "downloads\\".$selected.".xlsx";
      $row = create_specific_file($path,$id,$name,$email,$dept,$college,$yr,$mobile);
      //echo $path." ".$row."</br>";
    }
  }
  $error = '<label class="text-success">Thank you for contacting us</label>';
  $name = '';
  $email = '';
  $subject = '';
  $college = '';
  $message = '';
  $mobile = '';
 }
}
?>