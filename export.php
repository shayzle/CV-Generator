<?php

require __DIR__ . '/vendor/autoload.php';
// include __DIR__ . '/css/style.css';

use Dompdf\Dompdf;
use Dompdf\Options;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit('Invalid request');
}

// LES DATAS
$firstname   = $_POST['firstname'] ?? '';
$middlename  = $_POST['middlename'] ?? '';
$lastname    = $_POST['lastname'] ?? '';
$designation = $_POST['designation'] ?? '';
$email       = $_POST['email'] ?? '';
$phone       = $_POST['phonenumber'] ?? '';
$address     = $_POST['address'] ?? '';
$summary     = $_POST['summary'] ?? '';

$skills       = $_POST['group-e'] ?? [];
$achievements = $_POST['group-a'] ?? [];
$educations   = $_POST['group-c'] ?? [];
$experiences  = $_POST['group-b'] ?? [];
$projects     = $_POST['group-d'] ?? [];


// L'IMAGE
$profileImg = '';
if (!empty($_FILES['image']['tmp_name'])) {
    $imgData = file_get_contents($_FILES['image']['tmp_name']);
    $imgType = mime_content_type($_FILES['image']['tmp_name']);
    $profileImg = 'data:' . $imgType . ';base64,' . base64_encode($imgData);
}


// HTML
$html = '
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>

@page {
  size: A4;
  margin: 10mm;
}

body {
  transform: scale(0.85);
  transform-origin: top left;
}

html, body {
  margin: 0;
  padding: 0;
  width: 100%;
  // height: 100%;
  font-family: DejaVu Sans, sans-serif;
}

.page {
  width: 100%;
  height: 100%;
  // display: table;
  display: block;
  // display: flex;
}

.page::after {
  content: "";
  display: block;
  clear: both;
}

.left, .right {
  // display: table-cell;
  vertical-align: top;
  height: 95%;
  float: left;
}

.left {
  width: 40%;
  background: #084C41;
  color: white;
  padding: 20px;
}

.right {
  width: 60%;
  padding: 20px;
}

.photo {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    overflow: hidden;
    margin: 0 auto 10px auto;
}
.photo img{
    width: 100%;
    // height: 100%;
    object-fit: cover;
}

.name {
  text-align: center;
  font-size: 20px;
  font-weight: bold;
  padding: 7px 0 7px 0;
}

.role {
  text-align: center;
  font-size: 11px;
  letter-spacing: 1px;
  margin: 6px 0 18px;
}

h2 {
  font-size: 12px;
  margin: 18px 0 6px;
  padding-bottom: 4px;
}

.left h2 {
  border-bottom: 1px solid rgba(255,255,255,0.3);
}

.right h2 {
  border-bottom: 1px solid #ddd;
}

p, li {
  font-size: 11px;
  line-height: 1.4;
  margin: 4px 0;
}

ul {
  padding-left: 15px;
  margin: 0;
}

.item {
  width: 100%;
  overflow: hidden;
}

.item-left {
  display: inline-block;
  width: 75%;
  vertical-align: top;
}

.item-right {
  display: inline-block;
  width: 23%;
  text-align: right;
  font-style: italic;
  font-size: 10px;
  color: #000000;
  vertical-align: top;
}

</style>
</head>

<body>
<div class="page">

  <div class="left">';

if ($profileImg) {
    $html .= '
    <div class="photo">
      <img src="' . $profileImg . '">
    </div>';
}

$html .= '
    <div class="name">' . htmlspecialchars("$firstname $middlename $lastname") . '</div>
    <div class="role">' . strtoupper(htmlspecialchars($designation)) . '</div>

    <h2>ABOUT</h2>
    <p>' . htmlspecialchars($phone) . '</p>
    <p>' . htmlspecialchars($email) . '</p>
    <p>' . htmlspecialchars($address) . '</p>
    <p>' . htmlspecialchars($summary) . '</p>

    <h2>SKILLS</h2>
    <ul>';

