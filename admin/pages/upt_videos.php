<div class="add-pets-header">
    <div class="title-text">
        <h1> Update Video </h1>
        <i class="fa fa-camera"></i>
    </div>
</div>

<div class="cms-announcement-container">
    <form id="form-video" action="../add_videos.php" method="post" enctype="multipart/form-data">
        <div class="form-text">
            <label for="se-title"> Title </label>
            <div class="invalid-feedback" id="missing-feedbackfile"></div>
            <div class="invalid-feedback" id="uploadsize-feedbackfile"></div>
            <input type="text" name="announcement-title" id="video-title" placeholder="Video Title" required>
        </div>
        <div class="form-input">
            <p> Feature Video </p>
              <div class="invalid-feedback" id="missing-feedbackfile"></div>
            <label for="cms-fe-img" class="cms-fe-img" id="display_image">
                Upload Video <i class="fa fa-upload" aria-hidden="true"></i>
            </label>
            <input type="file" name="video" class="pet-fe-img-class" id="cms-fe-video" accept="video/mp4, video/x-m4v, video/*" required>
            
            
            <button type="button" class="remove-button hidden" id="fileRemoveButton">Remove</button>
          <label id="fileChosen"></label>
          <label id="sizefileChosen"></label>
        </div>
        <div class="form-button">
            <input type="submit" value="Update Video" name="cms_announcement_btn_submit" id="cms_video_btn_submit">
        </div>
    </form>
</div>

<script>
      $(document).ready(function(){
          
        $('#video-title').on('input',function() {
         var title = $(this).val();
         if (title == "") {
         $('#video-title').addClass('is-invalid');
         $('#missing-feedbackfile').html('Please fill out the title.');
         $("#cms_video_btn_submit").prop("disabled", true);
         } else {
         $('#video-title').removeClass('is-invalid');
         $('#missing-feedbackfile').html('')
         $("#cms_video_btn_submit").prop("disabled", false);
         }
         
         
        });
        
        const picFileInput = document.getElementById('cms-fe-video');
          const picRemoveButton = document.getElementById('fileRemoveButton');
          
          const missingFeedback = document.getElementById('missing-feedbackfile');
          const uploadsizeFeedback = document.getElementById('uploadsize-feedbackfile');
          
          const nextBtn = document.getElementById('cms_video_btn_submit');
          const allowedExtensionsFile = /(\.mp4|\.mov|\.avi|\.mkv)$/i;
          picFileInput.addEventListener('change', handleFileInputChange);
         
          picRemoveButton.addEventListener('click', handleRemoveButtonClick);
          
          
         function handleFileInputChange(event) {
        
    const fileInput = event.target;
    const file = fileInput.files[0]?.size;
    const fileName = fileInput.files[0]?.name;
    const filePathFile = fileInput.value;
    const fileSizeInMB = file / (1024 * 1024);
    const label = document.getElementById('fileChosen');
    
    const labelsize = document.getElementById('sizefileChosen');
    
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
      if (picFileInput.files[0].size <= 26214400 && allowedExtensionsFile.exec(filePathFile)) {
        nextBtn.disabled = false;
        missingFeedback.textContent = '';
        uploadsizeFeedback.textContent = '';
      } else if (!allowedExtensionsFile.exec(filePathFile)) {
          nextBtn.disabled = true;
        missingFeedback.textContent = 'format should mp4, mkv.';
        uploadsizeFeedback.textContent = '';
      }else{
          nextBtn.disabled = true;
          missingFeedback.textContent = '';
          uploadsizeFeedback.textContent = 'Video should less than 25 MB.';
          
      }
    } else {
      nextBtn.disabled = true;
      missingFeedback.textContent = 'Please upload video files.';
      uploadsizeFeedback.textContent = 'Video should be less than 25 MB.';
    }

  }
  
  
   function handleRemoveButtonClick(event) {
       
    const button = event.target;
    const fileInput = picFileInput;
    
    
    const label = document.getElementById('fileChosen');
        
      const labelsize = document.getElementById('sizefileChosen');
    
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
          
           $('#form-video').submit(function(e){
                e.preventDefault();
                
                
                if (!$('#video-title').hasClass('is-invalid') && picFileInput.files[0]) {
                event.preventDefault();
                
                
                $('#missing-feedbackfile').html('')
                $("#cms_video_btn_submit").prop("disabled", true);
          
              
                 setTimeout(function() {
                 $("#cms_video_btn_submit").prop("disabled", false);
                 }, 7000); 
                 
                 
                 this.submit();
        
             
                } else {
                event.preventDefault();
                $('#missing-feedbackfile').html('Please fillup all requirement.');
                }

           
            
    

        })
          
          
          
          
      
    
    
    
      });
</script>