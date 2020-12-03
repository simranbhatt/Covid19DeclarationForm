<html>
<script src="../controller/formValidation.js"></script>
<link rel="stylesheet" href="formStyle.css">

<h2>Covid-19 Declaration Form</h2>

<form name="covidForm" method="POST" action="../controller/process.php" onsubmit="return validateForm()">
    <div>
        <label for="name">Name:</label> <input type="text" name="name" placeholder="Your Name" required/>

    </div>
    <br>
    <div>
        <label for="age">Age:</label> <input type="number" name="age" min="1" max="120" placeholder="Age" required/>
    </div>
    <br>
    <div>
        <label for="name">Email:</label> <input type="email" name="email" placeholder="Email" required/>
    </div>
    <div>
        <p>Reason for Visit:</p>
        <input type="radio" name="reason" id="consult" value="consult" required/> <label for="consult">Consult</label>
        <input type="radio" name="reason" id="emergency" value="emergency"/> <label for="emergency">Emergency</label>
        <input type="radio" name="reason" id="enquiry" value="enquiry"/> <label for="enquiry">Enquiry</label>
    </div>
    <div>
        <p>Have you had any of the following symptoms in the past 14 days? (Check all that apply):</p>
        <input type="checkbox" name="symptoms[]" id="cold" value="cold"/> <label for="cold">Cold</label>
        <input type="checkbox" name="symptoms[]" id="cough" value="cough"/> <label for="cough">Cough</label>
        <input type="checkbox" name="symptoms[]" id="fever" value="fever"/> <label for="fever">Fever</label>
        <input type="checkbox" name="symptoms[]" id="breathing problems" value="breathing problems"/> <label
                for="breathing problems">Difficulty breathing</label>
        <input type="checkbox" name="symptoms[]" id="sore throat" value="sore throat"/> <label for="sore throat">Sore
            throat</label>
    </div>

    <div>
        <p>Have you been in contact with anyone who has had any of the above symptoms?</p>
        <input type="radio" name="SickRelative" id="yes" value="yes" required/> <label for="yes">Yes</label>
        <input type="radio" name="SickRelative" id="no" value="no"/> <label for="no">No</label>
    </div>

    <div>
        <p>Have you been in contact with anyone who has tested positive for Covid-19?</p>
        <input type="radio" name="CovidPositiveRelative" id="yes" value="yes" required/> <label for="yes">Yes</label>
        <input type="radio" name="CovidPositiveRelative" id="no" value="no"/> <label for="no">No</label>
    </div>

    <div>
        <p>Have you tested negative for Covid-19 in the past 14 days?</p>
        <input type="radio" name="CovidNegative" id="yes" value="yes"/> <label for="yes">Yes</label>
        <input type="radio" name="CovidNegative" id="no" value="no"/> <label for="no">No</label>
    </div>
    <br>
    <div id="message">
        <label for="message">If you have travelled beyond city limits in the past one month, please specify the time and
            place: <br> </label>
        <textarea name="travel"></textarea>
    </div>
    <br>
    <div>
        <input type="radio" name="declaration" id="declaration" value="declaration" required/> <label for="declaration">I
            acknowledge that the information I have provided here is accurate and complete.</label>
    </div>
    <br>
    <div><input type="submit" name="submit" value="Submit"/></div>
</form>


</html>