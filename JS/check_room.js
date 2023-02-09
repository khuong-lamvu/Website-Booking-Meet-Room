function myChecked() {
    // var text = document.getElementById("mySelect").value;
    // document.getElementById("select").innerHTML = "Bạn vừa chọn: " + text;
    var room = document.getElementById("select");
    room.value="";
    var  x = document.getElementById("mySelect");
    for(i = 0; i<x.options.length; i++){
      if(x.options[i].selected === true){
        room.value += x.options[i].value + "";
        // document.getElementById("select").innerHTML="Phòng họp bạn chọn có mã phòng là: "+room.value;
        // document.getElementById("select").style.color = "green";
        document.getElementById("select").innerHTML="";       
      }
      else if(x.options[i].selected === ""){
        document.getElementById("select").innerHTML="";
      }
      
    }
    var selectedCombobox=(mainForm.maphong.value);
    if(selectedCombobox == -1){
        document.getElementById("select").innerHTML="";
    }
}