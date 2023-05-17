<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once('head.php');
    ?>
    <link rel="stylesheet" href="css/adopt.css">
</head>

<body>
    <?php
    include_once('navigation.php');
    ?>
    <div class="filter">
        <div class="missingPet">
            <a href="reportMissingPet.php">Report Missing Pet</a>
        </div>
        <div class="search">
            <input type="text" name="search" id="search" placeholder="Dogs, Cat, Others, Gender..." />
        </div>
        <div class="sort">
            <div class="filters">
                <h4>FILTERS</h4>
                <select name="type" id="type">
                    <option value="0">Type</option>
                    <option value="1">Dog</option>
                    <option value="2">Cat</option>
                </select>
                <select name="Size" id="Size">
                    <option value="0">Size</option>
                    <option value="1">Small</option>
                    <option value="2">Large</option>
                </select>
                <select name="Sex" id="Sex">
                    <option value="0">Sex</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                </select>
            </div>
        </div>
        <div class="pet-gallery">
            <a href="missingPetDetail.php">
                <div class="pet-card">
                    <img src="assets/Missing-1.png" alt="Missing Pets" />
                    <div class="pet-desc">
                        <div>
                            <span class="pet-name">Kapola</span>
                            <span>Dog - Female</span>
                        </div>
                        <div class="petcard-logo">
                            <img src="assets/icons/animalPound.jpg" alt="Logo" />
                        </div>
                    </div>
                </div>
            </a>
            <div class="pet-card">
                <img src="assets/Missing-2.png" alt="Missing Pets" />
                <div class="pet-desc">
                    <div>
                        <span class="pet-name">Kapola</span>
                        <span>18 months - Female</span>
                    </div>
                    <div>
                        <img src="assets/adopt-logo.png" alt="Logo" />
                    </div>
                </div>
            </div>
            <div class="pet-card">
                <img src="assets/Missing-3.png" alt="Missing Pets" />
                <div class="pet-desc">
                    <div>
                        <span class="pet-name">Kapola</span>
                        <span>18 months - Female</span>
                    </div>
                    <div>
                        <img src="assets/adopt-logo.png" alt="Logo" />
                    </div>
                </div>
            </div>
            <div class="pet-card">
                <img src="assets/Missing-4.png" alt="Missing Pets" />
                <div class="pet-desc">
                    <div>
                        <span class="pet-name">Kapola</span>
                        <span>18 months - Female</span>
                    </div>
                    <div>
                        <img src="assets/adopt-logo.png" alt="Logo" />
                    </div>
                </div>
            </div>
            <div class="pet-card">
                <img src="assets/Missing-3.png" alt="Missing Pets" />
                <div class="pet-desc">
                    <div>
                        <span class="pet-name">Kapola</span>
                        <span>18 months - Female</span>
                    </div>
                    <div>
                        <img src="assets/adopt-logo.png" alt="Logo" />
                    </div>
                </div>
            </div>
            <div class="pet-card">
                <img src="assets/Missing-2.png" alt="Missing Pets" />
                <div class="pet-desc">
                    <div>
                        <span class="pet-name">Kapola</span>
                        <span>18 months - Female</span>
                    </div>
                    <div>
                        <img src="assets/adopt-logo.png" alt="Logo" />
                    </div>
                </div>
            </div>
            <div class="pet-card">
                <img src="assets/Missing-1.png" alt="Missing Pets" />
                <div class="pet-desc">
                    <div>
                        <span class="pet-name">Kapola</span>
                        <span>18 months - Female</span>
                    </div>
                    <div>
                        <img src="assets/adopt-logo.png" alt="Logo" />
                    </div>
                </div>
            </div>
            <div class="pet-card">
                <img class="pet-card-image" src="assets/Missing-4.png" alt="Missing Pets" />
                <div class="pet-desc">
                    <div>
                        <span class="pet-name">Kapola</span>
                        <span>18 months - Female</span>
                    </div>
                    <div>
                        <img src="assets/adopt-logo.png" alt="Logo" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include_once('footer.php')
    ?>
</body>

</html>