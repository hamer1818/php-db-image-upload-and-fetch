$( document ).ready(function() {
  let uploadButton = document.getElementById("upload-button");
  let chosenImage = document.getElementById("chosen-image");
  let fileName = document.getElementById("file-name");
  let container = document.querySelector(".container");
  let error = document.getElementById("error");
  let imageDisplay = document.getElementById("image-display");
  
  const fileHandler = (file, name, type) => {
    if (type.split("/")[0] !== "image") {
      //File Type Error
      error.innerText = "Sadece resim dosyaları yükleyebilirsiniz";
      return false;
    }
    error.innerText = "";
    let reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onloadend = () => {
      //image and file name
      let imageContainer = document.createElement("figure");
      let img = document.createElement("img");
      img.src = reader.result;
      imageContainer.appendChild(img);
      img.onload = function(){
        canvasImg(img,imageDisplay);
      //  imageContainer.innerHTML +='<label> PDF de görünecek boyutlar<label> ';
      }
      imageContainer.innerHTML += `<figcaption>${name}</figcaption>`;
      imageDisplay.appendChild(imageContainer);
    };
  };
  
  const canvasImg=(imgEl,imageDisplay)=>{
    let imageContainer = document.createElement("div");
  
    const canvas = document.createElement("canvas");
    const ctx = canvas.getContext("2d");
  
    // Set width and height
    canvas.width = 144;
    canvas.height = 73;
    ctx.drawImage(imgEl, 0, 0, canvas.width, canvas.height);
    // Draw image and export to a data-uri
    imageContainer.innerHTML += ' PDF cıktısındaki imza <br>';
    imageContainer.appendChild(canvas);  
    imageDisplay.appendChild(imageContainer);
    $.post("resimkaydet.php",{resim:canvas.toDataURL("image/png"),tcno:$("#tcno").val()},function(response){
      //console.log(response);
     // $("#yuklenen").attr("src",response)
    })
    //console.log( canvas.toDataURL("image/png"))
  };
  
  //Upload Button
  uploadButton.addEventListener("change", () => {
    imageDisplay.innerHTML = "";
    Array.from(uploadButton.files).forEach((file) => {
      fileHandler(file, file.name, file.type);
    });
  });
  
  container.addEventListener(
    "dragenter",
    (e) => {
      e.preventDefault();
      e.stopPropagation();
      container.classList.add("active");
    },
    false
  );
  
  container.addEventListener(
    "dragleave",
    (e) => {
      e.preventDefault();
      e.stopPropagation();
      container.classList.remove("active");
    },
    false
  );
  
  container.addEventListener(
    "dragover",
    (e) => {
      e.preventDefault();
      e.stopPropagation();
      container.classList.add("active");
    },
    false
  );
  
  container.addEventListener(
    "drop",
    (e) => {
      e.preventDefault();
      e.stopPropagation();
      container.classList.remove("active");
      let draggedData = e.dataTransfer;
      let files = draggedData.files;
      imageDisplay.innerHTML = "";
      Array.from(files).forEach((file) => {
        fileHandler(file, file.name, file.type);
      });
    },
    false
  );
  

  console.log( "ready!" );
  error.innerText = "";
});