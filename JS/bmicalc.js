function bmicalc(){
    var weight = document.getElementById('your_weight').value;
    var height = document.getElementById('your_height').value;
    var canvas = document.getElementById("bmiCanvas");
    var ctx = canvas.getContext("2d");
    ctx.clearRect(0, 0, canvas.width, canvas.height);
            
    ctx.beginPath();
    ctx.moveTo(50, 50);
    ctx.lineTo(135, 50);
    ctx.strokeStyle = "red";
    ctx.stroke();

    ctx.beginPath();
    ctx.moveTo(135, 50);
    ctx.lineTo(210, 50);
    ctx.strokeStyle = "green";
    ctx.stroke();

    ctx.beginPath();
    ctx.moveTo(210, 50);
    ctx.lineTo(350, 50);
    ctx.strokeStyle = "red";
    ctx.stroke();

ctx.font = "12px Arial";
ctx.fillStyle="black";
ctx.fillText("Underweight", 50, 90);
ctx.fillText("Normal weight", 140, 90);
ctx.fillText("Overweight", 240, 90);

if (weight && height != null){
        if (weight > 0 && height > 0){
            var bmi= weight/((height/100)*(height/100));
            var bmiround=bmi.toFixed(2);;
            document.getElementById('result').innerHTML = '<label class="form-label">Result</label><input type="text" id="result_field" class="form-control" placeholder="0">';
            document.getElementById('result_field').value = bmiround;
            


            var color;
            if (bmiround < 18.5) {
                color = "red";
            } else if (bmiround >= 18.5 && bmiround < 26) {
                color = "green";
            } else {
                color = "red";
            }
            var position = bmiround*10-50; // Adjusting for scale
            ctx.fillStyle = color;
            ctx.fillRect(position, 44, 5, 14);
        }
        else{
            alert("Values must be greater than 0!");
        }

}
else{
    alert("Values can't be empty!");
}
}