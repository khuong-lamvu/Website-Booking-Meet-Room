function sendData(){
    var arr = document.getElementsByTagName('input');    
    var date_start = arr[0].value;
    var date_end = arr[1].value;
    var time_start = arr[2].value;
    var time_end = arr[3].value;
    var selectedCombobox=(mainForm.maphong.value);
    if(date_start == "" || time_start=="" || date_end =="" || time_end==""){
        alert("Vui lòng chọn phòng họp họp - thời gian (đặt - trả phòng) đầy đủ!");
    }
    else if (selectedCombobox=="-1") {
        document.getElementById("select").innerHTML="Vui lòng chọn phòng đi nha, nha!";
        document.getElementById("select").style.color = "red";
        return false;
    }
    else{
        var room = document.getElementById('mySelect').value;
        var  dangky  = confirm("ID Phòng họp: "+room+
                        "\nNgày đặt: "+date_start+
                        "\nNgày trả: "+date_end+
                        "\nThời gian đặt: "+time_start+
                        "\nThời gian trả: "+time_end);
        if(dangky == 1){
            alert("Đăng ký thành công");
            window.location("./index.php");
        }        
       return false;
    }
}


// function resetForm(){
//     document.getElementsByTagName('form')[0].reset();
// }