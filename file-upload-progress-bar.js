let fileInput, uploadProgress, message;
let xhr = new XMLHttpRequest(),
fd = new FormData();
fileInput = document.getElementById('file-input');
uploadProgress = document.getElementById('upload-progress');
message = document.getElementById('message');


function init() 
{
    document.querySelector("#button").addEventListener("click", function(event)
    {   
    document.getElementById("message").innerHTML = "File non selezionato";
    event.preventDefault();
    }, 
    false);

    fileInput.addEventListener('change', function () 
    {
        fd.append('file', fileInput.files[0]);

        xhr.upload.onloadstart = function (e) {
            uploadProgress.classList.add('visible');
            uploadProgress.value = 0;
            uploadProgress.max = e.total;
            message.textContent = 'Stiamo Caricando il video. Attendere..';
            fileInput.disabled = true;
            var x = document.getElementById("button");
            x.style.display = "none";
            
        };

        xhr.upload.onprogress = function (e) {
            uploadProgress.value = e.loaded;
            uploadProgress.max = e.total;
        };

        xhr.upload.onloadend = function (e) {
            uploadProgress.classList.remove('visible');
            message.textContent = 'Elaborazione in corso';
            fileInput.disabled = false;
        };

        xhr.onload = function () 
        {
            message.textContent = 'Video Elaborato: Clicca su Download';
            var x = document.getElementById("button");
            x.style.display = "initial";
        };
       
    });
}




function loadDoc() {
    
    xhr.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("save-file").innerHTML = this.responseText;
      }
    };
    
    xhr.open("POST", "catch-file.php", true);
    xhr.send(fd);
  }


  function aboutus()
  {
    var x = document.getElementById("container2");
    if (x.style.display == "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }


  function myform()
  {
    var x = document.getElementById("weide");
    if (x.style.display == "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }

  }

  function Home()
  {
    window.location.href = "./index.html";
  }

 

init();