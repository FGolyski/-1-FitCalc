function kcalcalc() {
    var weight = document.getElementById('your_weight').value;
    var height = document.getElementById('your_height').value;
    var age = document.getElementById('your_age').value;

 if(weight && height && age > 0){
            if (document.getElementById('male').checked) {
                var gender = "male";
                var BMR = 66 + 13.7 * weight + 5 * height - 6.8 * age;
                var activity = document.getElementById('activity_chose').value;
                var CPM = activity * BMR;
                var CMPROUND = Math.round(CPM);
                document.getElementById('result').innerHTML = '<label class="form-label">Result</label><input type="text" id="result_field" class="form-control" placeholder="0">';
                document.getElementById('result_field').value = CMPROUND;
            } else if (document.getElementById('female').checked) {
                var gender = "female";
                var BMR = 655.1 + 9.5 * weight + 1.8 * height - 4.7 * age;
                var activity = document.getElementById('activity_chose').value;
                var CPM = activity * BMR;
                var CMPROUND = Math.round(CPM);
                document.getElementById('result').innerHTML = '<label class="form-label">Result</label><input type="text" id="result_field" class="form-control" placeholder="0">';
                document.getElementById('result_field').value = CMPROUND;
            } else {
                alert("You've to choose your gender! ");
            }
        } else{
            alert("Fill the form first!");
        }
}