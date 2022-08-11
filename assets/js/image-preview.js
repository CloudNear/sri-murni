function imagePreview() {
    const image = document.querySelector('.image');
    const buttonUpload = document.querySelector('#upload-button');
    buttonUpload.addEventListener('change', function() {
      const reader = new FileReader();
      reader.readAsDataURL(this.files[0]);
      reader.addEventListener('load', function() {
        image.setAttribute('src', this.result);
      });
    });
  }
  
  imagePreview();