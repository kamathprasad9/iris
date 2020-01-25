<?php include('header.php') ?>

<div id="wrapper">
    <div class="form-container">
        <div class="form-heading">Mr. & Ms. IRIS</div>
        <div class="form-subheading mb-5"></div>
        <form action="">
            <!-- name -->
            <div class="input-group">
                <!-- <label for="input" class="control-label">Username</label> -->
                <b class="bold">Name</b>
                <input id="name" name="entry.962837583" type="text" placeholder="Full name" required>
                <span class="bar"></span>
            </div>
            <!-- college -->
            <div class="input-group">
                <center><b class="bold">ONLY FOR SFITIANS</b></center><br>
                <!-- <input type="text" list="colleges" id="interCollege" name="entry.1957620844" onchange="setVisibility()"
                    placeholder="College name" required>
                <span class="bar"></span>
                <datalist id="colleges">
                    <option>St. Francis Institute of Technology</option>
                </datalist> -->
               

            </div>
            
                <div class="input-group">
                    <b class="bold">Year </b><br />
                    <select class="form-control input-list" name="entry.1960341028" id="year">
                        <option value="none">&nbsp;</option>
                        <option value="fe">First Year</option>
                        <option value="se">Second Year</option>
                        <option value="te">Third Year</option>
                        <option value="be">Fourth Year</option>
                    </select>
                </div>
                <div class="form-group dropdown">
                    <div class="input-group">
                        <b class="bold">Department</b>
                        <select class="form-control" name="entry.433383431" id="dept">
                            <option value="none">&nbsp;</option>
                            <option value="comp">COMPUTER</option>
                            <option value="it">IT</option>
                            <option value="extc">EXTC</option>
                            <option value="elec">Electrical</option>
                            <option value="mech">Mechanical</option>
                        </select>
                    </div>
                </div>
                <div class="input-group">
                    <b class="bold">Pid</b>
                    <input type="number" placeholder="eg. 1820xx" id="pid" name="entry.982916234">
                    <span class="bar"></span>
                </div>
            <div class="input-group">
                    <b class="bold">Post </b><br />
                    <select class="form-control input-list" name="entry.1275666766" id="iris">
                        <option value="Mr">Mr. IRIS</option>
                        <option value="Ms">Ms. IRIS</option>                        
                    </select>
                </div>
            
            <div class="input-group">
                <b class="bold" id="error-phone-label">Phone Number</b><span class="errorForm" id="error-phone"></span>
                <input type="tel" placeholder="xxx-xxx-xxxx" id="contact" name="entry.1733787848" required>
                <span class="bar" id="phone-bar"></span>
            </div>
            <!-- submit -->
            <div class="input-group">
                <!--<button>Register</button>-->
                <button class="btn py-3 px-4 btn-primary" onclick="return validateForm();">Register</button>
            </div>
        </form>
    </div>
</div>

<script>
    function validateForm() {
        let name = document.querySelector('#name').value;
        let phoneNumber = document.querySelector('#contact').value;
        let year = $("#year option:selected").text();
        let dept = $("#dept option:selected").text();
        let pid = document.querySelector('#pid').value;
        let post = $("#iris option:selected").text();

        if (post == "Mr. IRIS") {
            pos = "Mr. IRIS";
        } else if(post == "Ms. IRIS") {
            pos = "Ms. IRIS";
        }

        console.log('hi');

        var values = true;

        //validate Phone Number
        if(phoneNumber.length == 10) {

            values = true;

        } else {

            values = false;

            document.getElementById("contact").focus();
            document.getElementById("error-phone").innerHTML = "Please enter valid 10 digits only";
            document.getElementById("error-phone-label").style.color = "red";
        }
        
        if(values) {

            sendMessage(name, phoneNumber, year, dept, pid, post);

            return false;  

        } else {

            //alert("Enter 10 numbers only");
            console.log("working but false");

            return false;

        }

    }

    function sendMessage(name, phoneNumber, year, dept, pid, post) {
        $.ajax({
                url: "https://docs.google.com/forms/d/e/1FAIpQLSdmKFxEmPcpCt0RMrbKhTcRNOiKLshoDJNpvJ8nKW2bi7oeJg/formResponse?",
                data: {"entry.962837583": name, "entry.1733787848":phoneNumber, "entry.1960341028": year,
                "entry.433383431": dept, "entry.982916234":pid, "entry.1275666766":post},
                type: "POST",
                dataType: "xml",
                success: function(d){
                    console.log("success");
                    window.location.href="../competitions.php?status=success&name="+name+"&game="+pos;
                },
                error: function(x, y, z) {
                    console.log("error");
                    window.location.href="../competitions.php?status=success&name="+name+"&game="+pos;
                }
            });
    }
</script>

<?php include("footer.php") ?>
