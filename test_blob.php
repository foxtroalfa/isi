<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <video id="videoCourse"></video>
</body>
<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    let xhr = new XMLHttpRequest();
    //xhr.open("GET","'.$clase[0]['clase_file_url'].'");
    //xhr.open("GET","https://elearning.isi.edu.py/video.php");
    //xhr.open("GET","https://bucketisi.s3-sa-east-1.amazonaws.com/Excel_basico/leccion_excel_2.mp4");
    xhr.open("GET","http://isi.edu.py/upload/curso_clase/leccion_excel_3.mp4");
    xhr.responseType = "arraybuffer";
    xhr.onload = (e) => {
         let blob = new Blob([xhr.response]);
         let url = URL.createObjectURL(blob);
         let image = document.getElementById("videoCourse");
         //image.src = url;
         $("#videoCourse").html("<source  src='"+url+"' type=\'video/mp4\'>");
         //console.log("hola mundo");
         console.log(url);
    }
    xhr.send();
</script>
</html>