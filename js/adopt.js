$(document).ready(function () {


  $('.pet-char').change(function(e){

    let pet_char = $(this).val();

    const form = $('#char-form')[0];
    const formData = new FormData(form);

    // Send the search query to the server using AJAX
    $.ajax({
      url: './function/search.php',
      type: 'POST',
      contentType: false, 
      processData: false,
      cache: false,
      data: formData,
      success: function(data) {

        $('.pet-gallery').html(data);

      },
      error: function(xhr, status, error) {
        console.log(error);
      }
    });

  });


  $('.select-input').change(function(e){

    let select_input = $(this).val();

    const form = $('#char-form')[0];
    const formData = new FormData(form);

    $.ajax({
      url: './function/search.php',
      type: 'POST',
      contentType: false, 
      processData: false,
      cache: false,
      data: formData,
      success: function(data) {

        $('.pet-gallery').html(data);

      },
      error: function(xhr, status, error) {
        console.log(error);
      }
    });

  });


  // $('#Sex, #Type, #Breed, #color').on('change', function() {
  //   var sex = $('#Sex').val();
  //   var type = $('#Type').val();
  //   var breed = $('#Breed').val();
  //   var color = $('#color').val();

  //   // Send the search query to the server using AJAX
  //   $.ajax({
  //     url: './function/search.php',
  //     type: 'POST',
  //     data: {
  //       sex: sex,
  //       type: type,
  //       breed: breed,
  //       color: color
  //     },
  //     success: function(response) {
  //       $('.pet-gallery').html(response);
  //     },
  //     error: function(xhr, status, error) {
  //       console.log(error);
  //     }
  //   });

  // });

  var breedSelect = document.getElementById("Breed");
  var dogBreeds = ["Aspin", "Beagle", "Belgian Malinois", "Bichon Frise", "Chihuahua", "Chow Chow", "Dalmatian", "Doberman Pinscher", "English Bulldog", "French Bulldog", "German Shepherd", "Golden Retriever", "Great Dane", "Jack Russell Terrier", "Japanese Spitz", "Labrador Retriever", "Miniature Pinscher", "Pomeranian", "Poodle", "Pug", "Rottweiler", "Saint Bernard", "Shar Pei", "Shih Tzu", "Siberian Husky", "Welsh Corgi"];
  var catBreeds = ["American Curl", "American Shorthair", "British Shorthair", "Bengal Cat", "Exotic Shorthair", "Persian Cat", "Puspins", "Siamese Cat", "Russian Blue"];

  document.getElementById("Type").addEventListener("change", function() {
    breedSelect.innerHTML = "<option value='0'>Breed</option>"; // Clear the previous options
    if (this.value === "Dog") {
      dogBreeds.forEach(function (breed) {
        var option = document.createElement("option");
        option.value = breed;
        option.text = breed;
        breedSelect.appendChild(option);
      });
    } else if (this.value === "Cat") {
      catBreeds.forEach(function (breed) {
        var option = document.createElement("option");
        option.value = breed;
        option.text = breed;
        breedSelect.appendChild(option);
      });
    } else {
      breedSelect.innerHTML = '<option value="0">Breed</option>' +
  '<option value="American Curl">American Curl</option>' +
  '<option value="American Shorthair">American Shorthair</option>' +
  '<option value="Aspin">Aspin</option>' +
  '<option value="Bengal cat">Bengal cat</option>' +
  '<option value="Beagle">Beagle</option>' +
  '<option value="Belgian Malinois">Belgian Malinois</option>' +
  '<option value="Bichon Frise">Bichon Frise</option>' +
  '<option value="Chihuahua">Chihuahua</option>' +
  '<option value="Chow Chow">Chow Chow</option>' +
  '<option value="Dalmatian">Dalmatian</option>' +
  '<option value="Doberman Pinscher">Doberman Pinscher</option>' +
  '<option value="English Bulldog">English Bulldog</option>' +
  '<option value="Exotic Shorthair">Exotic Shorthair</option>' +
  '<option value="French Bulldog">French Bulldog</option>' +
  '<option value="German Shepherd">German Shepherd</option>' +
  '<option value="Golden Retriever">Golden Retriever</option>' +
  '<option value="Great Dane">Great Dane</option>' +
  '<option value="Jack Russell Terrier">Jack Russell Terrier</option>' +
  '<option value="Japanese Spitz">Japanese Spitz</option>' +
  '<option value="Labrador Retriever">Labrador Retriever</option>' +
  '<option value="Miniature Pinscher">Miniature Pinscher</option>' +
  '<option value="Persian cat">Persian cat</option>' +
  '<option value="Pomeranian">Pomeranian</option>' +
  '<option value="Poodle">Poodle</option>' +
  '<option value="Pug">Pug</option>' +
  '<option value="Puspins">Puspins</option>' +
  '<option value="Rottweiler">Rottweiler</option>' +
  '<option value="Russian Blue">Russian Blue</option>' +
  '<option value="Saint Bernard">Saint Bernard</option>' +
  '<option value="Shar Pei">Shar Pei</option>' +
  '<option value="Shih Tzu">Shih Tzu</option>' +
  '<option value="Siamese cat">Siamese cat</option>' +
  '<option value="Siberian Husky">Siberian Husky</option>' +
  '<option value="Welsh Corgi">Welsh Corgi</option>';
     
      
      
    }
      
  });

});

function searchPets() {
  var search = document.getElementById("search").value;
  var sex = $('#Sex').val();
  var type = $('#Type').val();
  var breed = $('#Breed').val();
  var color = $('#color').val();

  $.ajax({
    url: './function/search.php',
    type: 'POST',
    data: {
      search: search,
      sex: sex,
      type: type,
      breed: breed,
      color: color,
    },
    success: function(response) {
      $('.pet-gallery').html(response);
    },
    error: function(xhr, status, error) {
      console.log(error);
    }
  });
}

