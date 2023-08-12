<div class="add-pets-header">
    <div class="title-text">
        <h1> Annoucement and Events <span id="mess-announce"> </span></h1>
        <i class="fa fa-calendar"></i>
    </div>


</div>
<div class="cms-announcement-container">
    <form id="form-announce" enctype="multipart/form-data">
        <div class="form-text">
            <label for="se-title"> Title </label>
            <div class="invalid-feedback" id="missing-feedback"></div>
                <div class="invalid-feedback" id="uploadsize-feedback"></div>
            <input type="text" class="title"name="announcement-title" id="announcement-title" placeholder="Announcement/Event Title" required>
        </div>
        <div class="form-input">
            <p> Feature Image </p>

            <label for="cms-fe-img" class="cms-fe-img" id="display_image">
                Upload Image <i class="fa fa-upload" aria-hidden="true"></i>
            </label>
            <input type="file" name="ann_img[]" class="pet-fe-img-class" id="cms-fe-img" accept="image/png, image/jpg, img/jpeg" required multiple>
            
           <button type="button" class="remove-button hidden" id="picRemoveButton">Remove</button>
          <label id="picChosen"></label>
          <label id="sizepicChosen"></label>
          
        </div>
        <div class="form-button">
            <input type="submit" value="Add Announcement and Events" name="cms_announcement_btn_submit" id="cms_announcement_btn_submit">
        </div>
    </form>
</div>

<script>
    $(document).ready(function(){
        
        $('#announcement-title').on('input',function() {
         var title = $(this).val();
         if (title == "") {
         $('#announcement-title').addClass('is-invalid');
         $('#missing-feedback').html('Please fill out the title.');
         $("#cms_announcement_btn_submit").prop("disabled", true);
         } else {
         $('#announcement-title').removeClass('is-invalid');
         $('#missing-feedback').html('')
         $("#cms_announcement_btn_submit").prop("disabled", false);
         }
        });
        
        
          const picFileInput = document.getElementById('cms-fe-img');
          const picRemoveButton = document.getElementById('picRemoveButton');
          
          const missingFeedback = document.getElementById('missing-feedback');
          const uploadsizeFeedback = document.getElementById('uploadsize-feedback');
          
          const nextBtn = document.getElementById('cms_announcement_btn_submit');
const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
          picFileInput.addEventListener('change', handleFileInputChange);
         
          picRemoveButton.addEventListener('click', handleRemoveButtonClick);
          
    function handleFileInputChange(event) {
        
    const fileInput = event.target;
    const file = fileInput.files[0]?.size;
    const fileName = fileInput.files[0]?.name;
    const filePath = fileInput.value;
    const fileSizeInMB = file / (1024 * 1024);
    const label = document.getElementById('picChosen');

    const labelsize = document.getElementById('sizepicChosen');
    
    const removeButton = picRemoveButton;
        
  
    // display file name and show remove button
    if (fileName) {
      label.textContent = 'Name: '+fileName;
      labelsize.textContent = 'Size: ' +fileSizeInMB.toFixed(2) + ' MB';
      removeButton.classList.remove('hidden');
    } else {
      label.textContent = '';
      labelsize.textContent = '';
      removeButton.classList.add('hidden');
    }
  
    

    if (picFileInput.files[0]) {
      // check if any picture is larger than 5MB
      if (picFileInput.files[0].size <= 5242880 && allowedExtensions.exec(filePath)){
        nextBtn.disabled = false;
        missingFeedback.textContent = '';
        uploadsizeFeedback.textContent = '';
      } else if (!allowedExtensions.exec(filePath)) {
          nextBtn.disabled = true;
          missingFeedback.textContent = 'format should picture.';
          uploadsizeFeedback.textContent = '';
      }else {
        nextBtn.disabled = true;
        missingFeedback.textContent = '';
        uploadsizeFeedback.textContent = 'Pictures should be less than 5 MB.';
      }
    } else {
      nextBtn.disabled = true;
      missingFeedback.textContent = 'Please upload picture files.';
      uploadsizeFeedback.textContent = 'Pictures should be less than 5 MB.';
    }

  }
  
  
   function handleRemoveButtonClick(event) {
       
    const button = event.target;
    const fileInput = picFileInput;
    
    
    const label = document.getElementById('picChosen');
        
      const labelsize = document.getElementById('sizepicChosen');
    
    // clear file input and label text
    fileInput.value = '';
    label.textContent = '';
    labelsize.textContent = '';
    // disable remove button
    button.classList.add('hidden');
    
    // disable next button if both files are not uploaded
    if (!picFileInput.files[0]) {
      nextBtn.disabled = true;
      missingFeedback.textContent = 'Please upload picture file.';
      uploadsizeFeedback.textContent = 'Pictures should less than 5 MB.';
    }
  }
  

        $('#form-announce').submit(function(e){
        e.preventDefault();
        if (!$('#announcement-title').hasClass('is-invalid') && picFileInput.files[0]) {
        event.preventDefault();
        $('#missing-feedback').html('')
        $("#cms_announcement_btn_submit").prop("disabled", true);
  
      
         setTimeout(function() {
         $("#cms_announcement_btn_submit").prop("disabled", false);
         }, 7000); 
         
         
          const form = $('#form-announce')[0];
            const formData = new FormData(form);

            $.ajax({
                type: "POST",
                url: "./process/add_announce.php",
                contentType: false, 
                processData: false,
                cache: false,
                data: formData,
                success: function(data){

                    $('#mess-announce').html(data);
                  
                }
                
            })

     
        } else {
        event.preventDefault();
        $('#missing-feedback').html('Please fillup all requirement.');
        }

           
            
    

        })
    });
</script>