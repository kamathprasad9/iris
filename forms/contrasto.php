<?php include("header.php"); ?>

<div class="comment-form-wrap pt-5">
    <div style="margin-top:35px; margin-left:20px">
        <h1 style="color:rgb(3,63,255); font-weight: bolder">CONTRASTO.</h1>
        <h4 class="mb-5" style="margin-left: 20px">InterCollege Doodling Contest</h4>
    </div>
    <form action="../competitions.php" class="p-5 bg-light">
        <!-- Name -->
        <div class="form-group">
            <label for="name">Name *</label>
            <input type="text" class="form-control" id="name" name="entry.420118953" required>
        </div>

        <!--  College  -->
        <div class="form-group">
            <label for="college">College *</label>
            <input type="text" class="form-control" list="colleges" id="interCollege" name="entry.387717126" onchange="setVisibility()"  required/>
            <datalist id="colleges">
                <option>St. Francis Institute of Technology</option>
            </datalist>
        </div>

        <div id="sfitian">
            <div class="form-group">
                <label for="year">Year *</label>
                <select class="form-control" name="entry.441805495" id="year">
                    <option value="fe">FE</option>
                    <option value="se">SE</option>
                    <option value="te">TE</option>
                    <option value="be">BE</option>
                </select>
            </div>
            <div class="form-group">
                <label for="department">Department *</label>
                <select class="form-control" name="entry.1503922811" id="dept">
                    <option value="comp">COMPUTER</option>
                    <option value="it">IT</option>
                    <option value="extc">EXTC</option>
                    <option value="elec">Electrical</option>
                    <option value="mech">Mechanical</option>
                </select>
            </div>
            <div class="form-group">
                <label for="pid">PID *</label>
                <input type="number" class="form-control" id="pid" name="entry.1419301628">
            </div>
        </div>

        <!-- Number -->
        <div class="form-group">
            <label for="contact">Number *</label>
            <input type="number" class="form-control" id="contact" name="entry.1604169910"  required>
        </div>
        
        <div class="form-group">
            <button class="btn py-3 px-4 btn-primary" onclick="return sendMessage();">Register</button>
        </div>
    </form>
</div>

<script>
    function sendMessage() {
        let name = document.querySelector('#name').value;
        let college = document.querySelector('#interCollege').value;
        let year = $("#year option:selected").text();
        let dept = $("#dept option:selected").text();
        let pid = document.querySelector('#pid').value;
        let phoneNumber = document.querySelector('#contact').value;

        console.log('hi');

         $.ajax({
            url: "https://docs.google.com/forms/d/e/1FAIpQLScdm9KAD10OXGKTW4POvBkweqb45PU8M1SyD44c7BLgjMJFpA/formResponse?",
            data: {"entry.420118953": name, "entry.387717126": college, "entry.441805495": year,
             "entry.1503922811": dept, "entry.1419301628":pid, "entry.1604169910":phoneNumber},
            type: "POST",
            dataType: "xml",
            success: function(d){
                console.log("success");
                window.location.href="/iris/competitions.php";
            },
            error: function(x, y, z) {
                console.log("error");
                window.location.href="/iris/competitions.php";
            }
        });
        
        return false;
    }
    </script>

<?php include("footer.php") ?>