function showV() {
  var str = document.getElementById('carID').value;
  if (str.length == 0) {
    alert('Empty search!');
    return;
  } else {
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var results = JSON.parse(this.responseText);
        document.getElementById('edit_plateNumber').value= results.v_id;
        document.getElementById('edit_vehicleBrand').value = results.v_brand;
        document.getElementById('edit_vehicleYear').value = results.v_year;
        document.getElementById('edit_gear').value = results.v_gear;
        document.getElementById('edit_seats').value = results.v_seats;

        document.getElementById('editButton').disabled = false;
      }
    };
    xmlhttp.open("GET","edit.php?q="+str,true);
    xmlhttp.send();
  }
}
function enable_form(){
  document.getElementById('edit_vehicleBrand').disabled = false;
  document.getElementById('edit_vehicleYear').disabled = false;
  document.getElementById('edit_gear').disabled = false;
  document.getElementById('edit_seats').disabled = false;
  document.getElementById('fileToUpload').disabled = false;
}
