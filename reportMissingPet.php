<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once('head.php');
    ?>
    <link rel="stylesheet" href="css/servicesProcess.css">
</head>

<body>
    <?php
    include_once('navigation.php');
    ?>
    <main>
        <div class="header-info">
            <h3>REPORT MISSING PET</h3>
            <span>
                Text Field that has ( <span class="alert-red">*</span> ) is required
            </span>
        </div>

        <!-- Form  -->
        <form action="reportMissingPetSuccess.php" class="servicesProcessForm">
            <div class="servicesProcess servicesFirst current">
                <h4>Profile</h4>
                <div>
                    <span>Email <span class="alert-red">*</span> </span><input type="email" name="email" />
                </div>
                <div>
                    <span>Full Name <span class="alert-red">*</span> </span><input type="text" name="fullName" />
                </div>
                <div>
                    <span>Contact No. <span class="alert-red">*</span> </span><input type="text" name="contact" />
                </div>
                <div>
                    <span>Facebook Link <span class="alert-red">*</span> </span><input type="text" name="contact" />
                </div>
                <div class="formButton">
                    <button type="button" class="primary-button form-button nextBtn">
                        Next
                    </button>
                    <button type="button" class="form-button adoptCancel">
                        Cancel
                    </button>
                </div>
            </div>

            <div class="servicesProcess servicesSecond">
                <div>
                    <h4>Missing Pet Information</h4>
                    <div>
                        <span>Name of Pet <span class="alert-red">*</span>
                        </span><input type="text" name="petName" />
                    </div>
                    <div>
                        <span>Breed <span class="alert-red">*</span>
                        </span><input type="text" name="petBreed" />
                    </div>
                    <div>
                        <span>Sex <span class="alert-red">*</span> </span>
                        <select type="text" name="petSex">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div>
                        <span>Color <span class="alert-red">*</span>
                        </span><input type="text" name="petColor" />
                    </div>
                </div>

                <div class="formButton">
                    <button type="button" class="primary-button form-button nextBtn">
                        Next
                    </button>
                    <button type="button" class="form-button backBtn">Back</button>
                </div>
            </div>

            <div class="servicesProcess servicesThird">
                <div>
                    <h4>Missing Pet Information</h4>
                    <div>
                        <span>Date of Missing <span class="alert-red">*</span>
                        </span><input type="date" name="petDate" />
                    </div>
                    <div>
                        <span>Location of Missing <span class="alert-red">*</span>
                        </span><input type="text" name="petlocation" />
                    </div>
                    <div>
                        <span>Description <span class="alert-red">*</span> </span>
                        <textarea name="petDesc" id="petDesc" cols="10" rows="4"></textarea>
                    </div>
                </div>

                <div class="formButton">
                    <button type="submit" class="primary-button form-button">
                        Submit
                    </button>
                    <button type="button" class="form-button backBtn">Back</button>
                </div>
            </div>
        </form>
    </main>

    <?php
    include_once('footer.php')
    ?>
    <script src="js/servicesProcess.js"></script>
</body>

</html>