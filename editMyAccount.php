<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption</title>
    <link rel="icon" href="assets/adopt-logo.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/editMyAccount.css">
    <link rel="stylesheet" href="css/verifyAccount.css">
    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="./js/editMyAccount.js"></script>
    <?php
    include "./db/db_con.php";
    include "./function/checksession.php";
    include "./function/CheckAddress.php";
    include "./function/fetch_data.php";
    ?>
</head>

<body>

    <?php
    include_once('navigation.php');
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {

        if (mysqli_num_rows($result_user) > 0) {
            // Output data of each row
            while ($row = mysqli_fetch_assoc($result_user)) {

                $address = $row['address'];
                $components = extractAddressComponents($address);
                $street = $components['street'];

                $subdivision = $components['subdivision'];
                $barangay = $components['barangay'];
                $barangay = str_replace('Brgy. ', '', $barangay);

                if (!empty($subdivision)) {
                    $address_field =  $subdivision;
                } else {
                    $address_field = $street;
                }

    ?>

                <main>
                    <div>
                        <!-- <div class="img">
                            <img src="assets/mobile-logo.png" alt="Logo">
                        </div> -->
                        <div class="heading">
                            <div class="back"><a href="myAccount.php?page=account"><i class="fas fa-chevron-left"></i></a>
                                <h2>Edit Basic Information</h2>
                            </div>

                            <div class="invalid-feedback" id="missing-feedback"></div>
                            <div class="invalid-feedback" id="firstname-feedback"></div>
                            <div class="invalid-feedback" id="lastname-feedback"></div>
                            <div class="invalid-feedback" id="email-feedback"></div>
                            <div class="invalid-feedback" id="contact-feedback"></div>
                            <div class="invalid-feedback" id="street-feedback"></div>
                        </div>
                        <form id="checking" action="function/updateProfile.php" method="post">
                            <div class="input">
                                <div class="card-two-inputs">
                                    <div class="card-input">
                                        <span for="firstname">First Name <span class="alert-red">*</span></span>
                                        <?php echo '<input type="text" class="firstname" id="firstname" value="' . $row["firstname"] . '" name="firstname" required />'; ?>
                                    </div>

                                    <div class="card-input">
                                        <span for="lastname">Last Name <span class="alert-red">*</span></span>
                                        <?php echo '<input type="text" class="lastname" id="lastname" value="' . $row["lastname"] . '" name="lastname" required />';
                                        ?>
                                    </div>
                                </div>

                                <div class="card-two-inputs">
                                    <div class="register-input">
                                        <span for="email">Email <span class="alert-red">*</span></span>
                                        <?php if (isset($_SESSION['google_user']) && $_SESSION['google_user'] == true) {
                                            echo '<select name="email" class="email" id="email">
                                            <option value="' . $row["email"] . '">' . $row["email"] . '</option>
                                            </select>';
                                        } else {
                                            echo '<input type="text" class="email" id="email" value="' . $row["email"] . '"  name="email" required />';
                                        } ?>

                                    </div>

                                    <div class="register-input">
                                        <span for="phonenumber">Phone Number <span class="alert-red">*</span></span>
                                        <?php echo '<input type="text" class="contact" id="contact" value="' . $row["contact"] . '"   name="contact" placeholder="ex. 09123456789" required maxlength="11" />'; ?>
                                    </div>
                                </div>


                                <div class="card-three-inputs">
                                    <div class="register-input">
                                        <span for="province">Province </span>
                                        <select name="province" id="province">
                                            <option value="Metro Manila">Metro Manila</option>

                                        </select>
                                    </div>


                                    <div class="register-input">
                                        <span for="city">City</span>

                                        <select name="city" id="city">
                                            <option value="Quezon City">Quezon City</option>
                                        </select>
                                    </div>

                                    <div class="register-input">
                                        <span for="barangay">Barangay <span class="alert-red"></span></span>
                                        <select name="barangay" id="barangay">
                                            <?php echo '<option value="' . $barangay . '">' . $barangay . '</option>'; ?>
                                            <option value="Alicia">Alicia</option>
                                            <option value="Amihan">Amihan</option>
                                            <option value="Apolonio Samson">Apolonio Samson</option>
                                            <option value="Aurora">Aurora</option>
                                            <option value="Baesa">Baesa</option>
                                            <option value="Bagbag">Bagbag</option>
                                            <option value="Bagong Lipunan Ng Crame">Bagong Lipunan Ng Crame</option>
                                            <option value="Bagong Pag-asa">Bagong Pag-asa</option>
                                            <option value="Bagong Silangan">Bagong Silangan</option>
                                            <option value="Bagumbayan">Bagumbayan</option>
                                            <option value="Bagumbuhay">Bagumbuhay</option>
                                            <option value="Bahay Toro">Bahay Toro</option>
                                            <option value="Balingasa">Balingasa</option>
                                            <option value="Balong Bato">Balong Bato</option>
                                            <option value="Batasan Hills">Batasan Hills</option>
                                            <option value="Bayanihan">Bayanihan</option>
                                            <option value="Blue Ridge A">Blue Ridge A</option>
                                            <option value="Blue Ridge B">Blue Ridge B</option>
                                            <option value="Botocan">Botocan</option>
                                            <option value="Bungad">Bungad</option>
                                            <option value="Camp Aguinaldo">Camp Aguinaldo</option>
                                            <option value="Capri">Capri</option>
                                            <option value="Central">Central</option>
                                            <option value="Claro">Claro</option>
                                            <option value="Commonwealth">Commonwealth</option>
                                            <option value="Culiat">Culiat</option>
                                            <option value="Damar">Damar</option>
                                            <option value="Damayan">Damayan</option>
                                            <option value="Damayang Lagi">Damayang Lagi</option>
                                            <option value="Del Monte">Del Monte</option>
                                            <option value="Dioquino Zobel">Dioquino Zobel</option>
                                            <option value="Doña Imelda">Doña Imelda</option>
                                            <option value="Doña Josefa">Doña Josefa</option>
                                            <option value="Don Manuel">Don Manuel</option>
                                            <option value="Duyan-Duyan">Duyan-Duyan</option>
                                            <option value="East Kamias">East Kamias</option>
                                            <option value="E. Rodriguez">E. Rodriguez</option>
                                            <option value="Escopa I">Escopa I</option>
                                            <option value="Escopa II">Escopa II</option>
                                            <option value="Escopa III">Escopa III</option>
                                            <option value="Escopa IV">Escopa IV</option>
                                            <option value="Fairview">Fairview</option>
                                            <option value="Greater Lagro">Greater Lagro</option>
                                            <option value="Gulod">Gulod</option>
                                            <option value="Holy Spirit">Holy Spirit</option>
                                            <option value="Horseshoe">Horseshoe</option>
                                            <option value="Immaculate Concepcion">Immaculate Concepcion</option>
                                            <option value="Kaligayahan">Kaligayahan</option>
                                            <option value="Kalusugan">Kalusugan</option>
                                            <option value="Kamuning">Kamuning</option>
                                            <option value="Katipunan">Katipunan</option>
                                            <option value="Kaunlaran">Kaunlaran</option>
                                            <option value="Kristong Hari">Kristong Hari</option>
                                            <option value="Krus Na Ligas">Krus Na Ligas</option>
                                            <option value="Laging Handa">Laging Handa</option>
                                            <option value="Libis">Libis</option>
                                            <option value="Lourdes">Lourdes</option>
                                            <option value="Loyola Heights">Loyola Heights</option>
                                            <option value="Maharlika">Maharlika</option>
                                            <option value="Malaya">Malaya</option>
                                            <option value="Mangga">Mangga</option>
                                            <option value="Manresa">Manresa</option>
                                            <option value="Mariana">Mariana</option>
                                            <option value="Mariblo">Mariblo</option>
                                            <option value="Marilag">Marilag</option>
                                            <option value="Masagana">Masagana</option>
                                            <option value="Masambong">Masambong</option>
                                            <option value="Matandang Balara">Matandang Balara</option>
                                            <option value="Milagrosa">Milagrosa</option>
                                            <option value="Nagkaisang Nayon">Nagkaisang Nayon</option>
                                            <option value="Nayong Kanluran">Nayong Kanluran</option>
                                            <option value="New Era (Constitution Hills)">New Era (Constitution Hills)
                                            </option>
                                            <option value="North Fairview">North Fairview</option>
                                            <option value="Novaliches Proper">Novaliches Proper</option>
                                            <option value="N. S. Amoranto (Gintong Silahis)">N. S. Amoranto (Gintong
                                                Silahis)</option>
                                            <option value="Obrero">Obrero</option>
                                            <option value="Old Capitol Site">Old Capitol Site</option>
                                            <option value="Paang Bundok">Paang Bundok</option>
                                            <option value="Pag-ibig Sa Nayon">Pag-ibig Sa Nayon</option>
                                            <option value="Paligsahan">Paligsahan</option>
                                            <option value="Paltok">Paltok</option>
                                            <option value="Pansol">Pansol</option>
                                            <option value="Paraiso">Paraiso</option>
                                            <option value="Pasong Putik Proper (Pasong Putik)">Pasong Putik Proper (Pasong
                                                Putik)</option>
                                            <option value="Pasong Tamo">Pasong Tamo</option>
                                            <option value="Payatas">Payatas</option>
                                            <option value="Phil-Am">Phil-Am</option>
                                            <option value="Pinagkaisahan">Pinagkaisahan</option>
                                            <option value="Pinyahan">Pinyahan</option>
                                            <option value="Project 6">Project 6</option>
                                            <option value="Quirino 2-A">Quirino 2-A</option>
                                            <option value="Quirino 2-B">Quirino 2-B</option>
                                            <option value="Quirino 2-C">Quirino 2-C</option>
                                            <option value="Quirino 3-A">Quirino 3-A</option>
                                            <option value="Ramon Magsaysay">Ramon Magsaysay</option>
                                            <option value="Roxas">Roxas</option>
                                            <option value="Sacred Heart">Sacred Heart</option>
                                            <option value="Saint Ignatius">Saint Ignatius</option>
                                            <option value="Saint Peter">Saint Peter</option>
                                            <option value="Salvacion">Salvacion</option>
                                            <option value="San Agustin">San Agustin</option>
                                            <option value="San Antonio">San Antonio</option>
                                            <option value="San Bartolome">San Bartolome</option>
                                            <option value="Sangandaan">Sangandaan</option>
                                            <option value="San Isidro">San Isidro</option>
                                            <option value="San Isidro Labrador">San Isidro Labrador</option>
                                            <option value="San Jose">San Jose</option>
                                            <option value="San Martin De Porres">San Martin De Porres</option>
                                            <option value="San Roque">San Roque</option>
                                            <option value="Santa Cruz">Santa Cruz</option>
                                            <option value="Santa Lucia">Santa Lucia</option>
                                            <option value="Santa Monica">Santa Monica</option>
                                            <option value="Santa Teresita">Santa Teresita</option>
                                            <option value="Santo Cristo">Santo Cristo</option>
                                            <option value="Santo Domingo (Matalahib)">Santo Domingo (Matalahib)</option>
                                            <option value="Santol">Santol</option>
                                            <option value="Santo Niño">Santo Niño</option>
                                            <option value="San Vicente">San Vicente</option>
                                            <option value="Sauyo">Sauyo</option>
                                            <option value="Sienna">Sienna</option>
                                            <option value="Sikatuna Village">Sikatuna Village</option>
                                            <option value="Silangan">Silangan</option>
                                            <option value="Socorro">Socorro</option>
                                            <option value="South Triangle">South Triangle</option>
                                            <option value="Tagumpay">Tagumpay</option>
                                            <option value="Talayan">Talayan</option>
                                            <option value="Talipapa">Talipapa</option>
                                            <option value="Tandang Sora">Tandang Sora</option>
                                            <option value="Tatalon">Tatalon</option>
                                            <option value="Teachers Village East">Teachers Village East</option>
                                            <option value="Teachers Village West">Teachers Village West</option>
                                            <option value="Ugong Norte">Ugong Norte</option>
                                            <option value="Unang Sigaw">Unang Sigaw</option>
                                            <option value="U.P. Campus">U.P. Campus</option>
                                            <option value="U.P. Village">U.P. Village</option>
                                            <option value="Valencia">Valencia</option>
                                            <option value="Vasra">Vasra</option>
                                            <option value="Veterans Village">Veterans Village</option>
                                            <option value="Villa Maria Clara">Villa Maria Clara</option>
                                            <option value="West Kamias">West Kamias</option>
                                            <option value="West Triangle">West Triangle</option>
                                            <option value="White Plains">White Plains</option>
                                        </select>
                                    </div>
                                </div>



                                <div class="register-input">
                                    <span for="street">Street <span class="alert-red">*</span></span>
                                    <?php
                                    echo '<input type="text" name="street" id="street" class="address" value="' . $address_field . '" required />';

                                    ?>
                                </div>
                    <?php
                }
            }
        }
                    ?>
                    <div class="form-btn">
                        <!-- <a href="myAccount.php?page=account" class="primary">Cancel</a> -->
                        <button type="submit" id="login-button" class="submit-btn">Submit</button>
                    </div>
                            </div>
                        </form>
                    </div>
                </main>
                <?php

                include_once('footer.php');
                ?>

                <!-- SCRIPTS -->



</body>

</html>