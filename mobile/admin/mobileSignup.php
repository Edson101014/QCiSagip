<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>iSagip-PAS CI</title>
    <link rel="icon" href="../assets/adopt-logo.png">

    <link rel="stylesheet" href="./css/style.css" />

    <link rel="stylesheet" href="./css/mobileSignup.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./js/mobileSignup.js"></script>
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>

<body>
    <main>
        <!-- <div class="bg-img">
        <img src="../images/4.png" alt="background-image" />
      </div> -->

        <section>
            <div class="mobile-logo">
                <img src="../assets/mobile-logo.png" alt="Logo" />
            </div>
            <div class="register-container">
                <div class="register">

                    <div class="register-header">
                        <h2 class="register-title">REGISTER</h2>
                        <p class="register-desc small">
                            Text Field that has (<span class="alert-red">*</span>) is
                            required
                        </p>
                        <div class="invalid-feedback" id="missing-feedback"></div>
                        
                        
                        <div class="invalid-feedback" id="email-feedback"></div>
                        <div class="invalid-feedback" id="contact-feedback"></div>
                        <div class="invalid-feedback" id="password-feedback"></div>
                        <div class="invalid-feedback" id="password-strong"></div>
                        <div class="invalid-feedback" id="confirm-password-feedback"></div>
                    </div>

                    <div class="register-content">
                        <form id="checking" action="./function/signup.php" method="post" class="register-form">

                            <div class="register-two-inputs">
                                <div class="register-input">
                                    <span for="firstname" class="small">First Name <span class="alert-red">*</span></span>
                                    <input type="text" name="firstname" id="firstname" class="firstname" required />
                                </div>

                                <div class="register-input">
                                    <span for="lastname" class="small">Last Name <span class="alert-red">*</span></span>
                                    <input type="text" name="lastname" id="lastname" class="lastname" required />
                                </div>
                            </div>

                            <div class="register-two-inputs">
                                <div class="register-input">
                                    <span for="email" class="small">Email <span class="alert-red">*</span></span>
                                    <input type="text" class="email" id="email" name="email" required />
                                </div>

                                <div class="register-input">
                                    <span for="phonenumber" class="small">Phone Number <span class="alert-red">*</span></span>
                                    <input type="text" class="contact" id="contact" name="contact" placeholder="ex. 09123456789" required maxlength="11" />
                                </div>
                            </div>

                            <div class="register-three-inputs">
                                <div class="register-input">
                                    <span for="province" class="small">Province </span>
                                    <select name="province" id="province">
                                        <option value="Metro Manila">Metro Manila</option>
                                    </select>
                                </div>

                                <div class="register-input">
                                    <span for="city" class="small">City</span>

                                    <select name="city" id="city">
                                        <option value="Quezon City">Quezon City</option>
                                    </select>
                                </div>

                                <div class="register-input">
                                    <span for="barangay" class="small">Barangay <span class="alert-red"></span></span>
                                    <select name="barangay" id="barangay">
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
                                <span for="street" class="small">Street <span class="alert-red">*</span></span>
                                <input type="text" name="street" id="street" class="address" required />
                            </div>


                            <div class="register-two-inputs">
                                <div class="register-input password-all">
                                    <span for="password" class="small">Password <span class="alert-red">*</span></span>
                                    <input type="password" name="password" id="password" class="password" required />
                                    <span class="password-toggle">
                                        <i class="fa fa-eye-slash"></i>
                                    </span>
                                </div>

                                <div class="register-input password-all">
                                    <span for="password" class="small">Repeat Password <span class="alert-red">*</span></span>
                                    <input type="password" id="confirm-password" class="confirm-password" name="confirm_password" required />
                                    <span class="confirmpassword-toggle">
                                        <i class="fa fa-eye-slash"></i>
                                    </span>
                                </div>
                            </div>

                            <button type="submit" class="btn-primary" id="signup-button">SIGN UP</button>

                            <p class="small" style="text-align: center">
                                Already have an account? Click
                                <a href="mobileSignin.php" class="clr-primary">Here!</a>
                            </p>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- ------SCRIPTS-------- -->
    <!-- JQUERY for some animation  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Slick Slider  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>