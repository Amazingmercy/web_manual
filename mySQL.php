<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Information</title>
    <style>
        *{
            box-sizing: border-box;
        }
        body{
            text-align: center;
            background-image: url(backgroundpic.jpg);
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            
        }
        label{
            float: left;
            text-align: left;
            width: 200px;
            clear: left;
        }
        form{
            background-color: aqua;
            padding: 3%;
            align-items: center;
            border-radius: 40px;
            width: 50%;
            margin-left: 25%;
            margin-right: 25%;

        }
        h2{
            color:aqua;
            font-size: larger;
        }
        input{
            float: left;
            padding: 6px;
            border-radius: 10px;
        }
        #sub{
            background-color: black;
            border-radius: 10px;
            color: aqua;
            padding: 5px;
        }
        #sub:hover{
            color: black;
            background-color: white;
            border-radius: 15px;
            cursor: pointer;
        }
        .input_control{
            display: flex;
            flex-direction: column;
        }
        .input_control input{
            border: 4px solid black;
            border-radius: 10px;
            display: block;
            font-size: medium;
            padding: 10px;
            width: 70%;
        }

        .input_control input:focus{
            outline: 0;
        }
        .input_control.success input{
            border-color: rgb(66, 251, 66);
            
        }
        .input_control.error input{
            border-color: rgb(253, 26, 26);
        }
        .input_control.error{
            color: rgb(253, 26, 26);
            font-size: 15px;
        
        }
    </style>
</head>
<body>
    <h2>FILL THIS FORM CORRECTLY IN CAPITAL LETTERS ONLY</h2>
    <form method="post" name="my_form" action="handler.php" enctype="multipart/form-data" autocomplete="on" target="_blank" id="my_form">

        <div class="input_control">
        <label for="id_no">Matric Number:</label>
        <input type="text" id="id_no" name="id_no">
        <div class="error"></div><br><br>
        </div>
        <div class="input_control">
        <label for="f_name">First Name: </label>
        <input type="text" id="f_name" name="f_name">
        <div class="error"></div><br><br>
        </div>
        <div class="input_control">
        <label for="m_name">Middle Name:(optional)</label>
        <input type="text" id="m_name" name="m_name">
        <div class="error"></div><br><br>
        </div>
        <div class="input_control">
        <label for="l_name">Last Name:</label>
        <input type="text" id="l_name" name="l_name">
        <div class="error"></div><br><br>
        </div>
        <div class="input_control">
        <label for="dob">Date of birth:</label>
        <input type="date" id="dob" name="dob">
        <div class="error"></div><br><br>
        </div>
        <div class="input_control">
        <label for="contact">Contact Address:</label>
        <input type="text" id="contact" name="contact">
        <div class="error"></div><br><br>
        </div>
        <div class="input_control">
        <label for="mail">Email Address:</label>
        <input type="email" id="mail" name="mail">
        <div class="error"></div><br><br>
        </div>
        <div class="input_control">
        <label for="tele">Phone-Number:</label>
        <input type="tel" id="tele" name="tele">
        <div class="error"></div><br><br>
        </div>
        <div class="input_control">
        <label for="nation">Nationality:</label>
        <input type="text" id="nation" name="nation">
        <div class="error"></div><br><br>
        </div>
        <div class="input_control">
        <label for="state">State of origin:</label>
        <input type="text" id="state" name="state">
        <div class="error"></div><br><br>
        </div>
        <label for="passport">Passport(less than 2mb):</label>
        <input type="file" accept="image/png, image/jpg, image/jpeg" id="passport" name="passport" style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;font-size:large;" required><br>
        <button type="submit" id="sub"> SUBMIT</button>
        