// foreach ($skills as $s) {
//     if (!empty($s['skill'])) {
//         $html .= '<li>' . htmlspecialchars($s['skill']) . '</li>';
//     }
// }

foreach ($skills as $s) {
    $html .= '
    <li class="item">
      <div class="item-left">
        <strong>' . htmlspecialchars($s['skill'] ?? '') . '</strong><br>
      </div>
      <div class="item-right">
        <strong>' . htmlspecialchars($s['level'] ?? '') . '</strong>
      </div>
    </li>';
}


$html .= '
    </ul>
  </div>

  <div class="right">

    <h2>ACHIEVEMENTS</h2>
    <ul>';

foreach ($achievements as $a) {
    $html .= '
    <li class="item">
      <div class="item-left">
        <strong>' . htmlspecialchars($a['achieve_title'] ?? '') . '</strong><br>
        ' . htmlspecialchars($a['achieve_description'] ?? '') . '
      </div>
      <div class="item-right">
        ' . htmlspecialchars($a['achieve_date'] ?? '') . '
      </div>
    </li>';
}


$html .= '
    </ul>

    <h2>EDUCATIONS</h2>
    <ul>';

foreach ($educations as $e) {
    $html .= '
    <li class="item">
      <div class="item-left">
        <strong>' . htmlspecialchars($e['edu_school'] ?? '') . '</strong><br>
        ' . htmlspecialchars($e['edu_degree'] ?? '') . ' — ' . htmlspecialchars($e['edu_city'] ?? '') . '
      </div>
      <div class="item-right">
        ' . htmlspecialchars($e['edu_start_date'] ?? '') . ' – ' . htmlspecialchars($e['edu_graduation_date'] ?? '') . '
      </div>
    </li>';
}


$html .= '
    </ul>

    <h2>EXPERIENCES</h2>
    <ul>';

foreach ($experiences as $x) {
    $html .= '
    <li class="item">
      <div class="item-left">
        <strong>' . htmlspecialchars($x['exp_title'] ?? '') . '</strong><br>
        ' . htmlspecialchars($x['exp_organization'] ?? '') . ' — ' . htmlspecialchars($x['exp_location'] ?? '') . '
      </div>
      <div class="item-right">
        ' . htmlspecialchars($x['exp_start_date'] ?? '') . ' – ' . htmlspecialchars($x['exp_end_date'] ?? '') . '
      </div>
    </li>';
}


$html .= '
    </ul>

    <h2>PROJECTS</h2>
    <ul>';

foreach ($projects as $p) {
    $html .= '
    <li class="item">
      <div class="item-left">
        <strong>' . htmlspecialchars($p['proj_title'] ?? '') . '</strong><br>
        ' . htmlspecialchars($p['proj_description'] ?? '') . '
      </div>
      <div class="item-right">
        ' . htmlspecialchars($p['proj_link'] ?? '') . '
      </div>
    </li>';
}



$html .= '
    </ul>
  </div>
</div>
</body>
</html>
';



// // JSON
$jsonData = [
    'firstname'   => $firstname,
    'middlename'  => $middlename,
    'lastname'    => $lastname,
    'designation' => $designation,
    'email'       => $email,
    'phone'       => $phone,
    'address'     => $address,
    'summary'     => $summary,
    'skills'      => $skills,
    'achievements'=> $achievements,
    'educations'  => $educations,
    'experiences' => $experiences,
    'projects'    => $projects
];

file_put_contents(
    __DIR__ . '/careerCV.json',
    json_encode($jsonData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
);





// DOMPDF
$options = new Options();
$options->set('isRemoteEnabled', true);

$dompdf = new Dompdf($options); 
$dompdf->loadHtml($html); 
$dompdf->setPaper('A4'); 
$dompdf->render(); 

$dompdf->stream('CareerExportCV.pdf', ['Attachment' => true]); 
exit;

