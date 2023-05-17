<?php 
session_start();
$admin_id = $_SESSION['admin-id'];

require_once 'dompdf/autoload.inc.php';
include "../includes/db_con.php";
include "../includes/select_all.php";
include "../includes/date_today.php";
include "../function/application_function.php";

set_not_attended($conn, $curr_date);

use Dompdf\Dompdf;

// Load the image data from a file
$qclogo = file_get_contents('../process/qc.png');
$vetlogo = file_get_contents('../process/vet-logo.png');


// Encode the image data in base64
$qclogo_image_base64 = base64_encode($qclogo);
$vetlogo_image_base64 = base64_encode($vetlogo);


$html_content = '';

if(mysqli_num_rows($res_adoption_pending) > 0) {
    // Fetch the ref_no from the POST data
    $ref_no = $_POST['ref_no'];
    while($adoption_rows = mysqli_fetch_assoc($res_adoption_pending)) {
        // Check if the current row has the same ref_no as the one submitted
        if($adoption_rows['reference_no'] == $ref_no) {
            $date_of_application = $adoption_rows['date_of_schedule'];
            $set_new_date = new DateTime("$date_of_application");
            $date_of_appl = $set_new_date->format('M d, Y');
            $image_path = $adoption_rows['1by1_id'];
            $image_data = file_get_contents($image_path);
            $image_type = pathinfo($image_path, PATHINFO_EXTENSION);
            $image_base64 = base64_encode($image_data);
            // echo $image_path;
                
                // HTML content to be converted to PDF
                $html_content .= '<div class="user-info" style="display: flex; flex-direction: column; align-items: center; text-align: center;">';
                $html_content .= '<div style="position: absolute; left: 0;"><img src="data:image/png;base64,' . $qclogo_image_base64 . '" style="width: 1in; height: 1in;"></div>';
                $html_content .= '<div style="position: absolute; right: 0;""><img src="data:image/png;base64,' . $vetlogo_image_base64 . '" style="width: 1in; height: 1in;"></div>';
                
                $html_content .= '<ul style="text-align: center; list-style-type: none; padding: 0; margin: 0;">';
                $html_content .= '<li style="font-size: 18px; font-family: Arial, sans-serif;"><strong>Republic of the Philippines</strong></li>';
                $html_content .= '<li style="font-size: 25px;"><strong>CITY VETERINARY DEPARTMENT</strong></li>';
                $html_content .= '<li>Quezon City, Metro Manila</li>';
                $html_content .= '<br><li style="font-size: 12px;">6<sup>th</sup> Flr. QC Hall Civic A Bldg., Elliptical, Diliman Q.C.</li>';
                $html_content .= '<span style="font-size: 12px;">Email Address: qcvetdeparment@gmail.com | Tel no.: 988-4242 loc. 8036</span>';
                $html_content .= '</ul>';
                $html_content .= '</div>';

                $html_content .= '<p style="text-align:right;">DATE: <span style="font-weight:bold;">' . $adoption_rows['date_of_schedule'] . '</span></p>';
                $html_content .= '<div style="text-align:left; margin-bottom: 10px;">NAME OF ADOPTER: <span style="font-weight: bold;">' . ucwords($adoption_rows['fullname']) . '</span></div>'; 
                $html_content .= '<div style="display: flex; justify-content: space-between;">';
                $html_content .= '<div style="display: inline-block; text-align: left; margin-bottom: 10px;">ADDRESS: <span style="font-weight:bold;">' . ucwords($adoption_rows['address']) . '</span></div>';
                $html_content .= '<div style="display: inline-block; margin-bottom: 5px;">CONTACT NO.: <span style="font-weight: bold;">' . $adoption_rows['contact'] . '</span></div>';
                $html_content .= '</div>';
                $html_content .= '<hr>';
                $html_content .= '<div style="margin-bottom: 15px; text-align:left;">Details of the Adopted Pet</div>';
                $html_content .= '<div style="display: inline-block; margin-bottom: 10px;">Species: <span style="margin-right: 85px; font-weight: bold;">' . ucwords($adoption_rows['pet_species']) . '</span></div>';
                $html_content .= '<div style="display: inline-block; margin-bottom: 10px;">Breed: <span style="margin-right: 85px; font-weight: bold;">' . ucwords($adoption_rows['pet_breed']) . '</span></div>';
                $html_content .= '</div>';
                $html_content .= '<div style="display: inline-block; margin-bottom: 10px;">Color: <span style="margin-right: 85px; font-weight: bold;">' . ucwords($adoption_rows['pet_color']) . '</span></div>';
                $html_content .= '<div style="display: inline-block; margin-bottom: 10px;">Gender: <span style="font-weight: bold;">' . ucwords($adoption_rows['pet_gender']) . '</span></div>';
                $html_content .= '</div><hr>';

                $html_content .= '<p style="text-align:center;"><strong>ADOPTION CONTRACT</strong></p>';

                $html_content .= '<span>By signing below, I, the referenced ADOPTER, understand and agree to the following terms and conditions:</span>';
                $html_content .= '<ol style="text-align: justify;">';
                $html_content .= '<li>To provide proper and sufficient food, water, care, shelter and veterinary treatment as this animal may require throughout its lifetime.</li>';
                $html_content .= '<li>Not to sell, trade, give away, neglect or abandon the animal. To keep the animal in my custody, as a loved companion and member of my family.</li>';
                $html_content .= '<li>I give the QUEZON CITY VETERINARY DEPARTMENT (QCVD) permission to call my home and to inspect the premises under which this animal is kept and if during the time of inspection, the QCVD representative believes those conditions unsuitable or finds the dog unwell and/or manifesting ill treatment whatsoever, I understand, authorize and agree that QCVD shall remove this animal from my control, without prior notice or my permission. I understand that I will not have recourse of any kind resulting from such action.</li>';
                $html_content .= "<li>I am responsible for the care and control of the dog/cat and will not permit it to become a public nuisance. I agree to comply with my community's ordinances of animal control and regulation including Animal Welfare Act RA 8485 as amended by RA 10631, and Anti Rabies Act especially on humane treatment and being a responsible pet owner.</li>";
                $html_content .= '<li>I will not hold the QUEZON CITY VETERINARY DEPARTMENT, responsible for any present of future illness of this animal of for any damages which the animal may cause to any person or property. I have received Information about common diseases in animal shelters and realize that my animal may have undiagnosed medical problems or may be incubating an Infectious condition that could be contagious to my other animals. I accept responsibility for the continued veterinary care of the animal. I understand that QCVD will NOT be able to provide further assistance with diagnosis and management of this animal or any other animal in my household, but will take the animal back with questions asked.</li>';
                $html_content .= '<li>I agree to keep the center informed of my current home address and phone number.</li>';
                $html_content .= '<li>The contents of this agreement had been fully explained to me both in English, Filipino and/or dialect I understood.</li>';
                $html_content .= '</ol>';

                $html_content .= '<div style="display: flex; justify-content: space-between;">';
                $html_content .= '<div style="display: inline-block; text-indent: 30px; margin-bottom: 8px; margin-top: 8px; width: 63%;"><span style="text-decoration: underline;">_________________________________</span></div>';
                $html_content .= '<div style="display: inline-block; margin-bottom: 8px;"><span style="text-decoration: underline;">_________________________________</span></div>';
                $html_content .= '</div>';
                $html_content .= '<div style="display: flex; justify-content: space-between;">';
                $html_content .= '<div style="display: inline-block; text-indent: 30px; text-align: left; width: 63%; margin-bottom: 3px;">PROCESSED BY:</div>';
                $html_content .= '<div style="display: inline-block; margin-bottom: 3px;">SIGNATURE OVER PRINTED NAME</div>';
                $html_content .= '</div>';
                $html_content .= '<hr>';
            
                $html_content .= '<p style="text-align:center;"><strong>ADOPTION INDEMNIFICATION AGREEMENT</strong></p>';

                $html_content .= '<p style="text-indent: 30px; text-align: justify;" >This adoption Indemnification Agreement is executed by the referenced ADOPTER for and in consideration of the sum of 500.00; pursuant to SEC. 44 of the Ord. No. SP 2505 S-2016 also known as Quezon City Veterinary Code. The receipt of which is hereby indemnifies and holds harmless the QUEZON CITY LGU, QCVD, and employees against any and all claims, losses, damages, liabilities, penalties, punitive damages, expenses, reasonable legal fees and cost of any kind or amount whatsoever, including any third-party claims, that may arise out from adoption Contract.</p>';

                $html_content .= '<p style="text-indent: 30px;">IN WITNESS WHEREOF, ADOPTER has executed this Adoption Indemnification Agreement.</p>';

                $html_content .= '<div style="display: flex; justify-content: space-between;">';
                $html_content .= '<div style="display: inline-block; text-indent: 30px; text-align: left; width: 82.5%; margin-bottom: 9px; margin-top: 18px;">ADOPTER NAME & SIGNATURE: <span style="text-decoration: underline; font-weight: bold;">' . ucwords($adoption_rows['fullname']) . '</span></div>';
                $html_content .= '<div style="display: inline-block; margin-bottom: 10px;">DATE: ' . '<span style="text-decoration: underline; font-weight: bold;">' . $adoption_rows['date_of_schedule'] . '</span></div>';
                $html_content .= '<div style="display: inline-block; text-indent: 30px; text-align: left; margin-bottom: 9px; width: 82%;">WITNESS: ____________________</div>';
                $html_content .= '<div style="display: inline-block; margin-bottom: 10px;">F01IAC QCVD- 00</div>';
                $html_content .= '</div>';

                // Page 2 content
                $html_content_page2 .= '<div style="page-break-before: always;"></div>';
                // Header
                $html_content_page2 .= '<div class="user-info" style="display: flex; flex-direction: column; align-items: center; text-align: center;">';
                $html_content_page2 .= '<div style="position: absolute; left: 0;"><img src="data:image/png;base64,' . $qclogo_image_base64 . '" style="width: 1in; height: 1in;"></div>';
                $html_content_page2 .= '<div style="position: absolute; right: 0;""><img src="data:image/png;base64,' . $vetlogo_image_base64 . '" style="width: 1in; height: 1in;"></div>';
                
                $html_content_page2 .= '<ul style="text-align: center; list-style-type: none; padding: 0; margin: 0;">';
                $html_content_page2 .= '<li style="font-size: 18px; font-family: Arial, sans-serif;"><strong>Republic of the Philippines</strong></li>';
                $html_content_page2 .= '<li style="font-size: 25px;"><strong>CITY VETERINARY DEPARTMENT</strong></li>';
                $html_content_page2 .= '<li>Quezon City, Metro Manila</li>';
                $html_content_page2 .= '<br><li style="font-size: 12px;">6<sup>th</sup> Flr. QC Hall Civic A Bldg., Elliptical, Diliman Q.C.</li>';
                $html_content_page2 .= '<span style="font-size: 12px;">Email Address: qcvetdeparment@gmail.com | Tel no.: 988-4242 loc. 8036</span>';
                $html_content_page2 .= '</ul>';

                $html_content_page2 .= '<p style="text-align: center; font-size: 18px; text-decoration: underline; font-family: Arial, sans-serif; margin-top: 30px;"><strong>ADOPTION FORM</strong></p>';
                $html_content_page2 .= '</div>';

                $html_content_page2 .= '<div style="display: flex; justify-content: space-between; font-size: 12px; font-family: Arial, sans-serif; margin-bottom: 50px;">';
                $html_content_page2 .= '<div style="display: inline-block; text-indent: 30px; text-align: left; width: 63%; margin-bottom: 9px; margin-top: 40px;">( ) QCITIZEN ( ) OTHERS _________________</div>';
                $html_content_page2 .= '<div style="display: inline-block; margin-bottom: 10px;">DATE: <span style="font-weight: bold;">' . $adoption_rows['date_of_schedule'] . '</span></div>';
                $html_content_page2 .= '<div style="float: right; border: 1px solid black; padding: 5px; margin-bottom: 10px;"><img src="data:image/' . $image_type . ';base64,' . $image_base64 . '" style="width: 1in; height: 1in;"></div>';
                $html_content_page2 .= '</div>';

                $html_content_page2 .= '<p style="text-indent: 30px; font-size: 12px; font-family: Arial, sans-serif; margin-top: 55px;">NAME OF ADOPTER: <span style="font-weight: bold;">' . $adoption_rows['fullname'] . '</p>';
                $html_content_page2 .= '<p style="text-indent: 30px; font-size: 12px; font-family: Arial, sans-serif;">ADDRESS: <span style="font-weight: bold;">' .$adoption_rows['address'] . '</p>';
                //   $html_content_page2 .= '<div style="text-align: left; margin-bottom: 10px;">NAME OF ADOPTER/ADOPTER:</div>';
                $html_content_page2 .= '<p style="text-indent: 30px; font-size: 12px; font-family: Arial, sans-serif;">CONTACT NO.: <span style="font-weight: bold;">' . $adoption_rows['contact'] . '</p>';
                $html_content_page2 .= '<p style="text-indent: 30px; margin-bottom: 10px; font-size: 12px; font-family: Arial, sans-serif;">EMAIL ADDRESS: <span style="font-weight: bold;">' . $adoption_rows['email'] . '</p>';

                $html_content_page2 .= '<hr>';

                $html_content_page2 .= '<div style="display: flex; justify-content: space-between; font-size: 12px; font-family: Arial, sans-serif; margin-top: 25px;">';
                $html_content_page2 .= '<div style="display: inline-block; text-indent: 30px; text-align: left; width: 50%; margin-bottom: 10px;">REHOMED PET: <span style="font-weight: bold;">' . $adoption_rows['pet_species'] . '  NO.:_________</div>';
                $html_content_page2 .= '<div style="display: inline-block; margin-bottom: 10px;">KG/S:____________ </div>';
                $html_content_page2 .= '<div style="display: inline-block; text-indent: 60px; text-align: left; width: 50%; margin-bottom: 10px;">GENDER: <span style="font-weight: bold;">' . $adoption_rows['pet_gender'] . ' ( )N </div>';
                $html_content_page2 .= '<div style="text-indent: 60px; text-align: left; width: 50%; margin-bottom: 10px; ">BREED: <span style="font-weight: bold;">' . $adoption_rows['pet_breed'] . '</span></div>';
                $html_content_page2 .= '<div style="text-align: right; margin-bottom: 10px; text-decoration: underline;">_______________________________</div>';
                $html_content_page2 .= '<div style="text-align: right; margin-bottom: 10px;">SIGNATURE OVER PRINTED NAME</div>';
                $html_content_page2 .= '<div style="margin-left: 72.3%; text-align: left; margin-bottom: 10px;">QCV022-00</div>';
                $html_content_page2 .= '</div>';

                // Page 3 content
                $html_content_page3 .= '<div style="page-break-before: always;"></div>';
                // Header
                $html_content_page3 .= '<div class="user-info" style="display: flex; flex-direction: column; align-items: center; text-align: center;">';
                $html_content_page3 .= '<div style="position: absolute; left: 0;"><img src="data:image/png;base64,' . $qclogo_image_base64 . '" style="width: 1in; height: 1in;"></div>';
                $html_content_page3 .= '<div style="position: absolute; right: 0;""><img src="data:image/png;base64,' . $vetlogo_image_base64 . '" style="width: 1in; height: 1in;"></div>';
                
                $html_content_page3 .= '<ul style="text-align: center; list-style-type: none; padding: 0; margin: 0;">';
                $html_content_page3 .= '<li style="font-size: 18px; font-family: Arial, sans-serif;"><strong>Republic of the Philippines</strong></li>';
                $html_content_page3 .= '<li style="font-size: 25px;"><strong>CITY VETERINARY DEPARTMENT</strong></li>';
                $html_content_page3 .= '<li>Quezon City, Metro Manila</li>';
                $html_content_page3 .= '<br><li style="font-size: 12px;">6<sup>th</sup> Flr. QC Hall Civic A Bldg., Elliptical, Diliman Q.C.</li>';
                $html_content_page3 .= '<span style="font-size: 12px;">Email Address: qcvetdeparment@gmail.com | Tel no.: 988-4242 loc. 8036</span>';
                $html_content_page3 .= '</ul>';

                $html_content_page3 .= '<p style="text-align: center; font-size: 18px; text-decoration: underline; font-family: Arial, sans-serif; margin-top: 30px;"><strong>FIT FOR PET ADOPTION FORM</strong></p>';
                $html_content_page3 .= '</div>';

                $html_content_page3 .= '<div style="display: flex; justify-content: space-between; font-size: 12px; font-family: Arial, sans-serif; margin-top: 35px;">';
                $html_content_page3 .= '<div style="display: inline-block; text-indent: 30px; text-align: left; width: 65%; margin-bottom: 10px;">NAME OF ADOPTER: <span style="font-weight: bold;">' . $adoption_rows['fullname'] . '</div>';
                $html_content_page3 .= '<div style="text-indent: 30px; text-align: left; margin-bottom: 10px;">ADDRESS: <span style="font-weight: bold;">' . $adoption_rows['address'] . ' </div>';
                $html_content_page3 .= '<div style="text-indent: 30px; margin-bottom: 25px;">CONTACT #: <span style="font-weight: bold;">' . $adoption_rows['contact'] . ' </div>';
                // $html_content_page3 .= '<div style="text-indent: 30px; margin-bottom: 20px;">GENDER: <span style="font-weight: bold;">' . strtoupper($adoption_rows['pet_gender']) . '</div>';
                $html_content_page3 .= '<div style="text-indent: 30px; text-align: left; width: 65%; margin-bottom: 5px; font-size: 8px;">LAGYAN LAMANG NG TSEK() ANG MGA SUMUSUNOD BATAY SA SAGOT NG TINATANONG</div>';
                $html_content_page3 .= '<div style="text-indent: 30px; text-align: left; width: 65%; margin-bottom: 10px;">MGA KATANUNGAN/QUESTIONS: </div>';
                $html_content_page3 .= '</div>';
                $html_content_page3 .=  '<head>
                                            <style type="text/css">
                                                table {
                                                    width: 100%;
                                                    border-collapse: collapse;
                                                    font-size: 12px;
                                                    font-family: Arial, sans-serif;
                                                },
                                                td, th {
                                                    padding: 5px;
                                                    border: 1px solid black;
                                                },
                                                
                                                table td, table th {
                                                    border: 1px solid black;
                                                },
                                                
                                                table.no-border td, table.no-border th {
                                                    border: none;
                                                    padding: 5px;
                                                },
                                            </style>';
                        
                $html_content_page3 .=  '<div>
                                <table>
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>YES/OO/MERON</th>
                                            <th>NO/HINDI/WALA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>ALAGANG ASO O PUSA/EXISTING PET</td>';
                                            if ($adoption_rows['existing_pet'] == "Yes"): 
                                                $html_content_page3 .=  '<td style="text-align: center;">/</td>';
                                                $html_content_page3 .=  '<td></td>';
                                            elseif ($adoption_rows['existing_pet'] == "No"): 
                                                $html_content_page3 .=  '<td></td>';
                                                $html_content_page3 .=  '<td style="text-align: center;">/</td>';
                                            else: 
                                                $html_content_page3 .=  '<td></td>';
                                                $html_content_page3 .=  '<td></td>';
                                            endif;
                $html_content_page3 .=  '</tr>
                                        <tr>
                                            <td>PANG BETERINARYO/VETERINARY ASSISTANCE</td>';
                                            if ($adoption_rows['vet_assistance'] == "Yes"): 
                                                $html_content_page3 .=  '<td style="text-align: center;">/</td>';
                                                $html_content_page3 .=  '<td></td>';
                                            elseif ($adoption_rows['vet_assistance'] == "No"): 
                                                $html_content_page3 .=  '<td></td>';
                                                $html_content_page3 .=  '<td style="text-align: center;">/</td>';
                                            else: 
                                                $html_content_page3 .=  '<td></td>';
                                                $html_content_page3 .=  '<td></td>';
                                            endif;
                $html_content_page3 .=  '</tr>
                                        <tr>
                                            <td>SAPAT NA ESPASYO/SPACE REQUIREMENT</td>';
                                            if ($adoption_rows['space_req'] == "Yes"): 
                                                $html_content_page3 .=  '<td style="text-align: center;">/</td>';
                                                $html_content_page3 .=  '<td></td>';
                                            elseif ($adoption_rows['space_req'] == "No"): 
                                                $html_content_page3 .=  '<td></td>';
                                                $html_content_page3 .=  '<td style="text-align: center;">/</td>';
                                            else: 
                                                $html_content_page3 .=  '<td></td>';
                                                $html_content_page3 .=  '<td></td>';
                                            endif;
                $html_content_page3 .=  '</tr>
                                        <tr>
                                            <td>NANGUNGUPAHAN</td>';
                                            if ($adoption_rows['living_arrangement'] == "Rent"): 
                                                $html_content_page3 .=  '<td style="text-align: center;">/</td>';
                                                $html_content_page3 .=  '<td></td>';
                                            elseif ($adoption_rows['living_arrangement'] == "Own"): 
                                                $html_content_page3 .=  '<td></td>';
                                                $html_content_page3 .=  '<td style="text-align: center;">/</td>';
                                            else: 
                                                $html_content_page3 .=  '<td></td>';
                                                $html_content_page3 .=  '<td></td>';
                                            endif;
                $html_content_page3 .=  '</tr>
                                        <tr>
                                            <td>SARILING TAHANAN</td>';
                                            if ($adoption_rows['living_arrangement'] == "Own"): 
                                                $html_content_page3 .=  '<td style="text-align: center;">/</td>';
                                                $html_content_page3 .=  '<td></td>';
                                            elseif ($adoption_rows['living_arrangement'] == "Rent"): 
                                                $html_content_page3 .=  '<td></td>';
                                                $html_content_page3 .=  '<td style="text-align: center;">/</td>';
                                            else: 
                                                $html_content_page3 .=  '<td></td>';
                                                $html_content_page3 .=  '<td></td>';
                                            endif;
                $html_content_page3 .=  '</tr>
                                    </tbody>
                                </table>';
                $html_content_page3 .= '</div>';

                $html_content_page3 .= '<div style="text-indent: 30px; text-align: left; font-family: Arial, sans-serif; width: 65%; margin-bottom: 5px; margin-top: 10px; font-size: 12px;">PANGUNAHING PANGANGAILANGAN/BASIC NEEDS</div>';
                $html_content_page3 .= '<div style="text-indent: 30px; text-align: left; font-family: Arial, sans-serif; width: 65%; margin-bottom: 10px; font-size: 12px;">PARA SA ALAGANG HAYOP/FOR PET:  </div>';

                //table 2 contents
                $html_content_page3 .=  '<div>
                                <table>
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>YES/OO/MERON</th>
                                            <th>NO/HINDI/WALA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1. KULUNGAN/CAGES</td>';
                                            if ($adoption_rows['cage'] == "Yes"): 
                                                $html_content_page3 .=  '<td style="text-align: center;">/</td>';
                                                $html_content_page3 .=  '<td></td>';
                                            elseif ($adoption_rows['cage'] == "No"): 
                                                $html_content_page3 .=  '<td></td>';
                                                $html_content_page3 .=  '<td style="text-align: center;">/</td>';
                                            else: 
                                                $html_content_page3 .=  '<td></td>';
                                                $html_content_page3 .=  '<td></td>';
                                            endif;
                $html_content_page3 .=  '</tr>
                                        <tr>
                                            <td>2. TALI/LEASH</td>';
                                            if ($adoption_rows['leash'] == "Yes"): 
                                                $html_content_page3 .=  '<td style="text-align: center;">/</td>';
                                                $html_content_page3 .=  '<td></td>';
                                            elseif ($adoption_rows['leash'] == "No"): 
                                                $html_content_page3 .=  '<td></td>';
                                                $html_content_page3 .=  '<td style="text-align: center;">/</td>';
                                            else: 
                                                $html_content_page3 .=  '<td></td>';
                                                $html_content_page3 .=  '<td></td>';
                                            endif;
                $html_content_page3 .=  '</tr>
                                        <tr>
                                            <td>3. BAKURAN/PENS</td>';
                                            if ($adoption_rows['pens'] == "Yes"): 
                                                $html_content_page3 .=  '<td style="text-align: center;">/</td>';
                                                $html_content_page3 .=  '<td></td>';
                                            elseif ($adoption_rows['pens'] == "No"): 
                                                $html_content_page3 .=  '<td></td>';
                                                $html_content_page3 .=  '<td style="text-align: center;">/</td>';
                                            else: 
                                                $html_content_page3 .=  '<td></td>';
                                                $html_content_page3 .=  '<td></td>';
                                            endif;
                $html_content_page3 .=  '</tr>
                                        <tr>
                                            <td>4. PAGKAINAN/FEEDERER | TUBIGAN/WATERER</td>';
                                            if ($adoption_rows['feederer'] == "Yes"): 
                                                $html_content_page3 .=  '<td style="text-align: center;">/</td>';
                                                $html_content_page3 .=  '<td></td>';
                                            elseif ($adoption_rows['feederer'] == "No"): 
                                                $html_content_page3 .=  '<td></td>';
                                                $html_content_page3 .=  '<td style="text-align: center;">/</td>';
                                            else: 
                                                $html_content_page3 .=  '<td></td>';
                                                $html_content_page3 .=  '<td></td>';
                                            endif;
                $html_content_page3 .=  '</tr>
                                        <tr>
                                            <td>5. TULUGAN/SLEEPING AREA</td>';
                                            if ($adoption_rows['sleepingarea'] == "Yes"): 
                                                $html_content_page3 .=  '<td style="text-align: center;">/</td>';
                                                $html_content_page3 .=  '<td></td>';
                                            elseif ($adoption_rows['sleepingarea'] == "No"): 
                                                $html_content_page3 .=  '<td></td>';
                                                $html_content_page3 .=  '<td style="text-align: center;">/</td>';
                                            else: 
                                                $html_content_page3 .=  '<td></td>';
                                                $html_content_page3 .=  '<td></td>';
                                            endif;
                $html_content_page3 .=  '</tr>
                                        <tr>
                                            <td>6. TAMANG TAPUNAN NG DUMI/PROPER WASTE DISPOSAL</td>';
                                            if ($adoption_rows['properwaste'] == "Yes"): 
                                                $html_content_page3 .=  '<td style="text-align: center;">/</td>';
                                                $html_content_page3 .=  '<td></td>';
                                            elseif ($adoption_rows['properwaste'] == "No"): 
                                                $html_content_page3 .=  '<td></td>';
                                                $html_content_page3 .=  '<td style="text-align: center;">/</td>';
                                            else: 
                                                $html_content_page3 .=  '<td></td>';
                                                $html_content_page3 .=  '<td></td>';
                                            endif;
                $html_content_page3 .=  '</tr>
                                    </tbody>
                                </table>';
                $html_content_page3 .= '</head></div> ';

                $html_content_page3 .= '<div style="text-indent: 30px; text-align: left; font-family: Arial, sans-serif; width: 65%; margin-bottom: 5px; margin-top: 10px; font-size: 12px;">NAIS ALAGAAN: ( ) MALIIT ( ) KATAMTAMAN ( ) MALAKI</div>';

                $html_content_page3 .= '<div style="text-indent: 30px; text-align: left; font-family: Arial, sans-serif; margin-bottom: 5px; margin-top: 10px; font-size: 12px;">OTHERS/IBA PANG KOMENTO: <hr style="margin-left: 208px;"></div>';
                $html_content_page3 .= '<hr style="margin-top: 18px;">';

                $html_content_page3 .= '<div style="text-indent: 30px; font-family: Arial, sans-serif; text-align: justify; margin-bottom: 30px; margin-top: 10px; font-size: 15px;">Ako ay nagpapatunay na ang indibidwal na ito ay dumaan sa masusing pag inspeksyon at ebalwasyon sa pagsagot ng mga katanungang ukol sa pag-ampo ng alagang hayop. Ang nasabing indibidwal ay may pisikal, pinansyal at emosyonal na kakayahan na <b> _____ ANGKOP / _____ DI-ANGKOP </b>sa pag-aalaga ng aso/pusa batas sa saligang batas at ordinansa ng nasasakupang lungsod.</div>';

                $html_content_page3 .= '<div style="display: flex; justify-content: space-between; font-size: 12px; font-family: Arial, sans-serif;">';
                $html_content_page3 .= '<div style="display: inline-block; text-indent: 30px; text-align: left; margin-bottom: 5px; margin-top: 10px; margin-right: 270px;">_________________________________</div>';
                $html_content_page3 .= '<div style="display: inline-block; text-indent: 30px; text-align: left; margin-bottom: 5px; margin-top: 10px;">_________________________________</div>';
                $html_content_page3 .= '<div style="display: inline-block; text-align: left; margin-bottom: 5px; margin-right: 305px;">Adoption Inspector/Representative</div>';
                $html_content_page3 .= '<div style="display: inline-block; text-align: right; margin-bottom: 5px;">Date Inspected</div>';
                $html_content_page3 .= '<div>';

                $html_content_page3 .= '<div style="text-align: right; margin-bottom: 5px; font-family: Arial, sans-serif; margin-top: 10px; font-size: 12px;">QC-ACAC</div>';
                $html_content_page3 .= '<div style="text-align: right; margin-top: 10px; font-family: Arial, sans-serif; font-size: 12px;">Copy / Form:</div>';
                $html_content_page3 .= '<div style="text-align: right;">___________</div>';

                // invoice content
                $html_content_page4 .= '<div style="page-break-before: always;"></div>';  
                $html_content_page4 .= '<div class="user-info" style="display: flex; justify-content: space-between; align-items: center;">';
                $html_content_page4 .= '<div style="float: left; margin-left: 120px;"><img src="data:image/png;base64,' . $qclogo_image_base64 . '" style="width: 1in; height: 1in;"></div>';
                $html_content_page4 .= '<div style="float: right; margin-right: 120px; padding-left: 50px"><img src="data:image/png;base64,' . $vetlogo_image_base64 . '" style="width: 1in; height: 1in;"></div>';
                $html_content_page4 .= '</div>';
                $html_content_page4 .= '<ul style="text-align: center; list-style-type: none;">';
                $html_content_page4 .= '<li style="font-weight: 650; font-size: 1.25rem; margin-top: 25px; margin-bottom: 35px; font-family: Arial, sans-serif;"><strong>QC ANIMAL CARE & ADOPTION CENTER</strong></li>';      
                $html_content_page4 .= '<hr style="margin-left: 18px; margin-right: 30px;">';
                $html_content_page4 .= '<li style="font-weight: 650; font-size: 1.25rem; text-align: center; margin-top: 15px; margin-bottom: 35px; font-family: Arial, sans-serif;"><strong>INVOICE RECEIPT</strong></li>';  
      
                $html_content_page4 .= '<div style="text-align: justify; margin-left: 130px;">';
                $html_content_page4 .= '<div style="display: inline-block; text-align: left; width: 50%; margin-bottom: 10px; font-weight: 500; font-size: 1.25rem">Payment Reference No. </div>';
                $html_content_page4 .= '<div style="display: inline-block; margin-bottom: 10px; font-size: 1rem; width: 50%;">' . ucwords($adoption_rows['payment_reference_no']) . '</div>';
                $html_content_page4 .= '<div style="display: inline-block; text-align: left; width: 50%; margin-bottom: 10px; font-weight: 500; font-size: 1.25rem">Adopter Name </div>';
                $html_content_page4 .= '<div style="display: inline-block; margin-bottom: 10px; font-size: 1rem; width: 50%;">' . ucwords($adoption_rows['fullname']) . '</div>';
                $html_content_page4 .= '<div style="display: inline-block; text-align: left; width: 50%; margin-bottom: 10px; font-weight: 500; font-size: 1.25rem">Purpose</div>';
                $html_content_page4 .= '<div style="display: inline-block; margin-bottom: 10px; font-size: 1rem; width: 50%;">Adoption fee</div>';
                $html_content_page4 .= '<div style="display: inline-block; text-align: left; width: 50%; margin-bottom: 10px; font-weight: 500; font-size: 1.25rem">Date</div>';
                $html_content_page4 .= '<div style="display: inline-block; margin-bottom: 10px; font-size: 1rem; width: 50%;">' . $adoption_rows['date_of_schedule'] . '</div>';
                $html_content_page4 .= '<div style="display: inline-block; text-align: left; width: 50%; margin-bottom: 10px; font-weight: 500; font-size: 1.25rem">Amount Detail</div>';
                $html_content_page4 .= '<div style="display: inline-block; margin-bottom: 10px; font-size: 1rem; width: 50%;">500.00</div>';
                $html_content_page4 .= '</div>';
                $html_content_page4 .= '<hr style="margin-left: 18px; margin-right: 30px;">';
      
                $html_content_page4 .= '<div style="text-align: justify; margin-left: 130px;">';
                $html_content_page4 .= '<div style="display: inline-block; text-align: left; width: 50%; margin-bottom: 10px; font-weight: 500; font-size: 1.25rem">Total</div>';
                $html_content_page4 .= '<div style="display: inline-block; margin-top: 30px;margin-bottom: 10px; font-size: 1rem; width: 50%;">500.00</div>';
                $html_content_page4 .= '</div>';
      
                $html_content_page4 .= '<div style="background-color: #1E5372; height: 90px;">';
                $html_content_page4 .= '<div style="text-align: center; width: 100%; margin-top: 15px; margin-bottom: 20px; font-weight: 500; font-size: 1.25rem; color: white;">"OPENING UP YOUR LIFE TO A PET WHO NEEDS A HOME IS ONE OF THE MOST FULFILLING YOU CAN DO"';
                $html_content_page4 .= '<hr style="margin-left: 18px; margin-right: 30px;">';
      
                $html_content_page4 .= '<div style="display: flex; justify-content: space-between; font-size: 1rem; width: 100%;">';
                $html_content_page4 .= '<div style="text-align: left; text-indent: 10px;">Quezon City Animal Care and Adoption Center <span style="margin-left: 165px;">https://www.isagip.site</span></div>';
                $html_content_page4 .= '</div>';

// Combine the two pages into a single HTML string
$html = '<html><head><style>' . $style . '</style></head><body>' . $html_content . $html_content_page2 . $html_content_page3 . $html_content_page4 .'</body></html>';

// Instantiate the Dompdf class
// $dompdf = new Dompdf();
$dompdf = new Dompdf(array('enable_css_float' => true));

// Load HTML content into Dompdf
$dompdf->loadHtml($html);

// Set the paper size and orientation
$dompdf->setPaper('LEGAL', 'portrait');

            if(isset($_POST['decline_y'])) {

                $ref_no = $_POST['ref_no']; 

                $decline_success = decline_applicant($conn, $ref_no);

                if($decline_success){ 
                    $payment_status = 'None';
                    $payment_amount = 0;

                    $sql = "UPDATE payment 
                        JOIN adoption_transaction 
                        ON payment.reference_no = adoption_transaction.reference_no
                        SET payment.payment_status = '$payment_status', payment.payment_amount = '$payment_amount'
                        WHERE adoption_transaction.reference_no = '$ref_no'";

                    $conn->query($sql);
                    ?>
                    <script> 

                        $('.message-modal').hide(); 

                        $("#modal-appl-view").hide();

                        $('.appl-item-container').load('./php/approved_application.php');

                    </script>
                
                    <?php 

                }

                else {

                    echo mysqli_error($conn);

                }
                
            }


            if(isset($_POST['approve_y'])){
                
                $ref_no = $_POST['ref_no']; 
                
                $approve_success = approve_applicant($conn, $ref_no, $date_today);
            
                if($approve_success){
                    $payment_status = 'Paid';
                    $payment_amount = 500;


                    $sql = "UPDATE payment 
                        JOIN adoption_transaction 
                        ON payment.reference_no = adoption_transaction.reference_no
                        SET payment.payment_status = '$payment_status', payment.payment_amount = '$payment_amount'
                        WHERE adoption_transaction.reference_no = '$ref_no'";

                        
                    $conn->query($sql);

                    // Insert to CI table
                    $fullname = $adoption_rows['fullname'];
                    $ci_status = "not done";
                    $rev_status = "for revisit";
                    $rev_remarks = "pending";
                    $date_of_visit = $adoption_rows['date_of_schedule'];

                    $date_obj = new DateTime($date_of_visit);
                    $date_formatted = $date_obj->format('Y-m-d');

                    // $ci_sql = "INSERT INTO ci (reference_no, fullname, ci_status, schedule) VALUES ('$ref_no', '$fullname', '$ci_status', '$date_formatted')";
                    // $conn->query($ci_sql);
                    
                    $ci_sql_1 = "INSERT INTO ci (reference_no, fullname, ci_status, schedule) VALUES ('$ref_no', '$fullname', '$ci_status', '$date_formatted')";
                    $conn->query($ci_sql_1);

                    $ci_sql_2 = "INSERT INTO ci_revisit (reference_no, fullname, ci_rev_status, remarks, schedule) VALUES ('$ref_no', '$fullname', '$rev_status', '$rev_remarks', '$date_formatted')";
                    $conn->query($ci_sql_2);
                    
                    // Render HTML as PDF
                    $dompdf->render();
                
                    // Output the generated PDF to browser
                    $output = $dompdf->output();
                
                    ?>
                    <script> 
                    $('.message-modal').hide(); 
                    $("#modal-appl-view").hide();
                    $('.appl-item-container').load('./php/approved_application.php');

                    // Create a temporary link element to trigger the download
                    var downloadLink = document.createElement("a");
                    downloadLink.style.display = "none";
                    document.body.appendChild(downloadLink);

                    // Convert the PDF output to a Blob object
                    var byteCharacters = atob('<?php echo base64_encode($output); ?>');
                    var byteNumbers = new Array(byteCharacters.length);
                    for (var i = 0; i < byteCharacters.length; i++) {
                        byteNumbers[i] = byteCharacters.charCodeAt(i);
                        }
                        var pdfBlob = new Blob([new Uint8Array(byteNumbers)], {type: "application/pdf"});

                        // Set the link's attributes and simulate a click
                        downloadLink.href = URL.createObjectURL(pdfBlob);
                        downloadLink.download = "<?php echo $adoption_rows['fullname'];?>_<?php echo $ref_no;?>_CONTRACT_SIGNING.pdf";
                        downloadLink.click();
                    </script>
                    <?php 
                } else {
                    echo mysqli_error($conn);
                }
            }

        }
    }
}
 ?>