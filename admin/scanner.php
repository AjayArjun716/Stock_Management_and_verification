<?php include('partials/menu.php') ?>
<script src="html5-qrcode.min.js"></script>
<style>
  .result{
    background-color: green;
    color:#fff;
    padding:20px;
  }
  .row{
    display:flex;
  }
  .box{
    position: relative;
    top: 200px;
    left: 400px;
  }

</style>
<script >
  function showHint(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "gethint.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>
<div class="box">
<div class="row">
  <div class="col">
    <div style="width:500px;" id="reader"></div>
  </div>
  <div class="col" style="padding:30px;">
    <h4>SCAN RESULT</h4>
    <div>Stock ID</div><form action="">
     <input type="text" name="start" class="input" id="result" onkeyup="showHint(this.value)" placeholder="result here" readonly="" /></form>
     <p>Status: <span id="txtHint"></span></p>
  </div>
  </div>
</div>
</div>
<script type="text/javascript">
function onScanSuccess(qrCodeMessage) {
     document.getElementById("result").value = qrCodeMessage;
     showHint(qrCodeMessage); 
}
function onScanError(errorMessage) {
  //handle scan error
}
var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess, onScanError);
</script>
