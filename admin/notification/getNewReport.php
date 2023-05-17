<script>
  function displayNewReport(new_report) {
    var newReportMessage = document.getElementById('new-report');
    newReportMessage.innerHTML = new_report;
    alert(newReportMessage.innerHTML);
  }
  
  function getReportMessage() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var response = xhr.responseText;
        if (response !== '') {
          displayNewReport(response);
        }
      }
    };
    xhr.open('GET', './notification/displayNewReport.php', true);
    xhr.send();
  }
  
  setInterval(getReportMessage, 1000);
</script>