</form>
</body>
<script>
    const form = document.getElementById('my_form');
    const id_no = document.getElementById('id_no');
    const f_name = document.getElementById('f_name');
    const m_name = document.getElementById('m_name');
    const l_name = document.getElementById('l_name');
    const dob = document.getElementById('dob');
    const contact = document.getElementById('contact');
    const mail = document.getElementById('mail');
    const tele = document.getElementById('tele');
    const nation = document.getElementById('nation');
    const state = document.getElementById('state');


    form.addEventListener('submit', e => {
       e.preventDefault();

        if(validate()) {
            sendRequest();
        }

    });
    //ajax request to overide preventDefault()
    function sendRequest() {
        
        let formData = new FormData(form);

        let xhr = new XMLHttpRequest();

        xhr.open('POST', '/CSC223PROJECTS/handler.php', true);

        xhr.send(formData);

        xhr.addEventListener('readystatechange', () => {
            if(xhr.DONE && xhr.status === 200) {
                window.location.href = "form_submitted.html";
            }
        });

        
    }


    const set_error = (element, message) =>{
        const input_control = element.parentElement;
        const error_display = input_control.querySelector('.error');

        error_display.innerText = message;
        input_control.classList.add('error');
        input_control.classList.remove('success');
    }
    const set_success = element =>{
        const input_control = element.parentElement;
        const error_display = input_control.querySelector('.error');

        error_display.innerText = '';
        input_control.classList.remove('error');
        input_control.classList.add('success');
    }
    function isValidmatric(id_no){
        let pattern = /^20[\d]{2}\/[A-Z]{2}\/[A-Z]{2,3}\/[\d]{4}$/;
        return pattern;
    }
    const isValidemail = email => {
        let pattern = /^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/;
        return pattern;
    }
    const isValidtel = tel => {
        let pattern = /^(0)(7|8|9){1}(0|1){1}[0-9]{8}$/;
        return pattern;
    }

    function validateDob(dateOfBirth) {
        let dob = new Date(dateOfBirth.value);
        let currentDate = new Date();

        return (currentDate.getFullYear() - dob.getFullYear())  >= 15;
    }

    const validate = () => {
        let validRequest = true;
    const id_noV = document.getElementById('id_no').value.trim();
    const f_nameV = document.getElementById('f_name').value.trim();
    const m_nameV = document.getElementById('m_name').value.trim();
    const l_nameV = document.getElementById('l_name').value.trim();
    const dobV = document.getElementById('dob').value.trim();
    const contactV = document.getElementById('contact').value.trim();
    const mailV = document.getElementById('mail').value.trim();
    const teleV = document.getElementById('tele').value.trim();
    const nationV = document.getElementById('nation').value.trim();
    const stateV = document.getElementById('state').value.trim();

    /*validateDob(dob);*/
    
        if(id_noV === ''){
            set_error(id_no, 'Matric no is required');
            validRequest = false;
        }
        else if(!isValidmatric(id_noV)){
            set_error(id_no, 'Enter a valid Matric number');
            validRequest = false;
        }
        else{
            set_success(id_no);
        }

        if(teleV === ''){
            set_error(tele, 'Phone-number is required');
            validRequest = false;
        }
        else if(!isValidtel(teleV)){
            set_error(tele, 'Enter a valid Phone-number');
            validRequest = false;
        }
        else{
            set_success(tele);
        }

        if(mailV === ''){
            set_error(mail, 'Email is required');
            validRequest = false;
        }
        else if(!isValidemail(mailV)){
            set_error(mail, 'Enter a valid Email Address');
            validRequest = false;
        }
        else{
            set_success(mail);
        }

        if(dobV === ''){
            set_error(dob, 'Date of birth is required');
            validRequest = false;
        }
        else if (!validateDob(dob)) {
            set_error(dob, 'Enter a valid date of birth');
            validRequest = false;
        }
        else{
            set_success(dob);
        }

        if(f_nameV === ''){
            set_error(f_name, 'Firstname is required');
            validRequest = false;
        }
        else{
            set_success(f_name);
        }
        if(l_nameV === ''){
            set_error(l_name, 'Lastname is required');
            validRequest = false;
        }
        else{
            set_success(l_name);
        }
        if(contactV === ''){
            set_error(contact, 'Address is required');
            validRequest = false;
        }
        else{
            set_success(contact);
        }
        if(stateV === ''){
            set_error(state, 'State is required');
            validRequest = false;
        }
        else{
            set_success(state);
        }
        if(nationV === ''){
            set_error(nation, 'Nationality is required');
            validRequest = false;
        }
        else{
            set_success(nation);
        }

        return validRequest;
    }

    

</script>
</html>